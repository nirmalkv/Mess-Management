<?php
session_start();
require_once("{$_SERVER['DOCUMENT_ROOT']}/Scripts/checkLoggedOut.php");
require_once("{$_SERVER['DOCUMENT_ROOT']}/Scripts/connection.php");

// PhpSpreadsheet Library for creating spreadsheets
require $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Get name of the user's mess
$username = $_SESSION['Username'];
$sql = "SELECT Name FROM mess_info WHERE Contractor_ID = '{$username}'";
$res = mysqli_query($MYSQL_CONNECTION,$sql);
$data = mysqli_fetch_array($res);
$mess = $data['Name'];

// Get all students registered in $mess
$sql = "SELECT * FROM mess_card WHERE Curr_mess = '{$mess}' AND Update_mess='1'";
$res = mysqli_query($MYSQL_CONNECTION,$sql);

// To create a spreadsheet and add header info 
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setTitle('Registered Students');
$sheet->mergeCells('A1:E1');
$sheet->setCellValue('A2','SL No.')
	->setCellValue('B2', 'Roll Number')
	->setCellValue('C2', 'Mess Card Number')
	->setCellValue('D2','Name')
	->setCellValue('E2','Phone');

// Fill in the data fetched from database
$row = 3;
$sl = 1;
while ($data = mysqli_fetch_array($res)) {
	$rollno = $data['Rollno'];
	// Get registered student's details
	$stud = "SELECT Name, Phone FROM student_info WHERE Rollno = '{$rollno}'";
	$out = mysqli_query($MYSQL_CONNECTION,$stud);
	$info = mysqli_fetch_array($out);
	// Fill in the spreadsheet
	$sheet->setCellValue('A'.$row , $sl)
		->setCellValue('B'.$row , $data['Rollno'])
		->setCellValue('C'.$row , $data['Curr_messcard'])
		->setCellValue('D'.$row , $info['Name'])
		->setCellValue('E'.$row, $info['Phone']);
	$row++;
	$sl++;
	$month = $data['Month'];
}

// Set heading for the spreadsheet
$header = $mess.' Mess Registered Students - '.$month;
$sheet->setCellValue('A1', $header);

// To resize the column width
foreach (range('A','E') as $col) {
	$sheet->getColumnDimension($col)->setAutoSize(true);  
}

// Headers for browser to force download of the file
$filename = $mess.'-Mess-reg-'.$month;
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Encoding: none');
header('Content-Disposition: attachment; filename="'.$filename.'.xlsx"');
header('Cache-Control: max-age=0');

// Send the output
$writer = new Xlsx($spreadsheet);
$writer->save('php://output');
mysqli_close($MYSQL_CONNECTION);
?>
