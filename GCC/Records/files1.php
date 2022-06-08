 <!-- Button trigger modal -->
<a type="button" style="font-size: 12px"  data-studentid="<?php echo $studentid ?>" class=" text-info page-link  viewfile<?php echo $studentid ?>" data-toggle="modal" data-target="#file<?php echo $studentid ?>" data-backdrop="static" data-keyboard="false">
 View Attachments 
</a>

<!-- Modal -->
<div class="modal fade" id="file<?php echo $studentid ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg " role="document">
    <div class="modal-content">
     
      <div class="modal-body">
      
      		 <div id="attachment_contents<?php echo $studentid ?>">
      		 	 <div class="" style="text-align: center;">
      		 	 
   <div class="spinner-grow spinner-grow-sm" role="status">
  <span class="visually-hidden"></span>
</div>

 <div class="spinner-grow spinner-grow-sm" role="status">
  <span class="visually-hidden"></span>
</div>
 <div class="spinner-grow spinner-grow-sm" role="status">
  <span class="visually-hidden"></span>
</div>

</div> 
</div> 
      		
      		<hr> 

      	<button class="btn btn-light" style="font-size: 13px;float: right;" data-dismiss="modal"> Close</button>  
      </div>
       
       
     
    </div>
  </div>
</div>

 <script src="../../js/jquery.js"></script>

<script type="text/javascript">
	
	   $(document).ready(function() {

		$('.viewfile<?php echo $studentid ?>').click(function() { 
			var sid = $(this).data('studentid');
			getfiledata(sid);
			
			
			
		})


		function getfiledata(sid){
				 	 var xhttp = new XMLHttpRequest();
		   	xhttp.onreadystatechange = function() {
		   	 if (this.readyState == 4 && this.status == 200) {
		   	const data = this.responseText;
		   
		   	$('#attachment_contents<?php echo $studentid ?>').html(data);
		   
		   				       }
		   				    };
		   		xhttp.open("POST", "file_contents1.php",true);
		   		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		   		xhttp.send("alluserfiles=1&studentid="+sid);
		
		}
		  
		 
		  
		   				
		         	      	 
		       
		    
	

});   
      	
</script>