<?php 
session_start();

 ?>
<!DOCTYPE html>
<html lang="en">


<?php include '../include/assets/head.php';?>
<script src="../../js/jquery.js"></script>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!--sidebar-->
    <ul class="navbar-nav  sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #313439">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <img src="../../GCC/img/gcc.png" style="width: 50px;transform: rotate(15deg);">
        </div>
        <div class="sidebar-brand-text mx-3">
          <?php 
                    echo $_SESSION['sidebar_banner1'];
                     ?>

          <!--<sup>2</sup>-->
        </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item  ">
        <a class="nav-link" href="../Dashboard/">
          <i class="fas fa-chart-pie"></i>
          <span>Statistic</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        <i class="fas fa-users-cog"></i> Manage Accounts
      </div>
      <li class="nav-item" id="gcc">
        <a class="nav-link" href="../accounts/">


          <span>Guidance Office</span></a>
      </li>
      <?php 
            if(isset($_GET['rdct'])){
                $rdct = $_GET['rdct'];

                ?>
      <script type="text/javascript">
        $(document).ready(function () {
          //  alert('<?php echo $rdct?>');


          $('#gcc').removeClass('active');
          $('#<?php echo $rdct?>').addClass('active');

        });
      </script>
      <?php
            }else {
                  ?>
      <script type="text/javascript">
        $(document).ready(function () {


          $('#gcc').addClass('active');


        });
      </script>
      <?php
            }

             ?>

      <li class="nav-item " id="Coordinators">
        <a class="nav-link" href="../accounts/?rdct=Coordinators">


          <span>Guidance Coordinator</span></a>
      </li>

      <li class="nav-item " id="Students">
        <a class="nav-link" href="../accounts/?rdct=Students">


          <span>Students</span></a>
      </li>


      <!-- Nav Item - Pages Collapse Menu -->

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->


      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>



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
              <h1 class="h3 mb-0 text-gray-800">Accounts</h1>
              <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
            </div>



            <!-- Content Row -->
            <div class="container">
              <div class="container">


                <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                      aria-controls="home" aria-selected="true">Guidance and Counceling Center</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                      aria-controls="profile" aria-selected="false">Guidance Coordinators</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" id="student-tab" data-toggle="tab" href="#students" role="tab"
                      aria-controls="students" aria-selected="false">Students</a>
                  </li>

                </ul>
              </div>

            </div>


            <div class="tab-content" id="myTabContent">

              <div class="tab-pane fade show active " id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="container-fluid" id="admingcccontent"></div>
              </div>
              <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="container-fluid" id="admingccontent"></div>

              </div>


              <div class="tab-pane fade" id="students" role="tabpanel" aria-labelledby="student-tab">
                <div class="container-fluid" id="adminstudentontent"></div>

              </div>







            </div>



            <!--------------------------------------------------------------TEMP---------------------------------------------------------------------------------------->

            <!-- Modal -->
            <div class="modal fade" id="addstud" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">

                  </div>
                  <div class="modal-body">
                    <div class="card">

                      <div class="card-header">
                        <form method="post" action="action.php">
                          lname
                          <input type="text" class="form-control" name="ln" required="">
                          fname
                          <input type="text" class="form-control" name="fn" required="">
                          mname
                          <input type="text" class="form-control" name="mn">
                          email
                          <input type="text" class="form-control" name="em" required="">
                          password
                          <input type="text" class="form-control" name="pass" required="">
                          course
                          <!-- <input type="text" class="form-control" name="crse" required=""> -->
                          <select class="form-control" name="crse">
                            <?php
                     include '../../GCC/create_form/connect.php'; 
                         $sqlt = " SELECT * FROM `course` ";
                                     $resultt = mysqli_query($con,$sqlt); // run query
                                     $countt= mysqli_num_rows($resultt); // to count if necessary
                                    //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
                                  if ($countt>=1){
                                    //while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                                      while($row = mysqli_fetch_array($resultt)){
                                    ?>
                            <option value="<?php echo $row['course'] ?>"><?php echo $row['course'] ?></option>
                            <?php
                                      }
                               }

                      ?>
                          </select>


                          <button class="btn btn-success form-control mt-2" type="submit" name="savestud">Save</button>
                        </form>

                      </div>

                      <div class="card-body">


                      </div>



                    </div>



                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" style="font-size:12px"
                      data-dismiss="modal">Close</button>

                  </div>
                </div>
              </div>
            </div>








            <!--------------------------------------------------------------TEMP---------------------------------------------------------------------------------------->




            <!-- /.container-fluid -->
          </div>


        </div>




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
            admingcccontent();
            $('#home-tab').click(function () {
              admingcccontent();
            })
            $('#profile-tab').click(function () {
              admingccontent();
            })


            function admingcccontent() {

              var xhttp = new XMLHttpRequest();
              xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                  const data = this.responseText;

                  $('#admingcccontent').html(data);

                }
              };
              xhttp.open("POST", "action.php", true);
              xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
              xhttp.send("admingcccontent=1");



            }
            admingccontent();

            function admingccontent() {

              var xhttp = new XMLHttpRequest();
              xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                  const data = this.responseText;

                  $('#admingccontent').html(data);

                }
              };
              xhttp.open("POST", "action.php", true);
              xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
              xhttp.send("admingccontent=1");



            }

            adminstudentcontent();

            function adminstudentcontent() {



              var xhttp = new XMLHttpRequest();
              xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                  const data = this.responseText;

                  $('#adminstudentontent').html(data);

                }
              };
              xhttp.open("POST", "action.php", true);
              xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
              xhttp.send("admistudentcontent=1");
            }





          });
        </script>


        <script type="text/javascript">
          $(document).ready(function () {
            $('.art').click(function () {
              $('#cont1').addClass('show');
              $('#cont1').addClass('active');
              $(this).addClass('active');
              $('#cont2').removeClass('show');
              $('#cont2').removeClass('active');
              $('.peer').removeClass('active');

            })
            $('.peer').click(function () {
              $('#cont1').removeClass('show');
              $('#cont1').removeClass('active');
              $('.art').removeClass('active');
              $('#cont2').addClass('show');
              $('#cont2').addClass('active');
              $(this).addClass('active');

            })
            //// Sidebar Funcitons



            ///////////////////////////////


          });
        </script>
        <!-- End of Main Content -->

        <!-- Footer -->
        <?php include '../include/assets/footer.php';?>
        <!-- End of Footer -->

      </div>
      <!-- End of Content Wrapper -->

    </div>

    <!-- Modal -->
    <div class="modal fade" id="viewcredentials" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

          <div class="modal-body">

            <div class="card shadow-sm" id="credentialkey">
              <div class="card-body">
                <h6>Enter password to access login credentials :</h6>
                <input type="password" name="" id="pk" class="form-control" style="font-size:12px">


              </div>

            </div>


            <div id="usercredentials" class="d-none">
              <h6>EMAIL : <span style="font-weight: bolder;font-style: italic;font-size: 25px;" id="useremail"
                  class="text-primary"></span>

                <br><br>

                PASSWORD : <span style="font-weight: bolder;font-style: italic;font-size: 25px" id="userpass"
                  class="text-danger"></span>
              </h6>

            </div>


            <hr>
            <button class="btn btn-light  text-secondary" style="font-size: 12px;float: right;" data-dismiss="modal">
              close</button>


          </div>

        </div>
      </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="editadmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h6>Updating Account</h6>
          </div>
          <form method="post" action="Manage.php" onsubmit="return false" id="editadminform">
            <input type="hidden" name="editadmin">


            <div class="modal-body">

              <div class="container">

                <h6 style="font-size: 12px">Enter Email</h6>
                <input type="email" name="adem1" id="em1" class="form-control ad1" style="font-size: 12px" required="">

                <br style="user-select: none">
                <div id="types">
                  <h6 style="font-size: 12px">Admin Type </h6>
                  <input type="text" id="selectchoice1" name="adty1" style="outline: none;border: none"
                    class="text-success">
                  <br style="user-select: none">
                </div>

                <div id="uptcolleges" class="d-none mb-2">
                  <h6 style="font-size: 12px">College </h6>
                  <select class="form-control" name="uptcol" style="font-size: 12px" id="colls">

                    <?php 
                            $col = " select * from colleges";
                                        $resultl = mysqli_query($con,$col); // run query
                                     
                                         while($row = mysqli_fetch_array($resultl)){
                                          ?>
                    <option value="<?php echo $row['CollegeId'] ?>"><?php echo $row['college'] ?></option>
                    <?php
                                         }
                                  

                         ?>

                  </select>
                </div>

                <h6 class="mt-2" style="font-size: 12px">Enter Last Name</h6>
                <input type="text" name="adln1" id="adln1" class="form-control ad1" style="font-size: 12px" required="">
                <h6 class="mt-2" style="font-size: 12px">Enter First Name</h6>
                <input type="text" name="adfn1" id="adfn1" class="form-control ad1" style="font-size: 12px" required="">
                <h6 class="mt-2" style="font-size: 12px">Enter Middle Name</h6>
                <input type="text" name="admn1" id="admn1" class="form-control ad1" style="font-size: 12px">
                <input type="hidden" id="adminid1" name="adid">

              </div>





            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" id="closemodaledit" style="font-size:12px"
                data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" style="font-size:12px">Save Changes</button>
            </div>

          </form>
        </div>
      </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="addadmingcc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h6>Add new Administrator</h6>
          </div>
          <form method="post" action="Manage.php" onsubmit="return false" id="addnewadmingcc">
            <input type="hidden" name="addnewadmin">


            <div class="modal-body">

              <div class="container">
                <h6 style="font-size: 12px">Admin Type : <span class=" badge bg-success text-light"
                    style="border-radius: 15px;font-size: 15px">GCC</span> </h6>
                <h6 style="font-size: 12px">Enter Email</h6>
                <input type="email" name="adem" class="form-control ad1" style="font-size: 12px" required="">



                <input type="hidden" name="adty" value="GCC">


                <h6 class="mt-2" style="font-size: 12px">Enter Last Name</h6>
                <input type="text" name="adln" class="form-control ad1" style="font-size: 12px" required="">
                <h6 class="mt-2" style="font-size: 12px">Enter First Name</h6>
                <input type="text" name="adfn" class="form-control ad1" style="font-size: 12px" required="">
                <h6 class="mt-2" style="font-size: 12px">Enter Middle Name</h6>
                <input type="text" name="admn" class="form-control ad1" style="font-size: 12px">


              </div>





            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" id="closemodaladd" style="font-size:12px"
                data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" style="font-size:12px"><i class="fas fa-plus-circle"></i>
                Add</button>
            </div>

          </form>
        </div>
      </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="addadmingc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h6>Add new GC Administrator</h6>
          </div>
          <form method="post" action="Manage.php" onsubmit="return false" id="addnewadmingc">
            <input type="hidden" name="addnewadmin">


            <div class="modal-body">

              <div class="container">
                <?php 

                  

                                           

                                     
                                  

                     ?>

                <div class="row">
                  <div class="col-md-6">
                    <h6 style="font-size: 12px">Enter Email</h6>
                    <input type="email" name="adem" class="form-control ad1" style="font-size: 12px" required="">
                  </div>
                  <div class="col-md-6">
                    <h6 style="font-size: 12px">College</h6>
                    <select class="form-control" style="font-size: 12px" name="coll">
                      <?php 



                        


                       $co = " select college, CollegeId from colleges where CollegeId NOT IN (select CollegeId from administrator where edstat = 0 and admin_type ='GC')";
                                        $result = mysqli_query($con,$co); // run query
                                     
                                         while($row = mysqli_fetch_array($result)){
                                            $col= $row['CollegeId'];
                                            $colllege = $row['college'];


                                              ?>
                      <option value="<?php echo $col ?>"><?php echo $colllege ?></option>
                      <?php

                                         
                                       
                                         }
                                  

                         ?>

                    </select>
                  </div>

                  <div class="col-md-4">
                    <h6 class="mt-2" style="font-size: 12px">Enter Last Name</h6>
                    <input type="text" name="adln" class="form-control ad1" style="font-size: 12px" required="">
                  </div>
                  <div class="col-md-4">
                    <h6 class="mt-2" style="font-size: 12px">Enter First Name</h6>
                    <input type="text" name="adfn" class="form-control ad1" style="font-size: 12px" required="">
                  </div>
                  <div class="col-md-4">
                    <h6 class="mt-2" style="font-size: 12px">Enter Middle Name</h6>
                    <input type="text" name="admn" class="form-control ad1" style="font-size: 12px">
                  </div>

                  <div class="col-md-6">
                    <h6 class="mt-2" style="font-size: 12px">Contact No</h6>

                    <input type="text" name="cn" class="form-control" maxlength="11" style="font-size:12px"
                      oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '/');" required>

                  </div>
                  <div class="col-md-6">

                    <h6 class="mt-2" style="font-size: 12px">Effective-Date</h6>
                    <input type="date" name="ed" class="form-control" style="font-size:12px" required>

                  </div>


                </div>



                <br style="user-select: none">


                <input type="hidden" name="adty" value="GC">








              </div>





            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" id="closemodaladd" style="font-size:12px"
                data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" style="font-size:12px"><i class="fas fa-plus-circle"></i>
                Add</button>
            </div>

          </form>
        </div>
      </div>
    </div>





    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->


    <?php 
include '../logoutmodal.php';
//include 'notification.php';
 ?>
    <script src="../../offline/sweetalert.js"></script>
    <script type="text/javascript">
      $(document).ready(function () {

        $('#pk').keyup(function () {
          var val = $(this).val();


          $.ajax({
            url: "action.php",
            method: "POST",
            data: {
              credentialkey: 1,
              val: val
            },
            success: function (data) {
              if (data.match("accessgranted")) {
                $('#credentialkey').addClass('d-none');
                $('#usercredentials').removeClass('d-none');
              } else if (data.match("accessdenied")) {

              }
            }
          })


        })

        $('#viewcredentials').on('hidden.bs.modal', function (e) {
          $('#credentialkey').removeClass('d-none');
          $('#usercredentials').addClass('d-none');
          $('#pk').val('');
        })
        $('#addnewadmingcc').on('submit', function (event) {
          event.preventDefault();

          var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
              const data = this.responseText;
              $('#addadmingcc').modal('hide');
              $('#home-tab').click();
              Swal.fire(
                'New Admin Saved!',
                'A new Administrator has saved successfully!',
                'success'
              ).then((result) => {
                if (result.isConfirmed) {

                  admingcccontent();


                }
              })



              var xhttp = new XMLHttpRequest();
              xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                  const datas = this.responseText;

                  // SENDING CREDENTIALS

                }
              };
              xhttp.open("POST", "../../mailer/send_credentials.php", true);
              xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
              xhttp.send("sendcredentials=1&email=" + data);





            }
          };
          xhttp.open("POST", $(this).attr('action'), true);
          xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          xhttp.send($(this).serialize());



        });

        $('#addnewadmingc').on('submit', function (event) {
          event.preventDefault();

          var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
              const data = this.responseText;
              $('#addadmingc').modal('hide');
              $('#profile-tab').click();


              Swal.fire(
                'New Admin Saved!',
                'A new Administrator has saved successfully!',
                'success'
              ).then((result) => {
                if (result.isConfirmed) {




                }
              })


              var xhttp = new XMLHttpRequest();
              xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                  const datas = this.responseText;

                  //  // SENDING CREDENTIALS

                }
              };
              xhttp.open("POST", "../../mailer/send_credentials.php", true);
              xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
              xhttp.send("sendcredentials=1&email=" + data);

            }
          };
          xhttp.open("POST", $(this).attr('action'), true);
          xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          xhttp.send($(this).serialize());



        });

        $('#addadmingcc').on('hidden.bs.modal', function (e) {
          $('.ad1').val('');
        })
        $('#addadmingc').on('hidden.bs.modal', function (e) {
          $('.ad1').val('');
        })



        $('#editadminform').on('submit', function (event) {
          event.preventDefault();
          $('#editadmin').modal('hide');

          var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
              const data = this.responseText;

              Swal.fire(
                ' Admin Updated!',
                ' Administrator data has been modified successfully!',
                'success'
              ).then((result) => {
                if (result.isConfirmed) {


                }
              })

              var sct = $('#selectchoice1').val();
              if (sct == 'GCC') {
                $('#home-tab').click();
              } else {
                $('#profile-tab').click();
              }


            }
          };
          xhttp.open("POST", $(this).attr('action'), true);
          xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          xhttp.send($(this).serialize());




        });
      });
    </script>


    <!-- Bootstrap core JavaScript-->
    <script src="../../GCC/vendor/jquery/jquery.min.js"></script>
    <script src="../../GCC/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../GCC/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../GCC/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../../GCC/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../../GCC/js/demo/chart-area-demo.js"></script>
    <script src="../../GCC/js/demo/chart-pie-demo.js"></script>

</body>

</html>