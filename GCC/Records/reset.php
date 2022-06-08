<?php 
session_start();
include '../create_form/connect.php';
	
	if(isset($_POST['reset'])){

		$reset_sem = "UPDATE `sem_year` SET `month_start`='Select',`month_end`='Select',`m_start`=0,`m_end`=0 WHERE 1";
		mysqli_query($con,$reset_sem);
		
	}

	if(isset($_POST['setsched'])){
		$id = $_POST['setsched'];
		$ini = $_POST['ini'];
		$mid = $_POST['mid'];

					$gettingmonths = "select * from months where mid = '$mid'  ";
					 $get_months = mysqli_query($con,$gettingmonths); 
					
				 while($row = mysqli_fetch_array($get_months)){
								$month = $row['month'];			
					 }

				
				 

		if($ini == 'start'){

			$update = "UPDATE `sem_year` SET `month_start`='$month',`m_start`='$mid'  WHERE sy_id = '$id' ";
			mysqli_query($con,$update);

		}else if ($ini == 'end'){
			
			$update = "UPDATE `sem_year` SET `month_end`='$month',`m_end`='$mid'  WHERE sy_id = '$id' ";
			mysqli_query($con,$update);

		}




		
	}

 ?>