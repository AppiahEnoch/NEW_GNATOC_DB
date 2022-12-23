<?php


 
    include_once 'config.php';
    session_start();
   // $_SESSION["staffID"]=1220016;
    $fileD=$_SESSION["staffID"];
    $staffID=$_SESSION["staffID"];

    try {
        $id=  trim($staffID);

        if(strlen($id)<1){
            exit();
        }
    } catch (\Throwable $th) {
        //throw $th;
    }

  
    
    $v1="value";


   // $v3="lName$lName";
   
    $value= cleanInput($_POST[$v1]);
    $col="studyLeaveStatus";
;


    

    

      
// prepare and bind
try{
    $sql = "UPDATE memberbio SET $col =? WHERE staffID=?";
    
    $stmt = $conn->prepare($sql); 
    $stmt->bind_param("ss", $value,$staffID);
    $stmt->execute();
     echo ''.$value;
    $stmt->close();
    $conn->close();
    // header("Location:memberBio7.php");
    
  }
  catch(Exception $e){
    echo $e;
      
  }
  

  
  


  function cleanInput($data){
    try {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
      } catch(Exception $e) {

      
        
      }
     return $data;
}
    


    