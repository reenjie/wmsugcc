<?php 
session_start();
include '../../GCC/create_form/connect.php';
 $admintoken = $_SESSION['admin_token'];

if(isset($_POST['getnotify'])){ 
		

		
				$sql = " SELECT * FROM `notification` where type='request' and admin_id = '$admintoken' and status ='unread' ";
		                $result = mysqli_query($con,$sql); // run query
		                $count= mysqli_num_rows($result); // to count if necessary
		             echo $count;
}

if(isset($_POST['getnotifybell'])){ 
    

    
        $sql = " SELECT * FROM `notification` where type='notification' and admin_id = '$admintoken' and status ='unread' ";
                    $result = mysqli_query($con,$sql); // run query
                    $count= mysqli_num_rows($result); // to count if necessary
                 echo $count;
}

if(isset($_POST['getmessagerequest'])){ 
	?>
	  

                                 
                                <?php
                                $admintoken = $_SESSION['admin_token']; 
                               
                                        $messages = "SELECT * FROM `notification` where type='request' and admin_id='$admintoken' order by date_notified desc limit 5  ";
                                                $resultmessages = mysqli_query($con,$messages); // run query
                                                $countmessages= mysqli_num_rows($resultmessages); // to count if necessary
                                               //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
                                             if ($countmessages>=1){
                                                 //while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                                                 while($row = mysqli_fetch_array($resultmessages)){
                                                    $studentid = $row['request_id'];
                                                    $read = $row['status'];
                                                   	

                                                   	 $sqlstud = " select * from student where stud_id = '$studentid'  ";
                                                            $resultstud = mysqli_query($con,$sqlstud); // run query
                                                           
                                                             while($rowstud = mysqli_fetch_array( $resultstud)){
                                                             	$lname = $rowstud['stud_lname'];
                                                             	$fname = $rowstud['stud_fname'];
                                                             	$mname = $rowstud['stud_mname'];
                                                             	$email= $rowstud['stud_email'];
                             
                                                             }

                                                             $imgsrc = array(
                                                                    '../img/undraw_profile_1.svg',    
                                                                    '../img/undraw_male_avatar_323b.png',    
                                                                    '../img/undraw_female_avatar_w3jk.png',    
                                                                    '../img/undraw_profile_pic_ic5t.png',    
                                                                    
                                                                );
                                                             $rand_keys = array_rand($imgsrc, 2);


                                                    ?>
                               <a class="dropdown-item d-flex align-items-center hoverselect" data-studentid="<?php echo $studentid ?>" data-studemail="<?php echo $email ?>" data-student="<?php echo $lname.' '.$fname.' '.substr($mname, 0, 1).'.'  ?>" data-nid="<?php echo $row['noti_id'] ?>" data-title="<?php echo $row['title'] ?>" data-contents="<?php echo $row['content'] ?>" data-typeof="<?php echo $row['type'] ?>"  href="#" data-toggle="modal" data-target="#messagerequestcontentsview" data-backdrop="static" data-keyboard="false">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="<?php echo $imgsrc[$rand_keys[0]]; ?>"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate"><?php echo $row['title'];
                                            if($read == 'unread'){
                                                	?>
                              <span class="badge badge-danger" style="right: 50px;padding: 5px;border-radius: 5px"> </span>
                                                	<?php
                                                }else if($read == 'read'){

                                                }


                                         ?></div>
                                        <div class="small text-gray-500">
                                            <?php 
                  echo $lname.' '.$fname.'  <span style="text-tranform:uppercase">'.substr($mname, 0, 1).'</span>'; 

                                            
                                                     
                                             ?>
 					
                                        </div>

                                    </div>
                                </a>

                                                    <?php
                                                 }
                                                 ?>
                                                  <a class="dropdown-item text-center small text-gray-500" href="../Notifications/Message-Requests/">Read More Messages</a>
                                                 <?php
                                          }else {
                                           ?>
                                           <h6 style="font-size: 14px; padding: 50px;text-align: center;">No Message Request Yet..</h6>
                                           <?php
                                          }
                                 ?>
                               
                        <script type="text/javascript">
 	
 	$(document).ready(function() {
 	      	$('.hoverselect').click(function() { 
 	      	 	var title = $(this).data('title');
 	      	 	var type = $(this).data('typeof');
 	      	 	var content = $(this).data('contents');
 	      	 	var id = $(this).data('nid');
 	      	 	var student = $(this).data('student');
 	      	 	var email =$(this).data('studemail');
            var studid = $(this).data('studentid');
            $('#titlenotifrecall').text(title);
            $('#notiftitles').val(title);
 	      	$('#notification_id').val(id);
					$('#titlenotif').text(title);
					$('#contentnotif').text(content);
					$('#notifstatus').text(type);
					$('#requestor').text(student);
					$('#studemail').text(email);
          $('#studentids').val(studid);
					 
					 

					
					   	
					   				
					         	      	 
					    

 	      	 
 	      	 })
 	      });      
       	
 </script>       



	<?php
}

if(isset($_POST['getnotificationbell'])){ 
?>
    

                                 
                                <?php
                                $admintoken = $_SESSION['admin_token']; 
                               
                                        $messages = "SELECT * FROM `notification` where type='notification' and admin_id='$admintoken' order by date_notified desc limit 5  ";
                                                $resultmessages = mysqli_query($con,$messages); // run query
                                                $countmessages= mysqli_num_rows($resultmessages); // to count if necessary
                                               //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
                                             if ($countmessages>=1){
                                                 //while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                                                 while($row = mysqli_fetch_array($resultmessages)){
                                                    $studentid = $row['studenttaker_id'];
                                                    $read = $row['status'];
                                                    $notidate = $row['date_notified'];

                                                    $formids = $row['formid'];
                                                    

                                                     $sqlstud = " select * from student where stud_id = '$studentid'  ";
                                                            $resultstud = mysqli_query($con,$sqlstud); // run query
                                                           
                                                             while($rowstud = mysqli_fetch_array( $resultstud)){
                                                              $lname = $rowstud['stud_lname'];
                                                              $fname = $rowstud['stud_fname'];
                                                              $mname = $rowstud['stud_mname'];
                                                              $email= $rowstud['stud_email'];
                             
                                                             }

                                                    $imgsrc = array(
                                                                    '../img/undraw_profile_1.svg',    
                                                                    '../img/undraw_male_avatar_323b.png',    
                                                                    '../img/undraw_female_avatar_w3jk.png',    
                                                                    '../img/undraw_profile_pic_ic5t.png',    
                                                                    
                                                                );
                                                             $rand_keys = array_rand($imgsrc, 2);


                                                    ?>
                               <a class="dropdown-item d-flex align-items-center hoverselect" data-studentid="<?php echo $studentid ?>" data-studemail="<?php echo $email ?>" data-student="<?php echo $lname.' '.$fname.' '.substr($mname, 0, 1).'.'  ?>" data-nid="<?php echo $row['noti_id'] ?>" data-title="<?php echo $row['title'] ?>" data-contents="<?php echo $row['content'] ?>" data-ccontent="<?php echo str_replace(',', ' <br>', '<br>'.$row['ccontent']).'<p><br></p> ';   ?>" data-details ="<?php echo str_replace(',', ' <br>', '<br>'.$row['cdetails']);  ?>" data-replaced="<?php echo str_replace(',', ' <br>', '<br>'.$row['creplaced_details']);   ?>" data-typeof="<?php echo $row['type'] ?>"  href="#" data-toggle="modal" data-target="#notificationbellcontentview" data-backdrop="static" data-keyboard="false">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="<?php echo $imgsrc[$rand_keys[0]]; ?>"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate"><?php echo $row['title'];
                                            if($read == 'unread'){
                                                  ?>
                              <span class="badge badge-danger" style="right: 50px;padding: 5px;border-radius: 5px"> </span>
                                                  <?php
                                                }else if($read == 'read'){

                                                }


                                         ?></div>
                                        <div class="small text-gray-500">
                                            <?php 
                  echo $lname.' '.$fname.'  <span style="text-tranform:uppercase">'.substr($mname, 0, 1).'</span>'; 

                                            
                                                     
                                             ?>
          
                                        </div>
                                        <span style="font-size: 10px;font-weight: normal;" class="text-secondary"><?php echo date('@ h:i a , F j-Y',strtotime($notidate)); ?></span>

                                    </div>
                                </a>

                                                    <?php
                                                 }
                                                 ?>
                                                   <a class="dropdown-item text-center small text-gray-500" href="../Notifications/Alerts/">Show All Alerts</a>
                                                 <?php
                                          }else {
                                           ?>
                                           <h6 style="font-size: 14px; padding: 50px;text-align: center;">No Alerts Yet..</h6>
                                           <?php
                                          }
                                 ?>
                               
                        <script type="text/javascript">
  
  $(document).ready(function() {
          $('.hoverselect').click(function() { 
            var title = $(this).data('title');
            var type = $(this).data('typeof');
            var content = $(this).data('contents');
            var id = $(this).data('nid');
            var student = $(this).data('student');
            var email =$(this).data('studemail');
            var studid = $(this).data('studentid');
            var formid = $(this).data('formid');
            var contents = $(this).data('ccontent');
            var details = $(this).data('details');
            var replacedata = $(this).data('replaced');
            if(contents == ''){
            $('#query1').html('');
            $('#query2').html('');
            $('#query3').html('');
            }else {
            $('#query1').html('Query : <span class="text-primary" style="text-tranform:uppercase">'+contents+'</span>');
            $('#query2').html('Recent Data : <span class="text-info">'+details+'</span>');
            $('#query3').html('Modified Data : <span class="text-success">'+replacedata+'</span>');
            }

           


           $('#titlenotifrecall1').text(title);
           $('#notiftitles1').val(title);
          $('#notification_id1').val(id);
          $('#titlenotif1').text(title);
         $('#contentnotif1').text(content);
         $('#notifformid').val(formid);
          $('#notifstatus1').text(type);
          $('#requestor1').text(student);
          $('#studemail1').text(email);
          $('#studentids1').val(studid);

           
           

          
              
                    
                             
              

           
           })
        });      
        
 </script>       



  <?php
  
}

if(isset($_POST['setread'])){ 
	$id = $_POST['id'];
	$sql = "UPDATE `notification` SET `status`='read' WHERE noti_id='$id' ";
  			                $result = mysqli_query($con,$sql); 
}
if(isset($_POST['sendreply'])){ 
  $studentidtoreply = $_POST['studentidtoreply'];
  $messagemail = $_POST['messagemail'];
  $customRadioInline1 = $_POST['customRadioInline1'];
  $titleofnotif = $_POST['titleofnotif'];
  $title = $titleofnotif.' request was '.$customRadioInline1;
  //$admintoken
  date_default_timezone_set('Asia/Manila');
  $datenow = date('Y-m-d H:i:s');

      $sql = "INSERT INTO `notification`(`stud_id`, `type`, `title`, `content`, `status`, `date_notified`,`adminsender`) VALUES ('$studentidtoreply','Approval of Request','$title','$messagemail','unread','$datenow','$admintoken') ";
                        $result = mysqli_query($con,$sql); 
                 
}

if(isset($_POST['deletenotification'])){ 
  $id = $_POST['id'];
      $sql = " DELETE FROM `notification` WHERE noti_id='$id'  ";
                  $result = mysqli_query($con,$sql); // run query
                  
}
 ?>
 