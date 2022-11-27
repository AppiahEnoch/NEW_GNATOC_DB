<?php

    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp' , 'pdf' , 'doc' ); // valid extensions
 
    $valid_extensions2 = array('pdf' , 'doc' ); // valid extensions PDF ONLY
 
    include_once 'config.php';
    session_start();
    //$_SESSION["staffID"]=1220016;
    $fileD=$_SESSION["staffID"];
    $staffID=$_SESSION["staffID"];
    
    $v1="file";
   
    $col=$_POST["text"];

    $newPath="";

   // echo 1;
    //exit();
   



//  copy paste session
    $path = 'upload/studyLeave/';
    $fileName = $_FILES[$v1]['name'];
    $tmp = $_FILES[$v1]['tmp_name'];
    $err = $_FILES[$v1]['error'];
   
    $newPath=getFilepath();
    

    




    

 
  
      
// prepare and bind
try{
    $sql = "UPDATE file SET $col=? WHERE staffID=?";
    $stmt = $conn->prepare($sql); 
    $stmt->bind_param("ss", $newPath,$staffID);
    $stmt->execute();

  echo $newPath;
 
  
  $stmt->close();
  $conn->close();


 // header("Location:memberBio7.html");
      
  }
  catch(Exception $e){
    echo $e;
      
  }
  

  
  





function getFilepath(){
  global $fileName,$tmp,$path,$valid_extensions,$fileD;

  try {
       // get uploaded file's extension
       $ext = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
       // can upload same image using rand function
       $final_image = rand(1000,1000000).$fileD.$fileName;
      // $final_image =$fileD.$fileName;
       // check's valid format

       if(!(in_array($ext, $valid_extensions))){
        exit();
       }
       
       $path = $path.strtolower($final_image); 
       move_uploaded_file($tmp,$path);
       
       return $path;
  } catch (\Throwable $th) {
    //throw $th;
  }
   
     
}
    

function getFilepath2(){
  global $fileName,$tmp,$path,$valid_extensions2,$fileD;

  try {
       // get uploaded file's extension
       $ext = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
       // can upload same image using rand function
       $final_image = rand(1000,1000000).$fileD.$fileName;
      // $final_image =$fileD.$fileName;
       // check's valid format

       if(!(in_array($ext, $valid_extensions2))){
        exit();
       }
       
       $path = $path.strtolower($final_image); 
       move_uploaded_file($tmp,$path);
       
       return $path;
  } catch (\Throwable $th) {
    //throw $th;
  }
   
     
}
    