<?php

//Google Login API Configuration 
require_once "google-api/vendor/autoload.php";
$gClient = new Google_Client();
$gClient->setClientId("289011611503-ndttc5j6oqlibgvkuf9m4b703gb35bik.apps.googleusercontent.com");
$gClient->setClientSecret("4aSkz05BSS8PWiHIJXDvIG1h");
$gClient->setApplicationName("HandSubz");
$gClient->setRedirectUri("http://localhost/Responsivelogin/ResponsiveLogin/controller.php");
$gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");



$login_url = $gClient->createAuthUrl();







?>


