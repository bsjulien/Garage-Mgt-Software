<?php include('db-comm/database_connection.php');?>
<style type="text/css">

	.alert{
		font-family: monospace;
	}
	.appointment-continer{
		margin-top: 30px;
	}
	.appointment-continer thead tr{
		background-color: darkgreen;
		color: white;
		font-family: monospace;
		font-weight:bold;
	}
	.appointment-continer tbody tr td{
		color: black;
		font-family: monospace;
		text-transform: uppercase;
	}
	.discription-span:hover{
		color: green;

	}
</style>
<h2 id="page_title">&nbsp;VIEW ALL PURCHASE</h2> 
<div class="container-fluid appointment-continer">
  <div id="changes"></div>            
  <table class="table table-striped">
    <thead>
      <tr>
      	<th>N<sup>o</sup></th>
      	<th>SPARE NAME</th>
      	<th>TYPE</th>
      	<th>CATEGORIE</th>
      	<th>QUANTITY BOUGHT</th>
      	<th>AMOUNT</th>
      	<th>DATE</th>
      	<th>TOOLS</th>
      </tr>
     </thead>
     <tbody>
     	<?php 
			$get_purchases=$connection->query("SELECT * FROM purchasing ORDER BY purchase_id DESC ");
			$id=0;
			while($data=mysqli_fetch_array($get_purchases)){
				$id++;
				$purchase_id=$data['purchase_id'];
				$spare_id=$data['spare_part_id'];
				$purchase_quantity=$data['purchase_quantity'];
				$amount=$data['buyer'];
				$price=$data['purchase_price'];
				$date_made=$data['date_made'];
				$status=$data['status'];
		?>
     	<tr>
			<td><?php echo $id; ?></td>	     		
			<td>
				<?php
				$get_spare_info=$connection->query("SELECT * FROM spair_parts WHERE spare_part_id='$spare_id'");
				$all_info=mysqli_fetch_array($get_spare_info);
				$spare_name=$all_info['spare_part_name'];
				$spare_type=$all_info['spare_part_type'];
				$spare_categorie=$all_info['spare_part_categorie'];
				echo $spare_name;
				?>
			</td>
			<td>
				<?php
				$get_spare_info=$connection->query("SELECT * FROM spair_parts WHERE spare_part_id='$spare_id'");
				$all_info=mysqli_fetch_array($get_spare_info);
				$spare_name=$all_info['spare_part_name'];
				$spare_type=$all_info['spare_part_type'];
				$spare_categorie=$all_info['spare_part_categorie'];
				echo $spare_type;
				?>
			</td>
			<td>
				<?php
				$get_spare_info=$connection->query("SELECT * FROM spair_parts WHERE spare_part_id='$spare_id'");
				$all_info=mysqli_fetch_array($get_spare_info);
				$spare_name=$all_info['spare_part_name'];
				$spare_type=$all_info['spare_part_type'];
				$spare_categorie=$all_info['spare_part_categorie'];
				echo $spare_categorie;
				?>
			</td>
			<td><?php echo $purchase_quantity	; ?></td>
			<td><?php echo $price; ?></td>
			<td><?php echo $date_made; ?></td>
			<td>
				<span class="glyphicon glyphicon-remove-circle discription-span"></span>
				<?php if($status=='Pending'){ ?><span class="glyphicon glyphicon-ok-circle discription-span" onclick="add_purchase(<?php echo $spare_id; ?>,<?php echo $purchase_quantity; ?>,<?php echo $purchase_id; ?>)"></span><?php } ?>
			</td>
     	</tr>
     	<?php } ?>
     </tbody>
  </table>
</div>
<script>
	function add_purchase(id,quantity,purchasing_id){
    var spare_id=id;
    var quantity_to_add=quantity;
    var purchasing_id=purchasing_id;
    $.ajax({
      url: "ajax_task/add_purchase_to_spare.php",
      type: "post",
      async: false,
      data: {
      	spare_id : spare_id,
      	quantity_to_add : quantity_to_add,
      	purchasing_id :purchasing_id,
      },
      success: function (data) {
        $("#changes").html(data);
      }
    });
  };
</script>