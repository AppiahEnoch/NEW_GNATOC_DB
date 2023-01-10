<?php
require_once "config.php";

$value="";

$id=$_POST["staffID"];
$email="";
$code=createRandomPassword();




$sql = "UPDATE emailverification SET code=? WHERE staffID=?";
$stmt = $conn->prepare($sql); 
$stmt->bind_param("ss", $code,$id);
$stmt->execute();





$sql = "SELECT * FROM emailverification WHERE staffID=?";
$stmt = $conn->prepare($sql); 
$stmt->bind_param("s", $id);
$stmt->execute();
$result = $stmt->get_result();
if ($row = $result->fetch_assoc()) {
     $value= $row['staffID'];
     $email=$row['email'];
     $code=$row['code'];
     echo "$email|$code";
}


$stmt->close();
$conn->close();



function createRandomPassword() { 
  $chars = "abcdefghijkmnpqrstuvwxyz23456789"; 
  $otp = "";
  for ($i = 0; $i < 7; $i++) {
      $otp .= $chars[mt_rand(0, strlen($chars) - 1)];
  }
  return $otp;

} 

?>