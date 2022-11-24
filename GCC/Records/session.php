<?php 
session_start();
include '../create_form/connect.php';

if(isset($_GET['student-sf'])){ 
	$sftoken = $_GET['sftoken'];
	$studenttokenid = $_GET['studenttokenid'];
	$studentname = $_GET['studentname'];
	date_default_timezone_set('Asia/Manila');
	$datenow = date('Y-m-d');
 


	    ///save to logs

		          $getstudent_data = "select * from student where stud_id = '$studenttokenid'  ";
									  	 $getting_student = mysqli_query($con,$getstudent_data); 
									 
									   while($row = mysqli_fetch_array($getting_student)){
									  		$name = $row['stud_lname'].' '.$row['stud_fname'];
									  		$email = $row['stud_email'];	
									  		echo $name;
					 date_default_timezone_set('Asia/Manila'); 
                    $date_m = date('Y-m-d H:i:s');
                    $sem = $_SESSION['sem'];
                     $token =  $_SESSION['admingcc_token'];

                   

                    $save_to_logs = "INSERT INTO `logs`(`stud_id`, `admin_id`, `admin_type`, `content`, `datemodified`,`manage_fields`,`semester`) 
                    VALUES (0,'$token','GCC','Modified Generated Shifting Form of student named : $name && Email : $email ','$date_m','View-Print-Modify','$sem')";
                    
                   
                    if(mysqli_query($con,$save_to_logs)) {
                    	
                    }

					
									  	 }


                   

				$getshift_count = "select * from student where stud_id = '$studenttokenid' ";
				 $gettingcount_ofshift = mysqli_query($con,$getshift_count); 
				
			 while($shcount = mysqli_fetch_array($gettingcount_ofshift)){
							$scount = $shcount['shiftcount'];		
				 }
			
			 

			$getsfs = "SELECT * FROM `shifting_history` where stud_id = '$studenttokenid' and shiftcount = '$scount' ";
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

 ?>