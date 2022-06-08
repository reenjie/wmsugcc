<?php 
session_start();
include '../../GCC/create_form/connect.php';

if(isset($_POST['block'])){
  $id = $_POST['id'];

    $uptlogin = "UPDATE `student` SET `lg`= 2 WHERE stud_id='$id' ";
                          mysqli_query($con,$uptlogin);



             $getstudentname = "select * from student where stud_id = '$id'  ";
             $gettingstudent_name = mysqli_query($con,$getstudentname); 
            
           while($stud = mysqli_fetch_array($gettingstudent_name)){
                $name = $stud['stud_lname'].' '.$stud['stud_fname'];    

                  date_default_timezone_set('Asia/Manila'); 
$sem = $_SESSION['sem'];
$gccollege= $_SESSION['gc_college'];
                    $date_m = date('Y-m-d H:i:s');
                     $token =  $_SESSION['admin_token'];
                    $save_to_logs = "INSERT INTO `logs`(`stud_id`, `admin_id`, `admin_type`, `content`, `datemodified`,`manage_fields`,`semester`) 
                    VALUES (0,'$token','GC','$gccollege has blocked the Student : $name','$date_m','Manage','$sem')";
                    mysqli_query($con,$save_to_logs); 
             
             }
  
}

if(isset($_POST['unblock'])){
  $id = $_POST['id'];

    $uptlogin = "UPDATE `student` SET `lg`= 0 WHERE stud_id='$id' ";
                          mysqli_query($con,$uptlogin);

                            $getstudentname = "select * from student where stud_id = '$id'  ";
             $gettingstudent_name = mysqli_query($con,$getstudentname); 
            
           while($stud = mysqli_fetch_array($gettingstudent_name)){
                $name = $stud['stud_lname'].' '.$stud['stud_fname'];    

                  date_default_timezone_set('Asia/Manila'); 
$sem = $_SESSION['sem'];
$gccollege= $_SESSION['gc_college'];
                    $date_m = date('Y-m-d H:i:s');
                     $token =  $_SESSION['admin_token'];
                    $save_to_logs = "INSERT INTO `logs`(`stud_id`, `admin_id`, `admin_type`, `content`, `datemodified`,`manage_fields`,`semester`) 
                    VALUES (0,'$token','GC','$gccollege has Unblocked the Student : $name','$date_m','Manage','$sem')";
                    mysqli_query($con,$save_to_logs); 
             
             }
  
}

if(isset($_POST['verify'])){

	 $id = $_POST['id'];

    $uptlogin = "UPDATE `student` SET `isverified`= 1 WHERE stud_id='$id' ";
                          mysqli_query($con,$uptlogin);

                            $getstudentname = "select * from student where stud_id = '$id'  ";
             $gettingstudent_name = mysqli_query($con,$getstudentname); 
            
           while($stud = mysqli_fetch_array($gettingstudent_name)){
                $name = $stud['stud_lname'].' '.$stud['stud_fname'];    

                  date_default_timezone_set('Asia/Manila'); 
$sem = $_SESSION['sem'];
$gccollege= $_SESSION['gc_college'];
                    $date_m = date('Y-m-d H:i:s');
                     $token =  $_SESSION['admin_token'];
                    $save_to_logs = "INSERT INTO `logs`(`stud_id`, `admin_id`, `admin_type`, `content`, `datemodified`,`manage_fields`,`semester`) 
                    VALUES (0,'$token','GC','$gccollege has Verified the Student : $name','$date_m','Manage','$sem')";
                    mysqli_query($con,$save_to_logs); 
             
             }
  

	
}

 ?>