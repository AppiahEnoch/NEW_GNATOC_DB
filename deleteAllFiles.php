<?php


include "config.php";


$sql  =  "DELETE FROM memberbio";
$stmt = $conn->prepare($sql);
$stmt->execute();




function deleteAllFiles(){

  $files = glob('file/*'); // get all file names
  foreach($files as $file){ // iterate files
    if(is_file($file))
      unlink($file); // delete file
  }
  echo 1;
}









