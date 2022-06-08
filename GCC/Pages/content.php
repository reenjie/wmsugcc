<?php 
session_start();
include '../create_form/connect.php';
	
	if(isset($_POST['rationale'])){ 

		?>


                         <div class="card">
                            <div class="card-body">
                                
                               <div class="container">
                                  
                                  <div class="row">
  <div class="col-3">
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <a class="nav-link active" id="v-pills-rationale-tab" data-toggle="pill" href="#v-pills-rationale" role="tab" aria-controls="v-pills-rationale" aria-selected="true">Rationale</a>
      <a class="nav-link" id="v-pills-Vision-tab" data-toggle="pill" href="#v-pills-Vision" role="tab" aria-controls="v-pills-Vision" aria-selected="false">Vision</a>
      <a class="nav-link" id="v-pills-Mission-tab" data-toggle="pill" href="#v-pills-Mission" role="tab" aria-controls="v-pills-Mission" aria-selected="false">Mission</a>
      <a class="nav-link" id="v-pills-objectives-tab" data-toggle="pill" href="#v-pills-objectives" role="tab" aria-controls="v-pills-objectives" aria-selected="false">Objectives</a>
    </div>
  </div>
  <div class="col-9">
    <div class="tab-content" id="v-pills-tabContent">
      <div class="tab-pane fade show active" id="v-pills-rationale" role="tabpanel" aria-labelledby="v-pills-rationale-tab">


         
     <?php 

          $sql = " SELECT * FROM `pages` where title ='Rationale'  ";
                      $result = mysqli_query($con,$sql); 
                   
                       while($row = mysqli_fetch_array($result)){
                      
                        ?>
                         <textarea style="width: 100%; border:none;outline: none;font-size: 14px" class="text-secondary changecontent" data-id="<?php echo $row['pageid'] ?>" rows="10"><?php  echo $row['content']; ?></textarea>
                        <?php
                       }
                

    ?>

      </div>


      <div class="tab-pane fade" id="v-pills-Vision" role="tabpanel" aria-labelledby="v-pills-Vision-tab">
      	
      	   <?php 
   
          $sql = " SELECT * FROM `pages` where title ='Vision'  ";
                      $result = mysqli_query($con,$sql); 
                   
                       while($row = mysqli_fetch_array($result)){
                      
                        ?>
                         <textarea style="width: 100%; border:none;outline: none;font-size: 14px" class="text-secondary changecontent" data-id="<?php echo $row['pageid'] ?>" rows="10"><?php  echo $row['content']; ?></textarea>
                        <?php
                       }
                

    ?>

      </div>
      <div class="tab-pane fade" id="v-pills-Mission" role="tabpanel" aria-labelledby="v-pills-Mission-tab">
      	  <?php 
   
          $sql = " SELECT * FROM `pages` where title ='Mission'  ";
                      $result = mysqli_query($con,$sql); 
                   
                       while($row = mysqli_fetch_array($result)){
                      
                        ?>
                         <textarea style="width: 100%; border:none;outline: none;font-size: 14px" class="text-secondary changecontent" data-id="<?php echo $row['pageid'] ?>" rows="10"><?php  echo $row['content']; ?></textarea>
                        <?php
                       }
                

    ?>

      </div>
      <div class="tab-pane fade" id="v-pills-objectives" role="tabpanel" aria-labelledby="v-pills-objectives-tab">
      	  <?php 
   
          $sql = " SELECT * FROM `pages` where title ='Objectives'  ";
                      $result = mysqli_query($con,$sql); 
                   
                       while($row = mysqli_fetch_array($result)){
                      
                        ?>
                         <textarea style="width: 100%; border:none;outline: none;font-size: 14px" class="text-secondary changecontent" data-id="<?php echo $row['pageid'] ?>" rows="10"><?php  echo $row['content']; ?></textarea>
                        <?php
                       }
                

    ?>

      </div>
    </div>
  </div>
</div>



                               </div> 
                               

                            </div> 
                            
                         </div> 
                       <script src="../../js/jquery.js"></script>
                        
                         <script type="text/javascript">
                         	
                         	$(document).ready(function() {
                         	      	$('.changecontent').keyup(function(){ 

                         	      		var val = $(this).val();
                         	      		var id = $(this).data('id');
                         	      		
                         	      		
                         	      		   $.ajax({
                         	      		           url : "save.php",
                         	      		            method: "POST",
                         	      		             data  : {savetext:1,val:val,id:id},
                         	      		             success : function(data){
                         	      		
                         	      		             }
                         	      		          })
                         	      		     
                         	      		    
                         	      	})
                         	      });      
                               	
                         </script>
                         
		<?php
		
	}

	if(isset($_POST['administrationpane'])){ 
		?>

		<style type="text/css">
			.tabletxt {
				border:none;outline: none;width: 100%; padding: 5px;background-color: transparent;
			}
			.tabletxt:hover {
				border-bottom:1px solid grey;
			}
		</style>
		 <div class="card shadow">
		 	 <div class="card-body">
		 	 		<button class="btn btn-light text-primary" data-toggle="modal" data-target="#addstaff" data-backdrop="static" data-keyboard="false" style="font-size: 13px"> <i class="fas fa-plus-circle"></i> Add</button>
		 	 		<table class="table table-striped table-sm " style="font-size: 14px">
					  <thead>
					    <tr>
					      <th scope="col">Name</th>
					      <th scope="col">Position</th>
					      <th scope="col">Photo</th>
					       <th scope="col">Display Order</th>
					      <th scope="col">Action</th>
					    </tr>
					  </thead>
					  <tbody>
					  
                         <?php 
                          //
 
          $sql = " SELECT * FROM `pages` where  type =1 order by display_order asc  ";
                      $result = mysqli_query($con,$sql); 
                   
                       while($row = mysqli_fetch_array($result)){
                       
                        $photo = $row['photo'];

                        if($photo == '' || $photo == NULL) {
                          $src = '<span style="font-size: 13px" class="badge badge-danger">Photo not available</span>

                         <br>
                        		<a href="javascript:void(0)" class="uploadimg" data-toggle="modal" data-target="#uploadimg" data-id="'.$row['pageid'].'" data-backdrop="static" data-keyboard="false">Upload Photo</a>
                        		</div>

                          ';
                        }else {
                        	//$src = $photo;

                        	$link = '../img/uploads/';
                        	$final = $link.$photo;

                        	$src = '
                        	<img src="'.$final.'" style="width: 80px;height: 80px; border-radius: 100px" class="img-thumbnail">

                        	<br>
                        		<a href="javascript:void(0)" class="uploadimg" data-toggle="modal" data-target="#uploadimg" data-id="'.$row['pageid'].'" data-backdrop="static" data-keyboard="false"> change Photo</a>
                        		</div>

                        	';
                        }

                        ?>  
                        <tr>

                        	<td><input type="text" name=""  class="tabletxt editfullname" value="<?php echo $row['fullname'] ?> " data-id="<?php echo $row['pageid'] ?>"> </td>
                        	<td> <input type="text" name=""  class="tabletxt editpos" value="<?php echo $row['pos'] ?>" data-id="<?php echo $row['pageid'] ?>"></td>
                        	<td>
                        		 <div class="" style="text-align: center;"> 
                        		 
                        		<?php echo $src ?>
                        		

                        	</td>
                        	<td>
                        		<input type="text" name="$1" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '\$1');" class="tabletxt  editdorder" value="<?php echo $row['display_order'] ?>"  data-id="<?php echo $row['pageid'] ?>">
	
                        		
                        	</td>
                        	<td>

                        		<div class="btn-group" role="group" aria-label="Basic example">
							
							  <button type="button" class="btn btn-light text-danger delete" data-id="<?php echo $row['pageid'] ?>" style="font-size: 13px"><i class="fas fa-trash"></i></button>
							
							</div>
                        		
                        	</td>
                        </tr>
                         
                       
                        <?php
                       }
                

                     ?>
					    
					  </tbody>
					</table>

		 	 </div> 
		 	 
		 </div> 
		
		 <div class="modal fade" id="addstaff" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		   <div class="modal-dialog" role="document">
		     <div class="modal-content">
		       
		        <form method="post" action="save.php" onsubmit="return false" id="savenew">
		           	           <input type="hidden" name="savenew">        
		       
		       
		       <div class="modal-body">
		        	
		        	 <div class="container">
		        	 		
		        	 		
		        	 		 	
		        	 		 	  <div class="container" style="text-align: center;font-size: 13px">
		        	 		 	  		<img src="../img/undraw_profile_pic_ic5t.png" style="width: 120px;height: 120px">
		        	 		 	 		<input type="file" name="imahe" class="form-control mt-2" style="font-size: 13px" accept="image/*">
		        	 		 	  		
		        	 		 	  		<label class="mt-4">Enter Full Name</label>
		        	 		 	  		<input type="text" name="fname" class="form-control mb-2 " style="font-size: 13px" required="">

		        	 		 	  		<label>Enter Position</label>
		        	 		 	  		<input type="text" name="pos" class="form-control" style="font-size: 13px" required="">

		        	 		 	  </div> 
		        	 		 	 
		        	 		 	 
		        	 		
		        	 		 

		        	 </div> 
		        	 
		 
		 
		        
		       </div>
		       <div class="modal-footer">
		         <button type="button" class="btn btn-light text-danger" id="close" style="font-size:12px" data-dismiss="modal">Close</button>
		         <button type="submit" class="btn btn-light text-success" style="font-size:12px">Save changes</button>
		       </div>

		        </form>
		     </div>
		   </div>
		 </div>

		
		 <div class="modal fade" id="uploadimg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		   <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
		     <div class="modal-content">
		     
		     

		     	 <form method="post" enctype="multipart/form-data" action="save.php" onsubmit="return false" id="uploadimgs" >
		     	   <input type="hidden" name="uploadimg">  
		     	 
		     	
		       <div class="modal-body">
		        
		 		<input type="file" name="image" style="font-size: 14px" required="" accept="image/*">

		 		<input type="hidden" id="id" name="id">
		        
		       </div>
		       <div class="modal-footer">
		         <button type="button" class="btn btn-light text-danger" id="closeupt" style="font-size:12px" data-dismiss="modal">Close</button>
		         <button type="submit" class="btn btn-light text-primary" style="font-size:12px">Save changes</button>
		       </div>
		       </form>

		     </div>
		   </div>
		 </div>
		 
		 <script src="../../offline/sweetalert.js"></script>
		 <script src="../../js/jquery.js"></script>
		 
		 <script type="text/javascript">
		 	
		 	$(document).ready(function() {
		 		  	  $('#uploadimgs').on('submit', function(event){
		 		           event.preventDefault();

		 		         var formDatas = new FormData(this);
		 		        $.ajax({
		 		           url : $(this).attr('action'),
		 		             data:formDatas,
		 		              cache:false,
		 		              contentType: false,
		 		              processData: false,
		 		              method: "POST",
		 		                                                          
		 		             success : function(data){
		 		             	
		 		             	  $('#closeupt').click();  


		 	      	                 Swal.fire(
									  'Saved!',
									  'uploaded Successfully!',
									  'success'
									).then((result) => {
									
									  if (result.isConfirmed) {
									  
									     administrationpane();
									  }
									})
		 		                                                    
		 		              }
		 		             })
		 		  });
		 		$('.uploadimg').click(function() { 
		 				var id = $(this).data('id');
		 				
		 				$('#id').val(id);
		 		})
		 			$('.editfullname').keyup(function(){ 
		 				var val = $(this).val();
		 				var id = $(this).data('id');

		 					
		 					
		 					   $.ajax({
		 					           url : "save.php",
		 					            method: "POST",
		 					             data  : {updatefname:1,val:val,id:id},
		 					             success : function(data){
		 					
		 					             }
		 					          })
		 					       
		 					    
		 			
		 			})

		 				$('.editpos').keyup(function(){ 
		 				var val = $(this).val();
		 				var id = $(this).data('id');

		 					
		 					
		 					   $.ajax({
		 					           url : "save.php",
		 					            method: "POST",
		 					             data  : {updatepos:1,val:val,id:id},
		 					             success : function(data){
		 					
		 					             }
		 					          })
		 					       
		 					    
		 			
		 			})

		 						$('.editdorder').keyup(function(){ 
		 				var val = $(this).val();
		 				var id = $(this).data('id');

		 					
		 					
		 					   $.ajax({
		 					           url : "save.php",
		 					            method: "POST",
		 					             data  : {updatedorder:1,val:val,id:id},
		 					             success : function(data){
		 					
		 					             }
		 					          })
		 					       
		 					    
		 			
		 			})


		 	      	  	  $('#savenew').on('submit', function(event){
		 	      	           event.preventDefault();
		 	      	         var formData = new FormData(this);
		 	      	        $.ajax({
		 	      	           url : $(this).attr('action'),
		 	      	             data:formData,
		 	      	              cache:false,
		 	      	              contentType: false,
		 	      	              processData: false,
		 	      	              method: "POST",
		 	      	                                                          
		 	      	             success : function(data){
		 	      	             	
		 	      	             	  $('#close').click();  


		 	      	                 Swal.fire(
									  'Saved!',
									  'Added Successfully!',
									  'success'
									).then((result) => {
									  /* Read more about isConfirmed, isDenied below */
									  if (result.isConfirmed) {
									  
									     administrationpane();
									  }
									})

									                          
		 	      	              }
		 	      	             })
		 	      	  });

		 	      	  	  $('.delete').click(function() { 
		 	      	  	  	var id = $(this).data('id');
		 	      	  	  		
		 	      	  	  		
		 	      	  	  		   $.ajax({
		 	      	  	  		           url : "save.php",
		 	      	  	  		            method: "POST",
		 	      	  	  		             data  : {delete:1,id:id},
		 	      	  	  		             success : function(data){
		 	      	  	  			administrationpane();
		 	      	  	  		             }
		 	      	  	  		          })
		 	      	  	  		      
		 	      	  	  		    
		 	      	  	  
		 	      	  	  })


                        function administrationpane(){
                         

                            $.ajax({
                                     url : "content.php",
                                      method: "POST",
                                       data  : {administrationpane:1},
                                       success : function(data){
                                    $('.administrationpane').html(data);
                                       }
                                    })
                        }
		 	      });      
		       	
		 </script>

		<?php
	}

	if(isset($_POST['servicepane'])){ 
		?>


                         <div class="card">
                         	<button class="btn btn-light text-primary" data-toggle="modal" data-target="#addservices" data-backdrop="static" data-keyboard="false" style="font-size: 13px"> <i class="fas fa-plus-circle"></i> Add</button>
                            <div class="card-body">
                                
                               <div class="container">
                                  
                                  <div class="row">
  <div class="col-3">
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">

    	<?php 
    			$sql = " select * from pages where type = 2   ";
    	                $result = mysqli_query($con,$sql); 
    	                $count= mysqli_num_rows($result); 
    	           
    	                 while($row = mysqli_fetch_array($result)){
    	                 $active = $row['active'];
    	               	$content = $row['content'];

    	                 if($active == 1){
    	                 	?>
    						  <a class="nav-link active activelink" data-pageid="<?php echo $row['pageid'] ?>" data-title="<?php echo $row['title'] ?>" data-content="<?php echo $content ?>" id="v-pills-<?php echo $row['title'] ?>-tab" data-toggle="pill" href="#v-pills-<?php echo $row['title'] ?>" role="tab" aria-controls="v-pills-<?php echo $row['title'] ?>" aria-selected="true"><?php echo $row['title'] ?></a>

    						<?php
    	                 }else  {

    	                 	?>
    						  <a class="nav-link activelink" data-pageid="<?php echo $row['pageid'] ?>" data-title="<?php echo $row['title'] ?>" data-content="<?php echo $content ?>" id="v-pills-<?php echo $row['title'] ?>-tab"  data-toggle="pill" href="#v-pills-<?php echo $row['title'] ?>" role="tab" aria-controls="v-pills-<?php echo $row['title'] ?>" aria-selected="true"><?php echo $row['title'] ?> </a>

    						<?php
    	                 }


    						
    	                 }
    	          		


    	 ?>
    	
    
    </div>
  </div>

  	 <div class="modal fade" id="addservices" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		   <div class="modal-dialog" role="document">
		     <div class="modal-content">
		       
		        <form method="post" action="save.php" onsubmit="return false" id="savenewlink">
		           	           <input type="hidden" name="savenewlink">        
		       
		       
		       <div class="modal-body">
		        	
		        	 <div class="container" style="font-size: 14px">
		        	 		
		        	 		<h6>Add links</h6>
		        	 		<hr>
		        	 		 	
		        	 		 
		        	 	<label>Link</label>
		        	 	<input type="text" name="link" class="form-control mb-2">
		        	 	<label>Contents</label>		 	 
		        	 	<textarea rows="10" name="content" class="text-secondary" placeholder="Put contents here. . ." style="width: 100%;border:none;outline: none;font-size: 14px"></textarea>
		        	 		
		        	 		 

		        	 </div> 
		        	 
		 
		 
		        
		       </div>
		       <div class="modal-footer">
		         <button type="button" class="btn btn-light text-danger" id="closes" style="font-size:12px" data-dismiss="modal">Close</button>
		         <button type="submit" class="btn btn-light text-success" style="font-size:12px">Save changes</button>
		       </div>



		        </form>
		     </div>
		   </div>
		 </div>

  <script type="text/javascript">
    		
    		$(document).ready(function() {
    			$('#savenewlink').on('submit', function(event){
    			   event.preventDefault();
    			   			 $.ajax({
    				                 url : "save.php",
    				                  method: "POST",
    				                   data  : $(this).serialize(),
    				                   success : function(data){
    				      				
    				      				 	  $('#closes').click();  


		 	      	                 Swal.fire(
									  'Saved!',
									  'Added Successfully!',
									  'success'
									).then((result) => {
									  /* Read more about isConfirmed, isDenied below */
									  if (result.isConfirmed) {
									  
									     servicepane();
									  }
									})
    				                   }
    				                })
    			   });



                        function servicepane(){
                           $.ajax({
                                     url : "content.php",
                                      method: "POST",
                                       data  : {servicepane:1},
                                       success : function(data){
                                    $('.servicespane').html(data);
                                       }
                                    })

                        }
    				var content = $('.activelink').data('content');
    					var pageid = $('.activelink').data('pageid');
    					$('.txtcontent').data('id',pageid);
    					$('.btnremove').data('id',pageid);

    				$('.txtcontent').val(content);
    		      
    		      	$('.activelink').click(function() { 
    		      		var title = $(this).data('title');
    		      		var content = $(this).data('content');
    		      		var pageid = $(this).data('pageid');

    		      		
    		      		   $.ajax({
    		      		           url : "save.php",
    		      		            method: "POST",
    		      		             data  : {getcontent:1,id:pageid},
    		      		             success : function(data){
    		      					$('.txtcontent').val(data);	
    		      		             }
    		      		          })
    		      		   
    		      		    
    		      			
    		      		$('.btnremove').data('id',pageid);
    		      		$('.txtcontent').data('id',pageid);
    		      	})

    		      	$('.txtcontent').keyup(function(){ 
    		      		var val = $(this).val();
    		      		var id = $(this).data('id');
    		      		

    		      		
    		      		   $.ajax({
    		      		           url : "save.php",
    		      		            method: "POST",
    		      		             data  : {savetext:1,val:val,id:id},
    		      		             success : function(data){
    		      		
    		      		             }
    		      		          })
    		      		    
    		      		    
    		      		
    		      	})

    		      	$('.btnremove').click(function() { 
    		      		var id = $(this).data('id');

    		      	

    		      		  $.ajax({
    		      		           url : "save.php",
    		      		            method: "POST",
    		      		             data  : {delete:1,id:id},
    		      		             success : function(data){
    		      			servicepane();
    		      		             }
    		      		          })
    		      	})




    		      });      
    	      	
    	</script>

  <div class="col-9">
    <div class="tab-content" id="v-pills-tabContent">



     	 <div class="tabcontents" >
     	 	
				<textarea data-id="" class="txtcontent text-secondary" style="width: 100%;border:none;outline: none;font-size: 14px" rows="10" ></textarea>	

				<button class="btn btn-light text-danger btnremove" data-id=""  style="font-size: 13px;float: right;">Remove</button>	

		</div>
    


   
    </div>
  </div>
</div>



                               </div> 
                               

                            </div> 
                            
                         </div> 
                        <script src="../../js/jquery.js"></script>
                        
                         <script type="text/javascript">
                         	
                         	$(document).ready(function() {
                         	      	$('.changecontent').keyup(function(){ 

                         	      		var val = $(this).val();
                         	      		var id = $(this).data('id');
                         	      		
                         	      		
                         	      		   $.ajax({
                         	      		           url : "save.php",
                         	      		            method: "POST",
                         	      		             data  : {savetext:1,val:val,id:id},
                         	      		             success : function(data){
                         	      		
                         	      		             }
                         	      		          })
                         	      		     
                         	      		    
                         	      	})
                         	      });      
                               	
                         </script>
                         
		<?php
		
	}
 ?>