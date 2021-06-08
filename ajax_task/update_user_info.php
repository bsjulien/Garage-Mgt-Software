<?php 
include('../db-comm/database_connection.php');
if (isset($_POST['user_name'])) {
	$user_id=$_POST['id'];
	$user_name=$_POST['user_name'];
	$full_name=$_POST['full_name'];
	$title=$_POST['title'];
	$password=$_POST['password'];
	$age=$_POST['age'];
	$email=$_POST['email'];
	$update_user=$connection -> query("UPDATE users SET username='$user_name',age='$age',title='$title', email='$email', password='$password',name='$full_name' WHERE id='$user_id'");
	if ($update_user) {
		echo "<script>alert('USER INFORMATION UPDATED');</script>";
		include('../content/user_information.php');
	}
	if (!$update_user) {
		echo "<script>alert('ERROR IN UPDATING USER INFORMATION');</script>";
		include('../content/user_information.php');
	}	
}
?>	