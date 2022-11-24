   <div class="container ">

       <div class="card">
          <div class="card-body">

           
             <div class="container">
               
               <hr>

                 <div class="container">

                   <div class="row">
                      <div class="col-md-2"></div> 
                       <div class="col-md-8">
                         <h6 style="font-weight: bold; user-select: none" class="text-primary mb-4">Shifting Form</h6>
                        

                          <h6>
                                <?php

              $sql = " select * from form_classification where csform_id = 60 ";
                            $result = mysqli_query($con,$sql); 
                           
                             while($row = mysqli_fetch_array($result)){
                             
                               $isenabled = $row['isenabled'];


                             }

                             if($isenabled == 1){
                              echo 'The Shifting form is not available';
                             }else {
                                echo '  This is accessible if Signed in .
                                 <br>


                              Please <span class="text-info">Sign In  </span> using your WMSU account

                              <br><br>

                              <span class="mt-5">
                                <a href="javascript:void(0)" data-toggle="modal" data-target="#loginmodal">SIGN IN</a>
                              </span>


                                ';
                             }
                             
                          

                             
              ?>  
                              
                            

                          </h6>



                
                        
                    


           


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