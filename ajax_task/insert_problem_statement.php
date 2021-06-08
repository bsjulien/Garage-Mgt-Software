<?php 
include('../db-comm/database_connection.php');
if (isset($_POST['customer_id'])) {
	$needed_id=$_POST['customer_id'];
	$problem_wrote=$_POST['problem'];
	$all_info=$connection->query("SELECT * FROM car_problems WHERE customer_id='$needed_id'");
	$counter=mysqli_num_rows($all_info);
	if ($counter == 0) {
		$save_problem=$connection->query("INSERT INTO car_problems(customer_id,problem_name)VALUES('$needed_id','$problem_wrote')");
			if ($save_problem) {
				echo "
					 <div class='alert alert-success'>
		    			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
		    			<strong>Problem Staement!</strong> Have been recorded.
		  			 </div>
				";
			}
			if (!$save_problem) {
				echo "
					<div class='alert alert-danger'>
		    			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
		    			<strong>Problem Staement!</strong> There was an error in recording.
		  			 </div>
				";
			}	
	}else{
	$save_problem=$connection->query("UPDATE car_problems SET problem_name='$problem_wrote' WHERE customer_id='$needed_id'");
		if ($save_problem) {
			echo "
				 <div class='alert alert-success'>
	    			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
	    			<strong>Problem Staement!</strong> Have been recorded.
	  			 </div>
			";
		}
		if (!$save_problem) {
			echo "
				<div class='alert alert-danger'>
	    			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
	    			<strong>Problem Staement!</strong> There was an error in recording.
	  			 </div>
			";
		}
	}
}
?>	