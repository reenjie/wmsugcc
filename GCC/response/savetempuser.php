<?php 
session_start();
include '../create_form/connect.php';
if(isset($_POST['savetemp'])){ 
	
$em = $_POST['em'];
$fn = $_POST['fn'];
$gn = $_POST['gn'];
$mn = $_POST['mn'];
$gender = $_POST['gender'];
$userip = $_SESSION['user_student_token_check'];

unset($_SESSION['ask_for_credentials']);

	$saveuser = "INSERT INTO `temp_user`(`fname`, `lname`, `mname`, `email`, `gender`, `ipaddress`) VALUES ('$fn','$gn','$mn','$em','$gender','$userip')";
	mysqli_query($con,$saveuser);
	 $user_id =  mysqli_insert_id($con);
	 $_SESSION['user_student_token_check'] = $user_id;


	
}

if(isset($_POST['checkifexist'])){ 
$userip = $_SESSION['user_student_token_check'];
unset($_SESSION['ask_for_credentials']);

					$sql = " select * from temp_user where ipaddress ='$userip'  ";
			                $result = mysqli_query($con,$sql); 
			                $count= mysqli_num_rows($result);

			             if ($count>=1){
			             	echo 'in';
								
								while($row = mysqli_fetch_array($result)){
			                	 $_SESSION['user_student_token_check'] =$row['userid'];
			                         }
			                 
			          }else {
			          	echo 'out';
			          }
	
}

 ?>