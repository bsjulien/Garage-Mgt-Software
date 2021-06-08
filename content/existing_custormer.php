<?php  include("../db-comm/database_connection.php")?>
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
	  <h2 id="page_title">USE  EXISTING CUSTORMER INFORMATION</h2>
	  <p>
	  	<b>custormer name</b>
	  	<select class="w3-input w3-border" style="width: 50%" onchange="get_full_info()" id="customer_id">
	  		<?php 
	  			$all_customer=$connection->query("SELECT * FROM custormer");
	  			while ($customer=mysqli_fetch_array($all_customer)) {
	  				$custormer_name=$customer['customer_name'];
	  				$customer_id=$customer['customer_id'];
	  				echo "<option value='$customer_id'>$custormer_name</option>";
	  				echo "<option value='$customer_name' id='custormer_name' style='display:none'>$custormer_name</option>";

	  			}
	  		?>
	  	</select>
	  </p>
	  <div id="selected_full_info">
		  <p>
		  	<b>custormer phone number</b>
		  	<input class="w3-input w3-border w3-animate-input" type="text" id="custormer_phone_no" value="+250 "  style="width:50%" >
		  </p>
		  <p>
		  	<b>custormer address</b>
		  	<input class="w3-input w3-border w3-animate-input" type="text" id="custormer_address" style="width:50%" >
		  </p>
		  <p>
		  	<b>custormer vehicle type</b>
		  	<input class="w3-input w3-border w3-animate-input" type="text" id="custormer_vehicle_type" style="width:50%" required>
		  </p>
		  <p>
		  	<b>automobile plate number</b>
		  	<input class="w3-input w3-border w3-animate-input" type="text" id="plate_no" style="width:50%" required>
		  </p>
		  <p>
		  	<b>custormer car color</b>
		  	<input class="w3-input w3-border w3-animate-input" type="text" id="car_color" style="width:50%" required>
		  </p>
	  </div>
	   <p>
	  	<b>date in</b>
	  	<input class="w3-input w3-border" type="date" id="date_in" style="width:50%" required>
	  </p>	
	  <input type="submit" class="w3-btn w3-teal" id="register_custormer" onclick="adding_new_custormer()" value="SAVE CUSTORMER">
	</form><br><br>
</div>
<script>

	function get_full_info(){
	  		alert('TIME TO CHANGE');
	  		customer_id=document.getElementById('customer_id').value;
	  		 $.ajax({
		      url: "functions/information_of_customer.php",
		      type: "post",
		      async: false,
		      data: {
		      	customer_id:customer_id;
		      },
		      success: function (data) {
		        $("#selected_full_info").html(data);
		      }
		    });
	}
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
    var custormer_phone_no = document.getElementById('custormer_phone_no').value;
        /*if (custormer_no == '') {
            return false;
          }*/
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
</script>