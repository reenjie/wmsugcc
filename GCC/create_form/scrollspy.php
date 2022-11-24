
<style type="text/css">
	#scrollcard::-webkit-scrollbar {
  width: 2px;
}
.expand { 
	height: 500px;overflow-y: scroll;
	z-index: 1;
}
#scrolllyscrollspy {
		position: fixed; left: 5%; top: 40px;
	}
@media screen and (max-width :768px){ 
	#scrolllyscrollspy {
		display: none;
	}
}
	
</style>

 <div class="card shadow " id="scrolllyscrollspy" style=""> 
 	 <div class="card-body" id="scrollcard" >
 	 			 <div class="" > 
	 
<div id="list-example" class="list-group" style="">
	<?php 
	$csform = $_SESSION['form_id'];

			$sp = " select * from form where class_name = '$csform' and  type='section'  ";
	                $resultsp = mysqli_query($con,$sp); // run query
	                $countsp= mysqli_num_rows($resultsp); // to count if necessary
	               //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
	             if ($countsp>=1){
	             	//while($row = mysqli_fetch_array($result)){} is where we output all the data in database
	                 while($row = mysqli_fetch_array($resultsp)){
					?>
					<a class="list-group-item list-group-item-action autoscroll " data-formid="<?php echo $row['form_id'] ?>" id="scrollspy<?php echo $row['form_id'] ?>" href="javascript:void(0)">Section <?php echo $row['sec_no'] ?></a>
					<?php
	                 }

	          }else {


	          	?>
	          	<script type="text/javascript">
	          		
	          		$(document).ready(function() {
	          		      	$('#scrolllyscrollspy').addClass('d-none');
	          		      });      
	          	      	
	          	</script>
	          	<?php
	          }




	                 if ($countsp >11) {
	                 	?>
	          	<script type="text/javascript">
	          		
	          		$(document).ready(function() {
	          		      	$('#scrollcard').addClass('expand');
	          		      });      
	          	      	
	          	</script>
	          	<?php

	                 }

	 ?>
</div>	 


<script type="text/javascript">
	

	$(document).ready(function() {
	      	$('.autoscroll').click(function() { 
	      		var id = $(this).data('formid');

	      		//alert(id);

	      		$('html, body').animate({
					scrollTop: $("#section"+id).offset().top
				},500);
	      			//$('.autoscroll').removeClass('active');
	 	      	 //	$('#scrollspy'+id).addClass('active');

	 	      	 	$('#sectionselect'+id).removeClass('text-primary');
	 	      	 	$('#sectionselect'+id).addClass('text-light');
	 	      	 	 	$('#sectionselect'+id).addClass('bg-primary');

	      	})
	      });      
      	
</script>

</div>
 	 </div> 
 	 
 </div> 
