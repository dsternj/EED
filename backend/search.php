<?
include_once('../read_cookie.php') ;
if($user_name) { 
	include_once '../database_connect.php';
    include_once '../backend/application.php' ;

    $q = strtoupper($_GET["term"]);

	$return = array();
	$q1 = "select * from classes where name like '%$q%' or un like '%$q%'  LIMIT 5 ";
    $q1 = mysql_query($q1);

    while ($row = mysql_fetch_array($q1)) {
    	$row['name'];
    	array_push($return,array('label'=>$row['name'].' - '.$row['un'], 'cun'=>$row['un'] , 'category'=>'Cursos', 'faculty'=>$row['faculty'], 'value'=>$row['name']));
	}

	$q2 = "select * from professors where name like '%$q%' LIMIT 5 ";
    $q2 = mysql_query($q2);

    while ($row = mysql_fetch_array($q2)) {
    	$row['name'];
    	array_push($return,array('label'=>$row['name'], 'id'=>$row['id'], 'category'=>'Profesores', 'faculty'=>$row['faculty'], 'value'=>$row['name']));
	}

echo(json_encode($return));

}
?>