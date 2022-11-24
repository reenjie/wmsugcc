<?php 
session_start();
include '../GCC/create_form/connect.php';
$usertoken = $_SESSION['user_student_token_check'];
$CollegeId=$_SESSION['student_college'];
if(isset($_POST['account_modify'])){


$sql = " select * from student where stud_id = '$usertoken'  ";
                                                $result = mysqli_query($con,$sql); // run query
                                                
                                                 while($row = mysqli_fetch_array($result)){
                                                      $srcphoto = $row['photo'];

                                                    if($srcphoto == ''){
                                                        $src = 'https://th.bing.com/th/id/OIP.4gcGG1F0z6LjVlJjYWGGcgHaHa?pid=ImgDet&rs=1';
                                                    }else {
                                                        $src = 'img/'.$srcphoto;
                                                    }
                                        ?>
                               <h6 style="font-size:13px">All Changes will be <span class="text-primary">saved</span> automatically.</h6>
                               
                                    <h6 style="text-align:center;">
                                       
                                        
                                          <img src="<?php echo $src ?>" style="width: 100px;height: 100px;" class="img-rounded img-thumbnail  img-fluid"><br> <button data-toggle="modal" data-target="#changephoto" class="btn btn-light text-primary" style="font-size:11px;">Change Photo</button>
                                          <br>
                                          <span style="font-size: 12px"><?php echo $row['stud_email'] ?>

                                                </span>

                                      
                                          <br>
                                          <div class="container mt-3">
                                             <!--  <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                                        <h6 style="font-size:11px;text-align: left;">As for security reasons. You are not allowed to edit or modify any personal information of yours saved from our database.If you wish to, Visit your coordinator to further assist you with your issue. <br><br>
                                            <span class="text-success">Only Photo and Password are availble for modification.</span>
                                        </h6>
                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div> -->

                                        <div class="row">
                                        	<div class="col-md-4">
                                        		   <h6 style="float: left;font-size: 13px;">Last name</h6>
                                          <input type="text" name="" class="form-control mb-2 update" data-upt="stud_lname" value="<?php echo $row['stud_lname'] ?>" style="font-size: 12px;" >

                                        	</div>
                                        	<div class="col-md-4">
                                        		   <h6 style="float: left;font-size: 13px;">Given name</h6>
                                          <input type="text" name="" class="form-control mb-2 update" data-upt="stud_fname" value="<?php echo $row['stud_fname'] ?>" style="font-size: 12px;" >

                                        	</div>
                                        	<div class="col-md-4">
                                        		    <h6 style="float: left;font-size: 13px;">Middle name</h6>
                                          <input type="text" name="" class="form-control mb-2 update" data-upt="stud_mname" value="<?php echo $row['stud_mname'] ?>" style="font-size: 12px;" >

                                        	</div>

                                        	<div class="col-md-3">
                                        			   <h6 style="float: left;font-size: 13px;">Age</h6>
                                          <input type="text" name="" class="form-control mb-2 update" data-upt="age" value="<?php echo $row['age'] ?>" style="font-size: 12px;" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '/');" >
                                        	</div>

                                        

                                        	<div class="col-md-9">
                                        			  <h6 style="float: left;font-size: 13px;">Contract No</h6>
                                          <input type="text" name="" class="form-control mb-2 update" data-upt="contact_no" value="<?php echo $row['contact_no'] ?>" style="font-size: 12px;" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '/');" >
                                        	</div>

                                            <div class="col-md-3">
                                                    <label style="font-size: 12px;float: left;"  class="mt-2"><span id="txteee">Year-Level</span></label>
                                        <select class="form-select" id="yr" name="year" style="font-size: 13px;text-align: center;" data-upt="yearlevel"   >
                                            <option value="<?php echo $row['yearlevel'] ?>"><?php echo $row['yearlevel'] ?></option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>


                                        </select>


                                            </div>




                                        	<h6 class="mt-3" style="font-size:15px;font-weight: bold;">Address</h6>


                                        	<div class="col-md-6">
                                        			  <h6 style="float: left;font-size: 13px;">Street</h6>
                                          <input type="text" name="" class="form-control mb-2 update" data-upt="street" value="<?php echo $row['street'] ?>" style="font-size: 12px;"  >
                                        	</div>

                                        	<div class="col-md-6">
                                        			  <h6 style="float: left;font-size: 13px;">Barangay</h6>
                                          <input type="text" name="" class="form-control mb-2 update" data-upt="barangay" value="<?php echo $row['barangay'] ?>" style="font-size: 12px;"  >
                                        	</div>

                                        	<div class="col-md-6">
                                        			  <h6 style="float: left;font-size: 13px;">City</h6>
                                          <input type="text" name="" class="form-control mb-2 update" data-upt="city" value="<?php echo $row['city'] ?>" style="font-size: 12px;" >
                                        	</div>

                                        	<div class="col-md-6">
                                        			  <h6 style="float: left;font-size: 13px;">Country</h6>
                                          <input type="text" name="" class="form-control mb-2 update" data-upt="country" value="<?php echo $row['country'] ?>" style="font-size: 12px;"  >
                                        	</div>

                                        	<div class="col-md-4">
                                        			  <h6 style="float: left;font-size: 13px;">Zip Code</h6>
                                          <input type="text" name="" class="form-control mb-2 update" data-upt="zipcode" value="<?php echo $row['zipcode'] ?>" style="font-size: 12px;" >
                                        	</div>

                                        	<div class="col-md-8">
                                        		
                                              <h6 style="float: left;font-size: 13px;">Password:</h6>
                                          <input type="password" name="" class="form-control mb-2 " id="pass_" data-upt="password"  value="<?php echo $row['password'] ?>" style="font-size: 12px;" readonly>

                                          	<span id="info" class="text-danger" style="font-size: 12px;"></span>
                                        	</div>
                                        </div>
                                          
                                          <div class="custom-control custom-checkbox d-none check" id="">
												  <input type="checkbox" class="custom-control-input" id="customCheck1">
												  <label class="custom-control-label" for="customCheck1" style="font-size:14px">Save Password</label>
											


												</div>
													  <button class="btn btn-light text-danger check  d-none" style="font-size:14px" id="cancel">Cancel</button>

                                       
                                         
                                        

                                         
                                        	



                                        	

                                              
                                       
                                          </div>
                                      </h6>
                                        

                        <script type="text/javascript" src="../offline/sweetalert.js"></script>
                    	<script type="text/javascript">
                    		  $(document).ready(function() {
                    		  	$('.update').focusout(function(){
                    		  		var type = $(this).data('upt');
                    		  		var value = $(this).val();

                    		  		 $.ajax({
                    		  		 url : "account.php",
                    		  		  method: "POST",
                    		  		 data  : {update:type,value:value},
                    		  		  success : function(data){
                    		  		 		
                    		  		   }
                    		  		 })

                    		  	})

                                $('#yr').change(function(){
                                        var type = $(this).data('upt');
                                    var value = $(this).val(); 


                                     $.ajax({
                                     url : "account.php",
                                      method: "POST",
                                     data  : {update:type,value:value},
                                      success : function(data){
                                            
                                       }
                                     })

                                             
                                })
                    		  	$('#pass_').keyup(function(){
                    		  		$('#info').html('Check the checkbox below to save New Password');
                    		  	})

                    		  	$('#pass_').click(function(){

                    		  		$(this).removeAttr('readonly');
                    		  		$(this).val('');
                    		  		$('.check').removeClass('d-none');

                    		  			  		
                    		  	})

                    		  	$('#customCheck1').click(function(){
                    		  		var newpass = $('#pass_').val();
                    		  		 $.ajax({
                    		  		 url : "account.php",
                    		  		  method: "POST",
                    		  		 data  : {savenewpass:newpass},
                    		  		  success : function(data){
                    		  		 	Swal.fire(
                    		  		 		'Password Changed!',
                    		  		 		'You have successfully Change your password',
                    		  		 		'success',

                    		  		 		)
                    		  		 		myaccount();
                    		  		   }
                    		  		 })
                    		  			  		
                    		  	})
                    		  	$('#cancel').click(function(){
                    		  	myaccount();	  		
                    		  	})


        function myaccount(){

         $.ajax({
                 url : "account.php",
                  method: "POST",
                   data  : {account_modify:1},
                   success : function(data){
        $('.content-tab').html(data);
        $('#loader').addClass('d-none');
        $('#titletext').text('Account');
                   }
                })
        }

                    	
                    		
                    		  });
                    	</script>
                                  
                                   



                                        <?php
                                                 }



           


	
	
}

if(isset($_POST['update'])){
	//$usertoken
	$update = $_POST['update'];
	$value = $_POST['value'];

	

		$updateuser = "UPDATE `student` SET `$update`='$value' WHERE stud_id = '$usertoken' ";
		mysqli_query($con,$updateuser);

	
	
}

if(isset($_POST['savenewpass'])){
	$newpass = $_POST['savenewpass'];

	$pass = md5($newpass);

	$updateuser = "UPDATE `student` SET `password`='$pass' WHERE stud_id = '$usertoken' ";
		mysqli_query($con,$updateuser);

	
}

 ?>