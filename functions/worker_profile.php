<?php 
if (isset($_POST['worker_id'])) {
	$worker_id=$_POST['worker_id'];
	$worker_name=$_POST['worker_name'];
	$worker_phone_no=$_POST['worker_phone_no'];
	$worker_proffesional=$_POST['worker_proffesional'];
	$worker_address=$_POST['worker_address'];
	$worker_age=$_POST['worker_age'];
	$worker_national_id=$_POST['worker_national_id'];
	$worker_country=$_POST['worker_country'];
	$worker_reg_date=$_POST['worker_reg_date'];
	$worker_salary=$_POST['worker_salary'];
}
?>
<style>
	.worker_image{
		background: none;
		padding:10px 10px 10px 10px;
	}
	.worker_image img{
		width: 100%;
	}
	.worker_information{
		padding: 10px 10px 10px 5px;
		background:;
	}
	.worker_information table tr th{
		font-weight: bold;
		font-family: consolas;
		font-size: 20px;
		background:	#B8B8B8 ;
		color: white;
	}
	.worker_information table b{
		color: goldenrod;
		font-weight: 900;
		text-align: center;
		font-variant: small-caps;
		font-family: Perpetua Titling MT;
		letter-spacing: 3px;
	}
</style>
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-5 worker_image">
    	<img src="img/img_avatar3.png" class="img-rounded" alt="OUR WORKER">
    </div>
    <div class="col-sm-7 worker_information">
    	<table class="table table-bordered table-hover">
    			<tr style="background: MidnightBlue">
    				<td colspan="2"><b><center>WORKER INFORMATION</center></b></td>
    			</tr>
			  	<tr>
			    	<th>WORKER NAME</th>
			    	<td><?php echo $worker_name; ?></td>
			  	</tr>
			  	<tr>
			  		<th>PHONE NUMBER</th>
			    	<td><?php echo $worker_phone_no; ?></td>
			  	</tr>
			  	<tr>
			    	<th>PROFFESSION</th>
			    	<td><?php echo $worker_proffesional; ?></td>
			  	</tr>
			  	<tr>
			    	<th>ADDRESS</th>
			    	<td><?php echo $worker_address; ?></td>
			 	</tr>
			 	<tr>
			    	<th>AGE</th>
			    	<td><?php echo $worker_age; ?></td>
			 	</tr>
			 	<tr>
			    	<th>COUNTRY</th>
			    	<td><?php echo $worker_country; ?></td>
			 	</tr>
			 	<tr>
			    	<th>NATIONAL ID</th>
			    	<td><?php echo $worker_national_id; ?></td>
			 	</tr>
			 	<tr>
			    	<th>REGISTRATION DATE</th>
			    	<td><?php echo $worker_reg_date; ?></td>
			 	</tr>
			 	<tr>
			    	<th>SALARY</th>
			    	<td><?php echo $worker_salary; ?></td>
			 	</tr>
		</table>
</div>