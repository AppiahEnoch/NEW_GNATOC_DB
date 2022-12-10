<?php
require_once "config.php";

$oldPassword=$_POST["oldPassword"];
$newPassword=$_POST["newPassword"];
$Password=$_POST["newPassword"];

$id=$_SESSION["staffID"];


$sql = "SELECT * FROM memberpassword WHERE staffID=?";
$stmt = $conn->prepare($sql); 
$stmt->bind_param("ss", $id,);
$stmt->execute();
$result = $stmt->get_result();
if ($row = $result->fetch_assoc()) {
     $value= $row['staffID'];
     $password= $row['password'];


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




function cleanInput($data){
    try {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
      } catch(Exception $e) {

      
        
      }
     return $data;
}



?>