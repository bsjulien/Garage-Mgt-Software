<?php include('../db-comm/database_connection.php'); ?>
<link href="assets/datatables/dataTables.bootstrap4.css" rel="stylesheet">
<style>
.mb-3 .card-header{
    background-color: #f6f6f6;
    padding: 10px;  
    font-family: monospace;
    font-size: 12px;
    border:1px solid lightgray;
    border-radius: 10px 10px 0px 0px;
}
.mb-3 .card-footer{
    background-color: #f6f6f6;
    padding: 9px;  
    font-family: monospace;
    font-size: 11px;
    border:1px solid lightgray;
    border-radius: 0px 0px 10px 10px;
}
.mb-3 .card-body{
  padding: 20px 15px 10px 10px;
  border:1px solid lightgray;
}
.card{
	padding: 15px 15px 15px 15px;
}
.card-body table tr th{
	font-family: monospace;
	font-weight: bold;
}
table{
	line-height: 1.5;
}
.card-body table tr td{
	font-family: monospace;
}
label{
	font-family: monospace;
}
.dataTables_info{
	font-family: monospace;
}
</style>
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i> Spare Statistics
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>

                <tr>
                  <th style="width: 100px;">Spare Name</th>
                  <th>Spare Type</th>
                  <th>Spare Categorie</th>
                  <th>Remaining Q</th>
                  <th>Spare Sold</th>
                  <th>Spare Income</th>
                  <!-- <th>Profit Made</th> -->
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>spare Name</th>
                  <th>Spare Type</th>
                  <th>Spare Categorie</th>
                  <th>Remaining Q</th>
                  <th>Spare Sold</th>
                  <th>Spare Income</th>
                  <!-- <th>Profit Made</th> -->
                </tr>
              </tfoot>
              <tbody>
                <?php 
                  $select_each_spare=$connection->query("SELECT * FROM spair_parts");
                  while($retrive_from_select_each_spare=mysqli_fetch_array($select_each_spare)){
                    $spare_id=$retrive_from_select_each_spare['spare_part_id'];
                    $spare_name=$retrive_from_select_each_spare['spare_part_name'];
                    $spare_type=$retrive_from_select_each_spare['spare_part_type'];
                    $spare_categorie=$retrive_from_select_each_spare['spare_part_categorie'];
                    $bought_quantitie=$retrive_from_select_each_spare['spare_part_quantitie'];
                    $spare_income=1000;
                    $profit_made='?';
                ?>
                <tr>
                  <td><?php echo $spare_name."&nbsp;<span class='badge'>$spare_id</span>"; ?></td>
                  <td><?php echo $spare_type; ?></td>
                  <td><?php echo $spare_categorie; ?></td>
                  <td><?php echo $bought_quantitie; ?></td>
                  <td>
                    <?php 
                        $sold=$connection->query("SELECT * FROM garage_car_transactions WHERE spare_part_id='$spare_id'");
                        $sold_spare=0;
                        while($every_spare=mysqli_fetch_array($sold)){
                          $spare_quantitie_used_on_spare=$every_spare['spare_quantity_used'];
                          $sold_spare=$sold_spare+$spare_quantitie_used_on_spare;
                        } 
                        echo $sold_spare;;
                      ?>
                  </td>
                  <td>
                    <?php 
                        $income=$connection->query("SELECT * FROM garage_car_transactions WHERE spare_part_id='$spare_id'");
                        $total_income_on_spare=0;
                        while($every_transaction=mysqli_fetch_array($income)){
                          $spare_quantitie_used_on_spare=$every_transaction['spare_quantity_used'];
                          $spare_price_on_spare=$every_transaction['spare_price'];
                          $total_income_on_spare=$total_income_on_spare+($spare_quantitie_used_on_spare*$spare_price_on_spare);
                        } 
                        echo $total_income_on_spare;;
                      ?>
                        
                  </td>
                  <!--<td>
                      <?php 
                        /*$income=$connection->query("SELECT * FROM garage_car_transactions WHERE custormer_name='' AND spare_id_used='$spare_id'");
                        $total_income_on_spare=0;
                        $spare_income;
                        while($every_transaction=mysqli_fetch_array($income)){
                          $spare_quantitie_used_on_spare=$every_transaction['spare_quantitie_used'];
                          $spare_price_on_spare=$every_transaction['spare_price'];
                          $total_income_on_spare=$total_income_on_spare+($spare_quantitie_used_on_spare*$spare_price_on_spare);
                        } 
                        echo $total_income_on_spare;*/
                      ?>
                  </td>-->
                  <!-- <td><?php echo $profit_made; ?></td> -->
                </tr>
                <?php
                  }
                 ?>
              </tbody>
    	    </table>
        </div>
    </div>
    <div class="card-footer small text-muted">Checking table of spares</div>
</div>

<script src="assets/datatables/jquery.dataTables.js"></script>
<script src="assets/datatables/dataTables.bootstrap4.js"></script>
<!-- Custom scripts for all pages-->
<script src="assets/datatables/sb-admin.min.js"></script>
<!-- Custom scripts for this page-->
<script src="assets/datatables/sb-admin-datatables.min.js"></script>