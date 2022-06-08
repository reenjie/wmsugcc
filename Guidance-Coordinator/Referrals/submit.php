<?php 
session_start();
include '../../GCC/create_form/connect.php';
  $adminid = $_SESSION['admin_token'];
  $id =$_SESSION['id'];
	$ln =$_SESSION['ln'];
	$fn =$_SESSION['fn'];
	$mn =$_SESSION['mn'];
	$em =$_SESSION['em'];
	$CollegeId =  $_SESSION['gc_collegid'];
	$refhist_id = $_SESSION['referral_history'];


  if(isset($_POST['submit_ref'])){

  
  		
  		$submit_referral = "UPDATE `referral` SET `status`='1' WHERE stud_id = '$id' and ref_hist = '$refhist_id' ";
  		mysqli_query($con,$submit_referral);

  		$upt_history = "UPDATE `referral_history` SET `status`='1' WHERE rh_id = '$refhist_id' ";
  		mysqli_query($con,$upt_history);

  			$update_student_referral = "UPDATE `student` SET `referral_subj`='' WHERE stud_id = '$id' ";
  		mysqli_query($con,$update_student_referral);



  			$gettingsignature = "select * from administrator where admin_id ='$adminid'  ";
  			 $coordinator_signature = mysqli_query($con,$gettingsignature); 
  			
  		 while($row = mysqli_fetch_array($coordinator_signature)){
  						$signature = $row['esign'];			
  			 }

  			 $updatereferral_attachsignature = "UPDATE `referral` SET `prob`='$signature' WHERE stud_id = '$id' and ref_hist = '$refhist_id' and type = 'gcsignature' ";
  			 mysqli_query($con,$updatereferral_attachsignature);
  		
  		 


  		  			$getstudentname = "select * from student where stud_id = '$id'  ";
						 $gettingstudent_name = mysqli_query($con,$getstudentname); 
						
					 while($stud = mysqli_fetch_array($gettingstudent_name)){
								$name = $stud['stud_lname'].' '.$stud['stud_fname'];		

									date_default_timezone_set('Asia/Manila'); 
$sem = $_SESSION['sem'];
$gccollege= $_SESSION['gc_college'];
                    $date_m = date('Y-m-d H:i:s');
                     $token =  $_SESSION['admin_token'];
                    $save_to_logs = "INSERT INTO `logs`(`stud_id`, `admin_id`, `admin_type`, `content`, `datemodified`,`manage_fields`,`semester`) 
                    VALUES (0,'$token','GC','Referral has been submitted successfully by $gccollege, referrals for $name','$date_m','approve','$sem')";
                    mysqli_query($con,$save_to_logs);	
						 
						 }

  		


  }

  if(isset($_POST['saverefhistory'])){

  		$id = $_POST['id'];
	$ln = $_POST['ln'];
	$fn = $_POST['fn'];
	$mn = $_POST['mn'];
	$em = $_POST['em'];
	$ref = $_POST['ref'];
	$refby = $_POST['refby'];
date_default_timezone_set('Asia/Manila');
$datenow = date('Y-m-d');


$sem = $_SESSION['sem'];
	$cid = $_SESSION['gc_collegid'];	


			$addrefto_student = "UPDATE `student` SET `referral_subj`='$ref' WHERE stud_id= '$id' ";
			mysqli_query($con,$addrefto_student);


		

			 $addreferralhistory = "INSERT INTO `referral_history`(`stud_id`, `datecreated`, `subject`, `status`,`CollegeId`,`referred_by`,`semester`,`coordinator`) 
						 											VALUES ('$id','$datenow','$ref',0,'$cid','$refby','$sem','$adminid')";
						 	mysqli_query($con,$addreferralhistory);

						 	$newrefid = mysqli_insert_id($con);





			$checkexs = " select * from referral where stud_id ='$id' and ref_hist = '$newrefid' and status = 0 ";
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

						
							



					$insertref = "INSERT INTO `referral`(`stud_id`, `prob`, `date_set`,`type`,`cs`,`CollegeId`,`ref_hist`,`semester`) VALUES ('$id','$problem','$datenow','$type','$cs','$cid','$newrefid','$sem')";
									mysqli_query($con,$insertref);	
	
						

	
	                 }

	                    $getrefdata = " select * from referral where stud_id = '$id' and cs = 0 and status = 0 ";
                                            $gettingrefdata = mysqli_query($con,$getrefdata); 
                                          
                                        
                                             while($row = mysqli_fetch_array($gettingrefdata)){
                                                 $type=$row['type'];

                                                 if($type=='class'){
                                                 
                                                    $clid = $row['ref_id'];

                                                      $uptdateset = "UPDATE `referral` SET `class`='$ref' WHERE ref_id = '$clid'";
																											mysqli_query($con,$uptdateset);
                                                   }

                                                    if($type == 'referredby'){
                                                  
                                                    $refbyid = $row['ref_id'];

                                                    $uptreferredby = "UPDATE `referral` SET `refby`='$refby' WHERE ref_id = '$refbyid'";
																											mysqli_query($con,$uptreferredby);
                                                   }


                                                 }


              	$getstudentname = "select * from student where stud_id = '$id'  ";
						 $gettingstudent_name = mysqli_query($con,$getstudentname); 
						
					 while($stud = mysqli_fetch_array($gettingstudent_name)){
								$name = $stud['stud_lname'].' '.$stud['stud_fname'];		

									date_default_timezone_set('Asia/Manila'); 
$sem = $_SESSION['sem'];
$gccollege= $_SESSION['gc_college'];
                    $date_m = date('Y-m-d H:i:s');
                     $token =  $_SESSION['admin_token'];
                    $save_to_logs = "INSERT INTO `logs`(`stud_id`, `admin_id`, `admin_type`, `content`, `datemodified`,`manage_fields`,`semester`) 
                    VALUES (0,'$token','GC','$gccollege Created new Referral for $name','$date_m','approve','$sem')";
                    mysqli_query($con,$save_to_logs);	
						 
						 }



	               
						          } 
  	
  }

  if(isset($_POST['cancelling'])){

  		

  	

  		$deletereferrals = "DELETE FROM `referral` WHERE stud_id = '$id' and ref_hist ='$refhist_id' ";
  		mysqli_query($con,$deletereferrals);

  		$delete_history = "DELETE FROM `referral_history` WHERE rh_id = '$refhist_id' ";
  		mysqli_query($con,$delete_history);

  		$update_student_referral = "UPDATE `student` SET `referral_subj`='' WHERE stud_id = '$id' ";
  		mysqli_query($con,$update_student_referral);


  			$getstudentname = "select * from student where stud_id = '$id'  ";
						 $gettingstudent_name = mysqli_query($con,$getstudentname); 
						
					 while($stud = mysqli_fetch_array($gettingstudent_name)){
								$name = $stud['stud_lname'].' '.$stud['stud_fname'];		

									date_default_timezone_set('Asia/Manila'); 
$sem = $_SESSION['sem'];
$gccollege= $_SESSION['gc_college'];
                    $date_m = date('Y-m-d H:i:s');
                     $token =  $_SESSION['admin_token'];
                    $save_to_logs = "INSERT INTO `logs`(`stud_id`, `admin_id`, `admin_type`, `content`, `datemodified`,`manage_fields`,`semester`) 
                    VALUES (0,'$token','GC','Created Referral cancelled by the $gccollege , Referrals for $name','$date_m','approve','$sem')";
                    mysqli_query($con,$save_to_logs);	
						 
						 }
  	
  }


 ?>