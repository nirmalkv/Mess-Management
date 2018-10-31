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
    <title>Search Student</title>
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
<h2 align="center"> DUES DETAILS OF STUDENT</h2>
<br>
<br>

<?php
if(!isset($_POST["rollno"]))
{?>
<div id="form-search-container">
		<form id="form-search"  action="" method="POST">
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

	$query="SELECT * from due_list WHERE Rollno='$roll'";
	
	$query2="SELECT * from student_info WHERE Rollno='$roll'";
	if (! $result = $mysqli->query ( $query )) {
		die ( "Error" . $mysqli->error );
	}
	
	if (! $result2 = $mysqli->query ( $query2 )) {
		die ( "Error" . $mysqli->error );
	}
	if ($result->num_rows == 0 || $result2->num_rows == 0){
    echo "<script>
		alert('Cannot Find RollNo!! Try again');
		window.location.href='search.php';
	</script>";
	}
	else{?>
	<table style="margin: 50px 50px 50px 100px;"border="1" >
				<col width="200">
				<col width="300">
				<col width="100">
				<col width="100">
				<col width="250">
				<col width="150">
				<col width="200">
				<col width="200">
    		  	<tr>
    				<th>ROLL_NO</th>
					<th>NAME</th>
					<th>HOSTEL</th>
    				<th>ROOM</th>
					<th>PHONE NUMBER</th>
    				<th>DUE</th>
    				<th>LAST PAYMENT</th>
					<th>LAST PAYMENT DATE</th>
    			</tr>
          <?php
          while($row = $result->fetch_assoc()){
			
			  $row2 = $result2->fetch_assoc();
            echo '
            <tr>
              <td>'.$row["Rollno"].'</td>
			  <td>'.$row2["Name"].'</td>
			  <td>'.$row2["Hostel"].'</td>
			  <td>'.$row2["Room"].'</td>
			  <td>'.$row2["Phone"].'</td>
              <td>'.$row["Due"].'</td>
              <td>'.$row["Amountpaid"].'</td>
              <td>'.$row["Date"].'</td>
            </tr>';
        	} ?>
      </table>
	<?php 
	}

}?>