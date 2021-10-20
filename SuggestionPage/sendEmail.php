<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['name'])&& isset($_POST['email'])){
	$name=$_POST['name'];
	$email=$_POST['email'];
	$subject=$_POST['subject'];
	$body=$_POST['body'];

	require "PHPMailer/PHPMailer.php";
	require "PHPMailer/SMTP.php";
	require "PHPMailer/Exception.php";

	$mail=new PHPMailer(true);

	//SMTP settings
	$mail->isSMTP();
	$mail->Host = "smtp.gmail.com";
	$mail->SMTPAuth=true;
	$mail->Username="handsubz@gmail.com";
	$mail->Password='handsubz20';
	$mail->Port=465;
	$mail->SMTPSecure="ssl";

	//email settings
	$mail->isHTML(true);
	$mail->setFrom($email, $name);
	$mail->addAddress("handsubz@gmail.com");
	$mail->Subject=("$email($subject)");
	$mail->Body=$body;

	if($mail->send()){
		$status="success";
		$response="Email is sent!";
	}
	else{
		$status="failed";
		$response="Something is wrong: <br>".$mail->ErrorInfo;
	}

	exit(json_encode(array("status"=>$status, "response"=>$response)));
}
?>