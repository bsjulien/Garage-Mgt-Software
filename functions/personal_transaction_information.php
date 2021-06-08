
<?php
include('../db-comm/database_connection.php'); 
if (isset($_POST['selected_plate_no'])) {
   $selected_transaction_id=$_POST['selected_plate_no'];
   $customer_id=$_POST['selected_plate_no'];
   $selected_date_in=$_POST['date_in'];
   $get_specific_custormer_info=$connection->query("SELECT * FROM custormer WHERE customer_id='$customer_id' AND date_in='$selected_date_in' AND customer_name!=''");
   $custormer_info=mysqli_fetch_array($get_specific_custormer_info);
   $selected_plate_no=$custormer_info['car_plate_no'];
   $customer_name=$custormer_info['customer_name'];
   $customer_phone_number=$custormer_info['customer_phone_number'];
}
?>
<?php /*echo "<script>alert($customer_id);</script>";*/ ?>
<tr >
    <!-- <td></td> -->
    <td style="text-transform: uppercase;">
      <input type="" name="" value="<?php echo $selected_date_in; ?>" id="selected_date_in" style="display: none">
      <input type="" name="" value="<?php echo $customer_id; ?>" id="customer_id" style="display: none">
      <?php 
      echo $customer_name;
      ?>
    </td>
    <td>
      <?php
        echo $customer_phone_number;
      ?>
    </td>
    <td>
       <?php echo $selected_plate_no; ?>
    </td>
    <td>
        <center><span class="glyphicon glyphicon-eye-open show_button" onclick="document.getElementById('worker_modal').style.display='block'" class="w3-btn"></span></center>
        <div id="worker_modal" class="w3-modal">
            <div class="w3-modal-content w3-animate-zoom">
                <header class="w3-container w3-teal"> 
                    <span onclick="document.getElementById('worker_modal').style.display='none'" class="w3-closebtn">×</span>
                    <center><h2 style="color: white;font-weight: 900">WORKER USED</h2></center>
                </header>
                <div class="w3-container worker_information_body">
                    <?php 
                      $get_worker_on_specific_custormer=$connection->query("SELECT worker_id,worker_price FROM garage_car_transactions WHERE customer_id='$customer_id' AND worker_id!=21");
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
        <center><span class="glyphicon glyphicon-eye-open show_button" onclick="document.getElementById('spare_modal').style.display='block'" class="w3-btn"></span></center>
        <div id="spare_modal" class="w3-modal">
            <div class="w3-modal-content w3-animate-zoom">
                <header class="w3-container w3-teal"> 
                    <span onclick="document.getElementById('spare_modal').style.display='none'" class="w3-closebtn">×</span>
                    <center><h2 style="color: white;font-weight: 900">SPARE USED</h2></center>
                </header>
                <div class="w3-container spare_information_body">
                    <?php 
                      $get_spare_on_specific_custormer=$connection->query("SELECT id,spare_part_id,spare_quantity_used,spare_price FROM garage_car_transactions WHERE customer_id='$customer_id' AND spare_quantity_used > 0");
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
                                    <button id='reduce_button' onclick='reduce_spare($id,$spare_id,$spare_quantitie,$customer_id,$spare_price)'>REDUCE</button>
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
        $get_specific_custormer_transaction_status=$connection->query("SELECT status FROM bill WHERE customer_id='$customer_id' ");
            $custormer_transaction_status_retriver=mysqli_fetch_array($get_specific_custormer_transaction_status);
                $custormer_transaction_status=$custormer_transaction_status_retriver['status'];
                    if ($custormer_transaction_status == 'Finished') {
                         echo "<span id='transaction_status' class='btn-info'>".$custormer_transaction_status."</span>";
                    }
                    else if ($custormer_transaction_status == 'Pending') {
                         echo "
                         <span id='transaction_status' class='btn-success' onclick='car_done_message($customer_id)'>".$custormer_transaction_status."</span>
                         <input type='text' value='$selected_plate_no' id='finished_plate_no' style='display:none;'>
                         <input type='text' value='$selected_date_in' id='finished_date_in' style='display:none;'>
                         ";
                    }
      ?>
    </td>
    <td>
        <?php
        $total_bill=$connection->query("SELECT bill FROM bill WHERE customer_id='$customer_id'");
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
        $total_bill=$connection->query("SELECT payed_amount FROM bill WHERE customer_id='$customer_id'");
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
      <?php
        /*$get_amount_payed=$connection->query("SELECT payed_amount FROM garage_car_transactions WHERE car_plate_no='$selected_plate_no' AND date_in='$selected_date_in' AND custormer_name!=''");
        $custormer_payment_status=mysqli_fetch_array($get_amount_payed);
        $custormer_amount_payed=$custormer_payment_status['payed_amount'];
        echo "<span id='custormer_payed_money'>".$custormer_amount_payed."</span>";*/
        ?>
    </td>
    <td>
        <span data-toggle="tooltip" data-placement="top" title="Provide spare and worker to custormer" class="__glyphicon glyphicon-edit__" id="edit" onclick="edit_transaction(<?php echo $customer_id; ?>);">EDIT</span>       
        <!-- <span data-toggle="tooltip" data-placement="top" title="View more information of custormer" class="__glyphicon glyphicon-zoom-in__" id="more" onclick="">MORE INFO</span>  -->
        <span data-toggle="tooltip" data-placement="top" title="Record custormer payment" class="__fa fa-money__" id="money" onclick="payment(<?php echo $customer_id; ?>);">PAYMENT</span> 
        <!-- <span data-toggle="tooltip" data-placement="top" title="Record used product from outside" class="__fa fa-briefcase__" id="outside_material" onclick="outside_material();">OUTSIDER</span> --> 
        <span data-toggle="tooltip" data-placement="top" title="Write problem statement of the car" class="__fa fa-briefcase__" id="problem_statement" onclick="problem_statement(<?php echo $customer_id; ?>);">PROBLEM</span> 
    </td>
</tr>
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
 function edit_transaction(custom_id) {
    if(confirm("Hello! Time to enter things used by customer's vehicle") == true){
        customer_id=custom_id;
        selected_date_in=document.getElementById('selected_date_in').value;
        transaction_id = 0;
        var section = 'edit_transaction';
        $.ajax({
          url: "functions/edit_custormer_info.php",
          type: "post",
          async: false,
          data: {
            section : section,
            customer_id : customer_id,
            selected_date_in : selected_date_in,
          },
          success: function (data) {
            $("#dataContent").html(data);
          }
        });
      }
  };
   function payment(customer_id) {
    if(confirm("Hello you are going to register entered by customer") == true){
        customer_id=customer_id;
        total_amount=document.getElementById('bill').value;
        var section = 'transaction_payment';
        $.ajax({
          url: "functions/person_transaction_payment.php",
          type: "post",
          async: false,
          data: {
            section : section,
            customer_id : customer_id,
            total_amount : total_amount,
          },
          success: function (data) {
            $("#page_on_transaction").html(data);
          }
        });
    }
  };
   function outside_material() {
    transaction_id = document.getElementById('wanted_transaction_id').value;
    var section = 'materials_from_outside_for_transaction';
    $.ajax({
      url: "functions/materials_from_outside_for_transaction.php",
      type: "post",
      async: false,
      data: {
        section : section,
        transaction_id : transaction_id,
      },
      success: function (data) {
        $("#dataContent").html(data);
      }
    });
  };
/*  function remove_spare(id,spare_id,spare_quantitie){
    id=id;
    spare_id =spare_id;
    spare_quantitie=spare_quantitie;
    alert(id+' '+spare_id+' '+spare_quantitie);
  };*/
  function reduce_spare(id,spare_id,spare_quantitie,customer_id,spare_price){
    id=id;
    customer_id = customer_id;
    spare_id =spare_id;
    spare_quantitie=spare_quantitie;
    spare_price_given=spare_price;
    $.ajax({
      url: "functions/reduce_spare_quantitie.php",
      type: "post",
      async: false,
      data: {
        id : id,
        customer_id :customer_id,
        spare_id : spare_id,
        spare_quantitie : spare_quantitie,
        spare_price_given : spare_price_given,
      },
      success: function (data) {
        $("#page_on_transaction").html(data);
      }
    });
  };
   function problem_statement(customer_id) {
    if(confirm("Hello you are going to enter problems of the vehicle") == true){
        customer_id = customer_id;
        alert(customer_id);
        date_in=document.getElementById('selected_date_in').value;
        var section = 'problem_statement';
        $.ajax({
          url: "functions/record_problem_statement.php",
          type: "post",
          async: false,
          data: {
            section : section,
            customer_id : customer_id,
            date_in : date_in,
          },
          success: function (data) {
            $("#page_on_transaction").html(data);
          }
        });
  }
  };
  function car_done_message(customer_id){
     section="transaction_finished";
     customer_id = customer_id;
     if (confirm("YOU ARE GOING TO SEND SMS TO THE VEHICLE OWNER THAT ITS DONE") == true) {
        $.ajax({
          url: "ajax_task/transaction_finished_info.php",
          type: "post",
          async: false,
          data: {
            customer_id : customer_id,
            section : section,
          },
          success: function (data) {
            $("#dataContent").html(data);
          }
        }); 
     }
     else{
       alert('OK NO PROBLEM THE MESSAGE WILL NO TBE SENT, IF YOU WANT TO SEND IT CLICK AGAIN');
     }
     
  }
</script>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>