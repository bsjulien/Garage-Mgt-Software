<?php 
include('../db-comm/database_connection.php');
if (isset($_POST['user_name'])) {
	$user_name=$_POST['user_name'];
	$full_name=$_POST['full_name'];
	$title=$_POST['title'];
	$password=md5(addslashes($_POST['password']));
	$age=$_POST['age'];
	$email=$_POST['email'];
	$check_if_user_exist=$connection -> query("SELECT * FROM users WHERE username='$user_name'");
	$count=mysqli_num_rows($check_if_user_exist);
	if ($count == 1) {
		echo "<script>alert('USER EXISTS');</script>";
		include('../content/user_information.php');
	}
	else{
		$insert_user=$connection->query("INSERT INTO users(name,username,password,age,email,title) VALUES('$full_name','$user_name','$password','$age','$email','$title')");
		if ($insert_user) {
			echo "<script>alert('USER REGISTED');window.location.href='index.php';</script>";
			
		}
		else{
			echo "<script>alert('UN ABLE TO REGISTER USER');</script>";
			include('../content/user_information.php');
		}
	}
	
}
?>	