<?php 
session_start();
include '../GCC/create_form/connect.php';
if(isset($_POST['fillform'])){ 
	$csid = $_POST['csid'];
	$type = $_POST['type'];
	//echo $csid;
                        
	$usertoken = $_SESSION['user_student_token_check'];
	$check = " select * from `form_classification` where csform_id ='$csid' ";
								                $setifr = mysqli_query($con,$check); // run query
								                 while($row = mysqli_fetch_array($setifr)){
								                 	$_SESSION['formnamesession']= $row['form_name'];

								                 }

	$_SESSION['Live_form_id'] = $csid;
	$_SESSION['form_type'] = $type;
	$_SESSION['formtoken'] = $csid;

	date_default_timezone_set('Asia/Manila');
	$datenow= date('Y-m-d H:i:s');

	//if($csid)
	  $sql = " select * from form where  class_name = '$csid' and type in ('Question','file')";
                                  $result = mysqli_query($con,$sql); // run query
                                  $count= mysqli_num_rows($result); // to count if necessary
                                 //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
                               if ($count>=1){
                                 $_SESSION['sectionformactivated'] = 1;

                                   while($row = mysqli_fetch_array($result)){
                                		
                                 //  	echo $usertoken.' ';
                                   	$sec_no= $row['sec_no'];
                                   	$formid= $row['form_id'];
                                   	$csformidd =  $row['class_name'];
                                   //	echo $row['content'];

                                   			$checkifTempdata_exist = " SELECT * FROM `temp_answers` where userid='$usertoken' and csformid = '$csformidd' and formid = '$formid'  ";
                                   	                $theresultfromchecking = mysqli_query($con,$checkifTempdata_exist); 
                                   	                $countcheck= mysqli_num_rows($theresultfromchecking);
                                   	              
                                   	             if ($countcheck>=1){
                                   	            	// Ignore
                                   	            	//echo 'exist';
                                   	                 while($chk = mysqli_fetch_array($theresultfromchecking)){
                                   	
                                   	                 }
                                   	          }else {
                                   	          	// Add new one
                                   	          //	echo 'addnew';

                                   	    $insertformto_temp = "INSERT INTO `temp_answers`(`userid`, `sec_no`, `formid`, `csformid`, `datecreated`) VALUES ('$usertoken','$sec_no','$formid','$csformidd','$datenow')";
                                   	        mysqli_query($con,$insertformto_temp);
											
                                   	       


                                   	          }


                                   

                                   }

                            }

                            //////////////////////////////////////////ADD THE TABLES AND LIST COLUMNS
                            		$getforms = " select * from form where class_name ='$csid'   ";
                                            $gettingforms = mysqli_query($con,$getforms); 
                                            $countsform= mysqli_num_rows($gettingforms);
                                           //  $get_id =  mysqli_insert_id($con); 
                                       
                                        
                                             while($row = mysqli_fetch_array($gettingforms)){
                            					$formids = $row['form_id'];

                            					$sec = $row['sec_no'];




                            	     $tc = " SELECT * FROM `tablecolumn_number` where formid='$formids' ";
											        $resulttc = mysqli_query($con,$tc); // run query
													$counttbl= mysqli_num_rows($resulttc);


													if($counttbl >=1){


											                               
											              
											                 while($rowtc = mysqli_fetch_array($resulttc)){
											                 	$tctype= $rowtc['type'];
											                 	$tcId= $rowtc['tc_id'];

											                 	
							$selectcontents = " SELECT * FROM `tablecolumn_content` where tc_id = '$tcId' and formid='$formids'  ";
									 $resultcc = mysqli_query($con,$selectcontents); // run query
										   			               
										   			                 while($cntnt = mysqli_fetch_array($resultcc)){
										   			                 	$ct = $cntnt['content'];
										   			                 	$fd = $cntnt['formid'];
										   			                 	$tbleid = $cntnt['tble_id'];
										   			                 	$tcidd= $cntnt['tc_id'];	

		$checktosave = " SELECT * FROM `temp_answers` where formid = '$fd' and tble_id = '$tbleid' and tc_id = '$tcidd' and userid= '$usertoken'  ";
			 $resultinsaving = mysqli_query($con,$checktosave); 
			$countsave= mysqli_num_rows($resultinsaving);
			if ($countsave>=1){
		//	echo 'count table 1';
				 while($row = mysqli_fetch_array($resultinsaving)){
										   							
				 }
			}else {
		 $inserttpdtemp = "INSERT INTO `temp_answers`(`userid`, `sec_no`, `formid`, `tble_id`, `tc_id`,`datecreated`,`tble`,`csformid`) VALUES ('$usertoken','$sec','$fd','$tbleid','$tcidd','$datenow',1,'$csid')";
			mysqli_query($con,$inserttpdtemp); 
	
										   							          	

				 }



										   		   }

											                 }
											             }else {

											             }



											 $mlist= " SELECT * FROM `tablecolumn_content` where typ =1 and formid='$formids'  ";
										 	        $resultmlist = mysqli_query($con,$mlist); // run query
										 			 $countmlista= mysqli_num_rows($resultmlist); // to count if necessary

										 	             if($countmlista >=1 ){
										 	             	

										 	                 while($rowlist = mysqli_fetch_array($resultmlist)){
										 	                 	$cct = $rowlist['content'];
										 	                 	$fdlist = $rowlist['formid'];
										 	                 	$tccontent= $rowlist['tcontent_id'];
										 	                 
										 	                 	//


			$checktosave = " SELECT * FROM `temp_answers` where formid = '$fdlist' and tcontent_id='$tccontent' and list = 1 and userid= '$usertoken'   ";
			 $resultinsaving = mysqli_query($con,$checktosave); 
			$countsave= mysqli_num_rows($resultinsaving);
			if ($countsave>=1){
		//	echo 'count 1';
				
			}else {
		
			 $inserttpdtemp = "INSERT INTO `temp_answers`(`userid`, `sec_no`, `formid`, `datecreated`,`list`,`tcontent_id`,`csformid`) VALUES ('$usertoken','$sec','$fdlist','$datenow',1,'$tccontent','$csid')";
			mysqli_query($con,$inserttpdtemp);

			

		

										   							          	
 }
										 	                 	}

										 	               }            


                                             }
                                      

                            	
   
		/*		
				*/



}

//$_SESSION['form_token_id_for_view']
if(isset($_POST['viewform'])){ 
	$csid = $_POST['csid'];
		$_SESSION['form_token_id_for_view'] = $csid;


		  $sql = " select * from form where type = 'section' and class_name = '$csid'  ";
                                  $result = mysqli_query($con,$sql); // run query
                                  $count= mysqli_num_rows($result); // to count if necessary
                                 //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
                               if ($count>=1){
                                 $_SESSION['sectionformactivated'] = 1;
                            }


		
}
if(isset($_POST['modifyform'])){ 

	$csid = $_POST['csid'];
		$_SESSION['form_token_id_for_modify'] = $csid;
	$_SESSION['modification_alert'] = 1;
$usertoken = $_SESSION['user_student_token_check'];

$delte_formresponse = "DELETE FROM `form_response` WHERE formid not in (select form_id from form)";
mysqli_query($con,$delte_formresponse);

  $sql = " select * from form where type = 'section' and class_name = '$csid'  ";
                                  $result = mysqli_query($con,$sql); // run query
                                  $count= mysqli_num_rows($result); // to count if necessary
                                 //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
                               if ($count>=1){
                                 $_SESSION['sectionformactivated'] = 1;
                            }
		

                             
	
}


if(isset($_POST['modify_first'])){
		$courseid = $_POST['reselect'];
		$shid = $_POST['shid'];

		$_SESSION['selectsuggestion']= $_POST['modify_first'];
			$_SESSION['form_token_id_for_modify'] = 60;
		
	$_SESSION['modification_alert'] = 1;
$usertoken = $_SESSION['user_student_token_check'];
$_SESSION['Modify_shiftingform']=1;

$delte_formresponse = "DELETE FROM `form_response` WHERE formid not in (select form_id from form)";
mysqli_query($con,$delte_formresponse);

  $sql = " select * from form where type = 'section' and class_name = '60'  ";
                                  $result = mysqli_query($con,$sql); // run query
                                  $count= mysqli_num_rows($result); // to count if necessary
                                 //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
                               if ($count>=1){
                                 $_SESSION['sectionformactivated'] = 1;
                            }

    echo '&courseid='.$courseid.'&theshid='.$shid;
		


}




if(isset($_POST['updatemypds'])){ 
		$csid = 62;
		$usertoken = $_SESSION['user_student_token_check'];
	$_SESSION['updatepds'] = 1;
	$_SESSION['form_token_id_for_update'] = 62;


	date_default_timezone_set('Asia/Manila');
	$datenow= date('Y-m-d H:i:s');

			
				$select_all_form = "select form_id,type,sec_no,class_name from form where class_name='62' and type in ('Question','file','list') and form_id not in (select formid from form_response where csformid ='62' and userid = '$usertoken')   ";
				 $gettingform_data = mysqli_query($con,$select_all_form); 
				
			 while($row = mysqli_fetch_array($gettingform_data)){
			 			  	$sec_no= $row['sec_no'];
                $formid= $row['form_id'];
                $csformidd =  $row['class_name'];
                $ty = $row['type'];

              
                		$checkifTempdata_exist = " SELECT * FROM `temp_answers` where userid='$usertoken' and csformid = '$csformidd' and formid = '$formid'  ";
                                   	                $theresultfromchecking = mysqli_query($con,$checkifTempdata_exist); 
                                   	                $countcheck= mysqli_num_rows($theresultfromchecking);
                                   	              
                                   	           if ($countcheck>=1){
                                   	            
                                   	          }else {
                                   	          	// Add new one
                                   	          //	echo 'addnew';

                                  	    $insertformto_temp = "INSERT INTO `temp_answers`(`userid`, `sec_no`, `formid`, `csformid`, `datecreated`) VALUES ('$usertoken','$sec_no','$formid','$csformidd','$datenow')";
                                   	        mysqli_query($con,$insertformto_temp);
											
                                   	     


                                   	          }


                                   	          ///////////////////////----------------------------------//////////////////////////////////
                            	     $tc = " SELECT * FROM `tablecolumn_number` where formid='$formid' ";
											        $resulttc = mysqli_query($con,$tc); // run query
													$counttbl= mysqli_num_rows($resulttc);


													if($counttbl >=1){


											                               
											              
											                 while($rowtc = mysqli_fetch_array($resulttc)){
											                 	$tctype= $rowtc['type'];
											                 	$tcId= $rowtc['tc_id'];



											                 	
							$selectcontents = " SELECT * FROM `tablecolumn_content` where tc_id = '$tcId' and formid='$formid'  ";
									 $resultcc = mysqli_query($con,$selectcontents); // run query
										   			               
										   			                 while($cntnt = mysqli_fetch_array($resultcc)){
										   			                 	$ct = $cntnt['content'];
										   			                 	$fd = $cntnt['formid'];
										   			                 	$tbleidss = $cntnt['tble_id'];
										   			                 	$tcidd= $cntnt['tc_id'];	

										   			                 	
										   			                 



		$checktosave = " SELECT * FROM `temp_answers` where formid = '$fd' and tble_id = '$tbleidss' and tc_id = '$tcidd' and userid= '$usertoken'  ";
			 $resultinsaving = mysqli_query($con,$checktosave); 
			$countsave= mysqli_num_rows($resultinsaving);


		
			if ($countsave>=1){
		//	echo 'count table 1';


				 while($row = mysqli_fetch_array($resultinsaving)){
										   							
				 }
			}else {

		 $inserttpdtemp = "INSERT INTO `temp_answers`(`userid`, `sec_no`, `formid`, `tble_id`, `tc_id`,`datecreated`,`tble`,`csformid`) VALUES ('$usertoken','$sec_no','$fd','$tbleidss','$tcidd','$datenow',1,'$csid')";
			mysqli_query($con,$inserttpdtemp); 

			
	
										   							          	

				 }



										   		   }

											                 }
											             }else {

											             } 



											 $mlist= " SELECT * FROM `tablecolumn_content` where typ =1 and formid='$formid'  ";
										 	        $resultmlist = mysqli_query($con,$mlist); // run query
										 			 $countmlista= mysqli_num_rows($resultmlist); // to count if necessary

										 	             if($countmlista >=1 ){
										 	             	

										 	                 while($rowlist = mysqli_fetch_array($resultmlist)){
										 	                 	$cct = $rowlist['content'];
										 	                 	$fdlist = $rowlist['formid'];
										 	                 	$tccontent= $rowlist['tcontent_id'];
										 	                 
										 	                 	//


			$checktosave = " SELECT * FROM `temp_answers` where formid = '$fdlist' and tcontent_id='$tccontent' and list = 1 and userid= '$usertoken'   ";
			 $resultinsaving = mysqli_query($con,$checktosave); 
			$countsave= mysqli_num_rows($resultinsaving);
			if ($countsave>=1){
		//	echo 'count 1';
				
			}else {
		
			 $inserttpdtemp = "INSERT INTO `temp_answers`(`userid`, `sec_no`, `formid`, `datecreated`,`list`,`tcontent_id`,`csformid`) VALUES ('$usertoken','$sec_no','$fdlist','$datenow',1,'$tccontent','$csid')";
			mysqli_query($con,$inserttpdtemp);

		

			//dli sya pwede kc diri ga aacccess ang shiftform

										   							          	
 }
										 	                 	}

										 	               }    

                                   	          ///////////////////////----------------------------------//////////////////////////////////
                


                	
									
				 }

			
	
}

if(isset($_GET['approved'])){

	$sftoken = $_GET['sftoken'];
	$studenttokenid = $_GET['studenttokenid'];
	$studentname = $_GET['studentname'];
	$stat = $_GET['status'];
	$hist = $_GET['hist'];

	$from = $_GET['from'];
	$to = $_GET['to'];

	$fromcollege = $_GET['fromcollege'];
	$tocollege = $_GET['tocollege'];



	date_default_timezone_set('Asia/Manila');
	$datenow = date('Y-m-d');

		$getshift_count = "select * from student where stud_id = '$studenttokenid' ";
				 $gettingcount_ofshift = mysqli_query($con,$getshift_count); 
				
			 while($shcount = mysqli_fetch_array($gettingcount_ofshift)){
							$scount = $shcount['shiftcount'];		
				 }
			
			

			/*$getsfs = "SELECT * FROM `shifting_history` where sh_id = '$hist' ";
			 $gettingsfs = mysqli_query($con,$getsfs); 
			
		 while($row = mysqli_fetch_array($gettingsfs)){

		 		$shifthistid = $row['sh_id'];
								
			 }*/


				$checksf = " select * from sf_content where stud_id = '$studenttokenid' and status='$stat' and sfs ='$hist'  ";
		                $chkingsfcontents = mysqli_query($con,$checksf); 
		                $count= mysqli_num_rows($chkingsfcontents);
		             
		             if ($count>=1){

		             	
		           header('location:sf_editappr.php?student-sf&sftoken=60&studenttokenid='.$studenttokenid.'&studentname='.$studentname.'&status='.$stat.'&sfs='.$hist.'&from='.$from.'&to='.$to.'&fromcollege='.$fromcollege.'&tocollege='.$tocollege);
		                
		          }else {

		          	$getsfdata = " select * from sf_content where status= '0'  ";
		          		                $gttingsfdata = mysqli_query($con,$getsfdata); 
		          		           
		          		            
		          		                 while($row = mysqli_fetch_array($gttingsfdata)){
		          							$type = $row['type'];

		          							$insert = "INSERT INTO `sf_content`(`stud_id`, `type`, `datecreated`, `status`,`sfs`) VALUES ('$studenttokenid','$type','$datenow','1','$hist')";
		          							mysqli_query($con,$insert);


		          		                 }

		          		               header('location:sf_editappr.php?student-sf&sftoken=60&studenttokenid='.$studenttokenid.'&studentname='.$studentname.'&status='.$stat.'&sfs='.$hist.'&from='.$from.'&to='.$to.'&fromcollege='.$fromcollege.'&tocollege='.$tocollege);

		          		          

		          }
	
}
 ?>