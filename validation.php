<?

$username = $_POST['user'];
$password = $_POST['password'];
$useragent = "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.43 Safari/537.31"; // Yes cause that's the way I roll
$cookie="cookie.txt";
$url = 'https://sso.uc.cl/cas/login?service=https://portaluc.puc.cl/uPortal/Login';
$portal_url = 'https://portaluc.puc.cl/uPortal/render.userLayoutRootNode.uP';
$portal_base_url = 'https://portaluc.puc.cl/uPortal/';

    $ch  = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
    curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (X11; U; Linux x86_64; en-US; rv:1.9.2.13) Gecko/20101206 Ubuntu/10.10 (maverick) Firefox/3.6.13');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

    $page = curl_exec($ch);

    // try to find the actual login form
    if (!preg_match('/^.*?<form.*?<\/form>.*$/smi', $page, $form)) {
       // echo  'error finding form';
    }
	//print_r($form);

    $form = $form[0];

    // find the action of the login form
    if (!preg_match('/action="([^"]+)"/i', $form, $action)) {
       // echo  'Failed to find login form url';
    }
	//print_r($action);

    $URL2 = $action[1]; // this is our new post url
	//print_r($URL2);
    // find all hidden fields which we need to send with our login, this includes security tokens
    $count = preg_match_all('/<input type="hidden"\s*name="([^"]*)"\s*value="([^"]*)"/i', $form, $hiddenFields);

	//print_r($hiddenFields.'lala');
	
    $postFields = array();

    // turn the hidden fields into an array
    for ($i = 0; $i < $count; ++$i) {
        $postFields[$hiddenFields[1][$i]] = $hiddenFields[2][$i];
    }

    // add our login values
    $postFields['username'] = $username;
    $postFields['password'] = $password;

    $post = '';

    // convert to string, this won't work as an array, form will not accept multipart/form-data, only application/x-www-form-urlencoded
    foreach($postFields as $key => $value) {
        $post .= $key . '=' . urlencode($value) . '&';
    }

    $post = substr($post, 0, -1);

	//echo $post;
    // set additional curl options using our previous options
    curl_setopt($ch, CURLOPT_URL, $url.$URL2);
    curl_setopt($ch, CURLOPT_REFERER, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

    $page = curl_exec($ch);

    //echo $page;

    $dom = new DOMDocument();
    $dom->loadHTML($page);
    $welcome = $dom->getElementById('welcome-auth')->textContent;

    //return false if login failed
    if(!$welcome) {
        echo "FALSE";
        exit;
    }

    //create cookie to login user
    include_once('create_cookie.php');

    //get the link to the academic area
    $dom = new DOMDocument();
    $dom->loadHTML($page);
    $holder = $dom->getElementById('tab_u102l1s83');
    $link = $holder->getElementsByTagName('a')->item(0)->getAttribute('href');

    //enter the academic area
    curl_setopt($ch, CURLOPT_URL, $portal_base_url.$link);
    curl_setopt($ch, CURLOPT_REFERER, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

    $page = curl_exec($ch);
    $cursos = array();
    $n=0;
    $c=0;
    $s=0;
    $class_val = array('class_id', 'section', 'credits', 'class_name', 'gpa', 'class_type', 'semester', 'year', 'validated');
    //get the classes and grades
    $dom = new DOMDocument();
    $dom->loadHTML($page);
    $holders = $dom->getElementById('BodyResumenAcad')->getElementsByTagName('div');
    //echo count($holders);
    foreach ($holders as $holder) {
        if($holder->getAttribute('class')=='Pestannas_tabcontentSelected' || $holder->getAttribute('class')=='Pestannas_tabcontent'){
            $aux = $holder->getElementsByTagName('table')->item(1);
            
            if($aux) {
                $semesters = $aux->getElementsByTagName('table');
            }

            echo count($semesters);
            foreach ($semesters as $semester) {
                if($s%2==0) {

                    $trs = $semester->getElementsByTagName('tr');

                    foreach ($trs as $tr) {

                        $tds = $tr->getElementsByTagName('td');

                        foreach ($tds as $td) {
                            $cursos[$c][$class_val[$n]] = $td->textContent;
                            $n++;
                            if($n==9) {
                                $c++;
                                $n=0;
                            }
                        }
                    }
                }
                $s++;
            }
        }
    }
   
    
    print_r ($cursos);

    //echo $page;

?>