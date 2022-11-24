<?php 
session_start();
include '../create_form/connect.php';

if(isset($_POST['later'])){
  unset($_SESSION['first_time_login']);
  
}

if(isset($_POST['gettablepending'])){
	$course = $_POST['course'];
	$id = $_POST['id'];


	?>
	
	   <table class="table table-hover table-sm table-striped" id="tablestudentview">
    <thead>
    <tr class="table-warning" id="headercolor">
     
        <th scope="col">ID </th>
         <th scope="col">Lastname</th>
           <th scope="col">Firstname</th>
          <th scope="col">Middlename</th>
         <th scope="col">Email</th>
         <th scope="col">Gender</th>
    </tr>
  </thead>
  		<tbody >

  			<?php 
  				$selectstudents = "select * from student where stud_course = '$id' and pds_filled ='0'  ";
  				 $getstudentsdata = mysqli_query($con,$selectstudents); 
  				
  			 while($row = mysqli_fetch_array($getstudentsdata)){
  			 	 $studentid = $row['stud_id'];
                          $student_lname = $row['stud_lname'];
                          $student_fname = $row['stud_fname'];
                          $student_mname = $row['stud_mname'];
                          $student_email = $row['stud_email'];
                         $studemail = substr($student_email, 0, strpos($student_email,'@'));
  					?>
  					<tr>
  							
  							
  							<td><span style="font-weight:bolder"><?php echo $studemail ?></span></td>
  							<td><?php echo $student_lname ?></td>
  							<td><?php echo $student_fname ?></td>
  							<td><?php echo $student_mname ?></td>
  							<td><?php echo $student_email ?></td>
  							<td><?php echo $row['gender'] ?></td>

  					</tr>
  					<?php				
  				 }
  			
  			 

  			 ?>	


  		</tbody>
</table>

    <script src="../../js/jquery.js"></script>
                         
                            <link rel="stylesheet" type="text/css" href="../../offline/datatable.css"/>
 
<script type="text/javascript" src="../../offline/datatable.js"></script>






                            <script type="text/javascript">
                            	  $(document).ready(function() {
                            	  	
                          let tableview = new DataTable('#tablestudentview', {
      
                         "search": {
                        "caseInsensitive": false
                      }

                    });
                            	
                            	  });
                            	</script>
	<?php
	
}


if(isset($_POST['gettablecompleted'])){
	$course = $_POST['course'];
	$id = $_POST['id'];


	?>
	
	   <table class="table table-hover table-sm table-striped" id="tablestudentview">
    <thead>
    <tr class="table-success" id="headercolor">
        <th scope="col">Action </th>
        <th scope="col">ID </th>
         <th scope="col">Lastname</th>
           <th scope="col">Firstname</th>
          <th scope="col">Middlename</th>
         <th scope="col">Email</th>
         <th scope="col">Gender</th>
    </tr>
  </thead>
  		<tbody >

  			<?php 
  				$selectstudents = "select * from student where stud_course = '$id' and pds_filled ='1'  ";
  				 $getstudentsdata = mysqli_query($con,$selectstudents); 
  				
  			 while($row = mysqli_fetch_array($getstudentsdata)){
  			 	 $studentid = $row['stud_id'];
                          $student_lname = $row['stud_lname'];
                          $student_fname = $row['stud_fname'];
                          $student_mname = $row['stud_mname'];
                          $student_email = $row['stud_email'];
                             $retake = $row['retake'];
                          $modify = $row['modify'];
                          $upt = $row['upt'];
                         $studemail = substr($student_email, 0, strpos($student_email,'@'));

                           $sqls = " select * from form_response where userid='$studentid' and csformid = '62' ";
                                          $results = mysqli_query($con,$sqls); 
                                          $counts= mysqli_num_rows($results); 
                                   


                                    
                                        
                                           while($rows = mysqli_fetch_array($results)){
                                          $csform= $rows['csformid'];
                                          $user[] = $rows['userid'];
                                          $respondedat = $rows['datecreated'];
                                          //$contentofreponse[] = $rows['content'];

                                          $idforfiles[]= $rows['formid'];



                                          $respo = date('Y-m-d',strtotime($respondedat));
                                           }


  					?>
  					<tr>

              <td>
                        <div class="btn-group" role="group" aria-label="Button group with nested dropdown">

                                      <?php 

                                      if(isset($idforfiles)){
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
  							
  							
  							<td><span style="font-weight:bolder"><?php echo $studemail ?></span></td>
  							<td><?php echo $student_lname ?></td>
  							<td><?php echo $student_fname ?></td>
  							<td><?php echo $student_mname ?></td>
  							<td><?php echo $student_email ?></td>
  							<td><?php echo $row['gender'] ?></td>

  					</tr>
  					<?php				
  				 }
  			
  			 

  			 ?>	


  		</tbody>
</table>

     <script src="../../js/jquery.js"></script>
                         
                           <link rel="stylesheet" type="text/css" href="../../offline/datatable.css"/>
 
<script type="text/javascript" src="../../offline/datatable.js"></script>






                            <script type="text/javascript">
                            	  $(document).ready(function() {
                            	  	
                          let tableview = new DataTable('#tablestudentview', {
      
                         "search": {
                        "caseInsensitive": false
                      }

                    });
                            	
                            	  });
                            	</script>
	<?php
	
}


if(isset($_POST['gettablepending1'])){
  $course = $_POST['course'];
  $id = $_POST['id'];

  
  ?>
  
     <table class="table table-hover table-sm table-striped" id="tablestudentview">
    <thead>
    <tr class="table-warning" id="headercolor">
        <th scope="col">Status</th>
        <th scope="col">ID </th>
        <th scope="col">From</th>
        <th scope="col">To</th>
        <th scope="col">Date-Submitted</th>
         <th scope="col">Lastname</th>
           <th scope="col">Firstname</th>
          <th scope="col">Middlename</th>
         <th scope="col">Email</th>
         <th scope="col">Gender</th>
    </tr>
  </thead>
      <tbody >

        <?php 

            $selectshifting_history = "select * from shifting_history where from_course = '$id'  ";
           $gettingdata_sh = mysqli_query($con,$selectshifting_history); 
           $counting= mysqli_num_rows($gettingdata_sh);
          
         while($growsh = mysqli_fetch_array($gettingdata_sh)){
                    $sid =  $growsh['stud_id'];
                    $from = $growsh['from_college'];
                    $to =$growsh['to_college'];
                    $d = $growsh['datecreated'];
                    $stat = $growsh['status'];

                        $selectstudents = "select * from student where stud_id = '$sid'  ";
           $getstudentsdata = mysqli_query($con,$selectstudents); 
          
         while($row = mysqli_fetch_array($getstudentsdata)){
           $studentid = $row['stud_id'];
                          $student_lname = $row['stud_lname'];
                          $student_fname = $row['stud_fname'];
                          $student_mname = $row['stud_mname'];
                          $student_email = $row['stud_email'];
                         $studemail = substr($student_email, 0, strpos($student_email,'@'));

        
        
            ?>
            <tr>
                
                <td>
                  <?php 
                  if($stat == 'processing'){
                      ?>
                      <span class="badge badge-warning"><?php echo $stat ?></span>
                      <?php
                  }else {
                      ?>
                    <span class="badge badge-warning">Completed</span>
                    <?php 
                  }

                   ?>
                </td>
                <td><span style="font-weight:bolder"><?php echo $studemail ?></span></td>
                <td><?php echo $from ?></td>
                <td><?php echo $to ?></td>
                <td><?php echo date('F j,Y',strtotime($d)) ?></td>
                <td><?php echo $student_lname ?></td>
                <td><?php echo $student_fname ?></td>
                <td><?php echo $student_mname ?></td>
                <td><?php echo $student_email ?></td>
                <td><?php echo $row['gender'] ?></td>

            </tr>
            <?php       
           }


           }
         

      
        
         

         ?> 


      </tbody>
</table>

    <script src="../../js/jquery.js"></script>
                         
                        <link rel="stylesheet" type="text/css" href="../../offline/datatable.css"/>
 
<script type="text/javascript" src="../../offline/datatable.js"></script>






                            <script type="text/javascript">
                                $(document).ready(function() {
                                  
                          let tableview = new DataTable('#tablestudentview', {
      
                         "search": {
                        "caseInsensitive": false
                      }

                    });
                              
                                });
                              </script>
  <?php
  
}


 ?>