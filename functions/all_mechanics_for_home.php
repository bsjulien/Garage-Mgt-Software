<style>
	#more_info_section{
		border-top: 5px solid #428bca;
	}
	h2{
		font-family: monospace;
		font-variant: small-caps;
		font-weight: 900;
		color: #428bca;
		padding-left: 10px;
		padding-bottom: 10px;
	}
	table thead tr th{
		color: #428bca;
		font-family: monospace; 
	}
	tr{
		border:2px solid #428bca;
	}
	thead tr{
		border-bottom: 2px solid #428bca;
	}
	tbody tr td{
		font-family: consolas;
		text-transform: uppercase;
	}
</style>
<h2>OUR MECHANICS</h2>
<table class="table table-bordered table-responsive">
    <thead>
      <tr>
        <th>MECHANIC NAME</th>
        <th>MECHANIC PHONE NUMBER</th>
        <th>MECHANIC PROFFESSIONAL</th>
        <th>MECHANIC ADDRESS</th>
        <th>MECHANIC AGE</th>
      </tr>
    </thead>
    <tbody>
		<?php 
		include ("../db-comm/database_connection.php");
		$select_all_workers=$connection->query("SELECT * FROM workers_information WHERE worker_name!='NONE'");
		while ($fetch_all_workers=mysqli_fetch_array($select_all_workers)) {
			$worker_name=$fetch_all_workers['worker_name'];
			$worker_phone_no=$fetch_all_workers['worker_phone_no'];
			$worker_address=$fetch_all_workers['worker_address'];
			$worker_proffession=$fetch_all_workers['worker_proffessional'];
			$worker_age=$fetch_all_workers['worker_age'];
		?>      
		<tr>
			<td><?php echo $worker_name; ?></td>
			<td><?php echo $worker_phone_no; ?></td>
			<td><?php echo $worker_proffession; ?></td>
			<td><?php echo $worker_address; ?></td>
			<td><?php echo $worker_age; ?></td>
		</tr>
		<?php } ?>
    </tbody>
  </table>
</div>
