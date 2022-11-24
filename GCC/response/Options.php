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
		
		
		<input type="text" class="txtboxtransition" name="<?php echo $rows['form_id'] ?>" style="width: 60%; margin-left: 20px;"  placeholder="" required=""> 
		
		 
		
		<?php
		}else if ($isreq == 'no') { 
		?>
		
		<input type="text" class="txtboxtransition" name="<?php echo $rows['form_id'] ?>" style="width: 60%; margin-left: 20px;" placeholder="" > 
		
		
		<?php	
								 			}
			
			               		 	


			               		 	}else if ($type== 'longtext') {
		if ($isreq == 'yes') {		 		
		?>
		 <div class="container">
		 	<input type="text" class="txtboxtransition" name="<?php echo $rows['form_id'] ?>" style="width: 100%;" placeholder="" required="">
		 </div> 
		 		
		
		<?php
	}else if ($isreq == 'no') { 
		?>
		 <div class="container">
		 	<input type="text" class="txtboxtransition" name="<?php echo $rows['form_id'] ?>" style="border:none;outline:none; border-bottom: 2px solid #634735;width: 100%;" placeholder="" >
		 </div> 
		 				
		
		<?php
	}

			               		 	}else if ($type == 'mpchoice') {
			   	
		?>
		 <div class="container">
								 		
								 		<?php 
								 				$selectaddchoice = " select * from addchoice where choice_id = '$choiceid' ";
								 		                $resultchoice = mysqli_query($con,$selectaddchoice); // run query
								 		             
								 		          
								 		                 while($res = mysqli_fetch_array($resultchoice)){
								 		                 	 if ($isreq == 'yes') {
		 								?>
			<h6 style="margin-left: 40px" class="mt-2" ><label><input type="radio" name="<?php echo $rows['form_id'] ?>" required value="<?php echo $res['content'] ?>" > <?php echo $res['content'] ?></label></h6>
		

				
								 	<?php
													 }else if ($isreq == 'no') { 
	?>
			<h6 style="margin-left: 40px" class="mt-2"><label><input type="radio" name="<?php echo $rows['form_id'] ?>"  value="<?php echo $res['content'] ?>" > <?php echo $res['content'] ?></label></h6>
		


				
								 	<?php



													 }
								 

								 		                 }

								 		          
								 		 ?>
								 		
								</div>
		<?php

			               		 	}else if($type =='checkbox') {
			             
			               		 				?>
		 <div class="container">
		 	<input type="checkbox" id="checkkk" class="d-none" >
								 		
								 		<?php 
								 				$selectaddchoice = " select * from addchoice where choice_id = '$choiceid' ";
								 		                $resultchoice = mysqli_query($con,$selectaddchoice); // run query
								 		             
								 		          
								 		                 while($res = mysqli_fetch_array($resultchoice)){
								 		                 	
								 	?>
			<h6 style="margin-left: 40px" class="mt-2"><label><input type="checkbox" class="chkvalue"   name="check<?php echo $rows['form_id'] ?>[]" value="<?php echo $res['content'] ?>" > <?php echo $res['content'] ?></label></h6>



				
								 	<?php
								 
								 
								 
								 		                 }
								 		          
								 		 ?>
								 		
								</div>
		<?php
			               		 	}else if($type == 'email') {
			    if ($isreq == 'yes') {
			?>
		 <div class="container" >
		
		<input type="email" class="txtboxtransition" required="" name="<?php echo $rows['form_id'] ?>" style="margin-left: 10px;width: 60%"  placeholder=""> 
		 </div> 
		 
		
		<?php
	} else  if ($isreq == 'no') {
			?>
		 <div class="container" >
		<input type="email" class="txtboxtransition" name="<?php echo $rows['form_id'] ?>" style="margin-left: 10px;width: 60%"  placeholder=""> 
	
		 </div> 
		 
		
		<?php
	}
			               		 	}else if($type == 'numbers') {
			if ($isreq == 'yes') {
			?>
		 <div class="container" >
		 
		<input type="text" class="txtboxtransition" required="" name="<?php echo $rows['form_id'] ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" style="width: 60%;margin-left: 10px;"  placeholder=""> 
		 </div> 
		 
		
		<?php
	}else if ($isreq == 'no') { 
			?>
		 <div class="container" >
		 
		<input type="text" class="txtboxtransition" name="<?php echo $rows['form_id'] ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" style="width: 60%;margin-left: 10px;"  placeholder=""> 
		 </div> 
		 
		
		<?php

	}
			               		 	}else if($type == 'dates') {
			if ($isreq == 'yes') {               		 		
			?>
		 <div class="container" >

		<input type="date" required="" class="form-control" name="<?php echo $rows['form_id'] ?>" style=" text-align: center;"  placeholder=""> 
		 </div> 
		 
		
		<?php
	}else if ($isreq == 'no') {
		?>
		 <div class="container" >
		 
		<input type="date" class="form-control" name="<?php echo $rows['form_id'] ?>" style=" text-align: center;"  placeholder=""> 
		 </div> 
		 
		
		<?php

	}
			               		 	}

 ?>