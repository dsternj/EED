<? 

include_once 'database_connect.php';

//get the semester list

$time_list = 'select year, semester from classes_students WHERE username = "'.$user_name.'" group by year, semester order by year DESC, semester DESC';
$time_list = mysql_query($time_list) or die(mysql_error()); 


while($row = mysql_fetch_array( $time_list )) {
	if ($row['semester']=='21')
		$aux = '1er Sem';
	elseif ($row['semester']=='22')
		$aux = '2do Sem';

	$year_semester[] = $row['year'].' - '.$aux;
	$year_list[] = $row['year'];
	$semester_list[] = $row['semester'];
}

// get user asnwers
$answers = "select * from user_answer where username = '$user_name'";
$answers = mysql_query($answers) or die(mysql_error()); 
while($row = mysql_fetch_array( $answers )) {
	$answer_list[]=$row['class_un'];
}

//count the total number of classes
$count_classes = 'select count(class_un) as classes from classes_students WHERE username = "'.$user_name.'"';
$count_classes = mysql_query($count_classes) or die(mysql_error()); 


while($row = mysql_fetch_array( $count_classes )) {
	$count_classes = $row['classes'];
}

?>