
		<div class="container mt-5">
			<a href="../admin/Dashboard/">Back</a>
				<div class="row">
					<div class="col-md-2"></div>
					<div class="col-md-8">

						<h4 style="font-weight:bolder;">System Connection Configuration <span id="emc"  style="font-size:15px">|| <a href="email_configuration.php" >Modify (Email and Google-Config) Configuration</a> </span> 
						
						<button id="btnreset" class="btn text-danger" data-toggle="modal" data-target="#exampleModal" style="float: right; font-size:14px">Reset</button></h4>


	
				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog modal-sm " role="document">
				    <div class="modal-content">
				     
				      <div class="modal-body bg-dark">
				      	 <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button><br>
				      	<div class="container">

				      		<h6 class="text-light">Enter Admin Password <i class="fas fa-unlock"></i></h6>
				      		<input type="password" name="" id="passlock" class="form-control" style="text-align: center;">
				      		
				      	</div>
				      	<br>
				       
				      </div>
				    
				    </div>
				  </div>
				</div>
						<hr>
						<script type="text/javascript" src="../js/jquery.js"></script>
						<script type="text/javascript">
							$('#passlock').keyup(function(){
								var value = $(this).val();
									
									 $.ajax({
									 url : "check.php",
									  method: "POST",
									 data  : {check_password:value},
									  success : function(data){
									  
									 	if(data == 'match'){
									 		$('#exampleModal').modal('hide');
									 		$('#conn').removeClass('d-none');
									 		//$('#createdb').removeClass('d-none');
									 		$('#confirm').addClass('d-none');
									 		$('.tt').removeAttr('readonly');
									 		$('#emc').addClass('d-none');
									 		$('#btnreset').addClass('d-none');
											 $('#savechanges').removeClass('d-none');
											 $('#filecontents').removeAttr('disabled').focus();
									 	}else {
									 		
									 	}
									   }
									 })
							
							})
						</script>
						

						<?php 
						if(isset($_SESSION['errorconnection'])){

							if($_SESSION['errorconnection'] == 1){

								?>
								<div class="alert alert-danger alert-dismissible fade show ee" role="alert">
									 	Unable to  Establish Connection .Make sure all fields are correct. 
									  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									    <span aria-hidden="true">&times;</span>
									  </button>
									</div>
								<?php

							}else if($_SESSION['errorconnection'] == 3) {
								?>
								<div class="alert alert-danger alert-dismissible fade show ee" role="alert">
									Unable to  Establish Connection . Please Check all Fields.
									 
									  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									    <span aria-hidden="true">&times;</span>
									  </button>
									</div>
								<?php
								

							}else if($_SESSION['errorconnection'] == 4) {
								?>
								<div class="alert alert-danger alert-dismissible fade show ee" role="alert">
									Database already Exist.
									 
									  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									    <span aria-hidden="true">&times;</span>
									  </button>
									</div>
								<?php
								

							}else if($_SESSION['errorconnection'] == 5) {
								?>
								<div class="alert alert-danger alert-dismissible fade show ee" role="alert">
							The selected database does not have the tables and entities that the system requires. We suggest to change the name of the Database and click the button create database.
									 
									  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									    <span aria-hidden="true">&times;</span>
									  </button>
									</div>
									<script type="text/javascript" src="../js/jquery.js"></script>
									<script type="text/javascript">
										  $(document).ready(function() {
										  	$('#db').addClass('is-invalid');
										
										  });
									</script>
								<?php
								

							}

							else {
								?>
								<div class="alert alert-danger alert-dismissible fade show ee" role="alert">
									 <span class="text-primary">Connection Established!</span> <strong> Yet, Incorrect Database or Database does not exist.</strong>
									 
									  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									    <span aria-hidden="true">&times;</span>
									  </button>
									</div>

									<script type="text/javascript" src="../js/jquery.js"></script>
									<script type="text/javascript">
										  $(document).ready(function() {
										 
										
										  });
									</script>
								<?php
							}

								
								unset($_SESSION['errorconnection']);
							}else {
								?>
								<div class="alert alert-success fade show ee" id="confirm" role="alert">
									 <h6 style="font-size:14px">
									 	<strong>This Connection is working properly.</strong> <br>
									 	
									 	 if you wish to change configuration. click reset and provide your password. this action will end your current session.

									 </h6>

									
									</div>
								
								<?php
							}


						 ?>

						 		<div class="alert alert-success  fade show d-none" id="createing" role="alert">
									Creating Database <span id="txtdb" style="font-weight:bold"></span> and its Prerequisites <i class="fas fa-spinner fa-pulse"></i>

									<br>
									<div class="card mt-2">
										<div class="card-body">
											<span class="text-danger" style="font-size:13px">DO NOT REFRESH THE PAGE! IT WILL DAMAGE THE INSTALLATION.</span>	
										</div>
										
									</div>
										
								</div> 
								<?php 
						if(isset($_SESSION['success_saved'])){

							?>
							<script type="text/javascript" src="../offline/sweetalert.js">
								
							</script>
							<script type="text/javascript" src="../js/jquery.js"></script>
							<script type="text/javascript">
								  $(document).ready(function() {
								  	swal.fire(
								  		'Changes Saved!',
								  		'',
								  		'success'

								  		)
								
								  });
							</script>
							<?php
							unset($_SESSION['success_saved']);
						}


						 ?>


						<form action="action.php" method="post" id="cr" >
						<div class="row">
							<div class="col-md-12">
							
							<?php   

							

							$file = '../GCC/create_form/connect.php';
							$fileo = fopen($file,"r+");

							if( filesize($file) >= 1){
								$filecontents = fread($fileo,filesize($file));
							}else {
								$filecontents = 'Empty';
							}

						

								  ?>
								  <input type="hidden" name="file" value="<?php echo $file?>">
									<pre><textarea name="filecontent" class="form-control  " rows="50" style="width:100%; border:none;outline:none;font-size: 15px; resize: none; background-color: #eee7e6;" id="filecontents" disabled><?php echo $filecontents ?></textarea></pre>

									<button type="submit" name="savechanges" class="btn btn-primary mb-5 d-none" style="float: right; margin-right: 20px;margin-top: 20px;" id="savechanges">Save Changes and Try Connection</button>
			
									
								  <?php

							
								
	  
							  
							  
						
							 ?>
    						<!--<h6>Server:</h6>
    						<input type="text" class="form-control mb-2 tt" name="host" value="<?php echo $root ?>" readonly>
    						<h6>User:</h6>
    						<input type="text" class="form-control mb-2 tt" name="user" value="<?php echo $username ?>" readonly>
    						<h6>Password:</h6>
    						<input type="password" class="form-control mb-2 tt" name="pass" value="<?php echo $password ?>" readonly>
    						<h6>Database:</h6>
    						<input type="text" class="form-control mb-2 tt" id="db" name="db" value="<?php echo $database ?>" readonly>
    	


    						<button type="submit" name="connect" id="conn"  class="btn btn-primary form-control d-none" >Connect</button> -->

    						
							</div>
							<div class="col-md-2"> </div>
							<div class="col-md-8">
								<h4 style="text-align:center">Western Mindanao State University</h4>
								<h3 style="text-align: center;font-weight: bold;">GUIDANCE AND COUNSELING CENTER <br>
									<span style="font-size:15px">CONTENT MANAGEMENT SYSTEM</span> <br>

									<img src="../Guidance-Coordinator/img/gcc.png" >
								</h3>
								
								<!--<button type="button" class="form-control" onclick="window.location.href='wmsugcc_db.sql' ">Download WMSUGCC_DB <i class="fas fa-download"></i></button> -->

								<button  type="submit" class="form-control d-none" id="createdb" name="createdb"  >Create Database with a Name { <span id="datab" style="font-weight:bolder"><?php echo $database ?> </span> }
									<br>
									<span style="font-size:12px">All tables and Entity needed will be created afterwards.</span>
								</button>

							
									
								

									</div>
									<div class="col-md-2"> </div>


							</div>
						</div>

						</form>

					</div>
					<div class="col-md-2"></div>
				</div>
		</div>