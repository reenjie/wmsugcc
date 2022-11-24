<div class="container ">

       <div class="card">
          <div class="card-body">

            <style type="text/css">
              .staffs:hover {
             background-color:#dbe6f2;
              }
            </style>
           
             <div class="container">
                <h6 style="font-weight: bold; user-select: none" class="text-primary mb-4">Guidance and Counseling Center Personnels and College Guidance Coordinators</h6>
               <hr>
                <div class="row">
                   <div class="col-md-2"></div> 
                    
                    <div class="col-md-8">
                         <div class="row" >

                  
                
                   


                   
                      
                     
                         <?php 
                          //
 
          $sql = "SELECT * FROM `pages` where type =1 order by display_order asc  ";
                      $result = mysqli_query($con,$sql); 
                   
                       while($row = mysqli_fetch_array($result)){
                       
                        $photo = $row['photo'];

                        if($photo == '' || $photo == NULL) {
                          $src = 'GCC/img/undraw_profile_pic_ic5t.png';
                        }else {
                          $src = 'GCC/img/uploads/'.$photo;
                        }

                        ?> 
                         <div class="col-md-4" style="text-align: center;">
                           
                         <div class="card mb-2 shadow staffs" style="height: 300px">
                            <div class="card-body">
                                  <img src="<?php echo $src ?>" class="mt-4" style="width: 120px;height: 120px;border-radius: 100px" class=""><br style="user-select: none">
                  <span style="font-size: 12px;font-weight: bolder" class="mb-4">
                   <?php echo $row['fullname'] ?>
                        <br>
                  <span style="font-weight: normal;"><?php echo $row['pos'] ?></span>
                  </span>

                            </div> 
                            
                         </div> 
                         </div> 
                         
                       
                        <?php
                       }
                

                     ?>
   


                       </div> 
                    </div> 
                    
                     <div class="col-md-2"></div> 

                </div> 
                
              
                       
                      
                   </div> 
                   
                  
                 </div> 
                 

             



                <hr>
                <div class="" style="text-align: center;"> 
                
              
                </div>
             </div> 
             

            
          </div>  
       