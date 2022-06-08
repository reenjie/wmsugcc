<?php 
session_start();
include '../GCC/create_form/connect.php';
$user = $_SESSION['user_student_token_check'];
$mygc = $_SESSION['student_college'];
if(isset($_POST['crtmessage'])){

	?>
	<button class="btn btn-light text-secondary backtoform mb-4" style="font-size: 12px;">Back to Forms</button>
	<button class="btn btn-light text-primary reloadpage  mb-4" style="font-size: 12px;">Reload <i class="fas fa-sync"></i></button>
	<div class="row">
		
			<div class="container mb-3">
					<div class="card ">
						<div class="card-header">
								<h6>INBOX</h6>
						</div>
				<div class="card-body">
							
				<!--<div class="card mb-3">
								<div class="card-body">
									<span class="badge badge-success" >New</span>
									<h6 style="font-size:13px;font-weight: bold;"> 

										 <br>

										From : Guidance and Counseling Center <br><span style="font-size:11px;float: right;"><?php echo date('h:i:sa F j, Y ') ?></span></h6>
									
									<hr>
									<span style="font-size:12px">
									Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
									tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
									quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
									consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
									cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
									proident, sunt in culpa qui officia deserunt mollit anim id est laborum.


									</span>
									<h6 class="mb-5"></h6>

										<div class="btn-group" style="float:right;">
											<button class="btn btn-light text-success" onclick="window.location.href='conversation.php' " style="font-size:12px">Reply</button>
											<button class="btn btn-light text-danger" style="font-size:12px">Delete</button>
										</div>

								</div>
							</div> -->

							<?php 

									$get_messagesdata = "select * from message where stud_id = '$user' and student = 0";
									 $gettingsms = mysqli_query($con,$get_messagesdata); 
									 $count= mysqli_num_rows($gettingsms);
									$gcc_sms = [];
									$gc_sms = [];
									if($count >=1){
								 while($row = mysqli_fetch_array($gettingsms)){
											$adm = $row['adm'];

											if($adm == 0){
												$gcc_sms[] = $adm;
											}else {
											$gc_sms[] = $adm;
											}

									 }
								
								 }else {
								 	?>
						<h6  class="text-secondary" style="text-align: center;font-size: 12px">
						No Messages in your INBOX Yet.
					</h6>
								 	<?php
								 }



								if(count($gcc_sms)>=1){
								?>

								<div class="card shadow mb-2">
								<div class="card-body">
									<h6 style="font-weight:bolder;font-size: 13px;">Guidance and Counseling Center <br>
										<?php 
											$check_new_sms = "select * from message where stud_id = '$user' and receive = '$user' and status = 0 and adm =0 ";
											 $chckingnewsms = mysqli_query($con,$check_new_sms); 
											 $countsms= mysqli_num_rows($chckingnewsms);

											if($countsms >=1){
												?>
												<span class="text-danger" style="font-size:11px">New Message</span>
												<?php
											}
											

										 ?>
										<!---->

										<span style="float:right;">
											<button class="btn btn-light text-primary viewconvo" data-tp="gcc" style="font-size:13px">View Conversation 
												<?php 
												if(isset($countsms)){
													if($countsms >=1){
														?>
													<span class="badge badge-danger"><?php echo $countsms ?></span>
													<?php
													}
													
												}
												 ?>
												
											</button>
										</span>
									</h6>

								</div>
							</div>
								<?php
								}

								if(count($gc_sms) >=1){
									?>


									<div class="card shadow">
								<div class="card-body">
									<h6 style="font-weight:bolder;font-size: 13px;">Guidance Coordinator <br>
											<?php 
											$check_new_sms1 = "select * from message where stud_id = '$user' and receive = '$user' and status = 0 and adm ='$mygc' ";
											 $chckingnewsms1 = mysqli_query($con,$check_new_sms1); 
											 $countsms1= mysqli_num_rows($chckingnewsms1);

											if($countsms1 >=1){
												?>
												<span class="text-danger" style="font-size:11px">New Message</span>
												<?php
											}
											

										 ?>
										<!--<span class="text-danger" style="font-size:11px">New Message</span>-->


										<span style="float:right;">
											<button class="btn btn-light text-primary viewconvo" data-tp="gc" style="font-size:13px">View Conversation
													<?php 
												if(isset($countsms1)){
													if($countsms1 >=1){
														?>
													<span class="badge badge-danger"><?php echo $countsms1 ?></span>
													<?php
													}
													
												}
												 ?>
												

											</button>
										</span>
									</h6>

								</div>
							</div>
									<?php
								}

							 ?>




							


							

				

				</div>
			</div>

			</div>
			
	</div>


<div class="row">
		<div class="col-md-8">
			<textarea class="form-control" id="sms_content" rows="10" style="font-size:13px;resize: none;" placeholder="Write your message here .."></textarea>
		</div>
		<div class="col-md-4">
				<div class="card">
					<div class="card-body">
						<h6 style="font-size:13px">Recepient:</h6>
						<div class="form-check">
  <input class="form-check-input Recepient" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked value="gcc">
  <label style="font-size:13px" class="form-check-label" for="flexRadioDefault1">
   Guidance and Counseling Center
  </label>
</div>
<div class="form-check">
  <input class="form-check-input Recepient" type="radio" name="flexRadioDefault"  id="flexRadioDefault2" value="gc">
  <label style="font-size:13px" class="form-check-label" for="flexRadioDefault2">
  My Guidance Coordinator
  </label>






					</div>
				</div>

				<button class="btn btn-light text-success mt-3 form-control sendmessage" style="float: right;">SEND<i class="fas fa-paper-plane"></i></button>
			

		</div>


</div>

<div class="row">
	<div class="container">
		
	</div>
	
</div>
	
	<script type="text/javascript" src="../offline/sweetalert.js"></script>
	<script type="text/javascript">

		$('.viewconvo').click(function(){
			var tp = $(this).data('tp');

		//	window.open('conversation.php?convo='+tp);

			window.location.href='conversation.php?convo='+tp;
				  		
		})

		$('.sendmessage').click(function(){
				  var val = $('#sms_content').val();
				 	var rcvr = '';

				



				  if(val == ''){
				  	$('#sms_content').addClass('is-invalid').attr('placeholder','Please input your message');
				  }else {

				  	 if($('#flexRadioDefault1').prop("checked") == true) {
					      rcvr = 'gcc';   

					        	 $.ajax({
						  	 url : "sms.php",
						  	  method: "POST",
						  	 data  : {sendsms:rcvr,val:val},
						  	  success : function(data){
						  	 			Swal.fire(
										  'Message Sent!',
										  'Your message has been sent successfully!',
										  'success'
										).then((result) => {
							  if (result.isConfirmed) {
							  // window.location.href='conversation.php';
							  	messaging();	  
							  }
							})
						  	 		

						  	   }
						  	 })     		
					 }else {
					 			rcvr = 'gc';

					 			  	 $.ajax({
						  	 url : "sms.php",
						  	  method: "POST",
						  	 data  : {sendsms:rcvr,val:val},
						  	  success : function(data){
						  	 			Swal.fire(
										  'Message Sent!',
										  'Your message has been sent successfully!',
										  'success'
										).then((result) => {
							  if (result.isConfirmed) {
							  // window.location.href='conversation.php';
							  	messaging();	  
							  }
							})
						  	 		

						  	   }
						  	 })
					 }
			

						
				  }	
		})

		$('#sms_content').keyup(function(){
			var value = $(this).val();

			if(value ==''){

			}else {
				$('#sms_content').removeClass('is-invalid').attr('placeholder','Write your message here ..');
			}
		
		})

		$('.reloadpage').click(function(){
			messaging();	  		
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
		 function messaging(){
     	  $.ajax({
                 url : "message.php",
                  method: "POST",
                   data  : {crtmessage:1},
                   success : function(data){
        $('.content-tab').html(data);
        $('#loader').addClass('d-none');
                   }
                })
     }
	</script>
	<?php
	
}

 ?>