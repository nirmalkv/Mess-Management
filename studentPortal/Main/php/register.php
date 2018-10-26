<?php
	session_start(); 
	include_once("{$_SERVER['DOCUMENT_ROOT']}/Scripts/checkLoggedOut.php");
	require_once("{$_SERVER['DOCUMENT_ROOT']}/Scripts/connection.php");
	
	$username = $_SESSION['Username'];
	$sql = "SELECT * FROM student_info WHERE Rollno = '$username'";
	$result = $MYSQL_CONNECTION->query($sql);
	$details_row = $result->fetch_assoc();

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>
		REGISTER FOR MESS
	</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
<body>
	<div class="container">
		<div class="row">
			REGISTER FOR MESS
		</div>
		<div class="row">
			<div class="col l3">Name:</div>
			<div class="col l3">
			<?php 
				echo $details_row["Name"];
			 ?>
			</div>

		</div>
		<div class="row">
			<div class="col l3">Hostel:</div>
			<div class="col l3">
			<?php 
				echo $details_row["Hostel"];
			 ?>
			</div>
		</div>
		<div class="row">
			<div class="col l3">Room No:</div>
			<div class="col l3">
			<?php 
				echo $details_row["Room"];
			 ?>
			</div>
		</div>
		<div class="row">
			<div class="col l4">
				Select Mess
			</div>

		</div>
		<div class="row">
			<form method="post" action="messcard.php" onsubmit="return confirm('Are you sure you want to register for this mess?');">
				<?php 
					$sql = "SELECT Name FROM mess_info WHERE Remaining > 0";
					$result = $MYSQL_CONNECTION->query($sql);
					while($row = $result->fetch_assoc()) {
						$mess_name = $row["Name"];
				?>

					<p>
      					<label>
        					<input name="mess" type="radio" value = <?php echo $mess_name ?> />
        						<span><?php echo $mess_name ?></span>
      					</label>
   					 </p>
      
        			<?php
    				}
    				?>
    				
    				
					
			
				<input class="btn waves-effect waves-light" type="submit" value="REGISTER" name="register_button" >
			</form>
		</div>
	</div>
</body>
</html>


