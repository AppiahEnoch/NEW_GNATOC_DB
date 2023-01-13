<?php
include_once 'config.php';
session_start();
//
$fileD = $_SESSION["staffID"];
$staffID = $_SESSION["staffID"];

try {
    $id = trim($staffID);

    if (strlen($id) < 1) {
        exit();
    }
} catch (\Throwable $th) {
    //throw $th;
}



$old = $_POST["old_password"];
$new = $_POST["new_password"];

$correct_password = false;



$sql = "SELECT * FROM memberpassword WHERE staffID=? && `password`=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $id, $old);
$stmt->execute();
$result = $stmt->get_result();
if ($row = $result->fetch_assoc()) {
    $correct_password = true;
} else {

    $correct_password = false;

}


if (!$correct_password) {
    echo 0;
    exit;
}




// prepare and bind
try {
    $sql = "UPDATE memberpassword SET `password`=? WHERE staffID=?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $new, $staffID);
    $stmt->execute();
    echo 1;
    $stmt->close();
    $conn->close();
    // header("Location:memberBio7.php");

} catch (Exception $e) {
    echo $e;

}