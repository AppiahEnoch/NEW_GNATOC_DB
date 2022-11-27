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

  
    
    $v1="fName";
    $v2="mName";
    $v3="lName";

   // $v3="lName$lName";
   
    $fname= cleanInput($_POST[$v1]);
    $mName= cleanInput($_POST[$v2]);
    $lName= cleanInput($_POST[$v3]);


    

    

      
// prepare and bind
try{
    $sql = "UPDATE memberbio SET fName=?, mName=?, lName=? WHERE staffID=?";
    
    $stmt = $conn->prepare($sql); 
    $stmt->bind_param("ssss", $fname,$mName,$lName,$staffID);
    $stmt->execute();
     echo ''.$lName;
    $stmt->close();
    $conn->close();
    // header("Location:memberBio7.html");
    
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
    


    