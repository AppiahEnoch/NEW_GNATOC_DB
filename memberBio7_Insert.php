<?php

$passport_unique="passportx@23UaG52_x-@@k3";
$matricula_unique="matriculax@23UaG52_x-@@k3";
$studyleave_unique="studyleavex@23UaG52_x-@@k3";
$masterlist_unique="masterlistx@23UaG52_x-@@k3";
$ssnit_unique="ssnitx@23UaG52_x-@@k3";
$ghanaCard_unique="ghanacardx@23UaG52_x-@@k3";
$admission_unique="admissionx@23UaG52_x-@@k3";


$ext_doc = array('pdf' , 'doc' ); // valid extensions PDF ONLY
 
    include_once 'config.php';
    session_start();
   // $_SESSION["staffID"]=1220017;
    $fileD=$_SESSION["staffID"];
    $staffID=$_SESSION["staffID"];
    
    $v1="admission";
    $v2="studyLeave";
    $v3="masterList";
    $_path="file";

    
  deleteFile($_path,$admission_unique);
  deleteFile($_path,$studyleave_unique);
  deleteFile($_path,$masterlist_unique);
    
  
   
    $admission="";
    $studyLeave="";
    $masterList="";
    $rank=cleanInput($_POST["rank"]);




//  copy paste session
  
    $fileName = $_FILES[$v1]['name'];
    $tmp = $_FILES[$v1]['tmp_name'];
    $admission=getFilepath_doc($admission_unique);

    
 
    $fileName = $_FILES[$v2]['name'];
    $tmp = $_FILES[$v2]['tmp_name'];
    $studyLeave=getFilepath_doc($studyleave_unique);
    


    $fileName = $_FILES[$v3]['name'];
    $tmp = $_FILES[$v3]['tmp_name'];
    $masterList=getFilepath_doc($masterlist_unique);



      
// prepare and bind
try{
    $sql = " UPDATE file SET admission=?, studyLeave=?, masterList=?, rank1=?  WHERE staffID=?";
    
    $stmt = $conn->prepare($sql); 
    $stmt->bind_param("sssss", $admission,$studyLeave,$masterList, $rank, $staffID);
    $stmt->execute();
     echo 1;
    $stmt->close();
    $conn->close();
    // header("Location:memberBio7.php");
    
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
  

function cleanInput($data){
  try {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
    } catch(Exception $e) {

    
      
    }
   return $data;
}
    

function deleteFile($folder,$fileID){
  $files = glob($folder.'/*'); // get all file names
  $id = $fileID; // specific ID to search for
  foreach($files as $file){ // iterate files
    if(is_file($file) && strpos($file, $id) !== false) {
      unlink($file); // delete file

    }


  }
  }
    