
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
		font-family: monospace;
	}

	input[type=text]:hover{
		box-shadow: 0px 1px 0px teal;
	}
	input{
		text-transform: uppercase;
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
	  <h2 id="page_title">ADD NEW CUSTORMER INFORMATION</h2>
	  <p style="display: none">
	  	<?php 
	  	include('../db-comm/database_connection.php');
	  	$get_last_id=$connection->query("SELECT * FROM garage_car_transactions ORDER BY transaction_id DESC LIMIT 1");
	  	$get_it=mysqli_fetch_array($get_last_id);
	  		$lastid=$get_it['transaction_id'];
	  		$nexttrnsactionid=$lastid+1;
	  	?>
	  	<b>transaction id</b><!-- <span class="btn-success" id="lastid_span">lastid : <?php echo $lastid; ?></span> -->
	  	<input class="w3-input w3-border w3-animate-input" type="number" value="<?php echo $nexttrnsactionid ?>" id="transaction_id" style="width:50%" disabled>
	  </p>
	  <p>
	  	<b>custormer name</b>
	  	<input class="w3-input w3-border w3-animate-input" type="text" id="custormer_name" style="width:50%" onkeypress="return isAlphaKey(event)" required autocomplete="off">
	  </p>
	  <p>
	  	<b>custormer phone number</b>
	  	<input class="w3-input w3-border w3-animate-input" type="text" id="custormer_phone_no" maxlength="10" style="width:50%" onkeypress="return isNumberKey(event)" autocomplete="off">
	  </p>
	  <p>
	  	<b>custormer address</b>
	  	<input class="w3-input w3-border w3-animate-input" type="text" id="custormer_address" style="width:50%" onclick="check_phone_number()" onkeypress="return isAlphaKey(event)">
	  	<!-- <select class="w3-input w3-border" id="custormer_address" style="width:50%" onclick="check_phone_number()" onkeypress="return isAlphaKey(event)">
	  		<option>KIMIRONKO</option>
	  	</select> -->
	  	
	  </p>
	  <p>
	  	<b>custormer vehicle type</b>
	  	<input class="w3-input w3-border w3-animate-input" type="text" id="custormer_vehicle_type" style="width:50%" required>
	  </p>
	  <p>
	  	<b>automobile plate number</b>
	  	<input class="w3-input w3-border w3-animate-input" type="text" id="plate_no" style="width:50%" maxlength="8" required autocomplete="off">
	  </p>
	  <p>
	  	<b>custormer car color</b>
	  	<input class="w3-input w3-border w3-animate-input" type="text" id="car_color" style="width:50%" required>
	  </p>
	   <p>
	  	<b>date in</b>
	  	<input class="w3-input w3-border" type="date" id="date_in" style="width:50%" required>
	  </p>	
	  <input type="submit" class="w3-btn w3-teal" id="register_custormer" onclick="adding_new_custormer()" value="SAVE CUSTORMER">
	</form><br><br>
</div>
<script>
	function adding_new_custormer() {
    /*var lastid=lastid;*/
    /*var transaction_id = document.getElementById('transaction_id').value;
        if (transaction_id == '' || transaction_id<=lastid ) {
        	alert('INVALID TRANSACTION ID');
            return false;
          }*/
    var custormer_name = document.getElementById('custormer_name').value;
        if (custormer_name == '') {
            return false;
          }
    var custormer_address = document.getElementById('custormer_address').value;
    var custormer_vehicle_type = document.getElementById('custormer_vehicle_type').value;
        if (custormer_vehicle_type == '') {
            return false;
          }
    var custormer_plate_no = document.getElementById('plate_no').value;
        if (custormer_plate_no == '') {
            return false;
          }
    var car_color = document.getElementById('car_color').value;
        if (car_color == '') {
            return false;
          }
    var date_in = document.getElementById('date_in').value;
        if (date_in == '') {
            return false;
          }
    var custormer_phone_no = document.getElementById('custormer_phone_no').value;
        if (custormer_phone_no.length > 10) {
        		document.getElementById('custormer_phone_no').style.color='red';
            	if(confirm("HELLO , PHONE NUMBER IS WRONG") == true){
            		alert('FOR SECURITY PURPOSE WE WILL TAKE YOU BACK AND TRY AGAIN');
            		return false;
            	}
        }
        else{
        	$.ajax({
		      url: "functions/insert_custormer.php",
		      type: "post",
		      async: false,
		      data: {
		        custormer_name : custormer_name,
		        custormer_phone_no : custormer_phone_no,
		        custormer_address : custormer_address,
		        custormer_vehicle_type : custormer_vehicle_type,
		        custormer_plate_no : custormer_plate_no,
		        car_color : car_color,
		        date_in : date_in,
		      },
		      success: function (data) {
		        $("#dataContent").html(data);
		      }
		    });
        }
    
  }
  function check_phone_number(){
  	 custormer_phone_no = document.getElementById('custormer_phone_no').value
  	 if(custormer_phone_no.length > 10){
  	 	document.getElementById('custormer_phone_no').style.color='red';
  	 	document.getElementById('custormer_phone_no').style.border='1px solid red';
  	 }
  	 else{
  	 	document.getElementById('custormer_phone_no').style.border='1px solid gainsboro';
  	 	document.getElementById('custormer_phone_no').style.color='black';
  	 }
  }
</script>