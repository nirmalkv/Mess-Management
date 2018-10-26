<?php 
	// error_reporting(E_ALL);
	// ini_set('display_errors', '1');
	session_start();

	require_once("{$_SERVER['DOCUMENT_ROOT']}/Scripts/checkLoggedIn.php");
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Mess Registration | Student Portal</title>
</head>
<body>
	<form action="php/studentLogin.php" method="POST">
		<input type=text name=username placeholder="Username" required/>
		<input type=password name=password placeholder="Password" required/>
		<button type=submit>Log In</button>
	</form>
</body>
</html>