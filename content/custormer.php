<style>
	.custormer_type{
		margin-left: 17%;
		margin-top: 2%;
	}
	.custormer_type span{
		font-size: 15px;
	}
	#custormer_information{
	}
	#custormer_identity{
		background-color:mintcream/*honeydew*/;
		border-bottom: 15px solid mintcream;
	}
</style>
<div class="container-fluid">
  	<div class="row" id="custormer_identity">
  		<button type="button" class="btn btn-default btn-lg custormer_type" id="add_new_custormer">
  			<span class="flaticon flaticon-car-in-service" aria-hidden="true"></span>
  			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NEW CUSTOMER&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
		</button>
		<!-- <button type="button" class="btn btn-default btn-lg custormer_type" id="existing_custormer">
  			<span class="flaticon flaticon-link" aria-hidden="true"></span>
  			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;EXISTING CUSTORMER&nbsp;&nbsp;&nbsp;&nbsp;
		</button> -->
  	</div>
  	<div class="row" id="custormer_information"></div>
  </div>
 <script>
 	$("#add_new_custormer").click(function () {
    var section = 'add_new_custormer';
    $.ajax({
      url: "content/new_custormer.php",
      type: "post",
      async: false,
      data: {
          section : section,
      },
      success: function (data) {
        $("#custormer_information").html(data);
      }
      });
      });
 	$("#existing_custormer").click(function () {
    var section = 'existing_custormer';
    $.ajax({
      url: "content/existing_custormer.php",
      type: "post",
      async: false,
      data: {
          section : section,
      },
      success: function (data) {
        $("#custormer_information").html(data);
      }
      });
      });
 </script>