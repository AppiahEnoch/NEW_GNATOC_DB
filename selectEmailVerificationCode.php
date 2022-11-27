<?php
require_once "config.php";

$email="";
$code="";

session_start();
$id= $_SESSION["staffID"];



$sql = "SELECT * FROM emailverification WHERE staffID=?";
$stmt = $conn->prepare($sql); 
$stmt->bind_param("s", $id);
$stmt->execute();
$result = $stmt->get_result();
if ($row = $result->fetch_assoc()) {
     $email= $row['email'];
     $code= $row['code'];
}

echo "$email|$code|$id";
$stmt->close();
$conn->close();


?>