<?php 
session_start();
include '../../create_form/connect.php';



if(isset($_POST['getcollegetablecontent'])){ 
		
		$sql = " SELECT * FROM `colleges`  ";
	                $result = mysqli_query($con,$sql); // run query
	                $count= mysqli_num_rows($result); // to count if necessary
	               //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
	             if ($count>=1){
	             	//while($row = mysqli_fetch_array($result)){} is where we output all the data in database
	                 while($row = mysqli_fetch_array($result)){
	                 	$cid = $row['CollegeId'];
	                 	$college = $row['college'];

			?>
								<tr id="trow<?php echo $row['CollegeId'] ?>" >
                                    <td scope="row" id="togglecollapse<?php echo $row['CollegeId'] ?>" >

                                	
                                    	<span style="font-size: 15px;font-weight: bolder" class="text-success" id="txt<?php echo $row['CollegeId'] ?>"><?php echo $row['college'] ?></span>  <br>
                                    	 <button class="btn btn-light text-primary editcollege" data-color="<?php echo $row['bgcolor'] ?>" data-colid="<?php echo $row['CollegeId']  ?>" data-colname="<?php echo $row['college'] ?>" data-toggle="modal" data-target="#editcollege" data-backdrop="static" data-keyboard="false" style="font-size: 12px"> <i class="fas fa-edit"></i></button>
                                    	<!--<i class="far fa-minus-square"></i>-->

                                    	<div class="card shadow-sm">
                                    		<div class="card-body">
                                    				    <div class="row">
								    	 <div class="container">
								    	 	<h6 style="font-size: 12px">Coordinator :   
								    	 		<span>
								    	 			<?php 
								    	 					$coordinator= " select * from administrator where admin_type='GC' and CollegeId= '$cid' and edstat =0  ";
								    	 			                $resultcc = mysqli_query($con,$coordinator); // run query
								    	 			                $countcc= mysqli_num_rows($resultcc); // to count if necessary
								    	 			               //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
								    	 			             if ($countcc>=1){
								    	 			             	//while($row = mysqli_fetch_array($result)){} is where we output all the data in database
								    	 			                 while($rowc = mysqli_fetch_array($resultcc)){
								    	 			                 	$college = $rowc['CollegeId'];
								    	 			                 	  $sqls = " select * from colleges where CollegeId='$college'  ";
                                      $results = mysqli_query($con,$sqls); // run query
                                      
                                       while($rows = mysqli_fetch_array($results)){
                                        $co = $rows['college'];
                                       }

								    	 							?>
								    	 							<span class="text-info" style="font-size:14px;font-style: italic;font-weight: bold;text-transform: uppercase; "><?php echo $rowc['admin_lname'].' '.$rowc['admin_fname']?></span>
								    	 							<br> <span style="font-size:12px">
								    	 								Contact No : <?php echo $rowc['admin_contactno'] ?><br>
								    	 								Email : <?php echo $rowc['admin_email'] ?>
								    	 								
								    	 							</span>

								    	 					

								    	 							  <button style="font-size: 12px;float: right;" class="btn btn-light text-primary replace" data-co="<?php echo $co  ?>"  data-toggle="modal" data-target="#replaceadmingc" data-backdrop="static" data-name="<?php echo $rowc['admin_lname'].' '.$rowc['admin_fname']  ?>" data-keyboard="false" data-email="<?php echo $rowc['admin_email'] ?>" data-contactno="<?php echo $rowc['admin_contactno'] ?>" data-id="<?php echo $rowc['admin_id'] ?>" data-collegeid = "<?php echo $rowc['CollegeId'] ?>" >
									                Replace
									              </button>

								    	 							<?php
								    	 			                 }
								    	 			          }else {

								    	 			          ?>
								    	 			          <span class="text-danger">Theres is no coordinator yet..</span>

								    	 			          <button type="button" class="btn btn-light text-primary addcoordinator"  style="font-size:12px;float: right;" data-toggle="modal" data-target="#addadmingc" data-backdrop="static" data-keyboard="false" data-college ="<?php echo $college ?>" data-collegeid="<?php echo $cid ?>"> <i class="fas fa-plus-circle " > </i>Add Coordinator</button>




								    	 			          <?php
								    	 			          }

								    	 			 ?>
								    	 		</span>

								    	 	</h6>
								    	 </div> 
								    	 
								    </div> 
                                    		</div>
                                    	</div>
                                    </td>
                                    <td>
                                      <?php  echo date('F j, Y',strtotime($row['datecreated'])) ?>
                                      <br>

                                    </td>
                                    
                                  		<td colspan="4">
                                  <div class="collapse show" id="collapseExample<?php echo $row['CollegeId']  ?>">
								  <div class="card card-body">
								   <div class="row">
					 <div class="col-md-12"><button class="btn btn-light text-primary addcourse" data-colname="<?php echo $row['college'] ?>" data-colid="<?php echo $row['CollegeId']  ?>" style="font-size: 12px" data-toggle="modal" data-target="#addnewcourse" data-backdrop="static" data-keyboard="false">Add <i class="fas fa-plus-circle"></i></button></div> 
								   	 <br>
								   	 	<table class="table table-striped table-sm">
										  <thead>
										    <tr>
										      <th scope="col">Course</th>
										      <th scope="col">date-created</th>
										      <th scope="col">Action</th>
										     
										    </tr>
										  </thead>
										  <tbody style="font-size: 12px">
										  	<?php 
										  			$courses = " select * from course where CollegeId = '$cid'  ";
										  	                $resultcourse = mysqli_query($con,$courses); // run query
										  	                $countc= mysqli_num_rows($resultcourse); // to count if necessary
										  	               //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
										  	             if ($countc>=1){
										  	             	//while($row = mysqli_fetch_array($result)){} is where we output all the data in database
										  	                 while($rows = mysqli_fetch_array($resultcourse)){
										  	                 	$ccid = $rows['CollegeId'];
										  						?>
										  						<tr>
                                    <td scope="row">
                                 <span id="editse<?php echo $rows['courseid'] ?>"><?php echo $rows['course'] ?></span>
                                 <input type="text" name="" data-id="<?php echo $rows['courseid'] ?>" id="toedit<?php echo $rows['courseid'] ?>" class="d-none form-control toedit" value="<?php echo $rows['course'] ?>" style="text-transform: uppercase;">




                                    </td>
                                    <td>
                                      <?php echo date('F j, Y',strtotime($rows['datecreated'])) ?>
                                    </td>
                                    <td>
                                      <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" class="btn btn-light text-info edit" id="btnedit<?php echo $rows['courseid'] ?>" data-id="<?php echo $rows['courseid'] ?>" data-cid = "<?php echo $ccid ?>" style="font-size: 13px">Edit</button>

                                         <button type="button" class="btn btn-light text-success save d-none" id="btnsave<?php echo $rows['courseid'] ?>" data-id="<?php echo $rows['courseid'] ?>" data-cid = "<?php echo $ccid ?>" style="font-size: 13px" >Save Changes</button>
                                         
                                         <button type="button" class="btn btn-light text-info cancel d-none" id="btncancel<?php echo $rows['courseid'] ?>" data-id="<?php echo $rows['courseid'] ?>" data-cid = "<?php echo $ccid ?>" style="font-size: 13px">Cancel</button>


                                        <button type="button" class="btn btn-light text-danger delete" data-course="<?php echo $rows['course'] ?>" data-deleteid="<?php echo $rows['courseid'] ?>" style="font-size: 14px">Delete</button>
                                        
                                      </div>
                                    </td>
                                  
                                  </tr>
										  						<?php
										  	                 }
										  	          }else {

										  	          	?>
										  	          	<tr>
										  	          		<td colspan="3" style="font-size: 14px;font-weight: bolder;text-align: center;">
										  	          			<span >Theres no Course yet..</span>
										  	          		</td>
										  	          	</tr>
										  	          	<?php

										  	          }


										  	         



										  	 ?>
										    
										   
										  </tbody>
										</table>

								   </div> 

								    
								  </div>
								</div>
                                  	</td>
                              
                                  </tr>
                              
                               
                                	
                               		

	<?php
	
	                 }
	          }


	          ?>

	        <script src="../../offline/sweetalert.js"></script>
    	  <script src="../../js/jquery.js"></script>

	          <script type="text/javascript">
	          	
	          	$(document).ready(function() {

	          		  $('.replace').click(function(){
                  var college = $(this).data('co');  
                  var contactno= $(this).data('contactno');
                  var email = $(this).data('email');
                  var name = $(this).data('name');  
                  var id = $(this).data('id');
                  var collid = $(this).data('collegeid');
                 
                  $('.college_').text(college);
                  $('#name_').text(name);
                  $('#email_').text(email);
                  $('#contact_').text(contactno);
                  $('#id_rp').val(id);
                  $('#collid').val(college)
                  $('#collid_').val(collid);
             })


	          		$('.addcoordinator').click(function(){
	          			var college = $(this).data('college');
	          			var collegeid = $(this).data('collegeid');
	          			
	          				$('#college_name').text(college);
	          				$('#cids').val(collegeid);
	          		})


	          		    $('#addnewadmingc').on('submit', function(event){
                           event.preventDefault();

                          

                          
                         
                            var xhttp = new XMLHttpRequest();
                            xhttp.onreadystatechange = function() {
                             if (this.readyState == 4 && this.status == 200) {
                            const data = this.responseText;



                            if(data == "existing"){
                            	  Swal.fire(
                        			'Coordinator already assigned!',
                            'Unable to add!, Provide another Email!',
                           'error'
                      			 )

                            	  $('#adgcvalem').addClass('is-invalid');
                            }else {

                            		  $('#closemodaladdgc').click();
                         	 

                          
                           Swal.fire(
                        'New Coordinator Saved!',
                            'A new Guidance Coordinator has been added successfully!',
                           'success'
                       ).then((result) => {
                        if (result.isConfirmed) {
                     
                        
                        	 location.reload();


                           } })



                                 var xhttp = new XMLHttpRequest();
                                     xhttp.onreadystatechange = function() {
                                      if (this.readyState == 4 && this.status == 200) {
                                     const datas = this.responseText;
                                   
                                       //  // SENDING CREDENTIALS
                                   
                                                  }
                                               };
                                       xhttp.open("POST", "../../mailer/send_credentials.php",true);
                                       xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                                       xhttp.send("sendcredentials=1&email="+data);  

                            }
                   	
                         
                          
                                         }
                                      };
                              xhttp.open("POST",$(this).attr('action'),true);
                              xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                              xhttp.send($(this).serialize());
                                  
                                	          

                           });
        	

	          		$('.editcollege').click(function() { 
	          			var cid = $(this).data('colid');
	          				var colname = $(this).data('colname');
	          				var color = $(this).data('color');

	          				if(color==''){
	          					$('#uptcolor').val('#addfb1');
	          				}else {
	          					$('#uptcolor').val(color);
	          				}

	          				
	          				$('#uptcollege').val(colname);
	          				$('#uptcollegeid').val(cid);
	          				$('#btndeletec').val(cid);
	          		
	          		})

	          			$('.addcourse').click(function() { 
	          				var cid = $(this).data('colid');
	          				var colname = $(this).data('colname');
	          				
	          				$('#cid').val(cid);
	          				$('#collegename').text(colname);
	          			})

	          			$('.toedit').keyup(function(){ 
	          				var val = $(this).val();
	          				var id = $(this).data('id');
	          				if(val == ''){
	          						$('#btnsave'+id).addClass('d-none');
	          				}else {
	          						 $.ajax({
	          				           url : "action.php",
	          				            method: "POST",
	          				             data  : {checkexist:1,val:val,id:id},
	          				             success : function(data){
	          					if(data=="1"){
	          						$('#btnsave'+id).addClass('d-none');
	          					
	          					}else {
	          					$('#btnsave'+id).removeClass('d-none');
	          					}
	          				             }
	          				          })
	          				}
	          				
	          			
	          			})
	          	
	          		$('.edit').click(function() { 
	          			var id = $(this).data('id');

	          			$('#editse'+id).addClass('d-none');
	          			$('#toedit'+id).removeClass('d-none');
	          			$('#toedit'+id).focus();
	          			$('#toedit'+id).select();
	          			$('#btnedit'+id).html('Cancel');

	          			
	          			$('#btnedit'+id).addClass('d-none');
	          			$('#btncancel'+id).removeClass('d-none');

	          			
	          				$('.edit').addClass('d-none');

	          				
	          				$('.delete').addClass('d-none');
	          		
	          		})
	          		$('.cancel').click(function() { 
	          			var id = $(this).data('id');
	          			var cid = $(this).data('cid');

	          			$('#editse'+id).removeClass('d-none');
	          			$('#toedit'+id).addClass('d-none');
	          			
	          			$('#btnedit'+id).html('Edit');
	          			
	          			$('#btnedit'+id).removeClass('d-none');
	          			$('#btncancel'+id).addClass('d-none');
	          				$('.edit').removeClass('d-none');
	          				$('#btnsave'+id).addClass('d-none');
	          				
	          				$('.delete').removeClass('d-none');
	          			 collegetablecontent();
	          			$('#collapseExample'+cid).collapse('show');
	          		})

	          		$('.save').click(function() { 
	          			var cid = $(this).data('cid');

	          			var id = $(this).data('id');
	          			$('#editse'+id).removeClass('d-none');
	          			$('#toedit'+id).addClass('d-none');
	          		
	          			$('#btnedit'+id).html('Edit');
	          		
	          			$('#btnedit'+id).removeClass('d-none');
	          			$('#btncancel'+id).addClass('d-none');
	          				$('.edit').removeClass('d-none');

	          				
	          				$('.delete').removeClass('d-none');
	          				var val = $('#toedit'+id).val();
	          				  $.ajax({
	          				           url : "action.php",
	          				            method: "POST",
	          				             data  : {saveedit:1,val:val,id:id},
	          				             success : function(data){
	          				
	          				             }
	          				          })

	          				Swal.fire(
									  'Changes Saved!',
									  'Update saved successfully!',
									  'success'
									)
	          				 collegetablecontent();
	          			


	          		})
	          		

	          	      	$('.delete').click(function() { 
	          	      		var id = $(this).data('deleteid');
	          	      		var course = $(this).data('course');
	          	      		Swal.fire({
									  title: 'Are you sure?',
									  text: "You won't be able to revert this!",
									  icon: 'warning',
									  showCancelButton: true,
									  confirmButtonColor: '#3085d6',
									  cancelButtonColor: '#d33',
									  confirmButtonText: 'Yes, delete it!'
									}).then((result) => {
									  if (result.isConfirmed) {
									  	 $.ajax({
	          	      			           url : "action.php",
	          	      			            method: "POST",
	          	      			             data  : {delete:1,id:id,course:course},
	          	      			             success : function(data){
	          	      				 Swal.fire(
									      'Deleted!',
									      'Course has been deleted.',
									      'success'
									    )
	          	      				 collegetablecontent();
	          	      			             }
	          	      			          })
									   
									  }
									})
										          	      			
	          	      			  
	          	      			    
	          	      			    
	          	      	
	          	      	})

	          	      	function collegetablecontent(){
                           $.ajax({
                                     url : "action.php",
                                      method: "POST",
                                       data  : {getcollegetablecontent:1},
                                       success : function(data){
                          $('#tablecontent').html(data);
                                       }
                                    })

                             

                             }    


                       /*     function tablecontent(cid){
                            
                             $.ajax({
                                     url : "action.php",
                                      method: "POST",
                                       data  : {getcoursetablecontent:1,cid:cid},
                                       success : function(data){
                          $('#coursetable').html(data);
                                       }
                                    })  

                         }
                              

	          	      	 function tablecontent(){
                            
                             $.ajax({
                                     url : "action.php",
                                      method: "POST",
                                       data  : {gettablecontent:1},
                                       success : function(data){
                          $('#tablecontent').html(data);
                                       }
                                    })
                              
                              
                        } */
	          	      });      
	                	
	          </script>
	          <?php
}


if(isset($_POST['savenew'])){ 
	$newcourse = $_POST['newcourse'];
	$collegeId = $_POST['collegeId'];
	 $val = strtoupper ( $newcourse );
	 date_default_timezone_set('Asia/Manila');
	 $datenow= date('Y-m-d H:i:s');


				$sql = " INSERT INTO `course`(`course`, `datecreated`,`CollegeId`) VALUES ('$val','$datenow','$collegeId')  ";
		                $result = mysqli_query($con,$sql); // run query


		                date_default_timezone_set('Asia/Manila'); 
                    $date_m = date('Y-m-d H:i:s');
                     $token =  $_SESSION['admingcc_token'];
                      $sem = $_SESSION['sem'];
                    $save_to_logs = "INSERT INTO `logs`(`stud_id`, `admin_id`, `admin_type`, `content`, `datemodified`,`manage_fields`,`semester`) 
                    VALUES (0,'$token','GCC','Saved new course :  $newcourse','$date_m','Add','$sem')";
                    mysqli_query($con,$save_to_logs); 

		               
	
}

if(isset($_POST['savenewcollege'])){ 
	$newcollege = $_POST['newcollege'];
	$collegecolor = $_POST['collegecolor'];
	//$collegeId = $_POST['collegeId'];
	// $val = strtoupper ( $newcourse );
	 date_default_timezone_set('Asia/Manila');
	 $datenow= date('Y-m-d H:i:s');


				$sql = " INSERT INTO `colleges`(`college`, `datecreated`,`bgcolor`) VALUES ('$newcollege','$datenow','$collegecolor')  ";
		                $result = mysqli_query($con,$sql); // run query


		                 date_default_timezone_set('Asia/Manila'); 
                    $date_m = date('Y-m-d H:i:s');
                     $token =  $_SESSION['admingcc_token'];
                      $sem = $_SESSION['sem'];
                    $save_to_logs = "INSERT INTO `logs`(`stud_id`, `admin_id`, `admin_type`, `content`, `datemodified`,`manage_fields`,`semester`) 
                    VALUES (0,'$token','GCC','Saved new College :  $newcollege','$date_m','Add','$sem')";
                    mysqli_query($con,$save_to_logs); 

		               
		               
	
}
if(isset($_POST['delete'])){
$id = $_POST['id']; 
$course = $_POST['course'];

$sql = " DELETE FROM `course` WHERE courseid = '$id'  ";
		               $result = mysqli_query($con,$sql); // run query




		                 date_default_timezone_set('Asia/Manila'); 
                    $date_m = date('Y-m-d H:i:s');
                     $token =  $_SESSION['admingcc_token'];
                      $sem = $_SESSION['sem'];
                    $save_to_logs = "INSERT INTO `logs`(`stud_id`, `admin_id`, `admin_type`, `content`, `datemodified`,`manage_fields`,`semester`) 
                    VALUES (0,'$token','GCC','Deleted Course : $course ','$date_m','Delete','$sem')";
                    mysqli_query($con,$save_to_logs);
	
}

if(isset($_POST['saveedit'])){ 
	$val =strtoupper ( $_POST['val'] );
	$id = $_POST['id'];

				$sql = "UPDATE `course` SET `course`='$val'  WHERE courseid = '$id' ";
		                $result = mysqli_query($con,$sql); // run query


		                  date_default_timezone_set('Asia/Manila'); 
 			$token =  $_SESSION['admingcc_token'];
                    $date_m = date('Y-m-d H:i:s');
                     $sem = $_SESSION['sem'];
                    $save_to_logs = "INSERT INTO `logs`(`stud_id`, `admin_id`, `admin_type`, `content`, `datemodified`,`manage_fields`,`semester`) 
                    VALUES (0,'$token','GCC','Updated Course : $val','$date_m','Manage','$sem')";
                    mysqli_query($con,$save_to_logs); 
		              
	
}

if(isset($_POST['checkexist'])){ 
	$val =strtoupper ( $_POST['val'] );
	
	

				$sql = " select * from `course` where course= '$val'  ";
	                $result = mysqli_query($con,$sql); 
	                $count= mysqli_num_rows($result);
	             
	             if ($count>=1){
	             echo "1";


	          }else {
	          	echo "0";
	          }
	
}


if(isset($_POST['checkexistcollege'])){ 
	$val = $_POST['val'];
	
	

				$sql = " select * from `colleges` where college= '$val'  ";
	                $result = mysqli_query($con,$sql); 
	                $count= mysqli_num_rows($result);
	             
	             if ($count>=1){
	             echo "1";


	          }else {
	          	echo "0";
	          }
	
}

if(isset($_POST['updatecollege'])){ 
	$uptcollege = $_POST['uptcollege'];
	$uptcollegeid = $_POST['uptcollegeid'];
	$uptcolor = $_POST['uptcolor'];

				$sql = " UPDATE `colleges` SET `college`='$uptcollege',`bgcolor` = '$uptcolor' WHERE CollegeId = '$uptcollegeid' ";
		                $result = mysqli_query($con,$sql); // run query

		                  date_default_timezone_set('Asia/Manila'); 
 										$token =  $_SESSION['admingcc_token'];
                    $date_m = date('Y-m-d H:i:s');
                     $sem = $_SESSION['sem'];
                    $save_to_logs = "INSERT INTO `logs`(`stud_id`, `admin_id`, `admin_type`, `content`, `datemodified`,`manage_fields`,`semester`) 
                    VALUES (0,'$token','GCC','Update College : $uptcollege','$date_m','Manage','$sem')";
                    mysqli_query($con,$save_to_logs); 
		             
}

if(isset($_POST['changecolor'])){
	$val = $_POST['val'];
	$cid = $_POST['cid'];

		$sql = " UPDATE `colleges` SET `bgcolor` = '$val' WHERE CollegeId = '$cid' ";
		                $result = mysqli_query($con,$sql); // run query


		                   date_default_timezone_set('Asia/Manila'); 
 										$token =  $_SESSION['admingcc_token'];
                    $date_m = date('Y-m-d H:i:s');
                     $sem = $_SESSION['sem'];
                    $save_to_logs = "INSERT INTO `logs`(`stud_id`, `admin_id`, `admin_type`, `content`, `datemodified`,`manage_fields`,`semester`) 
                    VALUES (0,'$token','GCC','Update College Color theme : $val','$date_m','Manage','$sem')";
                    mysqli_query($con,$save_to_logs); 
	
}

if(isset($_POST['deletecollegeanditscourses'])){ 
	$id = $_POST['id'];

		
	              	

	              	  date_default_timezone_set('Asia/Manila'); 
                    $date_m = date('Y-m-d H:i:s');
                     $token =  $_SESSION['admingcc_token'];

	              	 	$getcollege_name = "select * from colleges where CollegeId = '$id'  ";
	              	 	 $gettingcollegename = mysqli_query($con,$getcollege_name); 
	              	 
	              	  while($row = mysqli_fetch_array($gettingcollegename)){
	              	 				$collegename = $row['college'];		
	              	 	 }

	              	 	 	$getall_courses = "select * from course where CollegeId = '$id'  ";
	              	 	 	 $gettingallcourses = mysqli_query($con,$getall_courses); 
	              	 	 
	              	 
	              	 	  while($row = mysqli_fetch_array($gettingallcourses)){
	              	 	 						$allcourses[] = $row['course'];
	              	 	 	 }

	              	 	 	  $sem = $_SESSION['sem'];
	              	  $save_to_logs = "INSERT INTO `logs`(`stud_id`, `admin_id`, `admin_type`, `content`, `datemodified`,`manage_fields`,`semester`) 
                    VALUES (0,'$token','GCC','Deleted College : $collegename    ','$date_m','Delete','$sem')";
                    

	              	 	 	
	              	 	 	if(mysqli_query($con,$save_to_logs)){
	              	 	 		$newlyinsertedid = mysqli_insert_id($con);

	              	 	 		

	              	 	 		if(isset($allcourses)){

	              	 	 				 		 foreach ($allcourses as $key => $value) {
	              	 	 	 			$val = $value.',';

	              	 	 	 			
	              	 	 


	              	 	 			$checkfirst = "select * from logs where logs_id = '$newlyinsertedid' ";
 									 	$res =mysqli_query($con,$checkfirst);
 									 	$countres= mysqli_num_rows($res);
 									 	if($countres >=1){
 									 		 while($row = mysqli_fetch_array($res)){
	 									 			$recordedval = $row['courses'];
	 									 			
	 									 		$newval = $recordedval.$val;

	 									 			 $upt = "UPDATE `logs` SET `courses`='$newval' WHERE logs_id ='$newlyinsertedid' ";
	              	 	 		mysqli_query($con,$upt);

 									 		


 									 		   }
 									 	}


	              	 	 	 }

	              	 	 		}




	              	 
	              	 	 	 	

	              	 	 	 	$get_coordinator = "select * from administrator where CollegeId ='$id'  ";
	              	 	 	 	 $gettingcoordinator = mysqli_query($con,$get_coordinator); 
	              	 	 	
	              	 	 	  while($row = mysqli_fetch_array($gettingcoordinator)){
	              	 	 	 						$coordinator[] = $row['admin_lname'].' '.$row['admin_fname'];
	              	 	 	 	 }

	              	 	 	 	 if(isset($coordinator)){

	              	 	 	 	 		 	foreach ($coordinator as $key => $value) {
	              	 	 	 	 		$val = $value.',';

	              	 	$checkfirst = "select * from logs where logs_id = '$newlyinsertedid' ";
 									 	$res =mysqli_query($con,$checkfirst);
 									 	$countres= mysqli_num_rows($res);
 									 	if($countres >=1){
 									 		 while($row = mysqli_fetch_array($res)){
	 									 			$recordedval = $row['coordinator'];
	 									 			
	 									 		$newval = $recordedval.$val;

	 									 		$upt = "UPDATE `logs` SET `coordinator`='$newval' WHERE logs_id ='$newlyinsertedid' ";
	              	 	 		mysqli_query($con,$upt);	
 									 		


 									 		   }
 									 	}


	              	 	 	 	 	}

	              	 	 	 	 }

	              	 	 	 


	              	 	 	 
	              	 	 	  
	              	 	

	              	 	 	}






	              	 	$sql = "DELETE FROM `colleges` WHERE CollegeId = '$id' ";
	                $result = mysqli_query($con,$sql); // run query
	                $removeCourse = "DELETE FROM `course` WHERE CollegeId='$id' ";
	              	 mysqli_query($con,$removeCourse );
	              	 $removecoordinator = "DELETE FROM `administrator` WHERE CollegeId='$id'  ";
	              	 mysqli_query($con,$removecoordinator );


	              	 	 	

	              	 	 	
	              	 	 
	              	 	  
	              	 
	              	  


	              	
               /*    */
	
}

 if(isset($_POST['replaceadmin'])){ 

          $adem = $_POST['rpadem'];
          $adln = $_POST['rpadln'];
          $adfn = $_POST['rpadfn'];
          $admn = $_POST['rpadmn'];
          $adty = $_POST['rpadty'];
          $rpcoll = $_POST['rpcoll'];
          $cn = $_POST['rpcn'];
          $ed = $_POST['rped'];
          $id = $_POST['id_'];

        


       

         // echo $adem.$adln.$adfn.$admn.$adty.$cn.$ed;
          date_default_timezone_set('Asia/Manila');
          $datenow = date('Y-m-d H:i:s');



      
          $pass = '@'.strtolower($adty).'_'.$adln;

          if(isset($_POST['coll'])){
            $coll = $_POST['coll'];
          }else {
            $coll = 0;
          }
          echo $adem;
       

          $hashedpass = md5($pass);

          $dsp = 'admin_'.$adln;
             $sql = " INSERT INTO `administrator`(`admin_lname`, `admin_fname`, `admin_mname`, `admin_dsplyname`, `admin_type`, `admin_email`,`admin_password`,`CollegeId`,`ft`,`admin_banner`,`admin_sidebarbg`,`admin_contactno`,`admin_effectivedate`,`new_gc`) 
             VALUES ('$adln','$adfn','$admn','$dsp','$adty','$adem','$hashedpass','$rpcoll','1','$adty ADMIN','#63a284','$cn','$ed','1')  ";
                         $result = mysqli_query($con,$sql); // run query

                        

                      if($result){
                         $newreplaced = mysqli_insert_id($con);

          $replace_coordinator = "UPDATE `administrator` SET `admin_executiondate`='$datenow',`rpby`='$newreplaced' ,`edstat`=1 WHERE admin_id ='$id' ";
          mysqli_query($con,$replace_coordinator);

                      }   

         
                     date_default_timezone_set('Asia/Manila'); 
                    $date_m = date('Y-m-d H:i:s');
                     $token =  $_SESSION['admingcc_token'];
                      $sem = $_SESSION['sem'];
                    $save_to_logs = "INSERT INTO `logs`(`stud_id`, `admin_id`, `admin_type`, `content`, `datemodified`,`manage_fields`,`semester`) 
                    VALUES (0,'$token','GCC','Replaced new Guidance Coordinator :  $adln $adfn','$date_m','Add','$sem')";
                    mysqli_query($con,$save_to_logs); 
          
        }


 ?>