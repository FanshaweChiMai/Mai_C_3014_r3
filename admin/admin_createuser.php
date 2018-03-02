<?php
	require_once('phpscripts/config.php');
	confirm_logged_in();

	if(isset($_POST['submit'])){
		$fname = trim($_POST['fname']);
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		$email = trim($_POST['email']);
		$lvllist = trim($_POST['lvllist']);
		if(empty($lvllist)){
			$message = "Please select a user level";
		}else{
			$result = createUser($fname, $username, $password, $email, $lvllist);
			$message = $result;
		}
	}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/main.css">
<link href="https://fonts.googleapis.com/css?family=Bellefair|Roboto+Condensed" rel="stylesheet">

<title>Create User</title>
</head>
<body>
	<div class="wrapper">
<h2>Create User</h2>
<?php if(!empty($message)){echo $message;}?>

	<form action="admin_createuser.php" method="post">
	<label>First Name:</label>
	<input type="text" name="fname" value="">
	<br>
	<label>User Name:</label>
	<input type="text" name="username" value="">
	<br>
	<!--<label>Password:</label>
	<input type="text" name="" value="">-->
	<label>Email</label>
	<input type="text" name="email" value="">
	<select name="lvllist">
		<option value="">Select User Level</option>
		<option value="3">Web Admin</option>
		<option value="2">Web Master</option>
		<option value="1">Web User</option>
	</select>
	<br>
	<input type="submit" name="submit" value="SUBMIT">
	</form>
</div>

</body>
</html>
