<?php
require_once 'config.php';




$v1="admission";
$v2="ssnit";
//$v3="voter";



// declare all fields
$admission= cleanInput( $_POST[$v1]);
$ssnit= cleanInput(   $_POST[$v2]);
$voter= " ";







// array to test post and set status of vital variables
$arrayOfAlvoters=[$v1,$v2];

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



    session_start();
 
  
  //
  
  $staffID= $_SESSION["staffID"];
  $n="1";
    
    
  $sql = "UPDATE verified SET vcode=?
  WHERE staffID=?";
  $stmt = $conn->prepare($sql); 
  $stmt->bind_param("ss", $n, $staffID);
  $stmt->execute();

    $sql = "UPDATE memberbio SET admissionNumber=?, ssnitNumber=?, voterNumber=?
    WHERE staffID=?";
    $stmt = $conn->prepare($sql); 
    $stmt->bind_param("ssss", $admission,$ssnit,$voter,$staffID);

    $stmt->execute();
    $stmt->close();
    $conn->close();

    echo 1;

 


    
}
catch(Exception $e){
    echo $e;
    
}







    





  
  