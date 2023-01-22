<?php
include "config.php";
$_path = "file";




$file_path = "";

$staffIDs = selectAllStaffID();

if (!isset($_SESSION)) {
    session_start();
}

if ($staffIDs) {
 
    foreach ($staffIDs as $staffID) {

        $_SESSION["staffID"] = $staffID;
     
$passportUnique = $staffID . "passportAECleanCodes";
$studyLeaveUnique = $staffID . "studyLeaveAECleanCodes";
$masterListUnique = $staffID . "masterListAECleanCodes";
$matriculaUnique = $staffID . "matriculaAECleanCodes";
$ssnitUnique = $staffID . "ssnitCardAECleanCodes";
$ghanaCardUnique = $staffID . "ghanaCardAECleanCodes";
$admissionUnique = $staffID . "admissionAECleanCodes";
    
     



        $fPassport = getImageFromDB($staffID, "passport", $passportUnique);
        $fStudyLeave = getPdfFromDB($staffID, "studyLeave", $studyLeaveUnique);
        $fMasterList = getPdfFromDB($staffID, "masterlist", $masterListUnique);
        $fMatricula = getPdfFromDB($staffID, "matricula", $matriculaUnique);
        $fGhana = getPdfFromDB($staffID, "ghanacard", $ghanaCardUnique);
        $fSsnit = getPdfFromDB($staffID, "ssnitcard", $ssnitUnique);
        $fAdmission = getPdfFromDB($staffID, "admission", $admissionUnique);


        insertStaffID($staffID);
        updateFileTB("passport", $fPassport, $staffID);
        updateFileTB("studyLeave", $fStudyLeave, $staffID);
        updateFileTB("masterList", $fMasterList, $staffID);
        updateFileTB("matricula", $fMatricula, $staffID);
        updateFileTB("ghanacard", $fGhana, $staffID);
        updateFileTB("ssnitCard", $fSsnit, $staffID);
        updateFileTB("admission", $fAdmission, $staffID);


    }
}









function getImageFromDB($staffID, $column, $unique)
{
    global $conn, $_path, $file_path;
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

   
        $file_path = $folder . "/" . $unique . ".jpg";
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
    global $conn, $_path, $file_path;
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


function selectAllStaffID()
{
    global $conn;
    $selectQuery = "SELECT staffID FROM memberbio";
    $selectResult = mysqli_query($conn, $selectQuery);
    if (mysqli_num_rows($selectResult) > 0) {
        $staffIDs = array();
        while ($row = mysqli_fetch_assoc($selectResult)) {
            $staffIDs[] = $row['staffID'];
        }
        return $staffIDs;
    } else {
        return false;
    }
}