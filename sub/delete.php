<?php
	$con = mysqli_connect('127.0.0.1','root','');
	mysqli_select_db($con,'manage_subs_database');
	
if(isset($_GET['delete']))
    {
		$id = $_GET['delete'];
		$sql = "DELETE FROM subscriptions WHERE id=$id";
		$result=mysqli_query($con,$sql);
		
        if($result)
        {
            echo "<font color='green'> Record Deleted";
        }
        else{
            echo "<font color='red'> Record not Deleted";
        }
	}

    header("location:displayList.php");	
	
?>