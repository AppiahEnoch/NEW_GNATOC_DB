<?php
include "config.php";

if (!isset($_SESSION)) {
    session_start();
}



  if (isset($_SESSION['staffID'])) {
  } else {
    header('Location: index.php');
    exit;
  }



$id=$_SESSION["staffID"];

$email=0;
$code=0;


$sql = "SELECT * FROM verified WHERE staffID=?";
$stmt = $conn->prepare($sql); 
$stmt->bind_param("s", $id);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $email=$row["vemail"];
    $code=$row["vcode"];

   
}


 if($email==0){
    header('Location: memberBio1.html');
    exit;
 }
 
