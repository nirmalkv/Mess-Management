<?php
session_start();
require_once("{$_SERVER['DOCUMENT_ROOT']}/Scripts/checkLoggedOut.php");
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
    $data = mysqli_fetch_array($temp);
    if($data['Id'] == ""){
        $filename = "Mess-bill-". $mess .'-'.$month.".xlxs"; 
        $insert = "INSERT INTO due_files (Contractor_id,Mess,Month,Year,Filename,File) VALUES ('$contractorId','$mess','$month','$year','$filename','$file_tmp')";
        if(mysqli_query($MYSQL_CONNECTION,$insert)){
            echo '<script>window.alert("File uploaded successfully!")</script>';
            echo '<script>window.location.replace("../index.php")</script>';
        } else{
            echo '<script>window.alert("File upload failed!")</script>';
            echo '<script>window.location.replace("../index.php")</script>';
        }
    }
    else{
        $id = $data['Id'];
        $sql = "UPDATE due_files SET File='$file_tmp' WHERE Id = '$id'";
        if(mysqli_query($MYSQL_CONNECTION,$sql)){
            echo '<script>window.alert("File Updated successfully!")</script>';
            echo '<script>window.location.replace("../index.php")</script>';
        } else{
            echo '<script>window.alert("File Update failed!")</script>';
            echo '<script>window.location.replace("../index.php")</script>';
        }
    }
}

mysqli_close($MYSQL_CONNECTION);

?>