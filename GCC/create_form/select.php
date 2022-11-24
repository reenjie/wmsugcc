<?php
?>	
 <script type="text/javascript">
	 	
	 	$(document).ready(function() {
	 	      	$('#section<?php  echo $section ?>').removeClass('text-primary');
	 	      	 	$('#section<?php  echo $section ?>').addClass('text-light');
	 	      	 	 	$('#section<?php  echo $section ?>').addClass('bg-primary');

	 	      	 	 	$('.autoscroll').removeClass('active');
	 	      	 	 	$('#scrollspy<?php echo $section ?>').addClass('active');
	 	      });      
	       	
	 </script>
							
							<p></p>

							<?php
										$setcolor = " select * from `form_classification` where csform_id = '$csform'  ";
								                $setcolored = mysqli_query($con,$setcolor); // run query
								              
								                 while($getcolor = mysqli_fetch_array($setcolored)){
													$bodybg = $getcolor['bodybg'];
													$titlebg = $getcolor['titlebg'];
													$questionbg = $getcolor['questionbg'];
								                 }
								          
								?>
								<p></p>
								
							<div class="card shadow " style="border-right: 8px solid <?php echo $questionbg ?>;box-shadow:5px 10px 18px #888888;border-radius: 10px;"  >
							
							<i style=" color: grey;"  class="fas fa-braille"></i>
							 	
							  <div class="card-body">
							  <!--	<button class="qcard" data-formid="<?php echo $row['form_id'] ?>">edit</button> -->
							 <div class="container">
							 	<div class="note" ></div>
							 	<div class="row">
								 		<div class="col-sm-9">

							<input type="text" style="font-weight: bold;font-size: 16px;"  name="" onClick="this.select();" class="questval" data-formidd="<?php echo $row['form_id'] ?>"  value="<?php echo $row['content']; ?>" > 
								 			
								 		</div>
								 		<style type="text/css">

								 		.dropdown:hover .dropdown-menu {
									 			display: block;
									   
									    }
									    .dropdown-menu {
									    	margin-top: 43px;
									    	margin-left: 50px;
									    }

								 		</style>
								 		
								 		<div class="col-sm-3">
								 		

							<div class="dropdown">
						  <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenu2"  aria-haspopup="true" aria-expanded="false" style="font-size: 15px; float: right; border: 1px solid #8f8f9a;padding: 10px;border-radius: 12px;font-weight: bolder;color: #5b5b63">
						  Options
						  </button>

						  <div class="dropdown-menu" aria-labelledby="dropdownMenu2" >
						   
						     <a class="dropdown-item shorttext" data-formid="<?php echo $row['form_id'] ?>"  href="#"> <i class="fas fa-text-width"></i> Short Text </a>
						      <button  class="dropdown-item longtext" data-formid="<?php echo $row['form_id'] ?>" type="button" > <i class="fas fa-align-left"></i> Long Text </button>
						       <a class="dropdown-item email" data-formid="<?php echo $row['form_id'] ?>" href="#"> <i class="fas fa-at"></i> Email </a>
						       <a class="dropdown-item numbers" data-formid="<?php echo $row['form_id'] ?>" href="#"> <i class="fas fa-phone-square-alt"></i> Number </a>
						       <a class="dropdown-item dates" data-formid="<?php echo $row['form_id'] ?>" href="#"> <i class="fas fa-calendar-day"></i> Date </a>
						      <hr>
						      <p style="text-align: center;font-size: 12px;color: grey; cursor: default;user-select: none">Multiple choices</p><hr>
						    <a class="dropdown-item mpchoice" data-formid="<?php echo $row['form_id'] ?>" href="#"> <i class="fas fa-clipboard-list"></i> 
						    	Radiobutton
						     </a>
						     <a class="dropdown-item checkboxss" data-formid="<?php echo $row['form_id'] ?>" href="#"> <i class="far fa-check-square"></i> Checkboxes </a>
						  </div>

						</div>




								 		</div>
								 	</div>

								 	<hr class="hrspace " style="color: #929a93;height: 2px;border-radius: 10px;">
								 	<div class="row " id="optcontent">
									 		
								 		<?php 
								 		
		            			
		                 
		                 	
		                 		$sqls = " select * from choices where form_id = '$formid' ";
			               		 $results = mysqli_query($con,$sqls); // run query
			               		  $countee= mysqli_num_rows($results);
			               		  if ($countee>=1) {
			               		 while($rows = mysqli_fetch_array($results)){
			               		 	$type= $rows['type'];
			               		 	$choiceid = $rows['choice_id'];

			               		 	echo '<p></p>';
			               		 	if($type == 'shorttext') {
			?>
		 <div class="container">
		 	<input type="text" class="" name="" style="border:none;outline:none; border-bottom: 1px solid grey;width: 50%;" readonly="" placeholder="Short Text">
		 </div> 
		 
		
		<?php
			               		 	}else if ($type== 'longtext') {
		?>
		 <div class="container">
		 	<input type="text" name="" style="border:none;outline:none; border-bottom: 1px solid grey;width: 100%;" readonly="" placeholder="Long Text">
		 </div> 
		 
		
		<?php
			               		 	}else if ($type == 'mpchoice') {
		?>
				 <div class="row">
								 		<h5>Multiple Radiobutton Choices</h5>

								 		<?php 
								 				$selectaddchoice = " select * from addchoice where choice_id = '$choiceid' ";
								 		                $resultchoice = mysqli_query($con,$selectaddchoice); // run query
								 		             
								 		          
								 		                 while($res = mysqli_fetch_array($resultchoice)){
								 

								 	for($i=0;$i< 1; $i++){
								 		?>
								 		 <div class="col-md-6">
								 		 	<h6 class="opt<?php echo $res['chid']; ?>"><label><input type="radio" name="" disabled=""> <input data-chid="<?php echo $res['chid']; ?>" onClick="this.select();" value="<?php echo $res['content'] ?>" class="opt " type="text" name=""  style="width: auto">
				 <i data-chid="<?php echo $res['chid']; ?>" id="xx<?php echo $res['chid'] ?>" class="fas fa-times deletechoice d-none" style="cursor: pointer;color: #4a719c"></i>
			</label></h6>
								 		 </div> 
								 		 


							<script type="text/javascript">
							$(document).ready(function() {

								$('.opt<?php echo $res['chid']; ?>').hover(function() {

								  $('#xx<?php echo $res['chid'] ?>').removeClass('d-none');
								    },function() { 

								    	  $('#xx<?php echo $res['chid'] ?>').addClass('d-none');


								    }


								    );

								

							});							
						      
					      	
					</script>
								 		<?php

								 	}
								 		                 }

								 		      if($isspecified == 1){
								 		       	?>
								 		     <label> <input type="radio" name="" disabled=""> 	<input type="text" name="" class="questval mb-2" style="border:none;outline:none; width: 40%; font-size:13px" placeholder="Others (Please specify)" readonly="">
								 		      <i data-formid= "<?php echo $formid ?>" class="fas fa-times deleteothers" style="cursor: pointer;color: #4a719c"></i> </label><br>

								 		       	<?php
								 		       	}else {
								 		       		?>

								 		       		<?php
								 		       	}  



		 							
								 		 ?>
								 		 <p></p>
				<h6 data-chid="<?php echo $choiceid ?>" class="addopt text-primary mt-3" style="cursor: pointer;font-size: 17px"><label style="cursor: pointer;color: #3578c1">Add option </label></h6>


									<?php 

									  if($isspecified == 1){
								 		       	?>
								 		      

								 		       	<?php
								 		       	}else {
								 		       		?>
								 		       		<h6 data-chid="<?php echo $choiceid ?>"  style="font-size: 15px;cursor: pointer;" data-formid= "<?php echo $formid ?>" class="addoptcheckspecify text-primary" >Add Others (To specify)</h6>

								 		       		<?php
								 		       	} 
								 		          
									 ?>

								</div>
		<?php
			               		 	}else if($type =='checkbox') {
			               		 			?>
				 <div class="container">
				 	<div class="row"> 
								 		<h5>Multiple Checkbox Choices</h5>

								 		<?php 
								 				$selectaddchoice = " select * from addchoice where choice_id = '$choiceid' ";
								 		                $resultchoice = mysqli_query($con,$selectaddchoice); // run query
								 		             
								 		          
								 		                 while($res = mysqli_fetch_array($resultchoice)){


								 		                 	for($i=0; $i < 1; $i++){
								 		                 		?>
				 <div class="col-md-6">
				<h6><label class="opt<?php echo $res['chid']; ?>" for="checkdis" style="padding: 5px"  ><input type="checkbox" name="" disabled="" id="checkdis"> <input data-chid="<?php echo $res['chid']; ?>" onClick="this.select();" value="<?php echo $res['content'] ?>" class="opt " type="text" name=""  style="border:none;outline:none;">
				 <i data-chid="<?php echo $res['chid']; ?>" class="fas fa-times deletechoice d-none" id="x<?php echo $res['chid']; ?>" style="cursor: pointer;color: #4a719c"></i>
			</label></h6>


								 		                 		 </div> 
								 		                 		 

								 		                 		<?php
								 		
								 									}

								 	?>
			


							<script type="text/javascript">
							$(document).ready(function() {
								$('.opt<?php echo $res['chid']; ?>').hover(function() {
								  $('#x<?php echo $res['chid'] ?>').removeClass('d-none');
								    },function() { 

								    	  $('#x<?php echo $res['chid'] ?>').addClass('d-none');


								    }


								    );

								

							});							
						      
					      	
					</script>
		 



								 	<?php




								 		                 }

								 		  if($isspecified == 1){
								 		       	?>
								 		        <div class="col-md-10">
								 		        
								 		   <h6 style="margin-left: 5px;">   <input type="checkbox" name="" disabled="" id="checkdis"> <input type="text" name="" class="questval mb-2" style="border:none;outline:none; width: auto; font-size:13px" placeholder="Others (Please specify)" readonly="">
								 		      <i data-formid= "<?php echo $formid ?>" class="fas fa-times deleteothers" style="cursor: pointer;color: #4a719c"></i></h6>
								 		      </div> 
								 		       	<?php
								 		       	}else {
								 		       		?>

								 		       		<?php
								 		       	}  
								 		               
								 		?>

								 		
				<p></p>

				<h6 data-chid="<?php echo $choiceid ?>" class="addoptcheck mt-2 text-primary" style="cursor: pointer;width:auto;">Add Option</h6>
					

						<script type="text/javascript">
							
							$(document).ready(function() {
							      	$('#requirednot').addClass('d-none');
							      });      
						      	
						</script>

					
							</div>
						</div>
		<?php

		 							  if($isspecified == 1){
								 		       	?>
								 		      

								 		       	<?php
								 		       	}else {
								 		       		?>
								 		       		<h6 data-chid="<?php echo $choiceid ?>" data-formid= "<?php echo $formid ?>" class="addoptcheckspecify text-primary" style="cursor: pointer;">Add Others (To specify)</h6>

								 		       		<?php
								 		       	} 


			               		 	}

			               		 	////New Opt
			               		 	else 
			               		 if($type == 'email') {
			?>
		 <div class="container">
		 	<input type="email" class="" name="" style="border:none;outline:none; border-bottom: 1px dashed grey;width: 70%;" readonly="" placeholder="Email">
		 </div> 
		 
		
		<?php
			               		 	}     		 	else 
			               		 if($type == 'numbers') {
			?>
		 <div class="container">

		 	<input type="text"  class="" name="" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" style="border:none;outline:none; border-bottom: 1px dashed grey;width: 70%;" readonly="" placeholder="Numbers only">
		 </div> 
		 
		
		<?php
			               		 	}	 	else 
			               		 if($type == 'dates') {
			?>
		 <div class="container">

		 	<input type="date"  class="" name=""  style="border:none;outline:none; border-bottom: 1px dashed grey;" readonly="" placeholder="">
		 </div> 
		 
		
		<?php
			               		 	}
			               		


			               		 }//endshow






							 
		                 }else {
		                 	
		                 	?>
		                 	 <div class="container">
		                 	 	<h6 style="color: grey">There are no options or choices available. To begin, choose from the OPTION tabs.</h6>
		                 	 </div> 
		                 	 
		                 	<?php
		                 }
		          

								 		 ?>

								 	</div>
							 </div> 
							 <style type="text/css">
							 	.switch {
							  position: relative;
							  display: inline-flex;
							  width: 110px;
							  height: 24px;
							  float: right;
							  margin-top: 20px;
							  margin-right: 10px; 
							}

							.switch input { 
							  opacity: 0;
							  width: 0;
							  height: 0;
							}

							.slider {
							  position: absolute;
							  cursor: pointer;
							  top: 0;
							  left: 0;
							  right: 0;
							  bottom: 0;
							  color: grey;
							  background-color: #ccc;
							  -webkit-transition: .4s;
							  transition: .4s;
							}

							.slider:before {
							  position: absolute;
							  content: "";
							  height: 16px;
							  width: 16px;
							  left: 6px;
							  bottom: 4px;
							 
							  background-color: white;
							  -webkit-transition: .4s;
							  transition: .4s;
							}

							input:checked + .slider {
							  background-color: #6680c0;
							  color:#f5f4f2;
							}



							input:focus + .slider {
							  box-shadow: 0 0 1px #2196F3;
							}

							input:checked + .slider:before {
							  -webkit-transform: translateX(83px);
							  -ms-transform: translateX(83px);
							  transform: translateX(83px);
							}

							/* Rounded sliders */
							.slider.round {
							  border-radius: 34px;
							}

							.slider.round:before {
							  border-radius: 50%;
							}
							.questval {
								 width: 100%; border:none;outline: none;padding: 9px; 
								 font-size: 19px;

							background: 
						    linear-gradient(#a8bbc5, #a8bbc5) bottom / 0% 1px no-repeat
						    #ccc;
						  transition: .5s;

						  background-color: #f0f0f0;
						  color:#032618;
							}
						

							.questval:hover {
							
								background-color: #eae8e8;
								

							}
							

							.questval:focus {
									
							
								
								background-color: #ffffff;
								background-size: 100% 2px;
								

							} 

							.opt {
								border:none;outline:none;

								background: 
						    linear-gradient(#a8bbc5, #a8bbc5) bottom / 0% 1px no-repeat
						    #ccc;
						  transition: .5s;

						  background-color: transparent;

							}

							.opt:hover {
								background-color:#f0f3f4;
							}
							.opt:focus {
									
							
								
								background-color: #ffffff;
								background-size: 100% 2px;
								

							} 
							
						

							
						
						
							 </style>
							
							
							<p></p>
							




						


							
							 <button class="btndel " style="border:none;outline: none; float: right; margin-top: 20px" data-fid="<?php echo $row['form_id'] ?>"><i style="color:grey" class="far fa-trash-alt"></i></button>
							 	<?php 
							 	if ($isreq == 'yes') {
							 		?>
							 		 	<label style="float: right; ">

										 <label class="switch">
													 
										<input type="checkbox" class="chx" checked="" data-fid="<?php echo $row['form_id'] ?>">

												  <span class="slider round"> <span style="padding:25px; font-size: 15px;-webkit-touch-callout: none;
						    -webkit-user-select: none;
						    -khtml-user-select: none;
						    -moz-user-select: none;
						    -ms-user-select: none;
						    user-select: none; "> Required <span style="visibility: hidden;">asd</span></span></span>

												</label>
												</label>
							 		<?php
							 	}	else if ($isreq == 'no') {
							 			?>
							 		 	<div style="float: right; " id="requirednot">

										 <label class="switch">
													 
										<input type="checkbox" class="chx"  unchecked data-fid="<?php echo $row['form_id'] ?>">

												  <span class="slider round"> <span style="padding:26px; font-size: 15px;-webkit-touch-callout: none;
						    -webkit-user-select: none;
						    -khtml-user-select: none;
						    -moz-user-select: none;
						    -ms-user-select: none;
						    user-select: none; ">Required <span style="visibility: hidden;">asd</span></span></span>
												</label>
												</div>
							 		<?php
							 		}
							 	 ?>
							 	
							 
							
							  </div>
							</div>

							<p><br></p>
							<?php

		
							?>

							<script type="text/javascript">
								
								$(document).ready(function() {
								      

								     
							      	
							</script>	
							<script type="text/javascript">

									$('.deleteothers').click(function() { 
										var formid = $(this).data('formid');


									 $.ajax({
							           url : "opt_pro.php",
							            method: "POST",
							             data  : {removeothers:1,formid:formid},
							              beforeSend: function(  ) {
 						 $('.innerBar').animate({ width: "80%" }, 500);
 								 },
							             success : function(data){
									 $('.innerBar').animate({ width: "100%" }, 500);
											contents();
											
							             }
							          })

									})


								 $('.chx').click(function() {
								 	var id = $(this).data('fid');
								      if($(this).prop("checked") == true) {
								            $.ajax({
							           url : "opt_pro.php",
							            method: "POST",
							             data  : {isrequiredtrue:1,id:id},
							              beforeSend: function(  ) {
							              	//$('.note').html('<span style="color: #a3151a">REQUIRED</span>.');
 						
 								 },
							             success : function(data){
										//$('.note').html(' <span style="color: #a3151a">REQUIRED</span>.');
										var fetch = setInterval(function(){
											contents();
											clearInterval(fetch);
										},1000);
											
							             }
							          })                      		
								         }
								      else if($(this).prop("checked") == false) {
								                $.ajax({
							           url : "opt_pro.php",
							            method: "POST",
							             data  : {isrequiredfalse:1,id:id},
							              beforeSend: function(  ) {
 								//$('.note').html('<span style="color: #100102">OPTIONAL</span>.');
 								 },
							             success : function(data){
									//	$('.note').html('<span style="color: #100102">OPTIONAL</span>.');
												var fetch = setInterval(function(){
											contents();
											clearInterval(fetch);
										},1000);
											
							             }
							          })                            
								       }
								    });
								$('.addopt').click(function() { 
									var chid = $(this).data('chid');
									 $.ajax({
							           url : "opt_pro.php",
							            method: "POST",
							             data  : {newopt:1,chid:chid},
							              beforeSend: function(  ) {
 						 $('.innerBar').animate({ width: "80%" }, 500);
 								 },
							             success : function(data){
										 $('.innerBar').animate({ width: "100%" }, 500);
											contents();
											
							             }
							          })

								})

									$('.addoptcheck').click(function() { 
									var chid = $(this).data('chid');
									
									 $.ajax({
							           url : "opt_pro.php",
							            method: "POST",
							             data  : {newoptcheck:1,chid:chid},
							              beforeSend: function(  ) {
 						 $('.innerBar').animate({ width: "80%" }, 500);
 								 },
							             success : function(data){
									 $('.innerBar').animate({ width: "100%" }, 500);
											contents();
											
							             }
							          })

								})

									$('.addoptcheckspecify').click(function() { 
											
												var chid = $(this).data('chid');
												var formid = $(this).data('formid');
									
									 $.ajax({
							           url : "opt_pro.php",
							            method: "POST",
							             data  : {newoptcheckspecify:1,chid:chid,formid:formid},
							              beforeSend: function(  ) {
 						 $('.innerBar').animate({ width: "80%" }, 500);
 								 },
							             success : function(data){
									 $('.innerBar').animate({ width: "100%" }, 500);
											contents();
											

											

											
							             }
							          })
									})
								$('.opt').keyup(function(){ 
									var inputvalue = $(this).val();
									var chid = $(this).data('chid');
								
								 	 $.ajax({
							           url : "opt_pro.php",
							            method: "POST",
							             data  : {saveopt:1,inpvalue:inputvalue,chid:chid},

							             success : function(data){
										
											
							             }
							          })
								 	
								 	})
								
									
								
								$('.deletechoice').click(function() { 
									var chid = $(this).data('chid');
										$.ajax({
							           url : "opt_pro.php",
							            method: "POST",
							             data  : {delchoice:1,chid:chid},
							             success : function(data){
										 contents();
											
							             }
							          })
								})

								function contents(){
		
		 $.ajax({
			           url : "action.php",
			            method: "POST",
			             data  : {content:1},
			             success : function(data){
							$('#content').html(data);
							
			             }
			          })
	}      

							  //    	
							</script>



								 <?php 
								 		$cx = " SELECT max(display_order) FROM `form` WHERE class_name='$clss' and sec_no = '$secno'  ";
								                 $resultcx = mysqli_query($con,$cx); // run query
								                 $countcx= mysqli_num_rows($resultcx); // to count if necessary
								                //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
								              if ($countcx>=1){
								              	//while($row = mysqli_fetch_array($result)){} is where we output all the data in database
								                  while($rowcx= mysqli_fetch_array($resultcx)){

								                  	$max =  $rowcx['max(display_order)'];
								 					
								                  }

								                     if ($d_order == $max) {

								                  				$cs = "SELECT * FROM `form` where type ='section'";
								                  				  $resultcss = mysqli_query($con,$cs); // run query
								                 $countcss= mysqli_num_rows($resultcss); // to count if necessary
								                //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
													              if ($countcss>=1){

													              	?>

								                  	<h6 class="mt-5 text-secondary" style="font-weight: bolder;text-align: center;"><i class="fas fa-angle-double-left"></i><i class="fas fa-chevron-left"></i> End of Section <?php echo $secno ?>  <i class="fas fa-chevron-right"></i><i class="fas fa-angle-double-right"></i></h6>

								                  					<?php
													              
													              }else {
													              	
													              }

								                  		
								                  }
								           }

								  ?>