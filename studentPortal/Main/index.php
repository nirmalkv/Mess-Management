<?php 
	// error_reporting(E_ALL);
	// ini_set('display_errors', '1');
	session_start();
	require_once("{$_SERVER['DOCUMENT_ROOT']}/Scripts/connection.php");
	require_once("{$_SERVER['DOCUMENT_ROOT']}/Scripts/checkLoggedOut.php");
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Student Portal</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
	<link rel="shortcut icon" href="img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="CodePixar">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
      <!--
      CSS
      ============================================= -->
      <link rel="stylesheet" href="css/linearicons.css">
      <link rel="stylesheet" href="css/font-awesome.min.css">
      <link rel="stylesheet" href="css/jquery.DonutWidget.min.css">
      <link rel="stylesheet" href="css/bootstrap.css">
      <link rel="stylesheet" href="css/owl.carousel.css">
      <link rel="stylesheet" href="css/main.css">
      	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
      	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> 

</head>
<body>
	<?php include_once("{$_SERVER['DOCUMENT_ROOT']}/Includes/header.php"); ?>
	<br><br><br>
    <section class="banner-area relative" id="home" data-parallax="scroll" data-image-src="images/NIT-Calicut.jpg" >
	
<div class="container">

	<div class="col l6">
		<div align="center">
			<h1>Student Portal</h1>
		</div>
	</div>
	<div class="col l4">
		<p style="font-weight: bold; text-align: center; font-size: 30px; font-family: 'Roboto', sans-serif;	">
			 STUDENT DETAILS
			<?php 
				$username = $_SESSION['Username'];
				$sql = "SELECT * FROM student_info WHERE Rollno = '$username'";
				$result = $MYSQL_CONNECTION->query($sql);
				$details_row = $result->fetch_assoc();
			 ?>
		</p>
	</div>
	<br>
	<div class="row" style="padding-left: 450px; font-size: 18px;">
		<div class="col-lg-3">Name:</div>
		<div class="col-lg-3">
			<?php 
				echo $details_row["Name"];
			 ?>
		</div>
	</div>
	<div class="row" style="padding-left: 450px; font-size: 18px;">
		<div class="col-lg-3">Roll No:</div>
		<div class="col-lg-3">
			<?php 
				echo $username;
			 ?>
		</div>
	</div>
	<div class="row"  style="padding-left: 450px; font-size: 18px;">
		<div class="col-lg-3">Branch:</div>
		<div class="col-lg-3">
			<?php 
				echo $details_row["Branch"];
			 ?>
		</div>
	</div>
	<div class="row" style="padding-left: 450px; font-size: 18px;">
		<div class="col-lg-3">Date of Birth:</div>
		<div class="col-lg-3">
			<?php 
				echo $details_row["DOB"];
			 ?>
		</div>
	</div>
	<div class="row" style="padding-left: 450px; font-size: 18px;">
		<div class="col-lg-3">Programme:</div>
		<div class="col-lg-3">
			<?php 
				echo $details_row["Programme"];
			 ?>
		</div>
	</div>
	<div class="row" style="padding-left: 450px; font-size: 18px;">
		<div class="col-lg-3">Hostel:</div>
		<div class="col-lg-3">
			<?php 
				echo $details_row["Hostel"];
			 ?>
		</div>
	</div>
	<div class="row" style="padding-left: 450px; font-size: 18px;">
		<div class="col-lg-3">Room No:</div>
		<div class="col-lg-3">
			<?php 
				echo $details_row["Room"];
			 ?>
		</div>
	</div>
	<div class="row" style="padding-left: 450px; font-size: 18px;">
		<div class="col-lg-3">Phone:</div>
		<div class="col-lg-3">
			<?php 
				echo $details_row["Phone"];
			 ?>
		</div>
	</div>
	<br><br>
	<div class="row" style="padding-left: 450px;">
		<div class="col-lg-3" >
			<form method="post">
				<input class="waves-effect waves-light btn" type="submit" value="Check Dues" name="Dues">
			</form>
		</div>
		<div class="col-lg-3" style="font-size: 18px" >
			<?php 
				if (isset($_POST['Dues'])) {
					$username = $_SESSION['Username'];
					$sql = "SELECT Due FROM due_list WHERE Rollno = '$username'";
					$result = $MYSQL_CONNECTION->query($sql);
					$Due_out = $result->fetch_assoc();
					$due = $Due_out["Due"];
					echo "Rs ", $due;

				}	
			 ?>
		</div>
	</div>
	<div class="row" style="padding-left: 450px;">
		<div class="col-lg-12" style="font-size: 18px;">
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
		</div>
	</div>
			
			<div class="row" style="padding-left: 450px;">
				<div class="col-lg-4">
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
	<br><br><br>
	</section>
	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
<!-- start footer Area -->    
      <?php include_once("{$_SERVER['DOCUMENT_ROOT']}/Includes/footer.php"); ?>
      <!-- End footer Area -->   
</body>
</html>