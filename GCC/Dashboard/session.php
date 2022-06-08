<?php 
session_start();
include '../create_form/connect.php';

if(isset($_GET['redirect'])){

		$select_first_ref = "	SELECT * FROM `referral_history` where status = 1   ";
		 $getallids = mysqli_query($con,$select_first_ref); 
		
	 while($row = mysqli_fetch_array($getallids)){
				$ids = $row['rh_id'];



				$updateall_referralhistory = "UPDATE `referral_history` SET `status`='2' WHERE rh_id = '$ids' ";
				mysqli_query($con,$updateall_referralhistory); 

				$updateall_referral = "UPDATE `referral` SET `status`=2 WHERE ref_hist='$ids'";
				mysqli_query($con,$updateall_referral);

		 }

		 			///save to logs
                    date_default_timezone_set('Asia/Manila'); 
                    $date_m = date('Y-m-d H:i:s');
                     $token =  $_SESSION['admingcc_token'];
                      $sem = $_SESSION['sem'];
                    $save_to_logs = "INSERT INTO `logs`(`stud_id`, `admin_id`, `admin_type`, `content`, `datemodified`,`manage_fields`,`semester`) 
                    VALUES (0,'$token','GCC','Viewed All Referrals','$date_m','View-Print-Modify','$sem')";
                    mysqli_query($con,$save_to_logs);


	
	 


		 header('location:referrals.php');
}

if(isset($_GET['markcomplete'])){
	$rhid = $_GET['rhid'];
	$studentid = $_GET['studentid'];

	

		$updateall_referralhistory = "UPDATE `referral_history` SET `status`='3' WHERE rh_id = '$rhid' ";
				mysqli_query($con,$updateall_referralhistory); 

				$updateall_referral = "UPDATE `referral` SET `status`=3 WHERE ref_hist='$rhid' and stud_id = '$studentid' ";
				mysqli_query($con,$updateall_referral);

				$_SESSION['success_completion'] = 1;
			 header('location:referrals.php');



			 /*	///save to logs
                    date_default_timezone_set('Asia/Manila'); 
                    $date_m = date('Y-m-d H:i:s');
                     $token =  $_SESSION['admingcc_token'];
                    $save_to_logs = "INSERT INTO `logs`(`stud_id`, `admin_id`, `admin_type`, `content`, `date-modified`,`manage_fields`) 
                    VALUES (0,'$token','GCC','Viewed All Referrals','$date_m','View-Print')";
                    mysqli_query($con,$save_to_logs);
	*/
			 	

}

 ?>