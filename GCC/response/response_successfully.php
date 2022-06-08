<?php 
session_start();
 include '../Classes/sql_query.php';
 
 if(isset($_GET['token_id'])) {
 			$form_name = $_GET['form_name'];
		$token_id = $_GET['token_id'];
		

 }
 ?>


<!DOCTYPE html>
<html>

<head>
	 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortout icon" type="image/x-icon" href="wmsu.png">
    	  <script src="https://kit.fontawesome.com/129b086bc9.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/css2?family=Gruppo&family=Londrina+Solid:wght@300&display=swap" rel="stylesheet">
<title>WMSU Guidance and Counceling</title>
<link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

	 <style type="text/css">
	 	body{
	 		 font-family: "Nunito", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
	 	}
	 </style>
<style type="text/css">
	
	.innerBar {
	 background: #617298;
   height: 2px;
   width: 0%;
   z-index: 1;
	}
</style>
</head>
	<?php
						include '../create_form/connect.php';
						$csform = $_SESSION['Live_form_id'];	
										$setcolor = " select * from `form_classification` where csform_id = '$csform'  ";
								                $setcolored = mysqli_query($con,$setcolor); // run query
								              
								                 while($getcolor = mysqli_fetch_array($setcolored)){
													$bodybg = $getcolor['bodybg'];
													$titlebg = $getcolor['titlebg'];
													$questionbg = $getcolor['questionbg'];
													$textcolortitle = $getcolor['textcolortitle'];
													$textcolorquestion = $getcolor['textcolorquestion'];
								    }
								          
		?>
<body style="background-color: <?php echo $bodybg ?>;">
	 
	   <div class="innerBar"  style="position: fixed"></div>
	<p><br><br></p>

	<div class="container">
		
		
  
		
		<div id="titleform" style="font-weight: bolder; text-align: center; font-size:25px;cursor: default;"></div>

	<div class="row">
		<div class="col-sm-2">
				 
		</div>
		<div class="col-sm-8">
		
					<br>
					 
					  	 <div id="content">
					  	 		
					  	 		
						 <form method="post" action="accept.php">
						    	                  
					
						

							<div class="card" style="background-color:#5379c1;color:#f6f8fa;text-align: center; padding: 35px;">

								<h4 style=""> 
									You have successfully submitted a response <i class="fas fa-check-circle"></i>
								</h4>
								<br>
								<div class="card-body" style="background-color: white;color:grey ">
									Thank you for your response!
									<p></p>
									<p style="font-size: 13px;">All rights reserved &middot; 2021</p>
								</div>
					
							</div>
							<br>

							<?php 
							if(isset($_SESSION['unknown_user'])){


								//unset($_SESSION['unknown_user']);
							}else {
								?>
								<a href="../../Myaccount/" class="btn btn-light mb-2 text-primary" style="float: right;font-weight: bolder;padding: 10px">My Account <i class="far fa-user-circle"></i></a>
								<?php
							}


							?>
							
							
						  <!--<button type="button" class="btn btn-primary"><i class="far fa-edit"></i> Edit Response</button>-->
						 
						 
						</div>
					  
					 <div style="margin-top: 150px;"></div> 
					 
		</div>
		<div class="col-sm-2">
				<!--  <div  style=" position:fixed; border: 2px solid #89a5d9;background-color:white;margin-top: 40px;padding: 40px;border-radius: 10px">
				  
				 	<h5 style="text-align: center;padding: 5px; border-bottom: 1px solid #bc8b1c;cursor: default;">OPTIONS</h5>
				 	<h6 style="color: grey;font-size: 12px;text-align: center;cursor: default;">ADD NEW</h6>
						 	 <a class="dropdown-item add" data-types='title' href="#"> <i class="fas fa-heading"></i> Title</a>
						 	
						      <button disabled=""    class="dropdown-item add quest " data-types='question' type="button" ><i class="far fa-question-circle"></i> Question</button>
						      <hr style="color: #bc8b1c;height: 2px;">
						      <h6 style="color: grey;font-size: 12px;text-align: center;cursor: default;">SORT</h6>
						       <button class="dropdown-item quest reorder"    disabled=""> <i class="fas fa-sort"></i> Re-Order </button>
						   
						    <hr style="color: #bc8b1c;height: 2px">
						    	<h6 style="color: grey;font-size: 12px;text-align: center;cursor: default;">Others</h6> 
						  		
						       <button onclick="window.location.href='../Manage_pds'" class="dropdown-item"    > <i class="fas fa-home"></i> Home </button>
						       
						    </div> -->
						  
		</div>
	</div>
	</div>
	<!-- Button trigger modal -->

 <script src="../../js/jquery.js"></script>
	
	<script>
	$(document).ready(function() {

	


		
			

	});
	</script>

</body>
</html>