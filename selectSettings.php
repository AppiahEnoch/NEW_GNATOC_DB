<?php
require_once "config.php";

$value = null;

$sql = "SELECT * FROM settings";
$stmt = $conn->prepare($sql); 
$stmt->execute();
$result = $stmt->get_result();



if ($row = $result->fetch_assoc()) {
    $value= $row['duesamount'];
}



echo $value;
$stmt->close();
$conn->close();
?>