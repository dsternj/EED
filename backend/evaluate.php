<? 

$question_list = 'select * from questions';
$question_list = mysql_query($question_list) or die(mysql_error()); 


while($row = mysql_fetch_array( $question_list )) {
	$questions[]=htmlentities($row['question']);
	$questions_explanation[]=htmlentities($row['explanation']);
	$questions_type[]=$row['type'];
}

?>