<?php 
include ("db-comm/database_connection.php");




function show_all_data(){
	global $connection;
	$query="SELECT * FROM spair_parts ";
	$result=mysqli_query($connection,$query);
	if ($result) {
		while ($row=mysqli_fetch_assoc($result)) {
			$spare_id=$row['spare_part_id'];
			$spare_name=$row['spare_part_name'];
			$spare_type=$row['spare_part_type'];
			$spare_categorie=$row['spare_part_categorie'];
			$spare_quantitie=$row['spare_part_quantitie'];
			echo "
			<tr>
        	  <td>$spare_id</td>
        	  <td>$spare_name</td>
        	  <td>$spare_type</td>
        	  <td>$spare_categorie</td>
        	  <td>$spare_quantitie</td>
              <td>Sold</td>
        	  <td>
        	  <span class='glyphicon glyphicon-edit' id='edit'></span><span class='glyphicon glyphicon-trash' id='delete' onclick='update();'></span>
        	  </td>
      		</tr>
      		";
		}
	}

}





function update(){
	echo "<script>
		var retVal = prompt('Enter your name : ', 'your name here');
	</script>";
	if (isset($_POST['submit'])) {
		global $connection;
		$username=$_POST['username'];
		$password=$_POST['password'];
		$id=$_POST['id'];
		$query="UPDATE user SET ";
		$query .="user_name='$username',";
		$query .="password='$password'";
		$query .="WHERE id=$id";
		$updater=mysqli_query($connection,$query);
		if (!$updater) {
			die('ERROR' .mysqli_error($updater));
		}

	}
}








function insert_spare_part(){
	if (isset($_POST['register_spare'])) {
		global $connection;
		$spare_name=$_POST['spare_name'];
		$spare_type=$_POST['spare_type'];
		$spare_categorie=$_POST['spare_categorie'];
		$spare_quantitie=$_POST['spare_quantitie'];
		$query="INSERT INTO spair_parts(spare_part_name,spare_part_type,spare_part_categorie,spare_part_quantitie)";
		$query .="VALUES('$spare_name',''$spare_type,'$spare_categorie','$spare_quantitie')";
		$spare_inserter=mysqli_query($connection,$query);
		if (!$spare_inserter) {
			die('ERROR' .mysqli_error($spare_inserter));
		}
		else{
			echo "<script>echo'THANK YOU'</script>";
		}

	}
}


?>
