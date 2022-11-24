<?php 
session_start();
include '../../GCC/create_form/connect.php';
$college = $_SESSION['gc_college'];
$CollegeId =  $_SESSION['gc_collegid'];

 
if(isset($_POST['tablecontents'])){ 

	
	?>

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

    include '../encrypt/sfgcc.php';
    $enc =  new encryptdata();

                              

                              	  $sql = " SELECT * FROM `student` ";
                      $result = mysqli_query($con,$sql); 
                   
                    
                
                     
                       while($row = mysqli_fetch_array($result)){
                          $studentid = $row['stud_id'];
                          $student_lname = $row['stud_lname'];
                          $student_fname = $row['stud_fname'];
                          $student_mname = $row['stud_mname'];
                          $student_email = $row['stud_email'];
                            $student_course = $row['stud_course'];
                             $stud_coll = $row['stud_college'];

                          $student_Fullname = $student_lname.' '.$student_fname.' '.$student_mname;
                         $studemail = substr($student_email, 0, strpos($student_email,'@'));

        $sqls = " select * from form_response where userid='$studentid' and csformid = '60' and status ='approved' and CollegeId = '$CollegeId'  ";

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
                                           $tosh = $rows['toshift'];
                                            $idforfiles[]= $rows['formid'];
                                              $fromwhere = $rows['fromwhere'];
                                               $coursetoshift = $rows['course'];
                                              $hist = $rows['shifting_history'];
                                              $freed = $rows['freed'];

                                              $coordinator = $rows['coordinator'];

                                           }

  
                              $formid = $enc -> encryption($csform,"gccformtokenshift"); 
                              $studentids = $enc -> encryption($studentid,"gccstudent123shift");
   
               
                                

                                  $token =  $_SESSION['admin_token'];

                                  if($coordinator == $token){

                                      include 'coordinator.php';
                                  

                                  }else if($coordinator == 0) {
                                      include 'coordinator.php';
                                  }else if($coordinator != $token) {
                                   //Not Equal
                                    if(isset($_SESSION['show_rec'])){
                                      $show_ =  $_SESSION['show_rec'];
                                    
                                        if($show_ == 1){
                                             include 'coordinator.php';
                                        }else {




                                        }
                                    }

                                    $keeped_records = 1;
                                    $recordkept_counts[] =  $hist;

                                  }


                                           
                            

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

   <link rel="stylesheet" type="text/css" href="../../offline/datatable.css"/>
 
<script type="text/javascript" src="../../offline/datatable.js"></script>

                        
              <?php 

                          if(isset($keeped_records)){

                            if(isset($recordkept_counts)){


                              ////

                             

                               if(isset($_SESSION['new_gc'])){
                                  $new_gc= $_SESSION['new_gc'];
                                  if($new_gc == 1){
                                    $rid = $_SESSION['admin_token'];
                  $getreferrals_made = "SELECT * FROM `referral_history` where coordinator != '$rid' and CollegeId = '$CollegeId'   ";
                 $refferals_made = mysqli_query($con,$getreferrals_made); 
                 $countreferrals= mysqli_num_rows($refferals_made);
                
                 
               $total = $countreferrals + count($recordkept_counts);

                                  ?>
                                    <div class="container">
                                      <a href="history_Dir.php">
                                      <div class="alert alert-warning alert-dismissable"  style="position:fixed; top:60px; right: 20px;">
                                            <h6 style="font-size:15px" class="text-primary"> <span class="text-danger"><?php echo $total ?></span> Records Found Hidden. <br>Done by the Recent Coordinators. <br> [ Click to show ]

                                            </h6>
                                            <button type="button"  data-dismiss="alert" class="mt-1 text-danger hideclick" style="font-size: 12px;border:none;outline:none;float: right;">Hide</button>
                                      </div>
                                      </a>
                                    
                                    </div>
                                    <?php


                               }
                               }

                             

                             

                            }
                                   
                          }

               ?>






<script src="../../sweetalert.js"></script>
            <script type="text/javascript">
              
              $(document).ready(function() {
                
            let table = new DataTable('#pdstable', {
      
     "search": {
    "caseInsensitive": false
  }

});

              $('.hideclick').click(function(){

                 $.ajax({
                 url : "action.php",
                  method: "POST",
                 data  : {hideclick:1},
                  success : function(data){
                 
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
                     }
                  else if($(this).prop("checked") == false) {
                        $('#tablerows'+id).removeClass('table-warning');                                      
                   }
                });

                  $('#customCheck').click(function() {
                if($(this).prop("checked") == true) {
                       $('.checkall').prop('checked',true);    
                       $('#customCheck').prop('indeterminate', true)       
                        $('.tablerows').addClass('table-warning');                
                   }
                else if($(this).prop("checked") == false) {
                  $('.checkall').prop('checked',false);  
                    $('.tablerows').removeClass('table-warning');                
                                                 
                 }
              });

                  $('.approvedstudent').click(function() { 
                  var sid = $(this).data('sid');
                  var crse = $(this).data('course');
               var collegeid = $(this).data('college');
               var sh = $(this).data('sh');

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
                      xhttp.send("approvedstudent=1&id="+sid+"&course="+crse+"&collegeid="+collegeid+"&sh="+sh);
                         
                                   
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

                        //XAXAXAXAXA
                          
                        
                      
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
                             
	<?php
	
}



if(isset($_POST['tablecontentfordeclined'])){ 
    ?>
    <table class="table table-striped table-hover table-sm" id="pdstable">
                              <thead >
                                <tr class="table-success">
                                   <th scope="col">Action</th>
                                     <th scope="col">Status</th>
                                  <th scope="col">ID</th>
                                  <th scope="col">Lastname</th>
                                  <th scope="col">Firstname</th>
                                  <th scope="col">Middlename</th>
                                  <th scope="col">Email</th>
                                  <th scope="col" >Date submitted</th>
                                  <!--<th scope="col" >Last Modified</th>-->
                                
                                
                                </tr>
                              </thead>
                              <tbody id="tablecontents">

                                <?php 

    include '../encrypt/sfgcc.php';
    $enc =  new encryptdata();
                                  $sql = " SELECT * FROM `student` ";
                      $result = mysqli_query($con,$sql); 
                   
                    
                
                     
                       while($row = mysqli_fetch_array($result)){
                          $studentid = $row['stud_id'];
                          $student_lname = $row['stud_lname'];
                          $student_fname = $row['stud_fname'];
                          $student_mname = $row['stud_mname'];
                          $student_email = $row['stud_email'];

                          $student_Fullname = $student_lname.' '.$student_fname.' '.$student_mname;
                         $studemail = substr($student_email, 0, strpos($student_email,'@'));
        $sqls = " select * from shifting_history where stud_id='$studentid' and  status ='Declined' and to_ = '$CollegeId' ";
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
                                             $hist = $rows['shifting_history'];

                                            $idforfiles[]= $rows['formid'];
                                           }

  
                              $formid = $enc -> encryption($csform,"gccformtokenshift"); 
                              $studentids = $enc -> encryption($studentid,"gccstudent123shift");
   
               
          


                                           
                                           ?>
                                             <tr id="tablerows<?php echo $studentid ?>" class="tablerows">
                                                <td>
                                    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">


                                      <?php



                                      if($stat == 1){
                                      ?>
                                      <span style="margin-right: 40px" class="badge text-success">Requesting PDS..</span> 

                                      <?php  
                                      }else if ($stat == 2){
                                          ?>
                                      <span style="margin-right: 40px" class="badge text-success">Accomplished <i class="fas fa-check-circle"></i></span> 

                                      <script type="text/javascript">
                                        
                                        $(document).ready(function() {
                                                $('#customCheck<?php echo $studentid ?>').removeAttr('name');
                                                $('#sf<?php echo $studentid  ?>').hide();
                                                $('#not<?php echo $studentid ?>').hide();
                                              });      
                                              
                                      </script>
                                      <?php  

                                      }else {
                                        /* ?>
                                        <button class="btn btn-light text-success approvedstudent" data-sid = "<?php echo $studentid  ?>" type="button" style="font-size: 12px" data-course="<?php echo $kurso ?>" data-college="<?php echo $CollegeId ?>" >Approve</button>

                                          <button class="btn btn-light text-danger declinestudent" data-sid = "<?php echo $studentid  ?>" type="button" style="font-size: 12px" data-course="<?php echo $kurso ?>" data-name="<?php echo $student_Fullname ?>" data-college="<?php echo $CollegeId ?>" >Decline</button>
                                       <?php*/
                                      }




                                     


                                       ?>

                                     <!--   <button type="button" class="btn btn-light text-success " id="sf<?php echo $studentid  ?>" style="font-size: 12px" data-bs-toggle="tooltip" data-bs-placement="right" title="Generated Shifting Form" onclick="window.open('sf.php?student-sf&sftoken=<?php echo $formid?>&studenttokenid=<?php echo $studentids ?>&studentname=<?php echo  $student_Fullname ?>')">SF</button>
                           

                          <button type="button" class="btn btn-light" onclick="window.open('view.php?student-pds&pdstoken=<?php echo $formid?>&id=<?php echo $studentid?>&studenttokenid=<?php echo $studentids ?>')" style="font-size: 12px"><i class="far fa-eye text-primary"></i></button>
                          <button type="button" class="btn btn-light" onclick="window.open('print.php?student-pds&pdstoken=<?php echo $formid?>&id=<?php echo $studentid?>&studenttokenid=<?php echo $studentids ?>')" style="font-size: 12px"><i class="fas fa-print text-info"></i></button>

                             <button type="button" class="btn btn-light pdsdetails" data-fullname="<?php echo $student_lname.' '.$student_fname.' '.$student_mname  ?>" data-email ="<?php echo $student_email  ?>" data-submitted= "<?php echo $respo ?>"   data-toggle="modal" data-target="#details" data-backdrop="static" data-keyboard="false" style="font-size: 12px"><i class="fas fa-info-circle text-secondary"></i></button>-->

                             
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
                            
                              

                                        
                                     <!-- <button type="button" style="font-size: 12px" class="btn btn-light text-primary" data-toggle="modal" data-target=".bd-example-modal-sm<?php echo $studentid  ?>">View</button> -->
                                    
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
                                                  
                                                    include 'filedeclined.php';

                                                }


                                     ?> 

                                      <a class="page-link preview" data-csformid = "<?php echo $csform ?>" data-studentid="<?php echo $studentid ?>" data-studname = "<?php echo $student_lname.' '.$student_fname.' '.$student_mname.'.' ?>" style="font-size: 12px" href="view.php?student-pds&pdstoken=<?php echo $formid?>&id=<?php echo $studentid?>&studenttokenid=<?php echo $studentids ?>" data-shift="<?php echo $coursetoshift ?>">View Shifting Profile </a>  

                                      <a class="page-link text-info " style="font-size: 12px" href="print.php?student-pds&pdstoken=<?php echo $formid?>&id=<?php echo $studentid?>&studenttokenid=<?php echo $studentids ?>">Print Shifting Profile</a>


                                      
                                    <!--  <a  class="page-link text-success " href="sf.php?student-sf&sftoken=60&studenttokenid=<?php echo $studentid ?>&studentname=<?php echo  $student_Fullname ?>" target="_blank" style="font-size: 12px" data-bs-toggle="tooltip" data-bs-placement="right" title="Generated Shifting Form">Generated Shifting Form (Manual)</a>

                                        <a  class="page-link text-success " href="sf_edit.php?student-sf&sftoken=60&studenttokenid=<?php echo $studentid ?>&studentname=<?php echo  $student_Fullname ?>" target="_blank" style="font-size: 12px" data-bs-toggle="tooltip" data-bs-placement="right" title="Generated Shifting Form Editable">Generated Shifting Form Editable (Automated)</a> -->

                                       

                                      
                                   </div> 
                                   

                              </div> 
                              
                            </div>
                          </div>
                        </div>

                         
                        </div>
                                  </td>
                                   <td><span class="badge bg-danger text-light" > Declined </span></td>
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
                     }
                  else if($(this).prop("checked") == false) {
                        $('#tablerows'+id).removeClass('table-warning');                                      
                   }
                });

                  $('#customCheck').click(function() {
                if($(this).prop("checked") == true) {
                       $('.checkall').prop('checked',true);    
                       $('#customCheck').prop('indeterminate', true)       
                        $('.tablerows').addClass('table-warning');                
                   }
                else if($(this).prop("checked") == false) {
                  $('.checkall').prop('checked',false);  
                    $('.tablerows').removeClass('table-warning');                
                                                 
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

                       if(data == "nothing"){
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
                             
  <?php
}



 ?>