<style>
	.user_info{
		margin-left: 10%;
		margin-top: 2%;
	}
	.user_info span{
		font-size: 15px;
	}
	#user_information{
	}
	#user_identity{
		background-color:mintcream/*honeydew*/;
		border-bottom: 15px solid mintcream;
	}
</style>
<div class="container-fluid">
  	<div class="row" id="user_identity">
  		<button type="button" class="btn btn-default btn-lg user_info" id="add_user">
  			<span class="fa fa-user-plus" aria-hidden="true"></span>
  			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ADD USER&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
		</button>
		<button type="button" class="btn btn-default btn-lg user_info" id="edit_user">
  			<span class="fa fa-user-md" aria-hidden="true"></span>
  			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;EDIT USER&nbsp;&nbsp;&nbsp;&nbsp;
		</button>
    <button type="button" class="btn btn-default btn-lg user_info" id="delete_user">
        <span class="fa fa-user-times" aria-hidden="true"></span>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DELETE USER&nbsp;&nbsp;&nbsp;&nbsp;
    </button>
  	</div>
  	<div class="row" id="user_information"></div>
  </div>
 <script>
 	$("#add_user").click(function () {
    var section = 'add-user';
    $.ajax({
      url: "functions/add_user_page.php",
      type: "post",
      async: false,
      data: {
          section : section,
      },
      success: function (data) {
        $("#user_information").html(data);
      }
      });
  });
 	$("#edit_user").click(function () {
    var section = 'edit-user';
    $.ajax({
      url: "functions/edit_user_page.php",
      type: "post",
      async: false,
      data: {
          section : section,
      },
      success: function (data) {
        $("#user_information").html(data);
      }
      });
  });
  $("#delete_user").click(function () {
    var section = 'delete-user';
    $.ajax({
      url: "functions/delete_user_page.php",
      type: "post",
      async: false,
      data: {
          section : section,
      },
      success: function (data) {
        $("#user_information").html(data);
      }
      });
  });
 </script>