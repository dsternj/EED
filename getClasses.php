<? 

	$url = "http://catalogo.uc.cl/index.php?Itemid=55";
    $postFields = array();

    // turn the hidden fields into an array
    for ($i = 0; $i < $count; ++$i) {
        $postFields[$hiddenFields[1][$i]] = $hiddenFields[2][$i];
    }

    // add our login values
    $postFields['periodo'] = '1993-21';

    $post = '';

    // convert to string, this won't work as an array, form will not accept multipart/form-data, only application/x-www-form-urlencoded
    foreach($postFields as $key => $value) {
        $post .= $key . '=' . urlencode($value) . '&';
    }

    $post = substr($post, 0, -1);


  	$ch  = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

    $page = curl_exec($ch);

    echo $page;



?>

<script>
$(window).load(function(){
    c=[];
    for(n=0;n<config.rowsCopy.length;n++){
        c[n]=[];
        config.rowsCopy[n].children('td').each(function(m){
            c[n][m]=$(this).text()
        })
    }
    $.ajax({
       type: "POST",
       data: {c:c},
       url: "http://localhost/saveClasses.php",
       success: function(data){
         console.log(data)
       },
    });

})
</script>