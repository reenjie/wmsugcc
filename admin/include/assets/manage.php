<?php 
 include '../../Classes/sql_query.php';
 	include '../../create_form/connect.php';
 $fetch = new sqlquery();

	if(isset($_POST['content'])){ 
	

   
   $fetch ->announcements();
                                   		
	}
	if(isset($_POST['contentfornewsfeed'])){ 
	

   
   $fetch ->newsfeed();
                                   		
	}

	if(isset($_POST['deleteaid'])){ 
		$aid = $_POST['aid'];
				$sql = " DELETE FROM `announcement` WHERE a_id='$aid'  ";
		                $result = mysqli_query($con,$sql); // run query
		              
		
	}
	if(isset($_POST['addnew'])){ 
		$cont = $_POST['cont'];
		 date_default_timezone_set('Asia/Manila');
		 $datenow = date('Y-m-d H:i:s');
				$sql = " INSERT INTO `announcement`(`content`, `datecreated`) VALUES ('$cont','$datenow') ";
		                $result = mysqli_query($con,$sql); // run query
		              
		              echo $cont;
		
	}
	if(isset($_POST['updateann'])){ 
		$cont = $_POST['cont'];
		$id = $_POST['id'];
		$sql = " UPDATE `announcement` SET `content`='$cont' WHERE a_id='$id'  ";
		                $result = mysqli_query($con,$sql); // run query
	}
	if(isset($_POST['trigger'])){ 
		$trigger = $_POST['trigger'];
		$nfcontent = $_POST['nfcontent'];
		$linkat = $_POST['linkat'];
		$txttitle = $_POST['txttitle'];
		 date_default_timezone_set('Asia/Manila');
  		$datenow = date('Y-m-d H:i:s');
		
			if($trigger =='noimage'){
  					$sql = " INSERT INTO `newsfeed`(`title`,`content`, `link`,`datecreated`) VALUES ('$txttitle','$nfcontent','$linkat','$datenow')  ";
 				                $result = mysqli_query($con,$sql); // run query
  				}else {
  					foreach($_FILES['images']['name'] as $key=>$val){
                  $image_name = $_FILES['images']['name'][$key];
                   $tmp_name   = $_FILES['images']['tmp_name'][$key];
                $size       = $_FILES['images']['size'][$key];
                 $type       = $_FILES['images']['type'][$key];
                 $error      = $_FILES['images']['error'][$key];
                                                                                                                                    
             
                                                                                                                                    
           $fileName =basename($_FILES['images']['name'][$key]);
                 $rand = rand(100,1000);                                                                                                                   
            $pname = $rand.'Photo'.'_'.$fileName;
                // File upload path
            $uploads_dir = '../../img/uploads';
         move_uploaded_file($tmp_name , $uploads_dir .'/'.$pname);
                
         
   

 					$sql = " INSERT INTO `newsfeed`(`title`,`content`, `link`, `picture`, `datecreated`) VALUES ('$txttitle','$nfcontent','$linkat','$pname','$datenow')  ";
 				                $result = mysqli_query($con,$sql); // run query
 						
					
                                                                                                                            
         
            }
  						
 				              
  				}


          

	}
	if(isset($_POST['upttrigger'])){ 
		$trigger = $_POST['upttrigger'];
		$nfcontent = $_POST['uptnfcontent'];
		$linkat = $_POST['uptlinkat'];
		$txttitle = $_POST['upttxttitle'];
		$nid = $_POST['nid'];
		
		 date_default_timezone_set('Asia/Manila');
  		$datenow = date('Y-m-d H:i:s');
  			
  					$unlinking = " select * from newsfeed where n_id = '$nid'   ";
  			                $resultunlinking = mysqli_query($con,$unlinking); // run query
  			                
  			                 while($row = mysqli_fetch_array($resultunlinking)){
  							$img = $row['picture'];
  			                 }

  			                $dir = '../../img/uploads/'.$img;
  			                unlink($dir); 
  			          
  		
		
			if($trigger =='noimage'){
  					$sql = " UPDATE `newsfeed` SET `title`='$txttitle',`content`='$nfcontent',`link`='$linkat' WHERE n_id = '$nid' ";
 				                $result = mysqli_query($con,$sql); // run query
  				}else {
  					foreach($_FILES['uptimages']['name'] as $key=>$val){
                  $image_name = $_FILES['uptimages']['name'][$key];
                   $tmp_name   = $_FILES['uptimages']['tmp_name'][$key];
                $size       = $_FILES['uptimages']['size'][$key];
                 $type       = $_FILES['uptimages']['type'][$key];
                 $error      = $_FILES['uptimages']['error'][$key];
                                                                                                                                    
             
                                                                                                                                    
           $fileName =basename($_FILES['uptimages']['name'][$key]);
                 $rand = rand(100,1000);                                                                                                                   
            $pname = $rand.'Photo'.'_'.$fileName;
                // File upload path
            $uploads_dir = '../../img/uploads';
         move_uploaded_file($tmp_name , $uploads_dir .'/'.$pname);
                
         
   

 					$sql = " UPDATE `newsfeed` SET `title`='$txttitle',`content`='$nfcontent',`link`='$linkat',`picture`='$pname' WHERE n_id = '$nid'  ";
 				                $result = mysqli_query($con,$sql); // run query
 						
					
                                                                                                                            
         
            }
  						
 				              
  				}


	}
	if(isset($_POST['deletenf'])){ 
		$nid = $_POST['nid'];
		$unlinking = " select * from newsfeed where n_id = '$nid'   ";
  			                $resultunlinking = mysqli_query($con,$unlinking); // run query
  			                
  			                 while($row = mysqli_fetch_array($resultunlinking)){
  							$img = $row['picture'];
  			                 }

  			                $dir = '../../img/uploads/'.$img;
  			                unlink($dir); 

					$sql = " DELETE FROM `newsfeed` WHERE n_id='$nid'  ";
			                $result = mysqli_query($con,$sql); // run query
			               
	}
 ?>
