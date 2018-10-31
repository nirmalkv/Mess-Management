<?php
	if(!isset($_SESSION)) {
	session_start(); 
}
require_once ("../Scripts/connection.php");
	if(isset($_POST['username']) && isset($_POST['password']))
	{
		$uid = $_POST ['username'];
	$pass = $_POST ['password'];
	$sql = "SELECT * FROM official_user WHERE Official_ID = '{$uid}' AND Password = '{$pass}'";
	echo ($sql);
	$result = $mysqli->query ( $sql );
	if ($result->num_rows) {
		$_SESSION ['admin'] = True;
		header ( 'Location: ../Main/index.php' );
	} else {
		header ( 'Location: login.php' );
	}

		
	}
	else
	{
		echo '<script>window.location.replace("../login.php")</script>';
	}
 ?>
