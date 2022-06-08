<?php 
session_start();


	if(isset($_POST['connect'])){
		ini_set('display_errors', 0);
		ini_set('display_startup_errors', 0);

		$host = $_POST['host'];
		$user = $_POST['user'];
		$pass = $_POST['pass'];
		$db = $_POST['db'];
		$data = $host.','.$user.','.$pass.','.$db;

		
		$file = "configuration.json";
		if(file_put_contents($file, $data)){

			
			if($db == ''){
				$_SESSION['errorconnection']=1;
    			?>
    			<script type="text/javascript">
    				window.history.back();
    			</script>
    			<?php
			}else {
			

		 if ($con =mysqli_connect($host, $user, $pass))
    		{
    			

    			 if ($con =mysqli_connect($host, $user, $pass,$db)){
    				//header('location:../');

    						$checkifexist = "SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_TYPE = 'BASE TABLE' AND TABLE_SCHEMA='$db';  ";
							 $database_exist = mysqli_query($con,$checkifexist); 
							 $count= mysqli_num_rows($database_exist);
							
						if($count >=1){



								
						 while($row = mysqli_fetch_array($database_exist)){
									$tables = $row['TABLE_NAME'];

									if($tables != 'form_classification' || $tables != 'form_response' || $tables != 'form' || $tables != 'tablechoices' || $tables != 'tablecolumn_content' || $tables != 'shifting_history' || $tables != 'referral_history'){
										$notset = 1;
									}

								
							 }

							 if($count != 37){
							 
							 if(isset($notset)){
							 	

							 		$wrongdb = 1;
    								include 'makedb.php';
    									unset($_SESSION['superadminId']);
							 }
						 }else {
						 	header('location:../');
						 }

						
						
				 }else {
						 

    				$existinstall = 1;
    				include 'makedb.php';
    					unset($_SESSION['superadminId']);
				 }



    			}else {

    				$dontexist = 1;
    				include 'makedb.php';
    					unset($_SESSION['superadminId']);
    				
    			} 

    		
       
    		}

    		else {

    		
    		
    			$_SESSION['errorconnection']=1;
    			?>
    			<script type="text/javascript">
    				window.history.back();
    			</script>
    			<?php
    			unset($_SESSION['superadminId']);

    			
    		} 

    	}

		}
		
	}


	if(isset($_POST['savechanges'])){

		$filecontent = $_POST['filecontent'];
		$file = $_POST['file'];
	
		unset($_SESSION['superadminId']);
			if(file_put_contents($file,$filecontent)){
				$_SESSION['success_saved'] = $file;
				?>
				<script type="text/javascript">
					window.location.href='../';
				</script>
				<?php
			}else {
				echo 'There was a problem saving..';
			}
		
	}
	



	
 ?>