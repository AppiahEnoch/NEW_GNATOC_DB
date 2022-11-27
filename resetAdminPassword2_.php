<?php
require_once 'config.php';




$v1="staffID";
$v2="email";
$v3="mobile";
$v4="username";
$v5="password";



// declare all fields
$staffID= cleanInput( $_POST[$v1]);
$email= cleanInput($_POST[$v2]);
$mobile= cleanInput( $_POST[$v3]);
$username= cleanInput( $_POST[$v4]);
$password= cleanInput( $_POST[$v5]);






// array to test post and set status of vital variables
$arrayOfAllevels=[$v1,$v2,$v3,$v4,$v5];

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
 
  $OldStaffID= $_SESSION["staffID"];
    
    


    $sql = "UPDATE sysadmin SET staffID=?, email=?,mobile=?, username=?, password=?
    WHERE staffID=?";
    $stmt = $conn->prepare($sql); 
    $stmt->bind_param("ssssss", $staffID,$email,$mobile,$username, $password,$OldStaffID);

    $stmt->execute();
    $stmt->close();
    $conn->close();

    echo 1;

 


    
}
catch(Exception $e){
    echo $e;
    
}







    





  
  