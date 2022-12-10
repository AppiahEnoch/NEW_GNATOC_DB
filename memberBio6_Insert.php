<?php

    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp' , 'pdf' , 'doc' ); // valid extensions
 
    $valid_extensions2 = array('pdf' , 'doc' ); // valid extensions PDF ONLY
 
    include_once 'config.php';
    session_start();
   // $_SESSION["staffID"]=1220017;
    $fileD=$_SESSION["staffID"];
    $staffID=$_SESSION["staffID"];
    
    $v1="passport";
    $v2="matricula";
   
    $passport="";
    $matricula="";

    $path = 'upload/passport/';
    if ( !file_exists($path) ) {
        mkdir ($path, 0744);
    }
   
    file_put_contents ($dir.'/test.txt', 'Hello File');


//  copy paste session
    $path = 'upload/passport/';
    $fileName = $_FILES[$v1]['name'];
    $tmp = $_FILES[$v1]['tmp_name'];
    $passport=getFilepath();


    $path = 'upload/matricula/';
    if ( !file_exists($path) ) {
        mkdir ($path, 0744);
    }
    
    $fileName = $_FILES[$v2]['name'];
    $tmp = $_FILES[$v2]['tmp_name'];
    $matricula=getFilepath2();
   // echo $passport;
   // exit();
    

      
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
  global $fileName,$tmp,$path,$valid_extensions,$fileD;

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
    