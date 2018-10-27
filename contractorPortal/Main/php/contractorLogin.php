<?php
	require_once("{$_SERVER['DOCUMENT_ROOT']}/Scripts/checkLoggedIn.php");
	require_once("{$_SERVER['DOCUMENT_ROOT']}/Scripts/connection.php");
	if(isset($_POST['username']) && isset($_POST['password']))
	{
		$username = $MYSQL_CONNECTION->real_escape_string(trim($_POST['username']));
		$password = $MYSQL_CONNECTION->real_escape_string(trim($_POST['password']));
		$query = $MYSQL_CONNECTION->prepare("SELECT mess_user.ContractorId,mess_user.Password FROM mess_user WHERE mess_user.Rollno=?");
		$query->bind_param('s',$username);
		$query->execute();
		$query->store_result();
		$query->bind_result($DatabaseUsername,$DatabasePassword);

		$query->fetch();

		if(!password_verify($password,$DatabasePassword))
		{
			$query->close();
			$MYSQL_CONNECTION->close();
			echo '<script>window.location.replace("../index.php")</script>';
		}
		else
		{
			$query->close();
			$MYSQL_CONNECTION->close();
			$_SESSION['LoggedIn'] = true;
			$_SESSION['Username'] = $username;
			echo '<script>window.location.replace("../../Main/contractorPortal.html")</script>';
		}
	}
	else
	{
		echo '<script>window.location.replace("../index.php")</script>';
	}
 ?>