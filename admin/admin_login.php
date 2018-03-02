<?php
	require_once('phpscripts/config.php');
	$ip = $_SERVER['REMOTE_ADDR'];
	//echo $ip;

	//create session?
	//$_SESSION['user_date']=$loginTime['user_date'];
	//echo date("M d Y H:i a", strtotime($lastLogin]));
	//echo $lastLogin;

	if(isset($_POST['submit'])){
		//echo "Works";
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		if($username !== "" && $password !== ""){
			$result = logIn($username, $password, $ip);
			$message = $result;

		}else{
			$message = "Please fill out the required fields.";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Welcome to your admin panel login</title>
<link rel="stylesheet" href="css/main.css">
<link href="https://fonts.googleapis.com/css?family=Bellefair" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">

</head>
<body>
	<?php if(!empty($message)){ echo $message;} ?>
	<div class="wrapper">
		<form action="admin_login.php" method="post">
			<label>Username:</label>
			<input type="text" name="username" value="">
			<br>
			<label>Password</label>
			<input type="password" name="password" value="">
			<br><br>
			<input id="goIn" type="submit" name="submit" value="SUBMIT">
		</form>
	</div>


</body>
</html>
