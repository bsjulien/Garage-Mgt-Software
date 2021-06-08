<?php
session_start();
unset($_SESSION['UserName']);
?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="assets/css/flaticon.css">
    <link rel="stylesheet" type="text/css" href="assets/font-awesome/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/font-awesome/fontawesome-webfont78ce.svg">
    <link rel="stylesheet" type="text/css" href="assets/css/animate.css">
    <style>
        .login-body{
          background:url(img/bg-01.jpg);
          background-size: 1400px;
          padding:3px 3px 3px 3px;
        }
        .login {
          margin:0 auto;
          max-width:500px;
          background:white;
          margin-top: 110px;
        }
        .login-header {
          background-color:darkcyan;
          color:black;
          text-align:center;
          font-size:300%;
        }
        .login-header img{
          width: 15%;
        }

        /* .login-header h1 {
           text-shadow: 0px 5px 15px #000; */
        }
        .login-form {
          border-radius:10px;
          box-shadow:0px 0px 10px #000;
        }
        .login-form h3 {
          text-align:left;
          margin-left:40px;
          color:black;
        }
        .login-form {
          box-sizing:border-box;
          padding-top:5px;
          padding-bottom:10%;
          margin:5% auto;
          text-align:center;
        }
        .login input[type="text"],.login input[type="password"] {
          max-width:400px;
          width: 80%;
          line-height:3em;
          font-family: century gothic;
          margin:1em 2em;
          border-radius:5px;
          border:2px solid #f2f2f2;
          outline:none;
          padding-left:10px;
          font-size: 18px;
          color: #686868;

        }
        .login-form input[type="button"] {
          height:40px;
          width:110px;
          background:darkcyan;
          border:1px solid #f2f2f2;
          border-radius:20px;
          color: white;
          font-weight: bold;
          text-transform:uppercase;
          font-family: 'Ubuntu', sans-serif;
          cursor:pointer;
        }
        .animate_propertie{
          -Webkit-animation-duration:5s;
          -Webkit-animation-delay:2s;
        /*-Webkit-animation-iteration-count:infinite;*/
        }
        #welcome-message{
          text-transform: uppercase;
          font-family: monospace;
          font-variant: small-caps;
          font-weight: bold;
          font-size: 20px;
          -Webkit-animation-duration:5s;
          -Webkit-animation-delay:5s;
        /*-Webkit-animation-iteration-count:infinite;*/
        }
        /*Media Querie*/
        @media only screen and (min-width : 150px) and (max-width : 530px){
          .login-form h3 {
            text-align:center;
            margin:0;
          }
          .login-button {
            margin-bottom:10px;
          }
        }
    </style>
 
</head>
<body class="login-body">
  <div>
      <p style="font-size: 30px;padding-left:29%;padding-top:3.5%;font-weight: bold;color: darkcyan">GARAGE DIGITAL MANAGMENT SYSTEM</p>
  </div>
<div class="login">
  <div class="login-header">
    	<img src="img/Shortcut_icons/1.png">
  </div>
  <div class="login-form" id="login_form">
    <form method="POST">
		    <input class="input100" type="text" name="username" placeholder="Username" id="username" required="" autofocus="" autocomplete="off">
		    <input class="input100" type="password" name="password" placeholder="Password" id="password" required="" ondblclick="show_password()" data-toggle="tooltip" data-placement="right" title="Double click to see the password" autocomplete="off"> <br>
        <input type="button" value="login" name="login" class="login-button" onclick="validate_user()"><br>
    </form>
  </div>
</div>
</body>
<script src="assets/js/jquery-3.1.1.js"></script>
<script src="assets/js/jquery-3.3.1.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script>
  function validate_user() {
    username=document.getElementById('username').value;
    password=document.getElementById('password').value;
    section="validate user";
    $.ajax({
      url: "ajax_task/ajax_validate_user.php",
      type: "post",
      async: false,
      data: {
        section : section,
        username : username,
        password: password,
      },
      success: function (data) {
        $("#login_form").html(data);
      }
    });
  }

  function show_password(){
      type=document.getElementById('password').type;
      if (type == 'password') {
        document.getElementById('password').type='text';
      }
      if (type == 'text') {
        document.getElementById('password').type='password';
      }   
  }
  $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip(); 
  });
</script>
<script>

</script>
</html>