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

  
    
    $v1="ghanaCard";
    $v2="ssnitCard";
   // $v3="voterCard";
   
    $ghanaCard="";
    $ssnitCard="";
    $voterCard="not set";

    $_path="file";

    deleteFile($_path,$ghanaCard_unique);
    deleteFile($_path,$ssnit_unique);





//  copy paste session
$fileName = $_FILES[$v1]['name'];
$tmp = $_FILES[$v1]['tmp_name'];
$ghanaCard=getFilepath_doc($ghanaCard_unique);

 

    
  
    $fileName = $_FILES[$v2]['name'];
    $tmp = $_FILES[$v2]['tmp_name'];
    $ssnitCard=getFilepath_doc($ssnit_unique);
    

    

      
// prepare and bind
try{
    $sql = "UPDATE file SET ghanaCard=?, ssnitCard=?, voterCard=? WHERE staffID=?";
    
    $stmt = $conn->prepare($sql); 
    $stmt->bind_param("ssss", $ghanaCard,$ssnitCard,$voterCard,$staffID);
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
  
  function deleteFile($folder,$fileID){
    $files = glob($folder.'/*'); // get all file names
    $id = $fileID; // specific ID to search for
    foreach($files as $file){ // iterate files
      if(is_file($file) && strpos($file, $id) !== false) {
        unlink($file); // delete file
  
      }
  
    }
    }
    