<?php 

require_once('config.php');
require_once('config2.php');
require_once('core/controller.Class.php');

?>


<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['username'])) {
	header('Location: Login.php');
	exit;
}
if (!isset($_SESSION['user_id'])) {
	header('Location: Login.php');
	exit;
}
if (!isset($_SESSION['email'])) {
	header('Location: Login.php');
	exit;
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Profile Page</title>
		<link href="style1.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>HandSubz Profile</h1>
                <a href="home.php"><i class="fas fa-user-circle"></i>Home</a>
                <a onclick="addSubscription()"><i class="fa fa-plus"></i>Add Subscription</a>
                <a href="sub/displayList.php"><i class="fa fa-briefcase"></i>My Subscriptions</a>
                <a href="SuggestionPage/suggestion.php"><i class="fa fa-sticky-note"></i>Suggestions</a>
                <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="content">
			<h2>Profile Page</h2>
			<div>
				<p>Your account details are below:</p>
				<table>
					<tr>
						<td>Username:</td>
						<td><?=$_SESSION['username']?></td>
					</tr>
					<tr>
						<td>Email:</td>
						<td><?=$_SESSION['email']?></td>
					</tr>
					<tr>
						<td>Discount Code:</td>
						<td>HandSubs2020</td>
					</tr>
				</table>
			</div>
		</div>
		<script>
            function addSubscription(){
               	window.open("sub/add.html");
            }
      	</script>
	</body>
</html>
