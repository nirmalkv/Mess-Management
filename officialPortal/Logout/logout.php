<?php 
	
	if(!isset($_SESSION)) {
		session_start(); 
	}
	unset($_SESSION['admin']);
	if (! isset ( $_SESSION ['admim'] ))
	{
		header ( "Location: ../Login/login.php" ) && die ();
	echo 'You have been logged out. <a href="Login/login.php">click here</a> to login';
	}
?>