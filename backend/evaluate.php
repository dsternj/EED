<? 

$question_list = 'select * from questions';
$question_list = mysql_query($question_list) or die(mysql_error()); 
$pid = $_REQUEST['pid'];
$pn = $_REQUEST['pn'];
$cun = $_REQUEST['cun'];
$cn = $_REQUEST['cn'];
$year = $_REQUEST['year'];
$semester = $_REQUEST['semester'];
//print_r($_REQUEST);


while($row = mysql_fetch_array( $question_list )) {
	$questions[]=htmlentities($row['question']);
	$questions_explanation[]=htmlentities($row['explanation']);
	$questions_type[]=$row['type'];
}

?>