<?php 
	session_start();
include 'connect.php';
	if(isset($_POST['savebgimage'])){ 
		//$xvalue = $_POST['xvalue'];
		$yvalue = $_POST['yvalue'];
		$fid = $_POST['fid'];

		
			
			
		                 $image_name = $_FILES['bgfile']['name'];
		                 $tmp_name   = $_FILES['bgfile']['tmp_name'];
		                $size       = $_FILES['bgfile']['size'];
		                 $type       = $_FILES['bgfile']['type'];
		                 $error      = $_FILES['bgfile']['error'];
		                                                                                                                                    
		             
		                                                                                                                                    
		           $fileName =basename($_FILES['bgfile']['name']);
		                 $rand = rand(100,1000);   


		          $pname = $rand.'Photo'.'_'.$fileName;
		                // File upload path
		            $uploads_dir = '../img/uploads';
		         move_uploaded_file($tmp_name , $uploads_dir .'/'.$pname);
		            
		            	
		         	$sql = " UPDATE `form` SET `bgimage`='$pname' ,`yaxis`='$yvalue' WHERE form_id='$fid' ";
				 			                $result = mysqli_query($con,$sql); 
				 			                
		                                                                                                                          
		         
		            
		
		

	}

	if(isset($_POST['clearbg'])){ 
		$fid = $_POST['fid'];

				$sql = " SELECT * FROM `form` where form_id = '$fid' ";
		                $result = mysqli_query($con,$sql); // run query
		             
		                 while($row = mysqli_fetch_array($result)){
						$bgimage = '../img/uploads/'.$row['bgimage'];
		                 }
		                 unlink($bgimage);
		                 $sqls= " UPDATE `form` SET `bgimage`=''  WHERE form_id='$fid' ";
				 			      mysqli_query($con,$sqls); 

		          
		
	}

	if(isset($_POST['savebgcolor'])){ 
		$val = $_POST['val'];
		$fid = $_POST['fid'];

				$sql = " UPDATE `form` SET `bgcolor`='$val' WHERE form_id='$fid' ";
		                $result = mysqli_query($con,$sql); // run query
		            
		
	}

	if(isset($_POST['savetxtcolor'])){ 
		$val = $_POST['val'];
		$fid = $_POST['fid'];

				$sql = " UPDATE `form` SET `txtcolor`='$val' WHERE form_id='$fid' ";
		                $result = mysqli_query($con,$sql); // run query
		             
		
	}
	if(isset($_POST['visible'])){ 
		$fid = $_POST['fid'];
		$sql = " UPDATE `form` SET `isvisible`=0 WHERE form_id='$fid' ";
		                $result = mysqli_query($con,$sql); // run query
		echo 'updated 0';
	}
	if(isset($_POST['notvisible'])){ 
		$fid = $_POST['fid'];
		$sql = " UPDATE `form` SET `isvisible`=1 WHERE form_id='$fid' ";
		                $result = mysqli_query($con,$sql); // run query
		echo 'updated 1';
	}
 ?>