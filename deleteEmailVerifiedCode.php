<?php

require_once 'config.php';
$staffID= $_POST['staffID'];


$n="1";

// prepare and bind
try{
    $sql = "DELETE  FROM verified  where staffID='$staffID'";
    $result = mysqli_query($conn, $sql);

    $stmt = $conn->prepare("INSERT INTO verified (staffID, vemail) VALUES (?, ?)");
    $stmt->bind_param("ss", $staffID, $n);
     $stmt->execute();
    $stmt->close();
 
        
    }
    catch(Exception $e){
    
    
      
    
       
        
    }
    






$sql = "DELETE  FROM emailVerification  where staffID='$staffID'";
$result = mysqli_query($conn, $sql);
echo 1;

$conn->close();

?>