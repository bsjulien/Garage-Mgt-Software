<?php 
if (isset($_POST['id'])) {
    $id=$_POST['id'];
    $full_name=$_POST['full_name']; 
    $user_name =$_POST['user_name'];
    $title =$_POST['title'];
    $password =$_POST['password'];
    $age =$_POST['age'];
    $email =$_POST['email'];
}
?>
	<form action="" method="post">
				  <p>
				  	<b>full names</b>
				  	<input class="w3-input w3-border w3-animate-input" type="text" id="user_full_name" value="<?php echo $full_name; ?>" style="width:100%" required>
				  </p>
				  <p>
				  	<b>user name</b>
				  	<input class="w3-input w3-border w3-animate-input" type="text" id="user_username" value="<?php echo $user_name; ?>" style="width:100%" >
				  </p>
				  <p>
				  	<b>user title</b>
				  	<select class="form-control w3-input w3-border" id="user_title" value="" style="width:100%" required>
						<option value="BOSS">BOSS</option>
						<option value="MANAGER">MANAGER</option>
					</select>
				  </p>
				  <p>
				  	<b>user password</b>
				  	<input class="w3-input w3-border w3-animate-input" type="password" id="user_password" value="<?php echo $password; ?>" style="width:100%">
                    <span class="fa fa-eye" style="float: right;margin-top: -6%;margin-right: 2%" onclick="view_password()"></span>
				  </p>
				  <p>
				  	<b>user age</b>
				  	<input class="w3-input w3-border" type="number" id="user_age" value="<?php echo $age; ?>" style="width:100%" required>
				  </p>
				  <p>
				  	<b>user email</b>
				  	<input class="w3-input w3-border w3-animate-input" type="text" id="user_email" value="<?php echo $email; ?>" style="width:100%" required>
				  </p>
				  <input type="submit" class="w3-btn w3-teal" id="register_user" onclick="edit_user(<?php echo $id; ?>)" value="EDIT USER">
			</form><br><br>
<script>
	function edit_user(id) {
	user_id=id;
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
      url: "ajax_task/update_user_info.php",
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
        $("#dataContent").html(data);
      }
    });
  }
  function view_password(){
     password=document.getElementById('user_password').value;
     document.getElementById('user_password').type='text';
  }
</script>