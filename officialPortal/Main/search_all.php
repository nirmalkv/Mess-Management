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
	  <li><a href="search.php">Search</a></li>
      <li><a href="../Logout/logout.php">logout</a></li>
      
    </ul>
	</div>
  </div>
</nav>
<h2 align="center"> COMPLETE STUDENT DETAILS</h2>
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

	$query="SELECT * from due_list WHERE Rollno='$roll'";
	$query1="SELECT * from student_info WHERE Rollno='$roll'";
	if (! $result = $mysqli->query ( $query )) {
		die ( "Error" . $mysqli->error );
	}
	if (! $result1 = $mysqli->query ( $query1 )) {
		die ( "Error" . $mysqli->error );
	}
	if ($result->num_rows == 0 || $result1->num_rows == 0 ){
    echo "no data here";
	header ( 'Location: search_all.php' );
    die();
	}
	else{?>
	<table style="margin: 50px 50px 50px 100px;"border="1" >
				<col width="200">
				<col width="400">
				<col width="100">
				<col width="200">
				<col width="200">
				<col width="400">
    		  	<tr>
    				<th>ROLL_NO</th>
					<th>NAME</th>
					<th>HOSTEL</th>
    				<th>ROOM</th>
					<th>DUE</th>
    				<th>PHONE NUMBER</th>
    			</tr>
          <?php
          while($row = $result->fetch_assoc()){
			  $row1=$result1->fetch_assoc();
            echo '
            <tr>
              <td>'.$row["Rollno"].'</td>
			  <td>'.$row1["Name"].'</td>
			  <td>'.$row1["Hostel"].'</td>
			  <td>'.$row1["Room"].'</td>
              <td>'.$row["Due"].'</td>
              <td>'.$row1["Phone"].'</td>
            </tr>';
        	} ?>
      </table>
	<?php 
	}

}?>