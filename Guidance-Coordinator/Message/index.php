<?php 
session_start();
 if(!isset($_SESSION['admin_token'] )){
    header('location:../../session_end.html');
  //
 }
  if(isset($_SESSION['first_time_login'])){
    if(isset($_SESSION['access_token'])){
        unset($_SESSION['first_time_login']);
    }else {
        include 'ft.php';
    }
    
  }

  include '../../GCC/create_form/connect.php';
date_default_timezone_set('Asia/Manila');
$datenow = date('Y-m-d');
$time = date('H');

      $chipuserid = $_SESSION['admin_token'];                           

    $admin = "select * from administrator where admin_id = '$chipuserid' ";

                                                    $resultcheck = mysqli_query($con,$admin); 
                                                    $countadmin= mysqli_num_rows($resultcheck); 
                                                
                                            
                                                 
                                                     while($row = mysqli_fetch_array($resultcheck)){
                                                   
                                                        $user = $row['admin_fname'].' '.$row['admin_lname'];
                                        
                                                     }

if($time < 12){
    $greetings = 'Good Morning '.$user.' !';
    $ff = 'Have a Great Day Ahead! ツ .';
}else if($time < 18){
    $greetings = 'Good Afternoon '.$user.' !';
    $ff = 'Awesome Day, Dont skip your Lunch ツ . ';
}else if ($time >= 18){
$greetings = 'Good Evening '.$user.' !';
$ff = 'Have a great Evening , Dont Forget your Dinner ツ .';


}




        if(!isset($_SESSION['donegreetings'])){
                    $_SESSION['donegreetings'] = 1;
                        ?>
                    <div class="alert alert-success alert-dismissible"  role="alert" data-dismiss="alert" style="position: fixed;z-index: 1; right: 30px; top:50px;align-items:center;width: auto; cursor: pointer;">
                        <div  style="display: flex; padding:5px; margin-right:-50px">
                              <h6 style="text-align:center;">
                                <strong><?php echo $greetings ?></strong>
                                <br>
                                <span style="font-size:13px"><?php echo $ff ?></span>
                                <br><br>
                                <span style="font-size:11px;">[ Close ]</span>
                            </h6>
                        </div>
                          
                    </div>
                    <?php

                }else {

                }

 ?>
<!DOCTYPE html>
<html lang="en">


 <?php include '../include/assets/head.php';?>
 <style type="text/css">
    @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap');
    *{
      font-family: 'Cairo', sans-serif;
    }
 </style>

<body id="page-top" > 

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!--sidebar-->
             
        <ul class="navbar-nav  sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: <?php echo $_SESSION['sidebar_colors'] ?>" >

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center mb-4" href="#">
                <div class="sidebar-brand-icon rotate-n-15">
                   <img src="../img/gcc.png" style="width: 50px;transform: rotate(15deg);">
                </div>
                <div class="sidebar-brand-text mx-3">
                    <?php 
                    echo $_SESSION['sidebar_banners'];
                   

                     ?>

                 <!--<sup>2</sup>--></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
              <div class="sidebar-heading">
               Reports
            </div>
            <!-- Nav Item - Dashboard -->
            <li class="nav-item ">
                <a class="nav-link" href="../Dashboard/">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider
            <hr class="sidebar-divider"> -->

            <!-- Heading -->
            <div class="sidebar-heading">
                Records
            </div>

        

            <!-- Nav Item - Charts -->

           
            <li class="nav-item " >
                <a class="nav-link" href="../PDS-Records/">
                   <i class="fas fa-clipboard-list"></i>
                    <span>PDS</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="../Shifting-Records/">
                   <i class="far fa-circle"></i>
                    <span>Shifting</span></a>
            </li>

               <div class="sidebar-heading">
                Manage
            </div>


              <li class="nav-item ">
                <a class="nav-link" href="../Referrals/">
                  <i class="fas fa-asterisk"></i>
                    <span>Referrals & Coaching</span></a>
            </li>


           
             <li class="nav-item">
                <a class="nav-link" href="../Students/">
                    <?php 
                     include '../../GCC/create_form/connect.php';
            $cid = $_SESSION['gc_collegid'];
                     $sql = " select * from student where stud_college ='$cid' and isverified = 0 ";
                            $result = mysqli_query($con,$sql); 
                            $count= mysqli_num_rows($result); 
                    if($count >= 1){
                        ?>
                           <span class="badge badge-danger" style="font-size:13px;" ><?php echo $count ?></span>
                        <?php
                    }else {
                        ?>
                        <i class="fas fa-users"></i>
                        <?php
                    }

                     ?>
              
               
                    <span>Students </span></a>
            </li>

           

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message 
            <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
                <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
                <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
            </div>-->

        </ul>
        <!--end of sidebar-->


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column" style="background:url('../img/nordwood-themes-KcsKWw77Ovw-unsplash.jpg');background-position: center;background-size: cover;background-attachment: fixed;">

            <!-- Main Content -->
            <div id="content">

                    <!--topbar-->
            <?php include '../include/assets/topbar.php';?>
                    <!--end of topbar-->





                <!-- Begin Page Content -->
                <div class="container-fluid">
                     <span class="text-gray-800" style="font-weight: bold;" id="tryfound"></span>
                     <div class="advancecontent_search row d-none" id="content_search" data-role="searchfor"> </div> 
                    
                      <div class="051715" id="051715"> 

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0  text-gray-800">Message</h1>
                        <!--<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
                    </div>

                    <!--contents here //// OFF-->
                     
                     

                    <div class="row mb-5">
                           

                    	<div class="container">
                    		<div class="card">
                    		<div class="card-body bg-light">
                    			
                    			<div class="row">
                    				<div class="col-md-4">
                    					<div class="card shadow" id="chatheads">
                    						<div class="card-header">
                    							<h6 class="text-primary" style="font-size:14px">

                    								
                    								Inbox



                    							</h6>

                    						</div>
                    						<div class="card-body" style="height: 500px; overflow-y:scroll;overflow-x: hidden;" id="inbox">
                    								
                    						</div>
                    					</div>

                    				</div>
                    				<div class="col-md-8" >
                    					
                    					<div class="card shadow">
                    						<div class="card-header">
                    							  <h6 class="text-primary" id="studname" style="font-size:13px">Select Conversation</h6>
                    						</div>
                    						<div class="card-body " style="height: 500px; overflow-y:scroll;overflow-x: hidden;" id="messages">
                    							
                    							
                           				<h6 style="text-align:center;" class="mt-5">
                           					<img src="../../GCC/img/undraw_empty_street_sfxm.png" style="width:400px"> <br>
                           				Open Conversation First
                           				</h6>




                    						</div>
                    						<div class="card-footer">
                    							 <div class="row">
                              <div class="col-md-9">
                           <textarea class="form-control" id="sms_content" style="font-size: 13px;resize: none;" rows="5" placeholder="Type your message here.." ></textarea>
                       </div>
                       <div class="col-md-3">
                      
                         <button class="btn btn-light text-success form-control sendmessage" data-tp = "<?php echo $convo ?>" style="font-size: 14px">Send <i class="fas fa-paper-plane"></i></button> 

                          <button class="btn btn-light text-success form-control mt-2 mb-2 sendtoall" data-tp = "<?php echo $convo ?>" style="font-size: 13px">Send to all </button>   

                           <button class="btn btn-light text-success form-control multiple" data-tp = "<?php echo $convo ?>" style="font-size: 13px">Multiple</button>  

                              <button class="btn btn-light text-primary reloadpage form-control mt-3" id="reload"  style="font-size: 12px;">Reload <i class="fas fa-sync"></i></button>
                       </div>



                        </div>
                    						</div>
                    					</div>
                    				</div>
                    			</div>


                    		</div>


                    		</div>



                    	</div>


                    </div>

                        
                      



                    

                         <!--contents here //// OFF-->



                
                </div>






                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include '../include/assets/footer.php';?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>

       <script src="../../offline/sweetalert.js"></script>
       <script type="text/javascript" src="../../js/jquery.js"></script>

   

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
   <?php include '../Dashboard/logoutmodal.php';  ?>
  <script src="../../js/jquery.js"></script>
    
    <script type="text/javascript">
                      $(document).ready(function() {
                        advancesearchcontent();
                           $('.myinputsss').keyup(function(){ 

                           
                            var value = $(this).val().toLowerCase();


                              var size = $(".advancecontent_search > .ele").length; // The parentdiv plus the element containing the text or card
                                           var count = $('div.ele:hidden').length;  // The child element or card
                                          

                                           $('#tryfound').text('Search Result For : '+ value);


                            if(value == ''){
                                $('.051715').removeClass('d-none');
                                 $('#tryfound').text('');
                                 $('.advancecontent_search').addClass('d-none');
                            }else {
                               $('.051715').addClass('d-none');
                                $('.advancecontent_search').removeClass('d-none');
                                
                              $('div[data-role="searchfor"]').filter(function() {
                                       $(this).toggle($(this).find('h6').text().toLowerCase().indexOf(value) > -1)
                                   });
                             
                                 
                               
                                  
                                   
                            }
                          
                          
                          })

                         $('#btnsearchclick').click(function() { 
                          
                         
                            if($('#confirmcheck').prop("checked") == true) {
                                         $('#confirmcheck').prop('checked',false);  
                                           $('.051715').removeClass('d-none');
                                           $('.advancecontent_search').addClass('d-none');
                                         $(this).find("i").toggleClass("far fa-times-circle");  
                                           
                                      }
                                   else if($('#confirmcheck').prop("checked") == false) {
                                           $('#confirmcheck').prop('checked',true); 
                                      $('.051715').addClass('d-none');
                                      $('.advancecontent_search').removeClass('d-none')   
                                      $(this).find("i").toggleClass("far fa-times-circle");  
                                                                    
                                    }
                          
                         /* ;*/
                         })
                             
                           function advancesearchcontent(){
                               
                                
                                  var xhttp = new XMLHttpRequest();
                                 xhttp.onreadystatechange = function() {
                                  if (this.readyState == 4 && this.status == 200) {
                                 const data = this.responseText;
                               
                              
                              $('.advancecontent_search').html(data);
                              
                                              }
                                           };
                                   xhttp.open("POST", "../Dashboard/advancesearch.php",true);
                                   xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                                   xhttp.send("searchfor=1");
                                       
                                                
                           }

                         

                      });
                      
                     
                                     
                            
                    </script>
                 
   
<script type="text/javascript">
    $(document).ready(function() {
  

       inbox();
       function inbox(){
       	 $.ajax({
       	 url : "sms.php",
       	  method: "POST",
       	 data  : {inbox:1},
       	  success : function(data){
       	 $('#inbox').html(data);
       	   }
       	 })
       }


            $('.sendmessage').click(function(){
        var val = $('#sms_content').val();
        var tp = $(this).data('tp');
                  $(this).html('Sending <i class="fas fa-spinner fa-pulse"></i>').attr('disabled',true);
                  $('#sms_content').attr('readonly','true');
               if(val == ''){
                    
                  var i =   setInterval(function(){
                          $('.sendmessage').html('Send <i class="fas fa-paper-plane"></i>').removeAttr('disabled');
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

                              	if(data == "noset"){
                              		$('#selectstud').click();

                              		 $('#txtval').val(val);
                                $('.sendmessage').html('Send <i class="fas fa-paper-plane"></i>').removeAttr('disabled');
                                $('#sms_content').removeAttr('readonly');
                                $('#sms_content').focus();
                              	}else {

                              		    messages();     
                              inbox(); 
                              $('#sms_content').val('');
                              $('.sendmessage').html('Send <i class="fas fa-paper-plane"></i>').removeAttr('disabled');
                                $('#sms_content').removeAttr('readonly');
                                $('#sms_content').focus();
                              	}

                          
                               }
                             })

               }   
                              

                         
                     
            

                        
                  
        })

            $('.multiple').click(function(){
            	 $(this).html('Sending <i class="fas fa-spinner fa-pulse"></i>').attr('disabled',true);
            	      var val = $('#sms_content').val();
            	      if(val == ''){
            	      		 var i =   setInterval(function(){
                          $('.multiple').html('Multiple').removeAttr('disabled');
                          $('#sms_content').addClass('is-invalid').attr('placeholder','Please input your message');
                            $('#sms_content').removeAttr('readonly');
                        clearInterval(i);
                      },1000);
            	      }else {
            	      $('#selectstud').click();	
            	      $('#txtval').val(val);
            	       $('.multiple').html('Multiple').removeAttr('disabled');
            	      }

            		  		
            })

            $('.sendtoall').click(function(){
            	 $(this).html('Sending <i class="fas fa-spinner fa-pulse"></i>').attr('disabled',true);
            	 var val = $('#sms_content').val();
            	      if(val == ''){
            	      		 var i =   setInterval(function(){
                          $('.sendtoall').html('Send to all ').removeAttr('disabled');
                          $('#sms_content').addClass('is-invalid').attr('placeholder','Please input your message');
                            $('#sms_content').removeAttr('readonly');
                        clearInterval(i);
                      },1000);
            	      }else {
            	     
            	      	 $.ajax({
            	      	 url : "sms.php",
            	      	  method: "POST",
            	      	 data  : {sendtoall:val},
            	      	  success : function(data){
            	      	 	$('#sms_content').val('');
                             messages();     
                              inbox(); 
                              $('.sendtoall').html('Send to all ').removeAttr('disabled');

            	      	   }
            	      	 })


            	      }	  		
            })

        function messages(){
        $.ajax({
       url : "sms.php",
        method: "POST",
       data  : {reload:1},
        success : function(data){
       	 $('#messages').html(data);
       	   $('#messages').scrollTop($('#messages')[0].scrollHeight);
         }
       })
       }
       
     $('#sms_content').keyup(function(){
            var value = $(this).val();

            if(value ==''){

            }else {
                $('#sms_content').removeClass('is-invalid').attr('placeholder','Write your message here ..');
            }
        
        })



       $('.reloadpage').click(function(){
       $.ajax({
       url : "sms.php",
        method: "POST",
       data  : {reload:1},
        success : function(data){
       	 $('#messages').html(data);
       	 inbox();
       	   $('#messages').scrollTop($('#messages')[0].scrollHeight);
         }
       })
                   
     })

          $('#sendmultiple').on('submit', function(event){
             event.preventDefault();
                  
                  var check = $('input[name="multipleids[]"]:checked').length;

                 if(check >=1){

                 	 $.ajax({
                             url : $(this).attr('action'),
                              method: "POST",
                               data  : $(this).serialize(),
                               success : function(data){
                            	$('#sms_content').val('');
                            	   messages();     
                              inbox(); 
                              $('#exampleModal').modal('hide');
                               }
                            })


                 }else {
                 	Swal.fire(
					  'Selection Empty',
					  'Please Select one or More!',
					  'error'
					)
                 }
                   
             });

          $('#exampleModal').on('hidden.bs.modal', function (e) {
  				$('.cc').prop('checked',false);
		})

          $('#searchkey').keyup(function(){
          	var value = $(this).val();

         $("#contentlist li"). filter(function() {
		$(this). toggle($(this). text(). toLowerCase(). indexOf(value) > -1)
		});
          
          })

        /*  studentlist('123456789');
          function studentlist(skey){
          	 $.ajax({
          	 url : "sms.php",
          	  method: "POST",
          	 data  : {slist:skey},
          	  success : function(data){
          	 $('#contentlist').html(data);
          	   }
          	 })
          }*/

         });
          
</script>

  
<?php 
//include '../Dashboard/notification.php';
 ?>

 <!-- Button trigger modal -->
<button type="button" class="btn btn-primary d-none" id="selectstud" data-toggle="modal" data-target="#exampleModal">
  
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel">Select Recepient</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form method="post" action="sms.php" id="sendmultiple">
      	
      <input type="hidden" name="sendmultiple">
      <input type="hidden" name="val" id="txtval">
      <div class="modal-body">
       	<input type="text" name="" id="searchkey" class="form-control mb-3" style="font-size:13px" placeholder="Search Email,Name or Surname">
      	

      	<ul class="list-group" id="contentlist">
  	<?php 
  	$getall_students = "select * from student where stud_college = '$gccol' ";
 		 $gettingstudents = mysqli_query($con,$getall_students); 
 		 $countstud= mysqli_num_rows($gettingstudents);
 		
 		if($countstud >=1){
 	 while($row = mysqli_fetch_array($gettingstudents)){
 			?>
 			<li class="list-group-item">
 				<h6 style="font-size: 14px;"><?php echo $row['stud_lname'].' '.$row['stud_fname'] ?>
 					<br>
 					<span style="font-size:12px"><?php echo $row['stud_email'] ?></span>
 					<br>
 					<input type="checkbox" class="cc" name="multipleids[]" value="<?php echo $row['stud_id'] ?>" style="float:right;">

 				</h6>


 			</li>
 			<?php					
 		 }
 	
 	 }else {
 	 	echo 'No search key found : <span class="text-danger">'.$slist.'</span>';
 	 }

  	 ?>
	</ul>



      </div>
      <div class="modal-footer">
     
        <button type="submit" style="font-size:13px" class="btn btn-primary">Send</button>
      </div>
      </form>

    </div>
  </div>
</div>


    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/demo/chart-pie-demo.js"></script>
    <script type="text/javascript">
          $(document).ready(function() {
              if($(window).width() <= 768){
               $('#accordionSidebar').addClass('toggled');
              }
            

          });
    </script>

</body>

</html>