<?php

//Username & Password Configuration 
$server = "127.0.0.1";
$user = "root";
$pass = "";
$database = "manage_subs_database";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}



$con = mysqli_connect("127.0.0.1", "root", "", "manage_subs_database");

if(mysqli_connect_errno()){
    echo "Failed To Connect To Database". mysqli_connect_errno();


}


?>