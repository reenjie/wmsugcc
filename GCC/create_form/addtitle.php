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
				               	 	
				              	 ////the add code

				              	  $sqlinsert = " INSERT INTO `form`( `type`, `content`,`class_name`,`display_order`,`status`,`bgcolor`,`txtcolor`,`sec_no`,`section`) VALUES ('Title','Untitled','$csform','$neword' ,'selected','#7480dc','#0a2a3f','$sectionsetid','$formiddd')  ";
				                $results = mysqli_query($con,$sqlinsert); // run query




							 
				              
				               			$_SESSION['dorder'] = $neword;
							          
							          }else {
			
				             ////the add code
							          	  $sqlinsert = " INSERT INTO `form`( `type`, `content`,`class_name`,`display_order`,`status`,`bgcolor`,`txtcolor`,`sec_no`,`section`) VALUES ('Title','Untitled','$csform','$neword' ,'selected','#7480dc','#0a2a3f','$sectionsetid','$formiddd')  ";
				                $results = mysqli_query($con,$sqlinsert); // run query

				               	 	            
 
				              
				             
							          }


					                		}else {



								                 $se = " select * from form where form_id = '$sectionsetid'    ";
							                $resultse = mysqli_query($con,$se);
							               
							              
							             
							              while($rowse = mysqli_fetch_array($resultse)){
												$section_no = $rowse['sec_no'];
												$formiddd = $rowse['form_id'];
												
					                		 }

					                			////

					                		 	$sql = " select * from form where status = 'selected' and class_name = '$csform' ";
							                $result = mysqli_query($con,$sql); // run query
							                $count= mysqli_num_rows($result); // to count if necessary
							              
							             if ($count==1){
							              while($row = mysqli_fetch_array($result)){
												$formdd = $row['form_id'];
												  $sqlupdate = " UPDATE `form` set `status`=NULL where form_id = '$formdd' and class_name='$csform' ";
				               					 $resultsupdate = mysqli_query($con,$sqlupdate); // run query
					                		 }
					              	 	
				               	 	//
				  $getthehighestorder = "select * from form where  class_name = '$csform'  and display_order=(select max(display_order) from form where class_name='$csform') ";

				               	 	                $resultgetss = mysqli_query($con,$getthehighestorder);
				               	 	                $countss= mysqli_num_rows($resultgetss); 
				               	 	              
				               	 	             if ($countss == 1 ){

				               	 	             
				               	 	                 while($row = mysqli_fetch_array($resultgetss)){
				               	 						$dorder = $row['display_order'] + 1 ;

				               	 	                 }

							    $sqlinsert = " INSERT INTO `form`( `type`, `content`,`class_name`,`display_order`,`status`,`bgcolor`,`txtcolor`,`sec_no`,`section`) VALUES ('Title','Untitled','$csform','$dorder' ,'selected','#7480dc','#0a2a3f','$section_no','$sectionsetid')  ";
				                $results = mysqli_query($con,$sqlinsert); // run query
				               	 	          }else {
				               	 	          	  $sqlinsert = " INSERT INTO `form`( `type`, `content`,`class_name`,`display_order`,`status`,`bgcolor`,`txtcolor`,`sec_no`,`section`) VALUES ('Title','Untitled','$csform',0 ,'selected','#7480dc','#0a2a3f','$section_no','$sectionsetid')  ";
				                $results = mysqli_query($con,$sqlinsert); // run query
				               	 	          }








				              
							          }else {
							          	
							          	$getthehighestorders = "select * from form where class_name = '$csform'  and display_order=(select max(display_order) from form)";

				               	 	                $resultgetsss = mysqli_query($con,$getthehighestorders);
				               	 	                $countsss= mysqli_num_rows($resultgetsss); 
				               	 	              
				               	 	             if ($countsss == 1 ){

				               	 	             
				               	 	                 while($row = mysqli_fetch_array($resultgetsss)){
				               	 						$dorder = $row['display_order'] + 1 ;

				               	 	                 }

							    $sqlinsert = " INSERT INTO `form`( `type`, `content`,`class_name`,`display_order`,`status`,`bgcolor`,`txtcolor`,`sec_no`,`section`) VALUES ('Title','Untitled','$csform','$dorder' ,'selected','#7480dc','#0a2a3f','$section_no','$sectionsetid')  ";
				                $results = mysqli_query($con,$sqlinsert); // run query
				               	 	          }else {
				               	 	          	  $sqlinsert = " INSERT INTO `form`( `type`, `content`,`class_name`,`display_order`,`status`,`bgcolor`,`txtcolor`,`sec_no`,`section`) VALUES ('Title','Untitled','$csform',0 ,'selected','#7480dc','#0a2a3f','$section_no','$sectionsetid')  ";
				                $results = mysqli_query($con,$sqlinsert); // run query
				               	 	          }

						
							          }


					                			////


					                		}


								
								



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
								                      		 	$sql = " select * from form where status = 'selected' and class_name = '$csform' ";
							                $result = mysqli_query($con,$sql); // run query
							                $count= mysqli_num_rows($result); // to count if necessary
							              
							             if ($count==1){
							              while($row = mysqli_fetch_array($result)){
												$formdd = $row['form_id'];
												  $sqlupdate = " UPDATE `form` set `status`=NULL where form_id = '$formdd' and class_name='$csform' ";
				               					 $resultsupdate = mysqli_query($con,$sqlupdate); // run query
					                		 }
					              	 	
				               	 	//
				  $getthehighestorder = "select * from form where  class_name = '$csform'  and display_order=(select max(display_order) from form where class_name='$csform') ";

				               	 	                $resultgetss = mysqli_query($con,$getthehighestorder);
				               	 	                $countss= mysqli_num_rows($resultgetss); 
				               	 	              
				               	 	             if ($countss == 1 ){

				               	 	             
				               	 	                 while($row = mysqli_fetch_array($resultgetss)){
				               	 						$dorder = $row['display_order'] + 1 ;

				               	 	                 }

							    $sqlinsert = " INSERT INTO `form`( `type`, `content`,`class_name`,`display_order`,`status`,`bgcolor`,`txtcolor`,`sec_no`,`section`) VALUES ('Title','Untitled','$csform','$dorder' ,'selected','#7480dc','#0a2a3f','$secno','$formidsss')  ";
				                $results = mysqli_query($con,$sqlinsert); // run query
				               	 	          }else {
				               	 	          	  $sqlinsert = " INSERT INTO `form`( `type`, `content`,`class_name`,`display_order`,`status`,`bgcolor`,`txtcolor`,`sec_no`,`section`) VALUES ('Title','Untitled','$csform',0 ,'selected','#7480dc','#0a2a3f','$secno','$formidsss')  ";
				                $results = mysqli_query($con,$sqlinsert); // run query
				               	 	          }








				              
							          }else {
							          	
							          	$getthehighestorders = "select * from form where class_name = '$csform'  and display_order=(select max(display_order) from form)";

				               	 	                $resultgetsss = mysqli_query($con,$getthehighestorders);
				               	 	                $countsss= mysqli_num_rows($resultgetsss); 
				               	 	              
				               	 	             if ($countsss == 1 ){

				               	 	             
				               	 	                 while($row = mysqli_fetch_array($resultgetsss)){
				               	 						$dorder = $row['display_order'] + 1 ;

				               	 	                 }

							    $sqlinsert = " INSERT INTO `form`( `type`, `content`,`class_name`,`display_order`,`status`,`bgcolor`,`txtcolor`,`sec_no`,`section`) VALUES ('Title','Untitled','$csform','$dorder' ,'selected','#7480dc','#0a2a3f','$secno','$formidsss')  ";
				                $results = mysqli_query($con,$sqlinsert); // run query
				               	 	          }else {
				               	 	          	  $sqlinsert = " INSERT INTO `form`( `type`, `content`,`class_name`,`display_order`,`status`,`bgcolor`,`txtcolor`,`sec_no`,`section`) VALUES ('Title','Untitled','$csform',0 ,'selected','#7480dc','#0a2a3f','$secno','$formidsss')  ";
				                $results = mysqli_query($con,$sqlinsert); // run query
				               	 	          }

						
							          }

							 						 ///////////////////  

								          }else {


								          		///////////////////

								          	     		 	$sql = " select * from form where status = 'selected' and class_name = '$csform' ";
							                $result = mysqli_query($con,$sql); // run query
							                $count= mysqli_num_rows($result); // to count if necessary
							              
							             if ($count==1){
							              while($row = mysqli_fetch_array($result)){
												$formdd = $row['form_id'];
												  $sqlupdate = " UPDATE `form` set `status`=NULL where form_id = '$formdd' and class_name='$csform' ";
				               					 $resultsupdate = mysqli_query($con,$sqlupdate); // run query
					                		 }
					              	 	
				               	 	//
				  $getthehighestorder = "select * from form where  class_name = '$csform'  and display_order=(select max(display_order) from form where class_name='$csform') ";

				               	 	                $resultgetss = mysqli_query($con,$getthehighestorder);
				               	 	                $countss= mysqli_num_rows($resultgetss); 
				               	 	              
				               	 	             if ($countss == 1 ){

				               	 	             
				               	 	                 while($row = mysqli_fetch_array($resultgetss)){
				               	 						$dorder = $row['display_order'] + 1 ;

				               	 	                 }

							    $sqlinsert = " INSERT INTO `form`( `type`, `content`,`class_name`,`display_order`,`status`,`bgcolor`,`txtcolor`) VALUES ('Title','Untitled','$csform','$dorder' ,'selected','#7480dc','#0a2a3f')  ";
				                $results = mysqli_query($con,$sqlinsert); // run query
				               	 	          }else {
				               	 	          	  $sqlinsert = " INSERT INTO `form`( `type`, `content`,`class_name`,`display_order`,`status`,`bgcolor`,`txtcolor`) VALUES ('Title','Untitled','$csform',0 ,'selected','#7480dc','#0a2a3f')  ";
				                $results = mysqli_query($con,$sqlinsert); // run query
				               	 	          }








				              
							          }else {
							          	
							          	$getthehighestorders = "select * from form where class_name = '$csform'  and display_order=(select max(display_order) from form)";

				               	 	                $resultgetsss = mysqli_query($con,$getthehighestorders);
				               	 	                $countsss= mysqli_num_rows($resultgetsss); 
				               	 	              
				               	 	             if ($countsss == 1 ){

				               	 	             
				               	 	                 while($row = mysqli_fetch_array($resultgetsss)){
				               	 						$dorder = $row['display_order'] + 1 ;

				               	 	                 }

							    $sqlinsert = " INSERT INTO `form`( `type`, `content`,`class_name`,`display_order`,`status`,`bgcolor`,`txtcolor`) VALUES ('Title','Untitled','$csform','$dorder' ,'selected','#7480dc','#0a2a3f')  ";
				                $results = mysqli_query($con,$sqlinsert); // run query
				               	 	          }else {
				               	 	          	  $sqlinsert = " INSERT INTO `form`( `type`, `content`,`class_name`,`display_order`,`status`,`bgcolor`,`txtcolor`) VALUES ('Title','Untitled','$csform',0 ,'selected','#7480dc','#0a2a3f')  ";
				                $results = mysqli_query($con,$sqlinsert); // run query
				               	 	          }

						
							          }



							 					 ///////////////////  





								          }



								




							}


 ?>