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
	
		$id = 0;

		if(isset($_POST['update']))
		{
			$id = $_POST['id'];
			$SubName = $_POST['subscriptionName'];
			$Cycle = $_POST['cycle'];
			$Price = $_POST['price'];
			$StartDate = $_POST['startDate'];
			$ExpiredDate = $_POST['expiredDate'];
			$Status = $_POST['status'];

			
			$sql = "UPDATE subscriptions SET Subscription_name = '$SubName', Billing_cycle = '$Cycle' ,Price = '$Price',Start_date = '$StartDate' ,Expired_date = '$ExpiredDate' ,Status = '$Status' WHERE id =$id";
			$result= mysqli_query($con,$sql);
			
			if($result)
			{
				echo "<script>alert('Record Updated')</script>";
			}
			else
			{
				echo "<font color = 'red'> Failed to update Record</font>";
			}
			header("refresh:0; url=displayList.php");
			
		}
    ?>