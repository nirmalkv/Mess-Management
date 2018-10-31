<?php
require_once ("includes/global.php");
header ( 'Content-type: text/html; charset=utf-8' );
echo <<<CONTENT
<!DOCTYPE html>
<html>
  <head>
    <title>View All Registrations</title>
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
    <div class="right" id="searchheader" style="float: right; float: right;margin-right: 20px;margin-top: 15px;"><a href="search.php">Search</a></div>  
  </header>
<h2 align="center"> View All Registrations</h2>
<?php
include 'includes/connection.php';

$query="SELECT * from due_list ";
  if (! $result = $mysqli->query ( $query )) {
    die ( "Error" . $mysqli->error );
  }
  if ($result->num_rows == 0){
    echo "no data here";
    die();
  }
  else{?>
      <!--Creating a table-->
    <table style="margin: 50px 50px 50px 100px;"border="1" >
				<col width="300">
				<col width="200">
				<col width="400">
				<col width="200">
    		  	<tr>
    				<th>ROLL_NO</th>
    				<th>DUE</th>
    				<th>LAST PAYMENT</th>
					<th>LAST PAYMENT DATE</th>
    			</tr>
          <?php
          while($row = $result->fetch_assoc()){
            echo '
            <tr>
              <td>'.$row["Rollno"].'</td>
              <td>'.$row["Due"].'</td>
              <td>'.$row["Amountpaid"].'</td>
              <td>'.$row["Date"].'</td>
            </tr>';
        	} ?>
      </table>
	<?php 
	}
	?>
</body>
</body>