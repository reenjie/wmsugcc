<?php 
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

$clientip =  getClientIP();

$_SESSION['aclientip_address'] = $clientip;
date_default_timezone_set('Asia/Manila');
$datenow = date('Y-m-d H:i:s');
$dateonly = date('Y-m-d');



 $clear_ip_records = "DELETE FROM `client_ip` WHERE user_id = 0 and date(date_recorded) < '$dateonly' ";
 mysqli_query($con,$clear_ip_records);

		


		$checkif_ip_alreadyexist = "SELECT * FROM `client_ip` where ipaddress = '$clientip'  ";
		 $checkingip_validity = mysqli_query($con,$checkif_ip_alreadyexist); 
		 $counting_ips= mysqli_num_rows($checkingip_validity);
		 //$newlyinsertedid = mysqli_insert_id($con);
		if($counting_ips >=1){

		
	 while($chip = mysqli_fetch_array($checkingip_validity)){
				$chipuserid = $chip['user_id'];		

				if($chipuserid == 0){

				}else {

				/*		   	$checkifexist = " select * from student where stud_id = '$chipuserid'   ";
 						                $ckstud = mysqli_query($con,$checkifexist); 
 						                $count= mysqli_num_rows($ckstud);
 						           
 				if ($count>=1){
 					 
 					 while($row = mysqli_fetch_array($ckstud)){
					         	$user = $row['stud_fname'].' '.$row['stud_lname'];  

					             	         }
					             	         		


 				}else {

 					$admin = "select * from administrator where admin_id = '$chipuserid' ";

					          		                $resultcheck = mysqli_query($con,$admin); 
					          		                $countadmin= mysqli_num_rows($resultcheck); 
					          		            
					          		        
					          		             
					          		                 while($row = mysqli_fetch_array($resultcheck)){
					          							//	
					          		                 	$college = $row['CollegeId'];
					          		                 	$adminId = $row['admin_id'];
					          							$typeofadmin = $row['admin_type'];
					          							$adminname = $row['admin_fname'];
					          							$user = $row['admin_fname'].' '.$row['admin_lname'];
					          							$adminbanner = $row['admin_banner'];
					          							$adminsidebarbg = $row['admin_sidebarbg'];
					          							$ft = $row['ft'];

					          						

					          							
					          		                 }

					          		               
					          		          


 				
 				}

 			*/



				
				}		
		 }
	
	 }else {	

	 	
	 	
	 		$add_new_ipaddress = "INSERT INTO `client_ip`(`ipaddress`,`date_recorded`) VALUES ('$clientip','$datenow')";
	 		mysqli_query($con,$add_new_ipaddress);
	 
	 }






 ?>