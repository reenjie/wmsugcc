  
   <div class="container ">

       <div class="card">
          <div class="card-body">

           
             <div class="container">
            
               <hr>

                 <div class="container">

                   <div class="row">
                      <div class="col-md-2"></div> 
                       <div class="col-md-4">
                        
                           <h6 style="font-weight: bold; user-select: none;" class="text-primary mb-4">All events</h6>
               
              
              
               <?php 
                     date_default_timezone_set('Asia/Manila');
                     $datenow = date('Y-m-d');

                          $lookforevents = " SELECT * FROM `events` where status = 0 ";
                                      $resultlooks = mysqli_query($con,$lookforevents); // run query
                                      $countevs= mysqli_num_rows($resultlooks); // to count if necessary
                                     //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
                                   if ($countevs>=1){
                                    //while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                                       while($row = mysqli_fetch_array($resultlooks)){
                                ?>
                        
                     
                        <div class="card shadow mb-2" style="width: auto">
                           <div class="card-body">
                             <span style="font-size: 13px;font-weight: bold"><?php echo date('F j, Y',strtotime($row['start']))  ?></span>
                             <br>
                             <h6 style="color:<?php echo $row['bgcolor'] ?> " style="font-size: 15px"><?php echo $row['title'] ?></h6>
                           </div> 
                           
                        </div> 
                        
                                <?php
                                       }
                                }else {
                                  ?>
                                <div class="card">
                                      <div class="card-body">
                                             <h6 class="text-secondary" style="font-size: 14px">NO EVENTS</h6>
                                      </div> 
                                      
                                   </div> 
                                  <?php
                                }

                   ?>

                 


           


                       </div> 

                        <div class="col-md-4">
                           <h6 style="font-weight: bold; user-select: none;" class="text-primary mb-4">Todays Event</h6>

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
                        <div class="card shadow" >
                          
                        <div class="card-body" style="text-align: center;">
                           <span style="font-size: 13px;font-weight: bold"><?php echo date('F j, Y',strtotime($row['start']))  ?></span><br>

                            <span style="font-size: 15px; font-weight: bolder;text-align: center;color: <?php echo $row['bgcolor'] ?>"><?php echo $row['title'] ?></span>
                        </div>
                      </div>
                      <p></p>
                                <?php
                                       }
                                }else {
                                  ?>
                                <div class="card">
                                      <div class="card-body">
                                             <h6 class="text-secondary" style="font-size: 14px">NO EVENTS</h6>
                                      </div> 
                                      
                                   </div> 
                                  <?php
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