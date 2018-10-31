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
    <title>Search full Student details</title>
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
<h2 align="center"> UPDATE STUDENT DETAILS</h2>
<br>
<br>

<?php
if(!isset($_POST["rollno"]))
{?>
<div id="form-search-container">
		<form id="form-search" action="" method="POST">
			<div class="form-group">
    <label style="margin-left: 30%;">Roll Number</label>
    <input style="width: 35%; margin-left: 30%;" type="text" class="form-control" name="rollno" id="rolno" placeholder="Enter Rollno">
    
  </div>
			<br>
			<button class="btn btn-large btn-primary centerh"
				style="width: 100px; margin-left: 100px;" id="btn-dues" type="submit">Submit</button>
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
	$_SESSION["rollno"]=$roll;
	$query="SELECT * from due_list WHERE Rollno='$roll'";
	$query1="SELECT * from student_info WHERE Rollno='$roll'";
	$query2="SELECT * from mess_card WHERE Rollno='$roll'";
	if (! $result = $mysqli->query ( $query )) {
		die ( "Error" . $mysqli->error );
	}
	if (! $result1 = $mysqli->query ( $query1 )) {
		die ( "Error" . $mysqli->error );
	}
	if (! $result2 = $mysqli->query ( $query2 )) {
		die ( "Error" . $mysqli->error );
	}
	if ($result->num_rows == 0 || $result1->num_rows == 0 ||$result2->num_rows==0){
    echo "<script>
		alert('Roll No Cannot Be Found!! ');
		window.location.href='updatestud.php';
		</script>";
	}
	else{
		$row = $result->fetch_assoc();
		$row1 = $result1->fetch_assoc();
		$row2 = $result2->fetch_assoc();
		?>
	<div id="form-updatestud-container">
		<form id="form-updatestud" class="box" action="submit.php" method="POST">
			
			<div class="input-group" style="padding: 10px 0 10px 0;">
				<span class="input-group-addon">MESS_CARD</span> <input class="span2" name="messcard"
					id="rollno" type="text" placeholder="<?php echo $row2["Curr_messcard"]?>">
			</div>
			<br>
			<div class="input-group" style="padding: 10px 0 10px 0;">
				<span class="input-group-addon">CURRENT MESS</span> <input class="span2" name="currmess"
					id="rollno" type="text" placeholder="<?php echo $row2["Curr_mess"]?>">
			</div>
			<br>
			<button class="btn btn-large btn-primary centerh"
				style="width: 100px;" id="btn-dues" type="submit">Submit</button>
		</form>
	</div>
	<?php 
	}

}?>