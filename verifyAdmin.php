<?php
include "config.php";
session_start();


  if (isset($_SESSION['staffID'])) {
  } else {
    header('Location: index.php');
    exit;
  }

$id=$_SESSION["staffID"];

$n=0;
$i=0;



$sql = "SELECT * FROM sysadmin WHERE staffID=?";
$stmt = $conn->prepare($sql); 
$stmt->bind_param("s", $id);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $n=$row["username"];
    $i=$row["staffID"];

}


 if($n==0){
    header('Location: index.php');
    exit;
 }
 
 elseif($i==0){
    header('Location: index.php');
    exit;
 }