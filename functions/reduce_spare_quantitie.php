<?php 
include('../db-comm/database_connection.php');
if (isset($_POST['spare_id'])) {
	$transaction_id=$_POST['id'];
	$customer_id=$_POST['customer_id'];
	$spare_id=$_POST['spare_id'];
	$sold_spare_quantitie=$_POST['spare_quantitie'];
	$given_spare_price=$_POST['spare_price_given'];
	$selected_spare_info=$connection->query("SELECT * FROM spair_parts WHERE spare_part_id=$spare_id");
	while ($spare_info=mysqli_fetch_array($selected_spare_info)) {
		$spare_name=$spare_info['spare_part_name'];
		$spare_type=$spare_info['spare_part_type'];
		$spare_categorie=$spare_info['spare_part_categorie'];
		$spare_quantitie_remianing_in_stock=$spare_info['spare_part_quantitie'];
	}
}
?>
<style >
	#reducing-section{
		width: 100%;
		border:3px solid deepskyblue;
		padding: 20px 30px 20px 30px;
		background-color:white;
	}
	#save_button{
		margin-top: 7px;
		border:none;
		float: right;
		padding: 0px 20px 0px 20px;
		font-family: monospace;
		color:white;
		font-weight: 900;
		border-radius: 3px;
		background-color: deepskyblue;
	}
	#save_button:hover{
		transition: 2s;
		background-color: skyblue;
	}
	input{
		font-family: monospace;
		padding: 8px;
	}
	tr td{
		font-variant: small-caps;
		font-family: monospace;
		color: grey;
	}
	.title{
		background-color: lightgray;
		font-weight: 900;
		color: white;
	}
	.close_view{
		color: deepskyblue;
		float: right;
		border: 2px solid deepskyblue;
		margin-top: -2.3%;
		margin-right: -3.3%;
	}
	.close_view:hover{
		color: white;
		background-color: deepskyblue;
		transition: 2s;
	}
</style>
		<div id="reducing-section">
			<span class="fa fa-close close_view" onclick="remove_view()"></span>
			<table class="table table-bordered table-responsive">
				<tr>
					<td class="title">SPARE NAME</td>
					<td><?php echo $spare_name; ?></td>
				</tr>
				<tr>
					<td class="title">SPARE TYPE</td>
					<td><?php echo $spare_type; ?></td>
				</tr>
				<tr>
					<td class="title">SPARE CATEGORIE</td>
					<td><?php echo $spare_categorie; ?></td>
				</tr>
				<tr>
					<td class="title">SPARE QUANTITIE IN STOCK</td>
					<td><?php echo $spare_quantitie_remianing_in_stock; ?></td>
				</tr>
				<tr>
					<td class="title">SPARE QUANTITIE TO REDUCE</td>
					<td>
						<input type="number" name="spare_reduction" id="spare_reduction" placeholder="<?php echo $sold_spare_quantitie." Have Been Sold.... "; ?>" max="2" min="1" style="width: 80%" required>
					</td>
				</tr>
			</table>
			<button id='save_button' onclick="save_data('<?php echo $spare_id ?>','<?php echo $spare_quantitie_remianing_in_stock ?>','<?php echo $sold_spare_quantitie ?>','<?php echo $customer_id; ?>','<?php echo $transaction_id; ?>','<?php echo $given_spare_price; ?>')">SAVE</button>
		</div>
		<div id="free_space"></div>
		<script>
			function save_data(spare_id,spare_quantitie_in_stock,sold_spare_quantitie,customer_id,transaction_id,given_spare_price){
				transaction_id=transaction_id;
				spare_id=spare_id;
				spare_quantitie_in_stock=spare_quantitie_in_stock;
				sold_spare_quantitie=sold_spare_quantitie;
				number_spare_to_reduce=document.getElementById('spare_reduction').value;
				given_spare_price=given_spare_price;
				customer_id=customer_id;/*
				alert(spare_id+' - '+spare_quantitie_in_stock+' - '+sold_spare_quantitie+' - '+number_spare_to_reduce+' - '+customer_id);*/
				if (number_spare_to_reduce=='' || number_spare_to_reduce>sold_spare_quantitie) {
					alert('NO QUANTITIE TO REDUCE');
					return false;
				}
				$.ajax({
				      url: "ajax_task/ajax_reduce_spare_quantitie.php",
				      type: "post",
				      async: false,
				      data: {
				      	transaction_id : transaction_id,
				      	spare_id : spare_id,
				      	spare_quantitie_in_stock : spare_quantitie_in_stock,
				      	sold_spare_quantitie : sold_spare_quantitie,
				      	number_spare_to_reduce : number_spare_to_reduce,
				      	customer_id : customer_id,
				      	given_spare_price:given_spare_price,
				      },
				      success: function (data) {
				        $("#free_space").html(data);
				      }
				    });
			}
			function remove_view(){
				document.getElementById('reducing-section').style.display='none';
			}
		</script>