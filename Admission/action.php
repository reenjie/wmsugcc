<?php 
session_start();
include '../GCC/create_form/connect.php';

	if(isset($_POST['changedate'])){ 
	$val = $_POST['val'];
	$id = $_POST['id'];

	$upt_sf_contents = "UPDATE `sf_content` SET `datecreated`='$val' WHERE sfid='$id'";
	mysqli_query($con,$upt_sf_contents);
	
}

if(isset($_POST['savechanges'])){
	$em = $_POST['em'];
	$ln = $_POST['ln'];
	$fn = $_POST['fn'];
	$dn = $_POST['dn'];


	$update_admin = "UPDATE `administrator` SET `admin_lname`='$ln',`admin_fname`='$fn' , `admin_email`='$em' ,`admin_dsplyname` = '$dn' WHERE admin_id = '2' ";
	mysqli_query($con,$update_admin);

	$_SESSION['saved'] = 1;
	?>
	<script type="text/javascript">
		window.history.back();
	</script>
	<?php
	
}



 ?>