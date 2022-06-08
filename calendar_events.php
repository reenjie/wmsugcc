	<ul class="list-group">
							 
							
							
							 <?php 
                  	 date_default_timezone_set('Asia/Manila');
                  	 $datenow = date('Y-m-d');

                  	 			$lookforevents = " SELECT * FROM `events` where status = 0 order by start desc limit 4 ";
                  	 	                $resultlooks = mysqli_query($con,$lookforevents); // run query
                  	 	                $countevs= mysqli_num_rows($resultlooks); // to count if necessary
                  	 	               //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
                  	 	             if ($countevs>=1){
                  	 	             	//while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                  	 	                 while($row = mysqli_fetch_array($resultlooks)){
                  	 						?>
                  	 		
                  		 <li class="list-group-item" style="font-size: 13px ;border-left:3px solid <?php echo $row['bgcolor'] ?>; font-weight: bold"><?php echo $row['title'] ?> <br> <span class="text-danger" style="float:right;font-style: italic;"><?php echo date('F j, Y',strtotime($row['start']))  ?></span></li>
                  	 						<?php
                  	 	                 }
                  	 	          }else {
                  	 	          	?>
                  	 	          <h6 class="text-secondary">NO EVENTS</h6>
                  	 	          	<?php
                  	 	          }

                   ?>

                   </ul>


                   <a href="?links&redirect=Events" class="btn btn-link mt-2" style="float: right;font-size: 13px">View All</a>