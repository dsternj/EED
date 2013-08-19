<? 

//include_once('database_connect.php');

$c = $_POST['c'];

foreach ($c as $key => $value) {
    $aux = explode($c[$key][1], '-'); 
    echo $class_un[$key]=$aux[0];
    $class_name[$key] = $c[$key][2]; 
    $professor[$key] = $c[$key][3];
}

$class_un = array_unique($class_un);
$class_name = array_unique($class_name);
$professor = array_unique($professor);

print_r($class_un);
print_r($class_name);
print_r($professor);

?>