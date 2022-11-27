<?php
require_once "config.php";

$value="";

$id=$_POST["username"];

$sql = "SELECT * FROM memberpassword WHERE username=?";
$stmt = $conn->prepare($sql); 
$stmt->bind_param("s", $id);
$stmt->execute();
$result = $stmt->get_result();
if ($row = $result->fetch_assoc()) {
     $value= $row['username'];
   
}

echo $value;
$stmt->close();
$conn->close();


?>