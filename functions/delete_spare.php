<?php
include ("../db-comm/database_connection.php");
/*function delete_spare(){
	if (isset($_POST['spare_id'])) {
		global $connection;
		$spare_id=$_POST['spare_id'];
		$deleting_reason=$_POST['deleting_reason'];
		$query="DELETE FROM spair_parts ";
		$query.="WHERE id=$spare_id";
		$store_query="INSERT INTO deleted_spair_parts(deleted_spair_id,deleting_reason) ";
		$store_query.="VALUES('$spare_id','$deleting_reason')";
		$store_deleted_data=msqli_query($connection,$store_query);
		$deleting_query=msqli_query($connection,$query);
		if (!$store_deleted_data) {
			die('ERROR' .mysqli_error($store_deleted_data));
		}
		if (!$deleting_query) {
			die('ERROR' .mysqli_error($deleting_query));
		}
	}}*/
if (isset($_POST['spare_id'])) {
	$spare_id=$_POST['spare_id'];
	$select=$connection->query("SELECT * FROM spair_parts WHERE spare_part_id=$spare_id");
		if ($select) {
			while ($row=mysqli_fetch_assoc($select)) {
				$select_spare_name=$row['spare_part_name'];
				$select_spare_type=$row['spare_part_type'];
				$select_spare_categorie=$row['spare_part_categorie'];
				$select_spare_quantitie=$row['spare_part_quantitie'];
				$select_spare_minimum_price=$row['spare_minimum_price'];
?>
<style type="text/css">
	.w3-container h2{
	  font-family: monospace;
	  font-weight: bold;
	  color: #EE2050;
	}
	.w3-container h2{
	  margin-left: 0px;
	}
	input[type=submit]{
	margin-top: 20px;
	height: 40px;
	}
	input[type=text]{
	font-family: sans-serif;
	}
	.w3-container form b{
	  color: black;
	  font-variant: small-caps;
	  font-weight: 540;
	  font-family: monospace;
	  font-size: 20px;
	}
</style>
<div class="w3-container" id="form">
	<h2>DELETE SPARE PART</h2>
	<form action="" method="post">
		  <p>
		  	<b>Spare Name</b>
		  	<input class="w3-input w3-border w3-animate-input" type="text" id="spare_name" style="width:50%" value="<?php echo $select_spare_name; ?>" disabled>
		  </p>
		  <p>
		  	<b>Spare Type</b>
		  	<input class="w3-input w3-border w3-animate-input" type="text" id="spare_type" style="width:50%" value="<?php echo $select_spare_type; ?>" disabled>
		  </p>
		  <p>
		  	<b>Spare Categorie</b>
		  	<input class="w3-input w3-border w3-animate-input" type="text" id="spare_categorie" style="width:50%" value="<?php echo $select_spare_categorie; ?>" disabled>
		  </p>
		  <p>
		  	<b>Spare Part Quantitie</b><br>
		  	<input class="w3-input w3-border " type="text" id="spare_quantitie" value="<?php echo $select_spare_quantitie; ?>" style="width:50%" disabled>
		  </p>
		  <p>
		  	<b>Minimumu Price Tobe Bought</b><br>
		  	<input class="w3-input w3-border " type="text" id="spare_minimum_price" value="<?php echo $select_spare_minimum_price; ?>" style="width:50%" disabled>
		  </p>
		  <p>
		  	<b>Reason To Delete This Spare</b>
		  	<textarea class="w3-input w3-border" type="" id="reason_to_delete" placeholder="Reason To Delete" style="width:50%" required></textarea >
		  </p>

		  <input type="submit" class="w3-btn w3-teal" value="DELETE SPARE" name="delete_worker" onclick="ajax_delete_spare(<?php echo $spare_id;?>)"><br><br>
	</form>
</div>
<?php
	} 
  }
}
?>
<script>
	function ajax_delete_spare(spare_id) {
    on_delete_spare_id = spare_id;
    var section = 'edit_spare';
    var spare_name = document.getElementById('spare_name').value;
    var spare_type = document.getElementById('spare_type').value;
    var spare_categorie = document.getElementById('spare_categorie').value;
    var spare_quantitie=document.getElementById('spare_quantitie').value;
    var reason_to_delete = document.getElementById('reason_to_delete').value;
        if (reason_to_delete == '') {
            return false;
          }
    $.ajax({
      url: "ajax_task/ajax_delete_spare.php",
      type: "post",
      async: false,
      data: {
        section : section,
        on_delete_spare_id : on_delete_spare_id,
        reason_to_delete : reason_to_delete,
        spare_name : spare_name,
        spare_type : spare_type,
        spare_categorie : spare_categorie,
        spare_quantitie : spare_quantitie,

      },
      success: function (data) {
        $("#dataContent").html(data);
      }
    });
  };
</script>