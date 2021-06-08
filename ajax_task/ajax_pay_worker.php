<?php
include('../db-comm/database_connection.php'); 
if (isset($_POST['on_pay_worker_id'])) {
	$worker_salary=$_POST['worker_salary'];
	$salary_year=$_POST['salary_year'];
	$salary_month=$_POST['salary_month'];
	$worker_id_to_pay=$_POST['on_pay_worker_id'];
	$amount_to_pay=$_POST['amount_to_pay'];
	$worker_name_to_pay=$_POST['on_pay_worker_name'];
	$payment_date=date("D-d-F-Y");
	$select_all_amount_payed=$connection->query("SELECT * FROM worker_salary_info WHERE worker_id='$worker_id_to_pay' AND month='$salary_month' AND year='$salary_year'");
	$all_payed_amount=0;
	while ($salaray_info=mysqli_fetch_array($select_all_amount_payed)) {
		$all_payed_amount=$all_payed_amount+$salaray_info['paid_salary'];
	}
	$now_total=$all_payed_amount+$amount_to_pay;
	if ($now_total <= $worker_salary) {
			$payment=$connection->query("INSERT INTO worker_salary_info(worker_id,year,month,salary,paid_salary,payment_date) VALUES('$worker_id_to_pay','$salary_year','$salary_month','$worker_salary','$amount_to_pay','$payment_date')");
			if($payment){
				echo"<script>alert('PAYMENT HAVE BEEN SUCESSFUL DONE');</script>";
			}
			else{
				echo"<script>alert('UN ABLE TO PROCCED PAYMENT');</script>";	
			}
	}
	else{
		echo "<script>alert('Hello This money will go above the worker salary');</script>";
	}
	
	
}
?>




<!-- /*$pay_worker_query=$connection->query("UPDATE workers_information SET worker_status=$new_worker_status WHERE worker_id=$worker_id_to_pay");
			if ($pay_worker_query) {
				$insert_payment_transaction=$connection->query("INSERT INTO worker_salary_paid(worker_name,amount_paid,transaction_date,worker_id)VALUES('$worker_name_to_pay','$amount_to_pay','$payment_date','$worker_id_to_pay')");
						if (!$insert_payment_transaction) {
							die('ERROR'.mysqli_error($insert_payment_transaction));
						}
			}*/ -->