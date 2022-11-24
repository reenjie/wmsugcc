<?php 
session_start();
	
		
include '../create_form/connect.php';


 $token =  $_SESSION['admingcc_token'];     

		if(isset($_POST['formname'])){ 
			

			$formname = $_POST['formname'];
			 date_default_timezone_set('Asia/Manila'); 
					$defdt =  date("Y-m-d H:i:s");
				  
						
	$sql = " INSERT INTO `form_classification`(`form_name`, `datecreated`,`bodybg`,`titlebg`,`questionbg`,`bodytext`,`textcolortitle`,`textcolorquestion`) VALUES ('$formname','$defdt','#d8d5dd','#5379c1','#2975a6','#0a2a3f','#f6f8fa','#020307')  ";
				                $result = mysqli_query($con,$sql); // run query
				               
				              $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
				         	$_SESSION['form_id'] = $get_id;


                             ///save to logs
                    date_default_timezone_set('Asia/Manila'); 
                    $date_m = date('Y-m-d H:i:s');
                     $token =  $_SESSION['admingcc_token'];
                       $sem = $_SESSION['sem'];
                    $save_to_logs = "INSERT INTO `logs`(`stud_id`, `admin_id`, `admin_type`, `content`, `datemodified`,`manage_fields`,`semester`) 
                    VALUES (0,'$token','GCC','Added new Form named $formname','$date_m','Add','$sem')";
                    mysqli_query($con,$save_to_logs); 

				      
			
		}
		if(isset($_POST['setedit'])){ 
			$csformid = $_POST['csformid'];
			$_SESSION['form_id'] = $csformid;
      $token =  $_SESSION['admingcc_token'];
                  $sqls = " select * from `form` where class_name = '$csformid'   ";
                              $results = mysqli_query($con,$sqls); // run query
                            
                         
                               while($row = mysqli_fetch_array($results)){
                              $form_id = $row['form_id'];
                              $status = $row['status'];
                              $dorder =  $row['display_order'];
                            $secno = $row['sec_no'];

                              if($status == 'selected'){

                                $sql = " UPDATE `form` SET `status`= NULL  WHERE form_id ='$form_id'  ";
                                 $result = mysqli_query($con,$sql); 

                              }

                             
                              }
                            

                                $updatelastform = "UPDATE `form` SET `status`= 'selected'  WHERE form_id ='$form_id'";
                                mysqli_query($con,$updatelastform);
                                 
                            $_SESSION['dorder'] = $dorder;
                            $_SESSION['sectionset'] = $secno;


                    $strict = " UPDATE `form_classification` SET `status`='$token' WHERE csform_id= '$csformid'  ";
                            mysqli_query($con,$strict); 
                              
                        if($csformid == 62){
                            $word = 'Personal Data Sheet';
                        }else if ($csformid == 60){
                            $word = 'Shifting Form';
                        }


                    ///save to logs
                    date_default_timezone_set('Asia/Manila'); 
                    $date_m = date('Y-m-d H:i:s');
                      $sem = $_SESSION['sem'];
                    $save_to_logs = "INSERT INTO `logs`(`stud_id`, `admin_id`, `admin_type`, `content`, `datemodified`,`manage_fields`,`semester`) 
                    VALUES (0,'$token','GCC','Managing $word','$date_m','Manage','$sem')";
                    mysqli_query($con,$save_to_logs); 
                     
                     
			
		}
			
	      if(isset($_POST['deleteform'])){ 
	      	$csformid = $_POST['csformid'];
	      							
	      							$sql = " DELETE FROM `form_classification` WHERE csform_id = '$csformid' ";
	      					                $result = mysqli_query($con,$sql); 


	      					                $delformcontaincsform = " DELETE FROM `form` WHERE class_name = '$csformid' ";
	      					                $resdelform = mysqli_query($con,$delformcontaincsform); 

	      					    		
                                                     ///save to logs
                    date_default_timezone_set('Asia/Manila'); 
                    $date_m = date('Y-m-d H:i:s');
                      $sem = $_SESSION['sem'];
                    $save_to_logs = "INSERT INTO `logs`(`stud_id`, `admin_id`, `admin_type`, `content`, `datemodified`,`manage_fields`,`semester`) 
                    VALUES (0,'$token','GCC','Deleted Form named $formname','$date_m','Delete','$sem')";
                    mysqli_query($con,$save_to_logs); 
	      					             
	       	   	
	         }   
	         if(isset($_POST['content'])){ 
	         	include '../Classes/sql_query.php';
				$fetch = new sqlquery();
	          		 $fetch -> manage_form_content();
	          } 
	          if(isset($_POST['contentlink'])){ 
	         	include '../Classes/sql_query.php';
				$fetch = new sqlquery();
	          		$fetch -> sendlinkform_content();
	          } 

	          if(isset($_POST['viewform'])){ 
	        $csformid = $_POST['csformid'];
			$_SESSION['view_form_id'] = $csformid;


                      $sql = " select * from form where type = 'section' and class_name = '$csformid'  ";
                                  $result = mysqli_query($con,$sql); // run query
                                  $count= mysqli_num_rows($result); // to count if necessary
                                 //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
                               if ($count>=1){
                                 $_SESSION['sectionformactive'] = 1;
                            }




			
	          }
	          if(isset($_GET['formlink'])){ 
	          	$form_name = $_GET['form_name'];
	          	$token_id = $_GET['token_id'];
	          	$_SESSION['formnamesession']= $form_name;
              $_SESSION['formtoken'] = $token_id;
              $_SESSION['unknown_user'] = 1;
              $_SESSION['ask_for_credentials'] = 1;

              function getClientIP() {

    if (isset($_SERVER)) {

        if (isset($_SERVER["HTTP_X_FORWARDED_FOR"]))
            return $_SERVER["HTTP_X_FORWARDED_FOR"];

        if (isset($_SERVER["HTTP_CLIENT_IP"]))
            return $_SERVER["HTTP_CLIENT_IP"];

        return $_SERVER["REMOTE_ADDR"];
    }

    if (getenv('HTTP_X_FORWARDED_FOR'))
        return getenv('HTTP_X_FORWARDED_FOR');

    if (getenv('HTTP_CLIENT_IP'))
        return getenv('HTTP_CLIENT_IP');

    return getenv('REMOTE_ADDR');
}

              $_SESSION['user_student_token_check'] = getClientIP() ;
                
                $usertoken = getClientIP();
              
              $_SESSION['form_type'] = 'others';
          //    $_SESSION['user_student_token_check']= 3; //Here add the usersessionid change this with the student id
	          	?>
	          	<title>GCC-<?php echo $form_name ?></title>
	          	<?php

               $sql = " select * from form where type = 'section' and class_name = '$token_id'  ";
                                  $result = mysqli_query($con,$sql); // run query
                                  $count= mysqli_num_rows($result); // to count if necessary
                                 //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
                               if ($count>=1){
                                 $_SESSION['sectionformactivated'] = 1;
                            }


  date_default_timezone_set('Asia/Manila');
  $datenow= date('Y-m-d H:i:s');

  //if($csid)
    $sql = " select * from form where  class_name = '$token_id' and type='Question' ";
                                  $result = mysqli_query($con,$sql); // run query
                                  $count= mysqli_num_rows($result); // to count if necessary
                                 //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
                               if ($count>=1){
                                 $_SESSION['sectionformactivated'] = 1;

                                   while($row = mysqli_fetch_array($result)){
                                    
                                 //   echo $usertoken.' ';
                                    $sec_no= $row['sec_no'];
                                    $formid= $row['form_id'];
                                    $csformidd =  $row['class_name'];
                                   // echo $row['content'];

                                        $checkifTempdata_exist = " SELECT * FROM `temp_answers` where userid='$usertoken' and csformid = '$csformidd' and formid = '$formid'  ";
                                                    $theresultfromchecking = mysqli_query($con,$checkifTempdata_exist); 
                                                    $countcheck= mysqli_num_rows($theresultfromchecking);
                                                  
                                                 if ($countcheck>=1){
                                                  // Ignore
                                                  //echo 'exist';
                                                     while($chk = mysqli_fetch_array($theresultfromchecking)){
                                    
                                                     }
                                              }else {
                                                // Add new one
                                              //  echo 'addnew';

                                        $insertformto_temp = "INSERT INTO `temp_answers`(`userid`, `sec_no`, `formid`, `csformid`, `datecreated`) VALUES ('$usertoken','$sec_no','$formid','$csformidd','$datenow')";
                                            mysqli_query($con,$insertformto_temp);
                      
                                           


                                              }


                                   

                                   }

                            }

                            //////////////////////////////////////////ADD THE TABLES AND LIST COLUMNS
                                $getforms = " select * from form where class_name ='$token_id'   ";
                                            $gettingforms = mysqli_query($con,$getforms); 
                                            $countsform= mysqli_num_rows($gettingforms);
                                           //  $get_id =  mysqli_insert_id($con); 
                                       
                                        
                                             while($row = mysqli_fetch_array($gettingforms)){
                                      $formids = $row['form_id'];

                                      $sec = $row['sec_no'];




                                   $tc = " SELECT * FROM `tablecolumn_number` where formid='$formids' ";
                              $resulttc = mysqli_query($con,$tc); // run query
                          $counttbl= mysqli_num_rows($resulttc);


                          if($counttbl >=1){


                                                     
                                    
                                       while($rowtc = mysqli_fetch_array($resulttc)){
                                        $tctype= $rowtc['type'];
                                        $tcId= $rowtc['tc_id'];

                                        
              $selectcontents = " SELECT * FROM `tablecolumn_content` where tc_id = '$tcId' and formid='$formids'  ";
                   $resultcc = mysqli_query($con,$selectcontents); // run query
                                           
                                             while($cntnt = mysqli_fetch_array($resultcc)){
                                              $ct = $cntnt['content'];
                                              $fd = $cntnt['formid'];
                                              $tbleid = $cntnt['tble_id'];
                                              $tcidd= $cntnt['tc_id'];  

    $checktosave = " SELECT * FROM `temp_answers` where formid = '$fd' and tble_id = '$tbleid' and tc_id = '$tcidd'  ";
       $resultinsaving = mysqli_query($con,$checktosave); 
      $countsave= mysqli_num_rows($resultinsaving);
      if ($countsave>=1){
    //  echo 'count table 1';
         while($row = mysqli_fetch_array($resultinsaving)){
                                    
         }
      }else {
     $inserttpdtemp = "INSERT INTO `temp_answers`(`userid`, `sec_no`, `formid`, `tble_id`, `tc_id`,`datecreated`,`tble`,`csformid`) VALUES ('$usertoken','$sec','$fd','$tbleid','$tcidd','$datenow',1,'$token_id')";
      mysqli_query($con,$inserttpdtemp); 
  
                                                

         }



                             }

                                       }
                                   }else {

                                   }



                       $mlist= " SELECT * FROM `tablecolumn_content` where typ =1 and formid='$formids'  ";
                              $resultmlist = mysqli_query($con,$mlist); // run query
                           $countmlista= mysqli_num_rows($resultmlist); // to count if necessary

                                   if($countmlista >=1 ){
                                    

                                       while($rowlist = mysqli_fetch_array($resultmlist)){
                                        $cct = $rowlist['content'];
                                        $fdlist = $rowlist['formid'];
                                        $tccontent= $rowlist['tcontent_id'];
                                       
                                        //


      $checktosave = " SELECT * FROM `temp_answers` where formid = '$fdlist' and tcontent_id='$tccontent' and list = 1   ";
       $resultinsaving = mysqli_query($con,$checktosave); 
      $countsave= mysqli_num_rows($resultinsaving);
      if ($countsave>=1){
    //  echo 'count 1';
        
      }else {
    
       $inserttpdtemp = "INSERT INTO `temp_answers`(`userid`, `sec_no`, `formid`, `datecreated`,`list`,`tcontent_id`,`csformid`) VALUES ('$usertoken','$sec','$fdlist','$datenow',1,'$tccontent','$token_id')";
      mysqli_query($con,$inserttpdtemp);

      

      //dli sya pwede kc diri ga aacccess ang shiftform

                                                
 }
                                        }

                                     }            


                                             }


	  		 $_SESSION['Live_form_id'] = $token_id;
			   header('location:../response/');
















	          	
	          }

              if(isset($_POST['saveexit'])){
                $csformid = $_POST['csformid'];

              $strict = " UPDATE `form_classification` SET `status`='0' WHERE csform_id= '$csformid'  ";
              mysqli_query($con,$strict);
                  
              }

 ?>
 <script type="text/javascript">
 	  $('#table_id').DataTable();
 	  $('#table_ids').DataTable();
 	$('.edit').click(function() { 
      var csformid = $(this).data('csformid');


           
          
               
             var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
             if (this.readyState == 4 && this.status == 200) {
            const data = this.responseText;
          
          window.location.href= "../create_form";
                         }
                      };
              xhttp.open("POST", "form_session.php",true);
              xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
              xhttp.send("setedit=1&csformid="+csformid);
                  
                           
    })

    $('.delete').click(function() { 
       var csformid = $(this).data('csformid');
       var formname = $(this).data('formname');
      

          Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
    var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
             if (this.readyState == 4 && this.status == 200) {
            const data = this.responseText;
          
          tablecontent();
             Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )

                         }
                      };
              xhttp.open("POST", "form_session.php",true);
              xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
              xhttp.send("deleteform=1&csformid="+csformid);

 
  }
})

        
          


    })
    $('.deleteform').click(function() { 
      var csformid = $('#csform').val();
          var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
             if (this.readyState == 4 && this.status == 200) {
            const data = this.responseText;
          
      
                         }
                      };
              xhttp.open("POST", "form_session.php",true);
              xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
              xhttp.send("deleteform=1&csformid="+csformid);
                  
    })
     function tablecontent(){
       
        var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
             if (this.readyState == 4 && this.status == 200) {
            const data = this.responseText;
            $('#tablecontent').html(data);
        
                         }
                      };
              xhttp.open("POST", "form_session.php",true);
              xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
              xhttp.send("content=1");
    }
      
       	
 </script>