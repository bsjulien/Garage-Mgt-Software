 <?php 
if (isset($_POST['customer_id'])) {
	include('../db-comm/database_connection.php');
	$customer_id=$_POST['customer_id'];
	$selected_date_in=$_POST['selected_date_in'];
	$more_customer_information=$connection->query("SELECT * FROM custormer WHERE customer_id='$customer_id'");
	$all_data=mysqli_fetch_array($more_customer_information);
	$C_name=$all_data['customer_name'];
	$C_car_plate_number=$all_data['car_plate_no'];
	$C_date_in=$all_data['date_in'];
	$C_type=$all_data['customer_car_type'];
	}
?>
<style type="text/css">
	.w3-container h2{
	  font-family: monospace;
	  font-weight: bold;
	  color: #EE2050;
	  text-transform: uppercase;
	}
	.w3-container h2{
	  margin-left: 0px;
	}
	input {
	  padding: 10px;
	  width: 100%;
	  font-size: 17px;
	  font-family: Raleway;
	  border: 1px solid #aaaaaa;
	}
	#repairment_info{
	}
	.dot_up_left{
     height: 20px;
     width: 20px;
     background-color: #bbb;
  	 border-radius: 50%;
  	 display: inline-block;
	}
	.down_left_down{
     height: 20px;
     width: 20px;
     background-color: #bbb;
  	 border-radius: 50%;
  	 display: inline-block;
	}
	#repairment_info b{
		font-weight: 900;
		font-family: sans-serif;
		text-transform: uppercase;
		font-size: 18spx;
		color: darkgray;
	}
	input[type='button']{
		width: 30%;
		float: right;
		margin-right: 100px;
		border: none;
		padding: 12px;
		border-radius: 5px;
	}
	form table thead tr th{
		background: blue;
		color: white;
		font-family: sans-serif;
		font-weight: 900;
	}
	select{
		text-transform: uppercase;
	}
	#done_message,#customer_done_message{
		width: 50%;
	}
	#nav-tab{
		font-weight: bold;
		color: deepskyblue;
		font-family: monospace;
	}
</style>
<div class="w3-container" id="form">
	<h2>REPAIR INFORMATION ON <?php echo $C_name; ?> CAR( <?php echo $C_type; ?> )</h2><br><br>
	<input type="text" value="<?php echo $customer_id;?>" id="in_use_customer_id" style="display: none">
	<input type="text" value="<?php echo $C_date_in;?>"  id="in_use_customer_date_in" style="display: none">
	<div id="message"></div>
	<ul class="nav nav-tabs">
		<li class="" id="nav-tab"><a data-toggle="tab" href="#worker" aria-expanded="false">WORKERKING MECHANIC</a></li>
		<li id="nav-tab" class=""><a data-toggle="tab" href="#spare" aria-expanded="false">SPARE USED</a></li>
		<li id="nav-tab" class="active"><a data-toggle="tab" href="#spare_worker" aria-expanded="true">SPARE AND WORKER USED</a></li>
		<!-- <li id="nav-tab" class="active"><a data-toggle="tab" href="#car_problem" aria-expanded="true">ADD CAR PROBLEMS</a></li> -->
	</ul>
	<div id="repairment_info">
		<div class="tab-content">
			<br><br>
			<div id="worker" class="tab-pane fade in active">
					<div class="worker_info">
						<form method="post">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>WORKER NAMES</th>
									<th>WORKER PRICE</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										<!-- <div class="col-sm-8"> -->
											<div class="form-group">
								  				<select class="form-control" id="worker_name" placeholder="Worker Name...">
								  					<option></option>
													<?php 
													$all_workers=$connection->query("SELECT * FROM workers_information");
													while($get_worker=mysqli_fetch_array($all_workers)){
														$worker_name=$get_worker['worker_name'];
														$worker_id=$get_worker['worker_id'];
													 ?>
												 	<option value="<?php echo $worker_id; ?>"><?php echo $worker_name; ?></option>
												 	<?php 
												 	}
												 	?>
								  				</select>
											</div>
										<!-- </div> -->
									</td>
									<td>
										<!-- <div class="col-sm-2"> -->
											<input type="number" name="worker_price" placeholder="Worker Price..." id="worker_price_selected">
										<!-- </div> -->
									</td>		
								</tr>
							</tbody>
						</table>
						<input type="button" value="ASSIGN WORKER" class="btn btn-info" onclick="get_worker_information()">
						<div id="customer_done_message"></div>
						</form>
					</div><br>
			</div>




			<div id="spare" class="tab-pane fade in">
					<div class="spare_info">
						<form method="post">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th colspan="2">SPARE TYPE</th>
									<th width="20%">SPARE NAMES</th>
									<th width="">SPARE PRICE</th>
									<th>SPARE QUANTITIE</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										<select class="form-control w3-input w3-border" id="spare_categorie" style="width:98%">
											<option value="TOYOTO">TOYOTO</option>
											<option value="RAV 4">RAV 4</option>
											<option value="RANGE ROVER">RANGE ROVER</option>
											<option value="SCANIA">SCANIA</option>
											<option value="MITSUBISHI">MITSUBISHI</option>
											<option value="KWASITERI">KWASITERI</option>
											<option value="OTHERS">OTHERS</option>
										</select>
									</td>
									<td>
										<select class="form-control w3-input w3-border" id="spare_type" style="width:98%" onchange="get_belonging_spare()">
											<option value=""></option>
											<option value="ORIGINAL">ORIGINAL</option>
											<option value="SECOND HAND">SECOND HAND</option>
											<option value="32 KARE">32 KARE</option>
										</select>
									</td>
									<td>
										<div class="form-group" id="all_selected_spare">
									  		<select class="form-control" placeholder="Spare Name..." name="spare_name" id="spare_name" onchange="get_spare_quantitie()">
									  			<option></option>
									    	</select>
										</div>
									</td>
									<td>
										<div id="spare_price">
											<input type="number" name="spare_price" placeholder="Spare Unit Price..." id="selected_spare_price" disabled required>
										</div>
									</td>
									<td>
										<div id="spare_quantitie">
											<input type="number" name="spare_quantitie" placeholder="Spare quantitie..." min="0" id="selected_spare_quantitie" required disabled>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
						<input type="button" name="" value="PROVIDE SPARE" class="btn btn-info" onclick="get_spare_information()">
						<div id="done_message"></div>
					</form>
					</div>
			</div>




			<div id="spare_worker" class="tab-pane fade in">
				<form method="post">
					<div class="worker_info">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>WORKER NAMES</th>
									<th>WORKER PRICE</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										<!-- <div class="col-sm-8"> -->
											<div class="form-group">
								  				<select class="form-control" id="worker_name" placeholder="Worker Name...">
								  					<option></option>
													<?php 
													$all_workers=$connection->query("SELECT * FROM workers_information");
													while($get_worker=mysqli_fetch_array($all_workers)){
														$worker_name=$get_worker['worker_name'];
														$worker_id=$get_worker['worker_id'];
													 ?>
												 	<option value="<?php echo $worker_id; ?>"><?php echo $worker_name; ?></option>
												 	<?php 
												 	}
												 	?>
								  				</select>
											</div>
										<!-- </div> -->
									</td>
									<td>
										<!-- <div class="col-sm-2"> -->
											<input type="number" name="worker_price" placeholder="Worker Price..." id="worker_price_selected">
										<!-- </div> -->
									</td>		
								</tr>
							</tbody>
						</table>
					</div><br>
					<div class="spare_info">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th colspan="2">SPARE TYPE</th>
									<th width="20%">SPARE NAMES</th>
									<th>SPARE PRICE</th>
									<th>SPARE QUANTITIE</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										<select class="form-control w3-input w3-border" id="spare_categorie" style="width:98%">
											<option value="TOYOTO">TOYOTO</option>
											<option value="RAV 4">RAV 4</option>
											<option value="RANGE ROVER">RANGE ROVER</option>
											<option value="SCANIA">SCANIA</option>
											<option value="MITSUBISHI">MITSUBISHI</option>
											<option value="KWASITERI">KWASITERI</option>
											<option value="OTHERS">OTHERS</option>
										</select>
									</td>
									<td>
										<select class="form-control w3-input w3-border" id="spare_type" style="width:98%" onchange="get_belonging_spare()">
											<option value=""></option>
											<option value="ORIGINAL">ORIGINAL</option>
											<option value="SECOND HAND">SECOND HAND</option>
											<option value="32 KARE">32 KARE</option>
										</select>
									</td>
									<td>
										<div class="form-group" id="all_selected_spare">
									  		<select class="form-control" placeholder="Spare Name..." name="spare_name" id="spare_name" onchange="get_spare_quantitie()">
									  			<option></option>
									    	</select>
										</div>
									</td>
									<td>
										<div id="spare_price">
											<input type="number" name="spare_price" placeholder="Spare Unit Price..." id="selected_spare_price" disabled required>
										</div>
									</td>
									<td>
										<div id="spare_quantitie">
											<input type="number" name="spare_quantitie" placeholder="Spare quantitie..." min="0" id="selected_spare_quantitie" required disabled>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div><br><br>
					<input type="button" name="" value="SAVE INFORMATION" class="btn btn-info" onclick="get_all_information()">
					<div id="done_message"></div>
				</form>
			</div>


			<!-- <div id="car_problem" class="tab-pane fade in">
				<div class="form-group" >
					<form method="post">
						<table class="table table-bordered">
								<thead>
									<tr>
										<th width="400">NUMBER PROBLEMS THAT CAR HAS</th>
										<th>PROBLEMS STATEMENTS</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											<select class="form-control" id="number_of_problems" onchange="number_of_problems()">
												<option>NUMBER Of PROBLEMS</option>
											</select>
										</td>
										<td id="car_problems">
											<input type="text" name="car_problems" placeholder="Write car problems" required>
										</td>
									</tr>
								</tbody>
						</table>
						<input type="submit" name="save_problem" value="SAVE PROBLEM">
					</form>
				</div>
			</div> -->
		</div>
	</div>








<script>
  function get_spare_quantitie() {
    var spare_id=document.getElementById('spare_name').value;
    $.ajax({
      url: "ajax_task/ajax_get_selected_spare_quantitie.php",
      type: "post",
      async: false,
      data: {
        spare_id : spare_id,
      },
      success: function (data) {
        $("#spare_quantitie").html(data);
      }
    });
    $.ajax({
      url: "ajax_task/ajax_get_min_price.php",
      type: "post",
      async: false,
      data: {
        spare_id : spare_id,
      },
      success: function (data) {
        $("#spare_price").html(data);
      }
    });
  };





  function get_belonging_spare() {
    var spare_category=document.getElementById('spare_categorie').value;
    var spare_type=document.getElementById('spare_type').value;
    $.ajax({
      url: "ajax_task/ajax_get_belonging_spare.php",
      type: "post",
      async: false,
      data: {
        spare_category : spare_category,
        spare_type : spare_type,
      },
      success: function (data) {
        $("#all_selected_spare").html(data);
      }
    });
  };
  

  function get_worker_information() {
    var customer_id=document.getElementById('in_use_customer_id').value;
    var date_in=document.getElementById('in_use_customer_date_in').value;
    var worker_price=document.getElementById('worker_price_selected').value;
    var worker_id=document.getElementById('worker_name').value;
    $.ajax({
      url: "ajax_task/storing_transaction_information.php",
      type: "post",
      async: false,
      data: {
        customer_id : customer_id,
        date_in : date_in,
        worker_id : worker_id,
        worker_price : worker_price,

      },
      success: function (data) {
        $("#customer_done_message").html(data);
      }
    });
  };





  function get_spare_information(){
   	var spare_id_used=document.getElementById('spare_name').value;
  	var selected_spare_price=document.getElementById('selected_spare_price').value;
  	var maximum_quantitie=document.getElementById('maximum_quantitie_value').value;
  	var selected_spare_quantitie=document.getElementById('selected_spare_quantitie').value;
  	var spare_min_price=document.getElementById('selected_spare_min_price').value;
  	var customer_id=document.getElementById('in_use_customer_id').value;
  	$.ajax({
      url: "ajax_task/storing_transaction_information.php",
      type: "post",
      async: false,
      data: {
        spare_id_used : spare_id_used,
        selected_spare_price : selected_spare_price,
        selected_spare_quantitie : selected_spare_quantitie,
        maximum_quantitie:maximum_quantitie,
        spare_min_price:spare_min_price,
        customer_id : customer_id,
      },
      success: function (data) {
        $("#done_message").html(data);
      }
    });
  };
</script>
