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
									VALUES ('1','notifystudentacc','Your shifting request was approved and forwarded to receiving College by the GCC','Shifting form filed approved status.','unread','$datenow','$approvedcheck[$i]','60')";
									mysqli_query($con,$notifygcstud);

										$getstudent_data = "select * from student where stud_id = '".$approvedcheck[$i]."'  ";
									  	 $getting_student = mysqli_query($con,$getstudent_data); 
									 
									   while($row = mysqli_fetch_array($getting_student)){
									  		$name = $row['stud_lname'].' '.$row['stud_fname'];
									  		$email = $row['stud_email'];	

					date_default_timezone_set('Asia/Manila'); 
                    $date_m = date('Y-m-d H:i:s');
                     $token =  $_SESSION['admingcc_token'];
                     $sem = $_SESSION['sem'];
                    $save_to_logs = "INSERT INTO `logs`(`stud_id`, `admin_id`, `admin_type`, `content`, `datemodified`,`manage_fields`,`semester`) 
                    VALUES ('".$approvedcheck[$i]."','$token','GCC','Forwarded Shifting Request of Student : named : $name && Email : $email ','$date_m','approve','$sem')";
                    mysqli_query($con,$save_to_logs);			
									  	 }
									  
									   

					
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
									VALUES ('1','notifystudentacc','Your shifting request was approved and forwarded to receiving College by the GCC','Shifting form filed approved status.','unread','$datenow','$sid','60')";
									mysqli_query($con,$notifygcstud);   

						$getstudent_data = "select * from student where stud_id = '$sid'  ";
									  	 $getting_student = mysqli_query($con,$getstudent_data); 
									 
									   while($row = mysqli_fetch_array($getting_student)){
									  		$name = $row['stud_lname'].' '.$row['stud_fname'];
									  		$email = $row['stud_email'];	

					date_default_timezone_set('Asia/Manila'); 
                    $date_m = date('Y-m-d H:i:s');
                     $token =  $_SESSION['admingcc_token'];
                       $sem = $_SESSION['sem'];
                    $save_to_logs = "INSERT INTO `logs`(`stud_id`, `admin_id`, `admin_type`, `content`, `datemodified`,`manage_fields`,`semester`) 
                    VALUES ('".$approvedcheck[$i]."','$token','GCC','Forwarded Shifting Request of Student : named : $name && Email : $email ','$date_m','approve','$sem')";
                    mysqli_query($con,$save_to_logs);			
									  	 }

	
}
if(isset($_POST['shiftcontrol'])){ 
	$check = $_POST['check'];

	if($check == 'check'){
		$upt = "UPDATE `form_classification` SET `isenabled`=0 WHERE csform_id= '60' ";
		mysqli_query($con,$upt);
	}else {
		$upt = "UPDATE `form_classification` SET `isenabled`=1 WHERE csform_id= '60' ";
		mysqli_query($con,$upt);
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
	}else {
		$upt = "UPDATE `form_classification` SET `isenabled`=0 WHERE csform_id= '62' ";
		mysqli_query($con,$upt);
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
if(isset($_POST['printed'])){

				 date_default_timezone_set('Asia/Manila'); 
                    $date_m = date('Y-m-d H:i:s');
                     $token =  $_SESSION['admingcc_token'];
                       $sem = $_SESSION['sem'];
                    $save_to_logs = "INSERT INTO `logs`(`stud_id`, `admin_id`, `admin_type`, `content`, `datemodified`,`manage_fields`,`semester`) 
                    VALUES (0,'$token','GCC','Printed Generated Shifting Form','$date_m','View-Print-Modify','$sem')";
                    mysqli_query($con,$save_to_logs);
	
}

if(isset($_POST['print_PDS'])){

				 	
	
}


if(isset($_POST['sendstudentnotif'])){

	$id = $_POST['id'];
		date_default_timezone_set('Asia/Manila'); 
                    $datenow = date('Y-m-d H:i:s');
                    	$checkifnotificationexist = "select * from notification where type='notifystudentacc' and studenttaker_id='$id' and formid = '60' and content = 'Shifting Request filed viewed.' and status = 'unread' ";
                    	 $checkingnot = mysqli_query($con,$checkifnotificationexist); 
                    	 $counting= mysqli_num_rows($checkingnot);
                    
                    	if($counting >=1){
                    
                    
                     }else {

                     	 $notifygcstud = "INSERT INTO `notification`(`admin_id`, `type`, `title`, `content`, `status`, `date_notified`,`studenttaker_id`, `formid`) 
									VALUES ('1','notifystudentacc','Your shifting request has been viewed by the guidance office. It will be forwarded to the receiving college after processing the requirements.','Shifting Request filed viewed.','unread','$datenow','$id','60')";
									mysqli_query($con,$notifygcstud);   

                     }

                      $sql = " SELECT * FROM `student` where stud_id = '$id' ";
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

                     	 date_default_timezone_set('Asia/Manila'); 
                    $date_m = date('Y-m-d H:i:s');
                     $token =  $_SESSION['admingcc_token'];
                       $sem = $_SESSION['sem'];
                    $save_to_logs = "INSERT INTO `logs`(`stud_id`, `admin_id`, `admin_type`, `content`, `datemodified`,`manage_fields`,`semester`) 
                    VALUES (0,'$token','GCC','Shifting request of $student_Fullname has been viewed ','$date_m','View-Print-Modify','$sem')";
                    mysqli_query($con,$save_to_logs);


	



}
 ?>