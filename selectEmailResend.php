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

  $chars = "abcdefghijkmnopqrstuvwxyz023456789"; 
  srand((double)microtime()*1000000); 
  $i = 0; 
  $pass = '' ; 

  while ($i <= 3) { 
      $num = rand() % 33; 
      $tmp = substr($chars, $num, 1); 
      $pass = $pass . $tmp; 
      $i++; 
  } 

  return $pass; 

} 

?>