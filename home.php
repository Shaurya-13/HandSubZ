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
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Home Page</title>
		<link href="style1.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>Home</h1>
                <a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
                <a onclick="addSubscription()"><i class="fa fa-plus"></i>Add Subscription</a>
                <a href="sub/displayList.php"><i class="fa fa-briefcase"></i>My Subscriptions</a>
                <a href="SuggestionPage/suggestion.php"><i class="fa fa-sticky-note"></i>Suggestions</a>
                <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="content">
			<h2>Home Page</h2>
			<p>Welcome back, <?=$_SESSION['username']?>!</p>
            <p>Welcome back, <?=$_SESSION['user_id']?>!</p>
		</div>

        <div class="container" style="margin-top: 100px;">
        <?php if(isset($_COOKIE['id']) && isset($_COOKIE['sess'])){
            $Controller = new Controller;
            if($Controller -> checkUserStatus($_COOKIE['id'], $_COOKIE['sess'])){
                echo $Controller -> printData(intval($_COOKIE['id']));
                echo '<a href="logout.php">Log Out</a>';
            }
            
        }else{ ?>

            <?php } ?>

        <script>
            function addSubscription(){
               	window.open("sub/add.html");
            }
      	</script>

	</body>
</html>