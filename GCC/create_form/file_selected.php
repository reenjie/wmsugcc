 <script type="text/javascript">
	 	
	 	$(document).ready(function() {
	 	      	$('#section<?php  echo $section ?>').removeClass('text-primary');
	 	      	 	$('#section<?php  echo $section ?>').addClass('text-light');
	 	      	 	 	$('#section<?php  echo $section ?>').addClass('bg-primary');
	 	      	 	 		$('.autoscroll').removeClass('active');
	 	      	 	 	$('#scrollspy<?php echo $section ?>').addClass('active');
	 	      });      
	       	
	 </script>
							<p></p>
					<style type="text/css">
								.questval {
								 width: 100%; border:none;outline: none;padding: 9px; 
								 font-size: 14px;

							background: 
						    linear-gradient(#a8bbc5, #a8bbc5) bottom / 0% 1px no-repeat
						    #ccc;
						  transition: .5s;

						  background-color: #f0f0f0;
						  color:#032618;
							}
						

							.questval:hover {
							
								background-color: #eae8e8;
								

							}
							

							.questval:focus {
									
							
								
								background-color: #ffffff;
								background-size: 100% 2px;
								

							} 
							#responsive::-webkit-scrollbar {
								 width: 3px;
								 height: 5px;

								}
							</style>			

							

							<div class="card shadow "  style="border-right: 8px solid <?php echo $questionbg ?>;box-shadow:5px 10px 18px #888888;border-radius: 10px; " >
								<?php
										$setcolor = " select * from `form_classification` where csform_id = '$csform'  ";
								                $setcolored = mysqli_query($con,$setcolor); // run query
								              
								                 while($getcolor = mysqli_fetch_array($setcolored)){
													$bodybg = $getcolor['bodybg'];
													$titlebg = $getcolor['titlebg'];
													$questionbg = $getcolor['questionbg'];
								                 }
								          
								?>
 				
							  <div class="card-body  py-4" style="text-align: left;">
							  	 	<input type="text" name="" onClick="this.select();" class="questval" data-formidd="<?php echo $row['form_id'] ?>" value="<?php echo $row['content'] ?>">

							 	 <div class="card mt-4">
							   	 	 	 <div class="card-body">
							   	 	 	 	
							   	 	 	 	<h6><i class="fas fa-paperclip"></i>  Attach File</h6>

							   	 	<span style="text-align: center; font-size: 12px" class="text-secondary"> 	
							   	 		Accepted Formats :
							   	 		<nav aria-label="breadcrumb">
								  <ol class="breadcrumb">
								    <li class="breadcrumb-item active" aria-current="page"><span class="text-danger">all types of images </span></li>
								     <li class="breadcrumb-item active" aria-current="page"><span class="text-danger">.doc </span></li>
								      <li class="breadcrumb-item active" aria-current="page"><span class="text-danger">.docs </span></li>
								       <li class="breadcrumb-item active" aria-current="page"><span class="text-danger">.pdf </span></li>
								         <li class="breadcrumb-item active" aria-current="page"><span class="text-danger">.ppt </span></li>
								  </ol>
								</nav></span>
							   	 	 	 </div> 
							   	 	 	 
							   	 	 </div> 
							   
							 

							  		
							  	

							  	
							
							  </div>
							   <div class="card-footer">
							   	  <button class="btndeltitle"  style="float: right;border:none;outline: none;" data-fid="<?php echo $row['form_id'] ?>" ><i style="color:grey" class="far fa-trash-alt"></i></button>


						
							   </div> 
							   
							  
							</div>
							<p></p>

							<script type="text/javascript">
								
								$(document).ready(function() {
								      	$('.changeval').keyup(function(){ 
								      		var val = $(this).val();
								      		var id = $(this).data('formidd');
								      		

								      		
								      		
								      		   $.ajax({
								      		           url : "action.php",
								      		            method: "POST",
								      		             data  : {changetext:1,val:val,id:id},
								      		             success : function(data){
								      		
								      		             }
								      		          }) 
								      		      
								      		    
								      	
								      	})
								      });      
							      	
							</script>



								 <?php 
								 		$cx = " SELECT max(display_order) FROM `form` WHERE class_name='$clss' and sec_no = '$secno'  ";
								                 $resultcx = mysqli_query($con,$cx); // run query
								                 $countcx= mysqli_num_rows($resultcx); // to count if necessary
								                //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
								              if ($countcx>=1){
								              	//while($row = mysqli_fetch_array($result)){} is where we output all the data in database
								                  while($rowcx= mysqli_fetch_array($resultcx)){

								                  	$max =  $rowcx['max(display_order)'];
								 					
								                  }

								                    if ($d_order == $max) {

								                  				$cs = "SELECT * FROM `form` where type ='section'";
								                  				  $resultcss = mysqli_query($con,$cs); // run query
								                 $countcss= mysqli_num_rows($resultcss); // to count if necessary
								                //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
													              if ($countcss>=1){

													              	?>

								                  	<h6 class="mt-5 text-secondary" style="font-weight: bolder;text-align: center;"><i class="fas fa-angle-double-left"></i><i class="fas fa-chevron-left"></i> End of Section <?php echo $secno ?>  <i class="fas fa-chevron-right"></i><i class="fas fa-angle-double-right"></i></h6>

								                  					<?php
													              
													              }else {
													              	
													              }

								                  		
								                  }
								           }

								  ?>
