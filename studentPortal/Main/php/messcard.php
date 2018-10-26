<?php 
	session_start(); 
	include_once("{$_SERVER['DOCUMENT_ROOT']}/Scripts/checkLoggedOut.php");
	require_once("{$_SERVER['DOCUMENT_ROOT']}/Scripts/connection.php");
	
	$username = $_SESSION['Username'];
	$sql = "SELECT * FROM student_info WHERE Rollno = '$username'";
	$result = $MYSQL_CONNECTION->query($sql);
	$details_row = $result->fetch_assoc();
	echo $_POST["mess"];
	$_SESSION['Mess'] = $_POST["mess"];
	$new_mess = $_SESSION['Mess'];
	$sql = "SELECT * FROM mess_card WHERE Rollno = '$username'";
	$month = $_SESSION['Month'];
	$messcard_no = $username.strtoupper($month).date("Y");
	if (($result = $MYSQL_CONNECTION->query($sql))->num_rows > 0 ) {
	
		$mess_details = $result->fetch_assoc();
		$currmess_card = $mess_details["Curr_messcard"];
		$sql = "UPDATE mess_card SET Prev_messcard = '$currmess_card' WHERE Rollno = '$username'";
		$MYSQL_CONNECTION->query($sql);
		$sql = "UPDATE mess_card SET Curr_messcard = '$messcard_no' WHERE Rollno = '$username'";
		$MYSQL_CONNECTION->query($sql);
		$currmess = $mess_details["Curr_mess"];
		$sql = "UPDATE mess_card SET Prev_mess = '$currmess' WHERE Rollno = '$username'";
		$MYSQL_CONNECTION->query($sql);
		$sql = "UPDATE mess_card SET Curr_mess = '$new_mess' WHERE Rollno = '$username'";
		$MYSQL_CONNECTION->query($sql);
		$sql = "UPDATE mess_card SET Month = '$month' WHERE Rollno = '$username'";
		$MYSQL_CONNECTION->query($sql);
		$sql = "UPDATE mess_card SET Update_mess = 1 WHERE Rollno = '$username'";
		$MYSQL_CONNECTION->query($sql);
	}
	else
	{
		$sql = "INSERT INTO mess_card(Curr_messcard, Rollno, Curr_mess, Month, Update_mess) VALUES ('$messcard_no', '$username', '$new_mess', '$month', 0)";
		$MYSQL_CONNECTION->query($sql);
		echo $MYSQL_CONNECTION->error;
		}

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>
 		Mess Card Issued
 	</title>
 	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
 	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<link rel="stylesheet" type="text/css" href="../css/styles.css">
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
			<h1>Mess Card</h1>
		</div>
	</div>
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
		<div class="col-lg-3">Month:</div>
		<div class="col-lg-3">
			<?php 
				echo $month;
			 ?>
		</div>
	</div>
	<br><br>
		<div class="row" style="padding-left: 450px; font-size: 20px;">
			<div class="col-lg-3">Registered Mess:</div>
			<div class="col-lg-3" style="font-size: 30px; font-weight: bold;">
				<?php 
					
    					echo $_SESSION['Mess'];
    			
			 ?>
			</div>
		</div>
		<div class="row" style="padding-left: 450px; font-size: 20px;">
			<div class="col-lg-3">Mess Card Number:</div>
			<div class="col-lg-3" style="font-size: 30px; font-weight: bold;">
				<?php 
					
    					echo $messcard_no;
    			
			 ?>
			</div>
		</div>
		<div class="row" style="padding-left: 450px; font-size: 20px;">
			
		<p style="font-size: 18px;">Click the button to print your mess card</p>
	</div>
		<div class="row" style="padding-left: 450px; font-size: 18px;" align="center">
			<button class="btn waves-effect waves-light" onclick="myFunction()">Print mess card</button>

		<script>
			function myFunction() {
    		window.print();
		}
		</script>
		</div>
		</div>
</section>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php include_once("{$_SERVER['DOCUMENT_ROOT']}/Includes/footer.php"); ?>
 </body>
 </html>
