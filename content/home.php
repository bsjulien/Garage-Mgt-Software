<?php  include('db-comm/database_connection.php'); ?>
<style>
.small-box {
  margin-top: 6%;
  border-radius: 2px;
  position: relative;
  display: block;
  margin-bottom: 20px;
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
}
.small-box > .inner {
  padding: 10px;
}
.small-box > .small-box-footer {
  position: relative;
  text-align: center;
  padding: 3px 0;
  color: #fff;
  color: rgba(255, 255, 255, 0.8);
  display: block;
  z-index: 10;
  background: rgba(0, 0, 0, 0.1);
  text-decoration: none;
}
.small-box > .small-box-footer:hover {
  color: #fff;
  background: rgba(0, 0, 0, 0.15);
}
.small-box h3 {
  font-size: 38px;
  font-weight: bold;
  margin: 0 0 10px 0;
  white-space: nowrap;
  padding: 0;
}
.small-box p {
  font-size: 15px;
  font-weight: 900;
  font-family: sans-serif;
}
.small-box p > small {
  display: block;
  color: #f9f9f9;
  font-size: 13px;
  margin-top: 5px;
}
.small-box h3,
.small-box p {
  z-index: 5px;
}
.small-box .icon {
  -webkit-transition: all 0.3s linear;
  -o-transition: all 0.3s linear;
  transition: all 0.3s linear;
  position: absolute;
  top: -10px;
  right: 10px;
  z-index: 0;
  font-size: 90px;
  color: rgba(0, 0, 0, 0.15);
}
.small-box:hover {
  text-decoration: none;
  color: #f9f9f9;
}
.small-box:hover .icon {
  font-size: 95px;
}
#more_info_section{
  padding-top: 25px;
  width: 97%;
  margin-left:1.5%;
  background-color:gainsboro;
}
.finished{
  float: right;
  margin-top: -59px;
  background: green;
  padding-left: 10px;
  padding-right: 10px;
  font-weight: bold;
}
@media (max-width: 767px) {
  .small-box {
    text-align: center;
  }
  .small-box .icon {
    display: none;
  }
  .small-box p {
    font-size: 12px;
  }
}

</style>
<div class="container-fluid" style="">
  	<div class="row">
    	<div class="col-lg-3 col-xs-6"  onclick="parts_in_stock()">
        	<div class="small-box btn-success">
            	<div class="inner">
                	<h3>
                  <?php 
                    $number_of_parts_in_stock=$connection->query("SELECT * FROM spair_parts");/*WHERE spare_part_quantitie>0*/
                    $number_of_finished_spare=$connection->query("SELECT * FROM spair_parts WHERE spare_part_quantitie='0'");
                    $finished_spare=mysqli_num_rows($number_of_finished_spare);
                    $parts_number=mysqli_num_rows($number_of_parts_in_stock);
                    echo $parts_number;
                  ?> 
                  </h3><span class="label label-info finished flaticon-phone-call"> <?php echo $finished_spare;?> </span>
                	<p>PARTS IN STOCK</p>
            	</div>
            	<div class="icon">
                	<i class="flaticon flaticon-car"></i>
            	</div>
            	<a href="#" class="small-box-footer" onclick="parts_in_stock()">More info <i class="glyphicon glyphicon-chevron-right"><!-- glyphicon glyphicon-arrow-down --></i></a>
        	</div>
        </div>
        <div class="col-lg-3 col-xs-6" onclick="custormers()">
            <div class="small-box btn-primary">
       	        <div class="inner">
        		    <h3>
                  <?php 
                    $number_of_custormers=$connection->query("SELECT * FROM custormer WHERE customer_name!=''");
                    $customer_number=mysqli_num_rows($number_of_custormers);
                    echo $customer_number;
                  ?>
                  <sup style="font-size: 20px"></sup></h3>
                	<p>CUSTORMERS</p>
                </div>
                <div class="icon">
                    <i class="flaticon flaticon-car-in-service"></i>
                </div>
                <a href="#" class="small-box-footer" onclick="custormers()">More info <i class="glyphicon glyphicon-chevron-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box btn-danger">
                <div class="inner">
                    <h3>5</h3>
                    <p>CARS IN STOCK</p>
                </div>
                <div class="icon">
                    <i class="flaticon flaticon-transport-6"></i>
                </div>
                <a href="#" class="small-box-footer" onclick="car_in_Stock()">More info <i class="glyphicon glyphicon-chevron-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6"  onclick="number_of_meachanics()">
            <div class="small-box btn-info" >
               	<div class="inner">
               		<h3>
                   <?php 
                    $number_of_workers=$connection->query("SELECT * FROM workers_information WHERE worker_name!='NONE'");
                    $worker_number=mysqli_num_rows($number_of_workers);
                    echo $worker_number;
                  ?> 
                  </h3>
               		<p>MECHANICS</p>
               	</div>
               	<div class="icon">
               		<i class="flaticon flaticon-tool-1"></i>
               	</div>
               	<a href="#" class="small-box-footer" onclick="number_of_meachanics()">More info <i class="glyphicon glyphicon-chevron-right"></i></a>
            </div>
        </div>
    </div>
</div>
<div id="more_info_section"></div>
<script>
  function parts_in_stock(){
    section="all_spare_in_Stock"
     $.ajax({
      url: "functions/all_parts_in_stock_for_home.php",
      type: "post",
      async: false,
      data: {
        section :section,
      },
      success: function (data) {
        $("#more_info_section").html(data);
      }
    });
  }
  function custormers(){
    section="all_custormers"
     $.ajax({
      url: "functions/all_custormers_for_home.php",
      type: "post",
      async: false,
      data: {
        section :section,
      },
      success: function (data) {
        $("#more_info_section").html(data);
      }
    });
  }
  function car_in_Stock(){}
  function number_of_meachanics(){
    $.ajax({
      url: "functions/all_mechanics_for_home.php",
      type: "post",
      async: false,
      data: {
        section :section,
      },
      success: function (data) {
        $("#more_info_section").html(data);
      }
    });
  }
</script>