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



 
    $sql = "SELECT * FROM sysAdmin where staffID='$staffID'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
      // output data of each row
      if($row = mysqli_fetch_assoc($result)) {

        $value=$row["staffID"];
        $value=trim($value);
        if(!empty($value)){
            echo 0;
            exit();
        }
        
      
   
       
      }
    }


$stmt = $conn->prepare("INSERT INTO sysAdmin (staffID, email,mobile, username, password) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $staffID,$email,$mobile,$username, $password);

$stmt->execute();
$stmt->close();
$conn->close();
    echo 1;

    
}
catch(Exception $e){
    echo $e;
    
}







    





  
  