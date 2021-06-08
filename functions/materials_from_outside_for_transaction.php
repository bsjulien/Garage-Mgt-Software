<style >
	#all_used_materials{
		border-top: 8px solid goldenrod;
		margin: 10px auto;
		max-width: 95%;
		background-color: whitesmoke;
		padding-top: 10px;
		padding-bottom: 10px;
	}
	h2{
	  font-size:22px; 
	  font-family: monospace;
	  font-weight: bold;
	  color: #EE2050;
	  text-transform: uppercase;
	}
	h2{
	  margin-left: 30px;
	}
	#add_material{
		max-width: 95%;
		margin: 10px auto;
		overflow-x: auto;
	}
	input {
	  padding: 10px;
	  width: 100%;
	  font-size: 17px;
	  font-family: Raleway;
	  border: 1px solid #aaaaaa;
	  line-height: 1.2;
	}
	table thead tr th{
		line-height: 1.5;
		background: goldenrod;
		color: white;
		font-family: sans-serif;
		font-weight: 900;
	}
	input[type="button"]{
		float: right;
		width: auto;
		padding: 10px 20px 10px 20px;
		font-family: monospace;
		font-weight: bold;
		color: grey;
		background-color: goldenrod;
	}
	input[type="button"]:hover{
		opacity: 0.9;
	}
	#material_info{
		margin-left: 5px;
		border:1px solid black;
		padding:4px 10px 4px 10px;
		font-size: 17px;
		font-family: monospace;
	}
	textarea{
		overflow-x:hidden;
	}
	 @media only screen and (min-width : 150px) and (max-width : 730px){
		#material_info{
				margin-left: 3px;
				border:1px solid black;
				padding:4px 10px 4px 10px;
				font-size: 7px;
				font-family: monospace;
			}

	}
	@media only screen and (min-width : 731px) and (max-width : 900px){
	  #material_info{
			margin-left: 3px;
			border:1px solid black;
			padding:4px 10px 4px 10px;
			font-size: 7.5px;
			font-family: monospace;
		}
	}
	@media only screen and (min-width : 900px) and (max-width : 1050px){
	  #material_info{
			margin-left: 3px;
			border:1px solid black;
			padding:4px 10px 4px 10px;
			font-size: 8px;
			font-family: monospace;
		}

}
</style>
<?php 
if (isset($_POST['section'])) {
	include('../db-comm/database_connection.php');
	$selected_transaction_id=$_POST['transaction_id'];
	$get_car_owner=$connection->query("SELECT * FROM garage_car_transactions WHERE custormer_name!='' AND transaction_id='$selected_transaction_id'");
	$his_data=mysqli_fetch_array($get_car_owner);
	$name=$his_data['custormer_name'];
	$plate_number=$his_data['car_plate_no'];
}
?>	
	<h2>IBIKORESHO BYAGUZWE HANZE KU MODOKA YA <?php echo $name." ".$plate_number; ?></h2>
	<div id="all_used_materials">
		<?php 
			$get_used_materials=$connection->query("SELECT * FROM product_bought_outside WHERE transaction_id='$selected_transaction_id'");
			$id=1;
			while ($used_material_info=mysqli_fetch_array($get_used_materials)) {
				$material_name=$used_material_info['product_bought'];
				$material_price=$used_material_info['product_price'];
				$material_quantitie=$used_material_info['product_quantitie'];
				$material_reason=$used_material_info['reason'];
				echo "
					<span id='material_info'>$id</span>
					<span id='material_info'><b>Name : </b>$material_name</span>
					<span id='material_info'><b>Price : </b>$material_price</span>
					<span id='material_info'><b>Quantitie : </b>$material_quantitie</span>
					<span id='material_info'><b>Reason : </b>$material_reason</span><br><br>
				";
			$id++;
			}


		?>
	</div>
	<div id="add_material">
		<form>
		<table class="table table-bordered">
				<thead>
					<tr>
						<th>MATERIAL NAMES</th>
						<th>MATERIAL PRICE</th>
						<th>MATERIAL QUANTITIE</th>
						<th>MATERIAL REASON</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>
							<div id="material_name1">
								<input type="text" name="material_name" placeholder="Material Name..." id="material_name" required>
							</div>
						</td>
						<td>
							<div id="material_price1">
								<input type="number" name="material_price" placeholder="Material Price..." id="material_price" required>
							</div>
						</td>
						<td>
							<div id="material_quantitie1">
								<input type="number" name="material_quantitie" placeholder="Material quantitie..." min="0" id="material_quantitie" required>
							</div>
						</td>
						<td>
							<div id="material_reason1">
								<textarea id="material_reason" required="">
									
								</textarea>
							</div>
						</td>
					</tr>
				</tbody>
		</table>
		<input type="button" name="" value="SAVE" onclick="register_bought_product(<?php echo $selected_transaction_id; ?>)">
		</form>
	</div>
	<script>
		function register_bought_product(transaction_id){
			transaction_id =transaction_id;
			material_name=document.getElementById('material_name').value;
			if (material_name == '') {
				return false
			}
			material_price=document.getElementById('material_price').value;
			if (material_price == '') {
				return false
			}
			material_quantitie=document.getElementById('material_quantitie').value;
			if (material_quantitie == '') {
				return false
			}
			material_reason=document.getElementById('material_reason').value;
			if (material_reason == '') {
				return false
			}
			$.ajax({
		      url: "ajax_task/storing_outside_bought_materials.php",
		      type: "post",
		      async: false,
		      data: {
		      	transaction_id : transaction_id,
		      	material_name : material_name,
		      	material_price :material_price,
		      	material_quantitie : material_quantitie,
		      	material_reason : material_reason,
		      },
		      success: function (data) {
		        $("#all_used_materials").html(data);
		      }
		    });
		}
	</script>