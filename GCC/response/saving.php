<?php 
session_start();
include '../create_form/connect.php';
$user = $_SESSION['user_student_token_check'];
$csform = $_SESSION['Live_form_id'];	

if(isset($_POST['savetotemp'])){ 
	
	$sec =  $_POST['inputdatasection'];

			date_default_timezone_set('Asia/Manila'); 
			$datenow = date('Y-m-d H:i:s');	


			$getform = " select * from form where class_name ='$csform' and sec_no = '$sec' and type='Question'   ";
		                $resultff = mysqli_query($con,$getform);
		                $countff= mysqli_num_rows($resultff); 
		               
		             
		             	
		                 while($row = mysqli_fetch_array($resultff)){

		                 	$formids= $row['form_id'];
		                 	$selectedids[] = $_POST[$formids];
		                 	
		                	$ids[] = $formids;
						

							
		                 }
		                


				
				if(isset($selectedids)){
							
					
					$all =null;
					foreach ($selectedids as $key => $value) {
							$ps[] = $value;
							
					
						 if (is_array($value)) { 
						 	$fids[] = $ids[$key];
						 

						 }else {



				 	
					$save = " select * from temp_answers where userid = '$user' and formid = '$ids[$key]'  ";
	                $resultsave = mysqli_query($con,$save);
	                $countsave= mysqli_num_rows($resultsave);
	             if ($countsave>=1){

	             	      while($row = mysqli_fetch_array($resultsave)){
	             			$tid = $row['tid'];

	          $upt = "UPDATE `temp_pds_answers` SET `formid`='".$ids[$key]."' , `response`='".$value."'  WHERE tid = '$tid' and userid = '$user' and sec_no='$sec' ";
	                 mysqli_query($con,$upt);

	                 
	             	                 }
	             	          
	             	
	            

	                 
	                

							          }else {
		 $savenew = "INSERT INTO `temp_answers`(`userid`, `formid`, `response`, `datecreated`,`sec_no`,`csformid`) VALUES ('$user','".$ids[$key]."','".$value."','$datenow','$sec','$csform')";
							                 mysqli_query($con,$savenew); 


							                
							          } 
							         


						 }
					}
					
				}

	
				if(isset($ps)){

					$val=null;
					$arr = [];

 								foreach ($ps as $key => $arr) {
 												
 										


 									 foreach ($arr as $k) {

 									 
 									 	$val=$k.',';

 									 	$checkfirst = "select * from temp_answers where formid = '".$fids[$key]."' ";
 									 	$res =mysqli_query($con,$checkfirst);
 									 	$countres= mysqli_num_rows($res);
 									 	if($countres >=1){
 									 		 while($row = mysqli_fetch_array($res)){
	 									 			$recordedval = $row['response'];
	 									 			$tid = $row['tid'];
	 									 		$newval = $recordedval.$val;


 									 			$update = "UPDATE `temp_answers` SET `response`='$newval' WHERE tid ='$tid' ";
 									 			mysqli_query($con,$update);


 									 		   }
 									 	}else {

 						$savenewd = "INSERT INTO `temp_answers`(`userid`, `formid`, `response`, `datecreated`,`sec_no`,`csformid`) VALUES ('$user','".$fids[$key]."','".$val."','$datenow','$sec','$csform')";
 								mysqli_query($con,$savenewd); 

 									 	}
				


	



 									 }

 									 

 								}

				}
 								

		
			

		                
		        

		
}
	   
if(isset($_POST['savetable'])){ 
	$secno = $_POST['secno'];

					$fd = $_SESSION['fd'];
					$tbleid = $_SESSION['tbleid'];
					$tcidd = $_SESSION['tcidd'];

	for ($i = 0 ; $i < count($tbleid); $i++){

		
		 date_default_timezone_set('Asia/Manila'); 
		$datenow = date('Y-m-d H:i:s');
				$user = $_SESSION['user_student_token_check'];	
										   							
$checktosave = " SELECT * FROM `temp_answers` where formid = '".$fd[$i]."' and tble_id = '".$tbleid[$i]."' and tc_id = '".$tcidd[$i]."'  ";
			 $resultinsaving = mysqli_query($con,$checktosave); 
			$countsave= mysqli_num_rows($resultinsaving);
			if ($countsave>=1){
		//	echo 'count table 1';
				 while($row = mysqli_fetch_array($resultinsaving)){
										   							
				 }
			}else {
		 $inserttpdtemp = "INSERT INTO `temp_answers`(`userid`, `sec_no`, `formid`, `tble_id`, `tc_id`,`datecreated`,`tble`,`csformid`) VALUES ('$user','$secno','".$fd[$i]."','".$tbleid[$i]."','".$tcidd[$i]."','$datenow',1,'$csform')";
			mysqli_query($con,$inserttpdtemp); 

										   							          	

										   							          }
										   			                 		
										   			                 	}
										   			                 
	
}



if(isset($_POST['upttxtcontents'])){ 
	$val = $_POST['val'];
	$tid = $_POST['tid'];


			$sql = " UPDATE `temp_answers` SET `response`='$val'  WHERE tid = '$tid'  ";
	                $result = mysqli_query($con,$sql); // run query
	              


}

if(isset($_POST['uptmpchoice'])){ 
	$val = $_POST['val'];
	$tid = $_POST['tid'];


			$sql = " UPDATE `temp_answers` SET `response`='$val'  WHERE tid = '$tid'  ";
	                $result = mysqli_query($con,$sql); // run query
	              
	
}

if(isset($_POST['uptcheckbox'])){ 
	$val = $_POST['val'];
	$tid = $_POST['tid'];


	


	
$sql = " UPDATE `temp_answers` SET `response`='$val'  WHERE tid = '$tid'  ";
	                $result = mysqli_query($con,$sql); 
}

if(isset($_POST['upttable'])){ 
	$val = $_POST['val'];
	$tid = $_POST['tid'];

					
 $sql = " UPDATE `temp_answers` SET `response`='$val'  WHERE tid = '$tid'  ";
	                $result = mysqli_query($con,$sql);
		                
}

if(isset($_POST['filllist'])){ 
	$val = $_POST['val'];
	$tid = $_POST['tid'];

	
	$sql = " UPDATE `temp_answers` SET `response`='$val'  WHERE tid = '$tid'  ";
	                $result = mysqli_query($con,$sql);
	
	
}

if(isset($_POST['savelist'])){ 

	$secno = $_POST['secno'];
	$fid = $_SESSION['fidlist'];
	$tccid =$_SESSION['tcontentid'];



	for ($i = 0 ; $i < count($fid); $i++){ 

		echo $fid[$i];
		//echo $secno;



		 date_default_timezone_set('Asia/Manila'); 
		$datenow = date('Y-m-d H:i:s');
				$user = $_SESSION['user_student_token_check'];	
										   							
$checktosave = " SELECT * FROM `temp_answers` where formid = '".$fid[$i]."' and tcontent_id='".$tccid[$i]."' and list = 1   ";
			 $resultinsaving = mysqli_query($con,$checktosave); 
			$countsave= mysqli_num_rows($resultinsaving);
			if ($countsave>=1){
		//	echo 'count 1';
				
			}else {
		
			 $inserttpdtemp = "INSERT INTO `temp_answers`(`userid`, `sec_no`, `formid`, `datecreated`,`list`,`tcontent_id`,`csformid`) VALUES ('$user','$secno','".$fid[$i]."','$datenow',1,'".$tccid[$i]."','$csform')";
			mysqli_query($con,$inserttpdtemp);


										   							          	
 }

										   							         
										   			                 		

	}
	
}
 ?>