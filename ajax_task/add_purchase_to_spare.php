<?php 
include('../db-comm/database_connection.php');
if (isset($_POST['spare_id'])) {
	$purchase_id=$_POST['purchasing_id'];
	$spare_id=$_POST['spare_id'];
	$quantity=$_POST['quantity_to_add'];
	$get_remaining_spare_quantity=$connection->query("SELECT * FROM spair_parts WHERE spare_part_id='$spare_id'");
	$information=mysqli_fetch_array($get_remaining_spare_quantity);
	$remaining_quantity=$information['spare_part_quantitie'];
	$new=$remaining_quantity+$quantity;
	$update_quantity=$connection->query("UPDATE spair_parts SET spare_part_quantitie='$new' WHERE spare_part_id='$spare_id'");
	$check_update_status=$connection->query("SELECT * FROM purchasing WHERE purchase_id='$purchase_id'");
	$status_information=mysqli_fetch_array($check_update_status);
	$status_before=$status_information['status'];
	if ($status_before=='Approved') {
			echo "
				<script>
					confirm('Hello the new spare is already stored in store');
				</script>
				<div class='alert alert-danger'>
						<strong>Please select anther one!</strong> Thank you.
				</div>
			";
	}
	else{
		if ($update_quantity) {
			$update_status=$connection->query("UPDATE purchasing SET status='Approved' WHERE purchase_id='$purchase_id'");
			if ($update_status) {
				echo "
					<script>
						confirm('Thank You for adding This spare into the store');
					</script>
					<div class='alert alert-danger'>
							<strong>THANK YOU FOR ADDING SPARES!</strong> in the stock.
					</div>
				";
			}
			
		}
	}
}


?>