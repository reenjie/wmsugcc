<?php 

  			$file = fopen("configuration.json","r");

                            while (!feof($file)) {
                              $content = fgets($file);
                              $carray = explode(",",$content);
                              list($root,$username,$password,$database) = $carray;
                              
                             
                            
                            }
                        

	
    	$con =mysqli_connect($root, $username, $password);

    	$sql = "CREATE DATABASE $database";
					if (mysqli_query($con, $sql)) {

						
						
						header('location:Add_Entities.php');



    					



					}else {
						echo 'Error in creating database.';
						
					} 
    		

 ?>