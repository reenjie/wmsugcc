<?php 
session_start();
  if(!isset($_SESSION['admingcc_token'])) {
    header("location:../../session_end.html");
  }
  include '..//create_form/connect.php';
  

  if(isset($_SESSION['first_time_login'])){
    include 'ft.php';
  }

 

 ?>
<!DOCTYPE html>
<html lang="en">
    

 <?php include '../include/assets/head.php';?>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!--sidebar-->
        <?php include '../include/assets/sidebar.php';?>
        <!--end of sidebar-->


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column" >

            <!-- Main Content -->
            <div id="content">

                    <!--topbar-->
            <?php include '../include/assets/topbar.php';?>
                    <!--end of topbar-->




                <!-- Begin Page Content -->
                <div class="container-fluid" >
                   <span class="text-gray-800" style="font-weight: bold;" id="tryfound"></span>
                     <div class="advancecontent_search row d-none" id="content_search" data-role="searchfor"> </div> 
                    
                      <div class="051715" id="051715">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Referrals</h1>
                       <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
                    </div>

                     
                



                
                 
                   
              
                     
                    
                    <!-- Content Row -->

                     <div class="container">
                     	 
                         

                          <?php 
                             if(isset($_GET['completed'])){
                                 ?>
                                      <button class="btn btn-light mb-2" onclick="window.location.href='referrals.php' " style="font-size:14px"><i class="fas fa-arrow-left"></i></button>
                                <?php
                             }else {
                                ?>
                                 <button class="btn btn-light mb-2" onclick="window.location.href='index.php' " style="font-size:14px"><i class="fas fa-arrow-left"></i></button>


                                 <button class="btn btn-light text-primary mb-3" style="font-size:14px;" onclick="window.location.href='referrals.php?completed' ">Completed Referrals <span class="badge badge-success">
                                    <?php 
                                     $countreferralsi = "SELECT * FROM `referral_history` where status='3' ";
                                                                              $allreferalsi = mysqli_query($con,$countreferralsi); 
                                                                              $countingrefi= mysqli_num_rows($allreferalsi);
                                                                             echo $countingrefi;

                                     ?>
                                  </span></button>
                                <?php
                             }


                           ?>

                     	      <div class="table-responsive" id="sd">
                                                
                                              <table class="table table-striped table-sm " id="reftable">
                                            <thead>
                                              <tr class="table-success">
                                                
                                             <th scope="col"></th>
                                              <th scope="col">Status</th>
                                                  <th scope="col">No </th>
                                                  <th scope="col">Student ID</th>
                                                  <th scope="col">Name</th>
                                                    <th scope="col">Subject</th>
                                                    <th scope="col">Referred By</th>
                                                <th scope="col">Date-Created</th>
                                           
                                           
                                              </tr>
                                            </thead>
                                            <tbody>
                                                    <?php 
                                                 //  $CollegeId =  $_SESSION['gc_collegid'];
                                                   if(isset($_GET['completed'])){
                                                         $getreferral_history = "SELECT * FROM `referral_history` where status =3  ";
                                                   }else {
                                                         $getreferral_history = "SELECT * FROM `referral_history` where status != 0 and status !=3  ";
                                                   }
                                                       
                                                         $greff = mysqli_query($con,$getreferral_history); 
                                                        
                                                     while($rows = mysqli_fetch_array($greff)){
                                                        $stat = $rows['status'];
                                                        $studentid = $rows['stud_id'];
                                                        $rhid = $rows['rh_id'];



                                  $sql = " SELECT * FROM `student` where stud_id = '$studentid' ";
                      $result = mysqli_query($con,$sql); 
                   
                    
                
                     
                       while($row = mysqli_fetch_array($result)){
                        //  $studentid = $row['stud_id'];
                          $student_lname = $row['stud_lname'];
                          $student_fname = $row['stud_fname'];
                          $student_mname = $row['stud_mname'];
                          $student_email = $row['stud_email'];
                            $student_course = $row['stud_course'];
                             $stud_coll = $row['stud_college'];

                          $student_Fullname = $student_lname.' '.$student_fname.' '.$student_mname;
                         $studemail = substr($student_email, 0, strpos($student_email,'@'));

                     }
                                                              ?>
                                                              <tr>

                                                                    <td>

                                                                        <div class="btn-group" role="group" aria-label="Basic example">
                                                                           

                                                                        <?php
                                                                        if($stat == 3){

                                                                            ?>

                                                                            <?php

                                                                        }else {
                                                                            /*?>

                                                                              <a href="session.php?markcomplete&rhid=<?php echo $rhid ?>&studentid=<?php echo $studentid ?>" class="text-success mr-3" style="font-size:13px">Mark as Complete</a>
                                                                            <?php*/
                                                                        }


                                                                        if($stat == 0){
                                                                            ?>
                                                                              <a href="JavaScript:void()" class="text-secondary"  style="font-size:13px;cursor: not-allowed;" ><i class="fas fa-edit"></i></a>
                                                                            <?php

                                                                        }else{
                                                                              ?>
                                                                              <a  href="referral-view.php?tokenid=<?php echo $rows['rh_id'] ?>&&id=<?php echo $rows['stud_id'] ?>&status=<?php echo $stat ?>" target="_blank" style="font-size:13px"><i class="fas fa-pen"></i> </a>
                                                                            <?php
                                                                        }

                                                                         ?> 

                                                                       
                                                                        
                                                                        </div>
                                                                      

                                                                    </td>
                                                                    <td>
                                                                        <?php 
                                                                        if($stat == 1){
                                                                            ?>
                                                                            <span class="badge badge-success">New</span>
                                                                            <?php
                                                                        }else if ($stat == 0){
                                                                               ?>
                                                                            <span class="badge badge-warning">Unfinished</span>
                                                                            <?php 
                                                                        }else if ($stat == 2){
                                                                        	?>
                                                                            <span class="badge badge-info">Pending</span>
                                                                            <?php 
                                                                        }else if ($stat == 3){
                                                                                ?>
                                                                            <span class="badge badge-success">Completed</span>
                                                                            <?php 
                                                                        }


                                                                         ?>
                                                                        

                                                                    </td>
                                                                    <td>Ref_<?php echo $rows['rh_id']  ?></td>
                                                                    <td><?php echo $studemail ?></td>
                                                                    <td><?php echo $student_Fullname ?></td>
                                                                    <td><span style="font-weight:bolder;"><?php echo $rows['subject'] ?></span></td>
                                                                    <td><span style="font-style:italic"><?php echo $rows['referred_by'] ?></span></td>
                                                                    <td><?php echo date('F j,Y',strtotime($rows['datecreated'])) ?></td>
                                                                   
                                                              </tr>
                                                              <?php              
                                                         }
                                                    
                                                     

                                                     ?>
                                            </tbody>
                                          </table>
                                          </div> 
                 
                  
           			 </div>

            </div>
        </div>
    </div>
       			<!-- Footer -->
            <?php include '../include/assets/footer.php';?>
            <!-- End of Footer -->
</div>

</div>

<?php 
    if(isset($_SESSION['success_completion'])){


          ?>
                                                                    
                                                                  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                                               
                                                                  <script type="text/javascript">
                                                                     Swal.fire(
                                                                      'Marked Successfully!',
                                                                      'Referral marked completed Successfully!',
                                                                      'success'
                                                                    )
                                                                    
                                                                          
                                                                  </script>
                                                                   <?php

                                                                   unset($_SESSION['success_completion']);
    }


 ?>


             
 	 <script src="../../js/jquery.js"></script>
                         
                         <link rel="stylesheet" type="text/css" href="../../offline/datatable.css"/>
 
<script type="text/javascript" src="../../offline/datatable.js"></script>






           
                <script type="text/javascript">
                      $(document).ready(function() {
                                let table = new DataTable('#reftable', {
      
                         "search": {
                        "caseInsensitive": false
                      }

                    });
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
                                   xhttp.open("POST", "advancesearch.php",true);
                                   xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                                   xhttp.send("searchfor=1");
                                       
                                                
                           }



                      });
                      
                     
                                     
                            
                    </script>

         
            <script type="text/javascript">
                
                $(document).ready(function() {
                   
                
                      });      
                      
            </script>
            <!-- End of Main Content -->

         

     

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
     

<?php
include 'logoutmodal.php'; 
//include 'notification.php';
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
   
  


</body>

</html>