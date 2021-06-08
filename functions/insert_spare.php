<?php
session_start();
include ("../db-comm/database_connection.php");
if ($_SESSION['UserId']) {
	$User=$_SESSION['UserId'];
	if (isset($_POST['spare_name'])) {
		$spare_name=$_POST['spare_name'];
		$spare_type=$_POST['spare_type'];
		$spare_categorie=$_POST['spare_categorie'];
		$spare_quantitie=$_POST['spare_quantitie'];
		$spare_minimum_price=$_POST['spare_minimum_price'];
		$register_date=$_POST['registration_date'];
		$get_spare_info=$connection->query("SELECT * FROM spair_parts WHERE spare_part_name='$spare_name' AND spare_part_type='$spare_type' AND spare_part_categorie='$spare_categorie'");
		$if_existing=mysqli_num_rows($get_spare_info);
			if ($if_existing == 0) {
				$spare_inserter= $connection ->query("INSERT INTO spair_parts(spare_part_name,spare_part_type,spare_part_categorie,spare_part_quantitie,spare_minimum_price,date_made,user_id) VALUES('$spare_name','$spare_type','$spare_categorie','$spare_quantitie','$spare_minimum_price','$register_date','$User')");
				if (!$spare_inserter) {
					die('ERROR' .mysqli_error($spare_inserter));
				}
				if ($spare_inserter) {
					echo "
					<script type='text/javascript'>
						confirm('THANK YOU,  SPARE HAVE BEEN SAVED');
					    document.location.href = 'index';
					</script>
				";
				}
			}
			else{
				echo "
					<script type='text/javascript'>
						confirm('WE ARE SORRY ,THE SPARE ALREADY EXISTS');
					    document.location.href = 'index';
					</script>
				";				
			}
		
	}
}
else{

	echo "
		<script type='text/javascript'>
		    document.location.href = 'login';
		</script>
	";
}
?>