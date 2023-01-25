<?php
require_once "config.php";





$sql = "SELECT * FROM course";
$stmt = $conn->prepare($sql); 
$stmt->execute();
$result = $stmt->get_result();

if(empty($result)){
    
    exit();
}


 
while ($row = $result->fetch_assoc()) {
     $course= $row['course'];


     $return_arr[]= array(
        "course" => $course
    );
         
}

   echo  json_encode($return_arr);

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