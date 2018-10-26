<?php
	// error_reporting(E_ALL);
	// ini_set('display_errors', '1');
	session_start(); 
	require_once("{$_SERVER['DOCUMENT_ROOT']}/Scripts/connection.php");
	require_once("{$_SERVER['DOCUMENT_ROOT']}/Scripts/checkLoggedOut.php");
	
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>
		STUDENT PORTAL
	</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
<div class="container">
	<div class="col l6">
		<div class="heading">
			Welcome to Student Portal
		</div>
	</div>
	<div class="col l4">
		<div class="heading2">
			Student Details
			<?php 
				$username = $_SESSION['Username'];
				$sql = "SELECT * FROM student_info WHERE Rollno = '$username'";
				$result = $MYSQL_CONNECTION->query($sql);
				$details_row = $result->fetch_assoc();
			 ?>
		</div>
	</div>
	<div class="row">
		<div class="col l3">Name:</div>
		<div class="col l3">
			<?php 
				echo $details_row["Name"];
			 ?>
		</div>
		<div class="col l3">Branch:</div>
		<div class="col l3">
			<?php 
				echo $details_row["Branch"];
			 ?>
		</div>
		<div class="col l3">Date of Birth:</div>
		<div class="col l3">
			<?php 
				echo $details_row["DOB"];
			 ?>
		</div>
		<div class="col l3">Programme:</div>
		<div class="col l3">
			<?php 
				echo $details_row["Programme"];
			 ?>
		</div>
		<div class="col l3">Hostel:</div>
		<div class="col l3">
			<?php 
				echo $details_row["Hostel"];
			 ?>
		</div>
		<div class="col l3">Room No:</div>
		<div class="col l3">
			<?php 
				echo $details_row["Room"];
			 ?>
		</div>
		<div class="col l3">Phone:</div>
		<div class="col l3">
			<?php 
				echo $details_row["Phone"];
			 ?>
		</div>
	</div>
	<div class="row">
		<div class="col l2">
			<form method="post">
				<input class="waves-effect waves-light btn" type="submit" value="Check Dues" name="Dues">
			</form>
		</div>
		<div class="col l2">
			<?php 
				if (isset($_POST['Dues'])) {
					$username = $_SESSION['Username'];
					$sql = "SELECT Due FROM due_list WHERE Rollno = '$username'";
					$result = $MYSQL_CONNECTION->query($sql);
					$Due_out = $result->fetch_assoc();
					$due = $Due_out["Due"];
					echo $due;

				}	
			 ?>
		</div>
	</div>
	<div class="row">
		<div class="col l6">
			<?php 
			if (isset($_POST['Dues'])) {

				if($due > 0)
				{
					echo "You are not eligible to register for any mess. Poyi fees adakk myre";
				}
				else
				{
					echo "You are eligible to register for a mess";
			?>
			<div class="row">
				<div class="col l3">
					<form method="post" action="php/register.php">
						<input class="waves-effect waves-light btn" type="submit" value="Register for Mess" name="Mess_Register">
					</form>
				</div>
			</div>
			<?php
				}
			}
			 ?>
		</div>
	 </div>
</div>
</body>
</html>
