<?php 
include ("../db-comm/database_connection.php");
if (isset($_POST['selected_date'])) {
	$selected_date=$_POST['selected_date'];
	$select_all_cars=$connection->query("SELECT * FROM custormer WHERE date_in='$selected_date' AND customer_name!=''");
	if ($select_all_cars) {
		$number=mysqli_num_rows($select_all_cars);
		if ($number > 0) {
			echo "<div class='form-group'><select class='form-control' id='selected_plate_number'  onchange='specific_car_needed();'>
		<option>PLEASE SELECT CAR</option>";
						$transaction_id=1;
	                	while ($get_all_cars=mysqli_fetch_array($select_all_cars)) {
	                		$car_plate_no=$get_all_cars['car_plate_no'];
	                		$customer_id=$get_all_cars['customer_id'];
							echo "<option value='$customer_id'>$car_plate_no</option>";
						}
	    echo "</select></div>";
	    echo "<input type='text' value='$customer_id' id='customer_id' style='display:none'>";
		}
		else{
			echo "<div class='form-group'><select class='form-control' id='selected_plate_number' disabled>
				<option>THERE IS NO CAR ON THIS DATE</option>";
	    	echo "</select></div>";
		}
		
	}
	
}


?>