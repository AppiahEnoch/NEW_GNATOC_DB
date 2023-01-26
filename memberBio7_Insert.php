<?php
require_once 'config.php';
include_once 'globals.php';

if (!isset($_SESSION)) {
  session_start();
}
$fileD = $_SESSION["staffID"];
$staffID = $_SESSION["staffID"];

$v1 = "admission";
$v2 = "studyLeave";
$v3 = "masterList";
$_path = "file";

$admission = "";
$studyLeave = "";
$masterList = "";
$rank = cleanInput($_POST["rank"]);

//  copy paste session

$fileName = $_FILES[$v1]['name'];
$tmp = $_FILES[$v1]['tmp_name'];
insertPDF($staffID, $v1);



$fileName = $_FILES[$v2]['name'];
$tmp = $_FILES[$v2]['tmp_name'];
insertPDF($staffID, $v2);




$fileName = $_FILES[$v3]['name'];
$tmp = $_FILES[$v3]['tmp_name'];
insertPDF($staffID, $v3);



$fAdmission = getPdfFromDB($staffID, "admission", $admissionUnique);
$fStudyLeave = getPdfFromDB($staffID, "studyLeave", $studyLeaveUnique);
$fMasterList = getPdfFromDB($staffID, "masterlist", $masterListUnique);




insertStaffID($staffID);
updateFileTB("admission", $fAdmission, $staffID);
updateFileTB("studyLeave", $fStudyLeave, $staffID);
updateFileTB("masterList", $fMasterList, $staffID);

















// prepare and bind
try {
  $sql = " UPDATE memberbio SET rank1=?  WHERE staffID=?";

  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ss", $rank, $staffID);
  $stmt->execute();
  echo 1;
  $stmt->close();

  // header("Location:memberBio7.php");

} catch (Exception $e) {
  echo $e;

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































function cleanInput($data)
{
  try {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
  } catch (Exception $e) {
  }
  return $data;
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







function insertStaffID($staffID)
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