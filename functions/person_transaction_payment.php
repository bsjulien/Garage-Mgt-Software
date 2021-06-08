<?php 
include ("../db-comm/database_connection.php");
if (isset($_POST['section'])) {
	$customer_id=$_POST['customer_id'];
	$transaction_bill=$_POST['total_amount'];
	$get_info_on_transaction=$connection->query("SELECT * FROM custormer WHERE customer_id='$customer_id'");
	while ($get_car_info=mysqli_fetch_array($get_info_on_transaction)) {
		$custormer_name=$get_car_info['customer_name'];
		$custormer_phone_no=$get_car_info['customer_phone_number'];
		$custormer_address=$get_car_info['customer_address'];
		$custormer_car_type=$get_car_info['customer_car_type'];
		$custormer_car_plate_no=$get_car_info['car_plate_no'];
		$custormer_car_date_in=$get_car_info['date_in'];
	}
	$get_customer_bill=$connection->query("SELECT * FROM bill WHERE customer_id='$customer_id'");
	$bill_info=mysqli_fetch_array($get_customer_bill);
	$payed_money=$bill_info['payed_amount'];
}
?>

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
	.close_view{
		color: deepskyblue;
		float: right;
		border: 2px solid deepskyblue;
		margin-top: -2.0%;
		margin-right: -1.3%;
	}
	.close_view:hover{
		color: white;
		background-color: deepskyblue;
		transition: 2s;
	}

</style>
<div class="w3-container" id="form">
	<div id="payment_section">
		<span class="fa fa-close close_view" onclick="remove_view()"></span>
		<form action="" method="post" id="payment_section">
		  <h2><?php echo $custormer_name; ?>'S CAR PAYMENT</h2>
		  <p>
		  	<b>custormer phone number</b>
		  	<center><input class="w3-input w3-border w3-animate-input" type="text" id="custormer_phone_no" placeholder="<?php echo $custormer_phone_no ?>" style="width:50%" disabled></center>
		  </p>
		  <p>
		  	<b>custormer address</b>
		  	<center><input class="w3-input w3-border w3-animate-input" type="text" id="custormer_address" placeholder="<?php echo $custormer_address ?>" style="width:50%" disabled></center>
		  </p>
		  <p>
		  	<b>custormer car type</b>
		  	<center><input class="w3-input w3-border w3-animate-input" type="password" id="custormer_car_type" placeholder="<?php echo $custormer_car_type ?>" style="width:50%" disabled></center>
		  </p>
		  <p>
		  	<b>custormer car plate number</b>
		  	<center><input class="w3-input w3-border" type="number" id="custormer_car_plate_no" placeholder="<?php echo $custormer_car_plate_no ?>" style="width:50%" disabled></center>
		  </p>
		  <p>
		  	<b>custormer date in</b>
		  	<center><input class="w3-input w3-border w3-animate-input" type="text" id="custormer_car_date_in" placeholder="<?php echo $custormer_car_date_in ?>" style="width:50%" disabled></center>
		  </p>
		  <p>
		  	<b>Total bill</b>
		  	<center><input class="w3-input w3-border" type="number" id="total_bill" placeholder="<?php echo $transaction_bill ?>" style="width:50%" disabled></center>
		  </p>
		  <p>
		  	<b>Amount Payed</b>
		  	<center><input class="w3-input w3-border" type="number" id="payed_amount" min="0" max="<?php echo $transaction_bill; ?>" placeholder="Enter the amount payed"  style="width:50%;color: black" required></center>
		  </p>
		  <input type="submit" class="w3-btn w3-teal" id="make_payment" onclick="paying(<?php echo $customer_id; ?>)" value="PAY REPAIRMENT">
		</form><br><br>
		<div id="payment_messgae"></div>
</div>
</div>
<script>
	function paying(customer_id) {
		customer_id=customer_id;
		amount_bieng_payed=document.getElementById('payed_amount').value;
		if (amount_bieng_payed == '') {
			return false;
		}
	    $.ajax({
	      url: "ajax_task/make_payment_on_transaction.php",
	      type: "post",
	      async: false,
	      data: {
	      	customer_id:customer_id,
	      	amount_bieng_payed :amount_bieng_payed,
	      },
	      success: function (data) {
	        $("#payment_messgae").html(data);
	      }
	    });
  }
	function remove_view(){
		document.getElementById('payment_section').style.display='none';
	}
</script>