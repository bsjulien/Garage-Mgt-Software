<?php 
include('../db-comm/database_connection.php');
if (isset($_POST['n_id'])) {
	$wanted_id=$_POST['n_id'];
	$updates="RESPONDED";
	$change=$connection->query("UPDATE appointment SET discription='$updates' WHERE id='$wanted_id'");
	$getdata=$connection->query("SELECT name,phone FROM appointment WHERE id='$wanted_id'");
	$GET=mysqli_fetch_array($getdata);
	$name=$GET['name'];
	$number=$GET['phone'];
	if($change){
		echo "
			<div class='alert alert-success'>
  				<strong>Appointment </strong> of $name with phone number $number have been responded.
			</div>
			";
	}
	if(!$change){
		echo"
			<div class='alert alert-error'>
  				<strong>Sorry!</strong>They was an error with changing appointment description.
			</div>

			";
	}
}
?>