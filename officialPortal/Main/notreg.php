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
    <title>View All Not-Registrations</title>
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
<h2 align="center"> Students Who Are Not Registered</h2>
<?php
require_once ("../Scripts/connection.php");

$query="SELECT * from mess_card WHERE Update_mess=0";
  if (! $result = $mysqli->query ( $query )) {
    die ( "Error" . $mysqli->error );
  }
  if ($result->num_rows == 0){
    echo "<script>
		alert('All Students are registered');
		window.location.href='index.php';
	</script>";
	
  }
  else{?>
      <!--Creating a table-->
    <table style="margin: 50px 50px 50px 100px;"border="1" >
				<col width="300">
				
    		  	<tr>
    				<th>ROLL_NO</th>
    			</tr>
          <?php
          while($row = $result->fetch_assoc()){
            echo '
            <tr>
              <td>'.$row["Rollno"].'</td>
            </tr>';
        	} ?>
      </table>
	<?php 
	}
	?>
</body>
</body>