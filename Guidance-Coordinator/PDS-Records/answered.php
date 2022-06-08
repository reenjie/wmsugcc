<?php 

	

	?>

	 		
	 		 
	 	 	 <div class="col-sm-6" style="position: relative;" >
	 	 	 		
	 	 	 	
	 	 	 		<?php
	 	 	 		if($type =='Question') {
			             
	 	 	 				include '../../GCC/create_form/connect.php';
						
					
		                 	
		                 		$sqls = " select * from choices where form_id = '$formid' ";
			               		 $results = mysqli_query($con,$sqls); // run query
			               		 while($rows = mysqli_fetch_array($results)){
			               		 	$type= $rows['type'];
			               		 		$choiceid = $rows['choice_id'];
			               		 	include 'Optionforsectionanswered.php';

			               		 		//echo $choice_id;

			               		 		

			               		 	
			     
			               		 }


			               		}


							 
		                 
								 		 ?>

						
							
							 


			               		

	 	 	<!--<span style="font-style: italic"><span class="text-danger">*</span><?php echo  $rescontent; ?></span> -->
	 	 	 	
	 	 	
	 	 	 
	 	 
	 	 	


	 
	 	 
	 </div> 
	 

	<?php

		if($type == 'list'){

			?>

			<div class="col-sm-12">

				<h6 style="font-weight:bold;"><?php echo $row['content'] ?></h6>
					<table class="table  table-sm " id="tblcontent<?php echo $formid?>" style="">
							  
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
										   	 //
										   	?>

										   	<tr id="tableheader" style="text-align: center;border-bottom: transparent; ">
										   	
										   		
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


										   	 <tr style="text-align: center;">
										   	 	
										     	<?php 
										   					$selectcontents = " SELECT * FROM `tablecolumn_content` where tc_id = '$tcId' and formid='$formid'  ";
										   			                $resultcc = mysqli_query($con,$selectcontents); // run query
										   			               
										   			                 while($cntnt = mysqli_fetch_array($resultcc)){
										   			                 	$ct = $cntnt['content'];
										   			                 	$fd[] = $cntnt['formid'];
										   			                 	$tbleid[] = $cntnt['tble_id'];
										   			                 	$tcidd[] = $cntnt['tc_id'];	

										   			                 	$fds = $cntnt['formid'];
										   			                 	$tbleids= $cntnt['tble_id'];
										   			                 	$tcidds= $cntnt['tc_id'];	
										   			                 	$_SESSION['fd'] =  $fd;
										   			                 	$_SESSION['tbleid']= $tbleid;
										   			                 	$_SESSION['tcidd']= $tcidd;
										   			                 	

										   			                 	if($ct == 'Supporting Contents'){

										   			                 		$checkpds = "SELECT * FROM `form_response` where formid ='$fds' and tble_id ='$tbleids' and tc_id = '$tcidds' and userid='$studentid'  ";
										   			                 		$chpds = mysqli_query($con,$checkpds); 
										   			                 		 $countpdsa= mysqli_num_rows($chpds);
										   			                 		 if ($countpdsa>=1){
										   			                 		  while($pdsrespo = mysqli_fetch_array($chpds)){
										   			                 			 ?>
													   							<td>

							
															
																<span style="font-size: 14px"><?php echo $pdsrespo['response'] ?></span>
													   							</td>


													   						

													   							<?php
										   			                 		  }
										   			                 	 }else {
										   			                 	 	 ?>
													   							<td>

							
																<input type="text"  class="tconts"  value="" style="width: 100%;font-size:14px">
													   							</td>

													   						


													   							<?php
										   			                 	 }



										   			                 		/*
										   			            ?>
										   							<td>

				
													<input type="text" name="groot" class="tcont"  value="<?php echo $cntnt['formid'] ?>" style="width: 100%;font-size:14px">
										   							</td>


										   							

										   							<?php

										   							*/


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

			<div class="col-sm-12">
				
										<ul class="list-group mt-2" id="listitem<?php echo $formid  ?>" style="width: 100%;margin-top: -24px" >
										 <?php 
										 			$mlist= " SELECT * FROM `tablecolumn_content` where typ =1 and formid='$formid'  ";
										 	        $resultmlist = mysqli_query($con,$mlist); // run query
										 			 $countmlista= mysqli_num_rows($resultmlist); // to count if necessary
										 	             if($countmlista >=1 ){


										 	                 while($rowlist = mysqli_fetch_array($resultmlist)){
										 	                 	$cct = $rowlist['content'];
										 	                 	$fdlist[] = $rowlist['formid'];
										 	                 	$tccontent = $rowlist['tcontent_id'];
										 	                 	$_SESSION['tcontentid'] = $tccontent;
										 	                 	$_SESSION['fidlist'] = $fdlist;

										 	                 	$fdlists = $rowlist['formid'];
										 	                 	$tccontents = $rowlist['tcontent_id'];
										   			            //
										 					?>
										 					
			 <li   class="list-group-item" style="padding: 4px;border:none;border-bottom: 1px solid grey" >

			 		
			 		<?php 

			 		if($cct == 'Untitle list'){

			$checkpds = "SELECT * FROM `form_response` where formid ='$fdlists' and tcontent_id='$tccontents' and userid='$studentid' ";
										   			                 		$chpds = mysqli_query($con,$checkpds); 
										   			                 		 $countpdsa= mysqli_num_rows($chpds);
										   			                 		 if ($countpdsa>=1){

										   			                 		 	
										   			                 		  while($pdsrespo = mysqli_fetch_array($chpds)){ 
										   			                 		  	?>
		
									<span style="font-size: 14px;padding: 5px"><?php echo $pdsrespo['response'] ?></span>
										   			                 		  	<?php

										   			                 		  }

										   			                 		}else {
										   			                 			?>
			<input type="text" name=""  style="width: 100%;font-size: 13px" placeholder="Fill this fields">
			

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

			               			

			     }




 ?>