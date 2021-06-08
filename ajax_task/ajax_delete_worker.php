<?php 
include('../db-comm/database_connection.php');
if (isset($_POST['on_delete_worker_id'])) {
	$worker_id_to_delete=$_POST['on_delete_worker_id'];
	$delete_worker=$connection->query("DELETE FROM workers_information WHERE worker_id=$worker_id_to_delete");
		if ($delete_worker) {
			echo "<script>alert('WORKER DELETED')</script>";
		}
		else{
			die('ERROR'.msqli_error($delete_worker));
		}
	}
 ?>