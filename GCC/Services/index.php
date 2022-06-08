<?php 

session_start();
  if(!isset($_SESSION['admingcc_token'])) {
    header("location:../../session_end.html");
  }
 unset($_SESSION['approve']);
 include '../create_form/connect.php';
 
  /*  if(!isset($_SESSION['form_id'])){


       

        $strict = " UPDATE `form_classification` SET `status`=NULL WHERE csform_id= '$csform'  ";
                 mysqli_query($con,$strict); 
         unset($_SESSION['form_id']);        

    }*/

 ?>
<!DOCTYPE html>
<html lang="en">


 <?php include '../include/assets/head.php';?>
 <style type="text/css">
    @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap');
    *{
      font-family: 'Cairo', sans-serif;
    }
 </style>

<body id="page-top" > 

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!--sidebar-->
        <?php include '../include/assets/sidebar.php';?>
        <!--end of sidebar-->


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column" style="background:url('../img/nordwood-themes-KcsKWw77Ovw-unsplash.jpg');background-position: center;background-size: cover;background-attachment: fixed;">

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
                        <h1 class="h3 mb-0  text-gray-800">Services</h1>
                        <!--<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
                    </div>

                    <!--contents here //// OFF-->
                     
                        <div class="row">
                            <div class="col-md-4">
                                   <button class="btn btn-light text-secondary mt-2 mb-2" onclick="window.location.href='student.php'" style="font-size:14px;" data-toggle="tooltip" data-placement="right" title="Set students for counseling, Search Records and Etc.">All Students <i class="fas fa-info-circle"></i> </button>
                            </div>
                        </div>

                    <div class="row mb-5">
                            <div class="col-md-12">
                                 

                                  <div class="card shadow">
                                <div class="card-header">

                                    <h6 class="text-primary">Counseling</h6>

                                                    
                                </div>
                                <div class="card-body">
                                        
                                        <div class="row">
                                            <div class="col-md-5">
                                                
                                                <button class="btn btn-light text-success mt-2 mb-2" id="crtesched"  class="btn btn-primary" data-toggle="modal" data-target="#createsched" style="font-size:13px">Create Schedule <i class="fas fa-plus-circle"></i> </button>



<!-- Modal -->
<div class="modal fade" id="createsched" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
           <h6 class="text-success" id="txt-title">Create Schedule</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>
      <form method="post" action="action.php">
      <div class="modal-body">
        <input type="hidden"  name="st" id="st" value="add">
        <input type="hidden" name="id" id="id-sched" value="1" >
        <div class="container">

            <div class="row mb-3" style="font-size:13px">
                <div class="col-md-6">
                    <div class="card " style="height:100px">
                        <div class="card-body">
                            <label>
                                 <input type="radio" id="pr" name="ctype" value="0" checked> PRIVATE
                            </label>
                             <br>
                             <span><i class="fas fa-info-circle"></i>
                                Available for Selected Students only.

                             </span>
                           
                        </div>
                    </div>
                  
                </div>
                <div class="col-md-6">
                   <div class="card " style="height:100px">
                        <div class="card-body">
                            <label>
                                 <input type="radio" id="pu" name="ctype" value="1"> PUBLIC
                            </label>
                             <br>
                               <span><i class="fas fa-info-circle"></i>
                                Available to all students. 

                             </span>
                           
                        </div>
                    </div>
                </div>
            </div>
                
                <h6>Title : </h6>
             <input type="text" class="form-control clr" id="title" name="title" style="font-size:13px">

             <br>
             <h6>
                 Date:
             </h6>
             <input type="date" class="form-control clr" id="thedate" style="font-size:13px" name="thedate" required>
             <br>
             <h6>Time </h6>
             <hr>
             <div class="row">
                 <div class="col-md-6">
                      <h6>Start :</h6> <input type="time" id="timestart" name="timestart" class="form-control clr" style="font-size:13px" required> 
                 </div>
                  <div class="col-md-6">
                       <h6>End :</h6> <input type="time" id="timeend" name="timeend" class="form-control clr" style="font-size:13px" required> 
                  </div>
             </div>
         

        </div>


      </div>
      <div class="modal-footer">
      
        <button type="submit" class="btn btn-primary" name="savesched" style="font-size:13px">SAVE</button>
      </div>
      </form>
    </div>
  </div>
</div>

                                            
                                            <div class="card shadow-sm">
                                                    <div class="card-header">
                                                        <h6 style="font-size:13px">Schedules</h6>
                                                    </div>
                                                <div class="card-body">
                                                    
                                                    <ul class="list-group list-group-flush">

                                                    

                                                        <?php 
                                                            $getall_sched = "SELECT * FROM `scheduler`  ";
                                                             $gettingsched = mysqli_query($con,$getall_sched); 
                                                             $count= mysqli_num_rows($gettingsched);
                                                         
                                                            if($count >=1){
                                                         while($row = mysqli_fetch_array($gettingsched)){
                                                            $sid = $row['sched_id'];
                                                            $stat = $row['status'];
                                                                ?>
                                                                    <li class="list-group-item" id="<?php echo $row['sched_id'] ?>">
                                                            <h6 style="font-size:13px">     
                                                                <?php 
                                                                    $checkif_exist = "select * from counseling_request where sched_id = '$sid'  ";
                                                                     $chckingdata = mysqli_query($con,$checkif_exist); 
                                                                     $countingifschedused= mysqli_num_rows($chckingdata);
                                                                   
                                                                    if($countingifschedused >=1){
                                                                    ?>
                                                                     <div class="btn-group" style="float:right;">
                                                                     <button class="btn btn-light text-primary editshed" data-id="<?php echo $row['sched_id'] ?>" data-toggle="modal" data-target="#createsched" data-title="<?php echo $row['title'] ?>" data-datev="<?php echo $row['date_valid'] ?>" data-tstart="<?php echo $row['time_start'] ?>" data-tend ="<?php echo $row['time_end'] ?>" data-stat = "<?php echo $row['status'] ?>"><i class="fas fa-pen-square"></i></button>
                                                                     <?php 

                                                                        

                                                                 if(date('Y-m-d') == $row['date_valid']){
                                                             
                                                               }else if(date('Y-m-d') < $row['date_valid']) {
                                                               
                                                               }else {

                                                           

                                                                    $check_scheduledone = "select * from counseling_request where status = 5 and sched_id = '$sid'  ";
                                                                     $requestdone = mysqli_query($con,$check_scheduledone); 
                                                                     $countrequest_done= mysqli_num_rows($requestdone);

                                                                     while($rq = mysqli_fetch_array($requestdone)){
                                                                            $rqd = $rq['sched_id'];                 
                                                                          }

                                                                if($countrequest_done >= 1){

                                                                }else {
                                                                     ?>
                                                               
                                                                
                                                               <button  type="button" class="btn btn-light text-danger delsched" data-sid="<?php echo $row['sched_id'] ?>" >&times;</button>
                                                               
                                                                <?php

                                                                }

                                                                 
                                                               }

                                                                 ?>


                                                                   
                                                                   


                                                                </div>
                                                                    <?php
                                                                
                                                                    }else {
                                                                        ?>
                                                                        <div class="btn-group" style="float:right;">
                                                                              <button class="btn btn-light text-primary editshed" data-id="<?php echo $row['sched_id'] ?>" data-toggle="modal" data-target="#createsched"  data-title="<?php echo $row['title'] ?>" data-datev="<?php echo $row['date_valid'] ?>" data-tstart="<?php echo $row['time_start'] ?>" data-tend ="<?php echo $row['time_end'] ?>" data-stat = "<?php echo $row['status'] ?>"><i class="fas fa-pen-square"></i></button>
                                                                         <button class="btn btn-light text-danger delsched" data-sid="<?php echo $row['sched_id'] ?>" >&times;</button>
                                                                       
                                                                         </div>
                                                                        <?php
                                                                    }

                                                                 ?>
                                                                     
                                                                <span style="font-weight:bolder"><?php echo $row['title'] ?></span>
                                                                <br>
                                                                <?php  date_default_timezone_set('Asia/Manila') ?>
                                                               When : <span class="text-info"><?php echo date('F j,Y',strtotime($row['date_valid'])) ?></span> <br>
                                                               Time :   <span class="text-danger"><?php echo date('h:i a',strtotime($row['time_start'])) ?> -> <?php echo date('h:i a',strtotime($row['time_end'])); ?> </span> 
                                                               <br>

                                                             
                                                                status :
                                                              
                                                                <?php 

                                                                 if(date('Y-m-d') == $row['date_valid']){
                                                                ?>
                                                                  <span class="badge badge-success">Active</span>   
                                                                <?php
                                                               }else if(date('Y-m-d') < $row['date_valid']) {
                                                                 ?>
                                                                  <span class="badge badge-warning">Inactive</span>   

                                                                <?php
                                                               }else {

                                                                if($rqd == $sid){
                                                                        ?>
                                                                         <span class="badge badge-secondary">Unavailable</span>    
                                                                      <?php
                                                                }else {


                                                                    
                                                                    ?>
                                                                  <span class="badge badge-danger">Invalid</span>   
                                                                    <script src="../../offline/sweetalert.js"></script>
                                                                     <script type="text/javascript" src="../../js/jquery.js"></script>
                                                                  <script type="text/javascript">
                                                                      
                                                                        $(document).ready(function() {
                                                                            Swal.fire({
                                                                          title: 'An Invalid Schedule was detected!',
                                                                          text: "The system will delete the schedule , It will also delete all the  Request with these schedule. Invalid Schedules not allowed. Do you want to proceed? if no , You can edit the schedule to change the status.",
                                                                          icon: 'warning',
                                                                          showCancelButton: true,
                                                                          confirmButtonColor: '#3085d6',
                                                                          cancelButtonColor: '#d33',
                                                                          confirmButtonText: 'Yes, delete it!'
                                                                        }).then((result) => {
                                                                          if (result.isConfirmed) {
                                                                              $.ajax({
                                                                     url : "action.php",
                                                                     method: "POST",
                                                                     data  : {delsched:<?php echo $row['sched_id'] ?>},
                                                                      success : function(data){
                                                                     
                                                                    location.reload();
                                                                     }
                                                                      })
                                                                            
                                                                          }
                                                                        })
                                                                          
                                                                        });


                                                                  </script>
                                                                <?php

                                                                }
                                                               
                                                            
                                                               
                                                                  
                                                               
                                                               }

                                                                 ?>

                                                               
                                                                 <br>
                                                                 <?php 
                                                                 if($stat == 0){
                                                                    echo 'PRIVATE';
                                                                 }else {
                                                                    echo 'PUBLIC';
                                                                 }

                                                                  ?>

                                                            </h6>       
                                                        </li>

                                                                <?php   


                                                             }
                                                        
                                                         }else {
                                                            ?>
                                                            <li class="list-group-item" ><h6 style="font-size:12px;text-align: center;">
                                                <img src="../img/undraw_No_data_re_kwbl.png" style="width:150px;height:150px"><br>
                                              No Created Schedule Yet..</h6></li>

                                                            <?php
                                                         }

                                                         ?>


                                             <!--  -->
                                           



                                                     </ul>



                                                </div>
                                            </div>
  

                                            </div>
                                             <div class="col-md-7">
                                                <?php 
                                                  date_default_timezone_set('Asia/Manila');
                                                    $datenow = date('Y-m-d');
                                                 ?>
                                                            <nav aria-label="breadcrumb" style="font-size:13px">
                                  <ol class="breadcrumb">
                                    <?php 
                                    if(isset($_GET['todays_sched'])){
                                          ?>
                                    <li class="breadcrumb-item"><a href="index.php">All</a></li>
                                    <li class="breadcrumb-item">Todays Schedule</li>
                                      <li class="breadcrumb-item"><a href="?done">Done</a></li>
                                        <?php
                                    }else if(isset($_GET['done'])){
                                         ?>
                                    <li class="breadcrumb-item"><a href="index.php">All</a></li>
                                    <li class="breadcrumb-item"><a href="?todays_sched=<?php echo $datenow ?>">Todays Schedule</a></li>
                                      <li class="breadcrumb-item">Done</li>
                                        <?php
                                    }


                                    else {
                                        ?>
                                    <li class="breadcrumb-item">All</li>
                                    <li class="breadcrumb-item"><a href="?todays_sched=<?php echo $datenow ?>">Todays Schedule</a></li>
                                      <li class="breadcrumb-item"><a href="?done">Done</a></li>
                                        <?php
                                    }

                                     ?>
                                    


                                  
                                  </ol>
                                </nav>
                                  <input type="text" id="searchkey" class="form-control mt-2 mb-2" name="" placeholder="Search for ID , Surname or Givenname.." style="font-size:12px">

                                              <div id="requests" class="container" >
                                                    


                                              </div>

                                             </div>




                                        </div>



                                </div>
                                </div>


                            </div>


                    </div>

                        
                      



                    

                         <!--contents here //// OFF-->



                
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

       <script src="../../offline/sweetalert.js"></script>
       <script type="text/javascript" src="../../js/jquery.js"></script>
    <?php 
    if(isset($_SESSION['saved'])){
        $ss = $_SESSION['saved'];

        if($ss == 1){
    ?>
          <script type="text/javascript">
      
      Swal.fire(
                'Added Successfully!',
                'New Schedule added Successfully!',
                'success'

                )

        

            
    </script>
        <?php
         unset($_SESSION['saved']);
        }else if($ss == 2) {
               ?>
          <script type="text/javascript">
      
      Swal.fire(
                'Deleted Successfully!',
                'Schedule Deleted Successfully!',
                'success'

                )

        

            
    </script>
        <?php
         unset($_SESSION['saved']);

        }else if($ss == 3) {
               ?>
          <script type="text/javascript">
      
      Swal.fire(
                'Updated Successfully!',
                'Schedule Updated Successfully!',
                'success'

                )

        

            
    </script>
        <?php
         unset($_SESSION['saved']);

        }
    
       
    }

        ?>
    <script type="text/javascript">
      
      $(document).ready(function() {
                $('#crtesched').click(function(){
                      $('#st').val('add');   
                        $('#pr').prop('checked',true);    
                        $('.clr').val('');  
                        $('#txt-title').html('Create Schedule');     
                })
            $('.editshed').click(function(){
                 var id = $(this).data('id');
                 var title = $(this).data('title');
                 var datev = $(this).data('datev');
                 var tstart = $(this).data('tstart');
                 var tend = $(this).data('tend');
                 var status = $(this).data('stat');
                 //xxaxa
                if(status == 0){
                    $('#pr').prop('checked',true);
                    $('#pu').prop('checked',false); 
                }else {
                   $('#pr').prop('checked',false);  
                    $('#pu').prop('checked',true);  
                }
                $('#txt-title').html('Update Schedule');
                $('#title').val(title);
                $('#thedate').val(datev);
                $('#timestart').val(tstart);
                $('#timeend').val(tend);
                $('#st').val('edit');
                $('#id-sched').val(id);
                              
            })


            $('.delsched').click(function(){
                 var id = $(this).data('sid');
                  $.ajax({
                  url : "action.php",
                   method: "POST",
                  data  : {delsched:id},
                   success : function(data){
                 
                    location.reload();
                    }
                  })
                            
            })
          
            });      
            
    </script>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
   <?php include '../Dashboard/logoutmodal.php';  ?>
  <script src="../../js/jquery.js"></script>
    
    <script type="text/javascript">
                      $(document).ready(function() {
                        advancesearchcontent();
                           $('.myinputsss').keyup(function(){ 

                           
                            var value = $(this).val().toLowerCase();


                              var size = $(".advancecontent_search > .ele").length; // The parentdiv plus the element containing the text or card
                                           var count = $('div.ele:hidden').length;  // The child element or card
                                          

                                           $('#tryfound').text('Search Result For : '+ value);


                            if(value == ''){
                                $('.051715').removeClass('d-none');
                                 $('#tryfound').text('');
                                 $('.advancecontent_search').addClass('d-none');
                            }else {
                               $('.051715').addClass('d-none');
                                $('.advancecontent_search').removeClass('d-none');
                                
                              $('div[data-role="searchfor"]').filter(function() {
                                       $(this).toggle($(this).find('h6').text().toLowerCase().indexOf(value) > -1)
                                   });
                             
                                 
                               
                                  
                                   
                            }
                          
                          
                          })

                         $('#btnsearchclick').click(function() { 
                          
                         
                            if($('#confirmcheck').prop("checked") == true) {
                                         $('#confirmcheck').prop('checked',false);  
                                           $('.051715').removeClass('d-none');
                                           $('.advancecontent_search').addClass('d-none');
                                         $(this).find("i").toggleClass("far fa-times-circle");  
                                           
                                      }
                                   else if($('#confirmcheck').prop("checked") == false) {
                                           $('#confirmcheck').prop('checked',true); 
                                      $('.051715').addClass('d-none');
                                      $('.advancecontent_search').removeClass('d-none')   
                                      $(this).find("i").toggleClass("far fa-times-circle");  
                                                                    
                                    }
                          
                         /* ;*/
                         })
                             
                           function advancesearchcontent(){
                               
                                
                                  var xhttp = new XMLHttpRequest();
                                 xhttp.onreadystatechange = function() {
                                  if (this.readyState == 4 && this.status == 200) {
                                 const data = this.responseText;
                               
                              
                              $('.advancecontent_search').html(data);
                              
                                              }
                                           };
                                   xhttp.open("POST", "../Dashboard/advancesearch.php",true);
                                   xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                                   xhttp.send("searchfor=1");
                                       
                                                
                           }

                         

                      });
                      
                     
                                     
                            
                    </script>
                 
   
<script type="text/javascript">
    $(document).ready(function() {

        $('.edit').click(function() { 
      var csformid = $(this).data('csformid');
           
          
               
             var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
             if (this.readyState == 4 && this.status == 200) {
            const data = this.responseText;
          
          window.location.href= "../create_form";
                         }
                      };
              xhttp.open("POST", "../Manage_pds/form_session.php",true);
              xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
              xhttp.send("setedit=1&csformid="+csformid);
                  
            

    })      
         });
          
</script>

   <?php 
                    if(isset($_GET['todays_sched'])){
                 ?>
                          <script type="text/javascript">
                              $(document).ready(function() {
                                 allrequest('date');

                            $('#searchkey').keyup(function(){
                                var value = $(this).val();

                                 allrequest('datesearch'+value);
                            })

                                   
                          function allrequest(key){
                             $.ajax({
                             url : "action.php",
                              method: "POST",
                             data  : {requestcontent:key},
                              success : function(data){
                             $('#requests').html(data);
                               }
                             })
                        }
                            
                              });
                             
                          </script>
                          <?php                                
                      }else if(isset($_GET['done'])){


                           ?>
                          <script type="text/javascript">
                              $(document).ready(function() {
                                 allrequest('done');

                            $('#searchkey').keyup(function(){
                                var value = $(this).val();

                                 allrequest('donesearch'+value);
                            })

                                   
                          function allrequest(key){
                             $.ajax({
                             url : "action.php",
                              method: "POST",
                             data  : {requestcontent:key},
                              success : function(data){
                             $('#requests').html(data);
                               }
                             })
                        }
                            
                              });
                             
                          </script>
                          <?php   



                      }

                      else {
                        ?>
<script type="text/javascript">
      $(document).ready(function() {
          allrequest('all');
            $('#searchkey').keyup(function(){
                var value = $(this).val();

                 allrequest('search'+value);
            })

              function allrequest(key){
                 $.ajax({
                 url : "action.php",
                  method: "POST",
                 data  : {requestcontent:key},
                  success : function(data){
                 $('#requests').html(data);
                   }
                 })
            }
    
      });
</script>
                        <?php
                      }

                     ?>
<?php 
//include '../Dashboard/notification.php';
 ?>



    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/demo/chart-pie-demo.js"></script>
    <script type="text/javascript">
          $(document).ready(function() {
              if($(window).width() <= 768){
               $('#accordionSidebar').addClass('toggled');
              }
        
          });
    </script>

</body>

</html>