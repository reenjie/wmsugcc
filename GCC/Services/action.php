<?php 
session_start();
include '../create_form/connect.php';

if(isset($_POST['savesched'])){
	$title = $_POST['title'];
	$thedate = $_POST['thedate'];
	$timestart = $_POST['timestart'];
	$timeend = $_POST['timeend'];
	$ctype = $_POST['ctype'];

	$st = $_POST['st'];

	if($st == 'add'){
		$insert_sched = "INSERT INTO `scheduler`(`title`, `date_valid`, `time_start`, `time_end`,`status`) VALUES ('$title','$thedate','$timestart','$timeend','$ctype')";
		mysqli_query($con,$insert_sched);
		 $id = mysqli_insert_id($con);

		if(isset($_SESSION['create_add'])){
			$cid = $_SESSION['create_add'];
	date_default_timezone_set('Asia/Manila');
    $datenow = date('Y-m-d H:i:s');
    
    	$markasdone = "UPDATE `counseling_request` SET `sched_id`='$id' ,`status` ='4' where c_id='$cid' ";
	mysqli_query($con,$markasdone);


		}

	$_SESSION['saved'] = 1;
	header('location:index.php');

	}else if ($st =='edit'){
		$id = $_POST['id'];

		$update_sched = "UPDATE `scheduler` SET `title`='$title',`date_valid`='$thedate',`time_start`='$timestart',`time_end`='$timeend',`status`='$ctype' WHERE sched_id = '$id' ";
		mysqli_query($con,$update_sched);


		$_SESSION['saved'] =3;
	header('location:index.php');

	}

		
}

if(isset($_POST['delsched'])){

	$delsched = $_POST['delsched'];

	   date_default_timezone_set('Asia/Manila');
		$datenow = date('Y-m-d');

		$select_exp = "select * from scheduler  ";
		 $gettinginvalid = mysqli_query($con,$select_exp); 
		 $count= mysqli_num_rows($gettinginvalid);
	
		
	 while($row = mysqli_fetch_array($gettinginvalid)){
			$datev = $row['date_valid'];
			$scid = $row['sched_id'];

					$checkif_expired = "select * from counseling_request where status =5 and sched_id = '$scid'  ";
					 $chckng = mysqli_query($con,$checkif_expired); 
					 $counting= mysqli_num_rows($chckng);
					
					
				 while($exp = mysqli_fetch_array($chckng)){
							$pp = $exp['sched_id'];		


			


					 }
		if($datenow > $datev){
			if($scid == $pp){


			}else {
					
	$delete_sched = "DELETE FROM `scheduler` WHERE sched_id ='$scid' ";
	mysqli_query($con,$delete_sched);

	$delrequest = "DELETE FROM `counseling_request` WHERE sched_id = '$scid' ";
	mysqli_query($con,$delrequest);

	$_SESSION['saved'] = 2;
	header('location:index.php');	


			}
	 
	 	}else {

	 $delete_sched = "DELETE FROM `scheduler` WHERE sched_id ='$delsched' ";
	mysqli_query($con,$delete_sched);

	$delrequest = "DELETE FROM `counseling_request` WHERE sched_id = '$delsched' ";
	mysqli_query($con,$delrequest);

	$_SESSION['saved'] = 2;
	header('location:index.php');	


	 	}
				
				 


		 }
	
	 	




	
}


if(isset($_POST['tablecontent'])){
	$skey = $_POST['tablecontent'];


	?>

	  <form method="post" action="action.php">

	    <div class="table-responsive" style="height: 500px;overflow-y: scroll;">
	    		
                                      <table class="table table-sm table-striped table-borderless" style="font-size: 13px">
                                      <thead>
                                        <tr class="table-success">
                                            <th scope="col">
                                                <button type="button" class="btn btn-light text-info" id="selectall" style="font-size:12px">Select All</button>
                                            </th>
                                            <th scope="col">Action</th>
                                             <th scope="col">ID</th>

                                          <th scope="col">Name</th>
                                          <th scope="col">Course and College</th>
                                        
                                          
                                        </tr>
                                      </thead>
                                      <tbody style="">
                                      	<?php 
                                      	if($skey == 'none'){
                                      		$get_studentdata = "select * from student  ";
                                      	}else {
                                      		$k =  substr($skey, 0,1);

                                      		if($k == 'c'){
                                      			$keysearch  = substr($skey,1);
                                      				$get_studentdata = "select * from student where stud_college ='$keysearch'  ";
                                      		}else {
                                      				$get_studentdata = "select * from student where stud_email like '%$skey%' or stud_lname like '%$skey%' or stud_fname like '%$skey%' or stud_mname like '%$skey%'  ";
                                      		}

                                      	
                                      	}
                                      		
                                      		 $gettingdata = mysqli_query($con,$get_studentdata); 
                                      		 $countsss= mysqli_num_rows($gettingdata);
                                      	
                                      		if($countsss >=1){
                                      	 while($row = mysqli_fetch_array($gettingdata)){
                                      	 	 	$studentid = $row['stud_id'];
					                          $student_lname = $row['stud_lname'];
					                          $student_fname = $row['stud_fname'];
					                          $student_mname = $row['stud_mname'];
					                          $student_email = $row['stud_email'];
                                      	 	$studemail = substr($student_email, 0, strpos($student_email,'@'));
                                      	 	    $student_course = $row['stud_course'];
                             					$stud_coll = $row['stud_college'];

                                      				?>
                                      				<tr>
                                            <td>
                                                <div class="custom-control custom-checkbox">
												  <input type="checkbox" class="custom-control-input checkall" value="<?php echo $studentid ?>" name="selected[]" id="<?php echo $studentid ?>">
												  <label class="custom-control-label" for="<?php echo $studentid ?>"></label>
												</div>
                                            </td>
                                            <td>
                                            	<div class="btn-group">
                                            	<button type="button" onclick="window.location.href='student_records.php?find=<?php echo md5($student_lname) ?>&id=<?php echo $studentid ?>&<?php echo md5($student_fname) ?>'" class="btn btn-light text-info" style="font-size:12px">Records</button>
                                            	<button type="button" data-toggle="modal" data-target="#exampleModal<?php echo $studentid ?>" class="btn btn-light text-primary" style="font-size:12px">Set For Counseling</button>
                                            	</div>


			<div class="modal fade" id="exampleModal<?php echo $studentid ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog modal-lg" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h6 style="font-size:13px" class="modal-title" id="exampleModalLabel">For Counseling</h6>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			       		<div class="container">
			       			<div class="row">
			       				<div class="col-md-6">
			       					<h6 style="font-size:13px"><i class="fas fa-info-circle"></i> Scheduled Counseling</h6>
			       					<hr>
			       					   <?php 
                                                             $getall_sched = "SELECT * FROM `scheduler` where sched_id in (select sched_id from counseling_request where stud_id = '$studentid' )  ";
                                                             $gettingsched = mysqli_query($con,$getall_sched); 
                                                           
                                                         
                                                          
                                                         while($rowe = mysqli_fetch_array($gettingsched)){
                                                                ?>
                                                                    <li class="list-group-item " id="<?php echo $rowe['sched_id'] ?>">
                                                            <h6 style="font-size:13px">     
                                                                    
                                                                <span style="font-weight:bolder"><?php echo $rowe['title'] ?></span>
                                                                <br>
                                                                <?php  date_default_timezone_set('Asia/Manila') ?>
                                                              <span class="text-info"><?php echo date('F j,Y',strtotime($rowe['date_valid'])) ?></span> <br>
                                                               <span class="text-danger"><?php echo date('h:i a',strtotime($rowe['time_start'])) ?> -> <?php echo date('h:i a',strtotime($rowe['time_end'])); ?> </span> 


                                                               <br><hr>

                                                             

                                                                </h6>
                                                     </li>
                                                               <?php

                                                           }

                                                             ?>

			       				</div>
			       				<div class="col-md-6">
			       					<h6 style="font-size:13px"><i class="fas fa-info-circle"></i> Select Schedules Below.</h6>
                                			 <ul class="list-group list-group-flush">

                                                    

                                                        <?php 
                                                   
                                                            $getall_sched = "SELECT * FROM `scheduler` where sched_id not in (select sched_id from counseling_request where stud_id = '$studentid' )  ";
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
                                                                    <button type="button" class="btn btn-light text-primary selsched" data-sid="<?php echo $row['sched_id'] ?>" data-uid="<?php echo $studentid ?>" style="float:right; font-size: 13px">Select</button>
                                                                <?php
                                                               }else if(date('Y-m-d') < $row['date_valid']) {
                                                                 ?>
                                                                  <span class="badge badge-warning">Inactive</span>   
                                                                    <button type="button" class="btn btn-light text-primary selsched" data-sid="<?php echo $row['sched_id'] ?>" data-uid="<?php echo $studentid ?>" style="float:right; font-size: 13px">Select</button>

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
                                              No Available Schedule..</h6></li>

                                                            <?php
                                                         }

                                                         ?>


                                             <!--  -->
                                           



                                                     </ul>
			       				</div>
			       			</div>
			       		</div>

			      </div>
			      <div class="modal-footer">
			      
			        <button type="button" class="btn btn-light text-danger" data-dismiss="modal" style="font-size:12px">Cancel</button>
			      </div>
			    </div>
			  </div>
			</div>
                                            </td>
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
                                      	 		<td colspan="6"><h6 style="text-align:center;font-size:13px" >No Student Records Found </h6></td>
                                      	 	</tr>
                                      	 	<?php
                                      	 	}else {
                                      	 				?>
                                      	 	<tr>
                                      	 		<td colspan="6"><h6 style="text-align:center;font-size:13px" >No Student Records Found keyword : <span class="text-danger"> <?php echo $skey ?></span></h6></td>
                                      	 	</tr>
                                      	 	<?php
                                      	 	}
                                      	 
                                      	 }

                                      	 ?>
                                        
                                      </tbody>
                                    </table>
                                
                                    </div>
                                       <h6 class="mt-3" style="font-size:13px;float: right;"> <?php echo $countsss.' Records Found'; ?></h6>
                                    <div class="row">
                                        <div class="col-md-5">
                                              <div class="card shadow">
                                        <div class="card-body">
                                            <h6 style="font-size:13px;font-weight: bolder;">Options on Selected:</h6>
                                    <button type="submit" name="forcounseling" class="btn btn-light text-primary" style="font-size:12px">For Counseling</button>

                                  <!--Can Add more options here-->



                                  <!---->
                                        </div>
                                    </div>
                                        </div>
                                    </div>
                                  
                                    	
                                    </form>

                                    <script type="text/javascript">

                                    	$('.selsched').click(function(){
                                    		var sid = $(this).data('sid');
                                    		var uid = $(this).data('uid');
                                    			
                                    			$(this).html('<span class="text-info">Selecting <i class="fas fa-spinner fa-pulse"></i></span>')

                                    		 $.ajax({
                                    		 url : "set.php",
                                    		  method: "POST",
                                    		 data  : {set:1,sid:sid,uid:uid},
                                    		  success : function(data){
                                    		  	$('.selsched').html('');
                                    		  	Swal.fire(
                                    		  		'Selection Complete!',
                                    		  		'Schedule successfully set',
                                    		  		'success'
                                    		  		).then((result) => {
													
												  if (result.isConfirmed) {
												  window.location.href="index.php";

												  }
												})
                                    			//
                                    		   }
                                    		 })
                                    			  		
                                    	})


									    
                                    	$('#selectall').click(function(){
                                    	
                                    		var sh = $('#selectall').html();
                                    		if(sh == 'Select All'){
                                    			$('.checkall').prop('checked',true);
                                    			$('#selectall').html('Desselect');
                                    			$('#customCheck1').prop('checked',true);
                                    		}else if (sh == 'Desselect'){
                                    			$('.checkall').prop('checked',false);
                                    			$('#customCheck1').prop('checked',false);
                                    			$('#selectall').html('Select All');
                                    		}
                                    		

                                    			  		
                                    	})
                                    </script>
	<?php
}


//For Counseling Option
if(isset($_POST['forcounseling'])){


	if(isset($_POST['selected'])){
		$_SESSION['forcounseling'] = array();
		foreach ($_POST['selected'] as $key => $value) {
			array_push($_SESSION['forcounseling'], $value);
		}

		header('location:select_schedule.php');

	}else {
		$_SESSION['noselected'] = 1;
		header('location:student.php');
	}
	
}

if(isset($_POST['endsession'])){
	
		if(isset($_SESSION['forcounseling'])){
			unset($_SESSION['forcounseling']);
		}
}

if(isset($_POST['requestcontent'])){
	$key = $_POST['requestcontent'];

	?>

	   <table class="table table-responsive">
                                                 
                                               <tbody>
                                                    <?php 
                                                  
                                                 
                                                        date_default_timezone_set('Asia/Manila');
														$datenow = date('Y-m-d');
														$newkey = substr($key , 0,6);
														$snewkey = substr($key , 0,10);
                                                        if($key == 'all'){
                                                        	$get_counselingdata = "select * from counseling_request where status != 5  "; 
                                                        }else if($key == 'date'){


                                                    $get_counselingdata ="select * from counseling_request where sched_id in (select sched_id from scheduler where date_valid = '$datenow') and status != 5";	
                                                        	
                                                      		

                                                        	
                                                        }else if($newkey == 'search') {


                                                        	$skey = substr($key, 6);

                                                      	$get_counselingdata = "select * from counseling_request where stud_id in (select stud_id from  student where stud_lname like '%$skey%' || stud_fname like '%$skey%' || stud_mname like '%$skey%' || stud_email like '%$skey%') and status != 5 ";


                                                        }
                                                        else if($snewkey == 'datesearch') {


                                                        	$skey = substr($key, 10);


                                                      	$get_counselingdata = "select * from counseling_request where stud_id in (select stud_id from  student where stud_lname like '%$skey%' || stud_fname like '%$skey%' || stud_mname like '%$skey%' || stud_email like '%$skey%') and sched_id in (select sched_id from scheduler where date_valid = '$datenow') and status != 5 ";


                                                        }else if($snewkey =='donesearch'){
                                                        		$skey = substr($key, 10);
                                                        		

                                                      	$get_counselingdata = "select * from counseling_request where stud_id in (select stud_id from  student where stud_lname like '%$skey%' || stud_fname like '%$skey%' || stud_mname like '%$skey%' || stud_email like '%$skey%') and status ='5' ";
                                                        }else if ($key =='done'){
                                                        	?>
                                                        	<button class="btn btn-light text-danger " id="deleteall" style="font-size:12px;float: right;">DELETE ALL</button>
                                                        	<?php
                                                        		$get_counselingdata = "select * from counseling_request where status ='5'   "; 
                                                        }
                                                      

                                                         $getallcounselings = mysqli_query($con,$get_counselingdata); 
                                                         $countingcs= mysqli_num_rows($getallcounselings);
                                                       
                                                        if($countingcs >=1){
                                                     while($row = mysqli_fetch_array($getallcounselings)){
                                                        $studid = $row['stud_id'];
                                                        $schedid = $row['sched_id'];
                                                        $status = $row['status'];
                                                        $cid = $row['c_id'];

                                                                $get_studentdata = "select * from student where stud_id = '$studid'  ";
                                             $gettingdata = mysqli_query($con,$get_studentdata); 
                                             $count= mysqli_num_rows($gettingdata);
                                            
                                          
                                         while($rows = mysqli_fetch_array($gettingdata)){
                                                $studentid = $rows['stud_id'];
                                              $student_lname = $rows['stud_lname'];
                                              $student_fname = $rows['stud_fname'];
                                              $student_mname = $rows['stud_mname'];
                                              $student_email = $rows['stud_email'];
                                                $student_course = $rows['stud_course'];
                                                $stud_coll = $rows['stud_college'];

                                          }
                                     
                                                               ?>
                                                                <tr>
                                                        <td>
                                                        	<?php 
                                                        	if($status == 5){
                                                        		?>
                                                        		<span class="text-success form-control" style="font-size:12px">DONE</span>

                                                        		  <button class="btn btn-light text-danger mt-2 form-control removecrd" data-id="<?php echo $cid ?>" style="font-size: 12px;">Delete</button>
                                                        		<?php
                                                        		}else if ($status == 2){
                                                        			?>

                                                        			 <button class="btn btn-light text-success form-control confirm " data-id="<?php echo $cid ?>" style="font-size: 12px">Confirm</button>

                                                        			     <button class="btn btn-light text-danger mt-2 form-control removecr" data-id="<?php echo $cid ?>" style="font-size: 12px;">Delete</button>
                                                        			<?php
                                                        		}else if ($status == 3){
                                                        				?>

                                                        			 <button class="btn btn-light text-success form-control " data-id="<?php echo $cid ?>" data-toggle="modal" data-target="#exampleModal<?php echo $cid ?>" style="font-size: 12px">Add Schedule</button>
                                                        			 <!-- Button trigger modal -->

                                                        			   <button class="btn btn-light text-success form-control mkd mt-2" data-id="<?php echo $cid ?>" style="font-size: 12px">Mark as Done</button>



<div class="modal fade" id="exampleModal<?php echo $cid ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel">Select Schedule</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <button class="btn btn-light text-success mt-2 mb-2 addsched"  data-id="<?php echo $cid ?>" data-dismiss="modal" data-toggle="modal" data-target="#createsched" style="font-size:13px">Create Schedule <i class="fas fa-plus-circle"></i> </button>

     	         <?php 
                                                        date_default_timezone_set('Asia/Manila');
														$datenow = date('Y-m-d');
                                                            $getall_sched = "SELECT * FROM `scheduler` where date_valid >= '$datenow' and sched_id not in (select sched_id from counseling_request where stud_id = '$studentid' and status !=5 ) ";
                                                             $gettingsched = mysqli_query($con,$getall_sched); 
                                                             $count= mysqli_num_rows($gettingsched);
                                                         	
													   
                                                            if($count >=1){
                                                         while($row = mysqli_fetch_array($gettingsched)){
                                                              $sid = $row['sched_id'];
                                                            $stat = $row['status'];
                                                                ?>
                                                                    <li class="list-group-item" id="<?php echo $row['sched_id'] ?>">
                                                            <h6 style="font-size:13px;text-align: left;">     
                                                                    
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
                                                                    <button class="btn btn-light text-primary selsched" data-id="<?php echo $cid ?>" data-sid="<?php echo $row['sched_id'] ?>" style="float:right; font-size: 13px">Select</button>
                                                                <?php
                                                               }else if(date('Y-m-d') < $row['date_valid']) {
                                                                 ?>
                                                                  <span class="badge badge-warning">Inactive</span>    
                                                                    <button class="btn btn-light text-primary selsched" data-id="<?php echo $cid ?>" data-sid="<?php echo $row['sched_id'] ?>" style="float:right; font-size: 13px">Select</button>

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
                                              No Available Schedule to Select..</h6></li>


                                           

                                                            <?php
                                                         }

                                                         ?>

      </div>
      <div class="modal-footer">
       
      </div>
    </div>
  </div>
</div>



                                                        			     <button class="btn btn-light text-danger mt-2 form-control removecr" data-id="<?php echo $cid ?>" style="font-size: 12px;">Delete</button>
                                                        			<?php
                                                        		}


                                                        		else {
                                                        		  $getall_scheds = "SELECT * FROM `scheduler` where sched_id = '$schedid'  ";
                                                             $gettingscheds = mysqli_query($con,$getall_scheds); 
                                                           
                                                         
                                                          
		                                                         while($rowes = mysqli_fetch_array($gettingscheds)){
		                                                         	  if(date('Y-m-d') == $rowes['date_valid']){ 
		                                                         	  	?>
		                                                         	  	  <button class="btn btn-light text-success form-control mkd" data-id="<?php echo $cid ?>" style="font-size: 12px">Mark as Done</button>
		                                                         	  	<?php
		                                                         	  }else {
		                                                         	  	 	?>
		                                                         	  	  <button class="btn btn-light text-secondary form-control" disabled style="font-size: 12px" data-toggle="tooltip" data-placement="right" title="Unable to Mark it as Done, Schedule arent active yet.">Mark as Done</button>
		                                                         	  	<?php
		                                                         	  }

		                                                         	  ?>
		                                                         	      <button class="btn btn-light text-danger mt-2 form-control removecr" data-id="<?php echo $cid ?>" style="font-size: 12px;">Delete</button>
		                                                         	  <?php
		                                                         }

                                                        		}
                                                        	 ?>
                                                        	
                                                        </td>
                                                      <th scope="row"><?php echo $student_fname.' '.$student_mname.' '.$student_lname ?><br><span style="font-size:11px"><?php echo $student_email ?></span>
                                                        <br>
                                                       <span style="font-size: 13px;">   <?php 
                                     

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
                                        </span>
                                        <br>
                                                           <textarea class="text-dark form-control remarks" data-id="<?php echo $cid ?>" style="width:100%;font-size: 13px;resize: none;background-color: #ffffff" rows="3" placeholder="Type Remarks here .." ><?php echo $row['remarks'] ?></textarea>

                                                      </th>
                                                     
                                                      <td>
                                                        <span style="font-size:12px">
                                                            Type: 
                                                        </span>
                                                        <?php 
                                                        if($status == 0){
                                                            ?>
                                                            <span class="badge badge-success">Created</span>
                                                            <?php

                                                        }else {
                                                            ?>
                                                            <span class="badge badge-success">Requested </span>
                                                            <?php
                                                        }

                                                         ?>
                                                        
                                                        
                                                        <br>
                                                            
                                                          <span class="" style="font-size:12px">Schedule Appointment: <br>
                                                            <?php
                                                            if($schedid == 0){
                                                            	?>
                                                            	<span style="font-size:13px" class="text-danger">Requesting for Schedule</span>
                                                            	<?php
                                                            }else {

                                                            		   $getall_sched = "SELECT * FROM `scheduler` where sched_id = '$schedid'  ";
                                                             $gettingsched = mysqli_query($con,$getall_sched); 
                                                           
                                                         
                                                          
                                                         while($rowe = mysqli_fetch_array($gettingsched)){
                                                                ?>
                                                                    <li class="list-group-item" id="<?php echo $rowe['sched_id'] ?>">
                                                            <h6 style="font-size:13px">     
                                                                    
                                                                <span style="font-weight:bolder"><?php echo $rowe['title'] ?></span>
                                                                <br>
                                                                <?php  date_default_timezone_set('Asia/Manila') ?>
                                                              <span class="text-info"><?php echo date('F j,Y',strtotime($rowe['date_valid'])) ?></span> <br>
                                                               <span class="text-danger"><?php echo date('h:i a',strtotime($rowe['time_start'])) ?> -> <?php echo date('h:i a',strtotime($rowe['time_end'])); ?> </span> 


                                                               <br>
                                                               <?php

                                                           }

                                                            } 


                                                          

                                                             ?>

                                                          </span>

                                                      </td>
                                                  
                                                    </tr>
                                                               <?php             
                                                         }
                                                    
                                                     }else {
                                                        ?>

                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td  colspan="4">
                                                               <h6 style="text-align:center;" class="mt-4">
                                                                   <img src="../img/undraw_empty_street_sfxm.png" style="width:350px">
                                                                   <br>
                                                                   There was no data found.
                                                               </h6> 
                                                            </td>
                                                        </tr>
                                                        <?php
                                                     }

                                                     ?>
                                                   
                                                   
                                                  </tbody>
                                                </table>

                                                <script type="text/javascript">
                                                	   	$('.selsched').click(function(){
                                    		var sid = $(this).data('sid');
                                    		var uid = $(this).data('uid');
                                    		var cid = $(this).data('id');
                                    			
                                    			$(this).html('<span class="text-info">Selecting <i class="fas fa-spinner fa-pulse"></i></span>')

                                    		 $.ajax({
                                    		 url : "set.php",
                                    		  method: "POST",
                                    		 data  : {setupt:cid,sid:sid},
                                    		  success : function(data){
                                    		  	$('.selsched').html('');
                                    		  	Swal.fire(
                                    		  		'Selection Complete!',
                                    		  		'Schedule successfully set',
                                    		  		'success'
                                    		  		).then((result) => {
													
												  if (result.isConfirmed) {
												  window.location.href="index.php";

												  }
												})
                                    			//
                                    		   }
                                    		 })
                                    			  		
                                    	})
                                                	$('.addsched').click(function(){
                                                		var id = $(this).data('id');
                                                		 $.ajax({
                                                		 url : "action.php",
                                                		  method: "POST",
                                                		 data  : {createandadd:id},
                                                		  success : function(data){
                                                		 
                                                		   }
                                                		 })
                                                			  		
                                                	})

                                                	$('#deleteall').click(function(){

                                                		
                                                		   Swal.fire({
                                                                          title: 'Are you sure to Delete all Request?',
                                                                          text: "You wont be able to revert this, Do you still want to Proceed?",
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
					                                                		 data  : {deleteall:1},
					                                                		  success : function(data){
					                                                		 location.reload();
					                                                		   }
					                                                		 })

                                                                            
                                                                          }
                                                                        })
                                                			  		
                                                	})
                                                	$('.remarks').focusout(function(){

                                                		var value = $(this).val();
                                                		var id = $(this).data('id');

                                                		 $.ajax({
                                                		 url : "action.php",
                                                		  method: "POST",
                                                		 data  : {saveremarks:value,id:id},
                                                		  success : function(data){
                                                		 
                                                		   }
                                                		 })
                                                	})

                                                	$('.removecr').click(function(){
                                                		var id = $(this).data('id');
                                                		    Swal.fire({
                                                                          title: 'Are you sure to Delete this Request?',
                                                                          text: "You wont be able to revert this.The student will then need to make a request again or the admin will be the one to create, Do you want to Proceed?",
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
                                                                     data  : {delcr:id},
                                                                      success : function(data){
                                                                     
                                                                    location.reload();
                                                                     }
                                                                      })
                                                                            
                                                                          }
                                                                        })
                                                			  		
                                                	})

                                                		$('.removecrd').click(function(){
                                                		var id = $(this).data('id');
                                                		    Swal.fire({
                                                                          title: 'Are you sure to Delete this Record?',
                                                                          text: "You wont be able to revert this.Do you want to Proceed?",
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
                                                                     data  : {delcr:id},
                                                                      success : function(data){
                                                                     
                                                                    location.reload();
                                                                     }
                                                                      })
                                                                            
                                                                          }
                                                                        })
                                                			  		
                                                	})

                                                		$('.confirm').click(function(){
                                                			var id = $(this).data('id');
                                                			 $.ajax({
                                                			 url : "action.php",
                                                			  method: "POST",
                                                			 data  : {confirm:id},
                                                			  success : function(data){
                                                			 	 location.reload();
                                                			   }
                                                			 })


                                                		})

                                                	$('.mkd').click(function(){
                                                	var id = $(this).data('id');
                                                	 Swal.fire({
                                                                          title: 'Are you sure ?',
                                                                          text: "",
                                                                          icon: 'question',
                                                                          showCancelButton: true,
                                                                          confirmButtonColor: '#7db282',
                                                                          cancelButtonColor: '#af5858',
                                                                          confirmButtonText: 'Yes, Mark it!'
                                                                        }).then((result) => {
                                                                          if (result.isConfirmed) {
                                                                              $.ajax({
                                                                     url : "action.php",
                                                                     method: "POST",
                                                                     data  : {mkdr:id},
                                                                      success : function(data){
                                                                     
                                                                    location.reload();
                                                                     }
                                                                      })
                                                                            
                                                                          }
                                                                        })

                                                			  		
                                                	})
                                                </script>
	<?php
	
}

if(isset($_POST['delcr'])){
	$delcr = $_POST['delcr'];

$delrequest = "DELETE FROM `counseling_request` WHERE c_id = '$delcr' ";
mysqli_query($con,$delrequest);

	
}

if(isset($_POST['mkdr'])){
	$mkdr = $_POST['mkdr'];

	$markasdone = "UPDATE `counseling_request` SET `status`='5' where c_id='$mkdr' ";
	mysqli_query($con,$markasdone);

}
if(isset($_POST['saveremarks'])){
	$saveremarks = $_POST['saveremarks'];
	$id = $_POST['id'];

	$markasdone = "UPDATE `counseling_request` SET `remarks`='$saveremarks' where c_id='$id' ";
	mysqli_query($con,$markasdone);
	
}
if(isset($_POST['deleteall'])){
	$delrequest = "DELETE FROM `counseling_request` WHERE status = 5 ";
mysqli_query($con,$delrequest);
}

if(isset($_POST['confirm'])){
	$confirm = $_POST['confirm'];

	$markasdone = "UPDATE `counseling_request` SET `status`='4' where c_id='$confirm' ";
	mysqli_query($con,$markasdone);
	
}
if(isset($_POST['createandadd'])){
	$createandadd = $_POST['createandadd'];

	$_SESSION['create_add'] = $createandadd;
	
}
 ?>