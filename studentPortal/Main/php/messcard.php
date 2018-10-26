<?php 
	session_start(); 
	include_once("{$_SERVER['DOCUMENT_ROOT']}/Scripts/checkLoggedOut.php");
	require_once("{$_SERVER['DOCUMENT_ROOT']}/Scripts/connection.php");
	
	$username = $_SESSION['Username'];
	$sql = "SELECT * FROM student_info WHERE Rollno = '$username'";
	$result = $MYSQL_CONNECTION->query($sql);
	$details_row = $result->fetch_assoc();
	$_SESSION['Mess'] = $_POST["mess"];
	$new_mess = $_SESSION['Mess'];

	$sql = "SELECT * FROM mess_card WHERE Rollno = '$username'";
	if (($result = $MYSQL_CONNECTION->query($sql))->num_rows > 0 ) {
		echo "already undeda";
	
		$mess_details = $result->fetch_assoc();
		$currmess_card = $mess_details["Curr_messcard"];
		$sql = "UPDATE mess_card SET Prev_messcard = '$currmess_card' WHERE Rollno = '$username'";
		$MYSQL_CONNECTION->query($sql);
		$sql = "UPDATE mess_card SET Curr_messcard = 'B160123' WHERE Rollno = '$username'";
		$MYSQL_CONNECTION->query($sql);
		$currmess = $mess_details["Curr_mess"];
		$sql = "UPDATE mess_card SET Prev_mess = '$currmess' WHERE Rollno = '$username'";
		$MYSQL_CONNECTION->query($sql);
		$sql = "UPDATE mess_card SET Curr_mess = '$new_mess' WHERE Rollno = '$username'";
		$MYSQL_CONNECTION->query($sql);
		$sql = "UPDATE mess_card SET Month = 'June' WHERE Rollno = '$username'";
		$MYSQL_CONNECTION->query($sql);
		$sql = "UPDATE mess_card SET Update_mess = 1 WHERE Rollno = '$username'";
		$MYSQL_CONNECTION->query($sql);
	}
	else
	{
		echo "ivde onnulla";
		$sql = "INSERT INTO mess_card(Curr_messcard, Rollno, Curr_mess, Month, Update_mess) VALUES ('B1601123', '$username', '$new_mess', 'May', 0)";
		$MYSQL_CONNECTION->query($sql);
		echo $MYSQL_CONNECTION->error;
		}

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>
 		Mess Card Issued
 	</title>
 	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
 </head>
 <body>
 	<div class="row">
 		<div>
 			You have successfully registered for a mess!
 		</div>
 	</div>
 	<div class="row">
 		<div class="col l3">
 			MESS CARD
 		</div>
 		
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
			<div class="col l3">Mess:</div>
			<div>
				<?php 
	
    					echo $_SESSION['Mess'];
    			
			 ?>
			</div>
		</div>
		<div class="row">
			<p>Click the button to print your mess card</p>

			<button onclick="myFunction()">Print mess card</button>

		<script>
			function myFunction() {
    		window.print();
		}
</script>
		</div>
 </body>
 </html>
