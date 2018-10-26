<?php 
	// error_reporting(E_ALL);
	// ini_set('display_errors', '1');
	include_once("{$_SERVER['DOCUMENT_ROOT']}/Config/config.php");
	$MYSQL_CONNECTION = new mysqli($dbHOST,$dbUSER,$dbPASS,$database);
	if($MYSQL_CONNECTION->connect_error)
	{
		die("Connection failed: ". $MYSQL_CONNECTION->connect_error);
	}

	// $username = "faris";
	// $pass = "faris";
	// $password = password_hash($pass,PASSWORD_BCRYPT);

	// $querystring = "INSERT INTO student_user(Rollno,Password) VALUES ('".$username."','".$password."')";
	// echo $querystring;
	// echo "<br>";
	// $res = $MYSQL_CONNECTION->query($querystring);
	// $querystring = "SELECT * FROM STUDENT_USER WHERE Username='".$username."'";
	// echo "<br>";
	// echo $querystring;
	// $res2 = $MYSQL_CONNECTION->query($querystring);
	// if($res2 === FALSE)
	// 	echo "YES";
	// $MYSQL_CONNECTION->close();
 ?>
