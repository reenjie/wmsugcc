<?php 
session_start();
  if(!isset($_SESSION['admingcc_token'])) {
    header("location:../../session_end.html");
  }
  

  if(isset($_SESSION['first_time_login'])){
    if(isset($_SESSION['access_token'])){
        unset($_SESSION['first_time_login']);
    }else {
         include 'ft.php';
    }

   
  }


  include '../create_form/connect.php';
date_default_timezone_set('Asia/Manila');
$datenow = date('Y-m-d');
$time = date('H');

      $chipuserid = $_SESSION['admingcc_token'];                           

    $admin = "select * from administrator where admin_id = '$chipuserid' ";

                                                    $resultcheck = mysqli_query($con,$admin); 
                                                    $countadmin= mysqli_num_rows($resultcheck); 
                                                
                                            
                                                 
                                                     while($row = mysqli_fetch_array($resultcheck)){
                                                   
                                                        $user = $row['admin_fname'].' '.$row['admin_lname'];
                                        
                                                     }

if($time < 12){
    $greetings = 'Good Morning '.$user.' !';
    $ff = 'Have a Great Day Ahead! ツ .';
}else if($time < 18){
    $greetings = 'Good Afternoon '.$user.' !';
    $ff = 'Awesome Day, Dont skip your Lunch ツ . ';
}else if ($time >= 18){
$greetings = 'Good Evening '.$user.' !';
$ff = 'Have a great Evening , Dont Forget your Dinner ツ .';


}




        if(!isset($_SESSION['donegreetings'])){
                    $_SESSION['donegreetings'] = 1;
                        ?>
                    <div class="alert alert-success alert-dismissible"  role="alert" data-dismiss="alert" style="position: fixed;z-index: 1; right: 30px; top:50px;align-items:center;width: auto; cursor: pointer;">
                        <div  style="display: flex; padding:5px; margin-right:-50px">
                              <h6 style="text-align:center;">
                                <strong><?php echo $greetings ?></strong>
                                <br>
                                <span style="font-size:13px"><?php echo $ff ?></span>
                                <br><br>
                                <span style="font-size:11px;">[ Close ]</span>
                            </h6>
                        </div>
                          
                    </div>
                    <?php

                }else {

                }

 

 

 ?>
<!DOCTYPE html>
<html lang="en">
    

 <?php include '../include/assets/head.php';?>
<body id="page-top" class="sidebar-toggled">

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
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                         <button class="btn text-dark border-dark mb-2" id="generate" onclick="window.location.href='generate.php'" style="">GENERATE A REPORT</button>
                       <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
                    </div>

                     
                



<style type="text/css">
    #generate {
        width: auto;float: right;font-size: 13px;
    }

    @media screen and (max-width : 768px){
        #generate{
            float: none;
        }
    }
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

                       <div class="col-xl-8">
                          
                           <div class="row">
                               <div class="col-xl-6 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2" style="cursor: pointer;" >
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                              Completed and Pending </div>
                                            <div class="h5 mb-0 font-weight-bold text-primary">
                                               Personal Data Sheets
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                          <?php 
                                          if(isset($_GET['pendingpds'])){
                                              ?>
                                            <i class="fas fa-check-circle fa-2x text-gray-300"></i>
                                            <?php
                                          }else {
                                            ?>
                                            <i class="fas fa-check-circle fa-2x text-success"></i>
                                            <?php
                                          }

                                           ?>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                           <!-- Pending Requests Card Example   onclick="window.location.href='../Manage_pds/?viewresponse' "-->
                        <div class="col-xl-6 col-md-6 mb-4" >

                          <a href="#columnchart_values1" id="lnk" style="text-decoration: none;cursor:pointer;" >
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body" id="adasdad">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1" id="textshift">
                                               Shifting Request</div>
                                            <div class="h5 mb-0 font-weight-bold text-danger">
                                              
                                              <?php 
                                                include '../create_form/connect.php';

                                                    $studentdata = " select * from student  ";
                                                                $resultstudents = mysqli_query($con,$studentdata); // run query
                                                               $sd = [];
                                                                 while($row = mysqli_fetch_array($resultstudents)){
                                                                  $studentid = $row['stud_id'];
                                            $countrespo="select * from form_response where userid='$studentid' and csformid = '60' and status = 'For Approval' ";
                                                                      $resultstudentrespo = mysqli_query($con,$countrespo);
                                                                          $countrespo= mysqli_num_rows($resultstudentrespo);

                                                                          if($countrespo >=1 ){
                                                                            $sd[] =  0;

                                                                           while($rows = mysqli_fetch_array($resultstudentrespo)){ 
                                                                           $crespo[] = $rows['userid'];
                                                                           }
                                                                           }
                                                                          
                                                                 }
                                                               

                                                                  if(count($sd) >=1){
                                                                   ?>
                                                                   <span class="badge badge-danger"><?php echo count($sd) ?></span>
                                                                 <script src="../../js/jquery.js"></script>
                                                                  <script src="../../offline/sweetalert.js"></script>
                                                                  <script type="text/javascript">
                                                                    
                                                                    $(document).ready(function() {
                                                                            $('#adasdad').attr('style','background-color:#edb8be');
                                                                            $('#textshift').removeClass('text-warning');
                                                                             $('#textshift').addClass('text-light');
                                                                             $('#textshift').attr('style','font-size:15px;font-weight:bolder');
                                                                                $('#lnk').attr('onclick','window.location.href="../Records/"');
                                                                                $('#lnk').removeAttr('href');
                                                                          

                                                                
                                                                          });      
                                                                          
                                                                  </script>
                                                                   <?php

                                                                   if(isset($_SESSION['Request_alert!'])){
                                                                        ?>
                                                                        <script type="text/javascript">
                                                               Swal.fire({
                                                                position: 'top',
                                                                icon: 'warning',
                                                                title: 'Request alert!',
                                                                text:'A shifting request was detected.',
                                                                showConfirmButton: true,
                                                                padding:'1%',
                                                                width: '380px',
                                                                background:'#f7f0f1' 
                                                               
                                                              })
                                                                        </script>
                                                                        <?php
                                                                        unset($_SESSION['Request_alert!']);
                                                                   }
                                                                  }else {
                                                                 
                                                                  }
                                                          
                                               ?>

                                            </div>
                                        </div>
                                        <div class="col-auto">

                                            <i class="fas fa-envelope-open-text fa-2x text-gray-300" ></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>

                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-6 col-md-6 mb-4">

                            <a href="../Services/" style="text-decoration: none; cursor: pointer;">
                            <div class="card border-left-success shadow h-100 py-2"  >
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                             Counseling</div>
                                            <div class="h5 mb-0 font-weight-bold text-secondary">
                                            <span style="font-size:12px" >Scheduler</span>
                                            </div>
                                        </div>

                                        <div class="col-auto">
                                           

                                           <i class="fas fa-clock fa-2x text-gray-300"></i>

                                       
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>

                        </div>

                           <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-6 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2" style="cursor: pointer;" onclick="window.location.href='session.php?redirect' ">
                                <div class="card-body" id="refff">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1" id="textref">
                                              REFERRALS 

                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h6 mb-0 mr-3 font-weight-bold text-gray-800">
                                                        
                                                    </div>
                                                </div>
                                                  <div class="h5 mb-0 font-weight-bold text-danger">
                                                     <?php 
                                                                          ;
                                                                             $countreferralsi = "SELECT * FROM `referral_history` where status='1' ";
                                                                              $allreferalsi = mysqli_query($con,$countreferralsi); 
                                                                              $countingrefi= mysqli_num_rows($allreferalsi);
                                                                          

                                                                             if($countingrefi >=1){
                                                                                   ?>
                                                                                   <span class="badge badge-danger"><?php echo $countingrefi ?> </span>
                                                                                    <script src="../../js/jquery.js"></script>
                                                                  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                                               
                                                                  <script type="text/javascript">
                                                                    
                                                                    $(document).ready(function() {
                                                                            $('#refff').attr('style','background-color:#edb8be');
                                                                            $('#textref').removeClass('text-info');
                                                                             $('#textref').addClass('text-light');
                                                                             $('#textref').attr('style','font-size:15px;font-weight:bolder');
                                                                          

                                                                 Swal.fire({
                                                                position: 'top',
                                                                icon: 'warning',
                                                                title: 'New Referral!',
                                                                text:'A New Referral received.',
                                                                showConfirmButton: true,
                                                                padding:'1%',
                                                                width: '380px',
                                                                background:'#f7f0f1' 
                                                               
                                                              })
                                                                          });      
                                                                          
                                                                  </script>
                                                                   <?php
                                                                             }
                                                                           

                                                                          ?>
                                                
                                                </div>
                                               
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                           

                                            <i class="fas fa-asterisk fa-2x text-gray-300"></i>
                                        </div>


                                    </div>
                                     <span style="font-size:12px">On records : <span class="" style="font-size:15px">
                                                    <?php 
                                                     $countreferralsie = "SELECT * FROM `referral_history` where status != 0 and status !=1 ";
                                                                              $allreferalsie = mysqli_query($con,$countreferralsie); 
                                                                              $countingrefie= mysqli_num_rows($allreferalsie);
                                                                             echo $countingrefie;

                                                     ?>
                                                     <span class="text-primary" style="font-size:13px">View all</span>

                                            </span></span>

                                </div>
                            </div>
                        </div>
                        
                       
                           </div> 
                           


                     


                       </div> 

                       <div class="col-xl-4">
                         

                           <div class="card shadow">
                              <div class="card-body">


                                 
           
              <script src="https://cdn.logwork.com/widget/text.js"></script>
<a href="https://logwork.com/current-time-in-zamboanga-city-philippines-zamboanga" class="clock-widget-text" data-timezone="Asia/Manila" data-language="en" data-textcolor="#77b3d1">WMSU </a>
           
           

                              </div> 
                              
                           </div> 
                       </div> 

                     


                     
                        <!-- Earnings (Monthly) Card Example -->
                      

                     






                    </div>
                    

                                <?php 
                                if(isset($_GET['sort_pds'])){
                                    $sort = $_GET['sort'];
                                    $sem = $_GET['sem'];
                                    $yr = $_GET['yr'];


                                }

                                 ?>
    
                                     <div class=" mb-3">
                                    <div class="card shadow">
                                      <h6 style="font-size:13px" class="font-weight-bold py-2 px-2"></h6>

                                      <div class="card-body">
                                        
                                    
                                    <div class="row">
                                      <div class="col-md-4">
                                  <select class="form-control" id="sorting_" style="font-size:13px">
                                    <option value="null">Select Sort</option>
                                      <option value="Created">Created</option>
                                      <option value="Pending">Pending</option>
                                      <option value="Updated">Modified</option>
                                      <option value="Approved">Approved</option>
                                  </select>
                                        
                                      </div>
                                      <div class="col-md-4">
                                    <select class="form-control" id="semester_"  style="font-size:13px">
                                    <option value="null">Select Semester</option>
                                      <option value="summer">Summer</option>
                                      <option value="1stsem">First Semester</option>
                                      <option value="2ndsem">Second Semester</option>
                                  </select>
                                      </div>
                                      <div class="col-md-4">
                                         <select class="form-control" id="year_"  style="font-size:13px">
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
                                    </div>

                                      </div>
                                    </div>
                                  </div>

                                  <script type="text/javascript" src="../../js/jquery.js"></script>

                                      <script type="text/javascript">
                                      $(document).ready(function() {
                                      $('#sorting_').change(function(){
                                       
                                        var sort =$(this).val();
                                         var sem = $('#semester_').val();
                                          var yr =$('#year_').val();

                                        if(sem == 'null' && yr == 'null'){
                                         
                                          $.ajax({
                                          url : "sorted.php",
                                           method: "POST",
                                          data  : {sort_pds:1,sort:sort,sem:sem,yr:yr},
                                           success : function(data){
                                            $('#analytics').html(data);
                                            }
                                          })
                                       

                                        }else if (sem != 'null' && yr != 'null'){
                                        //  alert(sort+' '+sem+' '+yr);
                                              $.ajax({
                                          url : "sorted.php",
                                           method: "POST",
                                          data  : {sort_pds:1,sort:sort,sem:sem,yr:yr},
                                           success : function(data){
                                            $('#analytics').html(data);
                                            }
                                          })
                                        }else if (sem != 'null' ){
                                        //  alert(sort+' '+sem);
                                              $.ajax({
                                          url : "sorted.php",
                                           method: "POST",
                                          data  : {sort_pds:1,sort:sort,sem:sem,yr:yr},
                                           success : function(data){
                                            $('#analytics').html(data);
                                            }
                                          })
                                        }else if (yr != 'null') {
                                        //  alert(sort+' '+yr);
                                              $.ajax({
                                          url : "sorted.php",
                                           method: "POST",
                                          data  : {sort_pds:1,sort:sort,sem:sem,yr:yr},
                                           success : function(data){
                                            $('#analytics').html(data);
                                            }
                                          })
                                        }



                                      })

                                      $('#semester_').change(function(){



                                           var sort =$('#sorting_').val();
                                         var sem = $(this).val();
                                          var yr =$('#year_').val();

                                         

                                        if(sort == 'null' && yr == 'null'){
                                         
                                                $.ajax({
                                          url : "sorted.php",
                                           method: "POST",
                                          data  : {sort_pds:1,sort:sort,sem:sem,yr:yr},
                                           success : function(data){
                                            $('#analytics').html(data);
                                            }
                                          })

                                        }else if (sort != 'null' && yr != 'null'){
                                                 $.ajax({
                                          url : "sorted.php",
                                           method: "POST",
                                          data  : {sort_pds:1,sort:sort,sem:sem,yr:yr},
                                           success : function(data){
                                            $('#analytics').html(data);
                                            }
                                          })
                                        }else if (sort != 'null' ){
                                                 $.ajax({
                                          url : "sorted.php",
                                           method: "POST",
                                          data  : {sort_pds:1,sort:sort,sem:sem,yr:yr},
                                           success : function(data){
                                            $('#analytics').html(data);
                                            }
                                          })
                                        }else if (yr != 'null') {
                                                 $.ajax({
                                          url : "sorted.php",
                                           method: "POST",
                                          data  : {sort_pds:1,sort:sort,sem:sem,yr:yr},
                                           success : function(data){
                                            $('#analytics').html(data);
                                            }
                                          })
                                        }
                                      
                                      })

                                      $('#year_').change(function(){
                                         var sort =$('#sorting_').val();
                                         var sem = $('#semester_').val();
                                          var yr =$(this).val();

                                        if(sort == 'null' && sem == 'null'){
                                         
                                                $.ajax({
                                          url : "sorted.php",
                                           method: "POST",
                                          data  : {sort_pds:1,sort:sort,sem:sem,yr:yr},
                                           success : function(data){
                                            $('#analytics').html(data);
                                            }
                                          })

                                        }else if (sort != 'null' && sem != 'null'){
                                                 $.ajax({
                                          url : "sorted.php",
                                           method: "POST",
                                          data  : {sort_pds:1,sort:sort,sem:sem,yr:yr},
                                           success : function(data){
                                            $('#analytics').html(data);
                                            }
                                          })
                                        }else if (sort != 'null' ){
                                                 $.ajax({
                                          url : "sorted.php",
                                           method: "POST",
                                          data  : {sort_pds:1,sort:sort,sem:sem,yr:yr},
                                           success : function(data){
                                            $('#analytics').html(data);
                                            }
                                          })
                                        }else if (sem != 'null') {
                                                 $.ajax({
                                          url : "sorted.php",
                                           method: "POST",
                                          data  : {sort_pds:1,sort:sort,sem:sem,yr:yr},
                                           success : function(data){
                                            $('#analytics').html(data);
                                            }
                                          })
                                        }
                                      
                                      
                                      })
                                    
                                      });
                                  </script>
                 
                   
                                


                                <?php include 'analytics.php' ?>
                     


                    
                    <!-- Content Row -->

                     <div class="row">

                        <div class="col-xl-8 col-lg-7">


                           <div class="card shadow mt-2 mb-2">
                              <div


                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Overall Request</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Actions:</div>
                                            <a class="dropdown-item" href="../Forms/">Manage</a>
                                          
                                           
                                            
                                        </div>
                                    </div>
                                </div>
                              <div class="card-body">
                                  <div class="chart-area">
                                        <canvas id="myAreaChart"></canvas>
                                    </div>
                              </div> 
                              
                           </div> 

                           
                          
                        </div> 

                           <div class="col-xl-4 col-lg-5">
                             <div class="card shadow-sm mt-2 mb-2">
                                   <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Overall PDS and Shifting Records on Board</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Actions:</div>
                                            <a class="dropdown-item" href="../Announcement/">Manage</a>
                                          
                                           
                                            
                                        </div>
                                    </div>
                                </div>
                                 <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> Students
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Filled up PDS
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle" style="color:#80a63a"></i> Shifting Form Request
                                        </span>

                                         <span class="mr-2">
                                            <i class="fas fa-circle text-danger"></i> Not yet
                                        </span>

                                         <span class="mr-2">
                                            <i class="fas fa-circle " style="color: #ef7a58"></i> Courses
                                        </span>
                                    </div>
                                 </div> 
                                 


                             </div> 
                             
                           </div>
                        
                     </div> 

                      <div class="row">
                        
                            <div class="col-md-12">
                            
                            <div class="card shadow mb-2">
                               <div class="card-header">
                                <h6 class="m-0 font-weight-bold text-primary">Data Statistics in Percentage</h6>
                               </div> 
                               
                               <div class="card-body">
                               

                      <label style="font-size: 12px" class="mt-4">Already filled up their PDS</label>
                                <div class="progress">
                    <div class="progress-bar bg-success" id="progress_alreadyfilled" role="progressbar" style="width: 0%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">0%</div>
                  </div>

                    <label style="font-size: 12px" class="mt-4">Not yet fill up PDS</label>
                                <div class="progress">
                    <div class="progress-bar bg-danger" id="progress_notyet" role="progressbar" style="width: 0%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">0%</div>
                  </div>

                    <label style="font-size: 12px" class="mt-4">Shifting Request</label>
                                <div class="progress">
                    <div class="progress-bar bg-warning" id="progress_shift" role="progressbar" style="width: 0%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">0%</div>
                  </div>

                    <label style="font-size: 12px" class="mt-4">All Courses: <span id="progress_allcourse"></span> </label> 
                                <div class="progress">
                    <div class="progress-bar bg-info" role="progressbar" id="progresscourses"  style="width: 0%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">  0%</div>
                  </div>

                   <label style="font-size: 12px" class="mt-4">All Students: <span id="progress_allstudent"></span></label> 
                                <div class="progress">
                    <div class="progress-bar" role="progressbar" id="progressstudent"  style="width: 0%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">  0%</div>
                  </div>


                                 
                               </div> 
                               
                            </div> 
                            
                        
                         
                            </div> 
                        

                      </div> 
                      
                     

                 <!--   <div class="row">

                     
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                           
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Post Announcements</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Actions:</div>
                                            <a class="dropdown-item" href="../Announcement/">Manage</a>
                                          
                                           
                                            
                                        </div>
                                    </div>
                                </div>
                              
                                <div class="card-body" id="ann_con">
                                   
                                    <?php 
                                    include '../create_form/connect.php';
                    $sql = " SELECT * FROM `announcement` ";
                            $result = mysqli_query($con,$sql); // run query
                            $count= mysqli_num_rows($result); // to count if necessary
                           //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
                         if ($count>=1){
                            //while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                             while($row = mysqli_fetch_array($result)){
                                ?>
                                <div class="card shadow mb-4" style="border-top: 1px solid #11be85">

                                                 <div class="card-body" >
                                                <i class="fas fa-bullhorn"></i><p></p>
                                                    <p style="font-size: 13px;"> <?php echo $row['content'] ?>
                                                    </p>

                      
                                                 </div>
                                         </div> 
                                <?php
                             }
                              ?>

                          <div class="container">
                            <a href="../Announcement/?addannouncement">Add new Announcement</a>
                          </div> 
                          
                         <?php
                      }else {
                        ?>
                         <div class="" style="text-align: center;">
                         
                         <img src="../img/undraw_void_3ggu.png" class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 30rem;">
                        <h6>Announcement is empty.</h6>
                         </div> 
                        <?php
                      }

                                     ?>


                                </div>
                            </div>
                        </div>

                    
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                             
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Today's Event</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Actions</div>
                                            <a class="dropdown-item" href="../Calendar/">Add Calendar activities</a>
                                           
                                        </div>
                                    </div>
                                </div>
                             
                                <div class="card-body" id="eventcon">
                                
                                          <?php 
                     date_default_timezone_set('Asia/Manila');
                     $datenow = date('Y-m-d');

                                $lookfortodaysevent = " SELECT * FROM `events` where Date(start)='$datenow'  ";
                                        $resultlook = mysqli_query($con,$lookfortodaysevent); // run query
                                        $countev= mysqli_num_rows($resultlook); // to count if necessary
                                       //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
                                     if ($countev>=1){
                                        //while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                                         while($row = mysqli_fetch_array($resultlook)){
                                            ?>
                            <div class="card shadow">
                             <div class="card-header" style="background-color: <?php echo $row['bgcolor'] ?>">
                    
                                </div>
                          <div class="card-body" style="text-align: center;">
                                <span style="font-size: 15px; font-weight: bolder;text-align: center;"><?php echo $row['title'] ?></span>
                          </div>
                        </div>
                        <p></p>
                                            <?php
                                         }
                                  }else {
                                    ?>
                                     <div style="text-align: center;"> 
                                         <span style="margin-top: -10px;" class="text-gray-800">None</span>
                                         <img src="../img/undraw_No_data_re_kwbl.png" class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 50rem;">
                                        
                                         </div>
                                    <?php
                                  }

                   ?>



                                </div>
                            </div>
                        </div>-->
                    </div> 

                    <!-- 
                    <div class="row">

                       
                        <div class="col-lg-6 mb-4">

                          
                            <div class="card shadow mb-4">
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Forms</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Actions</div>
                                            <a class="dropdown-item" href="../Manage_pds/">Manage</a>
                                            <a class="dropdown-item" href="../Manage_pds/?viewresponse">View Responses</a>
                                           
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    
                                     <?php
                                    include '../Classes/sql_query.php';
                                    $fetch = new sqlquery();
                                    $fetch ->manage_form_content_admindashboard();
                                    ?>


                                </div>
                            </div>


                        </div>

                        <div class="col-lg-6 mb-4">

                        
                            <div class="card shadow mb-4">
                               <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">News feeds</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Actions</div>
                                            <a class="dropdown-item" href="../Newsfeed/">Manage</a>
                                           
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body" >
                                 
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active art" id="article-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Articles</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link peer" id="peerfacilatator-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Peer Facilitator</button>
  </li>
 
</ul>
<div class="tab-content" id="newsfeedcontent" id="">
  <div class="tab-pane fade show active" id="cont1" role="tabpanel" aria-labelledby="article-tab">
    
    <p></p>
     <div class="container">
            

        <?php 
         $fetch->newsfeedfordashboard();
         ?>


     </div> 
     


  </div>
  <div class="tab-pane fade" id="cont2" role="tabpanel" aria-labelledby="peerfacilatator-tab">
      
    <p></p>
     <div class="container">
            

            <?php 
         $fetch->peerfacilitatorfordashboard();
         ?>



     </div> 



  </div>
 
</div>


                            </div>

                          

                        </div>
                    </div>

                </div> -->
              
              </div>

            </div>

             
 
                         
                            <link rel="stylesheet" type="text/css" href="../../offline/datatable.css"/>
 
<script type="text/javascript" src="../../offline/datatable.js"></script>






                          
             <script src="../../js/jquery.js"></script>
                <script type="text/javascript">
                      $(document).ready(function() {
                                let table = new DataTable('#pdstable', {
      
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

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

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
    
    <script type="text/javascript">
          $(document).ready(function() {
              if($(window).width() <= 768){
               $('#accordionSidebar').addClass('toggled');
              }
        
          });
    </script>
  

   <script type="text/javascript">
     //P I E C H A R T
     // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';
<?php 
      include '../create_form/connect.php';

          $slstud = " select * from student ";
                      $sstud= mysqli_query($con,$slstud); 
                      $cstud= mysqli_num_rows($sstud); 
                       while($row = mysqli_fetch_array($sstud)){
                        $studentid = $row['stud_id'];

                          $countstudfilledup = "select * from form_response where userid = '$studentid' ";
                         $rescount = mysqli_query($con,$countstudfilledup);
                         $countrespos= mysqli_num_rows($rescount); 

                          if($countrespos >= 1 ){
                               while($forms = mysqli_fetch_array($rescount)){

                                  $csid = $forms['csformid'];
                                  $userid = $forms['userid'];
                                  $datecreated = date('M',strtotime($forms['datecreated']));

                                  if($csid == '60'  ){

                                    switch ($datecreated) {
                                          case "Jan":
                                          $jan[] = $userid;
                                            break;
                                          case "Feb":
                                          $feb[] = $userid;
                                            break;
                                          case "Mar":
                                          $mar[] = $userid;
                                            break;
                                             case "Apr":
                                          $apr[] = $userid;
                                            break;
                                             case "May":
                                           $may[] = $userid;
                                            break;
                                             case "Jun":
                                          $jun[] = $userid;
                                            break;
                                             case "Jul":
                                         $jul[] = $userid;
                                            break;
                                             case "Aug":
                                          $aug[] = $userid;
                                            break;
                                             case "Sep":
                                          $sep[] = $userid;
                                            break;
                                             case "Oct":
                                           $oct[] = $userid;
                                            break;
                                             case "Nov":
                                            $nov[] = $userid;
                                            break;
                                               case "Dec":
                                            $dec[] = $userid;
                                            break;
                                           
                                          default:
                                          break;
                                           
                                        }
                                  
                              
                                    $shiftids[] = $userid;
                                  }else if ($csid == '62'){
                                 $sids[] = $studentid;
                                  } 


                               }

                                
                          
                          }else {
                            $notyet[] = $studentid;
                          }

                      
                      }

                      if(isset($shiftids)){
                          $shftids = array_unique($shiftids);
                      }else {
                          $shftids = [];
                      }

                      if(isset($sids)){
                        $pdsids = array_unique($sids);

                      }else {
                        $pdsids = [];
                      }
                   
                     
                     if(isset($jan)){
                        $jan = array_unique($jan);
                      }else {
                        $jan = [];
                      }

                      if(isset($feb)){
                         $feb = array_unique($feb);
                      }else{
                        $feb =[];
                      }

                       if(isset($mar)){ 
                         $mar = array_unique($mar);
                      }else {
                        $mar = [];
                      }


                       if(isset($apr)){
                        $apr = array_unique($apr);
                      }else {
                        $apr = [];
                      }

                       if(isset($may)){
                         $may = array_unique($may);
                      }else {
                        $may = [];
                      }

                       if(isset($jun)){
                         $jun = array_unique($jun);
                      }else {
                        $jun =[];
                      }

                       if(isset($jul)){
                         $jul = array_unique($jul);
                      }else {
                        $jul = [];
                      }

                       if(isset($aug)){
                         $aug = array_unique($aug);
                      }else {
                        $aug = [];
                      }

                       if(isset($sep)){
                         $sep = array_unique($sep);
                      }else {
                        $sep =[];
                      }

                       if(isset($oct)){
                        $oct = array_unique($oct);
                      }else {
                        $oct = [];
                      }

                       if(isset($nov)){
                        $nov = array_unique($nov);
                      }else{
                        $nov = [];
                      } 

                      if(isset($dec)){
                        $dec = array_unique($dec); 
                      }else {
                        $dec= [];
                      }

                    
                     
                     
                      
                     
                     
                     
                     
                     
                      
                      
                      
                       
                   

                  
                     $pdspercentage = ($cstud * count($pdsids))/100;

                      function cal_percentage($num_amount, $num_total) {
                      $count1 = $num_amount / $num_total;
                      $count2 = $count1 * 100;
                      $count = number_format($count2, 0);
                      return $count;
                    }

                    if(isset($notyet)){

                    }else {
                      $notyet = [];
                    }

                        $allcourses = " select * from course  ";
                                    $rcourse = mysqli_query($con,$allcourses);
                                    $countcourses= mysqli_num_rows($rcourse); 
                                
                   

  ?>
  $('#progresscourses').html('<?php echo cal_percentage($countcourses,$countcourses).'%' ?>');
  $('#progresscourses').css('width','<?php echo cal_percentage($countcourses,$countcourses).'%' ?>');


  $('#progressstudent').html('<?php echo cal_percentage($cstud,$cstud).'%' ?>');
   $('#progressstudent').css('width','<?php echo cal_percentage($cstud,$cstud).'%' ?>')
  $('#progress_shift').html('<?php echo cal_percentage(count($shftids),$cstud).'%' ?>');
  $('#progress_shift').css('width','<?php echo cal_percentage(count($shftids),$cstud).'%' ?>');

    $('#progress_notyet').html('<?php echo cal_percentage(count($notyet),$cstud).'%' ?>');
    $('#progress_notyet').css('width','<?php echo cal_percentage(count($notyet),$cstud).'%' ?>');


    $('#progress_alreadyfilled').html('<?php echo  cal_percentage(count($pdsids),$cstud).'%' ?>');
    $('#progress_alreadyfilled').css('width','<?php echo  cal_percentage(count($pdsids),$cstud).'%' ?>');

     $('#progress_allstudent').text(<?php echo $cstud ?>);
     $('#progress_allcourse').text(<?php echo $countcourses?>);
// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Students", "Filled Up PDS","Shifting Form Request", "Not yet","Courses"],
    datasets: [{
      data: [<?php echo  $cstud ?>,<?php echo count($pdsids) ?>,<?php echo count($shftids) ?>, <?php echo count($notyet) ?>,<?php echo $countcourses ?>],
      backgroundColor: ['#4e73df', '#1cc88a','#aac677', '#d93c3c','#ef7a58'],
      hoverBackgroundColor: ['#2e59d9', '#17a673', '#80a63a','#da2929','#c9512e'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});

  





// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

function number_format(number, decimals, dec_point, thousands_sep) {
  // *     example: number_format(1234.56, 2, ',', ' ');
  // *     return: '1 234,56'
  number = (number + '').replace(',', '').replace(' ', '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function(n, prec) {
      var k = Math.pow(10, prec);
      return '' + Math.round(n * k) / k;
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}

// Area Chart Example
var ctx = document.getElementById("myAreaChart");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
    datasets: [{
      label: "No. of Request",
      lineTension: 0.3,
      backgroundColor: "rgba(78, 115, 223, 0.05)",
      borderColor: "rgba(78, 115, 223, 1)",
      pointRadius: 3,
      pointBackgroundColor: "rgba(78, 115, 223, 1)",
      pointBorderColor: "rgba(78, 115, 223, 1)",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
      pointHoverBorderColor: "rgba(78, 115, 223, 1)",
      pointHitRadius: 10,
      pointBorderWidth: 2,
      data: [<?php echo count($jan) ?>, <?php echo count($feb) ?>, <?php echo count($mar) ?>, <?php echo count($apr) ?>,<?php echo count($may) ?>,<?php echo count($jun) ?>,<?php echo count($jul) ?>, <?php echo count($aug) ?>,<?php echo count($sep) ?>,<?php echo count($oct) ?>, <?php echo count($nov) ?>, <?php echo count($dec) ?>],
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return '' + number_format(value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: true
    },
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      intersect: false,
      mode: 'index',
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
        }
      }
    }
  }
});

      
           
   </script>

</body>

</html>