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
  	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
	<link rel="shortcut icon" href="img/fav.png">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body style="background-color: #0d1a21">

<?php include_once("{$_SERVER['DOCUMENT_ROOT']}/Includes/header.php"); ?>
<div class="container-fluid" >
	<div class="row">
		<div class="col-lg-12 col-sm-12">
			<div class="jumbotron">
				<br/>
				<br/>
				<br/>
				<br/>
				<h1 class="text-center">Mess Registration System</h1>
				<h4 class="text-center">NITC</h4>
				<h3 class="text-center">Contractor's Portal</h3>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-4 col-sm-12 d-flex mb-4">
			<div class="card flex-fill">
				<div class="card-header text-center">Download Registration</div>
				<div class="card-body">
					<form action="php/getReg.php" method="post">
						<input type="submit" name="download" value="Download" class="btn btn-primary btn-block">
					</form>
				</div>
			</div>
		</div>
		<br>
		<div class="col-lg-4 col-sm-12 d-flex mb-4">
			<div class="card flex-fill">
				<div class="card-header text-center">Upload Dues</div>
				<div class="card-body ">
					<form action="php/upload.php" method="post" enctype="multipart/form-data">
						<div class="row">
						<input type="file" name="duefile" id="duefile" class="">
						<input type="submit" name="submit" value="Upload" class="btn btn-primary">
					</div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-sm-12 col-lg-4 d-flex mb-4">
            <div class="card flex-fill">
                <div class="card-header text-center">Verify</div>
                    <div class="card-body">
                       	<form >
                            <input id = "messcardno" type="text" placeholder="Mess Card No.">
                            <input type = "button" class ="btn btn-primary" onclick="verify(document.getElementById('messcardno').value)" value = "Submit" >
                            <p id ="response"></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>

		<!-- <div class="col-sm-12 col-lg-4 d-flex mb-4">
				<div class="card flex-fill">
					<div class="card-header text-center">Logout</div>
					<div class="card-body">
						<form action="../Logout/logout.php" method="post">
							<input type="submit" name="submit" value="Logout" class="btn btn-primary btn-block">
						</form>
					</div>
				</div>
			</div>
		</div> -->
	</div>
</div>
<?php include_once("{$_SERVER['DOCUMENT_ROOT']}/Includes/footer.php"); ?>
</body>
<script>
function verify(str) {
    if (str.length == 0) {
        window.alert("Enter Mess Card Number!");
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                window.alert(this.responseText);
            }
        };
        xmlhttp.open("GET", "php/verify.php?messcard=" + str, true);
        xmlhttp.send();
    }
}
</script>
</html>
