<?php 

	class sqlquery 
	{
		
			function insertquery($table,$tabledata,$insertvalue) { 
					include '../create_form/connect.php';
								$sql = "INSERT INTO `$table` ($tabledata) VALUES ($insertvalue) ";
						                $result = mysqli_query($con,$sql); // run query
						               
				}

				function updatequery($table,$updatedvalues,$wherecondition) { 
					include '../create_form/connect.php';
								$sql = "UPDATE `$table` SET $updatedvalues WHERE  $wherecondition";
						                $result = mysqli_query($con,$sql); // run query
						               
				}

				function deletequery($table,$wherecondition) { 
					include 'create_form/connect.php';
								$sql = "DELETE FROM `$table` WHERE $wherecondition";
						                $result = mysqli_query($con,$sql); // run query
						               
				}

				function count_row($table,$wherecondition){
					include '../create_form/connect.php';
					
								$sql = " select * from $table where  $wherecondition  ";
						                $result = mysqli_query($con,$sql);
						                $count= mysqli_num_rows($result); 
						            echo $count;
						            
				}

				function checksectionstats($csform){
						include '../create_form/connect.php';
				$sql = " select * from form where class_name = '$csform' and type = 'section' ";
		                $result = mysqli_query($con,$sql); // run query
		                $count= mysqli_num_rows($result); // to count if necessary
		            
		             if ($count>=1){
		             	$_SESSION['checkedsectionexist']= 1;
		         	 }
}

				
function manage_form_content() {
				?> <table class="table table-hover" id="table_id">
	<thead>
		<tr>
			<th scope="col">Form Name</th>
			<th scope="col">Date Created</th>
			<th scope="col">Actions</th>

		</tr>
	</thead>
	<tbody>
		<?php
   

					include '../create_form/connect.php';
								$sql = " select * from form_classification ";
						                $result = mysqli_query($con,$sql); 
						               
						                 while($row = mysqli_fetch_array($result)){
						                 $status = $row['status'];
						               $token =   $_SESSION['admingcc_token'];
						               $staticform = $row['static']; 
							?>
		<tr>
			<th scope="row"><?php echo $row['form_name'] ?></th>
			<td><?php 

										     
										  echo '@'.date("g:ia",strtotime($row['datecreated'])).' '.date("F-d-o",strtotime($row['datecreated'])) ;
										      ?></td>
			<td>
				<div class="btn-group" role="group" aria-label="Basic example">

					<?php 
										  	if($status == 0){
										  		
										  		if($staticform==0){
										  			?>
					<button type="button" class="btn btn-primary edit" data-csformid="<?php echo $row['csform_id'] ?>"
						style="font-size: 12px; " data-toggle="tooltip" data-placement="right" title="Edit Form"><i
							class="far fa-edit"></i>
						Manage
					</button>

					<button type="button" class="btn btn-secondary viewform"
						data-csformid="<?php echo $row['csform_id'] ?>" style="font-size: 12px; " data-toggle="tooltip"
						data-placement="right" title="Review Form"><i class="fas fa-binoculars"></i></i> Live
						View</button>

					<button type="button" class="btn btn-danger delete" data-formname="<?php echo $row['form_name'] ?>"
						data-csformid="<?php echo $row['csform_id'] ?>" style="font-size: 12px; " data-toggle="tooltip"
						data-placement="right" title="Delete Form"><i class="far fa-trash-alt"></i> Delete</button>
					<?php

										  		}else {
										  			?>
					<button type="button" class="btn btn-primary edit" data-csformid="<?php echo $row['csform_id'] ?>"
						style="font-size: 12px; " data-toggle="tooltip" data-placement="right" title="Edit Form"><i
							class="far fa-edit"></i>
						Manage
					</button>

					<button type="button" class="btn btn-secondary viewform"
						data-csformid="<?php echo $row['csform_id'] ?>" style="font-size: 12px; " data-toggle="tooltip"
						data-placement="right" title="Review Form"><i class="fas fa-binoculars"></i></i> Live
						View</button>


					<?php

										  		}
										  		

										  	
										  	}else if($status == $token) {
										  		?>
					<button type="button" class="btn btn-warning edit" data-csformid="<?php echo $row['csform_id'] ?>"
						style="font-size: 12px; " data-toggle="tooltip" data-placement="right"
						title="continue unsaved work">
						Continue and save your work <i class="fas fa-sync"></i>
					</button>
					<br><br>

					<button type="button" class="btn btn-success exitnow"
						data-csformid="<?php echo $row['csform_id'] ?>" style="font-size: 12px; " data-toggle="tooltip"
						data-placement="right" title="Save Work as Exit only">Save&Exit</button>
					<?php

										  	}else if($status != $token) {
										  		?>
					<h6 class="bg-danger" style="padding: 10px;color: white;font-size: 12px;cursor: not-allowed;">This
						page's content is currently being updated. <i class="fas fa-ban"></i></h6>

					<?php
										  	}

										  	 ?>





				</div>
			</td>

		</tr>
		<?php
						                 }	
 ?></tbody>
</table><?php
						          
							
				}

				function manage_form_content_admin() {
				
   

					include '../create_form/connect.php';
								$sql = " select * from form_classification where `csform_id` IN ('62','60')  order by csform_id desc    ";
						                $result = mysqli_query($con,$sql); 
						               
						                 while($row = mysqli_fetch_array($result)){
						                 	$date = $row['lastmodified'];
						                 	 $status = $row['status'];
						               $token =   $_SESSION['admingcc_token'];
						                 
							?>

<div class="col-md-12 mb-2">

	<div class="card shadow mb-1" style="border-left: 2px solid #36b9cc">

		<div class="card-body" style="font-size: 14px">
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<h6 style="font-weight: bolder;"><?php echo $row['form_name'] ?></h6>
						<br>
						<h6 style="font-size: 12px">Date created : <?php 

										     
										  echo '@'.date("g:ia",strtotime($row['datecreated'])).'<br>'.date("F-d-o",strtotime($row['datecreated'])) ;
										      ?></h6>

					</div>

					<div class="col-sm-6">

						<h6 style="font-size: 12px;"><i class="far fa-clock" style="font-weight: bolder;"></i> Last
							Modified : <?php 

										     
										  echo '<br>@'.date("g:ia",strtotime($row['lastmodified'])).' '.date("F-d-o",strtotime($row['lastmodified'])) ;
										      ?></h6>

						<br>


						<?php 
										  	if($status == 0){
										  		?>
						<button type="button" class="btn btn-primary edit" style="font-size: 12px;float: right; "
							data-csformid="<?php echo $row['csform_id'] ?>" style="font-size: 12px; "
							data-toggle="tooltip" data-placement="right" title="Edit Form"><i class="far fa-edit"></i>
							Manage
						</button>


						<?php
										  		

										  	
										  	}else if($status == $token) {
										  		?>
						<button type="button" class="btn btn-warning edit" style="font-size: 12px;float: right; "
							data-csformid="<?php echo $row['csform_id'] ?>" style="font-size: 12px; "
							data-toggle="tooltip" data-placement="right" title="continue unsaved work">
							Continue and save your work <i class="fas fa-sync"></i>
						</button>
						<br><br>
						<button type="button" class="btn btn-success exitnow mt-2"
							data-csformid="<?php echo $row['csform_id'] ?>" style="font-size: 12px;float: right; "
							data-toggle="tooltip" data-placement="right"
							title="Save Work as Exit only">Save&Exit</button>
						<?php

										  	}else if($status != $token) {
										  		?>
						<h6 class="bg-danger"
							style="font-size: 12px;float: right; color: white;padding: 10px;cursor: not-allowed; "
							style="padding: 10px;color: white;font-size: 12px;cursor: not-allowed;">This page's content
							is currently being updated. <i class="fas fa-ban"></i></h6>

						<?php
										  	}

										  	 ?>

					</div>
				</div>
			</div>

		</div>
	</div>
</div>


<?php
						                 }	
 
						          
							
				}

				function requestforms(){
					include '../create_form/connect.php';
					?>

<input type="text" name="" class="form-control mb-2" id="searchfilt" style="font-size: 12px;width: auto;"
	placeholder="Search Filter...">

<table class="table table-striped" id="requesttable">
	<thead>
		<tr class="table-success">
			<th scope="col">
				<div class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" id="customCheck">
					<label class="custom-control-label" for="customCheck">*</label>
				</div>
			</th>
			<th scope="col">Student ID</th>

			<th scope="col">From</th>

			<th scope="col">To</th>

			<th scope="col">Date-Submitted</th>
			<th scope="col">Name</th>
			<th scope="col">Action</th>

		</tr>
	</thead>
	<tbody>
		<?php 

    //include '../encrypt/sfgcc.php';
   // $enc =  new encryptdata();
                       $sql = " SELECT * FROM `student` ";
                      $result = mysqli_query($con,$sql); 
                   
                    
                
                     
                       while($row = mysqli_fetch_array($result)){
                          $studentid = $row['stud_id'];
                          $student_lname = $row['stud_lname'];
                          $student_fname = $row['stud_fname'];
                          $student_mname = $row['stud_mname'];
                          $student_email = $row['stud_email'];
                          $stud_coll = $row['stud_college'];
                            $student_Fullname = $student_lname.' '.$student_fname.' '.$student_mname;
                         $studemail = substr($student_email, 0, strpos($student_email,'@'));
        $sqls = " select * from form_response where userid='$studentid' and csformid = '60' and status = 'For Approval'   ";
        //and status = 'For Approval'
                                          $results = mysqli_query($con,$sqls); 
                                          $counts= mysqli_num_rows($results); 
                                       	  	 

                                       if ($counts>=1){
                                       	 $ruler[] = $counts;
                                        
                                           while($rows = mysqli_fetch_array($results)){
                                          $csform= $rows['csformid'];
                                          $user = $rows['userid'];
                                          $respondedat = $rows['datecreated'];
                                          $respo = date('Y-m-d',strtotime($respondedat));
                                          $coursetoshift = $rows['course'];
                                          $fromwhere = $rows['fromwhere'];
                                          $collegeid= $rows['CollegeId'];
                                          $idforfiles[]= $rows['formid'];

                                          $shid = $rows['shifting_history'];

                                         

                                           }
                                    
                            //  $formid = $enc -> encryption($csform,"gccformtokenshift"); 
                           //   $studentids = $enc -> encryption($studentid,"gccstudent123shift");
   
               
          


                                           
                                           ?>
		<tr id="tabledesign<?php echo $studentid ?> " class="tabledesign" style="background-color: #f0f5f8; ">
			<td>


				<div class="custom-control custom-checkbox mb-1">
					<input type="checkbox" class="custom-control-input checkall"
						id="customCheck<?php echo $studentid ?>" data-sid="<?php echo $studentid ?>"
						name="approvedcheck[]" value="<?php echo $studentid ?>">
					<label class="custom-control-label" for="customCheck<?php echo $studentid ?>"></label>

					<input type="hidden" name="shift[]" value="<?php echo $coursetoshift ?>">
					<input type="hidden" name="collegetoshift[]" value="<?php echo $collegeid ?>">
				</div>
				<!--<a href="javascript:void(0)" class="showmore"  id="showmore<?php echo $studentid ?>" data-sid="<?php echo $studentid ?>" style="padding: 2px"><i class="fas fa-plus-circle"></i></a> -->
				<input type="checkbox" name="" id="showmorecheck<?php echo $studentid ?>" style="display: none">

			</td>
			<td scope="row"><span style="font-size: 12px"><?php echo $studemail ?></span></td>
			<td><?php 
                                        echo $fromwhere ;

                                        	$fromwhatcollege = "select * from course where course ='$fromwhere'  ";
                                        	 $findcollege = mysqli_query($con,$fromwhatcollege); 
                                        	
                                         while($course = mysqli_fetch_array($findcollege)){
                                        				$fromwherecolid = $course['CollegeId'];		
                                        	 }
                                        	
                                        			$getcollege = "select * from colleges where CollegeId ='$fromwherecolid'  ";
                                        			 $gcollge = mysqli_query($con,$getcollege); 
                                        		
                                        		
                                        		
                                        		 while($getcol = mysqli_fetch_array($gcollge)){
                                        					echo '<br> <span class="text-info">('.$getcol['college'].')</span> ';			
                                        			 }
                                        		
                                        		 
                                         

                                      	?></td>
			<td><?php echo $coursetoshift;

                                        $fromwhatcolleges = "select * from course where course ='$coursetoshift'  ";
                                        	 $findcolleges = mysqli_query($con,$fromwhatcolleges); 
                                        	
                                         while($courses = mysqli_fetch_array($findcolleges)){
                                        			$fromwherecolids = $courses['CollegeId'];	
                                        	 }
                                        	 	$getcolleges = "select * from colleges where CollegeId ='$fromwherecolids'  ";
                                        			 $gcollges = mysqli_query($con,$getcolleges); 
                                        		
                                        		
                                        		
                                        		 while($getcols = mysqli_fetch_array($gcollges)){
                                        					echo '<br> <span class="text-info">('.$getcols['college'].')</span> ';			
                                        			 }

                                         ?></td>
			<td><?php echo date('F j,Y',strtotime($respondedat)) ?></td>
			<td>
				<?php echo $student_lname.' '.$student_fname.' '.substr($student_mname,0,1).'.'; ?>

			</td>
			<td>
				<nav>
					<ul class="pagination pagination-sm">




						<li class="page-item">

						</li>


						<a type="button" style="font-size: 12px;" class="page-link" data-toggle="modal"
							data-target=".bd-example-modal-sm<?php echo $studentid  ?>">Other Details</a>




						<a class="page-link text-success "
							href="session.php?student-sf&sftoken=60&studenttokenid=<?php echo $studentid ?>&studentname=<?php echo  $student_Fullname ?>"
							target="_blank" style="font-size: 12px;" data-bs-toggle="tooltip" data-bs-placement="right"
							title="Generated Shifting Form Editable">Generate Shifting Form</a>






						<!-- Button trigger modal -->
						<a class="page-link text-danger" id="viewdatao" data-studentid="<?php echo $studentid ?>"
							type="button" style="font-size:12px" data-toggle="modal" data-target="#viewdata">
							VIEW
						</a>

						<!-- Modal -->
						<div class="modal fade" id="viewdata" tabindex="-1" role="dialog"
							aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-lg" role="document">
								<div class="modal-content ">
									<div class="modal-header">
										<h6 class="modal-title" id="exampleModalLabel">Student Choices</h6>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">


										<div class="container">


											<?php 
    									

    										$getall_shdata = "SELECT * FROM `shifting_history` where sh_id = '$shid'   ";
    										 $gettingshdata = mysqli_query($con,$getall_shdata); 
    										 $countsh= mysqli_num_rows($gettingshdata);
    								
    										if($countsh >=1){
    									 while($sh = mysqli_fetch_array($gettingshdata)){
    									 $cc1 = $sh['choice_course1'];
                                $cc2 = $sh['choice_course2'];
                                $cc3 = $sh['choice_course3']; 
                                $r1 = $sh['r1'];
                                $r2 = $sh['r2'];
                                $r3 = $sh['r3'];
                                $tocourse = $sh['to_course'];
                                $c1 = $sh['c1'];
                                 $c2 = $sh['c2'];
                                  $c3 = $sh['c3'];
                                  $suggested = $sh['suggestion_course'];



 $getcoursedata = "select * from course where courseid in ('$cc1','$cc2','$cc3' ,'$suggested') order by courseid ='$cc1',courseid='$cc2',courseid='$cc3'; ";
 $gettingcoursedata = mysqli_query($con,$getcoursedata); 
                                	
                                 while($cs = mysqli_fetch_array($gettingcoursedata)){

                                 			if($suggested == $cs['courseid']){
                                 				$suggestedcourse = $cs['course'];

                                 				?>
											<div class="card shadow mt-2 mb-2 ">

												<div class="card-body ">
													<span style="font-size:11px" class="text-success">SUGGESTED</span>
													<h6>
														<?php echo $cs['course'] ?>
														<?php 
    										if($tocourse == $cs['courseid']){
    											?>
														<span style="float:right;"
															class="badge badge-success">CURRENT</span>
														<?php
    										}else {

    												if($c1 >= 1){
    												?>
														<span style="float:right;"
															class="badge badge-danger">DECLINED</span>
														<?php
    											}

    										}



    									 ?>



													</h6>
													<?php 
    									if($c1 >= 1){
    												?>

													<?php
    											}else {
    												if($tocourse == $cs['courseid']){
    															?>
													<span style="float: right;"><button
															class="btn btn-light text-danger " type="button"
															data-dismiss="modal" data-toggle="modal"
															data-target="#declinemodal" data-backdrop="static"
															data-keyboard="false"
															style="font-size: 12px">Decline</button></span>
													<?php	
    													}else {
    														
    													}
    											}

    								 ?>


												</div>
											</div>

											<?php
                                 			}



                                			if($cs['courseid'] == $cc1){

                                			
                                 	
				                                 			?>

											<div class="card shadow mt-2 mb-2">

												<div class="card-body ">
													<span style="font-size:11px">First Choice</span>
													<h6>
														<?php echo $cs['course'] ?>
														<?php 
    										if($tocourse == $cs['courseid']){
    											?>
														<span style="float:right;"
															class="badge badge-success">CURRENT</span>
														<?php
    										}else {

    												if($c1 >= 1){
    												?>
														<span style="float:right;"
															class="badge badge-danger">DECLINED</span>
														<?php
    											}

    										}



    									 ?>
														<hr>

														<span>Reason :</span> <br>
														<span class="text-primary"><?php echo $r1 ?></span>
													</h6>
													<?php 
    									if($c1 >= 1){
    												?>

													<?php
    											}else {
    												if($tocourse == $cs['courseid']){
    															?>
													<span style="float: right;"><button
															class="btn btn-light text-danger " type="button"
															data-dismiss="modal" data-toggle="modal"
															data-target="#declinemodal" data-backdrop="static"
															data-keyboard="false"
															style="font-size: 12px">Decline</button></span>
													<?php	
    													}else {
    														
    													}
    											}

    								 ?>


												</div>
											</div>
											<?php
				                                 	
                                			
                                			
                                			}else if($cs['courseid'] == $cc2){
                                			
				                                 			?>

											<div class="card shadow mt-2 mb-2">

												<div class="card-body ">
													<span style="font-size:11px">Second Choice</span>
													<h6>
														<?php echo $cs['course'] ?>
														<?php 
    										if($tocourse == $cs['courseid']){
    											?>
														<span style="float:right;"
															class="badge badge-success">CURRENT</span>
														<?php
    										}else {
    												if($c2 >= 1){
    												?>
														<span style="float:right;"
															class="badge badge-danger">DECLINED</span>
														<?php
    											}
    										}

    									 ?>
														<hr>

														<span>Reason :</span> <br>
														<span class="text-primary"><?php echo $r2 ?></span>
													</h6>

													<?php 
    									if($c2 >= 1){
    												?>

													<?php
    											}else {
    												if($tocourse == $cs['courseid']){
    															?>
													<span style="float: right;"><button
															class="btn btn-light text-danger " type="button"
															data-dismiss="modal" data-toggle="modal"
															data-target="#declinemodal" data-backdrop="static"
															data-keyboard="false"
															style="font-size: 12px">Decline</button></span>
													<?php	
    													}else {
    														
    													}
    											}

    								 ?>

												</div>
											</div>
											<?php
				                                 	
                                			
                                			}else if ($cs['courseid'] == $cc3){
                                				
				                                 			?>

											<div class="card shadow mt-2 mb-2">

												<div class="card-body ">
													<span style="font-size:11px">Third Choice</span>
													<h6>
														<?php echo $cs['course'] ?>
														<?php 
    										if($tocourse == $cs['courseid']){
    											?>
														<span style="float:right;"
															class="badge badge-success">CURRENT</span>
														<?php
    										}else {
    												if($c3 >= 1){
    												?>
														<span style="float:right;"
															class="badge badge-danger">DECLINED</span>
														<?php
    											}else {
    												?>

														<?php
    											}
    										}

    									 ?>
														<hr>

														<span>Reason :</span> <br>
														<span class="text-primary"><?php echo $r3 ?></span>
													</h6>

													<?php 
    									if($c3 >= 1){
    												?>

													<?php
    											}else {
    													if($tocourse == $cs['courseid']){
    															?>
													<span style="float: right;"><button
															class="btn btn-light text-danger " type="button"
															data-dismiss="modal" data-toggle="modal"
															data-target="#declinemodal" data-backdrop="static"
															data-keyboard="false"
															style="font-size: 12px">Decline</button></span>
													<?php	
    													}else {

    													}
    											
    											}

    								 ?>

												</div>
											</div>
											<?php
				                                 	
                                			
                                			}


                                	 }
                                
                                 
    												
												

    										 }
    									
    									 }else {
    									 	echo 'no data found';
    									 }

    								/*
										 
    								*/

    									 ?>







										</div>


									</div>
									<div class="modal-footer">
										<a class="btn btn-primary approvethis" data-sid="<?php echo $studentid ?>"
											href="javascript:void(0)" style="font-size: 13px"
											data-shift="<?php echo $coursetoshift ?>"
											data-toshitcid="<?php echo $collegeid  ?>" data-toggle="tooltip"
											data-placement="bottom" title="Forward request to receiving college">Forward
											to Receiving College</a>
									</div>
								</div>
							</div>
						</div>


						<div class="modal fade" id="declinemodal" tabindex="-1" role="dialog"
							aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h6 class="text-danger">Reason</h6>
									</div>
									<form method="post" action="session.php" id="declined">
										<input type="hidden" name="declined">


										<div class="modal-body">


											<input type="hidden" name="studid" id="studid">

											<ul style="list-style: none">
												<li>
													<h6>Declining <span id="username"
															style="font-weight: bolder;text-decoration: underline;"
															class="text-secondary"></span> Request.</h6>
												</li>
												<li><input type="checkbox" class="rtc" name="reason" value="1"> DID NOT
													meet the grade requirments</li>
												<li><input type="checkbox" class="rtc" name="reason" value="2"> DID NOT
													meet other requirements</li>
												<li><input type="checkbox" class="rtc" name="reason" value="4"> No
													vacant slot</li>
												<li><input type="checkbox" class="rtc" name="reason" value="5"> Failed
													in interview</li>
												<li><br> Remarks:
													<br>

													<textarea class="form-control" id="remarks" rows="5"
														style="font-size:13px"></textarea>


												</li>

												<li> <br>
													Suggest Course:
													<select class="form-control" id="sec<?php echo $shid ?>"
														name="course" style="font-size: 13px;">
														<option value="select">select course</option>
														<?php 
		 	 		  	 	 	 	   						$sqlcc = " SELECT * FROM `course` where courseid not in (select to_course from shifting_history where stud_id ='$studentid' )  ";
								                $resultcc = mysqli_query($con,$sqlcc); // run query
								                $countcc= mysqli_num_rows($resultcc); // to count if necessary
								               //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
								             if ($countcc>=1){
								             	//while($row = mysqli_fetch_array($result)){} is where we output all the data in database
								                 while($row = mysqli_fetch_array($resultcc)){
								                 	$crse = $row['course'];
								                 	?>
														<option value="<?php echo $row['courseid'] ?>">
															<?php echo $crse ?></option>
														<?php

									
								
								                 }
								          }


		 	 		  	 	 	 	   		 ?>

													</select>

												</li>
											</ul>





										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary canceldec"
												style="font-size:12px">Cancel</button>
											<button type="button" class="btn btn-danger btndecline"
												data-studentid="<?php echo $studentid ?>"
												data-shid="<?php echo $shid ?>" style="font-size:12px">Decline</button>
										</div>
									</form>
								</div>
							</div>
						</div>




						</li>

					</ul>
				</nav>






				<div class="modal fade bd-example-modal-sm<?php echo $studentid  ?>" tabindex="-1" role="dialog"
					aria-labelledby="mySmallModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-sm modal-dialog-centered">
						<div class="modal-content">
							<div class="modal-body">
								<button type="button" class="close mb-5" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>


								<div class="container">
									<h6 style="font-weight: bolder;"><span class="text-success"
											style="font-size: 12px">Viewing.. </span>
										<br><?php echo $student_lname.' '.$student_fname.' '.substr($student_mname,0,1).'.'; ?>
									</h6>

									<?php 

									                               foreach ($idforfiles as $key => $value) {

									                             
					                                        $getfileifexist = " select * from form where form_id = '$value' and type = 'file'  ";
					                                                      $gettingfiles = mysqli_query($con,$getfileifexist); 
					                                                      $countingifexist= mysqli_num_rows($gettingfiles);
					                                                     //  $get_id =  mysqli_insert_id($con); 
					                                               if ($countingifexist>=1){
					                                                    
					                                                   $fileexist=1;
					                                                 
					                                                 
					                                                      
					                                                }else {

					                                                }
					                                      }
					                                         

					                                      if(isset($fileexist)){
					                                      	
					                                      	  include 'files.php';

					                                      }


				                             ?>

									<a class="page-link preview" data-csformid="<?php echo $csform ?>"
										data-studentid="<?php echo $studentid ?>"
										data-studname="<?php echo $student_lname.' '.$student_fname.' '.$student_mname.'.' ?>"
										style="font-size: 12px" href="javascript:void(0)"
										data-shift="<?php echo $coursetoshift ?>">View Shifting Profile </a>



									<a class="page-link text-success "
										href="sf.php?student-sf&sftoken=60&studenttokenid=<?php echo $studentid ?>&studentname=<?php echo  $student_Fullname ?>"
										target="_blank" style="font-size: 12px" data-bs-toggle="tooltip"
										data-bs-placement="right" title="Generated Shifting Form">Generated Shifting
										Form (Manual)</a>

									<!--<a  class="page-link text-success " href="sf_edit.php?student-sf&sftoken=60&studenttokenid=<?php echo $studentid ?>&studentname=<?php echo  $student_Fullname ?>" target="_blank" style="font-size: 12px" data-bs-toggle="tooltip" data-bs-placement="right" title="Generated Shifting Form Editable">Generated Shifting Form Editable (Automated)</a> -->




								</div>


							</div>

						</div>
					</div>
				</div>
			</td>
		</tr>

		<!--  <tr class="moreshown d-none" id="moreshown<?php echo $studentid ?>" style="background-color: #ecf1f6">
                                       	<td>
				                          <span class="d-none"><?php echo $studemail ?> </span> 
                                       	</td>
                                       	<td>
                                       		<span class="d-none">Shifting Form</span> 
                                       		<span style="font-weight: bolder">Action : </span>
                                       	</td>
                                       	<td>
                                       		<span class="d-none">	<?php echo $student_lname.' '.$student_fname.' '.substr($student_mname,0,1).'.'; ?></span>
                                       		<nav >
				                          <ul class="pagination pagination-sm">

				                            <li class="page-item"><a class="page-link preview" data-csformid = "<?php echo $csform ?>" data-studentid="<?php echo $studentid ?>" data-studname = "<?php echo $student_lname.' '.$student_fname.' '.$student_mname.'.' ?>" style="font-size: 12px" href="javascript:void(0)" data-shift="<?php echo $coursetoshift ?>">View </a></li>

				                            <?php 
				                           /*    foreach ($idforfiles as $key => $value) {
                                        $getfileifexist = " select * from form where form_id = '$value' and type = 'file'  ";
                                                      $gettingfiles = mysqli_query($con,$getfileifexist); 
                                                      $countingifexist= mysqli_num_rows($gettingfiles);
                                                     //  $get_id =  mysqli_insert_id($con); 
                                               if ($countingifexist>=1){
                                                    
                                                   $fileexist=1;

                                                 
                                                      
                                                }else {

                                                }
                                      }
                                         

                                      if(isset($fileexist)){
                                      	
                                      	  include 'files.php';

                                      }
											*/

				                             ?>
				                          <!--  <li class="page-item">
				                            	<a  class="page-link text-success " href="sf.php?student-sf&sftoken=60&studenttokenid=<?php echo $studentid ?>&studentname=<?php echo  $student_Fullname ?>" target="_blank" style="font-size: 12px" data-bs-toggle="tooltip" data-bs-placement="right" title="Generated Shifting Form">SF</a>
				                            </li>


				                            <li class="page-item"><a class="page-link approvethis" data-sid="<?php echo $studentid ?>" href="javascript:void(0)" style="font-size: 12px" data-shift="<?php echo $coursetoshift ?>" data-toshitcid="<?php echo $collegeid  ?>">Approve <i class="far fa-thumbs-up"></i></a></li>
				                           
				                          </ul>
				                        </nav>
                                       	</td>
                                       	<td></td>
                                       
                                       </tr> -->









		<?php



                                    }else {
                                    	

                                    	
                                    
                                    }

                                }
                                
                              			
				                                


                              	 ?>




		<!-- <tr>
                                        <td colspan="4" style="text-align: center;">
                                          <span >NO FORM REQUEST YET</span>
                                        </td>-->

	</tbody>
</table>


<script src="../../js/jquery.js"></script>
<script src="../../offline/sweetalert.js"></script>
<script type="text/javascript">
	$(document).ready(function () {

		$('.btndecline').click(function () {
			var dec_check = $('input[name="reason"]:checked').length;
			var remarks = $('#remarks').val();
			var shid = $(this).data('shid');
			var studentid = $(this).data('studentid');
			var sec = $('#sec' + shid).val();

			if (sec == "select") {
				if (dec_check >= 1) {

					//alert(dec_check+""+remarks+"="+shid);
					var rason = [];
					$.each($("input[name='reason']:checked"), function () {
						rason.push($(this).val());


					});
					var reasons = rason.join(",");


					$.ajax({
						url: "decline.php",
						method: "POST",
						data: {
							declinecourse: 1,
							reasons: reasons,
							remarks: remarks,
							shid: shid,
							studentid: studentid
						},
						success: function (data) {
							Swal.fire(
								'Declined Successfully!',
								'Student request Declined successfully!',
								'success'
							).then((result) => {

								if (result.isConfirmed) {
									location.reload();
								}
							})

						}
					})



				} else {

					if (remarks == '') {
						$('#remarks').addClass('is-invalid');
					} else {

						alert(shid + " " + remarks);



					}

				}
			} else {


				if (dec_check >= 1) {

					//alert(dec_check+""+remarks+"="+shid);
					var rason = [];
					$.each($("input[name='reason']:checked"), function () {
						rason.push($(this).val());


					});
					var reasons = rason.join(",");


					$.ajax({
						url: "decline.php",
						method: "POST",
						data: {
							declinecourse: 1,
							reasons: reasons,
							remarks: remarks,
							shid: shid,
							studentid: studentid,
							select: sec
						},
						success: function (data) {
							Swal.fire(
								'Declined Successfully!',
								'Student request Declined successfully!',
								'success'
							).then((result) => {

								if (result.isConfirmed) {
									location.reload();
								}
							})
						}
					})



				} else {

					if (remarks == '') {
						$('#remarks').addClass('is-invalid');
					} else {

						alert(shid + " " + remarks);



					}

				}

			}

			/*	 */


		})
		$('#declinemodal').on('hidden.bs.modal', function (e) {
			$('.rtc').prop('checked', false);
			$('#remarks').val('');
		})

		$('#remarks').keyup(function () {
			$('#remarks').removeClass('is-invalid');

		})

		$('.canceldec').click(function () {

			//$('#viewdatao').click();
			$('#declinemodal').modal('hide');

		})

		$('#viewdatao').click(function () {
			var id = $(this).data('studentid');
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function () {
				if (this.readyState == 4 && this.status == 200) {
					const data = this.responseText;



				}
			};
			xhttp.open("POST", "action.php", true);
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhttp.send("sendstudentnotif=1&id=" + id);
		})


		$('.declinest').click(function () {
			//$('#viewdata').modal('hide');	
			//	$('#declinemodal').modal('show');	   
			$('#viewdata').modal('hide');

		})

		$('.approvethis').click(function () {



			var sid = $(this).data('sid');
			var shift = $(this).data('shift');
			var toshitcid = $(this).data('toshitcid');

			Swal.fire({
				title: 'Are you sure?',
				text: "You want to Forward the form of this student?",
				icon: 'question',
				showCancelButton: true,
				confirmButtonColor: '#f6c23e',
				cancelButtonColor: '#858796',
				confirmButtonText: 'Yes, Forward it!'
			}).then((result) => {
				if (result.isConfirmed) {
					var xhttp = new XMLHttpRequest();
					xhttp.onreadystatechange = function () {
						if (this.readyState == 4 && this.status == 200) {
							const data = this.responseText;
							Swal.fire(
								'Forwarded!',
								'Student form Forwarded successfully!',
								'success'
							).then((result) => {

								if (result.isConfirmed) {
									window.location.href = "../Records/";
								}
							})


						}
					};
					xhttp.open("POST", "action.php", true);
					xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					xhttp.send("approveone=1&sid=" + sid + "&shift=" + shift + "&toshitcid=" +
						toshitcid);
				}
			})





		})

		$('.preview').click(function () {
			var csformid = $(this).data('csformid');
			var studentid = $(this).data('studentid');
			var studname = $(this).data('studname');
			var shift = $(this).data('shift');

			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function () {
				if (this.readyState == 4 && this.status == 200) {
					const data = this.responseText;

					window.location.href = "../Responses/";

				}
			};
			xhttp.open("POST", "../Manage_pds/response_view.php", true);
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhttp.send("setsession=1&csformid=" + csformid + "&studentid=" + studentid + "&studname=" +
				studname + "&approve=1&toshift=" + shift);


		})


		$('#searchfilt').keyup(function () {
			var val = $(this).val();
			if (val == '') {
				//alert('empty');
			} else {

				var value = $(this).val().toLowerCase();

				var input, filter, table, tr, td, i, txtValue;
				input = document.getElementById("searchfilt");
				filter = input.value.toUpperCase();
				table = document.getElementById("requesttable");
				tr = table.getElementsByTagName("tr");
				for (i = 1; i < tr.length; i++) {
					// Hide the row initially.
					tr[i].style.display = "none";

					$('#nod').text('No Search Data Found  : ' + value);
					td = tr[i].getElementsByTagName("td");
					for (var j = 0; j < td.length; j++) {
						cell = tr[i].getElementsByTagName("td")[j];
						if (cell) {
							if (cell.innerHTML.toUpperCase().indexOf(filter) > -1) {
								tr[i].style.display = "";


								break;
							}
						}
					}
				}


			}
		})

		$('#customCheck').click(function () {
			if ($(this).prop("checked") == true) {
				$('.checkall').prop('checked', true);
				$('#customCheck').prop('indeterminate', true)
				$('.tablerows').addClass('table-warning');
				$('.moreshown').addClass('d-none');
				$('.showmore').addClass('d-none');
				$('.tabledesign').addClass('table-warning');
			} else if ($(this).prop("checked") == false) {
				$('.checkall').prop('checked', false);
				$('.tablerows').removeClass('table-warning');

				$('.showmore').removeClass('d-none');
				$('.showmore').html('<i class="fas fa-plus-circle"></i>');
				$('.tabledesign').removeClass('table-warning');
			}
		});

		$('.checkall').click(function () {
			var sid = $(this).data('sid');

			if ($('#customCheck' + sid).prop("checked") == true) {
				$('#showmore' + sid).addClass('d-none');
				$('#moreshown' + sid).addClass('d-none');
				$('#showmore' + sid).html('<i class="fas fa-plus-circle"></i>')
				$('#tabledesign' + sid).addClass('table-warning');
			} else if ($('#customCheck' + sid).prop("checked") == false) {
				$('#showmore' + sid).removeClass('d-none');
				$('#moreshown' + sid).addClass('d-none');
				$('#showmore' + sid).html('<i class="fas fa-plus-circle"></i>')
				$('#tabledesign' + sid).removeClass('table-warning');
			}
		});
		$('.showmore').click(function () {
			var sid = $(this).data('sid');


			if ($('#showmorecheck' + sid).prop("checked") == true) {
				$('#showmorecheck' + sid).prop('checked', false);
				$('#showmore' + sid).html('<i class="fas fa-plus-circle"></i>')
				$('#moreshown' + sid).addClass('d-none');


			} else if ($('#showmorecheck' + sid).prop("checked") == false) {
				$('#showmorecheck' + sid).prop('checked', true);
				$('#showmore' + sid).html('<i class="fas fa-minus-circle"></i>')
				$('#moreshown' + sid).removeClass('d-none');


			}
		})



	});
</script>
<?php
				}


				function manage_form_content_admindashboard() {
				
   

					include '../create_form/connect.php';
								$sql = " select * from form_classification limit 3    ";
						                $result = mysqli_query($con,$sql); 
						               
						                 while($row = mysqli_fetch_array($result)){
						                 	$date = $row['lastmodified'];
						                 
							?>
<tr>
	<th scope="row"></th>
	<td></td>
	<td>
		<div class="btn-group" role="group" aria-label="Basic example">




		</div>
	</td>

	<div class="card shadow mb-1" style="border-left: 2px solid #36b9cc">

		<div class="card-body" style="font-size: 14px">
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<h6 style="font-weight: bolder;"><?php echo $row['form_name'] ?></h6>
						<br>
						<h6 style="font-size: 12px">Date created : <?php 

										     
										  echo '@'.date("g:ia",strtotime($row['datecreated'])).'<br>'.date("F-d-o",strtotime($row['datecreated'])) ;
										      ?></h6>

					</div>

					<div class="col-sm-6">

						<h6 style="font-size: 12px;"><i class="far fa-clock" style="font-weight: bolder;"></i> Last
							Modified : <?php 

										     
										  echo '<br>@'.date("g:ia",strtotime($row['lastmodified'])).' '.date("F-d-o",strtotime($row['lastmodified'])) ;
										      ?></h6>

						<br>

					</div>
				</div>
			</div>

		</div>
	</div>


	<?php
						                 }	
 ?></tbody>
	</table><?php
						          
							
				}
function sendlinkform_content() {
				?> <table class="table table-hover" id="table_ids">
		<thead>
			<tr>
				<th scope="col">Form Name</th>
				<th scope="col">Link</th>
				<th scope="col">Actions</th>

			</tr>
		</thead>
		<tbody>
			<?php
   

					include '../create_form/connect.php';
								$sql = " select * from form_classification  where csform_id !='62' and csform_id != '60'   ";
						                $result = mysqli_query($con,$sql); 
						               
						                 while($row = mysqli_fetch_array($result)){
						        $csform = $row['csform_id'];
							?>


			<tr>
				<th scope="row"><?php echo $row['form_name'] ?></th>
				<td><span><?php echo $_SERVER['SERVER_NAME']; ?><?php echo $_SERVER['REQUEST_URI']; ?>?formlink&form_name=<?php echo $row['form_name'] ?>
						&token_id=<?php echo $row['csform_id'] ?></span></td>
				<td>

					<?php 
										if($csform == 60 || $csform == 62){

										}else {

											?>
					<div class="btn-group" role="group" aria-label="Basic example">

						<!--<button type="button" class="btn btn-primary send"  data-formname="<?php echo $row['form_name'] ?>" data-toggle="modal" data-target="#receiver" data-backdrop="static" data-keyboard="false" data-csformid = "<?php echo $row['csform_id'] ?>" style="font-size: 12px; " data-toggle="tooltip" data-placement="right" title="Send"><i class="far fa-share-square"></i> Send</button>-->



						<button type="button" class="btn btn-success copy  "
							data-formname="<?php echo $row['form_name'] ?>" title="Copied" data-trigger="focus"
							data-csformid="<?php echo $row['csform_id'] ?>"
							data-server="<?php echo $_SERVER['SERVER_NAME']; ?>"
							data-uri="<?php echo $_SERVER['REQUEST_URI']; ?>" style="font-size: 12px; "
							data-toggle="popover" title="Form link"
							data-content="Link has been copied to clipboard ✓"><i class="far fa-copy"> </i>
							CopyLink</button>





					</div>
					<?php	
										}
										  ?>

				</td>

			</tr>
			<?php
						                 }	
 ?></tbody>
	</table><?php
						          
							
				}

	function recentact() {
		include '../create_form/connect.php';
		date_default_timezone_set('Asia/Manila'); 
			$defdt =  date("Y-m-d H:i:s");

		$csform = $_SESSION['form_id'];
		$admintoken = $_SESSION['admingcc_token'];	
			
			
					$sql = " UPDATE `form_classification` SET  `modifiedby`='$admintoken',`lastmodified`='$defdt' WHERE csform_id = '$csform'  ";
			                $result = mysqli_query($con,$sql);
			             
			                
			          
	}
	
	function setrecentcontent() {
		include '../create_form/connect.php';
				$sql = " SELECT * FROM `form_classification` ORDER BY lastmodified desc limit 2  ";
				                $result = mysqli_query($con,$sql); // run query
				             
				                 while($row = mysqli_fetch_array($result)){
				                 	$date = $row['lastmodified'];
				                 	$adid = $row['modifiedby'];
							?>
	<div class="row">
		<div class="card">

			<div class="card-body">
				<p style="cursor: default; font-size: 15px;"><i class="far fa-clock" style="font-weight: bolder;"></i>
					Last Modified : <span style="color: #891f2f"><time class="timeago" datetime="<?php echo $date?>"
							title="<?php echo $date ?>"></time></span> </p>
				<hr>
				<h5 style="text-align: center;" class="card-title"><?php echo $row['form_name']; ?></h5>
				<p style="text-align: center;" class="card-text">Modified By : <span
						style="font-weight:bolder;font-style: italic;"><?php 
									    	$getadmin_name = "select * from administrator where admin_id = '$adid'  ";
									    	 $gadmmm = mysqli_query($con,$getadmin_name); 
									    	
									     while($gadmin = mysqli_fetch_array($gadmmm)){
									    					echo $gadmin['admin_lname'].' '.$gadmin['admin_fname'];	
									    	 }
									    
									     
									     ?></span></p>
				<a href="#" class="btn btn-primary managecontent" data-csformid="<?php echo $row['csform_id']; ?>"
					style="float: right;">Manage Contents</a>
			</div>
		</div>
		<p></p>
	</div>
	<?php		
				                 }
				          	
		

	}


	function announcements(){
			include '../../create_form/connect.php';
					$sql = " SELECT * FROM `announcement` where stat =0 ";
			                $result = mysqli_query($con,$sql); // run query
			                $count= mysqli_num_rows($result); // to count if necessary
			               //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
			             if ($count>=1){
			             	//while($row = mysqli_fetch_array($result)){} is where we output all the data in database
			                 while($row = mysqli_fetch_array($result)){
								?>
	<div class="card shadow mb-4" style="border-top: 1px solid #11be85">

		<div class="card-body">
			<i class="fas fa-bullhorn"></i>
			<p></p>
			<p style="font-size: 13px;"> <?php echo $row['content'] ?>
			</p>

			<button class="delannoucement" data-aid="<?php echo $row['a_id'] ?>"
				data-ainfo="<?php echo $row['content'] ?>"
				style="outline: none;border: none;float: right; margin-left: 5px;"><i
					class="far fa-trash-alt text-gray-800"></i></button>
			<button class="editannouncement" data-aid="<?php echo $row['a_id'] ?>" data-toggle="modal"
				data-target="#edit" data-ainfo="<?php echo $row['content'] ?>"
				style="outline: none;border: none;float: right;"><i class="far fa-edit text-gray-800"></i></button>
		</div>
	</div>
	<?php
			                 }
			                  

			          }else {
			          	?>
	<div class="" style="text-align: center;">

		<img src="img/undraw_void_3ggu.png" class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 30rem;">
		<h6>Announcement is empty.</h6>
	</div>
	<?php
			          }
	}

	function newsfeed(){
			include '../../create_form/connect.php';
					$sql = " SELECT * FROM `newsfeed` ";
			                $result = mysqli_query($con,$sql); // run query
			                $count= mysqli_num_rows($result); // to count if necessary
			               //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
			             if ($count>=1){
			             	//while($row = mysqli_fetch_array($result)){} is where we output all the data in database
			                 while($row = mysqli_fetch_array($result)){
			                 	$img = $row['picture'];
			                 	if($img == ''){
			                 		$imgsrc = '../img/undraw_void_3ggu.png';
			                 	}else {
			                 		$imgsrc = '../img/uploads/'.$img;
			                 	}
								?>
	<div class="card shadow mb-4" style="border-top: 1px solid #11be85">

		<div class="card-body">
			<div class="row">
				<?php 


                                   		 	 ?>
				<div class="col-md-4">
					<img src="<?php echo $imgsrc ?>" style="width: 120px;height: 120px;" class="img-thumbnail">
				</div>


				<div class="col-md-8">
					<br>
					<h5 style="font-size: 17px; font-weight: bolder"><?php echo $row['title'] ?></h5>
					<p style="font-size: 13px; user-select: none"> <?php echo $row['content'] ?>
					</p>
					<a href="<?php echo $row['link'] ?>" target="_blank"
						style="font-size: 13px;"><?php echo $row['link'] ?></a>

					<button class="delnf" data-aid="<?php echo $row['n_id'] ?>"
						data-ainfo="<?php echo $row['content'] ?>"
						style="outline: none;border: none;float: right; margin-left: 5px;"><i
							class="far fa-trash-alt text-gray-800"></i></button>
					<button class="editnf" data-aid="<?php echo $row['n_id'] ?>"
						data-title="<?php echo $row['title'] ?>" data-toggle="modal" data-target="#edit"
						data-ainfo="<?php echo $row['content'] ?>" data-imgfile="<?php echo $imgsrc ?>"
						data-defimgfile="<?php echo $img ?>" data-link="<?php echo $row['link'] ?>"
						style="outline: none;border: none;float: right;"><i
							class="far fa-edit text-gray-800"></i></button>
				</div>
			</div>


		</div>
	</div>
	<?php
			                 }
			          }else {
			          	?>
	<div class="" style="text-align: center;">

		<img src="../img/undraw_empty_street_sfxm.png" class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 30rem;">
		<h6>News feed is empty.</h6>
	</div>
	<?php
			          }
	}


	function newsfeedfordashboard(){
			include '../create_form/connect.php';
					$sql = " SELECT * FROM `newsfeed` ";
			                $result = mysqli_query($con,$sql); // run query
			                $count= mysqli_num_rows($result); // to count if necessary
			               //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
			             if ($count>=1){
			             	//while($row = mysqli_fetch_array($result)){} is where we output all the data in database
			                 while($row = mysqli_fetch_array($result)){
			                 	$img = $row['picture'];
			                 	if($img == ''){
			                 		$imgsrc = '../img/undraw_void_3ggu.png';
			                 	}else {
			                 		$imgsrc = '../img/uploads/'.$img;
			                 	}
								?>
	<div class="card shadow mb-4" style="border-top: 1px solid #11be85">

		<div class="card-body">
			<div class="row">
				<?php 


                                   		 	 ?>
				<div class="col-md-4">
					<img src="<?php echo $imgsrc ?>" style="width: 120px;height: 120px;" class="img-thumbnail">
				</div>


				<div class="col-md-8">
					<br>
					<h5 style="font-size: 17px; font-weight: bolder"><?php echo $row['title'] ?></h5>
					<p style="font-size: 13px; user-select: none"> <?php echo $row['content'] ?>
					</p>
					<a href="<?php echo $row['link'] ?>" target="_blank"
						style="font-size: 13px;"><?php echo $row['link'] ?></a>


				</div>
			</div>


		</div>
	</div>
	<?php
			                 }

			                  ?>

	<div class="container">
		<a href="../Newsfeed/?addarticle">Add new Article</a>
	</div>

	<?php

			          }else {
			          	?>
	<div class="" style="text-align: center;">

		<img src="../img/undraw_empty_street_sfxm.png" class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 30rem;">
		<h6>Article is Empty.</h6>
		<a href="../Newsfeed/?addarticle">Click here to add</a>
	</div>
	<?php
			          }
	}


	function peerfacilitatorfordashboard(){
		include '../create_form/connect.php';
					$sql = " SELECT * FROM `peer_facilitator` ";
		                $result = mysqli_query($con,$sql); 
		                $count= mysqli_num_rows($result); 
		            
		             if ($count>=1){
		             
		                 while($row = mysqli_fetch_array($result)){
							$img = $row['photo'];
			                 	if($img == ''){
			                 		$imgsrc = '../img/undraw_profile_pic_ic5t.png';
			                 	}else {
			                 		$imgsrc = '../img/uploads/'.$img;
			                 	}
								?>
	<div class="card shadow mb-4" style="border-top: 1px solid #11be85;border-bottom: 1px solid #11be85">
		<div class="row">

			<div class="col-md-12">
				<span class="bg-success"
					style="font-size: 12px;padding: 5px; background-color: green;color: white;user-select: none">Facilitator</span>


			</div>
		</div>

		<div class="card-body">
			<div class="row">

				<div class="col-md-4">
					<img src="<?php echo $imgsrc ?>" style="width: 120px;height: 120px;" class="img-thumbnail">
				</div>


				<div class="col-md-8">


					<h6 style="font-weight: bolder"><?php echo $row['lname'] ?> , <?php echo $row['gname'] ?>
						<?php echo $row['mname'] ?>. <?php echo $row['extname'] ?></h6>

					<h6 style="font-size: 14px">
						<?php echo $row['email'] ?>
						<br>
						<hr>
						Major in :
						<span style="font-size: 15px; "><?php echo $row['major'] ?></span> <br>
						Year in School : <span style="font-size: 15px; "><?php echo $row['yearinschool'] ?> years</span>

					</h6>


					<br>




				</div>
			</div>


		</div>


	</div>
	<?php

		                 }
		                 ?>

	<div class="container">
		<a href="../Newsfeed/?addpeerfacilitator">Add new Peer Facilitator</a>
	</div>

	<?php


		          }else {
		          ?>
	<div class="" style="text-align: center;">

		<img src="../img/undraw_empty_street_sfxm.png" class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 30rem;">
		<h6>There was no facilitator yet.</h6>
		<a href="../Newsfeed/?addpeerfacilitator">Click here to add</a>
	</div>
	<?php
		          }
	}

	}



 ?>
	<script>
		$(document).ready(function () {
			$('[data-toggle="popover"]').popover();
		});

		$('.send').click(function () {
			var formname = $(this).data('formname');
			var formid = $(this).data('csformid');
			$('#formidentity').text(formname);


		})

		$('.copy').click(function () {
			var formname = $(this).data('formname');
			var formid = $(this).data('csformid');
			var server = $(this).data('server');
			var uri = $(this).data('uri');
			navigator.clipboard.writeText(server + uri + '?formlink&form_name=' + formname + '&token_id=' + formid);




		})


		$('.delannoucement').click(function () {
			var aid = $(this).data('aid');
			var ainfo = $(this).data('ainfo');
			$('#aid').val(aid);
			Swal.fire({
				title: 'Are you sure?',
				text: "You won't be able to revert this!",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes, delete it!'
			}).then((result) => {
				if (result.isConfirmed) {
					Swal.fire(
						'Deleted!',
						'Event has been deleted.',
						'success'
					)

					var xhttp = new XMLHttpRequest();
					xhttp.onreadystatechange = function () {
						if (this.readyState == 4 && this.status == 200) {
							const data = this.responseText;


							contents();
							$('#changecolor').attr('style', 'border:1px solid #1bc86f');
							$('#cn').html(
								'<h6 style="font-size: 14px;" class="m-0 font-weight-bold text-primary" >Announcement DELETED successfully ✓</h6>'
								);
							var clear = setInterval(function () {
								$('#cn').html(
									'<h6 style="font-size: 14px;" class="m-0 font-weight-bold text-primary" >Contents</h6>'
									);
								$('#changecolor').removeAttr('style');
								clearInterval(clear);
							}, 3000);

						}
					};
					xhttp.open("POST", "../include/assets/manage.php", true);
					xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					xhttp.send("deleteaid=1&aid=" + aid);


					//backend here


				}
			})


		})

		function contents() {

			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function () {
				if (this.readyState == 4 && this.status == 200) {
					const data = this.responseText;

					// Your condition here if data success.
					$('#contentss').html(data);
				}
			};
			xhttp.open("POST", "../include/assets/manage.php", true);
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhttp.send("content=1");


		}

		function nfcontents() {

			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function () {
				if (this.readyState == 4 && this.status == 200) {
					const data = this.responseText;

					// Your condition here if data success.
					$('#contentss').html(data);
				}
			};
			xhttp.open("POST", "../include/assets/manage.php", true);
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhttp.send("contentfornewsfeed=1");


		}




		$('.editannouncement').click(function () {
			var aid = $(this).data('aid');
			var ainfo = $(this).data('ainfo');
			$('#txtann').val(ainfo);
			$('#aidedit').val(aid);

		})

		$('.delnf').click(function () {
			var aid = $(this).data('aid');
			var ainfo = $(this).data('ainfo');
			$('#aid').val(aid);

			Swal.fire({
				title: 'Are you sure?',
				text: "You won't be able to revert this!",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes, delete it!'
			}).then((result) => {
				if (result.isConfirmed) {
					Swal.fire(
						'Deleted!',
						'Event has been deleted.',
						'success'
					)

					var xhttp = new XMLHttpRequest();
					xhttp.onreadystatechange = function () {
						if (this.readyState == 4 && this.status == 200) {
							const data = this.responseText;


							nfcontents();


						}
					};
					xhttp.open("POST", "../include/assets/manage.php", true);
					xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					xhttp.send("deletenf=1&nid=" + aid);


					//backend here


				}
			})


		})
		$('.editnf').click(function () {
			var aid = $(this).data('aid');
			var ainfo = $(this).data('ainfo');
			var title = $(this).data('title');
			var imgfile = $(this).data('imgfile');
			var links = $(this).data('link');

			$('#uptconfigimage').attr('src', imgfile);
			$('#upttxttitle').val(title);
			$('#uptexampleFormControlTextarea1').val(ainfo);
			$('#upttxtlinks').val(links);
			$('#nid').val(aid);



		})
	</script>