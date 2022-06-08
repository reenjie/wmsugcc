<?php 
    
    if(isset($_SESSION['admingcc_token'])){
        $accid = $_SESSION['admingcc_token'];
            $getnames_ = "select * from administrator where admin_id = '$accid'  ";
             $getaccountnames_ = mysqli_query($con,$getnames_); 
          
         while($gnames = mysqli_fetch_array($getaccountnames_)){
              
      ?>
       <a class="nav-link" href="GCC/Dashboard/" style="font-weight:bolder;">Hello <span style="text-transform: uppercase;"><?php echo $gnames['admin_fname'] ?> </span>! <i class="fas fa-smile text-warning" style="font-size:15px"></i> <br> <h6 style="font-size:11px;text-align: center;">
           GCC Officials & Staffs
          
       </h6></a>
      <?php                  
             }
        
         

     
    }else if (isset($_SESSION['admin_token'])){

         $accid = $_SESSION['admin_token'];
            $getnames_ = "select * from administrator where admin_id = '$accid'  ";
             $getaccountnames_ = mysqli_query($con,$getnames_); 
          
         while($gnames = mysqli_fetch_array($getaccountnames_)){
              
      ?>
       <a class="nav-link" href="Guidance-Coordinator/Dashboard/" style="font-weight:bolder;">Hello <span style="text-transform: uppercase;"><?php echo $gnames['admin_fname'] ?> </span>! <i class="fas fa-smile text-warning" style="font-size:15px"></i> <br> <h6 style="font-size:11px;text-align: center;">
            Guidance Coordinator
          
       </h6></a>
      <?php                  
             }
     

    }else if(isset($_SESSION['superadminId'])){
           $accid = $_SESSION['superadminId'];
            $getnames_ = "select * from administrator where admin_id = '$accid'  ";
             $getaccountnames_ = mysqli_query($con,$getnames_); 
          
         while($gnames = mysqli_fetch_array($getaccountnames_)){
              
      ?>
       <a class="nav-link" href="admin/Dashboard" style="font-weight:bolder;">Hello <span style="text-transform: uppercase;"><?php echo $gnames['admin_fname'] ?> </span>! <i class="fas fa-smile text-warning" style="font-size:15px"></i> <br> <h6 style="font-size:11px;text-align: center;">
            GCC Administrator
          
       </h6></a>
      <?php                  
             }
      

    }else if (isset($_SESSION['adm_id'])){

          $accid = $_SESSION['adm_id'];
            $getnames_ = "select * from administrator where admin_id = '$accid'  ";
             $getaccountnames_ = mysqli_query($con,$getnames_); 
          
         while($gnames = mysqli_fetch_array($getaccountnames_)){
              
      ?>
       <a class="nav-link" href="Admission/" style="font-weight:bolder;">Hello <span style="text-transform: uppercase;"><?php echo $gnames['admin_fname'] ?> </span>! <i class="fas fa-smile text-warning" style="font-size:15px"></i> <br>  <h6 style="font-size:11px;text-align: center;">
            WMSU Admission
          
       </h6></a>
      <?php                  
             }
     

    }else if(isset($_SESSION['user_student_token_check'])) {

           $accid = $_SESSION['user_student_token_check'];
            $getnames_ = "select * from student where stud_id = '$accid'  ";
             $getaccountnames_ = mysqli_query($con,$getnames_); 
          
         while($gnames = mysqli_fetch_array($getaccountnames_)){
              
      ?>
       <a class="nav-link" href="Myaccount/" style="font-weight:bolder;">Hello <span style="text-transform: uppercase;"><?php echo $gnames['stud_fname'] ?> </span>! <i class="fas fa-smile text-warning" style="font-size:15px"></i> <br>  <h6 style="font-size:11px;text-align: center;">
            WMSU Student
          
       </h6></a>
      <?php                  
             }
     



     
    }


    else {
      ?>
       <a class="nav-link" href="javascript:void(0)" id="login_" data-toggle="modal" data-target="#loginmodal"  style="float: right;"><i class="fas fa-sign-in-alt"></i> Sign In</a>
      <?php
    }

 ?>