<?php 
session_start();
include 'connect.php';
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <script src="https://kit.fontawesome.com/129b086bc9.js" crossorigin="anonymous"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/css2?family=Gruppo&family=Londrina+Solid:wght@300&display=swap" rel="stylesheet">
<title>WMSU Guidance and Counceling</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

	 <style type="text/css">
	 @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@300&display=swap');
		*{
			font-family: 'Cairo', sans-serif;
		}
	 </style>
  <style>
  
  .innerBar {
	 background: #617298;
   height: 2px;
   width: 100%;
   z-index: 1;
	}
	.cardo:hover {
		border-top: 5px solid #89a5d9;
	}
	
  </style>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>

  $( function() {
    $( "#sortable" ).sortable();
    $( "#sortable" ).disableSelection();
     $( "#sortable" ).sortable({
      cancel: ".unallowed"
    });

     $( ".unallowed" ).disableSelection();
 

  } );

 $(document).ready(function() {
 	
 	

 	$("#sortable").sortable({		
		update: function( event, ui ) {
			updateOrder();
			
			//location.reload();	
				contents();

		}
	});  
 });

 function updateOrder() {	
	var sortedIDs = $( "#sortable" ).sortable( "toArray" );
	//var dis = sortedIDs.data('dis');
		
	
			
					 var xhttp = new XMLHttpRequest();
						xhttp.onreadystatechange = function() {
						 if (this.readyState == 4 && this.status == 200) {
						const data = this.responseText;
					
							// Your condition here if data success.
							//contents();
							//alert(data);
									       }
									    };
							xhttp.open("POST", "update_order.php",true);
							xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
							xhttp.send("compare=1&order="+sortedIDs);
									
					      	      	 			
	      	      	 
}

function contents() {
	 
	
	 
	
	   $.ajax({
	           url : "update_order.php",
	            method: "POST",
	             data  : {getcontent:1},

	             success : function(data){
					$('#sortable').html(data);
	             }
	          })
	   
	
	  
	    
}
contents();

  </script>


</head>
<body  style="background-color:#dde6f0;">
 <div class="innerBar"  style="position: fixed"></div>

 <p><br><br></p>

	<div class="container">
		
		
  
		
		<div id="titleform" style="font-weight: bolder; text-align: center; font-size:25px;cursor: default;"></div>
<h6  style=""><i class="fas fa-info-circle" style="color: grey"></i> Drag and drop the element to a specified location .</h6>

	<div class="row">
		<div class="col-sm-2">
		
		</div>
			<style type="text/css">
				
				#sectionparent::-webkit-scrollbar {
					  width: 12px;               /* width of the entire scrollbar */
					}
			</style>
		<div class="col-sm-8" id="sectionparent" style="background-color:#edf2f5">
		
					<br>
					 	
					 
					  	 <div >
					  	 
					  	 	 <div class="container">
					  	 	 	<?php  echo $_SESSION['sectioncard']; ?>   
					  	 	 </div> 
					  	 	 
					  	
                                 	
					  	 <div id="sortable" >
					  	 


 

 </div> 
  <div style="margin-top: 150px"></div> 
  


					  	 	
				
					 
		</div>
		</div>
		<div class="col-sm-2">
				  <div  style=" position:fixed;  border: 2px solid #89a5d9;background-color:white;margin-top: 60px;padding: 40px;border-radius: 10px">
				  
				 	<h5 style="text-align: center;padding: 5px; border-bottom: 1px solid #bc8b1c;cursor: default;">OPTIONS</h5>
				 	
						      
						      
						        <button class="dropdown-item " onclick="window.history.back()"><i class="far fa-check-circle"></i> Save and Exit</button>
						   
						    <hr style="color: #bc8b1c;height: 2px">
						    </div> 
						  
		</div>
	
	</div>

	 



 <script type="text/javascript">
 
 		$('.innerBar').animate({ width: "100%" }, 1000);      

 	
       	
 </script>
 
</body>
</html>

