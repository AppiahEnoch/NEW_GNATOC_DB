<?php
$_path = "file";
if ((isFolderEmpty($_path))) {
  include "readFiles.php";
}

if (isset($_SESSION)) {
  session_destroy();
}
session_start();
session_destroy();

function isFolderEmpty($_path)
{
    return (count(scandir($_path)) == 2);
}



