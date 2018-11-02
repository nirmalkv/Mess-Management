<?php
require_once("{$_SERVER['DOCUMENT_ROOT']}/Config/config.php");
// Create connection
$mysqli = new mysqli($server, $username, $password, $dbname);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
// echo "Connected successfully";

?>