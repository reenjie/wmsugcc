<?php 
session_start();	
include 'GCC/create_form/connect.php';
    

 if(isset($_SESSION['admingcc_token'])) {
    $token = $_SESSION['admingcc_token'];

        $get_form_data = "select * from form_classification where csform_id in (60 ,62) and status = '$token'  ";
         $gettingforms = mysqli_query($con,$get_form_data); 
         $count= mysqli_num_rows($gettingforms);
        
        if($count >=1){
     while($row = mysqli_fetch_array($gettingforms)){
              $csform = $row['csform_id'];

                 $strict = " UPDATE `form_classification` SET `status`='0' WHERE csform_id= '$csform'  ";
                if (mysqli_query($con,$strict)){
                   session_destroy();  
                }

         }


    
     }else {
         session_destroy();
     }





 } else {
     session_destroy();

 }




header("location:index.php");
 ?>