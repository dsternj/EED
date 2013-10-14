<? 
$id = $_GET['id'];
$search = array(' ', '(', ')');
$replace = array('_', '_', '_');


// basic info
$bi= "select * from professors where id = '$id' ";

// classes
$classes= "select *, classes.name as class_name from professors, class_professor, classes where professors.id = '$id' and professors.id = class_professor.professor_id and class_professor.class_un = classes.un group by class_professor.year, class_professor.semester";


$bi = mysql_query($bi) or die(mysql_error()); 
while($row = mysql_fetch_array( $bi )) {
	$name = $row['name'];
	$faculty = $row['faculty'];

}

$classes = mysql_query($classes) or die(mysql_error()); 
while($row = mysql_fetch_array( $classes )) {
	$class_list[$row['class_un']] = $row['class_name'];
	if ($row['semester']=='21')
		$aux = 'primero';
	elseif ($row['semester']=='22')
		$aux = 'segundo';
	$class_list_period[$row['class_un']][] = $row['year'].' - '.$aux;
}


?>