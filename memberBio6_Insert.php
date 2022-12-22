<?php

    $ext_img = array('jpeg', 'jpg', 'png', 'gif', 'bmp'); // valid extensions
 
    $ext_doc = array('pdf' , 'doc' ); // valid extensions PDF ONLY
 
    include_once 'config.php';
    session_start();
    $_SESSION["staffID"]=1220016;
    $fileD=$_SESSION["staffID"];
    $staffID=$_SESSION["staffID"];
    
    $v1="passport";
    $v2="matricula";
   
    $passport="";
    $matricula="";

  $_path ="file";


    $fileName = $_FILES[$v1]['name'];
    $tmp = $_FILES[$v1]['tmp_name'];
    $passport=getFilepath_img();


    $fileName = $_FILES[$v2]['name'];
    $tmp = $_FILES[$v2]['tmp_name'];
    $matricula=getFilepath_doc();

  

    



      
// prepare and bind
try{

   $stmt = $conn->prepare("INSERT INTO file (staffID, passport,matricula)
   VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $staffID, $passport,$matricula);
  $stmt->execute();

  echo 1;
 
  
  $stmt->close();
  $conn->close();


 // header("Location:memberBio7.html");
      
  }
  catch(Exception $e){
    echo $e;
      
  }
  

  
  


  function get_file_path($v1){
    
$target_dir = $_path;
$target_file = $target_dir . '/' . basename($_FILES[$v1]['name']);
if (!move_uploaded_file($_FILES[$v1]['tmp_name'], $target_file)) {
  $error = error_get_last();
  die('Error: ' . $error['message']);
  exit;
}

return $target_file;
  }




function getFilepath_doc(){
  global $fileName,$tmp,$ext_doc,$fileD,$_path;

  try {
       // get uploaded file's extension
       $ext = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
       // can upload same image using rand function
       $final_image = rand(1000,1000000).$fileD.$fileName;
      // $final_image =$fileD.$fileName;
       // check's valid format

       if(!(in_array($ext, $ext_doc))){
        exit;
       }
       $final_path = $_path. '/'.strtolower($final_image); 
       move_uploaded_file($tmp,$final_path);
       
       return  $final_path;
  } catch (\Throwable $th) {
    throw $th;
  }
   
     
}
    

function getFilepath_img(){
  global $fileName,$tmp,$ext_img,$fileD,$_path;

  try {
       // get uploaded file's extension
       $ext = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
       // can upload same image using rand function
       $final_image = rand(1000,1000000).$fileD.$fileName;
      // $final_image =$fileD.$fileName;
       // check's valid format

       if(!(in_array($ext, $ext_img))){
        exit;
       }
       $final_path = $_path. '/'.strtolower($final_image); 
       move_uploaded_file($tmp,$final_path);
       
       return  $final_path;
  } catch (\Throwable $th) {
    throw $th;
  }
   
     
}
    


    