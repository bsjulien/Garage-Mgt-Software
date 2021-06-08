<?php 
  include('db-comm/database_connection.php');
?>
<style>
  .container{
    width: auto;
  }
 /* .container h2{
    font-family: monospace;
    font-weight: bold;
    color: #EE2050;
  }
  .container h2{
    margin-left: 10px;
  }*/
  .container table{
    margin-top: 10px;
  }
  .container table thead tr th{
    font-variant: small-caps;
    font-family: consolas;
  }
  .container table tr td #worker_remove,#worker_pay{
    width: 60px;
    font-size: 10px;
    align-items: center;
    border:0;
    height: 20px;
    border-radius: 2px;

  }
  .container table tr td i{
    margin-bottom: 20px;
  }
  .container table tbody tr td{
    text-transform: uppercase;
    font-family: monospace;
  }
</style>
<div class="container">
  		<h2 id="page_title">ALL WORKER INFORMATION</h2>                                                                                      
  		<div class="table-responsive">          
  		<table class="table table-hover">
    		<thead>
      			<tr>
        			<th>Worker Name</th>
        			<th>Worker N<sup>o</sup></th>
        			<th>Depatment</th>
        			<th>Address</th>
              <th>Age</th>
              <th>Year</th>
		          <th>Month</th>
		          <th>Salary</th>
              <!-- <th>Paid Amt</th> -->
		          <th>Edit</th>
      			</tr>
    		</thead>
    		<tbody>
        			<?php 
                global $connection;
                $query="SELECT * FROM workers_information WHERE worker_name!='NONE'";
                $result=mysqli_query($connection,$query);
                if ($result) {
                  $a=0;
                  while ($row=mysqli_fetch_assoc($result)) {
                    $a++;
                    $worker_id=$row['worker_id'];
                    $worker_name=$row['worker_name'];
                    $worker_phone_number=$row['worker_phone_no'];
                    $worker_proffesion=$row['worker_proffessional'];
                    $worker_address=$row['worker_address'];
                    $worker_age=$row['worker_age'];
                    $worker_salary=$row['worker_salary'];
                    $registration_date=$row['worker_registration_date'];

              ?>
              <tr>
                <td><span class="glyphicon glyphicon-user" style="color: blue"> </span> <?php echo $worker_name; ?></td>
                <td><?php echo $worker_phone_number; ?></td>
                <td><span class="label label-success"><?php echo $worker_proffesion; ?></span></td>
                <td><?php echo $worker_address; ?></td>
                <td><?php echo $worker_age; ?></td>
                <td>
                  <select id="year">
                      <option value="2018">2018</option>
                  </select>
                </td>
                <td>
                  <select id="month" onchange="select_according_to_month(<?php echo $worker_id; ?>);">
                      <option value="January">January</option>
                      <option value="Feb">Feb</option>
                      <option value="March">March</option>
                      <option value="Arpil">Arpil</option>
                      <option value="May">May</option>
                      <option value="June">June</option>
                      <option value="July">July</option>
                      <option value="August">August</option>
                      <option value="October">October</option>
                      <option value="November">November</option>
                      <option value="September">September</option>
                      <option value="">December</option>
                  </select>
                </td>
                <td><?php echo $worker_salary; ?></td>
                <!-- <td id="paid_amt"></td> -->
                <td>
                    <a class="btn btn-primary" id="worker_pay" title="PayWorker" onclick="pay_worker(<?php echo $worker_id; ?>)"><i>PAY</i></a>
                    <a class="btn btn-warning" id="worker_remove" onclick="worker_remove(<?php echo $worker_id; ?>)" title="DeleteRecord"><i>DELETE</i></a>
                </td>
              </tr>
              <?php 
                  }}
              ?>

    		</tbody>
  		</table>
</div>
<script>
  function pay_worker(){
    var amount_you_want_to_pay=document.getElementById('amount_payed').value;
    alert(amount_you_want_to_pay);
  }
  function worker_remove(worker_id) {
    worker_id = worker_id;
    var section = 'worker_remove';
    $.ajax({
      url: "functions/delete_worker.php",
      type: "post",
      async: false,
      data: {
        section : section,
        worker_id : worker_id,
      },
      success: function (data) {
        $("#dataContent").html(data);
      }
    });
  };

  function pay_worker(worker_id) {
    year=document.getElementById("year").value;
    month=document.getElementById("month").value;
    worker_id = worker_id;;
    var section = 'worker_pay';
    $.ajax({
      url: "functions/pay_worker.php",
      type: "post",
      async: false,
      data: {
        section : section,
        worker_id : worker_id,
        year : year,
        month : month,
      },
      success: function (data) {
        $("#dataContent").html(data);
      }
    });
  };
/*  function select_according_to_month(worker_id){
    var month=document.getElementById("month").value;
    var year=document.getElementById("year").value;
    worker_id=worker_id;
    $.ajax({
      url: "ajax_task/select_salary_according_to_month.php",
      type: "post",
      async: false,
      data: {
        year:year,
        worker_id:worker_id,
        month : month,
      },
      success: function (data) {
        $("#paid_amt").html(data);
      }
    });
  }
  */
</script>