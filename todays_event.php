<span class="text-primary" style="font-size: 15px">Today's Event</span>
 		  		 	 	 	 	 	<hr>
 		  		 	 	 	 	 	<!-- <div class="card mt-2 mb-1" style="border-left: 5px solid gold">
 		  		 	 	 	 	 	 	 <div class="card-body">
 		  		 	 	 	 	 	 	 	<h6>Happy Birthday Dennis</h6>
 		  		 	 	 	 	 	 	 </div> 
 		  		 	 	 	 	 	 	 
 		  		 	 	 	 	 	 </div> 
 		  		 	 	 	 	 	  <div class="card mt-2 mb-1" style="border-left: 5px solid gold">
 		  		 	 	 	 	 	 	 <div class="card-body">
 		  		 	 	 	 	 	 	 	<h6>Happy Birthday Jaypee</h6>
 		  		 	 	 	 	 	 	 </div> -->
 		  		 	 	 	 	 	 	 
 <?php 
                  	 date_default_timezone_set('Asia/Manila');
                  	 $datenow = date('Y-m-d');

                  	 			$lookfortodaysevent = " SELECT * FROM `events` where Date(start)='$datenow'  ";
                  	 	                $resultlook = mysqli_query($con,$lookfortodaysevent); // run query
                  	 	                $countev= mysqli_num_rows($resultlook); // to count if necessary
                  	 	               //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
                  	 	             if ($countev>=1){
                  	 	             	//while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                  	 	                 while($row = mysqli_fetch_array($resultlook)){
                  	 						?>
                  	 		<div class="card shadow" style="border-left:4px solid <?php echo $row['bgcolor'] ?>">
                  		  	 <div class="card-header" >
                  	
                  				</div>
                  		  <div class="card-body" style="text-align: center;">
                  		   		<span class="text-success" style="font-size: 15px; font-weight: bolder;text-align: center;"><?php echo $row['title'] ?></span>
                  		  </div>
                  		</div>
                  		<p></p>
                  	 						<?php
                  	 	                 }
                  	 	          }else {
                  	 	          	?>
                  	 	          <h6 class="text-secondary" style="font-size: 14px">NO EVENTS</h6>
                  	 	          	<?php
                  	 	          }

                   ?>
                  