<style>
  #filtering_section{
    background-color: green;
  }
  input{
    width: 90%;
  }
  select{
    width: 90%;
  }
  .col-sm-4{
    padding-top: 10px;
    background-color: deepskyblue;
  }
  #car_selection{
    background-color: gainsboro;
    padding-top: 10px;
    padding-bottom: 1px;
  }
  #date_section{
    background-color: gainsboro;
    padding: 10px 0px 10px 30px;
    border-radius: 0px 0px 10px 0px;

  }
  #table{
    padding: 80px 30px 10px 30px;
    /*background-color: yellow;*/
  }
  table{
  }
  #table thead tr th{
    border-top: 8px solid deepskyblue;
    background:gainsboro;
    font-family: monospace;
    font-size: 20px;
    color: white;
    font-weight: 900;
    font-variant: small-caps;
    text-align: center;
  }
  #page_on_transaction{
    border-top: 8px solid deepskyblue;
    background:gainsboro;
    font-family: monospace;
    font-size: 20px;
    color: white;
    font-weight: 900;
    font-variant: small-caps;
    text-align: center;
  }
  #table tbody tr td{
    font-family: monospace;
  }
  #transaction_status{
    font-size: 10px;
    border-radius: 1px;
    padding: 5px;
    font-variant: small-caps;
    font-family: monospace;
  }
  #worker_span{
    width: auto;
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
  #edit{
    background-color: coral;
    padding: 1px 7px 1px 7px;
    border-radius: 2px;
    color: white;
    font-size: 12px;
    cursor: pointer;
  }
  #edit:hover{
    background-color: tomato;
  }
  #more{
    background-color: navy;
    padding: 1px 3px 1px 3px;
    border-radius: 2px;
    color: white; 
    font-size: 12px;
    cursor: pointer;
  }
  #more:hover{
    background-color: mediumblue;
  }
  #money{
    background-color: limegreen;
    padding: 1px 3px 1px 3px;
    border-radius: 2px;
    color: white;
    font-size: 12px;
    cursor: pointer;
  }
  #money:hover{
    background-color: yellowgreen;
  }
  .show_button{
    font-size: 15px;
    background: deepskyblue;
    padding: 2px 20px 2px 20px;
    border-radius: 5px;
    cursor: pointer;
  }
  #transaction_bill{
    background-color: #EE2050;
    padding: 3px 15px 3px 15px;
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
  }
  #outside_material{
    background-color: black;
    padding: 1px 10px 1px 10px;
    border-radius: 2px;
    color: white;
    font-size: 12px;
    cursor: pointer;
  }
  #outside_material:hover{
    background-color: darkgrey;
  }
  #problem_statement{
    background-color: sienna;
    color: white;
    font-size: 12px;
    padding: 1px 4px 1px 4px;
    border-radius: 2px;
    cursor: pointer;
  }
  #problem_statement:hover{
    background-color: brown
  }
@media only screen and (min-width : 150px) and (max-width : 730px){
  #dataContent{
      background-color: white;
  }
  #worker_span{
    font-size: 8px;
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
        <div class="col-sm-6" id="date_section">
            <input type="date" name="date" id="date" onchange="check();">
        </div>
        <div class="col-sm-6" id="car_selection">
            <div class="form-group" style="display: none;">
                <select class="form-control" id="sel1">
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                </select>
            </div>
        </div>
        <div id="table" class="rol-sm-6">
          <table class="table table-responsive table-bordered">
            <thead>
              <tr>
                  <!-- <th>ID</th> -->
                  <th>Name</th>
                  <th width="150">Custormer n<sup>o</sup></th>
                  <th width="100"><!-- <span class="flaticon flaticon-transport-6" style="color: red"></span>  -->plate n<sup>o</sup</th>
                  <th>worker</th>
                  <th>spare</th>
                  <th>status</th>
                  <th>bill</th>
                  <th>payment</th>
                  <th>tools</th>
              </tr>
            </thead>
            <tbody id="custormer_body_information">
            </tbody>
          </table>
          <div id="page_on_transaction">  </div>
        </div>

<script>
  function check(){
    selected_date=document.getElementById('date').value;
    $.ajax({
      url: "functions/custormer_according_to_date.php",
      type: "post",
      async: false,
      data: {
         selected_date:selected_date,
      },
      success: function (data) {
        $("#car_selection").html(data);
      }
    });
  }
  function specific_car_needed(){
      selected_plate_no=document.getElementById('selected_plate_number').value;
      date_in=document.getElementById('date').value;
      customer_id=document.getElementById('customer_id').value;
/*      alert(transanction_id+' '+date_in+' '+selected_plate_no);*/
      $.ajax({
      url: "functions/personal_transaction_information.php",
      type: "post",
      async: false,
      data: {
        selected_plate_no : selected_plate_no,
        date_in : date_in,
        customer_id : customer_id,
      },
      success: function (data) {
        $("#custormer_body_information").html(data);
      }
    });
  };
</script>