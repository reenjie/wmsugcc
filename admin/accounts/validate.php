<?php 
session_start();
include '../../GCC/create_form/connect.php';

	//Checking if available
	if(isset($_POST['checkemail'])){
		$val = $_POST['val'];

			$checkingstudent = "select * from student where stud_email = '$val'  ";
			 $checkingstudent_ = mysqli_query($con,$checkingstudent); 
			 $counting_student= mysqli_num_rows($checkingstudent_);
			
			if($counting_student >=1){
				echo "exist";
			}else {

					$checkfromadministration = "select * from administrator where admin_email = '$val' and edstat = 0  ";
					 $checkingadministrators = mysqli_query($con,$checkfromadministration); 
					 $counting_admin= mysqli_num_rows($checkingadministrators);
				
					if($counting_admin >=1){
			
					echo "exist";
				 		}else {

				 			echo "add";

				 		}


			}

	}

	// Checking email
	if(isset($_POST['checkemail_stud'])){

			$val = $_POST['val'];

			$checkingstudent = "select * from student where stud_email = '$val'  ";
			 $checkingstudent_ = mysqli_query($con,$checkingstudent); 
			 $counting_student= mysqli_num_rows($checkingstudent_);
			
			if($counting_student >=1){
				echo "exist";
			}else {

					$checkfromadministration = "select * from administrator where admin_email = '$val' and edstat = 0  ";
					 $checkingadministrators = mysqli_query($con,$checkfromadministration); 
					 $counting_admin= mysqli_num_rows($checkingadministrators);
				
					if($counting_admin >=1){
			
					echo "exist";
				 		}else {
				 			   if (preg_match("~@wmsu\.edu.ph$~",$val)){ 
				 			   	echo "add";
				 			   }else {
				 			   	echo "notwmsu";
				 			   }
				 			

				 		}


			}
		
	}
 ?>