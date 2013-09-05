<? 

include_once('database_connect.php');

$c = $_POST['c'];

foreach ($c as $key => $value) {
    $aux = explode('-', $c[$key][1]); 
  	$class_un[$key]=$aux[0];
    $class_name[$key] = $c[$key][2];
    $class[$key] = '("' .$class_un[$key].'" , "'.$class_name[$key].'" , "'.$c[$key][0].'")';

    $professor[$key] = '("' .$c[$key][3].'" , "'.$c[$key][0].'")';

    $period = explode('-', $c[$key][4]);
    $professor_class[$c[$key][3].'-'.$c[$key][0]][] = '"' .$class_un[$key].'" , "'.$aux[1].'" , "'.$period[0].'" , "'.$period[1].'")';
}

$class = array_unique($class);
$professor = array_unique($professor);

//now
$time = date("Y-m-d H:i:s");

//insert professors
mysql_query("INSERT INTO professors (name, faculty) VALUES ".implode(' , ',$professor).' ON DUPLICATE KEY UPDATE updated_at = NOW()')
or die(mysql_error());  


//insert classes
mysql_query("INSERT IGNORE INTO classes (un, name, faculty) VALUES ".implode(' , ',$class)) 
or die(mysql_error());  


//get professors id
$query = 'SELECT * FROM professors WHERE updated_at >= "'.$time.'"'; 
$result = mysql_query($query) or die(mysql_error());  
while($row = mysql_fetch_array( $result )) {
	$name = $row['name'];
	$faculty = $row['faculty'];
    $n=0;
    foreach ($professor_class[$name.'-'.$faculty] as $list) {
        $professor_list[$name.'-'.$faculty.'-'.$n] = '("'.$row['id'].'" , '.$list;
        $n++;
    }
} 


//mysql_query("SELECT FROM professors id, name, faculty where primkey in ('pk1', 'pk2');") or die (mysql_error());


//insert class_professor
mysql_query("INSERT IGNORE INTO class_professor (professor_id, class_un, section, year, semester) VALUES ".implode(' , ',$professor_list)) 
or die(mysql_error()); 

?>
