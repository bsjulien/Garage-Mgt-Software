<?php
/*session_start();
$user_names=$_SESSION['FullNames'];*/
include('../db-comm/database_connection.php');
if (isset($_POST['customer_id'])) {
	$customer_id=$_POST['customer_id'];
	$get_info=$connection->query("SELECT * FROM custormer WHERE customer_id='$customer_id'");
	$all_information=mysqli_fetch_array($get_info);
	$custormer_name=$all_information['customer_name'];
	$plate_number=$all_information['car_plate_no'];
	$custormer_phone_number=$all_information['customer_phone_number'];
	$date_in=$all_information['date_in'];
	$problems=$connection->query("SELECT * FROM car_problems WHERE customer_id='$customer_id'");
	$problem_data=mysqli_fetch_array($problems);
	$problem=$problem_data['problem_name'];
}
?>
<style>
	.list-group-item{
		height: 50px;
	}
	.title{
		color: black;
		float: left;
		padding-right: 10px;
		border-right: 3px solid lightgrey;
	}
	.info{
		color: black;
		float: right;
	}
	.close_view{
		color: deepskyblue;
		float: right;
		border: 2px solid deepskyblue;
		margin-top: -0.9%;
		margin-right: -2.4%;
	}
	.close_view:hover{
		color: white;
		background-color: deepskyblue;
		transition: 2s;
	}

</style>
<ul class="list-group" id="problem_section">
  <span class="fa fa-close close_view" onclick="remove_view()"></span>
  <li class="list-group-item"><span class="title">Name</span><span class="info"><?php echo $custormer_name; ?></span></li>
  <li class="list-group-item"><span class="title">Plate Number</span><span class="info"><?php echo $plate_number; ?></span></li>
  <li class="list-group-item"><span class="title">Phone Number</span><span class="info"><?php echo $custormer_phone_number; ?></span></li>
  <li class="list-group-item"><span class="title">Date In</span><span class="info"><?php echo $date_in; ?></span></li>
  <li class="list-group-item">
  		<span class="title">Ploblem statement</span>
  		<span class="info">
  			<input type="text" name="" value="<?php echo $problem; ?> + " id="p_statement">
  		</span>
  </li>
  <button type="button" class="btn btn-info" onclick="save_problem_statement(<?php echo $customer_id; ?>)">Save</button>
</ul>
<script>
	function save_problem_statement(id){
	customer_id=id;
	problem=document.getElementById('p_statement').value;
	$.ajax({
      url: "ajax_task/insert_problem_statement.php",
      type: "post",
      async: false,
      data: {
      	customer_id : customer_id,
      	problem : problem,
      },
      success: function (data) {
        $("#page_on_transaction").html(data);
      }
    });
	}
	function remove_view(){
		document.getElementById('problem_section').style.display='none';
	}
</script>

