<?

$totalSearch =  totalSearch($user_name);
if(intval($answer_list) / intval($count_classes) < 0.6) {
	$seachesLeft = count($answer_list) * 3 - $totalSearch;
} else {
	$seachesLeft = '999999';
}

function insertSearch($username) {

	$q = "insert into searches VALUES('$username', 1) on duplicate key update searches= searches +1";

	mysql_query($q) 
	or die(mysql_error());  
}

function totalSearch($username) {
	$q = "select * from searches where username = '$username'";

	$q = mysql_query($q) or die(mysql_error()); 
	while($row = mysql_fetch_array( $q )) {
		return  $row['searches'];
	}

}
?>