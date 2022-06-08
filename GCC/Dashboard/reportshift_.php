	<h6 style="font-weight:bolder;text-align: center;">Shifting Records</h6>
	<br>
	<h6 style="font-size:13px">Year : <?php echo $year ?></h6>
 	<div class="row">
 		
 		<div class="col-md-6">
 			<h6 style="font-weight:bolder;text-align: center;">From</h6>
 			<ul class="list-group" style="font-size:13px" id="from_shift"></ul>

 		</div>

 		<div class="col-md-6">

 				<h6 style="font-weight:bolder;text-align: center;">To</h6>
 	<ul class="list-group" style="font-size:13px" id="to_shift"></ul>

 			

 		</div>		



 	</div>

 	<script type="text/javascript">
 		  $(document).ready(function() {
 		


 			 fromdefcontent ('<?php echo $sem ?>','<?php echo $year ?>','<?php echo $yrlevel ?>');
 			 todefcontent ('<?php echo $sem ?>','<?php echo $year ?>','<?php echo $yrlevel ?>');

 			function fromdefcontent(sem,year){
 				
 				 $.ajax({
 				 url : "shift_contents.php",
 				  method: "POST",
 				 data  : {fromdefcontent:1,sem:sem,year:year,yrlevel:yrlevel},
 				  success : function(data){
 				 	$('#from_shift').html(data);
 				 
 				   }
 				 })
 			}

 			function todefcontent(sem,year){
 				
 				 $.ajax({
 				 url : "shift_contents.php",
 				  method: "POST",
 				 data  : {todefcontent:1,sem:sem,year:year,yrlevel:yrlevel},
 				  success : function(data){
 				 	$('#to_shift').html(data);
 				 
 				   }
 				 })
 			}

 		
 		  });
 		
 		
 	</script>

 