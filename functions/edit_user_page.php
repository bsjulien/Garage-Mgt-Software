<?php include ("../db-comm/database_connection.php"); ?>
<style>
	.w3-container{
	  width: auto;
	  margin-top: 20px;
	}
	.w3-container h2{
	  padding-top: 10px;
	  font-family: monospace;
	  font-weight: bold;
	  color: #EE2050;
	  text-align: center;
	}
	.w3-container h2{
	  margin-left: 0px;
	}
	.w3-container p b{
	  color: gray;
	  font-variant: small-caps;
	  font-weight: 540;
	  font-family: MS Gothic;
	  font-size: 20px;
	}
	select{
	  height: 40px;
	}
	select option{
		font-family: monospace;
	}
	input[type=submit]{
	margin-top: 20px;
	height: 40px;
	}

	input[type="text"]{
		font-family: lucida;
		font-size: 15px;
	}

	input[type=text]:hover{
		box-shadow: 0px 1px 0px teal;
	}	
	#lastid_span{
		font-family: monospace;
		padding: 3px;
		border-radius: 5px;
		padding-bottom: 15px;
		padding-left: 4px;
		padding-right: 4px;
		margin-left: 100px;
	}

	#garage_m_users{
		border: 1px solid #ddd; 
		margin-top: -1px; 
		background-color: #f6f6f6;
		padding: 12px;
		text-decoration: none; 
		font-size: 18px; 
		color: black;
		display: block;
		width: auto;
	}

	#garage_m_users:hover:not(.header) {
		background-color: #eee;
	}
	#edit_user_section{

	}
</style>
<div class="w3-container" id="form">
	  <div id="all_user" class="col-sm-6">
	  	<?php 
	  		$get_all_users=$connection -> query("SELECT * FROM users");
	  		while ($all_user=mysqli_fetch_array($get_all_users)) {
	  			$user_id=$all_user['id'];
	  			$full_name=$all_user['name'];
	  			$username=$all_user['username'];
	  			$password=$all_user['password'];
	  			$title=$all_user['title'];
	  			$email=$all_user['email'];
	  			$age=$all_user['age'];
	  	?>
	  	<li id="garage_m_users" onclick="change_user('<?php echo $user_id; ?>','<?php echo $full_name; ?>','<?php echo $username; ?>','<?php echo $password; ?>','<?php echo $title; ?>','<?php echo $email; ?>','<?php echo $age; ?>')
	  	;"><?php echo $full_name; ?></li>
	  	<?php
	  		}
	  	?>
	  </div>
	  <h2>EDIT USER</h2>
	  <div id="edit_user_section" class="col-sm-6">
	  	
	  </div>
</div>
<script>
	function change_user(id,names,username,password,title,email,age) {
    id=id;
    var full_name = names;
    var user_name = username;
    var title = title;
    var password = password;
    var age = age;
    var email = email;
    $.ajax({
      url: "functions/edit_user_content.php",
      type: "post",
      async: false,
      data: {
      	id:id,
      	full_name : full_name,
        user_name : user_name,
        title : title,
        password : password,
        age : age,
        email : email,
      },
      success: function (data) {
        $("#edit_user_section").html(data);
      }
    });
  }
</script>