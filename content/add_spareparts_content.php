
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
	  <h2 id="page_title">ADD SPARE PART DETAIL</h2>
	  <p>
	  	<b>spare name</b>
	  	<input class="w3-input w3-border w3-animate-input" type="text" id="spare_name" style="width:50%" required>
	  </p>
	  <p>
	  	<b>spare type</b>
	  	<select class="form-control w3-input w3-border" id="spare_type" style="width:50%" required>
			<option value="ORIGINAL">ORIGINAL</option>
			<option value="SECOND HAND">SECOND HAND</option>
			<option value="32 KARE">32 KARE</option>
		</select>
	  </p>
	  <p>
	  	<b>spare categorie</b>
		<select class="form-control w3-input w3-border" id="spare_categorie" style="width:50%" required>
			<option value="TOYOTO">TOYOTO</option>
			<option value="RAV 4">RAV 4</option>
			<option value="RANGE ROVER">RANGE ROVER</option>
			<option value="SCANIA">SCANIA</option>
			<option value="MITSUBISHI">MITSUBISHI</option>
			<option value="KWASITERI">KWASITERI</option>
			<option value="OTHERS">OTHERS</option>
		</select>
	  </p>
	  <p>
	  	<b>spare quantite</b><br>
	  	<input class="w3-input w3-border " type="number" id="spare_quantitie" placeholder="0" value="0" style="width:50%" required>
	  </p>
	  <p>
	  	<b>registration date</b>
	  	<input class="w3-input w3-border" type="date" id="registration_date" style="width:50%" required>
	  </p>
	  <p>
	  	<b>Minimum Price ToBe Sold On</b>
	  	<input class="w3-input w3-border w3-animate-input" type="text" id="minimum_price_tobe_sold" style="width:50%">
	  </p>
	  <p>
	  <input type="submit" class="w3-btn w3-teal" id="register_spare" onclick="insert_spare()" value="REGISTER SPARE"><br><br>
	</form>
</div>