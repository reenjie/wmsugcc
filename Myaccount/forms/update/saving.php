<?php 
session_start();
include '../../../GCC/create_form/connect.php';
$user = $_SESSION['user_student_token_check'];
$csform = $_SESSION['form_token_id_for_update'];	


if(isset($_POST['upttxtcontents'])){ 
	$val = $_POST['val'];
	$tid = $_POST['tid'];


			$sql = " UPDATE `temp_answers` SET `response`='$val'  WHERE tid = '$tid'  ";
	                $result = mysqli_query($con,$sql); // run query
	              


}

if(isset($_POST['uptmpchoice'])){ 
	$val = $_POST['val'];
	$tid = $_POST['tid'];


			$sql = " UPDATE `temp_answers` SET `response`='$val'  WHERE tid = '$tid'  ";
	                $result = mysqli_query($con,$sql); // run query
	              
	
}

if(isset($_POST['uptcheckbox'])){ 
	$val = $_POST['val'];
	$tid = $_POST['tid'];


	


	
$sql = " UPDATE `temp_answers` SET `response`='$val'  WHERE tid = '$tid'  ";
	                $result = mysqli_query($con,$sql); 
}


if(isset($_POST['upttxtcontents1'])){ 
	$val = $_POST['val'];
	$tid = $_POST['tid'];


			$sql = " UPDATE `form_response` SET `response`='$val'  WHERE pds_id= '$tid'  ";
	                $result = mysqli_query($con,$sql); // run query
	              


}

if(isset($_POST['uptmpchoice1'])){ 
	$val = $_POST['val'];
	$tid = $_POST['tid'];


			$sql = " UPDATE `form_response` SET `response`='$val'  WHERE pds_id = '$tid'  ";
	                $result = mysqli_query($con,$sql); // run query
	              
	
}

if(isset($_POST['uptcheckbox1'])){ 
	$val = $_POST['val'];
	$tid = $_POST['tid'];


	


	
$sql = " UPDATE `form_response` SET `response`='$val'  WHERE pds_id= '$tid'  ";
	                $result = mysqli_query($con,$sql); 
}



if(isset($_POST['upttable1'])){ 
	$val = $_POST['val'];
	$tid = $_POST['tid'];

					
 $sql = " UPDATE `form_response` SET `response`='$val'  WHERE pds_id = '$tid'  ";
	                $result = mysqli_query($con,$sql);
		                
}



if(isset($_POST['upttable'])){ 
	$val = $_POST['val'];
	$tid = $_POST['tid'];

					
 $sql = " UPDATE `temp_answers` SET `response`='$val'  WHERE tid = '$tid'  ";
	                $result = mysqli_query($con,$sql);
		                
}

if(isset($_POST['filllist'])){ 
	$val = $_POST['val'];
	$tid = $_POST['tid'];

	
	$sql = " UPDATE `temp_answers` SET `response`='$val'  WHERE tid = '$tid'  ";
	                $result = mysqli_query($con,$sql);
	
	
}

if(isset($_POST['filllist1'])){ 
	$val = $_POST['val'];
	$tid = $_POST['tid'];

	
	$sql = " UPDATE `form_response` SET `response`='$val'  WHERE pds_id = '$tid'  ";
	                $result = mysqli_query($con,$sql);
	
	
}

if(isset($_POST['update'])){
date_default_timezone_set('Asia/Manila');
$datenow = date('Y-m-d H:i:s');
$pdscourse = $_SESSION['student_course'];
			$colleges =	$_SESSION['student_college'];
$sem = $_SESSION['sem'];

$updatestudents_to_retakePDS = "UPDATE `student` SET `modify` ='0', `upt` ='0',`pds_filledsem`='$sem',`pdsmodified` = '$datenow' WHERE stud_id = '$user' ";
mysqli_query($con,$updatestudents_to_retakePDS);	

		


$checkchangesinpages = " select * from form where class_name='62' and type in ('Question','file','list') and form_id not in (select formid from form_response where csformid ='62' and userid = '$user')  ";
   			                $chkingchnges = mysqli_query($con,$checkchangesinpages); 
   			              
   			                 while($thechanges = mysqli_fetch_array($chkingchnges)){
   			                 	$formidse = $thechanges['form_id'];




}

$sql = "SELECT * FROM `temp_answers` where userid = '$user' and csformid = '62'  ";
	                $result = mysqli_query($con,$sql); 
	         
	         		$count= mysqli_num_rows($result); 
	             	



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


						
		$submitpds = "INSERT INTO `form_response`(`userid`, `sec_no`, `formid`, `csformid`, `tble_id`, `tc_id`, `tcontent_id`, `response`, `datecreated`, `tble`, `list`, `status`, `course`, `CollegeId`) VALUES ('$user','$secno','$formid','$csform','$tble_id','$tc_id','$tcontent_id','$response','$datecreated','$tble','$list','','$pdscourse','$colleges')  ";
		 $insert= mysqli_query($con,$submitpds);


			

		
}

 $notify1 = "INSERT INTO `notification`(`admin_id`, `type`, `title`, `content`, `status`, `date_notified`,`studenttaker_id`,`formid`,`course`,`CollegeId`) VALUES (1,'notifystudent','PDS form UPDATED','$studentname ($email)','unread','$datenow','$user',62,'$pdscourse','$colleges')";
		 mysqli_query($con,$notify1);

		 $notegcupt = "INSERT INTO `notification`(`type`, `title`, `date_notified`,`CollegeId`,`action`,`studenttaker_id`) VALUES ('studentupdated','student updated his/her PDS','$datenow','1','clearstudent','$user')";
		 mysqli_query($con,$notegcupt);


		  $notifygcstud = "INSERT INTO `notification`(`admin_id`, `type`, `title`, `content`, `status`, `date_notified`,`studenttaker_id`, `formid`,`CollegeId`) 
									VALUES ('1','notifystudentacc','You have UPDATED your PDS','PDS form is now Up to Date','unread','$datenow','$user','62','$colleges')";
									mysqli_query($con,$notifygcstud);


		$sem = $_SESSION['sem'];
		$user = $_SESSION['user_student_token_check'];
		date_default_timezone_set('Asia/Manila');
		$datenow = date('Y-m-d H:i:s');
		$updatestud = "UPDATE `student` SET `pds_filledsem`='$sem',`pdsmodified` = '$datenow' WHERE stud_id = '$user' ";
		mysqli_query($con,$updatestud);


				if(isset($insert)){

				 if($insert){
				$delete_temporarydata = "DELETE FROM `temp_answers` WHERE userid = '$user' ";
		  	mysqli_query($con,$delete_temporarydata); 

						  		                 }
		

			}  


}

 ?>


