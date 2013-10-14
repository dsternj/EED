<? 
$cun = $_GET['cun'];
$search = array(' ', '(', ')');
$replace = array('_', '_', '_');

// students grades
$sgbs = "select avg(grade), class_professor.professor_id, professors.name, count(*), classes_students.year, classes_students.semester
from class_professor, professors, classes_students 
where class_professor.professor_id = professors.id 
AND classes_students.class_un = class_professor.class_un 
AND classes_students.year = class_professor.year and classes_students.semester = class_professor.semester 
AND classes_students.section = class_professor.section
AND class_professor.class_un = '$cun'
GROUP BY class_professor.professor_id, classes_students.year, classes_students.semester";

// students grades
$sga = "select avg(grade), class_professor.professor_id, professors.name, count(*), classes_students.year, classes_students.semester
from class_professor, professors, classes_students 
where class_professor.professor_id = professors.id 
AND classes_students.class_un = class_professor.class_un 
AND classes_students.year = class_professor.year and classes_students.semester = class_professor.semester 
AND classes_students.section = class_professor.section
AND class_professor.class_un = '$cun'
GROUP BY class_professor.professor_id";


// get class name
$class = "select name from classes where un = '$cun'";

// answers by semester
$abs= "select answers.professor_id, professors.name, year, semester,  AVG(q0), AVG(q1),AVG(q2),AVG(q3),AVG(q4),AVG(q5),AVG(q6)  from answers, professors where answers.professor_id = professors.id and class_un = '$cun' group by professor_id, year, semester";

// agregate answers
$aa= "select answers.professor_id, professors.name, 
count(*), count(q0), count(q1), count(q2), count(q3), count(q4), count(q5), count(q6), 
AVG(q0), AVG(q1),AVG(q2),AVG(q3),AVG(q4),AVG(q5),AVG(q6)  
from answers, professors where answers.professor_id = professors.id and class_un = '$cun' group by professor_id";

//comments
$comments = "select * from comments, professors where comments.professor_id = professors.id and class_un = '$cun' order by time desc";

//get the complete professor list
$pl = "select * from class_professor, professors where class_professor.class_un = '$cun' and class_professor.professor_id = professors.id";

//questions
$question_list = 'select * from questions';

$class = mysql_query($class) or die(mysql_error()); 
while($row = mysql_fetch_array( $class )) {
	$cname = $row['name'];
}



$abs = mysql_query($abs) or die(mysql_error()); 
while($row = mysql_fetch_array( $abs )) {
	for($n=0; $n<7; $n++){
		if($row['semester']==21)
		{
			//echo $row['year'].'-01-01 UTC';
			$tick = strval(strtotime( $row['year'].'-01-01') * 1000);
		}
		else 
		{
			//echo $row['year'].'-07-01 UTC:';
			$tick = strval(strtotime( $row['year'].'-07-01') * 1000) ;
		}
		$abs_q[$n][$row['name']][$tick] = $row['AVG(q'.$n.')'];
	}
	
}

$sgbs = mysql_query($sgbs) or die(mysql_error()); 
while($row = mysql_fetch_array( $sgbs )) {
	if($row['semester']==21)
	{
		//echo $row['year'].'-01-01 UTC';
		$tick = strval(strtotime( $row['year'].'-01-01') * 1000);
	}
	else 
	{
		//echo $row['year'].'-07-01 UTC:';
		$tick = strval(strtotime( $row['year'].'-07-01') * 1000) ;
	}
	$sgbs_q[$row['name']][$tick] = $row['avg(grade)'];
	
}

$aa = mysql_query($aa) or die(mysql_error()); 
while($row = mysql_fetch_array( $aa )) {
	for($n=0; $n<7; $n++){
		$aa_q[$n][$row['name']] = $row['AVG(q'.$n.')'];
		$count_q[$n][$row['name']] = $row['count(q'.$n.')'];
	}
	$count[$row['name']] = $row['count(*)'];
	$responded_list[] = $row['name'];
}

$sga = mysql_query($sga) or die(mysql_error()); 
while($row = mysql_fetch_array( $sga )) {
	$sga_q[$row['name']] = $row['avg(grade)'];
	$count_gpa[$row['name']] = $row['count(*)'];
	
}

$comments = mysql_query($comments) or die(mysql_error()); 
setlocale(LC_ALL,"es_ES");
while($row = mysql_fetch_array( $comments )) {
	$p_comment[$row['name']][$row['username']] = $row['comments'];
	$p_comment_time[$row['name']][$row['username']] = date('j \d\e F, Y', $row['time']);

}

$question_list = mysql_query($question_list) or die(mysql_error()); 
while($row = mysql_fetch_array( $question_list )) {
	$questions[]=htmlentities($row['question']);
	$questions_explanation[]=htmlentities($row['explanation']);
	$questions_type[]=$row['type'];
}

$pl = mysql_query($pl) or die(mysql_error()); 
while($row = mysql_fetch_array( $pl )) {
	$professor_list[] = $row['name'];
}
//remove the professors that have responded
if(count($responded_list)>0) {
	$not_responded_list = array_unique(array_diff($professor_list,$responded_list));
}
else {
	$not_responded_list = array_unique($professor_list);
}
?>