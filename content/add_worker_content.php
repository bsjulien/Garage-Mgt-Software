
<style>
	.w3-container{
	  width: auto;
	  margin-top: 20px;
	}
	/*.w3-container h2{
	  font-family: monospace;
	  font-weight: bold;
	  color: #EE2050;
	}
	.w3-container h2{
	  margin-left: 0px;
	}*/
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
		font-family: century Gothic;
	}

	input[type=text]:hover{
		box-shadow: 0px 1px 0px teal;
	}	

</style>
<div class="w3-container" id="form" >
	<form action="" method="post">
	  <h2 id="page_title">REGISTER NEW WORKER</h2>
	  <p>
	  	<b>worker name</b>
	  	<input class="w3-input w3-border w3-animate-input" type="text" id="worker_name" style="width:50%" onkeypress="return isAlphaKey(event)" required>
	  </p>
	  <p>
	  	<b>worker phone number</b>
	  	<input class="w3-input w3-border w3-animate-input" type="text" id="worker_phone_no" style="width:50%" placeholder="Phone Number Like 0788304281" maxlength="14" onkeypress="return isNumberKey(event)">
	  </p>
	  <p>
	  	<b>worker proffesion</b>
	  	<input class="w3-input w3-border w3-animate-input" type="text" id="worker_proffesion" style="width:50%"  required>
	  </p>
	  <p>
	  	<b>country</b>
	  	<input class="w3-input w3-border w3-animate-input" type="text" id="worker_country" style="width:50%" onkeypress="return isAlphaKey(event)" required>
	  </p>
	  <p>
	  	<b>worker national id</b>
	  	<input class="w3-input w3-border w3-animate-input" type="number" id="worker_national_id" maxlength="15"  style="width:50%" >
	  </p>
	  <p>
	  	<b>worker address</b><br>
	  	<input class="w3-input w3-border " type="text" id="worker_address" placeholder="Kayonza" onkeypress="return isAlphaKey(event)" style="width:50%">
	  </p>
	  <p>
	  	<b>worker age</b>
	  	<input class="w3-input w3-border w3-animate-input" type="number" id="worker_age" style="width:50%" required maxlength="3">
	  </p>
	  <p>
	  	<b>worker salary</b>
	  	<input class="w3-input w3-border w3-animate-input" type="text" id="worker_salary" style="width:50%" onkeypress="return isNumberKey(event)">
	  </p>
	  
	  <input type="submit" class="w3-btn w3-teal" id="register_worker" value="REGISTER WORKER" onclick="insert_worker()">
	</form>
</div>