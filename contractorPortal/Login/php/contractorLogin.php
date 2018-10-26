<?php
	// error_reporting(E_ALL);
	// ini_set('display_errors', '1');
	require_once("{$_SERVER['DOCUMENT_ROOT']}/Scripts/checkLoggedIn.php");
	require_once("{$_SERVER['DOCUMENT_ROOT']}/Scripts/connection.php");
	// echo "Hello World";
	echo '<script>console.log("Here");</script>';
	if(isset($_POST['username']) && isset($_POST['password']))
	{
		echo '<script>console.log("POST");</script>';
		$username = $MYSQL_CONNECTION->real_escape_string(trim($_POST['username']));
		$password = $MYSQL_CONNECTION->real_escape_string(trim($_POST['password']));
		$query = $MYSQL_CONNECTION->prepare("SELECT mess_user.ContractorId,mess_user.Password FROM mess_user WHERE mess_user.ContractorId=?");
		$query->bind_param('s',$username);
		$query->execute();
		$query->store_result();
		$query->bind_result($DatabaseUsername,$DatabasePassword);
		$query->fetch();

		echo '<script>console.log("'.password_verify($password,$DatabasePassword).'");</script>';

		if(!password_verify($password,$DatabasePassword))
		{
			$query->close();
			$MYSQL_CONNECTION->close();
			echo '<script>window.location.replace("../login.php")</script>';
		}
		else
		{
			$query->close();
			$MYSQL_CONNECTION->close();
			$_SESSION['LoggedIn'] = true;
			$_SESSION['Username'] = $username;
			echo '<script>window.location.replace("../../Main/index.php")</script>';
		}
	}
	else
	{
		// echo '<script>console.log("Here");</script>';
		echo '<script>window.location.replace("../login.php")</script>';
	}
 ?>
