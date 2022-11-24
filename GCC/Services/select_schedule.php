<?php 
session_start();
 include '../create_form/connect.php';

 if(!isset($_SESSION['forcounseling'])){
 	header('location:index.php');
 }
$selected = $_SESSION['forcounseling'];
	
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
                                	  <button style="float:right;font-size: 12px;" class="btn btn-light text-danger" id="cancel">Cancel Selection</button>
                                    <h6 class="text-primary">Select Schedule For Counseling</h6>


                                </div>
                                <div class="card-body">
                              		

                                	<div class="row">
                                		<div class="col-md-7" style="height: 500px; overflow-y: scroll;">
                                			<h6 style="font-size:13px"><i class="fas fa-info-circle"></i> The Following are those selected student/s.</h6>
                                				 <table class="table table-sm table-striped table-borderless" style="font-size: 13px">
                                      <thead>
                                        <tr class="table-success">
                                            <th scope="col">Status</th>
                                             <th scope="col">ID</th>
                                          <th scope="col">Name</th>
                                          <th scope="col">Course and College</th>
                                        
                                          
                                        </tr>
                                      </thead>
                                      <tbody >
                                			
                                			<?php 
                                			foreach ($selected as $key => $value) {
														//echo $value;
											?>
										
                                      	<?php 
                                      		$get_studentdata = "select * from student where stud_id = '$value'  ";
                                      		 $gettingdata = mysqli_query($con,$get_studentdata); 
                                      		 $count= mysqli_num_rows($gettingdata);
                                      		
                                      		if($count >=1){
                                      	 while($row = mysqli_fetch_array($gettingdata)){
                                      	 	 	$studentid = $row['stud_id'];
					                          $student_lname = $row['stud_lname'];
					                          $student_fname = $row['stud_fname'];
					                          $student_mname = $row['stud_mname'];
					                          $student_email = $row['stud_email'];
                                      	 	$studemail = substr($student_email, 0, strpos($student_email,'@'));
                                      	 	    $student_course = $row['stud_course'];
                             					$stud_coll = $row['stud_college'];


                                                    $checkif_exist = "select * from counseling_request where stud_id ='$studentid'  ";
                                                     $chckngstud = mysqli_query($con,$checkif_exist); 
                                                     $countstudent= mysqli_num_rows($chckngstud);
                                                  
                                                    if($countstudent >=1){
                                                     
                                                           while($st = mysqli_fetch_array($chckngstud)){
                                                                $schid =  $st['sched_id']; 
                                                                $stid = $st['stud_id'];

                                                             $getall_sched = "SELECT * FROM `scheduler` where sched_id ='$schid' ";
                                                             $gettingsched = mysqli_query($con,$getall_sched); 
                                                          
                                                         
                                                            
                                                         while($rowsched = mysqli_fetch_array($gettingsched)){
                                                            $ssctitle = $rowsched['title'];
                                                         }

                                                                if($stid == $studentid){
                                                                   ?>
                                                                    <tr class="">
                                                              <td><span class="text-success" style="font-size: 12px;"><?php echo  $ssctitle ?></span></td>
                                                                   <?php 
                                                                }
                                                             }
                                                
                                                    }else {

                                                                    ?>
                                                                    <tr >
                                                               <td><i class="fas fa-check-circle text-success"></i></td>
                                                                   <?php
                                                    }

                                      				?>
                                      				
                                          
                                            <td><?php echo $studemail ?></td>
                                            <td><?php echo $student_fname.' '.$student_mname.' '.$student_lname ?></td>
                                            <td>
                                            
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
                                            </td>
                                           
                                        </tr>
                                      				<?php


                                      		 }
                                      	
                                      	 }else {
                                      	 	if($k == 'c'){
                                      	 			?>
                                      	 	<tr>
                                      	 		<td colspan="4"><h6 style="text-align:center;font-size:13px" >No Student Records Found </h6></td>
                                      	 	</tr>
                                      	 	<?php
                                      	 	}else {
                                      	 				?>
                                      	 	<tr>
                                      	 		<td colspan="4"><h6 style="text-align:center;font-size:13px" >No Student Records Found keyword : <span class="text-danger"> <?php echo $skey ?></span></h6></td>
                                      	 	</tr>
                                      	 	<?php
                                      	 	}
                                      	 
                                      	 }

                                      	 ?>
                                        
                                     
											<?php

											}



                                			 ?>
 									</tbody>
                                    </table>
                                 	   <h6 style="font-size: 13px"><?php echo count($selected) ?> Students</h6>
                                		</div>
                                		<div class="col-md-5">
                                			<h6 style="font-size:13px"><i class="fas fa-info-circle"></i> Select Schedules Below.</h6>
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
                                                                    <button class="btn btn-light text-primary selsched" data-sid="<?php echo $row['sched_id'] ?>" style="float:right; font-size: 13px">Select</button>
                                                                <?php
                                                               }else if(date('Y-m-d') < $row['date_valid']) {
                                                                 ?>
                                                                  <span class="badge badge-warning">Inactive</span>   
                                                                    <button class="btn btn-light text-primary selsched" data-sid="<?php echo $row['sched_id'] ?>" style="float:right; font-size: 13px">Select</button>

                                                                <?php
                                                               }else {
                                                                        $check_scheduledone = "select * from counseling_request where status = 5 and sched_id = '$sid'  ";
                                                                     $requestdone = mysqli_query($con,$check_scheduledone); 
                                                                     $countrequest_done= mysqli_num_rows($requestdone);

                                                                     while($rq = mysqli_fetch_array($requestdone)){
                                                                            $rqd = $rq['sched_id'];                 
                                                                          }
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
                                                                 if($row['status'] == 0 ){
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

 
    <script type="text/javascript">
      
      $(document).ready(function() {

        $('.selsched').click(function(){
            var sid = $(this).data('sid');
             $.ajax({
             url : "set.php",
              method: "POST",
             data  : {set_many:1,sid:sid},
              success : function(data){
             
              window.location.href="index.php";


               }
             })
                          
        })

      	$('#cancel').click(function(){
      		 $.ajax({
      		 url : "action.php",
      		  method: "POST",
      		 data  : {endsession:1},
      		  success : function(data){
      		 	window.location.href='index.php';
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