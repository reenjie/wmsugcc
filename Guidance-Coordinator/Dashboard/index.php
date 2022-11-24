<?php 
session_start();
 if(!isset($_SESSION['admin_token'] )){
    header('location:../../session_end.html');
  //
 }
  if(isset($_SESSION['first_time_login'])){
    if(isset($_SESSION['access_token'])){
        unset($_SESSION['first_time_login']);
    }else {
        include 'ft.php';
    }
    
  }

  include '../../GCC/create_form/connect.php';
date_default_timezone_set('Asia/Manila');
$datenow = date('Y-m-d');
$time = date('H');

      $chipuserid = $_SESSION['admin_token'];                           

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


 <?php
  include '../include/assets/head.php';
 
 ?>
 <style type="text/css">
    @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap');
    *{
      font-family: 'Cairo', sans-serif;
    }
    @media screen and (max-width: 768px){
      #college{
        font-size: 14px;
      } 
      #title {
        font-size: 20px;
      } 
    }
 </style>

<body id="page-top" >


    <!-- Page Wrapper -->
    <div id="wrapper">

        <!--sidebar-->
         
        <ul class="navbar-nav  sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: <?php echo $_SESSION['sidebar_colors'] ?>" >

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center mb-4" href="#">
                <div class="sidebar-brand-icon rotate-n-15">
                   <img src="../img/gcc.png" style="width: 50px;transform: rotate(15deg);">
                </div>
                <div class="sidebar-brand-text mx-3">
                    <?php 
                    echo $_SESSION['sidebar_banners'];
                   

                     ?>

                 <!--<sup>2</sup>--></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
              <div class="sidebar-heading">
               Reports
            </div>
            <!-- Nav Item - Dashboard -->
            <li class="nav-item  active">
                <a class="nav-link" href="../Dashboard/">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider
            <hr class="sidebar-divider"> -->

            <!-- Heading -->
            <div class="sidebar-heading">
                Records
            </div>

        

            <!-- Nav Item - Charts -->

           
            <li class="nav-item " >
                <a class="nav-link" href="../PDS-Records/">
                   <i class="fas fa-clipboard-list"></i>
                    <span>PDS</span></a>
            </li>


              <li class="nav-item">
                <a class="nav-link" href="../Shifting-Records/">
                   <i class="far fa-circle"></i>
                    <span>Shifting</span></a>
            </li>
                               

          

               <div class="sidebar-heading">
                Manage
            </div>


              <li class="nav-item ">
                <a class="nav-link" href="../Referrals/">
                  <i class="fas fa-asterisk"></i>
                    <span>Referrals & Coaching</span></a>
            </li>


           
             <li class="nav-item">
                <a class="nav-link" href="../Students/">
                    <?php 
                     include '../../GCC/create_form/connect.php';
            $cid = $_SESSION['gc_collegid'];
                     $sql = " select * from student where stud_college ='$cid' and isverified = 0 ";
                            $result = mysqli_query($con,$sql); 
                            $count= mysqli_num_rows($result); 
                    if($count >= 1){
                        ?>
                           <span class="badge badge-danger" style="font-size:13px;" ><?php echo $count ?></span>
                        <?php
                    }else {
                        ?>
                        <i class="fas fa-users"></i>
                        <?php
                    }

                     ?>
              
               
                    <span>Students </span></a>
            </li>

           

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message 
            <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
                <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
                <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
            </div>-->

        </ul>
        <!--end of sidebar-->


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">


          

                    <!--topbar-->
            <?php  include '../include/assets/topbar.php';?>
                    <!--end of topbar-->

<style type="text/css">
   {

  }
                                #contentss::-webkit-scrollbar  {
                                      width: 3px;

                                    }

                                    /* Track */
                                    #contentss::-webkit-scrollbar-track {
                                      background:#d7faed; 
                                    }
                                     
                                    /* Handle */
                                    #contentss::-webkit-scrollbar-thumb {
                                      background: #298a67; 
                                    }

                                    /* Handle on hover */
                                    #contentss::-webkit-scrollbar-thumb:hover {
                                      background: #30936f; 
                                    }
                                     #generate {
        width: auto;float: right;font-size: 13px;
    }

    @media screen and (max-width : 768px){
        #generate{
            float: none;
        }
    }
</style>




                <!-- Begin Page Content -->
                <div class="container-fluid" >
                     <span class="text-gray-800" style="font-weight: bold;" id="tryfound"></span>
                     <div class="advancecontent_search row d-none" id="content_search" data-role="searchfor"> </div> 
                    
                      <div class="051715" id="051715"> 
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 id="title" class="h3 mb-0 text-gray-800">Dashboard </h1>
                          <button class="btn text-dark border-dark mb-2" id="generate" onclick="window.location.href='generate.php'" >GENERATE A REPORT</button>
                        <!--<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
                    </div>
                       <?php 
                                  if(isset($_SESSION['act'])){
                                    ?>
                                <div class="alert alert-success" id="alerto" role="alert">
                                 E-Signature Saved.
                                </div>
                                 <script type="text/javascript">
        
                                        var times = setInterval(function() {
                                          document.getElementById("alerto").classList.add("d-none");
                                           clear();
                                        },3000);

                                        function clear() {
                                          clearInterval(times);
                                        }     
                                              
                                      </script>

                                    <?php

                                    unset($_SESSION['act']);
                                  }


                                   ?>
                    <!--contents here-->
                    <div class="row">
                        
                         <div class="col-md-12">
                             <div class="row">
                                 <div class="col-md-8">
                                     <div class="row">
                                        <div class="col-md-6">
                           <div class="card shadow-sm" style="border-left: 5px solid #4e73df">
                             <div class="card-header">
                                <h6 class="text-primary" style="font-style: italic;font-weight: bold">Personal Data Sheets</h6>
                                   
                             </div> 
                             
                              <div class="card-body" style="text-align: center;">
                                <h5><span class="badge badge-success" id="pdscount"> <i class="fas fa-sync fa-spin"></i></span> <span style="font-size: 15px;">Students in Record</span></h5>
                              </div> 
                              
                           </div> 
                           
                        </div> 
                        <div class="col-md-6">
                            <div class="card shadow-sm" style="border-left: 5px solid #5e8581">
                             <div class="card-header">
                                <h6 class="text-primary" style="font-style: italic;font-weight: bold">Shifting Forms</h6>
                             </div> 
                             
                              <div class="card-body" style="text-align: center;">
                                <h5><span class="badge badge-success" id="shiftingcount"> <i class="fas fa-sync fa-spin"></i></span> <span style="font-size: 15px;">Students in Record</span></h5>
                              </div> 
                              
                           </div> 
                        </div>

                            <div class="col-md-6">
                            <div class="card shadow-sm mt-2" style="border-left: 5px solid #a17a57">
                             <div class="card-header">
                                <h6 class="text-primary" style="font-style: italic;font-weight: bold">Referral forms</h6>
                             </div> 
                             
                              <div class="card-body" style="text-align: center;">
                                <h5>--</h5>
                              </div> 
                              
                           </div> 
                        </div>


                           <div class="col-md-6">
                            <div class="card shadow-sm mt-2" style="border-left: 5px solid #f6c23e;cursor: ;">
                             <div class="card-header">
                                <h6 class="text-primary" style="font-style: italic;font-weight: bold">Counseling forms</h6>
                             </div> 
                             
                              <div class="card-body" style="text-align: center;">
                                <h5>--</h5>
                              </div> 
                              
                           </div> 
                        </div>
                                     </div> 
                                     
                                 </div> 
                                  <div class="col-md-4">
                                           <div class="card shadow">
                              <div class="card-body">


                                 
           
              <script src="https://cdn.logwork.com/widget/text.js"></script>
<a href="https://logwork.com/current-time-in-zamboanga-city-philippines-zamboanga" class="clock-widget-text" data-timezone="Asia/Manila" data-language="en" data-textcolor="#77b3d1">WMSU </a>
           
           

                              </div> 
                              
                           </div> 
                                  </div> 

                                   <div class="col-md-12">
                                       <div class="card shadow mt-2">
                                   <div class="card-header">
                                     <h6 class="text-success" style="font-style: italic;font-weight: bold">Notifications <i class="far fa-bell"></i>
                                      <span style="font-size: 13px;float: right;font-style: normal;"> As of  <?php echo date('l, F Y') ?></span>
                                     </h6>
                                   
                                   </div> 
                                   
                                   <div class="card-body">
                                     <table class="table  table-sm">
                          
                          <tbody id="table-content"></tbody>
                        </table>
                                   </div> 
                             
                                                       
                                  <!--  <div class="fixed-bottom">
                                      
                                      <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-backdrop="static" data-keyboard="false" style="font-size: 12px;float: right; margin-right: 10px;margin-bottom: 10px;border-radius: 50px ;padding: 10px"><i style="font-size: 20px" class="far fa-envelope"></i></button>
                                    </div> -->
                                    
                                   
                                </div>
                                   </div> 
                                   


                                   <div class="col-md-12">
                                <?php include 'analytics.php' ?>
                                         
                                      
                                   </div> 



                                  <!--  <div class="col-md-12">
                                       <div class="card shadow-sm mt-2">
                                          <div class="card-body">
                                            
                                          </div> 
                                          
                                       </div> 
                                       
                                    </div> -->
                                    





                                    <div class="col-md-12">
                                      <div class="row">
                                         <div class="col-md-4">
                                                  <div class="card shadow-sm mt-2">
                               <div class="card-body">

                                  <?php 
                                  $cid =  $_SESSION['gc_collegid'];
                                     
                                            

                     $slstud = " select * from student ";
                      $sstud= mysqli_query($con,$slstud); 
                      $cstud= mysqli_num_rows($sstud); 
                       while($row = mysqli_fetch_array($sstud)){
                        $studentid = $row['stud_id'];
                        $scourse = $row['stud_course'];



                             $sort_to_courses = " select * from course where CollegeId = '$cid'  ";
                                                  $rescourses = mysqli_query($con,$sort_to_courses); 
                                                
                                                   while($getcourse = mysqli_fetch_array($rescourses)){
                                                    $kurso = $getcourse['course'];
                                                    $arrkurso[] = $getcourse['course'];
                                                    if($scourse == $kurso){
                                                      $sbycourse[] = $studentid;
                                                    }
                                                   
                                                   }


                          $countstudfilledup = "select * from form_response where userid = '$studentid' and CollegeId = '$cid' ";
                         $rescount = mysqli_query($con,$countstudfilledup);
                         $countrespos= mysqli_num_rows($rescount); 

                          if($countrespos >= 1 ){
                               while($forms = mysqli_fetch_array($rescount)){

                                  $csid = $forms['csformid'];
                                  $userid = $forms['userid'];
                                  $datecreated = date('M',strtotime($forms['datecreated']));

                                  if($csid == '60'  ){

                               
                                       
                                  
                              
                                    $shiftids[] = $userid;
                                  }else if ($csid == '62'){
                                 $sids[] = $studentid;
                                  } 


                               }

                                
                          
                          }else {
                             if(isset($sbycourse)){
                                $notyet = $sbycourse;
                                }else {
                                  $sbycourse = [];
                                }
                       


                          }

                      
                      }


                      if (isset($shiftids)){
                         $shftids = array_unique($shiftids);
                      }else {
                        $shftids = [];
                      }

                      if(isset($sids)){
                        $pdsids = array_unique($sids);
                      }else {
                        $pdsids = [];
                      }


                        if(isset($notyet)){

                        }else {
                            $notyet = [];  
                        }

                   
                   

                    for($i = 0 ; $i < count($notyet); $i ++){
                    
                   // echo $notyet[$i];

                   //  echo $arrkurso[$i];

                       $seluser = " select * from student where stud_course ='".$arrkurso[$i]."'  and stud_id not in (select userid from form_response where csformid = '62')";


                                      $suser = mysqli_query($con,$seluser);
                                      $count= mysqli_num_rows($suser);
                                    
                                       while($rg = mysqli_fetch_array($suser)){
                                      $studnotyet[] =  $rg['stud_id'];
                                 

                                       }
                    }
                        if(isset($studnotyet)){

                          $notyetfill = array_unique($studnotyet); 

                        }else {
                          $studnotyet = [];
                        }


                          if(isset($notyetfill)){

                          }else {
                            $notyetfill = [];
                          }


                      function cal_percentage($num_amount, $num_total) {
                      $count1 = $num_amount / $num_total;
                      $count2 = $count1 * 100;
                      $count = number_format($count2, 0);
                      return $count;
                    }

                 
                    if(empty($sbycourse)){
                      $sbycourse = [0];
                    }
                                   ?>

                            <script src="../../js/jquery.js"></script>     
                                
                                <script type="text/javascript">
                                  
                                  $(document).ready(function() {
 


 $('#progressstudent').html('<?php echo cal_percentage(count($sbycourse),count($sbycourse)).'%' ?>');
   $('#progressstudent').css('width','<?php echo cal_percentage(count($sbycourse),count($sbycourse)).'%' ?>');
 $('#progress_shift').html('<?php echo cal_percentage(count($shftids),count($sbycourse)).'%' ?>');
  $('#progress_shift').css('width','<?php echo cal_percentage(count($shftids),count($sbycourse)).'%' ?>');

     $('#progress_notyet').html('<?php echo cal_percentage(count($notyetfill),count($sbycourse)).'%' ?>');
    $('#progress_notyet').css('width','<?php echo cal_percentage(count($notyetfill),count($sbycourse)).'%' ?>');


    $('#progress_alreadyfilled').html('<?php echo  cal_percentage(count($pdsids),count($sbycourse)).'%' ?>');
    $('#progress_alreadyfilled').css('width','<?php echo  cal_percentage(count($pdsids),count($sbycourse)).'%' ?>');

     $('#progress_allstudent').text(<?php echo count($sbycourse) ?>);

    
                                        });      
                                        
                                </script>
                                <script>

                                

window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
  exportEnabled: true,
  animationEnabled: true,
  title:{
    text: "Gender"
  },
  legend:{
    cursor: "pointer",
    itemclick: explodePie
  },
  data: [{
    type: "pie",
    showInLegend: true,
    toolTipContent: "{name}: <strong>{y}</strong>",
    indexLabel: "{name} - {y}",
    dataPoints: [
    
     <?php 

         /*   $co =$_SESSION['gc_collegid'];
                $getstudents = "select * from student where stud_college='$co'  ";
                 $gettingdata_student = mysqli_query($con,$getstudents); 
               $count= mysqli_num_rows($gettingdata_student);

                    if($count >=1){
                       
             while($stdata = mysqli_fetch_array($gettingdata_student)){


                    
                    if($stdata['gender'] == 'Male'){
                        $male[] = $stdata['gender'];

                     ?>
                     { y:<?php echo count($male) ?>, name: "Male", exploded: true },
                  
                    <?php
                    }else if ($stdata['gender'] == 'Female'){
                        $female[] = $stdata['gender'];

                     ?>
                     { y:<?php echo count($female) ?>, name: "Female", exploded: true },
                  
                    <?php
                    }    
               

                 }
                


                    

                  }else {

                    ?>
                     { y:0, name: "Male", exploded: true },
                     { y:0, name: "Female", exploded: true },
                    <?php
                  } */


                   $co =$_SESSION['gc_collegid'];
                 $getstudents = "select * from student where stud_college='$co'  ";
                 $gettingdata_student = mysqli_query($con,$getstudents); 
               $count= mysqli_num_rows($gettingdata_student);

                
                       
             while($stdata = mysqli_fetch_array($gettingdata_student)){
                        $m[] = $stdata['gender'];

                 }


                // print_r($m);
                 foreach ($m as $key => $value) {
                   

                    if($value =='Male'){
                       $mv[] = $value;
                    }

                      if($value == 'Female'){
                        $fmv[] = $value;
                    }
                  
                 }

                 if(isset($mv)){
                  
                     ?>
                     { y:<?php echo count($mv) ?>, name: "Male", exploded: true },
                  
                    <?php
                 }

                 if(isset($fmv)){
                  
                      ?>
                     { y:<?php echo count($fmv) ?>, name: "Female", exploded: true },
                  
                    <?php
                 }
             
                


            
             
             ?>

     
   
    
     
     
    ]
  }]
});
chart.render();
}

function explodePie (e) {
  if(typeof (e.dataSeries.dataPoints[e.dataPointIndex].exploded) === "undefined" || !e.dataSeries.dataPoints[e.dataPointIndex].exploded) {
    e.dataSeries.dataPoints[e.dataPointIndex].exploded = true;
  } else {
    e.dataSeries.dataPoints[e.dataPointIndex].exploded = false;
  }
  e.chart.render();

}
</script>

<div id="chartContainer" style="height: 300px; width: 100%;"> Loading <i class="fas fa-spinner fa-pulse"></i></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
                                 
                               </div> 
                               
                            </div> 
                                         </div> 
                                       <div class="col-md-8">
                                          <div class="card shadow mb-2 mt-2 table-responsive">
                               <div class="card-header">
                                <h6 class="m-0 font-weight-bold text-primary"></h6>
                               </div> 
                               
                               <div class="card-body">
                                 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Filled Up or Finished', 'Not yet Filled up or Not yet Finished'],

            <?php 

            $co =$_SESSION['gc_collegid'];
                $getstudents = "select * from student where stud_college='$co'  ";
                 $gettingdata_student = mysqli_query($con,$getstudents); 
               $count= mysqli_num_rows($gettingdata_student);
                     //$newlyinsertedid = mysqli_insert_id($con);
                    if($count >=1){
                       
             while($stdata = mysqli_fetch_array($gettingdata_student)){
                    if($stdata['pds_filled'] == 1){
                        $pdsfilled[] = $stdata['pds_filled'];
                    }else {
                        $pdsnotfilled[] = $stdata['pds_filled'];
                    }

                     if(isset($pdsfilled)){

                 }else{
                    $pdsfilled = [];
                 }
                 if(isset($pdsnotfilled)){

                 }else {
                    $pdsnotfilled =[];
                 }


                    ?>
                     ['<?php echo date('Y',strtotime($stdata['pdsfilleddate'])) ?>', <?php echo count($pdsfilled) ?>, <?php echo count($pdsnotfilled) ?>],
                  <?php  
                             
                 }
                


                    

                  }else {

                    ?>
                    ['<?php echo date('Y') ?>',  0,      0],
                    <?php
                  }
            
             
             ?>

       
        
        ]);

        var options = {
          title: 'Finished and Pending PDS',
          hAxis: {title: 'Year',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
     <div id="chart_div" style="width: 100%; height: 300px;"></div>
                               

                    <!--  <label style="font-size: 12px" class="mt-4">Already filled up their PDS</label>
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

                  

                   <label style="font-size: 12px" class="mt-4">All Students: <span id="progress_allstudent"></span></label> 
                                <div class="progress">
                    <div class="progress-bar" role="progressbar" id="progressstudent"  style="width: 0%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">  0%</div>
                  </div> -->


                                 
                               </div> 
                               
                            </div> 

                                       </div> 
                                       

                                     </div>
                                    </div> 
                                    
                                   
                                 

                             </div> 
                             


                         </div> 



                          
                         
                         
                
        
                    </div> 

                   
                     

                     
                     
                    
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>


            <!-- End of Main Content -->


            <!-- Button trigger modal -->

       
          
          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
              
                <div class="modal-body">
                  
                   <div class="card">
                     <div class="card-header">
                         <input type="email" name="" placeholder="Recepient.." required="" class="form-control" style="font-size: 12px;width: auto">

                     </div> 
                     
                      <div class="card-body">

                        
                           <div class="card mt-2" >
                              <div class="card-body">
                                
                                <textarea style="width: 100%;outline: none;border: none;font-size: 12px" class="text-secondary " rows="10" placeholder="Type your message here.."></textarea>
                              </div> 
                              
                           </div> 
                           

                        
                      </div> 
                       <div class="card-footer">
                         <button type="button" class="btn btn-success ml-2" style="font-size:12px;float: right;" data-dismiss="modal">Send <i class="far fa-paper-plane"></i></button>
                           <button type="button" class="btn btn-light text-danger" style="font-size:12px;float: right;" data-dismiss="modal"><i class="fas fa-times"></i></button>


                       </div> 
                       
                      
                   </div> 
                         
          
          
                 
                </div>
               
              </div>
            </div>
          </div>
             


            <!-- Footer -->
            <?php include '../include/assets/footer.php';


           // include 'notification.php';



            ?>
            <script type="text/javascript">
                
              $(document).ready(function() {
                countpds();
                function countpds(){
                   
                  
                     $.ajax({
                             url : "action.php",
                              method: "POST",
                               data  : {pdscount:1},
                               success : function(data){
                                $('#pdscount').text(data);
                               }
                            })
                     
                  
                
                      
                }
                countshifting();

                 function countshifting(){
                   
                  
                     $.ajax({
                             url : "action.php",
                              method: "POST",
                               data  : {shiftcount:1},
                               success : function(data){
                                $('#shiftingcount').text(data);
                               }
                            })
                     
                  
                
                      
                }

                tablecontentnotify();
                function tablecontentnotify(){
                  
                  
                     $.ajax({
                             url : "action.php",
                              method: "POST",
                               data  : {tablecontent:1},
                               success : function(data){
                    $('#table-content').html(data);

                               }
                            })
                      
                      
                }

              });
                 
            </script>
           
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
   <?php include 'logoutmodal.php' ?>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js?v=1"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js?v=1"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js?v=1"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js?v=1"></script>

    <!-- Page level plugins -->
    <?php 
    include '../clear/clear.php';

     ?>
     <script type="text/javascript">
          $(document).ready(function() {
              if($(window).width() <= 768){
               $('#accordionSidebar').addClass('toggled');
              }
        
          });
    </script>
</body>

</html>