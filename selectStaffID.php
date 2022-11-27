<?php
require_once "config.php";

$value="";

$id=$_POST["staffID"];





$sql = "SELECT * FROM memberpassword WHERE staffID=?";
$stmt = $conn->prepare($sql); 
$stmt->bind_param("s", $id);
$stmt->execute();
$result = $stmt->get_result();
if ($row = $result->fetch_assoc()) {
     $value= $row['staffID'];

     echo 'exist';

 

     exit();


     
   
}
else{


     
}



$sql = "SELECT * FROM memberbio WHERE staffID=?";
$stmt = $conn->prepare($sql); 
$stmt->bind_param("s", $id);
$stmt->execute();
$result = $stmt->get_result();
if ($row = $result->fetch_assoc()) {
     $value= $row['staffID'];
   
}





echo $value;
$stmt->close();
$conn->close();



?>