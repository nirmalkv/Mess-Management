<?php
if(!isset($_SESSION)) {
	session_start(); 
}
require_once ("../Scripts/connection.php");
header ( 'Content-type: text/html; charset=utf-8' );
echo '
<!DOCTYPE html>
<html>
  <head>
    <title>Mess :Admin_login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="css/main.css" rel="stylesheet" media="screen">
';
if (! isset ( $_SESSION ['admin'] ))
	header ( 'Location: ../Login/login.php' ) && die ();

?>

<html>
<head>
<style>
h1 {
	text-align: center;
}

p {
	text-align: center;
}
</style>
<title>Mess Oficial</title>
<script src="../js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
</head>

<body background="/img/web.jpg">
	<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">OFFICIAL PORTAL</a>
    </div>
	<div style="float:right">
    <ul class="nav navbar-nav " >
      <li class="active"><a href="#">Home</a></li>
      <li><a href="../Logout/logout.php">Logout</a></li>
      
    </ul>
	</div>
  </div>
</nav>
	
	<h1 align=center>ONLINE MESS MANAGEMENT SYSTEM</h1>
	<br>
  <h3 align=center>Hostal Official's Portal</h3>
  <br>
  <div class="col-sm-3" align="left" style="margin-left: 4%;">
	<a href="update.php"><button type="button" class="btn btn-info active" style="width: 100%" >
			<h4 style="color: black">Update dues</h4>
		</button></a>
	<br>
	<br>
	
	<a href="upload.php"><button type="button" class="btn btn-info active" style="width: 100%" >
			<h4 style="color: black">Upload Payment Info</h4>
		</button></a>
	<br>
	<br>
	<a href="search.php"><button type="button" class="btn btn-info active" style="width: 100%">
			<h4 style="color: black">Search Student Details</h4>
		</button></a>
	<br>
	<br>
	</div>
	<div class="col-sm-4 text-left" style="margin-left:40px"> 
      <h1>Welcome</h1>
      <p>NITC HOSTEL OFFICIAL HOME PAGE</p>
   
    </div>
	<div class="col-sm-3" align="right" style="margin-left: 4%;">
	<a href="updatestud.php"><button type="button" class="btn btn-info active" style="width: 100%">
	<h4 style="color: black">Update Details Of A Student</h4>
		</button></a>
	<br>
	<br>
	<a href="download.php"><button type="button" class="btn btn-info active" style="width: 100%" >
		<h4 style="color: black">Download Duelist from A Mess</h4>
		</button></a>
	<br>
	<br>
	<a href="notreg.php"><button type="button" class="btn btn-info active" style="width: 100%" >
	<h4 style="color: black">Students Not Registered for Mess</h4>
		</button></a>
	<br>
	<br>
	</div>
	<div class="col-sm-10" align="center" style="margin-left: 7%">
	<a href="view_all.php"><button type="button" class="btn btn-info active" style="width: 50%">
			<h4 style="color: black">Show Complete Details Of All Students</h4>
		</button></a>
	<br>
	</div>
	
	
	
	
</body>
</html>
