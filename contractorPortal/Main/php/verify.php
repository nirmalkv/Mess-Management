<?php
session_start();
require_once("{$_SERVER['DOCUMENT_ROOT']}/Scripts/checkLoggedOut.php");
require_once("{$_SERVER['DOCUMENT_ROOT']}/Scripts/connection.php");

$str = $_GET['messcard'];
if($str != ""){
        $messcard = strtoupper($str);
        $mess = $_SESSION['Mess'];
        $sql = "SELECT * FROM mess_card WHERE Curr_messcard = '{$messcard}' AND Curr_mess = '{$mess}'";
        $res = mysqli_query($MYSQL_CONNECTION,$sql);
        if($data = mysqli_fetch_array($res)){
                echo "Registered!";
        } else {
                echo "Not Registered!";
        }
}
