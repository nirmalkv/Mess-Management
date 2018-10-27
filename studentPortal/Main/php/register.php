<?php
	session_start(); 
	include_once("{$_SERVER['DOCUMENT_ROOT']}/Scripts/checkLoggedOut.php");
	require_once("{$_SERVER['DOCUMENT_ROOT']}/Scripts/connection.php");
	
	$username = $_SESSION['Username'];
	$sql = "SELECT * FROM student_info WHERE Rollno = '$username'";
	$result = $MYSQL_CONNECTION->query($sql);
	$details_row = $result->fetch_assoc();

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>
		REGISTER FOR MESS
	</title>
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
			<h1>Mess Registration</h1>
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
	<br><br>
	<?php 
		$sql = "SELECT * FROM mess_card WHERE Rollno = '$username'";
		if (($result = $MYSQL_CONNECTION->query($sql))->num_rows > 0 ) {
			$mess_details = $result->fetch_assoc();
			if ($mess_details["Update_mess"] == 1) {
				?>
				<div class="row" style="padding-left: 450px; font-size: 18px;">
				<div class="col-lg-10">You have already registered for 
					<?php 
						echo " \"",$mess_details["Curr_mess"],"\" Mess for this month. ";
					 ?>
					 You can't register again for this month.
				</div>
			</div>
				<?php
			}
			else{
				?>
				<div class="row" style="padding-left: 450px; font-size: 20px; font-weight: bold;">
			<div class="col-lg-3">
				SELECT MESS
			</div>

		</div>
		<div class="row" style="padding-left: 450px; font-size: 18px;">
			<form method="post" action="messcard.php" onsubmit="return confirm('Are you sure you want to register for this mess?');">
				<?php 
					$sql = "SELECT Name FROM mess_info WHERE Remaining > 0";
					$result = $MYSQL_CONNECTION->query($sql);
					while($row = $result->fetch_assoc()) {
						$mess_name = $row["Name"];
				?>
				<br>
					<p>
      					<label>
        					<input name="mess" type="radio" value = <?php echo $mess_name ?> />
        						<span><?php echo $mess_name ?></span>
      					</label>
   					 </p>
      
        			<?php
    				}
    				?>
    				<br><br>
				<input class="btn waves-effect waves-light" type="submit" value="REGISTER" name="register_button" >
			</form>
		</div>
    				<?php
			}
		}
		else{
		?>
			<div class="row" style="padding-left: 450px; font-size: 20px; font-weight: bold;">
			<div class="col-lg-3">
				SELECT MESS
			</div>

		</div>
		<div class="row" style="padding-left: 450px; font-size: 18px;">
			<form method="post" action="messcard.php" onsubmit="return confirm('Are you sure you want to register for this mess?');">
				<?php 
					$sql = "SELECT Name FROM mess_info WHERE Remaining > 0";
					$result = $MYSQL_CONNECTION->query($sql);
					while($row = $result->fetch_assoc()) {
						$mess_name = $row["Name"];
				?>
				<br>
					<p>
      					<label>
        					<input name="mess" type="radio" value = <?php echo $mess_name ?> />
        						<span><?php echo $mess_name ?></span>
      					</label>
   					 </p>
      	<br><br>
				<input class="btn waves-effect waves-light" type="submit" value="REGISTER" name="register_button" >
			</form>
        			<?php
    				}
		}
	 ?>
		
    				
    				
			<?php 
				$_SESSION['Month'] = date('M',strtotime('first day of +1 month'));

			 ?>		
			
		</div>
</div>
</section>
<br><br><br><br><br><br><br><br><br><br>
<?php include_once("{$_SERVER['DOCUMENT_ROOT']}/Includes/footer.php"); ?>
</body>
</html>


