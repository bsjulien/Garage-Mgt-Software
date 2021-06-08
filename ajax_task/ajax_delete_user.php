<?php
include('../db-comm/database_connection.php'); 
if (isset($_POST['id'])) {
	$user_id_to_delete=$_POST['id'];
	$delete_user=$connection -> query("DELETE FROM users WHERE id='$user_id_to_delete'");
	if ($delete_user) {
		echo "<script>alert('USER SUCCESS FULL DELETED')</script>";
	}
	else{
		echo "<script>alert('USER DELETION FAILED')</script>";	
	}
}
?>