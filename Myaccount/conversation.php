<?php 
session_start();
include '../GCC/create_form/connect.php';

$user = $_SESSION['user_student_token_check'];
if(!isset($_SESSION['user_student_token_check'])){
    header('location:../session_end.html');
}
include '../GCC/create_form/connect.php';
date_default_timezone_set('Asia/Manila');
$datenow = date('Y-m-d');







 

                
 ?>
<!DOCTYPE html>
<html lang="en">


 <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

   <title>Myaccount</title>

    <!-- Custom fonts for this template-->
    <link href="../GCC/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../GCC/css/sb-admin-2.min.css?v=3" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Corben&display=swap" rel="stylesheet">
</head>
 
 
 <style type="text/css">

     @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap');
    *{
      font-family: 'Cairo', sans-serif;
    }
   body {
  background-color: #eeeeee;
   }
   .list-group-item{
    font-size: 13px;
    padding: 15px;
    text-align: center;
   }

   .sidebar{
    z-index: 9999 !important;
    position: fixed;
    width: 280px;
    background-color:#a2d2a9;
    height: 100%;
    top: 0;
    left: 0;
    display: none;
     transition: width 0.5s;
   }
  
#openside{
  display: none;
}
 @media screen and (max-width: 768px)   {
    .showsidebar{
    display:flex;
   
   }
   #openside{
  display: block;

  opacity: 35%;
}
#openside:hover {
    opacity: 100%;
}
   #hideinmobi{
    display: none;
   }
   #displayfull{
    width: 100%;
   }
   }




  
 </style>
 <!--<link rel="stylesheet" type="text/css" href="resp.css">-->

<body id="page-top" >

  <header class="fixed-top">
    
<nav class="navbar navbar-light bg-light shadow border-bottom border-success ">
  <a class="navbar-brand" href="../Myaccount/">
    <img src="img/gcc.png" width="30" height="30" class="d-inline-block align-top" alt="">
   <span class="text-gray-800"> My Account <?php  unset($_SESSION['reload']) ?></span>

  </a>

  
        <a class="nav-item" style="text-decoration: none;font-size: 13px" id="logout" href="#">Logout <i class="fas fa-sign-out-alt"></i></a>
     
</nav>

  </header>

                     <?php 
                        if(isset($_GET['convo'])){
                            $convo = $_GET['convo'];

                        }

                         ?>
 

    <div class="container mt-5">
        
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="card shadow mt-4">

                    <div class="card-body" >
                        <button class="btn btn-light text-danger deleteconvo" data-tp = "<?php echo $convo ?>" style="font-size:13px"><i class="fas fa-trash"></i> Delete Conversation</button>
                   
                        <hr>
                        <div class="messages container" id="messages" style="height: 400px; overflow-y:scroll;overflow-x: hidden;">
                         
                        </div>

                        
                       <div class="card">
                           <div class="car"></div>
                       </div>



                    </div>
                    <div class="card-footer">
                        <div class="row">
                              <div class="col-md-10">
                           <textarea class="form-control" id="sms_content" style="font-size: 13px;resize: none;" rows="5" placeholder="Type your message here.."></textarea>
                       </div>
                       <div class="col-md-2">
                      
                         <button class="btn btn-light text-success form-control sendmessage" data-tp = "<?php echo $convo ?>" style="font-size: 14px">Send <i class="fas fa-paper-plane"></i></button>  

                              <button class="btn btn-light text-primary reloadpage form-control mt-3" style="font-size: 12px;">Reload <i class="fas fa-sync"></i></button>
                       </div>



                        </div>
                     
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>


    </div>
  
 
    

   
    <script type="text/javascript" src="../js/jquery.js"></script>



<?php 

    if(isset($_GET['convo'])){

        $convo = $_GET['convo'];
        if($convo == 'gcc'){
             ?>
        <script type="text/javascript">
             $(document).ready(function() {
          $('#messages').scrollTop($('#messages')[0].scrollHeight);
    
      });
     messages();

     $('.deleteconvo').click(function(){

         var tp = $(this).data('tp');

         Swal.fire({
  title: 'Are you sure to delete conversation?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
        
         $.ajax({
             url : "sms.php",
              method: "POST",
             data  : {deleteconvo:tp},
              success : function(data){
              messages();   
               }
             })    


  }
})
                       
     })

        $('.sendmessage').click(function(){
        var val = $('#sms_content').val();
        var tp = $(this).data('tp');
                  $(this).html('Sending <i class="fas fa-spinner fa-pulse"></i>');
                  $('#sms_content').attr('readonly','true');
               if(val == ''){
                    
                  var i =   setInterval(function(){
                          $('.sendmessage').html('Send <i class="fas fa-paper-plane"></i>');
                          $('#sms_content').addClass('is-invalid').attr('placeholder','Please input your message');
                            $('#sms_content').removeAttr('readonly');
                        clearInterval(i);
                      },1000);
               }else {

                    $.ajax({
                             url : "sms.php",
                              method: "POST",
                             data  : {sendsms:tp,val:val},
                              success : function(data){

                              messages();      
                              $('#sms_content').val('');
                              $('.sendmessage').html('Send <i class="fas fa-paper-plane"></i>');
                                $('#sms_content').removeAttr('readonly');
                                $('#sms_content').focus();
                               }
                             })

               }   
                              

                         
                     
            

                        
                  
        })

                $('#sms_content').keyup(function(){
            var value = $(this).val();

            if(value ==''){

            }else {
                $('#sms_content').removeClass('is-invalid').attr('placeholder','Write your message here ..');
            }
        
        })

     $('.reloadpage').click(function(){
          messages();             
     })
  var hidethis = setInterval(function(){
    $('#requestalert').hide();
clearInterval(hidethis);
  },5000);      
        
             function messages(){
         $.ajax({
         url : "sms.php",
          method: "POST",
         data  : {smsgcc:1},
          success : function(data){
            $('#messages').html(data);
             $('#messages').scrollTop($('#messages')[0].scrollHeight);
           }
         })
    }

        </script>
        <?php
        }else {
             ?>
        <script type="text/javascript">

             $(document).ready(function() {
          $('#messages').scrollTop($('#messages')[0].scrollHeight);
    
      });
     messages();

     $('.deleteconvo').click(function(){

         var tp = $(this).data('tp');

         Swal.fire({
  title: 'Are you sure to delete conversation?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
        
         $.ajax({
             url : "sms.php",
              method: "POST",
             data  : {deleteconvo:tp},
              success : function(data){
              messages();   
               }
             })    


  }
})
                       
     })

        $('.sendmessage').click(function(){
        var val = $('#sms_content').val();
        var tp = $(this).data('tp');
                  $(this).html('Sending <i class="fas fa-spinner fa-pulse"></i>');
                  $('#sms_content').attr('readonly','true');
               if(val == ''){
                    
                  var i =   setInterval(function(){
                          $('.sendmessage').html('Send <i class="fas fa-paper-plane"></i>');
                          $('#sms_content').addClass('is-invalid').attr('placeholder','Please input your message');
                            $('#sms_content').removeAttr('readonly');
                        clearInterval(i);
                      },1000);
               }else {

                    $.ajax({
                             url : "sms.php",
                              method: "POST",
                             data  : {sendsms:tp,val:val},
                              success : function(data){

                              messages();      
                              $('#sms_content').val('');
                              $('.sendmessage').html('Send <i class="fas fa-paper-plane"></i>');
                                $('#sms_content').removeAttr('readonly');
                                $('#sms_content').focus();
                               }
                             })

               }   
                              

                         
                     
            

                        
                  
        })

                $('#sms_content').keyup(function(){
            var value = $(this).val();

            if(value ==''){

            }else {
                $('#sms_content').removeClass('is-invalid').attr('placeholder','Write your message here ..');
            }
        
        })

     $('.reloadpage').click(function(){
          messages();             
     })
  var hidethis = setInterval(function(){
    $('#requestalert').hide();
clearInterval(hidethis);
  },5000);      
        
             function messages(){
         $.ajax({
         url : "sms.php",
          method: "POST",
         data  : {smsgc:1},
          success : function(data){
            $('#messages').html(data);
             $('#messages').scrollTop($('#messages')[0].scrollHeight);
           }
         })
    }

        </script>
        <?php
        }
       
    }

 ?>
  

 



         

<script src="../offline/sweetalert.js"></script>
<script src="../js/jquery.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
       $('#logout').click(function() { 
  Swal.fire({
  title: 'Are you sure you want to leave?',
  text: "",
  icon: 'question',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes'
}).then((result) => {
  if (result.isConfirmed) {
  // 
   $.ajax({
   url : "action.php",
    method: "POST",
   data  : {logout:1},
    success : function(data){
    window.location.href="../logout.php";
     }
   })

  }
})
    })
  });
        
        
</script>


      


    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    
    <!-- Bootstrap core JavaScript-->
    <script src="../GCC/vendor/jquery/jquery.min.js"></script>
    <script src="../GCC/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../GCC/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../GCC/js/sb-admin-2.min.js"></script>

   

</body>

</html>