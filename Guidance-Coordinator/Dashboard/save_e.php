<?php 
session_start();
include '../../GCC/create_form/connect.php';
  $adminid = $_SESSION['admin_token'];
if(isset($_POST['saveesign'])){ 


		
	                  $image_name = $_FILES['image']['name'];
	                   $tmp_name   = $_FILES['image']['tmp_name'];
	                $size       = $_FILES['image']['size'];
	                 $type       = $_FILES['image']['type'];
	                 $error      = $_FILES['image']['error'];
	                                                                                                                                    
	             
	                                                                                                                                    
	           $fileName =basename($_FILES['image']['name']);
	              
	            $uploads_dir = '../../signatures/';
	         move_uploaded_file($tmp_name , $uploads_dir .'/'.$fileName);
	             
	               	
	         	$sql = " UPDATE `administrator` SET `esign`='$fileName' WHERE admin_id = '$adminid' ";
			 			                $result = mysqli_query($con,$sql); 
			 			               
	                                                                                                                          
	         
	            $_SESSION['act'] = 1;
	            unset($_SESSION['noesign']);
	            header('location:index.php');
	
	
	            
	
}

 ?>