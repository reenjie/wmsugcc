<!-- Button trigger modal -->
<button type="button" style="font-size: 12px" class="btn btn-light text-info" data-toggle="modal" data-target="#exampleModal" data-backdrop="static" data-keyboard="false">
 <i class="fas fa-paperclip"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg " role="document">
    <div class="modal-content">
     
      <div class="modal-body">
      
      		 <div id="attachment_contents">
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

		
		  
		 
		   	 var xhttp = new XMLHttpRequest();
		   	xhttp.onreadystatechange = function() {
		   	 if (this.readyState == 4 && this.status == 200) {
		   	const data = this.responseText;
		   
		   	$('#attachment_contents').html(data);
		   
		   				       }
		   				    };
		   		xhttp.open("POST", "file_contents.php",true);
		   		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		   		xhttp.send("alluserfiles=1&studentid=<?php echo $studentid ?>");
		   				
		         	      	 
		       
		    
	

});   
      	
</script>