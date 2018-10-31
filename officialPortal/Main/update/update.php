<?php
if(!isset($_SESSION)) {
	session_start(); 
}
require_once ("../../Scripts/connection.php");
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
	header ( 'Location: ../../Login/login.php' ) && die ();
?>
</head>
<body>

  
  <header style="height: 10%; background-color: rgba(32, 169, 112, 0.14); text-align: center;">
		<div class="left btn btn-default" id="homeheader" style="float:left; margin-left: 20px; margin-top: 15px; "><a href="../index.php"><h4>HOME</h4></a></div>
		<div class="right btn btn-default" id="logoutheader" style="float: right; float: right;margin-right: 20px;margin-top: 15px;"><a href="../../Logout/logout.php"><h4>LOGOUT</h4></a></div>
	</header>
<h2 align="center"> Update Dues</h2>
<?php
if(!isset($_POST["rollno"]))
{?>
<div id="form-update-container">
		<form id="form-update" class="box" action="" method="POST">
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
				style="width: 100px;" id="btn-dues" type="submit">Submit</button>
		</form>
	</div>
	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
<?php
}
else
{
	require_once ("../../Scripts/connection.php");
	$roll = $_POST ['rollno'];
	$due = $_POST ['dues'];
	$sql1="SELECT * from due_list WHERE Rollno='$roll'";
	$sql = "UPDATE due_list SET Due='$due' WHERE Rollno='$roll'";
	echo ($sql);
	$res = $mysqli->query($sql1);
	if ($mysqli->query ( $sql )== TRUE && $res->num_rows>0 ) {
		echo "<script>
		alert('Update Success!! ');
		window.location.href='../index.php';
		</script>";
	} else {
		echo "<script>
		alert('Update Failed!! Try again');
		window.location.href='update.php';
	</script>";
	}
}
