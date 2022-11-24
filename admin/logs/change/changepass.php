<?php 
session_start();
include '../../../GCC/create_form/connect.php';
if(isset($_POST['cp'])){ 

	$cp = md5($_POST['cp']);
	$np = $_POST['np'];
	$rnp = $_POST['rnp'];
	$adminid = $_SESSION['superadminId'];



				$admin = "select * from administrator where admin_id = '$adminid' ";

					          		                $resultcheck = mysqli_query($con,$admin); 
					          		                $countadmin= mysqli_num_rows($resultcheck); 
					          		             
					          		          
					          		                 while($row = mysqli_fetch_array($resultcheck)){
					          							//	
					          		                 	$oldpass = $row['admin_password'];
					          		                 	
					          		                 }


if ($cp == $oldpass){

		if ($np == $rnp){

			$pass = md5($np);

			$update = "UPDATE `administrator` SET `admin_password`='$pass' WHERE admin_id = '$adminid'  ";
			mysqli_query($con,$update);

			?>
			<script src="../../../js/jquery.js"></script>
	
	<script src="../../../offline/sweetalert.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			 Swal.fire(
	  'Password Changed Successfully!',
	  'You have change the password!',
	  'success'
		).then((result) => {
  if (result.isConfirmed) {
   	window.location.href="../";
  }
})     
	      
		});
			
	</script>
	<?php

		}else {
				?>
<script src="../../../js/jquery.js"></script>
	
	<script src="../../../offline/sweetalert.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			 Swal.fire(
	  'Password Does not Match!',
	  'You have entered a wrong password!',
	  'error'
		).then((result) => {
  if (result.isConfirmed) {
   	window.location.href="../";
  }
})     
	      
		});
			
	</script>
	<?php
		}



}else {
	?>
	<script src="../../../js/jquery.js"></script>
	
	<script src="../../../offline/sweetalert.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			 Swal.fire(
	  'Password Does not Match!',
	  'You have entered a wrong password!',
	  'error'
		).then((result) => {
  if (result.isConfirmed) {
   	window.location.href="../";
  }
})     
	      
		});
			
	</script>
	<?php
}

}

if(isset($_POST['savechanges'])){
	$em = $_POST['em'];
	$ln = $_POST['ln'];
	$fn = $_POST['fn'];
	$dn = $_POST['dn'];


	$update_admin = "UPDATE `administrator` SET `admin_lname`='$ln',`admin_fname`='$fn' , `admin_email`='$em' ,`admin_dsplyname` = '$dn' WHERE admin_id = '1' ";
	mysqli_query($con,$update_admin);

	$_SESSION['saved'] = 1;
	?>
	<script type="text/javascript">
		window.history.back();
	</script>
	<?php
	
}
 ?>