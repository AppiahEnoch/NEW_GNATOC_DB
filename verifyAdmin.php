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
$i="";





$sql = "SELECT * FROM sysadmin WHERE staffID=?";
$stmt = $conn->prepare($sql); 
$stmt->bind_param("s", $id);
$stmt->execute();
$result = $stmt->get_result();
if ($row = $result->fetch_assoc()) {
    $n=$row["username"];
    $i=$row["staffID"];

}




$i=trim($i);

 if(empty($i)){
    header('Location: index.php');
    exit;
 }