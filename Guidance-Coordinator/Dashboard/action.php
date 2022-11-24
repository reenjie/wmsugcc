<?php 
session_start();
include '../../GCC/create_form/connect.php';
$collegeId = $_SESSION['gc_collegid'];

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if(isset($_POST['pdscount'])){
			$sql = " select * from student  ";
	                $result = mysqli_query($con,$sql); // run query
	                $count= mysqli_num_rows($result); // to count if necessary
	             $rule =[];
	                 while($row = mysqli_fetch_array($result)){
		  				$studentid = $row['stud_id'];
		  				 $sqls = " select * from form_response where userid='$studentid' and csformid = '62'  and CollegeId = '$collegeId' ";
                                          $results = mysqli_query($con,$sqls); 
                                          $counts= mysqli_num_rows($results); 
                                 if($counts >=1){
                                 	$rule[] = $counts;
                                 }      
	                 }

	                $co =  count($rule);
	                echo $co;

	                 if(count($rule) == 0 ){
	                 	$deltealert = "DELETE FROM `notification` WHERE type='changes' and CollegeId= '$collegeId' and action ='globalnotification' ";
	                 	mysqli_query($con,$deltealert);
	                 }

	          

}
if(isset($_POST['shiftcount'])){ 
			$sql = " select * from student   ";
	                $result = mysqli_query($con,$sql); // run query
	                $count= mysqli_num_rows($result); // to count if necessary
	              $rule =[];
	                 while($row = mysqli_fetch_array($result)){
		  				$studentid = $row['stud_id'];
		  				 $sqls = " select * from form_response where userid='$studentid' and csformid = '60' and status ='approved' and CollegeId = '$collegeId' ";
                                          $results = mysqli_query($con,$sqls); 
                                          $counts= mysqli_num_rows($results); 
                                 if($counts >=1){
                                 	$rule[] = $counts;
                                 }else {

                                 }      
	                 }

	                 echo count($rule);

}

if(isset($_POST['tablecontent'])){ 
	
			$sql = "  select * from student  ";
	                $result = mysqli_query($con,$sql); 
	                 while($row = mysqli_fetch_array($result)){
							$studids = $row['stud_id'];
							$lastname = $row['stud_lname'];
							$fullname = $row['stud_lname'].' '.$row['stud_fname'];
							$age = $row['age'];
							$gender = $row['gender'];
							$student_email = $row['stud_email'];
							$studem = substr($student_email, 0, strpos($student_email,'@'));



									$noti = " SELECT * FROM `notification` where  studenttaker_id = '$studids' and type ='notification' and status ='unread' and CollegeId = '$collegeId' ";
							                $resultn = mysqli_query($con,$noti); // run query
							                 $count= mysqli_num_rows($resultn); 



							                



							               
							                 while($rown = mysqli_fetch_array($resultn)){
							                 		echo $rown['studenttaker_id'];
							                 		$action = $rown['action'];
							                 		$cid = $rown['toshiftcid'];
							                 		$notifcontent = $rown['content'];
							                 		$taker[] = $rown['studenttaker_id'];


							                 			 $sqls = " select * from form_response where userid='$studids' and csformid = '60' and status ='approved' and approvestat = '1' ";
                                          $results = mysqli_query($con,$sqls); 
                                          $counts= mysqli_num_rows($results); 
                                       
                                 
                                        
                                           while($rows = mysqli_fetch_array($results)){
                                          $csform= $rows['csformid'];
                                          $user = $rows['userid'];
                                          $respondedat = $rows['datecreated'];
                                           $respo = date('Y-m-d',strtotime($respondedat));
                                           $kurso = $rows['course'];
                                           $stat = $rows['approvestat'];
                                           $CollegeId = $rows['CollegeId'];

                                            $idforfiles[]= $rows['formid'];
                                            $shistory = $rows['shifting_history'];
                                              $fromwhere = $rows['fromwhere'];
                                               $coursetoshift = $rows['course'];
                                           }



		?>

                            <tr >
                              <td ><span style="font-size: 13px" ><?php echo date('F j, Y',strtotime($rown['date_notified'])) ?></span></td>
                            
                              

                              	<?php 
                              	if($action == 'shiftreceived'){
                              		?>
                          <td><span class="text-info" style="font-size: 13px"><?php echo $rown['title'] ?> <br> Student ID :  <?php echo $studem ?> , Lastname : <?php echo $lastname ?></span></td>
                              		<td>
                              		<div class="btn-group" role="group" aria-label="Basic example">
                              		 
                              		<a href="javascript:void(0)"  class="btn btn-light text-danger deletenote" data-notid= "<?php echo $rown['noti_id'] ?>"  style="font-size: 12px;width: 100%" ><i class="fas fa-times"></i> </a>

                              		<a href="../Shifting-Records/" target="_blank" class="btn btn-light text-primary" style="font-size: 12px;width: 100%" ><i class="fas fa-external-link-alt"></i></a>

                              		</div> 
                              	</td>
                              		<?php
                              	}else if ($action == 'shiftfill'){
                              		?>
                              		 <td><span class="text-info" style="font-size: 13px"><?php echo $rown['title'] ?> by <?php echo $rown['content'] ?></span></td>
                              		<td>
                              		<a href="javascript:void(0)"  class="btn btn-light text-danger deletenote" data-notid= "<?php echo $rown['noti_id'] ?>" style="font-size: 12px;width: 100%" ><i class="fas fa-times"></i> </a>
                              	</td>
                              		<?php	
                              	}else if ($action == 'pdsfilledup'){
                              		?>
                              		 <td><span class="text-info" style="font-size: 13px"><?php echo $rown['title'] ?> by <br> <?php echo $rown['content'] ?></span></td>
                              		<td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="javascript:void(0)"  class="btn btn-light text-danger deletenote" data-notid= "<?php echo $rown['noti_id'] ?>" style="font-size: 12px;width: 100%" ><i class="fas fa-times"></i> </a>
                              		<a href="../PDS-Records/" target="_blank" class="btn btn-light text-primary" style="font-size: 12px;width: 100%" ><i class="fas fa-external-link-alt"></i></a>
                                    </div>
                              	</td>
                              		<?php
                              	}else if ($action == 'pdsgetrequest'){
                              		?>
                        <td><span class="text-danger" style="font-size: 13px"><?php echo $rown['title'] ?> from <?php echo $rown['content'] ?>
                        		<?php 
                        				$selectcollege = " SELECT * FROM `colleges` where CollegeId = '$cid'  ";
                        		                $col = mysqli_query($con,$selectcollege);
                        		                $count= mysqli_num_rows($col); 
                        		              
                        		                 while($collegerow = mysqli_fetch_array($col)){
                        		                 	echo '( '.$collegerow['college'].' )';
                        							
                        							$c = $collegerow['college'];
                        		                 }
                        		          

                        		 ?>


                        </span></td>
                        <td><a href="javascript:void(0)"  data-toggle="modal" data-target="#details<?php  echo $studids	 ?>" data-backdrop="static" data-keyboard="false" style="font-size: 12px">Details</a>

                        
                        	
                        	<!-- Modal -->
                        	<div class="modal fade" id="details<?php  echo $studids	 ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        	  <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                        	    <div class="modal-content">
                        	    
                        	      <div class="modal-body">
                        	      	<div class="card shadow">
                        	      		<div class="card-body">
                        	      			
                        	      		
                        	      	<h6 style="font-size: 14px">Details:</h6>
                        	       		<h6 style="font-weight: bolder; font-size: 13px">
                        	       				Email : <span style="text-decoration: underline;"> <?php echo $student_email ?></span> <br>
                        	       			Name :
                        	       			<span style="text-transform: uppercase; text-decoration: underline;">	<?php 	

                        	      			echo $fullname;
                        	      		 ?>
                        	      		 </span>

                        	      		 	<br>
                        	      		 	Age :
                        	      		 	<span style="text-decoration: underline;"><?php echo $age ?></span> <br>
                        	      		 	Gender :
                        	      		 	<span style="text-decoration: underline;"><?php echo $gender ?></span>

                        	      		 	<br>
                        	      		 	Shifting to : 	<span style="text-decoration: underline;"><?php echo $rown['content'] ?></span>
                        	       		</h6>
                        	       		</div>
                        	      	</div>
                        	      	
                        	      	 <div class="card">
                        	      	 	 <div class="card-body">
                        	      	 	 	<h6 class="text-danger" style="font-size: 12px"> PDS Forward Requested By the <?php echo $c ?>  </h6>
                        	      	 	 </div> 
                        	      	 	 
                        	      	 </div> 
                        	      	 
                        		
                        		
                        	
                        	       
                        	      </div>
                        	      <div class="modal-footer">
                        	        <button type="button" class="btn btn-light" style="font-size:12px" data-dismiss="modal">Close</button>
                        	        
                        	      </div>
                        	    </div>
                        	  </div>
                        	</div>

                        </td>
                              		<td>	

                              			<?php 

                              		/*	if(isset($_SESSION['noesign'])){

                              					?>
                              					<a href="javascript:void(0)" data-userid = "<?php echo $rown['studenttaker_id'] ?>" data-formid="<?php echo $rown['formid'] ?>" data-toshift ="<?php echo $rown['content'] ?>" data-notid = "<?php echo $rown['noti_id'] ?>" class="btn btn-light text-secondary setesignature" data-collegeidd="<?php echo $rown['toshiftcid'] ?>" style="font-size: 12px;width: 100%;cursor:not-allowed;" disabled ><i class="far fa-paper-plane"></i></a>
                              					<h6 class="text-danger font-weight-bold" style="font-size:13px">E-Signature is not yet set. Please set it first before completing Transaction</h6>

                              					  <a href="" style="font-size:13px" data-toggle="modal" data-target="#esign" data-backdrop="static" data-keyboard="false">Set Your E-signature here..</a>
                              				<?php
                              			}*/
                              				?>
                              					<a href="javascript:void(0)" data-userid = "<?php echo $rown['studenttaker_id'] ?>" data-formid="<?php echo $rown['formid'] ?>" data-toshift ="<?php echo $rown['content'] ?>" data-notid = "<?php echo $rown['noti_id'] ?>" class="btn btn-light text-primary grantrequest" data-hist="<?php echo $shistory ?>" data-collegeidd="<?php echo $rown['toshiftcid'] ?>" style="font-size: 12px;width: 100%" ><i class="far fa-paper-plane"></i></a>

                              				

                              				<?php
                              			

                              			 ?>

                              	
                              	</td>
                              		<?php
                              	}else if ($action == 'pdsfileforwarded'){
                              		?>
                        <td><span class="text-primary" style="font-size: 13px"><?php echo $rown['title'] ?>  </span></td>
                              		<td>
                              		<a href="javascript:void(0)"  class="btn btn-light text-danger deletenote" data-notid= "<?php echo $rown['noti_id'] ?>" style="font-size: 12px;width: 100%" ><i class="fas fa-times"></i> </a>
                              	</td>
                              		<?php
                              	}else if ($action == 'pdsfilereceived'){
                              		?>
                        <td><span class="text-success" style="font-size: 13px"><?php echo $rown['title'] ?>  </span></td>
                              		<td>
                              		<a href="javascript:void(0)"  class="btn btn-light text-danger deletenote" data-notid= "<?php echo $rown['noti_id'] ?>" style="font-size: 12px;width: 100%" ><i class="fas fa-times"></i> </a>
                              	</td>
                              		<?php
                              	}else if ($action == 'pdsmodified'){
                              		$dataasone ='<td><span class="text-success" style="font-size: 13px">'.$rown['title'].' by <span class="text-danger">'.$lastname.'</span></span></td>';
                              		

                              		
                              		?>
                      		  <td><span class="text-success" style="font-size: 13px"><?php echo $rown['title'] ?> by <span class="text-danger"><?php echo $lastname ?> </span></span></td>
                              		<td>
                              			<a href="../PDS-Records/" target="_blank" class="btn btn-light text-primary" style="font-size: 12px;width: 100%" ><i class="fas fa-external-link-alt"></i></a>
                              			
                              			

                              			
                              			
                              	</td>
                              	<td>
                              			<a href="javascript:void(0)"  class="btn btn-light text-danger deletenote" data-notid= "<?php echo $rown['noti_id'] ?>" style="font-size: 12px;width: 100%" ><i class="fas fa-times"></i> </a>
                              	</td>


                              		<?php
                              	}
                              		
                              	else {
                              		?>
                              		<td>

                              		</td>

                              		<?php
                              	}

                              	 ?>
                                <!--<a href="../PDS-Records/" target="_blank" class="btn btn-light text-primary" style="font-size: 12px;width: 100%" ><i class="fas fa-external-link-alt"></i></a>-->

                              
                             
                            </tr>

	<?php
	
							
							                 }	


							      

	                 }
	                       	$notig = " SELECT * FROM `notification` where  type ='changes' and action ='globalnotification' and CollegeId = '$collegeId'    ";
							                $resultng = mysqli_query($con,$notig); // run query
							                	 $countng= mysqli_num_rows($resultng); 
							                	
							                	 if($countng>=1){

						                 while($rowng = mysqli_fetch_array($resultng)){
							                 		echo $rowng['studenttaker_id'];
							                 		$actions = $rowng['action'];
							                 		
							                 		?>
							                 		<tr>
							                 			<td><span style="font-size: 13px" ><?php echo date('F N, Y',strtotime($rowng['date_notified'])) ?></span></td>
		                              		 <td><span class="text-danger" style="font-size: 13px"><?php echo $rowng['title'] ?></span></td>
		                              		<td>
		                              		<a href="../PDS-Records/" target="_blank" class="btn btn-light text-primary" style="font-size: 12px;width: 100%" ><i class="fas fa-external-link-alt"></i></a>
		                              	</td>

		                              	</tr>
                              					<?php

							                 		


							                 	}
							                 	?>
							                 	<script type="text/javascript">
							                 		
							                 		Swal.fire({
														  position: 'top-end',
														  icon: 'warning',
														  title: 'PDS format has Changed!',
														  text: 'Please notify the students to update their PDS.',
														  showConfirmButton: false
														 
														})
																			                 	      	
							                 	</script>						
							                 	<?php
							                }else {

							                }


	                 ?>
	                 <script src="../../offline/sweetalert.js"></script>
	                 <script type="text/javascript">
	                 	
	                 	$(document).ready(function() {
	                 	      	$('.grantrequest').click(function() { 

	                 	      		var user = $(this).data('userid');
	                 	      		var formid = $(this).data('formid');
	                 	      		var toshift = $(this).data('toshift');
	                 	      		var toshiftcid = $(this).data('collegeidd');
	                 	      		var notid = $(this).data('notid');
	                 	      		var hist = $(this).data('hist');

	                 	      		
	                 	      		Swal.fire({
									  title: 'Are you sure to grant this request?',
									  text: "You won't be able to revert this!",
									  icon: 'warning',
									  showCancelButton: true,
									  confirmButtonColor: '#e74a3b',
									  cancelButtonColor: '#f6c23e',
									  confirmButtonText: 'Yes, Grant!'
									}).then((result) => {
									  if (result.isConfirmed) {
									 


									     $.ajax({
									               url : "action.php",
									                method: "POST",
									                 data  : {grant:1,user:user,formid:formid,toshift:toshift,notid:notid,toshiftcid:toshiftcid,hist:hist},
									                 success : function(data){
									         	
									       Swal.fire(
									      'Request Granted!',
									      'The request has been forwarded to Admission office.',
									      'success'
									    )
									      
									       countpds();
									    	tablecontentnotify();
									                 }
									              })
									        
									        


									  }
									})
	                 	      		
	                 	      	
	                 	      	})

	                 	      	$('.deletenote').click(function() { 
	                 	      		var notid = $(this).data('notid');
	                 	      		   $.ajax({
									               url : "action.php",
									                method: "POST",
									                 data  : {del:1,notid:notid},
									                 success : function(data){
									     
									    	tablecontentnotify();
									                 }
									              })
	                 	      	
	                 	      	})

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
	                 	      });      
	                       	
	                 </script>
	                 <?php
	          
	
	
}



if(isset($_POST['grant'])){ 
	$user = $_POST['user'];
	$formid = $_POST['formid'];
	$toshift = $_POST['toshift'];
	$notid = $_POST['notid'];
	$toshiftcid = $_POST['toshiftcid'];
	$hist = $_POST['hist'];



                     						   $get_admindetails = "SELECT * FROM `administrator` where admin_id = '2'   ";
                                 $gettingadmindetails = mysqli_query($con,$get_admindetails); 
                                
                             while($row = mysqli_fetch_array($gettingadmindetails)){
                             	$te = $row['test'];


                             	if($te == 1){
                          date_default_timezone_set('Asia/Manila');
$datenow = date('Y-m-d H:i:s');

	
	$updateformresponse_toadm = "UPDATE `form_response` SET `adm`='1' , `approvestat` = '3' WHERE userid = '$user' and csformid = '$formid' and CollegeId = '$toshiftcid' ";
	mysqli_query($con,$updateformresponse_toadm);
	


	 $del = "DELETE FROM `notification` WHERE noti_id = '$notid' ";
	 mysqli_query($con,$del);

	 $adminid = $_SESSION['admin_token'];
	 $getsignature = "select * from administrator where admin_id = '$adminid'   ";
						 $getesign = mysqli_query($con,$getsignature); 
						
					 while($row = mysqli_fetch_array($getesign)){
								$esign = $row['esign'];				
						 }

						 $put_signature = "UPDATE `sf_content` SET `content`='$adminid' WHERE stud_id = '$user' and type ='dean_s' ";
						 mysqli_query($con,$put_signature);

						  $put_signature = "UPDATE `sf_content` SET `datecreated`='$datenow' WHERE stud_id = '$user' and type ='date2' ";
						 mysqli_query($con,$put_signature);

						  $put_date2 = "UPDATE `sf_content` SET `datecreated`='$datenow' WHERE stud_id = '$user' and type ='date2' ";
						 mysqli_query($con,$put_date2);


									date_default_timezone_set('Asia/Manila'); 
									$sem = $_SESSION['sem'];
                    $date_m = date('Y-m-d H:i:s');
                     $token =  $_SESSION['admin_token'];
                     $gcollege =  $_SESSION['gc_college'];
                     	$getstudent = "select * from student where stud_id = '$user'  ";
                     	 $getting_student = mysqli_query($con,$getstudent); 
                    
                      while($stud = mysqli_fetch_array($getting_student)){
                     						$name = $stud['stud_lname'].' '.$stud['stud_fname'];
                     	 }
                     
                      
                   
                      

                    $save_to_logs = "INSERT INTO `logs`(`stud_id`, `admin_id`, `admin_type`, `content`, `datemodified`,`manage_fields`,`semester`) 
                    VALUES (0,'$token','GC','PDS Forward Request was Granted by the $gcollege . The PDS form of $name will be forwarded soon.  ','$date_m','approve','$sem')";
                    mysqli_query($con,$save_to_logs); 
                             	}else {


                             		///////////////////////////////////////////////////////////////////////////
                          date_default_timezone_set('Asia/Manila');
$datenow = date('Y-m-d H:i:s');
	

	
	 $del = "DELETE FROM `notification` WHERE noti_id = '$notid' ";
	 mysqli_query($con,$del);

		
			
			$updatehistory_status = "UPDATE `shifting_history` SET `status`='Approved' , `dateapproved`= '$datenow' WHERE sh_id ='$hist' ";
			mysqli_query($con,$updatehistory_status);




	  $sqlupt = "UPDATE `form_response` SET `course`='$toshift' , `CollegeId`='$toshiftcid' , `dateapproved` = '$datenow' WHERE userid = '$user' and csformid='62' ";
	                $result = mysqli_query($con,$sqlupt);

	                $sqluptshft = "UPDATE `form_response` SET `approvestat`='2',`freed`= '1' WHERE userid = '$user' and csformid='60' and shifting_history = '$hist' ";
	                mysqli_query($con,$sqluptshft);


	                 $stud = " select * from student where stud_id = '$user'  ";
                        $resultst = mysqli_query($con,$stud); // run query

                       while($rowx = mysqli_fetch_array($resultst)){
                       $student =  $rowx['stud_lname'].' '.$rowx['stud_fname'].' '.substr($rowx['stud_mname'], 0,1).'.';
                       $curr = $rowx['stud_college'];
                        }
	 			                          
	 			               

$notify1 = "INSERT INTO `notification`(`admin_id`, `type`, `title`, `status`, `date_notified`,`studenttaker_id`,`formid`,`CollegeId`,`action`) VALUES (1,'notification','PDS of $student was forwarded successfully!','unread','$datenow','$user',60,'$curr','pdsfileforwarded')";
		 mysqli_query($con,$notify1);


		 $notify2 = "INSERT INTO `notification`(`admin_id`, `type`, `title`, `status`, `date_notified`,`studenttaker_id`,`formid`,`course`,`action`,`CollegeId`) VALUES (1,'notification','PDS of $student received.','unread','$datenow','$user',60,'$toshift','pdsfilereceived','$cid')";
		 mysqli_query($con,$notify2);


		  $notifygcstud = "INSERT INTO `notification`(`admin_id`, `type`, `title`, `content`, `status`, `date_notified`,`studenttaker_id`, `formid`) 
									VALUES ('1','notifystudentacc','Your PDS was forwarded successfully and you are now a $toshift student','Personal Data Sheets was forwarded','unread','$datenow','$user','60')";
									mysqli_query($con,$notifygcstud);


											$checkcourse = " select * from course where course = '$toshift'  ";
									                $ggcc = mysqli_query($con,$checkcourse); 
									              
									                 while($rowee = mysqli_fetch_array($ggcc)){
														$togoshift = $rowee['courseid'];
									                 }
									          

									$upt_stud = "UPDATE `student` SET `stud_course`='$togoshift',`stud_college`='$toshiftcid' WHERE stud_id = '$user' ";
									mysqli_query($con,$upt_stud);




					
						  $put_date = "UPDATE `sf_content` SET `datecreated`='$datenow' WHERE stud_id = '$user' and type ='date' ";
						 mysqli_query($con,$put_date);

						  $updatestatus = "UPDATE `sf_content` SET `status`='2' WHERE stud_id = '$user' ";
						 mysqli_query($con,$updatestatus);

			

				$getstudent_data = "select * from student where stud_id = '$user'  ";
									  	 $getting_student = mysqli_query($con,$getstudent_data); 
									 
									   while($row = mysqli_fetch_array($getting_student)){
									  		$name = $row['stud_lname'].' '.$row['stud_fname'];
									  		$email = $row['stud_email'];	

					date_default_timezone_set('Asia/Manila'); 
                    $date_m = date('Y-m-d H:i:s');
                     $token =  $_SESSION['adm_id'];
                       $sem = $_SESSION['sem'];
                    $save_to_logs = "INSERT INTO `logs`(`stud_id`, `admin_id`, `admin_type`, `content`, `datemodified`,`manage_fields`,`semester`) 
                    VALUES ('".$approvedcheck[$i]."','$token','admission','Admission : Approved Shifting Request of Student : named : $name && Email : $email . PDS of student has been transfered. ','$date_m','approve','$sem')";
                    mysqli_query($con,$save_to_logs);			
									  	 }			
						 





                             	}

                             }

                     					



/*
*/

}



if(isset($_POST['del'])){ 
	$notid = $_POST['notid'];
			$sql = " DELETE FROM `notification` WHERE noti_id= '$notid'  ";
	                $result = mysqli_query($con,$sql); // run query
	               
	
}

if(isset($_POST['later'])){
	unset($_SESSION['first_time_login']);
	
}
 ?>