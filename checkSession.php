<?php
session_start();
if (isset($_SESSION['staffID'])) {
    echo 1;
}
else{
    echo 0;
}