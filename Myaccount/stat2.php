		 <button class="btn btn-success "   style="font-size: 12px;float: right;width: 100px;margin-top: -20px"  data-toggle="modal" data-target="#promptcourse" data-backdrop="static" data-keyboard="false">
										  	 	Fill up
										  	 </button>

										  	   	 <!-- Modal -->
										  	 <div class="modal fade" id="promptcourse" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
										  	   <div class="modal-dialog modal-lg" role="document">
										  	     <div class="modal-content">
										  	   
										  	       <div class="modal-body">
										  	       	<h6>Select a course you wish to shift</h6>

										  	       	<hr>
<div class="list-group" >
 
  	<?php 
  					$sqlcc = " SELECT * FROM `course`  ";
	                $resultcc = mysqli_query($con,$sqlcc); // run query
	                $countcc= mysqli_num_rows($resultcc); // to count if necessary
	               //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
	             if ($countcc>=1){
	             	//while($row = mysqli_fetch_array($result)){} is where we output all the data in database
	                 while($row = mysqli_fetch_array($resultcc)){
	                 	$kurso = $row['course'];
	                 	$colsid = $row['CollegeId'];
	                 	if($kurso == $_SESSION['student_course']){
	                 	
	                 	}else {
	                 		?>
 <a href="javascript:void(0)" class="list-group-item list-group-item-action" style="text-align: left;">
   <?php echo $row['course'] ?><span style="float: right;"><button style="border: none" class="text-primary selectcourse choice" data-value="<?php echo $row['course'] ?>" data-coll="<?php echo $row['CollegeId'] ?>" >Select</button></span>
  </a>
	
			<?php
		//	echo $colsid;

	                 	}

			
	
	                 }
	          }

  	 ?>

</div>

										  	       	<hr>
										  	        	
										  	        	
										  	         <button type="button" class="btn btn-primary fillup " disabled="" style="font-size:12px;float: right;" data-csformid = "60"  data-formtype="shift">Proceed</button>

										  	          <button type="button" class="btn btn-secondary mr-2 cancelshift" style="font-size:12px;float: right;" data-dismiss="modal">Cancel</button>
										  	 
										  	 
										  	        
										  	       </div>
										  	     
										  	     </div>
										  	   </div>
										  	 </div>

										  	  	 <script type="text/javascript">
										  	 	
										  	 	$(document).ready(function() {
										  	 	      	$('.selectcourse').click(function() { 
										  	 	      		var value = $(this).data('value');
										  	 	      		$(this).removeClass('choice');
										  	 	      		$(this).removeClass('text-primary');
										  	 	      		$(this).addClass('text-danger');
										  	 	      		$(this).html('Selected');
										  	 	      		var colid = $(this).data('coll');

										  	 	      		$('.choice').addClass('d-none');
										  	 	      		$('.fillup').removeAttr('disabled');

										  	 	      		
										  	 	      		
										  	 	      		   $.ajax({
										  	 	      		           url : "action.php",
										  	 	      		            method: "POST",
										  	 	      		             data  : {setsessionshiftcourse:1,coursechoice:value,collid:colid},
										  	 	      		             success : function(data){
										  	 	      		
										  	 	      		             }
										  	 	      		          })
										  	 	      		      
										  	 	      		    
										  	 	      		
										  	 	      	
										  	 	      	})

										  	 	      	 	$('.selectcoursee').click(function() { 
										  	 	      		var value = $(this).data('value');
										  	 	      		$(this).removeClass('choice');
										  	 	      		$(this).removeClass('text-primary');
										  	 	      		$(this).addClass('text-danger');
										  	 	      		$(this).html('Selected');
										  	 	      		var colid = $(this).data('coll');
										  	 	      		$('.choice').addClass('d-none');
										  	 	      		$('.fillup').removeAttr('disabled');

										  	 	      		
										  	 	      		
										  	 	      		   $.ajax({
										  	 	      		           url : "action.php",
										  	 	      		            method: "POST",
										  	 	      		             data  : {setsessionpdscourse:1,coursechoice:value,collid:colid},
										  	 	      		             success : function(data){
										  	 	      		
										  	 	      		             }
										  	 	      		          })
										  	 	      		      
										  	 	      		    
										  	 	      		
										  	 	      	
										  	 	      	})

										  	 	      

										  	 	      	$('#promptcourse').on('hidden.bs.modal', function (e) {
													  	$('.selectcourse').addClass('choice');
										  	 	      		$('.selectcourse').addClass('text-primary');
										  	 	      		$('.selectcourse').removeClass('text-danger');
										  	 	      		$('.selectcourse').html('Select');

										  	 	      		$('.choice').removeClass('d-none');
										  	 	      		$('.fillup').attr('disabled',true);
													})

										  	 	      		$('#promptcourseforpds').on('hidden.bs.modal', function (e) {
													  	$('.selectcoursee').addClass('choice');
										  	 	      		$('.selectcoursee').addClass('text-primary');
										  	 	      		$('.selectcoursee').removeClass('text-danger');
										  	 	      		$('.selectcoursee').html('Select');

										  	 	      		$('.choice').removeClass('d-none');
										  	 	      		$('.fillup').attr('disabled',true);
													})
												  });      
										  	       	
										  	 </script>