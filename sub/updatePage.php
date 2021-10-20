<?php
	$con = mysqli_connect('127.0.0.1','root','');
	mysqli_select_db($con,'manage_subs_database');
	
	$update=false;
	$id='';
	$SubName = '';
	$Cycle = '';
	$Price = '';
	$StartDate ='';
	$ExpiredDate = '';
	$Status = '';
	
	if(isset($_GET['edit']))
    {
		$id = $_GET['edit'];
		$sql = "SELECT * FROM subscriptions WHERE id=$id";
		$result=mysqli_query($con,$sql);
		
		if(count($result)==1){
		$rows=mysqli_fetch_array($result);
		
		$SubName = $rows['Subscription_name'];
		$Cycle = $rows['Billing_cycle'];
		$Price = $rows['Price'];
		$StartDate = $rows['Start_date'];
		$ExpiredDate = $rows['Expired_date'];
		$Status = $rows['Status'];
		}
	}
		//header("location: edit1.php");
	
	
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
	<title>add new subscriptions</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-lg-3"></div>
				<div class="col-10 col-md-8 col-lg-6">
					<form name="myForm" class="form-container" action="update.php" method="POST">
						<input type="hidden" name="id" value="<?php echo $id; ?>" >
							<h1>Update Subscription</h1>
							<div class ="form-group">
								<label for="subscription name">Subscription</label>
								<input type="text" class="form-control" name="subscriptionName" value="<?php echo $SubName; ?>" >
							</div>
							<div class="form-group">
								<label for="billing cycle">Billing cycle</label>
								<select id="inputState" class="form-control" name="cycle" onchange="checkforblank()">
									<option selected><?php echo $Cycle; ?></option>
									<option value="Monthly">Monthly</option>
									<option value="Yearly">Yearly</option>
								</select>
							</div>
							<div class="form-group">
								<label for="price">Price</label>
								<input type="text" class="form-control" name="price" value="<?php echo $Price; ?>" >
							</div>
							<div class="form-group">
								<label for="start date">Start Date</label>
								<input type="date" class="form-control"  name="startDate" value="<?php echo $StartDate; ?>" >
							</div>
							<div class="form-group">
								<label for="expired date">Expired Date</label>
								<input type="date" class="form-control" name="expiredDate" value="<?php echo $ExpiredDate; ?>">
							</div>
							<div class="form-group">
								<label for="status">Status</label>
								<select id="inputState" class="form-control" name ="status" value="<?php echo $Status; ?>">
									<option selected><?php echo $Status; ?></option>
									<option>Active</option>
									<option></option>
								</select>
							</div>
							
							
								<button type="submit" name= "update" class="btn btn-primary">Update</button> 
					</form>  
				</div>
			<div class="col-lg-3"></div>
		</div>
	</div>
</body>
</html>

