<?php
session_start();
//include('db-comm/database_connection.php');
//include('db-comm/functions.php');
//insert_spare_part();
  if (!isset($_SESSION['UserName'])) {
    ?>
        <script type="text/javascript">
            document.location.href = 'login.php';
        </script>
<?php 
  }
  else{
    $Title=$_SESSION['title'];
    $UserName=$_SESSION['UserName'];
    $display='';
    if ($Title == 'MANAGER') {
      $display='none';
    }
  }
?> 
<!DOCTYPE html>
<html>
<head>
  <title>DIGITAL AUTOMOBILE</title>
        <link rel="shortcut icon" type="image/x-icon" href="img/Shortcut_icons/1.png">
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-theme.css">
        <link rel="stylesheet" type="text/css" href="assets/css/flaticon.css">
        <link rel="stylesheet" type="text/css" href="assets/font-awesome/font-awesome-4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="assets/font-awesome/fontawesome-webfont78ce.svg">
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">
        <link rel="stylesheet" type="text/css" href="assets/css/w3.css">
        <link rel="stylesheet" type="text/css" href="assets/chart/morris.css">
        <link rel="stylesheet" type="text/css" href="assets/select/css/bootstrap-select.css">
        <link rel="stylesheet" type="text/css" href="assets/select/css/bootstrap-select.min.css">
        <!--<link rel="stylesheet" type="text/css" href="assets/font-awesome/fontawesome-webfont78ce.svg">
        <link rel="stylesheet" type="text/css" href="assets/fonts/flaticon.svg">
        <link rel="stylesheet" type="text/css" href="assets/fonts/lato-black-webfont.svg">
        <link rel="stylesheet" type="text/css" href="assets/fonts/glyphicons-halflings-regular.svg">-->
        <!-- <style>
        #myBtn {
          display: none; /* Hidden by default */
          position: fixed; /* Fixed/sticky position */
          bottom: 20px; /* Place the button at the bottom of the page */
          right: 30px; /* Place the button 30px from the right */
          z-index: 99; /* Make sure it does not overlap */
          border: none; /* Remove borders */
          outline: none; /* Remove outline */
          background-color: red; /* Set a background color */
          color: white; /* Text color */
          cursor: pointer; /* Add a mouse pointer on hover */
          padding: 15px; /* Some padding */
          border-radius: 10px; /* Rounded corners */
          font-size: 18px; /* Increase font size */
        }
        #myBtn:hover {
          background-color: #555; /* Add a dark-grey background on hover */
        }
        </style> -->
       
</head></head>
<body onload="home_page()">
  <div class="container-fluid">
      <div class="row content">
          <div class="col-sm-3 sidenav">
              <div class="sidenav-head">
                <h4 style="font-size: 18px;">GARAGE <span style="font-size: 27px">DIGITAL</span> MANAGMENT <span style="margin-left: 0%;">SYSTEM</span></h4>
              </div>  
              <ul class="nav nav-stacked">
                  <li class="active"  id="home"><a href="#">HOME</a></li>
                  <li><a id="custormer" href="#"><span class="fa fa-cc-discover"></span>  CUSTORMER</a></li>
                  <li class="dropdown">
                      <a class="dropdown-toggle" data-toggle="dropdown" href=""><span class="flaticon flaticon-piston"></span>  PRODUCTS<span class="caret"></span></a>
                      <ul class="dropdown-menu">
                          <li id="add_spare_part"><a><span class="flaticon-gear"></span>  ADD SPARE PARTS</a></li>
                          <li id="purchase_spare"><a><span class="flaticon-tool"></span>  PURCHASED SPARE</a></li>
                          <li id="view_all_spare_parts" ><a><span class="flaticon-eye"></span>  VIEW ALL SPARE PARTS</a></li>
                          <li id="view_all_purchase" ><a><span class="flaticon-eye"></span>  VIEW ALL PURCHASE</a></li>
                          <!-- 
                          <li id="purchase_records" ><a><span class="fa fa-envelope-open-o"></span> PRODUCT PURCHASED</a></li> -->
                      </ul>  
                  </li>
                  <?php if ($Title == 'BOSS') { ?>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href=""><span class="glyphicon glyphicon-user"></span>  WORKERS<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li id="add_worker">
                                <a>
                                  <span class="glyphicon glyphicon-user"></span>
                                  <span class="glyphicon glyphicon-plus-sign" style="font-size: 10px"></span> ADD WORKERS
                                </a>
                            </li>
                            <li id="view_worker_info">
                                <a>
                                    <span class="glyphicon glyphicon-user"></span>
                                    <span class="glyphicon glyphicon-eye-open" style="font-size: 10px"></span> VIEW ALL WORKERS
                                </a>
                            </li>
                        </ul>
                    </li>
                  <?php } ?>
                  <li class="dropdown">
                      <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-list-alt"></span> TRANSACTIONS<span class="caret"></span></a>
                      <ul class="dropdown-menu">
                          <li id="personal_data">
                              <a>
                                <span class="fa fa-tree"></span> PERSONAL
                              </a>
                          </li>
                          <li id="view_all_transactions">
                              <a>
                                <span class="glyphicon glyphicon-ok-circle"></span> ALL TRANSACTIONS
                              </a>
                          </li>
                          <!-- <li>
                              <a>
                                <span class="glyphicon glyphicon-tasks"></span> IN_PROCESS
                              </a>
                          </li> --> 
                      </ul>  
                  </li>

                   <li id="statistics"><a href="#"><span class="glyphicon glyphicon-stats"></span> STATISTICS</a></li>
                   <li id="appointment"><a href="#"><span class="fa fa-ambulance"></span> APPOINTMENT</a></li>
                   <li data-toggle="modal" data-target="#myModal">
                      <a href="#"><span class="fa fa-files-o"></span> REPORTS</span></a>
          
                  </li>
                   <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog modal-md">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title"><B>REQUEST FOR ANY REPORT</B></h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-4">
                                  <div class="btn-group">
                                     <button type="button" class="btn btn-primary dropdown-toggle h_link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                        <i class="fa fa-th-list"></i> Transaction Reports <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li onclick="trans_daily_report()">&nbsp;&nbsp;&nbsp;<i class="fa fa-thumbs-up"></i> Daily </li>
                                        <li role="separator" class="divider"></li> 
                                        <li onclick="trans_monthly_report()">&nbsp;&nbsp;&nbsp;<i class="fa fa-calendar"></i> Monthly </li>
                                        <!-- <li role="separator" class="divider"></li>
                                        <li onclick="trans_monthly_report()">&nbsp;&nbsp;&nbsp;<i class="fa fa-thumbs-up"></i> Monthly </li>
                                        <li role="separator" class="divider"></li>
                                        <li onclick="transions_report()">&nbsp;&nbsp;&nbsp;<i class="fa fa-th-list"></i> All Transactions </li> -->
                                    </ul>
                                </div>
                                </div>
                                <div class="col-sm-4"></div>
                                <div class="col-sm-4">
                                  <div class="btn-group">
                                       <button type="button" class="btn btn-primary dropdown-toggle h_link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                          <i class="fa fa-th-list"></i> Spare Reports <span class="caret"></span>
                                      </button>
                                      <ul class="dropdown-menu">
                                        <li onclick="rep_fini_spare()">&nbsp;&nbsp;&nbsp;<i class="fa fa-thumbs-down"></i> Finished </li>
                                        <li role="separator" class="divider"></li>                              
                                        <li onclick="rep_available_spare()">&nbsp;&nbsp;&nbsp;<i class="fa fa-car"></i> Spare in store</li>
                                        <li role="separator" class="divider"></li>
                                        <li onclick="report_store()">&nbsp;&nbsp;&nbsp;<i class="fa fa-th-list"></i> Purchasing Report  </li>
                                    </ul>
                                  </div>
                                </div>
                            </div>
                        </div>
                        <div id="modal_information">
                          
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
                   <!-- <li id="reports"><a href="#"><span class="fa fa-files-o"></span> REPORT</a></li> -->
                   <!-- <li id="communication"><a href="#"><span class="fa fa-send-o "></span> COMMUNICATION</a></li> -->
              </ul>
          </div>
          <div class="col-sm-9">
                <div class="content-head">
                     <div class="language" style="font-size: 15px;"><!-- IKINYARWANDA --><?php echo $Title." ".$UserName ?></div>
                     <div class="dropdown">
                        <img class="img-responsive img-circle dropdown-toggle" data-toggle="dropdown" src="img/avatar5.png" alt="USER">
                        <ul class="dropdown-menu">
                            <li onclick="user_info()" style="display:<?php echo $display; ?>"><a>USER</a></li>
                            <li><a href="#" style="display:<?php echo $display; ?>">PERSONAL</a></li>
                            <li onclick="logout()"><a>LOG OUT</a></li>
                        </ul>
                      </div>
                </div>
                <div class="data-content " id="dataContent">
                  <!-- <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button> Animated-Loading-×-1.gif-->
                  <!-- style="background-image:url(loaders/ounq1mw5kdxy.gif);background-size: 9n00px;" -->
                </div>
          </div>
      </div>
  </div>
  <footer></footer>
  <section class="links"> 
  <script src="assets/js/jquery-3.1.1.js"></script>
  <script src="assets/js/jquery-3.3.1.min.js"></script>
  <!--
    <script src="assets/select/livefilter.min.js"></script>
  <script src="assets/select/tabcomplete.js"></script>
  <script src="assets/select/tabcomplete.min.js"></script> 
  <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.2/raphael-min.js"></script> -->
  <script src="assets/chart/morris.min.js"></script>
  <script src="assets/chart/morris.js"></script><!-- 
  <script src="http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.min.js"></script>
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.min.css"> -->
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/gmap.min.js"></script>
  <script src="assets/js/jquery.easing.min.js"></script>
  <script src="assets/js/jquery.masonry.min.js"></script>
  <script src="assets/js/jquery.nicescroll.min.js"></script>
  <script src="assets/js/javascript.js"></script>
  <script src="assets/js/check.js"></script>
  <script src="assets/js/all_javascript.js"></script>
  <script type="text/javascript">
      
  </script>
  <!-- <script>
    window.onscroll = function() {
      scrollFunction()
    };
    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            document.getElementById("myBtn").style.display = "block";
        } else {
            document.getElementById("myBtn").style.display = "none";
        }
    }// When the user clicks on the button, scroll to the top of the document
    function topFunction() {
      document.body.scrollTop = 0; // For Safari
      document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
    }
  </script> -->
  </section>
  </body>
</html>