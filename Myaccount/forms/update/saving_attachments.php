<?php 
session_start();
include '../../../GCC/create_form/connect.php';
$user = $_SESSION['user_student_token_check'];
if(isset($_POST['savingattachments'])){ 
	$filename = $user.'_'.$_POST['filename'];

	$formid = $_POST['formid'];

	
 	$savetotemp = "UPDATE `temp_answers` SET `response`='$filename' WHERE formid = '$formid' and userid = '$user' ";
	mysqli_query($con,$savetotemp);

	

}

if(isset($_POST['cancelattachments'])){ 
	
	$formid = $_POST['formid'];

			$getitemfirst = " select * from temp_answers where formid = '$formid' and userid = '$user'  ";
	                $unlinkitem = mysqli_query($con,$getitemfirst); 
	              
	            
	                 while($row = mysqli_fetch_array($unlinkitem)){
	                 	$file = '../../../attachments/'.$row['response'];
						echo $file;
	                 }
	          	unlink($file);
	                
	
		$savetotemp = "UPDATE `temp_answers` SET `response`='' WHERE formid = '$formid' and userid = '$user' ";
	mysqli_query($con,$savetotemp);

}



 ?>