<?php include('../db-comm/database_connection.php');
session_start();
if (isset($_POST['username'])) {
	$username=$_POST['username'];
	$password=$_POST['password'];
	$password=md5($password);
	$ented_username=mysqli_real_escape_string($connection,$username);
	$ented_password=mysqli_real_escape_string($connection,$password);
	if ($ented_username=='' || $ented_password=='') {
		echo "
		<form method='POST' class='animated shake' class='animate_propertie'>
		    <input class='input100' type='text' name='username' placeholder='Username' id='username' style='border:1px solid red' required autofocus=''>
		    <input class='input100' type='password' name='password' placeholder='Password' id='password' style='border:1px solid red' required><br>
        	<input type='button' value='login' name='login' class='login-button' onclick='validate_user()'><br>
    	</form>
		";

	}
	elseif ($ented_username!='' && $ented_password!='') {
		$select_users=$connection->query("SELECT * FROM users WHERE username='Bangara' AND password='garage'");
		$countusers = mysqli_num_rows($select_users);
		if ($countusers > 0) {
			$get_user_title=$connection -> query("SELECT * FROM users WHERE username='Bangara' AND password='garage'");
			$user_info=mysqli_fetch_array($get_user_title);
			$title=$user_info['title'];
			$name=$user_info['name'];
			$user_id=$user_info['id'];
			$_SESSION['UserName']=$ented_username;
			$_SESSION['title']=$title;
			$_SESSION['FullNames']=$name;
			$_SESSION['UserId']=$user_id;
			if ($title) {?>
				<h1 class="animated bounce" id="welcome-message"> WELCOME Mr.<?php echo $name ?></h1>
				<script type="text/javascript">
                	document.location.href = 'index';
            	</script>
			<?php 
			}
		}
		else{
			echo "
				<form method='POST' class='animated shake' class='animate_propertie'>
				    <input class='input100' type='text' name='username' placeholder='Username' id='username' style='border:1px solid red' required autofocus=''>
				    <input class='input100' type='password' name='password' placeholder='Password' id='password' style='border:1px solid red' required><br>
		        	<input type='button' value='login' name='login' class='login-button' onclick='validate_user()'><br>
		    	</form>
			";
		}	
	}

}

?>