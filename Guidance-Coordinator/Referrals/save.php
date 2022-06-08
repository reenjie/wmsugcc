<?php 
session_start();
include '../../GCC/create_form/connect.php';

if(isset($_POST['saveref'])){ 

	header('location:coach.php');
	
}

if(isset($_POST['ds'])){ 
	$val = $_POST['val'];
	$id = $_POST['id'];

		$uptdateset = "UPDATE `referral` SET `date_set`='$val' WHERE stud_id = '$id'";
		mysqli_query($con,$uptdateset);
	
}

if(isset($_POST['cl'])){ 
	$val = $_POST['val'];
	$id = $_POST['id'];

		$uptdateset = "UPDATE `referral` SET `class`='$val' WHERE ref_id = '$id'";
		mysqli_query($con,$uptdateset);
	
}
if(isset($_POST['ys'])){ 
	$val = $_POST['val'];
	$id = $_POST['id'];

		$uptdateset = "UPDATE `referral` SET `yrsec`='$val' WHERE ref_id = '$id'";
		mysqli_query($con,$uptdateset);
	
}

if(isset($_POST['pr'])){ 
	$val = $_POST['val'];
	$id = $_POST['id'];

		$uptdateset = "UPDATE `referral` SET `parent`='$val' WHERE ref_id = '$id'";
		mysqli_query($con,$uptdateset);
	
}

if(isset($_POST['telno'])){ 
	$val = $_POST['val'];
	$id = $_POST['id'];

		$uptdateset = "UPDATE `referral` SET `celtel_no`='$val' WHERE ref_id = '$id'";
		mysqli_query($con,$uptdateset);
	
}

if(isset($_POST['freq'])){ 
	$val = $_POST['val'];
	$id = $_POST['id'];

		$uptdateset = "UPDATE `referral` SET `frequency`='$val' WHERE ref_id = '$id'";
		mysqli_query($con,$uptdateset);
	
}

if(isset($_POST['rem'])){ 
	$val = $_POST['val'];
	$id = $_POST['id'];

		$uptdateset = "UPDATE `referral` SET `remarks`='$val' WHERE ref_id = '$id'";
		mysqli_query($con,$uptdateset);
	
}

if(isset($_POST['ref'])){ 
	$val = $_POST['val'];
	$id = $_POST['id'];

		$uptdateset = "UPDATE `referral` SET `refby`='$val' WHERE ref_id = '$id'";
		mysqli_query($con,$uptdateset);
	
}

if(isset($_POST['act'])){ 
	$val = $_POST['val'];
	$id = $_POST['id'];

		$uptdateset = "UPDATE `referral` SET `action_taken`='$val' WHERE ref_id = '$id'";
		mysqli_query($con,$uptdateset);
	
}
if(isset($_POST['father'])){ 
	$val = $_POST['val'];
	$id = $_POST['id'];

		$uptdateset = "UPDATE `referral` SET `prob`='$val' WHERE ref_id = '$id'";
		mysqli_query($con,$uptdateset);
	
}


if(isset($_POST['occ'])){ 
	$val = $_POST['val'];
	$id = $_POST['id'];

		$uptdateset = "UPDATE `referral` SET `frequency`='$val' WHERE ref_id = '$id'";
		mysqli_query($con,$uptdateset);
	
}
if(isset($_POST['contact'])){ 
	$val = $_POST['val'];
	$id = $_POST['id'];

		$uptdateset = "UPDATE `referral` SET `remarks`='$val' WHERE ref_id = '$id'";
		mysqli_query($con,$uptdateset);
	
}

if(isset($_POST['noob'])){ 
	$val = $_POST['val'];
	$id = $_POST['id'];

		$uptdateset = "UPDATE `referral` SET `prob`='$val' WHERE ref_id = '$id'";
		mysqli_query($con,$uptdateset);
	
}

if(isset($_POST['reff'])){ 
	$val = $_POST['val'];
	$id = $_POST['id'];

		$uptdateset = "UPDATE `referral` SET `refby`='$val' WHERE ref_id = '$id'";
		mysqli_query($con,$uptdateset);
	
}
 ?>