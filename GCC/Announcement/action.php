<?php 
session_start();
include '../create_form/connect.php';

if(isset($_POST['savestudent_announcement'])){
	$announce_content = $_POST['announce_content'];
	
	$upt_student_announcement = "UPDATE `announcement` SET `content`='$announce_content' WHERE  stat = 1 ";
	mysqli_query($con,$upt_student_announcement);

	$_SESSION['save']= 1;
	header('location:index.php');
}

 ?>