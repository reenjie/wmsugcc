<?php 

		if($yrlevel == 'Year-Level'){


			if($rep == 'Notfilledup'){
											  	 if($collegeid == 'all'){
											  	 	$get_student_data = "select * from student where pds_filled = 0 and stud_id not in (select userid from temp_answers where csformid = '62')  ";
											  	 }else {
											  	 if($course == 'selectcourse'){
											  	$get_student_data = "select * from student where pds_filled = 0 and stud_college = '$collegeid' and stud_id not in (select userid from temp_answers where csformid = '62')  ";
											  			}else {
											  				 	$get_student_data = "select * from student where pds_filled = 0 and stud_college = '$collegeid' and stud_id not in (select userid from temp_answers where csformid = '62')  and stud_course='$course' ";
											  			}
											  	 }

											  		 	
											  }

											  if($rep == 'pendingpds'){

											  	if($collegeid == 'all'){
											  	 	$get_student_data = "select * from student where pds_filled = 0 and stud_id  in (select userid from temp_answers where csformid = '62')  ";
											  	 }else {
											  	 	if($course == 'selectcourse'){
											  	$get_student_data = "select * from student where pds_filled = 0 and stud_college = '$collegeid' and stud_id in (select userid from temp_answers where csformid = '62')  ";
											  			}else {
											  				 	$get_student_data = "select * from student where pds_filled = 0 and stud_college = '$collegeid' and stud_course ='$course' and stud_id in (select userid from temp_answers where csformid = '62')  ";
											  			}
											  	 }

											  }

											  if($rep =='completedpds'){

											  	 	if($collegeid == 'all'){
											  	 	$get_student_data = "select * from student where pds_filled = 1 and pds_filledsem ='$sem' and year(pdsfilleddate)='$year' and stud_id  in (select userid from form_response where csformid = '62')  ";
											  	 }else {
											  	 	if($course == 'selectcourse'){
											  	 
											  	$get_student_data = "select * from student where pds_filled = 1 and pds_filledsem ='$sem' and year(pdsfilleddate)='$year' and stud_id in (select userid from form_response where csformid = '62')  ";
											  			}else {
											  					$get_student_data = "select * from student where pds_filled = 1 and pds_filledsem ='$sem' and year(pdsfilleddate)='$year' and stud_id in (select userid from form_response where csformid = '62') and stud_course ='$course' ";
											  			}
											  	 }
											  }

		}else {


			if($rep == 'Notfilledup'){
										if($collegeid == 'all'){
											  	 	$get_student_data = "select * from student where pds_filled = 0 and stud_id not in (select userid from temp_answers where csformid = '62') and yearlevel ='$yrlevel'  ";
											  	 }else {
											  	 if($course == 'selectcourse'){
											  	$get_student_data = "select * from student where pds_filled = 0 and stud_college = '$collegeid' and stud_id not in (select userid from temp_answers where csformid = '62') and yearlevel ='$yrlevel' ";
											  		}else{
											  			  	$get_student_data = "select * from student where pds_filled = 0 and stud_college = '$collegeid' and stud_course='$course' and stud_id not in (select userid from temp_answers where csformid = '62') and yearlevel ='$yrlevel'  ";	
											  		}
											  	 }

											  		 	
											  }

											  if($rep == 'pendingpds'){

											  	if($collegeid == 'all'){
											  	 	$get_student_data = "select * from student where pds_filled = 0 and stud_id  in (select userid from temp_answers where csformid = '62') and yearlevel ='$yrlevel'  ";
											  	 }else {
											  	 	 if($course == 'selectcourse'){
											  	$get_student_data = "select * from student where pds_filled = 0 and stud_college = '$collegeid' and stud_id in (select userid from temp_answers where csformid = '62')  and yearlevel ='$yrlevel' ";
											  			}else {
											  						$get_student_data = "select * from student where pds_filled = 0 and stud_college = '$collegeid' and stud_id in (select userid from temp_answers where csformid = '62')  and yearlevel ='$yrlevel' and stud_course ='$course' ";
											  			}
											  	 }

											  }

											  if($rep =='completedpds'){

											  	 	if($collegeid == 'all'){
											  	 	$get_student_data = "select * from student where pds_filled = 1 and pds_filledsem ='$sem' and year(pdsfilleddate)='$year' and stud_id  in (select userid from form_response where csformid = '62') and yearlevel ='$yrlevel'  ";
											  	 }else {
											  	 	 if($course == 'selectcourse'){
											  	$get_student_data = "select * from student where pds_filled = 1 and pds_filledsem ='$sem' and year(pdsfilleddate)='$year' and stud_id in (select userid from form_response where csformid = '62') and yearlevel ='$yrlevel' ";
											  			}else {
											  			$get_student_data = "select * from student where pds_filled = 1 and pds_filledsem ='$sem' and year(pdsfilleddate)='$year' and stud_id in (select userid from form_response where csformid = '62') and yearlevel ='$yrlevel' and stud_course ='$course' ";	
											  			}
											  	 }
											  }


		}
					  


 ?>