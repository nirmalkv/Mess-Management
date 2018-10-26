<?php
session_start();
require_once("{$_SERVER['DOCUMENT_ROOT']}/Scripts/checkLoggedOut.php");
require_once("{$_SERVER['DOCUMENT_ROOT']}/Scripts/connection.php");

require $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$username = $_SESSION['Username'];
$sql = "SELECT Name FROM mess_info WHERE Contractor_ID = '{$username}'";
$res = mysqli_query($MYSQL_CONNECTION,$sql);
$data = mysqli_fetch_array($res);
$mess = $data['Name'];

$sql = "SELECT * FROM mess_card WHERE Curr_mess = '$mess' AND Update_mess=1";
$res = mysqli_query($MYSQL_CONNECTION,$sql);
$month = date("m");

$header = $mess.' Mess Registered Students - '.$month;
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setTitle('Registered Students');
$sheet->mergeCells('A1:E1');
$sheet->setCellValue('A1', $header);
$sheet->setCellValue('A2','SL No.')
	->setCellValue('B2', 'Roll Number')
	->setCellValue('C2', 'Mess Card Number')
	->setCellValue('D2','Name')
	->setCellValue('E2','Phone');
$row = 3;
$sl = 1;
while ($data = mysqli_fetch_array($res)) {
	$stud = "SELECT Name, Phone FROM student_info WHERE Rollno = {$data['Rollno']}";
	$out = mysqli_query($MYSQL_CONNECTION,$stud);
	$info = mysqli_fetch_array($out);
	$sheet->setCellValue('A'.$row , $sl)
		->setCellValue('B'.$row , $data['Rollno']);
		->setCellValue('C'.$row , $data['curr_messcard'])
		->setCellValue('D'.$row , $info['Name'])
		->setCellValue('E'.$row, $info['Phone']);
	$row++;
	$sl++;
}

foreach (range('A','E') as $col) {
	$sheet->getColumnDimension($col)->setAutoSize(true);  
}

$filename = $header .'xlsx';
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Encoding: none');
header('Content-Disposition: attachment; filename=$filename');
header('Cache-Control: max-age=0');

$writer = new Xlsx($spreadsheet);
$writer->save('php://output');
mysqli_close($MYSQL_CONNECTION);
?>
