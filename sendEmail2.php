<?php  
include "env.php";
require 'includes/Exception.php';
require 'includes/SMTP.php';
require 'includes/PHPMailer.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;




$sender=$SENDER;
$password=$EMAIL_PASSWORD;


$subject=$_POST['subject'];
$messageBody=$_POST['message'];
$receiver=$_POST['receiver'];

//$subject = "tttttt";
//$messageBody = "tttttt";
//$receiver = "trolligold@gmail.com";



$mail=new PHPMailer();
$mail->isSMTP();
$mail->Host="smtp.gmail.com";
$mail->SMTPAuth="true";

$mail->SMTPSecure="tls";
$mail->Port="587";

$mail-> Username=$sender;
$mail-> Password=$password;
$mail->Subject=$subject;

$mail->setFrom($sender);
$mail->Body = $messageBody;
$mail->addAddress($receiver);

if($mail->Send()){
  echo "mail Sent Successfully!";
}
else{
  echo "error ....";
}

$mail->smtpClose();

?>