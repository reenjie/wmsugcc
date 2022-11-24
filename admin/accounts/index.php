<?php 
session_start();
if(!isset($_SESSION['superadminId'])){
    header('location:../../session_end.html');
}

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


      <li class="nav-item" id="Office">
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
          $('#titleaccount').text('<?php echo $rdct?> Accounts');

        });
      </script>
      <?php
            }else {
                  ?>
      <script type="text/javascript">
        $(document).ready(function () {


          $('#Office').addClass('active');
          $('#titleaccount').text('Office Accounts');

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
      <li class="nav-item" id="Others">
        <a class="nav-link" href="../accounts/?rdct=Others">


          <span>Others</span></a>
      </li>
      <hr class="sidebar-divider">
      <li class="nav-item">
        <a class="nav-link" href="../logs/">

          <i class="fas fa-clipboard-list"></i>
          <span>Logs</span></a>
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
              <h1 class="h3 mb-0 text-gray-800"><span id="titleaccount"></span></h1>
              <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
            </div>



            <!-- Content Row -->



            <?php 
                        if(isset($_GET['rdct'])){
                            $rdct = $_GET['rdct'];
                            if($rdct == 'Coordinators'){
                              
                                include 'coordinators.php';
                            }else
                            if($rdct == 'Others'){
                               include 'others.php';
                            }else if($rdct == 'Students'){
                               include 'students.php';
                            }

                            
                        }else {
                          

                             include 'office.php';
                             
                        }


                       ?>


            <!--------------------------------------------------------------TEMP---------------------------------------------------------------------------------------->

            <!-- Modal -->
            <div class="modal fade" id="addstud" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">

                  </div>
                  <div class="modal-body">






                    <form method="post" action="#" onsubmit="return false" id="register">
                      <input type="hidden" name="register">




                      <h6 style="font-size: 14px; text-align: center;font-weight: bolder;">Personal Information</h6>
                      <label style="font-size: 14px"><span style="font-weight: bolder;"
                          class="text-danger">*</span><span id="txttoe">Email</span></label>
                      <input type="text" id="emm" class="form-control" style="font-size: 14px" name="em" required="">
                      <div class="invalid-feedback">Email already in used.</div>

                      <div class="row">
                        <div class="col-md-5">

                          <label style="font-size: 14px" class="mt-2"><span style="font-weight: bolder;"
                              class="text-danger">*</span>Last Name</label>
                          <input type="text" class="form-control" style="font-size: 14px" name="ln" required="">
                        </div>
                        <div class="col-md-5">
                          <label style="font-size: 14px" class="mt-2"><span style="font-weight: bolder;"
                              class="text-danger">*</span>Given Name</label>
                          <input type="text" class="form-control" style="font-size: 14px" name="gn" required="">
                        </div>
                        <div class="col-md-2">
                          <label style="font-size: 14px" class="mt-2">M.I</label>
                          <input type="text" class="form-control" style="font-size: 14px;text-transform: uppercase;"
                            name="mi" maxlength="1">
                        </div>

                        <div class="col-md-4">
                          <label style="font-size: 14px" class="mt-2"><span style="font-weight: bolder;"
                              class="text-danger">*</span>Age</label>
                          <input type="text" class="form-control" style="font-size: 14px" name="age" required=""
                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                        </div>

                        <div class="col-md-4">
                          <label style="font-size: 14px" class="mt-2"><span style="font-weight: bolder;"
                              class="text-danger">*</span>Gender</label>
                          <select class="form-control" name="gender">
                            <option value="Male">MALE</option>
                            <option value="Female">FEMALE</option>
                          </select>
                        </div>
                        <div class="col-md-4">
                          <label style="font-size: 14px" class="mt-2"><span style="font-weight: bolder;"
                              class="text-danger">*</span>Status</label>
                          <select class="form-control" name="status">
                            <option value="single">Single</option>
                            <option value="married">Married</option>
                            <option value="widdowed">Widdowed</option>
                          </select>
                        </div>

                        <div class="col-md-12">
                          <label style="font-size: 14px" class="mt-2">Contact No</label>
                          <input type="text" class="form-control" style="font-size: 14px" name="cno" required=""
                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                            maxlength="11">
                        </div>






                        <div class="col-md-12">


                          <label style="font-size: 14px" class="mt-2"><span style="font-weight: bolder;"
                              class="text-danger">*</span>Address</label>
                          <div class="row">
                            <div class="col-md-5">
                              <input type="text" name="st" id="st" class="form-control mb-2" style="font-size:14px"
                                placeholder="Street">
                            </div>
                            <div class="col-md-7">
                              <input type="text" name="br" id="br" class="form-control mb-2" style="font-size:14px"
                                placeholder="Barangay" required>
                            </div>
                            <div class="col-md-6">
                              <input type="text" name="cty" id="cty" class="form-control mb-2" style="font-size:14px"
                                placeholder="City" required>
                            </div>
                            <div class="col-md-6">
                              <input type="text" name="zc" id="zc" class="form-control mb-2" style="font-size:14px"
                                placeholder="Zipcode" required>

                            </div>
                            <div class="col-md-12">
                              <input type="text" name="ct" id="ct" class="form-control mb-3" style="font-size:14px"
                                placeholder="Country" value="Philippines" required>
                            </div>

                          </div>
                        </div>
                        <div class="col-md-12">

                          <label style="font-size: 14px" class="mt-2"><span style="font-weight: bolder;"
                              class="text-danger">*</span> <span id="txtee">Select Course</span></label>
                          <select class="form-control" id="sec" name="course"
                            style="font-size: 14px;text-align: center;">
                            <option value="noselection">Select</option>
                            <?php 
                                                            $sqlcc = " SELECT * FROM `course`  ";
                                                $resultcc = mysqli_query($con,$sqlcc); // run query
                                                $countcc= mysqli_num_rows($resultcc); // to count if necessary
                                               //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
                                             if ($countcc>=1){
                                                //while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                                                 while($row = mysqli_fetch_array($resultcc)){
                                                    $crse = $row['course'];
                                                    ?>
                            <option value="<?php echo $row['courseid'] ?>"><?php echo $crse ?></option>
                            <?php

                                    
                                
                                                 }
                                          }


                                             ?>

                          </select>



                        </div>



                      </div>


                      <button type="submit" class="form-control btn btn-success mt-2 mb-2" id="registerbtn"
                        style="font-size:12px"> Register</button>
                      <button type="button" class="btn btn-secondary form-control" style="font-size:12px"
                        data-dismiss="modal">Close</button>










                    </form>

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

            $('#emm').focusout(function () {
              var val = $(this).val();
              if (val == '') {

              } else {
                $.ajax({
                  url: "validate.php",
                  method: "POST",
                  data: {
                    checkemail_stud: 1,
                    val: val
                  },
                  success: function (data) {
                    if (data == "exist") {
                      $('#emm').addClass('is-invalid');
                      $('#regbtn').attr('disabled', true);
                      $('.invalid-feedback').removeClass('d-none');
                      $('#txttoe').text('').addClass('text-danger');
                      $('.invalid-feedback').html('Email already in used.');
                      $('#registerbtn').attr('disabled', true);


                    } else if (data == "add") {
                      $('#emm').removeClass('is-invalid');
                      $('#regbtn').removeAttr('disabled');
                      $('#registerbtn').removeAttr('disabled');

                    } else if (data == "notwmsu") {
                      $('#emm').addClass('is-invalid');
                      $('.invalid-feedback').html('Use Organization Email only.');
                      $('#registerbtn').attr('disabled', true);

                    } else {
                      alert(data);
                    }
                  }
                })


              }



            })

            $('#register').on('submit', function (event) {
              event.preventDefault();

              var emval = $('#emm').val();


              $('#registerbtn').attr('disabled', true);
              $('#registerbtn').html('Submitting <i class="fas fa-spinner fa-pulse"></i>');


              $.ajax({
                url: "action.php",
                method: "POST",
                data: $(this).serialize(),
                success: function (data) {



                  if (data == "nocourse") {
                    $('#sec').css('border', '1px solid red');
                    $('#txtee').text('Please Select a Course').addClass('text-danger');
                  } else if (data == "notwmsu") {
                    $('#emm').addClass('is-invalid');
                    $('#txttoe').text('Please provide organization Email like , *********@wmsu.edu.ph')
                      .addClass('text-danger');
                  } else if (data == "wmsu") {





                    $.ajax({
                      url: "../../mailer/send_studentcr.php",
                      method: "POST",
                      data: {
                        sendcredentials: 1,
                        email: emval
                      },
                      success: function (data) {


                        Swal.fire(

                          'Registered Successfully!',

                          'Login credentials was sent to ' + emval + ' via Email.',

                          'success',

                        ).then((result) => {
                          if (result.isConfirmed) {
                            //window.location.href='index.php';
                            location.reload();
                          }
                        })
                      }
                    })










                  } else if (data == "exist") {
                    $('#emm').addClass('is-invalid');
                    $('#txttoe').text('The email already in used.').addClass('text-danger');
                  }


                }
              })
            });


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

                <?php 
                     if(isset($office)){
                       ?>
                <h6 style="font-size: 12px">Position</h6>
                <input type="text" name="adpos1" id="pos1" class="form-control ad1 mb-2" style="font-size: 12px"
                  required="">
                <?php
                     }
                      ?>

                <h6 style="font-size: 12px">Enter Email</h6>
                <input type="email" name="adem1" id="em1" class="form-control ad1" style="font-size: 12px" required="">
                <div class="invalid-feedback">Email already in used.</div>


                <input type="hidden" name="" id="emdup">
                <br style="user-select: none">
                <div id="types">
                  <h6 style="font-size: 12px">Admin Type </h6>
                  <input type="text" id="selectchoice1" name="adty1" style="outline: none;border: none"
                    class="text-success">
                  <br style="user-select: none">
                </div>



                <div id="uptcolleges" class="d-none mb-2">
                  <?php 
                    if(isset($office)){

                    }else {
                        ?>
                  <h6 class="mt-2" style="font-size: 12px">Effective-Date </h6>
                  <input type="date" name="addate" id="addate" class="form-control mb-2" style="font-size: 12px"
                    required="">

                  <h6 style="font-size: 12px">College </h6>
                  <select class="form-control" name="uptcol" style="font-size: 12px">

                    <option id="colls">Change College</option>


                    <?php 
                            $col = " select * from colleges where CollegeId not in (SELECT CollegeId FROM `administrator` where admin_type ='GC' and edstat = 0 )";
                                        $resultl = mysqli_query($con,$col); // run query
                                     
                                         while($row = mysqli_fetch_array($resultl)){
                                          ?>
                    <option value="<?php echo $row['CollegeId'] ?>"><?php echo $row['college'] ?></option>
                    <?php
                                         }
                                  

                         ?>

                  </select>

                  <?php
                    }

                     ?>




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
              <button type="submit" class="btn btn-primary" id="saveuptbtn" style="font-size:12px">Save Changes</button>
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
                <!--<h6 style="font-size: 12px">Admin Type : <span class=" badge bg-success text-light" style="border-radius: 15px;font-size: 15px">GCC</span> </h6> -->
                <h6 style="font-size: 12px">Enter Position</h6>
                <input type="text" name="adpos" class="form-control ad1 mb-2" id="" style="font-size: 12px" required="">

                <h6 style="font-size: 12px">Enter Email</h6>
                <input type="email" name="adem" class="form-control ad1" id="gccemail" style="font-size: 12px"
                  required="">
                <div class="invalid-feedback">Email already in used.</div>



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
              <button type="submit" class="btn btn-primary" id="gccadd" disabled style="font-size:12px"><i
                  class="fas fa-plus-circle"></i> Add</button>
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
                    <input type="email" name="adem" class="form-control ad1" id="gcemail" style="font-size: 12px"
                      required="">
                    <div class="invalid-feedback">Email already in used.</div>
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

                    <input type="text" name="cn" class="form-control ad1" maxlength="11" style="font-size:12px"
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
              <button type="submit" class="btn btn-primary" id="gcadd" disabled style="font-size:12px"><i
                  class="fas fa-plus-circle"></i> Add</button>
            </div>

          </form>
        </div>
      </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="replaceadmingc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h6>Replace <span class="text-primary college_"></span> : GC Administrator</h6>
          </div>

          <div class="card shadow-sm mb-2">
            <div class="card-body">
              <h6 style="font-size:13px">Current Admin : <span
                  style="font-size:12px;margin-right: 20px; font-weight:bolder" id="name_"> </span> Contact No: <span
                  id="contact_" style="font-size:12px;margin-right: 20px;font-weight:bolder"></span> Email :<span
                  id="email_" style="font-size:12px;margin-right: 20px;font-weight:bolder"> </span> </h6>


            </div>
          </div>
          <form method="post" action="Manage.php" onsubmit="return false" id="rpaddnewadmingc">
            <input type="hidden" name="replaceadmin">


            <div class="modal-body">

              <div class="container">
                <?php 

                  

                                           

                                     
                                  

                     ?>
                <input type="hidden" name="id_" id="id_rp">

                <div class="row">
                  <div class="col-md-6">
                    <h6 style="font-size: 12px">Enter Email</h6>
                    <input type="email" name="rpadem" class="form-control ad1" style="font-size: 12px" required="">
                  </div>
                  <div class="col-md-6">
                    <h6 style="font-size: 12px">College</h6>
                    <select class="form-control" style="font-size: 12px" id="collid">
                      <option class="college_"></option>
                    </select>
                    <input type="hidden" name="rpcoll" value="" id="collid_">
                  </div>

                  <div class="col-md-4">
                    <h6 class="mt-2" style="font-size: 12px">Enter Last Name</h6>
                    <input type="text" name="rpadln" class="form-control ad1" style="font-size: 12px" required="">
                  </div>
                  <div class="col-md-4">
                    <h6 class="mt-2" style="font-size: 12px">Enter First Name</h6>
                    <input type="text" name="rpadfn" class="form-control ad1" style="font-size: 12px" required="">
                  </div>
                  <div class="col-md-4">
                    <h6 class="mt-2" style="font-size: 12px">Enter Middle Name</h6>
                    <input type="text" name="rpadmn" class="form-control ad1" style="font-size: 12px">
                  </div>

                  <div class="col-md-6">
                    <h6 class="mt-2" style="font-size: 12px">Contact No</h6>

                    <input type="text" name="rpcn" class="form-control" maxlength="11" style="font-size:12px"
                      oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '/');" required>

                  </div>
                  <div class="col-md-6">

                    <h6 class="mt-2" style="font-size: 12px">Effective-Date</h6>
                    <input type="date" name="rped" class="form-control" style="font-size:12px" required>

                  </div>


                </div>



                <br style="user-select: none">


                <input type="hidden" name="rpadty" value="GC">








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



    <div class="modal fade" id="coordinator_info" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">

          <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>

            <h6 style="font-weight:bolder" class="mt-4">


            </h6>

            <h6 style="text-align:center">

              <div id="info_replaced"></div>


            </h6>




          </div>

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

    <?php 

    if(isset($_SESSION['saved'])){
        ?>
    <script type="text/javascript">
      $(document).ready(function () {

        Swal.fire(

          'Account Updated!',

          'Your account has been modified Successfully!',

          'success',

        )

      });
    </script>
    <?php
        unset($_SESSION['saved']);
    }

     ?>


    <script type="text/javascript">
      $(document).ready(function () {

        $('#em1').focusout(function () {

          var val = $(this).val();
          var em = $('#emdup').val();
          if (val == '') {

          } else {
            $.ajax({
              url: "validate.php",
              method: "POST",
              data: {
                checkemail: 1,
                val: val
              },
              success: function (data) {
                if (data == "exist") {


                  if (val == em) {
                    $('#em1').removeClass('is-invalid');
                    $('#saveuptbtn').removeAttr('disabled');
                  } else {
                    $('#em1').addClass('is-invalid');
                    $('#saveuptbtn').attr('disabled', true);
                  }

                } else if (data == "add") {
                  $('#em1').removeClass('is-invalid');

                  $('#saveuptbtn').removeAttr('disabled');

                } else {
                  alert(data);
                }
              }
            })


          }

        })

        $('#gccemail').focusout(function () {
          var val = $(this).val();
          if (val == '') {

          } else {
            $.ajax({
              url: "validate.php",
              method: "POST",
              data: {
                checkemail: 1,
                val: val
              },
              success: function (data) {
                if (data == "exist") {
                  $('#gccemail').addClass('is-invalid');

                } else if (data == "add") {
                  $('#gccemail').removeClass('is-invalid');
                  $('#gccemail').addClass('is-valid');
                  $('#gccadd').removeAttr('disabled');

                } else {
                  alert(data);
                }
              }
            })


          }



        })

        $('#gcemail').focusout(function () {
          var val = $(this).val();
          if (val == '') {

          } else {
            $.ajax({
              url: "validate.php",
              method: "POST",
              data: {
                checkemail: 1,
                val: val
              },
              success: function (data) {
                if (data == "exist") {
                  $('#gcemail').addClass('is-invalid');

                } else if (data == "add") {
                  $('#gcemail').removeClass('is-invalid');
                  $('#gcemail').addClass('is-valid');
                  $('#gcadd').removeAttr('disabled');

                } else {
                  alert(data);
                }
              }
            })


          }



        })


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
              console.log(data);
              $('#addadmingcc').modal('hide');
              $('#home-tab').click();
              Swal.fire(
                'New Admin Saved!',
                'A new Administrator has saved successfully!',
                'success'
              ).then((result) => {
                if (result.isConfirmed) {

               

                  location.reload();


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
              xhttp.send("sendcredentials=1&email=" +data);





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



              Swal.fire(
                'New Admin Saved!',
                'A new Administrator has saved successfully!',
                'success'
              ).then((result) => {
                if (result.isConfirmed) {

                  location.reload();


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


        $('#rpaddnewadmingc').on('submit', function (event) {
          event.preventDefault();

          var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
              const data = this.responseText;



              Swal.fire(
                'Replaced Admin!',
                'A new Administrator has saved and replaced successfully!',
                'success'
              ).then((result) => {
                if (result.isConfirmed) {

                  location.reload();


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
          $('#gccemail').removeClass('is-invalid');
          $('#gccemail').removeClass('is-valid');
          $('#gccadd').attr('disabled', true);
        })
        $('#addadmingc').on('hidden.bs.modal', function (e) {
          $('#gcemail').removeClass('is-invalid');
          $('#gcemail').removeClass('is-valid');
          $('.ad1').val('');

          $('#gcadd').attr('disabled', true);
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
                  location.reload();

                }
              })




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
    <script type="text/javascript">
      $(document).ready(function () {
        if ($(window).width() <= 768) {
          $('#accordionSidebar').addClass('toggled');
        }

      });
    </script>
</body>

</html>