<?php 
	
	 if($type == 'shorttext') {

		if ($isreq == 'yes') {
								 									 			
			?>
		 <div class="container" style="" >
		<input type="text" class="" name="<?php echo $rows['form_id'] ?>" style="border:none;outline:none;width: 50%;"placeholder="" required="" disabled> 
		 </div> 
		 
		
		<?php
		}else if ($isreq == 'no') { 
		?>
		 <div class="container" style="" >
		<input type="text" class="" name="<?php echo $rows['form_id'] ?>" style="border:none;outline:none; width: 50%;"placeholder="" disabled> 
		 </div> 
		 
		
		<?php	
								 			}
			
			               		 	


			               		 	}else if ($type== 'longtext') {
		if ($isreq == 'yes') {		 		
		?>
		 <div class="container">
		 	<input type="text" name="<?php echo $rows['form_id'] ?>" style="border:none;outline:none;width: 100%;" placeholder="" required="" disabled>
		 </div> 
		 				
		
		<?php
	}else if ($isreq == 'no') { 
		?>
		 <div class="container">
		 	<input type="text" name="<?php echo $rows['form_id'] ?>" style="border:none;outline:none; width: 100%; " placeholder=""  disabled>
		 </div> 
		 				
		
		<?php
	}

			               		 	}else if ($type == 'mpchoice') {
			   	
		?>
		 <div class="row">
								 		
								 		<?php 
								 				$selectaddchoice = " select * from addchoice where choice_id = '$choiceid' ";
								 		                $resultchoice = mysqli_query($con,$selectaddchoice); // run query
								 		             
								 		          
								 		                 while($res = mysqli_fetch_array($resultchoice)){
								 		                 
	?>
			



				
								 	<?php
								 		for($i = 0 ; $i <1;$i++){
								 		?>
								 		 <div class="col-md-6">
								 		 	<h6 ><label><input type="radio" name="<?php echo $rows['form_id'] ?>"  value=" <?php echo $res['content'] ?>" disabled > <?php echo $res['content'] ?></label></h6>
								 		 </div> 
								 		 
								 		<?php
								 	}



												
								 

								 		                 }

								 		                    if($isspecified == 1){
								 		       	?>
								 		      
								 		     	 	<h6  ><label><input type="radio" class="changeradioss<?php echo $rows['form_id'] ?>" data-tid = "<?php echo $tid ?>" name="<?php echo $rows['form_id'] ?>" data-value="10" id="check<?php echo $rows['form_id'] ?>"  disabled > 
												
													 	<input type="text" name="" class="questval mb-2" style="border:none;outline:none;  font-size:13px" placeholder="Others (Please specify)" readonly="" disabled>
												</label></h6>

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
		 	 
								 		
								 		<?php 
								 				$selectaddchoice = " select * from addchoice where choice_id = '$choiceid' ";
								 		                $resultchoice = mysqli_query($con,$selectaddchoice); // run query
								 		             	 $countchoices= mysqli_num_rows($resultchoice);
								 		          
								 		                 while($res = mysqli_fetch_array($resultchoice)){
								 		                 	$r[] = $res['chid'];
								 	
								 	?>
			
								 	<!-- -->


					
								 	<?php 

								 

								 	
								 		for($i = 0 ; $i < 1; $i++){
								 			?>
								 		 <div class="col-md-4">
								 		 
								 		 	<h6 ><label><input type="checkbox" name="<?php echo $rows['form_id'] ?>" value="<?php echo $res['content'] ?>" disabled > <?php echo $res['content'] ?></label></h6>
								 		
								 		 	
								 		 </div> 
								 		 
								 		<?php
								 		}
								 		
								 	
								 
								 		                 }

								 		     if($isspecified == 1){
								 		      	?>
								 		     
								 		     		

													<h6 style="" ><label><input type="checkbox" disabled="" name="check<?php echo $rows['form_id'] ?>" class="changeradioss<?php echo $rows['form_id'] ?>" data-tid = "<?php echo $tid ?>" name="<?php echo $rows['form_id'] ?>" data-value="10" id="check<?php echo $rows['form_id'] ?>"  value="<?php echo $data ?>" > 
												
												<input type="text" name="" disabled="" class="questval mb-2" style="border:none;outline:none;  font-size:13px" placeholder="Others (Please specify)" readonly="" disabled> 
												</label></h6>

								 		       	<?php
								 		       	}else {
								 		       		?>

								 		       		<?php
								 		       	} 
								 		          
								 		 ?>
								 		</div>
								 		
								</div>
		<?php
			               		 	}else if($type == 'email') {
			?>
		 <div class="container" >
		<input type="email" class="" name="" style="border:none;outline:none; border-bottom: 1px solid grey;width: 70%;margin-left: 50px;text-align: center;"  placeholder="" disabled> 
		 </div> 
		 
		
		<?php
			               		 	}else if($type == 'numbers') {
			?>
		 <div class="container" >

		<input type="text" class="" name="" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" style="border:none;outline:none; border-bottom: 1px solid grey;width: 60%;margin-left: 50px;text-align: center;"  placeholder="" disabled> 
		 </div> 
		 
		
		<?php
			               		 	}else if($type == 'dates') {
			?>
		 <div class="container" >

		<input type="date" class="form-control" name="" style=" text-align: center;"  placeholder="" disabled> 
		 </div> 
		 
		
		<?php
			               		 	}

 ?>