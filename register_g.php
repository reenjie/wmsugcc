<!DOCTYPE html>
<html>


<head>
 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

   <title>GCC - Register</title>

    <!-- Custom fonts for this template-->
    <link href="GCC/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="GCC/css/sb-admin-2.min.css?v=2" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="homepage.css?v=11">

    <style type="text/css">

    </style>
    <?php include 'GCC/create_form/connect.php'; ?>
</head>
<body style="background-color: #e7f2e2">

		 <div class="container mt-5">
		 	 <div class="row ">
		 	 		
		 	 		 <div class="col-md-2"></div> 
		 	 		  <div class="col-md-8 ">

		 	 		  	 <form method="post" action="#" onsubmit="return false" id="register" >
		 	 		  	    	               <input type="hidden" name="register_g">   
		 	 		  	
		 	 		  	
		 	 		  	 <div class="card shadow">
		 	 		  	 	 <div class="card-body">
		 	 		  	 	 	<h6 style="font-weight: bolder;">Guidance and Counseling Center<br> Student - Registration</h6> <hr>

		 	 		  	 	 	<h6 style="font-size: 14px; text-align: center;font-weight: bolder;">Personal Information</h6>
		 	 		  	 	 	<label style="font-size: 14px"><span style="font-weight: bolder;" class="text-danger">*</span><span id="txttoe">Email</span></label>
		 	 		  	 	 	<input type="text" id="emm" class="form-control is-valid" style="font-size: 14px" name="em" value="<?php echo $usermail ?>" readonly>

		 	 		  	 	 	 <div class="row">
		 	 		  	 	 	 	 <div class="col-md-5">
		 	 		  	 	 	 	 	
		 	 		  	 	 	 	 	<label style="font-size: 14px" class="mt-2"><span style="font-weight: bolder;" class="text-danger">*</span>Last Name</label>
		 	 		  	 	 	<input type="text" class="form-control is-valid" style="font-size: 14px" name="ln" value="<?php echo $surname ?>" readonly>
		 	 		  	 	 	 	 </div> 
		 	 		  	 	 	 	  <div class="col-md-5">
		 	 		  	 	 	 	  		<label style="font-size: 14px" class="mt-2"><span style="font-weight: bolder;" class="text-danger">*</span>Given Name</label>
		 	 		  	 	 	<input type="text" class="form-control is-valid" style="font-size: 14px" name="gn" value="<?php echo $name ?>" readonly>
		 	 		  	 	 	 	  </div> 
		 	 		  	 	 	 	   <div class="col-md-2">
		 	 		  	 	 	 	   			<label style="font-size: 14px" class="mt-2">M.I</label>
		 	 		  	 	 	<input type="text" class="form-control" style="font-size: 14px;text-transform: uppercase;" name="mi" maxlength="1">
		 	 		  	 	 	 	   </div> 

		 	 		  	 	 	 	    <div class="col-md-12">
		 	 		  	 	 	 	    	 <div class="card mt-2 mb-2">
		 	 		  	 	 	 	    	 	 <div class="card-body">
		 	 		  	 	 	 	    	 	 	 <div class="container">
		 	 		  	 	 	 	    	 	 	 	<h6 style="font-size: 13px"> Add Additional Information to Complete Registration Process.</h6>
		 	 		  	 	 	 	    	 	 	 </div> 
		 	 		  	 	 	 	    	 	 	 
		 	 		  	 	 	 	    	 	 </div> 
		 	 		  	 	 	 	    	 	 
		 	 		  	 	 	 	    	 </div> 
		 	 		  	 	 	 	    	 
		 	 		  	 	 	 	    </div> 
		 	 		  	 	 	 	    
		 	 		  	 	 	 	   
		 	 		  	 	 	 	    <div class="col-md-4">
		 	 		  	 	 	 	    		<label style="font-size: 14px" class="mt-2"><span style="font-weight: bolder;" class="text-danger">*</span>Age</label>
		 	 		  	 	 	<input type="text" class="form-control" style="font-size: 14px" name="age" required="" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" autofocus>
		 	 		  	 	 	 	    </div> 

		 	 		  	 	 	 	    <div class="col-md-4">
		 	 		  	 	 	 	    	<label style="font-size: 14px" class="mt-2"><span style="font-weight: bolder;" class="text-danger">*</span>Gender</label>
		 	 		  	 	 	 	    	<select class="form-control" name="gender"><option value="Male">MALE</option><option value="Female">FEMALE</option></select>
		 	 		  	 	 	 	    </div> 
		 	 		  	 	 	 	    <div class="col-md-4">
		 	 		  	 	 	 	    	<label style="font-size: 14px" class="mt-2" ><span style="font-weight: bolder;" class="text-danger">*</span>Status</label>
		 	 		  	 	 	<select class="form-control" name="status">
		 	 		  	 	 		<option value="single">Single</option>
		 	 		  	 	 		<option value="married">Married</option>
		 	 		  	 	 		<option value="widowed">Widowed</option>
		 	 		  	 	 	</select>
		 	 		  	 	 	 	    </div> 

		 	 		  	 	 	 	     <div class="col-md-12">
		 	 		  	 	 	 	     	<label style="font-size: 14px" class="mt-2">Contact No</label>
		 	 		  	 	 	<input type="text" class="form-control" style="font-size: 14px" name="cno" required="" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="11">
		 	 		  	 	 	 	     </div> 
		 	 		  	 	 	 	     

		 	 		  	 	 	 	  
		 	 		  	 	 	 	    
		 	 		  	 	 	 	 

		 	 		  	 	 	 	  <div class="col-md-12">
		 	 		  	 	 	 	  		

		 	 		  	 	 	<label style="font-size: 14px" class="mt-2"><span style="font-weight: bolder;" class="text-danger">*</span>Address</label>
		 	 		  	 	 		<div class="row">
		 	 		  	 				<div class="col-md-5">
		 	 		  	 					<input type="text" name="st" class="form-control mb-2" style="font-size:14px" placeholder="Street">
		 	 		  	 				</div>
		 	 		  	 				<div class="col-md-7">
		 	 		  	 						<input type="text" name="br" class="form-control mb-2" style="font-size:14px" placeholder="Barangay" required>
		 	 		  	 				</div>
		 	 		  	 					<div class="col-md-6">
		 	 		  	 						<input type="text" name="cty" class="form-control mb-2" style="font-size:14px" placeholder="City" required>
		 	 		  	 				</div>
		 	 		  	 					<div class="col-md-6">
		 	 		  	 						<input type="text" name="zc" class="form-control mb-2" style="font-size:14px" placeholder="Zipcode" required>
		 	 		  	 						
		 	 		  	 				</div>
		 	 		  	 					<div class="col-md-12">
		 	 		  	 						<input type="text" name="ct" class="form-control mb-3" style="font-size:14px" placeholder="Country" value="Philippines" required>
		 	 		  	 				</div>

		 	 		  	 			</div>
		 	 		  	 	 	 	  </div> 
		 	 		  	 	 	 	   <div class="col-md-12">


		 	 		  	 	 	 	   	<label style="font-size: 14px"  class="mt-2"><span style="font-weight: bolder;" class="text-danger">*</span> <span id="txteec">Select College</span></label>
		 	 		  	 	 	 	   	<select class="form-control" id="secc" name="college" style="font-size: 14px;" >
		 	 		  	 	 	 	   		<option value="noselection">Select</option>
		 	 		  	 	 	 	   		<?php 
		 	 		  	 	 	 	   						$sqlcc = " SELECT * FROM `colleges`  ";
								                $resultcc = mysqli_query($con,$sqlcc); // run query
								                $countcc= mysqli_num_rows($resultcc); // to count if necessary
								               //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
								             if ($countcc>=1){
								             	//while($row = mysqli_fetch_array($result)){} is where we output all the data in database
								                 while($row = mysqli_fetch_array($resultcc)){
								                 	$crse = $row['course'];
								                 	?>
								                 	<option value="<?php echo $row['CollegeId'] ?>"><?php echo $row['college'] ?></option>
								                 	<?php

									
								
								                 }
								          }


		 	 		  	 	 	 	   		 ?>

		 	 		  	 	 	 	   	</select>

		 	 		  	 	 	 	   	
		 	 		  	 	 	 		   	<label style="font-size: 14px"  class="mt-2"><span style="font-weight: bolder;" class="text-danger">*</span> <span id="txtee">Select Course</span></label>
		 	 		  	 	 	 	   	<div class="" id="courseselection">
		 	 		  	 	 	 	   		  	<select class="form-control" id="sec" name="course" style="font-size: 14px;" disabled >
		 	 		  	 	 	 	   		<option value="noselection"></option>
		 	 		  	 	 	 	   		

		 	 		  	 	 	 	   	</select>
		 	 		  	 	 	 	   	</div>
		 	 		  	 	 	 	 



		 	 		  	 	 	 	   </div> 

		 	 		  	 	 	 	     <div class="col-md-12">
		 	 		  	 	 	 	   	
		 	 		  	 	 	 	   	<label style="font-size: 14px"  class="mt-2"><span style="font-weight: bolder;" class="text-danger">*</span> <span id="txteee">Select Year-Level</span></label>
		 	 		  	 	 	 	   	<select class="form-control" id="yr" name="year" style="font-size: 14px;text-align: center;" >
		 	 		  	 	 	 	   		<option value="noselection">Select</option>
		 	 		  	 	 	 	   		<option value="1">1</option>
		 	 		  	 	 	 	   		<option value="2">2</option>
		 	 		  	 	 	 	   		<option value="3">3</option>
		 	 		  	 	 	 	   		<option value="4">4</option>
		 	 		  	 	 	 	   		<option value="5">5</option>


		 	 		  	 	 	 	   	</select>



		 	 		  	 	 	 	   </div> 

		 	 		  	 	 	 	    <div class="col-md-12">
		 	 		  	 	 	 	    	
		 	 		  	 	 	 	    	<label style="font-size: 14px" class="mt-2"><span style="font-weight: bolder;" class="text-danger">*</span>Password</label>
		 	 		  	 	 	<input type="password" class="form-control" style="font-size: 14px;" name="pass" id="pass" required="" >
		 	 		  	 	 	   <div class="d-none" id="restrict">
                                                     
                                                    <div class="card">
                                                              <div class="container">
                                                                 <ul>
                                                                    <li id="upper">Must have Uppercase _Ex.(ABCDEFGHI)</li>  
                                                                    <li id="lower">Must have a Lowercase _Ex. (abcdefghi)</li>
                                                                    <li id="numb">Must have a Number _Ex.(123456789)</li>
                                                                    <li id="chara">Must have at Least 8 Characters _Ex.(********)</li>
                                                                 </ul>
                                                                 
                                                              </div>     
                                                        </div> 
                                                         <br>
                                                         </div>

		 	 		  	 	 	 	    </div> 

		 	 		  	 	 	 	        <div class="col-md-12">
		 	 		  	 	 	 	    	
		 	 		  	 	 	 	    	<label style="font-size: 14px" class="mt-2"><span style="font-weight: bolder;" class="text-danger">*</span>Repeat Password</label>
		 	 		  	 	 	<input type="password" class="form-control" style="font-size: 14px;" name="repass" id="repass" required="" >


		 	 		  	 	 	 	    </div> 
										
										
										 	
										
										 

		 	 		  	 	 	 	    


		 	 		  	 	 	 	  
		 	 		  	 	 	 </div> 

		 	 		  	 	 	 <div class="custom-control custom-checkbox mt-2">
								  <input type="checkbox" class="custom-control-input" id="customCheck2" >
								  <label class="custom-control-label" for="customCheck2" style="font-size: 14px">SHOW PASSWORD</label>
								</div>


		 	 		  	 	 	 <div class="custom-control custom-checkbox mt-2">
								  <input type="checkbox" class="custom-control-input" id="customCheck1" required="">
								   <label class="custom-control-label" for="customCheck1" style="font-size: 14px">Agree to Data Privacy and Consent.</label>

								 <a data-toggle="collapse" style="font-size: 12px" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
    Read ..
  </a>
</p>
<div class="collapse show" id="collapseExample">
  <div class="card card-body">
   					<h6 style="font-size:14px">
								  					In submitting this Form,I voluntarily give consent for the collection, use, processing, storage and retention of my personal data. I also agree that the data reflected in this form will be secured and not be distributed to the third parties. I understand that when this information is no longer required for this purpose, official University procedure will be followed to dispose my data.  I also understand  that my consent does not prevent the existence of other criteria for lawful processing of personal data and does not waive any of my rights under RA 10173 – Data Privacy Act of 2012 and other applicable laws.

								  				</h6>
  </div>
</div>
								</div>
		 	 		  	 	 	 <button type="submit" class="form-control btn btn-success mt-2" id="btnreg" disabled=""> Register</button>
		 	 		  	 	 	 
		 	 		  	 	 	

		 	 		  	 	 

		 	 		  	 	 

		 	 		  	 	 	


		 	 		  	 	 </div> 
		 	 		  	 	 
		 	 		  	 </div> 
		 	 		  	  </form>
		 	 		  	 	
		 	 		  	 	 <div class="card shadow d-none" id="emailconfirmation">
		 	 		  	 	 	 <div class="card-body">
		 	 		  	 	 	 		
		 	 		  	 	 	 		<h6 style="font-weight: bolder;text-align: center;">
		 	 		  	 	 	 				
		 	 		  	 	 	 				We have sent your login credentials to <br><br><span style="font-weight: bolder;" class="text-primary" id="emval"></span> <br> <br>
		 	 		  	 	 	 				



		 	 		  	 	 	 				<br>



		 	 		  	 	 	 		</h6>
		 	 		  	 	 	 		<a href="https://gmail.com" class="mt-5" target="_blank">Go to Gmail</a>	


		 	 		  	 	 	 </div> 
		 	 		  	 	 	 
		 	 		  	 	 </div> 
		 	 		  	 	 


		 	 		  </div> 
		 	 		  <div class="col-md-2"></div> 
		 	 		 

		 	 </div> 
		 	 
		 </div> 
		 



		 <script src="js/jquery.js"></script>
		 <script src="offline/sweetalert.js"></script>
		 <script>
		 $(document).ready(function() {

		 	 $('#customCheck2').click(function() {
		 	      if($(this).prop("checked") == true) {
		 	             $('#pass').attr('type','text'); 
		 	              $('#repass').attr('type','text');          		
		 	         }
		 	      else if($(this).prop("checked") == false) {
		 	      	   $('#pass').attr('type','password'); 
		 	              $('#repass').attr('type','password');  
		 	                                       
		 	       }
		 	    });

		 	 $('#pass').keyup(function(){ 
		 	 	      var newvalue = $(this).val();

                              if(newvalue == '') {
                                   $('#restrict').addClass('d-none');
                                  
                                   $('#txtreenter').attr('disabled',true);
                                   $('#txtreenter').val('');

                                        $('#btnsavepass').attr('disabled',true);
                                         $('#pregmatch').html('');
                                           $('#pass').removeClass('is-valid');
                              }else {
                                  $('#restrict').removeClass('d-none'); 
                                   var lowerCaseLetters = /[a-z]/g;
                                   var upperCaseLetters = /[A-Z]/g;
                                    var numbers = /[0-9]/g;

                                    if(newvalue.match(lowerCaseLetters) && newvalue.match(upperCaseLetters) &&  newvalue.match(numbers) && newvalue.length >= 8 ) {
                                          $('#restrict').addClass('d-none');
                                          $('#txtreenter').removeAttr('disabled');
                                        $('#txtreenter').attr('required',true);

                                       $('#pass').addClass('is-valid');

                                    }else {
                                    	 $('#pass').removeClass('is-valid');
                                     if(newvalue.match(lowerCaseLetters)) {
                                        $('#lower').addClass('d-none');
                                    }else {
                                        $('#lower').removeClass('d-none');
                                        $('#txtreenter').attr('disabled',true);
                                         $('#txtreenter').val('');
                                        $('#btnsavepass').attr('disabled',true);
                                         $('#pregmatch').html('');
                                    }

                                    if(newvalue.match(upperCaseLetters)) {
                                        $('#upper').addClass('d-none');
                                    }else {
                                        $('#upper').removeClass('d-none');
                                        $('#txtreenter').attr('disabled',true);
                                         $('#txtreenter').val('');
                                        $('#btnsavepass').attr('disabled',true);
                                         $('#pregmatch').html('');
                                    }

                                    if(newvalue.match(numbers)) {
                                        $('#numb').addClass('d-none');
                                    }else {
                                        $('#numb').removeClass('d-none');
                                        $('#txtreenter').attr('disabled',true);
                                         $('#txtreenter').val('');
                                        $('#btnsavepass').attr('disabled',true);
                                         $('#pregmatch').html('');
                                    }
                                    if(newvalue.length >= 8) { 
                                       $('#chara').addClass('d-none');
                                      
                                    }else {
                                         $('#chara').removeClass('d-none');
                                         $('#txtreenter').attr('disabled',true);
                                         $('#txtreenter').val('');
                                        $('#btnsavepass').attr('disabled',true);
                                         $('#pregmatch').html('');
                                    }

                                    }

                               




                              }
		 	 })

			 $('#repass').keyup(function(){ 
                              var valuenew = $('#pass').val();
                              var reentervalue = $(this).val();

                              if(valuenew == reentervalue) {
                                   $('#repass').addClass('is-valid').removeClass('is-invalid');

                                   $('#btnreg').removeAttr('disabled');

                              } else {
                                    $('#repass').addClass('is-invalid').removeClass('is-valid');
                              }    


                         })  


		
		 	 	$('#register').on('submit', function(event){
		 	   event.preventDefault();

		 	   var emval = $('#emm').val();

		 	  
		 	   			 $.ajax({
		 		                 url : "signup.php",
		 		                  method: "POST",
		 		                   data  : $(this).serialize(),
		 		                   success : function(data){
		 		      						
		 		      						if(data == "nocollege"){
		 		      							$('#sec').addClass('is-invalid');
		 		      							$('#txtee').text('Please Select a Course').addClass('text-danger');
		 		      							$('#secc').addClass('is-invalid');
		 		      							$('#txteec').text('Please Select a College').addClass('text-danger');
		 		      						}else 

		 		      						if(data == "nocourse"){
		 		      								$('#sec').addClass('is-invalid');
		 		      							$('#txtee').text('Please Select a Course').addClass('text-danger');
		 		      							$('#secc').css('border','1px solid red');
		 		      							$('#txteec').text('Please Select a College').addClass('text-danger');
		 		      						}else if (data =="noyear"){
		 		      							$('#yr').addClass('is-invalid');
		 		      							$('#txteee').text('Please Select Year level').addClass('text-danger');
		 		      						}

		 		      						else if (data == "notwmsu"){
		 		      							$('#emm').addClass('is-invalid');
		 		      							$('.invalid-feedback').addClass('d-none');
		 		      							$('#txttoe').text('Please provide organization Email like , *********@wmsu.edu.ph').addClass('text-danger');
		 		      								Swal.fire(

											  'Invalid Email',

											  'Should be Organization Email only. ',
											 
											  'error',
											  	
											)

		 		      						}else if (data == "wmsu") {

		 		      				

		 		      					

		 		      						$('#btnreg').attr('disabled',true);
		 		      						$('#btnreg').html('Submitting <i class="fas fa-spinner fa-pulse"></i>');
		 		      						
		 		      						  $.ajax({
		 		      						           url : "mailer/send_studentcr.php",
		 		      						            method: "POST",
		 		      						             data  : {sendcredentials:1,email:emval},
		 		      						             success : function(data){
		 		      										

		 		      						Swal.fire(

											  'Registered Successfully!',

											  'Your login credentials has been sent to '+emval,
											 
											  'success',
											  	
											).then((result) => {
										  if (result.isConfirmed) {
										   window.location.href='Myaccount/';
										  }
										}) 


		 		      						             }
		 		      						          }) 
		 		      						       
		 		      						    


		 		      						
		 		      						 
		 		      						       
		 		      						    


		 		      						}else if (data == "exist") {
		 		      							$('#emm').addClass('is-invalid');
		 		      							$('#txttoe').text('The email already exist').addClass('text-danger');
		 		      						}


		 		                   }
		 		                })
		 	   });

		 	
		 	$('#emm').keyup(function(){ 

		 		var val = $(this).val();

		 		if(val == ''){
		 			$('#emm').removeClass('is-invalid');
		 		      							$('#txttoe').text('Email').removeClass('text-danger');
		 		}
		 	
		 	})

		 	
		 	$('#secc').change(function(){
		 		var val = $(this).val();



		 			$('#secc').removeClass('is-invalid');
		 			$('#txteec').text('Select a College').removeClass('text-danger');

		 			 $.ajax({
		 			 url : "signup.php",
		 			  method: "POST",
		 			 data  : {collegeselected:val},
		 			  success : function(data){
		 			 $('#courseselection').html(data);
		 			$('#txtee').text('Please Select your Course').addClass('text-danger');
		 			
		 			   }
		 			 })


		 	})
		 	$('#yr').change(function(){
		 		$('#yr').removeClass('is-invalid');
		 		$('#txteee').text('Select Year-Level').removeClass('text-danger');
		 	})
		 });
		 </script>


 <!-- Bootstrap core JavaScript-->
    <script src="GCC/vendor/jquery/jquery.min.js?v=1"></script>
    <script src="GCC/vendor/bootstrap/js/bootstrap.bundle.min.js?v=1"></script>

    <!-- Core plugin JavaScript-->
    <script src="GCC/vendor/jquery-easing/jquery.easing.min.js?v=1"></script>

    <!-- Custom scripts for all pages-->
    <script src="GCC/js/sb-admin-2.min.js?v=1"></script>
  
</body>
</html>