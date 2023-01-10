<?php
require_once 'config.php';



$v2="staffID";
$v3="level";




// declare all fields
$code="";
$staffID= cleanInput(   $_POST[$v2]);
$level= cleanInput(   $_POST[$v3]);







// array to test post and set status of vital variables
$arrayOfAlvoters=[$v2];

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



  $sql = "DELETE  FROM authentication  where staffID='$staffID'";
  $result = mysqli_query($conn, $sql);

    
  $code=createRandomPassword();

  $stmt = $conn->prepare("INSERT INTO `authentication` (staffID, code,`level`) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $staffID, $code,$level);
    $stmt->execute();
    $stmt->close();
    $conn->close();

    echo $code;



 


    
}
catch(Exception $e){
    echo $e;
    
}



function createRandomPassword() { 
  $chars = "abcdefghijkmnpqrstuvwxyz23456789"; 
  $otp = "";
  for ($i = 0; $i < 7; $i++) {
      $otp .= $chars[mt_rand(0, strlen($chars) - 1)];
  }
  return $otp;

} 



    





  
  