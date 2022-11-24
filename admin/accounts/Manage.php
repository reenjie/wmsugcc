<?php 
session_start();
include '../../GCC/create_form/connect.php';
$admintoken = $_SESSION['superadminId'];
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Change password || comparison
	 if(isset($_POST['compare'])) {
                       
                    $currentpass = $_POST['currentpass'];	
                    

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

        //Edit Superadmin Pic.
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

        //Saving new password
        if(isset($_POST['savenewpassword'])){ 
              $txtnew = $_POST['txtnew'];
              $sql = " UPDATE `administrator` SET `admin_password`='$txtnew' WHERE admin_id = '$admintoken'  ";
                                     $result = mysqli_query($con,$sql); 

        }

        // Changing Disp
        if(isset($_POST['changedisplayname'])){ 
          $namevalue = $_POST['namevalue'];
           $sql = " UPDATE `administrator` SET `admin_dsplyname`='$namevalue' WHERE admin_id = '$admintoken'  ";
                                     $result = mysqli_query($con,$sql); 
          
        }

        //Saving admin title
        if(isset($_POST['saveadmintitle'])){ 
          $titlevalue = $_POST['titlevalue'];
             $sql = " UPDATE `administrator` SET `admin_banner`='$titlevalue' WHERE admin_id = '$admintoken'  ";
                                     $result = mysqli_query($con,$sql); 
                     $_SESSION['sidebar_banner'] = $titlevalue;    
          

          
        }

        //Color
        if(isset($_POST['savenewcolor'])){ 
          $colorval = $_POST['colorval'];
               $sql = " UPDATE `gui` SET `sidebar_color`='$colorval' WHERE id = 1  ";
                          $result = mysqli_query($con,$sql);

          $_SESSION['sidebar_color'] = $colorval;
          
        }


        //reset color
        if(isset($_POST['resetdefaultcolor'])){ 
          $defaultcolor = '#63a284';
           $sql = " UPDATE `gui` SET `sidebar_color`='$defaultcolor' WHERE id = 1  ";
                          $result = mysqli_query($con,$sql);
           $_SESSION['sidebar_color'] =  $defaultcolor;
        }

        //Adv search on
        if(isset($_POST['setenable'])){ 
             $sql = " UPDATE `gui` SET `advancesearch`='enabled' WHERE id = 1  ";
                          $result = mysqli_query($con,$sql);
                          $_SESSION['advancesearch'] = 'enabled';
        }
        //Adv search off
        if(isset($_POST['setdisable'])){ 
             $sql = " UPDATE `gui` SET `advancesearch`='disabled' WHERE id = 1  ";
                          $result = mysqli_query($con,$sql);
                           $_SESSION['advancesearch'] = 'disabled';
        }

        //Delete Email.
        if(isset($_POST['deleteone'])){ 
          $id = $_POST['id'];
            $sql = " DELETE FROM `email` WHERE email_id = '$id'  ";
                   $result = mysqli_query($con,$sql); 
        }

        //Delete all- email
        if(isset($_POST['deleteall'])){ 
              $sql = " DELETE FROM `email` WHERE admin_id = '$admintoken'  ";
                   $result = mysqli_query($con,$sql); 
          
        }

        //
        /* if(isset($_POST['changesystememail'])){ 
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
         
            $sql = " UPDATE `gui` SET `email`='$newemail', `password`='$newpass' WHERE id = 1  ";
                          $result = mysqli_query($con,$sql);

        }
        */
        //RESET SYSTEM EMAIL
        if(isset($_POST['resetsystememail'])){ 
          $sql = " UPDATE `gui` SET `email`='hantechsupprt@gmail.com', `password`='09557653775' WHERE id = 1  ";
                          $result = mysqli_query($con,$sql);

              $_SESSION['email'] = 'hantechsupprt@gmail.com';
              $_SESSION['password']='09557653775';  
          
        }

        //add new admin GC or GCC
        if(isset($_POST['addnewadmin'])){ 
        
       
          $adem = $_POST['adem'];
          $adln = $_POST['adln'];
          $adfn = $_POST['adfn'];
          $admn = $_POST['admn'];
          $adty = $_POST['adty'];

         if(isset($_POST['cn'])){
          $cn = $_POST['cn'];
         }else {
          $cn = '000000000';
         }

         if(isset($_POST['ed'])){
          $ed = $_POST['ed'];
         }else {
          $ed = date('Y-m-d H:i:s');
         }
        

             if(isset($_POST['adpos'])){
         $adpos = $_POST['adpos'];
    }else {
        $adpos = '';
        
    }
   
       

          date_default_timezone_set('Asia/Manila');
          $datenow = date('Y-m-d H:i:s');



          

      
          $pass = '@'.strtolower($adty).'_'.$adln;

          if(isset($_POST['coll'])){
            $coll = $_POST['coll'];
          }else {
            $coll = 0;
          }
         
          //echo $adem.$adln.$adfn.$admn.$adty.$cn.$ed.$adpos.$datenow.$pass.$coll;

          $hashedpass = md5($pass);

          $dsp = 'admin'.$adln;
          $banner = $adty.'_ADMIN';
             $sql = "INSERT INTO `administrator`(
              `admin_lname`,
              `admin_fname`, 
              `admin_mname`,
              `admin_dsplyname`,
              `admin_type`, 
              `admin_email`,
               `admin_password`,
               `CollegeId`,
               `ft`,
               `admin_banner`,
               `admin_sidebarbg`,
               `admin_contactno`,
               `admin_effectivedate`,
               `admin_position`,
               `rpby`,
               `esign`,
               `edstat`,
               `new_gc`, 
               `show_rec`, 
               `test`
               ) 
             VALUES (
             '$adln',
             '$adfn',
             '$admn',
             '$dsp',
             '$adty',
             '$adem',
             '$hashedpass',
             '$coll',
              1,
             '$banner',
             '#63a284',
             '$cn',
             '$ed',
             '$adpos', 
             0,
             '',
             0,
             0,
             0,
             0)";

  
           $result  = mysqli_query($con,$sql);
            if($result){
              echo $adem;
            }else{
            //  echo 'fail';
              echo $con->error;
            }
            

        }


          //Update admin
        if(isset($_POST['editadmin'])){ 
           $adem = $_POST['adem1'];
          $adln = $_POST['adln1'];
          $adfn = $_POST['adfn1'];
          $admn = $_POST['admn1'];
          $adty = $_POST['adty1'];
          $adid = $_POST['adid'];
         
          
          $adpos1 = $_POST['adpos1'];

          if(isset($_POST['uptcol'])){
            $uptcol = $_POST['uptcol'];
          }else {
            $uptcol = 0;
          }
          if(isset($_POST['addate'])){
            $addate = $_POST['addate'];
          }else {
            $addate = date('Y-m-d');
          }

          
     
        
    $sql = "UPDATE `administrator` 
      SET 
    `admin_lname`='$adln',
    `admin_fname`='$adfn',
    `admin_mname`='$admn',
    `admin_type`='$adty',
    `admin_email`='$adem',
    `CollegeId`='$uptcol', 
    `admin_effectivedate`='$addate' ,
    `admin_position` = '$adpos1' 
    WHERE admin_id='$adid' ";

    if(mysqli_query($con,$sql)){
      echo 'saved';
    }else {
      echo 'failed';
    }
      
          
        }

        //Delete admin =
        if(isset($_POST['deleteadmin'])){ 
          $id = $_POST['id'];
                $sql = " DELETE FROM `administrator` WHERE admin_id = '$id' ";
                            $result = mysqli_query($con,$sql); // run query
                           
          
        }
        //Delete student
        if(isset($_POST['deletestudent'])){
             $id = $_POST['id'];
                $sql = " DELETE FROM `student` WHERE stud_id = '$id' ";
                            $result = mysqli_query($con,$sql); // run query
        }

        //Admin replacement
          if(isset($_POST['replaceadmin'])){ 

          $adem = $_POST['rpadem'];
          $adln = $_POST['rpadln'];
          $adfn = $_POST['rpadfn'];
          $admn = $_POST['rpadmn'];
          $adty = $_POST['rpadty'];
          $rpcoll = $_POST['rpcoll'];
          $cn = $_POST['rpcn'];
          $ed = $_POST['rped'];
          $id = $_POST['id_'];

        


       

         // echo $adem.$adln.$adfn.$admn.$adty.$cn.$ed;
          date_default_timezone_set('Asia/Manila');
          $datenow = date('Y-m-d H:i:s');



      
          $pass = '@'.strtolower($adty).'_'.$adln;

          if(isset($_POST['coll'])){
            $coll = $_POST['coll'];
          }else {
            $coll = 0;
          }
          echo $adem;
       

          $hashedpass = md5($pass);

          $dsp = 'admin_'.$adln;
             $sql = " INSERT INTO `administrator`(`admin_lname`, `admin_fname`, `admin_mname`, `admin_dsplyname`, `admin_type`, `admin_email`,`admin_password`,`CollegeId`,`ft`,`admin_banner`,`admin_sidebarbg`,`admin_contactno`,`admin_effectivedate`,`new_gc`) 
             VALUES ('$adln','$adfn','$admn','$dsp','$adty','$adem','$hashedpass','$rpcoll','1','$adty ADMIN','#63a284','$cn','$ed','1')  ";
                         $result = mysqli_query($con,$sql); // run query

                        

                      if($result){
                         $newreplaced = mysqli_insert_id($con);

          $replace_coordinator = "UPDATE `administrator` SET `admin_executiondate`='$datenow',`rpby`='$newreplaced' ,`edstat`=1 WHERE admin_id ='$id' ";
          mysqli_query($con,$replace_coordinator);

                      }   

         
                    
          
        }


        //Display admin Info
        if(isset($_POST['info'])){
          $info = $_POST['info'];
          $col = $_POST['col'];
          $edate = $_POST['edate'];

           $select_admin = "select * from administrator where admin_id = '$info'  ";
            $getdetails = mysqli_query($con,$select_admin); 
         
          while($row = mysqli_fetch_array($getdetails)){
            $collegeids = $row['CollegeId'];
              ?>

<div class="container">
  <h6 class="mb-4" style="font-size:12px">Date Replaced : <?php echo date('F j,Y',strtotime($edate)) ?></h6>
  <hr>
  <h6 style="font-weight:bolder;"><?php echo $row['admin_lname'].' '.$row['admin_fname'] ?></h6>
  <span style="font-size:13px"><?php echo $row['admin_email'] ?></span>

  <h6 class="mt-2" style="font-weight: bolder;font-size: 14px;">Effective Date :
    <?php echo date('F j,Y',strtotime($row['admin_effectivedate'])) ?>

    <br>
    <br>
    <span class="text-primary">
      <?php 

               echo  $col ;
                 ?>
    </span>
  </h6>


</div>


<?php
                     
            }
         
          
          
        }
 ?>