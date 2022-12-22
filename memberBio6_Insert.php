<?php

    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp' , 'pdf' , 'doc' ); // valid extensions
 
    $valid_extensions2 = array('pdf' , 'doc' ); // valid extensions PDF ONLY
 
    include_once 'config.php';
    session_start();
    $_SESSION["staffID"]=1220016;
    $fileD=$_SESSION["staffID"];
    $staffID=$_SESSION["staffID"];
    
    $v1="passport";
    $v2="matricula";
   
    $passport="";
    $matricula="mmmmm";





   //echo $group;
   // exit;


$path ="file";




/*
if (file_exists($path)) {
  echo "EXIST||";
} else {
  echo "DO NOT EXIST||";
}




if (is_readable($path)) {
  echo "readable||";
} else {
  echo " NOT readable||";
}





*/
if (is_writable($path)) {
echo "Writable|| ";
} else {
  echo " NOT writable";
}



 

 /*
    $fileName = $_FILES[$v1]['name'];
    $tmp = $_FILES[$v1]['tmp_name'];
    $passport=getFilepath();

*/
$target_dir ="file";
$target_file = $target_dir . '/' . basename($_FILES[$v1]['name']);
if (!move_uploaded_file($_FILES[$v2]['tmp_name'], $target_file)) {
  $error = error_get_last();
  die('Error: ' . $error['message']);
}
    echo $target_file;
    exit;

    

      
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
  

  
  





function getFilepath(){
  global $fileName,$tmp,$valid_extensions,$fileD,$path;

  try {
       // get uploaded file's extension
       $ext = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
       // can upload same image using rand function
       $final_image = rand(1000,1000000).$fileD.$fileName;
      // $final_image =$fileD.$fileName;
       // check's valid format

       if(!(in_array($ext, $valid_extensions))){
        exit;
       }
       
       $path = $path.strtolower($final_image); 
       move_uploaded_file($tmp,$path);
       
       return $path;
  } catch (\Throwable $th) {
    throw $th;
  }
   
     
}
    

function getFilepath2(){
  global $fileName,$tmp,$path,$valid_extensions2,$fileD,$path;;

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
    