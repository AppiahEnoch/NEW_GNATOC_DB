<?php

    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt'); // valid extensions
    $path = 'picture/'; // upload directory
   
    include_once 'config.php';
   
  
    
       
    $img = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];

   
    // get uploaded file's extension
    $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
    // can upload same image using rand function
    $final_image = rand(1000,1000000).$img;
    // check's valid format
    if(in_array($ext, $valid_extensions)) 
    { 
    $path = $path.strtolower($final_image); 
    if(move_uploaded_file($tmp,$path)) 
    {




      
// prepare and bind
try{
  session_start();
  
  $staffID=$_SESSION["staffID"];

  
   $stmt = $conn->prepare("INSERT INTO file (staffID, passport,matricula)
   VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $staffID, $email,$code);
  
  
  $stmt->execute();
  $stmt->close();
  $conn->close();
      
  }
  catch(Exception $e){
      
  }
  
  
    




    








    }
    } 
    else 
    {
    
    }
echo "vvvv";
    