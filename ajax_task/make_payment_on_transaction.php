<?php 
include('../db-comm/database_connection.php');
if (isset($_POST['customer_id'])) {
	$customer_id=$_POST['customer_id'];
	$amount_payed=$_POST['amount_bieng_payed'];
	$select_payed_amount_transaction=$connection->query("SELECT * FROM bill WHERE customer_id='$customer_id'");
		$get_amount=mysqli_fetch_array($select_payed_amount_transaction);
		$amount_that_was_payed=$get_amount['payed_amount'];
		$total_payed_money=$amount_that_was_payed+$amount_payed;
		$update_amount_payed=$connection->query("UPDATE bill SET payed_amount='$total_payed_money' WHERE customer_id=$customer_id");
			if ($update_amount_payed) {
				echo "<script>confirm('PAYMENT HAVE BEEN DONE')</script>";
			}
			if (!$update_amount_payed) {
				echo "<script>confirm('ERROR IN PAYMENT')</script>";
			}
}
?>