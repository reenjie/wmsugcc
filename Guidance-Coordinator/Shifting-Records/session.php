<?php 
session_start();
include '../../GCC/create_form/connect.php';

if(isset($_GET['student-sf'])){ 
	$sftoken = $_GET['sftoken'];
	$studenttokenid = $_GET['studenttokenid'];
	$studentname = $_GET['studentname'];
	$stat = $_GET['status'];
	$hist = $_GET['hist'];
	date_default_timezone_set('Asia/Manila');
	$datenow = date('Y-m-d');

		$getshift_count = "select * from student where stud_id = '$studenttokenid' ";
				 $gettingcount_ofshift = mysqli_query($con,$getshift_count); 
				
			 while($shcount = mysqli_fetch_array($gettingcount_ofshift)){
							$scount = $shcount['shiftcount'];		
				 }
			
			

			/*$getsfs = "SELECT * FROM `shifting_history` where sh_id = '$hist' ";
			 $gettingsfs = mysqli_query($con,$getsfs); 
			
		 while($row = mysqli_fetch_array($gettingsfs)){

		 		$shifthistid = $row['sh_id'];
								
			 }*/


				$checksf = " select * from sf_content where stud_id = '$studenttokenid' and status='$stat' and sfs ='$hist'  ";
		                $chkingsfcontents = mysqli_query($con,$checksf); 
		                $count= mysqli_num_rows($chkingsfcontents);
		             
		             if ($count>=1){
		             	
		           header('location:sf_edit.php?student-sf&sftoken=60&studenttokenid='.$studenttokenid.'&studentname='.$studentname.'&status='.$stat.'&sfs='.$hist);
		                
		          }else {

		          	$getsfdata = " select * from sf_content where status= '0'  ";
		          		                $gttingsfdata = mysqli_query($con,$getsfdata); 
		          		           
		          		            
		          		                 while($row = mysqli_fetch_array($gttingsfdata)){
		          							$type = $row['type'];

		          							$insert = "INSERT INTO `sf_content`(`stud_id`, `type`, `datecreated`, `status`,`sfs`) VALUES ('$studenttokenid','$type','$datenow','1','$hist')";
		          							mysqli_query($con,$insert);


		          		                 }

		          		                   header('location:sf_edit.php?student-sf&sftoken=60&studenttokenid='.$studenttokenid.'&studentname='.$studentname.'&status='.$stat.'&sfs='.$hist);

		          }
}

if(isset($_GET['approved'])){

	$sftoken = $_GET['sftoken'];
	$studenttokenid = $_GET['studenttokenid'];
	$studentname = $_GET['studentname'];
	$stat = $_GET['status'];
	$hist = $_GET['hist'];

	$from = $_GET['from'];
	$to = $_GET['to'];

	$fromcollege = $_GET['fromcollege'];
	$tocollege = $_GET['tocollege'];



	date_default_timezone_set('Asia/Manila');
	$datenow = date('Y-m-d');

		$getshift_count = "select * from student where stud_id = '$studenttokenid' ";
				 $gettingcount_ofshift = mysqli_query($con,$getshift_count); 
				
			 while($shcount = mysqli_fetch_array($gettingcount_ofshift)){
							$scount = $shcount['shiftcount'];		
				 }
			
			

			/*$getsfs = "SELECT * FROM `shifting_history` where sh_id = '$hist' ";
			 $gettingsfs = mysqli_query($con,$getsfs); 
			
		 while($row = mysqli_fetch_array($gettingsfs)){

		 		$shifthistid = $row['sh_id'];
								
			 }*/


				$checksf = " select * from sf_content where stud_id = '$studenttokenid' and status='$stat' and sfs ='$hist'  ";
		                $chkingsfcontents = mysqli_query($con,$checksf); 
		                $count= mysqli_num_rows($chkingsfcontents);
		             
		             if ($count>=1){

		             	
		           header('location:sf_editappr.php?student-sf&sftoken=60&studenttokenid='.$studenttokenid.'&studentname='.$studentname.'&status='.$stat.'&sfs='.$hist.'&from='.$from.'&to='.$to.'&fromcollege='.$fromcollege.'&tocollege='.$tocollege);
		                
		          }else {

		          	$getsfdata = " select * from sf_content where status= '0'  ";
		          		                $gttingsfdata = mysqli_query($con,$getsfdata); 
		          		           
		          		            
		          		                 while($row = mysqli_fetch_array($gttingsfdata)){
		          							$type = $row['type'];

		          							$insert = "INSERT INTO `sf_content`(`stud_id`, `type`, `datecreated`, `status`,`sfs`) VALUES ('$studenttokenid','$type','$datenow','1','$hist')";
		          							mysqli_query($con,$insert);


		          		                 }

		          		               header('location:sf_editappr.php?student-sf&sftoken=60&studenttokenid='.$studenttokenid.'&studentname='.$studentname.'&status='.$stat.'&sfs='.$hist.'&from='.$from.'&to='.$to.'&fromcollege='.$fromcollege.'&tocollege='.$tocollege);

		          		          

		          }
	
}

if(isset($_POST['declined'])){
	
		$studid = $_POST['studid'];
		$adminid = $_SESSION['admin_token'];
		
	date_default_timezone_set('Asia/Manila');
	$datenow = date('Y-m-d');

	if(isset($_POST['reason'])){
		$reason =$_POST['reason'] ;

			foreach ($reason as $key => $value) {
			
	
				$dl[] = $value.',';
			
		}


		



			

			$updateform = "UPDATE `form_response` SET `status`='declined' WHERE userid = '$studid' and csformid = '60' and freed = 0 ";
			mysqli_query($con,$updateform);

				$gethist_ = "select * from form_response where userid = '$studid' and csformid = '60' and freed = 0  ";
				 $gettinghist_ = mysqli_query($con,$gethist_); 
			
			 while($rows = mysqli_fetch_array($gettinghist_)){
						$hist = $rows['shifting_history'];			
				 }


			$delete_sf_content = "DELETE FROM `sf_content` WHERE stud_id = '$studid' and sfs = '$hist' ";
			mysqli_query($con,$delete_sf_content);
			 

			/*$getsignature = "select * from administrator where admin_id = '$adminid'   ";
						 $getesign = mysqli_query($con,$getsignature); 
						
					 while($row = mysqli_fetch_array($getesign)){
								$esign = $row['esign'];				
						 } */

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

			foreach ($dl as $key => $value) {

		

				$get_Shcount = "select * from shifting_history where sh_id = '$hist' and reason != 'NULL'   ";
				 $gttngshcount = mysqli_query($con,$get_Shcount); 
				 $countsf= mysqli_num_rows($gttngshcount);
			
				if($countsf >=1){
			 while($rowrf = mysqli_fetch_array($gttngshcount)){
			 		$shcont = $rowrf['reason'];
									
				 }
				 $newval = $shcont.$value;

				 $updatehistory_status = "UPDATE `shifting_history` SET `reason`='$newval' WHERE sh_id ='$hist' ";
					mysqli_query($con,$updatehistory_status);
			
			 }else {
			 		$updatehistory_status = "UPDATE `shifting_history` SET `reason`='$value' WHERE sh_id ='$hist' ";
					mysqli_query($con,$updatehistory_status);
			 }

			}
						

	  $token =  $_SESSION['admin_token'];					 

			$updatehistory_status = "UPDATE `shifting_history` SET `status`='Declined' , `$o` = '1' , `coordinator` = '$token' WHERE sh_id ='$hist' ";
			mysqli_query($con,$updatehistory_status);

			$getstudentname = "select * from student where stud_id = '$studid'  ";
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
	}else  {

		echo "nothing";
	} 

		
	
}

 ?>