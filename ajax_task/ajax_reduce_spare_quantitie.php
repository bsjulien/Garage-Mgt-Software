<?php 
include('../db-comm/database_connection.php');
if (isset($_POST['spare_id'])) {
	$unique_id=$_POST['transaction_id'];
	$customer_id=$_POST['customer_id'];
	$spare_id=$_POST['spare_id'];
	$given_spare_price=$_POST['given_spare_price'];
	$sold_spare_quantitie=$_POST['sold_spare_quantitie'];
	$spare_quantitie_in_stock=$_POST['spare_quantitie_in_stock'];
	$number_spare_to_reduce=$_POST['number_spare_to_reduce'];
	$updated_spare_quantitie=$sold_spare_quantitie-$number_spare_to_reduce;
	$reduced_money=$given_spare_price*$number_spare_to_reduce;
	$updated_spare_quantitie_in_stock=$spare_quantitie_in_stock+$number_spare_to_reduce;
	$update_transaction_spare_quantitie=$connection->query("UPDATE garage_car_transactions SET spare_quantity_used='$updated_spare_quantitie' WHERE spare_part_id='$spare_id' AND customer_id='$customer_id' AND id='$unique_id'");
	if ($update_transaction_spare_quantitie) {
		$add_to_spare_stock=$connection->query("UPDATE spair_parts SET spare_part_quantitie='$updated_spare_quantitie_in_stock' WHERE spare_part_id='$spare_id'");
			if ($add_to_spare_stock) {
				$select_customer_bill=$connection->query("SELECT * FROM bill WHERE 	customer_id='$customer_id'");
						$data=mysqli_fetch_array($select_customer_bill);
						$before_bill=$data['bill'];
						$now_bill=$before_bill-$reduced_money;
						$update_bill=$connection->query("UPDATE bill SET bill='$now_bill' WHERE customer_id='$customer_id'");
						if ($update_bill) {
							echo "
							<div class='alert alert-success'>
					  			<strong>Thank you!</strong> Changes have been made.
							</div>
							";
						}
			}
			else{
				echo "
				<div class='alert alert-danger'>
		  			<strong>Hello!</strong> We were unable to perform your request.....
				</div>
				";		
			}
	}
	elseif (!$update_transaction_spare_quantitie) {
		echo "
			<div class='alert alert-danger'>
				<strong>Hello!</strong> We were unable to perform your request.
			</div>
		";	
	}
}
?>	