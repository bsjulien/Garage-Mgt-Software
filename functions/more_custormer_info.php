
<style type="text/css">
	.w3-container h2{
	  font-family: monospace;
	  font-weight: bold;
	  color: #EE2050;
	  margin-left: 0px;
	}
	input[type=submit]{
	margin-top: 20px;
	height: 40px;
	}
	input[type=text]{
	font-family:sans-serif;
	}
	textarea{
		font-family: sans-serif;
	}
	select{
		font-family: sans-serif;
	}
	.w3-container form b{
	  color: black;
	  font-variant: small-caps;
	  font-weight: 900;
	  font-family: monospace;
	  font-size: 25px;
	}
</style>
<?php 
include('../db-comm/database_connection.php');
if (isset($_POST['transaction_id'])) {
	$transaction_id=$_POST['transaction_id'];
	$get_all_transaction=$connection->query("SELECT * FROM garage_car_transactions WHERE transaction_id=$transaction_id");
	if ($get_all_transaction) {
		while ($transaction=mysqli_fetch_array($get_all_transaction)) {
			$id=$transaction['id'];
			$transaction_id=$transaction['transaction_id'];
			$custormer_name=$transaction['custormer_name'];
			$custormer_phone_no=$transaction['custormer_phone_no'];
			$custormer_address=$transaction['custormer_address'];
			$custormer_car_type=$transaction['custormer_car_type'];
			$car_plate_no=$transaction['car_plate_no'];
			$date_in=$transaction['date_in'];
			$spare_used=$transaction['spare_id_used'];
			$worker_used=$transaction['worker_used'];
			$spare_price=$transaction['spare_price'];
			$worker_price=$transaction['worker_price'];
			$time_out=$transaction['date_out'];
			$transaction_bill=$transaction['bill'];
			$transaction_status=$transaction['transaction_status'];
 ?>
<div class="w3-container" id="form">
	<h2>EDIT CUSTORMER INFORMATION<span class="fa fa-facebook"></span></h2>
	<form action="" method="post">
		  <p>
		  	<b>id</b>
		  	<input class="w3-input w3-border w3-animate-input" type="text" id="id" style="width:50%" value="<?php echo $id; ?>" disabled>
		  </p>
		  <p>
		  	<b>transaction id</b>
		  	<input class="w3-input w3-border w3-animate-input" type="text" id="transaction_id" style="width:50%" value="<?php echo $transaction_id; ?>" disabled>
		  </p>
		  <p>
		  	<b>custormer name</b>
		  	<input class="w3-input w3-border w3-animate-input" type="text" id="custormer_name" style="width:50%" value="<?php echo $custormer_name; ?>" disabled>
		  </p>
		  <p>
		  	<b>custormer phone no</b><br>
		  	<input class="w3-input w3-border " type="text" id="custormer_phone_no" value="<?php echo $custormer_phone_no; ?>" style="width:50%" disabled>
		  </p>
		  <p>
		  	<b>custormer address</b><br>
		  	<input class="w3-input w3-border " type="text" id="custormer_address" value="<?php echo $custormer_address; ?>" style="width:50%" disabled>
		  </p>
		  <p>
		  	<b>custormer car type</b><br>
		  	<input class="w3-input w3-border " type="text" id="custormer_car_type" value="<?php echo $custormer_car_type; ?>" style="width:50%" disabled>
		  </p>
		  <p>
		  	<b>car plate no</b><br>
		  	<input class="w3-input w3-border " type="text" id="car_plate_no" value="<?php echo $car_plate_no; ?>" style="width:50%" disabled>
		  </p>
		  <p>
		  	<b>date in</b><br>
		  	<input class="w3-input w3-border " type="text" id="date_in" value="<?php echo $date_in; ?>" style="width:50%" disabled>
		  </p>
		  <p>
		  	<b>spare used</b><br>
		  	<textarea id="spare_used" disabled>
		  		
		  	</textarea>
		  </p>
		   <p>
		  	<b>worker used</b><br>
		  	<input class="w3-input w3-border " type="text" id="worker_used" value="<?php echo $worker_used; ?>" style="width:50%" disabled>
		  </p>
		  <p>
		  	<b>spare price</b><br>
		  	<input class="w3-input w3-border " type="text" id="spare_price" value="<?php echo $spare_price; ?>" style="width:50%" disabled>
		  </p>
		   <p>
		  	<b>worker price</b><br>
		  	<input class="w3-input w3-border " type="text" id="worker_price" value="<?php echo $worker_price; ?>" style="width:50%" disabled>
		  </p>
		  <p>
		  	<b>time out</b><br>
		  	<input class="w3-input w3-border " type="date" id="time_out" value="<?php echo $time_out; ?>" style="width:50%" disabled>
		  </p>
		  <p>
		  	<b>transaction bill</b><br>
		  	<input class="w3-input w3-border " type="text" id="transaction_bill" value="<?php echo $transaction_bill; ?>" style="width:50%" disabled>
		  </p>
		  <p>
		  	<b>transaction status</b><br>
		  	<select  class="form-control" style="width:50%" disabled>
    		      <option selected id="transaction_status">IN PROGRESS</option>
    		      <option id="transaction_status">FINISHED</option>
	        </select>

		  </p>
		 <!--  <input type="submit" class="w3-btn w3-teal" value="EDIT CUSTORMER" name="edit_custormer" onclick="ajax_edit_spare(<?php echo $spare_id;?>)"> -->
	</form><br><br>
</div>




 <?php 
 		}
	}
	
} 
?>