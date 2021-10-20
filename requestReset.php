<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'config2.php';


if(isset($_POST["email"])){

    $emailTo = $_POST["email"];

    $code = uniqid(true);
    $query = mysqli_query($con, "INSERT INTO resetPassword(code, email) VALUES('$code', '$emailTo')");
    if(!$query){
        exit("Error");
    }

    $mail = new PHPMailer(true);
        try {
            
        
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'handsubz@gmail.com';                     // SMTP username
            $mail->Password   = 'handsubz20';                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom('handsubz@gmail.com', 'HandSubz Password Reset');
            $mail->addAddress($emailTo);    
            $mail->addReplyTo('no-reply@HandSubz.com', 'NO-Reply');
            

        

            // Content
            $url = "http://". $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "/updatePassword.php?code=$code";
            $mail->isHTML(true);                                    
            $mail->Subject = 'HandSubz Account Password RESET:';
            $mail->Body    = "<h1>Your Requested Password Reset</h1>
                                Please click on <a href='$url'>This Link</a> to reset password";
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Reset Password Link Has Been Sent To Your Email';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        exit();
 }



?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="styleLoginRegister.css">

    <title>Reset Password</title>
    
    
</head>
<body>



        <form action="" method="POST" class="reset-link" >
        <p class="login-text" style="font-size: 2rem; font-weight: 800; color:white;">Enter Email To Get Password Reset Link</p>
			<div class="input-group2" style="width: 50%; margin: 0px auto;">
				<input type="text" name="email" placeholder="Email" autocomplete="off" style="width: 80%; ">
            </div>
            <br>
            <div class="input-group2" style="width: 50%; margin: 0px auto;">
				<button name="submit" name="submit" value="Reset Email" class="btn" style="width: 80%; ">Send Reset Link</button>
			</div>


       


</form>

	

  

	
</body>
</html>

