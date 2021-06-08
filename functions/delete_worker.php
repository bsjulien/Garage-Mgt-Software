<?php 
	include('../db-comm/database_connection.php');
	if (isset($_POST['worker_id'])) {
	$worker_id=$_POST['worker_id'];
	$select=$connection->query("SELECT * FROM workers_information WHERE worker_id=$worker_id");
		if ($select) {
			while ($row=mysqli_fetch_assoc($select)) {
				$select_worker_name=$row['worker_name'];
				$select_worker_proffessional=$row['worker_proffessional'];
				$select_worker_address=$row['worker_address'];
				$select_worker_phone=$row['worker_phone_no'];
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
	<h2>DELETE WORKER</h2>
	<form action="" method="post">
		  <p>
		  	<b>worker name</b>
		  	<input class="w3-input w3-border w3-animate-input" type="text" id="worker_name" style="width:50%" placeholder="<?php echo $select_worker_name; ?>" disabled>
		  </p>
		  <p>
		  	<b>worker phone number</b>
		  	<input class="w3-input w3-border w3-animate-input" type="text" id="worker_phone_no" style="width:50%" placeholder="<?php echo $select_worker_phone; ?>" disabled>
		  </p>
		  <p>
		  	<b>worker proffesion</b>
		  	<input class="w3-input w3-border w3-animate-input" type="text" id="worker_proffesion" style="width:50%" placeholder="<?php echo $select_worker_proffessional; ?>" disabled>
		  </p>
		  <p>
		  	<b>worker address</b><br>
		  	<input class="w3-input w3-border " type="text" id="worker_address" placeholder="<?php echo $select_worker_address; ?>" style="width:50%" disabled>
		  </p>
		  <input type="submit" class="w3-btn w3-teal" value="DELETE WORKER" name="delete_worker" onclick="ajax_delete(<?php echo $worker_id;?>)">
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
	function ajax_delete(worker_id) {
    on_delete_worker_id = worker_id;
    var section = 'worker_remove';
    $.ajax({
      url: "ajax_task/ajax_delete_worker.php",
      type: "post",
      async: false,
      data: {
        section : section,
        on_delete_worker_id : on_delete_worker_id,
      },
      success: function (data) {
        $("#dataContent").html(data);
      }
    });
  };
</script>