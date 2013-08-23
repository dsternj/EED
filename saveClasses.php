<? 

include_once('database_connect.php');

$c = $_POST['c'];

foreach ($c as $key => $value) {
    $aux = explode('-', $c[$key][1]); 
  	$class_un[$key]=$aux[0];
    $class_name[$key] = $c[$key][2];
    $class[$key] = "('" .$class_un[$key]."' , '".$class_name[$key]."', '".$c[$key][0]."' )";

    $professor[$key] = "('" .$c[$key][3]."' , '".$c[$key][0]."')";

    $professor_class[$key] = "('" .$class_un[$key]."' , '".$class_name[$key]."', '".$c[$key][0]."' )";
}

$class = array_unique($class);
$professor = array_unique($professor);

print_r($class);
print_r($professor);

//insert professors
mysql_query("INSERT IGNORE INTO professors (name, faculty) VALUES ".implode(' , ',$professor)) 
or die(mysql_error());  

//insert classes
mysql_query("INSERT IGNORE INTO classes (un, name, faculty) VALUES ".implode(' , ',$class)) 
or die(mysql_error());  

//insert class_professor
/*mysql_query("INSERT IGNORE INTO class_professor (class_un, professor_id, year, semester) VALUES ".implode(' , ',$class)) 
or die(mysql_error()); */ 

?>