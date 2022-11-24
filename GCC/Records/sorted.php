<?php 
session_start();
include '../create_form/connect.php';

if(isset($_POST['sort_pds'])){

	$sort = $_POST['sort'];
	$sem = $_POST['sem'];
	$yr = $_POST['yr'];

	if($sort == 'null'){
		$s1 = 'datecreated';
	}else {
		$s1 = $sort;

		if($sort == 'Created'){
			$s1 = 'datecreated';
		}else {
			$s1 = 'date-modified';
		}
	}

	if($sem == 'null'){
		$s2 = $_SESSION['sem'];
	}else {
		$s2 = $sem;
	}

	if($yr == 'null'){
		$s3 = date('Y');

	}else {
		$s3 = $yr;
	}
	

	 	?>


	 	          <table class="table table-striped table-hover table-sm" id="pdstable">
                              <thead >
                                <tr class="table-success" id="pdstableheader" >
                                
                                  <th scope="col">ID </th>
                                  <th scope="col">Lastname</th>
                                  <th scope="col">Firstname</th>
                                  <th scope="col">Middlename</th>
                                  <th scope="col">Email</th>
                                  <th scope="col" >
                                  	
                                  	<?php 
                                 if($s1 == 'datecreated'){
                                 	echo 'Date-created';
                                 	
                                 }else if ($s1 == 'date-modified'){
                                 echo 'Date-Modified';
                                 }

                                  ?>
                                  </th>
                                 
                                  <th scope="col">Action</th>
                                </tr>
                              </thead>
                              <tbody id="tablecontents">

                                <?php 

   // include '../encrypt/sfgcc.php';
    //$enc =  new encryptdata();
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

                          if($s1 == 'datecreated'){
                                 	 $sqls = " select * from form_response where userid='$studentid' and csformid = '62' and semester ='$s2' and year(datecreated) ='$s3' order by '$s1'   ";
                                 	
                          }else if ($s1 == 'date-modified'){
                          		
                                 	 $sqls = " select * from form_response where userid='$studentid' and csformid = '62' and semester_upt ='$s2' and year(datemodified) = '$s3' order by '$s1' ";
                           }
       					
                                          $results = mysqli_query($con,$sqls); 
                                          $counts= mysqli_num_rows($results); 
                                   


                                       if ($counts>=1){
                                        
                                           while($rows = mysqli_fetch_array($results)){
                                          $csform= $rows['csformid'];
                                          $user[] = $rows['userid'];
                                          $respondedat = $rows['datecreated'];
                                          //$contentofreponse[] = $rows['content'];
                                           $respondedatm = $rows['datemodified'];
                                          $idforfiles[]= $rows['formid'];



                                          $respo = date('Y-m-d',strtotime($respondedat));
                                           }

                                           
  
                          //    $formid = $enc -> encryption($csform,"gccformtoken"); 
                            //  $studentids = $enc -> encryption($studentid,"gccstudenttoken");
   
                                         $studcount[] = $studentid;
                                        


                                           
                                           ?>
                                             <tr id="tablerows<?php echo $studentid ?>" class="tablerows">

                                

                                 <td style="font-weight: bolder"><?php echo $studemail ?></td>
                                  <td><?php echo $student_lname ?></td>
                                  <td><?php echo $student_fname ?></td>
                                  <td><?php echo $student_mname ?></td>
                                  <td><?php echo $student_email ?></td>
                                 <td><?php 
                                 if($s1 == 'datecreated'){
                                 
                                 		if($respondedat == ''){
                                 			echo 'None';
                                 		}else {
                                 				echo date('@h:i a F j,Y',strtotime($respondedat));
                                 		}
                                 }else if ($s1 == 'date-modified'){
                                 	if($respondedatm == ''){
                                 			echo 'None';
                                 		}else {
                                 			echo date('@h:i a F j,Y',strtotime($respondedatm));
                                 		}
                                 	
                                 }

                                  ?></td>
                                  
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

                                  <button type="button" class="btn btn-light" onclick="window.open('view.php?student-pds&pdstoken=62&id=<?php echo $studentid?>&studenttokenid=<?php echo $studentid ?>')" style="font-size: 12px"><i class="far fa-eye text-primary"></i></button>
                               
                          <button type="button" class="btn btn-light" onclick="window.open('print.php?student-pds&pdstoken=62&id=<?php echo $studentid?>&studenttokenid=<?php echo $studentid ?>')" style="font-size: 12px"><i class="fas fa-print text-info"></i></button>

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

                              
                              <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.3/b-2.0.1/rr-1.2.8/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.3/b-2.0.1/rr-1.2.8/datatables.min.js"></script>
                          
           
                <script type="text/javascript">
                      $(document).ready(function() {
                                let table = new DataTable('#pdstable', {
      
                         "search": {
                        "caseInsensitive": false
                      }

                    });



              $('#approveshiftingforms').on('submit', function(event){
                 event.preventDefault();
                  var atLeastOneIsChecked = $('input[name="approvedcheck[]"]:checked').length > 0;
                 if(atLeastOneIsChecked == false){
                 Swal.fire(
                'Selection is Empty!',
                '',
                'error'
              )
                 }else {
                  Swal.fire({
                        title: 'Are you sure?',
                        text: "You want to Forward all forms of selected students?",
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#f6c23e',
                        cancelButtonColor: '#858796',
                        confirmButtonText: 'Yes, approve it!'
                      }).then((result) => {
                        if (result.isConfirmed) {
                            var xhttp = new XMLHttpRequest();

                                          xhttp.onreadystatechange = function() {
                                           if (this.readyState == 4 && this.status == 200) {
                                          const data = this.responseText;
                                         
                                        Swal.fire(
                          'Approved!',
                          'Student form approved successfully!',
                          'success'
                        ).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) {
                         location.reload();
                            } 
                          })
                                                                      
                                        
                                                       }
                                                    };
                                            xhttp.open("POST", $('#approveshiftingforms').attr('action'),true);
                                            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                                            xhttp.send($('#approveshiftingforms').serialize());
                        }
                      })
                
                 }
                       /* $.ajax({
                                 url : "destination.php",
                                  method: "POST",
                                   data  : $(this).serialize(),
                                   success : function(data){
                      
                                   }
                                })*/
                 });
                        advancesearchcontent();
                           $('.myinputsss').keyup(function(){ 

                           
                            var value = $(this).val().toLowerCase();


                              var size = $(".advancecontent_search > .ele").length; // The parentdiv plus the element containing the text or card
                                           var count = $('div.ele:hidden').length;  // The child element or card
                                          

                                           $('#tryfound').text('Search Result For : '+ value);


                            if(value == ''){
                                $('.051715').removeClass('d-none');
                                 $('#tryfound').text('');
                                 $('.advancecontent_search').addClass('d-none');
                            }else {
                               $('.051715').addClass('d-none');
                                $('.advancecontent_search').removeClass('d-none');
                                
                              $('div[data-role="searchfor"]').filter(function() {
                                       $(this).toggle($(this).find('h6').text().toLowerCase().indexOf(value) > -1)
                                   });
                             
                                 
                               
                                  
                                   
                            }
                          
                          
                          })

                         $('#btnsearchclick').click(function() { 
                          
                         
                            if($('#confirmcheck').prop("checked") == true) {
                                         $('#confirmcheck').prop('checked',false);  
                                           $('.051715').removeClass('d-none');
                                           $('.advancecontent_search').addClass('d-none');
                                         $(this).find("i").toggleClass("far fa-times-circle");  
                                           
                                      }
                                   else if($('#confirmcheck').prop("checked") == false) {
                                           $('#confirmcheck').prop('checked',true); 
                                      $('.051715').addClass('d-none');
                                      $('.advancecontent_search').removeClass('d-none')   
                                      $(this).find("i").toggleClass("far fa-times-circle");  
                                                                    
                                    }
                          
                         /* ;*/
                         })
                             
                           function advancesearchcontent(){
                               
                                
                                  var xhttp = new XMLHttpRequest();
                                 xhttp.onreadystatechange = function() {
                                  if (this.readyState == 4 && this.status == 200) {
                                 const data = this.responseText;
                               
                              
                              $('.advancecontent_search').html(data);
                              
                                              }
                                           };
                                   xhttp.open("POST", "advancesearch.php",true);
                                   xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                                   xhttp.send("searchfor=1");
                                       
                                                
                           }



                      });
                      
                     
                                     
                            
                    </script>

         
            <script type="text/javascript">
                
                $(document).ready(function() {
                      $('.art').click(function() { 
                           $('#cont1').addClass('show');  
                           $('#cont1').addClass('active'); 
                           $(this).addClass('active');
                            $('#cont2').removeClass('show');  
                           $('#cont2').removeClass('active'); 
                           $('.peer').removeClass('active');
                         
                          })  
                          $('.peer').click(function() { 
                             $('#cont1').removeClass('show');  
                           $('#cont1').removeClass('active'); 
                           $('.art').removeClass('active');
                            $('#cont2').addClass('show');  
                           $('#cont2').addClass('active'); 
                           $(this).addClass('active');
                          
                            }) 
                          //// Sidebar Funcitons
                             
                           
                     
                         ///////////////////////////////
                           
                
                      });      
                      
            </script>

	 	<?php

	 	
	 

	
}




if(isset($_POST['sort_sf'])){

  $sort = $_POST['sort'];
  $sem = $_POST['sem'];
  $yr = $_POST['yr'];

  if($sort == 'null'){
    $s1 = 'datecreated';
  }else {
    $s1 = $sort;

    if($sort == 'Created'){
      $s1 = 'datecreated';
    }else {
      $s1 = 'date-modified';
    }
  }

  if($sem == 'null'){
    $s2 = $_SESSION['sem'];
  }else {
    $s2 = $sem;
  }

  if($yr == 'null'){
    $s3 = date('Y');

  }else {
    $s3 = $yr;
  }
  

    ?>


              <table class="table table-striped table-hover table-sm" id="pdstable">
                              <thead >
                                <tr class="table-success" id="pdstableheader" >
                                
                                  <th scope="col">ID </th>
                                  <th scope="col">Lastname</th>
                                  <th scope="col">Firstname</th>
                                  <th scope="col">Middlename</th>
                                  <th scope="col">Email</th>
                                  <th scope="col" >
                                    
                                    <?php 
                                 if($s1 == 'datecreated'){
                                  echo 'Date-Created';
                                  
                                 }else if ($s1 == 'date-modified'){
                                 echo 'Date-Approved';
                                 }

                                  ?>
                                  </th>
                                 
                                  <th scope="col">Action</th>
                                </tr>
                              </thead>
                              <tbody id="tablecontents">

                                <?php 

   // include '../encrypt/sfgcc.php';
    //$enc =  new encryptdata();
                                  $sql = " SELECT * FROM `student` ";
                      $result = mysqli_query($con,$sql); 
                   
                     $checkchanges = " SELECT * FROM `form` where class_name='60'  ";
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

                          if($s1 == 'datecreated'){
                                   $sqls = " select * from form_response where userid='$studentid' and csformid = '60' and semester ='$s2' and year(datecreated) ='$s3' order by '$s1'   ";
                                  
                          }else if ($s1 == 'date-modified'){
                              
                                   $sqls = " select * from form_response where userid='$studentid' and csformid = '60' and semester ='$s2' and  approvestat = 2 and year(dateapproved) = '$s3' ";
                           }
                
                                          $results = mysqli_query($con,$sqls); 
                                          $counts= mysqli_num_rows($results); 
                                   


                                       if ($counts>=1){
                                        
                                           while($rows = mysqli_fetch_array($results)){
                                          $csform= $rows['csformid'];
                                          $user[] = $rows['userid'];
                                          $respondedat = $rows['datecreated'];
                                          //$contentofreponse[] = $rows['content'];
                                           $respondedatm = $rows['datemodified'];
                                          $idforfiles[]= $rows['formid'];

                                          $shit = $rows['shifting_history'];

                                          $respo = date('Y-m-d',strtotime($respondedat));
                                           }

                                           
  
                          //    $formid = $enc -> encryption($csform,"gccformtoken"); 
                            //  $studentids = $enc -> encryption($studentid,"gccstudenttoken");
   
                                         $studcount[] = $studentid;
                                        


                                           
                                           ?>
                                             <tr id="tablerows<?php echo $studentid ?>" class="tablerows">

                                

                                 <td style="font-weight: bolder"><?php echo $studemail ?></td>
                                  <td><?php echo $student_lname ?></td>
                                  <td><?php echo $student_fname ?></td>
                                  <td><?php echo $student_mname ?></td>
                                  <td><?php echo $student_email ?></td>
                                 <td><?php 
                                 if($s1 == 'datecreated'){
                                 
                                    if($respondedat == ''){
                                      echo 'None';
                                    }else {
                                        echo date('F j,Y',strtotime($respondedat));
                                    }
                                 }else if ($s1 == 'date-modified'){
                                 

                                      $getdates_approved = "select * from shifting_history where sh_id = '$shit'  ";
                                       $getdateapproved = mysqli_query($con,$getdates_approved); 
                                     
                                     while($ddate = mysqli_fetch_array($getdateapproved)){
                                            echo date('F j,Y',strtotime($ddate['dateapproved']));     
                                       }
                                    
                                     
                                  
                                 }

                                  ?></td>
                                  
                                  <td>
                                    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                         <a class="page-link text-success " data-csformid = "<?php echo $csform ?>" data-studentid="<?php echo $studentid ?>" data-studname = "<?php echo $student_lname.' '.$student_fname.' '.$student_mname.'.' ?>" href="student_record.php?id=<?php echo $studentid ?>" style="font-size: 12px"  data-shift="<?php echo $coursetoshift ?>">Shifting Records 
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

                                  <button type="button" class="btn btn-light" onclick="window.open('view.php?student-pds&pdstoken=60&id=<?php echo $studentid?>&studenttokenid=<?php echo $studentid ?>')" style="font-size: 12px"><i class="far fa-eye text-primary"></i></button>
                               
                          <button type="button" class="btn btn-light" onclick="window.open('print.php?student-pds&pdstoken=60&id=<?php echo $studentid?>&studenttokenid=<?php echo $studentid ?>')" style="font-size: 12px"><i class="fas fa-print text-info"></i></button>

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

                              
                              <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.3/b-2.0.1/rr-1.2.8/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.3/b-2.0.1/rr-1.2.8/datatables.min.js"></script>
                          
           
                <script type="text/javascript">
                      $(document).ready(function() {
                                let table = new DataTable('#pdstable', {
      
                         "search": {
                        "caseInsensitive": false
                      }

                    });



              $('#approveshiftingforms').on('submit', function(event){
                 event.preventDefault();
                  var atLeastOneIsChecked = $('input[name="approvedcheck[]"]:checked').length > 0;
                 if(atLeastOneIsChecked == false){
                 Swal.fire(
                'Selection is Empty!',
                '',
                'error'
              )
                 }else {
                  Swal.fire({
                        title: 'Are you sure?',
                        text: "You want to approved all forms of selected students?",
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#f6c23e',
                        cancelButtonColor: '#858796',
                        confirmButtonText: 'Yes, approve it!'
                      }).then((result) => {
                        if (result.isConfirmed) {
                            var xhttp = new XMLHttpRequest();

                                          xhttp.onreadystatechange = function() {
                                           if (this.readyState == 4 && this.status == 200) {
                                          const data = this.responseText;
                                         
                                        Swal.fire(
                          'Approved!',
                          'Student form approved successfully!',
                          'success'
                        ).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) {
                         location.reload();
                            } 
                          })
                                                                      
                                        
                                                       }
                                                    };
                                            xhttp.open("POST", $('#approveshiftingforms').attr('action'),true);
                                            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                                            xhttp.send($('#approveshiftingforms').serialize());
                        }
                      })
                
                 }
                       /* $.ajax({
                                 url : "destination.php",
                                  method: "POST",
                                   data  : $(this).serialize(),
                                   success : function(data){
                      
                                   }
                                })*/
                 });
                        advancesearchcontent();
                           $('.myinputsss').keyup(function(){ 

                           
                            var value = $(this).val().toLowerCase();


                              var size = $(".advancecontent_search > .ele").length; // The parentdiv plus the element containing the text or card
                                           var count = $('div.ele:hidden').length;  // The child element or card
                                          

                                           $('#tryfound').text('Search Result For : '+ value);


                            if(value == ''){
                                $('.051715').removeClass('d-none');
                                 $('#tryfound').text('');
                                 $('.advancecontent_search').addClass('d-none');
                            }else {
                               $('.051715').addClass('d-none');
                                $('.advancecontent_search').removeClass('d-none');
                                
                              $('div[data-role="searchfor"]').filter(function() {
                                       $(this).toggle($(this).find('h6').text().toLowerCase().indexOf(value) > -1)
                                   });
                             
                                 
                               
                                  
                                   
                            }
                          
                          
                          })

                         $('#btnsearchclick').click(function() { 
                          
                         
                            if($('#confirmcheck').prop("checked") == true) {
                                         $('#confirmcheck').prop('checked',false);  
                                           $('.051715').removeClass('d-none');
                                           $('.advancecontent_search').addClass('d-none');
                                         $(this).find("i").toggleClass("far fa-times-circle");  
                                           
                                      }
                                   else if($('#confirmcheck').prop("checked") == false) {
                                           $('#confirmcheck').prop('checked',true); 
                                      $('.051715').addClass('d-none');
                                      $('.advancecontent_search').removeClass('d-none')   
                                      $(this).find("i").toggleClass("far fa-times-circle");  
                                                                    
                                    }
                          
                         /* ;*/
                         })
                             
                           function advancesearchcontent(){
                               
                                
                                  var xhttp = new XMLHttpRequest();
                                 xhttp.onreadystatechange = function() {
                                  if (this.readyState == 4 && this.status == 200) {
                                 const data = this.responseText;
                               
                              
                              $('.advancecontent_search').html(data);
                              
                                              }
                                           };
                                   xhttp.open("POST", "advancesearch.php",true);
                                   xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                                   xhttp.send("searchfor=1");
                                       
                                                
                           }



                      });
                      
                     
                                     
                            
                    </script>

         
            <script type="text/javascript">
                
                $(document).ready(function() {
                      $('.art').click(function() { 
                           $('#cont1').addClass('show');  
                           $('#cont1').addClass('active'); 
                           $(this).addClass('active');
                            $('#cont2').removeClass('show');  
                           $('#cont2').removeClass('active'); 
                           $('.peer').removeClass('active');
                         
                          })  
                          $('.peer').click(function() { 
                             $('#cont1').removeClass('show');  
                           $('#cont1').removeClass('active'); 
                           $('.art').removeClass('active');
                            $('#cont2').addClass('show');  
                           $('#cont2').addClass('active'); 
                           $(this).addClass('active');
                          
                            }) 
                          //// Sidebar Funcitons
                             
                           
                     
                         ///////////////////////////////
                           
                
                      });      
                      
            </script>

    <?php

    
   

}



if(isset($_POST['sort_log'])){
   $sort = $_POST['sort'];
  $sem = $_POST['sem'];
  $yr = $_POST['yr'];

  

  if($sem == 'null'){
    $s2 = $_SESSION['sem'];
  }else {
    $s2 = $sem;
  }

  if($yr == 'null'){
    $s3 = date('Y');

  }else {
    $s3 = $yr;
  }
    

    ?>

       <table class="table table-dark table-sm" id="pdstable" style="font-size:12px">
                                          <thead>
                                            <tr>
                                              <th scope="col">Date</th>
                                              <th scope="col">Fields</th>
                                              <th scope="col">Description</th>

                                              <th scope="col">Admin</th>
                                               <th scope="col">Contact No</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <?php   
                                           if($sort == 'null'){
                                                $get_all_logs = "select * from logs where semester = '$s2' and year(datemodified) = '$s3' ";
                                           }else {
                                                $get_all_logs = "select * from logs where semester = '$s2' and year(datemodified) = '$s3' and manage_fields = '$sort' ";
                                           }
                       
                                              $gettinglogs = mysqli_query($con,$get_all_logs); 
                                              
                                             while($row = mysqli_fetch_array($gettinglogs)){
                                                $fields = $row['manage_fields'];
                                                $adminid = $row['admin_id'];
                                                $coordinator = $row['coordinator'];
                                                $courses = $row['courses'];
                                                       ?>

                                                       <tr>
                                                           <td><?php echo date('F j,Y  @h:i a',strtotime($row['datemodified'])) ?></td>
                                                           <td><?php  echo $fields ?></td>
                                                           <td><?php echo $row['content'];

                                                           if(isset($courses)){
                                                           
                                                              if($courses == ''){

                                                           }else {
                                                             echo 'And its Courses : ';
                                                            echo $courses;
                                                           }

                                                           }

                                                           if(isset($coordinator)){

                                                         

                                                        if($coordinator == ''){

                                                           }else {
                                                               echo ' And Coordinator/s : ';
                                                            echo $coordinator;
                                                           }


                                                           }
                                                       
                                                         


                                                            ?></td>
                                                           <td><?php
                                                               $getadmin_name = "select * from administrator where admin_id ='$adminid'  ";
                                                                $gettingadm = mysqli_query($con,$getadmin_name); 
                                                              
                                                            while($getadm = mysqli_fetch_array($gettingadm)){
                                                                        echo $getadm['admin_lname'].' '.$getadm['admin_fname'];   
                                                                        $cn = $getadm['admin_contactno'];           
                                                                }
                                                           
                                                            

                                                                ?></td>
                                                                <td><?php 
                                                                if($cn == ''){
                                                                    echo 'None';
                                                                }else {
                                                                    echo $cn;
                                                                }


                                                                 ?></td>

                                                       </tr>
                                                       <?php             
                                                 }
                                            
                                             


                                            

                                             

                                             ?>
                                          </tbody>
                                        </table>

                                       <script src="../../js/jquery.js"></script>
                              <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.3/b-2.0.1/rr-1.2.8/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.3/b-2.0.1/rr-1.2.8/datatables.min.js"></script>
                          
           
                <script type="text/javascript">
                      $(document).ready(function() {
                                let table = new DataTable('#pdstable', {
      
                         "search": {
                        "caseInsensitive": false
                      }

                    });

                              })

                  </script>


    <?php


}


 ?>