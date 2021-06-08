<?php 
include('../db-comm/database_connection.php');
if (isset($_POST['spare_category'])) {
	$spare_category=$_POST['spare_category'];
	$spare_type=$_POST['spare_type'];
?>
<select class="form-control" placeholder="Spare Name..." name="spare_name" id="spare_name" onchange="get_spare_quantitie()" required>
<?php 
		$all_spare=$connection->query("SELECT * FROM spair_parts WHERE spare_part_categorie='$spare_category' AND spare_part_type='$spare_type'");
		$number_of_info_got=mysqli_num_rows($all_spare);
		if ($number_of_info_got>0) {
			echo "<option>SELECT</option>";
			while ($get_spare=mysqli_fetch_array($all_spare)) {
				$spare_part_id=$get_spare['spare_part_id'];
				$spare_name=$get_spare['spare_part_name'];
				$spare_type=$get_spare['spare_part_type'];
				$spare_categorie=$get_spare['spare_part_categorie'];
			?>
			<option value="<?php echo $spare_part_id; ?>">
					<?php echo $spare_name; ?>
			</option>
<?php }}else{echo "<option>NO SPARE</option>";}?>
</select>
<?php } ?>