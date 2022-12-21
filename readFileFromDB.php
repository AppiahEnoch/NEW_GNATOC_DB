<?php
require_once "config.php";
$id="1220016";
readFileFromDB($conn, $id);

function readFileFromDB($connection, $id) {
    // Prepare a SELECT statement to retrieve the file from the database
    $stmt = $connection->prepare('SELECT passportB, passport FROM `file` WHERE staffID = ?');
    $stmt->bind_param('s', $id);
    $stmt->execute();
  
    // Bind the result to variables
    $stmt->bind_result($name, $file);
  
    // Fetch the result
    $stmt->fetch();
  
    // Close the statement
    $stmt->close();
  
    // Set the appropriate HTTP headers
    header('Content-Disposition: inline; filename="'.$name.'"');
  
  // Output the file contents
  // $file = base64_encode($file);
 // $f = "data:image/png;base64,$file";
    echo $file;
  }
  