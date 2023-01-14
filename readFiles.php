<?php
include "config.php";
include_once 'globals.php';
include_once 'deleteFiles.php';

$_path = "file";

$staffID = $_SESSION["staffID"];

$fPassport = getImageFromDB($staffID, "passport", $passportUnique);
$fStudyLeave = getPdfFromDB($staffID, "studyLeave", $studyLeaveUnique);
$fMasterList = getPdfFromDB($staffID, "masterlist", $masterListUnique);
$fMatricula = getPdfFromDB($staffID, "matricula", $matriculaUnique);
$fGhana = getPdfFromDB($staffID, "ghanacard", $ghanaCardUnique);
$fSsnit = getPdfFromDB($staffID, "ssnitcard", $ssnitUnique);
$fAdmission = getPdfFromDB($staffID, "admission", $admissionUnique);









function getImageFromDB($staffID, $column, $unique)
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
        $file_path = $folder . "/" . $unique . $IDD . ".jpg";
        file_put_contents($file_path, $image_data);
        // echo "Image saved successfully to " . $file_path;
    } else {
        //echo "Error: staffID not found or no image found for the staff";
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
        $file_path = $folder . "/" . $unique . $IDD . ".pdf";
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