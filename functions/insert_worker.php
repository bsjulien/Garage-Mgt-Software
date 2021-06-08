<?php
include ("../db-comm/database_connection.php"); 
if (isset($_POST['worker_name'])) {
	global $connection;
		$worker_name=$_POST['worker_name'];
		$worker_phone_number=$_POST['worker_phone_number'];
		$worker_proffesion=$_POST['worker_proffesion'];
		$worker_address=$_POST['worker_address'];
		$worker_country=$_POST['worker_country'];
		$worker_national_id =$_POST['worker_national_id'];
		$worker_age=$_POST['worker_age'];
		$worker_salary=$_POST['worker_salary'];
		$worker_status=0;
		$registration_date=date("D-d-F-Y");
		$worker_inserter=$connection->query("INSERT INTO workers_information(worker_name,worker_phone_no,worker_proffessional,worker_address,worker_age,worker_salary,worker_registration_date,worker_country,worker_national_id) VALUES('$worker_name','$worker_phone_number','$worker_proffesion','$worker_address','$worker_age','$worker_salary','$registration_date','$worker_country','$worker_national_id')");
		// $spare_inserter=mysqli_query($connection,$query);
		
		if ($worker_inserter) {
			echo "
				<div class='alert alert-info'>
  					<strong>OK!</strong> Thank you for saving this worker.
				</div>
			";
		}
		if (!$worker_inserter) {
			echo "
				<div class='alert alert-danger'>
  					<strong>Sorry!</strong> We were unable to add this worker
				</div>
			";
		}
		/*
		if($worker_inserter){
			include('../content/view_worker_content.php');

		}*/
	
}


?>