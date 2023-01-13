<?php
require_once 'config.php';





$v2="username";
$v3="password";
$pageNumber=0;
// declare all fields

$username= cleanInput($_POST[$v2]);
$password= cleanInput( $_POST[$v3]);

// array to test post and set status of vital variables
$arrayOfAllNames=[$v2,$v3];

// function to clean user input
function cleanInput($data){
    try {
        $data = aeTrim($data);
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


  $correctInput=false;



  $stmt = $conn->prepare("SELECT * FROM sysadmin WHERE 
  username = ? AND password = ?");
  $stmt->bind_param("ss", $username,$password);
  $stmt->execute();

  //fetching result would go here, but will be covered later
  $result = $stmt->get_result();

  if ($row = $result->fetch_assoc()) {
       $n= $row['username'];
       $p= $row['password'];
       $staff= $row['staffID'];
 

      

       session_start();
    $_SESSION["staffID"]=$staff;

       echo 900;
    
       exit();
     
  }


  
  


  
// prepare and bind



  $stmt = $conn->prepare("SELECT * FROM memberpassword WHERE 
  username = ? AND password = ?");
  $stmt->bind_param("ss", $username,$password);
  $stmt->execute();

  //fetching result would go here, but will be covered later
  $result = $stmt->get_result();

  if ($row = $result->fetch_assoc()) {
       $n= $row['username'];
       $p= $row['password'];
       $s= $row['staffID'];
       $correctInput=true;


       session_start();
    $_SESSION["staffID"]=$s;

    $pageNumber=1;
      // exit();
     
  }
  else{
   $pageNumber=0;
    $correctInput=false;
  }




  // CHECK LAST PAGE OF USER

if($correctInput){






$id=$_SESSION["staffID"];


  
  /// search memberbio table for userlast 


  
  $sql = "SELECT * FROM memberbio WHERE staffID=?";
  $stmt = $conn->prepare($sql); 
  $stmt->bind_param("s", $id);
  $stmt->execute();
  $result = $stmt->get_result();
  if ($row = $result->fetch_assoc()) {
  
       if(empty(aeTrim($row['fName']))){
            $pageNumber=2; 
  
            echo $pageNumber;
            exit();
           
       }
       
       elseif(empty(aeTrim($row['admissionNumber']))){
            $pageNumber=3; 
            echo $pageNumber;
            exit();
    
       }

       elseif(empty(aeTrim($row['gender']))){
        $pageNumber=4; 
        echo $pageNumber;
        exit();

   }


   elseif(empty(aeTrim($row['course']))){
    $pageNumber=5; 
    echo $pageNumber;
    exit();

}
       
    
     
  }
  
  


/// search in file 

  $sql = "SELECT * FROM `filetable` WHERE staffID=?";
  $stmt = $conn->prepare($sql); 
  $stmt->bind_param("s", $id);
  $stmt->execute();
  $result = $stmt->get_result();
  if ($row = $result->fetch_assoc()) {
  
       if(empty(aeTrim($row['admission']))){
            $pageNumber=7; 
  
            echo $pageNumber;
            exit();
           
       }
       
       elseif(empty(aeTrim($row['ghanacard']))){
            $pageNumber=8; 
            echo $pageNumber;
            exit();
    
       }

       elseif(empty(aeTrim($row['passport']))){
        $pageNumber=6; 
        echo $pageNumber;
        exit();

   }
       
    
     
  }
  else{
       $pageNumber=6; 
       echo $pageNumber;
       exit();
       
  }



  
}





  
  
  $stmt->close();
  $conn->close();
  
    
  function aeTrim($var) {
    try {
        // Trim the variable
        if($var !== null && $var !== ''){
          $var = trim($var);
      }
      
        
        // Check if the variable is null or empty
        if(is_null($var) || $var === "") {
            return "";
        }
        
        return $var;
    } catch (Exception $e) {
      return "";
    }
}


echo $pageNumber;




  
  