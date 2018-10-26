<?php 
	session_start();
	if(isset($_SESSION['LoggedIn']) && $_SESSION['LoggedIn']==true)
	{
		echo '<script>window.location.replace("http://'.$_SERVER['SERVER_NAME'].'/Main/index.php");</script>';
	}
 ?>