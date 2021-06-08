
  $("#home").click(function () {
    var section = 'home';
    $.ajax({
      url: "controller.php",
      type: "post",
      async: false,
      data: {
          section : section,
      },
      success: function (data) {
        $("#dataContent").html(data);
      }
    });
  });
  function home_page(){
    var section = 'home';
    $.ajax({
      url: "controller.php",
      type: "post",
      async: false,
      data: {
          section : section,
      },
      success: function (data) {
        $("#dataContent").html(data);
      }
      });
  };
  $("#custormer").click(function () {
    var section = 'custormer';
    $.ajax({
      url: "controller.php",
      type: "post",
      async: false,
      data: {
          section : section,
      },
      success: function (data) {
        $("#dataContent").html(data);
      }
      });
  });
  $("#view_all_spare_parts").click(function () {
      var section = 'view_all_spare_parts';
      $.ajax({
        url: "controller.php",
        type: "post",
        async: false,
        data: {
          section : section,
        },
        success: function (data) {
          $("#dataContent").html(data);
        }
      });
      });
  $("#view_all_purchase").click(function () {
      var section = 'view_all_purchase';
      $.ajax({
        url: "controller.php",
        type: "post",
        async: false,
        data: {
          section : section,
        },
        success: function (data) {
          $("#dataContent").html(data);
        }
      });
      });
/*    $("#purchase_records").click(function () {
      var section = 'purchase_records';
      $.ajax({
        url: "controller.php",
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
   $("#add_spare_part").click(function () {
      var section = 'add_spare_part';
      $.ajax({
        url: "controller.php",
        type: "post",
        async: false,
        data: {
          section : section,
        },
        success: function (data) {
          $("#dataContent").html(data);
        }
      });
    });
   $("#purchase_spare").click(function () {
      var section = 'purchase_spare';
      $.ajax({
        url: "controller.php",
        type: "post",
        async: false,
        data: {
          section : section,
        },
        success: function (data) {
          $("#dataContent").html(data);
        }
      });
      });
   $("#add_worker").click(function () {
      var section = 'add_worker';
      $.ajax({
        url: "controller.php",
        type: "post",
        async: false,
        data: {
          section : section,
        },
        success: function (data) {
          $("#dataContent").html(data);
        }
      });
      });
   $("#view_worker_info").click(function () {
      var section = 'view_worker_info';
      $.ajax({
        url: "controller.php",
        type: "post",
        async: false,
        data: {
          section : section,
        },
        success: function (data) {
          $("#dataContent").html(data);
        }
      });
      });
   $("#view_all_transactions").click(function () {
      var section = 'view_all_transactions';
      $.ajax({
        url: "controller.php",
        type: "post",
        async: false,
        data: {
          section : section,
        },
        success: function (data) {
          $("#dataContent").html(data);
        }
      });
      });
     $("#personal_data").click(function () {
      var section = 'personal_data';
      $.ajax({
        url: "controller.php",
        type: "post",
        async: false,
        data: {
          section : section,
        },
        success: function (data) {
          $("#dataContent").html(data);
        }
      });
      });
   $("#statistics").click(function () {
      var section = 'statistics';
      $.ajax({
        url: "controller.php",
        type: "post",
        async: false,
        data: {
          section : section,
        },
        success: function (data) {
          $("#dataContent").html(data);
        }
      });
      });
  $("#appointment").click(function () {
      var section = 'appointment';
      $.ajax({
        url: "controller.php",
        type: "post",
        async: false,
        data: {
          section : section,
        },
        success: function (data) {
          $("#dataContent").html(data);
        }
      });
      });
  $("#reports").click(function () {
      var section = 'reports';
      $.ajax({
        url: "controller.php",
        type: "post",
        async: false,
        data: {
          section : section,
        },
        success: function (data) {
          $("#dataContent").html(data);
        }
      });
      });
      function trans_daily_report(){
      var section = 'TRNSACTION DAILY REPORT';
      $.ajax({
        url: "functions/transaction_daily_report.php",
        type: "post",
        async: false,
        data: {
          section : section,
        },
        success: function (data) {
          $("#modal_information").html(data);
        }
      });
      }  
      function trans_monthly_report(){
      var section = 'TRNSACTION MONTHLY REPORT';
      $.ajax({
        url: "functions/transaction_monthly_report.php",
        type: "post",
        async: false,
        data: {
          section : section,
        },
        success: function (data) {
          $("#modal_information").html(data);
        }
      }); 
      }  
      function transions_report(){
      var section = ' ALL TRNSACTION REPORT';
      $.ajax({
        url: "functions/all_transaction_report.php",
        type: "post",
        async: false,
        data: {
          section : section,
        },
        success: function (data) {
          $("#modal_information").html(data);
        }
      }); 

      }  
      function rep_fini_spare(){
      var section = ' REPORT FINISHED SPARE';
      $.ajax({
        url: "functions/report_finished_spare.php",
        type: "post",
        async: false,
        data: {
          section : section,
        },
        success: function (data) {
          $("#modal_information").html(data);
        }
      }); 
      }  
      function rep_available_spare(){
      var section = ' REPORT AVAILABLE SPARE';
      $.ajax({
        url: "functions/report_available_spare.php",
        type: "post",
        async: false,
        data: {
          section : section,
        },
        success: function (data) {
          $("#modal_information").html(data);
        }
      }); 
      }  
      function report_store(){
      var section = ' REPORT STORE';
      $.ajax({
        url: "functions/report_store.php",
        type: "post",
        async: false,
        data: {
          section : section,
        },
        success: function (data) {
          $("#modal_information").html(data);
        }
      }); 
      }  



















   function logout(){
    if (confirm("Do you really want to logout")==true) {
      section ="log-out";
      $.ajax({
        url: "ajax_task/ajax_log_out.php",
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
   }
  function user_info(){
      section ="user_info";
      $.ajax({
        url: "content/user_information.php",
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
   

  


    /*function for adding new sparepart function*/



  function insert_spare() {
    var spare_name = document.getElementById('spare_name').value;
        if (spare_name == '') {
            return false;
          }
    var spare_type = document.getElementById('spare_type').value;
        if (spare_type == '') {
            return false;
          }
    var spare_categorie = document.getElementById('spare_categorie').value;
    var spare_quantitie = document.getElementById('spare_quantitie').value;
        if (spare_quantitie == '') {
            return false;
          }
    var registration_date = document.getElementById('registration_date').value;
        if (registration_date == '') {
            return false;
          }
    var spare_minimum_price=document.getElementById('minimum_price_tobe_sold').value;
    // alert(spare_name+" "+spare_type+" "+spare_categorie);
    $.ajax({
      url: "functions/insert_spare.php",
      type: "post",
      async: false,
      data: {
        spare_name : spare_name,
        spare_type : spare_type,
        spare_categorie : spare_categorie,
        spare_quantitie : spare_quantitie,
        registration_date : registration_date,
        spare_minimum_price :spare_minimum_price,
      },
      success: function (data) {
        $("#dataContent").html(data);
      }
    });
  }

 






  /*function for adding new worker function*/

  function insert_worker(){
      var worker_name=document.getElementById('worker_name').value;
          if (worker_name == '') {
            return false;
          }
      var worker_phone_number=document.getElementById('worker_phone_no').value;
      var worker_proffesion=document.getElementById('worker_proffesion').value;
          if (worker_proffesion == '') {
            return false;
          }
      var worker_address=document.getElementById('worker_address').value;
      var worker_national_id=document.getElementById('worker_national_id').value;
      var worker_country=document.getElementById('worker_country').value;
          if (worker_country == '') {
            return false;
          }
      var worker_age=document.getElementById('worker_age').value;
          if (worker_age == '') {
            return false;
          }
      var worker_salary=document.getElementById('worker_salary').value;
      $.ajax({
        url:"functions/insert_worker.php",
        type: "post",
        async: false,
        data: {
          worker_name : worker_name,
          worker_phone_number : worker_phone_number,
          worker_proffesion : worker_proffesion,
          worker_address : worker_address,
          worker_country : worker_country,
          worker_national_id : worker_national_id,
          worker_age : worker_age,
          worker_salary : worker_salary,
        },
        success: function (data) {
          $("#dataContent").html(data);
        }
      });
  }



/*------------------------------------------*/

/*function pay_worker(id){
    var amount_you_want_to_pay=document.getElementById('amount_payed').value;
    var id=id;
    $.ajax({
        url:"functions/pay_worker.php",
        type: "post",
        async: false,
        data: {
          amount_you_want_to_pay : amount_you_want_to_pay,
          id :id,
        },
        success: function (data) {
          $("#dataContent").html(data);
        }
      });
  }*/
