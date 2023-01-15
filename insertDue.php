<?php
require_once 'config.php';

if (!isset($_SESSION)) {
    session_start();

}


$v1="staffID";
$v3="amount";
$v4="actualAmount";

// declare all fields
$staffID= cleanInput(   $_POST[$v1]);
$payedamount= cleanInput(   $_POST[$v3]);
$actualamount= cleanInput(   $_POST[$v4]);

$userID = $_SESSION["staffID"];


// array to test post and set status of vital variables
$arrayOfAlvoters=[$v1,$v3,$v4];
// function to clean user input
function cleanInput($data){
    try {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
      } catch(Exception $e) {
      }
     return $data;
}

// functin to test issetand post variables
function inputsAreCorrect( $arrayOfAlvoters) {
    $r=sizeof($arrayOfAlvoters)-1;
    for ($i = 0; $i <= $r; $i++) {
        $fieldName=$arrayOfAlvoters[$i];
     
        try{
              
        if (isset($_POST[$fieldName])) {

            if (empty($_POST[$fieldName])) {
                return false;
                
            }
            
        }
        else{
            
        
            return false;
        } 
        } 
        catch(Exception $e){

            
        }

      
      }
    
    return true;
  }


  // check to insert data if everything is fine.
  if(!inputsAreCorrect($arrayOfAlvoters)){
    exit();
  }
  



// prepare and bind
try{
    $stmt = $conn->prepare("INSERT INTO `due` (`staffID`, `payedamount`, `actualamount`, `userID`) VALUES (?,?,?,?)");
    $stmt->bind_param("sdds", $staffID, $payedamount, $actualamount, $userID);
    $stmt->execute();
  
} catch (Exception $e) {
    //echo $e;
} finally {
    $stmt->close();
  
}






$sql = "DELETE  FROM authentication  where staffID='$staffID'";
$result = mysqli_query($conn, $sql);

  
$code=createRandomPassword();
$level="0";
$stmt = $conn->prepare("INSERT INTO `authentication` (staffID, code,`level`) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $staffID, $code,$level);
  $stmt->execute();
  $stmt->close();





function createRandomPassword() { 
$chars = "abcdefghijkmnpqrstuvwxyz23456789"; 
$otp = "";
for ($i = 0; $i < 7; $i++) {
    $otp .= $chars[mt_rand(0, strlen($chars) - 1)];
}
return $otp;

}

echo $code;

$conn->close();














    





  
  