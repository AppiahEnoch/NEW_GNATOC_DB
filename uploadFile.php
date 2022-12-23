<?php

include_once 'config.php';

    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp' , 'pdf' , 'doc' ); // valid extensions
 
    $valid_extensions2 = array('pdf' , 'doc' ); // valid extensions PDF ONLY
 


    
    $v1="myProject";
    $v2="indexNumber";
  
   // $file=$_POST['myProject'];
    $id=$_POST[$v2];
    $fileD=$id;

    $newPath="";




   // echo 1;
    //exit();
   

    session_start();
    $_SESSION["ID"]=$id;

    //echo $file;

//  copy paste session
    $path = 'upload/';
    $fileName = $_FILES['myProject']['name'];
    $tmp = $_FILES[$v1]['tmp_name'];
   $newPath=getFilepath();


    echo $fileName;
    exit();
    

    




    

 
  
      
// prepare and bind
try{
    $sql = "UPDATE file SET $col=? WHERE staffID=?";
    $stmt = $conn->prepare($sql); 
    $stmt->bind_param("ss", $newPath,$staffID);
    $stmt->execute();

  echo 1;
 
  
  $stmt->close();
  $conn->close();


 // header("Location:memberBio7.php");
      
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
    