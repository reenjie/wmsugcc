<?php 
session_start();
include '../GCC/create_form/connect.php';
 $usertoken = $_SESSION['user_student_token_check'];
if(isset($_POST['requestcounseling'])){
?>
<button class="btn btn-light text-secondary backtoform mb-4" style="font-size: 12px;">Back to Forms</button>
<br>
	<button class="btn btn-light text-primary" style="font-size:14px" data-bs-toggle="modal" data-bs-target="#exampleModal">Create <i class="fas fa-plus-circle"></i></button>

	<div class="btn-group">
	<button class="btn btn-light text-secondary" id="all" style="font-size:14px" >All</button>
	<button class="btn btn-light text-secondary" id="completed" style="font-size:14px" >Done</button>
	</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel">Create Request</h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      			<h6 class="text-primary" style="font-size:13px">Select a Schedule below to complete Request.</h6>
   

                                                    

                                                        <?php 
                                                        date_default_timezone_set('Asia/Manila');
														$datenow = date('Y-m-d');
                                                            $getall_sched = "SELECT * FROM `scheduler` where date_valid >= '$datenow' and status=1 and sched_id not in (select sched_id from counseling_request where stud_id = '$usertoken') ";
                                                             $gettingsched = mysqli_query($con,$getall_sched); 
                                                             $count= mysqli_num_rows($gettingsched);
                                                         	
													   
                                                            if($count >=1){
                                                         while($row = mysqli_fetch_array($gettingsched)){
                                                              $sid = $row['sched_id'];
                                                            $stat = $row['status'];
                                                                ?>
                                                                    <li class="list-group-item" id="<?php echo $row['sched_id'] ?>">
                                                            <h6 style="font-size:13px;text-align: left;">     
                                                                    
                                                                <span style="font-weight:bolder"><?php echo $row['title'] ?></span>
                                                                <br>
                                                                <?php  date_default_timezone_set('Asia/Manila') ?>
                                                               When : <span class="text-info"><?php echo date('F j,Y',strtotime($row['date_valid'])) ?></span> <br>
                                                               Time :   <span class="text-danger"><?php echo date('h:i a',strtotime($row['time_start'])) ?> -> <?php echo date('h:i a',strtotime($row['time_end'])); ?> </span> 
                                                               <br>

                                                             
                                                                status :
                                                              
                                                                <?php 



                                                                 if(date('Y-m-d') == $row['date_valid']){
                                                                ?>
                                                                  <span class="badge badge-success">Active</span>   
                                                                    <button class="btn btn-light text-primary selsched" data-sid="<?php echo $row['sched_id'] ?>" style="float:right; font-size: 13px">Select</button>
                                                                <?php
                                                               }else if(date('Y-m-d') < $row['date_valid']) {
                                                                 ?>
                                                                  <span class="badge badge-warning">Inactive</span>   
                                                                    <button class="btn btn-light text-primary selsched" data-sid="<?php echo $row['sched_id'] ?>" style="float:right; font-size: 13px">Select</button>

                                                                <?php
                                                               }else {
                                                                        $check_scheduledone = "select * from counseling_request where status = 5 and sched_id = '$sid'  ";
                                                                     $requestdone = mysqli_query($con,$check_scheduledone); 
                                                                     $countrequest_done= mysqli_num_rows($requestdone);

                                                                     while($rq = mysqli_fetch_array($requestdone)){
                                                                            $rqd = $rq['sched_id'];                 
                                                                          }
                                                                    if($rqd == $sid){
                                                                        ?>
                                                                         <span class="badge badge-secondary">Unavailable</span>   
                                                                      <?php
                                                                }else {


                                                                    
                                                                    ?>
                                                                  <span class="badge badge-danger">Invalid</span>   
                                                                   
                                                                <?php

                                                                }
                                                               }





                                                                 ?>

                                                                 <br>
                                                                 <?php 
                                                                 if($row['status'] == 0 ){
                                                                 	echo 'PRIVATE';
                                                                 }else {
                                                                 	echo 'PUBLIC';
                                                                 }
                                                                  ?>
                                                               


                                                            </h6>       
                                                        </li>

                                                                <?php   


                                                             }
                                                        
                                                         }else {
                                                            ?>
                                                            <li class="list-group-item" ><h6 style="font-size:12px;text-align: center;">
                                                <img src="../GCC/img/undraw_No_data_re_kwbl.png" style="width:150px;height:150px"><br>
                                              No Created Schedule Yet..</h6></li>


                                              <button class="btn btn-light text-success mt-3 requestcc" style="font-size:13px;float: right;">Make Request</button>

                                                            <?php
                                                         }

                                                         ?>


                                             <!--  -->
                                           





      </div>
      <div class="modal-footer">
       
      </div>
    </div>
  </div>
</div>
	


	   					<table class="table  table-sm" style="font-size:13px">
												  <thead>
												    <tr>
												      <th scope="col">Type</th>
												      <th scope="col">Scheduled Appointment</th>
												      <th scope="col">Remarks</th>
												     
												    </tr>
												  </thead>
												  <tbody>
                                                 
                                           
                                                    <?php 
                                                  
                                                 
                                                        date_default_timezone_set('Asia/Manila');
														$datenow = date('Y-m-d');
														$key = $_POST['requestcounseling'];
														if($key == 'all'){
																$get_counselingdata = "select * from counseling_request where status != 5 and stud_id='$usertoken'  ";
														}else if ($key == 'completed') {
																$get_counselingdata = "select * from counseling_request where status = 5 and stud_id='$usertoken'  ";
														}
												
                                                         $getallcounselings = mysqli_query($con,$get_counselingdata); 
                                                         $countingcs= mysqli_num_rows($getallcounselings);
                                                       
                                                        if($countingcs >=1){
                                                     while($row = mysqli_fetch_array($getallcounselings)){
                                                        $studid = $row['stud_id'];
                                                        $schedid = $row['sched_id'];
                                                        $status = $row['status'];
                                                        $cid = $row['c_id'];

                                            $get_studentdata = "select * from student where stud_id = '$studid'  ";
                                             $gettingdata = mysqli_query($con,$get_studentdata); 
                                             $count= mysqli_num_rows($gettingdata);
                                            
                                          
                                         while($rows = mysqli_fetch_array($gettingdata)){
                                                $studentid = $rows['stud_id'];
                                              $student_lname = $rows['stud_lname'];
                                              $student_fname = $rows['stud_fname'];
                                              $student_mname = $rows['stud_mname'];
                                              $student_email = $rows['stud_email'];
                                                $student_course = $rows['stud_course'];
                                                $stud_coll = $rows['stud_college'];

                                          }
                                     
                                                               ?>
                                                                <tr>
                                                  
                                                       <td>
                                                      
                                                        <?php 
                                                        if($status == 0){
                                                            ?>
                                                            <span class="badge badge-success">Created</span>
                                                            <?php

                                                        }else if ($status == 5) {
                                                            ?>
                                                            <span class="badge badge-success">Done </span>
                                                            <?php
                                                        }else {
                                                        	 ?>
                                                            <span class="badge badge-success">Requested </span>
                                                            <?php
                                                        }

                                                         ?>
                                                        
                                                        
                                                      
                                                        

                                                      </td>
                                                     
                                                   
                                                      <td>
                                                      	    
                                                       
                                                            <?php 
                                                            if($schedid == 0){
                                                                ?>  
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <h6 style="text-align:center;font-size: 12px;">Requesting For Schedule</h6>

                                                                        <?php 
                                                                          if($status == 2 || $status == 3){
                                                                    ?>
                                                                    <h6 style="text-align:center;">
                                                                         <button class="btn btn-danger mt-4 delete" data-id="<?php echo $cid ?>" style="font-size: 13px;">Delete</button>
                                                                    </h6>
                                                                   
                                                                    <?php
                                                                }


                                                                         ?>
                                                                    </div>
                                                                </div>

                                                                <?php
                                                            }else {

                                                                       $getall_sched = "SELECT * FROM `scheduler` where sched_id = '$schedid'  ";
                                                             $gettingsched = mysqli_query($con,$getall_sched); 
                                                           
                                                         
                                                          
                                                         while($rowe = mysqli_fetch_array($gettingsched)){
                                                                ?>
                                                                    <li class="list-group-item" id="<?php echo $rowe['sched_id'] ?>">
                                                            <h6 style="font-size:13px">     
                                                                    
                                                                <span style="font-weight:bolder"><?php echo $rowe['title'] ?></span>
                                                                <br>
                                                                <?php  date_default_timezone_set('Asia/Manila') ?>
                                                              <span class="text-info"><?php echo date('F j,Y',strtotime($rowe['date_valid'])) ?></span> <br>
                                                               <span class="text-danger"><?php echo date('h:i a',strtotime($rowe['time_start'])) ?> -> <?php echo date('h:i a',strtotime($rowe['time_end'])); ?> </span> 


                                                               <br>
                                                               <?php
                                                                 if($status == 2 || $status == 3){
                                                                    ?>
                                                                    <button class="btn btn-danger mt-4 delete" data-id="<?php echo $cid ?>" style="font-size: 13px;">Delete</button>
                                                                    <?php
                                                                }


                                                           }


                                                            }

                                                              
                                                          
                                                             ?>

                                                          </span>
                                                      </td>
                                                      
                                                      <td>
                                                      	<h6 style="font-size:14px" class="text-danger">
                                                      
                                                      	<?php 
                                                      	echo $row['remarks'];
                                                      	 ?>

                                                      	</h6>
                                                      	
                                                      </td>
                                                  
                                                    </tr>
                                                               <?php             
                                                         }
                                                    
                                                     }else {
                                                        ?>
                                                        <tr>
                                                        	<td colspan="4">
                                                        		  <h6 style="text-align:center;" class="mt-4">
                                                                   <img src="../GCC/img/undraw_empty_street_sfxm.png" style="width:400px">
                                                                   <br>
                                                                  You dont have any request yet..
                                                               </h6> 
                                                        		
                                                        	</td>
                                                        </tr>
                                                       
                                                             
                                                          
                                                        <?php
                                                     }

                                                     ?>
                                                   
                                                   
                                                
                                               
                                               
												  
												   
												  </tbody>
												</table>

                                                <script type="text/javascript">

                                                    $('.delete').click(function(){
                                                        var id = $(this).data('id');

                                                              Swal.fire({
                                                  title: 'Are you sure?',
                                                  text: "This Request is not yet confirmed. Once the request has been confirmed , you are unable to delete this request, do you wish to proceed?",
                                                  icon: 'warning',
                                                  showCancelButton: true,
                                                  confirmButtonColor: '#b45c64',
                                                  cancelButtonColor: '#b1b55c',
                                                  confirmButtonText: 'Proceed'
                                                }).then((result) => {
                                                  if (result.isConfirmed) {
                                                             $.ajax({
                                                             url : "request.php",
                                                              method: "POST",
                                                             data  : {deleterequest:id},
                                                              success : function(data){

                                                                    Swal.fire(
                                                                  'Request Deleted Successfully!',
                                                                  'Your Request has been deleted',
                                                                  'success'
                                                                ).then((result) => {
                                                
                                                  if (result.isConfirmed) {
                                                     request('all');       
                                                  } 
                                                })
                                                        
                                                        
                                                               }
                                                             })

                                                  }
                                                })
                                                                      
                                                    })

                                                    $('.requestcc').click(function(){

                                                        Swal.fire({
                                                  title: 'NOTICE',
                                                  text: "This Request will be validated and subject for confirmation, once confirmed, it will notify your account.",
                                                  icon: 'question',
                                                  showCancelButton: true,
                                                  confirmButtonColor: '#8d89de',
                                                  cancelButtonColor: '#dade89',
                                                  confirmButtonText: 'Proceed'
                                                }).then((result) => {
                                                  if (result.isConfirmed) {
                                                             $.ajax({
                                                             url : "request.php",
                                                              method: "POST",
                                                             data  : {createrequestnosched:1},
                                                              success : function(data){

                                                                    Swal.fire(
                                                                  'Request Sent Successfully!',
                                                                  'We will notify accordingly if request has been confirmed',
                                                                  'success'
                                                                ).then((result) => {
                                                
                                                  if (result.isConfirmed) {
                                                    location.reload();      
                                                  } 
                                                })
                                                        
                                                        
                                                               }
                                                             })

                                                  }
                                                })
                                                                      
                                                    })
                                                	$('.selsched').click(function(){
                                                		var sid = $(this).data('sid');

                                                		Swal.fire({
												  title: 'NOTICE',
												  text: "This Request will be validated and subject for confirmation, once confirmed, it will notify your account.",
												  icon: 'question',
												  showCancelButton: true,
												  confirmButtonColor: '#8d89de',
												  cancelButtonColor: '#dade89',
												  confirmButtonText: 'Proceed'
												}).then((result) => {
												  if (result.isConfirmed) {
												 			 $.ajax({
												 			 url : "request.php",
												 			  method: "POST",
												 			 data  : {createrequest:sid},
												 			  success : function(data){

												 			  		Swal.fire(
																  'Request Sent Successfully!',
																  'We will notify accordingly if request has been confirmed',
																  'success'
																).then((result) => {
												
												  if (result.isConfirmed) {
												  	location.reload();		
												  } 
												})
												 		
												 		
												 			   }
												 			 })

												  }
												})


                                                	})
                                                	 $('.backtoform').click(function(){
											     		  		forms();	
											     })
											       function forms(){
											       $.ajax({
											                 url : "content.php",
											                  method: "POST",
											                   data  : {forms:1},
											                   success : function(data){
											        $('.content-tab').html(data);
											        $('#loader').addClass('d-none');
											                   }
											                })
											    }

                                                	$('#completed').click(function(){
                                                	
                                                			

                                                			request('completed');	
                                                		  		
                                                	})
                                                	$('#all').click(function(){
                                                	
                                                			

                                                			request('all');	
                                                		  		
                                                	})

                                                	 function request(key){
										     	  $.ajax({
										                 url : "request.php",
										                  method: "POST",
										                   data  : {requestcounseling:key},
										                   success : function(data){
										        $('.content-tab').html(data);
										        $('#loader').addClass('d-none');
										                   }
										                })
										     }
                                                	$('#deleteall').click(function(){

                                                		
                                                		   Swal.fire({
                                                                          title: 'Are you sure to Delete all Request?',
                                                                          text: "You wont be able to revert this, Do you still want to Proceed?",
                                                                          icon: 'warning',
                                                                          showCancelButton: true,
                                                                          confirmButtonColor: '#3085d6',
                                                                          cancelButtonColor: '#d33',
                                                                          confirmButtonText: 'Yes, delete it!'
                                                                        }).then((result) => {
                                                                          if (result.isConfirmed) {
                                                                        $.ajax({
					                                                		 url : "action.php",
					                                                		  method: "POST",
					                                                		 data  : {deleteall:1},
					                                                		  success : function(data){
					                                                		 location.reload();
					                                                		   }
					                                                		 })

                                                                            
                                                                          }
                                                                        })
                                                			  		
                                                	})
                                                	$('.remarks').focusout(function(){

                                                		var value = $(this).val();
                                                		var id = $(this).data('id');

                                                		 $.ajax({
                                                		 url : "action.php",
                                                		  method: "POST",
                                                		 data  : {saveremarks:value,id:id},
                                                		  success : function(data){
                                                		 
                                                		   }
                                                		 })
                                                	})

                                                	$('.removecr').click(function(){
                                                		var id = $(this).data('id');
                                                		    Swal.fire({
                                                                          title: 'Are you sure to Delete this Request?',
                                                                          text: "You wont be able to revert this.The student will then need to make a request again or the admin will be the one to create, Do you want to Proceed?",
                                                                          icon: 'warning',
                                                                          showCancelButton: true,
                                                                          confirmButtonColor: '#3085d6',
                                                                          cancelButtonColor: '#d33',
                                                                          confirmButtonText: 'Yes, delete it!'
                                                                        }).then((result) => {
                                                                          if (result.isConfirmed) {
                                                                              $.ajax({
                                                                     url : "action.php",
                                                                     method: "POST",
                                                                     data  : {delcr:id},
                                                                      success : function(data){
                                                                     
                                                                    location.reload();
                                                                     }
                                                                      })
                                                                            
                                                                          }
                                                                        })
                                                			  		
                                                	})

                                                		$('.removecrd').click(function(){
                                                		var id = $(this).data('id');
                                                		    Swal.fire({
                                                                          title: 'Are you sure to Delete this Record?',
                                                                          text: "You wont be able to revert this.Do you want to Proceed?",
                                                                          icon: 'warning',
                                                                          showCancelButton: true,
                                                                          confirmButtonColor: '#3085d6',
                                                                          cancelButtonColor: '#d33',
                                                                          confirmButtonText: 'Yes, delete it!'
                                                                        }).then((result) => {
                                                                          if (result.isConfirmed) {
                                                                              $.ajax({
                                                                     url : "action.php",
                                                                     method: "POST",
                                                                     data  : {delcr:id},
                                                                      success : function(data){
                                                                     
                                                                    location.reload();
                                                                     }
                                                                      })
                                                                            
                                                                          }
                                                                        })
                                                			  		
                                                	})

                                                	$('.mkd').click(function(){
                                                	var id = $(this).data('id');
                                                	 Swal.fire({
                                                                          title: 'Are you sure ?',
                                                                          text: "",
                                                                          icon: 'question',
                                                                          showCancelButton: true,
                                                                          confirmButtonColor: '#7db282',
                                                                          cancelButtonColor: '#af5858',
                                                                          confirmButtonText: 'Yes, Mark it!'
                                                                        }).then((result) => {
                                                                          if (result.isConfirmed) {
                                                                              $.ajax({
                                                                     url : "action.php",
                                                                     method: "POST",
                                                                     data  : {mkdr:id},
                                                                      success : function(data){
                                                                     
                                                                    location.reload();
                                                                     }
                                                                      })
                                                                            
                                                                          }
                                                                        })

                                                			  		
                                                	})
                                                </script>
	
<?php
}

if(isset($_POST['createrequest'])){
	$createrequest = $_POST['createrequest'];

	date_default_timezone_set('Asia/Manila');
	$datenow = date('Y-m-d H:i:s');
	
	$insert_counseling = "INSERT INTO `counseling_request`(`stud_id`, `datecreated`, `sched_id`,`status`) VALUES ('$usertoken','$datenow','$createrequest','2')";
	mysqli_query($con,$insert_counseling);
	
}

if(isset($_POST['createrequestnosched'])){
  date_default_timezone_set('Asia/Manila');
    $datenow = date('Y-m-d H:i:s');
    
    $insert_counseling = "INSERT INTO `counseling_request`(`stud_id`, `datecreated`, `sched_id`,`status`) VALUES ('$usertoken','$datenow','$createrequest','3')";
    mysqli_query($con,$insert_counseling);  
}

if(isset($_POST['deleterequest'])){
    $deleterequest = $_POST['deleterequest'];

    $delete_request = "DELETE from counseling_request where c_id ='$deleterequest' ";
    mysqli_query($con,$delete_request);
    
}
 ?>