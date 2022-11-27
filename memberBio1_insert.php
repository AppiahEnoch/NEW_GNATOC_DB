<?php
require_once 'config.php';




$v1="staffID";
$v2="email";
$v3="mobile";
$v4="ghanaCard";

// declare all fields
$staffID= cleanInput( $_POST[$v1]);
$email= cleanInput(   $_POST[$v2]);
$mobile= cleanInput( $_POST[$v3]);
$ghanaCard= cleanInput( $_POST[$v4]);



session_start();
$code=createRandomPassword();

$_SESSION["staffID"]=$staffID;
$_SESSION["email"]=$email;
$_SESSION["code"]=$code;

// array to test post and set status of vital variables
$arrayOfAllNames=[$v1,$v2,$v3,$v4];

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
function inputsAreCorrect( $arrayOfAllNames) {
    $r=sizeof($arrayOfAllNames)-1;

    
    for ($i = 0; $i <= $r; $i++) {
        $fieldName=$arrayOfAllNames[$i];
     
        try{
            
            
        if (isset($_POST[$fieldName])) {

            if (empty($_POST[$fieldName])) {

                echo  $fieldName;
              
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
  if(!inputsAreCorrect($arrayOfAllNames)){
    exit();
  }






// prepare and bind
try{

$stmt = $conn->prepare("INSERT INTO memberbio (staffID, email , mobile,ghanaCard)
 VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $staffID, $email, $mobile,$ghanaCard);

//echo 1;
 //$stmt->execute();


 $stmt = $conn->prepare("INSERT INTO emailverification (staffID, email,code)
 VALUES (?, ?, ?)");
$stmt->bind_param("sss", $staffID, $email,$code);
$stmt->execute();
echo 2;

$stmt->close();
$conn->close();


    
}
catch(Exception $e){
    
}






function createRandomPassword() { 

  $chars = "abcdefghijkmnopqrstuvwxyz023456789"; 
  srand((double)microtime()*1000000); 
  $i = 0; 
  $pass = '' ; 

  while ($i <= 10) { 
      $num = rand() % 33; 
      $tmp = substr($chars, $num, 1); 
      $pass = $pass . $tmp; 
      $i++; 
  } 

  return $pass; 

} 
    





  
  