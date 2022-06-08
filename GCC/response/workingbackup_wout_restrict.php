<?php 
session_start();
include '../create_form/connect.php';
	$csform = $_SESSION['Live_form_id'];	
if(isset($_POST['trigger'])){ 
			$sql = "SELECT * FROM `form` where type = 'Question' and class_name = '$csform' ";
	                $result = mysqli_query($con,$sql); // run query
	         
	         		$count= mysqli_num_rows($result); 
	             	           
	             	 date_default_timezone_set('Asia/Manila'); 
					$defdt =  date("Y-m-d H:i:s");
	                 while($row = mysqli_fetch_array($result)){
							$formids = $row['form_id'];
							$content = $row['content'];
							$details = $_POST[$formids];
							$chek = 'check'.$formids;
							$checkbox = $_POST[$chek];
							$required = $row['isrequired'];
					
				
								 for($is=0; $is <= $count;$is++) { 
								
				
            					
				$send_response = "INSERT INTO `response`( `content`, `details`, `date_responsed`,`csformid`) VALUES ('$content','$details','$defdt','$csform')";
				
				 
						 }	
						 $resultsss = mysqli_query($con,$send_response);
						$get_id =  mysqli_insert_id($con); 
								$sqlchoice = " select * from choices where form_id = '$formids'  ";
						  		                $resultch = mysqli_query($con,$sqlchoice); // run query
						  		               	$countch= mysqli_num_rows($resultch);
						  		                 while($rowchoice = mysqli_fetch_array($resultch)){
						  							$type = $rowchoice['type'];

						  							if($type == 'checkbox'){
						  								if($resultsss) {
						  									
													
													
													 $chk = " ";
													 foreach ($checkbox as $checkval) {
													$chk .= $checkval.",";
													
													$update = " UPDATE `response` SET `details`='$chk' WHERE res_id='$get_id'  ";
									
											}
												
				 									$resultupt = mysqli_query($con,$update); 
					              
					                	       
												}
						  							}
						  		                 


						  		                 }
					
						
					
				
		

					
							
					
					
	                	               
							              
						  		                 		
							
	                 }
	                 


	        // header('location:response_successfully.php');
}

 ?>