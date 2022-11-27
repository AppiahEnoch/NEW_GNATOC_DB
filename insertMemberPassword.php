<?php
require_once 'config.php';




$v1="staffID";
$v2="username";
$v3="password";

// declare all fields
$staffID= cleanInput( $_POST[$v1]);
$username= cleanInput(   $_POST[$v2]);
$password= cleanInput( $_POST[$v3]);



// array to test post and set status of vital variables
$arrayOfAllNames=[$v1,$v2,$v3];

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

$stmt = $conn->prepare("INSERT INTO memberpassword (staffID, username, password) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $staffID, $username, $password);


 $stmt->execute();

$stmt->close();
$conn->close();
    
}
catch(Exception $e){


  

   
    
}



  
  