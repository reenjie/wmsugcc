<?php 
session_start();
include 'GCC/create_form/connect.php'; 

if(isset($_POST['checkcode'])){ 

	$code = $_POST['code'];
	$the_code = $_SESSION['student_unique_code'];
	
	$codevalue = implode("", $code);
	

	
	if($the_code == $codevalue){
		echo "match";

		unset($_SESSION['checkpoint']);
	}else 
	{
		echo "doesnotmatch";
	}
	
}

if(isset($_POST['val'])){ 
//	$_SESSION['student_email'] = $_POST['val'];
	
}

if(isset($_POST['recoversuperadmin'])){
	$recoversuperadmin = $_POST['recoversuperadmin'];
	$code = md5('ReenjayCaimor');
	if($code == $recoversuperadmin){
		echo 'recover';
	} 
	
}
 ?>