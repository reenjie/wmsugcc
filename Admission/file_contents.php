<?php 
session_start();
include '../GCC/create_form/connect.php';
	if(isset($_POST['alluserfiles'])){ 

		$studentid = $_POST['studentid'];

			?>

			 <div class="container">
													 	 <div class="row">
			<?php

				$selectfilesonly = " select * from form where type = 'file' and class_name = '60'  ";
		                $formfiles = mysqli_query($con,$selectfilesonly); 
		             
		            
		                 while($row = mysqli_fetch_array($formfiles)){
							$formid=  $row['form_id'];
							$cont = $row['content'];

										$getfilesfromuser = " select * from form_response where formid = '$formid' and userid = '$studentid' and status ='approved'  ";
								                $gettingfiles = mysqli_query($con,$getfilesfromuser); 
								               
								            
								                 while($userfiles = mysqli_fetch_array($gettingfiles)){
													$attachment_file =  $userfiles['response'];

													$srcfiles = '../../attachments/'.$attachment_file;



													?>
													<style type="text/css">
														.sb::-webkit-scrollbar {
														  width: 0px;
														}
													</style>
													 	 <div class="col-sm-4">
													 	 	
													 	 	 <div class="card" style="border-top:5px solid #629b9e; ">
													 	 	 	 <div class="card-body">
													 	 	 	 	<h6 style="font-weight: bolder">
													 	 	 	 		<span style="font-size: 12px" class="text-danger">Form query</span> <br>
													 	 	 	 	<?php echo $cont ?>
													 	 	 	 	</h6>
													 	 	 	 	<hr>
													 	 	 	 	 <div class="sb" style="height: 150px; overflow-y: scroll;" > 
													 	 	 	 	 
													 	 	 	 	<h6 style="font-weight: bolder">
													 	 	 	 		<i class="fas fa-paperclip"></i> <br>
													 	 	 	 		<?php echo $attachment_file ?>
													 	 	 	 	</h6>
													 	 	 	 	</div>



													 	 	 	 	
													 	 	 	 	
													 	 	 	 </div> 
													 	 	 	  <div class="card-footer">
													 	 	 	  	<a href="<?php echo $srcfiles ?>" target="_blank" style="margin-right: 4px"> <i class="fas fa-link"></i></a>
													 	 	 	 	<a href="<?php echo $srcfiles ?>" download> <i class="fas fa-download"></i></a>
													 	 	 	  </div> 
													 	 	 	  
													 	 	 	 
													 	 	 </div> 
													 	 	 

													 	 </div> 
													 	 		  		

													 	 		 


													 	
													<?php
								                 }
								          
		                


		                 }

		                 ?>

		                  </div> 
													 	 
						 </div> 
													 
			<?php
		          
		


		
	}

	if(isset($_POST['alluserfilesdeclined'])){ 
		
		$studentid = $_POST['studentid'];

			?>

			 <div class="container">
													 	 <div class="row">
			<?php

				$selectfilesonly = " select * from form where type = 'file' and class_name = '60'  ";
		                $formfiles = mysqli_query($con,$selectfilesonly); 
		             
		            
		                 while($row = mysqli_fetch_array($formfiles)){
							$formid=  $row['form_id'];
							$cont = $row['content'];

										$getfilesfromuser = " select * from form_response where formid = '$formid' and userid = '$studentid' and status ='declined'  ";
								                $gettingfiles = mysqli_query($con,$getfilesfromuser); 
								               
								            
								                 while($userfiles = mysqli_fetch_array($gettingfiles)){
													$attachment_file =  $userfiles['response'];

													$srcfiles = '../../attachments/'.$attachment_file;



													?>
													<style type="text/css">
														.sb::-webkit-scrollbar {
														  width: 0px;
														}
													</style>
													 	 <div class="col-sm-4">
													 	 	
													 	 	 <div class="card" style="border-top:5px solid #629b9e; ">
													 	 	 	 <div class="card-body">
													 	 	 	 	<h6 style="font-weight: bolder">
													 	 	 	 		<span style="font-size: 12px" class="text-danger">Form query</span> <br>
													 	 	 	 	<?php echo $cont ?>
													 	 	 	 	</h6>
													 	 	 	 	<hr>
													 	 	 	 	 <div class="sb" style="height: 150px; overflow-y: scroll;" > 
													 	 	 	 	 
													 	 	 	 	<h6 style="font-weight: bolder">
													 	 	 	 		<i class="fas fa-paperclip"></i> <br>
													 	 	 	 		<?php echo $attachment_file ?>
													 	 	 	 	</h6>
													 	 	 	 	</div>



													 	 	 	 	
													 	 	 	 	
													 	 	 	 </div> 
													 	 	 	  <div class="card-footer">
													 	 	 	  	<a href="<?php echo $srcfiles ?>" target="_blank" style="margin-right: 4px"> <i class="fas fa-link"></i></a>
													 	 	 	 	<a href="<?php echo $srcfiles ?>" download> <i class="fas fa-download"></i></a>
													 	 	 	  </div> 
													 	 	 	  
													 	 	 	 
													 	 	 </div> 
													 	 	 

													 	 </div> 
													 	 		  		

													 	 		 


													 	
													<?php
								                 }
								          
		                


		                 }

		                 ?>

		                  </div> 
													 	 
						 </div> 
													 
			<?php
		          
		
	}

 ?>