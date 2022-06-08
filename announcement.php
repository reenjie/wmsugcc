	 <?php 
                                      				$sqlguis = "SELECT * FROM `gui` where id = 3 ";
                                      		                $resultguis = mysqli_query($con,$sqlguis); // run query
                                      		                $countguis= mysqli_num_rows($resultguis); // to count if necessary
                                      		            
                                      		                 while($row = mysqli_fetch_array($resultguis)){
                                      		                 	$scc = $row['sidebar_color'];

                                      		                 	
                                      		                 
                                      		                 }
                                      		          
                                      		 ?>

<div class="tickerwrapper <?php echo $scc ?>  " id="tickerwrapper" >
 	 	  	 	  	
 	 	  	 	  	
 	 	  	 	  	 	<h6 style="" class="<?php echo $scc ?> text-light" >Announcements <i class="fas fa-bullhorn"></i></h6>
 	 	  	 	  	 
		<marquee behavior="scroll" direction="left" id="runningannouncment">
			<?php 
					$announcement = " SELECT * FROM `announcement` where stat = 0 order by datecreated desc ";
			                $resultaa = mysqli_query($con,$announcement); // run query
			                $countaa= mysqli_num_rows($resultaa); // to count if necessary
			               //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
			             if ($countaa>=1){
			             	//while($row = mysqli_fetch_array($result)){} is where we output all the data in database
			                 while($row = mysqli_fetch_array($resultaa)){
			                 	echo '<span style="margin-left:10px"> </span>'.date('F d,Y l',strtotime($row['datecreated'])).' <span style="font-weight:bolder"> : </span> '.$row['content'].'<span style="margin-left:10px">... </span>';
			
			                 }
			          }

			         
			 ?>
		</span>

	</marquee>



				</div>