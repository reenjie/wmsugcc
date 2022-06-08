<?php 
session_start();
include '../create_form/connect.php';


if(isset($_POST['content'])){

	
	$sem = $_POST['sem'];
	$year = $_POST['year'];
	$collegeid = $_POST['collegeid'];
	$typo = $_POST['typo'];
	$rep = $_POST['rep'];
	$yrlevel = $_POST['yrlevel'];
	$course = $_POST['course'];


	


	if($sem == 'Select Semester'){
		$sem =  $_SESSION['sem'];
	}else {
		$sem = $sem;
	}


	if($year == 'Select Year'){
		$year = date('Y');
	}else {
		$year = $year;
	}

	if($collegeid == 'All Colleges'){
			//all college by default
		$collegeid = 'all';
	}else {
		$collegeid = $collegeid;

		

	}



	if($rep == 'Select Sort'){
		// No report type	
		?>
		<div class="container mt-5">
			<h6 style="text-align:center">
				<img src="../img/undraw_empty_street_sfxm.png" style="width:400px">
				<br>
				Please Select Sort
			</h6>
		</div>
		<script type="text/javascript">
			$('#report').addClass('is-invalid');
		</script>


		<?php
	}else {


		if($rep == 'shift'){

			 if($yrlevel == 'Year-Level'){
			 	include 'reportshift.php';
			 }else {
			 	include 'reportshift_.php';
			 }
			
			


		}else {


			?>

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

											   include 'sortqueries.php';
											 

											  
											   	 $getting_studentdata = mysqli_query($con,$get_student_data); 
											   	 $count= mysqli_num_rows($getting_studentdata);
											   	
											   	if($count >=1){
											    while($row = mysqli_fetch_array($getting_studentdata)){
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
											   			
											   				
											   			<td><?php echo $studemail ?> </td>
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
											   
											    }else {
											    	?>
											    	<tr>
											    		<td colspan="5">
											    			<h6 style="text-align:center;" class="mt-4">
                                                                   <img src="../img/undraw_empty_street_sfxm.png" style="width:350px">
                                                                   <br>
                                                                   There was no data found.
                                                               </h6> 
											    		</td>
											    	</tr>

											    	<?php
											    }


											    ?>			

											  </tbody>
											</table>


	<?php

		}



	

	}


	


	
}

 ?>