<p></p>


								 <div class="card ">

								 	<i style=" color: grey;text-align: center;cursor: pointer;padding-top:10px; "   data-formid="<?php echo $row['form_id'] ?>" class="far fa-edit qcard" data-types="list"></i>


								 	 <div class="card-body py-5">

								 	 <div class="container">



								 	 	
								 	 		<h6 style="font-weight: bold;text-align: center;"><?php echo $row['content'] ?></h6> 

								 	 		

								 	 		 <div class="table-responsive mt-4" id="responsive">
							  		 
							  		<table class="table  table-sm table-bordered">
							  
										<?php 

													$tc = " SELECT * FROM `tablecolumn_number` where formid='$formid' ";
											                $resulttc = mysqli_query($con,$tc); // run query
											              
											                 while($rowtc = mysqli_fetch_array($resulttc)){
											                 	$tctype= $rowtc['type'];
											                 	$tcId= $rowtc['tc_id'];
											                 	$bg = $rowtc['bg'];

											                 	if ($tctype == 'content') {
											                 		$tccontent = $tcId;
											                 	echo '<input type="hidden" name="" id="contentid" value="'.$tccontent.'">';
											                 	}

											                 

											                 	



																?>
										
										 	
										   <?php 
										   

										   if ($tctype == 'header'){
										   
										   	?>

										   	<tr id="tableheaders" class="<?php echo $bg ?>">
										   	
										   		
										   			<?php 
										   					$selectheaders = " SELECT * FROM `tablechoices` where tc_id = '$tcId'  ";
										   			                $resulthd = mysqli_query($con,$selectheaders); // run query
										   			               
										   			                 while($header = mysqli_fetch_array($resulthd)){
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
										   					$selectcontents = " SELECT * FROM `tablecolumn_content` where tc_id = '$tcId' and formid='$formid' ";
										   			                $resultcc = mysqli_query($con,$selectcontents); // run query
										   			               
										   			                 while($cntnt = mysqli_fetch_array($resultcc)){
										   			                 	
										   							?>
										   							<td>

				
													<span style="font-size: 14px"><?php echo $cntnt['content'] ?></span>
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



										<ul class="list-group">
										 <?php 
										 			$mlist= " SELECT * FROM `tablecolumn_content` where typ =1 and formid='$formid'  ";
										 	        $resultmlist = mysqli_query($con,$mlist); // run query
										 	                             
										 	                 while($rowlist = mysqli_fetch_array($resultmlist)){
										 					?>
			 <li class="list-group-item" >

			 	
			 	<h6 style="font-size: 14px"><?php echo $rowlist['content'] ?></h6>
			 
			 </li>

										 					<?php

										 					  
										 	                 }

										 	         
										 	         

										  ?>


									
										</ul>


										<?php 

								 	 		   if($ismodifiable == 1){
										   			   ?>

										   			   <button  style="font-size:13px" class="btn btn-light text-secondary mt-2" >
										   			   	<i class="fas fa-plus-circle"></i>	Add Columns
										   			   </button>
										   			   <?php
										   			 }    

								 	 		 ?>
	
								 	 	
								 	 		
								 	 </div> 
								 	 


								 	 </div> 
								 </div> 
								 <p></p>


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
								 
