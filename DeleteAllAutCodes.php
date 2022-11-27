<?php

require_once 'config.php';

$sql = "DELETE  FROM authentication";
$result = mysqli_query($conn, $sql);
echo 1;

$conn->close();

?>