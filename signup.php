<?php
session_start();
include 'GCC/create_form/connect.php';

if(isset($_POST['register'])){

	$em = $_POST['em'];
	$ln = $_POST['ln'];
	$gn = $_POST['gn'];
	$mi = $_POST['mi'];

	$course = $_POST['course'];
	$age = $_POST['age'];
	$gender = $_POST['gender'];
	$status = $_POST['status'];
	$cno = $_POST['cno'];

	$st = $_POST['st'];
	$br = $_POST['br'];
	$cty = $_POST['cty'];
	$zc = $_POST['zc'];
	$ct = $_POST['ct'];
	$year = $_POST['year'];

	$college = $_POST['college'];



	if($college == 'noselection'){

		if($course == 'noselection'){

			echo 'nocourse';
		}else {
			echo 'nocollege';
		}
	}


	else if ($year =='noselection'){
		echo 'noyear';
	}

	else {


		if (preg_match("~@wmsu\.edu.ph$~",$em)){

function randomPassword() {
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

 		$passw = randomPassword();


 					$_SESSION['pass'] = $passw;

 					$pass = md5($passw);


 								$checkifexist = " select * from student where stud_email = '$em'  ";
 						                $ckstud = mysqli_query($con,$checkifexist);
 						                $count= mysqli_num_rows($ckstud);
 						               //  $get_id =  mysqli_insert_id($con);
 				if ($count>=1){

 					echo "exist";

 				 }else {
					
 $insert_reg = "INSERT INTO `student`(
	`stud_lname`,
	`stud_fname`,
	`stud_mname`,
	`stud_email`,
	`age`,
	`gender`,
	`status`,
	`contact_no`,
	 `street`,
	 `barangay`,
	  `city`,
	  `country`,
	  `zipcode`,
	  `stud_course`,
	  `stud_college`,
	  `fl`,
	  `password`,
	  `isverified`,
	  `yearlevel`,
	  `pds_filled`,
	  `pds_filledsem`,
	  `shiftcount`,
	  `referral_subj`,
	  `retake`,
	  `modify`,
	  `upt`,
	  `lg`) VALUES
	  ('$ln',
	  '$gn',
	  '$mi',
	  '$em',
	  '$age',
	  '$gender',
	  '$status',
	  '$cno',
	  '$st',
	  '$br',
	  '$cty',
	  '$ct',
	  '$zc',
	  '$course',
	  '$college',
	  '1',
	  '$pass',
	  '1',
	  '$year',
	  0,
	  '',
	  0,
	  '',
	  0,
	  0,
	  0,
	  0
	  )";
	  if(mysqli_query($con,$insert_reg)){
		
		$_SESSION['message'] = 1;
		$_SESSION['message_email'] = $em;
		echo 'wmsu';
	  }else {
		echo $con->error;
	  }




				 }






			 }else {
			 	echo 'notwmsu';
			 }


		//echo $em.$ln.$gn.$mi.$ad.$course;
	}



}

// if(isset($_POST['register_g'])){
// 	$em = $_POST['em'];
// 	$ln = $_POST['ln'];
// 	$gn = $_POST['gn'];
// 	$mi = $_POST['mi'];

// 	$course = $_POST['course'];
// 	$age = $_POST['age'];
// 	$gender = $_POST['gender'];
// 	$status = $_POST['status'];
// 	$cno = $_POST['cno'];

// 	$passw = $_POST['pass'];

// 	$st = $_POST['st'];
// 	$br = $_POST['br'];
// 	$cty = $_POST['cty'];
// 	$zc = $_POST['zc'];
// 	$ct = $_POST['ct'];
// 	$year = $_POST['year'];

// 	//echo $em.$ln.$gn.$mi.$ad.$course.$age.$gender.$status.$cno;
// 					$getcollege = " select * from course where courseid = '$course'  ";
// 			                $gcollge = mysqli_query($con,$getcollege);

// 			                 while($row = mysqli_fetch_array($gcollge)){
// 								$collegeid = $row['CollegeId'];
// 			                 }


// 	if($course == 'noselection'){

// 		echo 'nocourse';
// 	}else if ($year =='noselection'){
// 		echo 'noyear';
// 	}

// 	else {


// 		if (preg_match("~@wmsu\.edu.ph$~",$em)){








//  					$pass = md5($passw);


//  								$checkifexist = " select * from student where stud_email = '$em'  ";
//  						                $ckstud = mysqli_query($con,$checkifexist);
//  						                $count= mysqli_num_rows($ckstud);
//  						               //  $get_id =  mysqli_insert_id($con);
//  				if ($count>=1){

//  					echo "exist";

//  				 }else {



//  				$insert_reg = "INSERT INTO `student`(
// 					`stud_lname`,
// 					`stud_fname`,
// 					`stud_mname`,
// 					 `stud_email`,
// 					 `age`,
// 					 `gender`,
// 					 `status`,
// 					 `contact_no`,
// 					 `street`,
// 					 `barangay`,
// 					 `city`,
// 					 `country`,
// 					 `zipcode`,
// 					 `stud_course`,
// 					 `stud_college`,
// 					  `fl`,
// 					  `password`,
// 					  `isverified`,
// 					  `yearlevel`)
//  						VALUES (
// 							'$ln',
// 							'$gn',
// 							'$mi',
// 							'$em',
// 							'$age',
// 							'$gender',
// 							'$status',
// 							'$cno',
// 							'$st',
// 							'$br',
// 							'$cty',
// 							'$ct',
// 							'$zc',
// 							'$course',
// 							'$collegeid',
// 							'0',
// 							'$pass',
// 							'1',
// 							'$year')";
// 				mysqli_query($con,$insert_reg);
// 				$get_id =  mysqli_insert_id($con);


// 					$_SESSION['student_college']= $collegeid;
// 								$_SESSION['user_student_token_check'] =$get_id;

// 									$_SESSION['firstlogin'] = 1;



// 								$getcourse = " select * from course where courseid = '$course'  ";
// 					             	                         $gcc = mysqli_query($con,$getcourse);

// 					             	                          while($gc = mysqli_fetch_array($gcc)){
// 					             	         					$_SESSION['student_course'] = $gc['course'];
// 					             	                          }



// 					                 $_SESSION['student_email'] = $em;
// 					                $_SESSION['greet_students']= 1;


// 				echo 'wmsu';




//  						          }






// 			 }else {
// 			 	echo 'notwmsu';
// 			 }


// 		//echo $em.$ln.$gn.$mi.$ad.$course;
// 	}



// }

if(isset($_POST['collegeselected'])){
	$id = $_POST['collegeselected'];

	?>
	  	<select class="form-control" id="sec" name="course" style="font-size: 14px;"  >
		 	 		  	 	 	 	   	<option value="noselection">Select Course</option>

		 	 		  	 	 	 	   		<?php
		 	 		  	 	 	 	   						$sqlcc = " SELECT * FROM `course` where CollegeId = '$id'  ";
								                $resultcc = mysqli_query($con,$sqlcc); // run query
								                $countcc= mysqli_num_rows($resultcc); // to count if necessary
								               //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
								             if ($countcc>=1){
								             	//while($row = mysqli_fetch_array($result)){} is where we output all the data in database
								                 while($row = mysqli_fetch_array($resultcc)){
								                 	$crse = $row['course'];
								                 	?>
								                 	<option value="<?php echo $row['courseid'] ?>"><?php echo $crse ?></option>
								                 	<?php



								                 }
								          }else {
								          	?>
								                 	<option value="no">NO COURSES</option>
								                 	<?php
								          }


		 	 		  	 	 	 	   		 ?>

		 	 		  	 	 	 	   	</select>
		 	 		  	 	 	 	   	<script type="text/javascript">
		 	 		  	 	 	 	   		$('#sec').change(function(){
		 			$('#sec').removeClass('is-valid');
		 			$('#txtee').text('Select a Course').removeClass('text-danger');
		 	})
		 	 		  	 	 	 	   	</script>

	<?php
}
 ?>