<?php
if(!isset($_SESSION)) {
	session_start(); 
}
require_once ("../Scripts/connection.php");
header ( 'Content-type: text/html; charset=utf-8' );
echo <<<CONTENT
<!DOCTYPE html>
<html>
  <head>
    <title>Dues Update</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="css/main.css" rel="stylesheet" media="screen">
CONTENT;
if (! isset ( $_SESSION ['admin'] ))
	header ( 'Location: ../Login/login.php' ) && die ();
?>
</head>
<body>

  
  <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">OFFICIAL PORTAL</a>
    </div>
	<div style="float:right">
    <ul class="nav navbar-nav " >
      <li><a href="index.php">Home</a></li>
      <li><a href="../Logout/logout.php">Logout</a></li>
      
    </ul>
	</div>
  </div>
</nav>
<h2 align="center"> Update Dues</h2>
<br>
<br>
<?php
if(!isset($_POST["rollno"]))
{?>
<div id="form-update-container">
		<!--<form id="form-update" class="box" action="" method="POST">
			<div class="input-group" style="padding: 10px 0 10px 0;" background="img/light.jpg">
				<span class="input-group-addon">Roll No</span> <input class="span2" name="rollno"
					id="rollno" type="text" placeholder="ROLLNo">
			</div>
			<div class="input-group" style="padding: 10px 0 10px 0;">
			<span class="input-group-addon">New Dues</span>
			<input class="span2" name="dues"
					id="dues" type="text" placeholder="New Due">
			<br>
			</div>
			<button class="btn btn-large btn-primary centerh"
				style="width: 30%;" id="btn-dues" type="submit">Submit</button>
		</form>-->
		
		
		<form id="form-update" action="" method="POST">
  <div class="form-group">
    <label style="margin-left: 30%;">Roll Number</label>
    <input style="width: 35%; margin-left: 30%;" type="text" class="form-control" name="rollno" id="rolno" placeholder="Enter Rollno">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" style="margin-left: 30%;">New Dues</label>
    <input style="width: 35%; margin-left: 30%;" type="text" class="form-control" name="dues" id="dues" placeholder="new dues">
  </div>
  <button style="margin-left: 30%;" type="submit" class="btn btn-primary">Submit</button>
</form>
	</div>
	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
<?php
}
else
{
	require_once ("../Scripts/connection.php");
	$roll = $_POST ['rollno'];
	$due = $_POST ['dues'];
	$sql1="SELECT * from due_list WHERE Rollno='$roll'";
	$sql = "UPDATE due_list SET Due='$due' WHERE Rollno='$roll'";
	echo ($sql);
	$res = $mysqli->query($sql1);
	if ($mysqli->query ( $sql )== TRUE && $res->num_rows>0 ) {
		echo "<script>
		alert('Update Success!! ');
		window.location.href='index.php';
		</script>";
	} else {
		echo "<script>
		alert('Update Failed!! Try again');
		window.location.href='update.php';
	</script>";
	}
}
