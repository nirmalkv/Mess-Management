<?php 
	session_start();
	unset($_SESSION['Username']);
	$_SESSION['LoggedIn'] = false;
	unset($_SESSION['LoggedIn']);
	session_unset();
	session_destroy();
	echo '<script>window.location.replace("../Login/login.php")</script>';
 ?>
