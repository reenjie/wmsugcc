<button class="btn btn-light text-secondary backtoform mb-4" style="font-size: 12px;">Back to Forms</button>



    
    <div class="row">
        <div class="col-md-4">
            <h6 style="font-size:12px">Year</h6>
              <select class="form-select mb-2 text-primary" id="year_"  style="font-size:12px;width: 200px;">
                                  
                                        <?php 
                                         if(isset($_POST['sort'])){
                                             $sort = $_POST['sort'];
                                             echo '<option value="'.$sort.'">'.$sort.'</option>';
                                         }

                                        $current_year = date('Y');
                                        for($i = $current_year; $i >= 2020 ; $i-- ){

                                          ?>
                                          <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                          <?php

                                        }

                                     

                                         ?>

              </select>
            

        </div>
        <div class="col-md-4">
              <h6 style="font-size:12px" class="">Semester</h6>
              <select class="form-select text-primary" id="semester_"  style="font-size:12px;width:200px">
                            <?php
                             if(isset($_POST['sem'])){
                                             $sem = $_POST['sem'];

                                                 if($sem == 'summer'){
                                ?>
                                 <option value="<?php echo $sem ?>">SUMMER</option>
                                <?php
                            }else if ($sem == '1stsem'){
                                 ?>
                                 <option value="<?php echo $sem ?>">FIRST SEMESTER</option>
                                <?php
                            }else {
                                 ?>
                                 <option value="<?php echo $sem ?>">SECOND SEMESTER</option>
                                <?php
                            }


                                       
                                 }else {

                                        if($_SESSION['sem'] == 'summer'){
                                ?>
                                 <option value="<?php echo $_SESSION['sem'] ?>">SUMMER</option>
                                <?php
                            }else if ($_SESSION['sem'] == '1stsem'){
                                 ?>
                                 <option value="<?php echo $_SESSION['sem'] ?>">FIRST SEMESTER</option>
                                <?php
                            }else {
                                 ?>
                                 <option value="<?php echo $_SESSION['sem'] ?>">SECOND SEMESTER</option>
                                <?php
                            }

                                 }
 


                        

                             ?>

                                   
                                      <option value="summer">SUMMER</option>
                                      <option value="1stsem">FIRST SEMESTER</option>
                                      <option value="2ndsem">SECOND SEMESTER</option>
                                  </select>
        </div>

    </div>

  

	<table class="table table-sm" style="font-size:13px">
  <thead>
   
                                 <th scope="col" class="stathead">Status</th>
                                 <th scope="col">

                                 </th>
                                   <th scope="col">From</th>
                                   <th scope="col">To</th>
                                  <th scope="col"></th>
                                  
  </thead>
  <tbody>
   <?php 
   $id = $_SESSION['user_student_token_check'];
   if(isset($_POST['sort'])){
    $sort = $_POST['sort'];
    $sem = $_POST['sem'];

  


     $getstudent_data = "select * from shifting_history where stud_id = '$id' and year(datecreated) = '$sort' and semester = '$sem'   ";
   }else {
    $yearnow = date('Y');
    $sem = $_SESSION['sem'];
     $getstudent_data = "select * from shifting_history where stud_id = '$id' and year(datecreated) = '$yearnow' and semester = '$sem'  ";
   }



     
                                $shiftingrecords = mysqli_query($con,$getstudent_data); 
                               $count= mysqli_num_rows($shiftingrecords);
                                    
                                      if($count >=1){

                                        
                               while($row = mysqli_fetch_array($shiftingrecords)){
                                $status = $row['status'];
                                $hist = $row['sh_id'];
                                $reasons = $row['reason'];

                                          $sql = " SELECT * FROM `student` where stud_id = '$id' ";
                      $result = mysqli_query($con,$sql); 
                   
                    
                
                     
                       while($rows = mysqli_fetch_array($result)){
                          $studentid = $rows['stud_id'];
                          $student_lname = $rows['stud_lname'];
                          $student_fname = $rows['stud_fname'];
                          $student_mname = $rows['stud_mname'];
                          $student_email = $rows['stud_email'];
                            $student_course = $rows['stud_course'];
                             $stud_coll = $rows['stud_college'];

                          $student_Fullname = $student_lname.' '.$student_fname.' '.$student_mname;
                         $studemail = substr($student_email, 0, strpos($student_email,'@'));

                     }


                                        ?>
                                        <tr>
                                                <td> 

                                                    <?php 
                                                    if($status == 'Declined'){
                                                         ?>
                                                         <span class="badge badge-danger"><?php echo $row['status'] ?></span>
                                                        <?php
                                                    }else if($status == 'processing') {
                                                        ?>
                                                         <span class="badge badge-warning"><?php echo $row['status'] ?></span>
                                                        <?php
                                                    }else {
                                                             ?>
                                                         <span class="badge badge-success"><?php echo $row['status'] ?></span>
                                                        <?php
                                                    }

                                                     ?>
                                                   </td>
                                                   <td>
                                                    <?php 
                                                    if($status == 'Approved'){
                                                          ?>
                                                         <a  class="page-link text-success " href="session.php?approved&sftoken=60&studenttokenid=<?php echo $id ?>&studentname=<?php echo  $student_Fullname ?>&status=2&hist=<?php echo $hist ?>&from=<?php echo $row['from_course'] ?>&to=<?php echo $row['to_course'] ?>&fromcollege=<?php echo $row['from_'] ?>&tocollege=<?php echo $row['to_'] ?>" target="_blank"  style="font-size: 12px" data-bs-toggle="tooltip" data-bs-placement="right" title="Generated Shifting Form Editable" >Generated Shifting Form  (Automated)</a>

                                                        <?php
                                                    }else if($status == 'Declined') {

                                                          ?>
                                                        
                                                      <a class="btn btn-light text-danger" style="font-size:12px" data-toggle="collapse" href="#collapseExample<?php echo $hist?>" role="button" aria-expanded="false" aria-controls="collapseExample<?php echo $hist?>">
                                                       REASONS <i class="fas fa-angle-down"></i>
                                                      </a>
                                                    
                                                  
                                                    <div class="collapse" id="collapseExample<?php echo $hist?>">
                                                      <div class="card card-body">
                                                          <ul>
                                                            <?php 
                                                            $thereasons = explode(',', $reasons);

                                                           foreach ($thereasons as $key => $value) {
                                                                switch ($value) {
                                                                    case '1':
                                                                       echo '<li>Did not meet the grade requirements</li>';
                                                                        break;
                                                                     case '2':
                                                                          echo '<li>Did not meet other requirements</li>';
                                                                        break;
                                                                         case '4':
                                                                          echo '<li>No Vacant Slot</li>';
                                                                        break;
                                                                         case '5':
                                                                           echo '<li>Failed in Interview</li>';
                                                                        break;
                                                                    
                                                                  
                                                                }
                                                           }

                                                             ?>
                                                              
                                                         </ul>

                                                      </div>
                                                    </div>
                                                       
                                                        
                                                      <!--   <a  class="page-link text-success " href="session.php?approved&sftoken=60&studenttokenid=<?php echo $id ?>&studentname=<?php echo  $student_Fullname ?>&status=6&hist=<?php echo $hist ?>&from=<?php echo $row['from_course'] ?>&to=<?php echo $row['to_course'] ?>&fromcollege=<?php echo $row['from_'] ?>&tocollege=<?php echo $row['to_'] ?>" target="_blank"  style="font-size: 12px" data-bs-toggle="tooltip" data-bs-placement="right" title="Generated Shifting Form Editable" >Generated Shifting Form  (Automated)</a> -->

                                                        <?php

                                                    }else if ($status == 'processing'){
                                                             $check_if_sfgenerated = "select * from sf_content where sfs in (select sh_id from shifting_history where sh_id ='$hist')  ";
                                                         $checkingsf = mysqli_query($con,$check_if_sfgenerated); 
                                                         $counting_ifexist= mysqli_num_rows($checkingsf);
                                                     
                                                        if($counting_ifexist >=1){
                                                            ?>
                                                         <a  class="page-link text-success " href="session.php?approved&sftoken=60&studenttokenid=<?php echo $id ?>&studentname=<?php echo  $student_Fullname ?>&status=1&hist=<?php echo $hist ?>&from=<?php echo $row['from_course'] ?>&to=<?php echo $row['to_course'] ?>&fromcollege=<?php echo $row['from_'] ?>&tocollege=<?php echo $row['to_'] ?>" target="_blank"  style="font-size: 12px" data-bs-toggle="tooltip" data-bs-placement="right" title="Generated Shifting Form Editable" >Generated Shifting Form  (Automated)</a>

                                                        <?php
                                                  
                                                      
                                                       }else {
                                                        ?>
                                                        <span class="text-danger btn" style="font-size:12px;font-weight: bolder;">NOT yet or No Generated Shifting Form</span>
                                                        <?php
                                                       }
                                                    }

                                                     ?>
                                                      
                                                   </td>
                                                <td><?php echo $row['from_college'] ?></td>
                                                <td><?php echo $row['to_college'] ?></td>
                                                <td>
                                                    
                                                  
  <a class="btn btn-light text-primary" style="font-size:12px" data-toggle="collapse" href="#details<?php echo $hist?>" role="button" aria-expanded="false" aria-controls="collapseExample">
   More Details..
  </a>


<div class="collapse" id="details<?php echo $hist?>">
  <div class="card card-body">
        
        <h6 style="font-weight:bolder; font-size: 12px; ">
            Date-Submitted : <br> <span style="font-weight:normal;"><?php echo date('F j',strtotime($row['datecreated'])) ?></span> <br><br>
            Year :  <br> <span style="font-weight:normal;"><?php echo date('Y',strtotime($row['datecreated'])) ?></span> 

            <br><br>
            <?php 
            if($row['semester'] == 'summer'){
                echo 'SUMMER';
            }else if ($row['semester'] == '1stsem'){
                echo 'FIRST SEMESTER';
            }else {
                echo 'SECOND SEMESTER';
            }

             ?>
        </h6>





  </div>
</div>  


                                                </td>
                                               

                                        </tr>

                                        <?php               
                                   }

                    }else {
                      ?>
                      <tr>
                          <td colspan="5"><h6 style="font-size:12px;text-align:center;">No Records Found.</h6></td>

                      </tr>
                      <?php
                    }
                              


    ?>
  </tbody>
</table>