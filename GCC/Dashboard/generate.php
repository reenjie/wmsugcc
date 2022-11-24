<?php 
session_start();
include '../create_form/connect.php';


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
                        <h1 class="h3 mb-0 text-gray-800">Report</h1>
                         <button class="btn text-primary mb-2"  style="width: auto;float: right;font-size: 13px; cursor: default; "disabled>GENERATE A REPORT</button>
                         <button class="btn btn-light text-danger" onclick="window.location.href='index.php'"> &times;</button>
                       <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
                    </div>

                     
                






                              
                     


                    
                    <!-- Content Row -->

                    	<div class="row">
                    		<div class="container">

                    				<div class="card mt-2 mb-2">
                    					<div class="card-body">
                    					<h6 class="text-primary" style="font-size:14px">Choose from the options to start.</h6>

                    						<div class="row">
                    							<div class="col-md-2">
                    								 <div class="form-row align-items-center">
								    <div class="col-auto my-1" style="width:100%">
								      <label class="mr-sm-2 sr-only" for="typeofreport">Preference</label>
								      <select class="custom-select mr-sm-2" id="typeofreport" style="font-size: 13px;" >
								      
								        <option selected value="1">Tabular Form</option>
								        <!--<option value="2">Pie charts</option>
								        <option value="3">Bar Graphs</option>-->
								      </select>
								       <div class="invalid-feedback">
        						  This type is not yet available
        								</div>
								    </div>	

                    					</div>

                    							</div>
                    							<div class="col-md-6">

                    									 <div class="form-row align-items-center">
								    <div class="col-auto my-1" style="width:100%">
								      <label class="mr-sm-2 sr-only" for="typeofrepor">Preference</label>
								      <select class="custom-select mr-sm-2 di" id="college_" style="font-size: 13px;" >
								        

                <?php 
                if(isset($_GET['rdct'])){
                  $sortby = $_GET['sort_by_college'];
                  if(isset($_GET['sort_by_college'])){
                      $getallcolleges_ = "select * from colleges where CollegeId='$sortby' ";
                 $gettingcolleges = mysqli_query($con,$getallcolleges_); 
               
               while($row = mysqli_fetch_array($gettingcolleges)){
                     ?>
                     <option value="<?php echo $row['CollegeId'] ?>" ><?php echo $row['college'] ?></option>

                     <?php     
                 }

                  }else {
                       echo ' <option selected>All Colleges</option>';
                  }

                }else {
                    echo ' <option selected>All Colleges</option>';
              
              
                }

             

                   
               
                  $getallcolleges_ = "select * from colleges  ";
                 $gettingcolleges = mysqli_query($con,$getallcolleges_); 
               
               while($row = mysqli_fetch_array($gettingcolleges)){
                     ?>
                     <option value="<?php echo $row['CollegeId'] ?>" ><?php echo $row['college'] ?></option>

                     <?php     
                 }
               

               ?>
								      </select>
								    </div>	

                    					</div>

                              <?php 
                               if(isset($_GET['sortby'])){
                                  $coid = $_GET['coid'];
                                  
                                  if($coid == 'All Colleges') {

                                  }else {
                                  ?>

                                       <div class="form-row align-items-center">
                    <div class="col-auto my-1" style="width:100%">
                      <label class="mr-sm-2 sr-only" for="typeofrepor">Preference</label>
                      <select class="custom-select mr-sm-2 di" id="courses_" style="font-size: 13px;" >
                        <option value="selectcourse">Select Course</option>

                          <?php 
                            $get_allcourses = "select * from course where CollegeId = '$coid'  ";
                             $gettingcourses = mysqli_query($con,$get_allcourses); 
                           
                           while($course = mysqli_fetch_array($gettingcourses)){
                                ?>
                                <option value="<?php echo $course['courseid'] ?>"><?php echo $course['course'] ?></option>
                                <?php    
                             }
                          
                           
                           ?>

                      </select>
                    </div>  

                              </div>
                                  <?php
                                  }



              
                                }


                               ?>



                    						 <div class="form-row align-items-center">
								    <div class="col-auto my-1" style="width:100%">
								      <label class="mr-sm-2 sr-only" for="typeofrepor">Preference</label>
								      <select class="custom-select mr-sm-2 di" id="report" style="font-size: 13px;" >
								        
								      	<option selected>Select Sort</option>
								      	<option value="Notfilledup">Not yet filled up PDS</option>
								      	<option value="pendingpds">Pending PDS</option>
								      	<option value="completedpds">Completed PDS</option>
								      	<option value="shift">Shifting Records from and to</option>
								      </select>
								       <div class="invalid-feedback">
        						 Please Select type of Sort to Continue.
        								</div>
								    </div>	

                    					</div>


                    				  



                    							</div>
                    							<div class="col-md-4">

                    				<div class="form-row align-items-center">
								    <div class="my-1" style="width:100%">
								      <label class="mr-sm-2 sr-only" for="typeofreport">Preference</label>
								      <select class="custom-select di mr-sm-2" id="semester_" style="font-size: 13px;" >
								        <option selected>Select Semester</option>
								         <option value="summer">Summer</option>
                                      <option value="1stsem">First Semester</option>
                                      <option value="2ndsem">Second Semester</option>
								      </select>
								    </div>	

                    					</div>

                    								 

                    					<div class="form-row align-items-center">
								    <div class=" my-1"  style="width:100%">
								      <label class="mr-sm-2 sr-only" for="year_">Preference</label>
								      <select class="custom-select di form-control mr-sm-2" id="year_" style="font-size: 13px; " >
								       <option selected>Select Year</option>
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


                              <div class="form-row align-items-center">
                    <div class=" my-1"  style="width:100%">
                      <label class="mr-sm-2 sr-only" for="year_level">Preference</label>
                      <select class="custom-select di form-control mr-sm-2" id="year_level" style="font-size: 13px; " >
                       <option selected>Year-Level</option>
                                  <option value="1">1st Year</option>
                                  <option value="2">2nd Year</option>
                                  <option value="3">3rd Year</option>
                                  <option value="4">4th Year</option>
                                  <option value="5">5th Year</option>
                      </select>
                    </div>  

                              </div>


                                  

                    							</div>
                    						</div>


                    				</div>
                    			</div>

                    				<div class="card mb-4">
                    					<div class="card-body">
                    						<div class="btn-group" style="float:right;">
                    						
                    								<button class="btn btn-light text-danger" onclick="window.location.href='generate.php'" style="font-size:14px">Reset</button>
                    								<?php 
                    								if(isset($_GET['sortby'])){
                    										$reps = $_GET['rep'];
                    										if($reps == 'Select Sort'){
                    											?>
                    									<button class="btn btn-light text-secondary" style="font-size:14px">Print</button>
                    									<?php
                    										}else {
                    											?>
                    									<button class="btn btn-light text-primary" data-toggle="modal" data-target="#exampleModal" id="toprint"  style="font-size:14px">Print</button>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
       
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            
            <div class="container">
                <h6 style="font-size:13px;font-weight: bold;">Title of the Report</h6>

                <input type="text" name="" class="form-control" value="" id="titleofreport" style="font-size:13px">
            </div>

      </div>
      <div class="modal-footer">
       <button class="btn btn-light text-primary" id="printnow" style="font-size:14px">Print</button>
      </div>
    </div>
  </div>
</div>
                    									<?php
                    										}
                    									
                    								}else {
                    									?>
                    									<button class="btn btn-light text-secondary" style="font-size:14px">Print</button>
                    									<?php
                    									}
                    								 ?>
                    								
                    								
                    								
                    						</div>
                    						
                    						<br>
                    						

                                            <div id="printpage">
                                              <div class="row">
                                                <div class="col-xl-12">
                                                  <div class="card">
                                                    <div class="card-body">
                                                      
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                    						<div class=" mt-3 container " id="report_content">
                    							



                    						</div>
                                            </div>




                    					</div>
                    				</div>


                    		</div>
                    	</div>
         
                    </div> 

              
              
              </div>

                <div class="d-none" id="printcenter">
                 <img class="wmsuimg" style="" src="../img/bgwmsu.jfif">
                  <img class="gccimg" style="" src="../img/gcc.png">
                  <br>
                    <h3 style="text-align:center">
                       <span style="font-size:14px"> Western Mindanao State University<br></span>
                                 

                      Guidance and Counseling Center  <br>
                     <span style="font-size:12px;" >Zamboanga City</span>
                     <br><br>
                     <br>
                    <span style="font-size:12px;text-transform: uppercase;" id="report_po"></span>
                </h3>
                   
                </div>

                <div class="d-none" id="headerstyle_print">
                    <html>
                        <style type="text/css">
                          .modal {
                            display: none;
                          }
                          .wmsuimg {
      
        width: 130px; float: left;
         margin-left: 50px;
     }
     .gccimg {
      margin-top: -10px;
        width: 100px; float: right;
      margin-right: 50px;
     }
                     table {
                     
                      border-collapse: collapse;
                      width: 100%;
                    }

                    table td, #customers th {
                      border: 1px solid #ddd;
                      padding: 2px;
                    }

                    table tr:nth-child(even){}

                    table tr:hover {}

                    table th {
                      padding-top: 4px;
                      padding-bottom: 4px;
                      
                      border: 1px solid #ddd;
                      text-align: center;
                      
                    }

                    .card > .list-group {
  border-top: inherit;
  border-bottom: inherit;
}

.card > .list-group:first-child {
  border-top-width: 0;
  border-top-left-radius: calc(0.35rem - 1px);
  border-top-right-radius: calc(0.35rem - 1px);
}

.card > .list-group:last-child {
  border-bottom-width: 0;
  border-bottom-right-radius: calc(0.35rem - 1px);
  border-bottom-left-radius: calc(0.35rem - 1px);
}

.card > .card-header + .list-group,
.card > .list-group + .card-footer {
  border-top: 0;
}
.list-group {
  display: flex;
  flex-direction: column;
  padding-left: 0;
  margin-bottom: 0;
  border-radius: 0.35rem;
}

.list-group-item-action {
  width: 100%;
  color: #6e707e;
  text-align: inherit;
}

.list-group-item-action:hover, .list-group-item-action:focus {
  z-index: 1;
  color: #6e707e;
  text-decoration: none;
  background-color: #f8f9fc;
}

.list-group-item-action:active {
  color: #858796;
  background-color: #eaecf4;
}

.list-group-item {
  position: relative;
  display: block;
  padding: 0.75rem 1.25rem;
  background-color: #fff;
  border: 1px solid rgba(0, 0, 0, 0.125);
}

.list-group-item:first-child {
  border-top-left-radius: inherit;
  border-top-right-radius: inherit;
}

.list-group-item:last-child {
  border-bottom-right-radius: inherit;
  border-bottom-left-radius: inherit;
}

.list-group-item.disabled, .list-group-item:disabled {
  color: #858796;
  pointer-events: none;
  background-color: #fff;
}

.list-group-item.active {
  z-index: 2;
  color: #fff;
  background-color: #4e73df;
  border-color: #4e73df;
}

.list-group-item + .list-group-item {
  border-top-width: 0;
}

.list-group-item + .list-group-item.active {
  margin-top: -1px;
  border-top-width: 1px;
}

.list-group-horizontal {
  flex-direction: row;
}

.list-group-horizontal > .list-group-item:first-child {
  border-bottom-left-radius: 0.35rem;
  border-top-right-radius: 0;
}

.list-group-horizontal > .list-group-item:last-child {
  border-top-right-radius: 0.35rem;
  border-bottom-left-radius: 0;
}

.list-group-horizontal > .list-group-item.active {
  margin-top: 0;
}

.list-group-horizontal > .list-group-item + .list-group-item {
  border-top-width: 1px;
  border-left-width: 0;
}

.list-group-horizontal > .list-group-item + .list-group-item.active {
  margin-left: -1px;
  border-left-width: 1px;
}

@media (min-width: 576px) {
  .list-group-horizontal-sm {
    flex-direction: row;
  }
  .list-group-horizontal-sm > .list-group-item:first-child {
    border-bottom-left-radius: 0.35rem;
    border-top-right-radius: 0;
  }
  .list-group-horizontal-sm > .list-group-item:last-child {
    border-top-right-radius: 0.35rem;
    border-bottom-left-radius: 0;
  }
  .list-group-horizontal-sm > .list-group-item.active {
    margin-top: 0;
  }
  .list-group-horizontal-sm > .list-group-item + .list-group-item {
    border-top-width: 1px;
    border-left-width: 0;
  }
  .list-group-horizontal-sm > .list-group-item + .list-group-item.active {
    margin-left: -1px;
    border-left-width: 1px;
  }
}

@media (min-width: 768px) {
  .list-group-horizontal-md {
    flex-direction: row;
  }
  .list-group-horizontal-md > .list-group-item:first-child {
    border-bottom-left-radius: 0.35rem;
    border-top-right-radius: 0;
  }
  .list-group-horizontal-md > .list-group-item:last-child {
    border-top-right-radius: 0.35rem;
    border-bottom-left-radius: 0;
  }
  .list-group-horizontal-md > .list-group-item.active {
    margin-top: 0;
  }
  .list-group-horizontal-md > .list-group-item + .list-group-item {
    border-top-width: 1px;
    border-left-width: 0;
  }
  .list-group-horizontal-md > .list-group-item + .list-group-item.active {
    margin-left: -1px;
    border-left-width: 1px;
  }
}

@media (min-width: 992px) {
  .list-group-horizontal-lg {
    flex-direction: row;
  }
  .list-group-horizontal-lg > .list-group-item:first-child {
    border-bottom-left-radius: 0.35rem;
    border-top-right-radius: 0;
  }
  .list-group-horizontal-lg > .list-group-item:last-child {
    border-top-right-radius: 0.35rem;
    border-bottom-left-radius: 0;
  }
  .list-group-horizontal-lg > .list-group-item.active {
    margin-top: 0;
  }
  .list-group-horizontal-lg > .list-group-item + .list-group-item {
    border-top-width: 1px;
    border-left-width: 0;
  }
  .list-group-horizontal-lg > .list-group-item + .list-group-item.active {
    margin-left: -1px;
    border-left-width: 1px;
  }
}

@media (min-width: 1200px) {
  .list-group-horizontal-xl {
    flex-direction: row;
  }
  .list-group-horizontal-xl > .list-group-item:first-child {
    border-bottom-left-radius: 0.35rem;
    border-top-right-radius: 0;
  }
  .list-group-horizontal-xl > .list-group-item:last-child {
    border-top-right-radius: 0.35rem;
    border-bottom-left-radius: 0;
  }
  .list-group-horizontal-xl > .list-group-item.active {
    margin-top: 0;
  }
  .list-group-horizontal-xl > .list-group-item + .list-group-item {
    border-top-width: 1px;
    border-left-width: 0;
  }
  .list-group-horizontal-xl > .list-group-item + .list-group-item.active {
    margin-left: -1px;
    border-left-width: 1px;
  }
}

.list-group-flush {
  border-radius: 0;
}

.list-group-flush > .list-group-item {
  border-width: 0 0 1px;
}

.list-group-flush > .list-group-item:last-child {
  border-bottom-width: 0;
}

.list-group-item-primary {
  color: #293c74;
  background-color: #cdd8f6;
}

.list-group-item-primary.list-group-item-action:hover, .list-group-item-primary.list-group-item-action:focus {
  color: #293c74;
  background-color: #b7c7f2;
}

.list-group-item-primary.list-group-item-action.active {
  color: #fff;
  background-color: #293c74;
  border-color: #293c74;
}

.list-group-item-secondary {
  color: #45464e;
  background-color: #dddde2;
}

.list-group-item-secondary.list-group-item-action:hover, .list-group-item-secondary.list-group-item-action:focus {
  color: #45464e;
  background-color: #cfcfd6;
}

.list-group-item-secondary.list-group-item-action.active {
  color: #fff;
  background-color: #45464e;
  border-color: #45464e;
}

.list-group-item-success {
  color: #0f6848;
  background-color: #bff0de;
}

.list-group-item-success.list-group-item-action:hover, .list-group-item-success.list-group-item-action:focus {
  color: #0f6848;
  background-color: #aaebd3;
}

.list-group-item-success.list-group-item-action.active {
  color: #fff;
  background-color: #0f6848;
  border-color: #0f6848;
}

.list-group-item-info {
  color: #1c606a;
  background-color: #c7ebf1;
}

.list-group-item-info.list-group-item-action:hover, .list-group-item-info.list-group-item-action:focus {
  color: #1c606a;
  background-color: #b3e4ec;
}

.list-group-item-info.list-group-item-action.active {
  color: #fff;
  background-color: #1c606a;
  border-color: #1c606a;
}

.list-group-item-warning {
  color: #806520;
  background-color: #fceec9;
}

.list-group-item-warning.list-group-item-action:hover, .list-group-item-warning.list-group-item-action:focus {
  color: #806520;
  background-color: #fbe6b1;
}

.list-group-item-warning.list-group-item-action.active {
  color: #fff;
  background-color: #806520;
  border-color: #806520;
}

.list-group-item-danger {
  color: #78261f;
  background-color: #f8ccc8;
}

.list-group-item-danger.list-group-item-action:hover, .list-group-item-danger.list-group-item-action:focus {
  color: #78261f;
  background-color: #f5b7b1;
}

.list-group-item-danger.list-group-item-action.active {
  color: #fff;
  background-color: #78261f;
  border-color: #78261f;
}

.list-group-item-light {
  color: #818183;
  background-color: #fdfdfe;
}

.list-group-item-light.list-group-item-action:hover, .list-group-item-light.list-group-item-action:focus {
  color: #818183;
  background-color: #ececf6;
}

.list-group-item-light.list-group-item-action.active {
  color: #fff;
  background-color: #818183;
  border-color: #818183;
}

.list-group-item-dark {
  color: #2f3037;
  background-color: #d1d1d5;
}

.list-group-item-dark.list-group-item-action:hover, .list-group-item-dark.list-group-item-action:focus {
  color: #2f3037;
  background-color: #c4c4c9;
}

.list-group-item-dark.list-group-item-action.active {
  color: #fff;
  background-color: #2f3037;
  border-color: #2f3037;
}


                        </style>
                   

                </div>
             
 
                         
                            <link rel="stylesheet" type="text/css" href="../../offline/datatable.css"/>
 
<script type="text/javascript" src="../../offline/datatable.js"></script>
     <script src="../../js/jquery.js"></script>
         	<?php 
         	if(isset($_GET['sortby'])){
         		$sem = $_GET['sem'];
         		$yr = $_GET['yr'];
         		$coid = $_GET['coid'];
         		$typo = $_GET['typo'];
         		$rep = $_GET['rep'];
         		$sortby = $_GET['sortby'];
            $yrlevel = $_GET['yrlevel'];
            $course = $_GET['course'];
           

           if($course == 'undefined'){
             $courses = 'selectcourse';
           }else if ($course =='selectcourse'){
              $courses = 'selectcourse';
           }
           else {
            $courses = $course;
           }

          
         		?>
         		<script type="text/javascript">
         			  $(document).ready(function() {
         			  	var rep = '<?php echo $rep ?>';

         			  	$('#typeofreport').val('<?php echo $sortby ?>');
         			  	$('#college_').val('<?php echo $coid ?>');
         			  	$('#report').val('<?php echo $rep ?>');
         			  	$('#semester_').val('<?php echo $sem ?>');
         			  	$('#year_').val('<?php echo $yr ?>');
         			  		$('#typeofreport').attr('disabled',true);
                    $('#year_level').val('<?php echo $yrlevel ?>');
         			  	$('#courses_').val('<?php echo $courses ?>');

                  

         			  	if(rep == 'shift'){
         			  		$('#college_').attr('disabled',true);
                    $('#college_').val('All Colleges');
                    $('#courses_').addClass('d-none');
         			  	}else {
         			  		$('#college_').removeAttr('disabled');
         			  	}

         			  	content('<?php echo $sem ?>','<?php echo $yr ?>','<?php echo $coid ?>','<?php echo $typo ?>','<?php echo $rep ?>','<?php echo $yrlevel ?>','<?php echo $courses ?>');

         			  	 	function content(sem,year,coid,typo,rep,yrlevel,courses){
                		 $.ajax({
                		 url : "report.php",
                		  method: "POST",
                		 data  : {content:1,sem:sem,year:year,collegeid:coid,typo:typo,rep:rep,yrlevel:yrlevel,course:courses},
                		  success : function(data){
                		 $('#report_content').html(data);

                		   }
                		 })
                	}
         			
         			  });
         		</script>
         		<?php
         	}


         	 ?>     
         
            <script type="text/javascript">
                
                $(document).ready(function() {
                      function printpage() {
            var divContents = document.getElementById("printpage").innerHTML;
            var header = document.getElementById("printcenter").innerHTML;
            var htmlhead = document.getElementById("headerstyle_print").innerHTML;
            var a = window.open('', '', 'height=800, width=1000');
            a.document.write(htmlhead);
            a.document.write(header);
            a.document.write(divContents);
            a.document.write('</body></html>');
            a.document.close();
            a.print();
        }

            $('#printnow').click(function(){
              printpage();                
            })

                $('#toprint').click(function(){
                     var report = $('#report').val();

                     if(report == 'Notfilledup'){
                         $('#titleofreport').val('Not yet filled up their PDS');
                         $('#report_po').text('Not yet filled up their PDS');             
                     }
                  //   alert(report);

                     if(report == 'completedpds'){
                        $('#titleofreport').val('Completed Personal Data Sheet');
                         $('#report_po').text('Completed Personal Data Sheet');  
                     }
                     if(report == 'pendingpds'){
                            $('#titleofreport').val('Pending Personal Data Sheet');
                         $('#report_po').text('Pending Personal Data Sheet');  
                     }
                       if(report == 'shift'){
                            $('#titleofreport').val('Shifting Records Per College');
                         $('#report_po').text('Shifting Records Per College');  

                        


                     }
                    
                })

                $('#titleofreport').keyup(function(){
                    var value = $(this).val();
                     $('#report_po').text(value);
                })


                	$('#typeofreport').change(function(){
                		var val = $(this).val();
                		if(val == 1){
                			$('.di').removeAttr('disabled');
                		$(this).attr('disabled',true);
                			
                				$(this).removeClass('is-invalid');
                		}else {
                			$(this).addClass('is-invalid');
                			$('.di').attr('disabled',true);

                		}
                			  		
                	})

                	$('#college_').change(function(){
                		var col = $('#college_').val();
                		var sem = $('#semester_').val();
                		var yr =$('#year_').val();
                		var ty = $('#typeofreport').val();
                		var rep = $('#report').val();
                     var yrlevel = $('#year_level').val();
                     var courses = $('#courses_').val();



                		window.location.href='?sortby='+ty+'&sem='+sem+'&yr='+yr+'&coid='+col+'&typo='+ty+'&rep='+rep+'&yrlevel='+yrlevel+'&course=undefined';




                			  		
                	})

                	$('#report').change(function(){

                		var col = $('#college_').val();
                		var sem = $('#semester_').val();
                		var yr =$('#year_').val();
                		var ty = $('#typeofreport').val();
                		var rep = $('#report').val();
                     var yrlevel = $('#year_level').val();



                		   var courses = $('#courses_').val();



                    window.location.href='?sortby='+ty+'&sem='+sem+'&yr='+yr+'&coid='+col+'&typo='+ty+'&rep='+rep+'&yrlevel='+yrlevel+'&course='+courses;



                			  		
                	})

                	$('#semester_').change(function(){

                		var col = $('#college_').val();
                		var sem = $('#semester_').val();
                		var yr =$('#year_').val();
                		var ty = $('#typeofreport').val();
                		var rep = $('#report').val();
                     var yrlevel = $('#year_level').val();



                		  var courses = $('#courses_').val();



                    window.location.href='?sortby='+ty+'&sem='+sem+'&yr='+yr+'&coid='+col+'&typo='+ty+'&rep='+rep+'&yrlevel='+yrlevel+'&course='+courses;



                			  		
                	})

                	$('#year_').change(function(){

                		var col = $('#college_').val();
                		var sem = $('#semester_').val();
                		var yr =$('#year_').val();
                		var ty = $('#typeofreport').val();
                		var rep = $('#report').val();
                    var yrlevel = $('#year_level').val();


                		   var courses = $('#courses_').val();



                    window.location.href='?sortby='+ty+'&sem='+sem+'&yr='+yr+'&coid='+col+'&typo='+ty+'&rep='+rep+'&yrlevel='+yrlevel+'&course='+courses;



                			  		
                	})

                  $('#year_level').change(function(){
                    
                      var col = $('#college_').val();
                    var sem = $('#semester_').val();
                    var yr =$('#year_').val();
                    var ty = $('#typeofreport').val();
                    var rep = $('#report').val();
                    var yrlevel = $('#year_level').val();


                        var courses = $('#courses_').val();



                    window.location.href='?sortby='+ty+'&sem='+sem+'&yr='+yr+'&coid='+col+'&typo='+ty+'&rep='+rep+'&yrlevel='+yrlevel+'&course='+courses;




                  })
                  

                  $('#courses_').change(function(){
                      var col = $('#college_').val();
                    var sem = $('#semester_').val();
                    var yr =$('#year_').val();
                    var ty = $('#typeofreport').val();
                    var rep = $('#report').val();
                    var yrlevel = $('#year_level').val();


                        var courses = $('#courses_').val();



                    window.location.href='?sortby='+ty+'&sem='+sem+'&yr='+yr+'&coid='+col+'&typo='+ty+'&rep='+rep+'&yrlevel='+yrlevel+'&course='+courses;


                  })
                  
                
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


    
    <script type="text/javascript">
          $(document).ready(function() {
              if($(window).width() <= 768){
               $('#accordionSidebar').addClass('toggled');
              }
        
          });
    </script>
  


</body>

</html>