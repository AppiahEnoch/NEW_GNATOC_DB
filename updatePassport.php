<?php
include "config.php";
if (!isset($_SESSION)) {
    session_start();
}


$fileD = $_SESSION["staffID"];
$staffID = $_SESSION["staffID"];

$v1 = "image";





//  copy paste session

$fileName = $_FILES[$v1]['name'];
$tmp = $_FILES[$v1]['tmp_name'];
insertImage($staffID, "passport");




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