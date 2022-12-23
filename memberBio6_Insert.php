<?php

$passport_unique="passportx@23UaG52_x-@@k3";
$matricula_unique="matriculax@23UaG52_x-@@k3";
$studyleave_unique="studyleavex@23UaG52_x-@@k3";
$masterlist_unique="masterlistx@23UaG52_x-@@k3";
$ssnit_unique="ssnitx@23UaG52_x-@@k3";
$ghanaCard_unique="ghanacardx@23UaG52_x-@@k3";

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
    $passport=getFilepath_img($passport_unique);


    $fileName = $_FILES[$v2]['name'];
    $tmp = $_FILES[$v2]['tmp_name'];
    $matricula=getFilepath_doc($matricula_unique);

  

    



      
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
  

  
  






function getFilepath_doc($unique){
  global $fileName,$tmp,$ext_doc,$fileD,$_path;
  

  try {
       // get uploaded file's extension
       $ext = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
       // can upload same image using rand function
       $final_image = rand(1000,1000000).$unique.$fileD.$fileName;
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
    

function getFilepath_img($unique){
  global $fileName,$tmp,$ext_img,$fileD,$_path;

  try {
       // get uploaded file's extension
       $ext = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
       // can upload same image using rand function
       $final_image = rand(1000,1000000).$unique.$fileD.$fileName;
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
    


    