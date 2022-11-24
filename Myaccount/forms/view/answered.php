		<style type="text/css">
								
								input {
								border:none;outline:none;

								background: 
						    linear-gradient(#a8bbc5, #a8bbc5) bottom / 0% 1px no-repeat
						    #ccc;
						  transition: .5s;

						  background-color: #f0f6f7;
						  padding: 5px;

							}

							input:hover {
								background-color:#f0f3f4;
							}
							input:focus {
									
							
								
								background-color: #ffffff;
								background-size: 100% 2px;
								

							} 

							</style>
<?php 

if($dd == 'file'){
	?>
							<?php
							include '../../../GCC/create_form/connect.php';
						
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
								 	<?php 
								 /*	if($secno >=1){
								 		?>
								 		<span class="badge  bg-secondary text-light" style="width: auto;position: absolute;left: 5px;top: 5px"><?php echo $secno ?></span>
								 		<?php
								 	}

								 	*/

								 	 ?>

								 	

								 	 <div class="card-body ">

								 	

								 	 <div class="container">

								 	 	<style type="text/css">
								 	 		.attchlink:hover {
								 	 			text-decoration: underline;
								 	 		}
								 	 	</style>

								 	 	
								 <h6  style="font-weight: bold;font-size: 15px"><?php echo $row['content'] ?></h6> 	
								 	 			 <div class="container mt-1">

					<br>
				

							
					<input type="file" name="<?php echo $formid ?>"   onchange="javascript:updateList<?php echo $formid  ?>()" id="file<?php echo $formid ?>" class="d-none" accept="image/*,.doc,.docs,.pdf,.ppt">

					

								 	 			 	 <div class="card">
								 	 			 	 	 <div class="d-none" id="btncancel<?php echo $formid ?>" style="float: right; padding: 5px">
								 	 			 	 	 
								 	 			 	 	 <button type="button" id="cancelattch<?php echo $formid ?>" class="btn-close" aria-label="Close" style="float: right;"></button>
								 	 			 	 	 </div> 
								 	 			 	 	 <div class="card-body" id="fileList<?php echo $formid ?>">
								 	 			 	 	 	<h6 style="font-weight: bolder;font-size: 14px" class="text-secondary">Attached File</h6>
								 	 			 	 	
								 	 			 	 	 <div class="card" style="border-left:4px solid #5a7c7d">
								 	 			 	 	 	 <div class="card-body">
								 	 			 	 <h6 style="font-weight: bold"><i class="fas fa-paperclip text-primary"></i> <?php echo $rescontent ?></h6>
								 	

								
								 	 			 	 	 	 </div> 
								 	 			 	 	 	 
								 	 			 	 	 </div> 

								 	 			 	 	  <div class="container mt-4">
								 	 			 	 	  	 	<a href="../../../attachments/<?php echo $rescontent ?>" target="_blank" download style="float: right; border: none;outline: none;background-color: transparent;" class="text-secondary"> <i class="fas fa-download"></i></a>

								 	 <a href="../../../attachments/<?php echo $rescontent ?>" target="_blank"  style="float: right; border: none;outline: none;background-color: transparent; margin-right: 10px;" class="text-secondary"> <i class="fas fa-external-link-alt"></i></a>	
								 	 			 	 	  </div> 
								 	 			 	 	  
								 	 			 	 	 
								 	 			 	 	 </div> 
								 	  <div class="progress d-none" style="height: 2px" id="progress<?php echo $formid ?>" >
										  <div class="progress-bar" role="progressbar" id="progressivebar<?php echo $formid ?>" style="width: 15%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
								 	 			 	 </div> 
								 	 			 	 
								 	 			 		
								 	 			 </div> 
								 	 			 
								 	 			
								 	 		<span style=""><p><br></p></span>
								 	 		
								 	 </div> 
								 	
								 	 

								 	 </div> 
								 </div> 
								 <p></p>

						
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
						
						    	                  
					
						

							 <div class="card-header py-5 " style="background: url('<?php echo $bgsrc ?>');background-size:cover;background-repeat:no-repeat;background-position-y:<?php echo $posbg ?>;background-color:<?php echo $bgtcolor ?>;color: <?php echo $txttcolor ?>;text-align: center;height: 180px;" >

							
							

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
						include '../../../GCC/create_form/connect.php';
						
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

							
							  <div class="card-body">
							  
							 <div class="container">
							 	<div class="row">
								 		<div class="col-sm-9">
								 			<?php 
								 			if ($isreq == 'yes') {
								 				?>
								 				<h5 style="width: 100%; border:none;outline: none;padding: 9px; color: <?php echo $textcolorquestion ?>;font-weight: bold;font-size: 16px" > <?php echo $row['content']; ?>  <!--<span style="color:#b81a21;"> *</span>--></h5>
								 				<?php
								 			}else if ($isreq == 'no') { 
								 				?>
								 				<h5 style="width: 100%; border:none;outline: none;padding: 9px; color: <?php echo $textcolorquestion ?>;font-weight: bold" > <?php echo $row['content']; ?></h5>
								 				<?php
								 			}
								 			 ?>
								 		</div>
								 		
								 		<div class="col-sm-3">
								 			<?php 
								 		/*	if ($isreq == 'yes') {
								 				?>
								 				 <h6 style="font-size: 11px;color: red;float: right;">This Field is Required.</h6>
								 				<?php
								 			}else if ($isreq == 'no') { 
								 				?>
								 				 <h6 style="font-size: 11px;float: right;">This Field is Optional.</h6>
								 				<?php
								 			}
								 			*/
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
			               		 		include 'Optionforsectionanswered.php';
			     
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





	}else if ($dd == 'section'){



								?>
							
	
				
					 <div class="card " id="section<?php echo $row['form_id'] ?>" style="border-top: 5px solid <?php echo $questionbg ?>; padding: 20px">
					 	 
					 	
					 	 <div class="card-body">
					 	 	<h4 style="font-weight: bolder"><?php echo $row['content']; ?></h4>
					 	 	<?php 
					 	 		if($othersdata == 'Other supporting contents'){
					 	 			
					 	 		}else {
					 	 			
					 	 			echo '<h6>'.$othersdata.'</h6>';


					 	 		}

					 	 	 ?>

					 	 </div> 

					 
					 	 
					 </div> 
					 <p></p>
								<?php
							}



							else if ($dd == 'list'){


							?>

							<p></p>


								 <div class="card ">

								 

								 	 <div class="card-body py-5">

								 	 <div class="container">



								 	 	
								 	 		<h6 style="font-weight: bold;text-align: center;"><?php echo $row['content'] ?></h6> 

								 	 		

								 	 		 <div class="table-responsive mt-4" id="responsive">
							  		 
							  		<table class="table  table-sm table-bordered" id="tblcontent<?php echo $formid?>">
							  
										<?php 

													$tc = " SELECT * FROM `tablecolumn_number` where formid='$formid' ";
											                $resulttc = mysqli_query($con,$tc); // run query
													$counttbl= mysqli_num_rows($resulttc);


													if($counttbl >=1){


											                               
											              
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
										   	
										   		
										   			<?php 
										   					$selectheaders = " SELECT * FROM `tablechoices` where tc_id = '$tcId'  ";
										   			                $resulthd = mysqli_query($con,$selectheaders); // run query
										   			                	$bull = false;
										   			                 while($header = mysqli_fetch_array($resulthd)){
										   			                 		$hcntntnt[] = $header['content'];
										   							?>
										   							<th>
			
												<h6 style="font-weight: bold;"><?php echo $header['content'] ?></h6>
				

										   							</th>
										   							<?php
										   			                 }
										   			          


										   			 ?>
				
				

										   		
										   	</tr>

										   	<?php
										   		
										   }else if ($tctype == 'content'){

										   		
										   	?>


										   	 <tr>
										   	 	
										     	<?php 
										   					$selectcontents = " SELECT * FROM `tablecolumn_content` where tc_id = '$tcId'  ";
										   			                $resultcc = mysqli_query($con,$selectcontents); // run query
										   			               
										   			                 while($cntnt = mysqli_fetch_array($resultcc)){
										   			                 	$ct = $cntnt['content'];
										   			                 	$ct = $cntnt['content'];
										   			                 	 	$fds = $cntnt['formid'];
										   			                 	$tbleids= $cntnt['tble_id'];
										   			                 	$tcidds= $cntnt['tc_id'];	
										   			                 		 $usertoken=$_SESSION['user_student_token_check'];

										   			                 	if($ct == 'Supporting Contents'){
										   			          
										   			                 		$checkpds = "SELECT * FROM `form_response` where formid ='$fds' and tble_id ='$tbleids' and tc_id = '$tcidds' and userid='$usertoken' ";
										   			                 		$chpds = mysqli_query($con,$checkpds); 
										   			                 		 $countpdsa= mysqli_num_rows($chpds);
										   			                 		 if ($countpdsa>=1){
										   			                 		  while($pdsrespo = mysqli_fetch_array($chpds)){
										   			                 			 ?>
													   							<td>

							
															

																<span style="font-size: 14px"><?php echo $pdsrespo['response'] ?></span>
													   							</td>

													   							<script type="text/javascript">
													   								
													   								$(document).ready(function() {
													   								      $('.tcont').keyup(function(){ 
													   								        var val=$(this).val();
													   								        var tid = $(this).data('tid');
													   								     $('#applychanges').removeClass('d-none');

													   								         $.ajax({
											               		 		      		           url : "saving.php",
											               		 		      		            method: "POST",
											               		 		      		             data  : {upttable:1,val:val,tid:tid},
											               		 		      		             success : function(data){
											               		 		      					
											               		 		      					
											               		 		      		             	var clear = setInterval(function(){
											               		 		      		             		$('#applychanges').addClass('d-none');

											               		 		      		             		clearInterval(clear);
											               		 		      		             	},1000);

											               		 		      		             }
											               		 		      		          })
											               		 		      		          

													   								      })
													   								      });      
													   							      	
													   							</script>


													   						

													   							<?php
										   			                 		  }
										   			                 	 }else {
										   			                 	 	 ?>
													   							<td>

							
																<input type="text"  class="tconts"  value="" style="width: 100%;font-size:14px">
													   							</td>

													   						


													   							<?php
										   			                 	 }

										   			                 	}else{
										   			            	?>
										   							<td>

				
													<span style="font-size: 14px"><?php echo $cntnt['content'] ?></span>
										   							</td>

										   							<?php
										   			                 		
										   			                 	}
										   						
										   			                 }
										   			     
										   			   


										   			 ?>
										   		

										   		
										    </tr>
										    
										     

										   	<?php

										   	$bull = true;
										   }
										    ?>
										
										
										    
										   
										
																<?php

											                 }


											                 }
											          

										 ?>
										    
										</table>

										</div> 

											<?php 
												if($counttbl >=1){ 

													if($ismodifiable == 1){
								 	 	   				$counth =  count($hcntntnt);
								 	 		   			?>
								 	 		   			
								 	 		   			 
								 	 		   			<button  style="font-size:13px;" class="btn btn-light text-secondary mt-2 addtblcol" data-counth="<?php echo $counth ?>" >
										   			   	<i class="fas fa-plus-circle"></i>	Add Table Column
										   			   </button>
								 	 		   			
								 	 		   			  
										   			 

										   			  
										   			   <?php
								 	 		   
										   			   
										   			 }    


												}

											 ?>


										<ul class="list-group" id="listitem<?php echo $formid  ?>">
										 <?php 
										 			$mlist= " SELECT * FROM `tablecolumn_content` where typ =1 and formid='$formid'  ";
										 	        $resultmlist = mysqli_query($con,$mlist); // run query
										 			 $countmlista= mysqli_num_rows($resultmlist); // to count if necessary
										 	             if($countmlista >=1 ){


										 	                 while($rowlist = mysqli_fetch_array($resultmlist)){
										 	                 	$cct = $rowlist['content'];
										 	                 		$fdlists = $rowlist['formid'];
										 	                 	$tccontents = $rowlist['tcontent_id'];
										   			             $usertoken=$_SESSION['user_student_token_check'];
										 					?>
			 <li class="list-group-item"  >

			 		
			 		<?php 

			 		if($cct == 'Untitle list'){
			 			$checkpds = "SELECT * FROM `form_response` where formid ='$fdlists' and tcontent_id='$tccontents' and userid='$usertoken' ";
										   			                 		$chpds = mysqli_query($con,$checkpds); 
										   			                 		 $countpdsa= mysqli_num_rows($chpds);
										   			                 		 if ($countpdsa>=1){

										   			                 		 	
										   			                 		  while($pdsrespo = mysqli_fetch_array($chpds)){ 
										   			                 		  	?>
		

		<h6 style="font-size: 14px"><?php echo $pdsrespo['response'] ?></h6>
										   			                 		  	<?php

										   			                 		  }

										   			                 		}else {
										   			                 			?>
			<input type="text" name=""  style="width: 100%;font-size: 13px" placeholder="Fill this fields" value="">
			

										   			                 			<?php


										   			                 		}
			 		}else {
			 			?>
			 				<h6 style="font-size: 14px"><?php echo $rowlist['content'] ?></h6>
			 			<?php
			 		}

			 		 ?>
			 
			 
			 </li>

										 					<?php



								 	 		  
								 	 	

										 					  
										 	                 }


 												}
										 	         
										 	         

										  ?>


									
										</ul>




											
								 	 	
								 	 		
								 	 </div> 

								 	 <?php 
								 	 if ($countmlista>=1 ){

											if($ismodifiable == 1){
								 	 	   			
								 	 		   			?>
								 	 		   			
								 	 		   			  <div class="container">
								 	 		   			   <button  style="font-size:13px;" class="btn btn-light text-secondary mt-2 addcol" >
										   			   	<i class="fas fa-plus-circle"></i>	Add Columns
										   			   </button>
								 	 		   			  </div> 
								 	 		   			  
										   			 

										   			  
										   			   <?php
								 	 		   
										   			   
										   			 }    
								 	 }

								 	  ?>

								 	 

								 	 <script type="text/javascript">
								 	 	
								 	 	$(document).ready(function() {
								 	 	      	$('.addcol').click(function() { 
								 	 	      	$('#listitem<?php echo $formid  ?>').append(" <li class='list-group-item'><input type='text'  style='width: 100%;font-size: 13px' placeholder='Fill this fields'></li>");
								 	 	      	})

								 	 	      	$('.addtblcol').click(function() { 
								 	 	      		var ch = $(this).data('counth');
								 	 	      		var cv = Math.floor(Math.random()*(400-20+1)+20);

								 	 	      		  $('#tblcontent<?php echo $formid?>').append("<tr id='"+cv+"'><td><input type='text'  style='width: 100%;font-size:14px'></td></tr>");
								 	 	      				
								 	 	    	for (var i = 2 ; i <= ch; i++) {
								 	 	    		 
								 	 	  				$('#'+cv).append("<td><input type='text'  style='width: 100%;font-size:14px'></td>");
								 	 	      		}

											

								 	 	      	
								 	 	      	})
								 	 	      });      
								 	       	
								 	 </script>
								 	 </div> 
								 </div> 
								 <p></p>

							<?php


							}

		                 
		             



 ?>