<?php 
session_start();

if(isset($_SESSION['ConnectionEstablished'])){

	if(isset($_SESSION['superadminId'])){

	}else {
		header('location:../');

		?>

		<?php

	}


}
 ?>


<!DOCTYPE html>
<html>

<head>
 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

   <title>GCC-Configuration</title>

    <!-- Custom fonts for this template-->
    <link href="../GCC/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../GCC/css/sb-admin-2.min.css?v=2" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../homepage.css?v=13">

    <style type="text/css">
    	input{
    		font-size: 13px;
    	}
    	img{
    		width: 200px;
    		height: 200px;
    	}
    </style>
   
</head>
<body style="background: rgb(255,255,255);
background: linear-gradient(0deg, rgba(255,255,255,1) 9%, rgba(244,254,243,1) 28%, rgba(254,254,254,1) 56%, rgba(240,240,240,1) 74%, rgba(229,241,229,1) 84%, rgba(214,236,215,1) 89%, rgba(190,231,191,1) 96%);overflow-x: hidden;" id="page-top">
	
	<script type="text/javascript">
		
		window.onscroll = function() {myFunction();};

function myFunction() {
  var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
  var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
  var scrolled = (winScroll / height) * 100;
  document.getElementById("myBar").style.width = scrolled + "%";
}      






	      	
	</script>
	
	<?php 
				if(isset($_SESSION['superadminId'])){
						include 'config.php';
				}else {
					?>


		<div class="container mt-5">

				<div class="row">
					<div class="col-md-2"></div>
					<div class="col-md-8">

						<h4 style="font-weight:bolder;">System Connection Configuration</h4>
						<hr>
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
									Unable to  Establish Connection . Please Check all Fields and try again.
									 
									  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									    <span aria-hidden="true">&times;</span>
									  </button>
									</div>
								<?php
								

							}else if($_SESSION['errorconnection'] == 4) {
								?>
								<div class="alert alert-danger alert-dismissible fade show ee" role="alert">
									Database already Exist. Please Click Connect.
									 
									  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									    <span aria-hidden="true">&times;</span>
									  </button>
									</div>
								<?php
								

							}else if($_SESSION['errorconnection'] == 5) {
								unset($_SESSION['superadminId']);
								?>
								<div class="alert alert-danger alert-dismissible fade show ee" role="alert">
									<strong>Bad Configuration</strong>
							Please check the Connection.
									 
									  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									    <span aria-hidden="true">&times;</span>
									  </button>
									</div>
									<script type="text/javascript" src="../js/jquery.js"></script>
									<script type="text/javascript">
										  $(document).ready(function() {
										  	$('#db').addClass('is-invalid');
										  	$('#createdb').html('<span class="text-danger">Clear Database and Install Prerequisites</span>')
										
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
								
								<?php
							}


						 ?>

						 	<div class="alert alert-success  fade show d-none" id="createing" role="alert">
									Establishing <span id="txtdb" style="font-weight:bold"></span> Connection <i class="fas fa-spinner fa-pulse"></i>

									<br>
									<div class="card mt-2">
										<div class="card-body">
											<span class="text-danger" style="font-size:13px">DO NOT REFRESH THE PAGE! IT WILL DAMAGE THE INSTALLATION.</span>	
										</div>
										
									</div>
										
								</div> 
							<div class="card mb-2">
								<div class="card-body">
								<a href="../db/wmsugcc.sql" class="btn btn-link">System Default Database Sql-File <i class="fas fa-download"></i></a>
								</div>
							</div>
							
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
									<pre><textarea name="filecontent" class="form-control  " rows="50" style="width:100%; border:none;outline:none;font-size: 15px; resize: none; background-color: #eee7e6;" id="filecontents" ><?php echo $filecontents ?></textarea></pre>

									<button type="submit" name="savechanges" class="btn btn-primary mb-5 " style="float: right; margin-right: 20px;margin-top: 20px;" id="savechanges">Save Changes and Try Connection</button>
			
									
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

	
					<?php
				}

			 ?>




	 <!--xaxaxaxaxaxa-->

 <a class="scroll-to-top rounded bg-success" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <script type="text/javascript" src ='../js/jquery.js'></script>
    <script type="text/javascript">
    	  $(document).ready(function() {
    	  	var val = $('#db').val();

    	  	if(val == ''){
    	  		$('#createdb').unbind();
    	  	}else {

    	  	}

    	  	$('#db').keyup(function(){
    	  		var value = $(this).val();

    	  	if(value == ''){
    	  			$('#db').removeClass('is-invalid');
    	  		$('#createdb').attr('disabled',true);
    	  	}else {
    	  		$('#createdb').removeAttr('disabled');
    	  		$('#datab').text(value);
    	  			$('#db').removeClass('is-invalid');
    	  	}
    	  	
    	  	})

    	  	$('#conn').click(function(){
    	  		var val = $('#db').val();
    	  		$('.ee').addClass('d-none');
    	  		$('#createing').removeClass('d-none');
    	  	
    	  		$(this).addClass('d-none');
    	  		$('#txtdb').text(val);
    	  		$(this).addClass('text-success');
    	  	
    	  		$('.tt').attr('readonly',true);

    	  		$('#dbs').text(val);
    	  			  		
    	  	})
    	  	   
    	
    	  });
    </script>
 <!-- Bootstrap core JavaScript-->
    <script src="../GCC/vendor/jquery/jquery.min.js?v=1"></script>
    <script src="../GCC/vendor/bootstrap/js/bootstrap.bundle.min.js?v=1"></script>

    <!-- Core plugin JavaScript-->
<script src="../GCC/vendor/jquery-easing/jquery.easing.min.js?v=1"></script>

    <!-- Custom scripts for all pages-->
    <script src="../GCC/js/sb-admin-2.min.js?v=1"></script>
  
    	
    	      
          	
   
</body>
</html>
