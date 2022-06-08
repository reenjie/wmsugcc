<?php
session_start();
 include '../../GCC/create_form/connect.php';
 $gccol = $_SESSION['gc_collegid'];
 if(isset($_POST['getconvo'])){

 	$id = $_POST['getconvo'];
 	$_SESSION['convoId'] = $id;

 	$update_to_read = "UPDATE `message` SET `status`='1'  WHERE stud_id = '$id' and send = '$id' and status = 0 and adm= '$gccol'";
	mysqli_query($con,$update_to_read);
 		




 	   $get_messagesdata = "select * from message where stud_id = '$id' and gc = 0 and adm = '$gccol' ;";
                                     $gettingsms = mysqli_query($con,$get_messagesdata); 
                                     $count= mysqli_num_rows($gettingsms);
                                  
                                    if($count >=1){
                                 while($row = mysqli_fetch_array($gettingsms)){
                                            $adm = $row['adm'];

                                            $send = $row['send'];
                                            $rec  = $row['receive'];

                                            if($rec == 0){
                                               
                                            }else {
                                            ?>
                                           
 

                                             <div class="row">
                            <div class="col-md-6"></div>
                               <div class="col-md-6">
                                   <div class="card mb-3 mt-2 bg-dark text-light shadow" >
                                       <div class="card-body">
                                           <h6 style="font-size:12px">From : Me <br>
                                            <span style="font-size:11px;float: right;"><?php echo date('h:i:sa F j, Y ',strtotime($row['datecreated'])) ?></span>
                                           </h6>
                                           <hr>
                                           <span style="font-size:14px">
                                               <?php echo $row['message'] ?>
                                           </span>
                                       </div> 

                                       <div class="card-footer bg-dark"> 
                                       	<button class="btn btn-dark text-light" style="font-size:12px;float:right;" data-toggle="collapse" data-target="#collapseExample<?php echo $row['msg_id'] ?>" aria-expanded="false" aria-controls="collapseExample<?php echo $row['msg_id'] ?>">Remove</button>

                                       <div class="collapse" id="collapseExample<?php echo $row['msg_id'] ?>">
							  <div class="card card-body">
							  	<h6 style="font-size:12px" class="text-dark">
							  		 <button class="btn btn-light text-danger rall" data-id="<?php echo $row['msg_id'] ?>" data-tp="gc" style="font-size:12px">Remove From all</button>
							  		 <button class="btn btn-light text-danger ryou" data-id="<?php echo $row['msg_id'] ?>" data-tp="gc" style="font-size:12px">Remove From You</button>
							  	</h6>

							   
							  </div>
							</div>

						
                                       </div>
                                   </div>
                               </div>
                           </div>
                                            <?php
                                            }

                                            if($send == 0){
                                                
                                            }else {
                                              ?>
                                                <div class="row">
                               <div class="col-md-6">
                                   <div class="card mb-2 mt-2 shadow" >
                                       <div class="card-body">
                                           <h6 style="font-size:12px">From :
                                           	<?php 
                                           			$get_studentname = "select * from student where stud_id = '$id'  ";
                                           			 $gettingname = mysqli_query($con,$get_studentname); 
                                           			
                                           		 while($uname = mysqli_fetch_array($gettingname)){
                                           				echo $uname['stud_fname'].' '.$uname['stud_lname'];					
                                           			 }
                                           		
                                           		 

                                           	 ?>

                                            <br>
                                            <span style="font-size:11px;float: right;"><?php echo date('h:i:sa F j, Y ',strtotime($row['datecreated'])) ?></span>
                                           </h6>
                                           <hr>
                                           <span style="font-size:14px">
                                              <?php echo $row['message'] ?>
                                           </span>
                                       </div>

                                             <div class="card-footer"> 
                                        <button class="btn btn-light text-dark" style="font-size:12px;float:right;" data-toggle="collapse" data-target="#collapseExample<?php echo $row['msg_id'] ?>" aria-expanded="false" aria-controls="collapseExample<?php echo $row['msg_id'] ?>">Remove</button>

                                       <div class="collapse" id="collapseExample<?php echo $row['msg_id'] ?>">
                              <div class="card card-body">
                                <h6 style="font-size:12px" class="text-dark">
                                    
                                     <button class="btn btn-light text-danger ryou" data-id="<?php echo $row['msg_id'] ?>" data-tp="gc" style="font-size:12px">Remove From You</button>
                                </h6>

                               
                              </div>
                            </div>

                        
                                       </div>
                                   </div>
                               </div>
                           </div>
                                              <?php
                                            }


                                           

                                     }

                                      ?>
 		<button class="btn btn-light text-danger deleteconvo" data-tp = "<?php echo $convo ?>" style="font-size:13px"><i class="fas fa-trash"></i> Delete Conversation</button>

 		<script type="text/javascript">
 			  $('.deleteconvo').click(function(){

         var tp = $(this).data('tp');

         Swal.fire({
  title: 'Are you sure to delete conversation?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
        
         $.ajax({
             url : "sms.php",
              method: "POST",
             data  : {deleteconvo:tp},
              success : function(data){
             $('#reload').click();
               }
             })    


  }
})
                       
     })

 			     	$('.ryou').click(function(){
                                 		var id = $(this).data('id');
                                 		var tp = $(this).data('tp');

                                 		 $.ajax({
                                 		 url : "sms.php",
                                 		  method: "POST",
                                 		 data  : {removesms:id,tp:tp},
                                 		  success : function(data){
                                 		 $('#reload').click();
                                 		   }
                                 		 })
                                 			  		
                                 	})
                                 	$('.rall').click(function(){
                                 		var id = $(this).data('id');
                                 		var tp = $(this).data('tp');

                                 		 $.ajax({
                                 		 url : "sms.php",
                                 		  method: "POST",
                                 		 data  : {removefromallsms:id,tp:tp},
                                 		  success : function(data){
                                 		 $('#reload').click();
                                 		   }
                                 		 })
                                 		
                                 			  		
                                 	})

 			      function messages(){
        $.ajax({
       url : "sms.php",
        method: "POST",
       data  : {reload:1},
        success : function(data){
       	 $('#messages').html(data);
       	   $('#messages').scrollTop($('#messages')[0].scrollHeight);
         }
       })
       }

 		</script>
 		<?php         

                                
                                 }else {
                                    ?>
                        <h6  class="text-secondary mt-5" style="text-align: center;font-size: 12px">
                        No Messages in your INBOX Yet.
                    </h6>
                                    <?php
                                 }

                       
 }

 if(isset($_POST['inbox'])){

 
                    										$get_inbox = "select * from student where stud_id in (select stud_id from message where adm = '$gccol' and gc = 0 )  ";
                    										 $gettinginboxmessages = mysqli_query($con,$get_inbox); 
                    										 $countsms= mysqli_num_rows($gettinginboxmessages);
                    									
                    										if($countsms >=1){
                    									 while($row = mysqli_fetch_array($gettinginboxmessages)){
                    									 	$studid = $row['stud_id'];
                    											?>

                    								<div class="card">
                    									<div class="card-body">
                    										<h6 style="font-size:14px;" class="text-secondary"><?php echo $row['stud_fname'].' '.$row['stud_mname'].' '.$row['stud_lname'] ?>
                    											<br>
                    											<span style="font-size:11px"><?php echo $row['stud_email'] ?></span>

                    											<br>
                    											<?php 

                    												$getnewsms = "select * from message where stud_id = '$studid' and adm ='$gccol' and send = '$studid' and status = 0   ";
                    												 $gettingnewmessage = mysqli_query($con,$getnewsms); 
                    												 $countnew= mysqli_num_rows($gettingnewmessage);
                    													
                    													if($countnew >=1){
                    														?>
                    															<span style="font-size:12px" class="text-danger"><?php echo $countnew ?> New Message</span>
                    														<?php
                    													}else {

                    													}
                    											 

                    											 ?>
                    										
                    											<br>
                    											<span style="float:right">
                    												<button class="btn btn-light text-primary mt-4 viewconvo" data-name="<?php echo $row['stud_fname'].' '.$row['stud_mname'].' '.$row['stud_lname'] ?>" data-id="<?php echo $row['stud_id'] ?>" style="font-size:12px">View Conversation</button>
                    											</span>
                    										</h6>
                    										

                    									</div>
                    								</div>

                    								<script type="text/javascript">
                    									   
       $('.viewconvo').click(function(){
       	var id = $(this).data('id');
       	var name = $(this).data('name');
       messages(id);
       inbox();
       messagecount();
       $('#studname').text(name);
       })

       function messagecount(){
         $.ajax({
         url : "sms.php",
          method: "POST",
         data  : {count:1},
          success : function(data){
         $('#messagerequestcount').html(data);
           }
         })
       }



       function messages(id){
       	 $.ajax({
       	 url : "sms.php",
       	  method: "POST",
       	 data  : {getconvo:id},
       	  success : function(data){
       	 $('#messages').html(data);
       	   $('#messages').scrollTop($('#messages')[0].scrollHeight);
       	   }
       	 })
       }
        function inbox(){
       	 $.ajax({
       	 url : "sms.php",
       	  method: "POST",
       	 data  : {inbox:1},
       	  success : function(data){
       	 $('#inbox').html(data);
       	   }
       	 })
       }
                    								</script>
                    											<?php			
                    										 }
                    									
                    									 }else {
                    									 	?>
                    									 	<h6 style="text-align:center;font-size: 13px;" class="text-danger mt-5">Your Inbox is Empty.</h6>
                    									 	<?php
                    									 }


                    									





 }


if(isset($_POST['reload'])){
	$id = $_SESSION['convoId'];
 	



 	$update_to_read = "UPDATE `message` SET `status`='1'  WHERE stud_id = '$id' and send = '$id' and status = 0 and adm= '$gccol'";
	mysqli_query($con,$update_to_read);
 	
 	   $get_messagesdata = "select * from message where stud_id = '$id' and gc = 0 and adm = '$gccol'  ;";
                                     $gettingsms = mysqli_query($con,$get_messagesdata); 
                                     $count= mysqli_num_rows($gettingsms);
                                  
                                    if($count >=1){
                                 while($row = mysqli_fetch_array($gettingsms)){
                                            $adm = $row['adm'];

                                            $send = $row['send'];
                                            $rec  = $row['receive'];

                                            if($rec == 0){
                                               
                                            }else {
                                            ?>
                                           
 

                                             <div class="row">
                            <div class="col-md-6"></div>
                               <div class="col-md-6">
                                   <div class="card mb-3 mt-2 bg-dark text-light shadow" >
                                       <div class="card-body">
                                           <h6 style="font-size:12px">From : Me <br>
                                            <span style="font-size:11px;float: right;"><?php echo date('h:i:sa F j, Y ',strtotime($row['datecreated'])) ?></span>
                                           </h6>
                                           <hr>
                                           <span style="font-size:14px">
                                               <?php echo $row['message'] ?>
                                           </span>
                                       </div> 

                                       <div class="card-footer bg-dark"> 
                                       	<button class="btn btn-dark text-light" style="font-size:12px;float:right;" data-toggle="collapse" data-target="#collapseExample<?php echo $row['msg_id'] ?>" aria-expanded="false" aria-controls="collapseExample<?php echo $row['msg_id'] ?>">Remove</button>

                                       <div class="collapse" id="collapseExample<?php echo $row['msg_id'] ?>">
							  <div class="card card-body">
							  	<h6 style="font-size:12px" class="text-dark">
							  		 <button class="btn btn-light text-danger rall" data-id="<?php echo $row['msg_id'] ?>" data-tp="gc" style="font-size:12px">Remove From all</button>
							  		 <button class="btn btn-light text-danger ryou" data-id="<?php echo $row['msg_id'] ?>" data-tp="gc" style="font-size:12px">Remove From You</button>
							  	</h6>

							   
							  </div>
							</div>

						
                                       </div>
                                   </div>
                               </div>
                           </div>
                                            <?php
                                            }

                                            if($send == 0){
                                                
                                            }else {
                                              ?>
                                                <div class="row">
                               <div class="col-md-6">
                                   <div class="card mb-2 mt-2 shadow" >
                                       <div class="card-body">
                                           <h6 style="font-size:12px">From :
                                           	<?php 
                                           			$get_studentname = "select * from student where stud_id = '$id'  ";
                                           			 $gettingname = mysqli_query($con,$get_studentname); 
                                           			
                                           		 while($uname = mysqli_fetch_array($gettingname)){
                                           				echo $uname['stud_fname'].' '.$uname['stud_lname'];					
                                           			 }
                                           		
                                           		 

                                           	 ?>

                                            <br>
                                            <span style="font-size:11px;float: right;"><?php echo date('h:i:sa F j, Y ',strtotime($row['datecreated'])) ?></span>
                                           </h6>
                                           <hr>
                                           <span style="font-size:14px">
                                              <?php echo $row['message'] ?>
                                           </span>
                                       </div>

                                             <div class="card-footer"> 
                                        <button class="btn btn-light text-dark" style="font-size:12px;float:right;" data-toggle="collapse" data-target="#collapseExample<?php echo $row['msg_id'] ?>" aria-expanded="false" aria-controls="collapseExample<?php echo $row['msg_id'] ?>">Remove</button>

                                       <div class="collapse" id="collapseExample<?php echo $row['msg_id'] ?>">
                              <div class="card card-body">
                                <h6 style="font-size:12px" class="text-dark">
                                    
                                     <button class="btn btn-light text-danger ryou" data-id="<?php echo $row['msg_id'] ?>" data-tp="gc" style="font-size:12px">Remove From You</button>
                                </h6>

                               
                              </div>
                            </div>

                        
                                       </div>
                                   </div>
                               </div>
                           </div>
                                              <?php
                                            }


                                           

                                     }
                                  ?>
 		<button class="btn btn-light text-danger deleteconvo" data-tp = "<?php echo $convo ?>" style="font-size:13px"><i class="fas fa-trash"></i> Delete Conversation</button>

 		<script type="text/javascript">
 			  $('.deleteconvo').click(function(){

         var tp = $(this).data('tp');

         Swal.fire({
  title: 'Are you sure to delete conversation?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
        
         $.ajax({
             url : "sms.php",
              method: "POST",
             data  : {deleteconvo:tp},
              success : function(data){
              $('#reload').click();
               }
             })    


  }
})


                       
     })

 			    	$('.ryou').click(function(){
                                 		var id = $(this).data('id');
                                 		var tp = $(this).data('tp');

                                 		 $.ajax({
                                 		 url : "sms.php",
                                 		  method: "POST",
                                 		 data  : {removesms:id,tp:tp},
                                 		  success : function(data){
                                 		 $('#reload').click();
                                 		   }
                                 		 })
                                 			  		
                                 	})
                                 	$('.rall').click(function(){
                                 		var id = $(this).data('id');
                                 		var tp = $(this).data('tp');

                                 		 $.ajax({
                                 		 url : "sms.php",
                                 		  method: "POST",
                                 		 data  : {removefromallsms:id,tp:tp},
                                 		  success : function(data){
                                 		 $('#reload').click();
                                 		   }
                                 		 })
                                 		
                                 			  		
                                 	})

 			      function messages(){
        $.ajax({
       url : "sms.php",
        method: "POST",
       data  : {reload:1},
        success : function(data){
       	 $('#messages').html(data);
       	   $('#messages').scrollTop($('#messages')[0].scrollHeight);
         }
       })
       }


 		</script>
 		<?php         
                                 }else {
                                    ?>
                        <h6  class="text-secondary mt-5" style="text-align: center;font-size: 12px">
                        No Messages in your INBOX Yet.
                    </h6>
                                    <?php
                                 }

}


if(isset($_POST['sendsms'])){
$sendsms = $_POST['sendsms'];
$val = $_POST['val'];
	if(isset($_SESSION['convoId'])){

		$id = $_SESSION['convoId'];
 date_default_timezone_set('Asia/Manila');
 $datenow = date('Y-m-d H:i:s');



$sendsms = "INSERT INTO `message`(`message`, `stud_id`,`status`,`receive`,`datecreated`,`adm`) VALUES ('$val','$id','0','$id','$datenow','$gccol')";
mysqli_query($con,$sendsms); 


	}else {
		echo "noset";
	}


}


if(isset($_POST['deleteconvo'])){
	$id = $_SESSION['convoId'];

	

$delconvo= "UPDATE `message` SET `gc`='1' WHERE stud_id= '$id' and adm = '$gccol'  and send ='$user' or send='$id'  ";

	



mysqli_query($con,$delconvo); 


unset($_SESSION['convoId']);
}



if(isset($_POST['removesms'])){
		$removesms = $_POST['removesms'];
		$tp = $_POST['tp'];


$delconvo= "UPDATE `message` SET `gc`='1' WHERE msg_id = '$removesms'  ";
	

mysqli_query($con,$delconvo); 
	
}


if(isset($_POST['removefromallsms'])){
        $removesms = $_POST['removefromallsms'];
        $tp = $_POST['tp'];



$delconvo= "DELETE FROM `message` WHERE msg_id = '$removesms'  ";
    

mysqli_query($con,$delconvo); 
    
}


if(isset($_POST['sendmultiple'])){
	$val = $_POST['val'];
	date_default_timezone_set('Asia/Manila');
 	$datenow = date('Y-m-d H:i:s');

	$multipleids = $_POST['multipleids'];

	foreach ($multipleids as $key => $value) {
		$sendsms = "INSERT INTO `message`(`message`, `stud_id`,`status`,`receive`,`datecreated`) VALUES ('$val','$value','0','$value','$datenow')";
		mysqli_query($con,$sendsms); 
	}


}

/*if(isset($_POST['slist'])){
	$slist = $_POST['slist'];

	if($slist == '123456789'){
	$getall_students = "select * from student  ";
	}else {
		$getall_students = "select * from student where stud_email like '%$slist%' or stud_fname like '%$slist%' or stud_lname like '%$slist%' ";
	}


 		 $gettingstudents = mysqli_query($con,$getall_students); 
 		 $countstud= mysqli_num_rows($gettingstudents);
 		
 		if($countstud >=1){
 	 while($row = mysqli_fetch_array($gettingstudents)){
 			?>
 			<li class="list-group-item">
 				<h6 style="font-size: 14px;"><?php echo $row['stud_lname'].' '.$row['stud_fname'] ?>
 					<br>
 					<span style="font-size:12px"><?php echo $row['stud_email'] ?></span>
 					<br>
 					<input type="checkbox" class="cc" name="multipleids[]" value="<?php echo $row['stud_id'] ?>" style="float:right;">

 				</h6>


 			</li>
 			<?php					
 		 }
 	
 	 }else {
 	 	echo 'No search key found : <span class="text-danger">'.$slist.'</span>';
 	 }

	
} */

if(isset($_POST['sendtoall'])){
	$sendtoall = $_POST['sendtoall'];

	date_default_timezone_set('Asia/Manila');
 	$datenow = date('Y-m-d H:i:s');


  	$getall_students = "select * from student  ";
 		 $gettingstudents = mysqli_query($con,$getall_students); 
 		 $countstud= mysqli_num_rows($gettingstudents);
 		
 		if($countstud >=1){
 	 while($row = mysqli_fetch_array($gettingstudents)){
 		$stid = $row['stud_id'];

	$sendsms = "INSERT INTO `message`(`message`, `stud_id`,`status`,`receive`,`datecreated`) VALUES ('$sendtoall','$stid','0','$stid','$datenow')";
	mysqli_query($con,$sendsms); 


 		 }
 	
 	 }else {
 	 
 	 }

  	 
	
}

if(isset($_POST['count'])){


                                    $get_inbox = "select * from student where stud_id in (select stud_id from message where adm = '$gccol' and gc = 0 and status = 0 and send !=0 )  ";
                                                             $gettinginboxmessages = mysqli_query($con,$get_inbox); 
                                                             $countsms= mysqli_num_rows($gettinginboxmessages);

                                if($countsms >=1){
                                    echo $countsms;
                                }else {

                                }

                              
    
}