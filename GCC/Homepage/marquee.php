      <div class="card">
                            <div class="card-body">
                                
                               <?php 
                                      				$sqlguis = "SELECT * FROM `gui` where id = 3 ";
                                      		                $resultguis = mysqli_query($con,$sqlguis); // run query
                                      		                $countguis= mysqli_num_rows($resultguis); // to count if necessary
                                      		            
                                      		                 while($row = mysqli_fetch_array($resultguis)){
                                      		                 	$scc = $row['sidebar_color'];

                                      		                 	
                                      		                 		?>
                                      		                 		<script type="text/javascript">
                                      		                 			$(document).ready(function() {
                                      		                 				 
                                      		                 			
                                      		                 			<?php 
                                      		                 			if($scc == 'bg-info'){
                                      		                 				?>$('#bg-info').attr('checked',true); <?php

                                      		                 				}else if($scc == 'bg-danger'){
                                      		                 					?>$('#bg-danger').attr('checked',true); <?php
				                                      		               	}else if($scc == 'bg-warning'){
				                                      		               		?>$('#bg-warning').attr('checked',true); <?php
				                                      		                }else if($scc == 'bg-primary'){
				                                      		                	?>$('#bg-primary').attr('checked',true); <?php
				                                      		                }else if($scc == 'bg-success'){
				                                      		                	?>$('#bg-success').attr('checked',true); <?php
				                                      		                }
                                      		                 			 ?>



                                      		                 			});
                                      		                 			  
                                      		                 		      	
                                      		                 		</script>
                                      		                 		<?php

                                      		                 	

                                      					
                                      		                 }
                                      		          
                                      		 ?>
                                <marquee behavior="scroll" direction="left" id="runningannouncment" class="<?php echo $scc ?> py-2 text-light" >
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

                                  </marquee>
                                   <div class="" style="text-align: center;">
                                   
                                  <h6 style="font-size: 13px">Modify Background color :</h6>
                                 
                                   
                                  <label class="mr-4">
                                      
                                      <input type="radio" name="acolor" id="bg-info" >
                                      <span class="bg-info " style="padding:5px 15px;border-radius: 30px;margin-left: 5px;"></span>
                                  </label>

                                   <label class="mr-4">
                                      
                                      <input type="radio" name="acolor" id="bg-danger">
                                      <span class="bg-danger " style="padding:5px 15px;border-radius: 30px;margin-left: 5px;"></span>
                                  </label>


                                   <label class="mr-4">
                                      
                                      <input type="radio" name="acolor" id="bg-warning" >
                                      <span class="bg-warning " style="padding:5px 15px;border-radius: 30px;margin-left: 5px;"></span>
                                  </label>

                                   <label class="mr-4">
                                      
                                      <input type="radio" name="acolor" id="bg-primary">
                                      <span class="bg-primary " style="padding:5px 15px;border-radius: 30px;margin-left: 5px;"></span>
                                  </label>
                                  <label class="mr-4">
                                      
                                      <input type="radio" name="acolor" id="bg-success" >
                                      <span class="bg-success " style="padding:5px 15px;border-radius: 30px;margin-left: 5px;"></span>
                                  </label>

                                  </div> 
                            </div> 
                            
                         </div> 
                         
                         <script type="text/javascript">
                         		$(document).ready(function() {

                         			$('#bg-info').click(function() { 
                         				$('#runningannouncment').addClass('bg-info');
                         				$('#runningannouncment').removeClass('bg-danger');
                         				$('#runningannouncment').removeClass('bg-warning');
                         				$('#runningannouncment').removeClass('bg-primary');
                         				$('#runningannouncment').removeClass('bg-success');
                         				
                         				var color ="bg-info";
                         				 
                         				   $.ajax({
                         				           url : "action.php",
                         				            method: "POST",
                         				             data  : {changecoloraa:1,color:color},
                         				             success : function(data){
                         				
                         				             }
                         				          })
                         				     
                         				    

                         			
                         			})

                         			$('#bg-danger').click(function() { 
                         				$('#runningannouncment').removeClass('bg-info');
                         				$('#runningannouncment').addClass('bg-danger');
                         				$('#runningannouncment').removeClass('bg-warning');
                         				$('#runningannouncment').removeClass('bg-primary');
                         				$('#runningannouncment').removeClass('bg-success');

                         				var color ="bg-danger";
                         				 
                         				   $.ajax({
                         				           url : "action.php",
                         				            method: "POST",
                         				             data  : {changecoloraa:1,color:color},
                         				             success : function(data){
                         				
                         				             }
                         				          })

                         			
                         			})

                         			$('#bg-warning').click(function() { 
                         				$('#runningannouncment').removeClass('bg-info');
                         				$('#runningannouncment').removeClass('bg-danger');
                         				$('#runningannouncment').addClass('bg-warning');
                         				$('#runningannouncment').removeClass('bg-primary');
                         				$('#runningannouncment').removeClass('bg-success');

                         				var color ="bg-warning";
                         				 
                         				   $.ajax({
                         				           url : "action.php",
                         				            method: "POST",
                         				             data  : {changecoloraa:1,color:color},
                         				             success : function(data){
                         				
                         				             }
                         				          })

                         			
                         			})

                         			$('#bg-primary').click(function() { 
                         				$('#runningannouncment').removeClass('bg-info');
                         				$('#runningannouncment').removeClass('bg-danger');
                         				$('#runningannouncment').removeClass('bg-warning');
                         				$('#runningannouncment').addClass('bg-primary');
                         				$('#runningannouncment').removeClass('bg-success');

                         				var color ="bg-primary";
                         				 
                         				   $.ajax({
                         				           url : "action.php",
                         				            method: "POST",
                         				             data  : {changecoloraa:1,color:color},
                         				             success : function(data){
                         				
                         				             }
                         				          })

                         			
                         			})

                         			$('#bg-success').click(function() { 
                         				$('#runningannouncment').removeClass('bg-info');
                         				$('#runningannouncment').removeClass('bg-danger');
                         				$('#runningannouncment').removeClass('bg-warning');
                         				$('#runningannouncment').removeClass('bg-primary');
                         				$('#runningannouncment').addClass('bg-success');

                         				var color ="bg-success";
                         				 
                         				   $.ajax({
                         				           url : "action.php",
                         				            method: "POST",
                         				             data  : {changecoloraa:1,color:color},
                         				             success : function(data){
                         				
                         				             }
                         				          })


                         			
                         			})
                         			
                         		});
                         	      
                               	
                         </script>