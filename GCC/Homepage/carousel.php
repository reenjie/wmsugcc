  
<style type="text/css">
	
	#list-group::-webkit-scrollbar {
  width: 10px;
}
</style>

  <div class="card-body">
               <div class="card shadow">
                                    <div class="card-body">
                                       <div class="row">
                                          <div class="col-sm-6">
                                            
                                           <button style="font-size: 12px" class="btn btn-primary" data-toggle="modal" data-target="#addingnewitem" data-backdrop="static" data-keyboard="false">Add new item</button>
                                           <hr>
                                            <ul class="list-group" id="list-group" style="height: 250px; overflow-y: scroll;">
                                               
                                             
                                            </ul>


                                          </div> 
                                          <div class="col-sm-6">
                                            <h6 class="text-primary">Preview Pane</h6>
                                            <hr>
                                             <!--<div class="" id="honor" style="height: 250px ">
                                               <h5 style="text-align: center; margin-top: 150px;"><i class="fas fa-arrow-left"></i> Select image to view</h5>
                                             </div> -->
                                             
                                         <img id="previewpaneimgsrc" src=""  style="width: 100%; height: 250px" alt="Preview pane">

                                          </div> 
                                          
                                       </div> 
                                       

                                      
                                    </div> 
                                    
                                 </div> 
      </div>

       <div class="modal" id="addingnewitem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    
                    <div class="modal-body">
                        <form method="post" enctype="multipart/form-data" id="savenewcarouselitem" action="action.php"  onsubmit="return false">
                        		<input type="hidden" name="savenewcarouselitem">
                        

                      <h6 class="text-primary">Add new Item</h6>
                      <input type="file" name="imagefileforcarousel" id="imgsrcforcar" class="form-control">
                      <hr>
                     
                      <button class="btn btn-success" type="submit" style="font-size: 12px;float: right;">Save</button>

                       <button class="btn btn-danger" type="button" style="font-size: 12px;float: right;margin-right: 4px;" data-dismiss="modal">Cancel</button>
                       
              				</form>	
              
                     
                    </div>
                   
                  </div>
                </div>
              </div>


               <div class="modal fade" id="changephoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                  
                    <div class="modal-body">
                      <form method="post" enctype="multipart/form-data" id="uptcarouselitem" action="action.php"  onsubmit="return false">
                          <input type="hidden" name="uptcarouselitem">
                     
                            <h6 class="text-primary">Change Photo</h6>
                      <input type="file" name="uptimgsrcforcar" class="form-control">
                      <hr>
                     <input type="hidden" name="pid" id="pidd">
                     <input type="hidden" name="src" id="pidsrc">
                      <button class="btn btn-info" type="submit" style="font-size: 12px;float: right;">Change</button>

                       <button class="btn btn-danger" type="button" style="font-size: 12px;float: right;margin-right: 4px;" data-dismiss="modal">Cancel</button>
              
                       </form>  
                    </div>
                  
                  </div>
                </div>
              </div>


              <script type="text/javascript">
              	
              	$(document).ready(function() {
              	      	  	  $('#savenewcarouselitem').on('submit', function(event){
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
									  'Photo uploaded!',
									  'Photo saved successfully!',
									  'success'
									)   
									$('#addingnewitem').modal('hide');
									$('#imgsrcforcar').val('');
									getcarouselitem();
              	      	              }
              	      	             })
              	      	  });

                                    $('#uptcarouselitem').on('submit', function(event){
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
                                            'Changes Saved!',
                                            'Photo updated successfully!',
                                            'success'
                                          )   
                                          $('#changephoto').modal('hide');
                                          $('#uptimgsrcforcar').val('');
                                          getcarouselitem();                                    
                                            }
                                           })
                                });


              	      	  	  getcarouselitem();

              	      	  	  function getcarouselitem(){
              	      	  	  	 
              	      	  	  	
              	      	  	  	   $.ajax({
              	      	  	  	           url : "action.php",
              	      	  	  	            method: "POST",
              	      	  	  	             data  : {caritem:1},
              	      	  	  	             success : function(data){
              	      	  	  				$('#list-group').html(data);

              	      	  	  	             }
              	      	  	  	          })
              	      	  	  	    
              	      	  	  	    
              	      	  	  }
              	      });      
                    	
              </script>