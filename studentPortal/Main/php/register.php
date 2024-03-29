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
	<style>
		footer{
			position: absolute;
			right: 0;bottom: 0;left: 0;
		}
	</style>
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
		
		<div class="row" style=" font-size: 18px;">
		<span class="col l4 push-l4">Name:</span>
		<span class="col l4">
			<?php 
				echo $details_row["Name"];
			 ?>
		</span>
	</div>
	<div class="row" style=" font-size: 18px;">
		<span class="col l4 push-l4">Roll Number:</span>
		<span class="col l4">
			<?php 
				echo $username;
			 ?>
		</span>
	</div>
	<div class="row" style=" font-size: 18px;">
		<span class="col l4 push-l4">Branch:</span>
		<span class="col l4">
			<?php 
				echo $details_row["Branch"];
			 ?>
		</span>
	</div>
	<div class="row" style=" font-size: 18px;">
		<span class="col l4 push-l4">Date of Birth:</span>
		<span class="col l4">
			<?php 
				echo $details_row["DOB"];
			 ?>
		</span>
	</div>
	<div class="row" style=" font-size: 18px;">
		<span class="col l4 push-l4">Programme:</span>
		<span class="col l4">
			<?php 
				echo $details_row["Programme"];
			 ?>
		</span>
	</div>
	<div class="row" style=" font-size: 18px;">
		<span class="col l4 push-l4">Hostel:</span>
		<span class="col l4">
			<?php 
				echo $details_row["Hostel"];
			 ?>
		</span>
	</div>
	<div class="row" style=" font-size: 18px;">
		<span class="col l4 push-l4">Room No:</span>
		<span class="col l4">
			<?php 
				echo $details_row["Room"];
			 ?>
		</span>
	</div>
	<div class="row" style=" font-size: 18px;">
		<span class="col l4 push-l4">Phone:</span>
		<span class="col l4">
			<?php 
				echo $details_row["Phone"];
			 ?>
		</span>
	</div>
	<br><br>
	<?php 
		$sql = "SELECT * FROM mess_card A WHERE Rollno = '$username'";
		if (($result = $MYSQL_CONNECTION->query($sql))->num_rows > 0 ) 
		{
			$mess_details = $result->fetch_assoc();
			if ($mess_details["Update_mess"] == 1) 
			{
				?>
				<div class="row" style="font-size: 18px; color: #ff0000;">
					<div class="col" align="center">You have already registered for 
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
			<div class="row" style="font-size: 20px; font-weight: bold; text-align: center;">
				<div class="col">
					SELECT MESS
				</div>
			</div>
			<br>
				<form method="post" action="messcard.php" onsubmit="return confirm('Are you sure you want to register for this mess?');">
					<div class="row" style=" font-size: 18px; width: 100%;">
					<?php 
						$sql = "SELECT Name, Type FROM mess_info WHERE Remaining > 0";
						$result = $MYSQL_CONNECTION->query($sql);
						while($row = ($result->fetch_assoc())) 
						{
							$mess_name = $row["Name"];
							$mess_type = $row["Type"];
					?>
						<div class="col-lg-12" align="center">
							<p>
								<label>
			    					<input name="mess" type="radio" value=<?php echo $mess_name ?> />
			  						<span><?php echo $mess_name." - ".$mess_type ?></span>
			  					</label>
				  			</p>
			  			</div>
		  			</div>
		    			<?php } ?>
						<br><br>
						<div class="row" style="width:100%;">
							<div class="col-lg-12" align="center">
					<input class="col-lg-4 btn waves-effect waves-light" type="submit" value="REGISTER" name="register_button">
				</div>
			</div>
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
<br><br><br><br><br>
<?php include_once("{$_SERVER['DOCUMENT_ROOT']}/Includes/footer.php"); ?>
</body>
</html>


