<?php 
session_start();
include '../../GCC/create_form/connect.php';
$admintoken = $_SESSION['admin_token'];
	if(isset($_POST['myprofile'])){ 
			
			?>
				<div class="container">
			<h5>My Profile <i style="font-size: 22px;" class="far fa-user-circle"></i></h5>
			<p></p>
				<div class="row">
					 
					 	
					 	<?php 
					 	
                                        $sql = " SELECT * FROM `administrator` where admin_id = '$admintoken'  ";
                                                $result = mysqli_query($con,$sql); // run query
                                               
                                                 while($row = mysqli_fetch_array($result)){
                                                    $adphoto = $row['admin_photo'];
                                                    if($adphoto == ''){
                                                        $imgsrc = '../img/undraw_profile.svg';
                                                    }else {
                                                        $imgsrc = '../img/uploads/'.$adphoto;
                                                    }

                                                        ?>
                                                    	<div class="col-md-4">
														 		<img src="<?php echo $imgsrc ?>" class="img-profile img-thumbnail rounded-circle" style="width: 200px;height: 200px;">
														 		<p></p>


														 	</div>
														 	<div class="col-md-8">
														 		<p style="user-select: none"></p>
														 		<h4 style="font-weight: bolder;"><?php echo $row['admin_lname'].' '.$row['admin_fname'].' '.$row['admin_mname']  ?> </h4>
														 		<span style="font-size: 12px;"><?php echo $row['admin_email'] ?></span>
														 		<hr>
														 <h6 style="padding: 10px; background-color: <?php echo $_SESSION['sidebar_color'] ?>;color: white;text-align: center;cursor: default;"><?php echo $row['admin_type'] ?> Admin <i class="fas fa-user-shield"></i></h6>

														 	</div>

                                                    
                           
                                                        <?php
                                                 }
					 	 ?>
			
		
					
				</div>
				</div>



			<?php
	}
	if(isset($_POST['editmyprofile'])){ 
		?>
				<div class="container">
			<h5>Editing Profile <i style="font-size: 22px;" class="fas fa-user-edit"></i></h5>
			<p></p>
				<div class="row">
					 		<?php 
					 	
                                        $sql = " SELECT * FROM `administrator` where admin_id = '$admintoken'  ";
                                                $result = mysqli_query($con,$sql); // run query
                                               
                                                 while($row = mysqli_fetch_array($result)){
                                                    $adphoto = $row['admin_photo'];
                                                    if($adphoto == ''){
                                                        $imgsrc = '../img/undraw_profile.svg';
                                                    }else {
                                                        $imgsrc = '../img/uploads/'.$adphoto;
                                                    }

                                                        ?>
                                                       
                                                         	
                                                        
                                                    	<div class="col-md-4" id="form">
                                                    		  <form method="post" enctype="multipart/form-data" action="Manage.php" id="saveeditform" >
                                                    		<input type="hidden" name="editpic">
														 		<img src="<?php echo $imgsrc ?>" id="imgtag" class="img-profile img-thumbnail rounded-circle" style="width: 200px;height: 200px">
														 		<p></p>
														 		<input type="file" name="image[]" disabled="" id="imagefile">
														 		<p></p>
														 		<label><input type="checkbox" name="" id="imagefilecheck"> Update Profile photo</label>

										<button class="btn btn-success" id="btnsavephoto" disabled="" style="font-size: 12px;" type="submit">Save Profile Picture</button>
																 </form>	
														 	</div>

														 	
														 	<div class="col-md-8">
														 		<p style="user-select: none"></p>
														 			<h4 style="font-weight: bolder;"> 
														 			<h6 style="font-size:14px">Last Name :</h6>

														 			<input type="text" name="" class="form-control changeprofile" data-upt = "admin_lname" value="<?php echo $row['admin_lname'] ?>" >

														 			<h6 style="font-size:14px">First Name :</h6>

														 			<input type="text" name="" class="form-control changeprofile" data-upt = "admin_fname" value="<?php echo $row['admin_fname'] ?>" >
														 			<h6 style="font-size:14px">Middle Name :</h6>

														 			<input type="text" name="" class="form-control changeprofile" data-upt = "admin_mname" value="<?php echo $row['admin_mname'] ?>" >
														 	</h4>
														 		
														 			<h4 style="font-weight: bolder;"> 
														 				<h6 style="font-size:14px">Email :</h6>

														 			<input type="text" name="" class="form-control changeprofile" data-upt = "admin_email" value="<?php echo $row['admin_email'] ?>" >
														 	</h4>
														 	<p></p>
														 	<span style="font-size: 12px;">
														 		<i class="fas fa-info-circle"></i> 
														 		Changes are saved Automatically.
														 	</span>
														 	</div>

                                                    
                           
                                                        <?php
                                                 }
					 	 ?>
			
					 
			
		
					
				</div>
				</div>

				<script type="text/javascript">
					  $(document).ready(function() {
					  	$('.changeprofile').keyup(function(){
					  		var value = $(this).val();
					  		var upt = $(this).data('upt');

					  		

					  		 $.ajax({
					  		 url : "editprofile.php",
					  		  method: "POST",
					  		 data  : {editprofile:1,value:value,upt:upt},
					  		  success : function(data){
					  		 
					  		   }
					  		 }) 
					  	
					  	})

					
					  });
				</script>




			<?php
		
	}
	if(isset($_POST['changepassword'])){ 
		?>
				<div class="container">
			<h5>Changing Password <i style="font-size: 22px;" class="fas fa-user-lock"></i></h5>
			<p></p>
				<div class="row">
					 
					 <div class="container">
					 		
					<label>Enter Current Password</label>
                                                  <input type="password" style="font-size: 13px" name="txtcurrent" id="txtcurrent" class="form-control"  required="" autofocus="">

                                                   <div id="notify" style="margin-top: 5px;"></div> 
                                                 
                                                    	
                                                      <form method="post"  id="savenewpassword" onsubmit="return false">
                                                       <br> 
                                                       <input type="hidden" name="savenewpassword">
                                                        <label>Enter New Password</label>
                                                  <input type="password" name="txtnew" style="font-size: 13px" id="txtnew" class="form-control" disabled=""> 
                                                     <div class="d-none" id="restrict">
                                                     
                                                    <div class="card">
                                                              <div class="container">
                                                                 <ul>
                                                                    <li id="upper">Must have Uppercase _Ex.(ABCDEFGHI)</li>  
                                                                    <li id="lower">Must have a Lowercase _Ex. (abcdefghi)</li>
                                                                    <li id="numb">Must have a Number _Ex.(123456789)</li>
                                                                    <li id="chara">Must have at Least 8 Characters _Ex.(********)</li>
                                                                 </ul>
                                                                 
                                                              </div>     
                                                        </div> 
                                                         <br>
                                                         </div> 
                                                  <label>ReEnter New Password</label>
                                                  <input type="password" name="txtreenter" style="font-size: 13px" id="txtreenter" class="form-control" disabled="" >
                                                  <div id="pregmatch"></div> 
                                                   
                                                        

                                                  <br> 
                                                  <button type="submit" id="btnsavepass" name="savenewpass" class="btn btn-success" disabled="" > Save Password  </button>
                                                 
                                                   </form>	

					 </div> 
						  	 
				
		
					
				</div>
				</div>
				 <script type="text/javascript">
                                                    	
                                                    	    $(document).ready(function() {
                                                    	      	$('#txtcurrent').focus();
                                                    	      });  
                                                          	
                                                    </script>



			<?php
		
	}
	if(isset($_POST['changedisplayname'])){ 
		?>
				<div class="container">
			<h5>Change Display Name <i style="font-size: 22px;" class="fas fa-file-signature"></i></h5>
			<p></p>
				<div class="row">
					 <div class="container">
					 <?php 
					 	
                                        $sql = " SELECT * FROM `administrator` where admin_id = '$admintoken'  ";
                                                $result = mysqli_query($con,$sql); // run query
                                               
                                                 while($row = mysqli_fetch_array($result)){
                                                    $adphoto = $row['admin_photo'];
                                                    if($adphoto == ''){
                                                        $imgsrc = '../img/undraw_profile.svg';
                                                    }else {
                                                        $imgsrc = '../img/uploads/'.$adphoto;
                                                    }

                                                        ?>
                                                    	
                                                    		 <div class="" style="text-align: center">
                                                    		 
                                                    		<span style="font-size: 13px"> Current :</span>
														 		<h4> <?php echo $row['admin_dsplyname'] ?></h4>	
														 			</div>
														 		<br>
														 		 <form method="post"  id="chngedispname" onsubmit="return false">
														 		<input type="hidden" name="changedisplayname">
														 		<h6>Change to :</h6>
														 		<input type="text" style="font-weight: bolder" name="namevalue" id="dspname" class="form-control" focus> 
																<p></p>
																 <button type="submit" class="btn btn-success" style="float: right;font-size: 14px"> Save Changes  </button>

														 		 </form>
														 		

                                                    <script type="text/javascript">
                                                    	
                                                    	    $(document).ready(function() {
                                                    	      	$('#dspname').focus();
                                                    	      });  
                                                          	
                                                    </script>
                           
                                                        <?php
                                                 }
					 	 ?>
			
		
					
				</div>
				</div>



			<?php
	}
	if(isset($_POST['changetitle'])){ 
		?>
				<div class="container">
			<h5>Changing Banner <i style="font-size: 22px;" class="fas fa-pen-square"></i></h5>
			<p></p>
				<div class="row">
					 
					 	<div class="container">
                                                    		 <div class="" style="text-align: center">
                                                    		 
                                                    		<span style="font-size: 13px"> Current :</span>
														 		<h4> 
														 			<?php 
														 			$admintoken = $_SESSION['admin_token'];
														 			$sql = "SELECT * FROM `administrator` where admin_id= '$admintoken' ";
										 	                $result = mysqli_query($con,$sql); // run query
										 	               
										 	                 while($row = mysqli_fetch_array($result)){
										 							echo $row['admin_banner'];
										 							
										 	                 }

														 			 ?>

														 		</h4>	
														 			</div>
														 		<br>
														 		 <form method="post" id="saveadmintitle" onsubmit="return false">
														 			<input type="hidden" name="saveadmintitle">
														 		<h6>Change to :</h6>
														 		<input type="text" style="font-weight: bolder" name="titlevalue" id="dsptitle" class="form-control" focus> 
																<p></p>
																 <button type="submit" class="btn btn-success" style="float: right;font-size: 14px"> Save Changes  </button>

														 		 </form>
														 		
                                                    <script type="text/javascript">
                                                    	
                                                    	    $(document).ready(function() {
                                                    	      	$('#dsptitle').focus();
                                                    	      });  
                                                          	
                                                    </script>
			
		
					
				</div>
				</div>



			<?php
		
	}
	if(isset($_POST['changecolor'])){ 
		?>
				<div class="container">
			<h5>Changing Color <i style="font-size: 22px;" class="fas fa-pen-square"></i></h5>
			<p></p>
				<div class="row">
					 
					 <div class="container">
					 			<h6 style="text-align: center;">Current: </h6>
					 		 <div class="row" style="height: 50px;background-color: <?php echo $_SESSION['sidebar_colors'] ?>">
					 		 	<h5 style="color: white;padding: 15px;text-align: center;"><?php echo $_SESSION['sidebar_colors'] ?></h5>
					 		 </div> 
					 		 	<br>
					<h6>Change to </h6>
					<br>
					 <form method="post" onsubmit="return false" id="savenewcolor">
					    	                  
					 	<input type="hidden" name="savenewcolor">
					
					  <h6>Choose Color: </h6>
					   <div class="row">
					   
					  <div class="input-group">
    <div class="input-group-prepend">
      <div class="input-group-text" id="btnGroupAddon"><input type="color" id="favcolor" name="favcolor"  value="#4a6eb0"></div>
    </div>
    <input type="text" class="form-control " name="colorval" id="colorfav" readonly="" aria-label="Input group example" value="#4a6eb0" aria-describedby="btnGroupAddon">
 	 </div>

				</div>
<br> 	 	
				 <button type="submit" class="btn btn-success" id="savecolor" style="float: right;font-size: 14px"> Save Changes  </button>	 

				 </form>
				  <button type="submit" class="btn btn-secondary mr-2" id="resetdefaultcolor" style="float: right;font-size: 14px"> Reset Defaults  </button>
					 </div> 

					   
			
		
					
				</div>
				</div>



			<?php
		
	}
	
	if(isset($_POST['createemail'])){ 
		?>
				<div class="container">
			<h5>Creating Email <i style="font-size: 22px;" class="fas fa-envelope-open-text"></i></h5>
			<p></p>
			<form method="post" id="sendemail" onsubmit="return false">
				<div class="row">
					  <div class="card shadow" style="width: 100%">
					  	 
					  	  
					  		<input type="hidden" name="sendemail">
					  	 <div class="card-header">
					  	 	
							
								<span >To:</span>
								<input type="email" name="recepientemail" required="" class="form-control" placeholder="Email" style="font-size: 13px;">
							

					  	 	</div>
					  	
					  	 <div class="card-body">
					  	 		<div class="container">
					  	 			<h6>Subject :</h6>
					  	 			<input type="text" name="subjectemail" required="" class="form-control" placeholder="Subject" style="font-size: 13px;">
					  	 				<br>
					  	 				<h6>Message :</h6>
					  	 				<textarea class="form-control" required="" name="messagemail" style="font-size: 14px;" id="message-text" rows="10"></textarea>

					  	 		</div>

					  	 </div>
					  	 <div class="card-footer">
					  	 	<button class="btn btn-success" style="font-size: 12px;float: right;" id="sendem"> SEND <i class="fas fa-paper-plane"></i></button>
					  	 </div>

					  	
					  	  <!--<span></span>-->
					  	  </div> 
					  	 
					  </div> 
					   </form>
					  
				
					 
			
		
					
				</div>
				</div>



			<?php
	}
	if(isset($_POST['sentemail'])){ 
		?>
				<div class="container">
			<h5>Sent Email <i style="font-size: 22px;" class="fas fa-envelope"></i></h5>
			<p></p>
				<div class="row">
					 
					 
				  <div class="card shadow"  style="width: 100%;">
					  	 <div class="card-header">
					  	 	
							
								</div>
							
					  	 		
					 <style type="text/css">
                  .tableFixHead          { overflow-y: auto; height: 415px; }
                  .tableFixHead thead th { position: sticky; top: 0; background-color: white;padding: 10px;}
                  
                </style>
					  	
					  	 <div class="card-body" >

  <button class="btn btn-light" style="font-size: 12px;" id="deleteallemail"><i class="fas fa-trash"></i> DELETE ALL</button>
   <div class="" style="border:2px solid#e3efea"></div> 
   
					  	 			 <form method="post" onsubmit="return false" id="deleteselectedemail">

								<input type="hidden" name="trigger">

                	 <div class="tableFixHead">
                	
									<table class="table table-hover table-sm">
										
										
						  <thead>
						   	<tr>
						   		<th ><input type="checkbox" id="selectall"  name=""></th>
						   		<th ></th>
						   		<th ></th>
						   		<th ></th>

						   	</tr>
						  </thead>
						  <tbody style=" overflow: scroll; " >
						  	
						  	 <?php 
						  	 			$sql = "SELECT * FROM `email` where admin_id = '$admintoken' ";
						  	 	                $result = mysqli_query($con,$sql); 
						  	 	                $count= mysqli_num_rows($result); 
						  	 	              
						  	 	             if ($count>=1){
						  	 	             
						  	 	                 while($row = mysqli_fetch_array($result)){
						  	 					?>
				<tr style="cursor: pointer;" >
						      <td ><input type="checkbox" class="checkchecktodel" name="checkchecktodel[]" value="<?php echo $row['email_id'] ?>"><button type="button" style="outline:none;border:none;color: gray" class="deleteicon ml-3" data-id="<?php echo $row['email_id'] ?>" ><i  class="fas fa-trash"></i></button></td>
						      <td class="sentemail" data-id="<?php echo $row['email_id'] ?>" data-recepient="<?php echo $row['recepient'] ?>" data-subject = "<?php echo $row['subject'] ?>" data-message="<?php echo $row['message'] ?>" data-toggle="modal" data-target="#emailcontent" data-backdrop="static" data-keyboard="false"><span style="font-weight: bolder;font-size: 12px;"><?php echo $row['recepient'] ?></span></td>
						      <td class="sentemail" data-id="<?php echo $row['email_id'] ?>" data-recepient="<?php echo $row['recepient'] ?>" data-subject = "<?php echo $row['subject'] ?>" data-message="<?php echo $row['message'] ?>" data-toggle="modal" data-target="#emailcontent" data-backdrop="static" data-keyboard="false"><span style="font-weight: bolder"> <?php echo $row['subject'] ?></span></td>
						      <td class="sentemail" data-id="<?php echo $row['email_id'] ?>" data-recepient="<?php echo $row['recepient'] ?>" data-subject = "<?php echo $row['subject'] ?>" data-message="<?php echo $row['message'] ?>" data-toggle="modal" data-target="#emailcontent" data-backdrop="static" data-keyboard="false"><?php echo date('h:i a',strtotime($row['date_send'])) ?> <br><span style="font-size: 12px;"><?php echo date('D ,M-Y',strtotime($row['date_send'])) ?></span></td>
						    </tr>

						  

						  	 					<?php
						  	 	                 }
						  	 	          }else {
						  	 	          	?>
						  	 	          	<tr><td colspan="4" style="text-align: center;">
						  	 	          		
						  	 	          		 <img src="../img/undraw_empty_street_sfxm.png" class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;">
						  	 	          		 <h6 style="text-align: center;">No email was sent yet..</h6>.
						  	 	          	</td></tr>
						  	 	          	<?php
						  	 	          }

						  	  ?>
						  	
						   

						    
						    

						  	
						  </tbody>

						</table>
						</div> 
						<label>Selected :</label>
						 <button class="btn btn-light" type="submit" name="" style="font-size: 12px;"><i class="fas fa-trash"></i> DELETE</button>
					  	 			
						  </form>		
					  	 		</div>

					  	 
					  		<div class="card-footer">
					  			
					  		</div>
					  	  </div> 
					  	 
		
					
				</div>
				</div>



			<?php
	}
		
	if(isset($_POST['settings'])){ 

			?>
				<div class="container">
			<h5>Settings <i style="font-size: 25px;" class="fas fa-cogs"></i></h5>
			<p></p>
				<div class="row">
					<div class="col-md-2"></div> 
					 <div class="col-md-8">
					 		 <img src="../img/undraw_Personal_settings_re_i6w4 (1).png" class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 50rem;">
					 </div> 
					 <div class="col-md-2"></div> 
			
			
					
				</div>
				<h6>To start with, Select on the options on the right .</h6>
				</div>



			<?php
		
	}
	

?>
  <div class="modal fade" id="emailcontent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                   
                  </div>
                  <div class="modal-body">
                   		
                   		 <div class="container">
                   		 		<h6> Recepient : <span id="recepientdata"></span> </h6>
                   		 		
                   		 		<h5 style="font-weight: bolder"> <span id="subjectdata"></span></h5>
                   		 		
                   		 		<hr>
                   		 		<br>
                   		 		<p id="messagedata">
                   		 			
                   		 		</p>
                   		 </div> 
                   		 

                  </div>
                  <div class="modal-footer">
                   
                    <button type="button" class="btn btn-danger deleteicons" style="font-size: 12px" >Delete</button>
                    <button data-dismiss="modal" type="button" class="btn btn-secondary" style="font-size: 12px;">Close</button>
                  </div>
                </div>
              </div>
            </div>



          
            <div class="modal fade" id="verificationcode" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                 
                  <div class="modal-body">
	                 <div class="container">
	                 	 <div class="card shadow">
	                 	 	<p></p>
	                 	 	<div class="card-body">
	                 	 			<h6>A verification code was sent to <span style="color: green" id="newemailvaltext"></span></h6> 	
	                 	 		<hr>
	                 	 		<h6 style="font-weight: bolder;font-size: 12px;">PLEASE CHECK EMAIL FOR INCOMING CODES</h6>
	                 	 		<span style="font-size: 12px"><i class="fas fa-info-circle"></i> Codes are sensitive. One wrong code will cancel the action</span>
	                 	 		<input type="text" name="" id="codevalue" class="form-control" >
	                 	 		<span id="errorv" style="font-size: 12px;color: red"></span>
	                 	 	</div>
	                 	 	<p></p>
	                 	 </div> 
	                 	 	
	                 	 	 <div class="" style="float: right;"> 
                    
                    <button type="button" class="btn btn-secondary mt-2 mr-1" id="closeverificationcode" style="font-size: 12px" data-dismiss="modal">Close</button>
                    <button type="button" style="font-size: 12px"  class="btn btn-primary mt-2" id="clickverify">Verify</button>
                    </div>
	                  	
                  	 </div> 
                  	 
                  	

                   <input type="hidden" name="" id="newemailval">
                   <input type="hidden" name="" id="newpassval">
                   
                  </div>
                 
                </div>
              </div>
            </div>

 <script src="../../offline/sweetalert.js"></script>
 <script src="../../js/jquery.js"></script>

<script type="text/javascript">
	
	$(document).ready(function() {
		$('.sentemail').click(function() { 
			var id = $(this).data('id');
			var recepient = $(this).data('recepient');
			var subject = $(this).data('subject');
			var message = $(this).data('message');

			$('#recepientdata').text(recepient);
			$('#subjectdata').text(subject);
			$('#messagedata').text(message);
			
		})
	
			
		
		 $('#selectall').click(function() {
		      if($(this).prop("checked") == true) {
		            $('.checkchecktodel').prop('checked',true);                         		
		         }
		      else if($(this).prop("checked") == false) {
		           	$('.checkchecktodel').prop('checked',false);                            
		       }
		    });
		    $('#txtcurrent').keyup(function(){ 
                              var value = $(this).val();
                            
                                   $.ajax({
                               url : "Manage.php",
                                method: "POST",
                                 data  : {compare:1,currentpass:value},
                                 success : function(data){
                                          
                                   if(value == '') {
                                        $('#txtreenter').attr('disabled',true);
                                        $('#btnsavepass').attr('disabled',true);
                                         $('#pregmatch').html('');
                                       $('#notify').html('');  
                                        $('#txtnew').attr('disabled',true);
                                        $('#btnsavepass').attr('disabled',true);
                                        
                                  }else {
                                           if (data == 'success') {
                                        $('#txtnew').removeAttr('disabled');
                                      //  $('#txtreenter').removeAttr('disabled');
                                        $('#txtnew').attr('required',true);
                                      //  $('#txtreenter').attr('required',true);
                                      $('#txtcurrent').attr('disabled',true);
                                        $('#notify').html('');
                                         $('#txtnew').focus();
                                   }else if (data == 'fail') {
                                        $('#txtnew').removeAttr('required');
                                     //   $('#txtreenter').removeAttr('required');
                                        $('#txtnew').attr('disabled',true);
                                        $('#txtreenter').attr('disabled',true);
                                        $('#txtnew').val('');
                                        $('#txtreenter').val('');
                                         $('#pregmatch').html('');
                                         $('#btnsavepass').attr('disabled',true);
                                        $('#notify').html('<h6 style="color: red">Password doesnt Match your current pass <i class="fas fa-exclamation-triangle"></i></h6>');
                                   }


                                  }
                                 
                                   
                                 }
                              })
                        })

		     $('#txtnew').keyup(function(){ 
                              var newvalue = $(this).val();

                              if(newvalue == '') {
                                   $('#restrict').addClass('d-none');
                                  
                                   $('#txtreenter').attr('disabled',true);
                                   $('#txtreenter').val('');

                                        $('#btnsavepass').attr('disabled',true);
                                         $('#pregmatch').html('');
                              }else {
                                  $('#restrict').removeClass('d-none'); 
                                   var lowerCaseLetters = /[a-z]/g;
                                   var upperCaseLetters = /[A-Z]/g;
                                    var numbers = /[0-9]/g;

                                    if(newvalue.match(lowerCaseLetters) && newvalue.match(upperCaseLetters) &&  newvalue.match(numbers) && newvalue.length >= 8 ) {
                                          $('#restrict').addClass('d-none');
                                          $('#txtreenter').removeAttr('disabled');
                                        $('#txtreenter').attr('required',true);
                                    }else {

                                     if(newvalue.match(lowerCaseLetters)) {
                                        $('#lower').addClass('d-none');
                                    }else {
                                        $('#lower').removeClass('d-none');
                                        $('#txtreenter').attr('disabled',true);
                                         $('#txtreenter').val('');
                                        $('#btnsavepass').attr('disabled',true);
                                         $('#pregmatch').html('');
                                    }

                                    if(newvalue.match(upperCaseLetters)) {
                                        $('#upper').addClass('d-none');
                                    }else {
                                        $('#upper').removeClass('d-none');
                                        $('#txtreenter').attr('disabled',true);
                                         $('#txtreenter').val('');
                                        $('#btnsavepass').attr('disabled',true);
                                         $('#pregmatch').html('');
                                    }

                                    if(newvalue.match(numbers)) {
                                        $('#numb').addClass('d-none');
                                    }else {
                                        $('#numb').removeClass('d-none');
                                        $('#txtreenter').attr('disabled',true);
                                         $('#txtreenter').val('');
                                        $('#btnsavepass').attr('disabled',true);
                                         $('#pregmatch').html('');
                                    }
                                    if(newvalue.length >= 8) { 
                                       $('#chara').addClass('d-none');
                                      
                                    }else {
                                         $('#chara').removeClass('d-none');
                                         $('#txtreenter').attr('disabled',true);
                                         $('#txtreenter').val('');
                                        $('#btnsavepass').attr('disabled',true);
                                         $('#pregmatch').html('');
                                    }

                                    }

                               




                              }
                              
                         })

		      $('#txtreenter').keyup(function(){ 
                              var valuenew = $('#txtnew').val();
                              var reentervalue = $(this).val();

                              if(valuenew == reentervalue) {
                                   $('#pregmatch').html('<span style="color: Green">Password Match <i class="fas fa-check-circle"></i></span>');
                                  
                                 
                                   $('#btnsavepass').removeAttr('disabled');

                              } else {
                                    $('#pregmatch').html('<span style="color: red">Password does not Match <i class="fas fa-times-circle"></i> </span>');
                                     $('#btnsavepass').attr('disabled',true);
                              }    


                         })  
                       


	      	 $('#imagefilecheck').click(function() {
	      	      if($(this).prop("checked") == true) {
	      	             $('#imagefile').removeAttr('disabled');     
	      	             $('#imagefile').attr('required',true);   
	      	             $('#btnsavephoto').removeAttr('disabled');                		
	      	         }
	      	      else if($(this).prop("checked") == false) {
	      	              $('#imagefile').attr('disabled','true');     
	      	              $('#imagefile').removeAttr('required');  
	      	              $('#btnsavephoto').attr('disabled',true);                       
	      	       }
	      	    });


	      	                     const inpfile = document.getElementById("imagefile"); //id of input tag type file
	      	                     const regform=document.getElementById ("form"); // div containing the form
	      	                     const previewimage=regform.querySelector("#imgtag"); // id of img tag
	      	 
	      	                      inpfile.addEventListener("change",function () {
	      	                         const file = this.files[0];
	      	 
	      	                         if(file) {
	      	                             const reader = new FileReader();
	      	                             
	      	                             
	      	                             reader.addEventListener("load",function() {
	      	                                 previewimage.setAttribute("src",this.result);
	      	                                
	      	                             });
	      	                             reader.readAsDataURL(file);
	      	                         }
	      	                      });
	      	        	  $('#saveeditform').on('submit', function(event){
	      	                 event.preventDefault();
	      	               var formData = new FormData(this);
	      	              $.ajax({
	      	                 url : $(this).attr('action'),
	      	                   data:formData,
	      	                    cache:false,
	      	                    contentType: false,
	      	                    processData: false,
	      	                    method: "POST",
	      	                                                                
	      	                   success : function(data){
	      	                   	Swal.fire(
								  'Well Done!',
								  'Your photo updated successfully!',
								  'success'
								)
	      	                      editmyprofile();                                
	      	                    }
	      	                   })
	      	        })

	      	        	   function editmyprofile(){
                         $.ajax({
                                 url : "contents.php",
                                  method: "POST",
                                   data  : {editmyprofile:1},
                                   success : function(data){
                               $('#pressedcontents').html(data);
                                   }
                                })
                    }


                    	  	

	      	 
	      	 

	      });    
 $('#favcolor').on('input', function() {
						var color = $(this).val();
			    		$('#colorfav').val(color);
					});
	        $('#savenewpassword').on('submit', function(event){
                       event.preventDefault();
                     
                       			 $.ajax({
                    	                 url : "Manage.php",
                    	                  method: "POST",
                    	                   data  : $(this).serialize(),
                    	                   success : function(data){
                    	      			Swal.fire(
								  'Well Done!',
								  'Your Password changed Successfully!',
								  'success'
								)
                    	      			changepassword();
                    	                   }
                    	                })
                       });  

	          function changepassword(){
                      $.ajax({
                                 url : "contents.php",
                                  method: "POST",
                                   data  : {changepassword:1},
                                   success : function(data){
                               $('#pressedcontents').html(data);
                                   }
                                })
                    }

               $('#chngedispname').on('submit', function(event){
                  event.preventDefault();
                  			 $.ajax({
               	                 url : "Manage.php",
               	                  method: "POST",
               	                   data  : $(this).serialize(),
               	                   success : function(data){
               	      					Swal.fire(
								  'Well Done!',
								  'DisplayName has changed Successfully!',
								  'success'
								).then((result) => {
									  if (result.isConfirmed) {
									  	location.reload();
									  } })
               	      					
               	                   }
               	                })
                  });
                function changedisplayname(){
                       $.ajax({
                                 url : "contents.php",
                                  method: "POST",
                                   data  : {changedisplayname:1},
                                   success : function(data){
                               $('#pressedcontents').html(data);
                                   }
                                })
                    }

                    $('#saveadmintitle').on('submit', function(event){
                       event.preventDefault();
                       			 $.ajax({
                    	                 url : "Manage.php",
                    	                  method: "POST",
                    	                   data  : $(this).serialize(),
                    	                   success : function(data){
                    	                   	Swal.fire(
								  'Well Done!',
								  'Banner has changed Successfully!',
								  'success'
								).then((result) => {
									  if (result.isConfirmed) {
									  	location.reload();
									  } })
                    	      					 
                    	                   }
                    	                })
                       });
                    function changetitle(){
                       $.ajax({
                                 url : "contents.php",
                                  method: "POST",
                                   data  : {changetitle:1},
                                   success : function(data){
                               $('#pressedcontents').html(data);
                                   }
                                })
                    }
                    $('#savenewcolor').on('submit', function(event){
                       event.preventDefault();
                       		Swal.fire({
					  title: 'Are you sure?',
					  text: "You can revert this action by clicking resetdefault button",
					  icon: 'info',
					  showCancelButton: true,
					  confirmButtonColor: '#0cc099',
					  cancelButtonColor: '#d33',
					  confirmButtonText: 'Yes,Save it!'
					}).then((result) => {
					  if (result.isConfirmed) {
					    $.ajax({
                    	                 url : "Manage.php",
                    	                  method: "POST",
                    	                   data  : $(this).serialize(),
                    	                   success : function(data){
                    	      				Swal.fire(
								  'Well Done!',
								  'Color change successfully!',
								  'success'
								).then((result) => {
									  if (result.isConfirmed) {
									  	location.reload();
									  } })
                    	                   }
                    	                })
					  }
					})

                       		
                       });
                    $('#resetdefaultcolor').click(function() { 
                    	 	Swal.fire({
					  title: 'Are you sure?',
					  text: "",
					  icon: 'warning',
					  showCancelButton: true,
					  confirmButtonColor: '#55945e',
					  cancelButtonColor: '#d33',
					  confirmButtonText: 'Yes,Reset it!'
					}).then((result) => {
					  if (result.isConfirmed) {
                    	   $.ajax({
                    	           url : "Manage.php",
                    	            method: "POST",
                    	             data  : {resetdefaultcolor:1},
                    	             success : function(data){
                    				Swal.fire(
								  'Well Done!',
								  'Color set to Default!',
								  'success'
								).then((result) => {
									  if (result.isConfirmed) {
									  	location.reload();
									  } })
                    	             }
                    	          })

                    	     }
					})

                    	   
                    	
                    	
                    	    
                    })

                    $('#sendemail').on('submit', function(event){
                       event.preventDefault();
                  $('#sendem').html('Sending <i class="fas fa-spinner fa-pulse"></i>'); 
                       
                       			 $.ajax({
                    	                 url : "mailer/index.php",
                    	                  method: "POST",
                    	                   data  : $(this).serialize(),
                    	                   success : function(data){
                    	      					if (data=='Error'){
                    	      						Swal.fire(
								  'ERROR SENDING',
								  'There was an issue with email delivery. Please verify your email configuration and read the instructions; you can also hit the RESET DEFAULT BUTTON to see if that solves the problem! ',
								  'error'
								).then((result) => {
									  if (result.isConfirmed) {
									

									    $('#sendem').html('SEND <i class="fas fa-paper-plane"></i>'); 
									  } })
                    	      					}else{
                    	      		Swal.fire(
								  'Email',
								  'Was Sent Successfully! ',
								  'success'
								).then((result) => {
									  if (result.isConfirmed) {
									  createemail();
									    $('#sendem').html('SEND <i class="fas fa-paper-plane"></i>'); 
									  } })
                    	      					}
                    	      				
                    	                   }
                    	                })
                       });

                 

                    function createemail(){
                      $.ajax({
                                 url : "contents.php",
                                  method: "POST",
                                   data  : {createemail:1},
                                   success : function(data){
                               $('#pressedcontents').html(data);
                                   }
                                })
                    }

                    $('#deleteselectedemail').on('submit', function(event){
                       event.preventDefault();
                       Swal.fire({
						  title: 'Are you sure?',
						  text: "You won't be able to revert this!",
						  icon: 'warning',
						  showCancelButton: true,
						  confirmButtonColor: '#3085d6',
						  cancelButtonColor: '#d33',
						  confirmButtonText: 'Yes, delete it!'
						}).then((result) => {
						  if (result.isConfirmed) {
						   	 	 $.ajax({
                    	                 url : "manage.php",
                    	                  method: "POST",
                    	                   data  : $(this).serialize(),
                    	                   success : function(data){
                    	      				Swal.fire(
								  'Email',
								  'Was Deleted Successfully! ',
								  'success'
								).then((result) => {
									  if (result.isConfirmed) {
									  sentemail();
									    
									  } })
                    	                   }
                    	                })
						  }
						})
                       			

                       });

                    function sentemail(){
                      $.ajax({
                                 url : "contents.php",
                                  method: "POST",
                                   data  : {sentemail:1},
                                   success : function(data){
                               $('#pressedcontents').html(data);
                                   }
                                })
                    }
                    $('.deleteicons').click(function() { 

                    	$('.deleteicon').click();
                    	$('#emailcontent').modal('hide');
                    })

                    $('.deleteicon').click(function() { 
                    	var id = $(this).data('id');
						                    	Swal.fire({
						  title: 'Are you sure?',
						  text: "You won't be able to revert this!",
						  icon: 'warning',
						  showCancelButton: true,
						  confirmButtonColor: '#3085d6',
						  cancelButtonColor: '#d33',
						  confirmButtonText: 'Yes, delete it!'
						}).then((result) => {
						  if (result.isConfirmed) {
						   	   $.ajax({
                    	           url : "Manage.php",
                    	            method: "POST",
                    	             data  : {deleteone:1,id:id},
                    	             success : function(data){
                    		Swal.fire(
								  'Email',
								  'Was Deleted Successfully! ',
								  'success'
								).then((result) => {
									  if (result.isConfirmed) {
									  sentemail();
									    
									  } })
                    	             }
                    	          })
						  }
						})
                    	
                    	
                    	
                    	    
                    	    
                    
                    })
                    $('#deleteallemail').click(function() { 
                    		Swal.fire({
						  title: 'Are you sure?',
						  text: "You want to delete all? You won't be able to revert this!",
						  icon: 'warning',
						  showCancelButton: true,
						  confirmButtonColor: '#3085d6',
						  cancelButtonColor: '#d33',
						  confirmButtonText: 'Yes, delete it!'
						}).then((result) => {
						  if (result.isConfirmed) {
						   	   $.ajax({
                    	           url : "Manage.php",
                    	            method: "POST",
                    	             data  : {deleteall:1},
                    	             success : function(data){
                    		Swal.fire(
								  'All Email',
								  'Sent Deleted Successfully! ',
								  'success'
								).then((result) => {
									  if (result.isConfirmed) {
									  sentemail();
									    
									  } })
                    	             }
                    	          })
						  }
						})
                    })	
                    $('#resetsystememail').click(function() { 
                    		Swal.fire({
						  title: 'Are you sure?',
						  text: "You want to Reset to Defaults? You won't be able to revert this!",
						  icon: 'warning',
						  showCancelButton: true,
						  confirmButtonColor: '#4e855a',
						  cancelButtonColor: '#d33',
						  confirmButtonText: 'Yes, reset it!'
						}).then((result) => {
						  if (result.isConfirmed) {
						   	   $.ajax({
                    	           url : "Manage.php",
                    	            method: "POST",
                    	             data  : {resetsystememail:1},
                    	             success : function(data){
                    		Swal.fire(
								  'System Email',
								  'Reset to Default Successfully! ',
								  'success'
								).then((result) => {
									  if (result.isConfirmed) {
									  changeemail();
									    
									  } })
                    	             }
                    	          })
						  }
						})
                    	
                    	  
                    	 
                    	    
                    
                    })

                 

                    $('#changesystememail').click(function() { 
                    	var newemail = $('#newemail').val();
                    	var newpass = $('#newpass').val();
                    	
                    	if(newemail ==''){
                    		$('#errore').text('Please Fill Email fields');
                    	}else if(newpass==''){
                    	$('#errorp').text('Please Fill Password fields');
                    	}else {
                    		$('#errore').text('');
                    		$('#errorp').text('');
                    		$('#btnverification').click();
                    		$('#newemailval').val(newemail);
                    		$('#newpassval').val(newpass);
                    		$('#newemailvaltext').text(newemail);
                    		$.ajax({
                    		           url : "mailer/index.php",
                    		            method: "POST",
                    		             data  : {verifycode:1,newemail:newemail},
                    		             success : function(data){
                    							if(data=='Error'){
                    									Swal.fire(
								  'ERROR SENDING',
								  'There was an issue with email delivery. Please verify your email configuration and read the instructions; you can also hit the RESET DEFAULT BUTTON to see if that solves the problem! ',
								  'error'
								).then((result) => {
									  if (result.isConfirmed) {
									  	 changeemail();
									$('#closeverificationcode').click();

									  } })
							}else {

							}
                    		             }
                    		          })
                    	}
                    
                    })

                    
                    $('#codevalue').keyup(function(){ 

                    	var val =$(this).val();
                    	if(val==''){
                    		$('#errorv').text('Please provide the CODE!');
                    		$('#codevalue').addClass('is-invalid');
                    	}else {
                    		$('#errorv').text('');
                    		$('#codevalue').removeClass('is-invalid');

                    	}
                    
                    })
                    $('#closeverificationcode').click(function() { 
                    		changeemail();
                    
                    })
                    $('#clickverify').click(function() { 
                    	var newemail=$('#newemailval').val();
                    	var newpass =$('#newpassval').val();
                    	var code = $('#codevalue').val();
                    	if(code == ''){
                    		$('#errorv').text('Please provide the CODE!');
                    		$('#codevalue').addClass('is-invalid');
                    	}else {
                    		 $.ajax({
                    	                 url : "Manage.php",
                    	                  method: "POST",
                    	                   data  : {changesystememail:1,newemail:newemail,newpass:newpass,code:code},
                    	                   success : function(data){
                    	                  if(data=='error'){
                    	                  	Swal.fire(
								  'Invalid Code',
								  'Resetting Actions! ',
								  'error'
								).then((result) => {
									  if (result.isConfirmed) {
									  changeemail();
									 $('#closeverificationcode').click();
									    
									  } })
                    	                  }else {
                    	                  	Swal.fire(
								  'System Email',
								  'Changed Successfully! ',
								  'success'
								).then((result) => {
									  if (result.isConfirmed) {
									  changeemail();
									     $('#closeverificationcode').click();
									  } })
                    	                  }
                    	          
                    	      	
                    	                   }
                    	                })
                    	}

                    
                    	
                    })
                     function changeemail(){
                      $.ajax({
                                 url : "contents.php",
                                  method: "POST",
                                   data  : {changeemail:1},
                                   success : function(data){
                               $('#pressedcontents').html(data);
                                   }
                                })
                    }
      	// default color #63a284
</script>
