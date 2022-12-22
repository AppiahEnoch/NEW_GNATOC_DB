<?php


$ext_doc = array('pdf' , 'doc' ); // valid extensions PDF ONLY
 
    include_once 'config.php';
    session_start();
   // $_SESSION["staffID"]=1220017;
    $fileD=$_SESSION["staffID"];
    $staffID=$_SESSION["staffID"];
    
    $v1="admission";
    $v2="studyLeave";
    $v3="masterList";

    
  
   
    $admission="";
    $studyLeave="";
    $masterList="";
    $rank=cleanInput($_POST["rank"]);

    $_path="file";


//  copy paste session
  
    $fileName = $_FILES[$v1]['name'];
    $tmp = $_FILES[$v1]['tmp_name'];
    $admission=getFilepath_doc();

    
 
    $fileName = $_FILES[$v2]['name'];
    $tmp = $_FILES[$v2]['tmp_name'];
    $studyLeave=getFilepath_doc();
    


    $fileName = $_FILES[$v3]['name'];
    $tmp = $_FILES[$v3]['tmp_name'];
    $masterList=getFilepath_doc();



      
// prepare and bind
try{
    $sql = " UPDATE file SET admission=?, studyLeave=?, masterList=?, rank1=?  WHERE staffID=?";
    
    $stmt = $conn->prepare($sql); 
    $stmt->bind_param("sssss", $admission,$studyLeave,$masterList, $rank, $staffID);
    $stmt->execute();
     echo 1;
    $stmt->close();
    $conn->close();
    // header("Location:memberBio7.html");
    
  }
  catch(Exception $e){
    echo $e;
      
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
         move_uploaded_file($tmp,$_path);
         
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
    


    