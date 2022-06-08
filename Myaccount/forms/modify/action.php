<?php 
session_start();
include '../../../GCC/create_form/connect.php';


	if(isset($_POST['content'])){ 


					$csforms = $_SESSION['form_token_id_for_modify'];	
					$studentid = $_SESSION['user_student_token_check'];

					

				$sql = " SELECT * FROM `form_response` where csformid = '$csforms' and userid='$studentid'";
		                $result = mysqli_query($con,$sql); // run query
		                $count= mysqli_num_rows($result); // to count if necessary
		               //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
		          	if($count >=1){


		                 while($row = mysqli_fetch_array($result)){
		                 	$formid = $row['formid'];
		                 	$csform = $row['csformid'];
		                 


						 	$dd = $row['type'];

						 	echo $dd;
						 
							if($dd == 'Title') { 

								
											?>
							<p></p>
							<?php
					
						
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
						

							<div class="card" style="background-color:<?php echo $titlebg ?>;color:<?php echo $textcolortitle ?>;text-align: center; padding: 75px;margin-top: -25px;">

								<h3 style="text-transform: uppercase;"> <?php echo $row['content'] ?></h3>
					
							</div>
							<p></p>
							<?php	
									
								

							}else if ($dd == 'Question') {	
								
										?>
									<?php
					
						
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
							<style type="text/css">
		.ribbon-wrapper {
  height: 70px;
  overflow: hidden;
  position: absolute;
  right: -2px;
  top: -2px;
  width: 70px;
  z-index: 10;
}

.ribbon-wrapper.ribbon-lg {
  height: 120px;
  width: 120px;
}

.ribbon-wrapper.ribbon-lg .ribbon {
  right: 0;
  top: 26px;
  width: 160px;
}

.ribbon-wrapper.ribbon-xl {
  height: 180px;
  width: 180px;
}

.ribbon-wrapper.ribbon-xl .ribbon {
  right: 4px;
  top: 47px;
  width: 240px;
}

.ribbon-wrapper .ribbon {
  box-shadow: 0 0 3px rgba(0, 0, 0, 0.3);
  font-size: 0.8rem;
  line-height: 100%;
  padding: 0.375rem 0;
  position: relative;
  right: -2px;
  text-align: center;
  text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.4);
  text-transform: uppercase;
  top: 10px;
  -webkit-transform: rotate(45deg);
  transform: rotate(45deg);
  width: 90px;
}

.ribbon-wrapper .ribbon::before, .ribbon-wrapper .ribbon::after {
  border-left: 3px solid transparent;
  border-right: 3px solid transparent;
  border-top: 3px solid #9e9e9e;
  bottom: -3px;
  content: "";
  position: absolute;
}

.ribbon-wrapper .ribbon::before {
  left: 0;
}

.ribbon-wrapper .ribbon::after {
  right: 0;
}



	</style>
							<div class="card cardo"  style="border-bottom: 2px solid <?php echo $questionbg ?>" >

							
							  <div class="card-body">
							  
							 <div class="container">
							 	<div class="row">
								 		<div class="col-sm-9">
								 		
								 				<h6 style="width: 100%; border:none;outline: none;padding: 9px; color: <?php echo $textcolorquestion ?>;font-weight: bold" > <?php echo $row['content']; ?></h6>
								 				
								 		
								 		</div>
								 		
								 		<div class="col-sm-3">
								 		
								

								 		</div>
								 	</div>

								 	
								 	<div class="row " id="optcontents">
									 	<div class="container">
									 		<div class="row" style="text-align: center;">
									 			<div class="card " >
									 			   <!-- <div class="ribbon-wrapper">
                                   				 		 <div class="ribbon ribbon-xl bg-light text-gray-800">
                                   				 		 	<span style="font-size: 12px;">Response</span>

                                   				 		 </div> 
                                   				 		
                                   				</div>  -->   
									 			   
									 			  <div class="card-body">
									 			  	<?php 
									 			  	if($det == ''){
									 			  		?>
									 	 <h6 class="text-gray-800 text-danger" style="font-size: 12px">N/A</h6>
									 			  			<?php
									 			  		}else{
									 			  			?>
									 	 <h6 class="text-gray-800 text-secondary" style=""> <?php echo  str_replace(',', ' <br><br>', $det); ?></h6>
									 			  			<?php
									 			  		}	
									 			  	 ?>
									 			  	
					
									 			  </div>
									 			</div>
									
									 		</div>
									 		</div>
								 	</div>

							 </div> 
							 
							
							<p></p>
							
							 <button class="btndel d-none"  style="border:none;outline: none; float: right; margin-top: 20px" data-fid="<?php echo $row['form_id'] ?>"><i style="color:grey" class="far fa-trash-alt"></i></button>
							  </div>

							</div>

							<p></p>
							<?php

									
							 		
									

							}

		                 }
		              
		             }else {
		            
		             	?>
		             	 <link href="../../../GCC/css/sb-admin-2.min.css?v=3" rel="stylesheet">
		             	   <div class="container-fluid">

                    <!-- 404 Error Text -->
                    <div class="text-center mt-5">
                        <div class="error mx-auto" data-text="404">404</div>
                        <p class="lead text-gray-800 mb-5">Contents Not Found</p>
                        <p class="text-gray-700 mb-0">There are no accessible contents since it has not yet been filled up. <br>
                        
                        </p>
                      
                    </div>

                </div>
		             	 
		             	 	 </form>
		             	<?php
		             }
		          
	
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