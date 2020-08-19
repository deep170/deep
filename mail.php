<?php 

$name = "";
$email = "";
$phone = "";
$subject = "";
$message = "";
$nameErr = "";
$emailErr = "";
$phoneErr = "";
$subjectErr = "";
$success = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["username"])) {
       $nameErr = "Name is required";
    }else {
       $name = test_input($_POST["name"]);
    }    

    if (empty($_POST["email"])) {
       $emailErr = "Email is required";
    }else {
       $email = test_input($_POST["email"]);
       
       // check if e-mail address is well-formed
       if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $emailErr = "Invalid email format"; 
       }
    }
    
    if (empty($_POST["phone"])) {
       $phoneErr = "Contact number is required";
    }else {
       $phone = test_input($_POST["phone"]);

       // check phone format

       if (validate_phone_number($phone) == false) {
         $phoneErr = "Invalid format";
    }
	}
    
    if (empty($_POST["subject"])) {
       $subjectErr = "Enter the subject";
    }else {
       $subject = test_input($_POST["subject"]);
    }

    if (empty($_POST["message"])) {
        $messageErr = "Enter the message";
     }else {
        $message = test_input($_POST["message"]);
     }
     

 if(empty($nameErr) && empty($emailErr) && empty($phoneErr) && empty($subjectErr))
 {  
   $formcontent = "From : $name \n Subject: $subject \n Message : $message \n Contant : $phone";
$mailTo = "deepagrawal01072000@gmail.com";
$subjectf = "Contact Form Submission";
$mailheader = "From : $email \r \n";

mail($mailTo,$subjectf,$formcontent,$mailheader);
   echo "<script type='text/javascript'>alert('Message Sent, 
   thankyou for contacting us!');
   window.history.log(-1);
   </script>";
 }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
 }

?> 