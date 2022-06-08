<?php 
session_start();
include 'connect.php';
	if(isset($_POST['mpchoice'])){ 
		$formid = $_POST['formid'];


		$sql = " select * from choices where form_id = '$formid'   ";
			                $result = mysqli_query($con,$sql); // run query
			                $count= mysqli_num_rows($result); // to count if necessary
			               //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action

			             if ($count>=1){
			             	 while($row = mysqli_fetch_array($result)){
			                	$delchoice = $row['choice_id'];
			                  }
			                  	$sqldelc = "DELETE FROM `addchoice` WHERE choice_id = '$delchoice' ";
			                  	$resultdelc = mysqli_query($con,$sqldelc);
			             		$sqldel = "DELETE FROM `choices` WHERE form_id = '$formid' ";
				              if($resultss = mysqli_query($con,$sqldel) ) {

				              	 $sqlinserte = "INSERT INTO `choices`(`form_id`, `type`) VALUES ($formid,'mpchoice') ";
				              	$results = mysqli_query($con,$sqlinserte);
				                		

 											$get_id =  mysqli_insert_id($con);
 													$sqlc = " select * from addchoice where choice_id = '$get_id'  ";
 											                $resultc = mysqli_query($con,$sqlc); 
 											                $countchoice= mysqli_num_rows($resultc);
 											              
 											             if ($countchoice>=1){

 											          }else {
 											 $updatempchoice = " INSERT INTO `addchoice`(`choice_id`, `content`) VALUES ($get_id,'New Option')";
 											$uptres = mysqli_query($con,$updatempchoice);

 											          }

 										
				                 
				              }
				               
			          }else {
			          		$sqlinsert = "INSERT INTO `choices`(`form_id`, `type`) VALUES ($formid,'mpchoice') ";
				                $results = mysqli_query($con,$sqlinsert); // run query	
				                $get_id =  mysqli_insert_id($con);
 											$sqlc = " select * from addchoice where choice_id = '$get_id'  ";
 											                $resultc = mysqli_query($con,$sqlc); 
 											                $countchoice= mysqli_num_rows($resultc);
 											              
 											             if ($countchoice>=1){

 											          }else {
 											 $updatempchoice = " INSERT INTO `addchoice`(`choice_id`, `content`) VALUES ($get_id,'Option 1')";
 											$uptres = mysqli_query($con,$updatempchoice);

 											          }
			          }
		
	}

	if(isset($_POST['shorttext'])){ 
			$formid = $_POST['formid'];

					$sql = " select * from choices where form_id = '$formid'   ";
			                $result = mysqli_query($con,$sql); // run query
			                $count= mysqli_num_rows($result); // to count if necessary
			               //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
			             if ($count>=1){
			             	$sqldel = "DELETE FROM `choices` WHERE form_id = '$formid' ";
				                $resultss = mysqli_query($con,$sqldel); // run query	
				                $sqlinserte = "INSERT INTO `choices`(`form_id`, `type`) VALUES ($formid,'shorttext') ";
				                $resultse = mysqli_query($con,$sqlinserte); // run query	
			          }else {
			          		$sqlinsert = "INSERT INTO `choices`(`form_id`, `type`) VALUES ($formid,'shorttext') ";
				                $results = mysqli_query($con,$sqlinsert); // run query	
			          }


					


	
	}
	if(isset($_POST['longtext'])){ 
			$formid = $_POST['formid'];

			$sql = " select * from choices where form_id = '$formid' ";
			                $result = mysqli_query($con,$sql); // run query
			                $count= mysqli_num_rows($result); // to count if necessary
			               //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
			             if ($count>=1){
			             	$sqldel = "DELETE FROM `choices` WHERE form_id = '$formid' ";
				                $resultss = mysqli_query($con,$sqldel); // run query	
				                $sqlinserte = "INSERT INTO `choices`(`form_id`, `type`) VALUES ($formid,'longtext') ";
				                $resultse = mysqli_query($con,$sqlinserte); // run query	
			          }else {
			          		$sqlinsert = "INSERT INTO `choices`(`form_id`, `type`) VALUES ($formid,'longtext') ";
				                $results = mysqli_query($con,$sqlinsert); // run query	
			          }

		
	}

	if(isset($_POST['checkboxss'])){ 
		$formid = $_POST['formid'];
		$sql = " select * from choices where form_id = '$formid'   ";
			                $result = mysqli_query($con,$sql); // run query
			                $count= mysqli_num_rows($result); // to count if necessary
			               //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action

			             if ($count>=1){
			             	 while($row = mysqli_fetch_array($result)){
			                	$delchoice = $row['choice_id'];
			                  }
			                  	$sqldelc = "DELETE FROM `addchoice` WHERE choice_id = '$delchoice' ";
			                  	$resultdelc = mysqli_query($con,$sqldelc);
			             		$sqldel = "DELETE FROM `choices` WHERE form_id = '$formid' ";
				              if($resultss = mysqli_query($con,$sqldel) ) {

				              	 $sqlinserte = "INSERT INTO `choices`(`form_id`, `type`) VALUES ($formid,'checkbox') ";
				              	$results = mysqli_query($con,$sqlinserte);
				                		

 											$get_id =  mysqli_insert_id($con);
 													$sqlc = " select * from addchoice where choice_id = '$get_id'  ";
 											                $resultc = mysqli_query($con,$sqlc); 
 											                $countchoice= mysqli_num_rows($resultc);
 											              
 											             if ($countchoice>=1){

 											          }else {
 											 $updatempchoice = " INSERT INTO `addchoice`(`choice_id`, `content`) VALUES ($get_id,'New Option')";
 											$uptres = mysqli_query($con,$updatempchoice);

 											          }

 										
				                 
				              }
				               
			          }else {
			          		$sqlinsert = "INSERT INTO `choices`(`form_id`, `type`) VALUES ($formid,'checkbox') ";
				                $results = mysqli_query($con,$sqlinsert); // run query	
				                $get_id =  mysqli_insert_id($con);
 											$sqlc = " select * from addchoice where choice_id = '$get_id'  ";
 											                $resultc = mysqli_query($con,$sqlc); 
 											                $countchoice= mysqli_num_rows($resultc);
 											              
 											             if ($countchoice>=1){

 											          }else {
 											 $updatempchoice = " INSERT INTO `addchoice`(`choice_id`, `content`) VALUES ($get_id,'New Option')";
 											$uptres = mysqli_query($con,$updatempchoice);

 											          }
			          }
	}


	if(isset($_POST['email'])){ 
			
			$formid = $_POST['formid'];

					$sql = " select * from choices where form_id = '$formid'   ";
			                $result = mysqli_query($con,$sql); // run query
			                $count= mysqli_num_rows($result); // to count if necessary
			               //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
			             if ($count>=1){
			             	$sqldel = "DELETE FROM `choices` WHERE form_id = '$formid' ";
				                $resultss = mysqli_query($con,$sqldel); // run query	
				                $sqlinserte = "INSERT INTO `choices`(`form_id`, `type`) VALUES ($formid,'email') ";
				                $resultse = mysqli_query($con,$sqlinserte); // run query	
			          }else {
			          		$sqlinsert = "INSERT INTO `choices`(`form_id`, `type`) VALUES ($formid,'email') ";
				                $results = mysqli_query($con,$sqlinsert); // run query	
			          }


					


	
	}
	if(isset($_POST['numbers'])){ 
			
			$formid = $_POST['formid'];

					$sql = " select * from choices where form_id = '$formid'   ";
			                $result = mysqli_query($con,$sql); // run query
			                $count= mysqli_num_rows($result); // to count if necessary
			               //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
			             if ($count>=1){
			             	$sqldel = "DELETE FROM `choices` WHERE form_id = '$formid' ";
				                $resultss = mysqli_query($con,$sqldel); // run query	
				                $sqlinserte = "INSERT INTO `choices`(`form_id`, `type`) VALUES ($formid,'numbers') ";
				                $resultse = mysqli_query($con,$sqlinserte); // run query	
			          }else {
			          		$sqlinsert = "INSERT INTO `choices`(`form_id`, `type`) VALUES ($formid,'numbers') ";
				                $results = mysqli_query($con,$sqlinsert); // run query	
			          }


					


	
	}

		if(isset($_POST['dates'])){ 
			
			$formid = $_POST['formid'];

					$sql = " select * from choices where form_id = '$formid'   ";
			                $result = mysqli_query($con,$sql); // run query
			                $count= mysqli_num_rows($result); // to count if necessary
			               //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
			             if ($count>=1){
			             	$sqldel = "DELETE FROM `choices` WHERE form_id = '$formid' ";
				                $resultss = mysqli_query($con,$sqldel); // run query	
				                $sqlinserte = "INSERT INTO `choices`(`form_id`, `type`) VALUES ($formid,'dates') ";
				                $resultse = mysqli_query($con,$sqlinserte); // run query	
			          }else {
			          		$sqlinsert = "INSERT INTO `choices`(`form_id`, `type`) VALUES ($formid,'dates') ";
				                $results = mysqli_query($con,$sqlinsert); // run query	
			          }


					


	
	}


	


	if(isset($_POST['setselect'])){ 
		$formid = $_POST['formid'];
		$csform = $_SESSION['form_id'];
		
		if(isset($_POST['types'])){

				$type = $_POST['types'];
				if($type == 'file'){

								include 'addupt.php';
				

				}else if($type == 'question'){
								include 'addupt.php';
				}else if($type == 'list'){
								include 'addupt.php';
				}


		}

	$checksec = " select * from form where form_id = '$formid'  ";
		                $resultcs = mysqli_query($con,$checksec); 
		                $countcs= mysqli_num_rows($resultcs); 
		            
		                 while($row = mysqli_fetch_array($resultcs)){
							$dorder =  $row['display_order'];
							$secno = $row['sec_no'];
							$section = $row['section'];

							$_SESSION['dorder'] = $dorder;
							$_SESSION['sectionset'] = $secno;
							//$_SESSION['section'] = $section;
							
							//echo $dorder;

						


		                 }
		          
				
			$sqlse = " select * from form where status ='selected' and class_name = '$csform'  ";
			                $results = mysqli_query($con,$sqlse); // run query
			                 $count= mysqli_num_rows($results); 
			               while($row = mysqli_fetch_array($results)){
			              		$selectedid = $row['form_id'];
			                    }
			                     
			             if ($count ==1){
			             $sqlu = " UPDATE `form` SET `status`=Null WHERE form_id='$selectedid' and class_name = '$csform'  ";
		                $results = mysqli_query($con,$sqlu); // run query
		                 $sql = " UPDATE `form` SET `status`='selected' WHERE form_id='$formid' and class_name = '$csform'  ";
		                $result = mysqli_query($con,$sql); // run query	
			         	 }else {
			         	 $sql = " UPDATE `form` SET `status`='selected' WHERE form_id='$formid' and class_name = '$csform'  ";
		                $result = mysqli_query($con,$sql); // run query	
			         	 }

			         	
		
			
	}

	if(isset($_POST['saveopt'])){ 
		$chid = $_POST['chid'];
		$inpvalue = $_POST['inpvalue'];

				$sql = " UPDATE `addchoice` set `content` = '$inpvalue' where chid = '$chid'  ";
		                $result = mysqli_query($con,$sql); // run query
		               
		          


	}
	if(isset($_POST['newopt'])){ 
		$chid = $_POST['chid'];

					$sql = "INSERT INTO `addchoice`(`choice_id`, `content`) VALUES ($chid,'New Option')  ";
			                $result = mysqli_query($con,$sql); // run query
			               
	}
	if(isset($_POST['newoptcheck'])){ 
		$chid = $_POST['chid'];
		

				$sql = "INSERT INTO `addchoice`(`choice_id`, `content`) VALUES ($chid,'New Option')  ";
			                $result = mysqli_query($con,$sql); // run query 



			               
	}

		if(isset($_POST['newoptcheckspecify'])){ 
		$chid = $_POST['chid'];
		
		$formid = $_POST['formid'];

		$update = "UPDATE `form` SET `isspecified`=1  WHERE form_id= '$formid' ";
		mysqli_query($con,$update);

		

		//echo $formid;
				
			                
			               
	}

	if(isset($_POST['removeothers'])){ 
		$formid = $_POST['formid'];

		$update = "UPDATE `form` SET `isspecified`=0  WHERE form_id= '$formid' ";
		mysqli_query($con,$update);

		
	}
	if(isset($_POST['delchoice'])){ 
		$chid = $_POST['chid'];
				$sql = "DELETE FROM `addchoice` WHERE chid = '$chid' ";
			                $result = mysqli_query($con,$sql); // run query	
		
	}
	if(isset($_POST['checktitles'])){ 
		$csform = $_SESSION['form_id'];
					$sql = " select * from form where type = 'section' and class_name = '$csform' ";
			                $result = mysqli_query($con,$sql); 
			                $count= mysqli_num_rows($result); 
			             
			             if ($count>=1){
			             	echo "yes";
			               
			         		 }else {
			          	echo "no";
			         	 }
		
	}	
	if(isset($_POST['delun'])){ 
		 $delete_unexpected = " Select * from choices AS T1 where not exists( select * from form AS T2 where T1.form_id = T2.form_id)  ";
		                $resultdel = mysqli_query($con,$delete_unexpected); 
		                $countdel= mysqli_num_rows($resultdel); 
		              
		             if ($countdel>=1){
		             	
		                 while($row = mysqli_fetch_array($resultdel)){
								$ids = $row['form_id'];
								$del = "DELETE FROM `choices` WHERE form_id = '$ids' ";
								$deleted = mysqli_query($con,$del);

		                 }
		          }

				$sql = " Select * from addchoice AS T1 where not exists( select * from choices AS T2 where T1.choice_id = T2.choice_id)  ";
		                $result = mysqli_query($con,$sql); 
		                $count= mysqli_num_rows($result); 
		              
		             if ($count>=1){
		             	
		                 while($row = mysqli_fetch_array($result)){
								$ids = $row['choice_id'];
								$del = "DELETE FROM `addchoice` WHERE choice_id = '$ids' ";
								$deleted = mysqli_query($con,$del);

		                 }
		          }
		
	}

	if(isset($_POST['titleform'])){ 
		$csform = $_SESSION['form_id'];
				$sql = " select * from form_classification where csform_id = '$csform'  ";
		                $result = mysqli_query($con,$sql);
		              
		            
		                 while($row = mysqli_fetch_array($result)){
							echo $row['form_name'];
							$staticform = $row['static'];
							if($staticform == 0){
								?>
							<a href="javascript:void()" style="margin-left: 10px;font-size: 17px;color:#4a719c" class="formtitleedit" data-csfid=<?php echo $row["csform_id"] ?>><i class="far fa-edit"></i></a>
							<?php
							}else {
								
							}
							
		                 }
		          
		
	}

	if(isset($_POST['editform'])){ 
		$csform = $_SESSION['form_id'];
				$sql = " select * from form_classification where csform_id = '$csform'  ";
		                $result = mysqli_query($con,$sql);
		              
		            
		                 while($row = mysqli_fetch_array($result)){
							
							?>
		<input type="text" name="" id="edittext" value="<?php echo $row['form_name']; ?>" style="font-weight: bolder;font-size: 25px; border: none; outline: none;background-color: rgb(216, 213, 221); border-bottom: 1px solid #c3a86b;text-align: center; ">
		 <i  class="fas fa-times canceledit" style="cursor: pointer;color: #4a719c;font-size: 17px"></i> 

		<?php
		                 }
		          
		
	}
	if(isset($_POST['changetitle'])){ 
		$title = $_POST['title'];
		$csform = $_SESSION['form_id'];
						$sql = " UPDATE  `form_classification`  set `form_name`='$title' where csform_id = '$csform'  ";
		                $result = mysqli_query($con,$sql);
	}



	if(isset($_POST['edititles'])){ 
		$val = $_POST['val'];
		$id = $_POST['id'];

				$sql = " UPDATE `form` SET `content`='$val' WHERE form_id = '$id' ";
		                $result = mysqli_query($con,$sql); // run query
		               
		
	}
	if(isset($_POST['setlm'])){ 
		include '../Classes/sql_query.php';
			 $setuser = new sqlquery();
			 $setuser -> recentact();
		
	}
	if(isset($_POST['savecustom'])){ 
		$body = $_POST['body'];
		$title = $_POST['title'];
		$question = $_POST['question'];
		$bodytext = $_POST['bodytext'];
		$titletext = $_POST['titletext'];
		$questiontext = $_POST['questiontext'];
		$csform = $_SESSION['form_id'];
					$sql = "UPDATE `form_classification` SET `bodybg`='$body',`titlebg`='$title',`questionbg`='$question',`textcolortitle`='$titletext',`textcolorquestion`='$questiontext' , `bodytext` = '$bodytext' WHERE csform_id= '$csform' ";
		                $result = mysqli_query($con,$sql);


	}

	if(isset($_POST['isrequiredtrue'])){ 
		$id = $_POST['id'];
					$sql = " UPDATE `form` SET `isrequired`='yes' WHERE form_id = '$id' ";
			                $result = mysqli_query($con,$sql); // run query
			              
			          
	}
	if(isset($_POST['isrequiredfalse'])){ 
		$id = $_POST['id'];
				$sql = " UPDATE `form` SET `isrequired`='no' WHERE form_id = '$id' ";
			                $result = mysqli_query($con,$sql); // run query
			              
		
	}

if(isset($_POST['donemodified'])){
$csform = $_SESSION['form_id'];	
					          

		 $strict = " UPDATE `form_classification` SET `status`='0' WHERE csform_id= '$csform'  ";
                   mysqli_query($con,$strict);  
	
}
	

 ?>
 <script type="text/javascript">
 	
 		$('.formtitleedit').click(function() { 
				$.ajax({
			           url : "opt_pro.php",
			            method: "POST",
			             data  : {editform:1},

			             success : function(data){
							
						$('#titleform').html(data);	
						$('#edittext').focus();
						$('#edittext').select();
			             }
			          })
		})   
		$('.canceledit').click(function() { 
		   titleform();
		   })   

		function titleform() {
			$.ajax({
			           url : "opt_pro.php",
			            method: "POST",
			             data  : {titleform:1},
			             success : function(data){
						 $('.innerBar').animate({ width: "100%" }, 500);
						$('#titleform').html(data);	
			             }
			          })

		}
       	
       	$('#edittext').keyup(function(){ 
       				var newtitle = $(this).val();
       			$.ajax({
			           url : "opt_pro.php",
			            method: "POST",
			             data  : {changetitle:1,title:newtitle},
			              beforeSend: function(  ) {
			              var loadsave=	setInterval(function(){
			               $('.innerBar').animate({ width: "80%" }, 500);
			              	clearInterval(loadsave);
			              	},2000);
			              var hide = setInterval(function(){
			              	 $('.innerBar').animate({ width: "100%" }, 500);
			              },3000);
 						
 								 },
	
  	             success : function(data){
							
						
			             }
			          })
       	})
 </script>


	