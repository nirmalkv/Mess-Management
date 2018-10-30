<?php 
	session_start();
	if(isset($_SESSION['FirstLogin']) && $_SESSION['FirstLogin']==1)
	{
		echo '<script>window.location.replace("http://'.$_SERVER['SERVER_NAME'].'/Main/ChangePassword.php");</script>';
	}
 ?>