<?php 
session_start();

include 'GCC/create_form/connect.php';
if($con){

$sqlbanner = "SELECT * FROM `form_classification` ";
if($resultbanner = mysqli_query($con,$sqlbanner)){
     $_SESSION['ConnectionEstablished']=1;                                                    
}else {
 
  $_SESSION['errorconnection']=5;

 header('location:configuration/');

                                                   
}
}else { $_SESSION['errorconnection']=5;
  unset($_SESSION['ConnectionEstablished']);
  header('location:configuration/');
}

include 'notices.php';
include 'ip_checker.php';

if(isset($_SESSION['checkpoint'])){
     header('location:checkpoint.php');
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
    <link rel="stylesheet" type="text/css" href="homepage.css?v=14">
    
    <style type="text/css">

    </style>
    <?php 
 
    include 'clr.php';
     ?>
</head>
<body style="background: rgb(255,255,255);
background: linear-gradient(0deg, rgba(255,255,255,1) 9%, rgba(244,254,243,1) 28%, rgba(254,254,254,1) 56%, rgba(240,240,240,1) 74%, rgba(229,241,229,1) 84%, rgba(214,236,215,1) 89%, rgba(190,231,191,1) 96%);overflow-x: hidden;" id="page-top">
	
	<script type="text/javascript">
		
		window.onscroll = function() {myFunction();};

function myFunction() {
  var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
  var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
  var scrolled = (winScroll / height) * 100;
  document.getElementById("myBar").style.width = scrolled + "%";
}      






	      	
	</script>

						<?php 
           
                                  		$imageheader = " SELECT * FROM `photoalbum` where status = 1  ";
                                                  $resultsst = mysqli_query($con,$imageheader); // run query
                                                  $countsst= mysqli_num_rows($resultsst); // to count if necessary
                                                 //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
                                               if ($countsst>=1){
                                               	//while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                                                   while($row = mysqli_fetch_array($resultsst)){
                                                   	$srcimageheader = 'GCC/img/'.$row['photo'];
                                  					
                                                   }
                                            }
                         ?>

	

   <div class="container-fluid" id="header_">
      <div class="row">
         <div class="col-md-1"></div> 
          <div class="col-md-10">
            <header style=" background-image: url('<?php echo $srcimageheader ?>');">

      <div id="background">
        </div>
 <div class="header-content">


            
 
    <img src="GCC/img/gcc.png" style="user-select: none">
    <h3 style="font-weight: bolder;user-select: none" class="text-light">
        <?php 
                                              $sqlbanner = "SELECT * FROM `gui` where id = 3 ";
                                                          if($resultbanner = mysqli_query($con,$sqlbanner)){
                                                               while($row = mysqli_fetch_array($resultbanner)){
                                                           
                                                  echo $row['sidebar_banner'];
                                                           }
                                                       }else {
                                                        echo 'aww';
                                                       }
                                                       
                                                      
                                                        
                                                    
                                           ?>

    </h3>
    </div> 
  </header>

 

  <?php include 'navigation.php' ?>
          </div> 
           <div class="col-md-1"></div> 
         
      </div> 
      
   </div> 
   


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

 
  

   <?php 
   if(isset($_GET['links'])){ 
    $redirect = $_GET['redirect'];
    
    ?>
     <div class="container-fluid">
        <div class="row">
           <div class="col-md-1"></div> 
           <div class="col-md-10">
             
          
     
    <?php

    if(isset( $_GET['services'])){
      $services = $_GET['services'];
      $redirect = $_GET['redirect'];

       include 'services.php';
    }else {
      include 'redirect.php';

    }
   
    ?>

     </div> 
           <div class="col-md-1"></div> 
           
        </div> 
        
     </div> 
    
    <?php


   }else {
    ?>

     <div class="content mt-1">
    
  

         <div class="container-fluid">
            <div class="row">
               <div class="col-md-1"></div> 

               <div class="col-md-10">




                 <div class="banner">
      
      <?php include 'carousel.php' ?>

   </div> 

  

                     <?php include 'announcement.php' ?>
               </div>
               <div class="col-md-1"></div>
               
            </div> 
            
         </div> 
         
    
   

 <div class="container-fluid mt-4">
       <div class="row" style="background-color: #ddf3ed; padding: 10px">
         <div class="col-md-1"></div> 
         
         <div class="col-md-3">
               <div class="card shadow" id="">
                 <div class="card-body">
                    <?php include 'todays_event.php' ?>
                 </div> 
                 
               </div>

               <div class="card shadow mt-2" id="calendar_events">
               <div class="card-header">
                <h6 class="text-success" style="font-style: italic">
                  Calendar Events
                </h6>
               </div> 
               
               <div class="card-body container-fluid">
               <?php include 'calendar_events.php' ?>
               </div> 
               
             </div> 


              <div class="card shadow mt-2" id="contactus">
                 <div class="card-body">
                
                   <button class="btn btn-light border-success mb-4"   style="font-size: 13px;width: 100%">Message Us</button>
                  
                    <span style="font-size: 14px;font-weight: bold">Contact Us:</span>
                    <ul style="font-size: 13px">
                      <li>Smart/TNT
                        <ul>
                          <li><span class="text-success">09994692600</span> </li>
                          <li><span class="text-success">09608883177</span></li>
                        </ul>

                      </li>
                      <li>Globe/TM
                        <ul>
                            <li><span class="text-success">09760447489</span> </li>
                             <li><span class="text-success">09357155135</span> </li>
                              <li><span class="text-success">09354695176</span> </li>
                               <li><span class="text-success">09760838439</span></li>
                        </ul>

                      </li>
                     
                     
                     
                    </ul>

                 </div> 
                 
              </div> 
                
               

            </div> 
           <div class="col-md-7 ">
            
              
              

                      <ul class="nav nav-tabs" id="navis">
  <li class="nav-item">
    <a class="nav-link active text-primary" id="articlenav" href="javascript:void(0)">Articles</a>
  </li>

  <li class="nav-item">
    <a class="nav-link text-secondary" id="peerfacilitatornav" href="javascript:void(0)">Peer Facilitator</a>
  </li>
 
</ul>


   <div class="card">
     <div class="card-body">
         <div class="newsfeed" id="articles">
          <?php include 'article.php' ?>
         

         </div>


         <div id="peerfacilitator_content" class="newsfeed d-none">
            <?php include 'peerfacilitator.php' ?>
           
         </div> 
         


     </div> 
                
         </div> 
               
           

                                                       
             

      
         

          <div class="row">
              
               <div class="col-md-6">
                 <?php include 'videocontents.php' ?>

               </div> 

               <div class="col-md-6">
                 
                   <div class="card shadow mt-2">
                      <div class="card-body">
                        Calendar Activities 
                        <span style="float: right;"><a href="?links&redirect=Calendar" style="font-size: 13px">View</a></span>

                       
                      </div> 
                      
                   </div> 


                     <?php 
                   



  $sqlothers = " SELECT * FROM `others`  ";
       $resultothers = mysqli_query($con,$sqlothers); // run query
       $countothers= mysqli_num_rows($resultothers); // to count if necessary
                                                                       //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
         if ($countothers>=1){
                                                                       //while($row = mysqli_fetch_array($result)){} is where we output all the data in database
         while($row = mysqli_fetch_array($resultothers)){
           ?>

            <div class="card shadow-sm mt-2">
      <div class="card-body">
        <h5 class="card-title" style="font-size: 14px"><?php echo $row['title'] ?></h5>
        <p class="card-text" style="font-size: 12px"><?php echo $row['feature'] ?></p>
        <a href="<?php echo $row['btnlink'] ?>" target="_blank" style="font-size: 13px" class="btn btn-link"><?php echo $row['btnname'] ?></a>
      </div>
    </div>
          
        <?php
            }
           }

         

     ?>
                   

               </div> 
               


          </div>
       
       </div> 
        <div class="col-md-1"></div> 
        
       <hr>

         <div class="row mt-4">
          
           
            
           
           
           

      </div> 


       
     </div> 
     

    
      
 </div>
</div>
  

    <?php
   }


    ?>
     
  
 



  
  
<script type="text/javascript">
  
  $(document).ready(function() {
          
    $('#peerfacilitatornav').click(function() { 
      $('#articlenav').removeClass('text-primary');
      $('#articlenav').addClass('text-secondary');
      $('#articlenav').removeClass('active');
      $(this).removeClass('text-secondary');
      $(this).addClass('text-primary');
      $('#articles').addClass('d-none');
      $('#peerfacilitator_content').removeClass('d-none');


    })


    $('#articlenav').click(function() { 
      $('#peerfacilitatornav').removeClass('text-primary');
      $('#peerfacilitatornav').addClass('text-secondary');
      $('#peerfacilitatornav').removeClass('active');
      $(this).removeClass('text-secondary');
      $(this).addClass('text-primary');
      $('#articles').removeClass('d-none');
      $('#peerfacilitator_content').addClass('d-none');
    
    })
        });      
        
</script>

<style type="text/css">
  #quicklinks li a{
    font-size: 13px
  }

 .linksss  a {

    text-decoration-style: none;
    font-size: 12px;
    margin: -10px;

 }
 .linksss span {
    font-size: 12px;
 }
</style>



<footer class="mt-4 bg-secondary text-light">
		<div class="row">
                <div class="col-md-4 mt-3" style="border-right:1px dotted #bfc8be">
                    <div class="container" style="text-align:center;">
                      <img src="GCC/img/gcc.png" style="width: 80px">
                    <br style="user-select: none">
                    <h6>Western Mindanao State University</h6>
                    <h6 style="font-size: 13px">Guidance and Counseling Center</h6>
          <h6 style="font-size: 13px">Development &middot; 2021</h6>
                       
                    </div>
                   

                </div>   
                 <div class="col-md-4 mt-3">
                    <div class="row linksss">
                        <div class="col-md-4">
                            <a href="../wmsugcc/" class="btn btn-link text-light" >Home</a>
                            <a href="?links&redirect=Contact Us" class="btn btn-link text-light" >Contact Us</a>
                            <a  class="btn btn-link text-light" href="?links&redirect=Guidance Staffs">Guidance Staffs</a>
                        </div>
                         <div class="col-md-3">
                             <span>About</span><br>
                          
                     <a  class="btn btn-link text-light" href="?links&redirect=Rationale">Rationale</a> 
                       <a  class="btn btn-link text-light" href="?links&redirect=Vision">Vision</a>
                       <a  class="btn btn-link text-light" href="?links&redirect=Mission">Mission</a>
                      <a  class="btn btn-link text-light" href="?links&redirect=Objectives">Objectives</a>
                       <a class="btn btn-link text-light" href="?links&redirect=Developers">Developers</a>
                         </div>
                          <div class="col-md-4">
                              <span>Services</span>

                       <?php 
          $sql = " select * from pages where type = 2   ";
                      $result = mysqli_query($con,$sql); 
                      $count= mysqli_num_rows($result); 
                 
                       while($row = mysqli_fetch_array($result)){
                       $active = $row['active'];
                      $content = $row['content'];

                      ?>

                   

                      <a  class="btn btn-link text-light" href="?links&redirect=<?php echo $row['pageid']?>&services=<?php echo $row['title'] ?>"><?php echo $row['title'] ?></a>
                      <?php


                
                       }
                    


       ?>
                          </div>

                    </div>

                     
                 </div> 
                  <div class="col-md-4">
                        <div class="row linksss">
                            <div class="col-md-4 mt-3">
                                  <span>Activities</span><br>
                               <a  class="btn btn-link text-light" href="?links&redirect=Calendar">Calendar</a>
                      <a  class="btn btn-link text-light" href="?links&redirect=Events">Events</a>
                                
                            </div>
                            <div class="col-md-8">
                                 <img src="GCC/img/kindpng_42666.png" class="mt-4" style="width: 100%;height: 80px">
           <h6 class="" style="font-size: 13px;text-align: center;color:#b2ded1">Normal Road, Baliwasan <br> 7000 <br> Zamboanga City Philippines</h6>

                            </div>

                        </div>


                  </div>    
        </div>

        <br>
</footer>


  
  <!-- Button trigger modal -->
 






	<script src="js/jquery.js"></script>
     <script type="text/javascript">
           $(document).ready(function() {
               if($(window).width() < 769)
{
    //axaxxaxaxa

    $('#header_').removeClass('container-fluid');
} 

         
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
