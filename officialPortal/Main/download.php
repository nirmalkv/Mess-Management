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
<h2 align="center"> Download Mess Dues</h2>
<br>
<br>
<?php
if(!isset($_POST["month"]))
{?>
<div id="form-update-container">
		<!--<form id="form-update" class="box" action="" method="POST">
		<div class="input-group" style="padding: 10px 0 10px 0;" background="img/light.jpg">
				<span class="input-group-addon">MESS</span> <input class="span2" name="mess"
					id="mess" type="text" placeholder="mess">
		</div>
		<div class="input-group" style="padding: 10px 0 10px 0;" background="img/light.jpg">
				<span class="input-group-addon">Month</span> 
				<input type="month" id="month" name="month" value="2018-05">
		</div>
		<button class="btn btn-large btn-primary centerh"
				style="width: 100px;" id="btn-dues" type="submit">Download</button>
		</form>-->
		<form id="form-update" action="" method="POST">
  <div class="form-group">
    <label style="margin-left: 30%;">Enter Mess</label>
    <input style="width: 35%; margin-left: 30%;" type="text" class="form-control" name="mess" id="mess" placeholder="Mess">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" style="margin-left: 30%;">Month</label>
    <input style="width: 35%; margin-left: 30%;" class="form-control" type="date" id="month" name="month" value="2018-05">
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
	$monthno = array(
		"January" => "1",
		"February" => "2",
		"March" => "3",
		"April" => "4",
		"May" => "5",
		"June" => "6",
		"July" => "7",
		"August" => "8",
		"September" => "9",
		"October" => "10",
		"November" => "11",
		"December" => "12",
	);
	$mess = $_POST ['mess'];
	$date = $_POST ['month'];
	$year = date('Y', strtotime($date));
	$month = $monthno[date('F', strtotime($date))];
	echo $month;
	$query = "SELECT Filename,File FROM due_files WHERE Month='$month' and Mess='$mess' and Year='$year'";
	if (! $result = $mysqli->query ( $query )) {
		die ( "Error" . $mysqli->error );
	}
	if ($result->num_rows == 0){
    echo "<script>console.log('".$year.$month."');
		alert('Cannot Find date...Try again');
		window.location.href='download.php';
		</script>";
	
	}
	else
	{
		list($Filename,$File) = mysqli_fetch_array($result);
		//header("Content-length: $size");
		header("Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
		header("Content-Disposition: attachment; filename=$Filename");
		ob_clean();
		flush();
		echo $File && header('Location: index.php');
		header ( 'Location: index.php' ) && die ();
		
	}
}
	
?>
		