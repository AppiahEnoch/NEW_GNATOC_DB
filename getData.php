<?php
include "config.php";
require_once 'vendor/autoload.php';




$spreadsheet = new PhpOffice\PhpSpreadsheet\Spreadsheet();
$spreadsheet->setActiveSheetIndex(0);
$activeSheet = $spreadsheet->getActiveSheet();
$activeSheet ->getColumnDimension('A')->setAutoSize(true);
$activeSheet ->getColumnDimension('B')->setAutoSize(true);
$activeSheet ->getColumnDimension('C')->setAutoSize(true);
$activeSheet ->getColumnDimension('D')->setAutoSize(true);
$activeSheet ->getColumnDimension('E')->setAutoSize(true);
$activeSheet ->getColumnDimension('F')->setAutoSize(true);
$activeSheet ->getColumnDimension('G')->setAutoSize(true);
$activeSheet ->getColumnDimension('H')->setAutoSize(true);
$activeSheet ->getColumnDimension('I')->setAutoSize(true);
$activeSheet ->getColumnDimension('J')->setAutoSize(true);
$activeSheet ->getColumnDimension('K')->setAutoSize(true);
$activeSheet ->getColumnDimension('L')->setAutoSize(true);
$activeSheet ->getColumnDimension('M')->setAutoSize(true);
$activeSheet ->getColumnDimension('N')->setAutoSize(true);
$activeSheet ->getColumnDimension('O')->setAutoSize(true);
$activeSheet ->getColumnDimension('P')->setAutoSize(true);
$activeSheet ->getColumnDimension('Q')->setAutoSize(true);
$activeSheet ->getColumnDimension('R')->setAutoSize(true);
$activeSheet ->getColumnDimension('S')->setAutoSize(true);
$activeSheet ->getColumnDimension('T')->setAutoSize(true);


$activeSheet->setTitle('records');

// Add the column headers to the sheet
$activeSheet->setCellValue('A1', 'ID');
$activeSheet->setCellValue('B1', 'STAFF ID');
$activeSheet->setCellValue('C1', 'FIRST NAME');
$activeSheet->setCellValue('D1', 'MIDDLE NAME(S)');
$activeSheet->setCellValue('E1', 'LAST NAME');
$activeSheet->setCellValue('F1', 'GENDER');
$activeSheet->setCellValue('G1', 'MOBILE');
$activeSheet->setCellValue('H1', 'GHANA CARD NUMBER');
$activeSheet->setCellValue('I1', 'EMAIL');
$activeSheet->setCellValue('J1', 'SSNIT NUMBER');
$activeSheet->setCellValue('K1', 'STUDY LEAVE WITH PAY');
$activeSheet->setCellValue('L1', 'ADMISSION NUMBER');
$activeSheet->setCellValue('M1', 'REGISTERED NUMBER');
$activeSheet->setCellValue('N1', 'LEVEL');
$activeSheet->setCellValue('O1', 'DATE OF BIRTH');
$activeSheet->setCellValue('P1', 'PROGRAMME');
$activeSheet->setCellValue('Q1', 'REGION');
$activeSheet->setCellValue('R1', 'YEAR OF ADMISSION');
$activeSheet->setCellValue('S1', 'YEAR OF COMPLETION');
$activeSheet->setCellValue('T1', 'RANK');


// Add the data from the MySQL database to the sheet
// Start at row 2 (row 1 is the header)








$sex=$_POST["sex"];
$from=$_POST["from"];
$to=$_POST["to"];
$level=$_POST["level"];
$rank1=$_POST["rank1"];

$sex = mysqli_real_escape_string($conn, $sex);
$from = mysqli_real_escape_string($conn, $from);
$to = mysqli_real_escape_string($conn, $to);
$level = mysqli_real_escape_string($conn, $level);
$rank1 = mysqli_real_escape_string($conn, $rank1);





$query = "SELECT * FROM memberbio";

// Execute the query
$result = mysqli_query($conn, $query);

$row2=2;
if ($result->num_rows > 0) {
  // output data of each row
  while ($row = $result->fetch_assoc()) {



    //$fullName=$fName." ".$mName." ".$lName;









    // CREATE Excel




  }
}

  $staffID = "123";
  $fullName = "wwwww";
  $mobile = "0000";


  $return_arr[]= array(
    "staffID" => $staffID,
    "fullName" => $fullName,
    "mobile" => $mobile
);

  $json = json_encode($return_arr);
  if(json_last_error() === JSON_ERROR_NONE){
      echo $json;
  }else{
      echo json_encode(array("error"=>"An error occurred while encoding data to json"));
  }
  
  //$writer = new PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);


 // $writer->save('Records.xlsx');

  //$conn->close();













