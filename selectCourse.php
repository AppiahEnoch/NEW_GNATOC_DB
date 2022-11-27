<?php
require_once "config.php";

$availabeCourse="";

$keyword= cleanInput($_POST["keyword"]);
$word = "%$keyword%"; 



$sql = "SELECT * FROM course WHERE course LIKE ?";
$stmt = $conn->prepare($sql); 
$stmt->bind_param("s", $word);
$stmt->execute();
$result = $stmt->get_result();

if(empty($result)){
    
    exit();
}

  //echo empty($result);
 echo "<ul id='courseList'>";
 
while ($row = $result->fetch_assoc()) {
     $availabeCourse= $row['course'];
         echo "<li>" . $availabeCourse . "</li>";
        
}
echo "</ul>";

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