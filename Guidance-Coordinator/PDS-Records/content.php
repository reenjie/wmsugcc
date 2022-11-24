<?php 
session_start();
include '../../GCC/create_form/connect.php';
$college = $_SESSION['gc_college'];
$CollegeId =  $_SESSION['gc_collegid'];
 
if(isset($_POST['tablecontents'])){ 

	
	?>
  
  <h6 style="font-weight: bold;" class="text-danger" id="outdatedtext"></h6>
	  <table class="table table-striped table-hover table-sm" id="pdstable">
                              <thead >
                                <tr class="table-success" id="pdstableheader" >
                                  <th scope="col">
                                    <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input" id="customCheck" >
                                  <label class="custom-control-label" for="customCheck">*</label>
                                </div>
                                  </th>
                                  <th scope="col">ID </th>
                                  <th scope="col">Lastname</th>
                                  <th scope="col">Firstname</th>
                                  <th scope="col">Middlename</th>
                                  <th scope="col">Email</th>
                                  <!--<th scope="col" >Date submitted</th>
                                  <th scope="col" >Last Modified</th>-->
                                  <th scope="col">Action</th>
                                </tr>
                              </thead>
                              <tbody id="tablecontents">

                              	<?php 

    include '../encrypt/sfgcc.php';
    $enc =  new encryptdata();
                              	  $sql = " SELECT * FROM `student` ";
                      $result = mysqli_query($con,$sql); 
                   
                     $checkchanges = " SELECT * FROM `form` where class_name='62'  ";
                                                    $resultcheckchanges = mysqli_query($con,$checkchanges); // run query
                                                    $countcheckchanges= mysqli_num_rows($resultcheckchanges); // to count if necessary
                                                   //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if 
                                                     while($cc = mysqli_fetch_array($resultcheckchanges)){
                                                     $form_id = $cc['form_id'];
                                                     $formcontent[] = $cc['content'];
                                        
              
                                                     }
                                                        $notsame=false;
                                $formuptt = false;
                                $formupttq = false;//used
                                 $formupttqs = false;
                                 $thereschange = false;//used
                
                     
                       while($row = mysqli_fetch_array($result)){
                          $studentid = $row['stud_id'];
                          $student_lname = $row['stud_lname'];
                          $student_fname = $row['stud_fname'];
                          $student_mname = $row['stud_mname'];
                          $student_email = $row['stud_email'];
                          $retake = $row['retake'];
                          $modify = $row['modify'];
                          $upt = $row['upt'];
                         $studemail = substr($student_email, 0, strpos($student_email,'@'));
        $sqls = " select * from form_response where userid='$studentid' and csformid = '62' and CollegeId = '$CollegeId' ";
                                          $results = mysqli_query($con,$sqls); 
                                          $counts= mysqli_num_rows($results); 
                                   


                                       if ($counts>=1){
                                        
                                           while($rows = mysqli_fetch_array($results)){
                                          $csform= $rows['csformid'];
                                          $user[] = $rows['userid'];
                                          $respondedat = $rows['datecreated'];
                                          //$contentofreponse[] = $rows['content'];

                                          $idforfiles[]= $rows['formid'];



                                          $respo = date('Y-m-d',strtotime($respondedat));
                                           }

                                           
  
                              $formid = $enc -> encryption($csform,"gccformtoken"); 
                              $studentids = $enc -> encryption($studentid,"gccstudenttoken");
   
                                         $studcount[] = $studentid;
                                        


                                           
                                           ?>
                                             <tr id="tablerows<?php echo $studentid ?>" class="tablerows">

                                  <td>
                                    <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input checkall" id="customCheck<?php echo $studentid ?>"  name="check[]" data-pdsid="<?php  echo $studentid;?>" value="<?php echo $studentid ?>" >
                                  <label class="custom-control-label" for="customCheck<?php echo $studentid ?>" ></label>
                                </div>
                                  </td>

                                 <td style="font-weight: bolder"><?php echo $studemail ?></td>
                                  <td><?php echo $student_lname ?></td>
                                  <td><?php echo $student_fname ?></td>
                                  <td><?php echo $student_mname ?></td>
                                  <td><?php echo $student_email ?></td>
                                 <!-- <td><?php echo date('Y-m-d') ?></td>
                                  <td><?php echo date('Y-m-d') ?></td>-->
                                  <td>
                                    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">

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

                                        $check_formupts = "select form_id,type,sec_no,class_name from form where class_name='62' and type in ('Question','file','list') and form_id not in (select formid from form_response where csformid ='62' and userid = '$studentid')  ";
                           $chkingformupts = mysqli_query($con,$check_formupts); 
                           $countingdata= mysqli_num_rows($chkingformupts);
                          
                          if($countingdata >=1){
                            
                              ?>
                                <button type="button" class="btn btn-light notifystudenttoupdate" data-nameonly="<?php echo $student_fname?>" data-fullname="<?php echo $student_lname.' '.$student_fname.' '.$student_mname  ?>" data-email ="<?php echo $student_email  ?>" data-st ='Update' data-submitted= "<?php echo $respo ?>" data-studentid = "<?php echo $studentid ?>"    style="font-size: 12px"><i class="fas fa-exclamation-triangle text-danger"></i></button>
                              <?php
                        
                          }else {
                            
                            if($retake == 1){
                              ?>
                                <button type="button" class="btn btn-light notifystudenttoupdate" data-nameonly="<?php echo $student_fname?>" data-fullname="<?php echo $student_lname.' '.$student_fname.' '.$student_mname  ?>" data-email ="<?php echo $student_email  ?>" data-st ='Retake' data-submitted= "<?php echo $respo ?>" data-studentid = "<?php echo $studentid ?>"    style="font-size: 12px"><i class="fas fa-exclamation-triangle text-danger"></i></button>
                              <?php
                            }else if ($modify == 1 ){
                                ?>
                                <button type="button" class="btn btn-light notifystudenttoupdate" data-nameonly="<?php echo $student_fname?>" data-fullname="<?php echo $student_lname.' '.$student_fname.' '.$student_mname  ?>" data-email ="<?php echo $student_email  ?>" data-st ='Update' data-submitted= "<?php echo $respo ?>" data-studentid = "<?php echo $studentid ?>"    style="font-size: 12px"><i class="fas fa-exclamation-triangle text-danger"></i></button>
                              <?php
                            }else if ($upt == 1 ){
                                ?>
                                <button type="button" class="btn btn-light notifystudenttoupdate" data-nameonly="<?php echo $student_fname?>" data-fullname="<?php echo $student_lname.' '.$student_fname.' '.$student_mname  ?>" data-email ="<?php echo $student_email  ?>" data-st ='Update' data-submitted= "<?php echo $respo ?>" data-studentid = "<?php echo $studentid ?>"    style="font-size: 12px"><i class="fas fa-exclamation-triangle text-danger"></i></button>
                              <?php
                            }else {
                              ?>
                                  <button type="button" class="btn btn-light" onclick="window.open('view.php?student-pds&pdstoken=<?php echo $formid?>&id=<?php echo $studentid?>&studenttokenid=<?php echo $studentids ?>')" style="font-size: 12px"><i class="far fa-eye text-primary"></i></button>
                          <button type="button" class="btn btn-light" onclick="window.open('print.php?student-pds&pdstoken=<?php echo $formid?>&id=<?php echo $studentid?>&studenttokenid=<?php echo $studentids ?>')" style="font-size: 12px"><i class="fas fa-print text-info"></i></button>

                                <?php
                            }
                          
                            
                          }

                                
                              ?>
                            
                         
                        </div>
                                  </td>
                                 
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
                           <!-- <button type="submit" name="toview" style="font-size: 12px" class="btn btn-light"><i class="far fa-eye text-primary"></i> VIEW</button>
                             <button type="submit" name="toprint" style="font-size: 12px" class="btn btn-light"><i class="fas fa-print text-info"></i> PRINT</button> -->

                              <button type="submit" name="Notifustud" style="font-size: 12px" class="btn btn-light"><i class="fas fa-bell text-info"></i> NOTIFY</button>


    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.3/b-2.0.1/rr-1.2.8/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.3/b-2.0.1/rr-1.2.8/datatables.min.js"></script>
          <?php 
          if($formuptt == true){
            ?>
              <script type="text/javascript">
  
         $.notify("PDS Format has Changed! ", "error");      
         $('.tablerows').addClass('table-danger');
         $('#outdatedtext').text('Student PDS is Outdated. PDS Format or Queries has been modified!');
         $('#pdstableheader').removeClass('table-success');
         $('#pdstableheader').addClass('table-danger');
         </script>
            <?php
          }else if ($formupttq == true){
           ?>
           <script type="text/javascript">
              $.notify("PDS Queries has been Modified. ", "info");  
             // $('#pdstableheader').addClass('table-danger');
              $('#outdatedtext').text('Student PDS is Outdated. PDS Queries has been modified!');      
                   
           </script>
           <?php

          }else if ($formupttqs == true){
           ?>
           <script type="text/javascript">
             
              $('#pdstableheader').addClass('table-danger');
              $('#outdatedtext').text('Student PDS is Outdated. PDS Queries has been modified!');      
                   
           </script>
           <?php

          }

           ?>
            <script type="text/javascript">
             
              
              $(document).ready(function() {
                
            let table = new DataTable('#pdstable', {
      
     "search": {
    "caseInsensitive": false
  }

});

              $('.notifystudenttoupdate').click(function() { 
                 var fname = $(this).data('nameonly');
                 var st = $(this).data('st');
               $.notify("Notify "+fname+" to "+st+" his/her PDS. ", "error");  
            
            })
              $('.notifystddone').click(function() { 
               var fname = $(this).data('nameonly');
               $.notify(fname+"'s PDS was Updated. ", "success");  
              })

                $('.pdsdetails').click(function() { 
                  var fullname = $(this).data('fullname');
                  var email = $(this).data('email');
                  var submitted = $(this).data('submitted');
                  var studentid = $(this).data('studentid');
                  $('#nombre').text(fullname);
                  $('#mail').text(email);
                  $('#petsasubmit').text(submitted);
                  $('#modifica').text(submitted);
                   $('#pdscard').show();
                  $('.ribbon1').show();
                  $('#modallg').removeClass('modal-lg');
                  $('#updatedcontent').addClass('d-none');
                  $('#studentidval').val(studentid);
                })

                $('.pdsupdateddetails').click(function() { 
                   var fullname = $(this).data('fullname');
                  var email = $(this).data('email');
                  var submitted = $(this).data('submitted');
                  var studentid = $(this).data('studentid');
                  var datenot = $(this).data('datenote');
                   $('#nombres').text(fullname);
                  $('#mails').text(email);
                  $('#pdscard').hide();
                  $('.ribbon1').hide();
                  $('#modallg').addClass('modal-lg');
                  $('#updatedcontent').removeClass('d-none');
                  $('#datenote').text(datenot);
                  
                    var xhttp = new XMLHttpRequest();
                   xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                   const data = this.responseText;
                 
                    $('#tabledataupdated').html(data);
                                }
                             };
                     xhttp.open("POST", "action.php",true);
                     xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                     xhttp.send("tabledatapds=1&studentid="+studentid);
                     
                    
                            var xhttp = new XMLHttpRequest();
                           xhttp.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {
                           const data = this.responseText;
                         
                           
                         
                                        }
                                     };
                             xhttp.open("POST", "action.php",true);
                             xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                             xhttp.send("setread=1&id="+studentid);
                                 
                                              
                                  

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
        });


</script>
                             
	<?php


 if(isset($studcount)){
    $studs =  count($studcount);


  
 

  $countstudentcleared = " select * from student where retake = 0 and modify = 0 and upt = 0 and pds_filled=1 and stud_college = '$CollegeId' ";
                      $resultcsstudent = mysqli_query($con,$countstudentcleared); 
                      $clearedstud= mysqli_num_rows($resultcsstudent); 
             

 
      if($studs == $clearedstud){

     
   $sql = "DELETE FROM `notification` WHERE type='changes' and action ='globalnotification' and CollegeId = '$CollegeId'  ";
                    $result = mysqli_query($con,$sql); // run query
                 
                


  }

  

 }





	
}

 ?>