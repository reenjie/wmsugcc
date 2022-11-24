<?php 
session_start();
include '../GCC/create_form/connect.php';

if(isset($_POST['check_password'])){
		$check_password = $_POST['check_password'];
		$password = md5($check_password);
			$check_password = "select * from administrator where admin_id = 1 and admin_password = '$password'  ";
			 $chckingpassword = mysqli_query($con,$check_password); 
			 $count= mysqli_num_rows($chckingpassword);
		
			if($count >=1){
		echo 'match';
		unset($_SESSION['superadminId']);
		 }else {
		 	echo 'notmatch';
		 }
}

if(isset($_POST['savechanges'])){

	$filecontent = $_POST['filecontent'];
	$file = $_POST['file'];

		
		if(file_put_contents($file,$filecontent)){
			$_SESSION['success_saved'] = $file;
			?>
			<script type="text/javascript">
				window.history.back();
			</script>
			<?php
		}else {
			echo 'There was a problem saving..';
		}
	
}

 ?>