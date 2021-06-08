<?php include('db-comm/database_connection.php'); ?>
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
table tr td{
 text-transform: uppercase;
}
#worker_span{
    border:1px solid black;
    padding: 5px;
}
/*  #worker_info_section{
    margin-top: 10px;
    padding-bottom: 30px;
}*/
.worker_information_body,.spare_information_body{
   padding-top: 20px;
}
.spare_information_body b{
   font-family: monospace;
}
 #transaction_status{
    font-size: 8px;
    border-radius: 2px;
    padding: 5px;
    font-variant: small-caps;
    font-family: monospace;
  }

  #transaction_bill{
    font-size: 13px;
    background-color: #EE2050;
    padding: 3px 10px 3px 10px;
    border-radius: 3px;
    font-weight: bold;
    color: white;
  }
  
  #custormer_payed_money{
    background-color: limegreen;
    padding: 3px 15px 3px 15px;
    border-radius: 3px;
    font-weight: bold;
    color: white;
    font-size: 12px;
  }
  #spent_money_bill{
    background-color: lemonchiffon;
    padding: 3px 15px 3px 15px;
    border-radius: 3px;
    font-weight: bold;
    color: black;
    font-size: 12px;
  }
  .customer_information:hover{
    background-color: #fbf9f9;
  }
  @media only screen and (min-width : 150px) and (max-width : 730px){
  #dataContent{
      background-color: white;
  }
  #worker_span{
    font-size:8px;/*5*/
    width: auto;
    border:1px solid black;
    padding: 5px;
  }
  #reduce_button{
    font-size: 8px;
  }

}

@media only screen and (min-width : 731px) and (max-width : 900px){
  #dataContent{
      background-color: white;
  }
  #worker_span{
    font-size: 8.5px;
    width: auto;
    border:1px solid black;
    padding: 5px;
  }
  #reduce_button{
    font-size: 8px;
  }

}

@media only screen and (min-width : 900px) and (max-width : 1050px){
  #dataContent{
      background-color: white;
  }
  #worker_span{
    font-size: 10px;
    width: auto;
    border:1px solid black;
    padding: 5px;
  }
  #reduce_button{
    font-size: 8px;
  }

}

</style>
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i> ALL TRANSACTION PERFOMED
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>

                <tr>
                  <th>ID</th>
                  <th style="width: 150px;">Custormer Name</th>
                  <th style="width: 120px;">Custormer N<sup>o</sup></th>
                  <th>Plate Number</th>
                  <th>Date In</th>
                  <th>Worker Used</th>
                  <th>Spare Used</th>
                  <th>Status</th>
                  <th>Bill</th>
                  <th>P.Bill</th>
                  <!-- <th>Spent</th> -->
                  <th>invoice</th>
                  <!-- <th>Tools</th> -->
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Custormer Name</th>
                  <th>Custormer N<sup>o</sup></th>
                  <th>Plate Number</th>
                  <th>Date In </th>
                  <th>Worker Used</th>
                  <th>Spare Used</th>
                  <th>Status</th>
                  <th>Bill</th>
                  <th>P.Bill</th>
                  <!-- <th>Spent</th> -->
                  <th>invoice</th>
                  <!-- <th>Tools</th> -->
                </tr>
              </tfoot>
              <tbody>
                <?php 
                  $select_each_transaction=$connection->query("SELECT * FROM custormer");
                  while($retrive_from_select_each_transaction=mysqli_fetch_array($select_each_transaction)){
                    $selected_customer_id=$retrive_from_select_each_transaction['customer_id'];
                    $selected_customer_name=$retrive_from_select_each_transaction['customer_name'];
                    $selected_customer_phone_number=$retrive_from_select_each_transaction['customer_phone_number'];
                    $selected_customer_address=$retrive_from_select_each_transaction['customer_address'];
                    $selected_customer_car_type=$retrive_from_select_each_transaction['customer_car_type'];
                    $selected_car_plate_number=$retrive_from_select_each_transaction['car_plate_no'];
                    $selected_date_in=$retrive_from_select_each_transaction['date_in'];
                ?>
                <tr class="customer_information">
                  <td><?php echo $selected_customer_id; ?></td>
                  <td><?php echo $selected_customer_name; ?></td>
                  <td><?php echo $selected_customer_phone_number; ?></td>
                  <td><?php echo $selected_car_plate_number; ?></td>
                  <td><?php echo $selected_date_in; ?></td>
                  <td>
                      <center><span class="glyphicon glyphicon-eye-open show_button" onclick="document.getElementById('worker_modal<?php echo $selected_customer_id; ?>').style.display='block'" class="w3-btn"></span></center>
                      <div id="worker_modal<?php echo $selected_customer_id; ?>" class="w3-modal">
                          <div class="w3-modal-content w3-animate-zoom">
                              <header class="w3-container w3-teal"> 
                                  <span onclick="document.getElementById('worker_modal<?php echo $selected_customer_id; ?>').style.display='none'" class="w3-closebtn">×</span>
                                  <center><h2 style="color: white;font-weight: 900">WORKER USED</h2></center>
                              </header>
                              <div class="w3-container worker_information_body">
                                  <?php 
                                    $get_worker_on_specific_custormer=$connection->query("SELECT worker_id,worker_price FROM garage_car_transactions WHERE customer_id='$selected_customer_id' AND worker_id!='21'");
                                          while($workers_retriver=mysqli_fetch_array($get_worker_on_specific_custormer)){
                                          $worker_id=$workers_retriver['worker_id'];
                                          $worker_price=$workers_retriver['worker_price'];
                                          $worker_detail=$connection->query("SELECT * FROM workers_information WHERE worker_id='$worker_id'");
                                              while($worker_info_retriver=mysqli_fetch_array($worker_detail)){
                                                $worker_name=$worker_info_retriver['worker_name'];
                                                $worker_phone_number=$worker_info_retriver['worker_phone_no'];
                                                $worker_proffessional=$worker_info_retriver['worker_proffessional'];
                                                echo "
                                                  <span id='worker_span'>$worker_name</span>
                                                  <span id='worker_span'>$worker_phone_number</span>
                                                  <span id='worker_span'>$worker_proffessional</span>
                                                  <span id='worker_span'>$worker_price</span><br><br>
                                                  ";
                                              }
                                        }
                                  ?>
                              </div>
                          </div>
                      </div>
                  </td>
                  <td>
                    <center><span class="glyphicon glyphicon-eye-open show_button" onclick="document.getElementById('spare_modal<?php echo $selected_customer_id; ?>').style.display='block'" class="w3-btn"></span></center>
                        <div id="spare_modal<?php echo $selected_customer_id; ?>" class="w3-modal">
                            <div class="w3-modal-content w3-animate-zoom">
                                <header class="w3-container w3-teal"> 
                                    <span onclick="document.getElementById('spare_modal<?php echo $selected_customer_id; ?>').style.display='none'" class="w3-closebtn">×</span>
                                    <center><h2 style="color: white;font-weight: 900">SPARE USED</h2></center>
                                </header>
                                <div class="w3-container spare_information_body">
                                    <?php 
                                      $get_spare_on_specific_custormer=$connection->query("SELECT id,spare_part_id,spare_quantity_used,spare_price FROM garage_car_transactions WHERE spare_quantity_used >0 AND customer_id='$selected_customer_id'");
                                            while($spare_retriver=mysqli_fetch_array($get_spare_on_specific_custormer)){
                                            $id=$spare_retriver['id'];
                                            $spare_id=$spare_retriver['spare_part_id'];
                                            $spare_price=$spare_retriver['spare_price'];
                                            $spare_quantitie=$spare_retriver['spare_quantity_used'];
                                            $spare_detail=$connection->query("SELECT * FROM spair_parts WHERE spare_part_id='$spare_id'");
                                                while($spare_info_retriver=mysqli_fetch_array($spare_detail)){
                                                  $spare_name=$spare_info_retriver['spare_part_name'];
                                                  $spare_type=$spare_info_retriver['spare_part_type'];
                                                  $spare_categorie=$spare_info_retriver['spare_part_categorie'];
                                                  $total=$spare_quantitie*$spare_price;
                                                  echo "
                                                    <span id='worker_span'>$spare_name</span>
                                                    <span id='worker_span'>$spare_type</span>
                                                    <span id='worker_span'>$spare_categorie</span>
                                                    <span id='worker_span'>$spare_quantitie</span>
                                                    <span id='worker_span'><b>PRICE EACH : </b>$spare_price</span>
                                                    <span id='worker_span'><b>TOTAL : </b>$total</span> 
                                                    <br><br>
                                                    ";
                                                }
                                          }
                                    ?>
                                </div>
                            </div>
                        </div>
                  </td>
                  <td>
                    <?php
                        $get_specific_custormer_transaction_status=$connection->query("SELECT status FROM bill WHERE customer_id='$selected_customer_id' ");
                             $custormer_transaction_status_retriver=mysqli_fetch_array($get_specific_custormer_transaction_status);
                             $custormer_transaction_status=$custormer_transaction_status_retriver['status'];
                              if ($custormer_transaction_status == 'Finished') {
                                   echo "<span id='transaction_status' class='btn-info'>".$custormer_transaction_status."</span>";
                              }
                              else if ($custormer_transaction_status == 'Pending') {
                                   echo "
                                   <span id='transaction_status' class='btn-success'>".$custormer_transaction_status."</span>
                                   ";
                              }
                      ?>
                  </td>
                  <td>
                    <?php
                        $total_bill=$connection->query("SELECT bill FROM bill WHERE customer_id='$selected_customer_id'");
                        $count=mysqli_num_rows($total_bill);
                        if ($count == 0) {
                            echo "<span id='transaction_bill'>0</span>";
                        }
                        else{
                          $bill_data=mysqli_fetch_array($total_bill);
                          $amount_of_bill=$bill_data['bill'];
                              echo "<span id='transaction_bill'>$amount_of_bill</span>
                              <input type='text' value='$amount_of_bill' style='display:none' id='bill'>";
                        }
                    ?>
                  </td>
                  <td>
                    <?php
                      $total_bill=$connection->query("SELECT payed_amount FROM bill WHERE customer_id='$selected_customer_id'");
                      $count=mysqli_num_rows($total_bill);
                      if ($count == 0) {
                          echo "<span id='custormer_payed_money'>0</span>";
                      }
                      else{
                        $bill_data=mysqli_fetch_array($total_bill);
                        $amount_payed=$bill_data['payed_amount'];
                            echo "<span id='custormer_payed_money'>".$amount_payed."</span>";
                      }
                    ?>
                  </td>
                  <td>
                    <span class="glyphicon glyphicon-print" style="font-size: 18px" onclick="print_invoice(<?php echo $selected_customer_id; ?>)"></span>
                  </td>
                </tr>
                <?php
                  }
                 ?>
              </tbody>
          </table>
        </div>
    </div>
    <div class="card-footer small text-muted">Transaction checking</div>
</div>

<script src="assets/datatables/jquery.dataTables.js"></script>
<script src="assets/datatables/dataTables.bootstrap4.js"></script>
<!-- Custom scripts for all pages-->
<script src="assets/datatables/sb-admin.min.js"></script>
<!-- Custom scripts for this page-->
<script src="assets/datatables/sb-admin-datatables.min.js"></script>
<script>
var modal = document.getElementById('worker_modal');
var moda2 = document.getElementById('spare_modal');
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
    if (event.target == moda2) {
        moda2.style.display = "none";
    }
};
function print_invoice(customer_id){
    customer=customer_id;
    window.location.href='functions/pdf_report.php?custormer='+customer;

}
</script>