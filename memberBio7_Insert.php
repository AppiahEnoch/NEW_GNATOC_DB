<?php


    $valid_extensions = array('pdf' , 'doc' ); // valid extensions PDF ONLY
 
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


//  copy paste session
    $path = 'upload/admission/';
    $fileName = $_FILES[$v1]['name'];
    $tmp = $_FILES[$v1]['tmp_name'];
    $admission=getFilepath();

    
    $path = 'upload/studyLeave/';
    $fileName = $_FILES[$v2]['name'];
    $tmp = $_FILES[$v2]['tmp_name'];
    $studyLeave=getFilepath();
    

    $path = 'upload/masterList/';
    $fileName = $_FILES[$v3]['name'];
    $tmp = $_FILES[$v3]['tmp_name'];
    $masterList=getFilepath();

   // exit();
    

      
// prepare and bind
try{
    $sql = "UPDATE file SET admission=?, studyLeave=?, masterList=?, rank=?  WHERE staffID=?";
    
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
  

  
  





function getFilepath(){
  global $fileName,$tmp,$path,$valid_extensions,$fileD;

  try {
       // get uploaded file's extension
       $ext = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
       // can upload same image using rand function
       $final_image = rand(1000,1000000).$fileD.$fileName;
      // $final_image =$fileD.$fileName;
       // check's valid format

       if(empty($ext)){
    
            
       }
       else{
        if(!(in_array($ext, $valid_extensions))){
            echo $fileName;
            exit();
           }
        
       }


       
       $path = $path.strtolower($final_image); 
       move_uploaded_file($tmp,$path);
       
       return $path;
  } catch (\Throwable $th) {
    echo $th;
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
    


    