<?php
require_once 'config.php';
session_start();
$_SESSION["staffID"] = "1220016";
$staffID = $_SESSION["staffID"];



$return_arr[] = null;

$_path = "file";

$fPassport =getImageFromDB($staffID, "passport");


$fStudyLeave = getPdfFromDB($staffID, "studyLeave");
$fMasterList =getPdfFromDB($staffID, "masterlist");
$fMatricula = getPdfFromDB($staffID, "matricula");
$fGhana = getPdfFromDB($staffID, "ghanacard");
$fSsnit =getPdfFromDB($staffID, "ssnitcard");
$fAdmission =getPdfFromDB($staffID, "admission");





try {
  $sql = "SELECT * FROM memberbio where staffID='$staffID'";
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
      $rank = '';

      $fname = $row['fName'];
      $mName = $row['mName'];
      $lName = $row['lName'];
      $mobile = $row['mobile'];
      $rank = $row["rank"];


      $staffID = $row['staffID'];
      $fullName = $fname . " " . $mName . " " . $lName;
      $email = $row['email'];
      $imagePath = $fPassport;
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


  

      
      $return_arr[] = array(
        "mobile" => $mobile,
        "fullName" => $fullName,
        "staffID" => $staffID,
        "imagePath" => $imagePath,
        "regNumber" => $regNumber,
        "level" => $level,
        "rank" => $rank,
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






function insertImage($staffID, $column)
{
  global $conn, $tmp;

  //check if file is image file before inserting
  $finfo = new finfo(FILEINFO_MIME_TYPE);
  $file_type = $finfo->file($tmp);
  if (strpos($file_type, 'image') !== false) {
    //Read image file content
    $image_data = file_get_contents($tmp);

    //update staff image in filetable
    $query = "UPDATE `filetable` SET $column = ? WHERE staffID = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("bs", $image_data, $staffID);
    $stmt->send_long_data(0, $image_data);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
      echo "Data updated successfully!";
    } else {
      echo "Error: " . $stmt->error;
    }
    $stmt->close();
  } else {
    echo "Error: file is not an image file";
  }
}









function insertPDF($staffID, $column)
{
  global $conn, $tmp;

  //check if file is pdf file before inserting
  $finfo = new finfo(FILEINFO_MIME_TYPE);
  $file_type = $finfo->file($tmp);
  if (strpos($file_type, 'application/pdf') !== false) {
    //Read pdf file content
    $pdf_data = file_get_contents($tmp, true);

    //update staff pdf in filetable
    $query = "UPDATE `filetable` SET $column = ? WHERE staffID = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("bs", $pdf_data, $staffID);
    $stmt->send_long_data(0, $pdf_data);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
      echo "Data updated successfully!";
    } else {
      echo "Error: " . $stmt->error;
    }
    $stmt->close();
  } else {
    echo "Error: file is not a pdf file";
  }
}






function getImageFromDB($staffID, $column)
{
  global $conn, $_path;
  //Retrieve image data from filetable
  $query = "SELECT $column FROM `filetable` WHERE staffID = ?";
  $stmt = $conn->prepare($query);
  $stmt->bind_param("s", $staffID);
  $stmt->execute();
  $result = $stmt->get_result();
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $image_data = $row[$column];

    //Write image data to file
    $folder = $_path;

    $IDD = generateUniqueID();
    $file_path = $folder . "/" . $staffID . $IDD . ".jpg";
    file_put_contents($file_path, $image_data);
   // echo "Image saved successfully to " . $file_path;
  } else {
    //echo "Error: staffID not found or no image found for the staff";
  }


  $stmt->close();
 
  return $file_path;
}




function getPdfFromDB($staffID, $column)
{
  global $conn, $_path;
  //Retrieve pdf data from filetable
  $query = "SELECT $column FROM `filetable` WHERE staffID = ?";
  $stmt = $conn->prepare($query);
  $stmt->bind_param("s", $staffID);
  $stmt->execute();
  $result = $stmt->get_result();
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $pdf_data = $row[$column];

    //Write pdf data to file
    $folder = $_path;
    $IDD = generateUniqueID();
    $file_path = $folder . "/" . $staffID . $IDD . ".pdf";
    file_put_contents($file_path, $pdf_data);
   // echo "PDF saved successfully to " . $file_path;
  } else {
   // echo "Error: staffID not found or no pdf found for the staff";
  }

  $stmt->close();

  return $file_path;
}

function generateUniqueID()
{
  // Get current timestamp
  $time = microtime(true);
  // Convert timestamp to a unique ID
  $id = uniqid($time, true);
  return $id;
}



function deleteFilesByID($staffID) {
    $dir = "file/";
    $files = scandir($dir);
    foreach($files as $file) {
        if(strpos($file, $staffID) !== false) {
            unlink($dir.$file);
        }
    }
}
