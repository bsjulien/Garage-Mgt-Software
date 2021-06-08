<?php 
session_start();
$user_id=$_SESSION['UserId'];
include('../db-comm/database_connection.php');
if (isset($_POST['worker_id'])){
	$customer_id=$_POST['customer_id'];
	$date_in=$_POST['date_in'];
	$worker_id=$_POST['worker_id'];
	$amount_given=$_POST['worker_price'];
	if ($amount_given =='') {
		echo "
			<div class='alert alert-danger'>
  				<strong>Empty!</strong> Please enter worker price.
			</div>
		";
	}
	
	if ($customer_id =='') {
		echo "
			<div class='alert alert-danger'>
  				<strong>Empty!</strong> Please enter worrker name.
			</div>
		";
	}
	if ($customer_id !='' && $amount_given !='') {
		$_date=date("Y-m-d");
		$insert_transaction_field=$connection->query("INSERT INTO garage_car_transactions(customer_id,spare_part_id,spare_quantity_used,spare_price,worker_id,worker_price,date_made,user_id)VALUES('$customer_id',1,0,0,'$worker_id','$amount_given','$_date','$user_id')");
			if ($insert_transaction_field) {
					$select_customer_bill=$connection->query("SELECT * FROM bill WHERE 	customer_id='$customer_id'");
					$count_rows=mysqli_num_rows($select_customer_bill);
					$data=mysqli_fetch_array($select_customer_bill);
					if ($count_rows == 0) {
						$now_bill=$amount_given;
						$insert_bill=$connection->query("INSERT INTO bill(customer_id,bill,payed_amount,status)VALUES('$customer_id','$now_bill','0','Pending')");
						if ($insert_bill) {
							echo "
							<div class='alert alert-success'>
				  				<strong>Thank you!</strong> For registering worker.
							</div>
							";
						}
					}
					else{
						$before_bill=$data['bill'];
						$now_bill=$before_bill+$amount_given;
						$update_bill=$connection->query("UPDATE bill SET bill='$now_bill' WHERE customer_id='$customer_id'");
						if ($update_bill) {
							echo "
							<div class='alert alert-success'>
				  				<strong>Thank you!</strong> For registering worker.
							</div>
							";
						}
					}
					
			}
			else{
				echo "
				<div class='alert alert-s'>
	  				<strong>Sorry Worker!</strong> Isn't assigned.
				</div>
				";
			}
	}

}
























if (isset($_POST['spare_id_used'])) {
	$customer_id=$_POST['customer_id'];
	$spare_id_used=$_POST['spare_id_used'];
	$selected_spare_price=$_POST['selected_spare_price'];
	$selected_spare_quantitie=$_POST['selected_spare_quantitie'];
	$minimum_spare_price=$_POST['spare_min_price'];
	$maximum_spare_quantitie_in_stock=$_POST['maximum_quantitie'];
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
		$amount_given=$selected_spare_quantitie*$selected_spare_price;
		$_date=date("Y-m-d");
		$insert_transaction_field=$connection->query("INSERT INTO garage_car_transactions(customer_id,spare_part_id,spare_quantity_used,spare_price,worker_id,worker_price,date_made,user_id)VALUES('$customer_id','$spare_id_used','$selected_spare_quantitie','$selected_spare_price','21','0','$_date','$user_id')");
					if (!$insert_transaction_field) {
						echo "
							<div class='alert alert-danger'>
			  					<strong>Error!</strong> on storing transaction data.
							</div>
						";
					}
					else{
						$select_data_of_spare=$connection->query("SELECT * FROM spair_parts WHERE spare_part_id='$spare_id_used'");
							$get_spare_data=mysqli_fetch_array($select_data_of_spare);
							$spare_quantitie_retrieved=$get_spare_data['spare_part_quantitie'];
						$new_spare_quantitie=$spare_quantitie_retrieved-$selected_spare_quantitie;
						$update_spare_quantitie=$connection->query("UPDATE spair_parts SET spare_part_quantitie=$new_spare_quantitie WHERE spare_part_id=$spare_id_used");
						if ($update_spare_quantitie) {
							$select_customer_bill=$connection->query("SELECT * FROM bill WHERE 	customer_id='$customer_id'");
							$count_rows=mysqli_num_rows($select_customer_bill);
							$data=mysqli_fetch_array($select_customer_bill);
							if ($count_rows == 0) {
								$now_bill=$amount_given;
								$insert_bill=$connection->query("INSERT INTO bill(customer_id,bill,payed_amount,status)VALUES('$customer_id','$now_bill','0','Pending')");
								if ($insert_bill) {
									echo "
										<div class='alert alert-info'>
					  						<strong>Record!</strong> New bill is successful recorded into custormer information book.
										</div>
									";
								}
							}
							else{
								$before_bill=$data['bill'];
								$now_bill=$before_bill+($selected_spare_price * $selected_spare_quantitie);
								$update_bill=$connection->query("UPDATE bill SET bill='$now_bill' WHERE customer_id='$customer_id'");
								if ($update_bill) {
									echo "
										<div class='alert alert-info'>
					  						<strong>Record!</strong> bill hsve been updated successful recorded into custormer information book.
										</div>
									";
								}
							}
						}
					}
	}
	else{
		echo "<script>alert('NTAGO BIBASHIJE GUKORWA KUBERA ICYO CYIBAZO')</script>";
	}
}
?>