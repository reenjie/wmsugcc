<?php 
session_start();
include '../create_form/connect.php';

if(isset($_POST['savenewheaderphoto'])){ 


		//
                  $image_name = $_FILES['newphoto']['name'];
                   $tmp_name   = $_FILES['newphoto']['tmp_name'];
                $size       = $_FILES['newphoto']['size'];
                 $type       = $_FILES['newphoto']['type'];
                 $error      = $_FILES['newphoto']['error'];
                                                                                                                                    
             
                                                                                                                                    
           $fileName =basename($_FILES['newphoto']['name']);
         
                  $rand = rand(100,1000);                                                                                                                   
            $fname = $rand.'Photo'.'_'.$fileName;
                // File upload path
            $uploads_dir = '../img/';
         move_uploaded_file($tmp_name , $uploads_dir .'/'.$fname);
             
             	date_default_timezone_set('Asia/Manila');
             	$datenow = date('Y-m-d H:i:s');
         	 $sql = " INSERT INTO `photoalbum`(`photo`, `datecreated`, `status`) VALUES ('$fname','$datenow',0) ";
		 			                $result = mysqli_query($con,$sql); 

		 			                
		 			               
                                                                                                                          
         
          
        date_default_timezone_set('Asia/Manila'); 
            $token =  $_SESSION['admingcc_token'];
                    $date_m = date('Y-m-d H:i:s');
                     $sem = $_SESSION['sem'];
                    $save_to_logs = "INSERT INTO `logs`(`stud_id`, `admin_id`, `admin_type`, `content`, `datemodified`,`manage_fields`,`semester`) 
                    VALUES (0,'$token','GCC','Manages Headers Photo.(Homepage)','$date_m','Manage','$sem')";
                    mysqli_query($con,$save_to_logs); 






}
if(isset($_POST['removephoto'])){ 
	$src = $_POST['src'];
	$id = $_POST['id'];
	unlink($src);

				$sql = " DELETE FROM `photoalbum` WHERE paid = '$id'  ";
		                $result = mysqli_query($con,$sql); // run query


                          date_default_timezone_set('Asia/Manila'); 
            $token =  $_SESSION['admingcc_token'];
                    $date_m = date('Y-m-d H:i:s');
                     $sem = $_SESSION['sem'];
                    $save_to_logs = "INSERT INTO `logs`(`stud_id`, `admin_id`, `admin_type`, `content`, `datemodified`,`manage_fields`,`semester`) 
                    VALUES (0,'$token','GCC','Removed Photo.(Homepage)','$date_m','Manage','$sem')";
                    mysqli_query($con,$save_to_logs); 
		              
	
}

if(isset($_POST['changephoto'])){ 
	$id = $_POST['id'];

							$sql = " UPDATE `photoalbum` SET `status`=0 WHERE 1  ";
					                $result = mysqli_query($con,$sql); // run query

					                if ($result) {
					                			$sqlu = " UPDATE `photoalbum` SET `status`=1 WHERE paid ='$id'   ";
					                	                 mysqli_query($con,$sqlu); // run query
					                	               

					                }

                                      date_default_timezone_set('Asia/Manila'); 
            $token =  $_SESSION['admingcc_token'];
                    $date_m = date('Y-m-d H:i:s');
                     $sem = $_SESSION['sem'];
                    $save_to_logs = "INSERT INTO `logs`(`stud_id`, `admin_id`, `admin_type`, `content`, `datemodified`,`manage_fields`,`semester`) 
                    VALUES (0,'$token','GCC','Changed Photo.(Homepage)','$date_m','Manage','$sem')";
                    mysqli_query($con,$save_to_logs); 
					               
}

if(isset($_POST['imagealbum'])){ 

                                  		$images = " SELECT * FROM `photoalbum`  ";
                                                  $resultsss = mysqli_query($con,$images); // run query
                                                  $countsss= mysqli_num_rows($resultsss); // to count if necessary
                                                 //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
                                               if ($countsss>=1){
                                               	//while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                                                   while($row = mysqli_fetch_array($resultsss)){
                                                   	$src = '../img/'.$row['photo'];
                                                   	$statuss = $row['status'];
                                  					?>
                             			<div class="col-md-6 mb-2">
                                       	 	 		 		 	 <div class="card shadow ">
                                       	 	 		 		 	 	 <div class="card-body">
                                       	 	 		 		 	 	 	
                                       	 	 		 		 	 	 	  <img src="<?php echo $src ?>" style="width:100%; height: 250px;" class="img-thumbnail">
                                       	 	 		 		  <!---->
                                       	 	 		 		  
                                       	 	 		 		 <?php 
                                       	 	 		 		 if($statuss == 1 ){
                                       	 	 		 		 	echo '<span class="bg-success py-1 px-1 text-light" style="font-size:14px;border-radius:10px">On use</span>';
                                       	 	 		 		 }else {
                                       	 	 		 		 	?>
                                       	 	 		 		 	<button class="btn btn-light text-primary usephoto" data-photoid="<?php echo $row['paid'] ?>" style="font-size: 12px">Use this Photo</button>

                                       	 	 		 		 	<button class="btn btn-light text-danger removephoto"  data-src="<?php echo $src ?>" data-photoid="<?php echo $row['paid'] ?>" style="font-size: 12px">Remove</button>
                                       	 	 		 		 	<?php
                                       	 	 		 		 }
                                       	 	 		 		  ?>
                                       	 	 		 		 	 	 </div> 
                                       	 	 		 		 	 	 
                                       	 	 		 		 	 </div> 
                                       	 	 		 		 	 
                                       	 	 		 		
                                       	 	 		 		 </div> 

                                       	 	 		 		 <script type="text/javascript">

                          $('.usephoto').click(function() { 
                         var photoid = $(this).data('photoid');
                                       	 	 		 		 		
      	            
      	               $.ajax({
      	                       url : "action.php",
      	                        method: "POST",
      	                         data  : {changephoto:1,id:photoid},
      	                         success : function(data){
      	            				imagealbum();
      	                         }
      	                      })
                                       	 	 		 		 	})
                                       	 	 		 		 	
                                       	 	 		 		 	 $('.removephoto').click(function() { 
      	            var src = $(this).data('src');
      	            var photoid = $(this).data('photoid');


      	            
      	            
      	               $.ajax({
      	                       url : "action.php",
      	                        method: "POST",
      	                         data  : {removephoto:1,src:src,id:photoid},
      	                         success : function(data){
      	            				 
							     imagealbum();
							 
      	                         }
      	                      })
      	              
      	            
      	              
      	                
      	            })   
      	       

      	            function imagealbum() {
      	             	  
      	             	   $.ajax({
      	             	           url : "action.php",
      	             	            method: "POST",
      	             	             data  : {imagealbum:1},
      	             	             success : function(data){
      	             				$('#imagealbum').html(data);
      	             	             }
      	             	          })
      	             	    
      	             	    
      	             }       
                                       	 	 		 		       	
                                       	 	 		 		 </script>

                                  					<?php
                                                   }
                                            }
                                						   
	
}

if(isset($_POST['savebanner'])){ 
	$val = $_POST['val'];
			$sql = " UPDATE `gui` SET `sidebar_banner`='$val' WHERE id = 3  ";
	                $result = mysqli_query($con,$sql); // run query

                      date_default_timezone_set('Asia/Manila'); 
            $token =  $_SESSION['admingcc_token'];
                    $date_m = date('Y-m-d H:i:s');
                     $sem = $_SESSION['sem'];
                    $save_to_logs = "INSERT INTO `logs`(`stud_id`, `admin_id`, `admin_type`, `content`, `datemodified`,`manage_fields`,`semester`) 
                    VALUES (0,'$token','GCC','Banner Updated.(Homepage)','$date_m','Manage','$sem')";
                    mysqli_query($con,$save_to_logs); 
	             
	
}

if(isset($_POST['changecoloraa'])){ 
  $color = $_POST['color'];
    
        $sql = " UPDATE `gui` SET `sidebar_color`='$color' WHERE id= 3 ";
                    $result = mysqli_query($con,$sql); // run query

                      date_default_timezone_set('Asia/Manila'); 
            $token =  $_SESSION['admingcc_token'];
                    $date_m = date('Y-m-d H:i:s');
                     $sem = $_SESSION['sem'];
                    $save_to_logs = "INSERT INTO `logs`(`stud_id`, `admin_id`, `admin_type`, `content`, `datemodified`,`manage_fields`,`semester`) 
                    VALUES (0,'$token','GCC','Color Changed.(Homepage)','$date_m','Manage','$sem')";
                    mysqli_query($con,$save_to_logs); 
                  

}

if(isset($_POST['savenewcarouselitem'])){




       
                      $image_name = $_FILES['imagefileforcarousel']['name'];
                       $tmp_name   = $_FILES['imagefileforcarousel']['tmp_name'];
                    $size       = $_FILES['imagefileforcarousel']['size'];
                     $type       = $_FILES['imagefileforcarousel']['type'];
                     $error      = $_FILES['imagefileforcarousel']['error'];
                                                                                                                                        
                 
                                                                                                                                        
               $fileName =basename($_FILES['imagefileforcarousel']['name']);
                     $rand = rand(100,1000);                                                                                                                   
                $pname = $rand.'Photo'.'_'.$fileName;
                    // File upload path
                $uploads_dir = '../img/';


             move_uploaded_file($tmp_name , $uploads_dir .'/'.$pname);
                  
              date_default_timezone_set('Asia/Manila');
              $datenow = date('Y-m-d H:i:s'); 
             
               $sql = " INSERT INTO `carousel`(`imagename`, `datecreated`, `status`, `static`) VALUES ('$pname','$datenow',0,0)";
                               $result = mysqli_query($con,$sql); 
                             
                                                                                                                              
             
           
          date_default_timezone_set('Asia/Manila'); 
            $token =  $_SESSION['admingcc_token'];
                    $date_m = date('Y-m-d H:i:s');
                     $sem = $_SESSION['sem'];
                    $save_to_logs = "INSERT INTO `logs`(`stud_id`, `admin_id`, `admin_type`, `content`, `datemodified`,`manage_fields`,`semester`) 
                    VALUES (0,'$token','GCC','Carousel Added new item.(Homepage)','$date_m','Manage','$sem')";
                    mysqli_query($con,$save_to_logs); 
    
                
  
}

if(isset($_POST['uptcarouselitem'])){

$pid = $_POST['pid'];
$src = $_POST['src'];
unlink($src);


       
                      $image_name = $_FILES['uptimgsrcforcar']['name'];
                       $tmp_name   = $_FILES['uptimgsrcforcar']['tmp_name'];
                    $size       = $_FILES['uptimgsrcforcar']['size'];
                     $type       = $_FILES['uptimgsrcforcar']['type'];
                     $error      = $_FILES['uptimgsrcforcar']['error'];
                                                                                                                                        
                 
                                                                                                                                        
               $fileName =basename($_FILES['uptimgsrcforcar']['name']);
                     $rand = rand(100,1000);                                                                                                                   
                $pname = $rand.'Photo'.'_'.$fileName;
                    // File upload path
                $uploads_dir = '../img/';


             move_uploaded_file($tmp_name , $uploads_dir .'/'.$pname);
                  
              date_default_timezone_set('Asia/Manila');
              $datenow = date('Y-m-d H:i:s'); 
             
               $sql = " UPDATE `carousel` SET `imagename`='$pname' WHERE caro_id='$pid'";
                               $result = mysqli_query($con,$sql); 
                             
                                                                                                                              
             
           
    
      date_default_timezone_set('Asia/Manila'); 
            $token =  $_SESSION['admingcc_token'];
                    $date_m = date('Y-m-d H:i:s');
                     $sem = $_SESSION['sem'];
                    $save_to_logs = "INSERT INTO `logs`(`stud_id`, `admin_id`, `admin_type`, `content`, `datemodified`,`manage_fields`,`semester`) 
                    VALUES (0,'$token','GCC','Carousel Item Updated.(Homepage)','$date_m','Manage','$sem')";
                    mysqli_query($con,$save_to_logs); 
                
  
}

if(isset($_POST['caritem'])){
 
                                                    $carouselitems = " SELECT * FROM `carousel`  ";
                                                                $resultcar = mysqli_query($con,$carouselitems); // run query
                                                                $countcar= mysqli_num_rows($resultcar); // to count if necessary
                                                               //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
                                                             if ($countcar>=1){
                                                               //while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                                                                 while($row = mysqli_fetch_array($resultcar)){
                                                                  $carstatus = $row['status'];
                                                                  $static = $row['static'];
                                                                  if($carstatus==1){
                                                                    $activesrc = $row['imagename']; 
                                                                    echo '<input type="hidden" id="activersrc" value="'.$activesrc.'">';
                                                                   }
                                                                 
                                                                      ?>
                                                                       <li class="list-group-item"><?php echo $row['imagename'] ?><span>
                                                                         <?php 
                                                                        if( $static == 0){
                                                                          ?>
                                                                          <span style="user-select: none"><br><br></span>
                                                                          <button class="btn btn-light text-danger deletecarphoto" data-id="<?php echo $row['caro_id'] ?>" data-imgsrc="../img/<?php echo $row['imagename'] ?>"  style="font-size: 12px;float: right;"> Delete</button>

                                                                          <?php
                                                                        }

                                                                         ?>


                                                                        <button class="btn btn-light view" data-imgsrc="../img/<?php echo $row['imagename'] ?>" style="font-size: 12px;float: right;">View</button>

                                                                         <button class="btn btn-light editcarousel" data-imgsrc="../img/<?php echo $row['imagename'] ?>"  style="font-size: 12px;float: right; margin-right: 3px" data-caroid="<?php echo $row['caro_id'] ?>" data-toggle="modal" data-target="#changephoto" data-backdrop="static" data-keyboard="false"><i class="fas fa-edit text-info" ></i></button>

                                                                       

                                                                       </span></li>
                                                                    <?php
                                                                 
                                                                 }
                                                          }
                      ?>
                      <script type="text/javascript">
                        
                        $(document).ready(function() {
                          var activersrc = $('#activersrc').val();
                         
                          $('#previewpaneimgsrc').attr("src",'../img/'+activersrc);
                                 $('.view').click(function() { 
                          var src = $(this).data('imgsrc');

                        
                          $('#previewpaneimgsrc').attr("src",src);

                        })

                                $('.deletecarphoto').click(function() { 
                                  var id =$(this).data('id');
                                  var src = $(this).data('imgsrc');
                                    $.ajax({
                                           url : "action.php",
                                            method: "POST",
                                             data  : {delitemcar:1,id:id,src:src},
                                             success : function(data){
                                     
                                       getcarouselitem();
                                             }
                                          })   


                                 })

                                 $('.editcarousel').click(function() { 
                            var carid = $(this).data('caroid');
                             var src = $(this).data('imgsrc');
                                      $('#pidd').val(carid);
                                      $('#pidsrc').val(src);

                                   })


                                 function getcarouselitem(){
                                 
                                
                                     $.ajax({
                                             url : "action.php",
                                              method: "POST",
                                               data  : {caritem:1},
                                               success : function(data){
                                        $('#list-group').html(data);
                                       
                                               }
                                            })
                                    
                                    
                              }

                              });      
                              
                      </script>
                      <?php


  
}

if(isset($_POST['delitemcar'])){ 
  $id = $_POST['id'];
  $src = $_POST['src'];

  unlink($src);

        $sql = " DELETE FROM `carousel` WHERE caro_id ='$id' ";
                    $result = mysqli_query($con,$sql); // run query
           
             date_default_timezone_set('Asia/Manila'); 
            $token =  $_SESSION['admingcc_token'];
             $sem = $_SESSION['sem'];
                    $date_m = date('Y-m-d H:i:s');
                    $save_to_logs = "INSERT INTO `logs`(`stud_id`, `admin_id`, `admin_type`, `content`, `datemodified`,`manage_fields`,`semester`) 
                    VALUES (0,'$token','GCC','Deleted Carousel item.(Homepage)','$date_m','Manage','$sem')";
                    mysqli_query($con,$save_to_logs);        
  
}

if(isset($_POST['getvideos'])){ 

   $videocontent = " SELECT * FROM `videocontent`  ";
                        $resultvc = mysqli_query($con,$videocontent); // run query
                        $countvc= mysqli_num_rows($resultvc); // to count if necessary
                       //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
                     if ($countvc>=1){
                      
                         while($row = mysqli_fetch_array($resultvc)){

                         // $videosrc = '../../videos/'.$row['video'];
                          $videothumbnail = '../../videos/'.$row['thumbnail'];
                          $vid = $row['vid'];
                          $videotitle[]= $row['title'];
                          $videothumbnails[]='videos/'.$row['thumbnail'];
                          $vidid[]= $row['vid'];
                          $status = $row['status'];
                          if($status ==1){
                             $videosrc = '../../videos/'.$row['video'];
                             echo '<input type="hidden" id="vidcon" value="'.$videosrc.'" data-thumb="'.$videothumbnail.'">';
                          }
                          ?>
                            <li class="list-group-item"> <?php echo $row['title']; ?> 
                            <span style="float: right;font-size: 12px" > 
                              
                              <button class="btn btn-light text-secondary editvideo" data-videosrc="../../videos/<?php echo $row['video'] ?>" data-vthumbnail="<?php echo $videothumbnail  ?>"  data-vid="<?php echo $vid ?>" data-toggle="modal" data-target="#editvideo" data-backdrop="static" data-keyboard="false"><i class="fas fa-edit text-info" style="font-size: 12px"></i></button> 
                             
                              <button class="btn btn-light viewvideo" data-videosrc="../../videos/<?php echo $row['video'] ?>" data-vthumbnail="<?php echo $videothumbnail  ?>" data-vid="<?php echo $vid ?>" style="font-size: 12px">View</button>

                            </span></li>

                          <?php 
                        }

                      
                  }

                  ?>
                  <script type="text/javascript">
                    
                    $(document).ready(function() {
                      var vidcon = $('#vidcon').val();
                      var thumb = $('#vidcon').data('thumb');
                      $('#videoresources').attr("src",vidcon);
                      $('#videoresources').attr("poster",thumb);


                            $('.viewvideo').click(function() { 
                          var videosrc = $(this).data('videosrc');
                          var vthumbnail = $(this).data('vthumbnail');
                         // var id = $(this).data('vid');


                          $('#videoresources').attr("src",videosrc);
                          $('#videoresources').attr("poster",vthumbnail);
                          $('#videoresources').attr("autoplay",true);
                        
                        })
                            $('.editvideo').click(function() { 
                              var id = $(this).data('vid');
                            var videosrc = $(this).data('videosrc');
                          var vthumbnail = $(this).data('vthumbnail');
                             $('#vidd').val(id);
                              $('#viddsrc').val(videosrc);
                               $('#viddth').val(vthumbnail);
                            
                            })

                          });      
                          
                  </script>
                  <?php
  
}

if(isset($_POST['saveuptvideos'])){ 


             $vtitle = $_POST['vtitle'];
            
          
              $vid = $_POST['vid'];
                $vidsrc = $_POST['vidsrc'];
                  $vidth = $_POST['vidth'];
                  unlink($vidsrc);
                  unlink($vidth);


            
                                $image_name = $_FILES['vvname']['name'];
                                 $tmp_name   = $_FILES['vvname']['tmp_name'];
                              $size       = $_FILES['vvname']['size'];
                               $type       = $_FILES['vvname']['type'];
                               $error      = $_FILES['vvname']['error'];
                                                                                                                                                  
                         
                                                                                                                                                  
                         $fileName =basename($_FILES['vvname']['name']);
                               $rand = rand(100,1000);                                                                                                                   
                          $pname = $rand.'video'.'_'.$fileName;
                              // File upload path
                          $uploads_dir = '../../videos/';
                       move_uploaded_file($tmp_name , $uploads_dir .'/'.$pname);
                           
                                                                                                            
                       
                        $image_names = $_FILES['vthumbnail']['name'];
                                 $tmp_names   = $_FILES['vthumbnail']['tmp_name'];
                              $sizes       = $_FILES['vthumbnail']['size'];
                               $types       = $_FILES['vthumbnail']['type'];
                               $errors      = $_FILES['vthumbnail']['error'];
                                                                                                                                                  
                           
                                                                                                                                                  
                         $fileNames =basename($_FILES['vthumbnail']['name']);
                               $rands = rand(100,1000);                                                                                                                   
                          $pnames = $rands.'video'.'_'.$fileNames;
                              // File upload path
                          $uploads_dirs = '../../videos/';
                       move_uploaded_file($tmp_names , $uploads_dirs .'/'.$pnames);      
              
              
                          



                  $sql = " UPDATE `videocontent` SET `title`='$vtitle',`video`='$pname',`thumbnail`='$pnames' WHERE vid ='$vid'  ";
                              $result = mysqli_query($con,$sql); // run query


                            if($result){
                              echo 'success';
                            }


                              date_default_timezone_set('Asia/Manila'); 
            $token =  $_SESSION['admingcc_token'];
                    $date_m = date('Y-m-d H:i:s');
                     $sem = $_SESSION['sem'];
                    $save_to_logs = "INSERT INTO `logs`(`stud_id`, `admin_id`, `admin_type`, `content`, `datemodified`,`manage_fields`,`semester`) 
                    VALUES (0,'$token','GCC','Video Uploaded.(Homepage)','$date_m','Manage','$sem')";
                    mysqli_query($con,$save_to_logs); 
                              
  
}

if(isset($_POST['changetitle'])){ 
  $val = $_POST['val'];
  $tid = $_POST['tid'];

      $sql = " UPDATE `others` SET `title`='$val' WHERE oidd='$tid'  ";
                  $result = mysqli_query($con,$sql); // run query


                    date_default_timezone_set('Asia/Manila'); 
            $token =  $_SESSION['admingcc_token'];
                    $date_m = date('Y-m-d H:i:s');
                     $sem = $_SESSION['sem'];
                    $save_to_logs = "INSERT INTO `logs`(`stud_id`, `admin_id`, `admin_type`, `content`, `datemodified`,`manage_fields`,`semester`) 
                    VALUES (0,'$token','GCC','Manages Title.(Homepage)','$date_m','Manage','$sem')";
                    mysqli_query($con,$save_to_logs); 
                 
  
}

if(isset($_POST['changefeature'])){ 
  $val = $_POST['val'];
  $tid = $_POST['tid'];

      $sql = " UPDATE `others` SET `feature`='$val' WHERE oidd='$tid'  ";
                  $result = mysqli_query($con,$sql); // run query
                 
  
}

if(isset($_POST['changebtnname'])){ 
  $val = $_POST['val'];
  $tid = $_POST['tid'];

      $sql = " UPDATE `others` SET `btnname`='$val' WHERE oidd='$tid'  ";
                  $result = mysqli_query($con,$sql); // run query
          date_default_timezone_set('Asia/Manila'); 
            $token =  $_SESSION['admingcc_token'];
                    $date_m = date('Y-m-d H:i:s');
                     $sem = $_SESSION['sem'];
                    $save_to_logs = "INSERT INTO `logs`(`stud_id`, `admin_id`, `admin_type`, `content`, `datemodified`,`manage_fields`,`semester`) 
                    VALUES (0,'$token','GCC','Changed btn name.(Homepage)','$date_m','Manage','$sem')";
                    mysqli_query($con,$save_to_logs);          
  
}
if(isset($_POST['changelinks'])){ 
  $val = $_POST['val'];
  $tid = $_POST['tid'];

      $sql = " UPDATE `others` SET `btnlink`='$val' WHERE oidd='$tid'  ";
                  $result = mysqli_query($con,$sql); // run query
                  


                    date_default_timezone_set('Asia/Manila'); 
            $token =  $_SESSION['admingcc_token'];
                    $date_m = date('Y-m-d H:i:s');
                     $sem = $_SESSION['sem'];
                    $save_to_logs = "INSERT INTO `logs`(`stud_id`, `admin_id`, `admin_type`, `content`, `datemodified`,`manage_fields`,`semester`) 
                    VALUES (0,'$token','GCC','Updated the links.(Homepage)','$date_m','Manage','$sem')";
                    mysqli_query($con,$save_to_logs); 
                 
  
}
 ?>