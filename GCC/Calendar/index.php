<?php 

session_start();
 if(!isset($_SESSION['admingcc_token'])) {
    header("location:../../session_end.html");
  }

 
		include '../create_form/connect.php';
 ?>
<!DOCTYPE html>
<html lang="en">


<?php include '../include/assets/head.php';?>
<script src="https://kit.fontawesome.com/129b086bc9.js" crossorigin="anonymous"></script>

<link rel="stylesheet" href="../include/fullcalendar/main.css">


<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i"
  rel="stylesheet">

<style>
  @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap');

  * {
    font-family: 'Cairo', sans-serif;
  }



  #calendar {
    /* 		float: right; */
    margin: 0 auto;
    width: 100%;


    background-color: #FFFFFF;
    border-radius: 6px;
    box-shadow: 0 1px 2px #C3C3C3;
    -webkit-box-shadow: 0px 0px 21px 2px rgba(0, 0, 0, 0.18);
    -moz-box-shadow: 0px 0px 21px 2px rgba(0, 0, 0, 0.18);
    box-shadow: 0px 0px 21px 2px rgba(0, 0, 0, 0.18);
  }
</style>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!--sidebar-->


    <ul class="navbar-nav  sidebar sidebar-dark accordion" id="accordionSidebar"
      style="background-color: <?php echo $_SESSION['sidebar_color'] ?>">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
          <img src="../img/gcc.png" style="width: 50px;transform: rotate(15deg);">
        </div>
        <div class="sidebar-brand-text mx-3">
          <?php 
                    echo $_SESSION['sidebar_banner'];
                     ?>

          <!--<sup>2</sup>-->
        </div>
      </a>
      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item ">
        <a class="nav-link" href="../Dashboard/">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>

      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Components
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="../Records/">
          <i class="fas fa-clipboard-list"></i>
          <span>Records</span></a>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
          aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-brush"></i>
          <span>Manage Contents</span>
        </a>
        <div id="collapseUtilities" class="collapse show" aria-labelledby="headingUtilities"
          data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Contents:</h6>
            <a class="collapse-item" href="../Homepage/">Homepage</a>
            <a class="collapse-item " href="../Pages/">Pages</a>
            <a class="collapse-item active" href="../Calendar/">Calendar</a>
            <a class="collapse-item" href="../Announcement/">Announcement</a>
            <a class="collapse-item" href="../Newsfeed">News Feed</a>


          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Apps
      </div>



      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="../Forms/">
          <i class="fas fa-align-justify"></i>
          <span>Form</span></a>
      </li>


      <li class="nav-item">
        <a class="nav-link" href="../Services/">
          <i class="fas fa-cogs"></i>
          <span>Services</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

      <!-- Sidebar Message 
            <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
                <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
                <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
            </div>-->

    </ul>

    <!--end of sidebar-->


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!--topbar-->
        <?php include '../include/assets/topbar.php';?>
        <!--end of topbar-->





        <!-- Begin Page Content -->
        <div class="container-fluid">
          <span class="text-gray-800" style="font-weight: bold;" id="tryfound"></span>
          <div class="advancecontent_search row d-none" id="content_search" data-role="searchfor"> </div>

          <div class="051715" id="051715">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
              <h1 class="h3 mb-0 text-gray-800">Calendar</h1>
              <!--<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
            </div>

            <!--contents here-->
            <div class="row">
              <div class="container-fluid">



                <style type="text/css">
                  .external-event {
                    padding: 3px;
                    text-align: center;
                    border-radius: 5px;
                    color: white;
                    margin: 5px;
                    width: 100%;
                    font-size: 14px;

                  }

                  #external-events {
                    width: 100%;
                  }

                  #todaysevent {
                    overflow-y: scroll;
                    height: 180px;
                  }

                  #todaysevent::-webkit-scrollbar {
                    width: 4px;
                  }

                  /* Track */
                  #todaysevent::-webkit-scrollbar-track {
                    background: #f1f1f1;
                  }

                  /* Handle */
                  #todaysevent::-webkit-scrollbar-thumb {
                    background: #bababd;
                  }

                  /* Handle on hover */
                  #todaysevent::-webkit-scrollbar-thumb:hover {
                    background: #555;
                  }
                </style>




                <!-- Main content -->
                <section class="content">
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col-md-3">
                        <div class="sticky-top mb-3">
                          <div class="card shadow mb-3">
                            <div class="card-header">
                              <h6 class="card-title m-0 font-weight-bold text-primary"
                                style="text-align: center; user-select: none">Today's Event</h6>
                            </div>
                            <div class="card-body" id="todaysevent">









                              <?php 
                  	 date_default_timezone_set('Asia/Manila');
                  	 $datenow = date('Y-m-d');

                  	 			$lookfortodaysevent = " SELECT * FROM `events` where Date(start)='$datenow'  ";
                  	 	                $resultlook = mysqli_query($con,$lookfortodaysevent); // run query
                  	 	                $countev= mysqli_num_rows($resultlook); // to count if necessary
                  	 	               //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
                  	 	             if ($countev>=1){
                  	 	             	//while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                  	 	                 while($row = mysqli_fetch_array($resultlook)){
                  	 						?>
                              <div class="card shadow">
                                <div class="card-header" style="background-color: <?php echo $row['bgcolor'] ?>">

                                </div>
                                <div class="card-body" style="text-align: center;">
                                  <span
                                    style="font-size: 15px; font-weight: bolder;text-align: center;"><?php echo $row['title'] ?></span>
                                </div>
                              </div>
                              <p></p>
                              <?php
                  	 	                 }
                  	 	          }else {
                  	 	          	?>
                              <div style="text-align: center;">
                                <span style="margin-top: -10px;">None</span>
                                <img src="../img/undraw_No_data_re_kwbl.png" class="img-fluid px-3 px-sm-4 mt-3 mb-4"
                                  style="width: 50rem;">

                              </div>
                              <?php
                  	 	          }

                   ?>








                            </div>
                            <!-- /.card-body -->
                          </div>
                          <div class="card shadow mb-3">
                            <div class="card-header">
                              <button class="btn btn-danger" data-toggle="modal" data-target="#createevent"
                                style="font-size: 12px;width: 100%;background-color: #ed6356"><i
                                  class="far fa-plus-square"></i> Create Event</button>

                            </div>
                            <div class="card-body">
                              <!-- the events -->

                              <h6 class="card-title m-0 font-weight-bold text-primary" style="text-align: center;">
                                Draggable Events</h6>
                              <div id="external-events" style="font-size: 16px;">


                                <?php 
                    				$dragev = " SELECT * FROM `events` where status = 1  ";
                    		                $result = mysqli_query($con,$dragev); // run query
                    		                $count= mysqli_num_rows($result); // to count if necessary
                    		               //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
                    		             if ($count>=1){
                    		             	//while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                    		                 while($row = mysqli_fetch_array($result)){
                    		                 	$bgcolor= $row['bgcolor'];
                    							?>
                                <div class="external-event "
                                  style="background-color: <?php echo $bgcolor ?> ;padding: 5px; ">
                                  <?php echo $row['title'] ?></div>
                                <?php
                    		                 }
                    		          }else {
                    		          	
                    		          	?>


                                <img src="../img/undraw_No_data_re_kwbl.png" class="img-fluid px-3 px-sm-4 mt-3 mb-4"
                                  style="width: 50rem;">
                                <span style="font-size: 14px;text-align: center;">There haven't been any draggable
                                  events yet.</span>

                                <?php
                    		          }

                    	 ?>



                                <div class="checkbox">
                                  <label for="drop-remove">
                                    <input type="checkbox" id="drop-remove">
                                    <span style="font-size: 14px;"> remove after drop</span>
                                  </label>
                                </div>
                              </div>


                            </div>
                            <!-- /.card-body -->
                          </div>
                          <!-- /.card -->

                        </div>
                      </div>
                      <!-- /.col -->
                      <div class="col-md-9">
                        <div class="card card-primary">
                          <div class="card-body p-0">
                            <!-- THE CALENDAR -->
                            <div id="calendar"></div>
                          </div>
                          <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                  </div><!-- /.container-fluid -->
                </section>
                <!-- /.content -->
              </div>
              <!-- /.content-wrapper -->

              <?php 
include '../Dashboard/notification.php';
 ?>


              <!-- jQuery -->
              <script src="../include/jquery/jquery.min.js"></script>

              <!-- jQuery UI -->
              <script src="../include/jquery-ui/jquery-ui.min.js"></script>
              <!-- AdminLTE App -->

              <script src="../include/fullcalendar/main.js"></script>


              <?php include 'calendar.php' ?>


              <!--modals -->


              <style type="text/css">
                #color-chooser {
                  list-style: none;
                  display: flex;
                }

                #color-chooser li a i {

                  font-size: 40px;
                }
              </style>

              <?php include 'assets.php' ?>

            </div>
          </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php include '../include/assets/footer.php';?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script type="text/javascript">
    $(document).ready(function () {



      advancesearchcontent();
      $('.myinputsss').keyup(function () {


        var value = $(this).val().toLowerCase();


        var size = $(".advancecontent_search > .ele")
        .length; // The parentdiv plus the element containing the text or card
        var count = $('div.ele:hidden').length; // The child element or card


        $('#tryfound').text('Search Result For : ' + value);


        if (value == '') {
          $('.051715').removeClass('d-none');
          $('#tryfound').text('');
          $('.advancecontent_search').addClass('d-none');
        } else {
          $('.051715').addClass('d-none');
          $('.advancecontent_search').removeClass('d-none');

          $('div[data-role="searchfor"]').filter(function () {
            $(this).toggle($(this).find('h6').text().toLowerCase().indexOf(value) > -1)
          });





        }


      })

      $('#btnsearchclick').click(function () {


        if ($('#confirmcheck').prop("checked") == true) {
          $('#confirmcheck').prop('checked', false);
          $('.051715').removeClass('d-none');
          $('.advancecontent_search').addClass('d-none');
          $(this).find("i").toggleClass("far fa-times-circle");

        } else if ($('#confirmcheck').prop("checked") == false) {
          $('#confirmcheck').prop('checked', true);
          $('.051715').addClass('d-none');
          $('.advancecontent_search').removeClass('d-none')
          $(this).find("i").toggleClass("far fa-times-circle");

        }

        /* ;*/
      })

      function advancesearchcontent() {


        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
          if (this.readyState == 4 && this.status == 200) {
            const data = this.responseText;


            $('.advancecontent_search').html(data);

          }
        };
        xhttp.open("POST", "../Dashboard/advancesearch.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("searchfor=1");


      }



    });
  </script>



  <!-- Core plugin JavaScript-->

  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function () {
      if ($(window).width() <= 768) {
        $('#accordionSidebar').addClass('toggled');
      }

    });
  </script>

</body>

</html>