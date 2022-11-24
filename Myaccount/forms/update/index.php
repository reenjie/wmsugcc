<?php 
session_start();
 include '../../../GCC/Classes/sql_query.php';
 include '../../../GCC/create_form/connect.php';

 if(!isset($_SESSION['form_token_id_for_update'])){

		             	?>
		             	 <link href="../../../GCC/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
		             	 <link href="../../../GCC/css/sb-admin-2.min.css" rel="stylesheet">
		             	 <title>GCC-404</title>
		             	   <div class="container-fluid">
		             	   	<p style="user-select: none"><br><br><br></p>

                    <!-- 404 Error Text -->
                    <div class="text-center">
                        <div class="error mx-auto" data-text="404">404</div>
                        <p class="lead text-gray-800 mb-5">Contents Not Found</p>
                        <p class="text-gray-500 mb-0"></p>
                       
                      
                    </div>

                </div>
		             	 
		             	 	 </form>
		             	<?php
 }else {
 	


						$csform = $_SESSION['form_token_id_for_update'];	
										$setcolor = " select * from `form_classification` where csform_id = '$csform'  ";
								                $setcolored = mysqli_query($con,$setcolor); // run query
								              
								                 while($getcolor = mysqli_fetch_array($setcolored)){
													$bodybg = $getcolor['bodybg'];
													$titlebg = $getcolor['titlebg'];
													$questionbg = $getcolor['questionbg'];
													$textcolortitle = $getcolor['textcolortitle'];
													$textcolorquestion = $getcolor['textcolorquestion'];
													$datasheet = $getcolor['form_name'];
								    }
    			?>


<!DOCTYPE html>
<html>

<head>
	 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortout icon" type="image/x-icon" href="wmsu.png">
    	  <script src="https://kit.fontawesome.com/129b086bc9.js" crossorigin="anonymous"></script>
  <script src="../../../offline/fontawesome.js" ></script>
    <link href="../../../offline/bootstrap.css" rel="stylesheet" >
    <script src="../../../js/jquery.js" ></script>
  <script src="../../../offline/popper.js" ></script>
  <script src="../../../offline/bootstrap.js" ></script>
	<link href="https://fonts.googleapis.com/css2?family=Gruppo&family=Londrina+Solid:wght@300&display=swap" rel="stylesheet">
<title>GCC-<?php echo $datasheet ?></title>
<link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
 <style type="text/css">
	 @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@300&display=swap');
		*{
			font-family: 'Cairo', sans-serif;
		}
	 </style>
<style type="text/css">
	
	.innerBar {
	 background: #617298;
   height: 2px;
   width: 0%;
   z-index: 1;
	}

	.applychanges {
		position: fixed;
		right: 20px;
		top: 30px;
		width: auto;
		font-size: 14px;
		padding: 5px;
		font-weight: bold;
		z-index: 1;



	}
	.applychanges .alert {
		padding: 8px;
	}
</style>
</head>
	
<body style="background-color: <?php echo $bodybg ?>;">
	 
	   <div class="innerBar"  style="position: fixed"></div>
	<br>

	<div class="container">
		
		 
	
		<?php 
		if(isset($_SESSION['modification_alert'])){

			?>
			<div id="alerto" style="position: fixed;top: 30px; left: -505px;width: 250px;z-index: 1">
		 	<div class="alert alert-warning" role="alert" data-dismiss="alert">
		 			<i class="fas fa-info-circle text-danger"></i><br>
					Please provide factual data that corresponds to what is being asked when modifying your Personal data form. <br>
					<span style="font-weight: bolder" class="text-danger"> Changes will be saved after modifying any form.</span>
					</div>
		 </div> 
			<script type="text/javascript">
		 	
		 	$(document).ready(function() {
		 			  $( "#alerto" ).animate({
						  "left": "5px" }, "slow"
						 );

		 			  var clear = setInterval(function(){
		 			  	$('#alerto').css('opacity','0.8');
		 			  	clearInterval(clear);
		 			  },5000);
		 	      	
		 	      });      
		       	
		 </script>
		 
			<?php

			
		}

	

		 ?>
			
		  <div class="applychanges d-none" id="applychanges">
		  	<div class="alert alert-success" role="alert">
			  Saving Inputs <i class="fas fa-circle-notch fa-pulse"></i>
			</div>
		  	
		  </div> 
		  



		
  
		
		<div id="titleform" style="font-weight: bolder; text-align: center; font-size:25px;cursor: default;"></div>

	<div class="row">
		<div class="col-md-2">
				 
		</div>

		<div class="col-md-8">
		
					<br>

					 
					 
					
					  	 <?php 
					 	

					 	 ?>
				
					 <form method="post" id="updating" action="saving.php" onsubmit="return false">
					    	                  
					 	<input type="hidden" name="update">
						<input type="hidden" name="" id="sett">
					  
					<?php 
						//	$sql = " select * from form where form_id = '$formids' and class_name ='$csform'   order by display_order  ";
						$csform = $_SESSION['form_token_id_for_update'];	
						$usertaker = $_SESSION['user_student_token_check'];
					if(isset($_SESSION['updatepds'])){
					
							

									$sql = "select * from form where class_name='62' and type in ('Question','file','list') and form_id not in (select formid from form_response where csformid ='62' and userid = '$usertaker')";
						                $result = mysqli_query($con,$sql); // run query
						               
						               	 $cont= mysqli_num_rows($result);

						               	 if($cont >=1){

						               	 	echo '
						               	 	<div class="card" style="border-top: 10px solid #7091b7">
					 	 <div class="card-body">
					 	 	<h5 style="font-weight: bold; ">GUIDANCE AND COUNSELING CENTER</h5>
					 	 	<h6 style="font-size:17px">Personal Data Sheets</h6>
					 	 	<h6 style="text-decoration: underline;">Newly added or Modified Queries</h6>
					 	 </div> 
					 	 
					 </div> 

						               	 	';


						         while($row = mysqli_fetch_array($result)){

										$formid = $row['form_id'];

									//	echo $formid;
									 	$dd = $row['type'];
									 	$isreq = $row['isrequired'];
									 	$status = $row['status'];
									 	$bgsrc = '../img/uploads/'.$row['bgimage'];
									 	$bgtcolor = $row['bgcolor'];
									 	$txttcolor = $row['txtcolor'];
									 	$yaxis = $row['yaxis'];
									 	$isvisible = $row['isvisible'];
									 	$secno = $row['sec_no'];
									 	$othersdata = $row['others'];
									 	$ismodifiable = $row['ismodifiable'];
									 	$section = $row['section'];
									 	$isspecified = $row['isspecified'];
									 		if($yaxis == ''){
										 		$posbg = 'center';
										 	}else {
										 		$posbg = $yaxis.'px';

										 	}


										 			$checkifanswered = " SELECT * FROM `temp_answers` where formid = '$formid' and userid='$usertaker' and tble = 0 and list = 0  ";
										 	                $ans = mysqli_query($con,$checkifanswered); // run query
										 	                $cans= mysqli_num_rows($ans); // to count if necessary
										 	               //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
										 	             if ($cans>=1){
										 	             	//while($row = mysqli_fetch_array($result)){} is where we output all the data in database
										 	                 while($res = mysqli_fetch_array($ans)){
										 						$rescontent =  $res['response'];	
										 						$frmid= $res['formid'];
										 						$tid = $res['tid'];
										 						include 'answered.php';
										 						$bool= true ;
										 					
										 	                 }
										 	              



										 	          }else {




										 	          	include 'selectsectionactive.php';

										 	          }


										 		
										 	         }

										 	    }else {

										 	    	
										 	    	
										 	    }
   			

					

								

										 	       }

										 	       


						            

						                    ?>

						                    <button type="submit" id="submitupdate" class="btn  py-2 px-4 text-light d-none" style="font-weight: bolder; background-color: #6c94b8;"> </button>

						                    </form>


						                    <?php 

										 	       	$sql = "select * from form where class_name='62' and type in ('Question','file','list') and form_id in (Select formid from updte_pages) ";
						                $result = mysqli_query($con,$sql); // run query
						               
						               	 $cont= mysqli_num_rows($result);

						               	 if($cont >=1){
						               	 	 	echo '
										 		 <div class="card mb-2" style="border-top: 10px solid #7091b7">
					 	 <div class="card-body">
					 	 	<h5 style="font-weight: bold; ">Other UPDATES.</h5>
					 	 	<h6 style="">Modified Queries or Options etc. Check and make changes if possible.</h6>
					 	 </div> 
					 	 
					 </div> 
					 

										 	';


						         while($row = mysqli_fetch_array($result)){

										$formid = $row['form_id'];
										


									//	echo $formid;
									 	$dd = $row['type'];
									 	$isreq = $row['isrequired'];
									 	$status = $row['status'];
									 	$bgsrc = '../img/uploads/'.$row['bgimage'];
									 	$bgtcolor = $row['bgcolor'];
									 	$txttcolor = $row['txtcolor'];
									 	$yaxis = $row['yaxis'];
									 	$isvisible = $row['isvisible'];
									 	$secno = $row['sec_no'];
									 	$othersdata = $row['others'];
									 	$ismodifiable = $row['ismodifiable'];
									 	$section = $row['section'];
									 	$isspecified = $row['isspecified'];
									 		if($yaxis == ''){
										 		$posbg = 'center';
										 	}else {
										 		$posbg = $yaxis.'px';

										 	}




										 	   
												$checkifanswered = " SELECT * FROM `updte_pages` where formid in (select formid from form_response where formid = '$formid' and userid='$usertaker'  )  ";
										 	                $ans = mysqli_query($con,$checkifanswered); // run query
										 	                $cans= mysqli_num_rows($ans); // to count if necessary
										 	               //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
										 	             if ($cans>=1){
										 	             	//while($row = mysqli_fetch_array($result)){} is where we output all the data in database
										 	                 while($res = mysqli_fetch_array($ans)){
										 						$rescontent =  $res['response'];	
										 						$frmid= $res['formid'];
										 						$tid = $res['pds_id'];

										 					
										 						include 'answered_others.php';
										 						$bool= true ;
										 	                 }
										 	              


										 	          }else {


										 	          	$none=1;
										 	          }
									 

									  

									}
								}

								if(isset($none)){
									?>
									<div class="card mt-2 mb-2">
											<div class="card-body">
												<h6 style="text-align:center">**Nothing Follows**</h6>
											</div>
									</div>
									<?php
								}



						                     ?>

						                      <button type="button" id="updatec" class="btn  py-2 px-4 text-light" style="font-weight: bolder; background-color: #6c94b8;"> UPDATE </button>
						                   

						                     	

						  <div class="progress  mt-1" style="height: 4px">
                  <div class="progress-bar bg-info progress-bar-striped " id="pageprogress" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                    <span class="sr-only"></span>
                  </div>
                </div>
						                     	 	
						                     	 	 
						                     	 </div> 
						                     	 
						                     	
						                     </div> 
						                    <script src="../../../sweetalert.js"></script>
						                    <script type="text/javascript">
						                    	
						                    	$(document).ready(function() {
						                    	      		$('#updatec').click(function(){

						                    	      			$('#submitupdate').click();
						                    	      				  		
						                    	      		})
						                    	      	

						                    	      	$('#updating').on('submit', function(event){
						                    	      	   event.preventDefault();

						                    	      	   			 $.ajax({
						                    	      		                 url : $(this).attr('action'),
						                    	      		                  method: "POST",
						                    	      		                   data  : $(this).serialize(),
						                    	      		                   success : function(data){
						                    	      		      				$('#loadscreen').click();


						                    	      		      				setInterval(function(){
						                    	      		      					window.location.href="../../";
						                    	      		      				},3000);
						                    	      		                   }
						                    	      		                })
						                    	      	   });

						                    	      		 
						                    	     

						                    	      	
						                    	      });      
						                          	
						                    </script>

						                    <?php
									
								
						               

							
									

										
						          



					 ?>
					 <div style="margin-top: 150px;"></div> 
					 
		</div>
		<div class="col-md-2">
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
		 <div class="fixed-top d-none" id="error">
		 	<div data-dismiss="alert" class="alert alert-danger alert-dismissible fade show" id="shrink" style="width: auto;float: right;margin-top: 20px;margin-right: 30px; cursor: pointer;" role="alert">

					 Please fill all required fields!
					</div>
					
		 </div> 

		 <div class="fixed-top">
		 		

	
		 </div>
		
<!-- Button trigger modal -->
<button type="button" class="d-none" id="loadscreen" data-toggle="modal" data-target="#updatingloadingscreen" data-backdrop="static" data-keyboard="false">
  
</button>

<!-- Modal -->
<div class="modal fade" id="updatingloadingscreen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
     
      <div class="modal-body" style="text-align: center;">
       	<h6 style="font-weight: bolder;">UPDATING</h6>
       	<div class="spinner-grow" role="status">
  <span class="visually-hidden">Loading...</span>
</div>
	<div class="spinner-grow" role="status">
  <span class="visually-hidden">Loading...</span>
</div>
	<div class="spinner-grow" role="status">
  <span class="visually-hidden">Loading...</span>
</div>


       
      </div>
     
    </div>
  </div>
</div>
	
	<script src="../../../js/jquery.js"></script>
	
	<script>
	$(document).ready(function() {




   


		$('.innerBar').animate({ width: "100%" }, 1000);
		titleform();
		function titleform() {
			$.ajax({
			           url : "opt_pro.php",
			            method: "POST",
			             data  : {titleform:1},
			             success : function(data){
							
						$('#titleform').html(data);	
			             }
			          })

		}
	

		content();
		function content() {
			
			  $.ajax({
			           url : "action.php",
			            method: "POST",
			             data  : {content:1},
			             success : function(data){
							$('#content').html(data);
							checktitle();	
							deleteunexpected ();
			             }
			          })
		}
	
	

			

	});
	</script>

</body>
</html>
								              			<?php
			
 }
					              	
			  

 ?>
