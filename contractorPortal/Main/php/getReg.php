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

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setTitle('Registered Students');
$sheet->setCellValue('A1', 'Roll Number')
	->setCellValue('B1', 'Mess Card Number');
	// ->setCellValue('B1','Name')
	// ->setCellValue('C1','Mobile Number')
	// ->setCellValue('D1','Mess');
$row = 2;
while ($data = mysqli_fetch_array($res)) {
	$sheet->setCellValue('A'.$row , $data['Rollno'])
		->setCellValue('B'.$row , $data['Curr_messcard']);
		// ->setCellValue('C'.$row , $data['mobno'])
		// ->setCellValue('D'.$row , $data['mess']);
	$row++;
}

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Encoding: none');
header('Content-Disposition: attachment; filename=messreg.xlsx');
header('Cache-Control: max-age=0');

$writer = new Xlsx($spreadsheet);
$writer->save('php://output');
mysqli_close($MYSQL_CONNECTION);
?>
