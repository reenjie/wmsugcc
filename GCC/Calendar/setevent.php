<?php 
session_start();
include '../create_form/connect.php';
	
	if(isset($_POST['savedrop'])){ 
		
		$eventname = $_POST['eventname'];
		$eventstart = $_POST['eventstart'];
		$eventend = $_POST['eventend'];
		$eventurl = $_POST['eventurl'];
		$bgcolor = $_POST['bgcolor'];
		$brdercolor = $_POST['brdercolor'];
		$txtcolor = $_POST['txtcolor'];
		$eventid = $_POST['eventid'];
		$stat = $_POST['stat'];

		if($stat == 'removed'){

			
						$remove = " SELECT * FROM `events` where title = '$eventname' and status = 1  ";
				                $result = mysqli_query($con,$remove); // run query

				                      while($row = mysqli_fetch_array($result)){
				                		$eid = $row['e_id'];
				                		echo $eid;
				                		$del = "DELETE FROM `events` WHERE e_id = $eid";
				                		$resultd = mysqli_query($con,$del); // run query
				                       }

				                if ($resultd){
				          $sql = " INSERT INTO `events`(`title`, `start`, `end`,  `bgcolor`, `brdercolor`, `txtcolor`,`allday`) VALUES ('$eventname','$eventstart','$eventend','$bgcolor','$brdercolor','$txtcolor','true') ";
			         		 $result = mysqli_query($con,$sql); 
				                }

				                          
				              

		}else {
		$sql = " INSERT INTO `events`(`title`, `start`, `end`,  `bgcolor`, `brdercolor`, `txtcolor`,`allday`) VALUES ('$eventname','$eventstart','$eventend','$bgcolor','$brdercolor','$txtcolor','true') ";
			         $result = mysqli_query($con,$sql); 	
		}

		
		
		 date_default_timezone_set('Asia/Manila'); 
            $token =  $_SESSION['admingcc_token'];
                    $date_m = date('Y-m-d H:i:s');
                     $sem = $_SESSION['sem'];
                    $save_to_logs = "INSERT INTO `logs`(`stud_id`, `admin_id`, `admin_type`, `content`, `datemodified`,`manage_fields`,`semester`) 
                    VALUES (0,'$token','GCC','Save new Event. Event : $eventname.(Calendar)','$date_m','Manage','$sem')";
                    mysqli_query($con,$save_to_logs); 			
			               
                
	}

		if(isset($_POST['moveevent'])){ 
		
		$eventname = $_POST['eventname'];
		$eventstart = $_POST['eventstart'];
		$eventend = $_POST['eventend'];
		$eventurl = $_POST['eventurl'];
		$bgcolor = $_POST['bgcolor'];
		$brdercolor = $_POST['brdercolor'];
		$txtcolor = $_POST['txtcolor'];
		$eventid = $_POST['eventid'];


	
			$sql = " UPDATE `events` SET `start`='$eventstart'  WHERE title= '$eventname' and start ='$eventstart' and bgcolor='$bgcolor' or e_id = '$eventid' ";
			     $result = mysqli_query($con,$sql); 



		 date_default_timezone_set('Asia/Manila'); 
            $token =  $_SESSION['admingcc_token'];
                    $date_m = date('Y-m-d H:i:s');
                     $sem = $_SESSION['sem'];
                    $save_to_logs = "INSERT INTO `logs`(`stud_id`, `admin_id`, `admin_type`, `content`, `datemodified`,`manage_fields`,`semester`) 
                    VALUES (0,'$token','GCC','Event moved Moveto: $eventstart. Event : $eventname.(Calendar)','$date_m','Manage','$sem')";
                    mysqli_query($con,$save_to_logs); 	
	}
	if(isset($_POST['editevent'])){ 
		$eventtitle = $_POST['eventtitle'];
		$eid = $_POST['eid'];

				$sql = " UPDATE `events` SET `title`='$eventtitle'  WHERE e_id = '$eid' ";
			     $result = mysqli_query($con,$sql); 



		 date_default_timezone_set('Asia/Manila'); 
            $token =  $_SESSION['admingcc_token'];
                    $date_m = date('Y-m-d H:i:s');
                     $sem = $_SESSION['sem'];
                    $save_to_logs = "INSERT INTO `logs`(`stud_id`, `admin_id`, `admin_type`, `content`, `datemodified`,`manage_fields`,`semester`) 
                    VALUES (0,'$token','GCC','Eventname changed, Event:$eventtitle.(Calendar)','$date_m','Manage','$sem')";
                    mysqli_query($con,$save_to_logs); 	
		
	}

	if(isset($_POST['saveevent'])){ 
		$eventname = $_POST['eventname'];
		$eventstart = $_POST['eventstart'];
		$eventend = $_POST['eventend'];
		
		$bgcolor = $_POST['bgcolor'];
		$brdercolor = $_POST['brdercolor'];
		
		
		$sql = " INSERT INTO `events`(`title`, `start`, `end`,  `bgcolor`, `brdercolor`, `txtcolor`,`allday`) VALUES ('$eventname','$eventstart','$eventend','$bgcolor','$brdercolor','rgb(255, 255, 255)','true') ";
			          $result = mysqli_query($con,$sql); 


			           date_default_timezone_set('Asia/Manila'); 
            $token =  $_SESSION['admingcc_token'];
                    $date_m = date('Y-m-d H:i:s');
                     $sem = $_SESSION['sem'];
                    $save_to_logs = "INSERT INTO `logs`(`stud_id`, `admin_id`, `admin_type`, `content`, `datemodified`,`manage_fields`,`semester`) 
                    VALUES (0,'$token','GCC','Save new Event. Event : $eventname.(Calendar)','$date_m','Manage','$sem')";
                    mysqli_query($con,$save_to_logs); 
		
	}

	if(isset($_POST['deleteevent'])){ 
		$eventid = $_POST['eventid'];
		
		$eventstart = $_POST['eventstart'];
		$eventtitle = $_POST['eventtitle'];
		$bgcolor = $_POST['bgcolor'];

					$sql = " DELETE FROM `events` WHERE title= '$eventtitle' and start ='$eventstart' and bgcolor='$bgcolor' or e_id = '$eventid'  ";
			                $result = mysqli_query($con,$sql); // run query

			                 date_default_timezone_set('Asia/Manila'); 
            $token =  $_SESSION['admingcc_token'];
                    $date_m = date('Y-m-d H:i:s');
                     $sem = $_SESSION['sem'];
                    $save_to_logs = "INSERT INTO `logs`(`stud_id`, `admin_id`, `admin_type`, `content`, `datemodified`,`manage_fields`,`semester`) 
                    VALUES (0,'$token','GCC','Event Deleted. Event : $eventtitle.(Calendar)','$date_m','Manage','$sem')";
                    mysqli_query($con,$save_to_logs); 
			                
		
	}
	if(isset($_POST['savedrag'])){ 
		
		$eventtitle = $_POST['eventtitle'];
		$bgcolor = $_POST['bgcolor'];
			$sql = " INSERT INTO `events`(`title`, `bgcolor`, `brdercolor`,`allday`,`status`,`txtcolor`) VALUES ('$eventtitle','$bgcolor','$bgcolor','true',1,'rgb(255, 255, 255)') ";
			          $result = mysqli_query($con,$sql); 


			           date_default_timezone_set('Asia/Manila'); 
            $token =  $_SESSION['admingcc_token'];
                    $date_m = date('Y-m-d H:i:s');
                     $sem = $_SESSION['sem'];
                    $save_to_logs = "INSERT INTO `logs`(`stud_id`, `admin_id`, `admin_type`, `content`, `datemodified`,`manage_fields`,`semester`) 
                    VALUES (0,'$token','GCC','Save new Event. Event : $eventtitle.(Calendar)','$date_m','Manage','$sem')";
                    mysqli_query($con,$save_to_logs); 
		
	}
?>