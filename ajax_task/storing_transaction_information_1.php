<?php 
session_start();
$user_names=$_SESSION['FullNames'];
include('../db-comm/database_connection.php');
if (isset($_POST['transaction_id'])) {
	$transaction_id=$_POST['transaction_id'];
	$car_plate_no=$_POST['car_plate_no'];
	$date_in=$_POST['date_in'];
	$spare_id_used=$_POST['spare_id_used'];
	$selected_spare_price=$_POST['selected_spare_price'];
	$selected_spare_quantitie=$_POST['selected_spare_quantitie'];
	$worker_id_used=$_POST['worker_id_used'];
	$worker_price_selected=$_POST['worker_price_selected'];
	$maximum_spare_quantitie_in_stock=$_POST['maximum_quantitie'];
	$minimum_spare_price=$_POST['spare_minimum_price'];
	if ($selected_spare_quantitie == '') {
		echo "
				<div class='alert alert-danger'>
  					<strong>Empty!</strong> Please enter spare quantitie.
				</div>
			";
	}
	if ($selected_spare_quantitie > $maximum_spare_quantitie_in_stock) {
				echo "
						<div class='alert alert-danger'>
		  					<strong>Error!</strong> Your are selling high spare quantitie.
						</div>
					";
	}
	if ($selected_spare_price == '') {
		echo "
				<div class='alert alert-danger'>
  					<strong>Empty!</strong> Please enter spare price.
				</div>
			";
	}
	if ($selected_spare_price < $minimum_spare_price) {
				echo "
						<div class='alert alert-danger'>
		  					<strong>Error!</strong> That Price doesn't buy this spare.
						</div>
					";
	}
	if ($selected_spare_quantitie != '' && $selected_spare_quantitie <= $maximum_spare_quantitie_in_stock && $selected_spare_price >= $minimum_spare_price) {
				global $connection;
				$select_data_of_spare=$connection->query("SELECT * FROM spair_parts WHERE spare_part_id='$spare_id_used'");
					$get_spare_data=mysqli_fetch_array($select_data_of_spare);
					$spare_name_retrieved=$get_spare_data['spare_part_name'];
					$spare_quantitie_retrieved=$get_spare_data['spare_part_quantitie'];
					$spare_type_retrieved=$get_spare_data['spare_part_type'];
					$spare_categorie_retrieved=$get_spare_data['spare_part_categorie'];
				$insert_transaction_field=$connection->query("INSERT INTO garage_car_transactions(transaction_id,car_plate_no,date_in,spare_id_used,spare_quantitie_used,spare_price,worker_used,worker_price,made_by)VALUES('$transaction_id','$car_plate_no','$date_in','$spare_id_used','$selected_spare_quantitie','$selected_spare_price','$worker_id_used','$worker_price_selected','$user_names')");
					if (!$insert_transaction_field) {
						echo "
							<div class='alert alert-danger'>
			  					<strong>Error!</strong> on storing transaction data.
							</div>
						";
					}
					else{
						$new_spare_quantitie=$spare_quantitie_retrieved-$selected_spare_quantitie;
						$update_spare_quantitie=$connection->query("UPDATE spair_parts SET spare_quantitie_remaining=$new_spare_quantitie WHERE spare_part_id=$spare_id_used");
						if ($update_spare_quantitie) {
							echo "
								<div class='alert alert-info'>
			  						<strong>Record!</strong> successful recorded into custormer information book.
								</div>
							";
						}
					}
	}
	else{
		echo "<script>alert('NTAGO BIBASHIJE GUKORWA KUBERA ICYO CYIBAZO')</script>";
	}
}
?>