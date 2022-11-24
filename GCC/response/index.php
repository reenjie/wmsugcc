<?php 
session_start();
 include '../Classes/sql_query.php';
 	include '../create_form/connect.php';
 	
 if(isset($_GET['token_id'])) {
 		$form_name = $_GET['form_name'];
		$token_id = $_GET['token_id'];
		
//#63a284

 }


	if(!isset($_SESSION['Live_form_id'])){
		?>
		<script type="text/javascript">
			
			window.location.href="404.html";      
		      	
		</script>
		<?php
 			}	
 			 $usertaker = $_SESSION['user_student_token_check'];
 $csformid = $_SESSION['Live_form_id'];

 			if(isset($_SESSION['unknown_user'])){

     			
 $checkwhomayanswer = "SELECT * FROM `form_response` where custom_user = '$usertaker' and csformid = '$csformid' and freed = 0 ";

                 $checkinguser = mysqli_query($con,$checkwhomayanswer); 
                 $countiftrue= mysqli_num_rows($checkinguser);

     		 }else {
     		 	
 $checkwhomayanswer = "SELECT * FROM `form_response` where userid = '$usertaker' and csformid = '$csformid' and freed = 0 ";

                 $checkinguser = mysqli_query($con,$checkwhomayanswer); 
                 $countiftrue= mysqli_num_rows($checkinguser);
     		 }
 								  


               
              if ($countiftrue>=1){
              		

              			include 'alreadytaken.php';
              
              	
          		 }else {

          		 	
$formtoken =  $_SESSION['formtoken'];



	


									$check = " select * from `form_classification` where csform_id ='$formtoken' ";
								                $setifr = mysqli_query($con,$check); // run query
								                 while($rowo = mysqli_fetch_array($setifr)){
								              			$stat = $rowo['status'];
								              		      }
								              		if($stat == 0){
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
<title><?php echo $_SESSION['formnamesession'] ?></title>
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
		top: 50px;
		width: auto;
		font-size: 14px;
		padding: 5px;
		font-weight: bold;
		z-index: 1;



	}
	.applychanges .alert {
		padding: 8px;
	}
	#btnback{
		font-size:13px;	position: fixed; left:10px; top: 10px;
	}
	@media screen and (max-width: 768px){
		#btnback{
			position: fixed; left: unset; top: 10px; right: 20px;
			z-index: 9999;
		}
	}
</style>

</head>

	<?php

	
				
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

	<div class="container" id="fluid">
		
	
 	
	

 <div class="applychanges d-none" id="applychanges">
		  	<div class="alert alert-success" role="alert">
			  Saving your inputs <i class="fas fa-circle-notch fa-pulse"></i>
			</div>
		  	
		  </div> 


		 
  
		
		<div id="titleform" style="font-weight: bolder; text-align: center; font-size:25px;cursor: default;"></div>

	<div class="row" >
		<div class="col-sm-2 re">
				 
		</div>
		<div class="col-sm-8" id="response_form" >
	
		
				<?php 
				if(isset($_SESSION['ask_for_credentials'])){

						?>

						<!-- Button trigger modal -->
						<button type="button" class="btn btn-primary d-none" id="modalopen" data-toggle="modal" data-target="#askingcredentials" data-backdrop="static" data-keyboard="false">
						
						</button>
						<script type="text/javascript">
							
							//ask for user data      
						      	$(document).ready(function() {
						      	$('#modalopen').click();
						      	});				
						</script>
						<!-- Modal -->
						<div class="modal fade" id="askingcredentials" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						  <div class="modal-dialog  " role="document">
						    <div class="modal-content">
						    
						      <div class="modal-body">
						       	
						       	 <div class="container" >
						       	 
						       	 	    	                  
						       	 	
						       	 	
						       	 	<h6 style="font-weight: bolder;">Personal Data</h6>
						       	 	<hr>

						       	 	<span style="font-size: 14px">Email:  <span class="text-danger">*</span></span>
						       	 	<input type="text" name="" style="font-size: 14px" id="em" class="form-control   mb-2">
						       	 	  <div class="invalid-feedback mb-1" style="font-size: 12px">Please provide a valid Email.</div>

						       	 	<span style="font-size: 14px">Family Name: <span class="text-danger">*</span></span>
						       	 	<input type="text" name="" style="font-size: 14px" id="fn" class="form-control mb-2">
						       	 	<div class="invalid-feedback mb-1" style="font-size: 12px">Please Enter your Family Name</div>

						       	 	<span style="font-size: 14px">Given Name: <span class="text-danger">*</span></span>
						       	 	<input type="text" name="" style="font-size: 14px" id="gn" class="form-control mb-2">
						       	 	<div class="invalid-feedback mb-1" style="font-size: 12px">Please Enter your Given Name</div>

						       	 	<span style="font-size: 14px">Middle Name :</span>
						       	 	<input type="text" name="" style="font-size: 14px" id="mn" class="form-control mb-2">
						       	 	<div class="invalid-feedback mb-1" style="font-size: 12px"></div>

						       	 	<span style="font-size: 14px">Gender:</span>
						       	 	<select class="form-select mb-5"  style="font-size: 14px" id="gnder">
						       	 		<option value="Male">Male</option>
						       	 		<option value="Female">Female</option>
						       	 	</select>
						       	 	<hr>
						       	 	<button type="button" id="proceed" class="btn btn-light text-success" style="font-size: 15px; float: right;">PROCEED</button>



						       	 	

						       	 <button type="button" class="btn btn-secondary d-none" id="dismissmodal" style="font-size:12px" data-dismiss="modal">Close</button> 
						       	 </div> 
						       	 
						
						
						       
						      </div>
						   
						    </div>
						  </div>
						</div>

						<script type="text/javascript">
							
							$(document).ready(function() {
								//is-invalid
								//invalid-feedback
							      		$('#proceed').click(function() { 
							      			var em = $('#em').val();
							      			var fn = $('#fn').val();
							      			var gn = $('#gn').val();
							      			var mn = $('#mn').val();
							      			var gender = $('#gnder').val();

							      			if(em == '' && fn == '' && gn == ''){
							      				$('#em').addClass('is-invalid');
							      				$('#fn').addClass('is-invalid');
							      				$('#gn').addClass('is-invalid');
							      			}else if (em == '' ){
							      				$('#em').addClass('is-invalid');
							      			}else if (fn == ''){
							      				$('#fn').addClass('is-invalid');
							      			}else if (gn == ''){
							      				$('#gn').addClass('is-invalid');
							      			}
							      				else{
							      				$('#em').removeClass('is-invalid');			
							      				$('#fn').removeClass('is-invalid');
							      				$('#gn').removeClass('is-invalid');
							      				$('#em').addClass('is-valid');
							      				$('#fn').addClass('is-valid');
							      				$('#gn').addClass('is-valid');

							      				$.ajax({
							      				           url : "savetempuser.php",
							      				            method: "POST",
							      				             data  : {checkifexist:1},
							      				             success : function(data){
							      								if(data.match('in')){
							      									
							      									$('#dismissmodal').click();
							      								

							      								}else {
							      									$.ajax({
							      				           url : "savetempuser.php",
							      				            method: "POST",
							      				             data  : {savetemp:1,em:em,fn:fn,gn:gn,mn:mn,gender:gender},
							      				             success : function(data){
							      									$('#dismissmodal').click();
							      				             }
							      				          })
							      								}
							      				             }
							      				          })
							      				

							      			}
							      				

							      			
							      				      
							      				    

							      			

							      		})
							      });      
						      	
						</script>
						<?php


					}
					

				 ?>
				
					 <form method="post" id="justvalidation" action="saving.php" onsubmit="return false" >
					    	                  
					 	<input type="hidden" name="savetotemp">
						<input type="hidden" name="" id="sett">
					  
					<?php 

					ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
				
					if(isset($_SESSION['sectionformactivated'])) {
						$csform = $_SESSION['Live_form_id'];

							if($csform == '62'){
								?>
										<a href="../../Myaccount/" class="btn btn-light text-primary" id="btnback" style="">MyAccount</a>
								<?php
							}
					

								if(isset($_GET['section'])){
								
									$id = $_GET['sectionid'];
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

						                

						                 $sf = "select * from form where type = 'section' and class_name='$csform' and sec_no > '$id' limit 1 ";
						                 $rsf = mysqli_query($con,$sf);

						                 $countnumb= mysqli_num_rows($rsf);
						                 if($countnumb == 0){
						                 	?>
						                 	<script type="text/javascript">
						                 		
						                 		$(document).ready(function() {
						                 		      	$('#sett').val('lastpage');
						                 		      });      
						                 	      	
						                 	</script>
						                 	

						                 	 <button type="button" class="btn btn-secondary  px-5" style="padding: 10px" onclick="history.back()">Back</button>
						                 	<button type="submit"  id="submitform" class="btn btn-primary ml-2  px-5 submit" style="margin-left: 10px;background-color: #4e73df;padding: 10px">Submit</button>
						                 	<?php

						                 }else {


										 while($rowsf = mysqli_fetch_array($rsf)){
						                 	$nextid= $rowsf['sec_no'];

						                 if ($id ==1 ){
						                 		
						                 	}else if ($id >= 2){
						                 		$temp = $nextid-2;

						                 		?>
						                

						                  <button id="back" type="button" class="btn btn-secondary  px-5" style="background-color: #858796;padding: 10px" data-nid = "<?php echo $temp ?>">Back </button>
						                 		<?php
						                 	}

						                 	if($bool == true){
						                 		 ?>
						                 	
						                

						                     <button  type="submit" class="btn btn-primary   px-5" style="font-weight: bold;margin-left: 10px;background-color: #4e73df;padding: 10px" data-nid="<?php echo $nextid ?>" data-checkid="<?php echo $section  ?>">Next</button>
						                 <?php

						                 	}else {
						                 			 ?>
						                 	
						              

						                    <button  type="button" class="btn btn-primary nextto px-5  " style="font-weight: bold;margin-left: 10px;background-color: #4e73df;padding: 10px" data-nid = "<?php echo $nextid ?>" data-checkid="<?php echo $section  ?>">Next  </button>
						                 <?php
						                 	}

						                 	 

						                    }

						                     }
						                           
						                    ?>

						                    </form>
						                    <style type="text/css">
						                    	#pagi {
						                    		position: fixed; top: 50px; left: 10px;text-align: center;
						                    	}
						                    	#pagi #pg {
						                    		padding: 2px;display: inline-flex;
						                    	}
						                    	@media screen and (max-width: 768px) {
						                    		#pagi {
						                    		position: fixed; top: 10px; left: 0px;text-align: center;
						                    	}

						                    		#pagi #pg {
						                    		padding: 2px;display: inline-block;
						                    	}
						                    	}
						                    </style>
						                    <!--left 10px ; top : 50px-->
						                    <div class="" style="" id="pagi">
						                     	 <div class=" card " id="pg" style="">

						                     	 	
						                     	 	 	<?php 
						                     	   $progresscount = " select * from form where type = 'section' and class_name ='$csform'  ";
						                                     $reprogress = mysqli_query($con,$progresscount); 
																$kunta= mysqli_num_rows($reprogress);
						                                                  
						                                  
						                                      while($row = mysqli_fetch_array($reprogress)){
						                     				$curid = $row['sec_no'];

						                     				if($curid == $id){
						                     					$prog_ind[] = $curid;
						                     						?>
						                     				<button class="btn btn-primary pagjump" data-sec="<?php echo $curid ?>" style="font-size: 13px;border-radius: 50px"><?php  echo $row['sec_no']; ?></button>
						                     				<?php

						                     				}else if($curid < $id) {
						                     					$prog_count[] = $curid;
						                     					?>
						                     				<button class="btn btn-primary pagjump" data-sec="<?php echo $curid ?>" style="font-size: 13px;border-radius: 50px"><?php  echo $row['sec_no']; ?></button>
						                     				<?php
						                     				}

						                     				else {
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
						                    <script src="../../offline/sweetalert.js"></script>



						                    <script type="text/javascript">
						                    	
						                    	$(document).ready(function() {

						                    			$('.pagjump').click(function() { 
						                    			var section = $(this).data('sec');
						                    			
						                    			//window.location.href="../response?section&sectionid="+section;
						                    		
						                    		})
						                    	      		/*$('#next').click(function() { 
						                    	      			var nid = $(this).data('nid');
						                    	      			var chid = $(this).data('checkid');
						                    	      		//	window.location.href="../response?section&sectionid="+nid;

						                    	      		
						                    	      		})*/
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

																	  	$('#btnopenload').click();

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
			     			    								$('#btnopenload').click();
			     			    								<?php $fakeencryption = md5("This is a fake encryption to disallow user to manipulate the url above."); ?>
			     			    									window.location.href="../response?section&sectionid="+nid+"&URLid=<?php echo $fakeencryption ?>";
			     			    								
     			    					
						                    	      				           
     			    											}   
						                    	      				      

						                    	      			

						                    	      			
						                    	      		   }); 
						                    	      		 
						                    	      	$('.nextto').click(function() { 
						                    	      		var nid = $(this).data('nid');

						                    	      		<?php $fakeencryption = md5("This is a fake encryption to disallow user to manipulate the url above."); ?>
						                    	      		
						                    	      			window.location.href="../response?section&sectionid="+nid+"&URLid=<?php echo $fakeencryption ?>";
						                    	      		
						                    	      		})

						                    	      		$('#back').click(function() { 
						                    	      		var nid = $(this).data('nid');
						                    	      		<?php $fakeencryption = md5("This is a fake encryption to disallow user to manipulate the url above."); ?>
						                    	      		
						                    	      			window.location.href="../response?section&sectionid="+nid+"&URLid=<?php echo $fakeencryption ?>";
						                    	      		
						                    	      		})

						                    	      		$('.submit').click(function() { 
						                    	      				

						                    	      			/*  */
						                    	      			    
						                    	      			   

						                    	      		})

						                    	      		$('.sub').click(function() { 
						                    	      			
						                    	      		})
						                    	      });      
						                          	
						                    </script>

						                    <?php
									
								
						               

								}else {

									$fakeencryption = md5("This is a fake encryption to disallow user to manipulate the url above.");
									
									?>
									<script type="text/javascript">
										
										window.location.href="../response?section&sectionid=1&URLid=<?php echo $fakeencryption?>";      
									      	
									</script>
									<?php
									


								}
									

										
						          



				}else {
					?>
					
					<div id="content"></div> 
					<?php
				}
					 ?>

					 	<span id="sampleout"></span>

					 <div style="margin-top: 150px;"></div> 
					 
		</div>
		<div class="col-sm-2 re">
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

		
		 
	<!-- Button trigger modal -->

 <script src="../../js/jquery.js"></script>
	
	<script>
	$(document).ready(function() {

		if (window.matchMedia('(max-width: 768px)').matches)
{
/*
   			$('#response_form').removeClass('col-sm-8').addClass('col-sm-12');	
   			$('.re').remove();
   			$('#fluid').removeClass('container');
   				*/
}
	
   


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
						//	checktitle();	
						//	deleteunexpected ();
			             }
			          })
		}
	
	

			

	});
	</script>

	<!-- Button trigger modal -->
<button type="button" class="btn btn-primary d-none" id="btnopenload" data-toggle="modal" data-target="#loading" data-backdrop="static" data-keyboard="false">
 
</button>


 <!-- Modal -->
 <div class="modal fade" id="loading" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
     <div class="modal-content" style="background-color:transparent; border:none">
      
       <div class="modal-body" style="border:none">
        
 			<h6 style="text-align: center; color:white ;"><div style="font-size:20px" class="spinner-grow " role="status">
  <span class="visually-hidden"></span>
</div><div class="spinner-grow " role="status">
  <span class="visually-hidden"></span>
</div><div class="spinner-grow " role="status">
  <span class="visually-hidden"></span>
</div></h6>
 
        
       </div>
     
     </div>
   </div>
 </div>

</body>
</html>
								              			<?php 
								              		}

								              		else {


								              			
								              			?>
								              			 <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
									    <link
									        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
									        rel="stylesheet">
									        <title>GCC-<?php echo $_SESSION['formnamesession'] ?></title>
    <!-- Custom styles for this template-->
    				<link href="../css/sb-admin-2.min.css" rel="stylesheet">
    				<body style="">
								              			<p style="user-select: none"><br><br><br><br></p>
								             <div class="container-fluid">

						                    <!-- 404 Error Text -->
						                    <div class="text-center" style="user-select: none">
						                        <div class="error mx-auto" data-text="404">404</div>
						                        <p class="lead text-gray-800 mb-5">Content's Not Found</p>
						                        <p class="text-gray-800 mb-0">
						                        		The administrator may make changes to the content. or Admin's work hasn't been saved


						                        </p>
						                      
						                    </div>

						                </div>

						                </body>
								              			<?php
								              		}
								          
								              		               
								              		                
								      
          		
          		 }	
        		          

	
									  

 ?>
