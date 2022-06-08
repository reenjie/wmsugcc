<?php 
session_start();
include '../../create_form/connect.php';
 $admintoken = $_SESSION['admin_token'];


if(isset($_POST['tablecontent'])){ 
		
				$sql = " SELECT * FROM `notification` where type='request' and admin_id = '$admintoken' ";
		                $result = mysqli_query($con,$sql); // run query
		                $count= mysqli_num_rows($result); // to count if necessary
		               //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
		             if ($count>=1){
		             	//while($row = mysqli_fetch_array($result)){} is where we output all the data in database
		                 while($row = mysqli_fetch_array($result)){
		                 	$studentid = $row['sender_id'];

		                 		$stud = "select * from student where stud_id = '$studentid' ";
		                 		 $resultstud = mysqli_query($con,$stud); 
		                 		  while($stud = mysqli_fetch_array($resultstud)){ 
		                 		  	$name = $stud['stud_lname'].' '.$stud['stud_fname'].' '.substr($stud['stud_mname'],0,1).'.';
		                 		  	$email =$stud['stud_email'];
		                 		  		$lname = $stud['stud_lname'];
                                                             	$fname = $stud['stud_fname'];
                                                             	$mname = $stud['stud_mname'];
                                                             	
		                 		  }
		               				
							?>
								<tr>
									<td>
					 <div class="custom-control custom-checkbox">
				  <input type="checkbox" class="custom-control-input checkall" id="checkall<?php echo $row['noti_id'] ?>" name="checkval[]" value="<?php echo $row['noti_id'] ?>" >
				  <label class="custom-control-label" for="checkall<?php echo $row['noti_id'] ?>"></label>
				</div>
				

									</td>
							     
							      <td class="hoverselect" data-studentid="<?php echo $studentid ?>" data-studemail="<?php echo $email ?>" data-student="<?php echo $lname.' '.$fname.' '.substr($mname, 0, 1).'.'  ?>" data-nid="<?php echo $row['noti_id'] ?>" data-title="<?php echo $row['title'] ?>" data-contents="<?php echo $row['content'] ?>" data-typeof="<?php echo $row['type'] ?>"  href="#" data-toggle="modal" data-target="#messagerequestcontentsview" data-backdrop="static" data-keyboard="false"><?php echo

							      date('@ h:i a',strtotime($row['date_notified'])).'<br>'.date('F j-Y',strtotime($row['date_notified']));
							      ?></td>
							      <td class="hoverselect"  data-studentid="<?php echo $studentid ?>" data-studemail="<?php echo $email ?>" data-student="<?php echo $lname.' '.$fname.' '.substr($mname, 0, 1).'.'  ?>" data-nid="<?php echo $row['noti_id'] ?>" data-title="<?php echo $row['title'] ?>" data-contents="<?php echo $row['content'] ?>" data-typeof="<?php echo $row['type'] ?>"  href="#" data-toggle="modal" data-target="#messagerequestcontentsview" data-backdrop="static" data-keyboard="false">
							      	<?php echo $email ?>
							      </td>
							      <td class="hoverselect"  data-studentid="<?php echo $studentid ?>" data-studemail="<?php echo $email ?>" data-student="<?php echo $lname.' '.$fname.' '.substr($mname, 0, 1).'.'  ?>" data-nid="<?php echo $row['noti_id'] ?>" data-title="<?php echo $row['title'] ?>" data-contents="<?php echo $row['content'] ?>" data-typeof="<?php echo $row['type'] ?>"  href="#" data-toggle="modal" data-target="#messagerequestcontentsview" data-backdrop="static" data-keyboard="false" style="font-weight: bolder"><?php echo $row['title'] ?></td>
							    
							      <td >
							      		<button class="btn btn-light deletebtn" data-id="<?php echo $row['noti_id'] ?>" type="button" style="font-size: 12px"><i class="fas fa-times-circle text-secondary"></i></button>


							      </td>
							    </tr>
								<?php
		                 }
		                 ?>

		                 <script type="text/javascript">
		                 	
		                 	 $('#customCheck1').click(function() {
 	      	      if($(this).prop("checked") == true) {
 	      	             $('.checkall').prop('checked',true);    
 	      	             $('#customCheck1').prop('indeterminate', true)                    		
 	      	         }
 	      	      else if($(this).prop("checked") == false) {
 	      	      	$('.checkall').prop('checked',false);  
 	      	                                       
 	      	       }
 	      	    });
		                 	 $('.deletebtn').click(function() { 
		                 	 	var id=$(this).data('id');
		                 	 	  Swal.fire({
                          title: 'Are you sure?',
                          text: "You won't be able to revert this!",
                          icon: 'warning',
                          showCancelButton: true,
                          confirmButtonColor: '#e74a3b',
                          cancelButtonColor: '#f6c23e',
                          confirmButtonText: 'Yes, delete it!'
                        }).then((result) => {
                          if (result.isConfirmed) {
                              $.ajax({
                                       url :'action.php',
                                        method: "POST",
                                         data  : {del:1,id:id},
                                         success : function(data){

                                     Swal.fire(
                                    'Deleted Successfully!',
                                    'Alert Deleted!',
                                    'success'
                                  )
                                     tablecontent();
                                        $('.checkall').prop('checked',false);    
                      $('#customCheck1').prop('indeterminate',false);
                       $('#customCheck1').prop('checked',false);       
                                         }
                                      })
                          }
                        })
		                 	 
		                 	 })
		                 	 function tablecontent(){
                        
                      
                         $.ajax({
                                 url : "action.php",
                                  method: "POST",
                                   data  : {tablecontent:1},
                                   success : function(data){
                              $('#tablecontents').html(data);
                                   }
                                })
                         
                          
                    }

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
      
		                       	
		                 </script>
		                 <?php
		          }else {
		          	?>
		          	<tr>
		          		<td colspan="8" style="text-align: center;"><span >No Request Yet..</span></td>
		          	</tr>
		          	<?php
		          }

}

if(isset($_POST['trigger'])){ 
	$checkval = $_POST['checkval'];

		 foreach ($checkval as $checkid) {
		 			$sql = " DELETE FROM `notification` WHERE noti_id = '$checkid' ";
		 		       $result = mysqli_query($con,$sql); // run query
		 		              
		 		     


		 }
	
}
if(isset($_POST['del'])){ 
	$id = $_POST['id'];
				$sql = " DELETE FROM `notification` WHERE noti_id = '$id' ";
		 		              $result = mysqli_query($con,$sql); 
		 		              
}

 ?>