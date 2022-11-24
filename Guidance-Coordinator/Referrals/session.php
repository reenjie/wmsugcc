<?php 
session_start();
include '../../GCC/create_form/connect.php';

if(isset($_POST['createref'])){ 
	$id = $_POST['id'];
	$ln = $_POST['ln'];
	$fn = $_POST['fn'];
	$mn = $_POST['mn'];
	$em = $_POST['em'];
	$ref = $_POST['ref'];
date_default_timezone_set('Asia/Manila');
$datenow = date('Y-m-d');

	$cid = $_SESSION['gc_collegid'];	


							$check_referral_history = "SELECT * FROM `referral_history` where stud_id = '$id' and status = 0 and subject ='$ref'  ";
							 $cheking_rh = mysqli_query($con,$check_referral_history); 
							 $counting_rh= mysqli_num_rows($cheking_rh);
							
							if($counting_rh >=1){

								echo 'existing';
						 while($row_rh = mysqli_fetch_array($cheking_rh)){
												
							 }
						
						 }else {
						 	echo 'dontexist';

						 /*	$addreferralhistory = "INSERT INTO `referral_history`(`stud_id`, `datecreated`, `subject`, `status`) 
						 											VALUES ('$id','$datenow',[value-3],[value-4],[value-5])";
						 	mysqli_query($con,$addreferralhistory);
							*/


						 }


	

	             	/*   	$checkexs = " select * from referral where stud_id ='$id'  ";
						                $chk = mysqli_query($con,$checkexs); 
						                $count= mysqli_num_rows($chk);
						               //  $get_id =  mysqli_insert_id($con); 
						             if ($count>=1){
						            
						               
						          }else {
						          	
						          			$getrefs = "SELECT * FROM `referral` where status = '5'  ";
	                $gdbrefs = mysqli_query($con,$getrefs); 
	              
	                 while($row = mysqli_fetch_array($gdbrefs)){
						$problem = $row['prob'];
						$type = $row['type'];
						$cs = $row['cs'];

						
							



					$insertref = "INSERT INTO `referral`(`stud_id`, `prob`, `date_set`,`type`,`cs`,`CollegeId`) VALUES ('$id','$problem','$datenow','$type','$cs','$cid')";
									mysqli_query($con,$insertref);	
	
						

	
	                 }
						          } */
						         

						          
	          

	/*
	

	*/


	$_SESSION['id'] = $id ;
	$_SESSION['ln'] = $ln ;
	$_SESSION['fn'] =  $fn;
	$_SESSION['mn'] = $mn ;
	$_SESSION['em'] =  $em;


}

?>