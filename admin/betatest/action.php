<?php 
session_start();
include '../../GCC/create_form/connect.php';

//Admission Set join
if(isset($_POST['joincollege'])){
		$status = $_POST['status'];
		$id = $_POST['joincollege'];

		if($status == 'join'){
			$joined = "UPDATE `colleges` SET `test`='1' WHERE CollegeId ='$id' ";
			mysqli_query($con,$joined);
		}else {
			$joined = "UPDATE `colleges` SET `test`='0' WHERE CollegeId ='$id' ";
			mysqli_query($con,$joined);

		}

}

//Set college to join beta test
if(isset($_POST['joinadm'])){
	$status = $_POST['status'];
	$id = $_POST['joinadm'];


	
	if($status == 'join'){
			$joined = "UPDATE `administrator` SET `test`='1' WHERE admin_id ='$id' ";
			mysqli_query($con,$joined);
		}else {
			$joined = "UPDATE `administrator` SET `test`='0' WHERE admin_id ='$id' ";
			mysqli_query($con,$joined);

		}

}