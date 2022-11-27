<?php
require_once "config.php";

$value="";


$username= cleanInput($_POST["username"]);
$password= cleanInput($_POST["password"]);





session_start();
$staffD="";


$sql = "SELECT * FROM sysAdmin WHERE username=? AND password=?";
$stmt = $conn->prepare($sql); 
$stmt->bind_param("ss", $username,$password);
$stmt->execute();
$result = $stmt->get_result();
if ($row = $result->fetch_assoc()) {
    
    $_SESSION["staffID"]= $row["staffID"];

    echo 1;
}
else{
    echo 0;
exit();
     
}


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