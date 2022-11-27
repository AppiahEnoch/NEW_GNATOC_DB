<?php

require_once 'config.php';

$staffID= $_POST['staffID'];

$sql = "DELETE  FROM emailVerification  where staffID='$staffID'";
$result = mysqli_query($conn, $sql);
echo 1;

$conn->close();

?>