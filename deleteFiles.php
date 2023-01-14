<?php
if (!isset($_SESSION)) {
    session_start();
}

if(isset($_SESSION["staffID"])) {
    deleteFilesByID($_SESSION["staffID"]);
} else {
  // echo "staffID not set in session";
}

function deleteFilesByID($staffID) {
    $dir = "file/";
    $files = scandir($dir);
    foreach($files as $file) {
        if(strpos($file, $staffID) !== false) {
            unlink($dir.$file);
        }
    }
}
