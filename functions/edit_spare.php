<?php 
	if (isset($_POST['spare_id'])) {
	include('../db-comm/database_connection.php');
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
	<h2>EDIT SPARE INFORMATION</h2>
	<form action="" method="post">
		  <p>
		  	<b>Spare Name</b>
		  	<input class="w3-input w3-border w3-animate-input" type="text" id="spare_name" style="width:50%" value="<?php echo $select_spare_name; ?>" required>
		  </p>
		  <p>
		  	<b>Spare Type</b>
		  	<input class="w3-input w3-border w3-animate-input" type="text" id="spare_type" style="width:50%" value="<?php echo $select_spare_type; ?>" required>
		  </p>
		  <p>
		  	<b>Spare Categorie</b>
		  	<input class="w3-input w3-border w3-animate-input" type="text" id="spare_categorie" style="width:50%" value="<?php echo $select_spare_categorie; ?>" required>
		  </p>
		  <p>
		  	<b>Minimumu Price Tobe Bought</b><br>
		  	<input class="w3-input w3-border " type="text" id="spare_minimum_price" value="<?php echo $select_spare_minimum_price; ?>" style="width:50%" required>
		  </p>
		  <input type="submit" class="w3-btn w3-teal" value="UPDATE SPARE" name="delete_worker" onclick="ajax_edit_spare(<?php echo $spare_id;?>)">
	</form>
</div>
<?php
	} 
  }
}
?>
<script>
	function ajax_edit_spare(spare_id) {
    on_edit_spare_id = spare_id;
    var section = 'edit_spare';
    var spare_name = document.getElementById('spare_name').value;
        if (spare_name == '') {
            return false;
          }
    var spare_type = document.getElementById('spare_type').value;
        if (spare_type == '') {
            return false;
          }
    var spare_categorie = document.getElementById('spare_categorie').value;
        if (spare_categorie == '') {
            return false;
          }
    var spare_minimum_price=document.getElementById('spare_minimum_price').value;
    	if (spare_minimum_price == '') {
            return false;
          }
    $.ajax({
      url: "ajax_task/ajax_edit_spare.php",
      type: "post",
      async: false,
      data: {
        section : section,
        on_edit_spare_id : on_edit_spare_id,
        spare_name : spare_name,
        spare_type : spare_type,
        spare_categorie : spare_categorie,
        spare_minimum_price : spare_minimum_price,
      },
      success: function (data) {
        $("#dataContent").html(data);
      }
    });
  };
</script>