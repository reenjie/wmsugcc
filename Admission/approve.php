<?php 
session_start();
include '../GCC/create_form/connect.php';

if(isset($_POST['approvesingle'])){ 
	$sid = $_POST['sid'];	
	$cid = $_POST['cid'];
	$toshift = $_POST['toshift'];
	$hist = $_POST['hist'];

	date_default_timezone_set('Asia/Manila');
$datenow = date('Y-m-d H:i:s');

		
			
			$updatehistory_status = "UPDATE `shifting_history` SET `status`='Approved' , `dateapproved`= '$datenow' WHERE sh_id ='$hist' ";
			mysqli_query($con,$updatehistory_status);




	  $sqlupt = "UPDATE `form_response` SET `course`='$toshift' , `CollegeId`='$cid' , `dateapproved` = '$datenow' WHERE userid = '$sid' and csformid='62' ";
	                $result = mysqli_query($con,$sqlupt);

	                $sqluptshft = "UPDATE `form_response` SET `approvestat`='2',`freed`= '1' WHERE userid = '$sid' and csformid='60' and shifting_history = '$hist' ";
	                mysqli_query($con,$sqluptshft);


	                 $stud = " select * from student where stud_id = '$sid'  ";
                        $resultst = mysqli_query($con,$stud); // run query

                       while($row = mysqli_fetch_array($resultst)){
                       $student =  $row['stud_lname'].' '.$row['stud_fname'].' '.substr($row['stud_mname'], 0,1).'.';
                       $curr = $row['stud_college'];
                        }
	 			                          
	 			               

$notify = "INSERT INTO `notification`(`admin_id`, `type`, `title`, `status`, `date_notified`,`studenttaker_id`,`formid`,`CollegeId`,`action`) VALUES (1,'notification','PDS of $student was forwarded successfully!','unread','$datenow','$sid',60,'$curr','pdsfileforwarded')";
		 mysqli_query($con,$notify);


		 $notify = "INSERT INTO `notification`(`admin_id`, `type`, `title`, `status`, `date_notified`,`studenttaker_id`,`formid`,`course`,`action`,`CollegeId`) VALUES (1,'notification','PDS of $student received.','unread','$datenow','$sid',60,'$toshift','pdsfilereceived','$cid')";
		 mysqli_query($con,$notify);


		  $notifygcstud = "INSERT INTO `notification`(`admin_id`, `type`, `title`, `content`, `status`, `date_notified`,`studenttaker_id`, `formid`) 
									VALUES ('1','notifystudentacc','Your PDS was forwarded successfully and you are now a $toshift student','Personal Data Sheets was forwarded','unread','$datenow','$sid','60')";
									mysqli_query($con,$notifygcstud);


											$checkcourse = " select * from course where course = '$toshift'  ";
									                $ggcc = mysqli_query($con,$checkcourse); 
									              
									                 while($row = mysqli_fetch_array($ggcc)){
														$togoshift = $row['courseid'];
									                 }
									          

									$upt_stud = "UPDATE `student` SET `stud_course`='$togoshift',`stud_college`='$cid' WHERE stud_id = '$sid' ";
									mysqli_query($con,$upt_stud);



						$adminid = $_SESSION['adm_id'];
						$getsignature = "select * from administrator where admin_id = '$adminid'   ";
						 $getesign = mysqli_query($con,$getsignature); 
						
					 while($row = mysqli_fetch_array($getesign)){
								$esign = $row['esign'];				
						 }

						 $put_signature = "UPDATE `sf_content` SET `content`='$adminid' WHERE stud_id = '$sid' and type ='dean' ";
						 mysqli_query($con,$put_signature);

						  $put_date = "UPDATE `sf_content` SET `datecreated`='$datenow' WHERE stud_id = '$sid' and type ='date' ";
						 mysqli_query($con,$put_date);

						  $updatestatus = "UPDATE `sf_content` SET `status`='2' WHERE stud_id = '$sid' ";
						 mysqli_query($con,$updatestatus);

			

				$getstudent_data = "select * from student where stud_id = '$sid'  ";
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

if(isset($_POST['approv'])){
	
	

	if(!isset($_POST['check'])){
		echo "noselection";
	}else {
	$check = $_POST['check'];
	$cid = $_POST['collegetoshift'];
	$toshift = $_POST['kurso'];
	$hist = $_POST['hist'];
	date_default_timezone_set('Asia/Manila');
$datenow = date('Y-m-d H:i:s');


foreach ($check as $key => $sid) {

	$getstudent_data = "select * from student where stud_id = '$sid'  ";
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
	

	$updatehistory_status = "UPDATE `shifting_history` SET `status`='Approved' WHERE sh_id ='".$hist[$key]."' ";
			mysqli_query($con,$updatehistory_status);

	  $sqlupt = "UPDATE `form_response` SET `course`='".$toshift[$key]."' , `CollegeId`='".$cid[$key]."' WHERE userid = '".$sid."' and csformid='62' ";
	                $result = mysqli_query($con,$sqlupt);

	                $sqluptshft = "UPDATE `form_response` SET `approvestat`='2',`freed`= '1' WHERE userid = '$sid' and csformid='60' and shifting_history='".$hist[$key]."' ";
	                mysqli_query($con,$sqluptshft);


	                 $stud = " select * from student where stud_id = '".$sid."'  ";
                        $resultst = mysqli_query($con,$stud); // run query

                       while($row = mysqli_fetch_array($resultst)){
                       $student =  $row['stud_lname'].' '.$row['stud_fname'].' '.substr($row['stud_mname'], 0,1).'.';
                       $curr = $row['stud_college'];
                        }
	 			                          
	 			               

$notify = "INSERT INTO `notification`(`admin_id`, `type`, `title`, `status`, `date_notified`,`studenttaker_id`,`formid`,`CollegeId`,`action`) VALUES (1,'notification','PDS of $student was forwarded successfully!','unread','$datenow','$sid',60,'$curr','pdsfileforwarded')";
		 mysqli_query($con,$notify);


		 $notify = "INSERT INTO `notification`(`admin_id`, `type`, `title`, `status`, `date_notified`,`studenttaker_id`,`formid`,`course`,`action`,`CollegeId`) VALUES (1,'notification','PDS of $student received.','unread','$datenow','$sid',60,'".$toshift[$key]."','pdsfilereceived','".$cid[$key]."')";
		 mysqli_query($con,$notify);


		  $notifygcstud = "INSERT INTO `notification`(`admin_id`, `type`, `title`, `content`, `status`, `date_notified`,`studenttaker_id`, `formid`) 
									VALUES ('1','notifystudentacc','Your PDS was forwarded successfully and you are now a ".$toshift[$key]." student','Personal Data Sheets was forwarded','unread','$datenow','$sid','60')";
									mysqli_query($con,$notifygcstud);


											$checkcourse = " select * from course where course = '".$toshift[$key]."'  ";
									                $ggcc = mysqli_query($con,$checkcourse); 
									              
									                 while($row = mysqli_fetch_array($ggcc)){
														$togoshift = $row['courseid'];
									                 }
									          

									$upt_stud = "UPDATE `student` SET `stud_course`='$togoshift',`stud_college`='".$cid[$key]."' WHERE stud_id = '$sid' ";
									mysqli_query($con,$upt_stud);



						$adminid = $_SESSION['adm_id'];
						$getsignature = "select * from administrator where admin_id = '$adminid'   ";
						 $getesign = mysqli_query($con,$getsignature); 
						
					 while($row = mysqli_fetch_array($getesign)){
								$esign = $row['esign'];				
						 }

						 $put_signature = "UPDATE `sf_content` SET `content`='$adminid' WHERE stud_id = '$sid' and type ='dean' ";
						 mysqli_query($con,$put_signature);

						   $put_date = "UPDATE `sf_content` SET `datecreated`='$datenow' WHERE stud_id = '$sid' and type ='date' ";
						 mysqli_query($con,$put_date);

						  $updatestatus = "UPDATE `sf_content` SET `status`='2' WHERE stud_id = '$sid' ";
						 mysqli_query($con,$updatestatus);







}
	}

	
/*


*/
	
}
 ?>