<?php 

date_default_timezone_set('Asia/Manila');
$datenow = date('Y-m-d');
if($csform == '62'){
	$checkfirstexistence = " select * from `updte_pages` where formid= '$formid'  ";
						                $checking_r = mysqli_query($con,$checkfirstexistence); 
						                $countexx= mysqli_num_rows($checking_r);
						               //  $get_id =  mysqli_insert_id($con); 
						             if ($countexx>=1){
						            
						          }else {
					$savetoupt = "INSERT INTO `updte_pages`(`upt_id`, `formid`, `datecreated`) VALUES ('1','$formid','$datenow')";
					mysqli_query($con,$savetoupt);

						          }

}
	


 ?>