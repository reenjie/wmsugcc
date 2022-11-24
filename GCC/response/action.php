<?php 
session_start();
include '../create_form/connect.php';


	if(isset($_POST['content'])){ 

					$csform = $_SESSION['Live_form_id'];	

				$sql = " SELECT * FROM `form` where class_name = '$csform' order by display_order";
		                $result = mysqli_query($con,$sql); // run query
		                $count= mysqli_num_rows($result); // to count if necessary
		               //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
		          	if($count >=1){


		                 while($row = mysqli_fetch_array($result)){
		                 	$formid = $row['form_id'];
						 	$dd = $row['type'];
						 	$isreq = $row['isrequired'];
						 	$status = $row['status'];
						 	$bgsrc = '../img/uploads/'.$row['bgimage'];
						 	$bgtcolor = $row['bgcolor'];
						 	$txttcolor = $row['txtcolor'];
						 	$yaxis = $row['yaxis'];
						 	$isvisible = $row['isvisible'];

						 	if($yaxis == ''){
						 		$posbg = 'center';
						 	}else {
						 		$posbg = $yaxis.'px';
						 	}

						 	if($dd == 'file'){
						 		?>
						 		
						 		<?php
						 	}else 
							if($dd == 'Title') { 

								
											?>
							<p></p>
							<?php
						include '../create_form/connect.php';
						
										$setcolor = " select * from `form_classification` where csform_id = '$csform'  ";
								                $setcolored = mysqli_query($con,$setcolor); // run query
								              
								                 while($getcolor = mysqli_fetch_array($setcolored)){
													$bodybg = $getcolor['bodybg'];
													$titlebg = $getcolor['titlebg'];
													$questionbg = $getcolor['questionbg'];
													$textcolortitle = $getcolor['textcolortitle'];
													$textcolorquestion = $getcolor['textcolorquestion'];
								    }
								          
						?>
						 <form method="post" id="saveform"  enctype="multipart/form-data" >
						    	                  
						<input type="hidden" name="trigger">
						

							<div class="card-header py-5 " style="background: url('<?php echo $bgsrc ?>');background-size:cover;background-repeat:no-repeat;background-position-y:<?php echo $posbg ?>;background-color:<?php echo $bgtcolor ?>;color: <?php echo $txttcolor ?>;text-align: center;height: 180px;border-radius: 5px" >

								<?php 

							  	 	if($isvisible >= 1 ){
							  	 		?>
							  	 	

							  	 			<?php

							  	 		}else {
							  	 			?>
							  	 		<h3 style="text-transform: uppercase;padding-top: 20px"> <?php echo $row['content'] ?></h3>

							  	 			<?php
							  	 		}
							  	 	 ?>
							 	
					
							</div>
							<p></p>
							<?php	
									
								

							}else if ($dd == 'Question') {	
								
							 		
										?>
									<?php
						include '../create_form/connect.php';
						
										$setcolor = " select * from `form_classification` where csform_id = '$csform'  ";
								                $setcolored = mysqli_query($con,$setcolor); // run query
								              
								                 while($getcolor = mysqli_fetch_array($setcolored)){
													$bodybg = $getcolor['bodybg'];
													$titlebg = $getcolor['titlebg'];
													$questionbg = $getcolor['questionbg'];
													$textcolortitle = $getcolor['textcolortitle'];
													$textcolorquestion = $getcolor['textcolorquestion'];
								    }
								          
								?>
							<p></p>
							<div class="card cardo"  style="border-bottom: 2px solid <?php echo $questionbg ?>" >

							
							  <div class="card-body py-4">
							  
							 <div class="container">
							 	<div class="row">
								 		<div class="col-sm-12">
								 			<?php 
								 			if ($isreq == 'yes') {
								 				?>
								 				<h5 style="width: 100%; border:none;outline: none;padding: 9px; color: <?php echo $textcolorquestion ?>;font-weight: bold;font-size: 16px" > <?php echo $row['content']; ?>  <span style="color:#b81a21;"> *</span>
								 					<span style="font-size: 11px;color: red;float: right;font-weight: bolder;">This Field is Required.</span>
								 				</h5>

								 				<?php
								 			}else if ($isreq == 'no') { 
								 				?>
								 				<h5 style="width: 100%; border:none;outline: none;padding: 9px; color: <?php echo $textcolorquestion ?>;font-weight: bold;font-size: 16px" > <?php echo $row['content']; ?></h5>
								 				<?php
								 			}
								 			 ?>
								 		</div>
								 		
								 		
								 	</div>

								 	
								 	<div class="row " id="optcontents">
									 		
								 		<?php 
								 		
		            
		                 
		                 	
		                 		$sqls = " select * from choices where form_id = '$formid' ";
			               		 $results = mysqli_query($con,$sqls); // run query
			               		 while($rows = mysqli_fetch_array($results)){
			               		 	$type= $rows['type'];
			               		 		$choiceid = $rows['choice_id'];
			               		 		include 'Options.php';
			     
			               		 }
							 
		                 
								 		 ?>

								 	</div>

							 </div> 
							 
							
							<p></p>
							
							 <button class="btndel d-none"  style="border:none;outline: none; float: right; margin-top: 20px" data-fid="<?php echo $row['form_id'] ?>"><i style="color:grey" class="far fa-trash-alt"></i></button>
							  </div>

							</div>

							<p></p>
							<?php

									
							 		
									

							}else if ($dd == 'Plaintext') {
								?>
										<p></p>
								 <div class="card ">
								 	
								 	 <div class="card-body py-5">
								 	 	
								 	 	
								 	 	  
								 	 	 

								 	 <div class="container">



								 	 	
								 	 		<h6 style="font-weight: bold;"><?php echo $row['content'] ?></h6> 	
								 	 	
								 	 		
								 	 </div> 
								 	 


								 	 </div> 
								 	  <div class="card-footer" style="border-bottom: 2px solid <?php echo $questionbg ?>"></div> 
								 	  
								 </div> 
								 <p></p>
								<?php
							}

		                 }
		               	?>
		               	<button class="btn btn-primary sub" id="sub" type="Submit" name="btn" style="width: 150px;padding: 10px;">Submit</button> 
		               	<?php
		             }else {
		             	include '../include/assets/head.php';
		             	?>
		             	   <div class="container-fluid">

                    <!-- 404 Error Text -->
                    <div class="text-center">
                        <div class="error mx-auto" data-text="404">404</div>
                        <p class="lead text-gray-800 mb-5">Contents Not Found</p>
                        <p class="text-gray-800 mb-0">The administrator may make changes to the content. or Admin's work hasn't been saved</p>
                      
                    </div>

                </div>
		             	 
		             	 	 </form>
		             	<?php
		             }
		          
	
	}

	if(isset($_POST['close'])){
		unset($_SESSION['validate_info']); 		
		
	}
 ?>
 <script type="text/javascript">
 	
 	 $('.chkvalue').click(function() {
 	      if($(this).prop("checked") == true) {
 	                $('#checkkk').attr('checked','checked');
 	                             		
 	         }
 	      else if($(this).prop("checked") == false) {
 	               
 	                 $('#checkkk').removeAttr('checked');                       
 	       }
 	    });
   
    $('#saveform').on('submit', function(event){
       event.preventDefault();
     	var checkreq = $('.checkrequired').val();

     		if(checkreq == 'yes') {
     			
     			
     				
     			
     				
     			      if($('#checkkk').prop("checked") == true) {
     			             	$.ajax({
    	                 url : "accept.php",
    	                  method: "POST",
    	                   data  : $(this).serialize(),
    	                   success : function(data){
    	      				
    	      				window.location.href="response_successfully.php";
    	      					
    	      				
    	                   }
    	                })                        		
     			         }
     			      else if($('#checkkk').prop("checked") == false) {
     			            	$('#error').removeClass('d-none');                         
     			       }else {

     			       		$.ajax({
    	                 url : "accept.php",
    	                  method: "POST",
    	                   data  : $(this).serialize(),
    	                   success : function(data){
    	      				
    	      				window.location.href="response_successfully.php";
    	      					
    	      				
    	                   }
    	                })
     			       }

     			       

     		}else if (checkreq == 'no'){
     			$.ajax({
    	                 url : "accept.php",
    	                  method: "POST",
    	                   data  : $(this).serialize(),
    	                   success : function(data){
    	      				window.location.href="response_successfully.php";
    	      					
    	      				
    	                   }
    	                })
     		}
       		
       });
    $('.sub').click(function() { 
    	$('#error').addClass('d-none');
    })
    
    
       	
 </script>