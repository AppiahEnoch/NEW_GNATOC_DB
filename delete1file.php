<?php

$folder=$_POST["folder"];
$fileID=$_POST["id"];


deleteFile($folder,$fileID);

function deleteFile($folder,$fileID){
    $files = glob($folder.'/*'); // get all file names
    $id = $fileID; // specific ID to search for
    foreach($files as $file){ // iterate files
      if(is_file($file) && strpos($file, $id) !== false) {
        unlink($file); // delete file

        
      }

      echo 1;

    }
    }