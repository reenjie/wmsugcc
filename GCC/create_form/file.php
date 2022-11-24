
										<p></p>
								 <div class="card ">
								 	<?php 
								 /*	if($secno >=1){
								 		?>
								 		<span class="badge  bg-secondary text-light" style="width: auto;position: absolute;left: 5px;top: 5px"><?php echo $secno ?></span>
								 		<?php
								 	}

								 	*/

								 	 ?>

								 	<i style=" color: grey;text-align: center;cursor: pointer;padding-top:10px; "   data-formid="<?php echo $row['form_id'] ?>" class="far fa-edit qcard" data-types="file"></i>

								 	 <div class="card-body ">

								 	

								 	 <div class="container">



								 	 	
								 	 		<h6 style="font-weight: bold;font-size: 15px"><?php echo $row['content'] ?></h6> 	
								 	 			 <div class="container mt-4">
								 	 			 
								 	 			 		 <div class="container mt-4">

					<button type="button" class=" mb-2 text-secondary attchlink" id="btnattachlink<?php echo $formid  ?>" style="font-size: 13px;background-color: transparent;border: none;outline: none;cursor: default;"><h6 style="font-size: 14px" ><i class="fas fa-paperclip"></i>  Attach File</h6></button>
					<br>
					 <div class="container" style="font-size: 13px">
					 
					Accepted Formats:
				
					<nav aria-label="breadcrumb">
								  <ol class="breadcrumb">
								    <li class="breadcrumb-item active" aria-current="page"><span class="text-secondary">all types of images </span></li>
								     <li class="breadcrumb-item active" aria-current="page"><span class="text-secondary">.doc </span></li>
								      <li class="breadcrumb-item active" aria-current="page"><span class="text-secondary">.docs </span></li>
								       <li class="breadcrumb-item active" aria-current="page"><span class="text-secondary">.pdf </span></li>
								         <li class="breadcrumb-item active" aria-current="page"><span class="text-secondary">.ppt </span></li>
								  </ol>
								</nav>
					</div> 
					<input type="file" name="" id="file<?php echo $formid  ?>" class="d-none" accept="image/*,.doc,.docs,.pdf,.ppt">

								 	 			 	 <div class="card">
								 	 			 	 	 <div class="card-body">
								 	 			 	 	 		
								 	 			 	 	 </div> 
								 	 			 	 	 
								 	 			 	 </div> 
								 	 			 	 
								 	 			 		
								 	 			 </div> 
								 	 			 	
								 	 			 	 
								 	 			 		
								 	 			 </div> 
								 	 			 
								 	 			
								 	 		<span style=""><p><br></p></span>
								 	 		
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
								 

								