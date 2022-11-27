<?php
require_once 'config.php';


$v2="email";
$v3="code";

// declare all fields

$email= cleanInput($_POST[$v2]);
$code= cleanInput( $_POST[$v3]);



// array to test post and set status of vital variables
$arrayOfAllNames=[$v2,$v3];

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

  $stmt = $conn->prepare("SELECT * FROM emailverification WHERE 
  email = ? AND code = ?");
  $stmt->bind_param("ss", $email,$code);
  $stmt->execute();
  //fetching result would go here, but will be covered later
  $result = $stmt->get_result();
  if ($row = $result->fetch_assoc()) {
       $n= $row['email'];
       $p= $row['code'];

       echo $p;
       exit();
     
  }
  else{
    echo 0;
  }

  
  
  $stmt->close();
  $conn->close();
  
    
}
catch(Exception $e){
    
}





  
  