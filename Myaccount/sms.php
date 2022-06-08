<?php 
session_start();
include '../GCC/create_form/connect.php';
$user = $_SESSION['user_student_token_check'];
$mygc = $_SESSION['student_college'];
if(isset($_POST['sendsms'])){
	$sendsms = $_POST['sendsms'];
	$val = $_POST['val'];

 date_default_timezone_set('Asia/Manila');
 $datenow = date('Y-m-d H:i:s');


if($sendsms == 'gcc'){
$sendsms = "INSERT INTO `message`(`message`, `stud_id`,`status`,`send`,`datecreated`) VALUES ('$val','$user','0','$user','$datenow')";

	
}else {
$sendsms = "INSERT INTO `message`(`message`, `stud_id`, `adm`, `status`,`send`,`datecreated`) VALUES ('$val','$user','$mygc','0','$user','$datenow')";
}


mysqli_query($con,$sendsms); 

}

if(isset($_POST['smsgcc'])){

	$update_to_read = "UPDATE `message` SET `status`='1'  WHERE stud_id = '$user' and receive = '$user' and status = 0 and adm= 0";
	mysqli_query($con,$update_to_read);


                                    $get_messagesdata = "select * from message where stud_id = '$user' and student = 0 and adm = 0 ;";
                                     $gettingsms = mysqli_query($con,$get_messagesdata); 
                                     $count= mysqli_num_rows($gettingsms);
                                  
                                    if($count >=1){
                                 while($row = mysqli_fetch_array($gettingsms)){
                                            $adm = $row['adm'];

                                            $send = $row['send'];
                                            $rec  = $row['receive'];

                                            if($send == 0){
                                               
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
							  		 <button class="btn btn-light text-danger rall" data-id="<?php echo $row['msg_id'] ?>" data-tp="gcc" style="font-size:12px">Remove From all</button>
							  		 <button class="btn btn-light text-danger ryou" data-id="<?php echo $row['msg_id'] ?>" data-tp="gcc" style="font-size:12px">Remove From You</button>
							  	</h6>

							   
							  </div>
							</div>

						
                                       </div>
                                   </div>
                               </div>
                           </div>
                                            <?php
                                            }

                                            if($rec == 0){
                                                
                                            }else {
                                              ?>
                                                <div class="row">
                               <div class="col-md-6">
                                   <div class="card mb-2 mt-2 shadow" >
                                       <div class="card-body">
                                           <h6 style="font-size:12px">From : Guidance and Counseling Center <br>
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
                                    
                                     <button class="btn btn-light text-danger ryou" data-id="<?php echo $row['msg_id'] ?>" data-tp="gcc" style="font-size:12px">Remove From You</button>
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
                                
                                 }else {
                                    ?>
                        <h6  class="text-secondary mt-5" style="text-align: center;font-size: 12px">
                        No Messages in your INBOX Yet.
                    </h6>
                                    <?php
                                 }

                                 ?>
                                 <script type="text/javascript">
                                 	$('.ryou').click(function(){
                                 		var id = $(this).data('id');
                                 		var tp = $(this).data('tp');

                                 		 $.ajax({
                                 		 url : "sms.php",
                                 		  method: "POST",
                                 		 data  : {removesms:id,tp:tp},
                                 		  success : function(data){
                                 		 messages();
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
                                 		 messages();
                                 		   }
                                 		 })
                                 		
                                 			  		
                                 	})

                                 	    function messages(){
							         $.ajax({
							         url : "sms.php",
							          method: "POST",
							         data  : {smsgcc:1},
							          success : function(data){
							            $('#messages').html(data);
							             $('#messages').scrollTop($('#messages')[0].scrollHeight);
							           }
							         })
							    }
                                 </script>
                                 <?php

	
}


if(isset($_POST['smsgc'])){

  $update_to_read = "UPDATE `message` SET `status`='1'  WHERE stud_id = '$user' and receive = '$user' and status = 0 and adm= '$mygc'";
    mysqli_query($con,$update_to_read);



                                    $get_messagesdata = "select * from message where stud_id = '$user' and student = 0 and adm = '$mygc' ;";
                                     $gettingsms = mysqli_query($con,$get_messagesdata); 
                                     $count= mysqli_num_rows($gettingsms);
                                  
                                    if($count >=1){
                                 while($row = mysqli_fetch_array($gettingsms)){
                                            $adm = $row['adm'];

                                            $send = $row['send'];
                                            $rec  = $row['receive'];

                                            if($send == 0){
                                               
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
                                     <button class="btn btn-light text-danger rall" data-id="<?php echo $row['msg_id'] ?>" data-tp="gcc" style="font-size:12px">Remove From all</button>
                                     <button class="btn btn-light text-danger ryou" data-id="<?php echo $row['msg_id'] ?>" data-tp="gcc" style="font-size:12px">Remove From You</button>
                                </h6>

                               
                              </div>
                            </div>

                        
                                       </div>
                                   </div>
                               </div>
                           </div>
                                            <?php
                                            }

                                            if($rec == 0){
                                                
                                            }else {
                                              ?>
                                                <div class="row">
                               <div class="col-md-6">
                                   <div class="card mb-2 mt-2 shadow" >
                                       <div class="card-body">
                                           <h6 style="font-size:12px">From : Guidance and Counseling Center <br>
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
                                    
                                     <button class="btn btn-light text-danger ryou" data-id="<?php echo $row['msg_id'] ?>" data-tp="gcc" style="font-size:12px">Remove From You</button>
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
                                
                                 }else {
                                    ?>
                        <h6  class="text-secondary mt-5" style="text-align: center;font-size: 12px">
                        No Messages in your INBOX Yet.
                    </h6>
                                    <?php
                                 }

                                 ?>
                                 <script type="text/javascript">
                                    $('.ryou').click(function(){
                                        var id = $(this).data('id');
                                        var tp = $(this).data('tp');

                                         $.ajax({
                                         url : "sms.php",
                                          method: "POST",
                                         data  : {removesms:id,tp:tp},
                                          success : function(data){
                                         messages();
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
                                         messages();
                                           }
                                         })
                                        
                                                    
                                    })

                                        function messages(){
                                     $.ajax({
                                     url : "sms.php",
                                      method: "POST",
                                     data  : {smsgc:1},
                                      success : function(data){
                                        $('#messages').html(data);
                                         $('#messages').scrollTop($('#messages')[0].scrollHeight);
                                       }
                                     })
                                }
                                 </script>
                                 <?php

    
}
if(isset($_POST['deleteconvo'])){
	$deleteconvo = $_POST['deleteconvo'];
	


if($deleteconvo == 'gcc'){
$delconvo= "UPDATE `message` SET `student`='1' WHERE stud_id= '$user' and adm = '0'  and send ='$user' or receive ='$user'  ";

	
}else {
$delconvo= "UPDATE `message` SET `student`='1' WHERE stud_id= '$user' and adm = '$mygc'  and send ='$user' or receive ='$user'  ";
}


mysqli_query($con,$delconvo); 
}

if(isset($_POST['removesms'])){
		$removesms = $_POST['removesms'];
		$tp = $_POST['tp'];

if($tp == 'gcc'){

$delconvo= "UPDATE `message` SET `student`='1' WHERE msg_id = '$removesms'  ";
	
}else {
//$delconvo= "UPDATE `message` SET `send_del`='[value-9]',`rec_del`='[value-10]' WHERE 1";

}
mysqli_query($con,$delconvo); 
	
}


if(isset($_POST['removefromallsms'])){
        $removesms = $_POST['removefromallsms'];
        $tp = $_POST['tp'];

if($tp == 'gcc'){

$delconvo= "DELETE FROM `message` WHERE msg_id = '$removesms'  ";
    
}else {
//$delconvo= "UPDATE `message` SET `send_del`='[value-9]',`rec_del`='[value-10]' WHERE 1";

}
mysqli_query($con,$delconvo); 
    
}

 ?>
