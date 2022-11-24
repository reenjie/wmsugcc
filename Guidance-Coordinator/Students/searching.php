<?php 
/*

 $collegeid = $_SESSION['gc_collegid'];
 $search = $_POST['submitbtn'];
  $search_key = $_POST['search_key'];
 $customRadio = $_POST['customRadio'];
*/
  include '../encrypt/sfgcc.php';
  $enc =  new encryptdata();

echo '<div class="row mb-5">';
    




 	$select_our_students = "select * from student where stud_lname like '%$search_key%' or stud_fname like '%$search_key%' or stud_email like '%$search_key%' or gender like '%$search_key%' or age like '%$search_key%' or street like '%$search_key%' or barangay like '%$search_key%'   ";
 	 $selectingown = mysqli_query($con,$select_our_students); 
 	 $count= mysqli_num_rows($selectingown);
 	  
 	if($count >=1){

    ?>
    <script type="text/javascript">
        $(document).ready(function() {
          $('#countingresults').html('Total Results Found : <span class="text-danger"><?php echo $count ?></span>');
      
        });
    </script>

    <?php
  while($row = mysqli_fetch_array($selectingown)){
    $course = $row['stud_course'];
    $college = $row['stud_college'];
    $studentid = $row['stud_id'];

    if($row['photo']==''){
      $src = '../../Myaccount/img/noimg.png';
    }else {
      $src = '../../Myaccount/img/'.$row['photo'];
    }

 			?>
      <div class="col-md-8">
          <div class="card mb-2 mt-2 shadow">
          <div class="card-body">
            <div class="container">
                
                <div class="row">
                  <div class="col-md-4">
                    <h6 style="text-align:center;">
                      
                      <img src="<?php echo $src ?>" class="img-rounded img-thumbnail" style="width: 170px; height: 170px;border-radius: 40px;">

                    </h6>
                  </div>
                   <div class="col-md-8">
                     <h6 style="float:left">
                      <span style="font-size:17px;text-transform: uppercase;">
                       <?php echo $row['stud_lname'].' '.$row['stud_fname'].' '.$row['stud_mname'] ?>
                       </span><br>
                       <span style="font-size: 14px;">
                         <?php echo $row['stud_email'] ?>
                       </span><br>
                       <span style="font-size:14px">
                          <?php echo $row['contact_no'] ?>
                       </span><br>
                       <span>
                          <?php echo $row['age'] ?>
                       </span> - 
                        <span>
                          <?php echo $row['gender'] ?>
                       </span>
                       <br>
                       <span style="font-size:16;">
                         <?php 
                           $get_student_course = "select * from course where courseid = '$course'  ";
                            $gettingstudentcourse = mysqli_query($con,$get_student_course); 
                          
                          while($gcourse = mysqli_fetch_array($gettingstudentcourse)){
                                   echo $gcourse['course'];  
                            }
                         
                          

                          ?>
                       </span><br>
                       <span style="font-size:14px">
                          <?php 
                            $get_student_college = "select * from colleges where CollegeId = '$college'  ";
                             $getting_college = mysqli_query($con,$get_student_college); 
                           
                           while($gcollege = mysqli_fetch_array($getting_college)){
                                      echo $gcollege['college'];
                             }
                          
                           
                           ?>
                       </span>
                       <br>

                     </h6>

                    
                   </div>
                   <div class="col-md-12">
                      <div class="row">
                       <div class="col-sm-6">
                         <div class="card">
                           <div class="card-body">
                             <h6 style="font-size: 13px">
                               Personal Data Sheets
                             </h6>

                            
                             <?php 
                           

    						  $formid = $enc -> encryption('62',"gccformtoken"); 
                             if( $college == $collegeid){

                                                                $checkifpds = "select * from form_response where userid = '$studentid' and csformid = '62'  ";
                                                                 $chckingpds = mysqli_query($con,$checkifpds); 
                                                                 $countpds= mysqli_num_rows($chckingpds);
                                                             
                                                                if($countpds >=1){
                                                            ?>
                               <a href="../PDS-Records/view.php?student-pds&pdstoken=<?php echo $formid ?>&id=<?php echo $studentid?>&studenttokenid=<?php echo $studentid ?>" class="btn btn-light form-control text-primary"  style="font-size: 13px;" target="_blank">View</a>
                              <?php
                                                            
                                                                }else {
                                                                  echo '<span class="text-danger" style="font-size:13px">NOT YET FILLED UP / PENDING</span>'; 
                                                                }  

                                                           

                             
                             }else {
                             	     $checkifpds = "select * from form_response where userid = '$studentid' and csformid = '62'  ";
                                                                 $chckingpds = mysqli_query($con,$checkifpds); 
                                                                 $countpds= mysqli_num_rows($chckingpds);
                                                             
                                                                if($countpds >=1){
                                                            ?>
                               <a href="../PDS-Records/view.php?student-pds&pdstoken=<?php echo $formid ?>&id=<?php echo $studentid?>&studenttokenid=<?php echo $studentid ?>" class="btn btn-light form-control text-primary"  style="font-size: 13px;" target="_blank">View</a>
                              <?php
                                                            
                                                                }else {
                                                                  echo '<span class="text-danger" style="font-size:13px">NOT YET FILLED UP / PENDING</span>'; 
                                                                }  
                             }

                              ?>

                            


                           </div>
                         </div>
                       </div>
                       <div class="col-sm-6">
                          <div class="card">
                           <div class="card-body">
                             <h6 style="font-size: 13px">
                               Shifting Records
                             </h6> 
                             <?php 
                                                                $checkifpds = "select * from form_response where userid = '$studentid' and csformid = '60'  ";
                                                                 $chckingpds = mysqli_query($con,$checkifpds); 
                                                                 $countpds= mysqli_num_rows($chckingpds);
                                                             
                                                                if($countpds >=1){
                                                             ?>
                                            <a type="button" href="../Shifting-Records/student_record.php?id=<?php echo $studentid ?>" class="btn btn-light form-control text-primary" id ="<?php echo $studentid ?>" target="_blank"  style="font-size: 13px;">View
                                 <?php 

                                      $getalldata = "select * from shifting_history where stud_id = '$studentid'  ";
                               $shiftingdata = mysqli_query($con,$getalldata); 
                               $countsh= mysqli_num_rows($shiftingdata);
                               //$newlyinsertedid = mysqli_insert_id($con);
                              if($countsh >=1){
                             while($getsh = mysqli_fetch_array($shiftingdata)){
                                        
                               }
                                echo '<span class="badge bg-primary text-light">'.$countsh.'</span>';
                             }else {
                              ?>
                              <script type="text/javascript">
                                  $(document).ready(function() {
                                    $('#<?php echo $studentid ?>').attr('disabled',true);
                                
                                  });
                              </script>
                              <?php
                             }


                                       ?>

                               </a>

                                                                    <?php
                                                            
                                                                }else {
                                                                  echo '<span class="text-danger" style="font-size:13px">NO SHIFTING RECORDS YET</span>'; 
                                                                }  

                                                             ?>


                         
                           </div>
                         </div>
                       </div>
                     </div>
                   </div>
                </div>


            </div>

        </div>
      </div>
      </div>
    
      <div class="col-md-4"></div>

      <?php	
 	 }
 
  }else {
    ?>
    <div class="col-md-8">
        <div class="card shadow-sm">
      <div class="card-body">
          
          <div class="container mt-5 mb-5">
              <h6 style="text-align:center;">
                <span style="font-size:20px"> No Results Found!</span><br>


                  Search Keyword :  <span class="text-danger"><?php echo $search_key ?></span>
              </h6>
          </div>

      </div>
    </div>
    </div>
  
    <?php
  }

echo '</div> <p><br><br></p>';

 ?>