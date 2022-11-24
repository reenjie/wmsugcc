<style type="text/css">
		
		.txtboxtransition {
								border:none;outline:none; 

								background: 
						    linear-gradient(#a8bbc5, #a8bbc5) bottom / 0% 2px no-repeat
						    #ccc;
						  transition: .5s;

						  background-color:#edf4ee;
						  padding: 6px;
						  border-radius: 5px;

							}

							.txtboxtransition:hover {
								background-color:#dff3e3;
							}
							.txtboxtransition:focus {
									
							
								
								background-color: #ffffff;
								background-size: 100% 2px;
								

							} 



</style>
 

<script type="text/javascript">
	
	$(document).ready(function() {
	      	$('.txtuptcontent').attr('readonly',true);
	      });      
      	
</script>
<?php 
	
  if($type =='checkbox') {
			             
			               		 				?>

			        <h6  style=""><?php echo $row['content']; ?>:</h6>
		
		 	 <div class="row mb-5">
		 	 
		 	<input type="checkbox" id="checkkk" class="d-none" checked="">
						<h6 class="" style="text-align: left;border-bottom: 1px solid rgb(222, 226, 230)"><?php echo $rescontent ?></h6>	

								 		<?php 
								 				$selectaddchoice = " select * from addchoice where choice_id = '$choiceid' ";
								 		                $resultchoice = mysqli_query($con,$selectaddchoice); // run query
								 		             
								 		          
								 		                 while($res = mysqli_fetch_array($resultchoice)){
								 		                 	$ccc = $res['content'];
								 		                 	//echo $ccc;
								 		    
								
								 		//for($i=0; $i<1;$i++){
							/*	 			?>
												 <div class="col-sm-4">
								 			 		<h6 style="margin-left: 40px" class="mt-2"><label><input type="checkbox"   class="chkvalue" data-tid = "<?php echo $tid ?>"  id="checkbox<?php echo $res['chid'] ?>"   name="check<?php echo $rows['form_id'] ?>" value="<?php echo $res['content'] ?>" > <?php echo $res['content'] ?></label></h6>

			<div class="ttttt"></div>
								 			 </div> 
								 			 

								 			<?php */
								 	//	} 
								
							$chcks = preg_split ("/\,/", $rescontent);
							
						if(in_array($ccc, $chcks)){

							
							?>
				<script type="text/javascript">
					
					$(document).ready(function() {
					      	$('#checkbox<?php echo $res['chid'] ?>').prop("checked",true);

					      	 $('#bgch<?php echo $res['chid'] ?>').append('<span class="text-success" style="font-size:22px;font-weight:bolder"> «</span>');	

					      	$('.uncheckall<?php echo $rows['form_id'] ?>').keyup(function(){ 
					      			$('#checkbox<?php echo $res['chid'] ?>').prop("checked",false);
					      			$('#btn<?php echo $rows['form_id'] ?>').removeClass('d-none');
					      			$('.chkvalue<?php echo $rows['form_id'] ?>').attr('disabled',true);
					      			$('.chkvalue<?php echo $rows['form_id'] ?>').prop('checked',false);

					      	
					      	})
					      });      
				      	
				</script>
				<?php
						}
			

			
			

						
			

								 		                 }

								 		          
								 		 ?>
								 		

								 	</div> 
								 		
								
		<?php
		  
			               		 	}else if ($type == 'mpchoice') {

			   	
		?>
		
		 <h6  style=""><?php echo $row['content']; ?>:</h6>
		 <div class="row">
		 <!--	<h6 class="" style="text-align: left;border-bottom: 1px solid rgb(222, 226, 230)"><?php echo $rescontent ?></h6> -->
								 		
								 		<?php 
								 				$selectaddchoice = " select * from addchoice where choice_id = '$choiceid' ";
								 		                $resultchoice = mysqli_query($con,$selectaddchoice); // run query
								 		             
								 		          
								 		                 while($res = mysqli_fetch_array($resultchoice)){
								 		                 	$contentsofmpchoice[] = $res['content'];
								 		                 
								 		             
								 		              	?>

					 <div class="col-sm-6">
								 			 		<h6 style="margin-left: 40px" class="mt-2"><label><input type="radio" onclick="return false"  class="chkvalue" data-tid = "<?php echo $tid ?>"  id="radiocheck<?php echo $res['chid'] ?>"   name="check<?php echo $rows['form_id'] ?>" value="<?php echo $res['content'] ?>" > <?php echo $res['content'] ?></label></h6>

			<div class="ttttt"></div>
								 			 </div> 

								 			
				
				<?php 
				if ($rescontent == $res['content']){

			//	echo $res['content'].$res['chid'];

			
				?>
				<script type="text/javascript">
					
					$(document).ready(function() {
					      	$('#radiocheck<?php echo $res['chid'] ?>').prop("checked",true);
					     // 	$('#radiocheck<?php echo $res['chid'] ?>').attr('style','padding:20px');

					     $('#bg<?php echo $res['chid'] ?>').append('<span class="text-success" style="font-size:22px;font-weight:bolder"> «</span>');
					      });      
				      	
				</script>
				<?php

			}


								 		                 	
								 		          
								 		

								 		}

								 	
								 		
					?>
		</div>
								 		
								 		<?php 			
	

			               		 	}else 	 if($type == 'shorttext') {
			               		 		

	?>
	
	 <div class="" style="">
	 	<h6  style=""><?php echo $row['content']; ?>:</h6>
	 
	<h6 class="" style="text-align: left;border-bottom: 1px solid rgb(222, 226, 230)"><?php echo $rescontent ?></h6>
	</div> 

	
	<?php
			
			      		 	



			               		 	}else if ($type== 'longtext') {
	?>
	 <div class="" style="">
	 	<h6  style=""><?php echo $row['content']; ?>:</h6>
	 
	<h6 class="" style="text-align: left;border-bottom: 1px solid rgb(222, 226, 230)"><?php echo $rescontent ?></h6>
	</div> 
	<?php

								  		

								


			               		 	}else   if($type == 'email') {
			 
			?>
		 <div class="">
	 <h6  style=""><?php echo $row['content']; ?>:</h6>
	<h6 class="" style="text-align: left;border-bottom: 1px solid rgb(222, 226, 230)"><?php echo $rescontent ?></h6>
	</div> 
			
		<?php
	
	


		


			               		 	}else if($type == 'numbers') {
			
		?>
		 <div class="">
	 <h6  style=""><?php echo $row['content']; ?>:</h6>
	<h6 class="" style="text-align: left;border-bottom: 1px solid rgb(222, 226, 230)"><?php echo $rescontent ?></h6>
	</div> 
			
		<?php
	
		 
							

			               		 	}else if($type == 'dates') {
			
?>
		 <div class="">
	 <h6  style=""><?php echo $row['content']; ?>:</h6>
	<h6 class="" style="text-align: left;border-bottom: 1px solid rgb(222, 226, 230)"><?php echo $rescontent ?></h6>
	</div> 
			
		<?php
			               		 	}



 ?>

 