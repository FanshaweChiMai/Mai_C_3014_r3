<?php
	require_once('phpscripts/config.php');
	confirm_logged_in();
	date_default_timezone_set('America/Toronto');
	$time=date("H");
	//$msg=$time;
	//Messages for time of day
	// $morning = "Good morning! Coffee?";
	// $afternoon = "Good afternoon! Lunch yet?";
	// $evening = "Good evening! Take some break!";


	//morning from 6 to 12pm
	 if ($time>="6" && $time<="12") {
	 $msg="Good morning ";
	 $msg_2="! Coffee?";
	}
	//afternoon 12:01 to 5pm
	if ($time>"12"&&$time<="17") {
	$msg="Good afternoon ";
	$msg_2="! Lunch yet?";
	}
	//evening from 5pm to 11pm
	elseif ($time>"17" && $time<="23") {
	$msg="Good evening " ;
	$msg_2="! Take some break!";
	}




?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Welcome to your admin panel</title>
<link rel="stylesheet" href="css/main.css">
<link href="https://fonts.googleapis.com/css?family=Bellefair|Roboto+Condensed" rel="stylesheet">

</head>
<body>
	<div class="wrapper">
		<div class="welcomeMessage">
			<?php echo $msg; ?>
			<?php echo $_SESSION['user_name'];  ?>
			<?php echo $msg_2; ?>
			<br>
			<?php
			//echo "Last login was ", UTC_DATE($_SESSION['user_date']);
			//echo $lastLogin;

			echo "Last login was ",  $_SESSION['user_date'];
			//echo "Last login was" , $_SESSION['user_date'];
			//echo date("Last login was" + "M d Y H:i a", $lastLogin);
			 ?>
		</div>
		<a href="admin_createuser.php">Create User</a>
		<a href="admin_edituser.php">Edit User</a>
		<a href="admin_deleteuser.php">Delete User</a>
		<a href="phpscripts/caller.php?caller_id=logout">Sign Out</a>
	</div>


</body>
</html>
