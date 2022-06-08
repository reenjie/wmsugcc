<?php
session_start();
include '../GCC/create_form/connect.php'; 
	if(isset($_POST['actiontoall'])){ 
		$checkval = $_POST['checkval'];

		 foreach ($checkval as $checkid) {
					$sql = "DELETE FROM `notification` WHERE noti_id = '$checkid' ";
  			                $result = mysqli_query($con,$sql); 
	}
}

if(isset($_POST['notification'])){
$usertoken = $_SESSION['user_student_token_check'];
  					$sql = "SELECT * FROM `notification` where studenttaker_id = '$usertoken' and type = 'notifystudentacc' and status= 'unread' ";
  			                $result = mysqli_query($con,$sql); 
  			                $count= mysqli_num_rows($result); 
  			                if($count>=1){
  			                		 echo $count;
  			                }else {
  			                	echo '0';
  			                }
  			               
}
if(isset($_POST['sendemailss'])){
$selectchoice = $_POST['selectchoice'];
$messagemail = $_POST['messagemail'];
date_default_timezone_set('Asia/Manila');
$datenow = date('Y-m-d H:i:s');
		
		$usertoken = $_SESSION['user_student_token_check'];

		$sql = "INSERT INTO `notification`(`admin_id`, `type`, `title`, `content`, `status`, `date_notified`,`request_id`,`sender_id`) VALUES (1,'request','$selectchoice','$messagemail','unread','$datenow','$usertoken','$usertoken') ";
  			                $result = mysqli_query($con,$sql); 
echo 'send'; 
	
}

if(isset($_POST['deleterequest'])){ 
	$id = $_POST['id'];
		$sql = "UPDATE `notification` SET `sender_id`=0  WHERE noti_id='$id' ";
  			                $result = mysqli_query($con,$sql); 
	
}

if(isset($_POST['deleterequestall'])){ 
	$id = $_POST['id'];
		$sql = "DELETE FROM `notification` WHERE noti_id='$id' ";
  			                $result = mysqli_query($con,$sql); 
	
}
if(isset($_POST['setread'])){ 
	$id = $_POST['id'];
	$sql = "UPDATE `notification` SET `status`='read' WHERE noti_id='$id' ";
  			                $result = mysqli_query($con,$sql); 
}

if(isset($_POST['setsessionshiftcourse'])){ 
	$coursechoice = $_POST['coursechoice'];
	$colleges = $_POST['collid'];
	$reason = $_POST['reason'];
	$_SESSION['newcoursechoice'] = $coursechoice;
	$_SESSION['newcollegechoice'] = $colleges;
	$_SESSION['reason'] = $reason;
	
}

if(isset($_POST['setsessionshiftcourse2'])){ 
	$coursechoice = $_POST['coursechoice'];
	$colleges = $_POST['collid'];
	$reason = $_POST['reason'];
	$_SESSION['newcoursechoice2'] = $coursechoice;
	$_SESSION['newcollegechoice2'] = $colleges;
		$_SESSION['reason2'] = $reason;
	
}

if(isset($_POST['setsessionshiftcourse3'])){ 
	$coursechoice = $_POST['coursechoice'];
	$colleges = $_POST['collid'];
	$reason = $_POST['reason'];
	$_SESSION['newcoursechoice3'] = $coursechoice;
	$_SESSION['newcollegechoice3'] = $colleges;
	
		$_SESSION['reason3'] = $reason;
}

if(isset($_POST['setsessionpdscourse'])){ 
	$coursechoice = $_POST['coursechoice'];
	$colleges = $_POST['collid'];
	
	$_SESSION['student_course'] = $coursechoice;
	$_SESSION['student_collegebelong'] = $colleges;
}

if(isset($_POST['deleteoldpds'])){ 
$user =	$_SESSION['user_student_token_check'];

			$selectfromresponses = " SELECT * FROM `form_response` where userid = '$user'   ";
	                $gettingrespo = mysqli_query($con,$selectfromresponses); 
	              
	            
	                 while($row = mysqli_fetch_array($gettingrespo)){
						$formids = $row['formid'];

								$getattachments = " SELECT * FROM `form` where form_id ='$formids' and type = 'file'  ";
						                $gettingattc = mysqli_query($con,$getattachments); 
						            
						            
						                 while($getatt = mysqli_fetch_array($gettingattc)){
											$fileformids = $getatt['form_id'];

													$getlinksunset = " select * from form_response where formid = '$fileformids'  ";
											                $gettinglinks = mysqli_query($con,$getlinksunset); 
											              
											            
											                 while($linkunset = mysqli_fetch_array($gettinglinks)){
																$file= '../attachments/'.$linkunset['response'];

																unlink($file);
											                 }
											          
						                 }
						          

	                 }
	          

$_SESSION['updatingPDS'] = 1;

	$updatestudents_to_retakePDS = "UPDATE `student` SET `pds_filled` ='0' WHERE stud_id = '$user' ";
	mysqli_query($con,$updatestudents_to_retakePDS);	


	$deleteoldpds = "DELETE FROM `form_response` WHERE userid='$user'";
	mysqli_query($con,$deleteoldpds);

	
	
}

 if(isset($_POST['compare'])) {
 	$usertoken = $_SESSION['user_student_token_check'];

                       
                    $currentpass = md5($_POST['currentpass']);	
                    

                                        $sql = "SELECT * FROM `student` where stud_id = '$usertoken'   ";
                                              $result = mysqli_query($con,$sql);
                                              $count= mysqli_num_rows($result);
                                            
                                           
                                               while($row = mysqli_fetch_array($result)){
                                                 $defaultpass= $row['password']; 
                                               }
                                        

                    		if($currentpass == $defaultpass) {
                    			echo 'success';
                    		}else {
                    		
                    			echo 'fail';
                    		}
                    	


                    }

                    if(isset($_POST['logout'])){
                    	$usertoken = $_SESSION['user_student_token_check'];
                    	  $uptlogin = "UPDATE `student` SET `lg`= 0 WHERE stud_id='$usertoken' ";
					              if( mysqli_query($con,$uptlogin)){
					              	//session_destroy();

					              } 
                    }


                    if(isset($_POST['savenewpass'])){
                    	$txtnew = $_POST['txtnew'];

                    	 	$usertoken = $_SESSION['user_student_token_check'];
                    	 	$passw = md5($txtnew);
                    	 	unset($_SESSION['firstlogin']);
                    	  $uptlogin = "UPDATE `student` SET `password`= '$passw' ,`fl` = 0 WHERE stud_id='$usertoken' ";
					              if( mysqli_query($con,$uptlogin)){
					              	//session_destroy();
					              ?>
					              <script type="text/javascript">
					              	window.history.back();
					              </script>
					              <?php
					              $_SESSION['passwordchange']=1;
					              } 
                    	
                    }

                    if(isset($_POST['savephoto'])){

                    	
                    	 $image_name = $_FILES['image']['name'];
                    	 $tmp_name   = $_FILES['image']['tmp_name'];
                    	 $size       = $_FILES['image']['size'];
                    	 $type       = $_FILES['image']['type'];
                    	 $error      = $_FILES['image']['error'];
                    			                                                                                                                                    
                    	 $fileName =basename($_FILES['image']['name']);
                    	
                    	 $uploads_dir = 'img';
                    	 move_uploaded_file( $tmp_name, $uploads_dir .'/'.$fileName);

                    	  $usertoken = $_SESSION['user_student_token_check'];
                    	  $sql = " select * from student where stud_id = '$usertoken'  ";
                                                $result = mysqli_query($con,$sql); // run query
                                                
                                                 while($row = mysqli_fetch_array($result)){
                                                      $srcphoto = $row['photo'];

                                                    }

                                                    $src = 'img/'.$srcphoto;
                                                    unlink($src);

                     	  $uptlogin = "UPDATE `student` SET `photo`= '$fileName' WHERE stud_id='$usertoken' ";
					              if( mysqli_query($con,$uptlogin)){
					              	//session_destroy();
					              ?>
					              <script type="text/javascript">
					              	window.history.back();
					              </script>
					              <?php
					              $_SESSION['photosave']=1;
					              } 
                    	


                    }

if(isset($_POST['reselect'])){
	$courseid = $_POST['reselect'];
	$userid = $_SESSION['user_student_token_check'];
	$sem = $_SESSION['sem'];
	$shid = $_POST['shid'];
	 date_default_timezone_set('Asia/Manila');
	 $datenow = date('Y-m-d');
					$getcourse = " select * from course   ";
					    $gcc = mysqli_query($con,$getcourse); 
					    while($gc = mysqli_fetch_array($gcc)){
					        
					        if($courseid == $gc['courseid']){

					        	$tocollegeId = $gc['CollegeId'];
					        	$tocourse = $gc['course'];



					        }

					     } 

					 	$getcolleges1 = "select * from colleges  ";
					 	 $gettingcolleges = mysqli_query($con,$getcolleges1); 
					 	
					  while($cg = mysqli_fetch_array($gettingcolleges)){
					 				if($fromcollegeid == $cg['CollegeId']){
					 					 $fromcollege = $cg['college']; 
					 				}

					 				if($tocollegeId == $cg['CollegeId']){
					 					$tocollege = $cg['college'];
					 				}

					 	 }

					 	 	$get_shdatas = "select * from shifting_history where sh_id = '$shid'  ";
					 	 	 $shiftdatas = mysqli_query($con,$get_shdatas); 
					 	
					 	  while($shdata = mysqli_fetch_array($shiftdatas)){
					 	 			$ch1 = $shdata['choice_course1'];
					 	 			$ch2 = $shdata['choice_course2'];		
					 	 			$ch3 = $shdata['choice_course3'];	
					 	 			$c1 = $shdata['c1'];
					 	 			$c2 = $shdata['c2'];
					 	 			$c3 = $shdata['c3'];
					 	 			$shcount = $shdata['shiftcount'];
					 	 			$r1 = $shdata['r1'];
					 	 			$r2 = $shdata['r2'];
					 	 			$r3 = $shdata['r3'];
					 	 			$suggestion = $shdata['suggestion_course'];

					 	 	 }

					 	 	 $totalcount = $shcount+1;

					 	 	 
					

		//from Colleges
					 	 //$fromcollege
					 	 $fromcollegeid = $_SESSION['student_college'];
					 	 $fromcourse = $_SESSION['student_course'];
						$fromcourseid = $_SESSION['student_courseid'];
		//to College
						/*
						$tocollege
						$tocollegeId
						$courseid
						$tocourse
	
						*/



			$updateshift_count = "UPDATE `student` SET `shiftcount`='$totalcount' WHERE stud_id='$userid' ";
			mysqli_query($con,$updateshift_count);
					  


	$create_shifting_history = "INSERT INTO `shifting_history`(`stud_id`, `from_college`, `to_college`, `from_course`, `to_course`, `from_`, `to_`, `datecreated`, `shiftcount`, `status`, `semester`,  `choice_course1`, `choice_course2`, `choice_course3`, `c1`, `c2`, `c3`,`r1`,`r2`,`r3`,`suggestion_course`) 
	VALUES ('$userid','$fromcourse','$tocourse','$fromcourseid','$courseid','$fromcollegeid','$tocollegeId','$datenow','$totalcount','processing','$sem','$ch1','$ch2','$ch3','$c1','$c2','$c3','$r1','$r2','$r3','$suggestion')";
	 if(mysqli_query($con,$create_shifting_history)){

	 	$newShid = mysqli_insert_id($con);  

		$update_formresponse = "UPDATE `form_response` SET `datecreated`='$datenow',`status`='For approval',`course`='$tocourse',`CollegeId`='$tocollegeId',`toshift`='$tocourse',`fromwhere`='$fromcourse',`shifting_history`='$newShid',`semester`='$sem'  WHERE userid = '$userid' and shifting_history = '$shid' and csformid=60 and status ='declined' ";
		mysqli_query($con,$update_formresponse);

	 }

	


	
}

if(isset($_POST['resetselection'])){
	$shid_id = $_POST['resetselection'];
	$userid = $_SESSION['user_student_token_check'];
	
	$reset_selection = "DELETE FROM `form_response` WHERE shifting_history='$shid_id' and userid ='$userid'  ";
	mysqli_query($con,$reset_selection);

	
}

 ?>