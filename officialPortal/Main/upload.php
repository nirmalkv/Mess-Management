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
    <title>Upload Payment</title>
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
      <li><a href="../Logout/logout.php">logout</a></li>
      
    </ul>
	</div>
  </div>
</nav>
<h2 align="center"> Upload  Payment</h2>
<br>
<br>
<?php
if(!isset($_POST["rollno"]))
{?>
<div id="form-update-container">
		<!--<form id="form-update" class="box" action="" method="POST">
			<div class="input-group" style="padding: 10px 0 10px 0;">
				<span class="input-group-addon">Roll No</span> <input class="span2" name="rollno"
					id="rollno" type="text" placeholder="ROLLNo">
			</div>
			<div class="input-group" style="padding: 10px 0 10px 0;">
			<span class="input-group-addon">Amount Payed</span> <input class="span2" name="payment"
					id="payment" type="text" placeholder="Amount Payed">
			</div>
			<br>
			<button class="btn btn-large btn-primary centerh"
				style="width: 100px;" id="btn-dues" type="submit">Submit</button>
		</form>-->
	<form id="form-update" action="" method="POST">
  <div class="form-group">
    <label style="margin-left: 30%;">Roll Number</label>
    <input style="width: 35%; margin-left: 30%;" type="text" class="form-control" name="rollno" id="rolno" placeholder="Enter Rollno">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" style="margin-left: 30%;">Amount Payed</label>
    <input style="width: 35%; margin-left: 30%;" type="text" class="form-control" name="payment" id="payment" placeholder="Amount Payed">
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
	$payed = $_POST ['payment'];
	$sql1="SELECT Due FROM due_list WHERE Rollno='$roll'";
	if (! $result1 = $mysqli->query ( $sql1 )) {
		die ( "Error" . $mysqli->error );
	}
	if ($result1->num_rows == 0){
    echo "no data here";
	header ( 'Location: upload.php' );
    die();
	}
	else{
	$row = $result1->fetch_assoc();
	$last_due=$row["Due"];
	$newdue=$last_due - $payed;
	$date=date("Y/m/d");
	$sq1="SELECT * FROM due_list WHERE Rollno='$roll'";
	$res=$mysqli->query($sql1);
	$sql = "UPDATE due_list SET Due='$newdue',Date='$date',Amountpaid='$payed' WHERE Rollno='$roll'";
	echo ($sql);
	if ($mysqli->query ( $sql )== TRUE && $res->num_rows>0) {
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
}
