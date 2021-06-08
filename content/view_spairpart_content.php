<?php include('db-comm/database_connection.php');?>
<style>
  .container{
    width: auto;
  }
  /*.container h2{
    font-family: monospace;
    font-weight: bold;
    color: #EE2050;
  } 
  .container h2{
    margin-left: 10px;
  }*/
  .container table{
    margin-top: 10px;
    border:1px solid black;     
  }
  .container table thead tr th{
    font-variant: small-caps;
    font-family: consolas;
  }
  .container table tbody span#edit{
    background-color: blue;
    padding: 3px 3px 3px 3px;
    border-radius: 5px;
    color: white;
    font-size: 15px;
    margin-left: 3px;
  }
  .container table tbody span#edit:hover{
    background-color: darkblue;
  }
  .container table tbody span#delete{
    background-color: crimson;
    padding: 4px 4px 2px 2px;
    border-radius: 5px;
    color: white;
    font-size: 15px;
    font-weight: bold;
    align-content: center;
    margin-left: 3px;
  }
  .container table tbody span#delete:hover{
    background-color:red;
  }
  table tr td{
  line-height: 1.5;
    text-transform: uppercase;
    font-size: 13px;
    font-family: monospace;
  }
</style>
<div class="container">
  		<h2 id="page_title">ALL SPARE PARTS</h2>                                                                                      
  		<div class="table-responsive">          
  		<table class="table table-hover">
    		<thead>
      			<tr>
        			<th>Id</th>
        			<th>Name</th>
        			<th>Type</th>
              <th>Categorie</th>
        			<th>Quantity</th>
              <th>Edit</th>
      			</tr>
    		</thead>
    		<tbody>
            <?php 
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
            ?>
            <tr>
                <td><?php echo"$spare_id" ?></td>
                <td><?php echo"$spare_name" ?></td>
                <td><?php echo"$spare_type" ?></td>
                <td><?php echo"$spare_categorie" ?></td>
                <td><?php echo"$spare_quantitie" ?></td>
                <td>
                    <form>
                      <span class="glyphicon glyphicon-edit" id="edit" onclick="edit_spare(<?php echo"$spare_id" ?>);"></span>        
                      <span class="glyphicon glyphicon-trash" id="delete" onclick="delete_spare(<?php echo"$spare_id" ?>)"></span> 
                    </form>
                </td>
            </tr>
            <?php }}?>
        </tbody>
</table>


<script type="text/javascript">
function edit_spare(spare_id) {
    spare_id = spare_id;
    var section = 'worker_remove';
    $.ajax({
      url: "functions/edit_spare.php",
      type: "post",
      async: false,
      data: {
        section : section,
        spare_id : spare_id,
      },
      success: function (data) {
        $("#dataContent").html(data);
      }
    });
  };
 function delete_spare(spare_id) {
    spare_id = spare_id;
    var section = 'worker_remove';
    $.ajax({
      url: "functions/delete_spare.php",
      type: "post",
      async: false,
      data: {
        section : section,
        spare_id : spare_id,
      },
      success: function (data) {
        $("#dataContent").html(data);
      }
    });
  };
</script>