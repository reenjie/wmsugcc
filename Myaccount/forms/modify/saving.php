   <?php 
session_start();
include '../../../GCC/create_form/connect.php';
$user = $_SESSION['user_student_token_check'];
$csform = $_SESSION['form_token_id_for_modify'];	


if(isset($_POST['upttxtcontents'])){ 
	$val = $_POST['val'];
	$tid = $_POST['tid'];

	date_default_timezone_set('Asia/Manila');
	$datenow=date('Y-m-d H:i:s');

	
	

	                			$selectfirst = " SELECT * FROM `form_response` where userid='$user' and csformid = '$csform' and pds_id = '$tid' ";
	                	                $rsf = mysqli_query($con,$selectfirst); 
	                	                
	                	                 while($rowrsf = mysqli_fetch_array($rsf)){

	                	                 	$defcontents = $rowrsf['response'];

	                	                 
	               
	                	
	                	                 }
	                	          


	               


	                ///check the tempstorage if data already exist. if exist. then do update.

	         			$uptcheck = "SELECT * FROM `tempstorage` where user_id = '$user' and tempid = '$tid'  ";
	                         $ruptcheck = mysqli_query($con,$uptcheck); 
	                         $count= mysqli_num_rows($ruptcheck);
	                      if ($count>=1){
	                     //update
	                          while($row = mysqli_fetch_array($ruptcheck)){
	                          	$tempid = $row['resid'];
	                          	
	                          }
	                          $upt= "UPDATE `tempstorage` SET `details`='$defcontents',`replaced_details`='$val' WHERE tempid='$tid'";
	                          mysqli_query($con,$upt);



	                   }else {
	                   	//insert new
	                   	 //insert into db the updated context
	   $inst = "INSERT INTO `tempstorage`(`user_id`, `details`, `replaced_details`, `datecreated`, `tempid`) 
	   							VALUES ('$user','$defcontents','$val','$datenow','$tid')";
	                mysqli_query($con,$inst);
	               
	                   }


	                    $sql = " UPDATE `form_response` SET `response`='$val'  WHERE pds_id = '$tid'  ";
	                $result = mysqli_query($con,$sql); // run query
	              


}

if(isset($_POST['uptmpchoice'])){ 
	$val = $_POST['val'];
	$tid = $_POST['tid'];



		date_default_timezone_set('Asia/Manila');
	$datenow=date('Y-m-d H:i:s');

	
	

	                			$selectfirst = " SELECT * FROM `form_response` where userid='$user' and csformid = '$csform' and pds_id = '$tid' ";
	                	                $rsf = mysqli_query($con,$selectfirst); 
	                	                
	                	                 while($rowrsf = mysqli_fetch_array($rsf)){

	                	                 	$defcontents = $rowrsf['response'];

	                	                 
	               
	                	
	                	                 }
	                	          


	               


	                ///check the tempstorage if data already exist. if exist. then do update.

	         			$uptcheck = "SELECT * FROM `tempstorage` where user_id = '$user' and tempid = '$tid'  ";
	                         $ruptcheck = mysqli_query($con,$uptcheck); 
	                         $count= mysqli_num_rows($ruptcheck);
	                      if ($count>=1){
	                     //update
	                          while($row = mysqli_fetch_array($ruptcheck)){
	                          	$tempid = $row['resid'];
	                          	
	                          }
	                          $upt= "UPDATE `tempstorage` SET `details`='$defcontents',`replaced_details`='$val' WHERE tempid='$tid'";
	                          mysqli_query($con,$upt);



	                   }else {
	                   	//insert new
	                   	 //insert into db the updated context
	   $inst = "INSERT INTO `tempstorage`(`user_id`, `details`, `replaced_details`, `datecreated`, `tempid`) 
	   							VALUES ('$user','$defcontents','$val','$datenow','$tid')";
	                mysqli_query($con,$inst);
	               
	                   }
	               $sql = " UPDATE `form_response` SET `response`='$val'  WHERE pds_id = '$tid'  ";
	                $result = mysqli_query($con,$sql); // run query
	
}

if(isset($_POST['uptcheckbox'])){ 
	$val = $_POST['val'];
	$tid = $_POST['tid'];




	
 date_default_timezone_set('Asia/Manila');
	$datenow=date('Y-m-d H:i:s');

	
	

	                			$selectfirst = " SELECT * FROM `form_response` where userid='$user' and csformid = '$csform' and pds_id = '$tid' ";
	                	                $rsf = mysqli_query($con,$selectfirst); 
	                	                
	                	                 while($rowrsf = mysqli_fetch_array($rsf)){

	                	                 	$defcontents = $rowrsf['response'];

	                	                 
	              					
	                	
	                	                 }
	                	          


	               


	                ///check the tempstorage if data already exist. if exist. then do update.

	        			$uptcheck = "SELECT * FROM `tempstorage` where user_id = '$user' and tempid = '$tid'  ";
	                         $ruptcheck = mysqli_query($con,$uptcheck); 
	                         $count= mysqli_num_rows($ruptcheck);
	                      if ($count>=1){
	                     //update
	                          while($row = mysqli_fetch_array($ruptcheck)){
	                          	$tempid = $row['resid'];
	                          	
	                          }
	                          $upt= "UPDATE `tempstorage` SET `details`='$defcontents',`replaced_details`='$val' WHERE tempid='$tid'";
	                          mysqli_query($con,$upt);



	                   }else {
	                   	//insert new
	                   	 //insert into db the updated context
	   $inst = "INSERT INTO `tempstorage`(`user_id`, `details`, `replaced_details`, `datecreated`, `tempid`) 
	   							VALUES ('$user','$defcontents','$val','$datenow','$tid')";
	                mysqli_query($con,$inst);
	               
	                   }

	                     $sql = " UPDATE `form_response` SET `response`='$val'  WHERE pds_id = '$tid'  ";
	                $result = mysqli_query($con,$sql); // run query 
	              
	
}

if(isset($_POST['upttable'])){ 
	$val = $_POST['val'];
	$tid = $_POST['tid'];

					
date_default_timezone_set('Asia/Manila');
	$datenow=date('Y-m-d H:i:s');

	
	

	                			$selectfirst = " SELECT * FROM `form_response` where userid='$user' and csformid = '$csform' and pds_id = '$tid' ";
	                	                $rsf = mysqli_query($con,$selectfirst); 
	                	                
	                	                 while($rowrsf = mysqli_fetch_array($rsf)){

	                	                 	$defcontents = $rowrsf['response'];

	                	                 
	               
	                	
	                	                 }
	                	          


	               


	                ///check the tempstorage if data already exist. if exist. then do update.

	         			$uptcheck = "SELECT * FROM `tempstorage` where user_id = '$user' and tempid = '$tid'  ";
	                         $ruptcheck = mysqli_query($con,$uptcheck); 
	                         $count= mysqli_num_rows($ruptcheck);
	                      if ($count>=1){
	                     //update
	                          while($row = mysqli_fetch_array($ruptcheck)){
	                          	$tempid = $row['resid'];
	                          	
	                          }
	                          $upt= "UPDATE `tempstorage` SET `details`='$defcontents',`replaced_details`='$val' WHERE tempid='$tid'";
	                          mysqli_query($con,$upt);



	                   }else {
	                   	//insert new
	                   	 //insert into db the updated context
	   $inst = "INSERT INTO `tempstorage`(`user_id`, `details`, `replaced_details`, `datecreated`, `tempid`) 
	   							VALUES ('$user','$defcontents','$val','$datenow','$tid')";
	                mysqli_query($con,$inst);
	               
	                   }

	                    $sql = " UPDATE `form_response` SET `response`='$val'  WHERE pds_id = '$tid'  ";
	                $result = mysqli_query($con,$sql); // run query
		                
}

if(isset($_POST['filllist'])){ 
	$val = $_POST['val'];
	$tid = $_POST['tid'];

	
	
date_default_timezone_set('Asia/Manila');
	$datenow=date('Y-m-d H:i:s');

	
	

	                			$selectfirst = " SELECT * FROM `form_response` where userid='$user' and csformid = '$csform' and pds_id = '$tid' ";
	                	                $rsf = mysqli_query($con,$selectfirst); 
	                	                
	                	                 while($rowrsf = mysqli_fetch_array($rsf)){

	                	                 	$defcontents = $rowrsf['response'];

	                	                 
	               
	                	
	                	                 }
	                	          


	               


	                ///check the tempstorage if data already exist. if exist. then do update.

	         			$uptcheck = "SELECT * FROM `tempstorage` where user_id = '$user' and tempid = '$tid'  ";
	                         $ruptcheck = mysqli_query($con,$uptcheck); 
	                         $count= mysqli_num_rows($ruptcheck);
	                      if ($count>=1){
	                     //update
	                          while($row = mysqli_fetch_array($ruptcheck)){
	                          	$tempid = $row['resid'];
	                          	
	                          }
	                          $upt= "UPDATE `tempstorage` SET `details`='$defcontents',`replaced_details`='$val' WHERE tempid='$tid'";
	                          mysqli_query($con,$upt);



	                   }else {
	                   	//insert new
	                   	 //insert into db the updated context
	   $inst = "INSERT INTO `tempstorage`(`user_id`, `details`, `replaced_details`, `datecreated`, `tempid`) 
	   							VALUES ('$user','$defcontents','$val','$datenow','$tid')";
	                mysqli_query($con,$inst);
	               
	                   }

	                    $sql = " UPDATE `form_response` SET `response`='$val'  WHERE pds_id = '$tid'  ";
	                $result = mysqli_query($con,$sql); // run query
	              
	
}


if(isset($_POST['notifygc'])){ 

	date_default_timezone_set('Asia/Manila');
	$datenow=date('Y-m-d H:i:s');

	$colid = $_SESSION['student_college'];
	unset($_SESSION['upt_available']);
	$sem = $_SESSION['sem'];

	$updatestudents_to_retakePDS = "UPDATE `student` SET `upt` ='0',`pds_filledsem`='$sem',`pdsmodified` = '$datenow' WHERE stud_id = '$user' ";
	mysqli_query($con,$updatestudents_to_retakePDS);

	

	$update_response_modifydata = "UPDATE `form_response` SET `datemodified`='$datenow' ,`semester_upt`='$sem' WHERE csformid = '62' and userid = '$user' ";
	mysqli_query($con,$update_response_modifydata);



	$notify = "INSERT INTO `notification`(`admin_id`, `type`, `title`, `content`, `status`, `date_notified`,`studenttaker_id`, `formid`,`course`,`action`,`CollegeId`) 
									VALUES ('1','notification','PDS form has been Modified','Personal Data Sheets has been modified','unread','$datenow','$user','$csform','$kurso','pdsmodified','$colid')";
									mysqli_query($con,$notify);

									$get_id =  mysqli_insert_id($con);

									$notifygc = "INSERT INTO `notification`(`admin_id`, `type`, `title`, `content`, `status`, `date_notified`,`studenttaker_id`, `formid`,`CollegeId`) 
									VALUES ('1','notifystudent','PDS form has been Modified','Personal Data Sheets has been modified','unread','$datenow','$user','$csform','$colid')";
									mysqli_query($con,$notifygc);

									$notifygcstud = "INSERT INTO `notification`(`admin_id`, `type`, `title`, `content`, `status`, `date_notified`,`studenttaker_id`, `formid`,`CollegeId`) 
									VALUES ('1','notifystudentacc','You have modified your PDS','Personal Data Sheets has been modified','unread','$datenow','$user','$csform','$colid')";
									mysqli_query($con,$notifygcstud);

				$sql = " SELECT * FROM `tempstorage` where user_id = '$user' ";
		                $result = mysqli_query($con,$sql);
		                $count= mysqli_num_rows($result);
		             if ($count>=1){
		             	

		                 while($row = mysqli_fetch_array($result)){
							///save to notifications
							$details[] = $row['details'];
							$replaced_details[] = $row['replaced_details'];
		                 }

		                
		                  $det = " ";
		                   $rep = " ";
		                 	for ($i=0; $i < count($details);$i++){
		                 						$j = $i+1;
											
											$det.=  $details[$i].",";
											$rep .= '• '.$replaced_details[$i].",";
											$upt = "UPDATE `notification` SET `cdetails`='$det' ,`creplaced_details`='$rep'  WHERE noti_id = '$get_id' ";
												
										}
										mysqli_query($con,$upt);


		          }else {

		          		//exit

		          }

		         $del = "DELETE FROM `tempstorage` WHERE user_id = '$user' ";
		         mysqli_query($con,$del);






}

//$tosavejson = $val.','.$tid;
	/*$value = file_get_contents($user.'val.json');
    $tempArray = json_decode($value,true);
    
    if($tempArray) {
       
        array_push($tempArray, $val);
        $jsonDatav = json_encode($tempArray);
    }
    else {
        $jsonDatav=json_encode(array($tosavejson));
    } 

   file_put_contents($user.'val.json',$jsonDatav);


   $ids= file_get_contents($user.'id.json');
   $idsdecode = json_decode($ids,true);
    
   
    
    if($idsdecode) {
        array_push($idsdecode, $tid);
        
        $jsonData = json_encode($idsdecode);
    }
    else {
        $jsonData=json_encode(array($tid));
    }

    file_put_contents($user.'id.json', $jsonData);
   
     
      
  
   $_SESSION['updatedtrue'] = 1;*/


 ?>


