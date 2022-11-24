<?php 
	$csform = $_SESSION['form_id'];

							if(isset($_SESSION['sectionset'])){
									$sectionsetid = $_SESSION['sectionset'];

												if(isset($_SESSION['dorder'])){

													$dorder = $_SESSION['dorder'];
													$neword = $dorder+1;
													///

												$d = " select * from form where class_name = '$csform' and display_order > $dorder  ";
								                $r = mysqli_query($con,$d); // run query
								            
								                 while($rws = mysqli_fetch_array($r)){
													$neworder = $rws['display_order']+1;
													$fids = $rws['form_id'];

													$upt = "UPDATE `form` SET `display_order`='$neworder' WHERE form_id = '$fids' ";
													mysqli_query($con,$upt);
								                 }
								                 ////=--------------------------------------------------------------------

								                 $se = " select * from form where sec_no = '$sectionsetid' and type ='section'   ";
							                $resultse = mysqli_query($con,$se);
							               
							              
							             
							              while($rowse = mysqli_fetch_array($resultse)){
												$section_no = $rowse['sec_no'];
												$formiddd = $rowse['form_id'];
												
					                		 }


					                		 	$sql = " select * from form where status = 'selected'  and class_name = '$csform'   ";
							                $result = mysqli_query($con,$sql); // run query
							                $count= mysqli_num_rows($result); // to count if necessary
							              
							             if ($count==1){
							              while($row = mysqli_fetch_array($result)){
												$formdd = $row['form_id'];
					                		 }
					                $sqlupdate = " UPDATE `form` set `status`=NULL  where form_id = '$formdd'  ";
				               	 $resultsupdate = mysqli_query($con,$sqlupdate); // run query	 	
				               	 	//
				               	 	
				               $sqlinsert = " INSERT INTO `form`( `type`, `content`,`class_name`,`display_order`,`status`,`isrequired`,`sec_no`,`section`) VALUES ('Plaintext','Unfilled text','$csform','$neword','selected','no','$sectionsetid','$formiddd')  ";
				               	 $results = mysqli_query($con,$sqlinsert); // run query
				               	 	       




							 
				              
				               			$_SESSION['dorder'] = $neword;
							          
							          }else {
			
				               $sqlinsert = " INSERT INTO `form`( `type`, `content`,`class_name`,`display_order`,`status`,`isrequired`,`sec_no`,`section`) VALUES ('Plaintext','Unfilled text','$csform','$neword','selected','no','$section_no','$formiddd')  ";
				               	 $results = mysqli_query($con,$sqlinsert); // run query
				               	 	            
 
				              
				             
							          }




								                 
								         		 	
								          ////------

												}else {	

														////

										$se = " select * from form where form_id = '$sectionsetid'   ";
							                $resultse = mysqli_query($con,$se);
							               
							              
							             
							              while($rowse = mysqli_fetch_array($resultse)){
												$section_no = $rowse['sec_no'];
												
					                		 }

					                		 	$sql = " select * from form where status = 'selected'  and class_name = '$csform'   ";
							                $result = mysqli_query($con,$sql); // run query
							                $count= mysqli_num_rows($result); // to count if necessary
							              
							             if ($count==1){
							              while($row = mysqli_fetch_array($result)){
												$formdd = $row['form_id'];
					                		 }
					                $sqlupdate = " UPDATE `form` set `status`=NULL  where form_id = '$formdd'  ";
				               	 $resultsupdate = mysqli_query($con,$sqlupdate); // run query	 	
				               	 	//
				               	 	$getthehighestorders = "select * from form where class_name = '$csform'  and display_order=(select max(display_order) from form where class_name='$csform')  ";

				               	 	                $resultgetsss = mysqli_query($con,$getthehighestorders);
				               	 	                $countsss= mysqli_num_rows($resultgetsss); 
				               	 	              
				               	 	             if ($countsss == 1 ){

				               	 	             
				               	 	                 while($row = mysqli_fetch_array($resultgetsss)){
				               	 						$dorder = $row['display_order'] + 1 ;

				               	 	                 }
				               $sqlinsert = " INSERT INTO `form`( `type`, `content`,`class_name`,`display_order`,`status`,`isrequired`,`sec_no`,`section`) VALUES ('Plaintext','Unfilled text','$csform','$dorder','selected','no','$section_no','$sectionsetid')  ";
				               	 $results = mysqli_query($con,$sqlinsert); // run query
				               	 	             }else {
   $sqlinsert = " INSERT INTO `form`( `type`, `content`,`class_name`,`display_order`,`status`,`isrequired`,`sec_no`,`section`) VALUES ('Plaintext','Unfilled text','$csform',0,'selected','no','$section_no','$sectionsetid')  ";
				               	 $results = mysqli_query($con,$sqlinsert); // run query

				               	 	             }




							 
				              
				               
							          
							          }else {
			$getthehighestorders = "select * from form where display_order=(select max(display_order) from form)";

				               	 	                $resultgetsss = mysqli_query($con,$getthehighestorders);
				               	 	                $countsss= mysqli_num_rows($resultgetsss); 
				               	 	              
				               	 	             if ($countsss == 1 ){

				               	 	             
				               	 	                 while($row = mysqli_fetch_array($resultgetsss)){
				               	 						$dorder = $row['display_order'] + 1 ;

				               	 	                 }
				               $sqlinsert = " INSERT INTO `form`( `type`, `content`,`class_name`,`display_order`,`status`,`isrequired`,`sec_no`,`section`) VALUES ('Plaintext','Unfilled text','$csform','$dorder','selected','no','$section_no','$sectionsetid')  ";
				               	 $results = mysqli_query($con,$sqlinsert); // run query
				               	 	             }else {
  $sqlinsert = " INSERT INTO `form`( `type`, `content`,`class_name`,`display_order`,`status`,`isrequired`,`sec_no`,`section`) VALUES ('Plaintext','Unfilled text','$csform',0,'selected','no','$section_no','$sectionsetid')  ";
				               	 $results = mysqli_query($con,$sqlinsert); // run query

				               	 	             }
				              
				             
							          }


														////
												}


							          /////



							}else {

								//what if not set!
								 
										$selectsection = " SELECT * FROM `form` where class_name = '62' and type='section' order by sec_no desc limit 1 ";
								                $resultselect = mysqli_query($con,$selectsection); // run query
								                $countselect= mysqli_num_rows($resultselect); // to count if necessary
								               //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
								             if ($countselect>=1){
								             	//while($row = mysqli_fetch_array($result)){} is where we output all the data in database
								                 while($rowselect = mysqli_fetch_array($resultselect)){
													$secno = $rowselect['sec_no'];
													$formidsss = $rowselect['form_id'];	
								                 }

								                 ///////////////////


								//	$tc = $_SESSION['title_column'];
									$sql = " select * from form where status = 'selected'  and class_name = '$csform'   ";
							                $result = mysqli_query($con,$sql); // run query
							                $count= mysqli_num_rows($result); // to count if necessary
							              
							             if ($count==1){
							              while($row = mysqli_fetch_array($result)){
												$formdd = $row['form_id'];
					                		 }
					                $sqlupdate = " UPDATE `form` set `status`=NULL  where form_id = '$formdd'  ";
				               	 $resultsupdate = mysqli_query($con,$sqlupdate); // run query	 	
				               	 	//
				               	 	$getthehighestorders = "select * from form where class_name = '$csform'  and display_order=(select max(display_order) from form where class_name='$csform')  ";

				               	 	                $resultgetsss = mysqli_query($con,$getthehighestorders);
				               	 	                $countsss= mysqli_num_rows($resultgetsss); 
				               	 	              
				               	 	             if ($countsss == 1 ){

				               	 	             
				               	 	                 while($row = mysqli_fetch_array($resultgetsss)){
				               	 						$dorder = $row['display_order'] + 1 ;

				               	 	                 }
				               $sqlinsert = " INSERT INTO `form`( `type`, `content`,`class_name`,`display_order`,`status`,`isrequired`,`sec_no`,`section`) VALUES ('Plaintext','Unfilled text','$csform','$dorder','selected','no','$secno','$formidsss')  ";
				               	 $results = mysqli_query($con,$sqlinsert); // run query
				               	 	             }else {
   $sqlinsert = " INSERT INTO `form`( `type`, `content`,`class_name`,`display_order`,`status`,`isrequired`,`sec_no`,`section`) VALUES ('Plaintext','Unfilled text','$csform',0,'selected','no','$secno','$formidsss')  ";
				               	 $results = mysqli_query($con,$sqlinsert); // run query

				               	 	             }




							 
				              
				               
							          
							          }else {
			$getthehighestorders = "select * from form where display_order=(select max(display_order) from form)";

				               	 	                $resultgetsss = mysqli_query($con,$getthehighestorders);
				               	 	                $countsss= mysqli_num_rows($resultgetsss); 
				               	 	              
				               	 	             if ($countsss == 1 ){

				               	 	             
				               	 	                 while($row = mysqli_fetch_array($resultgetsss)){
				               	 						$dorder = $row['display_order'] + 1 ;

				               	 	                 }
				               $sqlinsert = " INSERT INTO `form`( `type`, `content`,`class_name`,`display_order`,`status`,`isrequired`,`sec_no`,`section`) VALUES ('Plaintext','Unfilled text','$csform','$dorder','selected','no','$secno','$formidsss')  ";
				               	 $results = mysqli_query($con,$sqlinsert); // run query
				               	 	             }else {
  $sqlinsert = " INSERT INTO `form`( `type`, `content`,`class_name`,`display_order`,`status`,`isrequired`,`sec_no`,`section`) VALUES ('Plaintext','Unfilled text','$csform',0,'selected','no','$secno','$formidsss')  ";
				               	 $results = mysqli_query($con,$sqlinsert); // run query

				               	 	             }
				              
				             
							          }

							  ///////////////////  

								          }else {


								          		///////////////////


								//	$tc = $_SESSION['title_column'];
									$sql = " select * from form where status = 'selected'  and class_name = '$csform'   ";
							                $result = mysqli_query($con,$sql); // run query
							                $count= mysqli_num_rows($result); // to count if necessary
							              
							             if ($count==1){
							              while($row = mysqli_fetch_array($result)){
												$formdd = $row['form_id'];
					                		 }
					                $sqlupdate = " UPDATE `form` set `status`=NULL  where form_id = '$formdd'  ";
				               	 $resultsupdate = mysqli_query($con,$sqlupdate); // run query	 	
				               	 	//
				               	 	$getthehighestorders = "select * from form where class_name = '$csform'  and display_order=(select max(display_order) from form where class_name='$csform')  ";

				               	 	                $resultgetsss = mysqli_query($con,$getthehighestorders);
				               	 	                $countsss= mysqli_num_rows($resultgetsss); 
				               	 	              
				               	 	             if ($countsss == 1 ){

				               	 	             
				               	 	                 while($row = mysqli_fetch_array($resultgetsss)){
				               	 						$dorder = $row['display_order'] + 1 ;

				               	 	                 }
				               $sqlinsert = " INSERT INTO `form`( `type`, `content`,`class_name`,`display_order`,`status`,`isrequired`) VALUES ('Plaintext','Unfilled text','$csform','$dorder','selected','no')  ";
				               	 $results = mysqli_query($con,$sqlinsert); // run query
				               	 	             }else {
   $sqlinsert = " INSERT INTO `form`( `type`, `content`,`class_name`,`display_order`,`status`,`isrequired`) VALUES ('Plaintext','Unfilled text','$csform',0,'selected','no')  ";
				               	 $results = mysqli_query($con,$sqlinsert); // run query

				               	 	             }




							 
				              
				               
							          
							          }else {
			$getthehighestorders = "select * from form where display_order=(select max(display_order) from form)";

				               	 	                $resultgetsss = mysqli_query($con,$getthehighestorders);
				               	 	                $countsss= mysqli_num_rows($resultgetsss); 
				               	 	              
				               	 	             if ($countsss == 1 ){

				               	 	             
				               	 	                 while($row = mysqli_fetch_array($resultgetsss)){
				               	 						$dorder = $row['display_order'] + 1 ;

				               	 	                 }
				               $sqlinsert = " INSERT INTO `form`( `type`, `content`,`class_name`,`display_order`,`status`,`isrequired`) VALUES ('Plaintext','Unfilled text','$csform','$dorder','selected','no')  ";
				               	 $results = mysqli_query($con,$sqlinsert); // run query
				               	 	             }else {
  $sqlinsert = " INSERT INTO `form`( `type`, `content`,`class_name`,`display_order`,`status`,`isrequired`) VALUES ('Plaintext','Unfilled text','$csform',0,'selected','no')  ";
				               	 $results = mysqli_query($con,$sqlinsert); // run query

				               	 	             }
				              
				             
							          }

							  ///////////////////  





								          }



								




							}


 ?>