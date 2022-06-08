<?php 
session_start();
  if(!isset($_SESSION['admingcc_token'])) {
    header("location:../../session_end.html");
  }
  

  if(isset($_SESSION['first_time_login'])){
    include 'ft.php';
  }

 
 include '../create_form/connect.php';

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
							    <li class="breadcrumb-item"><a href="PDS.php">Personal Data Sheets</a></li>
							    <li class="breadcrumb-item"><a href="shifting_form.php">Shifting Forms</a></li>
							 
							     <li class="breadcrumb-item"><a href="counseling.php">Counseling</a></li>
                                  <li class="breadcrumb-item"><a href="colleges/">Colleges</a></li>
							    <li class="breadcrumb-item"><a href="coordinator.php">Coordinator Accounts</a></li>
							    <li class="breadcrumb-item"><a href="logs.php">Logs</a></li>
                                <li class="breadcrumb-item active">Filtering</li>
							   
							  </ol>
							</nav>
                     	  <div class="card shadow mb-2">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Filtering Settings <i class="fas fa-cogs"></i></h6>
                                </div>
                                <div class="card-body" style="font-size: 14px">
                                 <div class="container table-responsive mb-5" id="contentss" >
                                  <button class="btn btn-light text-danger mb-2" id="resetsettings" style="font-size:12px">Reset </button>
                                    
                                    
                                    <div class="row">
                                        <div class="col-md-12 mb-2">

                                            <div class="card shadow border-light">
                                                <div class="card-body">
                                                    
                                               
                                            <h6 class="font-weight-bold " style="text-align: center;">Summer</h6>
                                            <hr>
                                           <div class="row">
                                               <div class="col-md-5">
                                                <?php 
                                                    $getsummer = "select * from sem_year   ";
                                                     $gettingsummerto_From = mysqli_query($con,$getsummer); 
                                                   
                                                 while($row = mysqli_fetch_array($gettingsummerto_From)){
                                                    $sy = $row['sy_id'];
                                                    $ms = $row['month_start'];
                                                    $me = $row['month_end'];

                                                   

                                                    if($sy == 1){
                                                         if($ms != 'Select' && $me != 'Select'){
                                                        ?>
                                                         <script src="../../js/jquery.js"></script>
                                                        <script type="text/javascript">
                                                              $(document).ready(function() {
                                                                  
                                                             $('.s1').attr('disabled',true);
                                                              });
                                                           
                                                        </script>
                                                        <?php
                                                    }
                                                        $summer_from = $row['month_start'];   
                                                        $summer_end  = $row['month_end'];    
                                                        $m1_s = $row['m_start'];
                                                        $m1e_s = $row['m_end'];
                                                    }else if ($sy == 2){
                                                           if($ms != 'Select' && $me != 'Select'){
                                                        ?>
                                                        <script src="../../js/jquery.js"></script>
                                                        <script type="text/javascript">
                                                              $(document).ready(function() {
                                                                  
                                                             $('.s2').attr('disabled',true);
                                                              });
                                                           
                                                        </script>
                                                        <?php
                                                    }
                                                         $firstsem_from = $row['month_start'];   
                                                        $firstsem_end  = $row['month_end'];   
                                                        $m2_s = $row['m_start'];
                                                        $m2e_s = $row['m_end'];
                                                    }else if ($sy == 3){
                                                           if($ms != 'Select' && $me != 'Select'){
                                                        ?>
                                                          <script src="../../js/jquery.js"></script>
                                                        <script type="text/javascript">
                                                              $(document).ready(function() {
                                                                  
                                                             $('.s3').attr('disabled',true);
                                                              });
                                                           
                                                        </script>
                                                        <?php
                                                    }
                                                        $secondsem_from = $row['month_start'];   
                                                        $secondsem_end  = $row['month_end']; 
                                                        $m3_s = $row['m_start'];
                                                        $m3e_s = $row['m_end'];  
                                                    }


                                                          


                                                     }
                                                
                                                 
                                                 ?>

                                                <h6 style="font-size:12px"> The Month Of : </h6>
                                                   <select class="form-control savechanges s1" data-id="1" data-ini="start"   style="font-size:13px;text-align: center;" >   
                                                    <option value="<?php echo $summer_from ?>"><?php echo $summer_from ?></option>
                                                 
                                                      <?php 
                                                          $months = "select * from months where mid not in (select mid from months where mid BETWEEN '$m1_s' and '$m1e_s' or mid BETWEEN '$m2_s' and '$m2e_s' or mid BETWEEN '$m3_s' and '$m3e_s' )   ";
                                                           $gettingmonths = mysqli_query($con,$months); 
                                                         
                                                       while($row = mysqli_fetch_array($gettingmonths)){
                                                        $mid = $row['mid'];

                                                             ?>
                                                              <option value="<?php echo $row['mid'] ?>"><?php echo $row['month'] ?></option>
                                                              <?php               
                                                           }
                                                      
                                                       
                                                       ?>
                                                   </select>
                                               </div>
                                               <div class="col-md-2" style="text-align:center;">To</div>
                                               <div class="col-md-5">
                                                  <h6 style="font-size:12px"> The Month Of : </h6>
                                                   <select class="form-control savechanges s1" data-id="1" data-ini="end"  style="font-size:13px;text-align: center;">
                                                      <option value="<?php echo $summer_end ?>"><?php echo $summer_end ?></option>
                                                 <?php 
                                                          $months = "select * from months where mid not in (select mid from months where mid BETWEEN '$m1_s' and '$m1e_s' or mid BETWEEN '$m2_s' and '$m2e_s' or mid BETWEEN '$m3_s' and '$m3e_s' )   ";
                                                           $gettingmonths = mysqli_query($con,$months); 
                                                         
                                                       while($row = mysqli_fetch_array($gettingmonths)){
                                                        $mid = $row['mid'];

                                                             ?>
                                                              <option value="<?php echo $row['mid'] ?>"><?php echo $row['month'] ?></option>
                                                              <?php               
                                                           }
                                                      
                                                       
                                                       ?>
                                                   </select>
                                               </div>
                                           </div>

                                            </div>
                                            </div>

                                        </div>
                                        <div class="col-md-12 mb-2">

                                            <div class="card shadow border-light">
                                                <div class="card-body">
                                                    
                                                
                                           
                                            <h6 class="font-weight-bold " style="text-align: center;">First Semester</h6>
                                            <hr>
                                            <div class="row">
                                               <div class="col-md-5">
                                                  <h6 style="font-size:12px"> The Month Of : </h6>
                                                   <select class="form-control savechanges s2" data-id="2" data-ini="start" style="font-size:13px;text-align: center;" >
                                                    <option value="<?php echo $firstsem_from ?>"><?php echo $firstsem_from ?></option>
                                                      <?php 
                                                          $months = "select * from months where mid not in (select mid from months where mid BETWEEN '$m1_s' and '$m1e_s' or mid BETWEEN '$m2_s' and '$m2e_s' or mid BETWEEN '$m3_s' and '$m3e_s' )   ";
                                                           $gettingmonths = mysqli_query($con,$months); 
                                                         
                                                       while($row = mysqli_fetch_array($gettingmonths)){
                                                        $mid = $row['mid'];

                                                             ?>
                                                              <option value="<?php echo $row['mid'] ?>"><?php echo $row['month'] ?></option>
                                                              <?php               
                                                           }
                                                      
                                                       
                                                       ?>
                                                   </select>
                                               </div>
                                               <div class="col-md-2" style="text-align:center;">To</div>
                                               <div class="col-md-5">
                                                  <h6 style="font-size:12px"> The Month Of : </h6>
                                                   <select class="form-control savechanges s2" data-id="2" data-ini="end" style="font-size:13px;text-align: center;" >
                                                    <option value="<?php echo $firstsem_end ?>"><?php echo $firstsem_end ?></option>
                                                      <?php 
                                                          $months = "select * from months where mid not in (select mid from months where mid BETWEEN '$m1_s' and '$m1e_s' or mid BETWEEN '$m2_s' and '$m2e_s' or mid BETWEEN '$m3_s' and '$m3e_s' )   ";
                                                           $gettingmonths = mysqli_query($con,$months); 
                                                         
                                                       while($row = mysqli_fetch_array($gettingmonths)){
                                                        $mid = $row['mid'];

                                                             ?>
                                                              <option value="<?php echo $row['mid'] ?>"><?php echo $row['month'] ?></option>
                                                              <?php               
                                                           }
                                                      
                                                       
                                                       ?>
                                                   </select>
                                               </div>
                                           </div>

                                           </div>
                                        </div>


                                      
                                            
                                        </div>
                                        <div class="col-md-12">

                                            <div class="card shadow border-light">
                                                <div class="card-body">
                                                    

                                               
                                        
                                            <h6 class="font-weight-bold " style="text-align: center;">Second Semester</h6>
                                            <hr>
                                          <div class="row">
                                               <div class="col-md-5">
                                                  <h6 style="font-size:12px"> The Month Of : </h6>
                                                   <select class="form-control savechanges s3" data-id="3" data-ini="start"  style="font-size:13px;text-align: center;">
                                                    <option value="<?php echo $secondsem_from ?>"><?php echo $secondsem_from ?></option>
                                                        <?php 
                                                          $months = "select * from months where mid not in (select mid from months where mid BETWEEN '$m1_s' and '$m1e_s' or mid BETWEEN '$m2_s' and '$m2e_s' or mid BETWEEN '$m3_s' and '$m3e_s' )   ";
                                                           $gettingmonths = mysqli_query($con,$months); 
                                                         
                                                       while($row = mysqli_fetch_array($gettingmonths)){
                                                        $mid = $row['mid'];

                                                             ?>
                                                              <option value="<?php echo $row['mid'] ?>"><?php echo $row['month'] ?></option>
                                                              <?php               
                                                           }
                                                      
                                                       
                                                       ?>
                                                   </select>
                                               </div>
                                               <div class="col-md-2" style="text-align:center;">To</div>
                                               <div class="col-md-5">
                                                  <h6 style="font-size:12px"> The Month Of : </h6>
                                                   <select class="form-control savechanges s3" data-id="3" data-ini="end"  style="font-size:13px;text-align: center;">
                                                    <option value="<?php echo $secondsem_end ?>"><?php echo $secondsem_end ?></option>
                                                       <?php 
                                                          $months = "select * from months where mid not in (select mid from months where mid BETWEEN '$m1_s' and '$m1e_s' or mid BETWEEN '$m2_s' and '$m2e_s' or mid BETWEEN '$m3_s' and '$m3e_s' )   ";
                                                           $gettingmonths = mysqli_query($con,$months); 
                                                         
                                                       while($row = mysqli_fetch_array($gettingmonths)){
                                                        $mid = $row['mid'];

                                                             ?>
                                                              <option value="<?php echo $row['mid'] ?>"><?php echo $row['month'] ?></option>
                                                              <?php               
                                                           }
                                                      
                                                       
                                                       ?>
                                                   </select>
                                               </div>
                                           </div>

                                            </div>
                                            </div>
                                            



                                        </div>

                                    </div>



                                     

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
            <script src="../../offline/sweetalert.js"></script>
                <script type="text/javascript">
                      $(document).ready(function() {

                        $('.savechanges').change(function(){
                            var id = $(this).data('id');
                            var ini = $(this).data('ini');
                            var mid = $(this).val();


                             $.ajax({
                             url : "reset.php",
                              method: "POST",
                             data  : {setsched:id,ini:ini,mid:mid},
                              success : function(data){
                               location.reload();                               }
                             })


                                          
                        })
                              

                                $('#resetsettings').click(function(){
                                    
                                      Swal.fire({
                        title: 'Are you sure?',
                        text: "Action cannot be Undone!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#858796',
                        confirmButtonText: 'Yes, Reset!'
                      }).then((result) => {
                        if (result.isConfirmed) {

                             $.ajax({
                             url : "reset.php",
                              method: "POST",
                             data  : {reset:1},
                              success : function(data){
                                
                                    Swal.fire(
                          'Semester Configuration Reset!',
                          'Configuration Reset Successfully!',
                          'success'
                        ).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) {
                         location.reload();
                            } 
                          })
                               }
                             })
                         
                                         
                   
                                                                      
                       
                        }
                      })


                                })


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




                      });
                      
                     
                                     
                            
                    </script>

         
            <script type="text/javascript">
                
                $(document).ready(function() {
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