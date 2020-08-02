<?php
$result="";
// Check for empty fields
if(empty($_POST['name'])      ||
   empty($_POST['email'])     ||
   empty($_POST['phone'])     ||
   empty($_POST['message'])   ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
   echo "No arguments Provided!";
   return false;
   }

   $name = strip_tags(htmlspecialchars($_POST['name']));
   $email_address = strip_tags(htmlspecialchars($_POST['email']));
   $phone = strip_tags(htmlspecialchars($_POST['phone']));
   $message = strip_tags(htmlspecialchars($_POST['message']));
      
require 'PHPMailerAutoload.php';
$mail = new PHPMailer;

$mail->Host='smpt.gmail.com';
$mail->Port=587;
$mail->SMTPAuth=true;
$mail->SMTPSecure='tls'
$mail->Username='ricoedisonb@gmail.com';
$mail->Passsword='01061997';

$mail->setFrom($_POST['email'],$_POST['name']);
$mail->addAddress('ricoedisona@gmail.com');


$mail->isHTML(true);
$mail_subject = "Website Contact Form:  $name";
$mail_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
$mail->send();

return true;         
?>
