<?php 
session_start();
include '../create_form/connect.php';
$admintoken = $_SESSION['admingcc_token'];

	 if(isset($_POST['compare'])) {
                       
                    $currentpass = md5($_POST['currentpass']);	
                    

                                        $sql = "SELECT * FROM `administrator` where admin_id = '$admintoken'   ";
                                              $result = mysqli_query($con,$sql);
                                              $count= mysqli_num_rows($result);
                                            
                                           
                                               while($row = mysqli_fetch_array($result)){
                                                 $defaultpass= $row['admin_password']; 
                                               }
                                        

                    		if($currentpass == $defaultpass) {
                    			echo 'success';
                    		}else {
                    		
                    			echo 'fail';
                    		}
                    	


                    }


        if(isset($_POST['trigger'])){
        	$checkchecktodel = $_POST['checkchecktodel'];
        

													 foreach ($checkchecktodel as $checkval) {
													
													    $sql = " DELETE FROM `email` WHERE email_id = '$checkval'  ";
                                          $result = mysqli_query($con,$sql); 
                                          
									
											} 
        	
        }
        if(isset($_POST['editpic'])){ 
          
              $sqls = "SELECT * FROM `administrator` where admin_id = '$admintoken'   ";
                                              $results = mysqli_query($con,$sqls);
                                           
                                            
                                           
                                               while($row = mysqli_fetch_array($results)){
                                                 $imgdef= $row['admin_photo']; 
                                               }

                                                $uploads ='../img/uploads/'.$imgdef;
                                                unlink($uploads);

              //Make the imagename array set at form. look likes this name="imagename[]"
            foreach($_FILES['image']['name'] as $key=>$val){
                            $image_name = $_FILES['image']['name'][$key];
                             $tmp_name   = $_FILES['image']['tmp_name'][$key];
                          $size       = $_FILES['image']['size'][$key];
                           $type       = $_FILES['image']['type'][$key];
                           $error      = $_FILES['image']['error'][$key];
                                                                                                                                              
                       
                                                                                                                                              
                     $fileName =basename($_FILES['image']['name'][$key]);
                           $rand = rand(100,1000);                                                                                                                   
                      $pname = $rand.'Photo'.'_'.$fileName;
                          // File upload path
                      $uploads_dir = '../img/uploads';
                   move_uploaded_file($tmp_name , $uploads_dir .'/'.$pname);
                       
                           
                     $sql = " UPDATE `administrator` SET `admin_photo`='$pname' WHERE admin_id = '$admintoken'  ";
                                     $result = mysqli_query($con,$sql); 
                                     
                                                                                                                         
                   
                      }
          
          
                      

        }
        if(isset($_POST['savenewpassword'])){ 
              $txtnew = md5($_POST['txtnew']);
              $sql = " UPDATE `administrator` SET `admin_password`='$txtnew' WHERE admin_id = '$admintoken'  ";
                                     $result = mysqli_query($con,$sql); 

        }
        if(isset($_POST['changedisplayname'])){ 
          $namevalue = $_POST['namevalue'];
           $sql = " UPDATE `administrator` SET `admin_dsplyname`='$namevalue' WHERE admin_id = '$admintoken'  ";
                                     $result = mysqli_query($con,$sql); 
          
        }
        if(isset($_POST['saveadmintitle'])){ 
          $titlevalue = $_POST['titlevalue'];
             $sql = " UPDATE `administrator` SET `admin_banner`='$titlevalue' WHERE admin_id = '$admintoken'  ";
                                     $result = mysqli_query($con,$sql); 
                     $_SESSION['sidebar_banner'] = $titlevalue;    
          

          
        }
        if(isset($_POST['savenewcolor'])){ 
          $colorval = $_POST['colorval'];
                $sql = " UPDATE `administrator` SET `admin_sidebarbg`='$colorval' WHERE admin_id = '$admintoken'  ";
                                     $result = mysqli_query($con,$sql); 

          $_SESSION['sidebar_color'] = $colorval;
          
        }
        if(isset($_POST['resetdefaultcolor'])){ 
          $defaultcolor = '#63a284';
         $sql = " UPDATE `administrator` SET `admin_sidebarbg`='$defaultcolor' WHERE admin_id = '$admintoken'  ";
                                     $result = mysqli_query($con,$sql); 
           $_SESSION['sidebar_color'] =  $defaultcolor;
        }
        if(isset($_POST['setenable'])){ 
             $sql = " UPDATE `gui` SET `advancesearch`='enabled' WHERE id = 1  ";
                          $result = mysqli_query($con,$sql);
                          $_SESSION['advancesearch'] = 'enabled';
        }
        if(isset($_POST['setdisable'])){ 
             $sql = " UPDATE `gui` SET `advancesearch`='disabled' WHERE id = 1  ";
                          $result = mysqli_query($con,$sql);
                           $_SESSION['advancesearch'] = 'disabled';
        }
        if(isset($_POST['deleteone'])){ 
          $id = $_POST['id'];
            $sql = " DELETE FROM `email` WHERE email_id = '$id'  ";
                   $result = mysqli_query($con,$sql); 
        }
        if(isset($_POST['deleteall'])){ 
              $sql = " DELETE FROM `email` WHERE admin_id = '$admintoken'  ";
                   $result = mysqli_query($con,$sql); 
          
        }
        if(isset($_POST['changesystememail'])){ 
          $newemail = $_POST['newemail'];
          $newpass = $_POST['newpass'];
          $code = $_POST['code'];

           
          $sqls = " select * from `administrator` where admin_id='$admintoken'  ";
                            $results = mysqli_query($con,$sqls); 
                           
                         
                        
                         
                             while($row = mysqli_fetch_array($results)){
                        $defaultcode = $row['vcode'];
                             }  
                    

          if($code == $defaultcode){
             $sql = " UPDATE `gui` SET `email`='$newemail', `password`='$newpass' WHERE id = 1  ";
                          $result = mysqli_query($con,$sql);
              $_SESSION['email'] = $newemail;
              $_SESSION['password']= $newpass;
            }else {
                echo 'error';
            }
          /*
            $sql = " UPDATE `gui` SET `email`='$newemail', `password`='$newpass' WHERE id = 1  ";
                          $result = mysqli_query($con,$sql);*/

        }

        //RESET SYSTEM EMAIL
        if(isset($_POST['resetsystememail'])){ 
          $sql = " UPDATE `gui` SET `email`='hantechsupprt@gmail.com', `password`='09557653775' WHERE id = 1  ";
                          $result = mysqli_query($con,$sql);

              $_SESSION['email'] = 'hantechsupprt@gmail.com';
              $_SESSION['password']='09557653775';  
          
        }

        if(isset($_POST['addnewadmin'])){ 

          $adem = $_POST['adem'];
          $adln = $_POST['adln'];
          $adfn = $_POST['adfn'];
          $admn = $_POST['admn'];
          $adty = $_POST['adty'];

          $dsp = 'admin_'.$adln;
             $sql = " INSERT INTO `administrator`(`admin_lname`, `admin_fname`, `admin_mname`, `admin_dsplyname`, `admin_type`, `admin_email`) 
             VALUES ('$adln','$adfn','$admn','$dsp','$adty','$adem')  ";
                         $result = mysqli_query($con,$sql); // run query
                        
          
        }

        if(isset($_POST['editadmin'])){ 
           $adem = $_POST['adem1'];
          $adln = $_POST['adln1'];
          $adfn = $_POST['adfn1'];
          $admn = $_POST['admn1'];
          $adty = $_POST['adty1'];
          $adid = $_POST['adid'];

         
    $sql = " UPDATE `administrator` SET `admin_lname`='$adln',`admin_fname`='$adfn',`admin_mname`='$admn',`admin_type`='$adty',`admin_email`='$adem' WHERE admin_id='$adid' ";
                          $result = mysqli_query($con,$sql); // run query
                        
          
        }
        if(isset($_POST['deleteadmin'])){ 
          $id = $_POST['id'];
                $sql = " DELETE FROM `administrator` WHERE admin_id = '$id' ";
                            $result = mysqli_query($con,$sql); // run query
                           
          
        }
 ?>