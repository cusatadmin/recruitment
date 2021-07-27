<?php  
 
require("class.phpmailer.php"); // path to the PHPMailer class
 
$mail = new PHPMailer();  
 
$mail->SMTPSecure = "tls"; 
$mail->IsSMTP();  // telling the class to use SMTP
$mail->Mailer = "smtp";
$mail->Host = "mail.cusat.ac.in";
$mail->Port = 25;
$mail->SMTPAuth = true; // turn on SMTP authentication
$mail->Username = "cirm@cusat.ac.in"; // SMTP username
$mail->Password = "cirmcusat"; // SMTP password 
 
$mail->From     = "cirm@cusat.ac.in";
$mail->AddAddress("admincusat@gmail.com");  
 
$mail->Subject  = "First PHPMailer Message";
$mail->Body     = "Hi! \n\n This is my first e-mail sent through PHPMailer.";
$mail->WordWrap = 50;  
 
if(!$mail->Send()) {
echo 'Message was not sent.';
echo 'Mailer error: ' . $mail->ErrorInfo;
} else {
echo 'Message has been sent.';
}
?>