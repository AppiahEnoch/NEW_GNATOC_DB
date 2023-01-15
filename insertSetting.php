<?php
require_once 'config.php';
$v2="amount";
// declare all fields
$amount= cleanInput(   $_POST[$v2]);
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
  

  $sql = "DELETE  FROM settings";
$result = mysqli_query($conn, $sql);
// prepare and bind
try{
  $stmt = $conn->prepare("INSERT INTO `settings` (`duesamount`) VALUE(?)");
  $stmt->bind_param("s",$amount);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    echo 1;
}
catch(Exception $e){
    echo $e; 
}







    





  
  