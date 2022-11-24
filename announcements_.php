


   <div class="container ">

       <div class="card">
          <div class="card-body">

           
             <div class="container">
              
               <hr>

                 <div class="container">
                   <div class="row">
                      <div class="col-md-2"></div> 
                       <div class="col-md-8">
                         <h6 style="font-weight: bold; user-select: none" class="text-primary mb-4">Announcements <i class="fas fa-bullhorn"></i></h6>
                          
          	<?php 
					$announcement = " SELECT * FROM `announcement` where stat = 0 order by datecreated desc ";
			                $resultaa = mysqli_query($con,$announcement); // run query
			                $countaa= mysqli_num_rows($resultaa); // to count if necessary
			               //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
			             if ($countaa>=1){
			             	//while($row = mysqli_fetch_array($result)){} is where we output all the data in database
			                 while($row = mysqli_fetch_array($resultaa)){
			                 
								?>

								 <div class="card shadow mb-2">
             					 	 <div class="card-body">
             					 	 	<span style="font-size: 12px;font-weight: bolder"><?php echo date('F d,Y l',strtotime($row['datecreated'])) ?></span><br>
             					 	 	<?php 
             					 	 	echo $row['content'];
             					 	 	 ?>
             					 	 </div> 
             					 	 
             					 </div> 
								<?php
			                 }
			          }
			 ?>


             					
             					 
                       </div> 
                        <div class="col-md-2"></div> 
                      
                   </div> 
                   
                  
                 </div> 
                 

             



                <hr>
                <div class="" style="text-align: center;"> 
                
              
                </div>
             </div> 
             

            
          </div>  
       </div> 
       

     
   </div>