<?php 
	include('../db-comm/database_connection.php');
	if (isset($_POST['worker_id'])) {
	$worker_id=$_POST['worker_id'];
	$year=$_POST['year'];
	$month=$_POST['month'];
	$select_payed=$connection->query("SELECT * FROM  worker_salary_info WHERE worker_id='$worker_id' AND year='$year' AND month='$month'");
	$paid_salary_on_month=0;
	while ($all_payed_salary=mysqli_fetch_array($select_payed)) {
		$paid_salary_on_month=$paid_salary_on_month+$all_payed_salary['paid_salary'];
	}
	$select=$connection->query("SELECT * FROM workers_information WHERE worker_id=$worker_id");
		if ($select) {
			while ($row=mysqli_fetch_assoc($select)) {
				$select_worker_name=$row['worker_name'];
				$select_worker_phone=$row['worker_phone_no'];
				$select_worker_salary=$row['worker_salary'];
?>
<style type="text/css">
	select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    color: grey;
    font-family: cursive;
	}
	.w3-container h2{
	  font-family: monospace;
	  font-weight: bold;
	  color: #EE2050;
	}
	.w3-container h2{
	  margin-left: 0px;
	}
	input[type=submit]{
	margin-top: 20px;
	height: 40px;
	}
	input[type=text]{
	font-family: sans-serif;
	}
	.w3-container form b{
	  color: black;
	  font-variant: small-caps;
	  font-weight: 540;
	  font-family: monospace;
	  font-size: 20px;
	}
</style>
<div class="w3-container" id="form">
	<h2>PAY WORKER</h2>
	<form action="" method="post">
		  <p>
		  	<b>Worker Name</b>
		  	<input class="w3-input w3-border w3-animate-input" type="text" id="worker_name" style="width:50%" value="<?php echo $select_worker_name; ?>" disabled>
		  </p>
		  <p>
		  	<b>Worker Phone number</b>
		  	<input class="w3-input w3-border w3-animate-input" type="text" id="worker_phone_no" style="width:50%" placeholder="<?php echo $select_worker_phone; ?>" disabled>
		  </p>
		  <p>
		  	<b>Worker Salary</b><br>
		  	<input class="w3-input w3-border " type="text" id="worker_salary" value="<?php echo $select_worker_salary; ?>" style="width:50%" disabled>
		  </p>
		  <p>
		  	<b>Salary Year</b><br>
		  	<input class="w3-input w3-border " type="text" id="worker_salary_year" value="<?php echo $year; ?>" style="width:50%" disabled>
		  </p>
		  <p>
		  	<b>Worker Month</b><br>
		  	<input class="w3-input w3-border " type="text" id="worker_salary_month" value="<?php echo $month; ?>" style="width:50%" disabled>
		  </p>
		  <p>
		  	<b>Amount Payed</b><br>
		  	<input class="w3-input w3-border " type="text" id="worker_status" value="<?php echo $paid_salary_on_month;?>" style="width:50%" disabled>
		  </p>
		  <p>
		  	<b>Amount Given</b><br>
		  	<input class="w3-input w3-border " type="number" id="given_money" style="width:50%" required="">
		  </p>
		  <input type="submit" class="w3-btn w3-teal" value="PAY WORKER" name="pay_worker" onclick="ajax_pay(<?php echo $worker_id ?>)"><br><br>
	</form>
</div>
<?php
			}
		}
		elseif (!$select) {
			die('ERROR'.mysqli_error($select));
		}
		

	}

?>
<script>
	function ajax_pay(worker_id) {
    on_pay_worker_id = worker_id;
    on_pay_worker_name = document.getElementById('worker_name').value,
    amount_to_pay = document.getElementById('given_money').value;
    if (amount_to_pay == '') {
            return false;
    }
    salary_year=document.getElementById("worker_salary_year").value;
    salary_month=document.getElementById("worker_salary_month").value;
    alread_payed_amount = document.getElementById('worker_status').value;
    worker_salary = document.getElementById('worker_salary').value;
    var section = 'worker_remove';
    $.ajax({
      url: "ajax_task/ajax_pay_worker.php",
      type: "post",
      async: false,
      data: {
        section : section,
        on_pay_worker_id : on_pay_worker_id,
        amount_to_pay :amount_to_pay,
        on_pay_worker_name : on_pay_worker_name,
        alread_payed_amount : alread_payed_amount,
        worker_salary : worker_salary,
        salary_year : salary_year,
        salary_month : salary_month,
      },
      success: function (data) {
        $("#dataContent").html(data);
      }
    });
  };
</script>