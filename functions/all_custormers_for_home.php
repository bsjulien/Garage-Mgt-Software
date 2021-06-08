<?php include ("../db-comm/database_connection.php"); ?>
<style>
	#more_info_section{
		border-top: 5px solid blue;
	}
	h2{
		font-family: monospace;
		font-variant: small-caps;
		font-weight: 900;
		color: blue;
		padding-left: 10px;
		padding-bottom: 10px;
	}
	table thead tr th{
		color: blue;
		font-family: monospace; 
	}
	tr{
		border:2px solid blue;
	}
	thead tr{
		border-bottom: 2px solid blue;
	}
	tbody tr td{
		font-family: consolas;
		text-transform: uppercase;
	}
</style>
<h2>ALL OUR CUSTORMERS 
	<span data-toggle = "modal" data-target = "#Notify" class="label label-primary" style="border-radius: 0px;font-family:Century Gothic;font-size: 10px;">NOTIFY CUSTOMERS</span>
</h2>
<div class = "modal fade" id = "Notify" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true"> 
   <div class = "modal-dialog">
      	<div class = "modal-content"> 
	        <div class = "modal-header">
	            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
	                  &times;
	            </button>
	            <h4 class = "modal-title" id = "myModalLabel">
	               <span style="font-weight: bold;font-family: Century Gothic"><span class="fa fa-cubes"></span> KNOW WHAT YOUR CUSTOMER ARE THINKING</span>
	            </h4>
	         </div>
	         	<div class = "modal-body">
		         		<select class="form-control" id="customer" placeholder="Select Costomer To Notify" style="color: black;text-transform: uppercase;font-family: Century Gothic" required>
		         				<option disabled>select customers to notify</option>
		         				<?php 
									$customer_data_for_notification=$connection->query("SELECT * FROM custormer WHERE customer_name!=''");
									while ($customer_info=mysqli_fetch_array($customer_data_for_notification)) {
										$name=$customer_info['customer_name'];
										$phone_no=$customer_info['customer_phone_number'];
										$address=$customer_info['customer_address'];
										$plate_number=$customer_info['car_plate_no'];
								?>
									<option value="25<?php echo $phone_no ?>">
										<span style="font-weight: bold"><?php echo $name ?></span> 
										<span class="glyphicon glyphicon-tags"> &nbsp;&nbsp;&nbsp;&nbsp;(<?php echo $plate_number ?>)</span>
									</option>
								<?php
									}
								?>
		         		</select><br>
		         		<textarea id="message" class="form-control" style="font-family:Century Gothic;color: black" required class="btn btn-default" rows="5">Hello <?php echo $name; ?> how was our service at GARAGE ATECAR</textarea><br>
			         	<button name="send_message" onclick="send_message()"  class="btn btn-default" style="float: right;">SEND SMS</button><br><br>
      			</div>
   		</div>
	</div>
</div>
<table class="table table-bordered table-responsive">
    <thead>
      <tr>
        <th>CUSTORMER NAME</th>
        <th>CUSTORMER PHONE NUMBER</th>
        <th>CUSTORMER ADDRESS</th>
      </tr>
    </thead>
    <tbody>
		<?php 
		$select_all_custormers=$connection->query("SELECT customer_name,customer_phone_number,customer_address FROM custormer WHERE customer_name!=''");
		while ($fetch_all_custormers=mysqli_fetch_array($select_all_custormers)) {
			$custormer_name=$fetch_all_custormers['customer_name'];
			$custormer_phone_no=$fetch_all_custormers['customer_phone_number'];
			$custormer_address=$fetch_all_custormers['customer_address'];
		?>      
		<tr>
			<td><?php echo $custormer_name; ?></td>
			<td><?php echo $custormer_phone_no; ?></td>
			<td><?php echo $custormer_address; ?></td>
		</tr>
		<?php } ?>
    </tbody>
  </table>
</div>
<?php 
if (isset($_POST['send_message'])) {
	echo "<script>alert('Great')</script>";
}
?>
<script>
	function send_message() {
		var phone_number=document.getElementById('customer').value;
		var message=document.getElementById('message').value;
		if (message == '') {
			return false;
		}
	    $.ajax({
	      url: "ajax_task/send_sms_to_customer.php",
	      type: "post",
	      async: false,
	      data: {
	      	phone_number : phone_number,
	      	message : message,
	      },
	      success: function (data) {
	        $("#dataContent").html(data);
	      }
	    });
  }
</script>
