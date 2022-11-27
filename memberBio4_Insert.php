<?php
require_once 'config.php';




$v1="gender";
$v2="studyLeaveStatus";
$v3="level";
$v4="dob";



// declare all fields
$gender= cleanInput( $_POST[$v1]);
$studyleaveStatus= cleanInput($_POST[$v2]);
$level= cleanInput( $_POST[$v3]);
$dob= cleanInput( $_POST[$v4]);






// array to test post and set status of vital variables
$arrayOfAllevels=[$v1,$v2,$v3,$v4];

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
function inputsAreCorrect( $arrayOfAllevels) {
    $r=sizeof($arrayOfAllevels)-1;

    
    for ($i = 0; $i <= $r; $i++) {
        $fieldName=$arrayOfAllevels[$i];
     
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
  if(!inputsAreCorrect($arrayOfAllevels)){
    exit();
  }



// prepare and bind
try{



    session_start();
 
  
 // $_SESSION["staffID"]="1220016";
  
  $staffID= $_SESSION["staffID"];
    
    


    $sql = "UPDATE memberbio SET gender=?, studyLeaveStatus=?, level=?, dob=?
    WHERE staffID=?";
    $stmt = $conn->prepare($sql); 
    $stmt->bind_param("sssss", $gender,$studyleaveStatus,$level,$dob, $staffID);

    $stmt->execute();
    $stmt->close();
    $conn->close();

    echo 1;

 


    
}
catch(Exception $e){
    echo $e;
    
}







    





  
  