<?php 
session_start();
$title=$_SESSION['title'];
$priority='';
if ($title == 'MANAGER') {
  $priority="//";
}
include('db-comm/database_connection.php'); 
  
?>
<style>
      #myInput {/*
          background-image: url('/css/searchicon.png');*/
          background-position: 10px 12px;
          background-repeat: no-repeat;
          width: 100%;
          font-size: 16px;
          padding: 12px 20px 12px 40px;
          border: 1px solid #ddd;
          margin-bottom: 12px;
      }

      #myUL {
          list-style-type: none;
          padding: 0;
          margin: 0;
      }

      #myUL li{
          border: 1px solid #ddd; 
          margin-top: -1px; 
          background-color: #f6f6f6;
          padding: 12px;
          text-decoration: none; 
          font-size: 18px; 
          color: black;
          display: block;
      }

      #myUL li:hover:not(.header) {
          background-color: #eee;
      }
      #custormer_information{
      	overflow: auto;
        padding-bottom: 15px;
      }
      #custormer_information span{
      	padding-right: 20px;
      }
      /* width */
      ::-webkit-scrollbar {
          width: 10px;
      }

      /* Track */
      ::-webkit-scrollbar-track {
          box-shadow: inset 0 0 5px grey; 
          border-radius: 5px;
      }
      /*::-webkit-scrollbar-button{
      background: yellow;
      }*/
       
       /*Handle */
      ::-webkit-scrollbar-thumb {
          background: blue; 
          border-radius: 10px;
      }

      /* Handle on hover */
      ::-webkit-scrollbar-thumb:hover {
          background: #b30000; 
      }
      #graph {
        padding: 100px;  
      }
      #graph2{
        background:;
        width: 600px;
        height: 400px;
        padding-bottom: 10px;
      }
      .mb-3 .card-header,.card-header-business{
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
      #spare_checking{
        padding:10px 25px 10px 25px;
        background-color: forestgreen;
        text-align: center;
        font-family:LCD;
        font-weight: 700;
        color: white;
        border-radius: 5px;
        letter-spacing: 2px;
      }
      #spare_checking:hover{
        background-color:seagreen;
      }
      #worker_checking{
        padding:10px 25px 10px 25px;
        background-color: darkcyan;
        text-align: center;
        font-family:LCD;
        font-weight: 700;
        color: white;
        border-radius: 5px;
        letter-spacing: 2px;
      }
      #worker_checking:hover{
        background-color: teal;
      }
</style>
<div class="container-fluid"><br><br>
    <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-area-chart"></i> Garage Money Made 
        </div>
        <div class="card-body">
            <canvas id="myAreaChart" width="100%" height="30"></canvas>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div><br><br>

  	<div id="custormer_information" class="col-sm-6">
    		<input type="text" id="myInput" onkeyup="search()" placeholder="Search for names..">
    		<ul id="myUL">
        			<?php 
        			include('db-comm/database_connection.php');
        			$all_workers_needed=$connection->query("SELECT * FROM workers_information");
        			while ($data_row=mysqli_fetch_assoc($all_workers_needed)) {
        				$worker_id=$data_row['worker_id'];
        				$worker_name=$data_row['worker_name'];
        				$worker_phone_no=$data_row['worker_phone_no'];
        				$worker_proffesional=$data_row['worker_proffessional'];
        				$worker_address=$data_row['worker_address'];
        				$worker_age=$data_row['worker_age'];
        				$worker_national_id=$data_row['worker_national_id'];
        				$worker_country=$data_row['worker_country'];
        				$worker_reg_date=$data_row['worker_registration_date'];
        				$worker_salary=$data_row['worker_salary'];
        			?>
            		  <li onclick="<?php echo $priority; ?>all_information('<?php echo $worker_id; ?>','<?php echo $worker_name; ?>','<?php echo $worker_phone_no; ?>','<?php echo $worker_proffesional ?>','<?php echo $worker_address; ?>','<?php echo $worker_age; ?>','<?php echo $worker_national_id; ?>','<?php echo $worker_country; ?>','<?php echo $worker_reg_date; ?>','<?php echo $worker_salary; ?>')">
            		  	<i><span class="fa fa-user-circle-o"></span><?php echo $worker_name; ?></i>
            		  </li>
        			<?php 
        				}
        			?>
    		</ul>
  	</div>
    <div class="card mb-3 col-sm-6" style="padding-bottom: 10px">



        <div class="card-header">
            <i class="fa fa-pie-chart"></i> Pie Chart 
        </div>
        <div class="card-body">
            <canvas id="myPieChart" width="30%" height="100"></canvas>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div><br>



        <div class="card-header-business">
            <i class="fa fa-pie-chart"></i> Business Checking 
        </div>
        <div class="card-body">
            <div id="spare_checking" onclick="spare_checking();">SPARE</div><br>
            <div id="worker_checking" onclick="worker_checking();">WORKERS</div><br>
            <div id="worker_checking" onclick="worker_checking();">REPORTS</div>
        </div>
        <div class="card-footer small text-muted">Everything</div>


    </div>
</div>
<script>
function search() {
    // Declare variables
    var input, filter, ul, li, a, i;
    input = document.getElementById('myInput');
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName('li');

    // Loop through all list items, and hide those who don't match the search query
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("i")[0];
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
};
function spare_checking(){
  var section = 'spare_checking';
    $.ajax({
      url: "functions/spare_checking.php",
      type: "post",
      async: false,
      data: {
          section : section,
      },
      success: function (data) {
        $("#dataContent").html(data);
      }
    });
}
function worker_checking(){
  var section = 'worker_checking';
    $.ajax({
      url: "functions/worker_checking.php",
      type: "post",
      async: false,
      data: {
          section : section,
      },
      success: function (data) {
        $("#dataContent").html(data);
      }
    });
}
/*$("#worker").click(function () {
    var section = 'worker_profile';
    var worker_id=document.getElementById('worker').value;
    alert(worker_id);
    $.ajax({
      url: "functions/worker_profile.php",
      type: "post",
      async: false,
      data: {
          section : section,
      },
      success: function (data) {
        $("#dataContent").html(data);
      }
      });
 });*/
</script>
<script>
	function all_information(worker_id,worker_name,worker_phone_no,worker_proffesional,worker_address,worker_age,worker_national_id,worker_country,worker_reg_date,worker_salary){
		worker_id=worker_id;
		worker_name=worker_name;
		worker_phone_no=worker_phone_no;
		worker_proffesional=worker_proffesional;
		worker_address=worker_address;
		worker_age=worker_age;
		worker_national_id=worker_national_id;
		worker_country=worker_country;
		worker_reg_date=worker_reg_date;
		worker_salary=worker_salary;
		/*alert(worker_id+'--'+worker_name+'--'+worker_phone_no+'--'+worker_proffesional+'--'+worker_address+'--'+worker_age+'--'+worker_national_id+'--'+worker_country+'--'+worker_reg_date+'--'+worker_salary+'--'+worker_status);*/
		$.ajax({
      		url: "functions/worker_profile.php",
      		type: "post",
      		async: false,
      		data: {
          		worker_id : worker_id,
          		worker_name : worker_name,
          		worker_phone_no : worker_phone_no,
          		worker_proffesional : worker_proffesional,
          		worker_address : worker_address,
          		worker_age : worker_age,
          		worker_national_id : worker_national_id,
          		worker_country : worker_country,
          		worker_reg_date : worker_reg_date,
          		worker_salary : worker_salary,
      		},
      		success: function (data) {
        		$("#dataContent").html(data);
      		}
      		});
		};  
</script>
<script src="assets/for_chart/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="assets/for_chart/jquery.easing.min.js"></script>
<!-- Page level plugin JavaScript-->
<script src="assets/for_chart/Chart.min.js"></script>
<!-- Custom scripts for all pages-->
<script src="assets/for_chart/sb-admin.min.js"></script>
<!-- Custom scripts for this page-->
<script >
  Chart.defaults.global.defaultFontFamily='-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif',
Chart.defaults.global.defaultFontColor="#292b2c";
var ctx=document.getElementById("myAreaChart"),
  myLineChart=new Chart(ctx,
  {type:"line",
  data:
  {labels:
    [
      "Mar 1","Mar 2","Mar 3","Mar 4","Mar 5","Mar 6","Mar 7","Mar 8","Mar 9","Mar 10","Mar 11","Mar 12"],
    datasets:[{label:"Money Made ",
      lineTension:.3,
      backgroundColor:"rgba(2,117,216,0.2)",
    borderColor:"rgba(2,117,216,1)",
    pointRadius:5,
    pointBackgroundColor:"rgba(2,117,216,1)",
    pointBorderColor:"rgba(255,255,255,0.8)",
    pointHoverRadius:5,
    pointHoverBackgroundColor:"rgba(2,117,216,1)",
    pointHitRadius:20,
    pointBorderWidth:2,
    data:[
        <?php
            $sum=0;
            $chart_data=$connection->query("SELECT bill.bill FROM bill INNER JOIN custormer ON bill.customer_id=custormer.customer_id WHERE date_in >= '2018-01-01' AND date_in <= '2018-01-31'");
                    while($bill_info=mysqli_fetch_array($chart_data)){
                                $amount=$bill_info['bill'];
                                $sum=$sum+$amount;
                    }
            echo $sum;
        ?>,
        <?php
            $sum=0;
            $chart_data=$connection->query("SELECT bill.bill FROM bill INNER JOIN custormer ON bill.customer_id=custormer.customer_id WHERE date_in >= '2018-02-01' AND date_in <= '2018-02-31'");
                    while($bill_info=mysqli_fetch_array($chart_data)){
                                $amount=$bill_info['bill'];
                                $sum=$sum+$amount;
                    }
            echo $sum;
        ?>,
        <?php
            $sum=0;
            $chart_data=$connection->query("SELECT bill.bill FROM bill INNER JOIN custormer ON bill.customer_id=custormer.customer_id WHERE date_in >= '2018-03-01' AND date_in <= '2018-03-31'");
                    while($bill_info=mysqli_fetch_array($chart_data)){
                                $amount=$bill_info['bill'];
                                $sum=$sum+$amount;
                    }
            echo $sum;
        ?>,
        <?php
            $sum=0;
            $chart_data=$connection->query("SELECT bill.bill FROM bill INNER JOIN custormer ON bill.customer_id=custormer.customer_id WHERE date_in >= '2018-04-01' AND date_in <= '2018-04-31'");
                    while($bill_info=mysqli_fetch_array($chart_data)){
                                $amount=$bill_info['bill'];
                                $sum=$sum+$amount;
                    }
            echo $sum;
        ?>,
        <?php
            $sum=0;
            $chart_data=$connection->query("SELECT bill.bill FROM bill INNER JOIN custormer ON bill.customer_id=custormer.customer_id WHERE date_in >= '2018-05-01' AND date_in <= '2018-05-31'");
                    while($bill_info=mysqli_fetch_array($chart_data)){
                                $amount=$bill_info['bill'];
                                $sum=$sum+$amount;
                    }
            echo $sum;
        ?>,
        <?php
            $sum=0;
            $chart_data=$connection->query("SELECT bill.bill FROM bill INNER JOIN custormer ON bill.customer_id=custormer.customer_id WHERE date_in >= '2018-06-01' AND date_in <= '2018-06-31'");
                    while($bill_info=mysqli_fetch_array($chart_data)){
                                $amount=$bill_info['bill'];
                                $sum=$sum+$amount;
                    }
            echo $sum;
        ?>,
        <?php
            $sum=0;
            $chart_data=$connection->query("SELECT bill.bill FROM bill INNER JOIN custormer ON bill.customer_id=custormer.customer_id WHERE date_in >= '2018-07-01' AND date_in <= '2018-07-31'");
                    while($bill_info=mysqli_fetch_array($chart_data)){
                                $amount=$bill_info['bill'];
                                $sum=$sum+$amount;
                    }
            echo $sum;
        ?>,
        <?php
            $sum=0;
            $chart_data=$connection->query("SELECT bill.bill FROM bill INNER JOIN custormer ON bill.customer_id=custormer.customer_id WHERE date_in >= '2018-08-01' AND date_in <= '2018-08-31'");
                    while($bill_info=mysqli_fetch_array($chart_data)){
                                $amount=$bill_info['bill'];
                                $sum=$sum+$amount;
                    }
            echo $sum;
        ?>,
        <?php
            $sum=0;
            $chart_data=$connection->query("SELECT bill.bill FROM bill INNER JOIN custormer ON bill.customer_id=custormer.customer_id WHERE date_in >= '2018-09-01' AND date_in <= '2018-09-31'");
                    while($bill_info=mysqli_fetch_array($chart_data)){
                                $amount=$bill_info['bill'];
                                $sum=$sum+$amount;
                    }
            echo $sum;
        ?>,
        <?php
            $sum=0;
            $chart_data=$connection->query("SELECT bill.bill FROM bill INNER JOIN custormer ON bill.customer_id=custormer.customer_id WHERE date_in >= '2018-10-01' AND date_in <= '2018-10-31'");
                    while($bill_info=mysqli_fetch_array($chart_data)){
                                $amount=$bill_info['bill'];
                                $sum=$sum+$amount;
                    }
            echo $sum;
        ?>,
        <?php
            $sum=0;
            $chart_data=$connection->query("SELECT bill.bill FROM bill INNER JOIN custormer ON bill.customer_id=custormer.customer_id WHERE date_in >= '2018-11-01' AND date_in <= '2018-11-31'");
                    while($bill_info=mysqli_fetch_array($chart_data)){
                                $amount=$bill_info['bill'];
                                $sum=$sum+$amount;
                    }
            echo $sum;
        ?>,
        <?php
            $sum=0;
            $chart_data=$connection->query("SELECT bill.bill FROM bill INNER JOIN custormer ON bill.customer_id=custormer.customer_id WHERE date_in >= '2018-12-01' AND date_in <= '2018-12-31'");
                    while($bill_info=mysqli_fetch_array($chart_data)){
                                $amount=$bill_info['bill'];
                                $sum=$sum+$amount;
                    }
            echo $sum;
        ?>]}]},
    options:{scales:{
      xAxes:[{time:
          {unit:"date"},
          gridLines:{display:!1},
          ticks:{maxTicksLimit:7}}
        ],
      yAxes:[{ticks:
        {min:0,max:100e4,maxTicksLimit:10},
        gridLines:{color:"rgba(0, 0, 0, .125)"}}
        ]},
    legend:{display:!1}}}),


ctx=document.getElementById("myBarChart"),
  myLineChart=new Chart(ctx,
    {type:"bar",
    data:
    {labels:
      ["January","February","March","April","May","June"],
          datasets:[{
            label:"Revenue",
            backgroundColor:"rgba(2,117,216,1)",
            borderColor:"rgba(2,117,216,1)",
            data:[4215,5312,6251,7841,9821,14984]
          }]},
          options:{scales:{
            xAxes:
            [{time:{unit:"month"},
            gridLines:{display:!1},
            ticks:{maxTicksLimit:6}}
            ],
            yAxes:
            [{ticks:{min:0,max:15e3,maxTicksLimit:5},
            gridLines:{display:!0}}
            ]},legend:{display:!1}
          }}),
          ctx=document.getElementById("myPieChart"),
          myPieChart=new Chart(ctx,{type:"pie",
          data:{
            labels:["Blue","Red","Yellow","Green"],
            datasets:[{
              data:[12.21,15.58,11.25,8.32],
              backgroundColor:["#007bff","#dc3545","#ffc107","#28a745"]
            }]
          }});
</script>