<?php 
session_start();
include '../create_form/connect.php';
 if(!isset($_SESSION['admingcc_token'])) {
    header("location:../../session_end.html");
  }

 ?>
<!DOCTYPE html>
<html lang="en">


<?php include '../include/assets/head.php';
 include '../Classes/sql_query.php';
 ?>
<style type="text/css">
  @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap');

  * {
    font-family: 'Cairo', sans-serif;
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
            <a class="collapse-item" href="../Calendar/">Calendar</a>
            <a class="collapse-item active" href="../Announcement/">Announcement</a>
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


        <style type="text/css">
          {}

          #contentss::-webkit-scrollbar {
            width: 3px;

          }

          /* Track */
          #contentss::-webkit-scrollbar-track {
            background: #d7faed;
          }

          /* Handle */
          #contentss::-webkit-scrollbar-thumb {
            background: #298a67;
          }

          /* Handle on hover */
          #contentss::-webkit-scrollbar-thumb:hover {
            background: #30936f;
          }
        </style>




        <!-- Begin Page Content -->
        <div class="container-fluid">
          <span class="text-gray-800" style="font-weight: bold;" id="tryfound"></span>
          <div class="advancecontent_search row d-none" id="content_search" data-role="searchfor"> </div>

          <div class="051715" id="051715">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
              <h1 class="h3 mb-0 text-gray-800">Announcements</h1>
              <!--<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
            </div>

            <!--contents here-->
            <div class="row">
              <div class="container-fluid">

                <div class="card "
                  style="background-image: url('../img/undraw_Online_information_re_erks.png'); background-size: contain;background-repeat: no-repeat; background-position: right; border-right:5px solid #1cc88a;border-left:5px solid #1cc88a ">



                  <div class="card-body">
                    <blockquote class="blockquote mb-0">
                      <p class="text-gray-800" style="text-align: center;">Manage Announcements</p>

                    </blockquote>
                  </div>
                </div>

                <div class="row" style="margin-top: 10px;">

                  <div class="col-md-3">
                    <div class="card shadow mb-4">
                      <div class="card-header py-3">
                        <h6 style="font-size: 14px;" class="m-0 font-weight-bold text-primary">Manage</h6>
                      </div>
                      <div class="card-body">

                        <button class="btn btn-danger mb-2" data-toggle="modal" data-target="#addnew"
                          style="font-size: 12px;width: 100%;background-color: #ed6356"><i
                            class="far fa-plus-square"></i> Add</button>

                        <button class="btn btn-ligh text-danger edit" data-toggle="modal"
                          data-target="#uptstud_announcement" style="font-size: 12px;width: 100%;"><i
                            class="far fa-plus-square"></i> Edit Student Announcement</button>
                        <hr>


                        <img src="../img/undraw_To_do_re_jaef.png" class="img-fluid px-3 px-sm-4 mt-3 mb-4"
                          style="width: 50rem;">


                      </div>
                    </div>
                    <style type="text/css">

                    </style>
                  </div>
                  <div class="col-md-6">

                    <div class="card shadow mb-4" id="changecolor">
                      <div class="card-header py-3" id="cn">

                        <h6 style="font-size: 14px;" class="m-0 font-weight-bold text-primary" id="cn">Contents</h6>


                      </div>
                      <div class="card-body" id="contentss" style="height: 400px;overflow-y: scroll;">


                        <!--announcement contents-->




                        <!--end of announcement contents-->



                      </div>
                    </div>

                  </div>
                  <div class="col-md-3">
                    <div class="card shadow mb-4">

                      <div class="card-body">
                        <link rel="preconnect" href="https://fonts.googleapis.com">
                        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                        <link href="https://fonts.googleapis.com/css2?family=Caveat&display=swap" rel="stylesheet">
                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                          src="../img/undraw_ideas_flow_cy7b.png" alt="...">
                        <p style="font-family: 'Caveat', cursive;">❝ Just because you don't announce your plan doesn't
                          mean you don't have one ❞</p>
                        <footer class="blockquote-footer">Herb Kelleher <cite
                            title="Source Title">https://www.brainyquote.com/quotes/herb_kelleher_575193?src=t_announce</cite>
                        </footer>
                      </div>
                    </div>


                  </div>

                </div>

              </div>







            </div>

          </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->



      <div class="modal fade" id="uptstud_announcement" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">

            <form method="post" action="action.php">
              <div class="modal-body">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <br>
                <h6>Must know:</h6>
                <textarea rows="15" class="form-control" name="announce_content" style="resize: none;"><?php 

                                $sql = " SELECT * FROM `announcement` where stat = 1 ";
                            $result = mysqli_query($con,$sql);
                           
                          
                             while($row = mysqli_fetch_array($result)){
                                echo $row['content'];
                             }

                
         ?></textarea>


              </div>
              <div class="modal-footer">

                <button type="submit" class="btn btn-light text-primary" name="savestudent_announcement"
                  style="font-size:12px">Save changes</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <?php 
include '../Dashboard/notification.php';
 ?>



      <?php include 'assets.php' ?>

      <script src="../../offline/sweetalert.js"></script>
      <script src="../../js/jquery.js"></script>

      <?php 
    if(isset($_SESSION['save'])){
        ?>
      <script type="text/javascript">
        $(document).ready(function () {
          Swal.fire(
            'Updated Successfully!',
            'Must Know Student Module Updated!',
            'success'
          )

        });
      </script>
      <?php
        unset($_SESSION['save']);
    }

 ?>

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


      <script type="text/javascript" src="announcement.js"> </script>

      <!-- Footer -->
      <?php include '../include/assets/footer.php';

            if(isset($_GET['addannouncement'])){ 
                ?>
      <script type="text/javascript">
        $(document).ready(function () {
          $('#addnew').modal({
            backdrop: 'static',
            keyboard: true,
            show: true
          });
        });
      </script>
      <?php
                
            }

            ?>

      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->


  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <?php include '../Dashboard/logoutmodal.php';  ?>

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
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