<?php 

$name = "";
$email = "";
$message = "";
$success = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
       $name = test_input($_POST["username"]);
       $email = test_input($_POST["email"]);
       $message = test_input($_POST["message"]); 

 if(!empty($name) && !empty($email) && !empty($message))
 {  
$formcontent = "From : ".$name." \n Message : ".$message.";
$mailTo = "deepagrawal01072000@gmail.com";
$subjectf = "Contact Form Submission";
$mailheader = "From : ".$email." \r \n";

if(mail($mailTo,$subjectf,$formcontent,$mailheader))
{
  $success = "Message sent, thankyou for contacting us!";
  $name=$email=$message = "";
 }
 }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
 }

?> 