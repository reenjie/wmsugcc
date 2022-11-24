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
			
		
		<input type="text" class="txtboxtransition txtsavetotemp txtuptcontent" name="<?php echo $rows['form_id'] ?>" data-tid = "<?php echo $tid ?>" data-idform ="<?php echo $rows['form_id'] ?>" value="<?php echo $rescontent ?>" style="width: 60%; margin-left: 20px;"  placeholder="" required=""> 
		<input type="hidden" name="inputdatasection" value="<?php echo $secno ?>">
		 
		
		<?php
		}else if ($isreq == 'no') { 
		?>
		
		<input type="text" class="txtboxtransition txtsavetotemp txtuptcontent" value="<?php echo $rescontent ?>"  data-tid = "<?php echo $tid ?>" name="<?php echo $rows['form_id'] ?>" data-idform ="<?php echo $rows['form_id'] ?>" style="width: 60%; margin-left: 20px;" placeholder="" > 
		
	
		<input type="hidden" name="inputdatasection" value="<?php echo $secno ?>">
		<?php	
								 			}
		
			               		 	

			               		 	?>
			               		 	<script type="text/javascript">
			               		 		
			               		 		$(document).ready(function() {
			               		 		     
			               		 		      
			               		 		      

			               		 		      	$('.txtuptcontent').focusout(function(){
			               		 		      			var val = $(this).val();
			               		 		      		var tid = $(this).data('tid');
			               		 		      
			               		 		      		   $.ajax({
			               		 		      		           url : "saving.php",
			               		 		      		            method: "POST",
			               		 		      		             data  : {upttxtcontents:1,val:val,tid:tid},
			               		 		      		             success : function(data){
			               		 		      			

											               		 		      		             
											               		 		      		             	

											               		 		      		             	
			               		 		      		             }
			               		 		      		          })
			               		 		      		    
			               		 		      	})
			               		 		      });      
			               		 	      	
			               		 	</script>

			               		 	<?php


			               		 	}else if ($type== 'longtext') {
		if ($isreq == 'yes') {		 		
		?>
		 <div class="container">
		 	<input type="text" class="txtboxtransition txtsavetotemp txtuptcontent"  data-tid = "<?php echo $tid ?>" value="<?php echo $rescontent ?>" name="<?php echo $rows['form_id'] ?>" data-idform ="<?php echo $rows['form_id'] ?>" style="width: 100%;" placeholder="" required="">
		 </div> 
		 	
		<input type="hidden" name="inputdatasection" value="<?php echo $secno ?>">
		<?php
	}else if ($isreq == 'no') { 
		?>
		 <div class="container">
		 	<input type="text" class="txtboxtransition txtsavetotemp txtuptcontent"  data-tid = "<?php echo $tid ?>" value="<?php echo $rescontent ?>" name="<?php echo $rows['form_id'] ?>" data-idform ="<?php echo $rows['form_id'] ?>" style="width: 100%;" placeholder="" >
		 </div>
		 				
		 				<input type="hidden" name="inputdatasection" value="<?php echo $secno ?>">
		
		<?php
	}

									

									?>

			               		 	<script type="text/javascript">
			               		 		
			               		 		$(document).ready(function() {
			               		 		     
			               		 		        	$('.txtuptcontent').focusout(function(){
			               		 		      			var val = $(this).val();
			               		 		      		var tid = $(this).data('tid');
			               		 		      		
			               		 		      		   $.ajax({
			               		 		      		           url : "saving.php",
			               		 		      		            method: "POST",
			               		 		      		             data  : {upttxtcontents:1,val:val,tid:tid},
			               		 		      		             success : function(data){
			               		 		      			

											               		 		      		             
											               		 		      		             	

											               		 		      		             	
			               		 		      		             }
			               		 		      		          })
			               		 		      		    
			               		 		      	})
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
								 		 	<h6 style="margin-left: 40px" class="mt-2"><label><input type="radio" class="changeradio" data-tid = "<?php echo $tid ?>"  data-value="<?php echo $res['content'] ?>"  id="radiocheck<?php echo $res['chid'] ?>" name="<?php echo $rows['form_id'] ?>"  value="<?php echo $res['content'] ?>" > <?php echo $res['content'] ?></label></h6>
								 		 </div> 
								 		 
								 		<?php
								 	}

			if ($rescontent == $res['content']){

			//	echo $res['content'].$res['chid'];
			
				?>
				<script type="text/javascript">
					
					$(document).ready(function() {
					      	$('#radiocheck<?php echo $res['chid'] ?>').prop("checked",true);
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
				      		
				      			  
				      			
				      			  $.ajax({
			               		 		      		           url : "saving.php",
			               		 		      		            method: "POST",
			               		 		      		             data  : {uptmpchoice:1,val:newval,tid:tid},
			               		 		      		             success : function(data){
			               		 		      			
											               		 		      		             	var clear = setInterval(function(){
											               		 		      		             	

											               		 		      		             		clearInterval(clear);
											               		 		      		             	},1000);
			               		 		      		             }
			               		 		      		          })
				      			    
				      			    
				      	
				      	})
				      });      
			      	
			</script>
			<?php

			


				
								 	
													 }else if ($isreq == 'no') { 
	

								 	for($i = 0 ; $i <1;$i++){
								 		?>
								 		 <div class="col-md-6">
								 		 	<h6 style="margin-left: 40px" class="mt-2"><label><input type="radio" class="changeradio" data-tid = "<?php echo $tid ?>"  data-value="<?php echo $res['content'] ?>"  id="radiocheck<?php echo $res['chid'] ?>" name="<?php echo $rows['form_id'] ?>"  value="<?php echo $res['content'] ?>" > <?php echo $res['content'] ?></label></h6>
								 		 </div> 
								 		 
								 		<?php
								 	}

								 	if ($rescontent == $res['content']){

			//	echo $res['content'].$res['chid'];

			
				?>
				<script type="text/javascript">
					
					$(document).ready(function() {
					      	$('#radiocheck<?php echo $res['chid'] ?>').prop("checked",true);
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
				      		
				      			 
				      			
				      			  $.ajax({
			               		 		      		           url : "saving.php",
			               		 		      		            method: "POST",
			               		 		      		             data  : {uptmpchoice:1,val:newval,tid:tid},
			               		 		      		             success : function(data){
			               		 		      		
											               		 		      		             	var clear = setInterval(function(){
											               		 		      		             	

											               		 		      		             		clearInterval(clear);
											               		 		      		             	},1000);
			               		 		      		             }
			               		 		      		          })
				      			    
				      			   
				      	
				      	})
				      });      
			      	
			</script>
			<?php



													 }
								 

								 		                 }

								 		                  if($isspecified == 1){
								 		       	?>
								 		       
								 		  	<h6 style="margin-left: 40px" ><label><input type="radio" class="changeradioss<?php echo $rows['form_id'] ?>" data-tid = "<?php echo $tid ?>" name="<?php echo $rows['form_id'] ?>" data-value="10" id="check<?php echo $rows['form_id'] ?>"  > 
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
															  $('#check<?php echo $rows['form_id'] ?>').data('value',<?php echo $rescontent?>);
															  $('#check<?php echo $rows['form_id'] ?>').prop("checked",true);
															  		      		$('#val<?php echo $rows['form_id'] ?>').val(<?php echo $rescontent?>);
															  		
															  		      });      
															  	      	
															  	</script>
															  	<?php
															  
															  }

													?>
													<input type="text" name="" data-tid = "<?php echo $tid ?>" class="opt" id="val<?php echo $rows['form_id'] ?>"  placeholder="Others (Please Specify)" value="<?php echo $rescontent ?>">
												</label></h6>

												<script type="text/javascript">
													
													$(document).ready(function() {
													     	$('#val<?php echo $rows['form_id'] ?>').keyup(function(){ 
													     		var val = $(this).val();
													     		var tid = $(this).data('tid');
													     		$.ajax({
			               		 		      		           url : "saving.php",
			               		 		      		            method: "POST",
			               		 		      		             data  : {uptmpchoice:1,val:val,tid:tid},
			               		 		      		             success : function(data){
			               		 		      		
											               		 		      		             	var clear = setInterval(function(){
											               		 		      		             	

											               		 		      		             		clearInterval(clear);
											               		 		      		             	},1000);
			               		 		      		             }
			               		 		      		          }) 

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
								 		 
								 		<h6 style="margin-left: 40px" class="mt-2"><label><input type="checkbox"  class="chkvalue<?php echo $rows['form_id'] ?> " data-tid = "<?php echo $tid ?>"  id="checkbox<?php echo $res['chid'] ?>"   name="check<?php echo $rows['form_id'] ?>" value="<?php echo $res['content'] ?>" > <?php echo $res['content'] ?></label></h6>
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
								 		                    			      });      
								 		                    		      	
								 		                    		</script>

								 		                    		<?php

								 		                    			}
								 		                    			
								 		                    			}								 		                    		


								 		                    	

								 		       	?>
								 		       
								 		  	<h6 style="margin-left: 40px" ><label><input type="checkbox" name="check<?php echo $rows['form_id'] ?>" class="changeradioss<?php echo $rows['form_id'] ?>" data-tid = "<?php echo $tid ?>" name="<?php echo $rows['form_id'] ?>" data-value="10" id="check<?php echo $rows['form_id'] ?>"  value="<?php echo $data ?>" > 
												
													<input type="text"  data-tid = "<?php echo $tid ?>" class="opt" id="val<?php echo $rows['form_id'] ?>"  placeholder="Others (Please Specify)" value="">
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

											           	//	alert(sThisVal);

													     	 $.ajax({
			               		 		      		           url : "saving.php",
			               		 		      		            method: "POST",
			               		 		      		             data  : {uptcheckbox:1,val:sThisVal,tid:tid},
			               		 		      		             success : function(data){
			               		 		      					$('.ttttt').html(data);
			               		 		      					 
											               		 		      		             	var clear = setInterval(function(){
											               		 		      		             		

											               		 		      		             		clearInterval(clear);
											               		 		      		             	},1000);
			               		 		      		             }
			               		 		      		          })
			               		 		      		         

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

            
          $.ajax({
			               		 		      		           url : "saving.php",
			               		 		      		            method: "POST",
			               		 		      		             data  : {uptcheckbox:1,val:sThisVal,tid:tid},
			               		 		      		             success : function(data){
			               		 		      					$('.ttttt').html(data);
			               		 		      					 
											               		 		      		             	var clear = setInterval(function(){
											               		 		      		             		

											               		 		      		             		clearInterval(clear);
											               		 		      		             	},1000);
			               		 		      		             }
			               		 		      		          })

			               		 		      		         


  									
  							
									
									})

									$('.txtsavetotemp').keyup(function(){ 
										var val=$(this).val();
										var tid = $(this).data('tid');

											  $.ajax({
			               		 		      		           url : "saving.php",
			               		 		      		            method: "POST",
			               		 		      		             data  : {upttxtcontents:1,val:val,tid:tid},
			               		 		      		             success : function(data){
			               		 		      				
											               		 		      		             	var clear = setInterval(function(){
											               		 		      		             		

											               		 		      		             		clearInterval(clear);
											               		 		      		             	},1000);
			               		 		      					
			               		 		      		             }
			               		 		      		          })
									
									})

									
								    
								      	
								      	
								      });      
							      	
							</script>
								 		</div> 
								</div>
		<?php
			               		 	}else if($type == 'email') {
			    if ($isreq == 'yes') {
			?>
		 <div class="container" >
		 	
		<input type="email" class="txtboxtransition txtsavetotemp txtuptcontent" data-tid = "<?php echo $tid ?>" value="<?php echo $rescontent ?>" data-idform ="<?php echo $rows['form_id'] ?>" required="" name="<?php echo $rows['form_id'] ?>" style="margin-left: 10px;width: 60%"  placeholder="Enter Email here"> 
		 </div> 
		 <input type="hidden" name="inputdatasection" value="<?php echo $secno ?>">
		
		<?php
	} else  if ($isreq == 'no') {
			?>
		 <div class="container" >
		<input type="email" class="txtboxtransition txtsavetotemp txtuptcontent" data-tid = "<?php echo $tid ?>" value="<?php echo $rescontent ?>" data-idform ="<?php echo $rows['form_id'] ?>" name="<?php echo $rows['form_id'] ?>" style="margin-left: 10px;width: 60%"  placeholder="Enter Email here"> 
	
		 </div> 
		 <input type="hidden" name="inputdatasection" value="<?php echo $secno ?>">
		
		<?php
	}


	

									?>

			               		 	<script type="text/javascript">
			               		 		
			               		 		$(document).ready(function() {
			               		 		     
			               		 		        	$('.txtuptcontent').focusout(function(){
			               		 		      			var val = $(this).val();
			               		 		      		var tid = $(this).data('tid');
			               		 		      		
			               		 		      		   $.ajax({
			               		 		      		           url : "saving.php",
			               		 		      		            method: "POST",
			               		 		      		             data  : {upttxtcontents:1,val:val,tid:tid},
			               		 		      		             success : function(data){
			               		 		      			

											               		 		      		             

											               		 		      		             	
			               		 		      		             }
			               		 		      		          })
			               		 		      		    
			               		 		      	})
			               		 		      });      
			               		 	      	
			               		 	</script>

			               		 	<?php

			               		 	}else if($type == 'numbers') {
			if ($isreq == 'yes') {
			?>
		 <div class="container" >
		 	
		<input type="text" class="txtboxtransition txtsavetotemp txtuptcontent" data-tid = "<?php echo $tid ?>" value="<?php echo $rescontent ?>" data-idform ="<?php echo $rows['form_id'] ?>" required="" name="<?php echo $rows['form_id'] ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" style="width: 60%;margin-left: 10px;"  placeholder="Number"> 
		 </div> 
		<input type="hidden" name="inputdatasection" value="<?php echo $secno ?>">
		
		<?php
	}else if ($isreq == 'no') { 
			?>
		 <div class="container" >
		 
		<input type="text" class="txtboxtransition txtsavetotemp txtuptcontent" data-tid = "<?php echo $tid ?>" value="<?php echo $rescontent ?>" data-idform ="<?php echo $rows['form_id'] ?>" name="<?php echo $rows['form_id'] ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" style="width: 60%;margin-left: 10px;"  placeholder="Number"> 
		 </div> 
		 <input type="hidden" name="inputdatasection" value="<?php echo $secno ?>">
		
		<?php

	}

								?>
									
									

			               		 	<script type="text/javascript">
			               		 		
			               		 		$(document).ready(function() {
			               		 		     
			               		 		        	$('.txtuptcontent').focusout(function(){
			               		 		      			var val = $(this).val();
			               		 		      		var tid = $(this).data('tid');
			               		 		      		 
			               		 		      		   $.ajax({
			               		 		      		           url : "saving.php",
			               		 		      		            method: "POST",
			               		 		      		             data  : {upttxtcontents:1,val:val,tid:tid},
			               		 		      		             success : function(data){
			               		 		      			

											               		 		      		             
											               		 		      		             	

											               		 		      		             	
			               		 		      		             }
			               		 		      		          })
			               		 		      		    
			               		 		      	})
			               		 		      });      
			               		 	      	
			               		 	</script>

			               		 	<?php

			               		 	}else if($type == 'dates') {
			if ($isreq == 'yes') {               		 		
			?>
		 <div class="container" >

		<input type="date" required="" class="form-control txtuptcontent" data-tid = "<?php echo $tid ?>" name="<?php echo $rows['form_id'] ?>" style=" text-align: center;"  placeholder="Enter Numbers only" value="<?php echo $rescontent ?>"> 
		 </div> 
		 <input type="hidden" name="inputdatasection" value="<?php echo $secno ?>">
		
		<?php
	}else if ($isreq == 'no') {
		?>
		 <div class="container" >
		 
		<input type="date" class="form-control txtuptcontent" data-tid = "<?php echo $tid ?>" name="<?php echo $rows['form_id'] ?>" style=" text-align: center;"  placeholder="Enter Numbers only"  value="<?php echo $rescontent ?>"> 
		 </div> 
		 <input type="hidden" name="inputdatasection" value="<?php echo $secno ?>">
		
		<?php

	}

		?>
									
									

			               		 	<script type="text/javascript">
			               		 		
			               		 		$(document).ready(function() {
			               		 		     
			               		 		   

			               		 		       	$('.txtuptcontent').focusout(function(){
			               		 		      			var val = $(this).val();
			               		 		      		var tid = $(this).data('tid');
			               		 		      		
			               		 		      		   $.ajax({
			               		 		      		           url : "saving.php",
			               		 		      		            method: "POST",
			               		 		      		             data  : {upttxtcontents:1,val:val,tid:tid},
			               		 		      		             success : function(data){
			               		 		      			

											               		 		      		             
											               		 		      		             	

											               		 		      		             	
			               		 		      		             }
			               		 		      		          })
			               		 		      		    
			               		 		      	})
			               		 		      });      
			               		 	      	
			               		 	</script>

			               		 	<?php
			               		 	}

 ?>

 <script type="text/javascript">
 	
 	$(document).ready(function() {
 	      

 	      	/*$('.txtsavetotemp').keyup(function(){ 
 	      		var fid = $(this).data('idform');
 	      		var val = $(this).val();

 	      		  
 	      		
 	      		   $.ajax({
 	      		           url : "saving.php",
 	      		            method: "POST",
 	      		             data  : {savetotemp:1,formid:fid,val:val},
 	      		             success : function(data){
 	      					//alert(data);
 	      		             }
 	      		          })
 	      		   
 	      		    
 	      	
 	      	})
 	      	*/
 	      });      
       	
 </script>