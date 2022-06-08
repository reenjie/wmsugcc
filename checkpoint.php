<?php 
session_start();
if(!isset($_SESSION['checkpoint'])){
  header('location:index.php');
}else {
  
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

   <title>Checkpoint</title>

    <!-- Custom fonts for this template-->
    <link href="GCC/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="GCC/css/sb-admin-2.min.css?v=2" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="homepage.css?v=11">

      
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
@media screen and (max-width: 768px){
	#confirmcard {
		
	
	}

}

  </style>
    <?php include 'GCC/create_form/connect.php'; ?>
</head>
<body style="background-color: #e7f2e2">



				   
				    	<div class="row" id="rd">
				    		<div class="col-md-4"></div>
				    		<div class="col-md-4">
				    				
				    					<div class="card shadow mt-5" id="confirmcard">
				    		<div class="card-body">
				    			
             <h6>A confirmation code was sent to your Email : <span class="text-primary"><?php echo $_SESSION['useremail'] ?></span>. Kindly check your email for incoming Message containing the Code . <br>  <span class="text-danger" style="font-size:12px;font-weight:bolder"> Please be patient as the message may take some time to arrive.</span></span><span id="useremail" style="font-weight: bold;text-align: center;"></span></h6>
            
          <p></p>
         
              
               <div class="er text-danger d-none "  style="text-align: center;" ><span style="font-size: 14px">Incorrect Code</span></div>
   <div id="input" style="text-align: center;">
     <form method="post" action="verify.php" onsubmit="return false" id="confirmcode">
         <input type="hidden" name="checkcode">                   
    
    
    <input class="inputs " name="code[]" id="foc" type="text" pattern="[0-9]" maxlength="1" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required="" onload="select()" autofocus >
    <input class="inputs "  name="code[]"  type="text" pattern="[0-9]" maxlength="1" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required="">
    <input class="inputs "   name="code[]" type="text" pattern="[0-9]" maxlength="1" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required="">
    <input class="inputs "  name="code[]" type="text" pattern="[0-9]" maxlength="1" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required="">



    <button class="btn btn-primary mt-3" style="font-size: 14px;width:100%">Confirm</button>

    <button type="button" class="exit btn btn-light text-danger mt-2" style="float:right" onclick="window.location.href='logout.php'" >Exit</button>
     </form>
				    		</div>
				    	</div>

				    		</div>
				    		<div class="col-md-4"></div>
				    	</div>
				    
         
    
  					

</div>

  
<script src="js/jquery.js"></script>
<script type="text/javascript">
  
  $(document).ready(function() {

  	if($(window).width() <= 768 ){
  		$('#confirmcard').removeClass('card').removeClass('shadow');
  	
  	}

  

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
		 



		<script src="js/jquery.js"></script>
		 <script src="offline/sweetalert.js"></script>
	


 <!-- Bootstrap core JavaScript-->
    <script src="GCC/vendor/jquery/jquery.min.js?v=1"></script>
    <script src="GCC/vendor/bootstrap/js/bootstrap.bundle.min.js?v=1"></script>

    <!-- Core plugin JavaScript-->
    <script src="GCC/vendor/jquery-easing/jquery.easing.min.js?v=1"></script>

    <!-- Custom scripts for all pages-->
    <script src="GCC/js/sb-admin-2.min.js?v=1"></script>
  	

</body>
</html>