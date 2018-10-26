<?php 
	// error_reporting(E_ALL);
	// ini_set('display_errors', '1');
	session_start();

	require_once("{$_SERVER['DOCUMENT_ROOT']}/Scripts/checkLoggedIn.php");
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Student Login</title>
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
</head>
<body>
	<header class="default-header">
        <nav class="navbar navbar-expand-lg  navbar-light">
          <div class="container">
              <a class="navbar-brand" href="index.html">
                <img src="images/nitc-logo.jpg" alt="">
              </a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse justify-content-end align-items-center" id="navbarSupportedContent">
                <ul class="navbar-nav">
                <li><a href="#home">Home</a></li>
                <li><a href="meet-the-team.html">Contact Us</a></li>
                <li><a href="#logout">LOGOUT</a></li>                 
                </ul>
              </div>            
          </div>
        </nav>
      </header>
    <section class="banner-area relative" id="home" data-parallax="scroll" data-image-src="images/NIT-Calicut.jpg">
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/NIT-Calicut.jpg');">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="php/contractorLogin.php" method="POST">
					<!-- <span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span> -->

					<span class="login100-form-title p-b-34 p-t-27">
						Contractor Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type=text name=username placeholder="Username" required">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type=password name=password placeholder="Password" required">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							Remember me
						</label>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type=submit>
							Login
						</button>
					</div>

					
				</form>
			</div>
		</div>
	</div>
	
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
      <footer style="background-color: #3c3c3c; padding: 25px; ">
        <div class="container">
          

          <div class="row">
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            <p class="col-lg-8 col-sm-12 footer-text m-0 text-white">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Developed by Faris - Dheeraj - Ameen - Nirmal
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            
          </div>
        </div>
      </footer>
      <!-- End footer Area -->   
</body>
</html>