<?php 
session_start();
include '../create_form/connect.php';
	
	if(isset($_POST['savetext'])){ 

		$val = $_POST['val'];
		$id = $_POST['id'];

		$save = "UPDATE `pages` SET `content`='$val' WHERE pageid = '$id' ";
		mysqli_query($con,$save);


		  date_default_timezone_set('Asia/Manila'); 
            $token =  $_SESSION['admingcc_token'];
                    $date_m = date('Y-m-d H:i:s');
                     $sem = $_SESSION['sem'];
                    $save_to_logs = "INSERT INTO `logs`(`stud_id`, `admin_id`, `admin_type`, `content`, `datemodified`,`manage_fields`,`semester`) 
                    VALUES (0,'$token','GCC','Link content Updated.(Pages)','$date_m','Manage','$sem')";
                    mysqli_query($con,$save_to_logs); 
		
	}
	if(isset($_POST['updatefname'])){ 

		$val = $_POST['val'];
		$id = $_POST['id'];

		$save = "UPDATE `pages` SET `fullname`='$val' WHERE pageid = '$id' ";
		mysqli_query($con,$save);

		  date_default_timezone_set('Asia/Manila'); 
            $token =  $_SESSION['admingcc_token'];
             $sem = $_SESSION['sem'];
                    $date_m = date('Y-m-d H:i:s');
                    $save_to_logs = "INSERT INTO `logs`(`stud_id`, `admin_id`, `admin_type`, `content`, `datemodified`,`manage_fields`,`semester`) 
                    VALUES (0,'$token','GCC','Updated Organization Staff-fullname.(Pages)','$date_m','Manage','$sem')";
                    mysqli_query($con,$save_to_logs); 


		
	}

		if(isset($_POST['updatepos'])){ 

		$val = $_POST['val'];
		$id = $_POST['id'];

		$save = "UPDATE `pages` SET `pos`='$val' WHERE pageid = '$id' ";
		mysqli_query($con,$save);

		 date_default_timezone_set('Asia/Manila'); 
            $token =  $_SESSION['admingcc_token'];
                    $date_m = date('Y-m-d H:i:s');
                     $sem = $_SESSION['sem'];
                    $save_to_logs = "INSERT INTO `logs`(`stud_id`, `admin_id`, `admin_type`, `content`, `datemodified`,`manage_fields`,`semester`) 
                    VALUES (0,'$token','GCC','Updated Organization Staff-Position.(Pages)','$date_m','Manage','$sem')";
                    mysqli_query($con,$save_to_logs); 


		
	}

	if(isset($_POST['updatedorder'])){ 

		$val = $_POST['val'];
		$id = $_POST['id'];

		$save = "UPDATE `pages` SET `display_order`='$val' WHERE pageid = '$id' ";
		mysqli_query($con,$save);

		 date_default_timezone_set('Asia/Manila'); 
            $token =  $_SESSION['admingcc_token'];
                    $date_m = date('Y-m-d H:i:s');
                     $sem = $_SESSION['sem'];
                    $save_to_logs = "INSERT INTO `logs`(`stud_id`, `admin_id`, `admin_type`, `content`, `datemodified`,`manage_fields`,`semester`) 
                    VALUES (0,'$token','GCC','Updated Organization Staff-Display in Page.(Pages)','$date_m','Manage','$sem')";
                    mysqli_query($con,$save_to_logs); 

		
	}

	if(isset($_POST['savenew'])){ 
		$fname = $_POST['fname'];
		$pos = $_POST['pos'];


				//Make the imagename array set at form. look likes this name="imagename[]"
	
		                  $image_name = $_FILES['imahe']['name'];
		                   $tmp_name   = $_FILES['imahe']['tmp_name'];
		                $size   = $_FILES['imahe']['size'];
		                 $type   = $_FILES['imahe']['type'];
		                 $error  = $_FILES['imahe']['error'];
		                                                                                                                                   
		             
		                                                                                                                                    
		           $fileName =basename($_FILES['imahe']['name']);
		                
		              

		           if(isset($fileName)){


		          	$file = $fileName;

		           }else {
		           	$file = NULL;
		          	


		           }
		   
		      	$uploads_dir = '../img/uploads';
		         move_uploaded_file($tmp_name , $uploads_dir .'/'.$file);
				

		         		$sql = " SELECT * FROM `pages` where  type =1 order by display_order desc limit 1   ";
		                         $result = mysqli_query($con,$sql);
		                         $count= mysqli_num_rows($result);
		                    
		                          while($row = mysqli_fetch_array($result)){
		         					$last = $row['display_order'];



		                          }
		                          $dorder = $last+1;
		                   

		             
		            
		          
		         $save = "INSERT INTO `pages`( `fullname`, `pos`, `type`, `display_order`,`photo`) VALUES ('$fname','$pos','1','$dorder','$file')";
		          mysqli_query($con,$save);

		        
		         date_default_timezone_set('Asia/Manila'); 
            $token =  $_SESSION['admingcc_token'];
                    $date_m = date('Y-m-d H:i:s');
                     $sem = $_SESSION['sem'];
                    $save_to_logs = "INSERT INTO `logs`(`stud_id`, `admin_id`, `admin_type`, `content`, `datemodified`,`manage_fields`,`semester`) 
                    VALUES (0,'$token','GCC','Save new Page-link.(Pages)','$date_m','Manage','$sem')";
                    mysqli_query($con,$save_to_logs); 
		
		
		            
		
	}
	if(isset($_POST['delete'])){
	$id = $_POST['id']; 

					$sql = " select * from pages where pageid ='$id' ";
			                $result = mysqli_query($con,$sql); 
			              
			                 while($row = mysqli_fetch_array($result)){
								$src = '../img/uploads/'.$row['photo'];
			                 }
			                 unlink($src);
			          


	$delete = "DELETE FROM `pages` WHERE pageid ='$id' ";
	mysqli_query($con,$delete);


	 date_default_timezone_set('Asia/Manila'); 
            $token =  $_SESSION['admingcc_token'];
                    $date_m = date('Y-m-d H:i:s');
                     $sem = $_SESSION['sem'];
                    $save_to_logs = "INSERT INTO `logs`(`stud_id`, `admin_id`, `admin_type`, `content`, `datemodified`,`manage_fields`,`semester`) 
                    VALUES (0,'$token','GCC','Deleted a Page-link.(Pages)','$date_m','Manage','$sem')";
                    mysqli_query($con,$save_to_logs); 
		
	}
	if(isset($_POST['uploadimg'])){ 

		$id = $_POST['id'];

				$sql = " select * from pages where pageid ='$id' ";
			                $result = mysqli_query($con,$sql); 
			              
			                 while($row = mysqli_fetch_array($result)){
								$src = '../img/uploads/'.$row['photo'];
			                 }
			                 unlink($src);
			          

		  $image_name = $_FILES['image']['name'];
		                   $tmp_name   = $_FILES['image']['tmp_name'];
		                $size   = $_FILES['image']['size'];
		                 $type   = $_FILES['image']['type'];
		                 $error  = $_FILES['image']['error'];
		                                                                                                                                   
		             
		                                                                                                                                    
		           $fileName =basename($_FILES['image']['name']);
		                
		              

		           if(isset($fileName)){


		          	$file = $fileName;

		           }else {
		           	$file = NULL;
		          	


		           }

		         echo $file;
		   
		     	$uploads_dir = '../img/uploads';
		         move_uploaded_file($tmp_name , $uploads_dir .'/'.$file);

		         $update = "UPDATE `pages` SET `photo`='$file' WHERE pageid = '$id'";
		         mysqli_query($con,$update);
		

	}

	if(isset($_POST['getcontent'])){ 
		$id = $_POST['id'];
				$sql = " select content from pages  where pageid = '$id'  ";
		                $result = mysqli_query($con,$sql); 
		               
		                 while($row = mysqli_fetch_array($result)){
							echo $row['content'];
		                 }
		          
		
	}
	if(isset($_POST['savenewlink'])){ 
		$link = $_POST['link'];
		$content = $_POST['content'];

		

		             
		            
		          
		         $save = "INSERT INTO `pages`( `title`, `content`, `type`) VALUES ('$link','$content','2')";
		          mysqli_query($con,$save);


		           date_default_timezone_set('Asia/Manila'); 
            $token =  $_SESSION['admingcc_token'];
                    $date_m = date('Y-m-d H:i:s');
                     $sem = $_SESSION['sem'];
                    $save_to_logs = "INSERT INTO `logs`(`stud_id`, `admin_id`, `admin_type`, `content`, `datemodified`,`manage_fields`,`semester`) 
                    VALUES (0,'$token','GCC','Added New links and Content.(Pages)','$date_m','Manage','$sem')";
                    mysqli_query($con,$save_to_logs); 
		
	}
 ?>