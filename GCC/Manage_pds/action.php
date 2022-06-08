<?php 
session_start();
include '../create_form/connect.php';


	if(isset($_POST['content'])){ 

				$csform = $_SESSION['view_form_id'];	

			

							//////==================================================================	

				$sql = " SELECT * FROM `form` where class_name = '$csform' order by display_order";
		                $result = mysqli_query($con,$sql); // run query
		                $count= mysqli_num_rows($result); // to count if necessary
		               //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
		          	if($count >=1){


		                 while($row = mysqli_fetch_array($result)){
		                 	$formid = $row['form_id'];
						 	$dd = $row['type'];
						 	$isreq = $row['isrequired'];
						 	$status = $row['status'];
						 	$bgsrc = '../img/uploads/'.$row['bgimage'];
						 	$bgtcolor = $row['bgcolor'];
						 	$txttcolor = $row['txtcolor'];
						 	$yaxis = $row['yaxis'];
						 	$isvisible = $row['isvisible'];

						 		if($yaxis == ''){
						 		$posbg = 'center';
						 	}else {
						 		$posbg = $yaxis.'px';
						 	}


							if($dd == 'Title') { 

								
											?>
							<p></p>
							<?php
						include '../create_form/connect.php';
						
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
						
						    	                  
					
						

							 <div class="card-header py-5 " style="background: url('<?php echo $bgsrc ?>');background-size:cover;background-repeat:no-repeat;background-position-y:<?php echo $posbg ?>;background-color:<?php echo $bgtcolor ?>;color: <?php echo $txttcolor ?>;text-align: center;height: 180px;" >

							
							

							<?php 

							  	 	if($isvisible >= 1 ){
							  	 		?>
							  	 	

							  	 			<?php

							  	 		}else {
							  	 			?>
							  	 		<h3 style="text-transform: uppercase;padding-top: 20px"> <?php echo $row['content'] ?></h3>

							  	 			<?php
							  	 		}
							  	 	 
							 ?>
							</div>
							<p></p>
							<?php	
									
								

							}else if ($dd == 'Question') {	
								
							 		
										?>
									<?php
						include '../create_form/connect.php';
						
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
							<p></p>
							<div class="card cardo"  style="border-bottom: 2px solid <?php echo $questionbg ?>" >

							
							  <div class="card-body">
							  
							 <div class="container">
							 	<div class="row">
								 		<div class="col-sm-9">
								 			<?php 
								 			if ($isreq == 'yes') {
								 				?>
								 				<h5 style="width: 100%; border:none;outline: none;padding: 9px; color: <?php echo $textcolorquestion ?>;font-weight: bold;font-size: 16px" > <?php echo $row['content']; ?>  <span style="color:#b81a21;"> *</span></h5>
								 				<?php
								 			}else if ($isreq == 'no') { 
								 				?>
								 				<h5 style="width: 100%; border:none;outline: none;padding: 9px; color: <?php echo $textcolorquestion ?>;font-weight: bold" > <?php echo $row['content']; ?></h5>
								 				<?php
								 			}
								 			 ?>
								 		</div>
								 		
								 		<div class="col-sm-3">
								 			<?php 
								 			if ($isreq == 'yes') {
								 				?>
								 				 <h6 style="font-size: 11px;color: red;float: right;">This Field is Required.</h6>
								 				<?php
								 			}else if ($isreq == 'no') { 
								 				?>
								 				 <h6 style="font-size: 11px;float: right;">This Field is Optional.</h6>
								 				<?php
								 			}
								 			 ?>
								

								 		</div>
								 	</div>

								 	
								 	<div class="row " id="optcontents">
									 		
								 		<?php 
								 		
		            
		                 
		                 	
		                 		$sqls = " select * from choices where form_id = '$formid' ";
			               		 $results = mysqli_query($con,$sqls); // run query
			               		 while($rows = mysqli_fetch_array($results)){
			               		 	$type= $rows['type'];
			               		 		$choiceid = $rows['choice_id'];
			               		 		include 'Options.php';
			     
			               		 }
							 
		                 
								 		 ?>

								 	</div>

							 </div> 
							 
							
							<p></p>
							
							 <button class="btndel d-none"  style="border:none;outline: none; float: right; margin-top: 20px" data-fid="<?php echo $row['form_id'] ?>"><i style="color:grey" class="far fa-trash-alt"></i></button>
							  </div>

							</div>

							<p></p>
							<?php

									
							 		
									

							}else if ($dd == 'Plaintext') {
								?>
										<p></p>
								 <div class="card ">
								 	
								 	 <div class="card-body py-5">
								 	 	
								 	 	
								 	 	  
								 	 	 

								 	 <div class="container">



								 	 	
								 	 		<h6 style="font-weight: bold;"><?php echo $row['content'] ?></h6> 	
								 	 	
								 	 		
								 	 </div> 
								 	 


								 	 </div> 
								 	  <div class="card-footer" style="border-bottom: 2px solid <?php echo $questionbg ?>"></div> 
								 	  
								 </div> 
								 <p></p>
								<?php
							}

		                 }
		               	?>
		               	<button class="btn btn-primary sub" type="Submit" name="btn" style="width: 150px;padding: 10px;">Submit</button> <a href="javascript:void()" style="margin:10px;width: 150px;padding: 10px;" class="btn btn-info managecontent" data-csformid="<?php echo $csform ?>" style="float: right;">Manage Contents</a>
		               	<button class="btn btn-secondary " onclick="window.history.back()" type="Submit" name="btn" style="width: 150px;padding: 10px;">Back</button>
		               	<br><br>
		               	<span id="note"></span>
		               	<?php
		             }else {
		             	?>
		             	 <div class="container" style="text-align: center; padding: 50px;">
		             	 	<h2>Ooops the Form is Empty!</h2>
		             	 	<h5 > To start editing this form, Click manage to manipulate contents</h5>
		             	<a href="#" style="text-align: center;" class="btn btn-primary managecontent" data-csformid="<?php echo $csform ?>" style="float: right;">Manage Contents</a>
		             	 </div> 
		             	 	
		             	<?php
		             }


		             ///////-----------------------------------------------------

				
			
		          
	
	}


	if(isset($_POST['removeresponse'])){ 
		$csformid = $_POST['csformid'];
		$userid = $_POST['userid'];

		

		$deleterespo = "DELETE FROM `form_response` WHERE custom_user = '$userid'  and  csformid = '$csformid' ";
		mysqli_query($con,$deleterespo);

		$deleteuser = "DELETE FROM `temp_user` WHERE userid = '$userid' ";
		mysqli_query($con,$deleteuser);

		
		
	}
 ?>
 <script type="text/javascript">
 	
 	    $('.managecontent').click(function() { 
      var csformid = $(this).data('csformid');
           
          
               
             var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
             if (this.readyState == 4 && this.status == 200) {
            const data = this.responseText;
          
          window.location.href= "../create_form";
                         }
                      };
              xhttp.open("POST", "form_session.php",true);
              xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
              xhttp.send("setedit=1&csformid="+csformid);
                  
                           
    })  
    $('.sub').click(function() { 
         	$('#note').text('This page is for viewing only.');
         })    
       	
 </script>