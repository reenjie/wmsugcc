<?php 
session_start();
include 'connect.php';


	if(isset($_POST['add'])){ 


		/// HERE WE ADD CONTENTS . IT CORRESPONDS TO THE OPTION IN CREATING FORMS
		$types = $_POST['types'];
			$csform = $_SESSION['form_id'];

							//CREATING FILE
					if($types == 'file'){

						include 'addfile.php';

					}else
					//CREATING TITLE
					if($types == 'title') {
						
							          include 'addtitle.php';


						}else if ($types == 'question') {
						//CREATING QUESTIONS
					  include 'addquestion.php';
							         
							
					}else if ($types == 'plaintext'){
						include 'plaintext.php';
		
					}else if ($types == 'list'){



					
							          	include 'addlist.php';



					}else if ($types == 'section'){
						$_SESSION['checkedsectionexist']= 1;

						$csform = $_SESSION['form_id'];
								//	$tc = $_SESSION['title_column'];
									$sql = " select * from form where status = 'selected'  and class_name = '$csform'   ";
							                $result = mysqli_query($con,$sql); // run query
							                $count= mysqli_num_rows($result); // to count if necessary
							              
							             if ($count==1){
							              while($row = mysqli_fetch_array($result)){
												$formdd = $row['form_id'];
					                		 }
					                $sqlupdate = " UPDATE `form` set `status`=NULL  where form_id = '$formdd'  ";
				               	 $resultsupdate = mysqli_query($con,$sqlupdate); // run query	 	
				               	 	//
				               	 	$getthehighestorders = "select * from form where class_name = '$csform'  and display_order=(select max(display_order) from form where class_name='$csform')  ";

				               	 	                $resultgetsss = mysqli_query($con,$getthehighestorders);
				               	 	                $countsss= mysqli_num_rows($resultgetsss); 
				               	 	              
				               	 	             if ($countsss == 1 ){

				               	 	             
				               	 	                 while($row = mysqli_fetch_array($resultgetsss)){
				               	 						$dorder = $row['display_order'] + 1 ;

				               	 						$sec = $row['sec_no']+1;

				               	 	                 }
				               $sqlinsert = " INSERT INTO `form`( `type`, `content`,`class_name`,`display_order`,`status`,`isrequired`,`sec_no`,`others`) VALUES ('section','Untitled section','$csform','$dorder','selected','no','$sec','Other supporting contents')  ";
				               	 $results = mysqli_query($con,$sqlinsert); // run query
				               	 	             }else {
   $sqlinsert = " INSERT INTO `form`( `type`, `content`,`class_name`,`display_order`,`status`,`isrequired`,`sec_no`,`others`) VALUES ('section','Untitled section','$csform',0,'selected','no','$sec','Other supporting contents')  ";
				               	 $results = mysqli_query($con,$sqlinsert); // run query

				               	 	             }




							 
				              
				               
							          
							          }else {


							$checkse = " SELECT * FROM `form` WHERE class_name ='$csform' and type ='section' order by form_id desc limit 1  ";
							          		                $resultcse = mysqli_query($con,$checkse); // run query
							          		                $countcse= mysqli_num_rows($resultcse); // to count if necessary
							          		               //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
							          		             if ($countcse>=1){
							          		             	//while($row = mysqli_fetch_array($result)){} is where we output all the data in database
							          		                 while($rowcse = mysqli_fetch_array($resultcse)){
							          							$nextsecno = $rowcse['sec_no']+1;
				 /////////-------------------------------------------------------------------------------
			$getthehighestorders = "select * from form where display_order=(select max(display_order) from form)";

				               	 	                $resultgetsss = mysqli_query($con,$getthehighestorders);
				               	 	                $countsss= mysqli_num_rows($resultgetsss); 
				               	 	              
				               	 	             if ($countsss == 1 ){

				               	 	             
				               	 	                 while($row = mysqli_fetch_array($resultgetsss)){
				               	 						$dorder = $row['display_order'] + 1 ;

				               	 	                 }
				               $sqlinsert = " INSERT INTO `form`( `type`, `content`,`class_name`,`display_order`,`status`,`isrequired`,`sec_no`,`others`) VALUES ('section','Untitled section','$csform','$dorder','selected','no','$nextsecno','Other supporting contents')  ";
				               	 $results = mysqli_query($con,$sqlinsert); // run query
				               	 	             }else {
  $sqlinsert = " INSERT INTO `form`( `type`, `content`,`class_name`,`display_order`,`status`,`isrequired`,`sec_no`,`others`) VALUES ('section','Untitled section','$csform',0,'selected','no','$nextsecno','Other supporting contents')  ";
				               	 $results = mysqli_query($con,$sqlinsert); // run query

				               	 	             }
				              
				              /////////-------------------------------------------------------------------------------


							          		                 }
							          		          }else {

					 /////////-------------------------------------------------------------------------------
			$getthehighestorders = "select * from form where display_order=(select max(display_order) from form)";

				               	 	                $resultgetsss = mysqli_query($con,$getthehighestorders);
				               	 	                $countsss= mysqli_num_rows($resultgetsss); 
				               	 	              
				               	 	             if ($countsss == 1 ){

				               	 	             
				               	 	                 while($row = mysqli_fetch_array($resultgetsss)){
				               	 						$dorder = $row['display_order'] + 1 ;

				               	 	                 }
				               $sqlinsert = " INSERT INTO `form`( `type`, `content`,`class_name`,`display_order`,`status`,`isrequired`,`sec_no`,`others`) VALUES ('section','Untitled section','$csform','$dorder','selected','no',1,'Other supporting contents')  ";
				               	 $results = mysqli_query($con,$sqlinsert); // run query
				               	 	             }else {
  $sqlinsert = " INSERT INTO `form`( `type`, `content`,`class_name`,`display_order`,`status`,`isrequired`,`sec_no`,`others`) VALUES ('section','Untitled section','$csform',0,'selected','no',1,'Other supporting contents')  ";
				               	 $results = mysqli_query($con,$sqlinsert); // run query

				               	 	             }
				              
				              /////////-------------------------------------------------------------------------------

							          		          }



				
				             
							          }



							           $getsectionid =  mysqli_insert_id($con); 
					 					$_SESSION['sectionset'] = $getsectionid;
					 					unset($_SESSION['dorder']);
					 					//$_SESSION['sectionenvironmentset'] = 1;


							                      
							                    



					}

		          
	
	}

	/// THE CARDS OF ALL THE QUESTIONS,TITLE,SECTION LIST ETC. THE VIEW
	if(isset($_POST['content'])){ 

		if(isset($_SESSION['checkedsectionexist'])) {
				include 'scrollspy.php';
		}
		

				$csform = $_SESSION['form_id'];		

				$sql = " SELECT * FROM `form` where class_name = '$csform' order by display_order";
		                $result = mysqli_query($con,$sql); // run query
		                $count= mysqli_num_rows($result); // to count if necessary
		              
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
						 	$isset = $row['isset'];
						 	$ismodifiable = $row['ismodifiable'];
						 	$secno = $row['sec_no'];
						 	$othersdata = $row['others'];
						 	$section = $row['section'];
						 	$clss = $row['class_name'];
						 	$d_order = $row['display_order'];
						 	$isspecified = $row['isspecified'];


						 	if($yaxis == ''){
						 		$posbg = 'center';
						 	}else {
						 		$posbg = $yaxis.'px';
						 	}

						 	// $dd is the type of file , such as file , title , question , list etc.

						 	// The $status if marked selected. then it is the active selection . which the user or admin is modifying..
						 	if($dd == 'file'){
						 		if ($status == 'selected') { 
										include 'file_selected.php';
										
									}else {
										include 'file.php';
									}

						 	}else 
							if($dd == 'Title') { 




									////
									if ($status == 'selected') { 
										include 'title.php';
										
									}else {
											?>
							<p></p>

							<div class="card">

								<?php

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
							 <i style="  color: grey;text-align: center;cursor: pointer;padding-top:10px; "   data-formid="<?php echo $row['form_id'] ?>" class="far fa-edit qcard"></i>
							  <div class="card-body" >
							  	 
							  
							  </div>

							  
							</div>
							<p></p>

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
							<?php	
									}
									////



								

							}else if ($dd == 'Plaintext') {
							

								////
								if ($status == 'selected') {
							 			
										include 'select_plain.php';

									}else {

										?>
										<p></p>
								 <div class="card ">
								 	<?php 
								 /*	if($secno >=1){
								 		?>
								 		<span class="badge  bg-secondary text-light" style="width: auto;position: absolute;left: 5px;top: 5px"><?php echo $secno ?></span>
								 		<?php
								 	}

								 	*/

								 	 ?>

								 	<i style=" color: grey;text-align: center;cursor: pointer;padding-top:10px; "   data-formid="<?php echo $row['form_id'] ?>" class="far fa-edit qcard"></i>

								 	 <div class="card-body py-5">

								 	

								 	 <div class="container">



								 	 	
								 	 		<h6 style="font-weight: bold"><?php echo $row['content'] ?></h6> 	
								 	 	
								 	 		
								 	 </div> 
								 	 


								 	 </div> 
								 </div> 
								 <p></p>


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
								 

								<?php

									}
									////


							}else if ($dd == 'list'){ 

								if ($status == 'selected') {
							 			
										include 'list.php';

									}else {
										include 'onlist.php';
									}


							}else if ($dd == 'section'){

								

								if ($status == 'selected') {
							 			
										include 'section.php';

									}else {
										include 'sectionshow.php';
									}	

							}



							else if ($dd == 'Question') {	
								
							 		if ($status == 'selected') {
							 			
									 include 'select.php';
										

									}else {
										?>

										<?php
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
							
							<div class="card cardo"  >

							<i style=" color: grey;text-align: center;cursor: pointer;padding-top:10px; "   data-formid="<?php echo $row['form_id'] ?>" class="far fa-edit qcard" data-types="question"></i>
							 		
							  <div class="card-body">
							  
							 <div class="container">
							 	<div class="row">

								 		<div class="col-sm-9">
								 			<?php 
								 			if ($isreq == 'yes') {
								 				?>
								 				<h5 style="width: 100%; border:none;outline: none;padding: 9px; color: <?php echo $textcolorquestion ?>;font-weight: bold;font-size:16px" > <?php echo $row['content']; ?>  <span style="color:#b81a21;"> *</span></h5>
								 				<?php
								 			}else if ($isreq == 'no') { 
								 				?>
								 				<h5 style="width: 100%; border:none;outline: none;padding: 9px; color: <?php echo $textcolorquestion ?>;font-weight: bold;font-size:16px" > <?php echo $row['content']; ?></h5>
								 				<?php
								 			}
								 			 ?>
						
								 		</div>
								 		
								 		<div class="col-sm-3">
								

								 		</div>
								 	</div>

								 	
								 	<div class="row " id="optcontents" >
									 		
								 		<?php 
								 		
		            
		                 
		                 	
		                 		$sqls = " select * from choices where form_id = '$formid' ";
			               		 $results = mysqli_query($con,$sqls); // run query


			               		                 $countopt= mysqli_num_rows($results); 
			               		             
			               		              if ($countopt>=1){
			               		            
			               		                
			               		           
			               		 while($rows = mysqli_fetch_array($results)){
			               		 	$type= $rows['type'];
			               		 		$choiceid = $rows['choice_id'];
			               		 	if($type == 'shorttext') {
			?>
		 <div class="container" >
		<input type="text" class="" name="" style="border:none;outline:none; border-bottom: 1px solid grey;width: 50%;margin-left: 50px;text-align: center;" readonly="" placeholder=""> 
		 </div> 
		 
		
		<?php
			               		 	}else if ($type== 'longtext') {
		?>
		 <div class="container">
		 	<input type="text" name="" style="border:none;outline:none; text-align: center;border-bottom: 1px solid grey;width: 100%;" readonly="" placeholder="">
		 </div> 
		 
		
		<?php
			               		 	}else if ($type == 'mpchoice') {
		?>
		 <div class="container">
		 	 <div class="row">
		 	 
								 		<h6 style="color: grey">Multiple Choices</h6>
								 		<?php 
								 				$selectaddchoice = " select * from addchoice where choice_id = '$choiceid' ";
								 		                $resultchoice = mysqli_query($con,$selectaddchoice); // run query
								 		             
								 		          
								 		                 while($res = mysqli_fetch_array($resultchoice)){
								 
								 	for($i=0;$i<1;$i++){
								 		?>
								 		 <div class="col-md-6" >
								 		 	
								 		 	 
							<h6 ><label><input type="radio" name="" disabled=""> 
								<span class="text-secondary"><?php echo $res['content'] ?></span>
				
								</label></h6>


												
								 		 </div> 
								 		 
								 		<?php
								 	}
								 		                 }
								 		        if($isspecified == 1){
								 		       	?>
								 		       
								 		  	<h6 ><label><input type="radio" name="" disabled=""> 
													<span class="text-secondary">Others (Please Specify)</span>
												</label></h6>

								 		       	<?php
								 		       	}else {
								 		       		?>

								 		       		<?php
								 		       	} 
								 		          
								 		 ?>
								 		</div> 
								</div>
		<?php
			               		 	}else if($type =='checkbox') {
			               		 				?>
		 <div class="container">
		 	 <div class="row"> 
		 	 
								 		<h6 style="color: grey">Multiple checkbox Choices</h6>
								 		<?php 
								 				$selectaddchoice = " select * from addchoice where choice_id = '$choiceid' ";
								 		                $resultchoice = mysqli_query($con,$selectaddchoice); // run query
								 		             
								 		          
								 		                 while($res = mysqli_fetch_array($resultchoice)){
								

								 		for($i = 0 ; $i < 1; $i++){
								 			?>
								 		 <div class="col-md-6">
								 		 
								 				 		 	 
							<h6 ><label><input type="checkbox" name="" disabled=""> 
								<span class="text-secondary"><?php echo $res['content'] ?></span>
				
								</label></h6>
								 		
								 		 	
								 		 </div> 
								 		 
								 		<?php
								 		}


								 		                 }

								 		      if($isspecified == 1){
								 		       	?>
								 		       	<h6 ><label><input type="checkbox" name="" disabled=""> 
													<span class="text-secondary">Others (Please Specify)</span>
												</label></h6>


								 		       	<?php
								 		       	}else {
								 		       		?>

								 		       		<?php
								 		       	} 
								 		          
								 		 ?>


								 		</div>
								</div>
		<?php
			               		 	}else if($type == 'email') {
			?>
		 <div class="container" >
		<input type="email" class="" name="" style="border:none;outline:none; border-bottom: 1px solid grey;width: 70%;margin-left: 50px;text-align: center;" readonly="" placeholder="Enter Email"> 
		 </div> 
		 
		
		<?php
			               		 	}else if($type == 'numbers') {
			?>
		 <div class="container" >

		<input type="text" class="" name="" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" style="border:none;outline:none; border-bottom: 1px solid grey;width: 60%;margin-left: 50px;text-align: center;" readonly="" placeholder="Enter Number"> 
		 </div> 
		 
		
		<?php
			               		 	}else if($type == 'dates') {
			?>
		 <div class="container" >

		<input type="date" class="form-control" name="" style=" text-align: center;" readonly="" placeholder=""> 
		 </div> 
		 
		
		<?php
			               		 	}
			               		///




			               		 }
			               		}else {
			               			?>
			               			 <div class="container">
			               			 	<div class="row" style="text-align: center;">
			               			 		<h6 style="font-size: 14px;color: grey">There was no options selected..</h6>
			               			 		 
			               			 	</div>
			               			 </div> 
			               			 
			               			<?php
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
							<?php

									}
							 		
									

							}
		                 }
		             }else {
		             	?>
		             	 <div class="container">
		             	 	<h5 style="text-align: center;">Simply select the choices on the right side to begin creating forms </h5>
		             	 	<h1 style="text-align: center;font-size: 180px;"><i class="far fa-hand-point-right"></i></h1>
		             	 </div> 
		             	 
		             	<?php
		             }
		          
	
	}
if(isset($_POST['changetitle'])){ 
	$inpvalue = $_POST['inpvalue'];
	$formid = $_POST['formid'];
						$sql = " UPDATE `form` SET `content`='$inpvalue' WHERE form_id='$formid'  ";
		                $result = mysqli_query($con,$sql); // run query
		             

}

if(isset($_POST['delete'])){ 
	$id = $_POST['id'];
	$title = $_POST['titledd'];
		
							$sqlselect2nd = " select * from form order by form_id DESC LIMIT 1,1; ";
                             $resulta = mysqli_query($con,$sqlselect2nd); 
                           	while($row = mysqli_fetch_array($resulta)){
                        	$ndformid = $row['form_id'];
                             }
                        $update = "UPDATE `form` set `status` = 'selected' where form_id = '$ndformid' ";
                       		if($resultupdt = mysqli_query($con,$update)) {
					             $sql = " DELETE FROM `form` WHERE form_id = '$id'  ";
					             $result = mysqli_query($con,$sql); // run query



					             		$sql = " select * from choices where form_id = '$id'  ";
					                             $result = mysqli_query($con,$sql); // run query
					                           
					                              while($row = mysqli_fetch_array($result)){
					             						$chid = $row['choice_id'];
					             $sqldds = " DELETE FROM `addchoice` WHERE choice_id = '$chid'  ";
					             $resultdds = mysqli_query($con,$sqldds); // run query
					                              }
					                       
					             
					             $sqldd = " DELETE FROM `choices` WHERE form_id = '$id'  ";
					             $resultdd = mysqli_query($con,$sqldd); // run query

					             $delupconts = "DELETE FROM `updte_pages` WHERE formid = '$id' ";
					             mysqli_query($con,$delupconts);

                       		}

			
			
             
		


}		
if(isset($_POST['deletetitle'])){ 
	$id = $_POST['id'];

	$deltc= " DELETE FROM `tablecolumn_number` WHERE formid='$id' ";
		              mysqli_query($con,$deltc); // run query

		              $deltch= " DELETE FROM `tablechoices`  WHERE form_id='$id' ";
		              mysqli_query($con,$deltch); // run query
		               
		              

		                $deltcnt= "  DELETE FROM `tablecolumn_content` WHERE formid='$id' ";
		              	mysqli_query($con,$deltcnt); // run query
		              	
					
		
							/*$sqlselect2nd = " select * from form order by form_id DESC LIMIT 1; ";
                             $resulta = mysqli_query($con,$sqlselect2nd); 
                           	while($row = mysqli_fetch_array($resulta)){
                        	$ndformid = $row['form_id'];
                             }
                        $update = "UPDATE `form` set `status` = 'selected' where form_id = '$ndformid' and type = 'Question' ";
                        $resultupdt = mysqli_query($con,$update)*/
                       		$sql = " DELETE FROM `form` WHERE form_id = '$id'  ";
					        $result = mysqli_query($con,$sql); 

					 /*       $sqlchild = " DELETE FROM `form` WHERE title_column = '$id'  ";
					    	 $resultchild = mysqli_query($con,$sqlchild); 
					            
					 			
					             				$sql = " select * from choices where form_id = '$id'  ";
					                             $result = mysqli_query($con,$sql); // run query
					                           
					                              while($rows = mysqli_fetch_array($result)){
											             $chid = $rows['choice_id'];
											             $sqldds = " DELETE FROM `addchoice` WHERE choice_id = '$chid'  ";
											             $resultdds = mysqli_query($con,$sqldds); // run query
											                              }
											                       
											             
											             $sqldd = " DELETE FROM `choices` WHERE form_id = '$id'  ";
											             $resultdd = mysqli_query($con,$sqldd); // run query
					             		                 
					             		          

*/
					             		

                       		
			
             
		


}
if(isset($_POST['savequestval'])){ 
	$qval = $_POST['qval'];
	$id = $_POST['id'];
	$csform = $_SESSION['form_id'];
			$sql = " UPDATE `form` SET `content`='$qval' WHERE form_id='$id'  ";
		                $result = mysqli_query($con,$sql); // run query

	if($csform == '62'){
		$uptnot = "UPDATE `notification` SET `status`='read' WHERE type= 'notifystudent' ";
                   mysqli_query($con,$uptnot);
	}
	               
}

if(isset($_POST['savequestvalothers'])){ 
	$qval = $_POST['qval'];
	$id = $_POST['id'];
	$csform = $_SESSION['form_id'];
			$sql = " UPDATE `form` SET `others`='$qval' WHERE form_id='$id'  ";
		                $result = mysqli_query($con,$sql); // run query

	
	               
}

if(isset($_POST['changetext'])){ 
	$val = $_POST['val'];
	$id = $_POST['id'];

	$csform = $_SESSION['form_id'];
			$sql = " UPDATE `form` SET `content`='$val' WHERE form_id='$id'  ";
		                $result = mysqli_query($con,$sql); // run query

	if($csform == '62'){
		$uptnot = "UPDATE `notification` SET `status`='read' WHERE type= 'notifystudent' ";
                   mysqli_query($con,$uptnot);
	}
	
}

if(isset($_POST['createtable'])){ 
	$formid = $_POST['formid'];
			

			$untitledtable = 'Untitled table header';
			$content = 'Supporting Contents';

			// insert tablecolumns first 
		$tablecolumnnumber = " INSERT INTO `tablecolumn_number`(`formid`,`type`,`bg`) VALUES ('$formid','header','table-secondary')  ";
		mysqli_query($con,$tablecolumnnumber); // run query
		$get_columnnumber =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
			                          

		for ($i = 1 ; $i <= 3 ; $i ++){
			$inserttablecontent = "INSERT INTO `tablechoices`(`form_id`, `content`,`tc_id`) VALUES ('$formid','$untitledtable','$get_columnnumber')";
       		$resulttablecontent = mysqli_query($con,$inserttablecontent); // run query
			               
		}     

		$selectheaders = "SELECT * FROM `tablechoices` WHERE form_id = '$formid' ";
		 $result = mysqli_query($con,$selectheaders); // run query
		 if($result) {
		 $tablecolumncontent = " INSERT INTO `tablecolumn_number`(`formid`,`type`) VALUES ('$formid','content')  ";
		mysqli_query($con,$tablecolumncontent ); // run query

		$get_columnforcontent =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
		 }
		   while($row = mysqli_fetch_array($result)){

		   	$tableids = $row['tble_id'];
		   		$insertcontent = "INSERT INTO `tablecolumn_content`( `tble_id`, `tc_id`, `content`,`formid`) VALUES ('$tableids','$get_columnforcontent','$content','$formid')";
		   			
		   		          mysqli_query($con,$insertcontent); // run query
		   		              
		          
		       }


		       $upt = "UPDATE `form` SET `isset`=1 WHERE form_id='$formid' ";
		       	mysqli_query($con,$upt);
		                      
		                      
	

}
if(isset($_POST['createmlist'])){ 

	$formid = $_POST['formid'];

		/*$sql = " UPDATE `form` SET`ismodifiable`=1 WHERE form_id = '$formid'  ";
			               mysqli_query($con,$sql); // run query*/

	 $upt = "UPDATE `form` SET `isset`=2 WHERE form_id='$formid' ";
		       	mysqli_query($con,$upt);
		                      
for($i = 1 ; $i <=3 ; $i++){
	$insertcontent = "INSERT INTO `tablecolumn_content`( `content`,`formid`,`typ`) VALUES ('Untitle list','$formid',1)";
							   			
		 mysqli_query($con,$insertcontent); // run query     
}
			
	
}


 ?>
 <script src="../../js/jquery.js"></script>

<script>
	$('.questval').keyup(function(){ 
	
			var questval = $(this).val();
			var id = $(this).data('formidd');
			
			
					 $.ajax({
			           url : "action.php",
			            method: "POST",
			             data  : {savequestval:1,qval:questval,id:id},
			             
			             success : function(data){
								
							
			             }
			          })
				
					
			



	})

	$('.qcard').click(function() { 
		var formid = $(this).data('formid');
		var type= $(this).data('types');

	
		$.ajax({
			           url : "opt_pro.php",
			            method: "POST",
			             data  : {setselect:1,formid:formid,types:type},
			              beforeSend: function(  ) {
 						 $('.innerBar').animate({ width: "80%" }, 500);
 								 },
			             success : function(data){
						contents();		
						 $('.innerBar').animate({ width: "100%" }, 500);

						//alert(data);
			             }
			          })
		 

		 $('#clickopen').addClass('d-none');
		      		$('#options').removeClass('d-none');
		      		 $("#options").animate({right: '20px'});
	})
	function contents(){
		
		 $.ajax({
			           url : "action.php",
			            method: "POST",
			             data  : {content:1},
			             success : function(data){
							$('#content').html(data);
							checktitle();
							
			             }
			          })
	}

		function checktitle() {
				  $.ajax({
			           url : "opt_pro.php",
			            method: "POST",
			             data  : {checktitles:1},
			             success : function(data){
								var result = data;
								
							if (result.match('yes')){
								$('.able').removeAttr('disabled');
							}else  {
								$('.able').attr('disabled',true);

							}
							
							
							
			             }


			          })
		}
			function deleteunexpected () {
					$.ajax({
			           url : "opt_pro.php",
			            method: "POST",
			             data  : {delun:1},
			             success : function(data){
							
							
			             }
			          })
			}
	$('.btndel').click(function() { 
			

				var id = $(this).data('fid');
				
				

				 $.ajax({
			           url : "action.php",
			            method: "POST",
			             data  : {delete:1,id:id},
			               beforeSend: function(  ) {
 						 $('.innerBar').animate({ width: "80%" }, 500);
 								 },
			             success : function(data){
								contents();
								 $('.innerBar').animate({ width: "100%" }, 500);
			             }
			          })
				
				
		})
	$('.btndeltitle').click(function() { 
	
				var id = $(this).data('fid');


				
					$.ajax({
			           url : "action.php",
			            method: "POST",
			             data  : {deletetitle:1,id:id},
			              beforeSend: function(  ) {
 						 $('.innerBar').animate({ width: "80%" }, 500);
 								 },

			             success : function(data){
								contents();
								deleteunexpected();
								 $('.innerBar').animate({ width: "100%" }, 500);
			             }
			          })
			

			
				
				
		})
		$('.warning').click(function() { 
			var formid = $(this).data('fid');
				$('#fff').text(formid);
				$('#btnyes').val(formid);
		})
	$('.edittitle').click(function() { 
		var formid = $(this).data('formid');
		$('#formmm').val(formid);
	
	})
	$('.mpchoice').click(function() { 
		var formid = $(this).data('formid');
		
		 $.ajax({
			           url : "opt_pro.php",
			            method: "POST",
			             data  : {mpchoice:1,formid:formid},
			             success : function(data){
							 contents();
						
							
			             }
			          })
	})
	
	$('.shorttext').click(function() { 
			var formid = $(this).data('formid');
		
		 $.ajax({
			           url : "opt_pro.php",
			            method: "POST",
			             data  : {shorttext:1,formid:formid},
			             success : function(data){
							 contents();
							
			             }
			          })
	})

	
	$('.longtext').click(function() { 

 
var formid = $(this).data('formid');
		 $.ajax({
			           url : "opt_pro.php",
			            method: "POST",
			             data  : {longtext:1,formid:formid},
			             success : function(data){
							 contents();
						
			             }
			          })
	})
	
		$('.checkboxss').click(function() { 
			
			
var formid = $(this).data('formid');

		 $.ajax({
			           url : "opt_pro.php",
			            method: "POST",
			             data  : {checkboxss:1,formid:formid},
			             success : function(data){
							 contents();
							
							
			             }
			          })
	})

		$('.email').click(function() { 
			var formid = $(this).data('formid');

		 $.ajax({
			           url : "opt_pro.php",
			            method: "POST",
			             data  : {email:1,formid:formid},
			             success : function(data){
							 contents();
							
							
			             }
			          })
		

		})

		$('.numbers').click(function() { 
			var formid = $(this).data('formid');

		 $.ajax({
			           url : "opt_pro.php",
			            method: "POST",
			             data  : {numbers:1,formid:formid},
			             success : function(data){
							 contents();
							
							
			             }
			          })
		})
		$('.dates').click(function() { 
			var formid = $(this).data('formid');

		 $.ajax({
			           url : "opt_pro.php",
			            method: "POST",
			             data  : {dates:1,formid:formid},
			             success : function(data){
							 contents();
							
							
			             }
			          })
		})
		
	
$(window).scroll(function() {
 var x=window.scrollX;
    var y=window.scrollY;
    window.onscroll=function(){window.scrollTo(x, y);};
  
});




$( ".cardo" ).hover(function() {

  $('.qcard').fadeIn(500);
});
	
</script>

<style type="text/css">
	.cardo:hover {
		
	}
	.qcard {
		text-align: center;
		color: grey;
	}
</style>


