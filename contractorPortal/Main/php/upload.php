<?php
session_start();
if(!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    echo '<script>window.location.replace("http://'.$_SERVER['SERVER_NAME'].'/Main/index.php");</script>';
    }
require_once("{$_SERVER['DOCUMENT_ROOT']}/Scripts/connection.php");
$contractorId = $_SESSION['Username'];

$sql = "SELECT Name FROM mess_info WHERE Contractor_ID = '$contractorId'";
$res = mysqli_query($MYSQL_CONNECTION,$sql);
$data = mysqli_fetch_array($res);
$mess = $data['Name'];

if(date("m") == 1){
    $month = 12;
    $year = date("Y") - 1;
} else{
    $month = date("m") - 1;
    $year = date("Y");
}

if(is_uploaded_file(($_FILES['duefile']['tmp_name']))) {
    $file_tmp =$_FILES['duefile']['tmp_name'];
    $checkquery = "SELECT Id FROM due_files WHERE Mess='$mess' AND Month='$month' AND Year='$year'";
    $temp = mysqli_query($MYSQL_CONNECTION,$checkquery);
    if(is_null($temp)){
        $filename = "Mess-bill-". $mess .'-'.$month.".xlxs"; 
        $insert = "INSERT INTO due_files (Contractor_id,Mess,Month,Year,Filename,File) VALUES ('$contractorId','$mess','$month','$year','$filename','$file_tmp')";
        if(mysqli_query($MYSQL_CONNECTION,$insert)){
            // echo "success";
            echo '<script>window.location.replace("../index.php")</script>';
        } else{
            // echo "failed";
            echo '<script>window.location.replace("../index.php")</script>';
        }
    }
    else{
        $data = mysqli_fetch_array($temp);
        $id = $data['Id'];
        $sql = "UPDATE due_files SET File='$file_tmp' WHERE Id = '$id'";
        if(mysqli_query($MYSQL_CONNECTION,$sql)){
            // echo "updated";
            echo '<script>window.location.replace("../index.php")</script>';
        } else{
            // echo "update failed";
            echo '<script>window.location.replace("../index.php")</script>';
        }
    }
}

mysqli_close($MYSQL_CONNECTION);

?>