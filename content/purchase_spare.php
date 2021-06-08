<?php include('db-comm/database_connection.php'); ?>
<style>
	.w3-container{
	  width: auto;
	  margin-top: 20px;
	}
	/*.w3-container h2{
	  font-family: monospace;
	  font-weight: bold;
	  color: #EE2050;
	}
	.w3-container h2{
	  margin-left: 0px;
	}*/
	.w3-container p b{
	  color: gray;
	  font-variant: small-caps;
	  font-weight: 540;
	  font-family: MS Gothic;
	  font-size: 20px;
	}
	select{
	  height: calc(1.8125rem + 2px);
      padding: .25rem .5rem;
      font-size: .875rem;
      line-height: 1.5;
      width: 75px;
      display: inline-block;
	}
	select option{
		font-family: monospace;
	}
	input[type=submit]{
	margin-top: 20px;
	height: 40px;
	}

	input[type=text]{
		font-family: monospace;
	}

	input[type=text]:hover{
		box-shadow: 0px 1px 0px teal;
	}	

</style>
<div class="w3-container" id="form" >
	<form action="" method="post">
	  <h2 id="page_title">INFORMATION OF PURCHASE SPARE</h2><br>
	  <div id="message"></div>
	  <p>
	  <b>SPECIFICATION</b>
	  <table class="table table-bordered" style="width: 50%">
			<tr>
				<th>
					<select class="form-control w3-input w3-border" id="spare_categorie" style="width:98%">
						<option value="TOYOTO">TOYOTO</option>
						<option value="RAV 4">RAV 4</option>
						<option value="RANGE ROVER">RANGE ROVER</option>
						<option value="SCANIA">SCANIA</option>
						<option value="MITSUBISHI">MITSUBISHI</option>
						<option value="KWASITERI">KWASITERI</option>
						<option value="OTHERS">OTHERS</option>
					</select>
				</th>
				<th>
					<select class="form-control w3-input w3-border" id="spare_type" style="width:98%" onchange="get_belonging_spare()">
						<option value=""></option>
						<option value="ORIGINAL">ORIGINAL</option>
						<option value="SECOND HAND">SECOND HAND</option>
						<option value="32 KARE">32 KARE</option>
					</select>
				</th>
	 		</tr>									
		</table>
	  </p>
	  <p id="spare_names">
	  	<b>spare name</b>
	  	<select class="form-control" id="spare_name" style="width:50%" onchange="get_spare_quantitie()" disabled>
	  	</select>
	  </p>
	  <div id="according_to_selected">
		  <p>
		  	<b>spare type</b><br>
		  	<input class="w3-input w3-border " type="number" id="spare_quantitie" placeholder="0" value="0" style="width:50%" disabled>
		  </p>
		  <p>
		  	<b>spare quantite remaing in stock</b><br>
		  	<input class="w3-input w3-border " type="number" id="spare_quantitie" placeholder="0" value="0" style="width:50%" disabled>
		  </p>
		  <p>
		  	<b>spare minimum price</b><br>
		  	<input class="w3-input w3-border " type="number" id="spare_quantitie" placeholder="0" value="0" style="width:50%" disabled>
		  </p>
	  </div>
	  <p>
	  	<b>quantity bought</b><br>
	  	<input class="w3-input w3-border " type="number" id="quantitie_bought" placeholder="" style="width:50%" required>
	  </p>
	  <p>
	  	<b>amount bought</b><br>
	  	<input class="w3-input w3-border " type="number" id="amount_bought" placeholder=" FRW" style="width:50%" required>
	  </p>
	  <p>
	  	<b>Buyer</b><br>
	  	<input class="w3-input w3-border " type="text" id="buyer" placeholder="ANDIKA UWAYIGUZE IYO SPARE" style="width:50%" required>
	  </p>
	  <input type="submit" class="w3-btn w3-teal" id="register_spare" onclick="insert_purchased_spare()" value="REGISTER SPARE"><br><br>
	</form>
</div>
<script>
	function get_spare_quantitie() {
    	var spare_id=document.getElementById('spare_name').value;
	    $.ajax({
	      url: "ajax_task/ajax_get_selected_spare_type_and_quantity.php",
	      type: "post",
	      async: false,
	      data: {
	        spare_id : spare_id,
	      },
	      success: function (data) {
	        $("#according_to_selected").html(data);
	      }
	    });
	 }


	 function insert_purchased_spare(){
	 	var spare_id=document.getElementById('spare_name').value;
	 	var quantity_bought=document.getElementById('quantitie_bought').value;
	 	var amount_bought=document.getElementById('amount_bought').value;
	 	var buyer_name=document.getElementById('buyer').value;
	 	$.ajax({
	      url: "ajax_task/ajax_save_purchased_spare.php",
	      type: "post",
	      async: false,
	      data: {
	        spare_id : spare_id,
	        quantity_bought : quantity_bought,
	        amount_bought : amount_bought,
	        buyer_name:buyer_name,
	      },
	      success: function (data) {
	        $("#message").html(data);
	      }
	    });

	 }

	 function get_belonging_spare() {
	    var spare_category=document.getElementById('spare_categorie').value;
	    var spare_type=document.getElementById('spare_type').value;
	    $.ajax({
	      url: "ajax_task/ajax_get_belonging_spare_for_purchase.php",
	      type: "post",
	      async: false,
	      data: {
	        spare_category : spare_category,
	        spare_type : spare_type,
	      },
	      success: function (data) {
	        $("#spare_names").html(data);
	      }
    	});
  	};
</script>