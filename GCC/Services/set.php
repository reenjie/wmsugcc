<?php 
session_start();
include '../create_form/connect.php';

if(isset($_POST['set'])){
	$sid = $_POST['sid'];
	$uid = $_POST['uid'];

	date_default_timezone_set('Asia/Manila');
	$datenow = date('Y-m-d H:i:s');
	
	$insert_counseling = "INSERT INTO `counseling_request`(`stud_id`, `datecreated`, `sched_id`) VALUES ('$uid','$datenow','$sid')";
	mysqli_query($con,$insert_counseling);
}

if(isset($_POST['set_many'])){
	$selected = $_SESSION['forcounseling'];
	$sid = $_POST['sid'];	

	date_default_timezone_set('Asia/Manila');
	$datenow = date('Y-m-d H:i:s');

	foreach ($selected as $key => $value) {


                                                    	$checkstudent = "select * from counseling_request where stud_id ='$value' and sched_id= '$sid' ";
                                                    	 $checking_student = mysqli_query($con,$checkstudent); 
                                                    	 $count= mysqli_num_rows($checking_student);
                                                    	
                                                    	if($count >=1){
                                                     while($row = mysqli_fetch_array($checking_student)){
                                                    			$schid = $row['sched_id'];

                                                    		if($schid == $sid){
                                                    			echo 'exist';
                                                    		}else if ($schid !=$sid){
                                                    			echo 'dont';
                                                    			//  $insert_counseling = "INSERT INTO `counseling_request`(`stud_id`, `datecreated`, `sched_id`) VALUES ('$value','$datenow','$sid')";
												//	mysqli_query($con,$insert_counseling);    
                                                    		}

                                                    	 }
                                                    
                                                     }else {

                                                     
                                                   $insert_counseling = "INSERT INTO `counseling_request`(`stud_id`, `datecreated`, `sched_id`) VALUES ('$value','$datenow','$sid')";
													mysqli_query($con,$insert_counseling);      
                                                     }




	
	}
}

if(isset($_POST['setupt'])){
	$setupt = $_POST['setupt'];
	$sid = $_POST['sid'];

	$markasdone = "UPDATE `counseling_request` SET `sched_id`='$sid' ,`status` ='4' where c_id='$setupt' ";
	mysqli_query($con,$markasdone);

	
}

 ?>