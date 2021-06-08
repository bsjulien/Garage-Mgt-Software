<?php 
session_start();
$Title=$_SESSION['title'];
$display='';
if ($Title == 'MANAGER') {
      $display='none';
}
?>
<style>
	#more_info_section{
		border-top: 5px solid green;
	}
	h2{
		font-family: monospace;
		font-variant: small-caps;
		font-weight: 900;
		color: #5cb85c;
		padding-left: 10px;
		padding-bottom: 10px;
	}
	table thead tr th{
		color: #5cb85c;
		font-family: monospace; 
	}
	tr{
		border:2px solid #5cb85c;
	}
	thead tr{
		border-bottom: 2px solid #5cb85c;
	}
	tbody tr td{
		font-family: consolas;
		text-transform: uppercase;
	}
</style>
<h2>ALL SPARE AVAILABLE IN STOCK</h2>
<table class="table table-bordered">
    <thead>
      <tr>
        <th>SPARE NAME</th>
        <th>SPARE TYPE</th>
        <th>SPARE CATEGORIE</th>
        <th>SPARE QUANTITIE</th>
      </tr>
    </thead>
    <tbody>
		<?php 
		include ("../db-comm/database_connection.php");
		$select_all_spare_in_stock=$connection->query("SELECT * FROM spair_parts ORDER BY spare_part_quantitie ASC");
		while ($get_all_spare=mysqli_fetch_array($select_all_spare_in_stock)) {
			$spare_name=$get_all_spare['spare_part_name'];
			$spare_type=$get_all_spare['spare_part_type'];
			$spare_categorie=$get_all_spare['spare_part_categorie'];
			$spare_quantitie=$get_all_spare['spare_part_quantitie'];
		?>      
		<tr>
			<td>
				<?php
				if ($spare_quantitie == 0) {
				 	echo "<span class='flaticon-phone-call-1' style='color:red'> </span>";
				}
				if ($spare_quantitie > 0 && $spare_quantitie < 3) {
				 	echo "<span class='flaticon-phone-call' > </span>";
				} 
				echo $spare_name; 
				?>		
			</td>
			<td><?php echo $spare_type; ?></td>
			<td><?php echo $spare_categorie; ?></td>
			<td><?php echo $spare_quantitie; ?></td>
		</tr>
		<?php } ?>
    </tbody>
  </table>
</div>
