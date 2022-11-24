  <div class="card-body">
         <div class="row">
                        
                       <div class="col-md-6">
                          <div class="card shadow">
                             <div class="card-header">
                               <h6 class="text-primary">IMAGE</h6>
                             </div>
                              <div class="card-body" >
                                  <?php 
                                  		$image = " SELECT * FROM `photoalbum` where status = 1  ";
                                                  $resultss = mysqli_query($con,$image); // run query
                                                  $countss= mysqli_num_rows($resultss); // to count if necessary
                                                 //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
                                               if ($countss>=1){
                                               	//while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                                                   while($row = mysqli_fetch_array($resultss)){
                                                   	$src = '../img/'.$row['photo'];
                                  					?>
                              <img src="<?php echo $src ?>" style="width:100%; height: 250px;" class="img-thumbnail">
                                  					<?php
                                                   }
                                            }
                                   ?>
                              

                                
                              

                                <button class="btn btn-secondary" data-toggle="modal" data-target="#headeralbum"  style="width: 100%;font-size: 12px">Select from album</button>

                               
                                
                                <!-- Modal -->
                                <div class="modal" id="headeralbum" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                      
                                      <div class="modal-body">
                                       	
                                       	 <div class="card">
                                       	 	 <div class="card-body">
                                       	 	 		
                                       	 	 		 <div class="container">
                                       	 	 		 	<h6 class="text-success">HEADER PHOTO'S</h6>
                                       	 	 		 	 <div class="row">
                                       	 	 		 	 	 <div class="col-md-6">
                                       	 	 		 	 	 	 <form method="post" action="action.php" enctype="multipart/form-data" id="savenewheaderphoto" onsubmit="return false" >
                                       	 	 		 	 	 	 	<input type="hidden" name="savenewheaderphoto">
                                       	 	 		 	 	 	
                                       	 	 		 	 	 		<label>Upload new photo</label>
                                       	 	 		 	 	 	  <input type="file" name="newphoto" id="photofile" class="form-control" style="font-size: 13px" required="" >

                                       	 	 		 	 	 	  <button class="btn btn-primary mt-2" type="submit" style="font-size: 12px;width: 100%">Save</button>

                                       	 	 		 	 	 	   </form>	
                                       	 	 		 	 	 	  <hr>
                                       	 	 		 	 	 </div> 
                                       	 	 		 	 	  <div class="col-md-6"></div> 
                                       	 	 		 	 	 
                                       	 	 		 	 </div> 
                                       	 	 		 	 <div class="row" style="height: 400px;overflow-y: scroll;" id="imagealbum">
                                       	 	 		 		
                                       	 	 		 	
                              
                                       	 	 		 		 


                                       	 	 		 		
                                       	 	 		 	 </div>
                                       	 	 		 	 
                                       	 	 		 </div> 
                                       	 	 		 


                                       	 	 </div> 
                                       	 	 
                                       	 </div> 
                                       	 
                                
                                
                                       
                                      </div>
                                      
                                    </div>
                                  </div>
                                </div>
                              </div> 
                                
                             
                          </div> 
                          
                       </div> 
                       <style type="text/css">
                         .centered {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
}
                       </style>
                         <div class="col-md-6">
                           <div class="card shadow">
                             <div class="card-header">
                               <h6 class="text-primary">TEXT</h6>
                             </div>
                              <div class="card-body" >
                                  
                               
                                 <img src="<?php echo $src ?>" style="width:100%; height: 250px;" class="img-thumbnail">
                                 <div class="centered" style="background-color: rgba(0,0,0,0.5);padding: 10px;">
                                      <img src="../img/gcc.png" style="width: 110px"><br>
                                      <span  style="color: white" id="bannertext">
                                      		<?php 
                                      				$sqlgui = "SELECT * FROM `gui` where id = 3 ";
                                      		                $resultgui = mysqli_query($con,$sqlgui); // run query
                                      		                $countgui= mysqli_num_rows($resultgui); // to count if necessary
                                      		            
                                      		                 while($row = mysqli_fetch_array($resultgui)){
                                      		                 	$sb = $row['sidebar_banner'];
                                      						echo $row['sidebar_banner'];
                                      		                 }
                                      		          
                                      		 ?>


                                      </span>
                                 </div> 
                                 

   <input type="text" name="" class="form-control" id="textbannertitle" value="<?php echo $sb ?>" style="text-align: center;font-size: 13px">



                              </div> 
                                
                             
                          </div> 
                          
                         </div> 
                       
                   
                     

                


                    </div> 
      </div> 
        <div class="fixed-bottom d-none" id="alertosave" >
                     	<div class="alert alert-success" style="right: 0;width: auto;float: right;"  role="alert">
						 <span style="font-size: 13px">Saving inputs  <i class="fas fa-circle-notch fa-spin"></i></span>
						</div>
                     	 
                     </div> 
       <script src="../../js/jquery.js"></script>
     <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

      <script type="text/javascript">
      	$(document).ready(function() {
      		imagealbum();

      		$('#textbannertitle').keyup(function(){ 
      			var val = $(this).val();
      			$('#bannertext').text(val);
      			$.ajax({
      	           url : "action.php",
      	             method: "POST",
      	             data  : {savebanner:1,val:val},
      	             success : function(data){
      	             			
      	             }
      	        })
      		
      		})

      		$("#textbannertitle").focus(function(){
			  //	$('#alertosave').removeClass('d-none');
			});

			$("#textbannertitle").focusout(function(){
			  	$('#alertosave').addClass('d-none');
			});

			$('#textbannertitle').keydown(function(){
			 	$('#alertosave').removeClass('d-none');
			 	const inss = setInterval(function(){
			 	$('#alertosave').addClass('d-none');
			 		clearInterval(inss);
			 	},1000);
			});

      		$('#headeralbum').on('hidden.bs.modal', function (e) {
					 location.reload();
					})

      		 $('#savenewheaderphoto').on('submit', function(event){
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
      	                   Swal.fire(
							  'Saved!',
							  'Photo uploaded successfully!',
							  'success'
							).then((result) => {
							  if (result.isConfirmed) {
							     imagealbum();
							     $('#photofile').val('');
							  }
							})                             
      	                    }
      	                   })
      	        });  

      	    
      	       

      	            function imagealbum() {
      	             	  
      	             	   $.ajax({
      	             	           url : "action.php",
      	             	            method: "POST",
      	             	             data  : {imagealbum:1},
      	             	             success : function(data){
      	             				$('#imagealbum').html(data);
      	             	             }
      	             	          })
      	             	    
      	             	    
      	             } 
      	});
      	
      	  	 
            	
      </script>