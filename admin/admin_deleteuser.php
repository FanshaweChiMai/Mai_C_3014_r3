<?php
ini_set('display_errors',1);
error_reporting(E_ALL);

	require_once('phpscripts/config.php');
	//confirm_logged_in();
	$tbl = "tbl_user";
	$users = getAll($tbl);
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Delete User</title>
</head>
<body>
<h2>Delete User</h2>
<?php
while($row = mysqli_fetch_array($users)){
	echo "{$row['user_name']} <a href=\"phpscripts/caller.php?caller_id=delete&id={$row['user_id']}\">Deleted</a><br>";
}

?>
</body>
</html>
