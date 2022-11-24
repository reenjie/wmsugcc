<?php 
session_start();
 include '../../../GCC/Classes/sql_query.php';
 include '../../../GCC/create_form/connect.php';
 unset($_SESSION['selectsuggestion']);

 if(!isset($_SESSION['form_token_id_for_modify'])){

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
 	
 

						$csform = $_SESSION['form_token_id_for_modify'];	
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
		 			<?php 
		 			if(isset($_SESSION['Modify_shiftingform'])){
		 				echo 'Please Update and provide factual data that corresponds to what is being asked to your shifting profile';
		 			}else {
		 				echo '	Please provide factual data that corresponds to what is being asked when modifying your Personal data form.';	
		 			}

		 			 ?>
		 			
				 <br>
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
			  Saving changes <i class="fas fa-spinner fa-pulse"></i>
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
				
					 <form method="post" id="justvalidation" action="saving.php" onsubmit="return false">
					    	                  
					 	<input type="hidden" name="savetotemp">
						<input type="hidden" name="" id="sett">
					  
					<?php 

				/*	if(isset($_SESSION['upt_available'])){
								
									$get_updatedpages = "SELECT * FROM `updte_pages`  ";
									 $gettingupdatedpages = mysqli_query($con,$get_updatedpages); 
								
								 while($grow = mysqli_fetch_array($gettingupdatedpages)){
													$fidupt = $grow['formid'];	
												
													?>
													<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
													<script type="text/javascript">
														  $(document).ready(function() {
														  	$('.dtupt<?php echo $fidupt ?>').html('<span class="text-danger"><i class="fas fa-exclamation-circle"></i>');
															 
														  });
													</script>
													<?php
									 }
								
								 
						}*/
					
				
					if(isset($_SESSION['sectionformactivated'])) {
						$csform = $_SESSION['form_token_id_for_modify'];
						$usertaker = $_SESSION['user_student_token_check'];

				

								if(isset($_GET['section'])){
									unset($_SESSION['modification_alert']);			
									$id = $_GET['sectionid'];

									$courseid = $_GET['courseid'];
									$theshid = $_GET['theshid'];
									$bool= false ;

									$sql = " select * from form where sec_no = '$id' and class_name ='$csform'   order by display_order  ";
						                $result = mysqli_query($con,$sql); // run query
						               
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


										 			$checkifanswered = " SELECT * FROM `form_response` where formid = '$formid' and userid='$usertaker' and tble = 0 and list = 0  ";
										 	                $ans = mysqli_query($con,$checkifanswered); // run query
										 	                $cans= mysqli_num_rows($ans); // to count if necessary
										 	               //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
										 	             if ($cans>=1){
										 	             	//while($row = mysqli_fetch_array($result)){} is where we output all the data in database
										 	                 while($res = mysqli_fetch_array($ans)){
										 						$rescontent =  $res['response'];	
										 						$frmid= $res['formid'];
										 						$tid = $res['pds_id'];
										 						include 'answered.php';
										 						$bool= true ;
										 	                 }
										 	              


										 	          }else {


										 	          	

										 	          	include 'selectsectionactive.php';

										 	          }


										 		




						                 }

						                

						                 $sf = "select * from form where type = 'section' and class_name='$csform' and sec_no > '$id' limit 1 ";
						                 $rsf = mysqli_query($con,$sf);

						                 $countnumb= mysqli_num_rows($rsf);
						                 if($countnumb == 0){
						                 	//onclick="window.location.href='../../'"
						                 	?>
						                 	   <button type="button" class="btn btn-secondary  px-4" style="padding: 10px" onclick="history.back()">Back</button>
						                 
						                 	   <?php 
						                 	   if(isset($_SESSION['Modify_shiftingform'])){

						                 	   	?>
						                 	   	  	<button type="button"  class="btn btn-primary ml-2  px-4 resubmit" data-courseid="<?php echo $courseid ?>" data-theshid="<?php echo $theshid ?>"   style="margin-left: 10px;padding: 10px;background-color: #4e73df">Resubmit</button>
						                 	   	<?php

						                 	   }else {
						                 	   	?>
						                 	   	<button   class="btn btn-primary ml-2  px-4 exitpage"   style="margin-left: 10px;background-color: #4e73df;padding: 10px">Exit Page</button>
						                 	   	<?php
						                 	   }

						                 	    ?>
						                 		
						                 	<?php
						                 }else {


										 while($rowsf = mysqli_fetch_array($rsf)){
						                 	$nextid= $rowsf['sec_no'];

						                   if ($id ==1 ){
						                 		
						                 	}else if ($id >= 2){
						                 		$temp = $nextid-2;

						                 		?>
						               
						                  <button id="back" type="button" class="btn btn-secondary  px-4" style="background-color: #858796;padding: 10px" data-nid = "<?php echo $temp ?>">Back </button>
						                 		<?php
						                 	}

						                 	if($bool == true){
						                 		 ?>
						                 	
						             

						                       <button  type="submit" class="btn btn-primary   px-4" style="font-weight: bold;margin-left: 10px;background-color: #4e73df;padding: 10px" data-nid="<?php echo $nextid ?>" data-checkid="<?php echo $section  ?>">Next </button>

						                   <?php 
						                 	   if(isset($_SESSION['Modify_shiftingform'])){
						                 	   	 	?>
						                 	   	  	<button type="button"  class="btn btn-primary ml-2  px-4 resubmit" data-courseid="<?php echo $courseid ?>" data-theshid="<?php echo $theshid ?>"   style="margin-left: 10px;padding: 10px;background-color: #4e73df">Resubmit</button>
						                 	   	<?php
						                 	   }else {
						                 	   	?>
						                 	   	<button   class="btn btn-primary ml-2  px-4 exitpage"   style="margin-left: 10px;background-color: #4e73df;padding: 10px">Exit Page</button>
						                 	   	<?php
						                 	   }

						                 	    ?>
						                 <?php
						                 	}else {
						                 			 ?>
						                 	
						                <button  type="button" class="btn btn-primary nextto  px-4" style="font-weight: bold;margin-left: 10px;background-color: #4e73df;padding: 10px" data-nid="<?php echo $nextid ?>" data-checkid="<?php echo $section  ?>">Next</button>

						                 <?php 
						                 	   if(isset($_SESSION['Modify_shiftingform'])){
						                 	   	 	?>
						                 	   	  		<button type="button"   class="btn btn-primary ml-2  px-4 resubmit" data-courseid="<?php echo $courseid ?>" data-theshid="<?php echo $theshid ?>"   style="margin-left: 10px;padding: 10px;background-color: #4e73df">Resubmit</button>
						                 	   	<?php
						                 	   }else {
						                 	   	?>
						                 	   	<button   class="btn btn-primary ml-2  px-4 exitpage"   style="margin-left: 10px;background-color: #4e73df;padding: 10px">Exit Page</button>
						                 	   	<?php
						                 	   }

						                 	    ?>
						                 <?php
						                 	}
						                 	 

						                    }

						                     }
						                           
						                    ?>

						                    </form>

						                          <div class="" style="position: fixed; top: 60px; left: 10px;text-align: center;">
						                     	 <div class=" card " style="padding: 2px;display: inline-flex">


						                     	 	
						                     	 	 	<?php 
						                     	   $progresscount = " select * from form where type = 'section' and class_name ='$csform'  ";
						                                     $reprogress = mysqli_query($con,$progresscount); 
																$kunta= mysqli_num_rows($reprogress);
						                                                  
						                                  
						                                      while($row = mysqli_fetch_array($reprogress)){
						                     				$curid = $row['sec_no'];

						                     				if($curid == $id){
						                     					$prog_ind[] = $curid;
						                     						?>
						                     				<button class="btn btn-info pagjump" data-sec="<?php echo $curid ?>" style="font-size: 13px;border-radius: 50px"><?php  echo $row['sec_no']; ?></button>
						                     				<?php

						                     				}else if($curid < $id) {
						                     					$prog_count[] = $curid;
						                     					?>
						                     				<button class="btn btn-info pagjump" data-sec="<?php echo $curid ?>" style="font-size: 13px;border-radius: 50px"><?php  echo $row['sec_no']; ?></button>
						                     				<?php
						                     				}else {
						                     				?>
						                     				<button class="btn btn-light pagjump" data-sec="<?php echo $curid ?>" style="font-size: 13px;border-radius: 50px"><?php  echo $row['sec_no']; ?></button>
						                     				<?php	
						                     				}


						                     			
						                                      }
				  function cal_percentage($num_amount, $num_total) {
                      $count1 = $num_amount / $num_total;
                      $count2 = $count1 * 100;
                      $count = number_format($count2, 0);
                      return $count;
                    }

                    if(isset($prog_ind)){
                    	$start = cal_percentage(count($prog_ind), $kunta);

                    		 ?>
                    <script type="text/javascript">
                    	
                    	$(document).ready(function() {
                    	     $('#pageprogress').attr('style','width:<?php  echo $start.'%' ?>') ;	
                    	      });      
                          	
                    </script>

                    <?php
                   

                    if(isset($prog_count)){
                    	$cprog =cal_percentage(count($prog_count), $kunta);
                    	
                    	$fprog =  $cprog+$start;
                    
                    	 ?>
                    <script type="text/javascript">
                    	
                    	$(document).ready(function() {
                    	     $('#pageprogress').attr('style','width:<?php  echo $fprog.'%' ?>') ;	
                    	      });      
                          	
                    </script>

                    <?php

                    }

                     }
                   

						                     	 ?>

						  <div class="progress  mt-1" style="height: 4px">
                  <div class="progress-bar bg-info progress-bar-striped " id="pageprogress" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                    <span class="sr-only"></span>
                  </div>
                </div>
						                     	 	
						                     	 	 
						                     	 </div> 
						                     	 
						                     	
						                     </div> 
						                    <script src="../../../offline/sweetalert.js"></script>
						                    <script type="text/javascript">
						                    	
						                    	$(document).ready(function() {

						                    		$('.resubmit').click(function(){
						                    			var courseid = $(this).data('courseid');
						                    			var theshid = $(this).data('theshid');

						                    				 Swal.fire({
																	  title: 'Submit Form?',
																	  text: "Please make sure that all of the information you've entered into the form is accurate and complete.",
																	  icon: 'question',
																	  showCancelButton: true,
																	  confirmButtonColor: '#5bb588',
																	  cancelButtonColor: '#829fd0',
																	  confirmButtonText: 'Yes,It is accurate and complete. Submit!'
																	}).then((result) => {
																	  if (result.isConfirmed) {
																	  	$.ajax({
														 					 url : "../../action.php",
														 					  method: "POST",
														 					 data  : {reselect:courseid,shid:theshid},
														 					  success : function(data){
														 						//	


														 						Swal.fire(
																				  'Form Resumitted Successfully!',
																				  'Your shifting profile has been submitted Successfully!',
																				  'success'
																				).then((result) => {
																	  if (result.isConfirmed) {
																	  	window.location.href="../../index.php";
																	  	
																	  }
																	})
														 					   }
														 					 })
																	
																	
																	  }
																	})
						                    		/*	

														 					 */
						                    				  		
						                    		})
						                    	      	

						                    	      		$('#justvalidation').on('submit', function(event){
						                    	      		 	var nid = <?php echo $id+1 ?>;
						                    	      			var chid = $('#next').data('checkid');
						                    	      			var lastpage = $('#sett').val();
						                    	      				
						                    	      			
						                    	      			
						                    	      				 
     																
     			      			  	      				  
						                    	      					if(lastpage == 'lastpage'){
						                    	      						
			     			    					 Swal.fire({
																	  title: 'Submit Form?',
																	  text: "Please make sure that all of the information you've entered into the form is accurate and complete.",
																	  icon: 'question',
																	  showCancelButton: true,
																	  confirmButtonColor: '#5bb588',
																	  cancelButtonColor: '#829fd0',
																	  confirmButtonText: 'Yes,It is accurate and complete. Submit!'
																	}).then((result) => {
																	  if (result.isConfirmed) {

																	  	 $.ajax({
						                    	      			           url : "accept.php",
						                    	      			            method: "POST",
						                    	      			             data  : {trigger:1},
						                    	      			             success : function(data){
						                    	      							  window.location.href="response_successfully.php";


						                    	      			             }
						                    	      			          })
																	
																	  }
																	})
									                    	      	 
			     			    							}else {
			     			    									window.location.href="?section&sectionid="+nid;
			     			    								
     			    					
						                    	      				           
     			    											}   
						                    	      				      

						                    	      			

						                    	      			
						                    	      		   }); 
						                    	      
						                    	      		 
						                    	     

						                    	      		$('.pagjump').click(function() { 
						                    			var section = $(this).data('sec');
						                    			
						                    			window.location.href="?section&sectionid="+section;
						                    		
						                    		})
						                    	      		 
						                    	      	$('.nextto').click(function() { 
						                    	      		var nid = $(this).data('nid');
						                    	      		
						                    	      			window.location.href="?section&sectionid="+nid;
						                    	      		
						                    	      		})

						                    	      		$('#back').click(function() { 
						                    	      		var nid = $(this).data('nid');
						                    	      		
						                    	      			window.location.href="?section&sectionid="+nid;
						                    	      		
						                    	      		})

						                    	      		$('.exitpage').click(function() { 
						                    	      					
						                    	      					 
						                    	      					
						                    	      					   $.ajax({
						                    	      					           url : "saving.php",
						                    	      					            method: "POST",
						                    	      					             data  : {notifygc:1},
						                    	      					             success : function(data){
						                    	      						
						                    	      					             }
						                    	      					          })
						                    	      					   
						                    	      					    
						                    	      					   	window.location.href="../../index.php";

						                    	      		})

						                    	      	
						                    	      });      
						                          	
						                    </script>

						                    <?php
									
								
						               

								}else {
									
									?>
									<script type="text/javascript">
										
										window.location.href="?section&sectionid=1";      
									      	
									</script>
									<?php
									


								}
									

										
						          



				}else {
					?>

					<div id="content"></div> 
					<?php
				}
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
