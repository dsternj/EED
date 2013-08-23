<? 

$username = "eed_master";
$password = "importa2012";
$hostname = "localhost"; 

//connection to the mysql
$dbhandle = mysql_connect($hostname, $username, $password) 
  or die("Unable to connect to MySQL");
  
//select database
mysql_select_db ('eed')
?>