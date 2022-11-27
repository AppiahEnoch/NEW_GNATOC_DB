<?php
require_once 'config.php';

$v3="staffID";

// declare all fields

$staffID= cleanInput( $_POST[$v3]);
$code="";
$email="";


// array to test post and set status of vital variables
$arrayOfAllNames=[$v3];

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



  $stmt = $conn->prepare("SELECT * FROM authentication WHERE 
  staffID = ?");
  $stmt->bind_param("s", $staffID);
  $stmt->execute();
  //fetching result would go here, but will be covered later
  $result = $stmt->get_result();
  if ($row = $result->fetch_assoc()) {
       $code= $row['code'];
    
     
  }



  $stmt = $conn->prepare("SELECT * FROM memberbio WHERE 
  staffID = ?");
  $stmt->bind_param("s", $staffID);
  $stmt->execute();
  //fetching result would go here, but will be covered later
  $result = $stmt->get_result();
  if ($row = $result->fetch_assoc()) {
       $email= $row['email'];
     
     
  }

  echo "$code|$email"; 
  
  $stmt->close();
  $conn->close();
  
    
}
catch(Exception $e){
    
}





  
  