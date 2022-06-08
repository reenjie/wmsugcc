<?php 
session_start();
include '../GCC/create_form/connect.php';


 
if(isset($_POST['tablecontents'])){ 
  ?>
    <div class="table-responsive">

       <form enctype="multipart/form-data" method="post" id="appr" action="approve.php">
                               
                               <input type="hidden" name="approv">
                          <table class="table table-striped table-hover table-sm" id="pdstable">
                              <thead >
                                <tr class="table-success">
                                  <th scope="col">
                                    <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input" id="customCheck" >
                                  <label class="custom-control-label" for="customCheck">*</label>
                                </div>
                                  </th>  
                                  <th scope="col">Action</th>
                                      <th scope="col" class="stathead">Status</th>
                                   <th scope="col">From</th>
                                   <th scope="col">To</th>
                                  <th scope="col">ID</th>
                                  <th scope="col">Lastname</th>
                                  <th scope="col">Firstname</th>
                                  <th scope="col">Middlename</th>
                                  <th scope="col">Email</th>
                               
                                 <th scope="col" >Date submitted</th>
                                 
                                 <!-- <th scope="col" >Last Modified</th>-->
                              
                                
                                </tr>
                              </thead>
                              <tbody id="tablecontents">

                                <?php 

   // include '../encrypt/sfgcc.php';
   // $enc =  new encryptdata();
                        $sql = " SELECT * FROM `student` ";
                      $result = mysqli_query($con,$sql); 
                   
                    
                
                     
                       while($row = mysqli_fetch_array($result)){
                          $studentid = $row['stud_id'];
                          $student_lname = $row['stud_lname'];
                          $student_fname = $row['stud_fname'];
                          $student_mname = $row['stud_mname'];
                          $student_email = $row['stud_email'];
                          $student_course = $row['stud_course'];

                          $student_Fullname = $student_lname.' '.$student_fname.' '.$student_mname;
                         $studemail = substr($student_email, 0, strpos($student_email,'@'));
        $sqls = " select * from form_response where userid='$studentid' and csformid = '60' and status ='approved' and approvestat = '3' ";
                                          $results = mysqli_query($con,$sqls); 
                                          $counts= mysqli_num_rows($results); 
                                       
                                       if ($counts>=1){
                                        
                                           while($rows = mysqli_fetch_array($results)){
                                          $csform= $rows['csformid'];
                                          $user = $rows['userid'];
                                          $respondedat = $rows['datecreated'];
                                           $respo = date('Y-m-d',strtotime($respondedat));
                                           $kurso = $rows['course'];
                                           $stat = $rows['approvestat'];
                                           $CollegeId = $rows['CollegeId'];

                                            $idforfiles[]= $rows['formid'];
                                            $shistory = $rows['shifting_history'];
                                              $fromwhere = $rows['fromwhere'];
                                               $coursetoshift = $rows['course'];
                                           }

  
                           //   $formid = $enc -> encryption($csform,"gccformtokenshift"); 
                             // $studentids = $enc -> encryption($studentid,"gccstudent123shift");
   
               
          


                                           
                                           ?>
                                             <tr id="tablerows<?php echo $studentid ?>" class="tablerows">
                                  <td>
                                    <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input checkall" id="customCheck<?php echo $studentid ?>"  name="check[]" data-pdsid="<?php  echo $studentid;?>" value="<?php echo $studentid ?>"  >
                                  <input type="hidden" name="collegetoshift[]" value="<?php echo $CollegeId ?>">
                                  <input type="hidden" name="kurso[]" value="<?php echo $kurso ?>">
                                  <input type="hidden" name="hist[]" value="<?php echo $shistory ?>">
                                  <label class="custom-control-label" for="customCheck<?php echo $studentid ?>" ></label>
                                </div>
                                  </td>

                                     <td >
                                    <div id="ac<?php echo $studentid ?>"  class="btn-group optionaction" role="group" aria-label="Button group with nested dropdown">


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
                                         ?>
                                        <button class="btn btn-light text-success approvedstudent" data-sid = "<?php echo $studentid  ?>" type="button" style="font-size: 12px" data-course="<?php echo $kurso ?>" data-college="<?php echo $CollegeId ?>" >Approve</button>

                                          <button class="btn btn-light text-danger declinestudent" data-sid = "<?php echo $studentid  ?>" type="button" style="font-size: 12px" data-course="<?php echo $kurso ?>" data-name="<?php echo $student_Fullname ?>" data-college="<?php echo $CollegeId ?>" >Decline</button>
                                       <?php
                                      }




                                     


                                       ?>

                                     <!--   <button type="button" class="btn btn-light text-success " id="sf<?php echo $studentid  ?>" style="font-size: 12px" data-bs-toggle="tooltip" data-bs-placement="right" title="Generated Shifting Form" onclick="window.open('sf.php?student-sf&sftoken=<?php echo $formid?>&studenttokenid=<?php echo $studentids ?>&studentname=<?php echo  $student_Fullname ?>')">SF</button>
                           

                          <button type="button" class="btn btn-light" onclick="window.open('view.php?student-pds&pdstoken=<?php echo $formid?>&id=<?php echo $studentid?>&studenttokenid=<?php echo $studentids ?>')" style="font-size: 12px"><i class="far fa-eye text-primary"></i></button>
                          <button type="button" class="btn btn-light" onclick="window.open('print.php?student-pds&pdstoken=<?php echo $formid?>&id=<?php echo $studentid?>&studenttokenid=<?php echo $studentids ?>')" style="font-size: 12px"><i class="fas fa-print text-info"></i></button>

                             <button type="button" class="btn btn-light pdsdetails" data-fullname="<?php echo $student_lname.' '.$student_fname.' '.$student_mname  ?>" data-email ="<?php echo $student_email  ?>" data-submitted= "<?php echo $respo ?>"   data-toggle="modal" data-target="#details" data-backdrop="static" data-keyboard="false" style="font-size: 12px"><i class="fas fa-info-circle text-secondary"></i></button>-->

                                  <button type="button" class="btn btn-light text-success approvestudent" data-formid="60" data-toshift ="<?php echo $kurso ?>"  data-collegeidd="<?php echo $CollegeId ?>" data-sid = "<?php echo $studentid  ?>"  style="font-size: 12px" data-hist = "<?php echo $shistory ?>"> Approve</button>


                                        
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

                                      <a class="page-link preview" data-csformid = "<?php echo $csform ?>" data-studentid="<?php echo $studentid ?>" data-studname = "<?php echo $student_lname.' '.$student_fname.' '.$student_mname.'.' ?>" style="font-size: 12px" href="view.php?student-pds&pdstoken=60&id=<?php echo $studentid?>&studenttokenid=<?php echo $studentid ?>" data-shift="<?php echo $coursetoshift ?>">View Shifting Profile </a>  



                                      <a class="page-link text-info " style="font-size: 12px" href="print.php?student-pds&pdstoken=60&id=<?php echo $studentid?>&studenttokenid=<?php echo $studentid ?>">Print Shifting Profile</a>


                                      
                                      <a  class="page-link text-success " href="sf.php?student-sf&sftoken=60&studenttokenid=<?php echo $studentid ?>&studentname=<?php echo  $student_Fullname ?>" target="_blank" style="font-size: 12px" data-bs-toggle="tooltip" data-bs-placement="right" title="Generated Shifting Form">Generated Shifting Form (Manual)</a>

                                       <a  class="page-link text-success " href="session.php?student-sf&sftoken=60&studenttokenid=<?php echo $studentid ?>&studentname=<?php echo  $student_Fullname ?>" target="_blank" style="font-size: 12px" data-bs-toggle="tooltip" data-bs-placement="right" title="Generated Shifting Form Editable">Generated Shifting Form Editable (Automated)</a> 

                                        <!--<a  class="page-link text-success " href="sf_edit.php?student-sf&sftoken=60&studenttokenid=<?php echo $studentid ?>&studentname=<?php echo  $student_Fullname ?>" target="_blank" style="font-size: 12px" data-bs-toggle="tooltip" data-bs-placement="right" title="Generated Shifting Form Editable">Generated Shifting Form Editable (Automated)</a> -->

                                      

                                      
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
                                       <span class="text-light badge bg-success">Waiting for Approval</span>
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

   
                        <?php

                                    }else {
                                     // echo 'no data';
                                    }
                                }

                                 ?>
                               

                             
                                  

                                

                              </tbody>
                            </table>  
                            <span style="font-weight: bolder;">Options On Selected :</span>
                          <!--  <button type="submit" name="toview" style="font-size: 12px" class="btn btn-light"><i class="far fa-eye text-primary"></i> VIEW</button>
                             <button type="submit" name="toprint" style="font-size: 12px" class="btn btn-light"><i class="fas fa-print text-info"></i> PRINT</button> -->

                             <button type="submit" name="approveselected" style="font-size: 12px;" class="btn btn-light text-success">APPROVE</button>

                            </form>
                         
    <link rel="stylesheet" type="text/css" href="../../offline/datatable.css"/>
 
<script type="text/javascript" src="../../offline/datatable.js"></script>







<script src="../../offline/sweetalert.js"></script>

            <script type="text/javascript">
              
              $(document).ready(function() {
                
            let table = new DataTable('#pdstable', {
      
     "search": {
    "caseInsensitive": false
  }

});


                    function allrequest(){

                      
                         $.ajax({
                                 url : "content.php",
                                  method: "POST",
                                   data  : {tablecontents:1},
                                   success : function(data){
                              $('#allrequest').html(data);
                                   }
                                })
                             
                          
                    }

               $('#appr').on('submit', function(event){
                  event.preventDefault();
                         $.ajax({
                                  url : $(this).attr('action'),
                                   method: "POST",
                                    data  : $(this).serialize(),
                                    success : function(data){
                                     if(data == 'noselection'){
                                         Swal.fire(
                                            'No selection made!',
                                            'Please select one or more',
                                            'error'
                                          )
                                      }else {
                                            Swal.fire(
                                            'Approved Successfully',
                                            '',
                                            'success'
                                          )

                                   allrequest();
                                      }
                                       
                                        
            
                                   
                                    }
                                 })
                  });

                        $('.approvestudent').click(function() { 
                          var sid = $(this).data('sid');
                          var cid = $(this).data('collegeidd');
                          var toshift = $(this).data('toshift');
                          var hist = $(this).data('hist');

                              Swal.fire({
                            title: 'Are you sure?',
                            text: "You won't be able to revert this!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#f04252',
                            cancelButtonColor: '#e5cd81',
                            confirmButtonText: 'Yes, Approved it!'
                          }).then((result) => {
                            if (result.isConfirmed) {
                            

                              $.ajax({
                                         url : "approve.php",
                                          method: "POST",
                                           data  : {approvesingle:1,sid:sid,cid:cid,toshift:toshift,hist:hist},
                                           success : function(data){

                                            Swal.fire(
                                            'Approved Successfully',
                                            '',
                                            'success'
                                          )

                                            allrequest();
                                           }
                                        })
                            }
                          })
                              
                                 
                                     
                                  
                        
                        })



             $('.pdsdetails').click(function() { 
                  var fullname = $(this).data('fullname');
                  var email = $(this).data('email');
                  var submitted = $(this).data('submitted');
                  $('#nombre').text(fullname);
                  $('#mail').text(email);
                  $('#petsasubmit').text(submitted);
                  $('#modifica').text(submitted);
                })

             $('.checkall').click(function() {
               var id = $(this).data('pdsid');


              
                  if($('#customCheck'+id).prop("checked") == true) {
                      $('#tablerows'+id).addClass('table-warning');     
                      $('#ac'+id).addClass('d-none');                                   
                     }
                  else if($(this).prop("checked") == false) {
                        $('#tablerows'+id).removeClass('table-warning');  
                         $('#ac'+id).removeClass('d-none');                                              
                   }
                });

                  $('#customCheck').click(function() {
                if($(this).prop("checked") == true) {
                       $('.checkall').prop('checked',true);    
                       $('#customCheck').prop('indeterminate', true)       
                        $('.tablerows').addClass('table-warning');       
                        $('.optionaction').addClass('d-none');         
                   }
                else if($(this).prop("checked") == false) {
                  $('.checkall').prop('checked',false);  
                    $('.tablerows').removeClass('table-warning'); 
                     $('.optionaction').removeClass('d-none');       

                                                 
                 }
              });

                  $('.approvedstudent').click(function() { 
                  var sid = $(this).data('sid');
                  var crse = $(this).data('course');
               var collegeid = $(this).data('college');

                     var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                     if (this.readyState == 4 && this.status == 200) {
                    const data = this.responseText;
                  
                      // Your condition here if data success.
                  tableitem();
               
                                 }
                              };
                      xhttp.open("POST", "action.php",true);
                      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                      xhttp.send("approvedstudent=1&id="+sid+"&course="+crse+"&collegeid="+collegeid);
                         
                                   
                  })

                  $('.declinestudent').click(function() { 

                      var sid = $(this).data('sid');
                  var crse = $(this).data('course');
               var collegeid = $(this).data('college');
               var name = $(this).data('name');

                     Swal.fire({
                    title: 'Are you sure?',
                    text: "Action cannot be undone!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#f04252',
                    cancelButtonColor: '#e5cd81',
                    confirmButtonText: 'Yes, Decline!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      
                      $('#reasonmodal').click();
                      $('#username').text(name);
                      $('#studid').val(sid);



                    }
                  })
                  
                  })

                  function tableitem(){
   
    
       $.ajax({
               url : "content.php",
                method: "POST",
                 data  : {tablecontents:1},
                 success : function(data){
                $('#tablecontents').html(data);
                 }
              })
         
        
   }


   $('#declined').on('submit', function(event){
      event.preventDefault();
             $.ajax({
                      url : $(this).attr('action'),
                       method: "POST",
                        data  : $(this).serialize(),
                        success : function(data){
                       if(data == 'nothing'){
                        $('#error').text('Please Select one or more');
                       }else {
                        

                       Swal.fire(
                        'Declined!',
                        'The request has been declined.',
                        'success'
                      ).then((result) => {
                      if (result.isConfirmed) {
                      window.location.reload();
                      }
                    })

                       tableitem();
                        
                               
                            

                       }
                        }
                     })
      });
        });


</script>


<!-- Button trigger modal -->
<button type="button" class="btn btn-primary d-none" id="reasonmodal" data-toggle="modal" data-target="#exampleModal" data-backdrop="static" data-keyboard="false">
  
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
         <h6 class="text-danger">Reason</h6>
      </div>
       <form method="post" action="session.php" id="declined">
              <input type="hidden" name="declined">                  
      
      
      <div class="modal-body">

         
            <input type="hidden" name="studid" id="studid">
          
              <ul style="list-style: none">
                <li><h6>Declining <span id="username" style="font-weight: bolder;text-decoration: underline;" class="text-secondary"></span> Request.</h6></li>
                <li><input type="checkbox" name="reason[]" value="1"> DID NOT meet the grade requirments</li>
                <li><input type="checkbox" name="reason[]" value="2">  DID NOT meet other requirements</li>
                <li><input type="checkbox" name="reason[]" value="4"> No vacant slot</li>
                <li><input type="checkbox" name="reason[]" value="5"> Failed in interview</li>

                <li>  <span class="text-danger" id="error"> </span></li>
              </ul>




       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" style="font-size:12px" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-danger" style="font-size:12px">Decline</button>
      </div>
       </form>
    </div>
  </div>
</div>
           
                      </div> 
  <?php
	
}

 ?>