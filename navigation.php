<ul class="nav bg-secondary" style="font-size: 14px;" id="nav">
	

  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="index.php"><i class="fas fa-home"></i> Home</a>
  </li>
  <li class="nav-item">
   
    <div class="dropdown show">
  <a class="nav-link dropdown-toggle" href="#" role="button" id="about"  aria-haspopup="true" aria-expanded="false"><i class="fas fa-info-circle"></i> About</a>

  <div class="dropdown-menu shadow" aria-labelledby="about">
    <a class="dropdown-item" href="?links&redirect=Rationale">Rationale</a>
    <a class="dropdown-item" href="?links&redirect=Vision">Vision</a>
    <a class="dropdown-item" href="?links&redirect=Mission">Mission</a>
     <a class="dropdown-item" href="?links&redirect=Objectives">Objectives</a>
     
  </div>
</div>

 

  </li>
  <li class="nav-item">

    <div class="dropdown show">
  <a class="nav-link dropdown-toggle" href="#" role="button" id="administrator"  aria-haspopup="true" aria-expanded="false"><i class="far fa-user-circle"></i> Administration</a>

  <div class="dropdown-menu" aria-labelledby="administrator">
    <a class="dropdown-item" href="?links&redirect=Guidance Staffs">Organization Officials</a>
  
  </div>
</div>

  </li>
   <li class="nav-item">
     <div class="dropdown show">
  <a class="nav-link dropdown-toggle" href="#" role="button" id="services"  aria-haspopup="true" aria-expanded="false"><i class="fas fa-globe"></i> Services</a>

  <div class="dropdown-menu" aria-labelledby="services">
    
   

    <?php 
          $sql = " select * from pages where type = 2   ";
                      $result = mysqli_query($con,$sql); 
                      $count= mysqli_num_rows($result); 
                 
                       while($row = mysqli_fetch_array($result)){
                       $active = $row['active'];
                      $content = $row['content'];

                      ?>

                      <a class="dropdown-item" href="?links&redirect=<?php echo $row['pageid']?>&services=<?php echo $row['title'] ?>"><?php echo $row['title'] ?></a>
                      <?php


                
                       }
                    


       ?>

  </div>
</div>

  </li>
   <li class="nav-item">
   <div class="dropdown show">
  <a class="nav-link dropdown-toggle" href="#" role="button" id="activities" aria-haspopup="true" aria-expanded="false"><i class="fas fa-clipboard-list"></i> Activities</a>

  <div class="dropdown-menu" aria-labelledby="activities">
    <a class="dropdown-item" href="?links&redirect=Calendar">Calendar</a>
    <a class="dropdown-item" href="?links&redirect=Events">Events</a>
     <a class="dropdown-item" href="?links&redirect=Announcements">Announcements</a>
  
  </div>
</div>
  </li>
   <li class="nav-item">
    <a class="nav-link" href="?links&redirect=Contact Us"><i class="far fa-address-book"></i> Contact Us</a>
  </li>

   <li class="nav-item ml-auto">
   
    <?php 

    include 'signin.php';

     ?>
  </li>
  
</ul>

<?php 
   if(isset($_GET['relogin'])){
    ?>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript">
           $(document).ready(function() {
                 $('#login_').click();
         
           });
             
        
        
    </script>
    <?php


  }

 ?>

<!-----------------Mobile Navigation----------------------->
<ul class="nav bg-secondary" style="font-size: 14px;" id="navmobile">
  <li class="nav-item ml-auto">
    <a class="nav-link" href="javascript:void(0)" data-toggle="modal" data-target="#loginmodal"  style="float: right; margin-top: -9px"><i class="fas fa-sign-in-alt"></i> Sign In</a>
  </li>
   <button  data-toggle="collapse" id="mobiletrigger" style="background-color: transparent;outline: none;border: none;color: white" data-target="#navbar" aria-expanded="false" aria-controls="collapseExample"></button>

   <input type="checkbox" name="" id="checkifopen" class="d-none">

<div class="collapse" id="navbar">
  


  <li class="nav-item">
   <a class="nav-link active" aria-current="page" href="../"><i class="fas fa-home"></i> Home</a>
  </li>
  <li class="nav-item">
   
    <div class="dropdown show">
  <a class="nav-link dropdown-toggle" href="#" role="button" id="about" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-info-circle"></i> About</a>

  <div class="dropdown-menu shadow" aria-labelledby="about">
    <a class="dropdown-item" href="?links&redirect=Rationale">Rationale</a>
    <a class="dropdown-item" href="?links&redirect=Vision">Vision</a>
    <a class="dropdown-item" href="?links&redirect=Mission">Mission</a>
     <a class="dropdown-item" href="?links&redirect=Objectives">Objectives</a>
    
  </div>
</div>

 

  </li>
  <li class="nav-item">

    <div class="dropdown show">
  <a class="nav-link dropdown-toggle" href="#" role="button" id="administrator" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="far fa-user-circle"></i> Administration</a>

 <div class="dropdown-menu" aria-labelledby="administrator">
    <a class="dropdown-item" href="?links&redirect=Guidance Staffs">Organization Officials</a>
  
  </div>
</div>

  </li>
   <li class="nav-item">
     <div class="dropdown show">
  <a class="nav-link dropdown-toggle" href="#" role="button" id="services" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-globe"></i> Services</a>

 <div class="dropdown-menu" aria-labelledby="services">
     <?php 
          $sql = " select * from pages where type = 2   ";
                      $result = mysqli_query($con,$sql); 
                      $count= mysqli_num_rows($result); 
                 
                       while($row = mysqli_fetch_array($result)){
                       $active = $row['active'];
                      $content = $row['content'];

                      ?>

                      <a class="dropdown-item" href="?links&redirect=<?php echo $row['pageid']?>&services=<?php echo $row['title'] ?>"><?php echo $row['title'] ?></a>
                      <?php


                
                       }
                    


       ?>
  </div>
</div>

  </li>
   <li class="nav-item">
   <div class="dropdown show">
  <a class="nav-link dropdown-toggle" href="#" role="button" id="activities" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-clipboard-list"></i> Activities</a>

 <div class="dropdown-menu" aria-labelledby="activities">
    <a class="dropdown-item" href="?links&redirect=Calendar">Calendar</a>
    <a class="dropdown-item" href="?links&redirect=Events">Events</a>
     <a class="dropdown-item" href="?links&redirect=Announcements">Announcements</a>
  
  </div>
</div>
  </li>
   <li class="nav-item">
   <a class="nav-link" href="?links&redirect=Contact Us"><i class="far fa-address-book"></i> Contact Us</a>
  </li>

   

  </div>
</ul>




<!-- Modal -->
<div class="modal" id="loginmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm " role="document" >
    <div class="modal-content" >
     
      <div class="modal-body">
        <?php 
        include 'config.php';
      
          $loginURL = $gClient->createAuthUrl();
         
         ?>
       <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js">
  </script>
  <script src="https://apis.google.com/js/client:platform.js?onload=start" async defer>
  </script>
        


        <h6 class="text-success" style="text-align: center;">LOGIN GCC </h6>
        
       
           
           
                
                 <div class="text-danger" style="font-size: 13px" id="allerror"></div> 
                 
              <form method="post" action="login.php" id="loginform"   > <!--onsubmit="return false"-->
               
                <label for="validationServer03">Email</label>
                 <input type="text" class="form-control " name="em" id="validationServer03" placeholder=""  style="font-size: 12px" required>
                  <div class="invalid-feedback" id="emailerror">
                
                  </div>

                    <label for="validationServer04" class="mt-2">Password</label>
              <input type="password" class="form-control " name="pass" id="validationServer04" placeholder=""   style="font-size: 12px" required> 
              <div class="invalid-feedback" id="passworderror">
              
              </div>


              <a href="forgot_password.php" class="mt-2" style="font-size: 13px">Forgot Password ?</a>
                    
              
                    <br style="user-select: none">
      <button type="submit" class="btn btn-success mt-2 py-2"   name="logintrigger" id="btnlogin" style="float: right;font-size: 15px;width: 100%;height: 100%">LOGIN</button>


       
   
      <div class="row">
        <!-- <div class="col-md-6">
           <button class="mt-2 btn " type="button" disabled style="float: right;font-size: 15px;width: 100%;height: 100%" onclick="window.location.href = '<?php echo $loginURL ?>';"><img src='https://developers.google.com/identity/images/g-logo.png' id="logingoogle" style="height: 15px;width: 15px;background-color: transparent;" > Google</button>

        </div> -->
         <div class="col-md-12">
           <button class="mt-2 btn btn-light" onclick="window.location.href='register.php' " type="button" style="float: right;font-size: 13px;width: 100%;height: 100%">Student Registration</button>
         </div>
      </div>
 
       
                    

                </form>
            <!--  
  <a href="login.php?gcc">Login GCC</a>
<br>
<a href="login.php?gc"> Login GC</a>
<br>
<a href="login.php?student">Login Student</a>
-->
          
           
            
            
           
        
         


       
      </div>
      
    </div>
  </div>
</div>

<script src="js/jquery.js"></script>

<script>
$(document).ready(function() {
  $('#logingoogle').click(function() { 
  
  })
});
</script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


 <button type="button" class="btn btn-primary d-none" id="confirmation" data-toggle="modal" data-target="#emailconfirmation" data-backdrop="static" data-keyboard="false">
  
  </button>
  
  <!-- Modal -->


      <div class="modal fade" id="emailconfirmation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
      <div class="modal-content">
       
        <div class="modal-body">
          <style type="text/css">
   .input {
    display: table;
    margin: 100px auto;
    text-align: center;
}
.inputs {
    background-color: transparent;
    border: none;
    outline: none;
    border-bottom: 2px solid gray;
    display: inline-block;
    font-size: 20px;
    margin: 0 5px;
    width: 1.5rem;
    text-align: center;
    
}

  </style>
          
        <!--  <div class="container">
            <h6>An Email confirmation code was sent to  <br> <span style="font-weight: bold;text-align: center;"><?php echo $_SESSION['student_email'] ?></span></h6>
          <p></p>
            <input type="text" name="" placeholder="1234"  style="font-weight: bolder;outline: none;border:none;border-bottom: 10px dashed black;letter-spacing: 27px; width: 274px;
  letter-spacing: 28.5px;" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="4">
            <p></p>
          </div> -->

           <div class="container">
            <?php echo $_SESSION['student_unique_code'] ?>
             <h6>A confirmation code was sent to your Email. Kindly check your email for incoming Message containing the Code . <br>  <span class="text-danger" style="font-size:12px;font-weight:bolder"> Please be patient as the message may take some time to arrive.</span></span><span id="useremail" style="font-weight: bold;text-align: center;"></span></h6>
            
          <p></p>
            <?php // echo  $_SESSION['student_unique_code'] ?>  
              
               <div class="er text-danger d-none "  style="text-align: center;" ><span style="font-size: 14px">Incorrect Code</span></div>
   <div id="input" style="text-align: center;">
     <form method="post" action="verify.php" onsubmit="return false" id="confirmcode">
         <input type="hidden" name="checkcode">                   
    
    
    <input class="inputs " name="code[]" id="foc" type="text" pattern="[0-9]" maxlength="1" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required="" onload="select()" >
    <input class="inputs "  name="code[]"  type="text" pattern="[0-9]" maxlength="1" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required="">
    <input class="inputs "   name="code[]" type="text" pattern="[0-9]" maxlength="1" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required="">
    <input class="inputs "  name="code[]" type="text" pattern="[0-9]" maxlength="1" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required="">



    <button class="btn btn-primary mt-3" style="font-size: 14px;width:100%">Confirm</button>
     </form>
    
  </div>

  
<script src="js/jquery.js"></script>
<script type="text/javascript">
  
  $(document).ready(function() {


  

          $('.inputs').keyup(function () {



    if (this.value.length == this.maxLength) {
      $(this).next('.inputs').focus();
    }

if(this.value.length == '') {
      $(this).prev('.inputs').focus();
    }



});
          $('#confirmcode').on('submit', function(event){
             event.preventDefault();
                    $.ajax({
                             url :$(this).attr('action'),
                              method: "POST",
                               data  : $(this).serialize(),
                               success : function(data){

                                if(data=="match"){
                                 window.location.href="Myaccount/";
                                }else {
                                 $('.er').removeClass('d-none');
                                 $('.inputs').addClass('text-danger');
                                   var clear = setInterval(function(){
                                 $('.er').addClass('d-none');
                                  $('.inputs').removeClass('text-danger');

                                clearInterval(clear);
                              },5000);
                                }
                               }
                            })
             });

        });      
        
</script>
           </div> 
           
          
      
  
         
        </div>
       
      </div>
    </div>
  </div>


  <input type="hidden" id="useremailsave">
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="js/jquery.js"></script>
 


<script type="text/javascript">
    $('#mobiletrigger').html('<i class="fas fa-bars"></i>');

    $('#mobiletrigger').click(function() { 
     // $(this).html('<i class="fas fa-bars"></i>');
    

    
      // $('#mobiletrigger').html('<i class="fas fa-times"></i>');
   
     if($('#checkifopen').prop("checked") == true) {
                     $('#checkifopen').prop("checked",false);  
                     $('#mobiletrigger').html('<i class="fas fa-bars"></i>');        
                     $('#navbar').collapse('hide') ;                            
             }
          else if($('#checkifopen').prop("checked") == false) {
                      $('#checkifopen').prop("checked",true);  
                       $('#mobiletrigger').html('<i class="fas fa-times"></i>');    
                        $('#navbar').collapse('show') ;                  
      }


    })
    
    $('#validationServer03').keyup(function(){
        var val = $(this).val();
        $('#useremailsave').val(val);

         $.ajax({
         url : "verify.php",
          method: "POST",
         data  : {recoversuperadmin:val},
          success : function(data){
          if(data == "recover"){
            window.location.href='recover.php';
           }
          }
         })
        
    })

    $('#btnlogin').click(function(){
           var val1 = $('#validationServer03').val();
       var val2 = $('#validationServer04').val();
        if (val1 == '' && val2 == ''){
       $('#validationServer03').addClass('is-invalid');
        $('#validationServer03').focus();
        $("#allerror").text("");
          $('#validationServer04').addClass('is-invalid');
           $("#emailerror").text("Please provide your Email.");
           $("#passworderror").text("Please provide a password.");
       } else  
       if (val1 == ''){
        $('#validationServer03').addClass('is-invalid');
        $("#allerror").text("");
       }else if (val2== ''){
        $('#validationServer04').addClass('is-invalid');
        $("#allerror").text("");
       }


    })


    
  /*  $('#loginform').on('submit', function(event){

    
        var val1 = $('#validationServer03').val();
       var val2 = $('#validationServer04').val();
        if (val1 == '' && val2 == ''){
       $('#validationServer03').addClass('is-invalid');
        $('#validationServer03').focus();
        $("#allerror").text("");
          $('#validationServer04').addClass('is-invalid');
           $("#emailerror").text("Please provide your Email.");
           $("#passworderror").text("Please provide a password.");
       } else  
       if (val1 == ''){
        $('#validationServer03').addClass('is-invalid');
        $("#allerror").text("");
       }else if (val2== ''){
        $('#validationServer04').addClass('is-invalid');
        $("#allerror").text("");
       }else {



        /*   $.ajax({
                       url : $('#loginform').attr('action'),
                        method: "POST",
                         data  : $(this).serialize(),
                         success : function(data){
                          if(data.match("blocked")){
                      Swal.fire(

                        'ACCOUNT BlOCKED!',

                        'Your account has been blocked! Please visit your coordinator if you think this is a Mistake.',
                       
                        'warning',
                          
                      )
                          }else 

              if (data.match("studentlogin")) {
               //   window.location.href="Myaccount/";
               $('#loginmodal').modal('hide');
               $('#confirmation').click();
               var em =  $('#useremailsave').val();
                  $('#useremail').val(em);
                  
                     $.ajax({
                             url : "mailer/index.php",
                              method: "POST",
                               data  : {sendconfirmation:1},
                               success : function(data){
                  
                               }
                            })
                         
                      



              }else if (data.match("gcclogin")) {
                window.location.href="GCC/Dashboard";
              }else if (data.match("gclogin")){
                 window.location.href="Guidance-Coordinator/Dashboard/";

              }else if (data.match("superadmin")){
                window.location.href="admin/Dashboard";
              }else if (data.match("admission")){
                window.location.href="Admission/";
              }
              else if (data.match("unknown")) {
                 $('#validationServer03').addClass('is-invalid');
        $('#validationServer03').focus();
          $('#validationServer04').val('');
           $('#validationServer04').addClass('is-invalid');
          $("#allerror").text("Invalid Email or Password");
           $("#passworderror").text("");
              }
                         }
                      }) 

       }
       }); */


    ///


    $('#validationServer03').keyup(function(){ 
      
          
           var val = $(this).val();
             
            
               $.ajax({
                       url : "verify.php",
                        method: "POST",
                         data  : {val:val},
                         success : function(data){
            
                         }
                      })
            
            
          
              
              $("#allerror").text("");  
         $('#validationServer03').removeClass('is-invalid');
      
      
    
    })
    $('#validationServer04').keyup(function(){ 
        $("#allerror").text("");
      
         $('#validationServer04').removeClass('is-invalid');
    
    
    })


  
        
        
</script>
 

