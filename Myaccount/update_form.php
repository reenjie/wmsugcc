<?php 
	
										  	 	  	$check_formupts = "select form_id,type,sec_no,class_name from form where class_name='62' and type in ('Question','file','list') and form_id not in (select formid from form_response where csformid ='62' and userid = '$token')  ";
													 $chkingformupts = mysqli_query($con,$check_formupts); 
													 $countingdata= mysqli_num_rows($chkingformupts);
													
													if($countingdata >=1){
															
															 ?>
   			                  <button class="btn btn-danger" id="uptbtn"  data-toggle="modal" data-target="#updatemodal" data-backdrop="static" data-keyboard="false" data-csformid = "<?php echo $csexist ?>" style="font-size: 12px;float: right;width: 100px;margin-top: -20px">
									 UPDATE
							</button>


								<div class="modal " id="updatemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
										  <div class="modal-dialog modal-dialog-centered" id="modalsize" role="document">
										    <div class="modal-content">
										    
										      <div class="modal-body">
										       	
										       	 <div class="container">
										       	 	
										       	 	<span id="notice">
										       	 		

										       	 		Guidance and Counseling Center has been updated the PDS form. you may now update your Personal Data Sheet.
														

														<hr>
										       	 	</span>
										       	 	<span id="load" class="d-none" >
										       	 		 <div class="container" style="text-align: center;">
										       	 		 	<h6 >Initializing   <i class="fas fa-sync fa-spin"></i></h6>

										       	 		 </div> 
										       	 		 
										       	 	
										       	 		
										       	 	</span>
										       	 	

										       	  <button type="button" class="btn btn-light text-info continueupdate ml-2" style="font-size:12px;float: right;" >Proceed</button>
										       	  <button type="button" class="btn btn-light text-danger cancel" style="font-size:12px;float: right;" data-dismiss="modal">Cancel</button>

										       	 </div> 
										       	 
										
										
										       
										      </div>
										    
										    </div>
										  </div>
										</div>


										<script type="text/javascript">
											
											$('.continueupdate').click(function() { 
											    	$('#notice').hide();
											      		$('#load').removeClass('d-none');
											      		$(this).hide();
											      		$('.cancel').hide();
											      		$('#modalsize').addClass('modal-sm');


											      		
											      		   $.ajax({
											      		           url : "session.php",
											      		            method: "POST",
											      		             data  : {updatemypds:1},
											      		             success : function(data){
											      						window.location.href="forms/update";


											      		             }
											      		          })
											      		       
											      		    
											      })      
										      	
										</script>




   			                 <?php
														
												
												 	}else {
												 		

															$checkchangesinpages = " SELECT * FROM `student` where stud_id = '$token'  ";
   			                $chkingchnges = mysqli_query($con,$checkchangesinpages); 
   			                $countofchanges= mysqli_num_rows($chkingchnges);

		   			            while($thechanges = mysqli_fetch_array($chkingchnges)){
		   									$retake = $thechanges['retake'];
		   									$modify = $thechanges['modify'];
		   									$upt = $thechanges['upt'];

		   									
		   			             	}

		   			             	if($upt == 1){
		   			             		 ?>
   			                  <button class="btn btn-danger" id="uptbtn"  data-toggle="modal" data-target="#updatemodal" data-backdrop="static" data-keyboard="false" data-csformid = "<?php echo $csexist ?>" style="font-size: 12px;float: right;width: 100px;margin-top: -20px">
									 UPDATE
							</button>


								<div class="modal " id="updatemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
										  <div class="modal-dialog modal-dialog-centered" id="modalsize" role="document">
										    <div class="modal-content">
										    
										      <div class="modal-body">
										       	
										       	 <div class="container">
										       	 	
										       	 	<span id="notice">
										       	 		

										       	 		Guidance and Counseling Center has been updated the PDS form. you may now update your Personal Data Sheet.
														

														<hr>
										       	 	</span>
										       	 	<span id="load" class="d-none" >
										       	 		 <div class="container" style="text-align: center;">
										       	 		 	<h6 >Initializing   <i class="fas fa-sync fa-spin"></i></h6>

										       	 		 </div> 
										       	 		 
										       	 	
										       	 		
										       	 	</span>
										       	 	

										       	  <button type="button" class="btn btn-light text-info continueupdate ml-2" style="font-size:12px;float: right;" >Proceed</button>
										       	  <button type="button" class="btn btn-light text-danger cancel" style="font-size:12px;float: right;" data-dismiss="modal">Cancel</button>

										       	 </div> 
										       	 
										
										
										       
										      </div>
										    
										    </div>
										  </div>
										</div>


										<script type="text/javascript">
											
											$('.continueupdate').click(function() { 
											    	$('#notice').hide();
											      		$('#load').removeClass('d-none');
											      		$(this).hide();
											      		$('.cancel').hide();
											      		$('#modalsize').addClass('modal-sm');


											      		
											      		   $.ajax({
											      		           url : "session.php",
											      		            method: "POST",
											      		             data  : {updatemypds:1},
											      		             success : function(data){
											      						window.location.href="forms/update";
											      		             }
											      		          })
											      		       
											      		    
											      })      
										      	
										</script>




   			                 <?php
														
		   			             	}else if ($retake == 1){
		   			             		
		   			             		?>

   			         	 <button class="btn btn-danger"  data-toggle="modal" data-target="#exampleModal" data-backdrop="static" data-keyboard="false" data-csformid = "<?php echo $csexist ?>" style="font-size: 12px;float: right;width: 100px;margin-top: -20px">
													  	 Retake
										</button>

										
										
										<!-- Modal -->
										<div class="modal " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
										  <div class="modal-dialog modal-dialog-centered" id="modalsize" role="document">
										    <div class="modal-content">
										    
										      <div class="modal-body">
										       	
										       	 <div class="container">
										       	 	
										       	 	<span id="notice">
										       	 		IMPORTANT NOTICE: <br>

										       	 		You must retake the form due to changes made by the Guidance Counseling Office to its PDS form.
														As a result, if not taken into consideration. Then your Personal Data Sheet form <span class="text-danger">will no longer be valid.</span>

														<hr>
										       	 	</span>
										       	 	<span id="load" class="d-none" >
										       	 		 <div class="container" style="text-align: center;">
										       	 		 	<h6 >Initializing   <i class="fas fa-sync fa-spin"></i></h6>

										       	 		 </div> 
										       	 		 
										       	 	
										       	 		
										       	 	</span>
										       	 	

										       	  <button type="button" class="btn btn-light text-info proceed ml-2" style="font-size:12px;float: right;" >Proceed</button>
										       	  <button type="button" class="btn btn-light text-danger cancel" style="font-size:12px;float: right;" data-dismiss="modal">Cancel</button>

										       	 </div> 
										       	 
										
										
										       
										      </div>
										    
										    </div>
										  </div>
										</div>

										<script type="text/javascript">
											
											$(document).ready(function() {
											      	$('.proceed').click(function() { 
											      		$('#notice').hide();
											      		$('#load').removeClass('d-none');
											      		$(this).hide();
											      		$('.cancel').hide();
											      		$('#modalsize').addClass('modal-sm');

											      		
											      		   $.ajax({
											      		           url : "action.php",
											      		            method: "POST",
											      		             data  : {deleteoldpds:1},
											      		             success : function(data){
											      		             		
											      		var timer = setInterval(function(){
											      						
											      							
											      							  	var csid = '62';
																	 	      	var type = 'pds';
																	 	      	 	
																	 	      	 	
																	 	      	 		   $.ajax({
																	 	      	 		           url : "session.php",
																	 	      	 		            method: "POST",
																	 	      	 		             data  : {fillform:1,csid:csid,type:type},
																	 	      	 		             success : function(data){
																	 	      	 			window.location.href="../GCC/response/";
																	 	      	 			
																	 	      	 		             }
																	 	      	 		          })
											      							   
											      							    

																      			clearInterval(timer);
																      		},3000);
																      		
											      		             }
											      		          })
											      		    
											      		
											      		    
											      	
											      
											      	})

											      	$('#formview62').removeClass('review').removeClass('btn').removeClass('btn-primary').addClass('btn').addClass('btn-light').addClass('text-danger');
											      	$('#formview62').html('Unavailable');

											      });      
										      	
										</script>
   			         	<?php

		   			             	}

		   			             	else {
		   			             		?>

										  	 			 <button class="btn btn-info modify" data-csformid = "<?php echo $csexist ?>"  style="font-size: 12px;float: right;width: 100px;margin-top: -20px">
													  	 	Modify
													  	 </button>
		   			             		<?php
		   			             	}


												 		
												 	}



 ?>