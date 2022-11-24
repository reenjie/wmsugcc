<?php 

	

	?>

	 		
	 		 
	 	 	 <div class="col-sm-6" style="position: relative;" >
	 	 	 		
	 	 	 	
	 	 	 		<?php
	 	 	 		if($type =='Question') {
			             
	 	 	 				include '../../create_form/connect.php';
						
					
		                 	
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


 ?>