        <?php 
session_start();
include '../../../GCC/create_form/connect.php';
$user = $_SESSION['user_student_token_check'];
if(isset($_POST['savingattachments'])){ 
	$filename = $user.'_'.$_POST['filename'];

	$formid = $_POST['formid'];

	
 	$savetotemp = "UPDATE `form_response` SET `response`='$filename' WHERE formid = '$formid' and userid = '$user' ";
	mysqli_query($con,$savetotemp);

	

}

if(isset($_POST['cancelattachments'])){ 
	
	$formid = $_POST['formid'];

			$getitemfirst = " select * from form_response where formid = '$formid' and userid = '$user'  ";
	                $unlinkitem = mysqli_query($con,$getitemfirst); 
	              
	            
	                 while($row = mysqli_fetch_array($unlinkitem)){
	                 	$file = '../../../attachments/'.$row['response'];
						echo $file;
	                 }
	          	unlink($file);
	                
	
		$savetotemp = "UPDATE `form_response` SET `response`='' WHERE formid = '$formid' and userid = '$user' ";
	mysqli_query($con,$savetotemp);

}



 ?>