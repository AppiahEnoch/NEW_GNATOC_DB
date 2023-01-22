<?php
require_once 'config.php';
include_once 'globals.php';

if (!isset($_SESSION)) {
  session_start();
}




//$_SESSION["staffID"] = 1220016;
$fileD = $_SESSION["staffID"];
$staffID = $_SESSION["staffID"];

$v1 = "passport";
$v2 = "matricula";


$passport = "";
$matricula = "";

$_path = "file";




$tmp = $_FILES[$v1]['tmp_name'];
insertID($staffID);
insertImage($staffID, "passport");
//getImageFromDB($staffID, "passport");




$tmp = $_FILES[$v2]['tmp_name'];
insertPDF($staffID, "matricula");
//getPdfFromDB($staffID, "matricula");



$fPassport = getImageFromDB($staffID, "passport", $passportUnique);
$fMatricula = getPdfFromDB($staffID, "matricula", $matriculaUnique);

insertStaffIDInFile($staffID);
updateFileTB("passport", $fPassport, $staffID);
updateFileTB("matricula", $fMatricula, $staffID);

$conn->close();


function insertID($staffID)
{
  global $conn;
  //Check if staffID already exists
  $query = "SELECT staffID FROM `filetable` WHERE staffID = ?";
  $stmt = $conn->prepare($query);
  $stmt->bind_param("s", $staffID);
  $stmt->execute();
  $result = $stmt->get_result();
  if ($result->num_rows > 0) {
    echo "staffID already exists.";
  } else {
    //Insert staffID into filetable
    $query = "INSERT INTO `filetable` (staffID) VALUES (?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $staffID);
    $stmt->execute();
    if ($stmt->affected_rows > 0) {
      echo "staffID inserted successfully!";
    } else {
      echo "Error: " . $stmt->error;
    }
  }
  $stmt->close();

}



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



function getImageFromDB($staffID, $column,$uniqueID)
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
        if (!file_exists($folder)) {
            mkdir($folder);
        }
        $IDD = generateUniqueID();
        $file_path = $folder . "/" . $uniqueID. ".jpg";
        file_put_contents($file_path, $image_data);
        echo "Image saved successfully to " . $file_path;
    } else {
        echo "Error: staffID not found or no image found for the staff";
    }


    $stmt->close();

    return $file_path;
}





function getPdfFromDB($staffID, $column, $unique)
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
        $file_path = $folder . "/" . $unique . ".pdf";
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



function insertStaffIDInFile($staffID)
{
  global $conn;
  $updateResult = false;
  $insertResult = false;

  // Prepare statement to prevent SQL injection
  $selectStmt = mysqli_prepare($conn, "SELECT staffID FROM file WHERE staffID = ?");
  mysqli_stmt_bind_param($selectStmt, "s", $staffID);
  mysqli_stmt_execute($selectStmt);
  mysqli_stmt_store_result($selectStmt);

  if (mysqli_stmt_num_rows($selectStmt) > 0) {
    // StaffID already exists, update it
    $updateStmt = mysqli_prepare($conn, "UPDATE file SET staffID = ? WHERE staffID = ?");
    mysqli_stmt_bind_param($updateStmt, "ss", $staffID, $staffID);
    $updateResult = mysqli_stmt_execute($updateStmt);
    mysqli_stmt_close($updateStmt);
  } else {
    // StaffID doesn't exist, insert it
    $insertStmt = mysqli_prepare($conn, "INSERT INTO file (staffID) VALUES (?)");
    mysqli_stmt_bind_param($insertStmt, "s", $staffID);
    $insertResult = mysqli_stmt_execute($insertStmt);
    mysqli_stmt_close($insertStmt);
  }
  mysqli_stmt_close($selectStmt);
  if ($updateResult || $insertResult) {
    return true;
  } else {
    return false;
  }
}


function updateFileTB($col, $fPassport, $staffID)
{
  global $conn;

  try {
    // Sanitize the column name
    $col = mysqli_real_escape_string($conn, $col);
    // Sanitize the value
    $fPassport = mysqli_real_escape_string($conn, $fPassport);
    // Sanitize the staffID
    $staffID = mysqli_real_escape_string($conn, $staffID);
    $updateQuery = "UPDATE `file` SET $col = '$fPassport' WHERE staffID = '$staffID'";
    $updateResult = mysqli_query($conn, $updateQuery);
    if ($updateResult) {
      return true;
    } else {
      return false;
    }
  } catch (\Throwable $th) {
    //throw $th;
  }

}