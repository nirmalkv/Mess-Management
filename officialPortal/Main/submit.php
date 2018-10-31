<?php
if(!isset($_SESSION)) {
	session_start(); 
}
require_once ("../Scripts/connection.php");
if (! isset ( $_SESSION ['admin'] ))
	header ( 'Location: ../Login/login.php' ) && die ();
$roll=$_SESSION["rollno"];
echo $roll;
if(isset($_POST["messcard"]))
{
	$messcard=$_POST["messcard"];
	$sql = "UPDATE mess_card SET Curr_messcard='$messcard' WHERE Rollno='$roll'";
	echo ($sql);
	if ($mysqli->query ( $sql )== FALSE) {
		header ( 'Location: updatestud.php' );
	}
	else
	{
		if(isset($_POST["currmess"]))
		{
			$currmess=$_POST["currmess"];
			$sql = "UPDATE mess_card SET Curr_mess='$currmess' WHERE Rollno='$roll'";
			echo ($sql);
			if ($mysqli->query ( $sql )== FALSE) {
			echo "<script>
				alert('Update Failed!! Please try again');
				window.location.href='index.php';
			</script>";
			}
			else
			{
				header ( 'Location: index.php' );
			}
		}
	}
}
else
{
	header ( 'Location: updatestud.php' );
	}

