<?php 
session_start();
include '../create_form/connect.php';

if(isset($_GET['student-sf'])){ 
	$sftoken = $_GET['sftoken'];
	$studenttokenid = $_GET['studenttokenid'];
	$studentname = $_GET['studentname'];
	date_default_timezone_set('Asia/Manila');
	$datenow = date('Y-m-d');

				$getshift_count = "select * from student where stud_id = '$studenttokenid' ";
				 $gettingcount_ofshift = mysqli_query($con,$getshift_count); 
				
			 while($shcount = mysqli_fetch_array($gettingcount_ofshift)){
							$scount = $shcount['shiftcount'];		
				 }
			
			 

			$getsfs = "SELECT * FROM `shifting_history` where stud_id = '52' and shiftcount = '$scount' ";
			 $gettingsfs = mysqli_query($con,$getsfs); 
			
		 while($row = mysqli_fetch_array($gettingsfs)){

		 		$shifthistid = $row['sh_id'];
								
			 }


		
		 
				$checksf = " select * from sf_content where stud_id = '$studenttokenid' and status='1'   ";
		                $chkingsfcontents = mysqli_query($con,$checksf); 
		                $count= mysqli_num_rows($chkingsfcontents);
		             
		             if ($count>=1){
		            header('location:sf_edit.php?student-sf&sftoken=60&studenttokenid='.$studenttokenid.'&studentname='.$studentname.'');
		                
		          }else {
		          			
		          				$getsfdata = " select * from sf_content where status= '0'  ";
		          		                $gttingsfdata = mysqli_query($con,$getsfdata); 
		          		           
		          		            
		          		                 while($row = mysqli_fetch_array($gttingsfdata)){
		          							$type = $row['type'];

		          							$insert = "INSERT INTO `sf_content`(`stud_id`, `type`, `datecreated`, `status`,`sfs`) VALUES ('$studenttokenid','$type','$datenow','1','$shifthistid')";
		          							mysqli_query($con,$insert);

		          							


		          		                 }

		          		                 header('location:sf_edit.php?student-sf&sftoken=60&studenttokenid='.$studenttokenid.'&studentname='.$studentname.'');
		          		          

		          }
}

 ?>