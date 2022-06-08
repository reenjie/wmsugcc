 <script type="text/javascript">
	 	
	 	$(document).ready(function() {
	 	      	$('#section<?php  echo $section ?>').removeClass('text-primary');
	 	      	 	$('#section<?php  echo $section ?>').addClass('text-light');
	 	      	 	 	$('#section<?php  echo $section ?>').addClass('bg-primary');
	 	      	 	 	

	 	      	 	 		$('.autoscroll').removeClass('active');
	 	      	 	 	$('#scrollspy<?php echo $section ?>').addClass('active');
	 	      });      
	       	
	 </script>

							<p></p>
					

							<div class="card"  id="bgwcard<?php echo $formid?>" >
								<?php
										$setcolor = " select * from `form_classification` where csform_id = '$csform'  ";
								                $setcolored = mysqli_query($con,$setcolor); // run query
								              
								                 while($getcolor = mysqli_fetch_array($setcolored)){
													$bodybg = $getcolor['bodybg'];
													$titlebg = $getcolor['titlebg'];
													$questionbg = $getcolor['questionbg'];
								                 }

								                 	
								          
								?>
 				<div class="card-header " style="background-color: <?php echo $bgtcolor ?>" data-color="<?php echo $bgtcolor ?>" id="form<?php echo $row['form_id'] ?>" >	
							 	
								
 
							 </div> 

							<p style="color: grey;font-weight: bolder;font-size: 12px;padding: 10px"> TITLE</p> 
							 <form method="post" enctype="multipart/form-data" action="saving.php" id="savebgimage" onsubmit="return false" >
							 	<input type="hidden" name="savebgimage">
							
							  <div class="card-body" style="text-align: center; height: 180px;background: url('<?php echo $bgsrc ?>');background-size:cover;background-repeat:no-repeat;background-position-y:<?php echo $posbg ?>;height: 180px;width: 100%" id="bgcard<?php echo $formid?>">
							  	
							  	

							  	 <?php 
							  	 if($isvisible == 0){
							  	 	?>

							  	 	 <h2 style="padding: 20px;" id="texttitle<?php echo $row['form_id'] ?>"><input type="text" class="titletext" name="" data-fid="<?php echo $row['form_id'] ?>" value="<?php echo $row['content'] ?>"  id="titletextss<?php echo $row['form_id'] ?>" style="border: none;outline: none ;padding: 10px; background-color: <?php echo $bgtcolor ?>; text-align: center; color:<?php echo $txttcolor ?>;"   > </h2>


							  	 	<?php
							  	 }else {

							  	 }

							  	  ?>

							  	 <input type="hidden" name="xvalue" id="xvalue" >
							  	 <input type="hidden" name="yvalue" id="yvalue" >
							  		<input type="hidden" name="fid" value="<?php echo $row['form_id'] ?>">
								<!--<input type="text" name="" id="bgcolor<?php echo $row['form_id'] ?>">-->
							  </div>
							   <div class="card-footer">

							   	  <button type="button" class="btndeltitle"  style="float: right;border:none;outline: none;" data-fid="<?php echo $row['form_id'] ?>" ><i style="color:grey" class="far fa-trash-alt" data-bs-toggle="tooltip" data-bs-placement="right" title="Delete Element"></i></button>

							   	  <input type="file" name="bgfile" class="bgfiles d-none" style="font-size: 12px" id="bgfile<?php echo $formid?>" data-fid="<?php echo $row['form_id'] ?>" accept="image/*" data-fid="<?php echo $formid ?>" required>

							   	   <button type="button" class="btn btn-light text-info realign d-none" data-fid="<?php echo $row['form_id'] ?>" style="font-size: 12px;font-weight: bold" id="btnrealign<?php echo $formid?>">Reposition Background Image</button>

							   	    <button type="button" class="btn btn-light text-danger clearbg d-none" data-fid="<?php echo $row['form_id'] ?>" style="font-size: 12px;font-weight: bold" id="btnclear<?php echo $formid?>">Clear BG</button>

							   	  <button type="submit" class="btn btn-light text-primary d-none" style="font-size: 12px;font-weight: bold" id="btnfile<?php echo $formid?>"> Save Changes</button>

							   	  	<label class="d-none " id="labelbgcolor<?php echo $row['form_id'] ?>" >
							   	  		<span style="font-size: 15px;">Set Background Color : </span>
							   	  		<input type="color" class="bgcolor" name="" data-fid="<?php echo $row['form_id'] ?>" value="<?php echo $bgtcolor ?>">
							   	  	</label>

							   	  		<label class="d-none" id="labeltxtcolor<?php echo $row['form_id'] ?>">
							   	  		<span style="font-size: 15px">Set Text Color : </span>
							   	  		<input type="color" name="" class="txtcolor" data-fid="<?php echo $row['form_id'] ?>" value="<?php echo $txttcolor ?>">
							   	  	</label>

							   	  	


							   	  	<button type="button" style="float: right;border:none;outline: none;margin-right: 10px;" data-fid="<?php echo $formid ?>" data-toggle="tooltip" data-placement="bottom" title="background image" class="btnbg" > <i class="far fa-images text-secondary"></i></button>

							   	  		<button type="button" class="btntheme" style="float: right;border:none;outline: none;margin-right: 10px;" data-fid="<?php echo $formid ?>" data-toggle="tooltip" data-placement="bottom" title="Background-colors and text colors"><i class="fas fa-magic text-secondary"></i></button>

							   	  	<button type="button" style="float: right;border:none;outline: none;margin-right: 10px;" data-fid="<?php echo $formid ?>" class="btncancelbg d-none" > <i class="fas fa-times-circle text-danger"></i></button>

							   	  
							   	  <!--	<div class="form-check form-switch" style="float: right;" data-bs-toggle="tooltip" data-bs-placement="right" title="If Disabled Title Text will not be visible">
									  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" data-fid="<?php echo $row['form_id'] ?>" checked>
									  <label class="form-check-label" for="flexSwitchCheckDefault"></label>
									</div> -->
								
							  	 	<?php 

							  	 	if($isvisible >= 1 ){
							  	 		?>
							  	 	<div class="form-check form-switch" style="float: right;" data-bs-toggle="tooltip" data-bs-placement="right" title="If Disabled Title Text will not be visible">
									  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" data-fid="<?php echo $row['form_id'] ?>"  >
									  <label class="form-check-label" for="flexSwitchCheckDefault"></label>
									</div>

							  	 			<?php

							  	 		}else {
							  	 			?>
							  	 	<div class="form-check form-switch" style="float: right;" data-bs-toggle="tooltip" data-bs-placement="right" title="If Disabled Title Text will not be visible">
									  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" data-fid="<?php echo $row['form_id'] ?>"  checked>
									  <label class="form-check-label" for="flexSwitchCheckDefault"></label>
									</div>

							  	 			<?php
							  	 		}
							  	 	 ?>
							  	 	

							  	 		

									
									


						
							   </div> 

							    </form>	
							   
							  
							</div>
							<p></p>



							 <?php 
								 		$cx = " SELECT max(display_order) FROM `form` WHERE class_name='$clss' and sec_no = '$secno'  ";
								                 $resultcx = mysqli_query($con,$cx); // run query
								                 $countcx= mysqli_num_rows($resultcx); // to count if necessary
								                //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
								              if ($countcx>=1){
								              	//while($row = mysqli_fetch_array($result)){} is where we output all the data in database
								                  while($rowcx= mysqli_fetch_array($resultcx)){

								                  	$max =  $rowcx['max(display_order)'];
								 					
								                  }

								                  if ($d_order == $max) {

								                  				$cs = "SELECT * FROM `form` where type ='section'";
								                  				  $resultcss = mysqli_query($con,$cs); // run query
								                 $countcss= mysqli_num_rows($resultcss); // to count if necessary
								                //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
													              if ($countcss>=1){

													              	?>
													              	
								                  	<h6 class="mt-5 text-secondary" style="font-weight: bolder;text-align: center;"><i class="fas fa-angle-double-left"></i><i class="fas fa-chevron-left"></i> End of Section <?php echo $secno ?>  <i class="fas fa-chevron-right"></i><i class="fas fa-angle-double-right"></i></h6>

								                  					<?php
													              
													              }else {
													              	
													              }

								                  		
								                  }
								           }

								  ?>

							<style type="text/css">
								.cursorgrab {
									cursor: grab;
								}
								.cursordef {
									cursor:default;
								}
							</style>

						
							
						<script type="text/javascript">
							 $('#flexSwitchCheckDefault').click(function() {
							 
							 	var fid = $(this).data('fid');
							      if($(this).prop("checked") == true) {

							               $.ajax({
								           url : "saving.php",
								            method: "POST",
								             data  : {visible:1,fid:fid},
								             success : function(data){
								             	
										content();
								             }
								          })         		
							         }
							      else if($(this).prop("checked") == false) {
							      			
							       	 $.ajax({
								           url : "saving.php",
								            method: "POST",
								             data  : {notvisible:1,fid:fid},
								             success : function(data){
											

											content();
											
								             }
								          })                                
							       }
							    });

							
							$('.bgcolor').on('input', function() {
								var fid = $(this).data('fid');
								var val = $(this).val();
								$('#form'+fid).attr('style','background-color:'+val);

								$('#titletextss'+fid).attr('style','border: none;outline: none ;padding: 10px; background-color:'+val+' ; text-align: center; color:<?php echo $txttcolor ?>');
								$('#form'+fid).attr('data-color',val);
								
								   $.ajax({
								           url : "saving.php",
								            method: "POST",
								             data  : {savebgcolor:1,val:val,fid:fid},
								             success : function(data){
											
								             }
								          })
								         
								    
								
								//$('#bgcolor'+fid).val(val);
							
							})
							$('.txtcolor').on('input', function() {
								var fid = $(this).data('fid');
								var val = $(this).val();
								var bgval = $('.bgcolor').val();
								$('.titletext').attr('style','border: none;outline: none ;padding: 10px; background-color: '+bgval+'; text-align: center; color:'+val);

								  $.ajax({
								           url : "saving.php",
								            method: "POST",
								             data  : {savetxtcolor:1,val:val,fid:fid},
								             success : function(data){
								
								             }
								          })
							//	$('#bgcolor'+fid).val(val);
							
							})

							$('.btntheme').click(function() { 
							var fid = $(this).data('fid');
							$('.btncancelbg').removeClass('d-none');
							$(this).addClass('d-none');
							$('.btnbg').addClass('d-none');
							$('#labelbgcolor'+fid).removeClass('d-none');
							$('#labeltxtcolor'+fid).removeClass('d-none');

							})

							



							$('.clearbg').click(function() { 
									var fid = $(this).data('fid');
									 
									
									   $.ajax({
									           url : "saving.php",
									            method: "POST",
									             data  : {clearbg:1,fid:fid},
									             success : function(data){
										content();
									             }
									          })
									     
									    
							})


							  	  $('#savebgimage').on('submit', function(event){
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
							                content();
							             //$('.btncancelbg').click();

							              }
							             })
							  });

							  	  function content() {
			
			  $.ajax({
			           url : "action.php",
			            method: "POST",
			             data  : {content:1},
			             success : function(data){
							$('#content').html(data);
							checktitle();	
							deleteunexpected ();
			             }
			          })
		}



	      		$('.realign').click(function() { 
	      			var fid = $(this).data('fid');
	      			$('#texttitle'+fid).addClass('d-none');
	      			 $('#bgcard'+fid).addClass('cursorgrab');

 let AttachDragTo = (function() {
  let _AttachDragTo = function(el) {
    this.el = el;
    this.mouse_is_down = false;

    this.init();


  };

 

  _AttachDragTo.prototype = {
    onMousemove: function(e) {
      if (!this.mouse_is_down) return;

      let tg = e.target,
        x = e.clientX,
        y = e.clientY,
        target_width = tg.clientWidth,
        target_height = tg.clientHeight,
        image_proportion,
        image_height = 600, //Change this variable when changing the image.
        image_width = 400, //Change this variable when changing the image.
        max_pos_x = 0,
        max_pos_y = 0;
      
      image_proportion = image_width / image_height;
      
    
      if(image_width > target_width && image_height > target_height) {
          max_pos_y = target_width / image_proportion - target_height;
        } else {
          if (target_width - image_width  > target_height - image_height) {
            max_pos_y = target_width / image_proportion - target_height;
          } else {
            max_pos_x = target_width / image_proportion - target_width;
          }
        }

        let image_bg_pos_x = x - this.origin_x + this.origin_bg_pos_x;
        let image_bg_pos_y = y - this.origin_y + this.origin_bg_pos_y;

        if (image_bg_pos_x < 0 && image_bg_pos_x > -max_pos_x) {
          tg.style.backgroundPositionX = image_bg_pos_x + 'px';
        }

        if (image_bg_pos_y < 0 && image_bg_pos_y > -max_pos_y) {
          tg.style.backgroundPositionY = image_bg_pos_y + 'px';
        }
  $('#xvalue').val(image_bg_pos_x);
   $('#yvalue').val(image_bg_pos_y);

    },

    onMouseleave: function(e) {
      this.mouse_is_down = false;
      
      let tg = e.target,
        styles = getComputedStyle(tg);

      this.origin_bg_pos_x = parseInt(
        styles.getPropertyValue('background-position-x'),
        10
      );
      this.origin_bg_pos_y = parseInt(
        styles.getPropertyValue('background-position-y'),
        10
      );
     
      tg.style.cursor = 'grab';
    },

    onMousedown: function(e) {
      e.target.style.cursor = 'grabbing';
      
      this.mouse_is_down = true;
      this.origin_x = e.clientX;
      this.origin_y = e.clientY;
      
    },

    onMouseup: function(e) {
      let tg = e.target,
        styles = getComputedStyle(tg);

      this.mouse_is_down = false;
      
      this.origin_bg_pos_x = parseInt(
        styles.getPropertyValue('background-position-x'),
        10
      );
      this.origin_bg_pos_y = parseInt(
        styles.getPropertyValue('background-position-y'),
        10
      );
      
      tg.style.cursor = 'grab';
    },

    init: function() {
      let styles = getComputedStyle(this.el);
      this.origin_bg_pos_x = parseInt(
        styles.getPropertyValue('background-position-x'),
        10
      );
      this.origin_bg_pos_y = parseInt(
        styles.getPropertyValue('background-position-y'),
        10
      );
      
      let imageUrl = this.el.style.backgroundImage.replace(/url\((['"])?(.*?)\1\)/gi, '$2');
      let image = new Image();
      image.src = imageUrl;

      image.onload = () => {
        this.image_width = image.width,
          this.image_height = image.height;

      }


      //attach events
      this.el.addEventListener('mousedown', this.onMousedown.bind(this), false);
      this.el.addEventListener('mouseup', this.onMouseup.bind(this), false);
      this.el.addEventListener('mousemove', this.onMousemove.bind(this), false);
      this.el.addEventListener(
        'mouseleave',
        this.onMouseleave.bind(this),
        false
      );
    }
  };

  return function(el) {
    new _AttachDragTo(el);
  };
})();
              const image = document.getElementById('bgcard'+fid);
          AttachDragTo(image);
	      			
	      		})
								$('.btnbg').click(function() { 
									var fid = $(this).data('fid');

									$('#bgfile'+fid).removeClass('d-none');
									$('#btnfile'+fid).removeClass('d-none');
									$('.btnbg').addClass('d-none');
									$('.btncancelbg').removeClass('d-none');
									$('#btnclear'+fid).removeClass('d-none');
									$('.btntheme').addClass('d-none');
									
								})
								
								$('.btncancelbg').click(function() { 

									var fid = $(this).data('fid');

									$('#bgfile'+fid).addClass('d-none');
									$('#btnfile'+fid).addClass('d-none');
									$('.btnbg').removeClass('d-none');
									$('.btncancelbg').addClass('d-none');
									$('#bgfile'+fid).val('');
									$('#btnrealign'+fid).addClass('d-none');
									$('#texttitle'+fid).removeClass('d-none');
									$('#bgcard'+fid).attr('style','text-align: center;height: 180px;cursor:default;background: url("<?php echo $bgsrc ?>");background-size:cover;background-repeat:no-repeat;background-position-y:<?php echo $posbg ?>');
									 $('#bgcard'+fid).removeClass('cursorgrab');
									 $('#btnclear'+fid).addClass('d-none');
									 $('.btntheme').removeClass('d-none');
									 $('#labelbgcolor'+fid).addClass('d-none');
									$('#labeltxtcolor'+fid).addClass('d-none');
									content();
									
								})
								$('.bgfiles').change(function() { 
										var fid = $(this).data('fid');
									//alert($(this).val());

									   const file = this.files[0];


								                  
								             if(file) {
								     const reader = new FileReader();
								                                              
								                                              
								       reader.addEventListener("load",function() {
								                                                  //previewimage.setAttribute("src",this.result);
								          $('#bgcard'+fid).attr('style','background:url('+this.result+');text-align: center;background-size:cover;background-repeat:no-repeat;background-position:center;height: 180px');

								           $('#btnrealign'+fid).removeClass('d-none');
								                                                 
								                         });
								             reader.readAsDataURL(file);

								                                     }
								
								})








							    $('.titletext').select();  

							    $('.titletext').keyup(function(){ 
							    	var valtxt = $(this).val();
							    	var id = $(this).data('fid');
							    	
							    	   $.ajax({
							    	           url : "opt_pro.php",
							    	            method: "POST",
							    	             data  : {edititles:1,val:valtxt,id:id},
							    	             success : function(data){
							    	
							    	             }
							    	          })
							    	   
							    	
							    
							    	    
							    })
						      	
						</script>