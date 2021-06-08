<?php 
include('../db-comm/database_connection.php');
if (isset($_POST['spare_id'])) {
	$spare_id=$_POST['spare_id'];
	$get_selected_min_price=$connection->query("SELECT spare_minimum_price FROM spair_parts WHERE spare_part_id=$spare_id");
	if ($get_selected_min_price) {
		$get_it=mysqli_fetch_array($get_selected_min_price);
		$min_price=$get_it['spare_minimum_price'];
		echo "<input type='number' name='spare_price' placeholder='Spare unity price : $min_price' id='selected_spare_price'>";
	  	echo "<input type='text' id='selected_spare_min_price' value='$min_price' style='height:1px;visibility:hidden;'>";
	}else{}
}

?>