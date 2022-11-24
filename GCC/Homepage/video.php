     <div class="card-body">
               <div class="card shadow">
                                    <div class="card-body">
                                   
                                         <div class="card shadow">
                                           <div class="card-body">
                                               <div class="row">
                                                  <div class="col-sm-6">

                                                         <ul class="list-group" id="videocontents"></ul>

                                                  </div> 

<style type="text/css">
  .month {
  padding: 10px 25px;
  width: 100%;
  background: #1abc9c;
  text-align: center;
}

/* Month list */
.month ul {
  margin: 0;
  padding: 0;
}

.month ul li {
  color: white;
  font-size: 20px;
  text-transform: uppercase;
  letter-spacing: 3px;
}

/* Previous button inside month header */
.month .prev {
  float: left;
  padding-top: 10px;
}

/* Next button */
.month .next {
  float: right;
  padding-top: 10px;
}

/* Weekdays (Mon-Sun) */
.weekdays {
  margin: 0;
  padding: 10px 0;
  background-color:#ddd;
}

.weekdays li {
  display: inline-block;
  width: 13.6%;
  color: #666;
  text-align: center;
}

/* Days (1-31) */
.days {
  padding: 10px 0;
  background: #eee;
  margin: 0;
}

.days li {
  list-style-type: none;
  display: inline-block;
  width: 13.6%;
  text-align: center;
  margin-bottom: 5px;
  font-size:12px;
  color: #777;
}

/* Highlight the "current" day */
.days li .active {
  padding: 5px;
  background: #1abc9c;
  color: white !important
}

</style>

                                                   <div class="col-sm-6">
                                                     <h6 class="text-primary">Preview Pane</h6>
                                                     <hr>
          
     <video  style="width: 100%; height: 300px;border-radius: 3px" id="videoresources" poster="<?php echo $videothumbnail ?>" src="<?php echo $videosrc ?>" controls ></video>

                                                   </div> 
                                                  
                                               </div> 
                                               

                                           </div> 
                                           
                                        </div> 

                                      
                                    </div> 
                                    
                                 </div> 
      </div>



              <div class="modal fade" id="editvideo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">

                    <div class="modal-body">
                      	 <form method="post" enctype="multipart/form-data" action="action.php" id="saveuptvideos" onsubmit="return false" >
                      	 	
                      	<input type="hidden" name="saveuptvideos">
                       <h6 class="text-primary">Change Video</h6>

                        <span style="font-size: 14px">Title</span>
                      <input type="text" name="vtitle" class="form-control eo" style="font-size: 12px" required="" > <br>

                      <span style="font-size: 14px">Video</span>
                      <input type="file" name="vvname" class="form-control eo" style="font-size: 12px" required="" accept="video/*"> 
                      <span style="font-size: 11px">Maximum-size : 40mb</span> <br>
                      <br>

                      <span style="font-size: 14px">Photo/Thumbnail</span>
                      <input type="file" name="vthumbnail" class="form-control eo" style="font-size: 12px" required="" >
                      <hr>
                      <input type="hidden" name="vid" id="vidd">
                       <input type="hidden" name="vidsrc" id="viddsrc">
                        <input type="hidden" name="vidth" id="viddth">
                     
                      <button class="btn btn-info" type="submit" style="font-size: 12px;float: right;">Change</button>

                       <button class="btn btn-danger" type="button" style="font-size: 12px;float: right;margin-right: 4px;" data-dismiss="modal">Cancel</button>

              		 </form>	
                     
                    </div>
                   
                  </div>
                </div>
              </div>

      <script type="text/javascript">
      	
      	$(document).ready(function() {
      			  	  $('#saveuptvideos').on('submit', function(event){
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
      			             	
      			             
      			             if(data.match("Warning")){
      			             	Swal.fire(
									  'Error Upload',
									  'Maximum-size must be 40mb only!',
									  'error'
									)
      			             }else if(data.match("success")) {
      			             	Swal.fire(
									  'Changes Saved!',
									  'Video uploaded successfully!',
									  'success'
									)
								 getvideocontents();
								 $('.eo').val('');
								 $('#editvideo').modal('hide');

      			             }
      			             	

      			              }
      			             })
      			  });
      		getvideocontents();
      	      	function getvideocontents(){
      	      		 
      	      		
      	      		   $.ajax({
      	      		           url : "action.php",
      	      		            method: "POST",
      	      		             data  : {getvideos:1},
      	      		             success : function(data){
      	      						$('#videocontents').html(data);
      	      		             }
      	      		          })
      	      		    
      	      		    
      	      	}
      	      });      
            	
      </script>