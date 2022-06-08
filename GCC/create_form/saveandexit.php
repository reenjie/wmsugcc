<?php 
session_start();
include 'connect.php';

	if(isset($_POST['exit'])){ 

		$csform = $_SESSION['form_id'];	
		date_default_timezone_set('Asia/Manila'); 
		$datenow=date('Y-m-d H:i:s');
					          

		 $strict = " UPDATE `form_classification` SET `status`='0' WHERE csform_id= '$csform'  ";
                   mysqli_query($con,$strict); 
		
		
		if(isset($_POST['gc']) && isset($_POST['stud'])){
		$gc = $_POST['gc'];
		$stud = $_POST['stud'];
				

						$sql = " SELECT * FROM `colleges`  ";
			                $result = mysqli_query($con,$sql);
			              
			                 while($row = mysqli_fetch_array($result)){
									$collgeid = $row['CollegeId'];
		

		


					$checkstudent = "select * from student where pds_filled = '1' ";
							 $checkingstudent = mysqli_query($con,$checkstudent); 
							  $count= mysqli_num_rows($checkingstudent);
							  if($count >=1){


							
							  	while($status = mysqli_fetch_array($checkingstudent)){
									$modify = $status['modify'];
									$studid = $status['stud_id'];






									$updatestudents_to_retakePDS = "UPDATE `student` SET `retake`=1 WHERE stud_id = '$studid'";
									mysqli_query($con,$updatestudents_to_retakePDS);	

								
									if($modify == 1){

									$updatestudents_to_retakePDS = "UPDATE `student` SET `modify` ='0' WHERE stud_id = '$studid' ";
									mysqli_query($con,$updatestudents_to_retakePDS);	

									}else {
									
									}			
							 }	

							  }else {

							  }
							
						 


			$notify_gcpds = "INSERT INTO `notification`(`type`, `title`, `date_notified`,`CollegeId`,`action`,`modifyonly`,`mp`) VALUES ('changes','PDS Format has been Modified By the Guidance Office','$datenow','$collgeid','globalnotification','1','1')";
			mysqli_query($con,$notify_gcpds);
			
			



			                 }
			
			
		





			                 }
	

	//	$retake_strict = "DELETE FROM `updte_pages` WHERE 1";
	//	mysqli_query($con,$retake_strict);
		
	}





	if(isset($_POST['exitupdateonly'])){ 
		

				$csform = $_SESSION['form_id'];	
		date_default_timezone_set('Asia/Manila'); 
		$datenow=date('Y-m-d H:i:s');
					          

		 $strict = " UPDATE `form_classification` SET `status`='0' WHERE csform_id= '$csform'  ";
                   mysqli_query($con,$strict); 
		
		
		if(isset($_POST['gc']) && isset($_POST['stud'])){
		$gc = $_POST['gc'];
		$stud = $_POST['stud'];
				

						$sql = " SELECT * FROM `colleges`  ";
			                $result = mysqli_query($con,$sql);
			              
			                 while($row = mysqli_fetch_array($result)){
									$collgeid = $row['CollegeId'];

							$notify_gcpds = "INSERT INTO `notification`(`type`, `title`, `date_notified`,`CollegeId`,`action`,`modifyonly`,`mp`) VALUES ('changes','PDS Format has been Modified By the Guidance Office','$datenow','$collgeid','globalnotification','1','1')";
									mysqli_query($con,$notify_gcpds);



					$checkstudent = "select * from student where pds_filled = '1' ";
							 $checkingstudent = mysqli_query($con,$checkstudent); 
							  $count= mysqli_num_rows($checkingstudent);
							  if($count >=1){

							 while($status = mysqli_fetch_array($checkingstudent)){
									$retake = $status['retake'];
									$studid = $status['stud_id'];

										$check_formupts = "select form_id,type,sec_no,class_name from form where class_name='62' and type in ('Question','file','list') and form_id not in (select formid from form_response where csformid ='62' and userid = '$studid')  ";
													 $chkingformupts = mysqli_query($con,$check_formupts); 
													 $countingdata= mysqli_num_rows($chkingformupts);
													
													if($countingdata >=1){
														
															if($retake == 1){



																		}else {

																		//	echo 'update';
																		$updatestudents_to_retakePDS = "UPDATE `student` SET `modify` ='1' WHERE stud_id = '$studid' ";
																		mysqli_query($con,$updatestudents_to_retakePDS);

																			$updatestudents_to_retakePDS = "UPDATE `student` SET `upt` ='1' WHERE stud_id = '$studid' ";
																		mysqli_query($con,$updatestudents_to_retakePDS);	


																		}	
												
												 	}else {
												 		

												 		///Code to allow edit on other changes made.

												 			$updatestudents_to_retakePDS = "UPDATE `student` SET `upt` ='1' WHERE stud_id = '$studid' ";
																		mysqli_query($con,$updatestudents_to_retakePDS);	




												 		
												 	}

										
							 }

							  }else {

							  }
							
						
							
					
						
						 

	
			
			
	
	}
}
}

if(isset($_POST['exitonly'])){
		$csform = $_SESSION['form_id'];	
	 $strict = " UPDATE `form_classification` SET `status`='0' WHERE csform_id= '$csform'  ";
                   mysqli_query($con,$strict); 
		
}


 ?>