<?php
$connection=mysqli_connect('localhost','root','','g-stock');
if ($connection) {
}
if (!$connection) {
	echo "
		<div class='alert alert-danger'>
			<strong>Database!</strong> Sorry they was a problem in database.
		</div>
	";
}
?>