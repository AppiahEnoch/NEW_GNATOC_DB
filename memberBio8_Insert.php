<?php


    $valid_extensions = array('pdf' , 'doc' ); // valid extensions PDF ONLY
 
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

    

//  copy paste session
    $path = 'upload/ghanaCard/';
    $fileName = $_FILES[$v1]['name'];
    $tmp = $_FILES[$v1]['tmp_name'];
    $ghanaCard=getFilepath();

 

    
    $path = 'upload/ssnitCard/';
    $fileName = $_FILES[$v2]['name'];
    $tmp = $_FILES[$v2]['tmp_name'];
    $ssnitCard=getFilepath();
    

   // $path = 'upload/voterCard/';
    //$fileName = $_FILES[$v3]['name'];
    //$tmp = $_FILES[$v3]['tmp_name'];
   // $voterCard=getFilepath();

   // exit();
    

      
// prepare and bind
try{
    $sql = "UPDATE file SET ghanaCard=?, ssnitCard=?, voterCard=? WHERE staffID=?";
    
    $stmt = $conn->prepare($sql); 
    $stmt->bind_param("ssss", $ghanaCard,$ssnitCard,$voterCard,$staffID);
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
  } catch (Throwable $th) {
    echo $th;
  }
   
     
}
    


    