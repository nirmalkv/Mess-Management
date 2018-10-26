<?php
	session_start();
	require_once("{$_SERVER['DOCUMENT_ROOT']}/Scripts/checkLoggedOut.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>MESS</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body style="background-color: #0d1a21">
<div class="container">
	<div class="row">
		<div class="col-md-12 col-sm-12">
			<div class="jumbotron">
				<h1 class="text-center">Mess Registration System</h1>
				<h4 class="text-center">NITC</h4>
				<h3 class="text-center">Contractor's Portal</h3>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 col-sm-12">
			<div class="card">
				<div class="card-header">Download Registration</div>
				<div class="card-body">
					<form action="php/getReg.php" method="post">
						<input type="submit" name="download" value="Download">
					</form>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-sm-12">
			<div class="card">
				<div class="card-header">Upload Dues</div>
				<div class="card-body">
					<form action="php/upload.php" method="post" enctype="multipart/form-data">
						<input type="file" name="duefile" id="duefile">
						<input type="submit" name="submit" value="submit">
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
