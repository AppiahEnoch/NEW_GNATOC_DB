<?php
require_once 'config.php';

$v3="code";

// declare all fields

$code= cleanInput( $_POST[$v3]);


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

  
  if (!isset($_SESSION)) {
    session_start();
}

  //$_SESSION["staffID"] = "1220016";

  $staffID = $_SESSION["staffID"];
  $stmt = $conn->prepare("SELECT * FROM `authentication` WHERE 
  staffID = ? AND code = ?");
  $stmt->bind_param("ss", $staffID,$code);
  $stmt->execute();
  //fetching result would go here, but will be covered later
  $result = $stmt->get_result();
  if ($row = $result->fetch_assoc()) {
       $n= $row['staffID'];
       $p= $row['code'];

       echo "$n|$p";
       exit();
     
  }
  else{

    echo $staffID."|".$code;
    
  }

  
  
  $stmt->close();
  $conn->close();
  
    
}
catch(Exception $e){
  echo $e;
}





  
  