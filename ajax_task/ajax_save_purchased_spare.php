<?php 
session_start();
include('../db-comm/database_connection.php');
if ($_SESSION['UserId']) {
	$User=$_SESSION['UserId'];
	if (isset($_POST['spare_id'])) {
		$spare_id=$_POST['spare_id'];
		$quantity=$_POST['quantity_bought'];
		$amount=$_POST['amount_bought'];
		$buyer=$_POST['buyer_name'];
		$_date=date("Y-m-d");
		$insert_purchase=$connection->query("INSERT INTO purchasing(spare_part_id,purchase_quantity,buyer,date_made,purchase_price,status)VALUES('$spare_id','$quantity','$buyer','$_date','$amount','Pending')");
		if ($insert_purchase) {
			echo "
			<script>
				confirm('SPARE PUECHASE HAVE BEEN SAVED');
			</script>
			<div class='alert alert-success fade in'>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <strong>THANK YOU!</strong> YOU HAVE REGISTERED PURCHASE.
			</div>
			";
		}
		else{
			echo "
			<script>
				confirm('MUTWIHANGANIRE! NTAGO BIBASHASHIJE GUKORWA');
			</script>
			<div class='alert alert-danger fade in'>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <strong>SORRY!</strong> IBYO USABYE NTAGO BIBASHIZE GUKORWA.
			</div>
			";	
		}
	}
}
?>