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
		
		<?php 
		if(isset($_GET['url'])){
			$url = $_GET['url'];
			include 'open.php';
		}else {
			?>

				<div class="container mt-5">
<a href="../configuration/">Back</a>
				<div class="row">
					<div class="col-md-1"></div>
					<div class="col-md-10 mb-5">

						<h4 style="font-weight:bolder;">GCC File Configurations</h4>
						<hr>
						<?php 
						if(isset($_SESSION['errorconnection'])){

							
						}else {
								
						

						}

						if(isset($_SESSION['success_saved'])){
								?>
								<div class="alert alert-success alert-dismissible fade show ee" role="alert">
								Modification on file :	<?php echo $_SESSION['success_saved'] ?> <br>
								Saved Successfully!
									  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									    <span aria-hidden="true">&times;</span>
									  </button>
									</div>
								<?php
							unset($_SESSION['success_saved']);
						}


						 ?>

						 	
						

						
						<div class="row">
							<div class="col-md-12">
								<h6 class="text-danger" style="font-weight: bolder;">
									
									This Files are case Sensitives. We suggest to do the Backup of the Entire File Before Configuring any files.

								</h6>

									<div class="card mb-2">
									<div class="card-header">
										
									</div>
									<div class="card-body btn-light">
										<h6 style="font-size:15px" class="text-dark">Google Login Config</h6>
										<div class="row">
											
											  <?php 

                                              $log_directory = '..';

                                              foreach(glob($log_directory.'/*.*') as $file) {


                                              	if($file == '../config.php'){
                                              			$fileo = fopen($file,"r+");


                                                    ?>
                                                    <div class="col-md-4">
                                                    <div class="card shadow mt-2 mb-2">
                                                        
                                                        <div class="card-header">
                                                           <div class="container">
                                                               
                                                               <h6><?php echo $file ?></h6>
                                                             
                                                               <button class="btn btn-light text-primary open" data-filename="<?php echo $file ?>" style="float:right; font-size: 13px;">Open</button>
                                                             
                                                           </div> 
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <?php
                                                

                                              	}
							

						
                                                }

                                               ?>
                                               </div>
                                               	<h6 style="font-size:15px" class="text-dark">Credentials and OTP's</h6>
                                               		<div class="row">
											  <?php 

                                              $log_directory = '../mailer';

                                              foreach(glob($log_directory.'/*.*') as $file) {



							

							$fileo = fopen($file,"r+");


                                                    ?>
                                                    <div class="col-md-4">
                                                    <div class="card shadow mt-2 mb-2">
                                                        
                                                        <div class="card-header">
                                                           <div class="container">
                                                               
                                                               <h6><?php echo $file ?></h6>
                                                             
                                                               <button class="btn btn-light text-primary open" data-filename="<?php echo $file ?>" style="float:right; font-size: 13px;">Open</button>
                                                             
                                                           </div> 
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <?php
                                                
                                                }

                                               ?>
                                               </div>	
                                               <h6 style="font-size:15px" class="text-dark">GCC Email</h6>
                                               <div class="row">
                                               	  <?php 

                                              $log_directory = '../GCC/Misc/mailer';

                                              foreach(glob($log_directory.'/*.*') as $file) {



							

							$fileo = fopen($file,"r+");


                                                    ?>
                                                    <div class="col-md-4">
                                                    <div class="card shadow mt-2 mb-2">
                                                        
                                                        <div class="card-header">
                                                           <div class="container">
                                                               
                                                               <h6><?php echo $file ?></h6>
                                                             
                                                               <button class="btn btn-light text-primary open" data-filename="<?php echo $file ?>" style="float:right; font-size: 13px;">Open</button>
                                                             
                                                           </div> 
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <?php
                                                
                                                }

                                               ?>
                                               </div>
                                               <h6 style="font-size:15px" class="text-dark">GC Email</h6>
                                               <div class="row">
                                               	  <?php 

                                              $log_directory = '../Guidance-Coordinator/PDS-Records/mail';

                                              foreach(glob($log_directory.'/*.*') as $file) {



							
                                              	$ext =  substr($file, -3,4);

                                              	if($ext == 'php'){
                                              			$fileo = fopen($file,"r+");


                                                    ?>
                                                    <div class="col-md-4">
                                                    <div class="card shadow mt-2 mb-2">
                                                        
                                                        <div class="card-header">
                                                           <div class="container">
                                                               
                                                               <h6><?php echo $file ?></h6>
                                                             
                                                               <button class="btn btn-light text-primary open" data-filename="<?php echo $file ?>" style="float:right; font-size: 13px;">Open</button>
                                                             
                                                           </div> 
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <?php

                                              	}else {

                                              	}
						
                                                
                                                }

                                               ?>
                                               </div>

									</div>
								</div>



								
    							
    							
						

							</div>
							
								

									</div>


							</div>
							<div class="col-md-1"></div>
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

    	  	$('.open').click(function(){
    	  		var val = $(this).data('filename');
    	  		
    	  		window.open('?url='+val); 		
    	  	})
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

    	  	$('#createdb').click(function(){
    	  		var val = $('#db').val();
    	  		$('.ee').addClass('d-none');
    	  		$('#createing').removeClass('d-none');
    	  	
    	  		$(this).addClass('d-none');
    	  		$('#txtdb').text(val);
    	  		$(this).addClass('text-success');
    	  		$('#conn').attr('disabled',true);
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
