<?php


include "config.php";

$ID = $_POST["ID"];

$sql  =  "DELETE FROM due WHERE ID=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $ID);
$stmt->execute();











