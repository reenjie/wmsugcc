<style type="text/css">
		
		.txtboxtransition {
								border:none;outline:none; 

								background: 
						    linear-gradient(#a8bbc5, #a8bbc5) bottom / 0% 2px no-repeat
						    #ccc;
						  transition: .5s;

						  background-color:#edf4ee;
						  padding: 6px;
						  border-radius: 5px;

							}

							.txtboxtransition:hover {
								background-color:#dff3e3;
							}
							.txtboxtransition:focus {
									
							
								
								background-color: #ffffff;
								background-size: 100% 2px;
								

							} 

</style>
<?php 
	
	 if($type == 'shorttext') {

		if ($isreq == 'yes') {
								 									 			
			?>
			
		
		<input type="text" class="txtboxtransition txtsavetotemp txtuptcontent" disabled="" name="<?php echo $rows['form_id'] ?>" data-tid = "<?php echo $tid ?>" data-idform ="<?php echo $rows['form_id'] ?>" value="<?php echo $rescontent ?>" style="width: 60%; margin-left: 20px; background-color: transparent;"  placeholder="" required=""> 
		
		 
		
		<?php
		}else if ($isreq == 'no') { 
		?>
		
		<input type="text" class="txtboxtransition txtsavetotemp txtuptcontent" disabled="" value="<?php echo $rescontent ?>"  data-tid = "<?php echo $tid ?>" name="<?php echo $rows['form_id'] ?>" data-idform ="<?php echo $rows['form_id'] ?>" style="width: 60%; margin-left: 20px; background-color: transparent;" placeholder="" > 
		
	
		
		<?php	
								 			}
			
			               		 	

			               		 	?>
			               		 	<script type="text/javascript">
			               		 		
			               		 		$(document).ready(function() {
			               		 		     
			               		 		      	$('.txtuptcontent').keyup(function(){ 
			               		 		      		var val = $(this).val();
			               		 		      		var tid = $(this).data('tid');
			               		 		      		 
			               		 		      	
			               		 		      		    
			               		 		      	
			               		 		      	})
			               		 		      });      
			               		 	      	
			               		 	</script>

			               		 	<?php


			               		 	}else if ($type== 'longtext') {
	?>
			<input type="text" class="txtboxtransition txtsavetotemp txtuptcontent" disabled="" value="<?php echo $rescontent ?>"  data-tid = "<?php echo $tid ?>" name="<?php echo $rows['form_id'] ?>" data-idform ="<?php echo $rows['form_id'] ?>" style="width: 100%; margin-left: 20px; background-color: transparent;" placeholder="" > 
		
		 	
	
		<?php

									

									?>

			               		 	<script type="text/javascript">
			               		 		
			               		 		$(document).ready(function() {
			               		 		     
			               		 		     
			               		 		      });      
			               		 	      	
			               		 	</script>

			               		 	<?php


			               		 	}else if ($type == 'mpchoice') {
			   	
		?>
		 <div class="row">
								 		
								 		<?php 
								 				$selectaddchoice = " select * from addchoice where choice_id = '$choiceid' ";
								 		                $resultchoice = mysqli_query($con,$selectaddchoice); // run query
								 		             
								 		          
								 		                 while($res = mysqli_fetch_array($resultchoice)){
								 		                 	$contentsofmpchoice[] = $res['content'];
								 		                 
								 		                 	 if ($isreq == 'yes') {
		 							 	for($i = 0 ; $i <1;$i++){
								 		?>
								 		 <div class="col-md-6">
								 		 	<h6 style="margin-left: 40px" id="bg<?php echo $res['chid'] ?>" class="mt-2"><label><input type="radio" disabled="" class="changeradio" data-tid = "<?php echo $tid ?>"  data-value="<?php echo $res['content'] ?>"  id="radiocheck<?php echo $res['chid'] ?>" name="<?php echo $rows['form_id'] ?>"  value="<?php echo $res['content'] ?>" > <?php echo $res['content'] ?></label></h6>
								 		 </div> 
								 		 
								 		<?php
								 	}

			if ($rescontent == $res['content']){

			//	echo $res['content'].$res['chid'];
			
				?>
				<script type="text/javascript">
					
					$(document).ready(function() {
					      	$('#radiocheck<?php echo $res['chid'] ?>').prop("checked",true);

					      	  $('#bg<?php echo $res['chid'] ?>').append('<span class="text-success" style="font-size:22px;font-weight:bolder"> «</span>');
					      });      
				      	
				</script>
				<?php

			}

			?>
			<script type="text/javascript">
				
				$(document).ready(function() {
				      	$('.changeradio').click(function() {
				      		var newval = $(this).data('value');
				      		var tid = $(this).data('tid');
				      		
				      			  
				      			
				      			
				      			    
				      	
				      	})
				      });      
			      	
			</script>
			<?php

			


				
								 	
													 }else if ($isreq == 'no') { 
	

								 	for($i = 0 ; $i <1;$i++){
								 		?>
								 		 <div class="col-md-6">
								 		 	<h6 id="bg<?php echo $res['chid'] ?>" style="margin-left: 40px" class="mt-2"><label><input type="radio"  disabled="" class="changeradio" data-tid = "<?php echo $tid ?>"  data-value="<?php echo $res['content'] ?>"  id="radiocheck<?php echo $res['chid'] ?>" name="<?php echo $rows['form_id'] ?>"  value="<?php echo $res['content'] ?>" > <?php echo $res['content'] ?></label></h6>
								 		 </div> 
								 		 
								 		<?php
								 	}

								 	if ($rescontent == $res['content']){

			//	echo $res['content'].$res['chid'];

			
				?>
				<script type="text/javascript">
					
					$(document).ready(function() {
					      	$('#radiocheck<?php echo $res['chid'] ?>').prop("checked",true);
					     // 	$('#radiocheck<?php echo $res['chid'] ?>').attr('style','padding:20px');

					     $('#bg<?php echo $res['chid'] ?>').append('<span class="text-success" style="font-size:22px;font-weight:bolder"> «</span>');
					      });      
				      	
				</script>
				<?php

			}

				?>
			<script type="text/javascript">
				
				$(document).ready(function() {
				      	$('.changeradio').click(function() {
				      		var newval = $(this).data('value');
				      		var tid = $(this).data('tid');
				      		
				      			 
				      			
				      		
				      	
				      	})
				      });      
			      	
			</script>
			<?php



													 }
								 

								 		                 }

								 		                  if($isspecified == 1){
								 		       	?>
								 		       
								 		  	<h6 style="margin-left: 40px" id="bsg<?php echo $rows['form_id'] ?>"><label><input type="radio" disabled="" class="changeradioss<?php echo $rows['form_id'] ?>" data-tid = "<?php echo $tid ?>" name="<?php echo $rows['form_id'] ?>" data-value="10" id="check<?php echo $rows['form_id'] ?>"  > 
													<?php
													

														 if (in_array($rescontent, $contentsofmpchoice))
															  {
															  	?>
															  	<script type="text/javascript">
															  		
															  		$(document).ready(function() {
															  		      	
															  		      		$('#val<?php echo $rows['form_id'] ?>').val('');
															  			
															  		      });      
															  	      	
															  	</script>
															  	<?php
															  
															  }else {
															  		?>
															  	<script type="text/javascript">
															  		
															  		$(document).ready(function() {
															  			$('.changeradioss<?php echo $rows['form_id'] ?>').prop('checked',true);
															  		$('#bsg<?php echo $rows['form_id'] ?>').append('<span class="text-success" style="font-size:22px;font-weight:bolder"> «</span>');
															  $('#check<?php echo $rows['form_id'] ?>').data('value',<?php echo $rescontent?>);
															  $('#check<?php echo $rows['form_id'] ?>').prop("checked",true);
															  		      		$('#val<?php echo $rows['form_id'] ?>').val(<?php echo $rescontent?>);
															  		
															  		      });      
															  	      	
															  	</script>
															  	<?php
															  
															  }

													?>
													<input type="text" name="" disabled="" data-tid = "<?php echo $tid ?>" class="opt" id="val<?php echo $rows['form_id'] ?>"  placeholder="Others (Please Specify)" value="<?php echo $rescontent ?>">
												</label></h6>

												<script type="text/javascript">
													
													$(document).ready(function() {
													     	$('#val<?php echo $rows['form_id'] ?>').keyup(function(){ 
													     		var val = $(this).val();
													     		var tid = $(this).data('tid');
													     	
													     	})
													     });     
												      	
												</script>

								 		       	<?php
								 		       	}else {
								 		       		?>

								 		       		<?php
								 		       	} 

								 		          
								 		 ?>
								 		
								</div>
		<?php

			               		 	}else if($type =='checkbox') {
			             
			               		 				?>
		 <div class="container">
		 	 <div class="row">
		 	 
		 	<input type="checkbox" id="checkkk" class="d-none" checked="">
								 		
								 		<?php 
								 				$selectaddchoice = " select * from addchoice where choice_id = '$choiceid' ";
								 		                $resultchoice = mysqli_query($con,$selectaddchoice); // run query
								 		             
								 		          
								 		                 while($res = mysqli_fetch_array($resultchoice)){
								 		                 	$chhid = $res['chid'];
								 		                 	$ccc = $res['content'];
								 		              		$contentsofchecks[] = $res['content'];
								 		    
								 	?>
			

			



				
								 	<?php
								 //	echo 'optionforsectionanswered';
								 		for($i = 0 ; $i < 1; $i++){

								 			?>

								 		 <div class="col-md-6">
								 		 
								 		<h6 style="margin-left: 40px" id="bgch<?php echo $res['chid'] ?>" class="mt-2"><label><input type="checkbox" disabled=""  class="chkvalue<?php echo $rows['form_id'] ?> " data-tid = "<?php echo $tid ?>"  id="checkbox<?php echo $res['chid'] ?>"   name="check<?php echo $rows['form_id'] ?>" value="<?php echo $res['content'] ?>" > <?php echo $res['content'] ?></label></h6>
								 			<div class="ttttt"></div>
								 		 	
								 		 </div> 
								 		 
								 		<?php
								 		}

								
							$chcks = preg_split ("/\,/", $rescontent);
							
							
			

			
				for($i = 0 ; $i< count($chcks);$i++){
						
						
								if ($chcks[$i] == $ccc){
									

									?>
				<script type="text/javascript">
					
					$(document).ready(function() {
					      	$('#checkbox<?php echo $res['chid'] ?>').prop("checked",true);

					      	 $('#bgch<?php echo $res['chid'] ?>').append('<span class="text-success" style="font-size:22px;font-weight:bolder"> «</span>');	

					      	$('.uncheckall<?php echo $rows['form_id'] ?>').keyup(function(){ 
					      			$('#checkbox<?php echo $res['chid'] ?>').prop("checked",false);
					      			$('#btn<?php echo $rows['form_id'] ?>').removeClass('d-none');
					      			$('.chkvalue<?php echo $rows['form_id'] ?>').attr('disabled',true);
					      			$('.chkvalue<?php echo $rows['form_id'] ?>').prop('checked',false);

					      	
					      	})
					      });      
				      	
				</script>
				<?php
								}


							}		
							?>

							<script type="text/javascript">
								 			$(document).ready(function() {
								 				
								 			     
								 			   /*  

								 			    

								 			    */
								 			      $('#btn<?php echo $rows['form_id'] ?>').click(function() { 
								 			      	 $('.uncheckall<?php echo $rows['form_id'] ?>').val('');
								 			      	//$('#uncheck<?php echo $chhid ?>').attr('name','<?php echo $rows['form_id'] ?>[]');
								 			      	$(this).removeAttr('name');
								 			      	
								 			      
								 			      	$('#btn<?php echo $rows['form_id'] ?>').addClass('d-none');
								 			      	$('.chkvalue<?php echo $rows['form_id'] ?>').removeAttr('disabled');
								 			      })

	

								 			  
								 			});
								 		
								 			      
								 			       
								 		      	
								 		</script>
							<?php

							
			

								 		                 }

								 		                    if($isspecified == 1){
								 		                    		$chckss = preg_split ("/\,/", $rescontent);

								 		                    		for($o = 0; $o < count($chckss);$o++){
								 		                    		

								 		                    			if(in_array($chckss[$o], $contentsofchecks)){
								 		                    		// /	echo $chckss[$o];
								 		                    		?>
								 		                    		<script type="text/javascript">
								 		                    			$(document).ready(function() {
								 		                    				$('#val<?php echo $rows['formid']?>').val(<?php echo $chckss[$o] ?>);
								 		                    			});
								 		                    		</script>
								 		                    		<?php
								 		                    	}else {
								 		                    		$data =  $chckss[$o];

								 		                    		
								 		                    	}
								 		                    		}

								 		                    		if(isset($data)){
								 		                    			if($data == ''){
								 		                    			?>
								 		                    				<script type="text/javascript">
								 		                    			
								 		                    			$(document).ready(function() {
								 		                    	 
								 		                    	 $('#check<?php echo $rows['form_id'] ?>').prop("checked",false);	
								 		                    			      });      
								 		                    		      	
								 		                    		</script>
								 		                    			
								 		                    			<?php
								 		                    		}else {
								 		                    			?>	
								 		                    		
								 		                    		<script type="text/javascript">
								 		                    			
								 		                    			$(document).ready(function() {
								 		                    	 $('#val<?php echo $rows['form_id'] ?>').val('<?php echo $data?>'); 
								 		                    	 $('#check<?php echo $rows['form_id'] ?>').prop("checked",true);
								 		                    	
								 		                    	 $('#bgc<?php echo $rows['form_id'] ?>').append('<span class="text-success" style="font-size:22px;font-weight:bolder"> «</span>');	
								 		                    			      });      
								 		                    		      	
								 		                    		</script>

								 		                    		<?php

								 		                    			}
								 		                    			
								 		                    			}								 		                    		


								 		                    	

								 		       	?>
								 		       
								 		  	<h6 style="margin-left: 40px" id="bgc<?php echo $rows['form_id'] ?>" ><label><input type="checkbox" disabled="" name="check<?php echo $rows['form_id'] ?>" class="changeradioss<?php echo $rows['form_id'] ?>" data-tid = "<?php echo $tid ?>" name="<?php echo $rows['form_id'] ?>" data-value="10" id="check<?php echo $rows['form_id'] ?>"  value="<?php echo $data ?>" > 
												
													<input type="text" disabled=""  data-tid = "<?php echo $tid ?>" class="opt" id="val<?php echo $rows['form_id'] ?>"  placeholder="Others (Please Specify)" value="">
												</label></h6>

												<script type="text/javascript">
													
													$(document).ready(function() {
													     	$('#val<?php echo $rows['form_id'] ?>').keyup(function(){ 
													     		var val = $(this).val();
													     		var tid = $(this).data('tid');

													     		$('#check<?php echo $rows['form_id'] ?>').val(val);
													     		   var sfavorite = [];
											            $.each($("input[name='check<?php echo $rows['form_id'] ?>']:checked"), function(){
											                sfavorite.push($(this).val());
											              

											            });
											         
											          
											           		var	sThisVal = sfavorite.join(",");

											         

													    
													     	})
													     });     
												      	
												</script>

								 		       	<?php
								 		       	}else {
								 		       		?>

								 		       		<?php
								 		       	}    
								 		 ?>

								 		 <script type="text/javascript">
								
								$(document).ready(function() {

								

									$('.chkvalue<?php echo $rows['form_id'] ?>').click(function() { 
										
  									var tid = $(this).data('tid');
  								



  								
			    var favorite = [];
            $.each($("input[name='check<?php echo $rows['form_id'] ?>']:checked"), function(){
                favorite.push($(this).val());
            });
          
           		var	sThisVal = favorite.join(",");

           		//alert(sThisVal);

            
         

			               		 		      		         


  									
  							
									
									})

									$('.txtsavetotemp').keyup(function(){ 
										var val=$(this).val();
										var tid = $(this).data('tid');

										
									})

									
								    
								      	
								      	
								      });      
							      	
							</script>
								 		</div> 
								</div>
		<?php
			               		 	}else if($type == 'email') {
	?>
			<input type="text" class="txtboxtransition txtsavetotemp txtuptcontent" disabled="" value="<?php echo $rescontent ?>"  data-tid = "<?php echo $tid ?>" name="<?php echo $rows['form_id'] ?>" data-idform ="<?php echo $rows['form_id'] ?>" style="width: 60%; margin-left: 20px; background-color: transparent;" placeholder="" > 
		
		 	
	
		<?php


	


			               		 	}else if($type == 'numbers') {
			?>
			<input type="text" class="txtboxtransition txtsavetotemp txtuptcontent" disabled="" value="<?php echo $rescontent ?>"  data-tid = "<?php echo $tid ?>" name="<?php echo $rows['form_id'] ?>" data-idform ="<?php echo $rows['form_id'] ?>" style="width: 60%; margin-left: 20px; background-color: transparent;" placeholder="" > 
		
		 	
	
		<?php


			               		 	}else if($type == 'dates') {
		?>
			<input type="text" class="txtboxtransition txtsavetotemp txtuptcontent" disabled="" value="<?php echo $rescontent ?>"  data-tid = "<?php echo $tid ?>" name="<?php echo $rows['form_id'] ?>" data-idform ="<?php echo $rows['form_id'] ?>" style="width: 60%; margin-left: 20px; background-color: transparent;" placeholder="" > 
		
		 	
	
		<?php
		
			               		 	}

 ?>

