<?php

	function logIn($username, $password, $ip) {

		require_once('connect.php');
		$username = mysqli_real_escape_string($link, $username);
		$password = mysqli_real_escape_string($link, $password);
		$loginstring = "SELECT * FROM tbl_user WHERE user_name='{$username}' AND user_pass='{$password}'";
		$user_set = mysqli_query($link, $loginstring);
		//echo mysqli_num_rows($user_set);


		if(mysqli_num_rows($user_set)){
			$founduser = mysqli_fetch_array($user_set, MYSQLI_ASSOC);
			$id = $founduser['user_id'];
			$_SESSION['user_id'] = $id;
			$_SESSION['user_name']= $founduser['user_fname'];
			$_SESSION['user_date']=$founduser['user_date'];
			$_SESSION['user_count']= $founduser['user_count'];

			 //$usercount = 0;

			if(mysqli_query($link, $loginstring)){
				$_SESSION['user_count']= $founduser['user_count'];
				$_SESSION['user_count'] +=1;
				$usercount = $_SESSION['user_count'];


				$update = "UPDATE tbl_user SET user_ip='{$ip}' WHERE user_id='{$id}'";
				$updatequery = mysqli_query($link, $update);

				//update successful login time to database
				$loginTime = "UPDATE tbl_user SET user_date= NOW() WHERE user_name='{$username}' AND user_pass='{$password}'";
				$lastLogin = mysqli_query($link,$loginTime);
				//echo $lastLogin;


				//$usercount++;
				$count = "UPDATE tbl_user SET user_count='{$usercount}' WHERE user_name='{$username}'";
				$updateCount = mysqli_query($link, $count);

				//if user is first logged in, take them to edit user
					// if($usercount++){
					// 	$count = "UPDATE tbl_user SET user_count='{$usercount}' WHERE user_name='{$username}'";
					// 	$updateCount = mysqli_query($link, $count);
          //
					// }
				 if($usercount == 1)
				{
					redirect_to('admin_edituser.php');

				}else{
						redirect_to("admin_index.php");

					//echo $usercount;
	}
		}else{
			$message = "Please try again!";
			return $message;
			//maybe the lockout function is in here?
			// function lockOut($username, $password){
			// 		if(!($username) && !($password)){
      //
			// 		}
			}


		mysqli_close($link);
	}}


?>
