<?php 
session_start();
include '../create_form/connect.php';
	$csform = $_SESSION['Live_form_id'];	
	$userid = $_SESSION['user_student_token_check'];
	

		$formtype = $_SESSION['form_type'];
	date_default_timezone_set('Asia/Manila');
$datenow = date('Y-m-d H:i:s');
if(isset($_POST['trigger'])){ 


										$sqlstud = " select * from student where stud_id = '$userid'  ";
                                                            $resultstud = mysqli_query($con,$sqlstud); // run query
                                                           
                                                             while($rowstud = mysqli_fetch_array($resultstud)){
                                                             	$lname = $rowstud['stud_lname'];
                                                             	$fname = $rowstud['stud_fname'];
                                                             	$mname = $rowstud['stud_mname'];
                                                             	$email= $rowstud['stud_email'];
                                                             	//$course = $rowstud['stud_course'];
                                                             	$shcount = $rowstud['shiftcount'];
                             						$studentname = $lname.' '.$fname.' '.substr($mname, 0, 1);
                                                             }


    ///////////////////////// ALL IN NOTIFICATIONS ////////////////////////////////////////////////////////////////////////////////////////////////////                                                  
	if($formtype == 'pds'){

		$pdscourse = $_SESSION['student_course'];
		$colleges = $_SESSION['student_college'];
		$sem = $_SESSION['sem'];
		$updatestud = "UPDATE `student` SET `pds_filled`='1',`pds_filledsem`='$sem' , `pdsfilleddate`='$datenow' WHERE stud_id = '$userid' ";
		mysqli_query($con,$updatestud);
		
	
				if(isset($_SESSION['updatingPDS'])){
	
$notify = "INSERT INTO `notification`(`admin_id`, `type`, `title`, `content`, `status`, `date_notified`,`studenttaker_id`,`formid`,`ccontent`,`course`,`action`,`CollegeId`) VALUES (1,'notification','PDS form Updated','$studentname ($email)','unread','$datenow','$userid',62,'PDS Filled up','$pdscourse','pdsfilledup','$colleges')";
		 mysqli_query($con,$notify);

		 $notify1 = "INSERT INTO `notification`(`admin_id`, `type`, `title`, `content`, `status`, `date_notified`,`studenttaker_id`,`formid`,`course`,`CollegeId`) VALUES (1,'notifystudent','PDS form UPDATED','$studentname ($email)','unread','$datenow','$userid',62,'$pdscourse','$colleges')";
		 mysqli_query($con,$notify1);

		 $notegcupt = "INSERT INTO `notification`(`type`, `title`, `date_notified`,`CollegeId`,`action`,`studenttaker_id`) VALUES ('studentupdated','student updated his/her PDS','$datenow','1','clearstudent','$userid')";
		 mysqli_query($con,$notegcupt);


		  $notifygcstud = "INSERT INTO `notification`(`admin_id`, `type`, `title`, `content`, `status`, `date_notified`,`studenttaker_id`, `formid`,`CollegeId`) 
									VALUES ('1','notifystudentacc','You have UPDATED your PDS','PDS form is now Up to Date','unread','$datenow','$userid','62','$colleges')";
									mysqli_query($con,$notifygcstud);

									


				}else {

		
$notify = "INSERT INTO `notification`(`admin_id`, `type`, `title`, `content`, `status`, `date_notified`,`studenttaker_id`,`formid`,`ccontent`,`course`,`action`,`CollegeId`) VALUES (1,'notification','PDS form filled up','$studentname ($email)','unread','$datenow','$userid',62,'PDS Filled up','$pdscourse','pdsfilledup','$colleges')";
		 mysqli_query($con,$notify);

		 $notify1 = "INSERT INTO `notification`(`admin_id`, `type`, `title`, `content`, `status`, `date_notified`,`studenttaker_id`,`formid`,`course`,`CollegeId`) VALUES (1,'notifystudent','PDS form filled up','$studentname ($email)','unread','$datenow','$userid',62,'$pdscourse','$colleges')";
		 mysqli_query($con,$notify1);


		  $notifygcstud = "INSERT INTO `notification`(`admin_id`, `type`, `title`, `content`, `status`, `date_notified`,`studenttaker_id`, `formid`,`CollegeId`) 
									VALUES ('1','notifystudentacc','You have filled up PDS','PDS form filled up','unread','$datenow','$userid','62','$colleges')";
									mysqli_query($con,$notifygcstud);
$notegcupt = "INSERT INTO `notification`(`type`, `title`, `date_notified`,`CollegeId`,`action`,`studenttaker_id`) VALUES ('studentupdated','student updated his/her PDS','$datenow','1','clearstudent','$userid')";
		 mysqli_query($con,$notegcupt);


				}



	}else if($formtype == 'shift'){
		$pdscourse = $_SESSION['student_course'];
		$colleges = $_SESSION['student_college'];
		$notify = "INSERT INTO `notification`(`admin_id`, `type`, `title`, `content`, `status`, `date_notified`,`studenttaker_id`,`formid`,`course`,`CollegeId`,`action`) VALUES (1,'notification','Shifting form filled up','$studentname ($email)','unread','$datenow','$userid',60,'$pdscourse','$colleges','shiftfill')";
		 mysqli_query($con,$notify);

		 $notifygcstud = "INSERT INTO `notification`(`admin_id`, `type`, `title`, `content`, `status`, `date_notified`,`studenttaker_id`, `formid`) 
									VALUES ('1','notifystudentacc','You have filled up shifting form','Shifting form filled up pending status.','unread','$datenow','$userid','60')";
									mysqli_query($con,$notifygcstud);

		 
	}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

			
			$sql = "SELECT * FROM `temp_answers` where userid = '$userid' and csformid = '$csform' ";
	                $result = mysqli_query($con,$sql); 
	         
	         		$count= mysqli_num_rows($result); 
	             	  if($count >=1 ){



	             	 date_default_timezone_set('Asia/Manila'); 
					$defdt =  date("Y-m-d H:i:s");
	                 while($row = mysqli_fetch_array($result)){
						$secno = $row['sec_no'];
						$formid = $row['formid'];
						$tble_id = $row['tble_id'];
						$tc_id = $row['tc_id'];
						$tcontent_id = $row['tcontent_id'];
						$response = $row['response'];
						$datecreated = $row['datecreated'];
						$tble = $row['tble'];
						$list = $row['list'];

						$sem = $_SESSION['sem'];
		

	if($formtype == 'pds'){ 

		$pdscourse = $_SESSION['student_course'];
		$colleges = $_SESSION['student_college'];

		$sem = $_SESSION['sem'];
		$updatestud = "UPDATE `student` SET `pds_filled`='1',`pds_filledsem`='$sem',`pdsfilleddate` = '$datenow' WHERE stud_id = '$userid' ";
		mysqli_query($con,$updatestud);

		$submitpds = "INSERT INTO `form_response`(`userid`, `sec_no`, `formid`, `csformid`, `tble_id`, `tc_id`, `tcontent_id`, `response`, `datecreated`, `tble`, `list`, `status`, `course`, `CollegeId`,`semester`) VALUES ('$userid','$secno','$formid','$csform','$tble_id','$tc_id','$tcontent_id','$response','$datecreated','$tble','$list','','$pdscourse','$colleges','$sem')  ";
		 $insert= mysqli_query($con,$submitpds); 

		  

		 $updatestudents_to_retakePDS = "UPDATE `student` SET `retake` ='0' WHERE stud_id = '$userid' ";
		mysqli_query($con,$updatestudents_to_retakePDS);
		 $updatestudents_to_retakePDS = "UPDATE `student` SET `modify` ='0' WHERE stud_id = '$userid' ";
		mysqli_query($con,$updatestudents_to_retakePDS);	
		 $updatestudents_to_retakePDS = "UPDATE `student` SET `upt` ='0' WHERE stud_id = '$userid' ";
		mysqli_query($con,$updatestudents_to_retakePDS);

		  	
		


	}else  if ($formtype == 'shift'){ 
		$shiftch = $_SESSION['newcoursechoice'];
		$newcollege = $_SESSION['newcollegechoice'];

			$course = $_SESSION['student_course'];


				
			 



		
$submitshift = "INSERT INTO `form_response`(`userid`, `sec_no`, `formid`, `csformid`, `tble_id`, `tc_id`, `tcontent_id`, `response`, `datecreated`, `tble`, `list`, `status`, `course`, `CollegeId`,`toshift`,`fromwhere`,`semester`) 								VALUES ('$userid','$secno','$formid','$csform','$tble_id','$tc_id','$tcontent_id','$response','$datecreated','$tble','$list','For Approval','$shiftch','$newcollege','$shiftch','$course','$sem')  ";
		  $insert=  mysqli_query($con,$submitshift);
		 


	}else if ($formtype == 'others') {
	
		echo 'others';

	/*	$saveothers = "INSERT INTO `form_response`( `sec_no`, `formid`, `csformid`, `tble_id`, `tc_id`, `tcontent_id`, `response`, `datecreated`, `tble`, `list`,`custom`,`custom_user`) 								VALUES ('$secno','$formid','$csform','$tble_id','$tc_id','$tcontent_id','$response','$datecreated','$tble','$list','1','$userid')  ";
		$insert = mysqli_query($con,$saveothers); 
		*/


	
	}




					
  

								


						  		                 }

		   }else {
		   			
		   	$sem = $_SESSION['sem'];
		   			$selecttempuser = " SELECT * FROM `temp_user` where userid='$userid' ";
		                $selectionresult = mysqli_query($con,$selecttempuser); 
		                $countingsel= mysqli_num_rows($selectionresult);
		               //  $get_id =  mysqli_insert_id($con); 
		             if ($countingsel>=1){
		            
		                 while($gettempuser = mysqli_fetch_array($selectionresult)){
							$ipadd = $gettempuser['ipaddress'];	
		                 }


		                 		$gettempanswers = " SELECT * FROM `temp_answers` where userid = '$ipadd' and csformid = '$csform'   ";
		                                 $rgettinganswer = mysqli_query($con,$gettempanswers); 
		                                 $countanswers= mysqli_num_rows($rgettinganswer);
		                                //  $get_id =  mysqli_insert_id($con); 
		                              if ($countanswers>=1){
		                             
		                                  while($didanswer = mysqli_fetch_array($rgettinganswer)){
						             	$secno = $didanswer['sec_no'];
										$formid = $didanswer['formid'];
										$tble_id = $didanswer['tble_id'];
										$tc_id = $didanswer['tc_id'];
										$tcontent_id = $didanswer['tcontent_id'];
										$response = $didanswer['response'];
										$datecreated = $didanswer['datecreated'];
										$tble = $didanswer['tble'];
										$list = $didanswer['list'];

										echo $response;
		 $saveothers = "INSERT INTO `form_response`( `sec_no`, `formid`, `csformid`, `tble_id`, `tc_id`, `tcontent_id`, `response`, `datecreated`, `tble`, `list`,`custom`,`custom_user`,`semester`) 								VALUES ('$secno','$formid','$csform','$tble_id','$tc_id','$tcontent_id','$response','$datecreated','$tble','$list','1','$userid','$sem')  ";
		$insert = mysqli_query($con,$saveothers);
		                                  }

		                                  if($insert){
				$delete_temporarydata = "DELETE FROM `temp_answers` WHERE userid = '$ipadd' ";
		  	mysqli_query($con,$delete_temporarydata); 

						  		                 }
		                           }

		 

		          }
		   } 

			
			if(isset($insert)){

				 if($insert){
				$delete_temporarydata = "DELETE FROM `temp_answers` WHERE userid = '$userid' ";
		  	mysqli_query($con,$delete_temporarydata); 

						  		                 }
		

			}

				


					
						
					
			if(isset($shiftch)){

				$totalsh = $shcount + 1;



				$getcolleges = "select * from course  ";
				 $getcolleges = mysqli_query($con,$getcolleges); 
				
			 while($rowg = mysqli_fetch_array($getcolleges)){
					$allcourse = $rowg['course'];
					$collid = $rowg['CollegeId'];
					$ciid = $rowg['courseid'];

					if($allcourse == $course){
						$from_ = $collid;
						$fromcourse = $ciid;
					}

					if($allcourse == $shiftch){
						$to_ = $collid;
						$tocourse = $ciid;
					}

					if($allcourse == $_SESSION['newcoursechoice']){
						$c1 = $ciid;
						$r1 = $_SESSION['reason'];
					}	
					if($allcourse == $_SESSION['newcoursechoice2']){
						$c2 = $ciid;
						$r2 = $_SESSION['reason2'];
					}	
					if($allcourse == $_SESSION['newcoursechoice3']){
						$c3 = $ciid;
						$r3 = $_SESSION['reason3'];
					}	

				 }
			
			 
				 $sem = $_SESSION['sem'];
			$insert_history = "INSERT INTO `shifting_history`(`stud_id`, `from_college`, `to_college`, `datecreated`, `status`,`shiftcount`,`from_`,`to_`,`from_course`,`to_course`,`semester`,`choice_course1`,`choice_course2`,`choice_course3`,`r1`,`r2`,`r3`) VALUES ('$userid','$course','$shiftch','$datenow','processing','$totalsh','$from_','$to_','$fromcourse','$tocourse','$sem','$c1','$c2','$c3','$r1','$r2','$r3')";

			mysqli_query($con,$insert_history);

			$history = mysqli_insert_id($con);
			


			$updateshift_count = "UPDATE `student` SET `shiftcount`='$totalsh' WHERE stud_id='$userid' ";
			mysqli_query($con,$updateshift_count);

			$updatefr = "UPDATE `form_response` SET `shifting_history`='$history' WHERE userid = '$userid' and status='For Approval' ";
			mysqli_query($con,$updatefr);



			}	
		

					
							
					
					
	                	               
							              
						  		                 		
							
	                 
	                 


	        // header('location:response_successfully.php');
}

 ?>