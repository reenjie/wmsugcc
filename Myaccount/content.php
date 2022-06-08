<?php 
session_start();
include '../GCC/create_form/connect.php';
if(isset($_POST['dashboard'])){ 
	?>	
	<style type="text/css">
			#modscroll::-webkit-scrollbar {
  width: 2px;
}

/* Track */
#modscroll::-webkit-scrollbar-track {
  background: #f1f1f1; 
}
 
/* Handle */
#modscroll::-webkit-scrollbar-thumb {
  background: #c1f2c4; 
}

/* Handle on hover */
#modscroll::-webkit-scrollbar-thumb:hover {
  background: #555; 
}


	</style>
	 <div class="">
	 	<div class="row">



	 		 <div class="">
	 		 	 <div class="card-body">
	 		 	 	 <?php 
                                      				$sqlguis = "SELECT * FROM `gui` where id = 3 ";
                                      		                $resultguis = mysqli_query($con,$sqlguis); // run query
                                      		                $countguis= mysqli_num_rows($resultguis); // to count if necessary
                                      		            
                                      		                 while($row = mysqli_fetch_array($resultguis)){
                                      		                 	$scc = $row['sidebar_color'];

                                      		                 	
                                      		                 
                                      		                 }
                                      		          
                                      		 ?>
 <h6>ANNOUNCEMENTS</h6>	  		
<div class="tickerwrapper <?php echo $scc ?>  " id="tickerwrapper" >
 	 	
 	 	  	 	  	
 	 	  	 
		<marquee behavior="scroll" direction="left" id="runningannouncment" class="text-light" style="padding: 5px">

			<?php 
					$announcement = " SELECT * FROM `announcement` order by datecreated desc ";
			                $resultaa = mysqli_query($con,$announcement); // run query
			                $countaa= mysqli_num_rows($resultaa); // to count if necessary
			               //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
			             if ($countaa>=1){
			             	//while($row = mysqli_fetch_array($result)){} is where we output all the data in database
			                 while($row = mysqli_fetch_array($resultaa)){
			                 	echo '<span style="margin-left:10px"> </span>'.date('F d,Y l',strtotime($row['datecreated'])).' <span style="font-weight:bolder"> : </span> '.$row['content'].'<span style="margin-left:10px">... </span>';
			
			                 }
			          }
			 ?>
		</span>

	</marquee>



				</div>
	 		 	 </div> 
	 		 	 
	 		 </div> 
	 		 
	 	


	 		<br>
	 		
	 		 


	 	</div>

	 	 <div class="  mt-3">
	 		 	<div class="card-body">
	 		 		 <div class=" mb-4">
	 		 		 	<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
        <?php 
              $carousel = "SELECT * FROM `carousel` ";
                          $resultcc = mysqli_query($con,$carousel); // run query
                          $countcc= mysqli_num_rows($resultcc); // to count if necessary
                         //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
                       if ($countcc>=1){
                         //while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                           while($row = mysqli_fetch_array($resultcc)){
                            $statuscc = $row['status'];
                            $src = '../GCC/img/'.$row['imagename'];
                            if($statuscc == 1){
                              ?>
                               <div class="carousel-item active" >
                          <img class="d-block w-100 citem" src="<?php echo $src ?>" alt="First slide" style="height: 400px">
                        </div>
                              <?php
                            }else {
                              ?>
                       <div class="carousel-item" >
                    <img class="d-block w-100 citem" src="<?php echo $src ?>" alt="Third slide" style="height: 400px">
                  </div>
                              <?php
                            }
                          
                           }
                    }

         ?>
    </div>
  </div>
 <!-- <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a> -->
</div>
	 		 		 <!--	<div class="row">
	 		 		 		<div class="col-md-7">
	 		 		 			<img src="img/undraw_My_answer_re_k4dv.png" class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 100%;"> 
	 		 		 		</div>
	 		 		 		<div class="col-md-5">

	 		 		 			<span style="font-size: 12px">
	 		 		 			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	 		 		 			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	 		 		 			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	 		 		 			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	 		 		 			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	 		 		 			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
	 		 		 			</span>
	 		 		 		</div>
	 		 		 	</div>-->
	 		 		 </div> 
	 		 		 <hr>

	 		 		 <button class="btn btn-light" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" style="font-size: 12px;width: 100%;">
					  Staff of WMSU Guidance and Counseling Center
					  </button>
</p>
					<div class="collapse" id="collapseExample">
					  <div class=" card-body">
					   		 <div class="row">
	 		 			 		 <div class="container" id="modscroll" style="overflow-y: scroll;height:  600px;text-align: center;">
	 		 			 		 	<h6>The Staff of WMSU Guidance and Counseling Center</h6>

	 		 			 		 	   <div class="row" >

                  
                
                   


                   
                      
                     
                         <?php 
                          //
 
          $sql = "SELECT * FROM `pages` where type =1 order by display_order asc  ";
                      $result = mysqli_query($con,$sql); 
                   
                       while($row = mysqli_fetch_array($result)){
                       
                        $photo = $row['photo'];

                        if($photo == '' || $photo == NULL) {
                          $src = '../GCC/img/undraw_profile_pic_ic5t.png';
                        }else {
                          $src = '../GCC/img/uploads/'.$photo;
                        }

                        ?> 
                         <div class="col-md-4" style="text-align: center;">
                           
                         <div class="card mb-2 shadow staffs" style="height: 300px">
                            <div class="card-body">
                                  <img src="<?php echo $src ?>" class="mt-4" style="width: 120px;height: 120px;border-radius: 100px" class=""><br style="user-select: none">
                  <span style="font-size: 12px;font-weight: bolder" class="mb-4">
                   <?php echo $row['fullname'] ?>
                        <br>
                  <span style="font-weight: normal;"><?php echo $row['pos'] ?></span>
                  </span>

                            </div> 
                            
                         </div> 
                         </div> 
                         
                       
                        <?php
                       }
                

                     ?>
   


                       </div> 






	 		 			 		 </div> 
	 		 			 		 
	 		 			 		 
	 		 			 			 	


	 		 			 </div> 
					  </div>
					</div>

					<hr>

					 <div class="container">
					 			<h6>WMSU Guidance Counceling Center <br>Mission and Vision</h6>

							<br>
							<h6 style="font-weight: bold;text-align: center;">Vision</h6>
	 		 			<p style="font-size: 14px">
	 		 				The University of Choice for higher learning with strong research orientation that produces professionals who are socially responsive to and responsible for human development, ecological sustainability; and, peace and security within and beyond the region.
	 		 			</p>

	 		 			<br>
							<h6 style="font-weight: bold;text-align: center;">Mision</h6>
	 		 			<p style="font-size: 14px">
	 		 				Guided by the vision and mission of the Western Mindanao State University, the Guidance & Counseling Center is committed to provide the highest professional standards in guidance services so that the client it serves will continue to grow and develop to become economically self-sufficient, psychological stable, morally, spiritually upright and contributing citizens in society.
	 		 			</p>
	 		 			 
					 </div> 
					 

				
	 		 			 

	 		 	</div>
	 		 </div> 
	 </div> 
	 

	<?php
}
if(isset($_POST['forms'])){ 
	
	 
				?>
				<style type="text/css">
			#modscroll::-webkit-scrollbar {
  width: 2px;
}

/* Track */
#modscroll::-webkit-scrollbar-track {
  background: #f1f1f1; 
}
 
/* Handle */
#modscroll::-webkit-scrollbar-thumb {
  background: #c1f2c4; 
}

/* Handle on hover */
#modscroll::-webkit-scrollbar-thumb:hover {
  background: #555; 
}


	</style>

					 <div class="container">


		 		
		 		 <div class="row">
				<?php

							$sql = " select * from form_classification where csform_id IN (62,60) order by datecreated";
						                $result = mysqli_query($con,$sql); 
						               
						                 while($row = mysqli_fetch_array($result)){
						                 	$date = $row['lastmodified'];
						                 	 $status = $row['status'];
						                 	 $csid = $row['csform_id'];
						                 	 $isenabled = $row['isenabled'];
						                 
						              

						                 
							?>	
					<div class="col-md-6">

										     
								 <div class="card shadow-sm mb-1" style="border-left: 2px solid #36b9cc;height: 150px">

                                <div class="card-body" style="font-size: 14px">
                                
                                	 
                                  <div class="container">
                                   	<div class="row">
                                   		<div class="col-sm-6">
                                   			<h6 style="font-weight: bolder;"><?php echo $row['form_name'] ?></h6>
                                   	
                                   			<?php 
										      				if($csid == 60){

										      				?>

										      					<a href="javascript:void(0)" class="btn btn-light text-success viewstatus" style="font-size:11px;text-decoration: none;letter-spacing: 1px;">VIEW STATUS</a>
										      				<?php
										      				
										      				}

										      				 ?>
                                   			<h6 style="font-size: 12px">Last Modified: <?php 

										     
										  echo '@'.date("g:ia",strtotime($row['lastmodified'])).'<br>'.date("F-d-o",strtotime($row['lastmodified'])) ;
										      ?>
										      		



										      </h6>


                                   		</div>

                                   		<div class="col-sm-6">
                                   				
                                   			
										    
                                   			<br style="user-select: none">
                                   				 

                                   				  	 
										  	
										  		<!--<button type="button" class="btn btn-primary edit" style="font-size: 12px;float: right; " data-csformid = "<?php echo $row['csform_id'] ?>" style="font-size: 12px; " data-toggle="tooltip" data-placement="right" title="Edit Form"> 
										  			Response  <i class=" ml-1 fas fa-share-square"></i>
										  	 </button>-->
										  	 <?php 
										  	 $usertoken = $_SESSION['user_student_token_check'];
										  	 	$sqlss = " SELECT * FROM `form_response` WHERE userid = '$usertoken' and csformid='$csid' and freed = 0 ";
										  	 	 $results = mysqli_query($con,$sqlss); 
										  	 	             	
										  	 	    $counts= mysqli_num_rows($results);
										  	 	           if($counts >=1){

										  	 	                         
										  	 	                 while($rowe = mysqli_fetch_array($results)){
										  	 					$csexist = $rowe['csformid'];
										  	 					$approvestat = $rowe['approvestat'];
										  	 					$shid = $rowe['shifting_history'];
										  	 					$status = $rowe['status'];



										  	 					 }



										  	 					
										  	 	                 	          
										  	 if($csexist==62){
							
										  	 	$CollegeId=$_SESSION['student_college'];
										  	 	  $token = $_SESSION['user_student_token_check'];
										
										  	 	  	include 'update_form.php';

										  	 	  /////--------//////

										  	 /////--------//////
										  	
										  	 }else if ($csexist==60){

										  	 	if($isenabled == 1) {

										  	 		if($approvestat == 2){
										  	 			include 'stat2.php';

										  	 		}else {

										  	if ($status == 'declined'){

										  			$get_shiftdata = "select * from shifting_history where sh_id = '$shid'  ";
										  			 $gttingshiftdata = mysqli_query($con,$get_shiftdata); 
										  			
										  		 while($gsh = mysqli_fetch_array($gttingshiftdata)){
										  						$college =  $gsh['to_'];	
										  						$kurso = $gsh['to_course'];	
										  						$c1 = $gsh['choice_course1'];
										  						$c2 = $gsh['choice_course2'];
										  						$c3 = $gsh['choice_course3'];
										  						$o1 = $gsh['c1'];
										  						$o2 = $gsh['c2'];
										  						$o3 = $gsh['c3'];
										  						$re = $gsh['reason'];
										  						$string = explode(',',$re);

										  						$suggestion = $gsh['suggestion_course'];
										  					
										  			 }

										  			 	$getkurso = "select * from course   ";
										  			 	 $get_kurso = mysqli_query($con,$getkurso); 
										  			
										  			  while($gk = mysqli_fetch_array($get_kurso)){
										  			  	
										  			  	if($kurso == $gk['courseid']){
										  			  		$krso = $gk['course'];	
										  			  	}

										  			  	if($c1 == $gk['courseid']){
										  			  			$k1 = $gk['course'];
										  			  	}
										  			  	if($c2 == $gk['courseid']){
										  			  			$k2 = $gk['course'];
										  			  	}
										  			  	if($c3 == $gk['courseid']){
										  			  			$k3 = $gk['course'];
										  			  	}

										  			  	if($suggestion == $gk['courseid']){
										  			  		$sugg = $gk['course'];

										  			  	}
										  			 					
										  	 }

										  			 	  	$getcoll = "select * from colleges where CollegeId= '$college'  ";
										  			 	 $get_coll = mysqli_query($con,$getcoll); 
										  			
										  			  while($gcol = mysqli_fetch_array($get_coll)){
										  			 				$cllg = $gcol['college'];		
										  			 	 }

										  			 		$getsf_content = "select * from sf_content where stud_id = '$token' and status = 6 and sfs = '$shid'  ";
										  			 		 $getdata_sf = mysqli_query($con,$getsf_content); 
										  			 		
										  			 	 while($sfdata = mysqli_fetch_array($getdata_sf)){
										  			 				$sfcontent = $sfdata['content'];

										  			 				if($sfcontent == 'selected'){
										  			 				$sftype[] = $sfdata['type'];


										  			 				}			
										  			 		 }
										  			 	
										  			 	 
										  			 
										  			  
										  		
										  		 
										  	 		?>
										  
<button type="button" class="btn btn-danger" style="font-size: 12px;float: right;width: 100px;margin-top: -20px" data-toggle="modal" data-target="#Req_declined">
 	<i class="fas fa-exclamation-triangle"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="Req_declined" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
     
      <div class="modal-body">
      	<button type="button" class="close mb-5" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
       <br>
       	<div class="container">

       		<h6 style="font-size: 14px">
       			Your Shifting Request to <span style="font-weight:bolder;"><?php echo $krso ?> { <?php echo $cllg ?> }</span> has been <span class="text-danger font-weight-bold">DECLINED</span>, Due to the Following Reasons : 
       			<br><br>
       			<ul>
       				
       				<?php 
       					foreach ($string as $key => $value) {
       						switch ($value) {
       							case '1':
       									?>
       									<li>Did not meet the grade requirements</li>
       									<?php
       								break;
       								case '2':
       								?>
       									<li>Did not meet other requirements</li>
       									<?php
       								break;
       								case '4':
       									?>
       									<li>No Vacant slots</li>
       									<?php
       								break;
       								case '5':
       								?>
       									<li>Failed in Interview</li>
       									<?php
       								break;
       							
       						
       						}
       					}
       				 ?>
       			</ul>

       		<hr>
       		<?php 
       		if(isset($sugg)){
       			
       		echo 	'Suggested Course By GCC :';

       			
       		?>
       		<br>
       		<div class="card">
       			<div class="card-body">
       				<div class="row">
       					<div class="col-md-6">
       						<span style="font-size:12px" class="text-primary">Suggested</span> <br>
       						<?php 
       					
       							echo $sugg;
       							?>
       							<br>
       							<button class="btn btn-light text-primary reselect" data-sug="<?php echo $suggestion ?>" data-courseid = "<?php 	echo $suggestion; ?>" data-shid="<?php echo $shid ?>" style="font-size:12px">Select  </button>
       							<?php
       						

       						 ?>
       					</div>
       					<div class="col-md-6">
       						
       						<?php 
       						$st =  explode(',',$re);
       						foreach ($st as $key => $value) {
       							
       								switch ($value) {
       							case '1':
       									
       								break;
       								case '2':
       								
       								break;
       								case '4':
       									
       								
       								break;
       								case '5':
       							
       								break;
       								

       								default :
       								echo $value;
       								break;
       						
       						}


       						}


       						 ?>
       					</div>
       				</div>
       					

       			</div>
       		</div>
       	
       		<?php


       			
       		echo '<br>';	
       			
       		}else {
       			?>
<div class="card">
       			<div class="card-body">
       				<div class="row">
       					
       					
       						<?php 
       						$st =  explode(',',$re);
       						foreach ($st as $key => $value) {
       							
       								switch ($value) {
       							case '1':
       									
       								break;
       								case '2':
       								
       								break;
       								case '4':
       									
       								
       								break;
       								case '5':
       							
       								break;
       								

       								default :
       								echo $value;
       								break;
       						
       						}


       						}


       						 ?>
       					
       					

       			</div>
       		</div>
       	</div>
       	
       			<?php
       		}

       		 ?>
       			Reselect to Your Choices :<br>
       			<div class="row">
       				<div class="col-md-4">
       					<span style="font-size:12px" class="text-primary">First Choice</span> <br>
       						<?php 
       						if($o1 >= 1){
       							?>
       							<span><?php echo $k1 ?></span>
       							<br>
       								<span style="font-size:10px">Status:</span>
       							<span style="font-size:11px" class="text-danger">DECLINED <i class="fas fa-ban"></i></span>
       							<?php
       						}else{
       							echo $k1;


       						}

       						 ?>
       				</div>
       					<div class="col-md-4">
       					<span style="font-size:12px" class="text-primary">Second Choice</span> <br>
       						<?php 
       						if($o2 >= 1){
       							?>
       							<span><?php echo $k2 ?></span>
       							<br>
       								<span style="font-size:10px">Status:</span>
       							<span style="font-size:11px" class="text-danger">DECLINED <i class="fas fa-ban"></i></span>
       							<?php
       						}else{
       							echo $k2;
       							?>
       							<br>
       							<button class="btn btn-light text-primary reselect" data-sug="s" data-courseid = "<?php 	echo $c2; ?>" data-shid="<?php echo $shid ?>" style="font-size:12px">Select  </button>
       							<?php
       						}

       						 ?>
       				</div>
       					<div class="col-md-4">
       					<span style="font-size:12px" class="text-primary">Third Choice</span> <br>
       						<?php 
       							if($o3 >= 1){
       							?>
       							<span><?php echo $k3 ?></span>
       							<br>
       							<span style="font-size:10px">Status:</span>
       							<span style="font-size:11px" class="text-danger">DECLINED <i class="fas fa-ban"></i></span>
       							<?php
       						}else{
       							echo $k3;
       								?>
       							<br>
       							<button class="btn btn-light text-primary reselect" data-sug="s" data-courseid = "<?php 	echo $c3; ?>" data-shid="<?php echo $shid ?>" style="font-size:12px">Select </button>
       							<?php
       						}
       						?>
       				</div>
       			</div>
       		


       		</h6>

       	</div>
      </div>
      <div class="modal-footer">
      	<button class="btn btn-light text-primary form-control reset" data-shid="<?php echo $shid ?>" style="font-size:12px">Choose another Set of Choices </button>
      </div>
     
    </div>
  </div>
</div>


										  	 		<?php	

										  	 			}else {
										  	 					?>
										  
													  	 <span class="badge badge-warning" style="font-size: 12px;float: right;width: 100px;margin-top: -20px">On Process </span>

										  	 		<?php	

										  	 			}
 								


										  

										  	 		}
										  	

										  	 	}else {
										  	 		
										  	 			?>
										  	 	

										  	 		<div class="dropdown">
										  <button class="btn btn-light text-danger dropdown-toggle" style="font-size: 13px;margin-top: -20px" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										   Unavailable
										  </button>
										  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
										  	 <div class="container">
										  <p style="font-size: 12px" class="text-secondary">
										 		Shifting form is not allowed as of this moment for the following reasons :
										 		<br>
										 		<ul style="font-size: 12px" class="text-secondary">
										 			<li>Enrollment is done.</li>
										 			<li>The time for shifting schedules or examination was done</li>
										 			<li>It might be modified by the GCC</li>
										 		</ul>

										 		<br>
										 		For more info. please visit our Office.


										 	</p>
										  	 </div> 
										  	 
										 
										   
										  </div>
										</div>
										  	 		<?php
										  	 		
										  	 	}
										  	 
										  	 	
										  	 	
										  	 	/*?>
										  	 	 <button class="btn btn-primary mt-2 review" data-csformid = "<?php echo $row['csform_id'] ?>" style="font-size: 12px;float: right;width: 100px">
										  	 	View
										  	 </button>
										  	 	<?php*/
										  	 }


										  	 	                
										}else {

                                	
                                	 
											if($csid == 62){


													if($isenabled == 1) {

															  $usertoken = $_SESSION['user_student_token_check'];
                    	  $sqlst = " select * from student where stud_id = '$usertoken'  ";
                                                $resultst = mysqli_query($con,$sqlst); // run query
                                                
                                                 while($rowst = mysqli_fetch_array($resultst)){
                                                     $isver = $rowst['isverified'];

                                                    	if($isver == 0){
                                ?>	
																<div class="dropdown">
										  <button class="btn btn-light text-danger dropdown-toggle" style="font-size: 12px;margin-top: -20px" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										  Not Verified
										  </button>
										  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
										  	 <div class="container">
										  <p style="font-size: 12px" class="text-secondary">
										 		Your Account is not yet verified. Please Contact your Designated College Coordinator to further assist you with your issue.
										 		<br>

										 		<h6 style="font-size:13px"><span style="font-weight:bolder">Coordinator Contact Info:</span><br>
										 			<span class="text-info">
										 		<?php 
										 		$ccid = $_SESSION['student_college'];

										 			$admin = "select * from administrator where edstat = 0  ";

					          		                $resultcheck = mysqli_query($con,$admin); 
					          		               
					          		                 while($rowcol = mysqli_fetch_array($resultcheck)){
					          		                 	$college_id = $rowcol['CollegeId'];

					          		                 	if($ccid == $college_id){

					          		                 		echo $rowcol['admin_contactno'].'<br>'.$rowcol['admin_email'];

					          		                 	}
					          		                 }
										 		 ?></span>
										 		 </h6>
										 	</p>
										  	 </div> 
										  	 
										 
										   
										  </div>
										</div>
														<?php
                                                    	}else {

                                                    		 $countingpdstemp = "select userid from temp_answers where csformid ='62' and userid ='$usertoken'  ";
                                 $countingpds_temp = mysqli_query($con,$countingpdstemp); 
                                 $countingpdstemp_= mysqli_num_rows($countingpds_temp);

                                 if($countingpdstemp_ >= 1){
                                    	  ?>	
														 <button class="btn btn-warning fillup"  data-csformid = "<?php echo $row['csform_id'] ?>"  data-formtype="pds"   style="font-size: 12px;float: right;width: 100px;margin-top: -20px">
													  	 Continue
													  	 </button>
														<?php
                                 }else {

                                 	  ?>	
														 <button class="btn btn-success " data-toggle="modal" data-target="#promptcourseforpds" data-backdrop="static" data-keyboard="false" data-csformid = "<?php echo $row['csform_id'] ?>"  data-formtype="pds"   style="font-size: 12px;float: right;width: 100px;margin-top: -20px">
													  	 	Fill up
													  	 </button>
														<?php


                                 }

                              



                                                    	}


                                                    }

														
													}else {
														?>
														<div class="dropdown">
										  <button class="btn btn-light text-danger dropdown-toggle" style="font-size: 13px;margin-top: -20px" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										   Unavailable
										  </button>
										  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
										  	 <div class="container">
										  <p style="font-size: 12px" class="text-secondary">
										 		PDS form is Unavailable as of this moment for the following reasons :
										 		<br>
										 		<ul style="font-size: 12px" class="text-secondary">
										 			<li>The guidance office may have changed the contents of the PDS form.</li>
										 			<li>For security or other important reasons, the PDS form may have been set to unavailable.</li>
										 			
										 		</ul>

										 		<br>
										 		Please try again later.


										 	</p>
										  	 </div> 
										  	 
										 
										   
										  </div>
										</div>
														<script type="text/javascript">
															
															$(document).ready(function() {
															      	$('#ribbontext').html('Unavailable');
															      });      
														      	
														</script>
														<?php

													}
												?>	
										  	 			
													  	 <!-- <button class="btn btn-secondary mt-2" disabled=""  style="font-size: 12px;float: right;width: 100px">
													  	 	Modify
													  	 </button>-->


													  	 <!----------------------------------------------------------------------------------------------------------------------------------------------->
										  	 	  	 <!-- Modal -->
										  	 <div class="modal fade" id="promptcourseforpds" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
										  	   <div class="modal-dialog modal-dialog-centered" role="document">
										  	     <div class="modal-content">
										  	   
										  	       <div class="modal-body">
										  	       	<h6>Filling up PDS</h6>

										  	       	<hr>
													
										  	       	<span>
										  	       		Note : Please provide complete and factual data that is required when filling up your personal data sheets.
										  	       	</span>
										  	       	<hr>
										  	        	
										  	        	
										  	         <button type="button" class="btn btn-primary fillup " style="font-size:12px;float: right;" data-csformid = "62"  data-formtype="pds">Proceed</button>

										  	          <button type="button" class="btn btn-secondary mr-2 cancelshift" style="font-size:12px;float: right;" data-dismiss="modal">Cancel</button>
										  	 
										  	 
										  	        
										  	       </div>
										  	     
										  	     </div>
										  	   </div>
										  	 </div>

<!----------------------------------------------------------------------------------------------------------------------------------------------->

										  	 			<?php
	
											}else if ($csid == 60){


												
													$chckpds = "  SELECT * FROM `form_response` WHERE userid = '$usertoken' and csformid='62' ";
													                $ckpds = mysqli_query($con,$chckpds);
													                $cntpds= mysqli_num_rows($ckpds);
													               
													             if ($cntpds >=1){

													             

													             		if($isenabled == 1) {
													             				 $idofcollege=$_SESSION['student_college'];
													             				$checkif_availableforbetatest = "select * from colleges where CollegeId ='$idofcollege' and test = 1  ";
													             				 $checkingavailability = mysqli_query($con,$checkif_availableforbetatest); 
													             				 $check_availability= mysqli_num_rows($checkingavailability);
													             				
													             				if($check_availability >=1){
													   ?>
										  		 <button class="btn btn-success "   style="font-size: 12px;width: 100px;margin-top: -20px"  data-toggle="modal" data-target="#promptcourse" data-backdrop="static" data-keyboard="false">
										  	 	Fill up
										  	 </button>

										  	 	<?php	
													             			 }else {
															
																	?>
																	<span style="font-size:12px;float: right;padding: 10px;margin-top: -30px;" class="text-secondary">Not Applicable</span>
																	<?php
													             			 }



										  	 		
										  	 	}else {

										  	 		?>
										  	 	

										  	 		<div class="dropdown">
										  <button class="btn btn-light text-danger dropdown-toggle" style="font-size: 13px;margin-top: -20px" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										   Unavailable
										  </button>
										  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
										  	 <div class="container">
										  <p style="font-size: 12px" class="text-secondary">
										 		Shifting form is not allowed as of this moment for the following reasons :
										 		<br>
										 		<ul style="font-size: 12px" class="text-secondary">
										 			<li>Enrollment is done.</li>
										 			<li>The time for shifting schedules or examination was done</li>
										 			<li>It might be modified by the GCC</li>
										 		</ul>

										 		<br>
										 		For more info. please visit our Office.


										 	</p>
										  	 </div> 
										  	 
										 
										   
										  </div>
										</div>
										  	 		<?php

										  	 	}
													             	
													          }else {
													          	
													          	// put here the code to restrict .. IN GCC on off button
													          	if($isenabled == 1) {
										  	 				?>
													          	<div class="dropdown">
															  <button class="btn btn-light text-danger dropdown-toggle" style="font-size: 12px;font-weight: bolder;margin-top: -20px" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
															   Prerequisite
															  </button>
															  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
															     <div class="container">
															     	<span class="text-danger" style="font-size: 13px;font-weight: bold; ">
													       		<i class="fas fa-info-circle"></i> The Personal Data Sheets should be finished. prior to being able to access the shifting form.
													          	</span>
															     </div> 
															     
															  </div>
															</div>

													          
													          	 
													         
													          	<?php

										  	 	}else {

										  	 		?>
										  	 	

										  	 		<div class="dropdown">
										  <button class="btn btn-light text-danger dropdown-toggle" style="font-size: 13px;margin-top: -20px" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										   Unavailable
										  </button>
										  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
										  	 <div class="container">
										  <p style="font-size: 12px" class="text-secondary">
										 		Shifting form is not allowed as of this moment for the following reasons :
										 		<br>
										 		<ul style="font-size: 12px" class="text-secondary">
										 			<li>Enrollment is done.</li>
										 			<li>The time for shifting schedules or examination was done</li>
										 			<li>It might be modified by the GCC</li>
										 			<li>You have not filled up your PDS form yet</li>
										 		</ul>

										 		<br>
										 		For more info. please visit our Office.


										 	</p>
										  	 </div> 
										  	 
										 
										   
										  </div>
										</div>
										  	 		<?php

										  	 	}

													          

													          }


												?>
										  	

										  	


										  	
										  	 
										  	 <!-- Modal -->
										  	 <div class="modal fade" id="promptcourse" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
										  	   <div class="modal-dialog modal-lg" role="document">
										  	     <div class="modal-content">
										  	   
										  	       <div class="modal-body">
										  	       	<h6>Select a course you wish to shift</h6>

										  	       	<span style="font-size:12px" class="text-danger">Note: Your <span class="text-primary">First Choice</span> is the Priority. If you want to change choice course, just hit cancel</span>
										  	       	<hr class="line">
<div class="list-group" id="cc">
 
  	<?php 
  					$sqlcc = " SELECT * FROM `course`  ";
	                $resultcc = mysqli_query($con,$sqlcc); // run query
	                $countcc= mysqli_num_rows($resultcc); // to count if necessary
	               //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
	             if ($countcc>=1){
	             	//while($row = mysqli_fetch_array($result)){} is where we output all the data in database
	                 while($row = mysqli_fetch_array($resultcc)){
	                 	$kurso = $row['course'];
	                 	$kid = $row['courseid'];
	                 	$colsid = $row['CollegeId'];
	                 	if($kurso == $_SESSION['student_course']){
	                 	
	                 	}else {
	                 $sem = $_SESSION['sem'];

	                 	$checkif_denied = "select * from shifting_history where semester = '$sem' and to_course = '$kid' and stud_id = '$usertoken' and status = 'Declined'  ";
	                 	 $deniedrequest = mysqli_query($con,$checkif_denied); 
	                 	 $countde= mysqli_num_rows($deniedrequest);
	                 	 //$newlyinsertedid = mysqli_insert_id($con);
	                 	if($countde >=1){
	                 	?>
	 							
	 								  	<a href="javascript:void(0)" class="list-group-item list-group-item-action" id="rem<?php echo $row['courseid'] ?>" style="text-align: left;cursor: not-allowed;">
   					<del><?php echo $row['course'] ?></del><span style="float: right;font-size: 12px" class="text-secondary">

   					 <?php /*
   							if($sem == '1stsem'){
   								echo 'First Semester';
   							}else if ($sem == '2ndsem'){
   								echo 'Second Semester';
   							}else if ($sem == 'summer'){
   								echo 'Summer';
   							}
									*/
   						 ?> 
   						Declined <i class="fas fa-ban text-danger"></i>
   </span>
  </a>
	                 	<?php
	                  }else {
	                  		?>
	                  	
	                 	<a href="javascript:void(0)" class="list-group-item list-group-item-action" id="rem<?php echo $row['courseid'] ?>" style="text-align: left;">
   <?php echo $row['course'] ?><span style="float: right;"><button style="border: none" class="text-primary select1course choice" data-value="<?php echo $row['course'] ?>" data-coll="<?php echo $row['CollegeId'] ?>" data-id="<?php echo $row['courseid'] ?>" id="course0<?php echo $row['courseid'] ?>" >First Choice <br>  <span class="text-danger" style="font-size:12px" id="error<?php echo $row['courseid'] ?>"></span></button>



   	<button style="border: none" class="text-primary select2course d-none " id="course<?php echo $row['courseid'] ?>" data-value="<?php echo $row['course'] ?>" data-coll="<?php echo $row['CollegeId'] ?>" data-id="<?php echo $row['courseid'] ?>" >Second Choice <br><span class="text-danger" style="font-size:12px" id="error1<?php echo $row['courseid'] ?>"></span></button>


   	<button style="border: none" class="text-primary select3course d-none " id="course2<?php echo $row['courseid'] ?>" data-value="<?php echo $row['course'] ?>" data-coll="<?php echo $row['CollegeId'] ?>" data-id="<?php echo $row['courseid'] ?>" >Third Choice <br><span class="text-danger" style="font-size:12px" id="error2<?php echo $row['courseid'] ?>"></span></button>


   </span>
  </a>
  		<textarea style="font-size: 13px" id="reason<?php echo $row['courseid'] ?>" class="form-control r1 d-none" rows="5"></textarea>
	   <button id="reasonbtn<?php echo $row['courseid'] ?>" class="btn btn-success d-none rb1" style="font-size: :12px;">Next</button>

	   	<textarea style="font-size: 13px" id="reason2<?php echo $row['courseid'] ?>" class="form-control d-none r2" rows="5"></textarea>
	   <button id="reasonbtn2<?php echo $row['courseid'] ?>" class="btn btn-success d-none rb2" style="font-size: :12px;">Next</button>


	   <textarea style="font-size: 13px" id="reason3<?php echo $row['courseid'] ?>" class="form-control d-none r3" rows="5"></textarea>
	   <button id="reasonbtn3<?php echo $row['courseid'] ?>" class="btn btn-success d-none rb3" style="font-size: :12px;">Next</button>

	   	
  
	                 	<?php
	                  }

	                 		?>
 
	
			<?php
		//	echo $colsid;

	                 	}

			
	
	                 }
	          }

  	 ?>

</div>

										  	       	<hr class="line">
										  	       	<div class="card mt-2 mb-2">
																<div class="card-body">
										  	       				
										  	       				<div class="chosen row">
										  	       						
										  	       				

										  	       				</div>


										  	       		</div>
										  	       	</div>
										  	        	
										  	        	
										  	         <button type="button" class="btn btn-primary fillup " disabled="" style="font-size:12px;float: right;" data-csformid = "60"  data-formtype="shift">Proceed</button>

										  	      
										  	          <button type="button"  class="btn btn-secondary mr-2 cancelshift" style="font-size:12px;float: right;" >Cancel</button>

										  	          
										  	
										  	 
										  	        
										  	       </div>
										  	     
										  	     </div>
										  	   </div>
										  	 </div>




										  	 <script type="text/javascript">
										  	 	
										  	 	$(document).ready(function() {
										  	 	      	$('.select1course').click(function() { 
										  	 	      			 $('.r1').addClass('d-none');
										  	 	      			 $('.rb1').addClass('d-none');
										  	 	      		var value = $(this).data('value');
										  	 	      		var id = $(this).data('id');
										  	 	      		var colid = $(this).data('coll');

										  	 	      		var reason ='';
										  	 	      $('#reason'+id).removeClass('d-none').focus();
										  	 	      $('#reason'+id).attr('placeholder','Input Reason for Shifting to '+value);
										  	 	      $('#reasonbtn'+id).removeClass('d-none').html('Select '+value+" (First Choice)");
										  	 	     	 $('#reason'+id).keyup(function(){
										  	 	     		$('#reason'+id).removeClass('is-invalid');
										  	 	     	 
										  	 	     	 })

										  	 	      $('#reason'+id).focusout(function(){
										  	 	      	 reason = $(this).val();
										  	 	      	
										  	 	      })




														  	 	      $('#reasonbtn'+id).click(function(){
														  	 	      	
														  	 	      	
														  	 	      		if(reason == ''){
														  	 	      			$('#reason'+id).addClass('is-invalid');
														  	 	      		}else {
														  	 	      				
														  	 	      						$('#rem'+id).addClass('d-none');

										  	 	      		$('.chosen').append('	<div class="col-md-4"> <div class="card"><div class="card-body"><h6 style="font-size:12px" class="text-danger">First Choice { Priority }</h6><h6 style="font-weight:bolder;font-size:14px">'+value+'</h6>  <h6 style="font-size:13px">Reason : <br> '+reason+'</h6></div></div></div>');

										  	 	      		
										  	 	      		$('.select2course').removeClass('d-none');
										  	 	      		$('#course'+id).addClass('d-none');
										  	 	      		

										  	 	      		$('.choice').addClass('d-none');


										  	 	      		   $.ajax({
										  	 	      		           url : "action.php",
										  	 	      		            method: "POST",
										  	 	      		             data  : {setsessionshiftcourse:1,coursechoice:value,collid:colid,reason:reason},
										  	 	      		             success : function(data){
										  	 	      								 $('#reason'+id).addClass('d-none');
										  	 	      								 $('#reasonbtn'+id).addClass('d-none')
										  	 	      								 $('.r1').addClass('d-none');
										  	 	      								 $('.rb1').addClass('d-none');

										  	 	      		             }
										  	 	      		          })

														  	 	      		}


														  	 	      })
										  	 	      

										  	 	    
										  	 	    /* 	let reason = prompt("Reason for Shifting to "+value+" :");

										  	 	      	if (reason == null || reason == "") {
																		  	$('#error'+id).text("Please provide your reason to proceed");
																		} else {

																		


										  	 	      		
										  	 	      		
										  	 	      		   $.ajax({
										  	 	      		           url : "action.php",
										  	 	      		            method: "POST",
										  	 	      		             data  : {setsessionshiftcourse:1,coursechoice:value,collid:colid,reason:reason},
										  	 	      		             success : function(data){
										  	 	      		
										  	 	      		             }
										  	 	      		          })
																		
																		} 
 	
										  	 	      		  */    
										  	 	      		    
										  	 	      		
										  	 	      	
										  	 	      	})

										  	 	      	$('.select2course').click(function(){
										  	 	      			 $('.r2').addClass('d-none');
										  	 	      			 $('.rb2').addClass('d-none');
										  	 	      			var value = $(this).data('value');
										  	 	      		var id = $(this).data('id');
										  	 	      			var colid = $(this).data('coll');

										  	 	      			var reason ='';
										  	 	      $('#reason2'+id).removeClass('d-none').focus();
										  	 	      $('#reason2'+id).attr('placeholder','Input Reason for Shifting to '+value);
										  	 	      $('#reasonbtn2'+id).removeClass('d-none').html('Select '+value+" (Second Choice)");
										  	 	     	 
										  	 	     	 $('#reason2'+id).keyup(function(){
										  	 	     		$('#reason2'+id).removeClass('is-invalid');
										  	 	     	 
										  	 	     	 })

										  	 	     

																		     $('#reason2'+id).focusout(function(){
										  	 	      	 reason = $(this).val();
										  	 	      	
										  	 	      })




														  	 	      $('#reasonbtn2'+id).click(function(){
														  	 	      	
														  	 	      	
														  	 	      		if(reason == ''){
														  	 	      			$('#reason2'+id).addClass('is-invalid');
														  	 	      		}else {
														  	 	      				
														  	 	      						$('#rem'+id).addClass('d-none');

										  	 	      		$('.chosen').append('	<div class="col-md-4"> <div class="card"><div class="card-body"><h6 style="font-size:12px" class="text-danger">Second Choice</h6><h6 style="font-weight:bolder;font-size:14px">'+value+'</h6>  <h6 style="font-size:13px">Reason : <br> '+reason+'</h6></div></div></div>');
										  	 	      			$('.select2course').addClass('d-none');
										  	 	      			$('.select3course').removeClass('d-none');

										  	 	      		
										  	 	      		   $.ajax({
										  	 	      		           url : "action.php",
										  	 	      		            method: "POST",
										  	 	      		             data  : {setsessionshiftcourse2:1,coursechoice:value,collid:colid,reason:reason},
										  	 	      		             success : function(data){
										  	 	      						 $('#reason2'+id).addClass('d-none');
										  	 	      								 $('#reasonbtn2'+id).addClass('d-none')
										  	 	      							
										  	 	      		             }
										  	 	      		          })
										  	 	      		      


										  	 	      		 

														  	 	      		}


														  	 	      })
										  	 	      

										  	 	      			


										  	 	      			  		
										  	 	      	})

										  	 	      	  	$('.select3course').click(function(){
										  	 	      	  			 $('.r3').addClass('d-none');
										  	 	      			 $('.rb3').addClass('d-none');
										  	 	      			var value = $(this).data('value');
										  	 	      	
										  	 	      		var id = $(this).data('id');
										  	 	      			var colid = $(this).data('coll');

										  	 	     

																				var reason ='';
										  	 	      $('#reason3'+id).removeClass('d-none').focus();
										  	 	      $('#reason3'+id).attr('placeholder','Input Reason for Shifting to '+value);
										  	 	      $('#reasonbtn3'+id).removeClass('d-none').html('Select '+value+" (Third Choice)");
										  	 	     	 
										  	 	     	 $('#reason3'+id).keyup(function(){
										  	 	     		$('#reason3'+id).removeClass('is-invalid');
										  	 	     	 
										  	 	     	 })

										  	 	     

																		     $('#reason3'+id).focusout(function(){
										  	 	      	 reason = $(this).val();
										  	 	      	
										  	 	      })




														  	 	      $('#reasonbtn3'+id).click(function(){
														  	 	      	
														  	 	      	
														  	 	      		if(reason == ''){
														  	 	      			$('#reason3'+id).addClass('is-invalid');
														  	 	      		}else {


														  	 	      			$('#rem'+id).addClass('d-none');

										  	 	      		$('.chosen').append('	<div class="col-md-4"> <div class="card"><div class="card-body"><h6 style="font-size:12px" class="text-danger">Third Choice</h6><h6 style="font-weight:bolder;font-size:14px">'+value+'</h6>  <h6 style="font-size:13px">Reason : <br> '+reason+'</h6></div></div></div>');
										  	 	      			

										  	 	      		  $.ajax({
										  	 	      		           url : "action.php",
										  	 	      		            method: "POST",
										  	 	      		             data  : {setsessionshiftcourse3:1,coursechoice:value,collid:colid,reason:reason},
										  	 	      		             success : function(data){
										  	 	      								 $('#reason3'+id).addClass('d-none');
										  	 	      								 $('#reasonbtn3'+id).addClass('d-none')
										  	 	      								 $('.r3').addClass('d-none');
										  	 	      								 $('.rb3').addClass('d-none');
										  	 	      		             }
										  	 	      		          })



										  	 	      			  	$('.fillup').removeAttr('disabled');		
										  	 	      			  	$('#cc').addClass('d-none');
										  	 	      			  	$('.line').addClass('d-none');


																		 				

																		 				 }
										  	 	      	
										  	 	      })




														  	

										  	 	      	
										  	 	      	})

										  	 	      											  	 	      	

										  	 	      	 	$('.selectcoursee').click(function() { 
										  	 	      		var value = $(this).data('value');
										  	 	      		$(this).removeClass('choice');
										  	 	      		$(this).removeClass('text-primary');
										  	 	      		$(this).addClass('text-danger');
										  	 	      		$(this).html('Selected');
										  	 	      		var colid = $(this).data('coll');
										  	 	      		$('.choice').addClass('d-none');
										  	 	      		$('.fillup').removeAttr('disabled');

										  	 	      		
										  	 	      		
										  	 	      		   $.ajax({
										  	 	      		           url : "action.php",
										  	 	      		            method: "POST",
										  	 	      		             data  : {setsessionpdscourse:1,coursechoice:value,collid:colid},
										  	 	      		             success : function(data){
										  	 	      		
										  	 	      		             }
										  	 	      		          })
										  	 	      		      
										  	 	      		    
										  	 	      		
										  	 	      	
										  	 	      	})


										  	 	      	 	function forms(){
       $.ajax({
                 url : "content.php",
                  method: "POST",
                   data  : {forms:1},
                   success : function(data){
        $('.content-tab').html(data);
        $('#loader').addClass('d-none');
                   }
                })
    }

															    	$('.cancelshift').click(function(){
															    		$(this).html('Cancelling <i class="fas fa-spinner fa-pulse"></i>');
															    	setInterval(function(){
															    		location.reload();
															    	},2000);
															    			  		
															    	})

										  	 	      

										  	 	      	$('#promptcourse').on('hidden.bs.modal', function (e) {
													  	$('.selectcourse').addClass('choice');
										  	 	      		$('.selectcourse').addClass('text-primary');
										  	 	      		$('.selectcourse').removeClass('text-danger');
										  	 	      		$('.selectcourse').html('Select');

										  	 	      		$('.choice').removeClass('d-none');
										  	 	      		$('.fillup').attr('disabled',true);


										  	 	      			  	$('#cc').removeClass('d-none');
										  	 	      			  	$('.line').removeClass('d-none');
													})

										  	 	      		$('#promptcourseforpds').on('hidden.bs.modal', function (e) {
													  	$('.selectcoursee').addClass('choice');
										  	 	      		$('.selectcoursee').addClass('text-primary');
										  	 	      		$('.selectcoursee').removeClass('text-danger');
										  	 	      		$('.selectcoursee').html('Select');

										  	 	      		$('.choice').removeClass('d-none');
										  	 	      		$('.selectcourse').removeClass('d-none');
										  	 	      		$('.select2course').removeClass('d-none');
										  	 	      		$('.select3course').removeClass('d-none');
										  	 	      		$('.fillup').attr('disabled',true);
													})
												  });      
										  	       	
										  	 </script>
										  	 	<?php	
											}
											
										}
										  	  ?>
										  

										  	 
										  		

                                   		</div>
                                   	</div>
                                   	</div>
                                  
                                </div>
                                  <?php 
		 		 	 				if($csid == 62){
		 		 	 					if($counts >=1){ 

		 		 	 					}else {
		 		 	 							?>
                                	 <div class="ribbon-wrapper" >
                                			<div class="ribbon ribbon-lg badge-danger">
                                   				<span style="font-size: 9px" id="ribbontext">Required</span>

                                   				 		 </div> 
                                   				 		</div>
                                		<?php
		 		 	 					}
                                		
                                	}

		 		 	 				?>
                            </div>
		 		 	 </div>		
								
                           		

                     

		 		 	

							<?php

						                 }	

						
		?>

				
					<div class="col-md-6">
						<div class="card shadow mt-2" style="border-left: 2px solid #bacfe9;height: 150px">
							<div class="card-body">

								<div class="container">
									<div class="row">
										<div class="col-md-6">
												<h6>Counseling</h6>
										</div>
										<div class="col-md-6">
											<button class="btn btn-light text-primary  requestcounseling"  style="font-size:13px;width: 100px;float: right; "> Request

												<?php 
													$checkrequest = "select * from counseling_request where status !=5 and stud_id = '$usertoken'  ";
													 $chckingcrequest = mysqli_query($con,$checkrequest); 
													 $countingrc= mysqli_num_rows($chckingcrequest);
													
													if($countingrc >=1){
														?>
														 <span class="badge badge-danger"><?php echo $countingrc ?></span></button>
														<?php
													}else {

													}
												 ?>

											
										</div>

										<div class="col-md-12 mt-4">
											<span class="text-secondary" style="font-size:13px"> Make A Request

											</span>
										</div>

									</div>
								</div>
							
							</div>
						</div>
					</div>

							<div class="col-md-6">
						<div class="card shadow mt-2" style="border-left: 2px solid #c4dbc8;height: 150px">
							<div class="card-body">

								<div class="container">
									<div class="row">
										<div class="col-md-6">
												<h6>Message</h6>
										</div>
										<div class="col-md-6">
											<button class="btn btn-light text-success clickcreatemsg"  style="font-size:13px;width: 100px;float: right; ">INBOX

												<?php 
												$user = $_SESSION['user_student_token_check'];
												$mygc = $_SESSION['student_college'];
											
												$check_new_sms1 = "select * from message where stud_id = '$user' and receive = '$user' and status = 0 and adm ='$mygc' ";
											 $chckingnewsms1 = mysqli_query($con,$check_new_sms1); 
											 $countsms1= mysqli_num_rows($chckingnewsms1);

												$check_new_sms = "select * from message where stud_id = '$user' and receive = '$user' and status = 0 and adm =0 ";
											 $chckingnewsms = mysqli_query($con,$check_new_sms); 
											 $countsms= mysqli_num_rows($chckingnewsms);


											 $total = $countsms1 + $countsms;

											 if($total == 0){

											 }else {
											 	?>
											 			<span class="badge badge-danger"><?php echo $total ?></span>
											 	<?php
											 }

										 ?>
									


											</button>

										

											
										</div>

										<div class="col-md-12 mt-4">
											<span class="text-secondary" style="font-size:13px">Send A Message through System Messagebox.

											</span>
										</div>

									</div>
								</div>
							
							</div>
						</div>
					</div>
			
 	 	

	<style type="text/css">
		.ribbon-wrapper {
  height: 70px;
  overflow: hidden;
  position: absolute;
  right: -2px;
  top: -2px;
  width: 70px;
  z-index: 10;
}

.ribbon-wrapper.ribbon-lg {
  height: 120px;
  width: 120px;
}

.ribbon-wrapper.ribbon-lg .ribbon {
  right: 0;
  top: 26px;
  width: 160px;
}

.ribbon-wrapper.ribbon-xl {
  height: 180px;
  width: 180px;
}

.ribbon-wrapper.ribbon-xl .ribbon {
  right: 4px;
  top: 47px;
  width: 240px;
}

.ribbon-wrapper .ribbon {
  box-shadow: 0 0 3px rgba(0, 0, 0, 0.3);
  font-size: 0.8rem;
  line-height: 100%;
  padding: 0.375rem 0;
  position: relative;
  right: -2px;
  text-align: center;
  text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.4);
  text-transform: uppercase;
  top: 10px;
  -webkit-transform: rotate(45deg);
  transform: rotate(45deg);
  width: 90px;
}

.ribbon-wrapper .ribbon::before, .ribbon-wrapper .ribbon::after {
  border-left: 3px solid transparent;
  border-right: 3px solid transparent;
  border-top: 3px solid #9e9e9e;
  bottom: -3px;
  content: "";
  position: absolute;
}

.ribbon-wrapper .ribbon::before {
  left: 0;
}

.ribbon-wrapper .ribbon::after {
  right: 0;
}



	</style>

		  <div class="container mt-4">
		  	
	
		  
		 <h6>Submitted Forms</h6>
		
		
		  <div class="" id="modscroll" style="overflow-y: scroll;height: 300px;overflow-x: hidden;">
		  	

		  	<?php 
		  	$usertoken = $_SESSION['user_student_token_check'];
		  					$student = " SELECT * FROM `student` where stud_id = '$usertoken'  ";
		  			                $result = mysqli_query($con,$student); 
		  			               
		  			                 while($row = mysqli_fetch_array($result)){
		  										
		  				$selectsubmitted = "SELECT DISTINCT csformid  FROM form_response WHERE userid = '$usertoken' and csformid in(62,60)   ";
		  		                $resultcheck = mysqli_query($con,$selectsubmitted); // run query
		  		                $countuser= mysqli_num_rows($resultcheck); // to count if necessary
		  		               //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
		  		          if($countuser >=1 ){
		  		          		
		  		             	//while($row = mysqli_fetch_array($result)){} is where we output all the data in database
		  		                 while($rowr = mysqli_fetch_array($resultcheck)){
		  		          
		  		         	$csid= $rowr['csformid'];
		  		         //	$formsubmit = $rowr['datecreated'];
		  		         //	$status = $rowr['status'];

		  								  $cs = "select * from form_classification where csform_id='".$csid."' ";
                                           	$res = mysqli_query($con,$cs); 

                                           	while($getform = mysqli_fetch_array($res)){ 
                                           		$formname = $getform['csform_id'];

                                           		if($formname == '62'){
                                           				?>
                                           <div class="card shadow mb-2  " >
		  		         
                      		 <div class="ribbon-wrapper">
                      		 	<div class="ribbon ribbon-xl badge-success">
                                   				 		 	<span style="font-size: 12px">PDS</span>

                                   				 		 </div> 		 
                                   				 		
                                   				</div>          
                                <div class="card-body " style="font-size: 14px">
                                  <div class="container ">

                                   	<div class="row">
                                   		
                                   		<div class="col-sm-12" style="text-align: center;">


                                   				
                                   				 
                                   			<h6 style="font-weight: bolder; padding-top: 30px"><?php echo $getform['form_name'] ?></h6>
                                   			<br style="user-select: none">
                                   			<h6 style="font-size: 12px">Date Submitted : <?php 
                                   			
                                          //	

                                   					$getdate = " select datecreated from form_response where csformid = '$csid' limit 1  ";
                                   			                $resultdate = mysqli_query($con,$getdate);
                                   			               
                                   			               
                                   			                 while($gettd = mysqli_fetch_array($resultdate)){
                                   							
                                   								echo ' @ '.date('g:i a',strtotime($gettd['datecreated'])).'-'.date('M d, Y ',strtotime($gettd['datecreated']));
                                   			                 }
                                   			          
                                         

                                   			?></h6>

                                   			<br style="user-select: none">
             <!-- <h6  style="font-size: 12px">Status : <span class="text-success" style="font-weight: bold;">
              	
              		<?php 
              		echo $status;
              		 ?>
              </span></h6> -->
              <button class="btn btn-primary mt-2 review" id="formview<?php echo $getform['csform_id'] ?>" data-csformid = "<?php echo $getform['csform_id'] ?>" style="font-size: 11.5px;float: right;width: 100px">
										  	 	View
										  	 </button>

                                   			 
                                   		</div>

                                   	</div>
                                   	</div>
                                  
                                </div>
                            </div>

                                           <?php


                                           		}else if($formname == '60'){
                                           				$new = " select * from form_response where csformid = '60' and userid = '$usertoken' and status = 'For Approval' ";
                                          			                $getonlynew = mysqli_query($con,$new); 
                                          			                $gettingcount= mysqli_num_rows($getonlynew);
                                          			               //  $get_id =  mysqli_insert_id($con); 
                                          			             if ($gettingcount>=1){
                                          			            	?>
                                           <div class="card shadow mb-2  " >
		  		         
                      		 <div class="ribbon-wrapper">
                      	
                      		 	 	<div class="ribbon ribbon-xl badge-success">
                                   				 		 	<span style="font-size: 12px">Shifter</span>

                                   				 		 </div> 
                                   				 		 
                                   				 		
                                   				</div>          
                                <div class="card-body " style="font-size: 14px">
                                  <div class="container ">

                                   	<div class="row">
                                   		
                                   		<div class="col-sm-12" style="text-align: center;">


                                   				
                                   				 
                                   			<h6 style="font-weight: bolder; padding-top: 30px"><?php echo $getform['form_name'] ?></h6>
                                   			<br style="user-select: none">
                                   			<h6 style="font-size: 12px">Date Submitted : <?php 
                                   			
                                          //	

                                   					$getdate = " select datecreated from form_response where csformid = '$csid' limit 1  ";
                                   			                $resultdate = mysqli_query($con,$getdate);
                                   			               
                                   			               
                                   			                 while($gettd = mysqli_fetch_array($resultdate)){
                                   							
                                   								echo ' @ '.date('g:i a',strtotime($gettd['datecreated'])).'-'.date('M d, Y ',strtotime($gettd['datecreated']));
                                   			                 }
                                   			          
                                         

                                   			?></h6>

                                   			<br style="user-select: none">
             <!-- <h6  style="font-size: 12px">Status : <span class="text-success" style="font-weight: bold;">
              	
              		<?php 
              		echo $status;
              		 ?>
              </span></h6> -->
              <button class="btn btn-primary mt-2 review" id="formview<?php echo $getform['csform_id'] ?>" data-csformid = "<?php echo $getform['csform_id'] ?>" style="font-size: 11.5px;float: right;width: 100px">
										  	 	View
										  	 </button>

                                   			 
                                   		</div>

                                   	</div>
                                   	</div>
                                  
                                </div>
                            </div>

                                           <?php

                                          			               
                                          			          }else {

                                          			          		
                                          			          
                                          			          }

                                           		}


                                           	
                                       
                                           	}
		  		         		

	
		  		                 }



		  		             

		  		              

                                           
                                            

		  		                  }else {
		  		                  	 ?>
		  		          	<div class="" style="text-align: center;">
                             
                            <img src="../GCC/img/undraw_empty_street_sfxm.png" class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 50rem;">
                            <span >No Submitted forms yet.</span>
                            </div> 
		  		          	<?php
		  		                  }


		  			                 }
		  			         

		  
		  		          


		  	 ?>
		  		

                            




                            <!-- -->
                            
		  	
		</div>
		  
  </div> 



		 		 </div> 
		
		 </div> 
		



		<?php


}
if(isset($_POST['notification'])){ 
	?>
	<style type="text/css">
		.art{
			display: none;
			z-index: 1;
			text-align: center;
			position: absolute;
			transition: width 2s;
		}
		 .hoverselect:hover < .art{
			display: flex;

		}
	</style>
	 <form method="post" action="action.php" id="actiontoall" onsubmit="return false">
	    	                  
	 <input type="hidden" name="actiontoall">
	
	<table class="table table-hover ">
  <thead>
    <tr class="bg-light">
      <th scope="col">
      	
      	

  <div class="custom-control custom-checkbox">
  <input type="checkbox" class="custom-control-input" id="customCheck1">
  <label class="custom-control-label" for="customCheck1" style="font-size: 12px"><span class="text-danger">*</span></label>
</div>
      
      

      </th>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"></th>
     
    </tr>
   
  </thead>
  <tbody>
  		<?php 	
  		$usertoken = $_SESSION['user_student_token_check'];
  					$sql = "SELECT * FROM `notification` where studenttaker_id = '$usertoken' and type = 'notifystudentacc' order by date_notified desc";
  			                $result = mysqli_query($con,$sql); // run query
  			                $count= mysqli_num_rows($result); // to count if necessary
  			               //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
  			             if ($count>=1){
  			             	//while($row = mysqli_fetch_array($result)){} is where we output all the data in database
  			                 while($row = mysqli_fetch_array($result)){
  			                 	$unread = $row['status'];
  						?>
  						<tr>
      <th scope="row">
      	 <div class="custom-control custom-checkbox">
  <input type="checkbox" class="custom-control-input checkall" id="checkall<?php echo $row['noti_id'] ?>" name="checkval[]" value="<?php echo $row['noti_id'] ?>" >
  <label class="custom-control-label" for="checkall<?php echo $row['noti_id'] ?>"></label>
</div>

      </th>
      <td class="hoverselect" data-nid="<?php echo $row['noti_id'] ?>" data-title="<?php echo $row['title'] ?>" data-contents="<?php echo $row['content'] ?>" data-typeof="<?php echo $row['type'] ?>" ><h6 style="font-size: 14px;font-weight: bolder"><?php echo $row['title'] ?></h6></td>
      <!--data-toggle="modal" data-target="#exampleModal" data-backdrop="static" data-keyboard="false"-->
      <td class="hoverselect" data-nid="<?php echo $row['noti_id'] ?>" ><span style="font-size: 12px"><?php 
echo date('@ h:i a , F j-Y',strtotime($row['date_notified']));

      ?></span></td>
      <td class="art"><i class="fas fa-trash"></i></td>
     	<td>
     		<?php 
     		if($unread == 'unread'){
     			?>

<span class="badge-danger" style="padding: 5px;border-radius: 40px;font-size: 1px;"></span>
     			<?php
     		 
     		}else if($unread == 'read') {
     			
     		}
     		?>
     		

     	</td>
    </tr>
  						<?php
  			                 }
  			          }else {
  			          		?>

  			          		<tr >
    	<td style="text-align: center;" colspan="3">
    		
    		 <img src="../GCC/img/undraw_empty_street_sfxm.png" class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 50rem;">
    			 <span style="font-weight: bold;font-size: 13px">No Notification</span>
    	</td>
    </tr>
  			          		<?php
  			          }

  		 ?>

    <!---->

 	 <!---->
   
  </tbody>
</table>
<span style="font-size: 13px" class="mr-2">
	Options on Selected:
</span>
<button type="button" id="clearselected" class="btn btn-light" style="font-size: 12px" >Clear Selected</button>
<button type="submit" class="btn btn-danger" style="font-size: 12px" name="deleteall">Delete</button>
</form>
	<?php
}
if(isset($_POST['request'])){ 
		?>
		
		<style type="text/css">
			#selectchoice {
				padding: 4px;
				font-size: 12px;
				width: 100%;
				outline: none;
				border:1px solid #b4adae;
				margin-bottom: 5px;
				text-align: center;
				border-radius: 4px;
				background-color: #f2f4f7;
			}
			#selectchoice:hover {
				background-color: #f3f6fb;
			}

			#modscroll::-webkit-scrollbar {
  width: 2px;
}

/* Track */
#modscroll::-webkit-scrollbar-track {
  background: #f1f1f1; 
}
 
/* Handle */
#modscroll::-webkit-scrollbar-thumb {
  background: #c1f2c4; 
}

/* Handle on hover */
#modscroll::-webkit-scrollbar-thumb:hover {
  background: #555; 
}


#conscroll::-webkit-scrollbar {
  width: 2px;
}

/* Track */
#conscroll::-webkit-scrollbar-track {
  background: #f1f1f1; 
}
 
/* Handle */
#conscroll::-webkit-scrollbar-thumb {
  background: #c1f2c4; 
}

/* Handle on hover */
#conscroll::-webkit-scrollbar-thumb:hover {
  background: #555; 
}
		</style>
		   
	
		<div class="row">
				 <div class="col-md-6">
				 	 <div class="card shadow mb-2">
				 	 	<div class="card-body" >
				 	 		<h6 style="font-size: 14px">Submitted Request</h6>
				 	 		<hr>
				 	 		 <div class="" id ="conscroll" style="overflow-y: scroll; height: 320px"> 
				 	 		 
				 	 		 	<?php 
				 	 		 	$usertoken = $_SESSION['user_student_token_check'];
				 	 		 			$sqli = " SELECT * FROM `notification` where sender_id = '$usertoken' order by date_notified ";
				 	 		 	                $resulti= mysqli_query($con,$sqli); 
				 	 		 	                $counti= mysqli_num_rows($resulti);
				 	 		 	             
				 	 		 	             if ($counti>=1){
				 	 		 	             	
				 	 		 	                 while($rowe = mysqli_fetch_array($resulti)){
				 	 		 	                 	$stat = $rowe['status'];
				 	 		 	                 	?>

				 	 		 	                 	 <div class="card shadow mb-2 " style="border-top:5px solid #1cc88a">
				 	 		 	                 	 	<?php 
				 	 		 	                 	 	if($stat == 'unread'){
				 	 		 	                 	 		?>
				 	 		 	                <span class="bade badge-warning" style="position: absolute;left: 5px;top:5px;padding: 3px;border-radius: 10px;font-size: 12px">Unseen</span>
				 	 		 	                 	 		<?php
				 	 		 	                 	 	}else if($stat == 'read'){
				 	 		 	                 	 		?>
				 	 		 	                <span class="bade badge-info" style="position: absolute;left: 5px;top:5px;padding: 3px;border-radius: 10px;font-size: 12px">Seen</span>
				 	 		 	                 	 		<?php

				 	 		 	                 	 	}
				 	 		 	                 	 	 ?>
				 	 		 	                 	 	

				 	 		 	                 	 		


				 	 		 	 <div class="card-body" >
				 	 		 	 	
				 	 		 	  	<h6 style="font-size: 13px;font-weight: bold;text-align: center;"><?php echo $rowe['title'] ?></h6>
				 	 		 	  	 <div class="" id="modscroll" > 
				 	 		 	  	 
				 	 		 	  	<span style="font-size: 13px;">
				 	 		 	  		
				 	 		 	  	<?php echo $rowe['content'] ?>
				 	 		 	  		
				 	 		 	  	</span>
				 	 		 	  	</div>

				 	 		 	  	<button class="deletenotify" data-notiid="<?php echo $rowe['noti_id'] ?>" style="outline: none;border: none;font-size: 12px;float: right;margin-top:10px;padding: 5px;color: grey;"><i class="fas fa-trash"></i></button>
				 	 		 	  
				 	 		 	 </div> 
				 	 		 	 
				 	 		 	  
				 	 		 	 	 <br style="user-select: none">
				 	 		 	 	<span style="font-size: 12px;position: absolute;bottom:5px;left: 8px;color:#4e73df">
				 	 		 	 		
				 	 		 	 		<?php 
				 	 		 	 		date_default_timezone_set('Asia/Manila');
				 	 		 	 		$datenow = date('Y-m-d');
				 	 		 	 		$dateentered = date('Y-m-d',strtotime($rowe['date_notified']));
				 	 		 	 		if ($datenow == $dateentered) {
				 	 		 	 			echo 'TODAY '.date('@ h:i a',strtotime($rowe['date_notified']));;
				 	 		 	 		}else {
				 	 		 	 			echo date('@ h:i a , F j-Y',strtotime($rowe['date_notified']));
				 	 		 	 		}
				 	 		 	 		
				 	 		 	 		 ?>
				 	 		 	 	</span>
				 	 		 </div>

				 	 		



				 	 		 	                 	<?php
				 	 		 	
				 	 		 	                 }
				 	 		 	          }else {
				 	 		 	          	
				 	 		 	          	?>
	<div class="" style="text-align: center;">
                             
                            <img src="../GCC/img/undraw_empty_street_sfxm.png" class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 50rem;">
                            <span >No Submitted request yet.</span>
                            </div> 

				 	 		 	          	<?php


				 	 		 	          }

				 	 		 	 ?>


				 	 		<!-- -->

				 	 		  
				 	 		 

				 	 		 
								</div>

				 	 	</div>
				 	 </div> 


				 	 
				 </div> 
				 <div class="col-md-6">
				 		<form method="post" id="sendemail" onsubmit="return false" action="action.php">
				<div class="row">
					  <div class="card shadow" style="width: 100%">
					  	 
					  	  
					  		<input type="hidden" name="sendemailss">
					  	 <div class="card-header">
					  	 	
							
								<span >To:</span>
								<span class="badge badge-success">GCC Admin</span>
							

					  	 	</div>
					  	
					  	 <div class="card-body">
					  	 		<div class="container">
					  	 			
					  	 			<select id="selectchoice" name="selectchoice">
					  	 				<option value="Modify Submitted PDS Form">Modify Submitted PDS Form</option>
					  	 				<option value="Shifting Form">Shifting Form</option>
					  	 				<option value="Modify Submitted Shifting Form">Modify Submitted Shifting Form</option>
					  	 			</select>

					  	 				<br>
					  	 				
					  	 				<textarea class="mt-3"   name="messagemail" placeholder="Type your Message here.." style="font-size: 13px;border:none;outline: none;width: 100%;" id="message-text" rows="10"></textarea>

					  	 		</div>

					  	 </div>
					  	 <div class="card-footer">

					  	 	<?php 
					  	 	date_default_timezone_set('Asia/Manila');
							$datenow = date('Y-m-d');
		
							$usertoken = $_SESSION['user_student_token_check'];

										$sql = "SELECT * FROM `notification` where request_id = '$usertoken' and DATE(date_notified) = DATE(now()) ";
								                $result = mysqli_query($con,$sql); // run query
								            			
								            	                $count= mysqli_num_rows($result); // to count if necessary
								            	              
								             if ($count>=1){
								             
								                 while($row = mysqli_fetch_array($result)){
													$date_notified = $row['date_notified'];

													$dateonly = date('Y-m-d',strtotime($date_notified));

													
								                 }
								                 	?>
														<button class="btn btn-secondary" disabled=""  style="font-size: 12px;float: right;" > SEND <i class="fas fa-paper-plane"></i></button>
					  										 </div>
														<?php

								          }else {
								          	?>
														<button class="btn btn-success" type="submit"  style="font-size: 12px;float: right;" id="sendem"> SEND <i class="fas fa-paper-plane"></i></button>
					  										 </div>
														<?php
								          }

					  	 	 ?>
					  	 	

					  	
					  										 </div>
					  	  <!--<span></span>-->
					  	  </div> 
					  	 
					  </div> 
					   </form>

				 </div> 
				 
				

		</div>
		

		



		<?php

}

if(isset($_POST['statusrequest'])){
	include 'status.php';
}
 ?>

 <script type="text/javascript">
 	
 	$(document).ready(function() {

 				$('.reselect').click(function(){
 					var courseid = $(this).data('courseid');
 					var shid = $(this).data('shid');
 					var sug = $(this).data('sug');

 					Swal.fire({
				  title: 'Are you sure with this choice?',
				  text: "Your Shifting profile will be reused and you may need to Update it before you submit the request. Additionally, your request will be sent to GCC again for process. Do you still want to Continue?",
				  icon: 'question',
				  showCancelButton: true,
				  confirmButtonColor: '#86abca',
				  cancelButtonColor: '#caa586',
				  confirmButtonText: 'Yes, continue!'
				}).then((result) => {
				  if (result.isConfirmed) {
				  		
				  		$.ajax({
 					 url : "session.php",
 					  method: "POST",
 					 data  : {modify_first:sug,reselect:courseid,shid:shid},
 					  success : function(data){
 							window.location.href="forms/modify/?section&sectionid=1"+data;
 					   }
 					 })

				  }
				})
 					 /*$.ajax({
 					 url : "action.php",
 					  method: "POST",
 					 data  : {reselect:courseid,shid:shid},
 					  success : function(data){
 					
 					   }
 					 })*/
 						  		
 				})


 				$('.reset').click(function(){

 						var shid = $(this).data('shid');

 							Swal.fire({
				  title: 'Are you sure ?',
				  text: "You are about to reselect another course of your choice.",
				  icon: 'question',
				  showCancelButton: true,
				  confirmButtonColor: '#86abca',
				  cancelButtonColor: '#caa586',
				  confirmButtonText: 'Yes, continue!'
				}).then((result) => {
				  if (result.isConfirmed) {
				  		
				  $.ajax({
 					 url : "action.php",
 					  method: "POST",
 					 data  : {resetselection:shid},
 					  success : function(data){
 					  	 		 Swal.fire(
						      'Choices Reset!',
						      'If you wish to proceed your request, kindly fill up Shifting form.',
						      'success'
						    ).then((result) => {
				  if (result.isConfirmed) {
				  		location.reload();
				  }
				})

 					 
 					   }
 					 }) 

				  }
				})
 					
 					/*	
 					 */ 		

 					
 				})





 	      	 $('#customCheck1').click(function() {
 	      	      if($(this).prop("checked") == true) {
 	      	             $('.checkall').prop('checked',true);    
 	      	             $('#customCheck1').prop('indeterminate', true)                    		
 	      	         }
 	      	      else if($(this).prop("checked") == false) {
 	      	      	$('.checkall').prop('checked',false);  
 	      	                                       
 	      	       }
 	      	    });

 	      	 $('#actiontoall').on('submit', function(event){
 	      	    event.preventDefault();
 	      	     var atLeastOneIsChecked = $('input[name="checkval[]"]:checked').length > 0;
			      	   if(atLeastOneIsChecked == false){
			      	    Swal.fire(
							  'Selection is Empty!',
							  '',
							  'info'
							)
			      	   }else {

			      	   	Swal.fire({
						  title: 'Are you sure?',
						  text: "You won't be able to revert this!",
						  icon: 'warning',
						  showCancelButton: true,
						  confirmButtonColor: '#e74a3b',
						  cancelButtonColor: '#f6c23e',
						  confirmButtonText: 'Yes, delete it!'
						}).then((result) => {
						  if (result.isConfirmed) {
						   
						     $.ajax({
			      	   	                 url : $(this).attr('action'),
			      	   	                  method: "POST",
			      	   	                   data  : $(this).serialize(),
			      	   	                   success : function(data){
			      	   	      		notification();
			      	   	      		countnotify();
			      	   	      		 Swal.fire(
						      'Deleted!',
						      'Notification Deleted Successfully!',
						      'success'
						    )
			      	   	                   }
			      	   	                })

						  }
						})
			      	   		
			      	   }
			      	
			      	      			
			      	      
			      	      
 	      	    			
 	      	    });

 	      	  function notification(){
       $.ajax({
                 url : "content.php",
                  method: "POST",
                   data  : {notification:1},
                   success : function(data){
        $('.content-tab').html(data);
        $('#loader').addClass('d-none');
                   }
                })
    }

    function countnotify(){
        $.ajax({
                 url : "action.php",
                  method: "POST",
                   data  : {notification:1},
                   success : function(data){
              $('#notify').text(data);
                   }
                })
    }

 	      	 $('#clearselected').click(function() { 
 	      	 	 var atLeastOneIsChecked = $('input[name="checkval[]"]:checked').length > 0;
			      	   if(atLeastOneIsChecked == false){
			      	   Swal.fire(
							  'Selection is Empty!',
							  '',
							  'info'
							)
			      	   }else {
			      	   		 $('.checkall').prop('checked',false);    
			      	   		  $('#customCheck1').prop('indeterminate',false);
			      	   		   $('#customCheck1').prop('checked',false);       
			      	   }
 	      	 })

 	      	 $('.fillup').click(function() { 
 	      	 	var csid = $(this).data('csformid');
 	      	 	var type = $(this).data('formtype');
 	      	 		
 	      	 	//	alert(csid);
 	      	 	$('#promptcourseforpds').addClass('d-none');
 	      	 	$('#promptcourse').addClass('d-none');
 	      	 	$('#btnopenload').click();
 	      	 	
 	      	 		 $.ajax({
 	      	 		           url : "session.php",
 	      	 		            method: "POST",
 	      	 		             data  : {fillform:1,csid:csid,type:type},
 	      	 		             success : function(data){
 	      	 			window.location.href="../GCC/response/";


 	      	 			
 	      	 		             }
 	      	 		          })

 	      	 		      
 	      	 		   
 	      	 		    
 	      	 
 	      	 })

 	      	 $('.review').click(function() { 
 	      	 	var csid = $(this).data('csformid');
 	      	 

 	      	 	$.ajax({
 	      	 		           url : "session.php",
 	      	 		            method: "POST",
 	      	 		             data  : {viewform:1,csid:csid},
 	      	 		             success : function(data){
 	      	 			//window.location.href="forms/view/";
 	      	 			window.open('forms/view/', '_blank');
 	      	 		             }
 	      	 		          })
 	      	 
 	      	 })

 	      	 $('.modify').click(function() { 
 	      	 		var csid = $(this).data('csformid');
 	      	 		

 	      	 			$.ajax({
 	      	 		           url : "session.php",
 	      	 		            method: "POST",
 	      	 		             data  : {modifyform:1,csid:csid},
 	      	 		             success : function(data){
 	      	 			window.location.href="forms/modify/?section&sectionid=1";

 	      	 			//window.open('forms/modify/', '_blank');

 	      	 		             }
 	      	 		          })
 	      	 
 	      	 })

 	      	 $('.hoverselect').click(function() { 
 	      	 	var title = $(this).data('title');
 	      	 	var type = $(this).data('typeof');
 	      	 	var content = $(this).data('contents');
 	      	 	var id = $(this).data('nid');
					$('#titlenotif').text(title);
					$('#contentnotif').text(content);
					$('#notifstatus').text(type);

					 
					   $.ajax({
					           url : "action.php",
					            method: "POST",
					             data  : {setread:1,id:id},
					             success : function(data){
					notification();
					countnotify();
					             }
					          })
					   
					    

 	      	 
 	      	 })
 	      	 function countnotify(){
        $.ajax({
                 url : "action.php",
                  method: "POST",
                   data  : {notification:1},
                   success : function(data){
              $('#notify').text(data);
                   }
                })
    }

 	      	   	 
 	      	 

 	      	

 	      	 $('#sendemail').on('submit', function(event){
 	      	    event.preventDefault();
 	      	    			$('#sendem').html('<span style="font-weight:bold">Sending </span> <i class="fas fa-spinner fa-pulse"></i>');
 	      	 			
 	      	 		var clearsend = setInterval(function(){
 	      	 			 $.ajax({
 	      	 		           url :$('#sendemail').attr('action'),
 	      	 		            method: "POST",
 	      	 		             data  : $('#sendemail').serialize(),
 	      	 		             success : function(data){
 	      	 		             	if(data.match('send')){
 	      	 		         Swal.fire(
							  'Request Sent!',
							  'Your Message has been successfully Sent!',
							  'success'
							)
 	      	 		         request();
 	      	 		             		$('#message-text').val('');
 	      	 		             		$('#sendem').html('SEND <i class="fas fa-paper-plane"></i>');	
 	      	 		             		$('#sendem').attr('disabled',true);
 	      	 		             	}
 	      	 			
 	      	 		             }
 	      	 		          })
 	      	 			clearInterval(clearsend);
 	      	 		},2000);
 	      	 		  
 	      	 		   
 	      	 		    
 	      	    });

 	      	 $('.deletenotify').click(function() { 
 	      	 var id = $(this).data('notiid');
 	      	 	
 	      	 	Swal.fire({
				  title: 'Are you sure?',
				  text: "You won't be able to revert this!",
				  icon: 'warning',
				  showCancelButton: true,
				  showDenyButton: true,
				  confirmButtonColor: '#e23f3f',
				  cancelButtonColor: '#998c8c',
				  denyButtonColor: '#6f8a96',
				  confirmButtonText: 'Remove from Everyone',
				  denyButtonText: 'Remove from You'
				}).then((result) => {
				  if (result.isConfirmed) {
				  	 $.ajax({
 	      	 	           url : "action.php",
 	      	 	            method: "POST",
 	      	 	             data  : {deleterequestall:1,id:id},
 	      	 	             success : function(data){
 	      	 	             	request();
 	      	 				Swal.fire(
							  'Deleted Successfully!',
							  'Message Request has been removed Successfully!',
							  'success'
							)
 	      	 	             }
 	      	 	          })
 	      	 	       
				  }else if (result.isDenied) { 
				  	$.ajax({
 	      	 	           url : "action.php",
 	      	 	            method: "POST",
 	      	 	             data  : {deleterequest:1,id:id},
 	      	 	             success : function(data){
 	      	 	             	request();
 	      	 				Swal.fire(
							  'Deleted Successfully!',
							  'Message Request has been removed from view!',
							  'success'
							)
 	      	 	             }
 	      	 	          })

				  }
				})
		  
 	      	 	    

 	      	 })

 	      	   function request(){
       $.ajax({
                 url : "content.php",
                  method: "POST",
                   data  : {request:1},
                   success : function(data){
        $('.content-tab').html(data);
        $('#loader').addClass('d-none');
                   }
                })
    }

      function notification(){
       $.ajax({
                 url : "content.php",
                  method: "POST",
                   data  : {notification:1},
                   success : function(data){
        $('.content-tab').html(data);

        $('#loader').addClass('d-none');
                   }
                })
    }
     $('.viewstatus').click(function(){
       appstatus();
          $('#titletext').text('Status');
                        
      })

     $('.clickcreatemsg').click(function(){
     		  messaging();		
     		    $('#titletext').text('Create Message');
     })

     $('.requestcounseling').click(function(){
     	  $('#titletext').text('Request For Counseling');
     		request('all');  		
     })

     function messaging(){
     	  $.ajax({
                 url : "message.php",
                  method: "POST",
                   data  : {crtmessage:1},
                   success : function(data){
        $('.content-tab').html(data);
        $('#loader').addClass('d-none');
                   }
                })
     }

      function request(key){
     	  $.ajax({
                 url : "request.php",
                  method: "POST",
                   data  : {requestcounseling:key},
                   success : function(data){
        $('.content-tab').html(data);
        $('#loader').addClass('d-none');
                   }
                })
     }

     function appstatus(){
     	  $.ajax({
                 url : "content.php",
                  method: "POST",
                   data  : {statusrequest:1},
                   success : function(data){
        $('.content-tab').html(data);
        $('#loader').addClass('d-none');
                   }
                })
     }

       function appstatus_(year,sem){
     	  $.ajax({
                 url : "content.php",
                  method: "POST",
                   data  : {statusrequest:1,sort:year,sem:sem},
                   success : function(data){
        $('.content-tab').html(data);
        $('#loader').addClass('d-none');
                   }
                })
     }

     $('.backtoform').click(function(){
     		  		forms();	
     })
       function forms(){
       $.ajax({
                 url : "content.php",
                  method: "POST",
                   data  : {forms:1},
                   success : function(data){
        $('.content-tab').html(data);
        $('#loader').addClass('d-none');
                   }
                })
    }

      $('#year_').change(function(){
      		var sem = $('#semester_').val();
           var val = $(this).val();
           appstatus_(val,sem);              
        })

      $('#semester_').change(function(){
      		   var val = $(this).val();
      		   var yr = $('#year_').val();
           appstatus_(yr,val);  		
      })

 	      });      
       	
 </script>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary d-none" id="btnopenload" data-toggle="modal" data-target="#loading" data-backdrop="static" data-keyboard="false">
 
</button>


 <!-- Modal -->
 <div class="modal fade" id="loading" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
     <div class="modal-content " style="background-color:transparent;border: none;">
      
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
