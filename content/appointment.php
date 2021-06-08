<?php 
$connection=mysqli_connect("localhost","root","","g-stock"); 
?>
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

<div class="container-fluid appointment-continer">
  <div id="changes"></div>            
  <table class="table table-striped">
    <thead>
      <tr>
      	<th>N<sup>o</sup></th>
      	<th>NAME</th>
      	<th>EMAIL</th>
      	<th>PHONE NUMBER</th>
      	<th>MESSAGE</th>
      	<th>DISCRIPTION</th>
      </tr>
     </thead>
     <tbody>
     	<?php 
			$get_appointments=$connection->query("SELECT * FROM appointment ORDER BY id DESC");
			$id=0;
			while($data=mysqli_fetch_array($get_appointments)){
				$id++;
				$appointment_id=$data['id'];
				$name=$data['name'];	
				$email=$data['email'];	
				$phone=$data['phone'];	
				$message=$data['message'];
				$discription=$data['discription'];
		?>
     	<tr>
			<td><?php echo $id; ?></td>	     		
			<td><?php echo $name; ?></td>
			<td><?php echo $email; ?></td>
			<td><?php echo $phone; ?></td>
			<td><?php echo $message; ?></td>
			<td>
				<?php 
					if($discription=='NEEDS RESPONSE'){
						echo "
						<span class='glyphicon glyphicon-remove-circle discription-span' onclick='change_description($appointment_id)'></span>
						";
					}
					if ($discription=='RESPONDED') {
						echo "<span class='glyphicon glyphicon-ok-circle discription-span'></span>";	
					}
				?>
			</td>
     	</tr>
     	<?php } ?>
     </tbody>
  </table>
</div>
<script>
	function change_description(id){
    var n_id=id;
    $.ajax({
      url: "ajax_task/change-appointment-desciption.php",
      type: "post",
      async: false,
      data: {
      	n_id : n_id,
      },
      success: function (data) {
        $("#changes").html(data);
      }
    });
  }
</script>