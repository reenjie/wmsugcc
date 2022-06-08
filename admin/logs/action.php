<?php 
session_start();
include '../../GCC/create_form/connect.php';

//Delete Logs
if(isset($_POST['delete'])){

	if(isset($_POST['logids'])){
		$logids = $_POST['logids'];
		foreach ($logids as $key => $value) {
			
			$deletelogs = "DELETE FROM `logs` WHERE logs_id = '$value' ";
			mysqli_query($con,$deletelogs);
		}
		$_SESSION['deleted'] = 1;
		?>
<script type="text/javascript">
	window.history.back();
</script>
<?php
	}else {
		$_SESSION['notset']= 1;
		?>
<script type="text/javascript">
	window.history.back();
</script>
<?php
	}
	
}

//Delete all Logs
if(isset($_POST['deleteall'])){


			$deletelogs = "DELETE FROM `logs` WHERE 1 ";
			mysqli_query($con,$deletelogs);
	
}

//Remove back up from file
if(isset($_POST['deletebackup'])){
	$deletebackup = $_POST['deletebackup'];

	unlink($deletebackup);
	
}


//Fetch file. 
if(isset($_POST['fetch'])){
	$fetch = $_POST['fetch'];

$myfile = fopen($fetch, "r") or die("Unable to open file!");
$qry =  fread($myfile,filesize($fetch));

	mysqli_query($con,$qry);

	
}

//Create Backup
if(isset($_POST['createbackup'])){

	$sy = $_POST['sy'];
	$sem = $_POST['sem'];
	$fname = $_POST['fname'];




	 	$AnotherName = "select * from logs where year(datemodified)='$sy' and semester = '$sem' ";
	 	 $justdatadd = mysqli_query($con,$AnotherName); 
	 	
	  while($row = mysqli_fetch_array($justdatadd)){
	 		 $logg = $row['logs_id'];			
	 	 }
	 
	  
   
    

    
	

		$selectlogs = "select * from logs where year(datemodified)='$sy' and semester = '$sem'  ";
		 $selectinglogs = mysqli_query($con,$selectlogs); 

		 $dump = "INSERT INTO `logs`( `stud_id`, `admin_id`, `admin_type`, `content`, `datemodified`, `manage_fields`, `courses`, `coordinator`, `semester`) VALUES ";
		 	echo $dump;
		
	 while($row = mysqli_fetch_array($selectinglogs)){
			$studid = $row['stud_id'];
			$admin_id = $row['admin_id'];
			$admintype = $row['admin_type'];
			$content = $row['content'];
			$datemodified = $row['datemodified'];
			$managefields = $row['manage_fields'];
			$courses = $row['courses'];
			$coordinator = $row['coordinator'];
			$semester = $row['semester'];
			$logs = $row['logs_id'];
			

			
			if ($logg == $logs){
				echo "('$studid','$admin_id','$admintype','$content','$datemodified','$managefields','$courses','$coordinator','$semester' );";
			}else {
				echo "('$studid','$admin_id','$admintype','$content','$datemodified','$managefields','$courses','$coordinator','$semester' ),";	
			}


		 
		 }




		 

	
	 




	
}

//Create backup
if(isset($_POST['createbackups'])){
	$data = $_POST['datapassed'];
	$sy = $_POST['sy'];
	$sem = $_POST['sem'];
	$fname = $_POST['fname'];

	


	$file = 'backup/'.$fname.'_'.time().'.sql';

	//$file = 'backup/'.$fname.'.sql';



 
	$myfile = fopen($file, "a") or die("Unable to open file!");

	
	$fileHandler = fopen($file, 'w+');

	 fwrite($fileHandler,$data);

	 fclose($fileHandler); 
	
}

 ?>