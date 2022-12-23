<?php

$passport_unique="passportx@23UaG52_x-@@k3";
$matricula_unique="matriculax@23UaG52_x-@@k3";
$studyleave_unique="studyleavex@23UaG52_x-@@k3";
$masterlist_unique="masterlistx@23UaG52_x-@@k3";
$ssnit_unique="ssnitx@23UaG52_x-@@k3";
$ghanaCard_unique="ghanacardx@23UaG52_x-@@k3";
$admission_unique="admissionx@23UaG52_x-@@k3";

require_once 'config.php';


session_start();
//$_SESSION["staffID"] = "1220016";
$staffID = $_SESSION["staffID"];

$return_arr[] = null;

try {
  $sql = "SELECT * FROM memberfile where staffID='$staffID'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    if ($row = mysqli_fetch_assoc($result)) {
      $fname = '';
      $mName = '';
      $lName = '';
      $fullName = '';
      $imagePath = '';
      $email = '';
      $email = '';

      $fname = $row['fName'];
      $mName = $row['mName'];
      $lName = $row['lName'];
      $mobile = $row['mobile'];


      $staffID = $row['staffID'];
      $fullName = $fname . " " . $mName . " " . $lName;
      $email = $row['email'];
      $imagePath = $row['passport'];
      $regNumber = $row['regNumber'];
      $level = $row['level'];
      $region = $row['region'];
      $ssnit = $row['ssnitNumber'];
      $course = $row['course'];
      $gender = $row['gender'];
      $dob = $row['dob'];
      $admissionNumber = $row['admissionNumber'];
      $yearOfAdmission = $row['yearOfAdmission'];
      $yearOfCompletion = $row['yearOfCompletion'];
      $studyLeaveStatus = $row['studyLeaveStatus'];
      $ghanaCardNumber = $row['ghanaCard'];


      $fStudyLeave = $row['studyLeave'];

      $fMasterList = $row['masterList'];
      $fMatricula = $row['matricula'];
      $fGhana = $row['fghanaCard'];
      $fSsnit = $row['ssnitCard'];
      $fAdmission = $row['admission'];
  

      
      $return_arr[] = array(
        "mobile" => $mobile,
        "fullName" => $fullName,
        "staffID" => $staffID,
        "imagePath" => $imagePath,
        "regNumber" => $regNumber,
        "level" => $level,
        "region" => $region,
        "ssnit" => $ssnit,
        "gender" => $gender,
        "yearOfAdmission" => $yearOfAdmission,
        "yearOfCompletion" => $yearOfCompletion,
        "studyLeaveStatus" => $studyLeaveStatus,
        "admissionNumber" => $admissionNumber,
        "course" => $course,
        "ghanaCardNumber" => $ghanaCardNumber,

        "fStudyLeave" => $fStudyLeave,
        "fMasterList" => $fMasterList,
        "fGhana" => $fGhana,
        "fSsnit" => $fSsnit,
        "fMatricula" => $fMatricula,
        "fAdmission" => $fAdmission,
        "email" => $email
      );
    }

    echo json_encode($return_arr);
  } else {

    echo 0;
  }
} catch (Throwable $th) {
  echo $th;
}


$conn->close();



function deleteFile($folder,$fileID){
  $files = glob($folder.'/*'); // get all file names
  $id = $fileID; // specific ID to search for
  foreach($files as $file){ // iterate files
    if(is_file($file) && strpos($file, $id) !== false) {
      unlink($file); // delete file

    }

  }
  }
