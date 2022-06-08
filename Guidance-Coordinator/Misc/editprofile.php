<?php 
session_start();
include '../../GCC/create_form/connect.php';
 
 if(isset($_POST['editprofile'])){
 	$value = $_POST['value'];
 	$upt = $_POST['upt'];
 	$id = $_SESSION['admin_token'];

 	$upt_profile = "UPDATE `administrator` SET `$upt` = '$value'  WHERE admin_id = '$id' ";
 	mysqli_query($con,$upt_profile);
 	
 }

 ?>