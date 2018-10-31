<?php
require_once ("includes/global.php");
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
	header ( 'Location: login.php' ) && die ();
?>
</head>
<body>

  
  <header style="height: 50px; background-color: rgba(32, 169, 112, 0.14); text-align: center;">
    <div class="left" id="teamheader" style="float:left; margin-left: 20px; margin-top: 15px; "><a href="index.php">Home</a></div>
    <div class="right" id="logoutheader" style="float: right; float: right;margin-right: 20px;margin-top: 15px;"><a href="logout.php">LogOut</a></div>
	    <div class="right" id="searchheader" style="float: right; float: right;margin-right: 20px;margin-top: 15px;"><a href="view.php">View_All</a></div>
  </header>
<h2 align="center"> UPDATE STUDENT DETAILS</h2>
<?php
if(!isset($_POST["rollno"]))
{?>
<div id="form-search-container">
		<form id="form-search" class="box" action="" method="POST">
			<div class="input-group" style="padding: 10px 0 10px 0;">
				<span class="input-group-addon">Roll No</span> <input class="span2" name="rollno"
					id="rollno" type="text" placeholder="ROLLNo">
			</div>
			<br>
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
	include '/includes/connection.php';
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
    echo "no data here";
	header ( 'Location: search_all.php' );
    die();
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