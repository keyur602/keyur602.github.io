<?php
require 'PHPMailer/PHPMailerAutoload.php';
ob_start();
 session_start();

// $e_mail = $_SESSION['email'];
 $emails = $_SESSION['email'];

 $otp = rand(100000,999999); 
 $_SESSION['votp'] = $otp;

$mail = new PHPMailer;
$mail->isSMTP();                                   // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                            // Enable SMTP authentication
$mail->Username = 'keyurdomadiya6021';          // SMTP username
$mail->Password = 'keyur@#602!'; // SMTP password
$mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                 // TCP port to connect to

$mail->setFrom($emails, 'Testing');
$mail->addReplyTo('keyurdomadiya6021@gmail.com', 'Testing');
$mail->addAddress($emails);   
$mail->addCC('keyurdomadiya602@gmail.com');
// $mail->addBCC('keyurdomadiya602@gail.com');

$mail->isHTML(true);  // Set email format to HTML

$bodyContent = "<h1>Your OTP Is Below::</h1>";
$bodyContent .= "<p>OTP : $otp</b></p>";

$mail->Subject = 'OTP';
$mail->Body    = $bodyContent;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
        header("location:otp.php");
}
?>
