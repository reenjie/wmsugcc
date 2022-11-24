<?php 
session_start();
include '../../GCC/create_form/connect.php';
$collegeid = $_SESSION['gc_collegid'];
$adminid = $_SESSION['admin_token'];

if(isset($_POST['history_coordinators'])){
?>  

  <?php 

               if(isset($_SESSION['show_rec'])){
                 $show_ =  $_SESSION['show_rec'];
                                    
                if($show_ == 1){
                  ?>
                 
             <button class="btn btn-light text-danger hidedata" style="font-size:14px;float:right;">
            HIDE ALL
            </button>
                <?php

                
                        
               }else {


                     
                ?>
             <button class="btn btn-light text-primary showdata" style="font-size:14px;float:right;">
             SHOW/DISPLAY All Data
            </button>
                <?php

                 }
             }


             ?>

	
	<table class="table table-sm table-striped" style="font-size:14px">
  <thead>
    <tr class="table-info">
      <th scope="col">Replaced-Date</th>
      <th scope="col">Coordinator</th>
      <th scope="col">Transaction Details</th>
    
    </tr>
  </thead>
  <tbody>
  <?php 
  	$getall_Inactive_coordinators = "select * from administrator where CollegeId = '$collegeid' and admin_id != '$adminid' and edstat = 1  ";
  	 $gettinginactives = mysqli_query($con,$getall_Inactive_coordinators); 
  	 $count= mysqli_num_rows($gettinginactives);
  	
  	if($count >=1){
   while($row = mysqli_fetch_array($gettinginactives)){
    $rid = $row['admin_id'];
  		?>

  		<tr>
  				
  				<td><?php echo date('F,j Y',strtotime($row['admin_executiondate'])) ?></td>
  				<td>
            <span class="text-primary"><?php echo $row['admin_lname'].' '.$row['admin_fname'].' '.$row['admin_mname'] ?></span>
          <br>
          <?php echo $row['admin_email'] ?>
          <br>
          <?php echo $row['admin_contactno'] ?>
          <br>
          Effective Date : <?php echo date('F,j Y',strtotime($row['admin_effectivedate'])) ?>

          </td>
  				<td>
  				<h6 style="font-size:12px">
                <ul class="list-group" style="text-align:center;">
          <?php 

             $get_approvedcount = "select * from shifting_history where coordinator = '$rid'  ";
              $gettingcounts = mysqli_query($con,$get_approvedcount); 
              $countappr= mysqli_num_rows($gettingcounts);
              //$newlyinsertedid = mysqli_insert_id($con);
             if($countappr >=1){
                ?>
                <li class="list-group-item">Approved Shifting Request : <span class="badge badge-danger"  style="font-size:12px"><?php echo $countappr ?></span>
                    <br>

                        <button type="button" class="btn btn-light text-primary viewshistrequest" data-coordinator="<?php echo $rid ?>" style="font-size:12px">View</button>
                </li>
                <?php
            }

                $getreferrals_made = "SELECT * FROM `referral_history` where coordinator = '$rid'   ";
                 $refferals_made = mysqli_query($con,$getreferrals_made); 
                 $countreferrals= mysqli_num_rows($refferals_made);
                 //$newlyinsertedid = mysqli_insert_id($con);
                if($countreferrals >=1){
                    ?>
                      <li class="list-group-item">Referrals Made : <span class="badge badge-danger" style="font-size:12px"><?php echo $countreferrals ?></span>
                        <br>
                        <button type="button" class="btn btn-light text-primary viewreferral" data-coordinator="<?php echo $rid ?>" style="font-size:12px">View</button>
                      </li>
                    <?php
             }


            ?>

 
  
 

            <?php
           

           ?>  
           </ul>
  
          </h6>
  					
  				</td>
  			


  		</tr>
  		<?php		
  	 }
  
   }else {
   	echo 'No Coordinators';
   }


   ?>
  </tbody>
</table>
<script type="text/javascript" src="../../offline/sweetalert.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
      $('.showdata').click(function(){

         $.ajax({
         url : "action.php",
          method: "POST",
         data  : {showdata:1},
          success : function(data){
         tableitem();
         Swal.fire(
          'Data Shown!',
          'All data has been shown',
          'success'
        )

           }
         })
                
      })

      $('.hidedata').click(function(){
          $.ajax({
         url : "action.php",
          method: "POST",
         data  : {hidedata:1},
          success : function(data){
         tableitem();
          Swal.fire(
          'Data Hidden!',
          'All data has been hidden',
          'success'
        )

           }
         })       
      })

      $('.viewshistrequest').click(function(){
        var coordinator = $(this).data('coordinator');

                 $.ajax({
                 url : "coordinator_data.php",
                  method: "POST",
                 data  : {shiftrequest:coordinator},
                  success : function(data){
                   $('#tablecontents').html(data);
                   }
                 })
                        
      })

      $('.viewreferral').click(function(){

         var coordinator = $(this).data('coordinator');

                 $.ajax({
                 url : "coordinator_data.php",
                  method: "POST",
                 data  : {referral:coordinator},
                  success : function(data){
                   $('#tablecontents').html(data);
                   }
                 })
                        
      })
       function tableitem(){
   
    
       $.ajax({
               url : "coordinator_data.php",
                method: "POST",
                 data  : {history_coordinators:1},
                 success : function(data){
                $('#tablecontents').html(data);
                 }
              })
         
        
   }
  
    });
</script>

<?php

	
}

if(isset($_POST['referral'])){
    $referral = $_POST['referral'];


    ?>
    <button class="btn btn-light text-secondary mb-3" id="back" style="font-size:14px"><i class="fas fa-arrow-left"></i></button>
        <table class="table table-sm table-striped" style="font-size:14px">
  <thead>
   <tr class="table-success">
                                                
                                             <th scope="col"></th>
                                              <th scope="col">Status</th>
                                                  <th scope="col">No </th>
                                                  <th scope="col">Student ID</th>
                                                  <th scope="col">Name</th>
                                                    <th scope="col">Subject</th>
                                                    <th scope="col">Referred By</th>
                                                <th scope="col">Date-Created</th>
                                           
                                           
                                              </tr>
  </thead>
  <tbody>
  <?php 
 
             $get_approvedcount = "select * from referral_history where coordinator = '$referral'  ";
              $gettingcounts = mysqli_query($con,$get_approvedcount); 
              $countappr= mysqli_num_rows($gettingcounts);
              //$newlyinsertedid = mysqli_insert_id($con);
             if($countappr >=1){

                  while($row = mysqli_fetch_array($gettingcounts)){
                      $stat = $row['status'];
                                                        $studentid = $row['stud_id'];
                                                        $coordinator = $row['coordinator'];

                                    $getstudent_data = "select * from student where stud_id = '$studentid'  ";
                                     $gettingdata_student = mysqli_query($con,$getstudent_data); 
                                    
                                 while($stud = mysqli_fetch_array($gettingdata_student)){
                                     $student_lname = $stud['stud_lname'];
                                          $student_fname = $stud['stud_fname'];
                                          $student_mname = $stud['stud_mname'];
                                          $student_email = $stud['stud_email'];
                                       $student_Fullname = $student_lname.' '.$student_fname.' '.$student_mname;  
                                         $studemail = substr($student_email, 0, strpos($student_email,'@'));
                                                        
                                     }
                                
                                 
                        ?>
                                      <tr>

                                                                    <td>
                                                                        <?php 
                                                                        if($stat == 0){
                                                                            ?>
                                                                              <a href="JavaScript:void()" class="text-secondary"  style="font-size:13px;cursor: not-allowed;" ><i class="fas fa-print"></i></a>
                                                                            <?php

                                                                        }else{
                                                                              ?>
                                                                              <a href="../Referrals/referral-view.php?tokenid=<?php echo $row['rh_id'] ?>&&id=<?php echo $row['stud_id'] ?>&status=<?php echo $stat ?>" target="_blank" style="font-size:13px"><i class="fas fa-print"></i></a>
                                                                            <?php
                                                                        }

                                                                         ?>
                                                                        
                                                                        
                                                                      

                                                                    </td>
                                                                    <td>
                                                                        <?php 
                                                                        if($stat == 1){
                                                                            ?>
                                                                            <span class="badge badge-primary">New</span>
                                                                            <?php
                                                                        }else if ($stat == 0){
                                                                               ?>
                                                                            <span class="badge badge-warning">Unfinished</span>
                                                                            <?php 
                                                                        }else if ($stat == 2){
                                                                            ?>
                                                                            <span class="badge badge-info">Pending</span>
                                                                            <?php 
                                                                        }else if ($stat == 3){
                                                                                ?>
                                                                            <span class="badge badge-success">Completed</span>
                                                                            <?php 
                                                                        }


                                                                         ?>
                                                                        

                                                                    </td>
                                                                    <td>Ref_<?php echo $row['rh_id']  ?></td>
                                                                    <td><?php echo $studemail ?></td>
                                                                    <td><?php echo $student_Fullname ?></td>
                                                                    <td><span style="font-weight:bolder;"><?php echo $row['subject'] ?></span></td>
                                                                    <td><span style="font-style:italic"><?php echo $row['referred_by'] ?></span></td>
                                                                    <td><?php echo date('F j,Y',strtotime($row['datecreated'])) ?></td>
                                                                   
                                                              </tr>
                                                          

                                        <?php                   
                     }
             
            }else {
    echo 'No Coordinators';
   }


   ?>
  </tbody>
</table>

<script type="text/javascript">
      $(document).ready(function() {
          $('#back').click(function(){
           
                tableitem();                
          })

            function tableitem(){
   
    
       $.ajax({
               url : "coordinator_data.php",
                method: "POST",
                 data  : {history_coordinators:1},
                 success : function(data){
                $('#tablecontents').html(data);
                 }
              })
         
        
   }
    
      });
</script>

    <?php
    
}

if(isset($_POST['shiftrequest'])){
    $shiftrequest = $_POST['shiftrequest'];

    ?>
    <button class="btn btn-light text-secondary mb-3" id="back" style="font-size:14px"><i class="fas fa-arrow-left"></i></button>
        <table class="table table-sm table-striped" style="font-size:14px">
  <thead>
    <tr class="table-success">
                                 
                                   
                                 <th scope="col" class="stathead">Status</th>
                                 <th scope="col">

                                 </th>
                                 <th scope="col">Name</th>
                                   <th scope="col">From</th>
                                   <th scope="col">To</th>
                                  <th scope="col">Date-submitted</th>
                                    <th scope="col">Times</th>
                                 
                                 <!-- <th scope="col" >Last Modified</th>-->
                              
                                </tr>
  </thead>
  <tbody>
  <?php 
 
             $get_approvedcount = "select * from shifting_history where coordinator = '$shiftrequest'  ";
              $gettingcounts = mysqli_query($con,$get_approvedcount); 
              $countappr= mysqli_num_rows($gettingcounts);
              //$newlyinsertedid = mysqli_insert_id($con);
             if($countappr >=1){

                  while($row = mysqli_fetch_array($gettingcounts)){
                      $status = $row['status'];
                                $hist = $row['sh_id'];
                                $id = $row['stud_id'];

                                    $getstudent_data = "select * from student where stud_id = '$id'  ";
                                     $gettingdata_student = mysqli_query($con,$getstudent_data); 
                                    
                                 while($stud = mysqli_fetch_array($gettingdata_student)){
                                     $student_lname = $stud['stud_lname'];
                                          $student_fname = $stud['stud_fname'];
                                          $student_mname = $stud['stud_mname'];
                                          $student_email = $stud['stud_email'];
                                       $student_Fullname = $student_lname.' '.$student_fname.' '.$student_mname;  
                                                        
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
                                                         <a  class="page-link text-success " href="session.php?approved&sftoken=60&studenttokenid=<?php echo $id ?>&studentname=<?php echo  $student_Fullname ?>&status=2&hist=<?php echo $hist ?>&from=<?php echo $row['from_course'] ?>&to=<?php echo $row['to_course'] ?>&fromcollege=<?php echo $row['from_'] ?>&tocollege=<?php echo $row['to_'] ?>" target="_blank"  style="font-size: 12px" data-bs-toggle="tooltip" data-bs-placement="right" title="Generated Shifting Form Editable" >Generated Shifting Form  (Automated)</a>

                                                        <?php

                                                    }

                                                     ?>
                                                      
                                                   </td>
                                                   <td><?php echo $student_Fullname ?> <br>
                                                 <span style="font-size:11px">  <?php echo $student_email ?></span> 
                                                   </td>
                                                <td><?php echo $row['from_college'] ?></td>
                                                <td><?php echo $row['to_college'] ?></td>
                                                <td><?php echo date('F j,Y',strtotime($row['datecreated'])) ?></td>
                                                <td><?php echo $row['shiftcount'] ?></td>

                                        </tr>

                                        <?php                   
                     }
             
            }else {
    echo 'No Coordinators';
   }


   ?>
  </tbody>
</table>

<script type="text/javascript">
      $(document).ready(function() {
          $('#back').click(function(){
           
                tableitem();                
          })

            function tableitem(){
   
    
       $.ajax({
               url : "coordinator_data.php",
                method: "POST",
                 data  : {history_coordinators:1},
                 success : function(data){
                $('#tablecontents').html(data);
                 }
              })
         
        
   }
    
      });
</script>

    <?php

    
}


 ?>