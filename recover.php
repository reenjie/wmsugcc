<?php 
session_start();
 $code = rand(1234,9999);

  if(!isset($_SESSION['student_unique_code'])){
     $_SESSION['student_unique_code'] = $code;  
  }else {
 }
unset($_SESSION['unknown_user']);
 if(isset($_SESSION['message'])){
  ?>
 <script src="js/jquery.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script type="text/javascript">
    
    $(document).ready(function() {
            
                          Swal.fire(

                        'Registered Successfully!',

                        'Your login credentials has been sent to <?php echo $_SESSION['message_email'] ?>  ',
                       
                        'success',
                          
                      )
          });      
          
  </script>
  <?php
  unset($_SESSION['message']);
  unset($_SESSION['message_email']);
 }


 if(isset($_SESSION['emailerror'])){

     ?>
  <script src="js/jquery.js"></script>
  
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script type="text/javascript">
    
    $(document).ready(function() {
            
                          Swal.fire(

                        'Email Not Allowed!',

                        'The email you entered is not valid,Please enter organization Email only.',
                       
                        'error',
                          
                      )
          });      
          
  </script>
  <?php

  unset($_SESSION['emailerror']);
 }


 ?>
<!DOCTYPE html>
<html>

<head>
 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

   <title>GCC</title>

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
<body style="background: rgb(255,255,255);
background: linear-gradient(0deg, rgba(255,255,255,1) 9%, rgba(244,254,243,1) 28%, rgba(254,254,254,1) 56%, rgba(240,240,240,1) 74%, rgba(229,241,229,1) 84%, rgba(214,236,215,1) 89%, rgba(190,231,191,1) 96%);" id="page-top">
	
	<script type="text/javascript">
		
		window.onscroll = function() {myFunction();};

function myFunction() {
  var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
  var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
  var scrolled = (winScroll / height) * 100;
  document.getElementById("myBar").style.width = scrolled + "%";
}      





	      	
	</script>

			
	

   
   


 <div class="scrollingtext mt-4">
 	 <div class="container-fluid ">
 	 	 <div class="row">
 	 	 	 <div class="col-md-3">
 	 	 	 	
 	 	 	 </div> 
 	 	 	 <div class="col-md-9 bg-success" >
 	 	 	 		
			 		
 	 	 	 </div> 
 	 	 	 
 	 	 </div> 
 	 	  	

 	 	 
 	



 	 </div> 
 	 
 </div> 
  <div class="fixed-top">
  	<div class="progress-container">
    <div class="progress-bar" id="myBar"></div>
  </div>  
  </div> 

 
    
     <div class="container mt-5">
        <div class="card shadow-sm">
           <div class="card-body">
              <h5 style="font-weight: bolder;">SuperAdmin Password Recovery : </h5>
              <hr>


               <div class="container">
                 
               

                <br>
                 <div class="row">
                    <div class="col-md-2"></div> 
                     <div class="col-md-8">
                         <input type="text" name="" class="form-control" id="email" placeholder="Enter Email Registered as SuperAdmin">
                          <div class="invalid-feedback">
                                      Email does not match our Designated Superadmin.
                                    </div>

                                     <div class="valid-feedback">
                                    We have successfully Reset your password to default and Sent to your Email.
                                    </div>

                         <br>

                         <button class="mt-1 btn btn-primary " id="submit" style="float: right;"> Submit</button> <br>

                       
                          
                        
                          


                     </div> 
                      <div class="col-md-2"></div> 
                    
                 </div> 
                 
                


               </div> 
               


           </div> 
           
        </div> 
        
     </div> 
     

   
     
  
 




  
  <!-- Button trigger modal -->
 






	 <script src="js/jquery.js"></script>
   <script type="text/javascript">
     
     $(document).ready(function() {
             $('#submit').click(function() { 
              var email = $('#email').val();


                    
                       $.ajax({
                               url : "recovery.php",
                                method: "POST",
                                 data  : {recovery:1,email:email},
                                 success : function(data){
                                  
                                    if(data == 'nomatch'){
                                      $('#email').addClass('is-invalid');

                                    }else {
                                     
                                      $('#email').attr('readonly','true');
                                      $('#submit').addClass('d-none');
                                      $('#email').addClass('is-valid');


                                      
                                        $.ajax({
                                                 url : "mailer/sendpass_recovery.php",
                                                  method: "POST",
                                                   data  : {send:1,email:email},
                                                   success : function(data){
                                      
                                                   }
                                                })

                                              
                                             
                                          
                                    }

                                 }
                              })
                           
                        
             
             })

             $('#email').keyup(function(){ 
                $('#email').removeClass('is-invalid');
             
             })
           });      
           
   </script>


	 <script type="text/javascript">
	 		
    		var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
	 			   

	 	$(document).ready(function() {
      



		$('#validationServer03').keyup(function(){ 
			
			 	 $('#validationServer03').removeClass('is-invalid');
			
			
		
		})
		$('#validationServer04').keyup(function(){ 
			
			
			 	 $('#validationServer04').removeClass('is-invalid');
		
		
		})


	 	});

	 </script>
	 <!--xaxaxaxaxaxa-->

 <a class="scroll-to-top rounded bg-success" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

 <!-- Bootstrap core JavaScript-->
    <script src="GCC/vendor/jquery/jquery.min.js?v=1"></script>
    <script src="GCC/vendor/bootstrap/js/bootstrap.bundle.min.js?v=1"></script>

    <!-- Core plugin JavaScript-->
    <script src="GCC/vendor/jquery-easing/jquery.easing.min.js?v=1"></script>

    <!-- Custom scripts for all pages-->
    <script src="GCC/js/sb-admin-2.min.js?v=1"></script>
  
    	
    	      
          	
   
</body>
</html>
