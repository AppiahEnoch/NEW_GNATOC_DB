<?php

if (!isset($_SESSION)) {
    session_start();
    
}

$currentUser = $_SESSION["staffID"];


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




$activeSheet->setTitle('DUES');

// Add the column headers to the sheet
$activeSheet->setCellValue('A1', 'NO#');
$activeSheet->setCellValue('B1', 'USER ID');
$activeSheet->setCellValue('C1', 'MEMBER ID');
$activeSheet->setCellValue('D1', 'PAYED AMOUNT');
$activeSheet->setCellValue('E1', 'DUES AMOUNT');
$activeSheet->setCellValue('F1', 'DEBT');
$activeSheet->setCellValue('G1', 'PAY DATE');



// Add the data from the MySQL database to the sheet
// Start at row 2 (row 1 is the header)












$query = "SELECT * FROM viewdue";

// Execute the query
$result = mysqli_query($conn, $query);

$row2=2;
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

    $recordID=$row["ID"];
    $userID=$row["userID"];
    $staffID=$row["staffID"];
    $payedamount =$row["payedamount"];
    $actualamount =$row["actualamount"];
    $debt=$row["debt"];
    $paydate=$row["paydate"];

if(!empty($staffID)){

  $return_arr[] = array(
    "recordID" => $recordID,
    "userID" => $userID,
    "currentUser" => $currentUser,
    "actualamount" => $actualamount,
    "payedamount" => $payedamount,
    "debt" => $debt,
    "paydate" => $paydate,
    "staffID" => $staffID
);

}
  



  

    // CREATE Excel

   
      $activeSheet->setCellValue('A' .$row2, $row2-1);
      $activeSheet->setCellValue('B' .$row2, $userID);
      $activeSheet->setCellValue('C' .$row2, $staffID);
      $activeSheet->setCellValue('D' .$row2, $payedamount);
      $activeSheet->setCellValue('E' .$row2, $actualamount);
      $activeSheet->setCellValue('F' .$row2, $debt);
      $activeSheet->setCellValue('G' .$row2, $paydate);


        $row2++;

    
 


  }
  echo json_encode($return_arr);
  // Save the spreadsheet to a file
  $writer = new PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);


  $writer->save('output/Dues.xlsx');




} else {
  $return_arr[] =null;
  echo json_encode($return_arr);
 exit;
}
$conn->close();


?>






