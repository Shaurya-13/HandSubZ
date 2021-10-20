<?php

include ("config2.php");

if(!isset($_GET["code"])){
    exit("Cannot Find Page");
}

$code = $_GET["code"];

$getEmailQuery = mysqli_query($con, "SELECT email FROM resetPassword WHERE code = '$code'");
if(mysqli_num_rows($getEmailQuery) == 0){
    exit("Cannot Find Page");
}


if(isset($_POST["password"])){
    $pw = $_POST["password"];
    $pw = md5($pw);

    $row = mysqli_fetch_array($getEmailQuery);
    $email= $row["email"];

    $query = mysqli_query($con, "UPDATE users SET password='$pw' WHERE email='$email'");

    if($query){
        $query = mysqli_query($con, "DELETE FROM resetPassword WHERE code='$code'");
        
        echo '<script>alert("Password Updated , Please Wait while we redirect you back")</script>';
        header( "refresh:1; Login.php" );
    }
    else{
        exit("Something Went Wrong");
    }
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

        

        <form action="" method="POST" class="reset-password">
        <p class="login-text" style="font-size: 2rem; font-weight: 800; color:white;">Please Choose New Password</p>
			<div class="input-group2" style="width: 50%; margin: 0px auto;">
				<input type="password" name="password" placeholder="New Password" style="width: 80%;" require>
            </div>
            <br>
            <div class="input-group2" style="width: 50%; margin: 0px auto;">
				<button name="submit" name="submit" value="Update Password" class="btn" style="width: 80%; ">Update Password</button>
			</div>


       


</form>

	

  

	
</body>
</html>
