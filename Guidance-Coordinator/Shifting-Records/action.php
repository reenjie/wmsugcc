<?php 
session_start();
include '../../GCC/create_form/connect.php';
 include '../encrypt/sfgcc.php';
    $enc =  new encryptdata();
if(isset($_POST['toview'])){ 
	$check = $_POST['check'];
	if($check == ''){
		header('location:../Shifting-Records');
		$_SESSION['noselected'] = 1;
	}else {

		foreach($check as $id){
		 $formid = $enc -> encryption("60","gccformtokenshift"); 
          $studentids = $enc -> encryption($id,"gccstudent123shift");



		?>
		<script type="text/javascript">
			
			window.open('view.php?student-pds&pdstoken=<?php echo $formid?>&studenttokenid=<?php echo $studentids ?>');  
		      	setInterval(function(){
		      		window.location.href="../Shifting-Records";
		      	},1300);
		</script>
		<?php
	}
		

	}

		
	
	

}

if(isset($_POST['toprint'])){ 
	$check = $_POST['check'];
	if($check == ''){
		header('location:../Shifting-Records');
		$_SESSION['noselected'] = 1;
	}else {

		foreach($check as $id){
		 $formid = $enc -> encryption("60","gccformtokenshift"); 
          $studentids = $enc -> encryption($id,"gccstudent123shift");


		?>
		<script type="text/javascript">
			
			window.open('print.php?student-pds&pdstoken=<?php echo $formid?>&studenttokenid=<?php echo $studentids ?>');  
		      	setInterval(function(){
		      		window.location.href="../Shifting-Records";
		      	},1300);
		</script>
		<?php
	}
		

	}

		
	 date_default_timezone_set('Asia/Manila'); 
                    $date_m = date('Y-m-d H:i:s');
$sem = $_SESSION['sem'];  
$gccollege= $_SESSION['gc_college'];
                     $token =  $_SESSION['admin_token'];
                    $save_to_logs = "INSERT INTO `logs`(`stud_id`, `admin_id`, `admin_type`, `content`, `datemodified`,`manage_fields`,`semester`) 
                    VALUES (0,'$token','GC','$gccollege ,Printed the Shifting form','$date_m','View-Print-Modify','$sem')";
                    mysqli_query($con,$save_to_logs);
	

}

if(isset($_POST['approveselected'])){ 
	$check = $_POST['check'];
	$kurso = $_POST['kurso'];
	$collegetoshift = $_POST['collegetoshift'];
	$sh = $_POST['sh'];
	date_default_timezone_set('Asia/Manila');
$datenow = date('Y-m-d H:i:s');
	$adminid = $_SESSION['admin_token'];
	if($check == ''){
		header('location:../Shifting-Records');
		$_SESSION['noselected'] = 1;
	}else { 

	


				
				for($i = 0 ; $i < count($check);$i++){
				
				
		$sqltt = " UPDATE `form_response` SET `approvestat`='1', `coordinator` ='$adminid' WHERE userid = '$check[$i]' and csformid = '60'  and shifting_history='".$sh[$i]."'  ";
	                                 $resulttt = mysqli_query($con,$sqltt); // run query 

	                          $update_sh = "UPDATE `shifting_history` SET `coordinator`='$adminid' WHERE sh_id = '$sh[$i]' ";
	                          mysqli_query($con,$update_sh);


	                      $sqls = "select * from form_response where userid = '$check[$i]' and csformid = '62'  ";
	                $results = mysqli_query($con,$sqls); // run query
	               
	                 while($row = mysqli_fetch_array($results)){
						$current  = $row['course'];
						$collegeid = $row['CollegeId'];
	                 }
	                 echo $current;
  $notify = "INSERT INTO `notification`(`admin_id`, `type`, `title`,`content`,`status`, `date_notified`,`studenttaker_id`,`formid`,`course`,`action`,`CollegeId`,`toshiftcid`) VALUES (1,'notification','PDS Forward request','$kurso[$i]','unread','$datenow','$check[$i]',60,'$current','pdsgetrequest','$collegeid','$collegetoshift[$i]')";
		 				mysqli_query($con,$notify);


		 				$notifygcstud = "INSERT INTO `notification`(`admin_id`, `type`, `title`, `content`, `status`, `date_notified`,`studenttaker_id`, `formid`) 
									VALUES ('1','notifystudentacc','Your shifting form was approved and GC is requesting your PDS from your current college','Personal Data Sheets has been requested','unread','$datenow','$check[$i]','60')";
									mysqli_query($con,$notifygcstud);

										$update = "UPDATE `sf_content` SET `content`='selected' WHERE stud_id ='$check[$i]' and type ='3' ";
				mysqli_query($con,$update);

						$getsignature = "select * from administrator where admin_id = '$adminid'   ";
						 $getesign = mysqli_query($con,$getsignature); 
						
					 while($row = mysqli_fetch_array($getesign)){
								$esign = $row['esign'];				
						 }


						 $put_signature = "UPDATE `sf_content` SET `content`='$adminid' WHERE stud_id = '$check[$i]' and type ='dean_s3' ";
						 mysqli_query($con,$put_signature);

						 $put_date3 = "UPDATE `sf_content` SET `datecreated`='$datenow' WHERE stud_id = '$check[$i]' and type ='date3' ";
						 mysqli_query($con,$put_date3);

						 /////////////////////////////////////////////////////////////////LOGS/////////////////////////////
						 	$getstudentname = "select * from student where stud_id = '$check[$i]'  ";
						 $gettingstudent_name = mysqli_query($con,$getstudentname); 
						
					 while($stud = mysqli_fetch_array($gettingstudent_name)){
								$name = $stud['stud_lname'].' '.$stud['stud_fname'];		

									date_default_timezone_set('Asia/Manila'); 
$sem = $_SESSION['sem'];
$gccollege= $_SESSION['gc_college'];
                    $date_m = date('Y-m-d H:i:s');
                     $token =  $_SESSION['admin_token'];
                    $save_to_logs = "INSERT INTO `logs`(`stud_id`, `admin_id`, `admin_type`, `content`, `datemodified`,`manage_fields`,`semester`) 
                    VALUES (0,'$token','GC','The shifting Request of $name was APPROVED by the $gccollege','$date_m','approve','$sem')";
                    mysqli_query($con,$save_to_logs);	
						 
						 }

						 ///////////////////////////////////////////////////////////////////////////////////////////////////////
					

				}

		$_SESSION['Requestsuccess']=1;
		header('location:../Shifting-Records/');

		



	}
}

if(isset($_POST['approvedstudent'])){ 
	$id = $_POST['id'];
	$course = $_POST['course'];
	$collegetoshift = $_POST['collegeid'];
	$sh = $_POST['sh'];
	date_default_timezone_set('Asia/Manila');
$datenow = date('Y-m-d H:i:s');
				     $token =  $_SESSION['admin_token'];

					
					$sqls = "select * from form_response where userid = '$id' and csformid = '62'  ";
	                $results = mysqli_query($con,$sqls); // run query
	               
	                 while($row = mysqli_fetch_array($results)){
						$current  = $row['course'];
						$collegeid = $row['CollegeId'];
	                 }


					echo 'The current course ='.$current.'its collegeid '.$collegeid;
	
			
	                 echo ' The course he want to shift = '.$course.' '.$collegetoshift;

	               


	                 		$sqltt = " UPDATE `form_response` SET `approvestat`='1',`coordinator` = '$token' WHERE userid = '$id' and csformid = '60' and shifting_history='$sh'  ";
	                                 $resulttt = mysqli_query($con,$sqltt); // run query

	                          $update_sh = "UPDATE `shifting_history` SET `coordinator`='$token' WHERE sh_id = '$sh' ";
	                          mysqli_query($con,$update_sh);
	                              
	          $uptn = "DELETE FROM `notification` WHERE  studenttaker_id = '$id' and formid = '60' and action = 'shiftreceived'  ";
	          mysqli_query($con,$uptn);

	          $notify = "INSERT INTO `notification`(`admin_id`, `type`, `title`,`content`,`status`, `date_notified`,`studenttaker_id`,`formid`,`course`,`action`,`CollegeId`,`toshiftcid`) VALUES (1,'notification','PDS Forward request','$course','unread','$datenow','$id',60,'$current','pdsgetrequest','$collegeid','$collegetoshift')";
		 				mysqli_query($con,$notify);


	          $notifygcstud = "INSERT INTO `notification`(`admin_id`, `type`, `title`, `content`, `status`, `date_notified`,`studenttaker_id`, `formid`) 
									VALUES ('1','notifystudentacc','Your shifting form was APPROVED and GC is requesting your PDS from your current college','Personal Data Sheets has been requested','unread','$datenow','$id','60')";
									mysqli_query($con,$notifygcstud);

									
				$update = "UPDATE `sf_content` SET `content`='selected' WHERE stud_id ='$id' and type ='3' ";
				mysqli_query($con,$update);
				$adminid = $_SESSION['admin_token'];
						$getsignature = "select * from administrator where admin_id = '$adminid'   ";
						 $getesign = mysqli_query($con,$getsignature); 
						
					 while($row = mysqli_fetch_array($getesign)){
								$esign = $row['esign'];				
						 }

						 $put_signature = "UPDATE `sf_content` SET `content`='$adminid' WHERE stud_id = '$id' and type ='dean_s3' ";
						 mysqli_query($con,$put_signature);

						  $put_date3 = "UPDATE `sf_content` SET `datecreated`='$datenow' WHERE stud_id = '$id' and type ='date3' ";
						 mysqli_query($con,$put_date3);
					///////////////////////////////////////////////////////////LOGS////////////////////////////////////////////////////

						 	$getstudentname = "select * from student where stud_id = '$id'  ";
						 $gettingstudent_name = mysqli_query($con,$getstudentname); 
						
					 while($stud = mysqli_fetch_array($gettingstudent_name)){
								$name = $stud['stud_lname'].' '.$stud['stud_fname'];		

									date_default_timezone_set('Asia/Manila'); 
$sem = $_SESSION['sem'];
$gccollege= $_SESSION['gc_college'];
                    $date_m = date('Y-m-d H:i:s');
                
                    $save_to_logs = "INSERT INTO `logs`(`stud_id`, `admin_id`, `admin_type`, `content`, `datemodified`,`manage_fields`,`semester`) 
                    VALUES (0,'$token','GC','The shifting Request of $name was APPROVED by the $gccollege','$date_m','approve','$sem')";
                    mysqli_query($con,$save_to_logs);	
						 
						 }
						
						 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					
					 
					 

	


	       
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

if(isset($_POST['hideclick'])){

	$adminid = $_SESSION['admin_token'];
	unset($_SESSION['new_gc']);
	$hide_fetch = "UPDATE `administrator` SET `new_gc`=0 WHERE admin_id = '$adminid' ";
	mysqli_query($con,$hide_fetch);
	
}

if(isset($_POST['showdata'])){
	$adminid = $_SESSION['admin_token'];
	unset($_SESSION['new_gc']);
	$_SESSION['show_rec'] = 1;

	$hide_fetch = "UPDATE `administrator` SET  `new_gc`=0, `show_rec`= 1 WHERE admin_id = '$adminid' ";
	mysqli_query($con,$hide_fetch);
	
}

if(isset($_POST['hidedata'])){

	$adminid = $_SESSION['admin_token'];
	unset($_SESSION['new_gc']);
	$_SESSION['show_rec'] = 0;

	$hide_fetch = "UPDATE `administrator` SET  `new_gc`=0, `show_rec`= 0 WHERE admin_id = '$adminid' ";
	mysqli_query($con,$hide_fetch);
	
}
 ?>