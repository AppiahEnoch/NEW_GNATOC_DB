<?php

session_start();

  if (isset($_SESSION['staffID'])) {
} else {
  header('Location: index.php');
  exit;
}