<?php 
session_start();

if(isset($_SESSION['ConnectionEstablished'])){

	if(isset($_SESSION['superadminId'])){

	}else {
		header('location:../');

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



		<div class="container mt-5">

				<div class="row">
					<div class="col-md-3"></div>
					<div class="col-md-6">
						<?php 
						if(isset($dontexist)){
							?>
							<div  id="installexist">
							<div class="card">
							<div class="card-body" style="text-align:center;" >
								<a href="index.php" style="float: left;">Back</a> <br>
									<h5> DATABASE [ <?php echo $db ?> ] <span class="text-danger">Does not Exist.</span> </h5> 
									<button class="btn btn-primary mb-2 mt-2 createdbinstall" data-db="<?php echo $db ?>"> CREATE DATABASE [ <?php echo $db ?> ] and INSTALL its Prerequesites</button>

									<h6 style="font-weight:bold">Note: In some cases, this method might not work for you.</h6>

									<span style="font-size:15px"> If this method dont work. Please Create the Database Manually in your MySQL. and Run the Configuration again.</span>


							</div>
						</div>
					</div>
							<?php
						}else if (isset($existinstall)){
							?>
							<div  id="installexist">
							<div class="card shadow">
							<div class="card-body mb-5" style="text-align:center;" >
								<a href="index.php" style="float: left;">Back</a> <br>
								<h4 class="text-primary">DB [  <?php echo $db ?> ] is Empty. </h4>
									<h5 class="text-secondary"> Install System Prerequisites  </h5> 
									<button class="btn btn-primary mb-2 mt-2 btninstall"> Install </button>

									
									<br>
									<span style="font-size:15px"> 
										Installing tables and Entities needed for the system.
									</span>


							</div>
						</div>
						</div>
							<?php
						}else if (isset($wrongdb)){
							?>

							<div class="card shadow">
							<div class="card-body mb-5" style="text-align:center;">
								<a href="index.php" style="float: left;">Back</a> <br><br>
								<h5 class="text-danger">DB [  <?php echo $db ?> ] does not contain the system Prerequisites </h5>
									<span style="font-size:14px"> 
										( It's possible that the other system was using it. )
									</span>




									<h5 class="text-secondary mt-3">Change the Database and Try Again</h5> 
											
											<form action="action.php" method="post" id="cr">
					
							<?php   

							

							$file = fopen("configuration.json","r");

							while (!feof($file)) {
							  $content = fgets($file);
							  $carray = explode(",",$content);
							  list($root,$username,$password,$database) = $carray;
							  
							 
							
							}
						
							 ?>
    						
    						<input type="hidden" class="form-control mb-2 tt" name="host" value="<?php echo $root ?>">
    						
    						<input type="hidden" class="form-control mb-2 tt" name="user" value="<?php echo $username ?>">
    					
    						<input type="hidden" class="form-control mb-2 tt" name="pass" value="<?php echo $password ?>">
    					
    						<input type="text" class="form-control mb-2 tt" id="db" name="db" value="<?php echo $database ?>" style="text-align: center" >
    

    						<button type="submit" name="connect" id="conn" class="btn btn-primary form-control" >Connect</button>

    							


						</form>

									
									<br>
									<span style="font-size:15px" class="text-danger"> 
									
									</span>


							</div>
						</div>
							<?php
						}

						 ?>
						
						

						
								
							
					</div>
					<div class="col-md-3"></div>
				</div>
		</div>

	




	 <!--xaxaxaxaxaxa-->

 <a class="scroll-to-top rounded bg-success" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <script type="text/javascript" src ='../js/jquery.js'></script>
    <script type="text/javascript">
    	  $(document).ready(function() {
    		$('.btninstall').click(function(){
    			$('#installexist').html('<div class="alert alert-success  fade show mt-5 shadow " id="createing" role="alert"><strong>Installing Tables and Entities </strong> <i class="fas fa-spinner fa-pulse"></i><br><div class="card mt-2"><div class="card-body"><span class="text-danger" style="font-size:13px">DO NOT REFRESH THE PAGE! IT WILL DAMAGE THE INSTALLATION.</span></div></div> <h6 class="text-dark mt-2" style="font-size:12px;text-align:right">Guidance and Counseling Center </h6></div> ');	

    		window.location.href='Add_Entities.php';			  		

    		})

    		$('.createdbinstall').click(function(){
    			var db = $(this).data('db');
    			$('#installexist').html('<div class="alert alert-success  fade show mt-5 shadow " id="createing" role="alert"><strong>Creating Database -> Installing Tables and Entities </strong> <i class="fas fa-spinner fa-pulse"></i><br><div class="card mt-2"><div class="card-body"><span class="text-danger" style="font-size:13px">DO NOT REFRESH THE PAGE! IT WILL DAMAGE THE INSTALLATION.</span></div></div> <h6 class="text-dark mt-2" style="font-size:12px;text-align:right">Guidance and Counseling Center </h6></div> ');	

    			window.location.href='create.php';

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
