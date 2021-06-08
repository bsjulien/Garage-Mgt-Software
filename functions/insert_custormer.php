<?php
session_start();
$user_names=$_SESSION['FullNames'];
include('../db-comm/database_connection.php');
if (isset($_POST['custormer_name'])) {
	$custormer_name=$_POST['custormer_name'];
	$custormer_phone_no=$_POST['custormer_phone_no'];
	$custormer_plate_no=$_POST['custormer_plate_no'];
	$custormer_address=$_POST['custormer_address'];
	$custormer_vehicle_type=$_POST['custormer_vehicle_type'];
	$custormer_plate_no=$_POST['custormer_plate_no'];
	$custormer_car_color=$_POST['car_color'];
	$date_in=$_POST['date_in'];
	$insert_custormer=$connection->query("INSERT INTO custormer(customer_name,customer_address,car_color,car_plate_no,customer_car_type,customer_phone_number,date_in)VALUES('$custormer_name','$custormer_address','$custormer_car_color','$custormer_plate_no','$custormer_vehicle_type','$custormer_phone_no','$date_in')");
	if (!$insert_custormer) {
		echo "<script>alert('DATA NOT SENT')</script>";
		include('../content/new_custormer.php');
	}
	if($insert_custormer){
			include('../content/personal_data.php');
	}

}

?>