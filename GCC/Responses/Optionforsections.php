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
			<input type="hidden" value="yes" class="checkrequired" name="checkrequired">
		
		<input type="text" class="txtboxtransition txtsavetotemp" name="<?php echo $rows['form_id'] ?>" data-idform ="<?php echo $rows['form_id'] ?>" style="width: 60%; margin-left: 20px;"  placeholder="" required=""> 
		<input type="hidden" name="inputdatasection" value="<?php echo $secno ?>">
		 
		
		<?php
		}else if ($isreq == 'no') { 
		?>
		
		<input type="text" class="txtboxtransition txtsavetotemp" name="<?php echo $rows['form_id'] ?>" data-idform ="<?php echo $rows['form_id'] ?>" style="width: 60%; margin-left: 20px;" placeholder="" > 
		
		 <input type="hidden" value="no" class="checkrequired" name="checkrequired">
		<input type="hidden" name="inputdatasection" value="<?php echo $secno ?>">
		<?php	
								 			}
			
			               		 	


			               		 	}else if ($type== 'longtext') {
		if ($isreq == 'yes') {		 		
		?>
		 <div class="container">
		 	<input type="text" class="txtboxtransition txtsavetotemp" name="<?php echo $rows['form_id'] ?>" data-idform ="<?php echo $rows['form_id'] ?>" style="width: 100%;" placeholder="" required="">
		 </div> 
		 		<input type="hidden" value="yes" class="checkrequired"  name="checkrequired">		
		<input type="hidden" name="inputdatasection" value="<?php echo $secno ?>">
		<?php
	}else if ($isreq == 'no') { 
		?>
		 <div class="container">
		 	<input type="text" class="txtboxtransition txtsavetotemp" name="<?php echo $rows['form_id'] ?>" data-idform ="<?php echo $rows['form_id'] ?>" style="width: 100%;" placeholder="" >
		 </div> 
		 				<input type="hidden" value="no" class="checkrequired" name="checkrequired">	
		 				<input type="hidden" name="inputdatasection" value="<?php echo $secno ?>">
		
		<?php
	}

			               		 	}else if ($type == 'mpchoice') {
			   	
		?>
		 <div class="container">
								 		
								 		<?php 
								 				$selectaddchoice = " select * from addchoice where choice_id = '$choiceid' ";
								 		                $resultchoice = mysqli_query($con,$selectaddchoice); // run query
								 		             
								 		          
								 		                 while($res = mysqli_fetch_array($resultchoice)){
								 		                 	$chhid = $res['chid'];
								 		                 	 if ($isreq == 'yes') {
		 								?>
			<h6 style="margin-left: 40px" class="mt-2" ><label><input type="radio" id="uncheck<?php echo $chhid ?>" name="<?php echo $rows['form_id'] ?>" required value="<?php echo $res['content'] ?>" > <?php echo $res['content'] ?></label></h6>
			<input type="hidden" value="yes" class="checkrequired" name="checkrequired" >

 <input type="hidden" name="inputdatasection" value="<?php echo $secno ?>">
				
								 	<?php
													 }else if ($isreq == 'no') { 
	?>
			<h6 style="margin-left: 40px" class="mt-2"><label><input type="radio" id="uncheck<?php echo $chhid ?>" name="<?php echo $rows['form_id'] ?>"  value="<?php echo $res['content'] ?>" > <?php echo $res['content'] ?></label></h6>
			<input type="hidden" value="no" class="checkrequired" name="checkrequired">
 <input type="hidden" name="inputdatasection" value="<?php echo $secno ?>">

				
								 	<?php



													 }

													 ?>
												 <script src="../../js/jquery.js"></script>
										
										<script type="text/javascript">
								 			$(document).ready(function() {
								 				
								 			     
								 			      $('.uncheckall<?php echo $rows['form_id'] ?>').keyup(function(){ 
								 			      	var val = $(this).val();

								 			      	if (val == ''){
								 			      	$('#uncheck<?php echo $chhid ?>').attr('name','<?php echo $rows['form_id'] ?>[]');
								 			      	$(this).removeAttr('name');
								 			      	
								 			      	$('#uncheck<?php echo $chhid ?>').removeAttr('disabled');
								 			      	$('#btn<?php echo $rows['form_id'] ?>').addClass('d-none');

								 			      	}else {
								 			      	$('#uncheck<?php echo $chhid ?>').removeAttr('name');
								 			      	$(this).attr('name','<?php echo $rows['form_id'] ?>');
								 			      	$('#uncheck<?php echo $chhid ?>').prop('checked',false);
								 			      	$('#uncheck<?php echo $chhid ?>').attr('disabled',true);
								 			      	$('#btn<?php echo $rows['form_id'] ?>').removeClass('d-none');
								 			      	}

								 			      
								 			      })

								 			    

								 			     $('#btn<?php echo $rows['form_id'] ?>').click(function() { 
								 			      	 $('.uncheckall<?php echo $rows['form_id'] ?>').val('');
								 			      	$('#uncheck<?php echo $chhid ?>').attr('name','<?php echo $rows['form_id'] ?>[]');
								 			      	$(this).removeAttr('name');
								 			      	
								 			      	$('#uncheck<?php echo $chhid ?>').removeAttr('disabled');
								 			      	$('#btn<?php echo $rows['form_id'] ?>').addClass('d-none');

								 			      })

	

								 			  
								 			});
								 		
								 			      
								 			       
								 		      	
								 		</script>
													 <?php
								 

								 		                 }
										if($isspecified == 1){
								 		   ?>
								 		   	<input type="text" class="txtboxtransition txtsavetotemp uncheckall<?php echo $rows['form_id'] ?>" name="" data-idform ="<?php echo $rows['form_id'] ?>" style="width: 60%; margin-left: 35px;font-size: 13px;" placeholder="Others (Please Specify)" > 

								 		   	<a href="javascript:void(0)" class="btn btn-light text-primary d-none" id="btn<?php echo $rows['form_id'] ?>" style="font-size: 12px">Refresh Selection <i class="fas fa-sync"></i></a>
								 		   <?php
								 		   }else {

								 		   } 
								 		     

								 		          
								 		 ?>
								 		
								</div>
		<?php

			               		 	}else if($type =='checkbox') {
			             
			               		 				?>
		 <div class="container">
		 	 <div class="row"> 
		 	 
		 	<input type="checkbox" id="checkkk" class="d-none" >
								 		
								 		<?php 
								 				$selectaddchoice = " select * from addchoice where choice_id = '$choiceid' ";
								 		                $resultchoice = mysqli_query($con,$selectaddchoice); // run query
								 		             
								 		          
								 		                 while($res = mysqli_fetch_array($resultchoice)){
								 		                 	$chhid = $res['chid'];
								 		                 	if ($isreq == 'yes') { 
								 		                 		?>
								 		                 		<input type="hidden" value="yes" class="checkrequired" name="checkrequired">

								 		                 		<?php
								 		                 	}else if ($isreq == 'no') {
								 		                 		?>
								 		                 		<input type="hidden" value="no" class="checkrequired" name="checkrequired">
								 		                 		<?php
								 		                 	}
								 		    
								 	?>
			


				<?php 
								for($i = 0 ; $i < 1; $i++){
								 			?>
								 		 <div class="col-md-4">
								 		 
								 		 <h6 style="margin-left: 40px" class="mt-2"><label><input type="checkbox" class="chkvalue" id="uncheck<?php echo $chhid ?>"   name="<?php echo $rows['form_id'] ?>[]" value="<?php echo $res['content'] ?>" > <?php echo $res['content'] ?></label></h6>
								 		
								 		 	
								 		 </div> 
								 		 
								 		<?php
								 		}

				 ?>

			<input type="hidden" name="checkcheck" value="<?php echo $rows['form_id'] ?>">

 <input type="hidden" name="inputdatasection" value="<?php echo $secno ?>">
										
										
										<script type="text/javascript">
								 			$(document).ready(function() {
								 				
								 			     
								 			      $('.uncheckall<?php echo $rows['form_id'] ?>').keyup(function(){ 
								 			      	var val = $(this).val();

								 			      	if (val == ''){
								 			      	$('#uncheck<?php echo $chhid ?>').attr('name','<?php echo $rows['form_id'] ?>[]');
								 			      	$(this).removeAttr('name');
								 			      	
								 			      	$('#uncheck<?php echo $chhid ?>').removeAttr('disabled');
								 			      	$('#btn<?php echo $rows['form_id'] ?>').addClass('d-none');

								 			      	}else {
								 			      	$('#uncheck<?php echo $chhid ?>').removeAttr('name');
								 			      	$(this).attr('name','<?php echo $rows['form_id'] ?>');
								 			      	$('#uncheck<?php echo $chhid ?>').prop('checked',false);
								 			      	$('#uncheck<?php echo $chhid ?>').attr('disabled',true);
								 			      	$('#btn<?php echo $rows['form_id'] ?>').removeClass('d-none');
								 			      	}

								 			      
								 			      })

								 			    

								 			     $('#btn<?php echo $rows['form_id'] ?>').click(function() { 
								 			      	 $('.uncheckall<?php echo $rows['form_id'] ?>').val('');
								 			      	$('#uncheck<?php echo $chhid ?>').attr('name','<?php echo $rows['form_id'] ?>[]');
								 			      	$(this).removeAttr('name');
								 			      	
								 			      	$('#uncheck<?php echo $chhid ?>').removeAttr('disabled');
								 			      	$('#btn<?php echo $rows['form_id'] ?>').addClass('d-none');

								 			      })

	

								 			  
								 			});
								 		
								 			      
								 			       
								 		      	
								 		</script>
								 	<?php
								 
								 
								 
								 		                 }

								 		   if($isspecified == 1){
								 		   ?>
								 		   <p></p>
								 		   	<input type="text" class="mt-3 txtboxtransition txtsavetotemp uncheckall<?php echo $rows['form_id'] ?>" name="" data-idform ="<?php echo $rows['form_id'] ?>" style="width: 60%; margin-left: 35px;font-size: 13px; float: left;" placeholder="Others (Please Specify)" > 

								 		   	<a href="javascript:void(0)" class="btn btn-light text-primary d-none" id="btn<?php echo $rows['form_id'] ?>" style="font-size: 12px">Refresh Selection <i class="fas fa-sync"></i></a>
								 		   <?php
								 		   }else {

								 		   } 
								 		          
								 		 ?>
								 		</div>

								</div>
		<?php
			               		 	}else if($type == 'email') {
			    if ($isreq == 'yes') {
			?>
		 <div class="container" >
		 	<input type="hidden" value="yes" class="checkrequired" name="checkrequired">
		<input type="email" class="txtboxtransition txtsavetotemp" data-idform ="<?php echo $rows['form_id'] ?>" required="" name="<?php echo $rows['form_id'] ?>" style="margin-left: 10px;width: 60%"  placeholder="Enter Email here"> 
		 </div> 
		 <input type="hidden" name="inputdatasection" value="<?php echo $secno ?>">
		
		<?php
	} else  if ($isreq == 'no') {
			?>
		 <div class="container" >
		<input type="email" class="txtboxtransition txtsavetotemp" data-idform ="<?php echo $rows['form_id'] ?>" name="<?php echo $rows['form_id'] ?>" style="margin-left: 10px;width: 60%"  placeholder="Enter Email here"> 
		<input type="hidden" value="no" class="checkrequired" name="checkrequired">
		 </div> 
		 <input type="hidden" name="inputdatasection" value="<?php echo $secno ?>">
		
		<?php
	}
			               		 	}else if($type == 'numbers') {
			if ($isreq == 'yes') {
			?>
		 <div class="container" >
		 	<input type="hidden" value="yes" class="checkrequired" name="checkrequired">
		<input type="text" class="txtboxtransition txtsavetotemp" data-idform ="<?php echo $rows['form_id'] ?>" required="" name="<?php echo $rows['form_id'] ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" style="width: 60%;margin-left: 10px;"  placeholder="Number"> 
		 </div> 
		<input type="hidden" name="inputdatasection" value="<?php echo $secno ?>">
		
		<?php
	}else if ($isreq == 'no') { 
			?>
		 <div class="container" >
		 	<input type="hidden" value="no" class="checkrequired" name="checkrequired">
		<input type="text" class="txtboxtransition txtsavetotemp" data-idform ="<?php echo $rows['form_id'] ?>" name="<?php echo $rows['form_id'] ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" style="width: 60%;margin-left: 10px;"  placeholder="Number"> 
		 </div> 
		 <input type="hidden" name="inputdatasection" value="<?php echo $secno ?>">
		
		<?php

	}
			               		 	}else if($type == 'dates') {
			if ($isreq == 'yes') {               		 		
			?>
		 <div class="container" >
<input type="hidden" value="yes" class="checkrequired" name="checkrequired">
		<input type="date" required="" class="form-control" name="<?php echo $rows['form_id'] ?>" style=" text-align: center;"  placeholder="Enter Numbers only"> 
		 </div> 
		 <input type="hidden" name="inputdatasection" value="<?php echo $secno ?>">
		
		<?php
	}else if ($isreq == 'no') {
		?>
		 <div class="container" >
		 	<input type="hidden" value="no" class="checkrequired" name="checkrequired">
		<input type="date" class="form-control" name="<?php echo $rows['form_id'] ?>" style=" text-align: center;"  placeholder="Enter Numbers only"> 
		 </div> 
		 <input type="hidden" name="inputdatasection" value="<?php echo $secno ?>">
		
		<?php

	}
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

 	      



 	      	$('.chkvalue').click(function() {
 	      if($(this).prop("checked") == true) {
 	                $('#checkkk').attr('checked','checked');
 	                             		
 	         }
 	      else if($(this).prop("checked") == false) {
 	               
 	                 $('#checkkk').removeAttr('checked');                       
 	       }
 	    });
 	      });      
       	
 </script>