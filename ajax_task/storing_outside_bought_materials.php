<?php 
include('../db-comm/database_connection.php');
if (isset($_POST['transaction_id'])) {
	$inserted_transaction_id=$_POST['transaction_id'];
	$inserted_material_name=$_POST['material_name'];
	$inserted_material_price=$_POST['material_price'];
	$inserted_material_quantitie=$_POST['material_quantitie'];
	$inserted_material_reason=$_POST['material_reason'];
	$register_product=$connection -> query("INSERT INTO product_bought_outside(transaction_id,product_bought,product_price,product_quantitie,reason) VALUES('$inserted_transaction_id','$inserted_material_name','$inserted_material_price','$inserted_material_quantitie','$inserted_material_reason')");
		if ($register_product) {
			echo "<script>alert('ADDITIONAL MATERIAL REGISTED');</script>";
			$get_used_materials=$connection->query("SELECT * FROM product_bought_outside WHERE transaction_id='$inserted_transaction_id'");
			$id=1;
			while ($used_material_info=mysqli_fetch_array($get_used_materials)) {
				$material_name=$used_material_info['product_bought'];
				$material_price=$used_material_info['product_price'];
				$material_quantitie=$used_material_info['product_quantitie'];
				$material_reason=$used_material_info['reason'];
				echo "
				<span id='material_info'>$id</span>
				<span id='material_info'><b>Name : </b>$material_name</span>
				<span id='material_info'><b>Price : </b>$material_price</span>
				<span id='material_info'><b>Quantitie : </b>$material_quantitie</span>
				<span id='material_info'><b>Reason : </b>$material_reason</span><br><br>
				";$id++;
			}
		}
		if (!$register_product) {
			echo "<script>alert('ERRORIN REGISTERING ADDITIONAL MATERIAL');</script>";
			include('../content/personal_data.php');	
		}
}
?>