<?php
$dir = "file";
check_dir($dir);
echo "||";
check_dir_permissions($dir);
echo "||";
check_file_permissions($dir);

function check_dir($dir) {
    if (file_exists($dir)) {
      echo "File or directory exists";
    } else {
      echo "File or directory does not exist";
    }
  }

check_file_permissions($dir);  
  
  
  
  function check_dir_permissions($dir) {
    if (is_readable($dir) && is_writable($dir)) {
      echo "Directory is readable and writable";
    } else {
      echo "Directory is not readable and writable";
    }
  }
  
  
  
  function check_file_permissions($dir) {
    if (is_dir($dir)) {
      if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
          if ($file != "." && $file != "..") {
            $filepath = $dir . '/' . $file;
            if (is_writable($filepath)) {
              echo "$file is writable<br>";
            } else {
              echo "$file is not writable<br>";
            }
          }
        }
        closedir($dh);
      }
    }
  }
  