<?php
	session_start();
	require_once("{$_SERVER['DOCUMENT_ROOT']}/Scripts/connection.php");
	require_once("{$_SERVER['DOCUMENT_ROOT']}/Scripts/checkLoggedOut.php"); 
				if (isset($_POST['rollno'])) {
					$username = $MYSQL_CONNECTION->real_escape_string(trim($_POST['rollno']));
					$sql = "SELECT Due FROM due_list WHERE Rollno = '$username'";
					$result = $MYSQL_CONNECTION->query($sql);
					$Due_out = $result->fetch_assoc();
					$due = $Due_out["Due"];
					echo $due;

				}
?>
