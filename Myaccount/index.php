<?php 
session_start();
include '../GCC/create_form/connect.php';
unset( $_SESSION['student_unique_code'] );

if(isset($_SESSION['checkpoint'])){
     header('location:../checkpoint.php');
}


if(!isset($_SESSION['user_student_token_check'])){
    header('location:../session_end.html');
}
include '../GCC/create_form/connect.php';
date_default_timezone_set('Asia/Manila');
$datenow = date('Y-m-d');
$time = date('H');

unset($_SESSION['Modify_shiftingform']);

      $chipuserid = $_SESSION['user_student_token_check'];                           

    $admin = "select * from student where stud_id = '$chipuserid' ";

                                                    $resultcheck = mysqli_query($con,$admin); 
                                                    $countadmin= mysqli_num_rows($resultcheck); 
                                                
                                            
                                                 
                                                     while($row = mysqli_fetch_array($resultcheck)){
                                                   
                                                        $user = $row['stud_fname'].' '.$row['stud_lname'];
                                        
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
                    <div class="alert alert-success alert-dismissible"  role="alert" data-dismiss="alert" style="position: fixed;z-index: 9999; right: 30px; top:30px;align-items:center;width: auto; cursor: pointer;">
                        <div  style="display: flex; padding:10px; margin-right:-30px">
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



 //student id login token


//db pds if 1 then he already fill up. go for modify
   
            date_default_timezone_set('Asia/Manila');
            $datenowtocompare =date('Y-m-d');
               $clearstorage= " DELETE FROM `tempstorage` WHERE datecreated < '$datenowtocompare' ";
                mysqli_query($con,$clearstorage); 
                        


unset($_SESSION['Live_form_id']);
unset($_SESSION['formnamesession']);
unset($_SESSION['form_type']);
unset($_SESSION['formtoken']);


    if(isset( $_SESSION['greet_students'])){


                if (isset($_SESSION['firstlogin'])){
              
        if(isset($_SESSION['access_token'])){
          include 'greetings.php';
           unset( $_SESSION['greet_students']);
             }else {


          include 'changepassword.php';
         

             }
                        }else {

        if(isset($_SESSION['access_token'])){
           include 'greetings.php';
           unset( $_SESSION['greet_students']);
             }else {

         include 'greetings.php';
          unset( $_SESSION['greet_students']);
             }
           
                            
                        }


    
    }


                
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
    background-color: #e2eee2;
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
<?php 
unset($_SESSION['updatingPDS']);
  $usertoken = $_SESSION['user_student_token_check'];
$CollegeId=$_SESSION['student_college'];

               $notig = " SELECT * FROM `notification` where  type ='changes' and action ='globalnotification' and CollegeId = '$CollegeId'";
                              $resultng = mysqli_query($con,$notig); // run query
                                 $countng= mysqli_num_rows($resultng); 
                              
                                 if($countng>=1){ 
                                  
                                  $checkstudent = " SELECT * FROM `notification` where  type ='studentupdated' and action ='clearstudent' and CollegeId = '$CollegeId' and studenttaker_id = '$usertoken' ";
                                  $csresult = mysqli_query($con,$checkstudent);
                                   $countcsstudent= mysqli_num_rows($csresult); 
                                              
                                    if ( $countcsstudent>=1){
                                             
                                           
                                            }else {

                                              //check if theres answered pds to 
                                                  $checkstudpds = " select * from form_response where userid ='$usertoken'  ";
                                                              $resultckpds = mysqli_query($con, $checkstudpds); // run query
                                                              $countstudpds= mysqli_num_rows($resultckpds); // to count if necessary
                                                             
                                                           if ($countstudpds>=1){

                                                            $checkchangesinpages = " SELECT * FROM `updte_pages`  ";
                                                          $chkingchnges = mysqli_query($con,$checkchangesinpages); 
                                                          $countofchanges= mysqli_num_rows($chkingchnges);
                                                      
                                                       if ($countofchanges>=1){
                                                    /*     ?>
                                         <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                         <script type="text/javascript">
                                           
                                                 Swal.fire({
                                          position: 'top-end',
                                          icon: 'warning',
                                          title: 'PDS OUTDATED',
                                          text: "Your Personal Data Sheet form is OUTDATED. Please update it as soon as possible!",
                                          showConfirmButton: false,
                                          
                                        })
                                                 
                                         </script>
                                                        <?php*/
                                                    }else {
                                                       /*    ?>
                                         <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                         <script type="text/javascript">
                                           
                                                 Swal.fire({
                                          position: 'top-end',
                                          icon: 'warning',
                                          title: 'PDS OUTDATED',
                                          text: "Your Personal Data Sheet form is OUTDATED. Please update it as soon as possible!",
                                          showConfirmButton: false,
                                          
                                        })
                                                 
                                         </script>
                                                        <?php*/
                                                    



                                                    }


                                        
                                                          
                                                          }else {

                                                          }
                                      
                                         
                                            }


                                  
                                

                                  


                                
                               

                                 }
 ?>

  </header>
 

  
    <button type="button" class="fixed-top btn btn-dark " data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample" style="margin-top: 70px;margin-left: 10px;width: 40px;" id="openside"><i class="fas fa-bars"></i></button>



<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Myaccount</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <div class="card-body ">
                              
                            <div class="card shadow">

                              <div class="card-body">
                                <?php 
                                $usertoken = $_SESSION['user_student_token_check'];
                                $sql = " select * from student where stud_id = '$usertoken'  ";
                                                $result = mysqli_query($con,$sql); // run query
                                                
                                                 while($row = mysqli_fetch_array($result)){
                                                    $srcphoto = $row['photo'];

                                                    if($srcphoto == ''){
                                                        $src = 'https://th.bing.com/th/id/OIP.4gcGG1F0z6LjVlJjYWGGcgHaHa?pid=ImgDet&rs=1';
                                                    }else {
                                                        $src = 'img/'.$srcphoto;
                                                    }
                                        ?>
                                 <img src="<?php echo $src ?>" style="width: 60px;height: 60px;float: left;" class="img-rounded img-thumbnail mr-4 img-fluid">
                                  <h6><?php echo $row['stud_lname'].' '.$row['stud_fname'].' '.substr($row['stud_mname'], 0) ?> <br><span style="font-size: 12px"><?php echo $row['stud_email'] ?>
                                    

                                  </span>
                                  <br>
                                   <span><?php echo $_SESSION['student_course'] ?></span>
                                      <button data-bs-dismiss="offcanvas" class="btn btn-light text-secondary account_modify" style="font-size:12px;float:right;"  > <i class="fas fa-edit"></i></button>
                                  </h6>
                                 

                                        <?php
                                        //data-toggle="modal" data-target="#account_details"
                                                 }
                                          

                                 ?>

                


                              </div>   
                             
                            </div> 


                          
                             
                             
                                 <div class="list-group mt-4" id="list-tab" role="tablist">
                              <a class="list-group-item list-group-item-action  dashboard" data-bs-dismiss="offcanvas" id=""  >Dashboard</a>
                              <a class="list-group-item list-group-item-action forms" data-bs-dismiss="offcanvas" id="">My Forms</a>
                              <a class="list-group-item list-group-item-action notification" data-bs-dismiss="offcanvas" id="">Notification <span class="badge badge-danger"></span> </a>
                              <!--<a class="list-group-item list-group-item-action request"  id="">Request</a>-->
                            </div>

                              <div class="card mt-2">
                              <style type="text/css">
      #modscroll::-webkit-scrollbar {
  width: 2px;
}

/* Track */
#modscroll::-webkit-scrollbar-track {
  background: #f1f1f1; 
}
 
/* Handle */
#modscroll::-webkit-scrollbar-thumb {
  background: #c1f2c4; 
}

/* Handle on hover */
#modscroll::-webkit-scrollbar-thumb:hover {
  background: #555; 
}

@media screen and (max-width: 768px){

}


  </style>
                                <div class="card-body" id="modscroll" style="height: 500px;overflow-y: scroll;">
                                  <h6>GCC Events</h6>
                                    <ul class="list-group">
               
              
              
               <?php 
                     date_default_timezone_set('Asia/Manila');
                     $datenow = date('Y-m-d');

                          $lookforevents = " SELECT * FROM `events` where status = 0 order by start  ";
                                      $resultlooks = mysqli_query($con,$lookforevents); // run query
                                      $countevs= mysqli_num_rows($resultlooks); // to count if necessary
                                     //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
                                   if ($countevs>=1){
                                    //while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                                       while($row = mysqli_fetch_array($resultlooks)){
                                ?>
                        
                       <li class="list-group-item" style="font-size: 13px ;border-left:3px solid <?php echo $row['bgcolor'] ?>; font-weight: bold"><?php echo $row['title'] ?> <br> <span class="text-danger" style="float:right;font-style: italic;"><?php echo date('F j, Y',strtotime($row['start']))  ?></span></li>
                                <?php
                                       }
                                }else {
                                  ?>
                                <h6 class="text-secondary">NO EVENTS</h6>
                                  <?php
                                }

                   ?>

                   </ul>



                                  
                                </div> 
                                
                             </div> 
                           
                            



                         </div> 
  </div>
</div>



  <span style="user-select: none"><p><br></p></span>
 

   
    <div class="container-fluid" >
       <div class="row mt-5">
          
       
                   <div class="col-sm-4" id="hideinmobi">
                      <div class="">

                         <div class="card-body">
                              
                            <div class="card shadow">

                              <div class="card-body">

                	<?php 
                              	$usertoken = $_SESSION['user_student_token_check'];
                              	$sql = " select * from student where stud_id = '$usertoken'  ";
                              	                $result = mysqli_query($con,$sql); // run query
                              	                
                              	                 while($row = mysqli_fetch_array($result)){
                                                      $srcphoto = $row['photo'];

                                                    if($srcphoto == ''){
                                                        $src = 'https://th.bing.com/th/id/OIP.4gcGG1F0z6LjVlJjYWGGcgHaHa?pid=ImgDet&rs=1';
                                                    }else {
                                                        $src = 'img/'.$srcphoto;
                                                    }
                              					?>
                              	 <img src="<?php echo $src ?>" style="width: 60px;height: 60px;float: left;" class="img-rounded img-thumbnail mr-4 img-fluid">
                                  <h6 style="text-transform: uppercase;"><?php echo $row['stud_lname'].'  '.$row['stud_fname'].' '.substr($row['stud_mname'], 0,1).'.' ?> <br><span style="font-size: 12px;text-transform: lowercase;"><?php echo $row['stud_email'] ?></span>
                                    <br>
                                    <span><?php echo $_SESSION['student_course'] ?></span>
                                    <button class="btn btn-light text-secondary account_modify" style="font-size:12px;float:right;" > <i class="fas fa-edit"></i></button>
                                  </h6>
                                 

                              					<?php
                                                //data-toggle="modal" data-target="#account_details" 
                              	                 }
                              	          

                              	 ?>
                                  

                                  </h6>
                                 


                              </div>   
                             
                            </div> 


                            <div class="card  mt-2">
                             
                              <div class="card-body">
                                 <div class="list-group" id="list-tab" role="tablist">
                              <a class="list-group-item list-group-item-action dashboard" id=""  >Dashboard</a>
                              <a class="list-group-item list-group-item-action forms" id="">My Forms</a>
                              <a class="list-group-item list-group-item-action notification" id="">Notification <span class="badge badge-danger" id="notify"></span> </a>
                            <!--  <a class="list-group-item list-group-item-action request"  id="">Request</a> -->
                            </div>

                              </div>
                            </div>
                            

                             <div class="card mt-2">
                              <style type="text/css">
      #modscroll::-webkit-scrollbar {
  width: 2px;
}

/* Track */
#modscroll::-webkit-scrollbar-track {
  background: #f1f1f1; 
}
 
/* Handle */
#modscroll::-webkit-scrollbar-thumb {
  background: #c1f2c4; 
}

/* Handle on hover */
#modscroll::-webkit-scrollbar-thumb:hover {
  background: #555; 
}


  </style>
                                <div class="card-body" id="modscroll" style="height: 500px;overflow-y: scroll;">
                                  <h6>GCC Events</h6>
                                    <ul class="list-group">
               
              
              
               <?php 
                     date_default_timezone_set('Asia/Manila');
                     $datenow = date('Y-m-d');

                          $lookforevents = " SELECT * FROM `events` where status = 0 order by start  ";
                                      $resultlooks = mysqli_query($con,$lookforevents); // run query
                                      $countevs= mysqli_num_rows($resultlooks); // to count if necessary
                                     //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
                                   if ($countevs>=1){
                                    //while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                                       while($row = mysqli_fetch_array($resultlooks)){
                                ?>
                        
                       <li class="list-group-item" style="font-size: 13px ;border-left:3px solid <?php echo $row['bgcolor'] ?>; font-weight: bold"><?php echo $row['title'] ?> <br> <span class="text-danger" style="float:right;font-style: italic;"><?php echo date('F j, Y',strtotime($row['start']))  ?></span></li>
                                <?php
                                       }
                                }else {
                                  ?>
                                <h6 class="text-secondary">NO EVENTS</h6>
                                  <?php
                                }

                   ?>

                   </ul>



                                  
                                </div> 
                                
                             </div> 
                             


                         </div> 
                         
                      </div> 
                      
                    
                   </div> 
                    <div class="col-sm-8" id="displayfull">
                       <div class="">
                         <div class="card-body">

                           <h6 id="titletext"></h6>

                           <hr>
                        
                         
                          <div class="content-tab">
                           
                          </div> 

                            <div class="loader d-none" id="loader" style="text-align: center; margin-top: 150px;height: 300px">
                              <i style="font-size: 50px;" class="fas fa-spinner fa-pulse"></i>
                              <p><br><br><br></p>
                            </div> 
                            

                         
                           

 
                         </div> 
                         
                      </div> 
                    </div> 
                   </div> 
                  <link rel="stylesheet" type="text/css" href="../offline/bootstrap5.css">

                <script type="text/javascript" src="../offline/bootstrap5.js"></script>

             


  </div>

<script type="text/javascript">
  
  var hidethis = setInterval(function(){
    $('#requestalert').hide();
clearInterval(hidethis);
  },5000);      
        
</script>


  
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
      <div class="modal-content">
        
        <div class="modal-body">
           <div class="container shadow py-4 mb-4" style="text-align: center;"> 
                <span class="badge-success" id="notifstatus" style="font-size: 10px;padding: 5px;border-radius: 10px;text-transform: uppercase;float: left;"></span> <br style="user-select: none">
              <h6 id="titlenotif" class="mt-4" style="font-weight: bold"></h6>
              <br style="user-select: none">

              <h6 style=" font-size: 14px; " class="text-dark" id="contentnotif"></h6>

            <p></p>
                 
            
             

   
          </div>
         
           <span style="font-size: 12px;" class="text-success" >-GCC Admin.</span>
           <button type="button" class="btn btn-light mt-4" style="font-size: 12px;float: right;width: 100px" data-dismiss="modal">Close</button>
        </div>
       
      </div>
    </div>
  </div>


 



<!-- Modal -->
<div class="modal fade" id="changephoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
    <div class="modal-content">
     
      <div class="modal-body">
          <form enctype="multipart/form-data" method="post" action="action.php">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <br>
        <div class="card shadow-sm mt-3" style="cursor:pointer" id="clickphoto">
            <div class="card-body">
                
                <h6 style="text-align:center;font-size: 13px;"><i class="fas fa-file"></i> <span id="nameoffile"> Select a Photo from Device </span></h6>

            </div>
        </div>
      
        <input type="file" name="image" class="form-control d-none" id="photofile" accept="image/*">

        <button type="submit" name="savephoto" class="btn btn-dark form-control mt-2" style="font-size: 12px;">Save changes</button>
        </form>
      </div>
      
    </div>
  </div>
</div>
         

<script src="../offline/sweetalert.js"></script>
<script src="../js/jquery.js"></script>
<?php 
include 'changepass.php';
    if(isset($_SESSION['passwordchange'])){

        ?>
        <script type="text/javascript">
              $(document).ready(function() {
                  Swal.fire(
                  'Password Changed!',
                  'Your password changed Successfully!',
                  'success'
                )
            
              });
        </script>
        <?php
        unset($_SESSION['passwordchange']);
    }
    if(isset( $_SESSION['photosave'])){

           ?>
        <script type="text/javascript">
              $(document).ready(function() {
                  Swal.fire(
                  'Photo has Changed!',
                  'Your Profile Photo changed Successfully!',
                  'success'
                )
            
              });
        </script>
        <?php

        unset($_SESSION['photosave']);
    }

 ?>
<script type="text/javascript">
  $(document).ready(function() {


        $('#clickphoto').click(function(){
            $('#photofile').click();
                          
        })

      $('#photofile').change(function(){

        var val = $(this).val().split("\\").pop();

        if(val == ''){
             $('#nameoffile').text('Select a Photo from Device');
        }else {
             $('#nameoffile').text(val);
        }
      
                          
        })

     

     $('#loader').removeClass('d-none');
     $('#titletext').text('My Forms');
     forms();
      $('.dashboard').removeClass('active');
    $('.dashboard').click(function() { 
       $('.sidebar').attr('style','width:0px;display:none');
       dashboard();
       $('.sidebar').removeClass('showsidebar');
      $('#loader').removeClass('d-none');
   
    $(this).addClass('active');
     $('.forms').removeClass('active');
      $('.notification').removeClass('active');
       $('.request').removeClass('active');
       $('#titletext').text('Dashboard');
        $('#requestalert').addClass('d-none');
    })
    $('.forms').click(function() { 
       $('.sidebar').attr('style','width:0px;display:none');
$('#loader').removeClass('d-none');
       $('.sidebar').removeClass('showsidebar');
    forms();
    $(this).addClass('active');
    $('.dashboard').removeClass('active');
      $('.notification').removeClass('active');
       $('.request').removeClass('active');
$('#titletext').text('Forms');
 $('#requestalert').addClass('d-none');
    })
    $('.notification').click(function() { 
       $('.sidebar').attr('style','width:0px;display:none');
$('#loader').removeClass('d-none');
       $('.sidebar').removeClass('showsidebar');
    notification();
    $(this).addClass('active');
    $('.forms').removeClass('active');
      $('.dashboard').removeClass('active');
       $('.request').removeClass('active');
       $('#titletext').text('Notification');
        $('#requestalert').addClass('d-none');
        countnotify();
    })
    $('.request').click(function() { 
       $('.sidebar').attr('style','width:0px;display:none');
$('#loader').removeClass('d-none');
       $('.sidebar').removeClass('showsidebar');
    request();
    $(this).addClass('active');
    $('.forms').removeClass('active');
      $('.notification').removeClass('active');
       $('.dashboard').removeClass('active');
       $('#titletext').text('Request');
       $('#requestalert').removeClass('d-none');
      
    })

    $('#dismissalert').click(function() { 
      $('#requestalert').addClass('d-none');
    })

    $('.account_modify').click(function(){
         myaccount();            
    })


        function myaccount(){

         $.ajax({
                 url : "account.php",
                  method: "POST",
                   data  : {account_modify:1},
                   success : function(data){
        $('.content-tab').html(data);
        $('#loader').addClass('d-none');
        $('#titletext').text('Account');
                   }
                })
        }


   
    function dashboard(){
        
         $.ajax({
                 url : "content.php",
                  method: "POST",
                   data  : {dashboard:1},
                   success : function(data){
        $('.content-tab').html(data);
        $('#loader').addClass('d-none');
                   }
                })
            
          
    }
    function forms(){
       $.ajax({
                 url : "content.php",
                  method: "POST",
                   data  : {forms:1},
                   success : function(data){
        $('.content-tab').html(data);
        $('#loader').addClass('d-none');
                   }
                })
    }
    function notification(){
       $.ajax({
                 url : "content.php",
                  method: "POST",
                   data  : {notification:1},
                   success : function(data){
        $('.content-tab').html(data);
        $('#loader').addClass('d-none');
                   }
                })
    }
    function request(){
       $.ajax({
                 url : "content.php",
                  method: "POST",
                   data  : {request:1},
                   success : function(data){
        $('.content-tab').html(data);
        $('#loader').addClass('d-none');
                   }
                })
    }
    countnotify();
   /* setInterval(function(){
countnotify();
},30000);*/
    function countnotify(){
        $.ajax({
                 url : "action.php",
                  method: "POST",
                   data  : {notification:1},
                   success : function(data){
              $('#notify').text(data);
                   }
                })
    }

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

<script type="text/javascript">
  $(document).ready(function() {
     $('#closebtn').click(function() { 
     
      $('.sidebar').attr('style',' z-index: 9999 !important;position: fixed;width: 280px;background-color:#a2d2a9;height: 100%;top:left: 0;display: none;transition: width 0.5s;');

       $('.sidebar').removeClass('showsidebar');
    })
    $('#openside').click(function() { 
      $('.sidebar').addClass('showsidebar');
   
    $('.sidebar').attr('style',' z-index: 9999 !important;position: fixed;width: 280px;background-color:#a2d2a9;height: 100%;top:left: 0;display: block;transition: width 0.5s;');
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