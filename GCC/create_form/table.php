<?php 
session_start();
include 'connect.php';
	
	if(isset($_POST['addnewrows'])){ 
		$tbleid = $_POST['tbleid'];
		$content = $_POST['content'];
		$fid = $_POST['fid'];

					$checkheader = " select * from `tablechoices` where form_id = '$fid'  ";
			                $result = mysqli_query($con,$checkheader); // run query
			                $count= mysqli_num_rows($result); // to count if necessary
			               //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
			             if ($count>=1){
			             	
			             	$inserttablecontent = "INSERT INTO `tablechoices`(`form_id`, `content`,`tc_id`) VALUES ('$fid','Untitled table header','$tbleid')";
       		$resulttablecontent = mysqli_query($con,$inserttablecontent);
       				
       		              $get_id  =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
       		           

       		              if($resulttablecontent) {
       		              		

       					$sql = " SELECT * FROM `tablecolumn_number` where type ='content'  ";
       			                $result = mysqli_query($con,$sql); // run query
       			               
       			                 while($row = mysqli_fetch_array($result)){
       									$tc = $row['tc_id'];

       		$inserttablecontents = "INSERT INTO `tablecolumn_content`(`tble_id`, `tc_id`, `formid`, `content`) VALUES ('$get_id','$tc','$fid','Supporting Contents')";
       		$resulttablecontents = mysqli_query($con,$inserttablecontents);


       			                 }
       			          
       		              }
			             	
			          	}else {
			          		
			         $deltc= " DELETE FROM `tablecolumn_number` WHERE formid='$fid' ";
		              mysqli_query($con,$deltc); // run query


       		              $untitledtable = 'Untitled table header';
			$contentss = 'Supporting Contents';

       		              $tablecolumnnumber = " INSERT INTO `tablecolumn_number`(`formid`,`type`) VALUES ('$fid','header')  ";
		mysqli_query($con,$tablecolumnnumber); // run query
		$get_columnnumber =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
			                          

		
			$inserttablecontent = "INSERT INTO `tablechoices`(`form_id`, `content`,`tc_id`) VALUES ('$fid','$untitledtable','$get_columnnumber')";
       		$resulttablecontent = mysqli_query($con,$inserttablecontent); // run query
			               
		  

		$selectheaders = "SELECT * FROM `tablechoices` WHERE form_id = '$fid' ";
		 $result = mysqli_query($con,$selectheaders); // run query
		 if($result) {
		 $tablecolumncontent = " INSERT INTO `tablecolumn_number`(`formid`,`type`) VALUES ('$fid','content')  ";
		mysqli_query($con,$tablecolumncontent ); // run query

		$get_columnforcontent =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
		 }
		   while($row = mysqli_fetch_array($result)){

		   	$tableids = $row['tble_id'];
		   		$insertcontent = "INSERT INTO `tablecolumn_content`( `tble_id`, `tc_id`, `content`,`formid`) VALUES ('$tableids','$get_columnforcontent','$contentss','$fid')";
		   			
		   		          mysqli_query($con,$insertcontent); 
		   		              
		          
		       }


			          	}

			
       		
		               
	}
	if(isset($_POST['deletetable'])){ 
		$fid = $_POST['fid'];
				$deltc= " DELETE FROM `tablecolumn_number` WHERE formid='$fid' ";
		              mysqli_query($con,$deltc); // run query

		              $deltch= " DELETE FROM `tablechoices`  WHERE form_id='$fid' ";
		              mysqli_query($con,$deltch); // run query
		               
		              

		                $deltcnt= "  DELETE FROM `tablecolumn_content` WHERE formid='$fid' and typ=0 ";
		              	mysqli_query($con,$deltcnt); // run query
		              	

		              	$upt = "UPDATE `form` SET `isset`=0 WHERE form_id = '$fid'";
						mysqli_query($con,$upt);

						$sql = " UPDATE `form` SET`ismodifiable`=0 WHERE form_id = '$fid'  ";
			               mysqli_query($con,$sql); // run query
	}

	if(isset($_POST['deleteheader'])){ 
		$tblid = $_POST['tblid'];


				$sql = " DELETE FROM `tablechoices` WHERE tble_id = '$tblid'  ";
		                $result = mysqli_query($con,$sql); // run query

		                 $deltcnt= "  DELETE FROM `tablecolumn_content` WHERE tble_id = '$tblid' ";
		              	mysqli_query($con,$deltcnt); // run query
		              	
		                
		
	}
	if(isset($_POST['updateheader'])){ 
		$id = $_POST['id'];
		$val = $_POST['val'];

				$sql = "UPDATE `tablechoices` SET `content`='$val' WHERE tble_id = '$id'   ";
		                $result = mysqli_query($con,$sql);
		                
		
	}
	if(isset($_POST['updatecontent'])){ 
		$id = $_POST['id'];
		$val = $_POST['val'];

				$sql = "UPDATE `tablecolumn_content` SET `content`='$val' WHERE tcontent_id = '$id'   ";
		                $result = mysqli_query($con,$sql);
		
	}
	if(isset($_POST['addcolumn'])){ 
		$fid = $_POST['fid'];

		 $tablecolumncontent = " INSERT INTO `tablecolumn_number`(`formid`,`type`) VALUES ('$fid','content')  ";
		$res = mysqli_query($con,$tablecolumncontent ); // run query

		$get_columnforcontent =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action

		

		if($res) {
				$selectheaders = "SELECT * FROM `tablechoices` WHERE form_id = '$fid' ";
		 $result = mysqli_query($con,$selectheaders); // run query
		  
			

			                $count= mysqli_num_rows($result); // to count if necessary
			              
			             if ($count>=1){
			             	   while($row = mysqli_fetch_array($result)){

							 $tableids = $row['tble_id'];
							$insertcontent = "INSERT INTO `tablecolumn_content`( `tble_id`, `tc_id`, `content`,`formid`) VALUES ('$tableids','$get_columnforcontent','Supporting Contents','$fid')";
							   			
							   		        
							   		  mysqli_query($con,$insertcontent); // run query             
							          
							       }

			          }else {
			          	echo '';
			          }
		 
		

		}
	
		
	}

	if(isset($_POST['delcolumn'])){ 
		$id = $_POST['id'];


		$deltc= " DELETE FROM `tablecolumn_number` WHERE tc_id='$id' ";
		              mysqli_query($con,$deltc); // run query


		                $deltcnt= "  DELETE FROM `tablecolumn_content` WHERE tc_id='$id' and typ=0  ";
		              	mysqli_query($con,$deltcnt); // run query
		
	}

	if(isset($_POST['changecoloraa'])){ 
		$color = $_POST['color'];
		$fid = $_POST['fid'];

		$sql = " SELECT * FROM `tablecolumn_number` where type ='header' and formid = '$fid' ";
		                $result = mysqli_query($con,$sql);
		             
		                 while($row = mysqli_fetch_array($result)){
							$id = $row['tc_id'];
							echo $id;
							$upt = "UPDATE `tablecolumn_number` SET `bg`='$color' WHERE tc_id = '$id' ";

							mysqli_query($con,$upt);
		                 }
		          

	}
	/*if(isset($_POST['modifiable'])){ 
		$yes = $_POST['yes'];
		$fid = $_POST['fid'];

		if($yes == 0 ){
			$sql = " UPDATE `form` SET`ismodifiable`=0 WHERE form_id = '$fid'  ";
			               mysqli_query($con,$sql); // run query
			               
		}else {
			$sql = " UPDATE `form` SET`ismodifiable`=1 WHERE form_id = '$fid'  ";
			               mysqli_query($con,$sql); // run query
		}
		
	}*/

	if(isset($_POST['deletelist'])){ 
		$fid = $_POST['fid'];


		                $deltcnt= "  DELETE FROM `tablecolumn_content` WHERE formid='$fid' and typ=1 ";
		              	mysqli_query($con,$deltcnt); // run query
		              	

		              	$upt = "UPDATE `form` SET `isset`=0 WHERE form_id = '$fid'";
						mysqli_query($con,$upt);

						$sql = " UPDATE `form` SET`ismodifiable`=0 WHERE form_id = '$fid'  ";
			               mysqli_query($con,$sql); // run query
		
	}
	if(isset($_POST['additemlist'])){ 
		$fid = $_POST['fid'];

		$insertcontent = "INSERT INTO `tablecolumn_content`( `content`,`formid`,`typ`) VALUES ('Untitle list','$fid',1)";
							   			
		 mysqli_query($con,$insertcontent); // run query   
		
	}

	if(isset($_POST['deleteclist'])){ 
		$id = $_POST['id'];

		  $deltcnt= "  DELETE FROM `tablecolumn_content` WHERE tcontent_id = '$id' ";
		              	mysqli_query($con,$deltcnt); // run query

		
	}
	if(isset($_POST['savelistupt'])){ 
		$id = $_POST['id'];
		$val = $_POST['val'];

				$sql = " UPDATE `tablecolumn_content` SET`content`='$val'  WHERE tcontent_id = '$id'   ";
		        mysqli_query($con,$sql); // run query
		               
		
	}
 ?>