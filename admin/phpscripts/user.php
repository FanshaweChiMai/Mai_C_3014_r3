<?php

function createUser($fname, $username, $password, $email, $lvllist){
include('connect.php');

$random = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-_=+;:,.?";
$password = substr(str_shuffle($random),0,8);
if($password){
  $encrypt_pass = password_hash($password, PASSWORD_BCRYPT);
  $password = $encrypt_pass;
}


$userstring = "INSERT INTO tbl_user VALUES (NULL, '{$fname}', '{$username}', '{$password}', '{$email}', NULL, '{$lvllist}','0', 'no')";
$userquery = mysqli_query($link, $userstring);

//echo $userstring;

if($userquery){
  redirect_to('admin_index.php');
  $to = $email;
  $subj = "Your account information - Please log in";
  $msg = "Your Username: ".$username."\n\nYour Password: ".$password."\n\nLog In Here: ".$url;
  mail($to,$subj,$msg);
  //echo $msg;

}else{
  $message = "Try again!";
  return $message;
}
mysqli_close($link);
}

function editUser($id, $fname, $username, $password, $email){
  include('connect.php');
  $updatestring = "UPDATE tbl_user SET user_fname = '{$fname}', user_name = '{$username}', user_pass = '{$password}', user_email = '{$email}' WHERE user_id = '{$id}'";
 //echo $updatestring;

   $updatequery = mysqli_query($link, $updatestring);

   if($updatequery){
     redirect_to("admin_index.php");
   }else{
     $message = "Try again!";
     return $message;
   }

   mysqli_close($link);
 }
 function deleteUser($id){
   include ('connect.php');
   $delstring = "DELETE FROM tbl_user WHERE user_id = {$id}";
   $delquery = mysqli_query($link, $delstring);
   if($delquery){
     redirect_to("../admin_index.php");
   }else{
     $message = "cannot delete the user";
     return $message;
   }
   mysquli_close($link);
 }
?>
