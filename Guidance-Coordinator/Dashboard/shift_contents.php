<?php 
session_start();
include '../../GCC/create_form/connect.php';

 	/*if(isset($_POST['fromdefcontent'])){
 		
 		$sem = $_POST['sem'];
 		$year = $_POST['year'];

	//	echo $sem;
	//echo $year;

		          $getallcolleges_ = "select * from colleges where CollegeId in (SELECT from_ FROM `shifting_history` where year(datecreated) = '$year' and semester = '$sem'  ) ";
                 $gettingcolleges = mysqli_query($con,$getallcolleges_); 
               	 $countfrom= mysqli_num_rows($gettingcolleges);
               	 if($countfrom >=1){


               while($row = mysqli_fetch_array($gettingcolleges)){
               	$cid = $row['CollegeId'];
               	
                     ?>

                 	 <li class="list-group-item d-flex justify-content-between align-items-center">
                 	 		<span class="collegefrom" data-id = "<?php echo $row['CollegeId'] ?>"  data-toggle="modal" data-target="#from<?php echo $row['CollegeId'] ?>" style="cursor: pointer;" data-sem="<?php echo $sem ?>" data-year="<?php echo $year ?>">
   				<?php echo $row['college'] ?> 
   							</span>



				<div class="modal fade" id="from<?php echo $row['CollegeId'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog modal-lg" role="document">
				    <div class="modal-content">
				     
				      <div class="modal-body container">
				      	  <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				        <button class="btn btn-light text-primary" id="printpagefrom<?php echo $cid ?>" style="font-size:12px"> Print </button>
				        <div id="printpage_from">
				          <img class="wmsuimg" style="" src="../img/bgwmsu.jfif">
                  <img class="gccimg" style="" src="../img/gcc.png">
                  <br>
                    <h4 style="text-align:center">
                       <span style="font-size:14px"> Western Mindanao State University<br></span>
                                 

                      Guidance and Counseling Center  <br>
                     <span style="font-size:12px;" >Zamboanga City</span>
                     <br>
                    <span style="font-size:12px;text-transform: uppercase;" id=""></span>
                </h4>
                <style type="text/css">
                	
        .wmsuimg {width: 130px; float: left;
         margin-left: 50px;
     }
     .gccimg {
      margin-top: -10px;
        width: 100px; float: right;
      margin-right: 50px;
     }
                     table {
                     
                      border-collapse: collapse;
                      width: 100%;
                    }

                    table td, #customers th {
                      border: 1px solid #ddd;
                      padding: 2px;
                    }

                    table tr:nth-child(even){}

                    table tr:hover {}

                    table th {
                      padding-top: 4px;
                      padding-bottom: 4px;
                      
                      border: 1px solid #ddd;
                      text-align: center;
                      
                    }
                </style>
				        <br>

				       <h6 style="font-size:16px;text-align:center;">Shifting From <?php echo $row['college'] ?></h6>
				       	
                    						<table class="table table-sm table-striped table-bordered" style="font-size:14px">
											  <thead>
											    <tr class="">
											    	
											      <th scope="col">ID</th>
											      <th scope="col">Name</th>
											      <th scope="col">Email & Contact</th>
											      <th scope="col">Course</th>
											       <th scope="col">College</th>
											    </tr>
											  </thead>
											  <tbody>
											 <?php 
											 	$get_studentdata = "select * from student where stud_id in (select stud_id from shifting_history where from_ = '$cid' )";
											 	 $result = mysqli_query($con,$get_studentdata); 
											 	 $countdata= mysqli_num_rows($result);
											 	
											 	if($countdata >=1){
											  while($row = mysqli_fetch_array($result)){
	    	   $studentid = $row['stud_id'];
											    	   $studenti[] = $row['stud_id'];
							                          $student_lname = $row['stud_lname'];
							                          $student_fname = $row['stud_fname'];
							                          $student_mname = $row['stud_mname'];
							                          $student_email = $row['stud_email'];
							                          $retake = $row['retake'];
							                          $modify = $row['modify'];
							                          $upt = $row['upt'];
							                         $studemail = substr($student_email, 0, strpos($student_email,'@'));
							                           $student_course = $row['stud_course'];
                                                $stud_coll = $row['stud_college'];
											   		?>
											   		<tr>
											   			
											   		
											   			
											   			<td>

											   				<?php echo $studemail ?>  

											   			</td>
											   			<td><?php echo $student_fname.' '.$student_mname.' '.$student_lname ?></td>
											   			<td><?php echo $student_email ?>
											   				<br>
											   				#<?php echo $row['contact_no'] ?>

											   			</td>
											   			<td>
											   				<?php 
											$fromwhatcollege = "select * from course where courseid ='$student_course'  ";
                                           $findcollege = mysqli_query($con,$fromwhatcollege); 
                                          
                                         while($course = mysqli_fetch_array($findcollege)){
                                                $fromwherecolid = $course['CollegeId']; 
                                                echo $course['course'];  
                                           }

											   				 ?>
											   			</td>
											   			<td>
											   				<?php 

											   $getcollege = "select * from colleges where CollegeId ='$stud_coll'  ";
                                               $gcollge = mysqli_query($con,$getcollege); 
                                            
                                            
                                            
                                             while($getcol = mysqli_fetch_array($gcollge)){
                                                  echo $getcol['college'];     
                                               }
                                            
											   				 ?>
											   			</td>
											   		</tr>
											   		<?php			
											 	 }
											 
											  }

											  ?>

											  </tbody>
											</table>

											</div>

				      </div>
				    
				    </div>
				  </div>
				</div>
					    
					    	<?php 
					  		$get_count_sh = "select * from shifting_history where from_ ='$cid'  ";
					  		 $gettingcountsh = mysqli_query($con,$get_count_sh); 
					  		 $counntshfrom= mysqli_num_rows($gettingcountsh);
					  	
					  			

					  			if($counntshfrom >=1){
					  				?>
					  				<span style="float:right;"  class="badge badge-primary badge-pill">
					  					<?php echo $counntshfrom; ?>
					  					 </span>
					  				<?php
					  				
					  			}else {

					  			}

					    	 ?>

					   
					  </li>

					

	<script type="text/javascript">
		  $(document).ready(function() {
		  	 function printpagefrom() {
            var divContents = document.getElementById("printpage_from").innerHTML;
          
            var a = window.open('', '', 'height=800, width=1000');
            a.document.write('<html><body>');
            a.document.write(divContents);
            a.document.write('</body></html>');
            a.document.close();
            a.print();
        }

        $('#printpagefrom<?php echo $cid ?>').click(function(){
        	printpagefrom();
        })
		  	$('.collegefrom').click(function(){
 			var id = $(this).data('id');
 			var sem = $(this).data('sem');
 			var year = $(this).data('year');

 		
 		
 		 })
		
		  });
		    
	</script>


                     <?php     
                 }
             }else {
             	 	?>
          	<li class="list-group-item d-flex justify-content-between align-items-center">
          		No Records Found..
          	</li>
          	<?php
             }





		
 	}
*/

	if(isset($_POST['todefcontent'])){
 		
 		$sem = $_POST['sem'];
 		$year = $_POST['year'];

	//	echo $sem;
	//echo $year;
 		$cc =  $_SESSION['gc_collegid'];

		          $getallcolleges_ = "select * from colleges where CollegeId in (SELECT to_ FROM `shifting_history` where year(datecreated) = '$year' and semester = '$sem' and from_ = '$cc'  ) ";
                 $gettingcolleges = mysqli_query($con,$getallcolleges_); 
               	 $countfrom= mysqli_num_rows($gettingcolleges);
               	 if($countfrom >=1){


               while($row = mysqli_fetch_array($gettingcolleges)){
               	$cid = $row['CollegeId'];
               	
                     ?>

                 	 <li class="list-group-item d-flex justify-content-between align-items-center">
                 	 		<span class="collegefrom" data-id = "<?php echo $row['CollegeId'] ?>"  data-toggle="modal" data-target="#from<?php echo $row['CollegeId'] ?>" style="cursor: pointer;" data-sem="<?php echo $sem ?>" data-year="<?php echo $year ?>">
   				<?php echo $row['college'] ?> 
   							</span>



				<div class="modal fade" id="from<?php echo $row['CollegeId'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog modal-lg" role="document">
				    <div class="modal-content">
				     
				      <div class="modal-body container">
				      	  <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				        <button class="btn btn-light text-primary" id="printpageto<?php echo $cid  ?>" style="font-size:12px"> Print</button>
				        <div id="printpage_to">
				          <img class="wmsuimg" style="" src="../img/bgwmsu.jfif">
                  <img class="gccimg" style="" src="../img/gcc.png">
                  <br>
                    <h4 style="text-align:center">
                       <span style="font-size:14px"> Western Mindanao State University<br></span>
                                 

                      Guidance and Counseling Center  <br>
                     <span style="font-size:12px;" >Zamboanga City</span>
                     <br>
                    <span style="font-size:12px;text-transform: uppercase;" id=""></span>
                </h4>
                <style type="text/css">
                	
        .wmsuimg {width: 130px; float: left;
         margin-left: 50px;
     }
     .gccimg {
      margin-top: -10px;
        width: 100px; float: right;
      margin-right: 50px;
     }
                     table {
                     
                      border-collapse: collapse;
                      width: 100%;
                    }

                    table td, #customers th {
                      border: 1px solid #ddd;
                      padding: 2px;
                    }

                    table tr:nth-child(even){}

                    table tr:hover {}

                    table th {
                      padding-top: 4px;
                      padding-bottom: 4px;
                      
                      border: 1px solid #ddd;
                      text-align: center;
                      
                    }
                </style>
				        <br>
				        <h6 style="font-size:16px;text-align:center;">Shifting To <?php echo $row['college'] ?></h6>
				   
				       	
                    						<table class="table table-sm table-striped table-bordered" style="font-size:14px">
											  <thead>
											    <tr class="">
											    	
											      <th scope="col">ID</th>
											      <th scope="col">Name</th>
											      <th scope="col">Email & Contact</th>
											      <th scope="col">Course</th>
											       <th scope="col">College</th>
											    </tr>
											  </thead>
											  <tbody>
											 <?php 
											 	$get_studentdata = "select * from student where stud_id in (select stud_id from shifting_history where from_ = '$cc' )";
											 	 $result = mysqli_query($con,$get_studentdata); 
											 	 $countdata= mysqli_num_rows($result);
											 	
											 	if($countdata >=1){
											  while($row = mysqli_fetch_array($result)){
	    	   $studentid = $row['stud_id'];
											    	   $studenti[] = $row['stud_id'];
							                          $student_lname = $row['stud_lname'];
							                          $student_fname = $row['stud_fname'];
							                          $student_mname = $row['stud_mname'];
							                          $student_email = $row['stud_email'];
							                          $retake = $row['retake'];
							                          $modify = $row['modify'];
							                          $upt = $row['upt'];
							                         $studemail = substr($student_email, 0, strpos($student_email,'@'));
							                           $student_course = $row['stud_course'];
                                                $stud_coll = $row['stud_college'];
											   		?>
											   		<tr>
											   			
											   		
											   			
											   			<td>

											   				<?php echo $studemail ?>  

											   			</td>
											   			<td><?php echo $student_fname.' '.$student_mname.' '.$student_lname ?></td>
											   			<td><?php echo $student_email ?>
											   				<br>
											   				#<?php echo $row['contact_no'] ?>

											   			</td>
											   			<td>
											   				<?php 
											$fromwhatcollege = "select * from course where courseid ='$student_course'  ";
                                           $findcollege = mysqli_query($con,$fromwhatcollege); 
                                          
                                         while($course = mysqli_fetch_array($findcollege)){
                                                $fromwherecolid = $course['CollegeId']; 
                                                echo $course['course'];  
                                           }

											   				 ?>
											   			</td>
											   			<td>
											   				<?php 

											   $getcollege = "select * from colleges where CollegeId ='$stud_coll'  ";
                                               $gcollge = mysqli_query($con,$getcollege); 
                                            
                                            
                                            
                                             while($getcol = mysqli_fetch_array($gcollge)){
                                                  echo $getcol['college'];     
                                               }
                                            
											   				 ?>
											   			</td>
											   		</tr>
											   		<?php			
											 	 }
											 
											  }

											  ?>

											  </tbody>
											</table>

											</div>

				      </div>
				    
				    </div>
				  </div>
				</div>
					    
					    	<?php 
					  		$get_count_sh = "select * from shifting_history where to_ ='$cid'  ";
					  		 $gettingcountsh = mysqli_query($con,$get_count_sh); 
					  		 $counntshfrom= mysqli_num_rows($gettingcountsh);
					  	
					  			

					  			if($counntshfrom >=1){
					  				?>
					  				<span style="float:right;"  class="badge badge-primary badge-pill">
					  					<?php echo $counntshfrom; ?>
					  					 </span>
					  				<?php
					  				
					  			}else {

					  			}

					    	 ?>

					   
					  </li>

					  <script type="text/javascript">
		     function printpageto() {
            var divContents = document.getElementById("printpage_to").innerHTML;
          
            var a = window.open('', '', 'height=800, width=1000');
            a.document.write('<html><body>');
          
            a.document.write(divContents);
            a.document.write('</body></html>');
            a.document.close();
            a.print();
        }

        $('#printpageto<?php echo $cid  ?>').click(function(){
        		printpageto();	  		
        })
		  	$('.collegefrom').click(function(){
 			var id = $(this).data('id');
 			var sem = $(this).data('sem');
 			var year = $(this).data('year');

 		
 		
 		 })
	</script>
                     <?php     
                 }
             }else {
             	 	?>
          	<li class="list-group-item d-flex justify-content-between align-items-center">
          		No Records Found..
          	</li>
          	<?php
             }




		
 	}
 ?>