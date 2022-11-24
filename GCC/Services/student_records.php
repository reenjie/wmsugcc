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
                       
                        <!--<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
                    </div>

                    <!--contents here //// OFF-->

                    <div class="row mb-5">
                            <div class="col-md-12">
                                 

                                  <div class="card shadow">
                                <div class="card-header">
                                  

                                </div>
                                <div class="card-body">
                                      <button class="btn btn-light text-primary" onclick="window.location.href='student.php'" style="font-size:12px" ><i class="fas fa-arrow-left"></i></button>     
                                        

                                      <br>
                                      
                                
                                      <div id="tablecontents"> 
                                        <?php 
                                        if(isset($_GET['find'])){
                                            $id = $_GET['id'];

                                                $get_student_data = "select * from student where stud_id = '$id'  ";
                                                 $gettingstudentdata = mysqli_query($con,$get_student_data); 
                                                 $count= mysqli_num_rows($gettingstudentdata);
                                               
                                             
                                             while($row = mysqli_fetch_array($gettingstudentdata)){
                                                if($row['photo'] == '' ){
                                                    $src = '../img/undraw_profile_pic_ic5t.png';
                                                }else {
                                                    $src = '../../Myaccount/img/'.$row['photo'];
                                                }
                                                 $studentid = $row['stud_id'];
                                                   $student_lname = $row['stud_lname'];
                                              $student_fname = $row['stud_fname'];
                                              $student_mname = $row['stud_mname'];
                                              $student_email = $row['stud_email'];
                                            $studemail = substr($student_email, 0, strpos($student_email,'@'));
                                                $student_course = $row['stud_course'];
                                                $stud_coll = $row['stud_college'];
                                                       
                                                  ?>



                                            <div class="row">
                                                <div class="col-md-6">
                                                    
                                                        <div class="card">
                                                        <div class="card-body">
                                                    <h6 style="text-align:center;" class="mb-5">
                                                        <img src="<?php echo $src ?>" style="width: 200px; height: 200px; border-radius: 150px;" class="img-thumbnail mb-3">
                                                        <br>

                                                        <span style="font-size:18px;font-weight: bolder; "><?php echo $student_lname.' '.$student_fname.' '.$student_mname ?></span> <br>
                                                        <span style="font-size:13px"><?php echo $student_email ?> <br><?php echo $row['contact_no'] ?></span>

                                                    </h6>

                                                
                                                                  <div class="container mb-5">
                                                       <h6>

                                                         <?php 
                                     

                                          $fromwhatcollege = "select * from course where courseid ='$student_course'  ";
                                           $findcollege = mysqli_query($con,$fromwhatcollege); 
                                          
                                         while($course = mysqli_fetch_array($findcollege)){
                                                $fromwherecolid = $course['CollegeId']; 
                                                echo $course['course'];  
                                           }
                                          
                                              $getcollege = "select * from colleges where CollegeId ='$stud_coll'  ";
                                               $gcollge = mysqli_query($con,$getcollege); 
                                            
                                            
                                            
                                             while($getcol = mysqli_fetch_array($gcollge)){
                                                  echo '<br> <span class="text-primary">('.$getcol['college'].')</span> ';     
                                               }
                                            
                                             
                                         

                                        ?>
                                        <br>


                                                           Gender: <?php echo strtoupper($row['gender']) ?>
                                                           <br>
                                                           Status : <?php echo strtoupper($row['status']) ?>
                                                           <br>
                                                           Complete Address : <br><?php echo $row['street'].','.$row['barangay'].' '.$row['city'].' '.$row['country'].' '.$row['zipcode'] ?>
                                                       </h6>
                                                   </div>
                                                        </div>
                                                    </div>

                                                 
                                                </div>
                                                <div class="col-md-6">
                                                   <div class="container">
                                                       <h6 >Student Records</h6>
                                                     <table class="table " style="font-size:13px">
                                                      <thead>
                                                        <tr>
                                                          <th scope="col">Type</th>
                                                          <th scope="col">Records</th>
                                                            
                                                        </tr>
                                                      </thead>
                                                      <tbody>
                                                       <tr>
                                                           <td>Personal Data Form</td>
                                                           <td>
                                                            <?php 
                                                                $checkifpds = "select * from form_response where userid = '$studentid' and csformid = '62'  ";
                                                                 $chckingpds = mysqli_query($con,$checkifpds); 
                                                                 $countpds= mysqli_num_rows($chckingpds);
                                                             
                                                                if($countpds >=1){
                                                             ?>
                                                                     <button class="btn btn-light text-primary" onclick="window.open('../Records/view.php?student-pds&pdstoken=62&id=<?php echo $studentid?>&studenttokenid=<?php echo $studentid ?>')" style="font-size:13px"><i class="fas fa-external-link-alt"></i></button>
                                                                    <?php
                                                            
                                                                }else {
                                                                  echo '<span class="text-danger">NOT YET FILLED UP / PENDING</span>'; 
                                                                }  

                                                             ?>
                                                           
                                                           </td>
                                                       </tr>
                                                       <tr>
                                                           <td>Shifting Records</td>
                                                           <td>

                                                            <?php 
                                                                $checkifpds = "select * from form_response where userid = '$studentid' and csformid = '60'  ";
                                                                 $chckingpds = mysqli_query($con,$checkifpds); 
                                                                 $countpds= mysqli_num_rows($chckingpds);
                                                             
                                                                if($countpds >=1){
                                                             ?>
                                                                     <button class="btn btn-light text-primary" onclick="window.open('../Records/student_record.php?id=<?php echo $studentid ?>')" style="font-size:13px"><i class="fas fa-external-link-alt"></i></button>
                                                                    <?php
                                                            
                                                                }else {
                                                                  echo '<span class="text-danger">NO SHIFTING RECORDS YET</span>'; 
                                                                }  

                                                             ?>
                                                           
                                                                
                                                           </td>

                                                       </tr>
                                                      
                                                       <tr>
                                                           <td>Counseling Schedule</td>
                                                           <td>
                                                            <?php 
                                                                $checkiftheresdata = "SELECT * FROM `scheduler` where sched_id in (select sched_id from counseling_request where stud_id = '$studentid' )  ";
                                                                 $checking = mysqli_query($con,$checkiftheresdata); 
                                                                 $countingrequest= mysqli_num_rows($checking);
                                                                 
                                                                if($countingrequest >=1){

                                                                     ?>
                                                                      <button class="btn btn-light text-primary" style="font-size:13px"><i class="fas fa-external-link-alt" data-toggle="modal" data-target="#exampleModal"></i></button>  

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h6>COUNSELING SCHEDULES</h6>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                              </div>
                                              <div class="modal-body">
                                                <?php 
                                                  while($stre = mysqli_fetch_array($checking)){
                                                                  ?>
                                                         <li class="list-group-item " >
                                                            <h6 style="font-size:13px">     
                                                                    
                                                                <span style="font-weight:bolder"><?php echo $stre['title'] ?></span>
                                                                <br>
                                                                <?php  date_default_timezone_set('Asia/Manila') ?>
                                                              <span class="text-info"><?php echo date('F j,Y',strtotime($stre['date_valid'])) ?></span> <br>
                                                               <span class="text-danger"><?php echo date('h:i a',strtotime($stre['time_start'])) ?> -> <?php echo date('h:i a',strtotime($stre['time_end'])); ?> </span> 


                                                               <br><hr>

                                                             

                                                                </h6>
                                                     </li>
                                                                    <?php                       
                                                                 }

                                                 ?>
                                              </div>
                                              <div class="modal-footer">
                                             
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                                                    <?php  
                                                           
                                                            
                                                             }else {
                                                                echo '<span class="text-danger">NO SCHEDULE YET</span>';
                                                             }

                                                             ?>
                                                               
                                                           </td>
                                                       </tr>
                                                      </tbody>
                                                    </table>


                                                   </div>


                                                </div>
                                            </div>


                                            <?php


                                                 }
                                            
                                             

                                          


                                        }else {
                                           ?>
                                           <h6 style="text-align: center;">
                                                <img src="../img/undraw_void_3ggu.png" style="width:400px;">
                                                <h4 style="text-align: center;" class=" mt-4">404 Not Found</h4>
                                                    <h6 style="text-align: center;font-size: 13px;" class="mb-5">The page could not find your request.</h6>

                                           </h6>
                                           <?php
                                        }

                                         ?>

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

        }
    
       
    }
    if (isset($_SESSION['noselected'])){
          ?>
          <script type="text/javascript">
      
      Swal.fire(
                'Selection Empty!',
                'Please Select one or More!',
                'error'

                )

        

            
    </script>
        <?php
        unset($_SESSION['noselected']);
    }

        ?>
    <script type="text/javascript">
      
      $(document).ready(function() {

     

       
        function gettablecontent(searchkey){
            
             $.ajax({
             url : "action.php",
              method: "POST",
             data  : {tablecontent:searchkey},
              success : function(data){
                $('#tablecontents').html(data);
               }
             })


        }
            
          
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