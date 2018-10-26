<?php
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	require_once("{$_SERVER['DOCUMENT_ROOT']}/Scripts/checkLoggedIn.php");
	require_once("{$_SERVER['DOCUMENT_ROOT']}/Scripts/connection.php");
	if(isset($_POST['username']) && isset($_POST['password']))
	{
		$username = $MYSQL_CONNECTION->real_escape_string(trim($_POST['username']));
		$password = $MYSQL_CONNECTION->real_escape_string(trim($_POST['password']));
		$query = $MYSQL_CONNECTION->prepare("SELECT student_user.Rollno,student_user.Password FROM student_user WHERE student_user.Rollno=?");
		$query->bind_param('s',$username);
		$query->execute();
		$query->store_result();
		$query->bind_result($DatabaseUsername,$DatabasePassword);

		$query->fetch();

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
		echo '<script>window.location.replace("../login.php")</script>';
	}
 ?>