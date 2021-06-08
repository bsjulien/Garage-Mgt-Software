<?php 
include('../db-comm/database_connection.php');
if (isset($_POST['spare_id'])) {
	$spare_id=$_POST['spare_id'];
	$get_selected_spare_quantitie=$connection->query("SELECT * FROM spair_parts WHERE spare_part_id=$spare_id");
	if ($get_selected_spare_quantitie) {
		$get_it=mysqli_fetch_array($get_selected_spare_quantitie);
		$type=$get_it['spare_part_type'];
	  	$quantitie=$get_it['spare_part_quantitie'];
	  	$min_price=$get_it['spare_minimum_price'];
	?>
		  <p>
		  	<b>spare type</b><br>
		  	<input class="w3-input w3-border" type="number" id="spare_type" placeholder="<?php echo $type; ?>" style="width:50%" disabled>
		  </p>
		  <p>
		  	<b>spare quantity in store</b><br>
		  	<input class="w3-input w3-border" type="number" id="spare_quantitie" placeholder="<?php echo $quantitie; ?>" style="width:50%" disabled>
		  </p>
		  <p>
		  	<b>spare minimum price</b><br>
		  	<input class="w3-input w3-border " type="number" id="min_price" placeholder="<?php echo $min_price; ?>" style="width:50%" disabled>
		  </p>
<?php
	}
	else{}
}
?>