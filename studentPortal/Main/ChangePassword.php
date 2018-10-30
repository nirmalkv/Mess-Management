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
	<style>
		footer{
			position: absolute;
 			right:0;bottom:0;left: 0;
		}
	</style>
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
			<h1>STUDENT PORTAL</h1>
		</div>
	</div>
	<div class="col l4">
		<p style="font-weight: bold; text-align: center; font-size: 30px; font-family: 'Roboto', sans-serif;	">
			 CHANGE PASSWORD
		</p>
	</div>
	<br>
	<div class="container" style="align-content: center; width: 50%;">
		<form action="" method=POST>
			<label for="newpass" value="New Password">New Password</label>
			<input type="password" name="newpass" required />
			<label for="confirm-newpass" value= "Confirm Password">Confirm Password</label>
			<input type="password" name="confirm-newpass" required />
			<div id="not-equal" style="color: #ff0000;"></div>
			<button class="waves-effect waves-light btn" type="submit">Submit</button>
		</form>
	</div>
	<?php 
		if(isset($_POST['newpass']) && isset($_POST['confirm-newpass']))
		{
			$newpass = $MYSQL_CONNECTION->real_escape_string(trim($_POST['newpass']));
			$confirmpass = $MYSQL_CONNECTION->real_escape_string(trim($_POST['confirm-newpass']));
			if($newpass != $confirmpass)
			{
				echo '<script>window.location.replace("http://student.messregistration.com/Main/ChangePassword.php?Error");</script>';
			}
			else
			{
				$hashpass = password_hash($newpass,PASSWORD_BCRYPT);
				$sql = "UPDATE student_user SET student_user.Password='{$hashpass}', student_user.FirstLogin=0 WHERE student_user.Rollno='{$_SESSION['Username']}'";
				$result = $MYSQL_CONNECTION->query($sql);
				$_SESSION['FirstLogin'] = 0;
				echo '<script>window.location.replace("http://student.messregistration.com/Main/index.php")</script>';
			}
		}
	 ?>
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
      <?php 
      if(isset($_GET['Error'])){
      	echo '<script>$("#not-equal").html("Passwords Don\'t Match");</script>';
      } ?>
</body>
</html>