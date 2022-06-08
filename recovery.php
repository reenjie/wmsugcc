<?php 
session_start();
include 'GCC/create_form/connect.php';

if(isset($_POST['recover'])){ 
	$email = $_POST['email'];

					$compare = " select * from student where stud_email = '$email'  ";
			                $cmpredata = mysqli_query($con,$compare); 
			                $cmp= mysqli_num_rows($cmpredata);
			               //  $get_id =  mysqli_insert_id($con); 
			             if ($cmp>=1){

			             	unset($_SESSION['student_unique_np_admin']);
			            
			                 while($row = mysqli_fetch_array($cmpredata)){
							

								?>
								  <div class="card  shadow ">
                          
                             
                             
								   <div class="card-body">
                                  <h6> Account Details : <br>
                                    Account Type : <span style="font-weight: bolder;"> STUDENT</span>
                                    <br>
                                    Lastname : <span style="font-weight: bolder;"> <?php echo $row['stud_lname'] ?></span><br>
                                    Given name: <span style="font-weight: bolder;"> <?php echo $row['stud_fname'] ?></span> <br>

                                     <div class="" id="code">
                                 	
                                 
                                   <div class="mt-4">Enter Given Code.</div> 
                                    <input type="" name="" id="codes" class="form-control mt-2" style="text-align:center"><br>
                                    <button class="btn btn-success form-control" id="reset"> Reset</button> 
                                    </div> 
                                    <input type="hidden" name="" id="em" value="<?php echo $email ?>">
                                  </h6>


                             </div> 

                                </div> 
                                  <script src="js/jquery.js"></script>
			                 	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
			                 <script type="text/javascript">
			                 		 $(document).ready(function() {
			                 	$('#reset').click(function() { 
			                 		var code = $('#codes').val();
			                 		var email  = $('#em').val();
			                 	
			                 		   $.ajax({
			                 		           url : "recovery.php",
			                 		            method: "POST",
			                 		             data  : {resett:1,code:code,email:email},
			                 		             success : function(data){
			                 		                   
			                 		             	if(data == 'notmatch'){
			                 		             	$('#codes').addClass('is-invalid');
			                 		             	}else {

			                 		             		Swal.fire(
													  'Password Reset Successfully!',
													  'Your password has been sent to you with your reset Code. use it to login!',
													  'success'
													).then((result) => {
												  if (result.isConfirmed) {
												 window.location.href='index.php';
												 		 }
																	}) 
			                 		             	}


			                 			
			                 		             }
			                 		          })
			                 		       
			                 		    
			                 	
			                 	})
			                 });
			                 	      
			                       	
			                 </script>
								<?php
			                 }
			                 ?>
			              
			                 <?php
			                 
			          }else {

			          			$get_administrator = "select * from administrator where admin_email = '$email' ";
			          			 $gettingadministrator = mysqli_query($con,$get_administrator); 
			          			 $count= mysqli_num_rows($gettingadministrator);
			          			
			          			if($count >=1){



			          		 while($row = mysqli_fetch_array($gettingadministrator)){
			          		 	$settodef = '@'.strtolower($row['admin_type']).'_'.$row['admin_lname'];
			          		 

			          		 	$adtype = $row['admin_type'];

			          		 	if($adtype == 'ADMIN'){
			          		 				$_SESSION['student_unique_np_admin'] = 'gcc2022';
			          		 	}else {
			          		 			$_SESSION['student_unique_np_admin'] = $settodef;
			          		 	}
			          								?>
								  <div class="card  shadow ">
                          
                             
                             
								   <div class="card-body">
								 
								  
                                  <h6> Account Details : <br>
                                    Account Type : <span style="font-weight: bolder;"><?php echo $row['admin_type'] ?> ADMINISTRATOR </span>
                                    <br>
                                    Lastname : <span style="font-weight: bolder;"> <?php echo $row['admin_lname'] ?></span><br>
                                    Given name: <span style="font-weight: bolder;"> <?php echo $row['admin_fname'] ?></span> <br>

                                     <div class="" id="code">
                                 	
                                 
                                   <div class="mt-4">Enter Given Code.</div> 
                                    <input type="" name="" id="codes" class="form-control mt-2" style="text-align:center"><br>
                                    <button class="btn btn-success form-control" id="reset"> Reset</button> 
                                    </div> 
                                    <input type="hidden" name="" id="em" value="<?php echo $email ?>">
                                  </h6>


                             </div> 

                                </div> 
                                  <script src="js/jquery.js"></script>
			                 	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
			                 <script type="text/javascript">
			                 		 $(document).ready(function() {
			                 	$('#reset').click(function() { 
			                 		var code = $('#codes').val();
			                 		var email  = $('#em').val();
			                 	
			                 		   $.ajax({
			                 		           url : "recovery.php",
			                 		            method: "POST",
			                 		             data  : {resett:'admin',code:code,email:email},
			                 		             success : function(data){
			                 		             
			                 		             	if(data == 'notmatch'){
			                 		             		$('#codes').addClass('is-invalid');
			                 		             	}else {
			                 		             		Swal.fire(
													  'Password Reset Successfully!',
													  'Your password has been sent to you with your reset Code. use it to login!',
													  'success'
													).then((result) => {
												  if (result.isConfirmed) {
												 window.location.href='index.php';
												 		 }
																	}) 
			                 		             	}
			                 					/**/
			                 		             }
			                 		          })
			                 		       
			                 		    
			                 	
			                 	})
			                 });
			                 	      
			                       	
			                 </script>
								<?php		
			          			 }
			          		
			          		 }else {
			          		 			echo 'nomatch';
			          		 }


			          
			          }
	
}

if(isset($_POST['recovery'])){
	$email = $_POST['email'];

			$getsuper_admin = "select * from administrator where admin_id = 1  ";
			 $gettingadmindetails = mysqli_query($con,$getsuper_admin); 
			
		 while($row = mysqli_fetch_array($gettingadmindetails)){
			$ademail = $row['admin_email'];	
			 }

			 if($email == $ademail){
			 	$pass = md5('gcc2022');

			 	$upt_password = "UPDATE `administrator` SET `admin_password`='$pass' WHERE admin_id='1' ";
			 	mysqli_query($con,$upt_password);
			 }else {
			 	echo 'nomatch';

			 
			 }
		
		 
	
}



if(isset($_POST['resett'])){ 
	$resett = $_POST['resett'];
	$code = $_POST['code'];
	$email = $_POST['email'];
	$dcode = $_SESSION['student_unique_code'];
	


	
// $_SESSION['student_unique_np']   $_SESSION['student_unique_code']
	if($code == $dcode){

		echo 'match';

		
			if($resett == 'admin'){
		$passw =  $_SESSION['student_unique_np_admin'];
			$pass = md5($passw);
			$updatesadministrator = "UPDATE `administrator` SET`admin_password`='$pass' WHERE admin_email = '$email' ";
			mysqli_query($con,$updatesadministrator);

	}else {

		$passw =  $_SESSION['student_unique_np'];
			$pass = md5($passw);

			$updatestudent = "UPDATE `student` SET`password`='$pass' WHERE stud_email = '$email' ";
			mysqli_query($con,$updatestudent);

	}
			
			

	}else {
		echo 'notmatch';
	}

	
	
}


 ?>