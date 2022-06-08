<?php 
session_start();
include '../../create_form/connect.php';
$admintoken = $_SESSION['admingcc_token'];
  if(isset($_POST['addnewadmin'])){ 

          $adem = $_POST['adem'];
          $adln = $_POST['adln'];
          $adfn = $_POST['adfn'];
          $admn = $_POST['admn'];
          $cids = $_POST['cids'];
         
          $cn = $_POST['cn'];
          $ed = $_POST['ed'];

          date_default_timezone_set('Asia/Manila');
          $datenow = date('Y-m-d H:i:s');






          

      
          $pass = '@gc'.'_'.$adln;

          if(isset($_POST['coll'])){
            $coll = $_POST['coll'];
          }else {
            $coll = 0;
          }
      
       

          $hashedpass = md5($pass);


          		$check_table = "select * from administrator where admin_email = '$adem'  ";
          		 $user_tables = mysqli_query($con,$check_table); 
          		 $count= mysqli_num_rows($user_tables);
          		 //$newlyinsertedid = mysqli_insert_id($con);
          		if($count >=1){
          				
          				echo "existing";
          			
          		 }else {

    				echo $adem;
          		 	   $dsp = 'admin_'.$adln;
             $sql = " INSERT INTO `administrator`(`admin_lname`, `admin_fname`, `admin_mname`, `admin_dsplyname`, `admin_type`, `admin_email`,`admin_password`,`CollegeId`,`ft`,`admin_banner`,`admin_sidebarbg`,`admin_contactno`,`admin_effectivedate`) 
             VALUES ('$adln','$adfn','$admn','$dsp','GC','$adem','$hashedpass','$cids','1','GC ADMIN','#63a284','$cn','$ed')  ";
                         $result = mysqli_query($con,$sql); // run query

          		 }



                 date_default_timezone_set('Asia/Manila'); 
                    $date_m = date('Y-m-d H:i:s');
                     $token =  $_SESSION['admingcc_token'];
                       $sem = $_SESSION['sem'];
                    $save_to_logs = "INSERT INTO `logs`(`stud_id`, `admin_id`, `admin_type`, `content`, `date-modified`,`manage_fields`,`semester`) 
                    VALUES (0,'$token','GCC','Added new Guidance Coordinator :  $adln $adfn','$date_m','Add','$sem')";
                    mysqli_query($con,$save_to_logs); 


    
                
                         
          
        }

 ?>