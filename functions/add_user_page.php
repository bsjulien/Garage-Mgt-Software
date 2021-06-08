
<style>
	.w3-container{
	  width: auto;
	  margin-top: 20px;
	}
	.w3-container h2{
	  font-family: monospace;
	  font-weight: bold;
	  color: #EE2050;
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

	input[type=text]{
		font-family: monospace;
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

</style>
<div class="w3-container" id="form" >
	<form action="" method="post">
	  <h2>ADD NEW USER</h2>
	  <p>
	  	<b>full names</b>
	  	<input class="w3-input w3-border w3-animate-input" type="text" id="user_full_name" style="width:50%" required>
	  </p>
	  <p>
	  	<b>user name</b>
	  	<input class="w3-input w3-border w3-animate-input" type="text" id="user_username" placeholder="" style="width:50%" >
	  </p>
	  <p>
	  	<b>user title</b>
	  	<select class="form-control w3-input w3-border" id="user_title" style="width:50%" required>
			<option value="BOSS">BOSS</option>
			<option value="MANAGER">MANAGER</option>
		</select>
	  </p>
	  <p>
	  	<b>user password</b>
	  	<input class="w3-input w3-border w3-animate-input" type="password" id="user_password" placeholder="" style="width:50%" >
	  </p>
	  <p>
	  	<b>user age</b>
	  	<input class="w3-input w3-border" type="number" id="user_age" placeholder="" style="width:50%" required>
	  </p>
	  <p>
	  	<b>user email</b>
	  	<input class="w3-input w3-border w3-animate-input" type="email" id="user_email" placeholder="" style="width:50%" required>
	  </p>
	  <input type="submit" class="w3-btn w3-teal" id="register_user" onclick="adding_new_user()" value="ADD USER">
	</form><br><br>
</div>
<script>
	function adding_new_user() {
    var full_name = document.getElementById('user_full_name').value;
        if (full_name == '') {
            return false;
        }
    var user_name = document.getElementById('user_username').value;
        if (user_name == '') {
            return false;
        }
    var title = document.getElementById('user_title').value;
        if (title == '') {
            return false;
        }
    var password = document.getElementById('user_password').value;
    	if (password == '') {
            return false;
        }
    var age = document.getElementById('user_age').value;
        if (age == '') {
            return false;
        }
    var email = document.getElementById('user_email').value;
        if (email == '') {
            return false;
        }
    $.ajax({
      url: "ajax_task/adding_new_user.php",
      type: "post",
      async: false,
      data: {
      	full_name : full_name,
        user_name : user_name,
        title : title,
        password : password,
        age : age,
        email : email,
      },
      success: function (data) {
        $("#dataContent").html(data);
      }
    });
  }
</script>