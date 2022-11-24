<?php 
session_start();
if (!isset($_SESSION['form_id'])) {
	header('location:../Manage_pds/');
}
unset($_SESSION['sectioncard']);
$csform = $_SESSION['form_id'];	
 include '../Classes/sql_query.php';
 $setuser = new sqlquery();
 $setuser -> recentact();
 $setuser -> checksectionstats($csform);
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
<title>WMSU Guidance and Counceling</title>
<style type="text/css">
	
	.innerBar {
	 background: #617298;
   height: 2px;
   width: 0%;
   z-index: 1;
	}
	#closebtn:hover {
		color: #801919;
	}
</style>


 <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

	 <style type="text/css">
	 @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@300&display=swap');
		*{
			font-family: 'Cairo', sans-serif;
		}
	 </style>
</head>
						<?php
						include 'connect.php';
						$csform = $_SESSION['form_id'];	
										$setcolor = " select * from `form_classification` where csform_id = '$csform'  ";
								                $setcolored = mysqli_query($con,$setcolor); // run query
								              
								                 while($getcolor = mysqli_fetch_array($setcolored)){
													$bodybg = $getcolor['bodybg'];
													$titlebg = $getcolor['titlebg'];
													$questionbg = $getcolor['questionbg'];
													$bodytext = $getcolor['bodytext'];
								                 }
								          
						?>
<body style="background-color:<?php echo $bodybg ?>; color: <?php echo $bodytext ?>; ">
	 
	   <div class="innerBar"  style="position: fixed;z-index: 1000;"></div>
	<p><br><br></p>

	<div class="container">

		
			<?php // echo $_SESSION['Reordersectionid']; ?>
		
  
		
		<div id="titleform" style="font-weight: bolder; text-align: center; font-size:25px;cursor: default;"></div>

	<div class="row">

		<div class="col-sm-2">

		</div>
		<div class="col-sm-8">


					<br>
						<div data-spy="scroll" data-target="#list-example" data-offset="0" class="scrollspy-example">
					  	 <div id="content"></div> 
					  	</div>
					 <div style="margin-top: 400px;"></div> 
					 
		</div>
		<style type="text/css">
			#options {
				position:fixed; border: 2px solid #89a5d9;background-color:white;margin-top:-70px;padding: 40px;border-radius: 10px;overflow-y: scroll;height: 600px;
			}

			#options::-webkit-scrollbar {
  width: 0px;
}

		@media screen and (max-width :768px){
		#options {
				position: fixed;
				bottom: 10px;
				
				right: 10px;
				margin-top: 0px;
				display: block;
			}
			#clickopen{
				position: fixed;
				z-index: 9999;
				right: 40px;
				top: 10px;
			}	
		}


		</style>
		<div class="col-sm-2" id="opt" >
			<button style="position: fixed; right: 0;" class="btn btn-light d-none" id="clickopen"><i class="fas fa-chevron-circle-left text-primary"></i></button>
				  <div id="options"  style="  " >
					
				  		<button style="position: absolute; right: 0;" class="btn btn-light" id="clickclose"><i class="fas fa-chevron-circle-right text-primary"></i></button>
				  		<br>
				 	<h5 style="text-align: center;padding: 5px; border-bottom: 1px solid #bc8b1c;cursor: default;color: #181d26">OPTIONS</h5>
				 	<h6 style="color: grey;font-size: 12px;text-align: center;cursor: default;">ADD NEW</h6>

				 	 <button  class="dropdown-item add "      data-types='section' type="button" ><i class="far fa-object-group"></i> Group/Section</button>
						    

						 	 <button class="dropdown-item add able" disabled=""   data-types='title' href="#"> <i class="fas fa-heading"></i> Title</button>
						 	
						      <button     class="dropdown-item add quest able" disabled data-types='question' type="button" ><i class="far fa-question-circle"></i> Question</button>


						        <button  class="dropdown-item add able"  disabled    data-types='plaintext' type="button" ><i class="fas fa-align-left"></i> Plain Text</button>

						           <button  class="dropdown-item add able"  disabled=""    data-types='list' type="button" ><i class="fas fa-list"></i> List</button>


						            <button  class="dropdown-item add able"  disabled=""   data-types='file' type="button" ><i class="fas fa-paperclip"></i> Attachment</button>

						            
						   
						    <hr style="color: #bc8b1c;height: 2px">
						    	<h6 style="color: grey;font-size: 12px;text-align: center;cursor: default;">Others</h6>
						  		<!--<input type="color"  id="favcolor" name="favcolor" value="#c82d2d ">-->
						  <button class="dropdown-item  custom" style="color: #181d26" data-toggle="modal" data-target=".bd-example-modal-lg"   > <i class="fas fa-cogs"></i> Customize</button>
						  <?php 
						  $csform = $_SESSION['form_id'];	
						   ?>
						  <button class="dropdown-item viewform " data-csformid="<?php echo $csform ?>" style="color: #181d26"   ><i class="far fa-eye"></i> Live view</button>

						  <?php 
						  if ($csform == '62'){
						  	?>
						  	  <button  style="color: #181d26" class="dropdown-item"  data-toggle="modal" data-target="#exampleModal" data-backdrop="static" data-keyboard="false"   > <i class="far fa-check-circle"></i> Save & Exit </button>
						         <hr style="color: #bc8b1c;height: 2px;">
						  	<?php
						  }else {
						  	?>
						  	  <button id="homesss" style="color: #181d26" class="dropdown-item home"    > <i class="far fa-check-circle"></i> Save & Exit </button>
						         <hr style="color: #bc8b1c;height: 2px;">
						  	<?php

						  }

						   ?>
						     


						      <h6 style="color: grey;font-size: 12px;text-align: center;cursor: default;">SORT</h6>
						    <!--   <button class="dropdown-item quest reorder "     disabled=""> <i class="fas fa-sort"></i> Re-Order </button>-->
						        <button class="dropdown-item toppage"    > <i class="fas fa-caret-up"></i> Top </button>
						        <button class="dropdown-item bottompage"   > <i class="fas fa-caret-down"></i> Bottom </button>
						    </div> 
						  
		</div>
	</div>
	</div>




	<script type="text/javascript">
		
		$(document).ready(function() {

		


			$('.bottompage').click(function() { 
				       $("html, body").animate({
                    scrollTop: $(
                      'html, body').get(0).scrollHeight
                }, 500,'linear');
			})
			$('.toppage').click(function() { 
				 $("html, body").animate({
							    scrollTop: 0
							  }, 500)
			})

		      	$('#clickopen').click(function() { 
		      		$(this).addClass('d-none');
		      		$('#options').removeClass('d-none');
		      		 $("#options").animate({right: '20px'});
		      	
		      	})

		      	$('#clickclose').click(function() { 
		      		$("#clickopen").animate({right: '0px'});
		      		$('#clickopen').removeClass('d-none');
		      			 $("#options").animate({right: '-500px'});
		      			 	//$('#options').addClass('d-none');
		      			 var clear = setInterval(function(){

		      			 })
		      	
		      	})
		      });      
	      	
	</script>
	
	 <style type="text/css">
	 	.dropdown-item:active {
	 		background-color: #d6cece;
	 	}
	 	::-webkit-scrollbar {
  width: 3px;

}

/* Track */
::-webkit-scrollbar-track {
  background: #f1f1f1; 
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #7083b5; 
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555; 
}
	 </style>
	

	
	<!-- Button trigger modal -->

<div class="modal  bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
  	
   <div class="modal-content" >
   	<div class="modal-header" >
   		<h5 style="color: #181d26" >Customize Form</h5>

   		<span id="closebtn" data-dismiss="modal" style="cursor:pointer;"><i style="font-size: 20px;" class="far fa-times-circle"></i></span>
   	</div>
   	<div class="modal-body"  >
   		 <div class="container">
   		 	 <div class="row">
   		 	 		<?php
						include '../create_form/connect.php';
						
										$setcolor = " select * from `form_classification` where csform_id = '$csform'  ";
								                $setcolored = mysqli_query($con,$setcolor); // run query
								              
								                 while($getcolor = mysqli_fetch_array($setcolored)){
													$bodybg = $getcolor['bodybg'];
													$titlebg = $getcolor['titlebg'];
													$questionbg = $getcolor['questionbg'];
													$textcolortitle = $getcolor['textcolortitle'];
													$textcolorquestion = $getcolor['textcolorquestion'];
													$bodytext = $getcolor['bodytext'];
													?>
				<p style="font-size: 12px;color: grey">Click the box and select color, navigate and press save</p> 
   		 	 	<div class="col-sm-6">
   		 	 		 <div class="card">
   		 	 		 	 <div class="container">
   		 	 		 	 <p></p> 
   		 	 		<h6 style="color: #181d26"><span style="font-weight: bolder;">BODY</span> <br><br> background-color</h6>
   		 	 		
   		 	 		<input type="color"  id="favcolor"  name="favcolor" value="<?php echo $bodybg ?>" style="width: 100%;height: 80px; outline: none;border:none; cursor: pointer;">
   		 	 		<h6 style="color: #181d26">Text - color</h6>
   		 	 		
   		 	 		<input type="color"  id="favcolor5" name="favcolor" value="<?php echo $bodytext ?>" style="width: 100%;height: 40px; outline: none;border:none;">
   		 	 		<p></p>
   		 	 	</div>
   		 	 </div>
   		 	 	</div>
   		 	 	<div class="col-sm-6">
   		 	 	
   		 	 		 <p></p>
   		 	 		  <div class="card">
   		 	 		 	 <div class="container"> 
   		 	 		 	 	<p></p>
   		 	 		
   		 	 		<h6 style="color: #181d26"><span style="font-weight: bolder">QUESTION</span> <br><br>border-color</h6>
   		 	 		
   		 	 		<input type="color"  id="favcolor2" name="favcolor" value="<?php echo $questionbg ?>" style="width: 100%;height: 40px; outline: none;border:none;">

   		 	 		<h6 style="color: #181d26">Text - color</h6>
   		 	 		
   		 	 		<input type="color"  id="favcolor4" name="favcolor" value="<?php echo $textcolorquestion ?>" style="width: 100%;height: 40px; outline: none;border:none;">
   		 	 	</div>
   		 	 </div>
   		 	 	</div>
													<?php
								    }
								          
								?>
   		 	 
   		 	 </div> 
   		 	 
   		 </div> 
   		 



   	</div>
      <div class="modal-footer">
      	 
       	<button class="btn btn-primary savecustom" style="font-size: 14px">Save Changes</button>
      
      </div>
    </div>
     
  </div>
</div>



	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
	     
	      <div class="modal-body">
	        <form method="post" action="saveandexit.php" onsubmit="return false" id="exit" >
	           	                  
	       <input type="hidden" name="exitonly">
	       
				
				 <div class="container">
				 	<h6>Notify GC and Students</h6>		
				 	<hr>

				 	<span class="text-secondary" style="font-size: 14px"> IMPORTANT NOTICE : If the changes aren't too significant such as altering questions and spelling, you can uncheck those notifications or skip any notification.  <br><br>

				 		The following information is  <span class="text-danger">required</span> to notify the GC and students: 


				 		<ul class="text-danger">
				 			<li>Changing the options in the Question</li>
				 			<li>Modifying Options such as checkboxes or radiobuttons,adding or deleting</li>
				 			<li>Changing list to table or alternate</li>
				 			<li>Adding Question or Queries</li>
				 			<li>removing any questions or elements that the students could have already answered</li>
				 		</ul>
			

				 	</span>


		
		 <div class="row d-none">

		
		 
		 	 	
	

		 <div class="card shadow-sm">
		 	 <div class="card-body">
		 	 	<h6 style="text-align:center">

		  		<div class="form-check d-none">
	<input class="form-check-input" type="checkbox" name="gc" value="notegc" id="gc1" checked="" >
	<label class="form-check-label" for="gc1" style="float: left;">
		Notify
	</label>
		</div>
			Guidance Councilor System
			<br>
		<span class="text-secondary d-none" id="gcserr" style="font-size: 12px">GC Credibility will no longer be used to notify students to update their forms.</span>
		<span class="text-success" id="gcsucc" style="font-size: 12px">
			GC will be notified.
		</span>



			<div class="form-check">
	<input class="form-check-input d-none" type="checkbox" name="stud" value="notestudent" id="student" checked="">
	<label class="form-check-label" for="student">
		Students
	</label>
		</div>
		

		<span class="text-secondary d-none" id="studserr" style="font-size: 12px">Student's can still modify their PDS</span>
		<span class="text-success" id="studsucc" style="font-size: 12px">
			Students' accounts will be notified, and is required to update their respective PDS.
		</span>
		 	 	</h6>

		 	 </div> 
		 	 
		 </div> 
		 
		 	
		 	
		 	 	

		
		 
		 	 
		 	 
		 </div> 
		 
				<br>
				<span class="mt-3 text-secondary" style="font-size: 14px"><i class="fas fa-info-circle"></i> Manage Notifications for both the GC and the students. <br> Notify them of any changes to the forms. in order for them to update their respective forms</span>

			

				 		<hr>

				 		<div class="card shadow">
				 			<div class="card-body">
				 				<h6 style="font-size:14px">
				 					Choose on how the students will update their Personal Data Sheets

				 					<div class="row mt-2">
				 						<div class="col-md-4">
				 								 	 <div class="card">
	       		 				 	 	 	 <div class="card-body"  style="height: 200px;">

	       		 				 	 	 	 		<h6 class="text-primary" style="font-size: 14px;font-weight: bolder;">Retake the whole PDS</h6>
	       		 				 	 	 	 	<span style="font-size: 13px">This option allows the user to retake the PDS. With this option, the user's old PDS will be permanently deleted, and he or she will need to fill out his or her PDS again.

	       		 				 	 	 	 		<span class="text-danger"> This option is a priority. Once pressed. User will need to retake first their PDS. before the Updateonly option will be available.</span>
	       		 				 	 	 	 	</span>
	       		 				 	 	 	 </div> 
	       		 				 	 	 	 
	       		 				 	 	 	 <button type="button" class="btn btn-dark retakepds" style="font-size: 13px">Retake</button>
	       		 				 	 	 </div> 
	       		 				 	 	 
				 						</div>
				 						<div class="col-md-4">
				 								 <div class="card">
	       		 				 	 	 	 <div class="card-body" style="height: 200px;">

	       		 				 	 	 	 		<h6 class="text-primary" style="font-size: 14px;font-weight: bolder;">Update only</h6>
	       		 				 	 	 	 	<span style="font-size: 13px">This option allows the user to update his or her personal data sheet (PDS). The user can  response to the newly added queries. </span>
	       		 				 	 	 	 </div> 
	       		 				 	 	 	 
	       		 				 	 	 	 <button type="button" class="btn btn-dark updateonly" style="font-size: 13px">Update only</button>
	       		 				 	 	 </div> 

				 						</div>

				 						<div class="col-md-4">
				 									<div class="card">
				 											<div class="card-body"  style="height: 200px;">
				 													
				 														<h6 class="text-primary" style="font-size: 14px;font-weight: bolder;">Exit</h6>
	       		 				 	 	 	 	<span style="font-size: 13px">No Changes Done. <br> its auto update. </span>
	       		 				 	 	 	 </div> 
	       		 				 	 	 	 
	       		 				 	 	  <button type="submit" class="btn btn-dark " style="font-size:14px;float: right;" >Exit</button>

				 											</div>

				 									</div>


				 						</div>
				 					</div>


				 				</h6>
				 			</div>
				 		</div>
				 		<button type="button" class="btn btn-light text-danger mt-2" data-dismiss="modal" style="font-size:14px;float: right;"> Cancel</button>
				 	

				 </div> 
				 
			</form>
	       
	      </div>
	     
	    </div>
	  </div>
	</div>

	
 <script src="../../js/jquery.js"></script>
	<script src="../../offline/sweetalert.js"></script>
	<script>
	$(document).ready(function() {

		$('.retakepds').click(function() { 

			Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes!'
}).then((result) => {
  if (result.isConfirmed) {
  	
  	 $.ajax({
	                 url :'saveandexit.php',
	                  method: "POST",
	                   data  : {exit:1,gc:1,stud:1},
	                   success : function(data){
	      	window.location.href='../Manage_pds';

	      
	                   }
	                })
  }
})
			
		
		})
		$('.updateonly').click(function() { 
			
			window.location.href='update.php';
			/* $.ajax({
	                 url :'saveandexit.php',
	                  method: "POST",
	                   data  : {exitupdateonly:1,gc:1,stud:1},
	                   success : function(data){
	     window.location.href='../Manage_pds';
	     //	alert(data);
	                   }
	                })

	                */

		
		})
		$('.cancelsave').click(function() { 
			location.reload();
		
		})
 $('#student').click(function() {
      if($(this).prop("checked") == true) {

            $('#studserr').addClass('d-none');   
            $('#studsucc').removeClass('d-none');   
             $('#gc1').prop("checked",true);  
              $('#gcserr').addClass('d-none');   
            $('#gcsucc').removeClass('d-none');  

         }
      else if($(this).prop("checked") == false) {
            $('#studserr').removeClass('d-none');   
            $('#studsucc').addClass('d-none');  
             $('#gc1').prop("checked",false); 
              $('#gcserr').removeClass('d-none');   
            $('#gcsucc').addClass('d-none');     

       }
    });
 $('#gc1').click(function() {
      if($(this).prop("checked") == true) {

            $('#gcserr').addClass('d-none');   
            $('#gcsucc').removeClass('d-none');   
              $('#student').prop("checked",true);   
                $('#studserr').addClass('d-none');   
            $('#studsucc').removeClass('d-none');                    		
         }
      else if($(this).prop("checked") == false) {
            $('#gcserr').removeClass('d-none');   
            $('#gcsucc').addClass('d-none');  
              $('#student').prop("checked",false); 
                $('#studserr').removeClass('d-none');   
            $('#studsucc').addClass('d-none');                        
       }
    });


$('#exit').on('submit', function(event){
   event.preventDefault();

  
  		 $.ajax({
	                 url : $(this).attr('action'),
	                  method: "POST",
	                   data  : $(this).serialize(),
	                   success : function(data){
	      	window.location.href='../Manage_pds';
	      	//alert(data);
	                   }
	                })

  	


   		/*	

	                */
   });
		$('#homesss').click(function() { 

		
				 var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
				 if (this.readyState == 4 && this.status == 200) {
				const data = this.responseText;
			
					// Your condition here if data success.
				window.location.href='../Manage_pds';
							       }
							    };
					xhttp.open("POST", "opt_pro.php",true);
					xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					xhttp.send("donemodified=1");
							

			      	      	 
		
		})
		$('.savecustom').click(function() { 
				var body = $('#favcolor').val();
				var title = $('#favcolor1').val();
				var question = $('#favcolor2').val();
				var titletext = $('#favcolor3').val();
				var questiontext = $('#favcolor4').val();
				var bodytext = $('#favcolor5').val();

				  $.ajax({
			           url : "opt_pro.php",
			            method: "POST",
			             data  : {savecustom:1,body:body,title:title,question:question,titletext:titletext,questiontext:questiontext,bodytext:bodytext},
			             success : function(data){
							location.reload();
			             }
			          })
		
		})
		$('.home').click(function() { 
			
			   $.ajax({
			           url : "opt_pro.php",
			            method: "POST",
			             data  : {setlm:1},
			             success : function(data){
			
			             }
			          })
			     
			    
		})


		$('.innerBar').animate({ width: "100%" }, 1000);
		titleform();
		function titleform() {
			$.ajax({
			           url : "opt_pro.php",
			            method: "POST",
			             data  : {titleform:1},
			             success : function(data){
							
						$('#titleform').html(data);	
			             }
			          })

		}
	
		$('#btnsavetitle').click(function() { 
				var newtitle = $('#newtitle').val();
				var formid = $('#formmm').val();
			if(newtitle == '') {
				$('#commonerror').text('Input Value cannot be null **');
			}else {

				$.ajax({
			           url : "action.php",
			            method: "POST",
			             data  : {changetitle:1,inpvalue:newtitle,formid:formid},
			             success : function(data){
							content();
							checktitle();	
							location.reload();
							window.scrollTo(0,document.body.scrollHeight);

			             }
			          })

			}

		})
		$('#btnyes').click(function() { 
			var val = $(this).val();
			 $.ajax({
			           url : "action.php",
			            method: "POST",
			             data  : {deletetitle:1,id:val},
			             success : function(data){
								contents();
								deleteunexpected();
			             }
			          })
				
				
		})

		$('.add').click(function() { 
			var types =$(this).data('types');
				
			
			
			   $.ajax({
			           url : "action.php",
			            method: "POST",
			             data  : {add:1,types:types},
			             success : function(data){
			             	
							content();
							checktitle();	
							deleteunexpected();
							// $(document).scrollTop($(document).height());
							
							 
			             }
			          })
			   
		     
			    
		})

		
		content();
		function content() {
			
			  $.ajax({
			           url : "action.php",
			            method: "POST",
			             data  : {content:1},
			             success : function(data){
							$('#content').html(data);
							checktitle();	
							deleteunexpected ();
			             }
			          })
		}
		checktitle();
	
		function checktitle() {
				  $.ajax({
			           url : "opt_pro.php",
			            method: "POST",
			             data  : {checktitles:1},
			             success : function(data){
								var result = data;
								
							if (result.match('yes')){
								$('.able').removeAttr('disabled');
							}else  {

								$('.able').attr('disabled',true);
								

							}
							
							
							
			             }


			          })
		}
		deleteunexpected();
			function deleteunexpected () {
					$.ajax({
			           url : "opt_pro.php",
			            method: "POST",
			             data  : {delun:1},
			             success : function(data){
							
							
			             }
			          })
			}

			$('.reorder').click(function() { 
				
				window.location.href="rearrange.php";
			})

			  $('.viewform').click(function() { 
       var csformid = $(this).data('csformid');

        var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
             if (this.readyState == 4 && this.status == 200) {
            const data = this.responseText;
          
                window.location.href= "../Manage_pds/form_view.php";
                         }
                      };
              xhttp.open("POST", "../Manage_pds/form_session.php",true);
              xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
              xhttp.send("viewform=1&csformid="+csformid);

    })


	});
	</script>

</body>
</html>