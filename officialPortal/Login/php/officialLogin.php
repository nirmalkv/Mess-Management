<?php
// error_reporting(E_ALL);
// ini_set('display_errors', '1');
	session_start(); 
require_once ("../../Scripts/connection.php");
	if(isset($_POST['username']) && isset($_POST['password']))
	{
	$uid = $mysqli->real_escape_string(trim($_POST ['username']));
	$password = $mysqli->real_escape_string(trim($_POST ['password']));
	$sql = "SELECT * FROM official_user WHERE Official_ID = '{$uid}'";
	$result = $mysqli->query ( $sql );
	if ($result->num_rows == 1) {
		$result = mysqli_fetch_array($result);
		if(password_verify($password,$result['Password'])){
			$_SESSION ['admin'] = True;
			header ( 'Location: ../../Main/index.php' );
		}
		else{
			header ( 'Location: ../login.php?Error' );
		}
	} else {
		header ( 'Location: ../login.php' );
	}

		
	}
	else
	{
		echo '<script>window.location.replace("../login.php")</script>';
	}
 ?>
