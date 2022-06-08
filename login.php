<?php 
session_start();
include 'GCC/create_form/connect.php';

			if(isset($_POST['logintrigger'])){ 
				$em = $_POST['em'];
				$pass = md5($_POST['pass']);

							$sql = " select * from student where stud_email = '$em' and password = '$pass'   ";
					                $result = mysqli_query($con,$sql); // run query
					                $count= mysqli_num_rows($result); // to count if necessary
					               //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
					             if ($count==1){
					             	

					             		  while($row = mysqli_fetch_array($result)){
					            $kurso = $row['stud_course'];
					            $_SESSION['student_courseid'] = $kurso;
								$_SESSION['student_college']= $row['stud_college'];
								$_SESSION['user_student_token_check'] = $row['stud_id'];
								$studid = $row['stud_id'];

								$_SESSION['useremail'] = $row['stud_email'];
								$fl = $row['fl'];
								$lg = $row['lg'];

							

					             	         }
					             	         		$getcourse = " select * from course where courseid = '$kurso'  ";
					             	                         $gcc = mysqli_query($con,$getcourse); 
					             	                      
					             	                          while($gc = mysqli_fetch_array($gcc)){
					             	         					$_SESSION['student_course'] = $gc['course'];
					             	                          }
					             	       if($lg == 2){
					             	       

					             	       	unset($_SESSION['user_student_token_check']);
					             	       	 	$_SESSION['blocked']=1;
					           	header('location:index.php');
					             	       }else {
					             	       	echo 'Please wait...';
					             	       		if($fl == 1) {
					             	       				  $_SESSION['student_email'] = $em;
					                $_SESSION['greet_students']= 1;

																	$_SESSION['firstlogin'] = 1;
					             	       		?>
					             	       		<script type="text/javascript">
					             	       			window.location.href='Myaccount/';
					             	       		</script>
					             	       		<?php

					             	       		}else {
					             	       				$_SESSION['checkpoint'] = 1;


					             	       				  $_SESSION['student_email'] = $em;
					                $_SESSION['greet_students']= 1;

					                
					                $uptlogin = "UPDATE `student` SET `lg`= 1 WHERE stud_id='$studid' ";
					                mysqli_query($con,$uptlogin);

					                // echo $_SESSION['user_student_token_check'];
					                 //echo '<br>'.$_SESSION['student_course'];

					              //  header('location:Myaccount/');
					                ?>
					                <script type="text/javascript" src="js/jquery.js"></script>
					                <script type="text/javascript">
					                	  $(document).ready(function() {
					        $.ajax({
                             url : "mailer/index.php",
                              method: "POST",
                               data  : {sendconfirmation:1},
                               success : function(data){
                  					window.location.href='checkpoint.php';
                               }
                            })
					                	
					                	  });
					                </script>


					                <?php



					             	       			}
					             	       

					               
					                 //

					             	       }    
					             	                   
					           
					           

					          }else {

					          	  $studentdata = " select * from student  ";
                                                                $resultstudents = mysqli_query($con,$studentdata); // run query
                                                               $sd = [];
                                                                 while($row = mysqli_fetch_array($resultstudents)){
                                                                  $studentid = $row['stud_id'];
                                            $countrespo="select * from form_response where userid='$studentid' and csformid = '60' and status = 'For Approval' ";
                                                                      $resultstudentrespo = mysqli_query($con,$countrespo);
                                                                          $countrespo= mysqli_num_rows($resultstudentrespo);

                                                                          if($countrespo >=1 ){
                                                                            $sd[] =  0;

                                                                           while($rows = mysqli_fetch_array($resultstudentrespo)){ 
                                                                           $crespo[] = $rows['userid'];
                                                                           }
                                                                           }
                                                                          
                                                                 }
                                                               

                                                                  if(count($sd) >=1){
                                                                 		$_SESSION['Request_alert!']=1;
                                                                  }else {
                                                                
                                                                  }
					          
					          		$admin = "select * from administrator where admin_email ='$em' and admin_password = '$pass' and edstat = 0 ";

					          		                $resultcheck = mysqli_query($con,$admin); // run query
					          		                $countadmin= mysqli_num_rows($resultcheck); // to count if necessary
					          		               //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
					          		             if ($countadmin==1){
					          		             	//while($row = mysqli_fetch_array($result)){} is where we output all the data in database
					          		                 while($row = mysqli_fetch_array($resultcheck)){
					          							//	
					          		                 	$college = $row['CollegeId'];
					          		                 	$adminId = $row['admin_id'];
					          							$typeofadmin = $row['admin_type'];
					          							$adminname = $row['admin_fname'];
					          							$adminfname = $row['admin_fname'].' '.$row['admin_lname'];
					          							$adminbanner = $row['admin_banner'];
					          							$adminsidebarbg = $row['admin_sidebarbg'];
					          							$ft = $row['ft'];
					          							$esign = $row['esign'];
					          							$new_gc = $row['new_gc'];
					          							$show_ = $row['show_rec'];

					          							if($ft == 1){
					          								$_SESSION['greetings']=1;
					          								$_SESSION['first_time_login'] = 1;
					          								$_SESSION['fname'] = $adminname;
					          							}
					          		                 }

					          		                 if ($typeofadmin == 'GCC') {
					          		                 	

					          		                 $_SESSION['admingcc_token'] = $adminId;

					          		                 		unset($_SESSION['form_id']);

					          		                 		
					          		                 		  $_SESSION['sidebar_banner']=$adminbanner;
					          		                 		 
					          		                 		   $_SESSION['sidebar_color'] = $adminsidebarbg;
					          		                 		  
					          		                 		

												 			$sqls = "SELECT * FROM `gui` where id=1 ";
												 	                $results = mysqli_query($con,$sqls); // run query
												 	               
												 	                 while($row = mysqli_fetch_array($results)){
												 						
												 							
												 							$_SESSION['sidebar_textcolor'] = $row['sidebar_textcolor'];
												 							$_SESSION['advancesearch'] = $row['advancesearch'];
												 							$_SESSION['email'] = $row['email'];
												 							$_SESSION['password']= $row['password'];
												 	                 }

												 	                 	header('location:GCC/Dashboard');

												 	                // 	echo "gcclogin";
					          		                 }else if ($typeofadmin == 'GC') {
					          		                 $_SESSION['admin_token'] = $adminId;
					          		                 $_SESSION['gc_name'] = $adminfname;
					          		                 $_SESSION['new_gc'] = $new_gc;
					          		                 $_SESSION['show_rec'] = $show_;
					          		                 			
					          		                 			$se_college = "SELECT * FROM `colleges` where CollegeId = '$college' ";

					          		                 			                $resultss = mysqli_query($con,$se_college); // run query
					          		                 			               
					          		                 			                 while($row = mysqli_fetch_array($resultss)){
					          		                 							  $_SESSION['gc_college'] = $row['college'];
					          		                 							  $_SESSION['gc_collegid']= $row['CollegeId'];

					          		                 			                 }

					          		                 			                  $_SESSION['sidebar_banners']=$adminbanner;

					          		                 			                    $_SESSION['sidebar_colors'] = $adminsidebarbg;

					          		                 			                 	$sql = "SELECT * FROM `gui` where id=2 ";
																 	                $result = mysqli_query($con,$sql); // run query
																 	               
																 	                 while($row = mysqli_fetch_array($result)){
																 							
																 						
																 							$_SESSION['sidebar_textcolors'] = $row['sidebar_textcolor'];
																 							$_SESSION['advancesearchs'] = $row['advancesearch'];
																 							$_SESSION['emails'] = $row['email'];
																 							$_SESSION['passwords']= $row['password'];
																 	                 }

																  if($esign == ''){
					          		                 			    	$_SESSION['noesign'] = 1;
					          		                 			    }

					          		                 			                 header('location:Guidance-Coordinator/Dashboard/');
					          		                 			         // echo "gclogin";
					          		                 	
					          		                 }else if ($typeofadmin == 'ADMIN'){
					          		                 //	echo "superadmin";
					          		                 	 $_SESSION['superadminId'] = $adminId;
					          		                 	
					          		                 	$sqls = "SELECT * FROM `gui` where id=1 ";
												 	                $results = mysqli_query($con,$sqls); // run query
												 	               
												 	                 while($row = mysqli_fetch_array($results)){
												 							$_SESSION['sidebar_banner1']='ADMIN';
												 						
												 							$_SESSION['sidebar_textcolor1'] = $row['sidebar_textcolor'];
												 							
												 							
												 	                 }

												 	                  header('location:admin/Dashboard/');
					          		                 }else if ($typeofadmin == 'ADMISSION'){
					          		                 //	echo "admission";
					          		               

					          		                 	 $_SESSION['adm_id'] = $adminId;

					          		                 	   if($esign == ''){
					          		                 			    	$_SESSION['noesign'] = 1;
					          		                 			    }
					          		                 	  header('location:Admission/');
					          		                 }





					          		          }else {


					          		          	$_SESSION['error']=1;

					          		          	?>
					          		          	<script type="text/javascript">
					          		          		window.history.back();
					          		          	</script>

					          		          	<?php


					          		          }





					          }




			}


 ?>
