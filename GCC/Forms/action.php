<?php
session_start();
include '../create_form/connect.php'; 
if(isset($_POST['approve'])){ 
	$approvedcheck = $_POST['approvedcheck'];
	$collegetoshift = $_POST['collegetoshift'];
	$shift = $_POST['shift'];
  date_default_timezone_set('Asia/Manila');
$datenow = date('Y-m-d H:i:s');

	for($i = 0 ; $i < count($approvedcheck);$i++){
		

		$sql = " UPDATE `form_response` SET `status`='approved' WHERE csformid = '60' and userid = '$approvedcheck[$i]'  ";
	                $result = mysqli_query($con,$sql); // run query

	$notify = "INSERT INTO `notification`(`admin_id`, `type`, `title`, `content`, `status`, `date_notified`,`studenttaker_id`,`formid`,`course`,`action`,`CollegeId`) VALUES (1,'notification','Shifting form Received from GCC','$sid','unread','$datenow','$approvedcheck[$i]',60,'$shift[$i]','shiftreceived','$collegetoshift[$i]')";
		 mysqli_query($con,$notify);    



		  $notifygcstud = "INSERT INTO `notification`(`admin_id`, `type`, `title`, `content`, `status`, `date_notified`,`studenttaker_id`, `formid`) 
									VALUES ('1','notifystudentacc','Your shifting form was approved by the GCC','Shifting form filed approved status.','unread','$datenow','$approvedcheck[$i]','60')";
									mysqli_query($con,$notifygcstud);  

					date_default_timezone_set('Asia/Manila'); 
                    $date_m = date('Y-m-d H:i:s');
                     $token =  $_SESSION['admingcc_token'];
                      $sem = $_SESSION['sem'];
                    $save_to_logs = "INSERT INTO `logs`(`stud_id`, `admin_id`, `admin_type`, `content`, `datemodified`,`manage_fields`,`semester`) 
                    VALUES (0,'$token','GCC','Approved Shifting Request : ','$date_m','approve','$sem')";
                    mysqli_query($con,$save_to_logs);
	}

	/*
	foreach ($approvedcheck as $key => $value) {
		
		
	}
	*/

	
}
if(isset($_POST['approveone'])){ 
	$sid = $_POST['sid'];
	$shift = $_POST['shift'];
	$toshitcid = $_POST['toshitcid'];
			$sql = " UPDATE `form_response` SET `status`='approved' WHERE csformid = '60' and userid = '$sid'  ";
	                $result = mysqli_query($con,$sql); // run query

	                date_default_timezone_set('Asia/Manila');
$datenow = date('Y-m-d H:i:s');
	       
	       $notify = "INSERT INTO `notification`(`admin_id`, `type`, `title`, `content`, `status`, `date_notified`,`studenttaker_id`,`formid`,`course`,`action`,`CollegeId`) VALUES (1,'notification','Shifting form Received from GCC','$sid','unread','$datenow','$sid',60,'$shift','shiftreceived','$toshitcid')";
		 mysqli_query($con,$notify);     


		  $notifygcstud = "INSERT INTO `notification`(`admin_id`, `type`, `title`, `content`, `status`, `date_notified`,`studenttaker_id`, `formid`) 
									VALUES ('1','notifystudentacc','Your shifting form was approved by the GCC','Shifting form filed approved status.','unread','$datenow','$sid','60')";
									mysqli_query($con,$notifygcstud);   


	
}
if(isset($_POST['shiftcontrol'])){ 
	$check = $_POST['check'];

	if($check == 'check'){
		$upt = "UPDATE `form_classification` SET `isenabled`=0 WHERE csform_id= '60' ";
		mysqli_query($con,$upt);

					///save to logs
                    date_default_timezone_set('Asia/Manila'); 
                    $date_m = date('Y-m-d H:i:s');
                     $token =  $_SESSION['admingcc_token'];
                       $sem = $_SESSION['sem'];
                    $save_to_logs = "INSERT INTO `logs`(`stud_id`, `admin_id`, `admin_type`, `content`, `datemodified`,`manage_fields`,`semester`) 
                    VALUES (0,'$token','GCC','Disabled Shifting Form','$date_m','Enable-Disable','$sem')";
                    mysqli_query($con,$save_to_logs); 
	}else {
		$upt = "UPDATE `form_classification` SET `isenabled`=1 WHERE csform_id= '60' ";
		mysqli_query($con,$upt);

			///save to logs
                    date_default_timezone_set('Asia/Manila'); 
                    $date_m = date('Y-m-d H:i:s');
                     $token =  $_SESSION['admingcc_token'];
                       $sem = $_SESSION['sem'];
                    $save_to_logs = "INSERT INTO `logs`(`stud_id`, `admin_id`, `admin_type`, `content`, `datemodified`,`manage_fields`,`semester`) 
                    VALUES (0,'$token','GCC','Enabled Shifting Form','$date_m','Enable-Disable','$sem')";
                    mysqli_query($con,$save_to_logs); 
	}




	
}
if(isset($_POST['shiftcontrolck'])){ 

			$sql = " select isenabled from `form_classification` where csform_id = '60'  ";
	                $result = mysqli_query($con,$sql); 
	             
	             
	                 while($row = mysqli_fetch_array($result)){
							$d =  $row['isenabled'];

							if($d == 0){
								echo "checkshift";
							}else {
								echo "uncheckshift";
							}

	                 }
	          

}

if(isset($_POST['pdscontrol'])){ 
	$check = $_POST['check'];

	if($check == 'check'){
		$upt = "UPDATE `form_classification` SET `isenabled`=1 WHERE csform_id= '62' ";
		mysqli_query($con,$upt);

					///save to logs
                    date_default_timezone_set('Asia/Manila'); 
                    $date_m = date('Y-m-d H:i:s');
                     $token =  $_SESSION['admingcc_token'];
                       $sem = $_SESSION['sem'];
                    $save_to_logs = "INSERT INTO `logs`(`stud_id`, `admin_id`, `admin_type`, `content`, `datemodified`,`manage_fields`,`semester`) 
                    VALUES (0,'$token','GCC','Enabled Personal Data Sheet','$date_m','Enable-Disable','$sem')";
                    mysqli_query($con,$save_to_logs); 
	}else {
		$upt = "UPDATE `form_classification` SET `isenabled`=0 WHERE csform_id= '62' ";
		mysqli_query($con,$upt);

					///save to logs
                    date_default_timezone_set('Asia/Manila'); 
                    $date_m = date('Y-m-d H:i:s');
                     $token =  $_SESSION['admingcc_token'];
                       $sem = $_SESSION['sem'];
                    $save_to_logs = "INSERT INTO `logs`(`stud_id`, `admin_id`, `admin_type`, `content`, `datemodified`,`manage_fields`,`semester`) 
                    VALUES (0,'$token','GCC','Disabled Personal Data Sheet','$date_m','Enable-Disable','$sem')";
                    mysqli_query($con,$save_to_logs); 
	}
	
}


if(isset($_POST['pdscontrolck'])){ 

	$sql = " select isenabled from `form_classification` where csform_id = '62'  ";
	                $result = mysqli_query($con,$sql); 
	             
	             
	                 while($row = mysqli_fetch_array($result)){
							$d =  $row['isenabled'];

							if($d == 1){
								echo "checkpds";
							}else {
								echo "uncheckpds";
							}

	                 }
	
}

if(isset($_POST['changeval'])){ 
	$val = $_POST['val'];
	$id = $_POST['id'];

	$upt_sf_contents = "UPDATE `sf_content` SET `content`='$val' WHERE sfid='$id'";
	mysqli_query($con,$upt_sf_contents);
	
}

if(isset($_POST['changedate'])){ 
	$val = $_POST['val'];
	$id = $_POST['id'];

	$upt_sf_contents = "UPDATE `sf_content` SET `datecreated`='$val' WHERE sfid='$id'";
	mysqli_query($con,$upt_sf_contents);
	
}
 ?>