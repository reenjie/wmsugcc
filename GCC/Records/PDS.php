<?php 
session_start();
 include '../create_form/connect.php';
  if(!isset($_SESSION['admingcc_token'])) {
    header("location:../../session_end.html");
  }
  

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
                        <h1 class="h3 mb-0 text-gray-800">Records</h1>
                       <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->

                               

                    </div>
                   

                     
                



<style type="text/css">
    #ann_con{
        height: 350px;
        overflow-y: scroll;
    }

    #custombar::-webkit-scrollbar {
  width: 4px;
  height: 4px;

  }
    #ann_con::-webkit-scrollbar {
  
  width: 4px;
}

/* Track */
#ann_con::-webkit-scrollbar-track {
  background: #d7faed; 
}
 
/* Handle */
#ann_con::-webkit-scrollbar-thumb {
  background: #298a67; 
}

/* Handle on hover */
#ann_con::-webkit-scrollbar-thumb:hover {
  background: #30936f; 
}

 #eventcon{
        height: 350px;
        overflow-y: scroll;
    }
     #eventcon::-webkit-scrollbar {
  width: 4px;
}

/* Track */
 #eventcon::-webkit-scrollbar-track {
  background: #d7faed; 
}
 
/* Handle */
 #eventcon::-webkit-scrollbar-thumb {
  background: #298a67; 
}

/* Handle on hover */
 #eventcon::-webkit-scrollbar-thumb:hover {
  background: #30936f; 
}
#newsfeedcontent{
      height:420px;
        overflow-y: scroll;
}
  #newsfeedcontent::-webkit-scrollbar {
  width: 4px;
}

/* Track */
#newsfeedcontent::-webkit-scrollbar-track {
  background: #d7faed; 
}
 
/* Handle */
 #newsfeedcontent::-webkit-scrollbar-thumb {
  background: #298a67; 
}

/* Handle on hover */
 #newsfeedcontent::-webkit-scrollbar-thumb:hover {
  background: #30936f; 
}
</style>
                
                 
                   
             
                     
                    
                    <!-- Content Row -->

                     <div class="row">
                     	<div class="container">
                     		<nav aria-label="breadcrumb">
							  <ol class="breadcrumb">
							    <li class="breadcrumb-item " ><a href="../Records">Shifting Request</a></li>
							    <li class="breadcrumb-item active" aria-current="page" >Personal Data Sheets</li>
							    <li class="breadcrumb-item"><a href="shifting_form.php">Shifting Forms</a></li>
							   
							     <li class="breadcrumb-item"><a href="counseling.php">Counseling</a></li>
                    <li class="breadcrumb-item"><a href="colleges/">Colleges</a></li>
							    <li class="breadcrumb-item"><a href="coordinator.php">Coordinator Accounts</a></li>
							    <li class="breadcrumb-item"><a href="logs.php">Logs</a></li>
                    <li class="breadcrumb-item"><a href="filter.php">Filtering</a></li>
							   
							  </ol>
							</nav>
                     	  <div class="card shadow mb-2">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Personal Data Sheets</h6>
                                </div>
                                <div class="card-body" style="font-size: 14px">

                                

                                 <?php $pds=0; include 'advsorting.php'; ?>


                                 <div class="container table-responsive" id="contentss" >
                                  
                                          <table class="table table-striped table-hover table-sm" id="pdstable">
                              <thead >
                                <tr class="table-success" id="pdstableheader" >
                                
                                  <th scope="col">ID </th>
                                  <th scope="col">Lastname</th>
                                  <th scope="col">Firstname</th>
                                  <th scope="col">Middlename</th>
                                  <th scope="col">Email</th>
                                  <th scope="col">Course and College</th>
                                  <!--<th scope="col" >Date submitted</th>
                                  <th scope="col" >Last Modified</th>-->
                                  <th scope="col">Action</th>
                                </tr>
                              </thead>
                              <tbody id="tablecontents">

                                <?php 

   // include '../encrypt/sfgcc.php';
    //$enc =  new encryptdata();
                                   if(isset($_GET['rdct'])){
                  $sortby = $_GET['sort_by_college'];
                   $sql = " SELECT * FROM `student` where stud_college = '$sortby' ";
                }else {
                     $sql = " SELECT * FROM `student` ";
                }

                                   
                      $result = mysqli_query($con,$sql); 
                   
                     $checkchanges = " SELECT * FROM `form` where class_name='62'  ";
                                                    $resultcheckchanges = mysqli_query($con,$checkchanges); // run query
                                                    $countcheckchanges= mysqli_num_rows($resultcheckchanges); // to count if necessary
                                                   //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if 
                                                     while($cc = mysqli_fetch_array($resultcheckchanges)){
                                                     $form_id = $cc['form_id'];
                                                     $formcontent[] = $cc['content'];
                                        
              
                                                     }
                                                        $notsame=false;
                                $formuptt = false;
                                $formupttq = false;//used
                                 $formupttqs = false;
                                 $thereschange = false;//used
                
                     
                       while($row = mysqli_fetch_array($result)){
                          $studentid = $row['stud_id'];
                          $student_lname = $row['stud_lname'];
                          $student_fname = $row['stud_fname'];
                          $student_mname = $row['stud_mname'];
                          $student_email = $row['stud_email'];
                          $retake = $row['retake'];
                          $modify = $row['modify'];
                          $upt = $row['upt'];
                          $courseid = $row['stud_course'];
                          $collegeid = $row['stud_college'];
                         $studemail = substr($student_email, 0, strpos($student_email,'@'));
        $sqls = " select * from form_response where userid='$studentid' and csformid = '62' ";
                                          $results = mysqli_query($con,$sqls); 
                                          $counts= mysqli_num_rows($results); 
                                   


                                       if ($counts>=1){
                                        
                                           while($rows = mysqli_fetch_array($results)){
                                          $csform= $rows['csformid'];
                                          $user[] = $rows['userid'];
                                          $respondedat = $rows['datecreated'];
                                          //$contentofreponse[] = $rows['content'];

                                          $idforfiles[]= $rows['formid'];



                                          $respo = date('Y-m-d',strtotime($respondedat));
                                           }

                                           
  
                          //    $formid = $enc -> encryption($csform,"gccformtoken"); 
                            //  $studentids = $enc -> encryption($studentid,"gccstudenttoken");
   
                                         $studcount[] = $studentid;
                                        


                                           
                                           ?>
                                             <tr id="tablerows<?php echo $studentid ?>" class="tablerows">

                                

                                 <td style="font-weight: bolder"><?php echo $studemail ?></td>
                                  <td><?php echo $student_lname ?></td>
                                  <td><?php echo $student_fname ?></td>
                                  <td><?php echo $student_mname ?></td>
                                  <td><?php echo $student_email ?></td>
                                  <td>
                                     <?php 
                                     $getcourses = "select * from course where courseid = '$courseid'  ";
                                      $getstudent_course = mysqli_query($con,$getcourses); 
                                    
                                    while($gcourse = mysqli_fetch_array($getstudent_course)){
                                              echo $gcourse['course'];   
                                              $collegeid = $gcourse['CollegeId'];

                                      }
                                        $getcolleges = "select * from colleges where CollegeId = '$collegeid'  ";
                                         $stud_college = mysqli_query($con,$getcolleges); 
                                        
                                       while($gcollege = mysqli_fetch_array($stud_college)){
                                             echo '<br> ('.$gcollege['college'].')';     
                                         }
                                      
                                       
                                   
                                    

                                    ?>

                                  </td>
                                 <!-- <td><?php echo date('Y-m-d') ?></td>
                                  <td><?php echo date('Y-m-d') ?></td>-->
                                  <td>
                                    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">

                                      <?php 

                                      foreach ($idforfiles as $key => $value) {
                                        $getfileifexist = " select * from form where form_id = '$value' and type = 'file'  ";
                                                      $gettingfiles = mysqli_query($con,$getfileifexist); 
                                                      $countingifexist= mysqli_num_rows($gettingfiles);
                                                     //  $get_id =  mysqli_insert_id($con); 
                                               if ($countingifexist>=1){
                                                    
                                                   $fileexist=1;
                                                      
                                                }else {

                                                }
                                      }
                                         

                                      if(isset($fileexist)){

                                        include 'files1.php';

                                      }

                                        $check_formupts = "select form_id,type,sec_no,class_name from form where class_name='62' and type in ('Question','file','list') and form_id not in (select formid from form_response where csformid ='62' and userid = '$studentid')  ";
                           $chkingformupts = mysqli_query($con,$check_formupts); 
                           $countingdata= mysqli_num_rows($chkingformupts);
                          
                          if($countingdata >=1){
                            
                              ?>
                                <button type="button" class="btn btn-light notifystudenttoupdate" data-nameonly="<?php echo $student_fname?>" data-fullname="<?php echo $student_lname.' '.$student_fname.' '.$student_mname  ?>" data-email ="<?php echo $student_email  ?>" data-st ='Update' data-submitted= "<?php echo $respo ?>" data-studentid = "<?php echo $studentid ?>"    style="font-size: 12px"><i class="fas fa-exclamation-triangle text-danger"></i></button>
                              <?php
                        
                          }else {
                            
                            if($retake == 1){
                              ?>
                                <button type="button" class="btn btn-light notifystudenttoupdate" data-nameonly="<?php echo $student_fname?>" data-fullname="<?php echo $student_lname.' '.$student_fname.' '.$student_mname  ?>" data-email ="<?php echo $student_email  ?>" data-st ='Retake' data-submitted= "<?php echo $respo ?>" data-studentid = "<?php echo $studentid ?>"    style="font-size: 12px"><i class="fas fa-exclamation-triangle text-danger"></i></button>
                              <?php
                            }else if ($modify == 1 ){
                                ?>
                                <button type="button" class="btn btn-light notifystudenttoupdate" data-nameonly="<?php echo $student_fname?>" data-fullname="<?php echo $student_lname.' '.$student_fname.' '.$student_mname  ?>" data-email ="<?php echo $student_email  ?>" data-st ='Update' data-submitted= "<?php echo $respo ?>" data-studentid = "<?php echo $studentid ?>"    style="font-size: 12px"><i class="fas fa-exclamation-triangle text-danger"></i></button>
                              <?php
                            }else if ($upt == 1 ){
                                ?>
                                <button type="button" class="btn btn-light notifystudenttoupdate" data-nameonly="<?php echo $student_fname?>" data-fullname="<?php echo $student_lname.' '.$student_fname.' '.$student_mname  ?>" data-email ="<?php echo $student_email  ?>" data-st ='Update' data-submitted= "<?php echo $respo ?>" data-studentid = "<?php echo $studentid ?>"    style="font-size: 12px"><i class="fas fa-exclamation-triangle text-danger"></i></button>
                              <?php
                            }else {

                              
                              ?>

                                  <button type="button" class="btn btn-light" onclick="window.open('view.php?student-pds&pdstoken=62&id=<?php echo $studentid?>&studenttokenid=<?php echo $studentid ?>')" style="font-size: 12px"><i class="far fa-eye text-primary"></i></button>
                               
                          <button type="button" class="btn btn-light" onclick="window.open('print.php?student-pds&pdstoken=62&id=<?php echo $studentid?>&studenttokenid=<?php echo $studentid ?>')" style="font-size: 12px"><i class="fas fa-print text-info"></i></button>

                                <?php
                            }
                          
                            
                          }

                                
                              ?>
                            
                         
                        </div>
                                  </td>
                                 
                                </tr>
                                


   
                                            <?php

                                    }else {
                                     // echo 'no data';
                                    }
                                }

                                 ?>
                               

                             
                                   

                                

                              </tbody>
                            </table>  


                                     

                                </div>


                            </div>

                     		</div>

                     		<div class="card mt-2 mb-2">
                     			
                     			<div class="card-body">
                     				
                     			</div>
                     		</div>





                     	</div>
                        
                     </div> 

              
                      
                     

               
                    </div> 

              
              </div>

            </div>

             
     <script src="../../js/jquery.js"></script>
                        <link rel="stylesheet" type="text/css" href="../../offline/datatable.css"/>
 
<script type="text/javascript" src="../../offline/datatable.js"></script>






                          
           
                <script type="text/javascript">
                      $(document).ready(function() {
                                let table = new DataTable('#pdstable', {
      
                         "search": {
                        "caseInsensitive": false
                      }

                    });



              $('#approveshiftingforms').on('submit', function(event){
                 event.preventDefault();
                  var atLeastOneIsChecked = $('input[name="approvedcheck[]"]:checked').length > 0;
                 if(atLeastOneIsChecked == false){
                 Swal.fire(
                'Selection is Empty!',
                '',
                'error'
              )
                 }else {
                  Swal.fire({
                        title: 'Are you sure?',
                        text: "You want to approved all forms of selected students?",
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#f6c23e',
                        cancelButtonColor: '#858796',
                        confirmButtonText: 'Yes, approve it!'
                      }).then((result) => {
                        if (result.isConfirmed) {
                            var xhttp = new XMLHttpRequest();

                                          xhttp.onreadystatechange = function() {
                                           if (this.readyState == 4 && this.status == 200) {
                                          const data = this.responseText;
                                         
                                        Swal.fire(
                          'Approved!',
                          'Student form approved successfully!',
                          'success'
                        ).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) {
                         location.reload();
                            } 
                          })
                                                                      
                                        
                                                       }
                                                    };
                                            xhttp.open("POST", $('#approveshiftingforms').attr('action'),true);
                                            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                                            xhttp.send($('#approveshiftingforms').serialize());
                        }
                      })
                
                 }
                       /* $.ajax({
                                 url : "destination.php",
                                  method: "POST",
                                   data  : $(this).serialize(),
                                   success : function(data){
                      
                                   }
                                })*/
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
                    advancesearchcontent();
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

                      $('.art').click(function() { 
                           $('#cont1').addClass('show');  
                           $('#cont1').addClass('active'); 
                           $(this).addClass('active');
                            $('#cont2').removeClass('show');  
                           $('#cont2').removeClass('active'); 
                           $('.peer').removeClass('active');
                         
                          })  
                          $('.peer').click(function() { 
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

   

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
     

<?php
include '../Dashboard/logoutmodal.php'; 
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
    <script type="text/javascript">
          $(document).ready(function() {
              if($(window).width() <= 768){
               $('#accordionSidebar').addClass('toggled');
              }
        
          });
    </script>
  


</body>

</html>