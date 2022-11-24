<?php
session_start();
include '../create_form/connect.php';
$csform = $_SESSION['Live_form_id'];
$user = $_SESSION['user_student_token_check'];


		$selectforms = " select * from form where class_name ='$csform' and type='file' ";
                $gettingforms = mysqli_query($con,$selectforms); 
              
                 while($row = mysqli_fetch_array($gettingforms)){
                 	$formid = $row['form_id'];
                 $image_name = $_FILES[$formid]['name'];
                 $tmp_name   = $_FILES[$formid]['tmp_name'];
                 $size       = $_FILES[$formid]['size'];
                  $type       = $_FILES[$formid]['type'];
                 $error      = $_FILES[$formid]['error'];
                 		                                                                                                                                    
                 		             
                 		                                                                                                                                    
                $fileName =basename($_FILES[$formid]['name']);
                	$pname = $user.'_'.$fileName;

                	 $uploads_dir = '../../attachments/';
                 	 move_uploaded_file($tmp_name , $uploads_dir .'/'.$pname);
                 
            
                 }
                 
          


 ?>