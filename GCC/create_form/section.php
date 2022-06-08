<?php 

	//echo $_SESSION['sectionset'];
										$setcolor = " select * from `form_classification` where csform_id = '$csform'  ";
								                $setcolored = mysqli_query($con,$setcolor); // run query
								              
								                 while($getcolor = mysqli_fetch_array($setcolored)){
													$bodybg = $getcolor['bodybg'];
													$titlebg = $getcolor['titlebg'];
													$questionbg = $getcolor['questionbg'];
								                 }
								          
								
 ?>

<style type="text/css">
	
	
								
								input {
									padding: 8px;font-size: 20px;width: 100%;outline: none;border: none;
								border:none;outline:none;


								background: 
						    linear-gradient(#a8bbc5, #a8bbc5) bottom / 0% 1px no-repeat
						    #ccc;
						  transition: .5s;

						 background-color: #f0f0f5;

							}

							input:hover {
								background-color:#f0f3f4;
							}
							input:focus {
									
							
								
								background-color: #ffffff;
								background-size: 100% 2px;
								

							} 

							
</style>
 	<ul class="nav nav-tabs" id="cardsss<?php echo $row['form_id'] ?>">
  <li class="nav-item">
    <a class="nav-link active text-primary" id="sectionselect<?php echo $row['form_id'] ?>" style="font-size: 14px;font-weight: bold; cursor: default ;" href="#">Section <?php echo $secno ?></a>
  </li>
 
</ul>
	 <div class="card shadow" id="section<?php echo $row['form_id'] ?>" style="border-top: 5px solid <?php echo $questionbg ?>; padding: 30px">
	 	 <div class="card-body">
	 	 	<?php 
	 	 	// echo $_SESSION['sectionset'];

	 	 	 
	 	 	 ?>
	 	 	 
	 	 	 <input type="text" name="" value="<?php echo $row['content']; ?>" onClick="this.select();"  class="questval" data-formidd="<?php echo $row['form_id'] ?>" style="font-weight: bolder" > <br>
	 	 	
	 	 	 

	 	 	 <textarea  class="mt-2 questvals" name="" onClick="this.select();"   data-formidd="<?php echo $row['form_id'] ?>" rows="3" style="width: 100%;outline: none;border: none"><?php echo $row['others']; ?></textarea>


	 	 	 <button class="text-primary btn btn-light  d-none" id="reorderitems" data-formidd="<?php echo $row['form_id'] ?>"  style="font-size: 12px;border:none;outline: none; margin-top: 20px; font-size: 13px">Reorder Items</button>
	 	 	
	 	 	 <button class="btndelsec mt-5 " style="border:none;outline: none; float: right; margin-top: 20px;font-size: 13px" data-fid="<?php echo $row['form_id'] ?>"><i style="color:grey" class="far fa-trash-alt"></i></button>
	 	 </div> 


	 	 
	 </div> 
	 <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	 <script type="text/javascript">
	 	
	 	$(document).ready(function() {
	 	      	$('#sectionselect<?php  echo $row['form_id'] ?>').removeClass('text-primary');
	 	      	 	$('#sectionselect<?php  echo $row['form_id'] ?>').addClass('text-light');
	 	      	 	 	$('#sectionselect<?php  echo $row['form_id'] ?>').addClass('bg-primary');
	 	      	 	 	
	 	      	 	 	$('.autoscroll').removeClass('active');
	 	      	 	 	$('#scrollspy<?php echo $row['form_id'] ?>').addClass('active');

	 	      	 	 	//

	 	      	 	 	 $.ajax({
					           url : "delete.php",
					            method: "POST",
					             data  : {check:1,id:<?php  echo $row['form_id'] ?>},
					             success : function(data){
									if (data.match("yes")){$('#reorderitems').removeClass('d-none');}
								}

								});



	 	      	 	 	 $('#reorderitems').click(function() { 
	 	      	 	 	 	var id = $(this).data('formidd');
	 	      	 	 	 		 
	 	      	 	 	 		
	 	      	 	 	 		   $.ajax({
	 	      	 	 	 		           url : "delete.php",
	 	      	 	 	 		            method: "POST",
	 	      	 	 	 		             data  : {sess:1,id:id},
	 	      	 	 	 		             success : function(data){
	 	      	 	 	 						window.location.href="rearrange.php";
	 	      	 	 	 		             }
	 	      	 	 	 		          })
	 	      	 	 	 		  
	 	      	 	 	 		    

	 	      	 	 	 })

	 	      	 	 
	 	   $('.btndelsec').click(function() { 
			

				var id = $(this).data('fid');
					
					 

					   $.ajax({
					           url : "delete.php",
					            method: "POST",
					             data  : {check:1,id:id},
					             success : function(data){


									
									if (data.match("yes")){




												Swal.fire({
				  title: 'Are you sure?',
				  text: "All created elements that belongs in this section will be deleted.",
				  icon: 'warning',
				  showCancelButton: true,
				  confirmButtonColor: '#3085d6',
				  cancelButtonColor: '#d33',
				  confirmButtonText: 'Yes, delete it!'
				}).then((result) => {
				  if (result.isConfirmed) {
				   		
				   		$.ajax({
			           url : "delete.php",
			            method: "POST",
			             data  : {delete:1,id:id},
			               beforeSend: function(  ) {
 						 $('.innerBar').animate({ width: "80%" }, 500);
 								 },
			             success : function(data){
								contents();
								//alert(data);
								 $('.innerBar').animate({ width: "100%" }, 500);
			             }
			          })





				  }
				})

									}else {
									$.ajax({
			           url : "delete.php",
			            method: "POST",
			             data  : {delete:1,id:id},
			               beforeSend: function(  ) {
 						 $('.innerBar').animate({ width: "80%" }, 500);
 								 },
			             success : function(data){
								contents();
							//	alert(data);
							
								 $('.innerBar').animate({ width: "100%" }, 500);
			             }
			          })
										
									}
					             }
					          })
					    
					    

								
				
				
		})


	 	   	$('.questval').keyup(function(){ 

	
			var questval = $(this).val();
			var id = $(this).data('formidd');
			
	 	   	
		
					 $.ajax({
			           url : "action.php",
			            method: "POST",
			             data  : {savequestval:1,qval:questval,id:id},
			             
			             success : function(data){
								
							
			             }
			          })
				
					
			



	})

	 	   		   	$('.questvals').keyup(function(){ 

	
			var questval = $(this).val();
			var id = $(this).data('formidd');
			
	 	   	
		
					 $.ajax({
			           url : "action.php",
			            method: "POST",
			             data  : {savequestvalothers:1,qval:questval,id:id},
			             
			             success : function(data){
								
							
			             }
			          })
				
					
			



	})

	

	

	 	   		



   
	 	      });      
	       	
	 </script>

	 