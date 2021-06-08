<?php 
include('../db-comm/database_connection.php');
if (isset($_POST['on_edit_spare_id'])) {
	$on_edit_spare_id=$_POST['on_edit_spare_id'];
	$spare_name=$_POST['spare_name'];
	$spare_type=$_POST['spare_type'];
	$spare_categorie=$_POST['spare_categorie'];
	$spare_minimum_price=$_POST['spare_minimum_price'];
	$edit_spare_query=$connection->query("UPDATE spair_parts SET spare_part_name='$spare_name',spare_part_type='$spare_type',spare_part_categorie='$spare_categorie',spare_minimum_price='$spare_minimum_price' WHERE spare_part_id=$on_edit_spare_id");
	if (!$edit_spare_query) {
		die('ERROR'.mysqli_error($edit_spare_query));
	}
	else{
		echo "<script>alert('SPARE UPDATED');</script>";
	}
}
?>	