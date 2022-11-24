<?php 


	 $code = rand(1234,9999);

   function randomPassword() {
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}


include 'sem.php';

    $passw = randomPassword();
     $_SESSION['student_unique_np'] = $passw;
     unset($_SESSION['student_unique_np_admin']);

  if(!isset($_SESSION['student_unique_code'])){
     $_SESSION['student_unique_code'] = $code;  



  }else {
 }
unset($_SESSION['unknown_user']);

 if(isset($_SESSION['message'])){
  ?>
  <script src="js/jquery.js"></script>
  
<script src="offline/sweetalert.js"></script>
  <script type="text/javascript">
    
    $(document).ready(function() {
            
                          Swal.fire(

                        'Registered Successfully!',

                        'Your login credentials has been sent to <?php echo $_SESSION['message_email'] ?>  ',
                       
                        'success',
                          
                      ).then((result) => {
  if (result.isConfirmed) {
   location.reload();
  }
})
          });      
          
  </script>
  <?php
  unset($_SESSION['message']);
  unset($_SESSION['message_email']);
 }


 if(isset($_SESSION['emailerror'])){

     ?>
 <script src="js/jquery.js"></script>
  
<script src="offline/sweetalert.js"></script>
  <script type="text/javascript">
    
    $(document).ready(function() {
            
                          Swal.fire(

                        'Email Not Allowed!',

                        'The email you entered is not valid,Please use organization Email only.',
                       
                        'error',
                          
                      ).then((result) => {
  if (result.isConfirmed) {
   location.reload();
  }
})
          });      
          
  </script>
  <?php

  unset($_SESSION['emailerror']);
 }

 if(isset($_SESSION['blocked'])){
     ?>
  <script src="js/jquery.js"></script>
<script src="offline/sweetalert.js"></script>
  <script type="text/javascript">
    
    $(document).ready(function() {
            
                          Swal.fire(

                        'ACCOUNT BlOCKED!',

                        'Your account has been blocked! Please visit your coordinator if you think this is a Mistake.',
                       
                        'warning',
                          
                      ).then((result) => {
  if (result.isConfirmed) {
   location.reload();
  }
})
          });      
          
  </script>
  <?php
  
  unset($_SESSION['blocked']);

 }

 if(isset($_SESSION['error'])){
  ?>
   <script src="js/jquery.js"></script>
<script src="offline/sweetalert.js"></script>
  <script type="text/javascript">
    
    $(document).ready(function() {
          	$('#login_').click();  
          	 $('#validationServer03').addClass('is-invalid');
        $('#validationServer03').focus();
          $('#validationServer04').val('');
           $('#validationServer04').addClass('is-invalid');
          $("#allerror").text("Invalid Email or Password");
           $("#passworderror").text("");
          
          });      
          
  </script>

  <?php
  unset($_SESSION['error']);
 }



 ?>