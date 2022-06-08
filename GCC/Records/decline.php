<?php 
session_start();
include '../create_form/connect.php'; 

if(isset($_POST['declinecourse'])){
	$reasons = $_POST['reasons'];
	$remarks = $_POST['remarks'];
	$shid = $_POST['shid'];
	$studid = $_POST['studentid'];
	$select = $_POST['select'];

	


	date_default_timezone_set('Asia/Manila');
$datenow = date('Y-m-d H:i:s');

		
		



		$updateform = "UPDATE `form_response` SET `status`='declined' WHERE userid = '$studid' and csformid = '60' and freed = 0 ";
			mysqli_query($con,$updateform);

				$gethist_ = "select * from form_response where userid = '$studid' and csformid = '60' and freed = 0  ";
				 $gettinghist_ = mysqli_query($con,$gethist_); 
			
			 while($rows = mysqli_fetch_array($gettinghist_)){
						$hist = $rows['shifting_history'];			
				 }


			$delete_sf_content = "DELETE FROM `sf_content` WHERE stud_id = '$studid' and sfs = '$hist' ";
			mysqli_query($con,$delete_sf_content);


			$notifygcstud = "INSERT INTO `notification`(`admin_id`, `type`, `title`, `content`, `status`, `date_notified`,`studenttaker_id`, `formid`) 
									VALUES ('1','notifystudentacc','Your Shifting Request has been DECLINED!','Shifting Request has been DECLINED!','unread','$datenow','$studid','60')";
									mysqli_query($con,$notifygcstud);

	
	

						$getshift_hist = "select * from shifting_history where sh_id = '$hist'  ";
							 $selecting_history = mysqli_query($con,$getshift_hist); 
							
						 while($shhist = mysqli_fetch_array($selecting_history)){
									$to_course = $shhist['to_course'];	

										$c1 = $shhist['choice_course1'];
										  						$c2 = $shhist['choice_course2'];
										  						$c3 = $shhist['choice_course3'];
										  					
								if($c1 == $to_course){
									$o = 'c1';
								}else	
								if($c2 == $to_course){
									$o = 'c2';
								}else	
								if($c3 == $to_course){
									$o = 'c3';
								}	


							 }

			
							 
	  $token =  $_SESSION['admin_token'];
			$reas = $reasons.', Remarks:'.$remarks;

			
			 		$updatehistory_status = "UPDATE `shifting_history` SET `reason`='$reas' , `suggestion_course`='$select' ,`status`='Declined' , `$o` = '1' , `coordinator` = '$token' WHERE sh_id ='$hist' ";
					mysqli_query($con,$updatehistory_status);
			 


					  $sql = " SELECT * FROM `student` where stud_id = '$studid' ";
                      $result = mysqli_query($con,$sql); 
                   
                    
                
                     
                       while($row = mysqli_fetch_array($result)){
                          $studentid = $row['stud_id'];
                          $student_lname = $row['stud_lname'];
                          $student_fname = $row['stud_fname'];
                          $student_mname = $row['stud_mname'];
                          $student_email = $row['stud_email'];
                            $student_course = $row['stud_course'];
                             $stud_coll = $row['stud_college'];

                          $student_Fullname = $student_lname.' '.$student_fname.' '.$student_mname;
                         $studemail = substr($student_email, 0, strpos($student_email,'@'));

                       }

                       $ex = explode(',',$reasons);

		foreach ($ex as $key => $value) {
			
				switch ($value) {
       							case '1':
       									
       									$r1 = 'Did not meet the grade requirements';
       								break;
       								case '2':
       							
       									$r2 = 'Did not meet other requirements';
       								break;
       								case '4':
       									
       									$r3 = 'No Vacant slots';
       								break;
       								case '5':
       							
       									$r4 = 'Failed in Interview';
       								break;
       							
       						
       						}
		}
			
				 date_default_timezone_set('Asia/Manila'); 
                    $date_m = date('Y-m-d H:i:s');
                     $token =  $_SESSION['admingcc_token'];
                       $sem = $_SESSION['sem'];
                    $save_to_logs = "INSERT INTO `logs`(`stud_id`, `admin_id`, `admin_type`, `content`, `datemodified`,`manage_fields`,`semester`) 
                    VALUES (0,'$token','GCC','Shifting request of $student_Fullname has been declined due to the following reasons : $r1 , $r2 , $r3,$r4  ','$date_m','View-Print-Modify','$sem')";
                    mysqli_query($con,$save_to_logs); 
						
					 

		

	/*		$getstudentname = "select * from student where stud_id = '$studid'  ";
						 $gettingstudent_name = mysqli_query($con,$getstudentname); 
						
					 while($stud = mysqli_fetch_array($gettingstudent_name)){
								$name = $stud['stud_lname'].' '.$stud['stud_fname'];	


						

									date_default_timezone_set('Asia/Manila'); 
$sem = $_SESSION['sem'];
$gccollege= $_SESSION['gc_college'];
                    $date_m = date('Y-m-d H:i:s');
                   
                    $save_to_logs = "INSERT INTO `logs`(`stud_id`, `admin_id`, `admin_type`, `content`, `datemodified`,`manage_fields`,`semester`) 
                    VALUES (0,'$token','GC','The shifting Request of $name was DECLINED by the $gccollege','$date_m','approve','$sem')";
                    mysqli_query($con,$save_to_logs);	
						 
						 } 
*/

}