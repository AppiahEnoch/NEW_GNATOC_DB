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





$query = "SELECT * FROM memberbio WHERE ";

if (!empty($sex)) {
    $query .= "(gender LIKE '%$sex%' OR yearOfAdmission LIKE '%$sex%' OR yearOfCompletion LIKE '%$sex%' OR level LIKE '%$sex%') AND ";
}

if (!empty($from)) {
    $query .= "(gender LIKE '%$from%' OR yearOfAdmission LIKE '%$from%' OR yearOfCompletion LIKE '%$from%' OR level LIKE '%$from%') AND ";
}

if (!empty($to)) {
    $query .= "(gender LIKE '%$to%' OR yearOfAdmission LIKE '%$to%' OR yearOfCompletion LIKE '%$to%' OR level LIKE '%$to%') AND ";
}

if (!empty($level)) {
    $query .= "(gender LIKE '%$level%' OR yearOfAdmission LIKE '%$level%' OR yearOfCompletion LIKE '%$level%' OR level LIKE '%$level%') AND ";
}

if (!empty($rank1)) {
    $query .= "(gender LIKE '%$rank1%' OR yearOfAdmission LIKE '%$rank1%' OR yearOfCompletion LIKE '%$rank1%' OR level LIKE '%$rank1%' OR rank = '$rank1') AND ";
}

// Remove the extra AND at the end of the query
$query = rtrim($query, " AND ");

// Execute the query
$result = mysqli_query($conn, $query);

$row2=2;
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

    $staffID=$row["staffID"];
    $fName=$row["fName"];
    $mName=$row["mName"];
    $lName=$row["lName"];
    $mobile=$row["mobile"];

    $gender=$row["gender"];
    $ghanaCard=$row["ghanaCard"];
    $email=$row["email"];
    $ssnit=$row["ssnitNumber"];
    $studyLeaveStatus=$row["studyLeaveStatus"];
    $admissionNumber=$row["admissionNumber"];
    $regNumber=$row["regNumber"];
    $level=$row["level"];
    $dob=$row["dob"];
    $course=$row["course"];
    $region=$row["region"];
    $yearOfAdmission=$row["yearOfAdmission"];
    $yearOfCompletion=$row["yearOfCompletion"];
    $rank1=$row["rank"];



















  $fullName=$fName." ".$mName." ".$lName;
    $fullName = "APPIAH";
  $return_arr[] = array(
    "staffID" => $staffID,
    "fullName" => $fullName,
    "mobile" => $mobile
);


  



  

    // CREATE Excel

    if(!empty($staffID)){
      $activeSheet->setCellValue('A' .$row2, $row2-1);
      $activeSheet->setCellValue('B' .$row2, $staffID);
      $activeSheet->setCellValue('C' .$row2, $fName);
      $activeSheet->setCellValue('D' .$row2, $mName);
      $activeSheet->setCellValue('E' .$row2, $lName);
      $activeSheet->setCellValue('F' .$row2, $gender);
      $activeSheet->setCellValue('G' .$row2, $mobile);
      $activeSheet->setCellValue('H' .$row2, $ghanaCard);
      $activeSheet->setCellValue('I' .$row2, $email);
      $activeSheet->setCellValue('J' .$row2, $ssnit);
      $activeSheet->setCellValue('K' .$row2, $studyLeaveStatus);
      $activeSheet->setCellValue('L' .$row2, $admissionNumber);
      $activeSheet->setCellValue('M' .$row2, $regNumber);
      $activeSheet->setCellValue('N' .$row2, $level);
      $activeSheet->setCellValue('O' .$row2, $dob);
      $activeSheet->setCellValue('P' .$row2, $course);
      $activeSheet->setCellValue('Q' .$row2, $region);
      $activeSheet->setCellValue('R' .$row2, $yearOfAdmission);
      $activeSheet->setCellValue('S' .$row2, $yearOfCompletion);
      $activeSheet->setCellValue('T' .$row2, $rank1);


    }
 


  }
  echo json_encode($return_arr);
  // Save the spreadsheet to a file
  $writer = new PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);


  $writer->save('Records.xlsx');

  $conn->close();
  exit;

} else {
  $return_arr[] =null;
  echo json_encode($return_arr);
  $conn->close();
 exit;
}










