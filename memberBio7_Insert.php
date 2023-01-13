<?php



include_once 'config.php';
session_start();
//
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

// prepare and bind
try {
  $sql = " UPDATE memberbio SET `rank`=?  WHERE staffID=?";

  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ss", $rank, $staffID);
  $stmt->execute();
  echo 1;
  $stmt->close();
  $conn->close();
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
    if (!file_exists($folder)) {
      mkdir($folder);
    }
    $IDD = generateUniqueID();
    $file_path = $folder . "/" . $staffID . $IDD . ".jpg";
    file_put_contents($file_path, $image_data);
    echo "Image saved successfully to " . $file_path;
  } else {
    echo "Error: staffID not found or no image found for the staff";
  }


  $stmt->close();
  $conn->close();
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
    if (!file_exists($folder)) {
      mkdir($folder);
    }
    $IDD = generateUniqueID();
    $file_path = $folder . "/" . $staffID . $IDD . ".pdf";
    file_put_contents($file_path, $pdf_data);
    echo "PDF saved successfully to " . $file_path;
  } else {
    echo "Error: staffID not found or no pdf found for the staff";
  }

  $stmt->close();
  $conn->close();
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