<?php   
$con = mysqli_connect('127.0.0.1','root','');

if(!$con)
{
    echo 'Not Connected To Server';
}
if(!mysqli_select_db($con,'manage_subs_database'))
{
    echo 'Database Not Selected';
}

?>