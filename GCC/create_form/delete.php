<?php 
session_start();
$csform = $_SESSION['form_id'];
include 'connect.php';

if(isset($_POST['delete'])){ 
	$id = $_POST['id'];
	

		
	
	 
	


			

	              			$sql = " SELECT * FROM `form` where form_id = '$id'  ";
	              	                $result = mysqli_query($con,$sql); 
	              	                $count= mysqli_num_rows($result); 
	              	            
	              	             	
	              	                 while($row = mysqli_fetch_array($result)){
	              						$sec_no = $row['sec_no'];
	              						//echo $sec_no;
	              	                 }
	              	          

	              	          		$sqlt = " SELECT * FROM `form` where sec_no != '$sec_no' and type ='section' and class_name = '$csform'  ";
	              	                          $resultt = mysqli_query($con,$sqlt); // run query
	              	                          $countt= mysqli_num_rows($resultt); // to count if necessary
	              	                         //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
	              	                       if ($countt>=1){
	              	                       	//while($row = mysqli_fetch_array($result)){} is where we output all the data in database
	              	                           while($row = mysqli_fetch_array($resultt)){
	              	          					$rem[] = $row['sec_no'];
	              	          					$do[] =  $row['display_order'];
	              	          					$formids[] = $row['form_id'];

	              	                           }
			/*	$sqlis = " DELETE FROM `form` WHERE form_id = '$id'  ";
	               mysqli_query($con,$sqlis); // run query
	              

	              $deletesec= " DELETE FROM `form` WHERE section = '$id'  ";
	               mysqli_query($con,$deletesec); // run query */
					

             
	              	                    }else {
	        /*  	$sqlis = " DELETE FROM `form` WHERE form_id = '$id'  ";
	               mysqli_query($con,$sqlis); // run query
	              

	              $deletesec= " DELETE FROM `form` WHERE section = '$id'  ";
	               mysqli_query($con,$deletesec); // run query */

	               
					

	              	                    }

	              	                    $sqlis = " DELETE FROM `form` WHERE form_id = '$id'  ";
	               mysqli_query($con,$sqlis); // run query
	              

	              $deletesec= " DELETE FROM `form` WHERE section = '$id'  ";
	               // run query

	               if( mysqli_query($con,$deletesec)) {


	              	                    for ($i=0;$i <= count($rem); $i++){

	              	                	$ss = $i+1;
	              	                	//echo $rem[$i];
	              	                	//echo $ss;
	              	                    	//echo $formids[$i];
	              	                	//echo $ss;
	              	              $upt = "UPDATE `form` SET  `sec_no`='$ss' WHERE form_id= '$formids[$i]'  ";
	              	                    $rsss = mysqli_query($con,$upt); 
  
	              	                    }


	              	                      if($rsss){
	              	                    	  $select = " SELECT * FROM `form` where  type ='section' and class_name = '$csform' ";
	              	                          $resultse = mysqli_query($con,$select); // run query
	              	                         
	              	                       
	              	                    
	              	                           while($row = mysqli_fetch_array($resultse)){
	              	          					$sn= $row['sec_no'];
	              	          					
	              	          					$formids= $row['form_id'];

	              	          				$upt = "UPDATE `form` SET  `sec_no`='$sn' WHERE section= '$formids'  ";
	              	                    	mysqli_query($con,$upt); 
	              	          						

	              	                           }


	              	                         
	              	                    }

	               }


	              	                  

	              	                 
			  
		


}	
if(isset($_POST['check'])){ 
	$id = $_POST['id'];
			$sql = " SELECT * FROM `form` WHERE section = '$id' ";
	                $result = mysqli_query($con,$sql); // run query
	                $count= mysqli_num_rows($result); // to count if necessary
	               //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
	             if ($count>=1){
	             	echo 'yes';
	          }else {
	          	echo 'no';
	          }
	
}

if(isset($_POST['sess'])){ 
	$id = $_POST['id'];

	$_SESSION['Reordersectionid'] = $id;

	$sql = "SELECT * FROM `form` where class_name = '$csform' and section = '$id' order by display_order ";
                    $result = mysqli_query($con,$sql); // run query
                    $count= mysqli_num_rows($result); // to count if necessary
                   //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
                if($count >=1){


                     while($row = mysqli_fetch_array($result)){
                      $formid = $row['form_id'];
              $dd = $row['type'];
              $status = $row['status'];
              $dis = $row['display_order'];
              $disp[] = $row['display_order'];
              $bgsrc = '../img/uploads/'.$row['bgimage'];
              $bgtcolor = $row['bgcolor'];
              $txttcolor = $row['txtcolor'];
              $yaxis = $row['yaxis'];
              $isvisible = $row['isvisible'];

             



            }

            $_SESSION['dordercountorder'] = $disp;



        }


        $selectsec = " select * from form where form_id = '$id'  ";
                                  $resultsec = mysqli_query($con,$selectsec); // run query
                                  $countsec= mysqli_num_rows($resultsec); // to count if necessary
                                 //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
                               if ($countsec>=1){
                                 //while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                                   while($rowsec = mysqli_fetch_array($resultsec)){
                                   	$othersdata = $rowsec['others'];
                                      $setcolor = " select * from `form_classification` where csform_id = '$csform'  ";
                                $setcolored = mysqli_query($con,$setcolor); // run query
                              
                                 while($getcolor = mysqli_fetch_array($setcolored)){
                          $bodybg = $getcolor['bodybg'];
                          $titlebg = $getcolor['titlebg'];
                          $questionbg = $getcolor['questionbg'];
                                 }

                                  $_SESSION['sectioncard'] = '

                                   <p></p>
                                   	
                                   
                                         
                                         <h4 style="font-weight: bolder;">'.$rowsec['content'].'</h4>
                                         <h6>
           			                             '.$rowsec['others'].'

	 	 								</h6>

	 	 								<hr>
                                     
                                    
                                    




                                    
                                   <p></p>


                                  '; 
                                
                                   }
                            } 

	
}
 ?><script type="text/javascript">
        	$(document).ready(function() {
        	        	$('#sectionparent').attr('style','')    							
        	        });            						
                    						
                    					      
                    				      	
=</script>