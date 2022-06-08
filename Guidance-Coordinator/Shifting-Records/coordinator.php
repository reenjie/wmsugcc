               
                                             <tr id="tablerows<?php echo $studentid ?>" class="tablerows">
                                  <td>
                                    <?php 
                                     if($stat == 1 || $stat == 2 || $stat == 3){ 
                                         ?>

                                          <div class="custom-control custom-checkbox" >
                                  <input type="checkbox" disabled  class="custom-control-input " id="customCheck<?php echo $studentid ?>"  name="check[]" data-pdsid="<?php  echo $studentid;?>" value="<?php echo $studentid ?>"  >
                                  <input type="hidden" name="collegetoshift[]" value="<?php echo $CollegeId ?>">
                                  <input type="hidden" name="kurso[]" value="<?php echo $kurso ?>">
                                  <input type="hidden" name="sh[]" value="<?php echo $hist ?>">
                                  <label style="cursor: not-allowed;" class="custom-control-label" for="customCheck<?php echo $studentid ?>" ></label>
                                </div>

                                      <?php

                                     }else {

                                      /*  if(isset($_SESSION['noesign'])){
                                             ?>

                                          <div class="custom-control custom-checkbox" >
                                  <input type="checkbox" disabled  class="custom-control-input checkall" id="customCheck<?php echo $studentid ?>"  name="check[]" data-pdsid="<?php  echo $studentid;?>" value="<?php echo $studentid ?>"  >
                                  <input type="hidden" name="collegetoshift[]" value="<?php echo $CollegeId ?>">
                                  <input type="hidden" name="kurso[]" value="<?php echo $kurso ?>">
                                  <input type="hidden" name="sh[]" value="<?php echo $hist ?>">
                                  <label style="cursor: not-allowed;" class="custom-control-label" for="customCheck<?php echo $studentid ?>" ></label>
                                </div>

                                      <?php
                                        } */
                                            ?>

                                          <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input checkall" id="customCheck<?php echo $studentid ?>"  name="check[]" data-pdsid="<?php  echo $studentid;?>" value="<?php echo $studentid ?>"  >
                                  <input type="hidden" name="collegetoshift[]" value="<?php echo $CollegeId ?>">
                                  <input type="hidden" name="kurso[]" value="<?php echo $kurso ?>">
                                  <input type="hidden" name="sh[]" value="<?php echo $hist ?>">
                                  <label class="custom-control-label" for="customCheck<?php echo $studentid ?>" ></label>
                                </div>

                                      <?php

                                        


                                    
                                     }

                                     ?>
                                
                                  </td>
                                   <td>
                                    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">


                                      <?php



                                      if($stat == 1){
                                     
                                      }else if ($stat == 2){
                                          ?>
                                    <!--  <span style="margin-right: 40px" class="badge text-success">Accomplished <i class="fas fa-check-circle"></i></span>--> 

                                      <script type="text/javascript">
                                        
                                        $(document).ready(function() {
                                                $('#customCheck<?php echo $studentid ?>').removeAttr('name');
                                                $('#sf<?php echo $studentid  ?>').hide();
                                                $('#not<?php echo $studentid ?>').hide();
                                              });      
                                              
                                      </script>
                                      <?php  

                                      } else if ($stat == 3){

                                      }


                                      else {
                                        /*if(isset($_SESSION['noesign'])){

                                            ?>
                                        <button class="btn btn-light text-secondary  " data-sid = "<?php echo $studentid  ?>" type="button" style="font-size: 12px;cursor:not-allowed" data-course="<?php echo $kurso ?>" data-sh = "<?php echo $hist?>" data-college="<?php echo $CollegeId ?>" >Approve</button>

                                          <button class="btn btn-light text-secondary " data-sid = "<?php echo $studentid  ?>" type="button" style="font-size: 12px;cursor:not-allowed" data-course="<?php echo $kurso ?>" data-name="<?php echo $student_Fullname ?>" data-college="<?php echo $CollegeId ?>" >Decline</button>
                                       <?php

                                        }*/

                                            ?>
                                        <button class="btn btn-light text-success approvedstudent" data-sid = "<?php echo $studentid  ?>" type="button" style="font-size: 12px" data-course="<?php echo $kurso ?>" data-sh = "<?php echo $hist?>" data-college="<?php echo $CollegeId ?>" >Approve</button>

                                          <button class="btn btn-light text-danger declinestudent" data-sid = "<?php echo $studentid  ?>" type="button" style="font-size: 12px" data-course="<?php echo $kurso ?>" data-name="<?php echo $student_Fullname ?>" data-college="<?php echo $CollegeId ?>" >Decline</button>
                                       <?php

                                        

                                       
                                      }




                                     


                                       ?>

                                     <!--   <button type="button" class="btn btn-light text-success " id="sf<?php echo $studentid  ?>" style="font-size: 12px" data-bs-toggle="tooltip" data-bs-placement="right" title="Generated Shifting Form" onclick="window.open('sf.php?student-sf&sftoken=<?php echo $formid?>&studenttokenid=<?php echo $studentids ?>&studentname=<?php echo  $student_Fullname ?>')">SF</button>
                           

                          <button type="button" class="btn btn-light" onclick="window.open('view.php?student-pds&pdstoken=<?php echo $formid?>&id=<?php echo $studentid?>&studenttokenid=<?php echo $studentids ?>')" style="font-size: 12px"><i class="far fa-eye text-primary"></i></button>
                          <button type="button" class="btn btn-light" onclick="window.open('print.php?student-pds&pdstoken=<?php echo $formid?>&id=<?php echo $studentid?>&studenttokenid=<?php echo $studentids ?>')" style="font-size: 12px"><i class="fas fa-print text-info"></i></button>

                             <button type="button" class="btn btn-light pdsdetails" data-fullname="<?php echo $student_lname.' '.$student_fname.' '.$student_mname  ?>" data-email ="<?php echo $student_email  ?>" data-submitted= "<?php echo $respo ?>"   data-toggle="modal" data-target="#details" data-backdrop="static" data-keyboard="false" style="font-size: 12px"><i class="fas fa-info-circle text-secondary"></i></button>-->

                            


                                        
                                      <button type="button" style="font-size: 12px" class="btn btn-light text-primary" data-toggle="modal" data-target=".bd-example-modal-sm<?php echo $studentid  ?>">View</button>
                                    
                                      <div class="modal fade bd-example-modal-sm<?php echo $studentid  ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-sm modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-body">
                                <button type="button" class="close mb-5" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>

                                  
                                   <div class="container">
                                    <h6 style="font-weight: bolder;"><span class="text-success" style="font-size: 12px">Viewing.. </span> <br><?php echo $student_lname.' '.$student_fname.' '.substr($student_mname,0,1).'.'; ?> </h6>

                                      <a class="page-link text-warning " data-csformid = "<?php echo $csform ?>" data-studentid="<?php echo $studentid ?>" data-studname = "<?php echo $student_lname.' '.$student_fname.' '.$student_mname.'.' ?>" href="student_record.php?id=<?php echo $studentid ?>" style="font-size: 12px"  data-shift="<?php echo $coursetoshift ?>">Shifting Records 
                                        <?php 

                                      $getalldata = "select * from shifting_history where stud_id = '$studentid'  ";
                               $shiftingdata = mysqli_query($con,$getalldata); 
                               $countsh= mysqli_num_rows($shiftingdata);
                               //$newlyinsertedid = mysqli_insert_id($con);
                              if($countsh >=1){
                             while($getsh = mysqli_fetch_array($shiftingdata)){
                                        
                               }
                                echo '<span class="badge bg-danger">'.$countsh.'</span>';
                             }

                                       ?>

                                        </a> 

                                        <?php 
                                                 foreach ($idforfiles as $key => $value) {
                                                  $getfileifexist = " select * from form where form_id = '$value' and type = 'file'  ";
                                                                $gettingfiles = mysqli_query($con,$getfileifexist); 
                                                                $countingifexist= mysqli_num_rows($gettingfiles);
                                                               //  $get_id =  mysqli_insert_id($con); 
                                                         if ($countingifexist>=1){
                                                              
                                                             $fileexist=1;

                                                           
                                                                
                                                          }else {

                                                          }
                                                }
                                                   

                                                if(isset($fileexist)){
                                                  
                                                    include 'files.php';

                                                }


                                     ?> 


                                      <!--href="view.php?student-pds&pdstoken=<?php echo $formid?>&id=<?php echo $studentid?>&studenttokenid=<?php echo $studentids ?>"-->

                                     


                                      <a class="page-link preview" data-csformid = "<?php echo $csform ?>" data-studentid="<?php echo $studentid ?>" data-studname = "<?php echo $student_lname.' '.$student_fname.' '.$student_mname.'.' ?>" style="font-size: 12px" href="view.php?student-pds&pdstoken=<?php echo $formid?>&id=<?php echo $studentid?>&studenttokenid=<?php echo $studentids ?>" data-shift="<?php echo $coursetoshift ?>">View Shifting Profile </a>  

                                      <a class="page-link text-info " style="font-size: 12px" href="print.php?student-pds&pdstoken=<?php echo $formid?>&id=<?php echo $studentid?>&studenttokenid=<?php echo $studentids ?>">Print Shifting Profile</a>


                                      
                                  

                                        <!--<a  class="page-link text-success " href="sf_edit.php?student-sf&sftoken=60&studenttokenid=<?php echo $studentid ?>&studentname=<?php echo  $student_Fullname ?>" target="_blank" style="font-size: 12px" data-bs-toggle="tooltip" data-bs-placement="right" title="Generated Shifting Form Editable">Generated Shifting Form Editable (Automated)</a> -->

                                     

                                        <?php 
                                         if($stat == 2){
                                       ?>
                                          
                                      <?php
                                         }else {
                                            ?>

                                                <a  class="page-link text-success " href="sf.php?student-sf&sftoken=60&studenttokenid=<?php echo $studentid ?>&studentname=<?php echo  $student_Fullname ?>" target="_blank" style="font-size: 12px" data-bs-toggle="tooltip" data-bs-placement="right" title="Generated Shifting Form">Generated Shifting Form (Manual)</a>


                                             <a  class="page-link text-success " href="session.php?student-sf&sftoken=60&studenttokenid=<?php echo $studentid ?>&studentname=<?php echo  $student_Fullname ?>&status=1&hist=<?php echo $hist ?>" target="_blank" style="font-size: 12px" data-bs-toggle="tooltip" data-bs-placement="right" title="Generated Shifting Form Editable" >Generated Shifting Form Editable (Automated)</a>
                                          <?php
                                         }

                                         ?>

                                      
                                   </div> 
                                   

                              </div> 
                              
                            </div>
                          </div>
                        </div>

                         
                        </div>
                                  </td>
                                      <td>
                                    <?php 
                                    if($stat == 1){
                                      ?>
                                       <span class="text-light badge bg-success">Requesting PDS</span>
                                      <?php
                                    }else if($stat == 2){
                                       ?>
                                       <span class="text-light badge bg-success">Accomplished</span>
                                      <?php
                                    }else if ($stat == 3) {
                                     
                                        ?>
                                       <span class="text-light badge bg-success">Granted and  <br>Waiting for Admission</span>
                                      <?php
                                      
                                    }else {
                                         ?>
                                       <span class="text-light badge bg-success">For approval</span>
                                      <?php
                                    }

                                     ?>
                                   
                                  </td>
                                  <td>
                                       <?php 
                                        echo $fromwhere ;

                                          $fromwhatcollege = "select * from course where course ='$fromwhere'  ";
                                           $findcollege = mysqli_query($con,$fromwhatcollege); 
                                          
                                         while($course = mysqli_fetch_array($findcollege)){
                                                $fromwherecolid = $course['CollegeId'];   
                                           }
                                          
                                              $getcollege = "select * from colleges where CollegeId ='$fromwherecolid'  ";
                                               $gcollge = mysqli_query($con,$getcollege); 
                                            
                                            
                                            
                                             while($getcol = mysqli_fetch_array($gcollge)){
                                                  echo '<br> <span class="text-info">('.$getcol['college'].')</span> ';     
                                               }
                                            
                                             
                                         

                                        ?>
                                  </td>

                                 
                                  
                                  <td>
                                    
                                    <?php echo $coursetoshift;

                                        $fromwhatcolleges = "select * from course where course ='$coursetoshift'  ";
                                           $findcolleges = mysqli_query($con,$fromwhatcolleges); 
                                          
                                         while($courses = mysqli_fetch_array($findcolleges)){
                                              $fromwherecolids = $courses['CollegeId']; 
                                           }
                                            $getcolleges = "select * from colleges where CollegeId ='$fromwherecolids'  ";
                                               $gcollges = mysqli_query($con,$getcolleges); 
                                            
                                            
                                            
                                             while($getcols = mysqli_fetch_array($gcollges)){
                                                  echo '<br> <span class="text-info">('.$getcols['college'].')</span> ';      
                                               }

                                         ?>
                                  </td>
                                 <td style="font-weight: bolder"><?php echo $studemail ?></td>
                                  <td><?php echo $student_lname ?></td>
                                  <td><?php echo $student_fname ?></td>
                                  <td><?php echo $student_mname ?></td>
                                  <td><?php echo $student_email ?> </td>
                                  <td><?php echo date('F j,Y ',strtotime($respondedat)) ?></td>
                               
                                 <!-- <td><?php echo date('Y-m-d') ?></td>
                                  <td><?php echo date('Y-m-d') ?></td>-->
                                 
                                </tr>

   
    								