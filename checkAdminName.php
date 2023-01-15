<?php
require_once "config.php";


$username= cleanInput($_POST["username"]);


$sql = "SELECT * FROM `sysadmin` WHERE username=?";
$stmt = $conn->prepare($sql); 
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
if ($row = $result->fetch_assoc()) {
    echo 1;
    exit;
   
   
}

echo 0;
exit;




function cleanInput($data){
    try {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
      } catch(Exception $e) {

      
        
      }
     return $data;
}