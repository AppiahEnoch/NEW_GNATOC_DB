<?php
require_once "config.php";

$value="";

$id= cleanInput($_POST["id"]);

$email="";
$userName="";
$password="";
$fname="";
$lname="";


$adminName="";
$adminPassword="";
$adminEmail="";




$sql = "SELECT * FROM sysadmin WHERE staffID=?";
$stmt = $conn->prepare($sql); 
$stmt->bind_param("s", $id);
$stmt->execute();
$result = $stmt->get_result();
if ($row = $result->fetch_assoc()) {
     $adminName= $row['username'];
     $adminPassword= $row['password'];
     $adminEmail= $row['email'];
     
}


try {

 $isAdmi=trim($adminEmail);
 
    if(strlen($isAdmi)>2){

$real="";
        
        echo "$real|$adminName|$adminPassword|$adminEmail";
    

        exit();
    }
    
} catch (\Throwable $th) {
    //throw $th;
}





$sql = "SELECT * FROM memberPassword WHERE staffID=?";
$stmt = $conn->prepare($sql); 
$stmt->bind_param("s", $id);
$stmt->execute();
$result = $stmt->get_result();
if ($row = $result->fetch_assoc()) {
     $userName= $row['username'];
     $password= $row['password'];
     
}


$sql = "SELECT * FROM memberBio WHERE staffID=?";
$stmt = $conn->prepare($sql); 
$stmt->bind_param("s", $id);
$stmt->execute();
$result = $stmt->get_result();
if ($row = $result->fetch_assoc()) {
     $email= $row['email'];
     $fname= $row['fName'];
     $lname= $row['lName'];
     
  
     
}







$boiName=$fname."  ".$lname;

echo "$boiName|$userName|$password|$email";
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