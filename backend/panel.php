<? 


$professors = 'select *, classes.un as class_un, classes.name as class_name, 
professors.name as professor_name, professors.id as professor_id
from class_professor, classes, professors, classes_students 
where class_professor.class_un = classes.un AND class_professor.professor_id = professors.id 
AND classes_students.class_un = classes.un AND classes_students.class_un = class_professor.class_un 
AND classes_students.year = class_professor.year and classes_students.semester = class_professor.semester 
AND classes_students.section = class_professor.section
AND username = "'.$user_name.'"
ORDER BY classes_students.year desc, classes_students.semester desc';
$professors = mysql_query($professors) or die(mysql_error()); 


while($row = mysql_fetch_array( $professors )) {
	$class_name[] = $row['class_name'];
	$class_un[] = $row['class_un'];
	$professor_name[] = $row['professor_name'];
	$professor_id[]= $row['professor_id'];
	$c_year[]= $row['year'];
	$c_year_list = array_unique($c_year);
	$c_n_semester[] = $row['semester'];
	if($row['semester']==21) 
		$c_semester[]= 'primero';
	else
		$c_semester[]= 'segundo';
}


?>