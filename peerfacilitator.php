<?php 
	$sqlpp = " SELECT * FROM `peer_facilitator` ";
		                $resultpp = mysqli_query($con,$sqlpp); 
		                $countpp= mysqli_num_rows($resultpp); 
		            
		             if ($countpp>=1){
		             
		                 while($row = mysqli_fetch_array($resultpp)){
							$img = $row['photo'];
			                 	if($img == ''){
			                 		$imgsrc = 'GCC/img/undraw_profile_pic_ic5t.png';
			                 	}else {
			                 		$imgsrc = 'GCC/img/uploads/'.$img;
			                 	}
								?>
								<div class="card shadow mb-4" style="border-top: 1px solid #11be85;border-bottom: 1px solid #11be85">
										 <div class="row">
									
										 <div class="col-md-2">
										 	 <span class="bg-success" style="font-size: 12px;padding: 5px; background-color: green;color: white;user-select: none">Facilitator</span>
										 </div>
										</div> 
									 
                                   		 		 <div class="card-body" >
                                   		 <div class="row">
                                   		 	
                                   		 	<div class="col-md-4">
                                   		 		<img src="<?php echo $imgsrc ?>"  style="width: 120px;height: 120px;" class="img-thumbnail">
                                   		 	</div>


                                   		 	<div class="col-md-8">
                                   		 		
                                   		 		
                                   		 		<h6 style="font-weight: bolder"><?php echo $row['lname'] ?> , <?php echo $row['gname'] ?>  <?php echo $row['mname'] ?>. <?php echo $row['extname'] ?></h6>
                                   		 		
                                   		 		<h6 style="font-size: 14px">
                                   		 			<?php echo $row['email'] ?>
                                   		 			<br>
                                   		 			<hr>
                                   		 			Major in :
                                   		 			<span style="font-size: 15px; "><?php echo $row['major'] ?></span> <br>
                                   		 			Year in School : <span style="font-size: 15px; "><?php echo $row['yearinschool'] ?> years</span>

                                   		 		</h6>


                                   		 		<br>
                                   		 		
                                   		 		
                                   		 	</div>
                                   		 </div>		 	
                                   		 	
                                  
                                   		 		 </div>
                                   		 </div> 
                                   		 <?php

		                 }


		          }else {
		          ?>
			          	 <div class="" style="text-align: center;">
			          	 
			          	 <img src="GCC/img/undraw_empty_street_sfxm.png" class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 30rem;">
			          	<h6>There was no facilitator yet.</h6>
			          	 </div> 
			          	<?php
		          }



 ?>