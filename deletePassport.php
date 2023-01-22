<?php
require_once 'config.php';
include_once 'globals.php';

if (!isset($_SESSION)) {
    session_start();
}


function deleteFilesByID($passportUnique) {
    $dir = "file/";
    $files = scandir($dir);
    foreach($files as $file) {
        if(strpos($file, $passportUnique) !== false) {
            unlink($dir.$file);
        }
    }
}
