<?php
session_start();
	require_once "config.php";
    
	if (isset($_SESSION['access_token']))
		$gClient->setAccessToken($_SESSION['access_token']);
	else if (isset($_GET['code'])) {
		$token = $gClient->fetchAccessTokenWithAuthCode($_GET['code']);
		$_SESSION['access_token'] = $token;
	} else {
		//header('Location: https://hantechdesign.com/');
		exit();
	}

	//print_r($_SESSION['access_token']) ;
	$oAuth = new Google_Service_Oauth2($gClient);
	$userData = $oAuth->userinfo_v2_me->get();

	/*$_SESSION['id'] = $userData['id'];
	$_SESSION['email'] = $userData['email'];
	$_SESSION['gender'] = $userData['gender'];
	$_SESSION['picture'] = $userData['picture'];
	$_SESSION['familyName'] = $userData['familyName'];
	$_SESSION['givenName'] = $userData['givenName'];
*/

	//echo $userData['id'].$userData['email'].$userData['gender'].$userData['picture'].$userData['familyName'].$userData['givenName'];
    $usermail = $userData['email'];
    $name = $userData['givenName'];
    $surname = $userData['familyName']; 
    $gender = $userData['gender'];
   

    
   include 'GCC/create_form/connect.php';

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


   if (preg_match("~@wmsu\.edu.ph$~",$usermail)){ 
   			
   	
   	$checkifexist = " select * from student where stud_email = '$usermail'   ";
 						                $ckstud = mysqli_query($con,$checkifexist); 
 						                $count= mysqli_num_rows($ckstud);
 						           
 				if ($count>=1){
 					 
 					 while($row = mysqli_fetch_array($ckstud)){
					            $kurso = $row['stud_course'];
					            $_SESSION['student_courseid'] = $kurso;
								$_SESSION['student_college']= $row['stud_college'];
								$_SESSION['user_student_token_check'] = $row['stud_id'];
								$fl = $row['fl'];
									$studid = $row['stud_id'];
									$lg = $row['lg'];

								if($fl == 1) {

									$_SESSION['firstlogin'] = 1;

								}

					             	         }
					             	         		$getcourse = " select * from course where courseid = '$kurso'  ";
					             	                         $gcc = mysqli_query($con,$getcourse); 
					             	                      
					             	                          while($gc = mysqli_fetch_array($gcc)){
					             	         					$_SESSION['student_course'] = $gc['course'];
					             	                          }
					             	                   
					           if($lg == 2){
					           	unset($_SESSION['access_token']);
					           	unset($_SESSION['user_student_token_check']);
					           	$_SESSION['blocked']=1;
					           	header('location:index.php');
					           }else {

					           	  $_SESSION['student_email'] = $usermail;
					                $_SESSION['greet_students']= 1;

					                 $uptlogin = "UPDATE `student` SET `lg`= 1 WHERE stud_id='$studid' ";
					                mysqli_query($con,$uptlogin);

					                   header('location:Myaccount/');
					           }
					             	         
					               
					                // echo $_SESSION['user_student_token_check'];
					                 //echo '<br>'.$_SESSION['student_course'];

					            

					             


 				}else {

 					$admin = "select * from administrator where admin_email ='$usermail' and edstat = 0 ";

					          		                $resultcheck = mysqli_query($con,$admin); 
					          		                $countadmin= mysqli_num_rows($resultcheck); 
					          		            
					          		             if ($countadmin>=1){
					          		             
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
					          							$new_gc =  $row['new_gc'];
					          							$esign = $row['esign'];
					          							$show_ = $row['show_rec'];
					          							if($ft == 1){
					          								$_SESSION['greetings']=1;
					          								$_SESSION['first_time_login'] = 1;
					          								$_SESSION['fname'] = $adminname;
					          							}
					          		                 }

					          		       $clientip_address = $_SESSION['aclientip_address'];

					          		      $update_the_ip_add = "UPDATE `client_ip` SET `user_id`='$adminId' WHERE ipaddress = '$clientip_address' ";
					          		                 mysqli_query($con,$update_the_ip_add);           

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

												 	                 	echo "gcclogin";
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

					          		                 			                // header('location:Guidance-Coordinator/Dashboard/');
					          		                 			          echo "gclogin";

					          		                 			    if($esign == ''){
					          		                 			    	$_SESSION['noesign'] = 1;
					          		                 			    }
					          		                 			           header('location:Guidance-Coordinator/Dashboard/');
					          		                 	
					          		                 }else if ($typeofadmin == 'ADMIN'){
					          		                 	echo "superadmin";
					          		                 	 $_SESSION['superadminId'] = $adminId;
					          		                 	
					          		                 	$sqls = "SELECT * FROM `gui` where id=1 ";
												 	                $results = mysqli_query($con,$sqls); // run query
												 	               
												 	                 while($row = mysqli_fetch_array($results)){
												 							$_SESSION['sidebar_banner1']='ADMIN';
												 						
												 							$_SESSION['sidebar_textcolor1'] = $row['sidebar_textcolor'];
												 							
												 							
												 	                 }

												 	                 header('location:admin/Dashboard');
					          		                 }else if ($typeofadmin == 'ADMISSION'){
					          		                 	echo "admission";
					          		                 
					          		                   if($esign == ''){
					          		                 			    	$_SESSION['noesign'] = 1;
					          		                 			    }

					          		                 	 $_SESSION['adm_id'] = $adminId;
					          		                 	   header('location:Admission/');
					          		                 }

					          		               
					          		             }else {
					          		             		include 'register_g.php';
					          		             }



 				
 				}





   }else {

   		
   	$admin = "select * from administrator where admin_email ='$usermail' and edstat = 0 ";

					          		                $resultcheck = mysqli_query($con,$admin); 
					          		                $countadmin= mysqli_num_rows($resultcheck); 
					          		            
					          		             if ($countadmin>=1){
					          		             
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

					          		                    $clientip_address = $_SESSION['aclientip_address'];

					          		      $update_the_ip_add = "UPDATE `client_ip` SET `user_id`='$adminId' WHERE ipaddress = '$clientip_address' ";
					          		                 mysqli_query($con,$update_the_ip_add);     

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

												 	                 	echo "gcclogin";
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

					          		                 			                // header('location:Guidance-Coordinator/Dashboard/');
					          		                 			          echo "gclogin";

					          		                 			           header('location:Guidance-Coordinator/Dashboard/');
					          		                 	
					          		                 }else if ($typeofadmin == 'ADMIN'){
					          		                 	echo "superadmin";
					          		                 	 $_SESSION['superadminId'] = $adminId;
					          		                 	
					          		                 	$sqls = "SELECT * FROM `gui` where id=1 ";
												 	                $results = mysqli_query($con,$sqls); // run query
												 	               
												 	                 while($row = mysqli_fetch_array($results)){
												 							$_SESSION['sidebar_banner1']='ADMIN';
												 						
												 							$_SESSION['sidebar_textcolor1'] = $row['sidebar_textcolor'];
												 							
												 							
												 	                 }

												 	                 header('location:admin/Dashboard');
					          		                 }else if ($typeofadmin == 'ADMISSION'){
					          		                 	echo "admission";
					          		                 	

					          		                 	  if($esign == ''){
					          		                 			    	$_SESSION['noesign'] = 1;
					          		                 			    }

					          		                 	 $_SESSION['adm_id'] = $adminId;
					          		                 	 header('location:Admission/');
					          		                 }

					          		              //   
					          		             }else {
					          		             		$_SESSION['emailerror']=1;
   		
  	header('location:index.php');


   	unset($_SESSION['access_token']);
					          		             }



 				
 				




   				
   			
   			 

   		
   	


 /*  	

   	*/

   }
  
   
    
            
    
    

?>