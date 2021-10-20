<?php 
	$con= mysqli_connect('127.0.0.1','root','');
	mysqli_select_db($con,'manage_subs_database');
  session_start();
    if (!isset($_SESSION['user_id'])) {
    header('Location: Login.php');
    exit;
    }
    $User_id=$_SESSION['user_id'];
  $sql = "SELECT id, Subscription_name,Status,Billing_cycle,Start_date,Price FROM subscriptions WHERE user_id=$User_id";
	$fetch=mysqli_query($con,$sql);
?>

<!DOCTYPE>
<html>
<head>
	<title> My Subscriptions</title>
	<link rel="stylesheet" type="text/css" href="css/list/style.css">
	<style><?php require "css/list.css" ?></style>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
</head>
<body>

<h1>My Subscriptions</h1>
<div class="container">
  <div class="row">
    <div class="col-12">
      <table class="table table-bordered table-striped">
          <thead>
            <tr>
              
              <th scope="col" class="column">Subscriptions</th>
              <th scope="col" class="column">Status</th>
              <th scope="col" class="column">Cycle</th>
              <th scope="col" class="column">Next Payment</th>
              <th scope="col" class="column">Total Amount</th>
              <th scope="col" class="column"></th>
            </tr>
          </thead>
        
          <tbody>
            <?php	
              while($rows=mysqli_fetch_array($fetch))
              {
            ?>
              <tr> 
               
                <td><?php echo $rows['Subscription_name'];?></td>
                <td><?php echo $rows['Status']; ?></td> 
                <td><?php echo $rows['Billing_cycle']; ?></td> 
                <td><?php echo $rows['Start_date']; ?></td> 
                <td><?php echo $rows['Price']; ?></td> 
                <td> <a href="updatePage.php?edit=<?php echo $rows['id']; ?>" class="btn btn-primary">Edit</a>
                    <a href="delete.php?delete=<?php echo $rows['id']; ?>" class="btn btn-success" onclick="return confirm('Are you sure you want to delete?')">Delete</a>
              </td> 
              </tr> 
            <?php } ?> 
          </tbody>
      </table>
    </div>
  </div>
</div>
</body>
</html>		
