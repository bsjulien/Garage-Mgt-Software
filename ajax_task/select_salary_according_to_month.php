<?php 
include('../db-comm/database_connection.php');
if (isset($_POST['month'])) {
	$selected_month=$_POST['month'];
	$selected_year=$_POST['year'];
	$worker_id_selected=$_POST['worker_id'];
	$select_all_paid_according_to_month=$connection->query("SELECT * FROM  worker_salary_info WHERE worker_id='$worker_id_selected' AND year='$selected_year' AND month='$selected_month'");
	$total_salary_paid=0;
	while($select_total_paid_salary=mysqli_fetch_array($select_all_paid_according_to_month)){
		$worker_salary=$select_total_paid_salary['paid_salary'];
		$total_salary_paid=$total_salary_paid+$worker_salary;
	}
	echo $total_salary_paid;

}
?>