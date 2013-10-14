<? 
//get variables
$cun = $_POST['cun'];
$pid = $_POST['pid'];
$comments = $_POST['comments'];
$year = $_POST['year'];
$semester = $_POST['semester'];



for($n=0; $n<7; $n++) {
	$q[$n] = $_POST['q'.$n];
}

//add user_answer
mysql_query("INSERT INTO user_answer (username, professor_id, class_un) VALUES('$user_name', '$pid', '$cun' ) ") 
or die(mysql_error()); 

//add comments
mysql_query("INSERT INTO comments (username, professor_id, class_un, comments) VALUES('$user_name', '$pid', '$cun', '$comments' ) ") 
or die(mysql_error()); 

//add answers
//echo "INSERT INTO answers  VALUES('$pid', '$cun', '".$q[0]."', '".$q[1]."', '".$q[2]."', '".$q[3]."', '".$q[4]."', '".$q[5]."', '".$q[6]."')";
mysql_query("INSERT INTO answers  VALUES('$pid', '$cun', ".$q[0].", ".$q[1].", ".$q[2].", ".$q[3].", ".$q[4].", ".$q[5].", ".$q[6].", '$year', '$semester')") 
or die(mysql_error()); 
?>