<?php
require_once 'config.php';




$v1 = "fName";
$v2 = "mName";
$v3 = "lName";
$v4 = "regNumber";


// declare all fields
$fName = cleanInput($_POST[$v1]);
$mName = cleanInput($_POST[$v2]);
$lName = cleanInput($_POST[$v3]);
$regNumber = cleanInput($_POST[$v4]);


$fName=strtoupper($fName);
$mName=strtoupper($mName);
$lName=strtoupper($lName);



///

// array to test post and set status of vital variables
$arrayOfAllNames = [$v1, $v3, $v4];

// function to clean user input
function cleanInput($data)
{
  try {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
  } catch (Exception $e) {
  }
  return $data;
}





// functin to test issetand post variables
function inputsAreCorrect($arrayOfAllNames)
{
  $r = sizeof($arrayOfAllNames) - 1;


  for ($i = 0; $i <= $r; $i++) {
    $fieldName = $arrayOfAllNames[$i];

    try {


      if (isset($_POST[$fieldName])) {

        if (empty($_POST[$fieldName])) {

          echo  $fieldName;

          return false;
        }
      } else {


        return false;
      }
    } catch (Exception $e) {
    }
  }

  return true;
}



// check to insert data if everything is fine.
if (!inputsAreCorrect($arrayOfAllNames)) {
  exit();
}



// prepare and bind
try {



  session_start();


  //





  $staffID = $_SESSION["staffID"];




  $sql = "UPDATE memberbio SET fName=?, mName=?, lName=?, regNumber=?
    WHERE staffID=?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sssss", $fName, $mName, $lName, $regNumber, $staffID);

  $stmt->execute();
  $stmt->close();
  $conn->close();

  header("Location: memberBio3.php");
} catch (Exception $e) {
  echo $e;
}


