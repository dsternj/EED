<?
//count the total number of classes
$count_classes = 'select count(class_un) as classes from classes_students WHERE username = "'.$user_name.'"';
$count_classes = mysql_query($count_classes) or die(mysql_error()); 


while($row = mysql_fetch_array( $count_classes )) {
	$count_classes = $row['classes'];
}
?>