<?php 
include('../db-comm/database_connection.php');
if (isset($_POST['spare_id'])) {
	$spare_id=$_POST['spare_id'];
	$get_selected_spare_quantitie=$connection->query("SELECT spare_part_quantitie FROM spair_parts WHERE spare_part_id=$spare_id");
	if ($get_selected_spare_quantitie) {
		$get_it=mysqli_fetch_array($get_selected_spare_quantitie);
	  	$quantitie=$get_it['spare_part_quantitie'];
	  	echo "<input type='number' name='spare_quantitie' placeholder='$quantitie Spare quantitie in stock...'' min='0' max='$quantitie' id='selected_spare_quantitie' required>";
	  	echo "<input type='number' id='maximum_quantitie_value' value='$quantitie' style='height:1px;visibility:hidden'>";
	}
	else{}
}
?>