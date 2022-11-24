<?php 
session_start();
if(!isset($_SESSION['superadminId'])){
    header('location:../../session_end.html');
}
 

 ?>
<!DOCTYPE html>
<html lang="en">


<?php include '../include/assets/head.php';
// include '../GCC/Classes/sql_query.php';
 ?>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!--sidebar-->

    <ul class="navbar-nav  sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color:#313439">

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
        Manage
      </div>
      <li class="nav-item">
        <a class="nav-link" href="../accounts/">

          <i class="fas fa-users-cog"></i>
          <span>Accounts</span></a>
      </li>

      <hr class="sidebar-divider">
      <li class="nav-item active">
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
              <h1 class="h3 mb-0 text-gray-800">Logs</h1>
              <!--<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
            </div>

            <!--contents here-->
            <div class="card">

              <div class="card-body">
                <form method="post" action="action.php">
                  <div class="table-responsive" id="contents">



                    <div class="row mb-3">

                      <div class="col-md-6">
                        <select class="form-control" id="semester_" style="font-size:13px">
                          <option value="null">Select Semester</option>
                          <option value="summer">Summer</option>
                          <option value="1stsem">First Semester</option>
                          <option value="2ndsem">Second Semester</option>
                        </select>
                      </div>
                      <div class="col-md-6">
                        <select class="form-control" id="year_" style="font-size:13px">
                          <option value="null">Select Year</option>
                          <?php 
                                        $current_year = date('Y');
                                        for($i = $current_year; $i >= 2020 ; $i-- ){

                                          ?>
                          <option value="<?php echo $i ?>"><?php echo $i ?></option>
                          <?php

                                        }

                                     

                                         ?>

                        </select>
                      </div>


                      <div class="col-md-4">
                        <script src="../../js/jquery.js"></script>
                        <?php 

                                 if(isset($_GET['sort_pds'])){
                                 	$sem = $_GET['sem'];
                                 	$yr = $_GET['yr'];

                                 	?>
                        <script type="text/javascript">
                          $(document).ready(function () {
                            $('#semester_').val('<?php echo $sem ?>');
                            $('#year_').val('<?php echo $yr ?>');

                          });
                        </script>
                        <?php

                                 }
                                 if(isset($yr)){
                                 	 if($yr == 'null'){
                                 		 	$yr_ = date('Y');
                                 		 }else {
                                 		 	$yr_ = $yr;	
                                 		 }
                                 	
                                 }else {

                                 		
                                 		 $yr_ = date('Y');
                                 	
                                 }

                                 if(isset($sem)){
                                 	if($sem == 'null'){
                                 		$sem_ = $_SESSION['sem'];
                                 	}else {
                                 		$sem_ = $sem;
                                 	}

                                 }else {
                                 	$sem_ = $_SESSION['sem'];
                                 }

                                  ?>
                        <button type="button" class="btn btn-light text-secondary mt-4 createbackup"
                          data-sy="<?php echo $yr_ ?>" data-sem="<?php echo $sem_ ?>" data-toggle="modal"
                          data-target="#exampleModal" style="font-size:14px">Create Backup <i
                            class="fas fa-save"></i></button>

                        <button type="button" class="btn btn-light text-primary mt-4" style="font-size:14px"
                          data-toggle="modal" data-target="#directory">
                          BackUp
                        </button>




                      </div>

                      <div class="col-md-8"> <button type="button" style="font-size:12px;float: right;"
                          class="btn btn-light text-danger font-weight-bold mt-4" id="delete_all">DELETE ALL</button>
                      </div>





                      <!-- Modal -->
                      <div class="modal fade" id="directory" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">

                            <div class="modal-body">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>

                              <br>

                              <h6 class="font-weight-bold">BackUp Directory</h6>
                              <hr>
                              <?php 

                                              $log_directory = 'backup';

                                              foreach(glob($log_directory.'/*.*') as $file) {

                                                    ?>
                              <div class="card shadow mt-2 mb-2">

                                <div class="card-header">
                                  <div class="container">
                                    <h6><?php echo $file ?></h6>

                                    <button type="button" class="btn btn-light text-primary fetchdata"
                                      data-file="<?php echo $file ?>"
                                      style="font-size:14px;float: right;">Fetch</button>

                                    <button type="button" class="btn btn-light text-danger deletefile"
                                      data-file="<?php echo $file ?>"
                                      style="font-size:14px;float: right;">Delete</button>
                                  </div>
                                </div>
                              </div>

                              <?php
                                                
                                                }

                                               ?>

                            </div>

                          </div>
                        </div>
                      </div>






                    </div>





                    <script type="text/javascript">
                      $(document).ready(function () {


                        $('#semester_').change(function () {


                          var sem = $(this).val();
                          var yr = $('#year_').val();

                          if (yr == 'null') {


                            window.location.href = '?sort_pds&sem=' + sem + '&yr=' + yr;

                          } else {
                            window.location.href = '?sort_pds&sem=' + sem + '&yr=' + yr;
                          }
                        })

                        $('#year_').change(function () {

                          var sem = $('#semester_').val();
                          var yr = $(this).val();

                          if (sem == 'null') {


                            window.location.href = '?sort_pds&sem=' + sem + '&yr=' + yr;

                          } else {
                            window.location.href = '?sort_pds&sem=' + sem + '&yr=' + yr;
                          }


                        })

                      });
                    </script>



                    <table class="table table-dark table-sm" id="pdstable" style="font-size:12px">
                      <thead>
                        <tr>
                          <th scope="col">
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="customCheck1">
                              <label class="custom-control-label" for="customCheck1"></label>
                            </div>

                          </th>
                          <th scope="col">Date</th>
                          <th scope="col">Fields</th>
                          <th scope="col">Description</th>

                          <th scope="col">Admin</th>
                          <th scope="col">Contact No</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                                   if(isset($_GET['sort_pds'])){
                                    $sem = $_GET['sem'];
                                    $yr = $_GET['yr'];

                                    if ($sem == 'null'){
                                        $sm = $_SESSION['sem'];
                                    }else {
                                        $sm = $sem;
                                    }
                                    if($yr == 'null'){
                                        $year = date('Y');
                                    }else {
                                        $year = $yr;
                                    }   

                                     $get_all_logs = "select * from logs where semester = '$sm' and year(datemodified) = '$year'  ";
                                                 $gettinglogs = mysqli_query($con,$get_all_logs); 
                                              
                                             while($row = mysqli_fetch_array($gettinglogs)){
                                                $fields = $row['manage_fields'];
                                                $adminid = $row['admin_id'];
                                                $coordinator = $row['coordinator'];
                                                $courses = $row['courses'];
                                                       ?>

                        <tr>
                          <td>
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" name="logids[]" value="<?php echo $row['logs_id'] ?>"
                                class="custom-control-input checkall" id="<?php echo $row['logs_id'] ?>">
                              <label class="custom-control-label" for="<?php echo $row['logs_id'] ?>"></label>
                            </div>

                          </td>
                          <td><?php echo date('F j,Y  @h:i a',strtotime($row['datemodified'])) ?></td>
                          <td><?php  echo $fields ?></td>
                          <td><?php echo $row['content'];

                                                           if(isset($courses)){
                                                           
                                                              if($courses == ''){

                                                           }else {
                                                             echo 'And its Courses : ';
                                                            echo $courses;
                                                           }

                                                           }

                                                           if(isset($coordinator)){

                                                         

                                                        if($coordinator == ''){

                                                           }else {
                                                               echo ' And Coordinator/s : ';
                                                            echo $coordinator;
                                                           }


                                                           }
                                                       
                                                         


                                                            ?></td>
                          <td><?php
                                                               $getadmin_name = "select * from administrator where admin_id ='$adminid'  ";
                                                                $gettingadm = mysqli_query($con,$getadmin_name); 
                                                              
                                                            while($getadm = mysqli_fetch_array($gettingadm)){
                                                                        echo $getadm['admin_lname'].' '.$getadm['admin_fname'];   
                                                                        $cn = $getadm['admin_contactno'];           
                                                                }
                                                           
                                                            

                                                                ?></td>
                          <td><?php 
                                                                if($cn == ''){
                                                                    echo 'None';
                                                                }else {
                                                                    echo $cn;
                                                                }


                                                                 ?></td>

                        </tr>
                        <?php

                                                       }             
                                                 
                                            

                                        }else {
                                             $get_all_logs = "select * from logs  ";
                                                 $gettinglogs = mysqli_query($con,$get_all_logs); 
                                              
                                             while($row = mysqli_fetch_array($gettinglogs)){
                                                $fields = $row['manage_fields'];
                                                $adminid = $row['admin_id'];
                                                $coordinator = $row['coordinator'];
                                                $courses = $row['courses'];
                                                       ?>

                        <tr>
                          <td>
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" name="logids[]" value="<?php echo $row['logs_id'] ?>"
                                class="custom-control-input checkall" id="<?php echo $row['logs_id'] ?>">
                              <label class="custom-control-label" for="<?php echo $row['logs_id'] ?>"></label>
                            </div>

                          </td>
                          <td><?php echo date('F j,Y  @h:i a',strtotime($row['datemodified'])) ?></td>
                          <td><?php  echo $fields ?></td>
                          <td><?php echo $row['content'];

                                                           if(isset($courses)){
                                                           
                                                              if($courses == ''){

                                                           }else {
                                                             echo 'And its Courses : ';
                                                            echo $courses;
                                                           }

                                                           }

                                                           if(isset($coordinator)){

                                                         

                                                        if($coordinator == ''){

                                                           }else {
                                                               echo ' And Coordinator/s : ';
                                                            echo $coordinator;
                                                           }


                                                           }
                                                       
                                                         


                                                            ?></td>
                          <td><?php
                                                               $getadmin_name = "select * from administrator where admin_id ='$adminid'  ";
                                                                $gettingadm = mysqli_query($con,$getadmin_name); 
                                                              
                                                            while($getadm = mysqli_fetch_array($gettingadm)){
                                                                        echo $getadm['admin_lname'].' '.$getadm['admin_fname'];   
                                                                        $cn = $getadm['admin_contactno'];           
                                                                }
                                                           
                                                            

                                                                ?></td>
                          <td><?php 
                                                                if($cn == ''){
                                                                    echo 'None';
                                                                }else {
                                                                    echo $cn;
                                                                }


                                                                 ?></td>

                        </tr>
                        <?php             
                                                 
                                            
                                               
                                             


                                            }


                                        }
                          
                                         
                                             

                                             

                                             ?>
                      </tbody>
                    </table>
                  </div>

                  <div class="card shadow mb-3 mt-3">
                    <div class="card-body">
                      <h6>
                        On Selection :
                        <button type="submit" name="delete" style="font-size:13px" class="btn btn-danger">
                          Delete</button>
                      </h6>
                    </div>
                  </div>
                </form>


              </div>




              <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-sm" role="document">
                  <div class="modal-content">
                    <form method="post" action="action.php" onsubmit="return false" id="createbp">

                      <input type="hidden" name="createbackup">
                      <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <div class=" mt-3">
                          <h6>Create BackUp of logs</h6>
                          <hr>
                          Enter Filename:

                          <div class="col"><input required type='text' id="fname" style="font-size:13px"
                              class="form-control" name="fname"></div>

                          <input type="hidden" id="sy" name="sy">
                          <input type="hidden" id="seme" name="sem">

                          <br>

                          Your file will be saved as sql file.






                        </div>

                      </div>
                      <div class="modal-footer">
                        <button type="button" style="font-size:12px" class="btn btn-secondary"
                          data-dismiss="modal">Close</button>
                        <button type="submit" name="" style="font-size:12px" class="btn btn-primary">Create</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>


            </div>

          </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
      <?php 
//include '../GCC/Dashboard/notification.php';
 ?>



      <?php //include 'assets.php' 
            include '../../GCC/create_form/connect.php';

                    $sql = " SELECT * FROM `administrator` where admin_type ='GCC' OR admin_type = 'GC'   ";
                            $result = mysqli_query($con,$sql);
                            $count= mysqli_num_rows($result);
                            
                            
                             while($row = mysqli_fetch_array($result)){
                             $type = $row['admin_type'];

                             if($type == 'GCC'){
                                $gcc[] = $type;
                             }else if ($type == 'GC'){
                                $gc[] = $type;
                             }
                             }


                     function cal_percentage($num_amount, $num_total) {
                      $count1 = $num_amount / $num_total;
                      $count2 = $count1 * 100;
                      $count = number_format($count2, 0);
                      return $count;
                    }
                      




            ?>
      <script src="../../offline/sweetalert.js"></script>
      <script type="text/javascript" src="../../js/jquery.js"></script>

      <link rel="stylesheet" type="text/css" href="../../offline/datatable.css" />

      <script type="text/javascript" src="../../offline/datatable.js"></script>








      <script type="text/javascript">
        $(document).ready(function () {
          let table = new DataTable('#pdstable', {

            "search": {
              "caseInsensitive": false
            }

          });

          $('#createbp').on('submit', function (event) {
            event.preventDefault();
            $.ajax({
              url: $(this).attr('action'),
              method: "POST",
              data: $(this).serialize(),
              success: function (data) {

                //alert(data);   

                var fname = $('#fname').val();
                var sy = $('#sy').val();
                var sem = $('#seme').val();
                $.ajax({
                  url: "action.php",
                  method: "POST",
                  data: {
                    createbackups: 1,
                    datapassed: data,
                    fname: fname,
                    sy: sy,
                    sem: sem
                  },
                  success: function (data) {

                    Swal.fire(

                      'Backed Up Successfully!',

                      'Your file was Saved.',

                      'Success',

                    ).then((result) => {

                      if (result.isConfirmed) {
                        location.reload();
                      }
                    })
                  }
                })



              }
            })
          });

          $('.createbackup').click(function () {

            var sy = $(this).data('sy');
            var sem = $(this).data('sem');
            $('#fname').val('backupLogs_' + sem + '_sy' + sy);
            $('#sy').val(sy);
            $('#seme').val(sem);
          })


          $('#customCheck1').click(function () {
            if ($(this).prop("checked") == true) {
              $('.checkall').prop('checked', true);
            } else if ($(this).prop("checked") == false) {
              $('.checkall').prop('checked', false);
            }
          });


          $('#delete_all').click(function () {

            Swal.fire({
              title: 'Are you sure?',
              text: "You won't be able to revert this! make sure you save a backup before deleting all.",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
              if (result.isConfirmed) {

                $.ajax({
                  url: "action.php",
                  method: "POST",
                  data: {
                    deleteall: 1
                  },
                  success: function (data) {

                    Swal.fire(
                      'Deleted!',
                      'All logs has been deleted.',
                      'success'
                    ).then((result) => {
                      location.reload();
                    })
                  }
                })

              }
            })

          })

          $('.deletefile').click(function () {
            var file = $(this).data('file');

            Swal.fire({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
              if (result.isConfirmed) {

                $.ajax({
                  url: "action.php",
                  method: "POST",
                  data: {
                    deletebackup: file
                  },
                  success: function (data) {

                    Swal.fire(
                      'Deleted!',
                      'Your file has been deleted.',
                      'success'
                    ).then((result) => {
                      location.reload();
                    })
                  }
                })

              }
            })

          })

          $('.fetchdata').click(function () {
            var file = $(this).data('file');

            $.ajax({
              url: "action.php",
              method: "POST",
              data: {
                fetch: file
              },
              success: function (data) {

                Swal.fire(
                  'Backup file restored!',
                  'File was fetched successfully!',
                  'success'
                ).then((result) => {
                  location.reload();
                })
              }
            })
          })

        });
      </script>
      <script src="../../js/jquery.js"></script>
      <script src="../../GCC/vendor/chart.js/Chart.min.js"></script>

      <?php 

    if(isset($_SESSION['notset'])){
        ?>
      <script type="text/javascript">
        $(document).ready(function () {

          Swal.fire(

            'Selection Empty!',

            'Please Select one Or More!',

            'error',

          )

        });
      </script>
      <?php
        unset($_SESSION['notset']);
    }


    if(isset($_SESSION['deleted'])){
            ?>
      <script type="text/javascript">
        $(document).ready(function () {

          Swal.fire(

            'Selected logs were deleted',

            'Selected logs Deleted Successfully!',

            'success',

          )

        });
      </script>

      <?php


        unset($_SESSION['deleted']);  
         }
     ?>





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
  <?php include '../logoutmodal.php';  ?>

  <!-- Bootstrap core JavaScript-->
  <script src="../../GCC/vendor/jquery/jquery.min.js"></script>
  <script src="../../GCC/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../../GCC/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../../GCC/js/sb-admin-2.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function () {
      if ($(window).width() <= 768) {
        $('#accordionSidebar').addClass('toggled');
      }

    });
  </script>


</body>

</html>