
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary d-none" id="guide" data-toggle="modal" data-target="#usergreetings_guide" >
        Launch demo modal
      </button>
      
      <!-- Modal -->
      <div class="modal fade" id="usergreetings_guide" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            
            <div class="modal-body shadow" style="font-size: 14px">
               <div class="container ">
                    <h6 class="shadow-sm" style="text-transform: uppercase;">GOOD DAY! <br>
                <span>
                 <?php 
                                $usertoken = $_SESSION['user_student_token_check'];
                                $sql = " select * from student where stud_id = '$usertoken'  ";
                                                $result = mysqli_query($con,$sql); // run query
                                                
                                                 while($row = mysqli_fetch_array($result)){
                                      
                                    $lname = $row['stud_lname'];
                                    $fname = $row['stud_fname'];
                                    $mname = $row['stud_mname'];
                                echo $row['stud_fname'].',';
                                 

                                      
                                                 }
                                          

                                 ?>
                                 </span>

              </h6>

              <h6 style="font-size: 14px;" class="mt-3">
                 MUST KNOW : 
               <textarea class="" rows="15" style="resize: none;border: none; outline:none;background-color: transparent; width:100%" readonly><?php 
                                $sql = " SELECT * FROM `announcement` where stat = 1 ";
                            $result = mysqli_query($con,$sql);
                           
                          
                             while($row = mysqli_fetch_array($result)){
                                echo $row['content'];
                             }

                 ?></textarea>
              </h6>
               </div> 
               
            
             <hr>
               <button type="button" class="btn btn-light" style="font-size:12px" data-dismiss="modal">Close</button>
      
             
            </div>
        
          </div>
        </div>
      </div>
      <script src="../js/jquery.js"></script>
     
      <script type="text/javascript">
        $(document).ready(function() {
             $('#guide').click();
            
        });
     
        
              
      </script>
