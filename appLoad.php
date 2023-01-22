<?php
$_path = "file";
$file_path = "";
if ((isFolderEmpty($_path))) {
  include "readFiles.php";
}

if (isset($_SESSION)) {
  session_destroy();
}


function isFolderEmpty($_path)
{
    return (count(scandir($_path)) == 2);
}



