<?php 
session_start();
include '../GCC/create_form/connect.php';

if(isset($_GET['student-sf'])){ 
	$sftoken = $_GET['sftoken'];
	$studenttokenid = $_GET['studenttokenid'];
	$studentname = $_GET['studentname'];
	date_default_timezone_set('Asia/Manila');
	$datenow = date('Y-m-d');

				$checksf = " select * from sf_content where stud_id = '$studenttokenid' and status='1'  ";
		                $chkingsfcontents = mysqli_query($con,$checksf); 
		                $count= mysqli_num_rows($chkingsfcontents);
		             
		             if ($count>=1){
		            header('location:sf_edit.php?student-sf&sftoken=60&studenttokenid='.$studenttokenid.'&studentname='.$studentname.'');
		                
		          }else {
		          			
		          				$getsfdata = " select * from sf_content where status= '0'  ";
		          		                $gttingsfdata = mysqli_query($con,$getsfdata); 
		          		           
		          		            
		          		                 while($row = mysqli_fetch_array($gttingsfdata)){
		          							$type = $row['type'];

		          							$insert = "INSERT INTO `sf_content`(`stud_id`, `type`, `datecreated`, `status`) VALUES ('$studenttokenid','$type','$datenow','1')";
		          							mysqli_query($con,$insert);


		          		                 }

		          		                 header('location:sf_edit.php?student-sf&sftoken=60&studenttokenid='.$studenttokenid.'&studentname='.$studentname.'');
		          		          

		          }
}

if(isset($_POST['declined'])){
	
		$studid = $_POST['studid'];


	if(isset($_POST['reason'])){
		$reason =$_POST['reason'] ;

			foreach ($reason as $key => $value) {
			
				$update = "UPDATE `sf_content` SET `content`='selected' WHERE stud_id ='$studid' and type ='$value' ";
				mysqli_query($con,$update);
			
		}

			$updateform = "UPDATE `form_response` SET `status`='declined' WHERE userid = '$studid' and csformid = '60' ";
			mysqli_query($con,$updateform);
	}else if(!isset($reason)) {

		echo "nothing";
	}

		
	
}

 ?>