<?php 
session_start();

 if(!isset($_SESSION['admingcc_token'])) {
    header("location:../../session_end.html");
  }
  
unset($_SESSION['dorder']);
unset($_SESSION['sectionset']);
unset($_SESSION['viewing_customforms']);
unset($_SESSION['studentform_toview']);
 ?>


<!DOCTYPE html>
<html>

<head>
	 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortout icon" type="image/x-icon" href="wmsu.png">
   <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../../offline/bootstrap.css" rel="stylesheet" >
    <script src="../../js/jquery.js" ></script>
  <script src="../../offline/popper.js" ></script>
  <script src="../../offline/bootstrap.js" ></script>
	<link href="https://fonts.googleapis.com/css2?family=Gruppo&family=Londrina+Solid:wght@300&display=swap" rel="stylesheet">



	
<title>WMSU Guidance and Counceling</title>
 <style type="text/css">
	 @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap');
		*{
			font-family: 'Cairo', sans-serif;
		}
	 </style>
<style type="text/css">
	
	header {
		width: 100%;
		height: 100px;
		background-color: #63a284;
		border-bottom: 5px solid #2b7aaa;
		cursor: default;
	
	}

	h1 {
		padding: 20px;
		float: right;
		text-shadow: 2px 2px #1a3b50;
		color: #62625d;
	}
	h3 {
		text-shadow: 1px 1px #1a3b50;
		cursor: default;

	}
	.action:hover{
		border: 2px solid #2b6c84;
	}
	.colored {
		height: 5px;
		background-color:#2b7aaa;
		width: 100%;
		z-index: 1;
		position: fixed;
		top: 0;
	}
	footer {

		border-top: 5px solid #2b7aaa;
	background-color: #63a284;
	
	position: relative;
	margin:auto;
	margin-top:100px;
	padding: 45px;
	left: 0;
	bottom: 0;
	width: 100%;
	height: 280px;
	cursor: default;

	}
	.wmsuimage {
		height: 120px;
		
	}
	#closebtn:hover {
		color: #9a2626;
	}
</style>
<script type="text/javascript">
	$(document).ready(function() {
		

	
	window.onscroll = function() {myFunction()};

var navbar = document.getElementById("sticknav");
var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
   $('#sticknav').addClass('colored');
  } else {
     $('#sticknav').removeClass('colored');
  }
} 

$('#add').click(function() { 
     $('.titletext').focus();
     }) 


     $('.managecontent').click(function() { 
      var csformid = $(this).data('csformid');
           
          
               
             var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
             if (this.readyState == 4 && this.status == 200) {
            const data = this.responseText;
          
          window.location.href= "../create_form";
                         }
                      };
              xhttp.open("POST", "form_session.php",true);
              xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
              xhttp.send("setedit=1&csformid="+csformid);
                  
                           
    }) 


  jQuery(document).ready(function() {
     jQuery("time.timeago").timeago();
      });
                                    
                                  
                             

 
   });   	
</script>
<script src="../include/assets/js/timelapse.js" type="text/javascript"></script>   
	<?php 
	include '../Classes/sql_query.php';
	$fetch = new sqlquery();
	 ?>
	  <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

	 <style type="text/css">
	 	body{
	 		 font-family: "Nunito", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
	 	}
	 </style>
</head>
<body style="background-color: #d8d5dd; " >
	
		<header>
			<h1>Guidance Counceling Center Form</h1>
			

		</header>
 <div id="sticknav"></div> 


		
		 		 <div class="container" style="padding-top: 30px;">
		 		 		<a href="javascript:void(0)" onclick="window.location.href='../Forms/'" style="text-decoration: none">&larr; Back to Home</a><br><br>
		 		 	
		 		 <div class="row">
		 		 	
		 		 		<div class="col-sm-3">
		 		 			<a href="javascript:void()" id="addnewform"  style="text-decoration: none;">
		 		 			<div class="card action" style="height: 300px; border-radius: 10px; border-bottom: 7px solid #389a9a">
		 		 			
		 		 			  <div class="card-body">
		 		 			   	<i class="far fa-plus-square"></i>
		 		 			   	<h5>Add new Form <br>
		 		 			   		<hr>
		 		 			   	<p style="font-weight: normal;color: grey;font-size: 14px">Create a new form..
		 		 			   		<br>Which may consist of : 
		 		 			   		<ul style="font-weight: normal;color: grey;font-size: 14px">
		 		 			   			<li>Title</li>
		 		 			   			<li>Question <br>with(corresponding choices)</li>
		 		 			   			

		 		 			   		</ul>
		 		 			   	</p>
		 		 			   	</h5>

		 		 			  
		 		 			  </div>
		 		 			</div>
		 		 			</a>
		 		 			<p></p>
		 		 		</div>

		 		 		<div class="col-sm-3">
		 		 			<a href="javascript:void()" id="erq" data-toggle="modal" data-target=".bd-example-modal-lg" data-backdrop="static" data-keyboard="false" style="text-decoration: none">
		 		 			<div class="card action" style="height: 300px;border-radius: 10px;border-bottom: 7px solid #389a9a">
		 		 			
		 		 			  <div class="card-body">
		 		 			   		<i class="far fa-edit"></i>
		 		 			   	<h5>Manage Forms <br>
		 		 			   		<hr>
		 		 			   	<p style="font-weight: normal;color: grey;font-size: 14px">
		 		 			   		Manage existing forms and their contents, edit, delete, Modify questions, choices and arranged elements(drag and drop)
		 		 			   		to a specified location. 

		 		 			   	</p>
		 		 			   	</h5>
		 		 			  </div>
		 		 			</div>
		 		 			</a>
		 		 			<p></p>
		 		 		</div>
		 		 		<div class="col-sm-3">
		 		 			<a href="javascript:void()" id="respo" style="text-decoration: none;" data-toggle="modal" data-target="#responses" data-backdrop="static" data-keyboard="false">
		 		 			<div class="card action" style="height: 300px;border-radius: 10px;border-bottom: 7px solid #389a9a">
		 		 			
		 		 			  <div class="card-body">
		 		 			   	<i class="fas fa-reply-all"></i>
		 		 			   	<h5>Responses<br>
		 		 			   		<hr>
		 		 			   	<p style="font-weight: normal;color: grey;font-size: 14px">
		 		 			   		A custom form responded by any individual who received the link of the form.
		 		 			   	
		 		 			   		<br><br>
		 		 			   		
		 		 			   	</p>
		 		 			  
		 		 			   		
		 		 			   	

		 		 			   	</h5>
		 		 			  </div>
		 		 			</div>
		 		 			</a>
		 		 			<p></p>
		 		 		</div>
		 		 		<div class="col-sm-3">
		 		 			<a href="javascript:void()" style="text-decoration: none" data-toggle="modal" data-target="#sendformlinks" data-backdrop="static" data-keyboard="false" id="sendlinkclick">
		 		 			<div class="card action" style="height: 300px;border-radius: 10px;border-bottom: 7px solid #389a9a">
		 		 			
		 		 			  <div class="card-body">
		 		 			   	<i class="far fa-share-square"></i>
		 		 			   	<h5>Send Form Links <br>
		 		 			   		<hr>
		 		 			   	<p style="font-weight: normal;color: grey;font-size: 14px">
		 		 			   			Send link to almost everyone, <br>
		 		 			   			<ul style="font-weight: normal;color: grey;font-size: 14px">
		 		 			   				<li>Via Email</li>
		 		 			   				<li>Copy link</li>
		 		 			   				
		 		 			   			</ul>

		 		 			   	</p>
		 		 			   	</h5>
		 		 			  </div>
		 		 			</div>
		 		 			</a>
		 		 			<p></p>
		 		 		</div>


		 		 </div>



		 		 </div> 
		 		 <hr >
		 		  <div class="container" style="cursor: default;">

		 		  	<h3>RECENT</h3>

		 		  	<?php 
		 		  	$fetch ->setrecentcontent();
		 		  	 ?>


				
		 		  </div> 
		 		  
		
		

<?php include 'manage_form_modal.php';
	if(isset($_GET['viewresponse'])){ 
		?>
		<script type="text/javascript">
			
			   $('#responses').modal({
                        backdrop: 'static',
                        keyboard: true, 
                        show: true
                });       
		      	
		</script>
		<?php
		
	}else if(isset($_GET['manageform'])){
			?>
		<script type="text/javascript">
			
			   $('#manageform').modal({
                        backdrop: 'static',
                        keyboard: true, 
                        show: true
                });       
		      	
		</script>
		<?php
	}else if(isset($_GET['createform'])){
			?>
		<script type="text/javascript">
			 $(document).ready(function() {
			 	$('#addnewform').click();
			 });
		</script>
		<?php
	}else if(isset($_GET['sendformlink'])){
			?>
		<script type="text/javascript">
			
			   $('#sendformlinks').modal({
                        backdrop: 'static',
                        keyboard: true, 
                        show: true
                });       
		      	
		</script>
		<?php
	}

 ?>
	<script src="../../offline/sweetalert"></script>
	<script type="text/javascript">
		
		$('#addnewform').click(function() { 
			

			 Swal.fire({
  input: 'text',
  inputLabel: 'Enter Title',
  inputPlaceholder: 'Type your message here...',
  inputAttributes: {
    'aria-label': 'Type your message here'
  },
  showCancelButton: true
}).then((result) => {
			  if (result.isConfirmed) {
			  var text =  $('.swal2-input').val();
			  
			  if(text == ''){
			  	Swal.fire(
			  'Invalid attempt',
			  'This field is required!',
			  'error'
			).then((result) => {
					if (result.isConfirmed) {
						$('#addnewform').click();
					}
			})

			  }else{
			  		
			  		 var xhttp = new XMLHttpRequest();
			  		xhttp.onreadystatechange = function() {
			  		 if (this.readyState == 4 && this.status == 200) {
			  		const data = this.responseText;
			  	
			  				Swal.fire(
			  'Well done!',
			  'Form Created Successfully!',
			  'success'
			).then((result) => {
					if (result.isConfirmed) {
						window.location.href="../create_form/index.php";
					}
			})
			  	
			  					       }
			  					    };
			  			xhttp.open("POST", "form_session.php",true);
			  			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			  			xhttp.send("formname="+text);
			  					
			  	      	      	 


			  
			  }
			  }
			})








		})


		$('#respo').click(function() { 
			
			response_view();
		})
		function response_view(){
     
         var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
         if (this.readyState == 4 && this.status == 200) {
        const data = this.responseText;
      
         $('.response-content').html(data);
         var size = $(".response-content > .ele").length;
        $('#numberofres').text(size);
                     }
                  };
          xhttp.open("POST", "response_view.php",true);
          xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          xhttp.send("response_content=1");
              
                       
     }
	      	
	</script>


<!--<footer>
		 <div class="container">
		 	<div class="row">
		 		<div class="col-sm-3" style="text-align: center;">
		 			 <div class="" style="">
		 			 
		 			<h6 style=" text-align: center;"><span style="font-weight: bolder;font-size: 20px;">Western Mindanao State University</span> <br>Normal Road, Baliwasan
						7000 Zamboanga City
						Philippines</h6> 
						<p></p>
		 			<img src="../create_form/wmsu.png" class="wmsuimage">
		 			</div> 
		 			
		 		</div>
		 		<div class="col-sm-6" style="text-align: center;">
		 			Some Other TExt Here
		 		</div>
		 		<div class="col-sm-3">
		 			Follow Us @:
		 			<br>
		 			<a href="https://www.facebook.com/wmsu.edu.ph" target="_blank">
		 				<i style="padding: 15px;border: 1px solid #3dcaca; border-radius: 10px; background-color: rgb(15, 144, 242);color: white" class="fab fa-facebook-f"></i>
		 			</a>
		 			<a href="https://www.youtube.com/user/mistowmsu" target="_blank">
		 				<i style="padding: 15px;border: 1px solid #3dcaca; border-radius: 10px;background-color: rgb(255, 3, 3);color: white" class="fab fa-youtube"></i>

		 			</a>
		 			<a href="http://instagram.com/westernmindanaostateuniversity/" target="_blank">
		 				<i style="padding: 15px;border: 1px solid #3dcaca; border-radius: 10px;background-color: rgb(77, 125, 163);color: white" class="fab fa-instagram"></i>

		 			</a>
		 			<a href="https://twitter.com/twitwmsu" target="_blank">
		 				<i style="padding: 15px;border: 1px solid #3dcaca; border-radius: 10px;background-color: rgb(42, 169, 224);color: white" class="fab fa-twitter-square"></i>

		 			</a>
		 		</div>
		 	</div>
		 </div> 
		 
</footer> -->
	
	

	 
	 
</body>
</html>