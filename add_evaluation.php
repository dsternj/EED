<?
include_once('read_cookie.php') ;
if($user_name) { 
	include_once 'backend/application.php' ;
	include_once 'backend/add_evaluation.php' ;
	header( 'Location: panel.php' ) ;

}

?>