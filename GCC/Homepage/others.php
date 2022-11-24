  <div class="card-body">
               <div class="card shadow">
                                    <div class="card-body">
                                   
                                           <div class="card shadow">
                                             <div class="card-body">
                                                  <div class="row">
                                                     <div class="col-sm-6">
                                                        
                                                        <?php 
                                                            $sqlothers = " SELECT * FROM `others`  ";
                                                                        $resultothers = mysqli_query($con,$sqlothers); // run query
                                                                        $countothers= mysqli_num_rows($resultothers); // to count if necessary
                                                                       //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
                                                                     if ($countothers>=1){
                                                                       //while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                                                                         while($row = mysqli_fetch_array($resultothers)){
                                                                          ?>
                                                      <div class="row mt-2">
                                                           <div class="card" style="width: 100%">
                                                           
                                                          <div class="card-body">
                                                            <h5 class="card-title">
                                                               <textarea row="10" class="text-secondary txtareatitle" data-tid="<?php echo $row['oidd'] ?>"  style="width: 100%;outline: none;border: none" ><?php echo $row['title'] ?></textarea>
                                                            </h5>
                                                            <p class="card-text">
                                                              <textarea row="10" class="text-secondary txtareafeature" data-tid="<?php echo $row['oidd'] ?>" style="width: 100%;outline: none;border: none;" ><?php echo $row['feature'] ?></textarea>


                                                            </p>
                                                            <a    class="btn btn-link "><input type="text" name="" data-tid="<?php echo $row['oidd'] ?>" style="outline: none;border: none;background-color: transparent;text-align: center;" class="text-primary btnnametxt" value="<?php echo $row['btnname'] ?>"></a>
                                                              <label>Redirect to :</label>
                                                            <input type="text" name="" class="form-control linksred" data-tid="<?php echo $row['oidd'] ?>" value="<?php echo $row['btnlink'] ?>">
                                                          
                                                          
                                                          </div>
                                                          </div> 
                                                         </div> 
                                                                          <?php
                                                                         }
                                                                  }

                                                         ?>
                                                       

                                                 
                                                         

                                                     </div> 
                                                     <div class="col-sm-6">
                                                       
                                                       <div class="card shadow">
                                                          <div class="card-body">
                                                          
                                                            <div class="month">
  <ul>
  <a href="../Calendar/" style="text-decoration: none">
  <li>Manage<br><span style="font-size:18px">Calendar</span> Click here</li>
  </a>
  </ul>
</div>

<ul class="weekdays">
  <li>Mo</li>
  <li>Tu</li>
  <li>We</li>
  <li>Th</li>
  <li>Fr</li>
  <li>Sa</li>
  <li>Su</li>
</ul>

<ul class="days">
  <li>1</li>
  <li>2</li>
  <li>3</li>
  <li>4</li>
  <li>5</li>
  <li>6</li>
  <li>7</li>
  <li>8</li>
  <li>9</li>
  <li><span>10</span></li>
  <li>11</li>
  <li>12</li>
  <li>13</li>
  <li>14</li>
  <li>15</li>
  <li>16</li>
  <li>17</li>
  <li>18</li>
  <li>19</li>
  <li>20</li>
  <li>21</li>
  <li>22</li>
  <li>23</li>
  <li>24</li>
  <li>25</li>
  <li>26</li>
  <li>27</li>
  <li>28</li>
  <li>29</li>
  <li>30</li>
  <li>31</li>


 
</ul>
                                                          </div> 
                                                          
                                                       </div> 
                                                       

                                                     </div> 
                                                     
                                                  </div> 
                                                  
                                             </div> 
                                             
                                          </div> 
                                          

                                      
                                    </div> 
                                    
                                 </div> 
      </div>

          <div class="fixed-bottom d-none" id="alertosaves" >
                      <div class="alert alert-success" style="right: 0;width: auto;float: right;"  role="alert">
             <span style="font-size: 13px">Saving inputs  <i class="fas fa-circle-notch fa-spin"></i></span>
            </div>
                       
                     </div> 

      <script type="text/javascript">
        
        $(document).ready(function() {
                $('.txtareatitle').keyup(function(){ 
                  var tid = $(this).data('tid');
                  var val = $(this).val();
                  
                  
                     $.ajax({
                             url : "action.php",
                              method: "POST",
                               data  : {changetitle:1,val:val,tid:tid},
                               success : function(data){
                      $('#alertosaves').removeClass('d-none');
        const inss = setInterval(function(){
        $('#alertosaves').addClass('d-none');
          clearInterval(inss);
        },1000);
                               }
                            })
                      
                      
                
                })

                
                $('.txtareafeature').keyup(function(){ 
                  var tid = $(this).data('tid');
                  var val = $(this).val();
                  
                  
                     $.ajax({
                             url : "action.php",
                              method: "POST",
                               data  : {changefeature:1,val:val,tid:tid},
                               success : function(data){
                      $('#alertosaves').removeClass('d-none');
        const inss = setInterval(function(){
        $('#alertosaves').addClass('d-none');
          clearInterval(inss);
        },1000);
                               }
                            })
                      
                      
                
                })

                

                 $('.btnnametxt').keyup(function(){ 
                  var tid = $(this).data('tid');
                  var val = $(this).val();
                  
                  
                     $.ajax({
                             url : "action.php",
                              method: "POST",
                               data  : {changebtnname:1,val:val,tid:tid},
                               success : function(data){
                      $('#alertosaves').removeClass('d-none');
        const inss = setInterval(function(){
        $('#alertosaves').addClass('d-none');
          clearInterval(inss);
        },1000);
                               }
                            })
                      
                      
                
                })

                 

                  $('.linksred').keyup(function(){ 
                  var tid = $(this).data('tid');
                  var val = $(this).val();
                  
                  
                     $.ajax({
                             url : "action.php",
                              method: "POST",
                               data  : {changelinks:1,val:val,tid:tid},
                               success : function(data){
                    $('#alertosaves').removeClass('d-none');
        const inss = setInterval(function(){
        $('#alertosaves').addClass('d-none');
          clearInterval(inss);
        },1000);
                               }
                            })
                      
                      
                
                })
              });      
              
      </script>