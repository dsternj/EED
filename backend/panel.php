<?

include_once 'database_connect.php';

//classes each semester
$classes = 'select count(distinct classes.un) as count, class_professor.year, class_professor.semester 
from class_professor, classes 
WHERE class_professor.class_un = classes.un 
group by year, semester
ORDER BY year, semester ASC
'; 

$classes = mysql_query($classes) or die(mysql_error());  

while($row = mysql_fetch_array( $classes )) {

    $count = $row['count'];
    $year = $row['year'];
    $semester = $row['semester'];
    $ticks_class[] = '["'.$row['year'].'-'.$row['semester'].'" ,"'.$row['year'].'-'.$row['semester'].'"]';

	if($row['semester']==21)
	{
		//echo $row['year'].'-01-01 UTC';
		$tick = strval(strtotime( $year.'-01-01') * 1000);
	}
	else {
		//echo $row['year'].'-07-01 UTC:';
		$tick = strval(strtotime( $year.'-07-01') * 1000) ;
	}
	
    $series_class[]='['.$tick.' ,'.$row['count'].']';
	
}




//classes each semester foreach faculty
$classes_faculty = 'select count(distinct classes.un) as count, class_professor.year, class_professor.semester, faculty 
from class_professor, classes 
WHERE class_professor.class_un = classes.un 
group by year, semester, faculty
ORDER BY year, semester ASC
';

$classes_faculty = mysql_query($classes_faculty) or die(mysql_error()); 

$search = array(' ', '(', ')');
$replace = array('_', '_', '_');

while($row = mysql_fetch_array( $classes_faculty )) {
	if($row['semester']==21)
	{
		//echo $row['year'].'-01-01 UTC';
		$tick = strval(strtotime( $row['year'].'-01-01') * 1000);
	}
	else {
		//echo $row['year'].'-07-01 UTC:';
		$tick = strval(strtotime( $row['year'].'-07-01') * 1000) ;
	}
	
    $class_count[$row['faculty']][$tick]=$row['count'];
}

//professors each semester
$professors = 'select count(distinct class_professor.professor_id), class_professor.year, class_professor.semester 
from class_professor
group by year, semester
ORDER BY year, semester ASC
';

$professors = mysql_query($professors) or die(mysql_error()); 

//professors each semester foreach faculty
$professors_faculty = 'select count(distinct class_professor.professor_id), class_professor.year, class_professor.semester, faculty 
from class_professor, classes 
WHERE class_professor.class_un = classes.un 
group by year, semester, faculty
ORDER BY year, semester ASC
';

$professors_faculty = mysql_query($professors_faculty) or die(mysql_error()); 



?>