<?php
require_once 'config.php';
include_once 'globals.php';


if (!isset($_SESSION)) {
    session_start();
}

$_path = "file";


$fileD = $_SESSION["staffID"];
$staffID = $_SESSION["staffID"];

$v1 = "image";





//  copy paste session

$fileName = $_FILES[$v1]['name'];
$tmp = $_FILES[$v1]['tmp_name'];
insertImage($staffID, "passport");



$fPassport = getImageFromDB($staffID, "passport", $passportUnique);
insertStaffID($staffID);
updateFileTB("passport", $fPassport, $staffID);



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


function generateUniqueID()
{
    // Get current timestamp
    $time = microtime(true);
    // Convert timestamp to a unique ID
    $id = uniqid($time, true);
    return $id;
}