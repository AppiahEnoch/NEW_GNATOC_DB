<?php
  include_once 'config.php';

  session_start();
  $_SESSION["staffID"]=1220016;
  $fileD=$_SESSION["staffID"];
  $staffID=$_SESSION["staffID"];
  $tablename="file";



  // begin one insert

 $file="passport";
  if (isset($_FILES[$file])) {
    $filepath = $_FILES[$file]['tmp_name'];
    $filename = $_FILES[$file]['name'];
  }

  $columnname="passportB";
  insertPassport($filepath, $filename, $tablename, $columnname, $conn);
// end one insert





  // begin one insert
 $file="matricula";
 $columnname="matriculaB";
  if (isset($_FILES[$file])) {
    $filepath = $_FILES[$file]['tmp_name'];
    $filename = $_FILES[$file]['name'];
  }

  insertMatricula($filepath, $filename, $tablename, $columnname, $conn);
// end one insert










  function insertPassport($filepath, $filename, $tablename, $columnname,$conn) {
    // Open the file in binary mode
    $fp = fopen($filepath, 'rb');
  
    // Read the file into a variable
    $fileContent = fread($fp, filesize($filepath));
  
    // Escape the binary data for use in a MySQL query
    $escaped = bin2hex($fileContent);
  
    // Construct the query
   // $query = "INSERT INTO $tablename ($columnname) VALUES ('$escaped')";
  
    // Execute the query
   // mysqli_query($conn, $query);

   $staffID="1220016";

    $stmt = $conn->prepare("INSERT INTO file (staffID, passportB,passport)
    VALUES (?, ?, ?)");
   $stmt->bind_param("sss", $staffID, $escaped,$filename);
   $stmt->execute();
 
   echo 1;
  
   





  
    // Close the file
    fclose($fp);

    echo 1;
  }
  function insertMatricula($filepath, $filename, $tablename, $columnname,$conn) {
    // Open the file in binary mode
    $fp = fopen($filepath, 'rb');
  
    // Read the file into a variable
    $fileContent = fread($fp, filesize($filepath));
  
    // Escape the binary data for use in a MySQL query
    $escaped = bin2hex($fileContent);
  
    // Construct the query
   // $query = "INSERT INTO $tablename ($columnname) VALUES ('$escaped')";
  
    // Execute the query
   // mysqli_query($conn, $query);

   $staffID="1220016";


$sql = "UPDATE `file` SET matriculaB=?, matricula=?  WHERE staffID=?";
$stmt = $conn->prepare($sql); 
$stmt->bind_param("sss", $escaped,$filename,$staffID);
$stmt->execute();
 
   echo 1;
  
   
   $stmt->close();
   $conn->close();




  
    // Close the file
    fclose($fp);

    echo 1;
  }
  
  
