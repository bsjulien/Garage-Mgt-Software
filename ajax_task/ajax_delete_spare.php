<?php 
session_start();
include('../db-comm/database_connection.php');
$user=$_SESSION['UserId'];
if (isset($_POST['on_delete_spare_id'])) {
	$on_delete_spare_id=$_POST['on_delete_spare_id'];
	$spare_name=$_POST['spare_name'];
	$spare_type=$_POST['spare_type'];
	$spare_categorie=$_POST['spare_categorie'];
	$spare_quantitie=$_POST['spare_quantitie'];
	$reason_to_delete=$_POST['reason_to_delete'];

	$insert_spare_delete_reason=$connection->query("INSERT INTO deleted_spair_parts(deleting_reason,deleted_spair_id,deleted_spair_name,spare_type,spare_categorie,spare_quantitie,made_by)VALUES('$reason_to_delete','$on_delete_spare_id','$spare_name','$spare_type','$spare_categorie','$spare_quantitie','$user')");
		if ($insert_spare_delete_reason) {
			$delete_spare=$connection->query("DELETE FROM spair_parts WHERE spare_part_id=$on_delete_spare_id");
			if ($delete_spare) {
				echo "<script>alert('SPARE DELETED');</script>";
			}
			else{
				die('ERROR'.mysqli_error($delete_spare));
			}
		}
		else{
			die('ERROR'.mysqli_error($insert_spare_delete_reason));
		}
	}
?>