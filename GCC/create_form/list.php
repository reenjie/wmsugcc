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
								
								input {
								border:none;outline:none;

								background: 
						    linear-gradient(#a8bbc5, #a8bbc5) bottom / 0% 1px no-repeat
						    #ccc;
						  transition: .5s;

						  background-color: transparent;

							}

							input:hover {
								background-color:#f0f3f4;
							}
							input:focus {
									
							
								
								background-color: #ffffff;
								background-size: 100% 2px;
								

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
 				
							  <div class="card-body" style="text-align: left;padding: 50px ">
							  		
							  
							  		<input type="text" style="font-weight: bold;font-size: 16px;" data-formidd="<?php echo $row['form_id'] ?>"  name="" class="questval" onClick="this.select();" data-formidd="<?php echo $row['form_id'] ?>"  value="<?php echo $row['content']; ?>" > 

							  		
							  	
							  		<?php 
							  		if($isset == 0 ) {
							  			?>
							  			<h6 style="font-size: 14px" class="mt-3">Advance Options : </h6>
							  			<button class="btn btn-light text-primary addtable" data-formidd="<?php echo $row['form_id'] ?>"  style="font-size: 12px">Add Table</button>
							  		<button class="btn btn-light text-primary addmlist" data-formidd="<?php echo $row['form_id'] ?>" style="font-size: 12px">Add list</button>
							  			<?php

							  		}else {

							  			if($isset == 1 ) { 
							  				include 'advtable.php';
							  			}else if ($isset == 2){

							  				?>

							  				<h6 style="font-size: 14px" class="mt-3">Advance Options : </h6>

							  				<button  id="additemlist" data-formidd="<?php echo $row['form_id'] ?>" class="btn btn-light text-primary"style="font-size: 12px" ><i class="fas fa-plus-circle"></i> Add list</button>
							  					<button class="btn btn-light text-danger " id="deletelist" data-formidd="<?php echo $row['form_id'] ?>" style="font-size: 12px" ><i class="fas fa-times-circle"></i> Delete list</button>
							  				<?php
							  				/*
							  			if($ismodifiable == 0){
							  				?>
							  				
									<input type="checkbox" name="" class="modifiable" data-formidd="<?php echo $row['form_id'] ?>"> <span style="font-size: 12px;user-select: none" data-bs-toggle="tooltip" data-bs-placement="right" title="If checked, The user will be allowed to add,edit and delete columns.">Modifiable</span>
									
							  				<?php
							  			}else {
							  				?>


							  				
									<input type="checkbox" name="" class="modifiable" data-formidd="<?php echo $row['form_id'] ?>" checked> <span style="font-size: 12px;user-select: none" data-bs-toggle="tooltip" data-bs-placement="right" title="If Unchecked, The user will not be allowed modify columns.">Modifiable</span>
									
							  				
							  				<?php
							  			} */
							  		}

							  			
							  		}

							  		 ?>
							  		
							  	
							  		
							  	
							  		
							  		 <div class="table-responsive mt-4" id="responsive">
							  		 
							  		<table class="table  table-sm ">
							  
										<?php 

													$tc = " SELECT * FROM `tablecolumn_number` where formid='$formid' ";
											                $resulttc = mysqli_query($con,$tc); // run query
											              $countcccontent = 0;
											                 while($rowtc = mysqli_fetch_array($resulttc)){
											                 	$tctype= $rowtc['type'];
											                 	$tcId= $rowtc['tc_id'];
											                 	$bg = $rowtc['bg'];

											                 	if ($tctype == 'content') {
											                 		$tccontent = $tcId;
											                 	echo '<input type="hidden" name="" id="contentid" value="'.$tccontent.'">';
											                 	}

											                 		?>
                                      		                 		<script type="text/javascript">
                                      		                 			$(document).ready(function() {
                                      		                 				 
                                      		                 			
                                      		                 			<?php 
                                      		                 			if($bg == 'table-info'){
                                      		                 				?>$('#bg-info').attr('checked',true);

                                      		                 				$('#t1').addClass('border border-5');
                                      		                 				 <?php

                                      		                 				}else if($bg == 'table-danger'){
                                      		                 					?>$('#bg-danger').attr('checked',true);$('#t2').addClass('border border-5'); <?php
				                                      		               	}else if($bg == 'table-warning'){
				                                      		               		?>$('#bg-warning').attr('checked',true);$('#t3').addClass('border border-5'); <?php
				                                      		                }else if($bg == 'table-primary'){
				                                      		                	?>$('#bg-primary').attr('checked',true);$('#t4').addClass('border border-5'); <?php
				                                      		                }else if($bg == 'table-success'){
				                                      		                	?>$('#bg-success').attr('checked',true);$('#t5').addClass('border border-5'); <?php
				                                      		                }else if($bg == 'table-secondary'){
				                                      		                	?>$('#bg-secondary').attr('checked',true);$('#t6').addClass('border border-5'); <?php
				                                      		                }
                                      		                 			 ?>



                                      		                 			});
                                      		                 			  
                                      		                 		      	
                                      		                 		</script>
                                      		                 		<?php



																?>
										
										 	
										   <?php 
										   if ($tctype == 'header'){
										   
										   	?>

										   	<tr id="tableheader" class="<?php echo $bg ?>">
										   		<th>
										   			
										   		</th>
										   		
										   			<?php 
										   					$selectheaders = " SELECT * FROM `tablechoices` where tc_id = '$tcId'  ";
										   			                $resulthd = mysqli_query($con,$selectheaders); // run query
										   			               
										   			                 while($header = mysqli_fetch_array($resulthd)){
										   							?>
										   							<th>
				<input type="text" name="" class="changeheader" onclick="select()" data-tblid="<?php echo $header['tble_id'] ?>" style="font-weight: bold;outline: none;border: none;font-size: 15px" value="<?php echo $header['content'] ?>" >
				<button class="btn-light text-danger deleteheader" style="outline: none;border:none;font-size: 12px;float: right;float: top" data-tblid="<?php echo $header['tble_id'] ?>"><i class="fas fa-times"></i></button>

										   							</th>
										   							<?php
										   			                 }
										   			          


										   			 ?>
				
				 <button class="btn btn-light text-secondary addrows d-none"  data-tcid="<?php echo $tcId ?>" data-formidd="<?php echo $row['form_id'] ?>" data-columnaddnew="<?php echo $tccontent ?>" style="font-size: 14px;background-color: transparent;"> </button>

										   		
										   	</tr>
										   	<?php
										   }else if ($tctype == 'content'){
										   		
										   	?>


										   	 <tr>
										   	 	<td>	<button class="btn btn-light text-secondary delcolumn" data-tc ="<?php echo $tcId ?>" ><i class="fas fa-times"></i></button></td>
										     	<?php 
										     	
										   					$selectcontents = " SELECT * FROM `tablecolumn_content` where tc_id = '$tcId'  ";
										   			                $resultcc = mysqli_query($con,$selectcontents); // run query
										   			              	$countcccontent= mysqli_num_rows($resultcc); // to count if necessary
										   			              		              
										   			                 while($cntnt = mysqli_fetch_array($resultcc)){
										   			                 	
										   			                 	
										   							?>
										   							<td>

				<input type="text" name="" class="changecontents" onclick="select()" data-conid="<?php echo $cntnt['tcontent_id'] ?>" style="font-weight: bold;outline: none;border: none;font-size: 13px" value="<?php echo $cntnt['content'] ?>">

										   							</td>

										   							<?php
										   			                 }


										   			          


										   			 ?>
										   			

										   		
										    </tr>
										    
										    
										   	<?php
										   }
										    ?>
										
										
										    
										   
										
																<?php

											                 }
											          

										 ?>
										    
										</table>


										</div> 

										

										 <?php 
										 if($countcccontent >=1){
										 	?>
										 	 
										 	 
	<span class="text-light" > <div class="container" style="background-color: #36b9cc; font-size: 13px"><span style="font-weight: bold"> Note </span> :  If any of the list items are left blank, they will be used as inputs; otherwise, they will be ignored It will be used as information  </div> </span>


										 	<?php
										 }

										  ?>


										<ul class="list-group">
										 <?php 
										 			$mlist= " SELECT * FROM `tablecolumn_content` where typ =1 and formid='$formid'  ";
										 	        $resultmlist = mysqli_query($con,$mlist); // run query
										 	          $countmlist= mysqli_num_rows($resultmlist); // to count if necessary
										 	               if($countmlist >= 1){


										 	                 while($rowlist = mysqli_fetch_array($resultmlist)){
										 					?>
			 <li class="list-group-item" >

			 	<input type="text" name="" class="inpcont" data-listid="<?php echo $rowlist['tcontent_id'] ?>"   style="font-size: 13px;border: none;outline: none;width: 90%;background-color:#f2f6f8;padding: 5px" value="<?php echo $rowlist['content'] ?>">
			 	<button class="btn btn-light text-secondary deleteclist" data-listid="<?php echo $rowlist['tcontent_id'] ?>" style="font-size: 13px;float: right;"><i class="fas fa-times-circle"></i></button>
			 </li>
										 					<?php
										 	                 }

										 	                 ?>
										 	               <span class="text-light" style="font-size: 13px;padding: 5px;background-color: #36b9cc;"> <span style="font-weight: bold"> Note </span> : If any of the list items are left blank, they will be used as inputs; otherwise, they will be ignored. It will be used as information. </span>
										 	                 <?php

										 	                  } else {

										 	                  }
										 	         

										  ?>
										

										</ul>


										
										 
										<script type="text/javascript" src="js/table.js"></script>

										<script type="text/javascript">
											$(document).ready(function() {

												$('.inpcont').keyup(function(){ 
													var listid = $(this).data('listid');
													var val = $(this).val();
													 $.ajax({
													           url : "table.php",
													            method: "POST",
													             data  : {savelistupt:1,id:listid,val:val},
													             success : function(data){
																
													             }
													          })
												
												})
												$('.deleteclist').click(function() { 
													var listid = $(this).data('listid');
													 $.ajax({
													           url : "table.php",
													            method: "POST",
													             data  : {deleteclist:1,id:listid},
													             success : function(data){
																contents();
													             }
													          })
												
												})
												$('#deletelist').click(function() { 
													var fid = $(this).data('formidd');

													
													
													   $.ajax({
													           url : "table.php",
													            method: "POST",
													             data  : {deletelist:1,fid:fid},
													             success : function(data){
																contents();
													             }
													          })
												})

												$('#additemlist').click(function() { 
													var fid = $(this).data('formidd');

													 $.ajax({
													           url : "table.php",
													            method: "POST",
													             data  : {additemlist:1,fid:fid},
													             success : function(data){
																contents();
													             }
													          })

												
												})
												
											});
											      
										      	
										</script>

							
							  </div>
							   <div class="card-footer">
							   	  <button class="btndeltitle"  style="float: right;border:none;outline: none;" data-fid="<?php echo $row['form_id'] ?>" ><i style="color:grey" class="far fa-trash-alt"></i></button>


						
							   </div> 
							   
							  
							</div>
							<p></p>

							<style type="text/css">
								.questval {
								 width: 100%; border:none;outline: none;padding: 9px; 
								 font-size: 19px;

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

							<script type="text/javascript">
								
								$(document).ready(function() {
								      	$('.questval').keyup(function(){ 
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

								      	$('.addtable').click(function() { 
								      		var id = $(this).data('formidd');
								      			
								      			  $.ajax({
								      			           url : "action.php",
								      			            method: "POST",
								      			             data  : {createtable:1, formid:id},
								      			             success : function(data){
								      							contents();
								      			             }
								      			          })
								      			         
								      			
								      	
								      	})

								      	$('.addmlist').click(function() { 
								      		var id = $(this).data('formidd');

								      		  $.ajax({
								      			           url : "action.php",
								      			            method: "POST",
								      			             data  : {createmlist:1, formid:id},
								      			             success : function(data){
								      							contents();

								      			             }
								      			          })

								      	})

					function contents(){
		
		 $.ajax({
			           url : "action.php",
			            method: "POST",
			             data  : {content:1},
			             success : function(data){
							$('#content').html(data);
							checktitle();
							
			             }
			          })
	}
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


								 