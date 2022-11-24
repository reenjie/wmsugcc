<?php 
session_start();
include '../create_form/connect.php';

 if(!isset($_SESSION['admingcc_token'])) {
    header("location:../../session_end.html");
  }
  
unset($_SESSION['dorder']);
unset($_SESSION['sectionset']);
unset($_SESSION['viewing_customforms']);
unset($_SESSION['studentform_toview']);
 ?>


<!DOCTYPE html>
<html>

<head>
	 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortout icon" type="image/x-icon" href="wmsu.png">
    <script src="https://kit.fontawesome.com/129b086bc9.js" crossorigin="anonymous"></script>
 
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/css2?family=Gruppo&family=Londrina+Solid:wght@300&display=swap" rel="stylesheet">



	
<title>WMSU Guidance and Counceling</title>
 <style type="text/css">
	 @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap');
		*{
			font-family: 'Cairo', sans-serif;
		}
	 </style>
<style type="text/css">
	
	header {
		width: 100%;
		height: 100px;
		background-color: #63a284;
		border-bottom: 5px solid #2b7aaa;
		cursor: default;
	
	}

	h1 {
		padding: 20px;
		float: right;
		text-shadow: 2px 2px #1a3b50;
		color: #62625d;
	}
	h3 {
		text-shadow: 1px 1px #1a3b50;
		cursor: default;

	}
	.action:hover{
		border: 2px solid #2b6c84;
	}
	.colored {
		height: 5px;
		background-color:#2b7aaa;
		width: 100%;
		z-index: 1;
		position: fixed;
		top: 0;
	}
	footer {

		border-top: 5px solid #2b7aaa;
	background-color: #63a284;
	
	position: relative;
	margin:auto;
	margin-top:100px;
	padding: 45px;
	left: 0;
	bottom: 0;
	width: 100%;
	height: 280px;
	cursor: default;

	}
	.wmsuimage {
		height: 120px;
		
	}
	#closebtn:hover {
		color: #9a2626;
	}
</style>
<script type="text/javascript">
	$(document).ready(function() {
		

	
	window.onscroll = function() {myFunction()};

var navbar = document.getElementById("sticknav");
var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
   $('#sticknav').addClass('colored');
  } else {
     $('#sticknav').removeClass('colored');
  }
} 

$('#add').click(function() { 
     $('.titletext').focus();
     }) 


     $('.managecontent').click(function() { 
      var csformid = $(this).data('csformid');
           
          
               
             var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
             if (this.readyState == 4 && this.status == 200) {
            const data = this.responseText;
          
          window.location.href= "../create_form";
                         }
                      };
              xhttp.open("POST", "form_session.php",true);
              xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
              xhttp.send("setedit=1&csformid="+csformid);
                  
                           
    }) 


  jQuery(document).ready(function() {
     jQuery("time.timeago").timeago();
      });
                                    
                                  
                             

 
   });   	
</script>
<script src="../include/assets/js/timelapse.js" type="text/javascript"></script>   
	<?php 
	include '../Classes/sql_query.php';
	$fetch = new sqlquery();
	 ?>
	  <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

	 <style type="text/css">
	 	body{
	 		 font-family: "Nunito", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
	 	}
	 </style>
</head>
<body style="background-color: #d8d5dd; " >
	 
	


		
		 		 <div class="container" style="padding-top: 30px;">

		 		 		<h5 style="text-align:center;font-weight: bold">
		 		 		UPDATES Summary
		 		 		</h5>
		 		 		<hr>
		 		 		<div class="card">


		 		 			<div class="card-body">

		 		 				<a href="../create_form" class="btn btn-light text-secondary mb-2"><i class="fas fa-arrow-left"></i></a> <br>

		 		 				<span class="text-primary" style="font-size:14px"> <i class="fas fa-info-circle"></i> Set on what Section or content the students will updates on their Respective Personal Data Sheets . <br> Below are table showing contents you have visited.Modified or click by accident.</span>

		 		 				<br>

		 		 				<span class="text-danger" style="font-size:14px">Deleted items will not be included in updates.</span>
		 		 	<div class="table-responsive">
		 		 			<table class="table table-striped table-sm">
						  <thead>
						    <tr>
						      <th scope="col">Date-Modified</th>
						      <th scope="col">Form-Content</th>
						      <th scope="col">Type</th>
						      <th scope="col">Action</th>
						    </tr>
						  </thead>
						  <tbody>
						   	<?php 
						   		$csform = $_SESSION['form_id'];
										$setcolor = " select * from `form_classification` where csform_id = '$csform'  ";
								                $setcolored = mysqli_query($con,$setcolor); // run query
								              
								                 while($getcolor = mysqli_fetch_array($setcolored)){
													$bodybg = $getcolor['bodybg'];
													$titlebg = $getcolor['titlebg'];
													$questionbg = $getcolor['questionbg'];
								                 }
								          
								$delete_notexisting = "DELETE FROM `updte_pages` WHERE formid not in (select form_id from form) ";
								mysqli_query($con,$delete_notexisting);

								//$delete_notexistings = "DELETE FROM `updte_pages` WHERE formid in (select form_id from form where type = 'list') ";
								//mysqli_query($con,$delete_notexistings);
 				
						   		$getpages = "SELECT * FROM `updte_pages` where formid in (select form_id from form) ";
						   		 $get_updated_pages = mysqli_query($con,$getpages); 
						   		 $count= mysqli_num_rows($get_updated_pages);
						   		 //$newlyinsertedid = mysqli_insert_id($con);
						   		if($count >=1){
						   	 while($row = mysqli_fetch_array($get_updated_pages)){
						   	 	$formid = $row['formid'];
						   			?>
						   			<tr>
						   				<td><?php echo date('F j,Y',strtotime($row['datecreated'])) ?></td>
						   					
						   					<?php 
						   						$getform_datas = "select * from form where form_id = '$formid'  ";
						   						 $getting_formdata = mysqli_query($con,$getform_datas); 
						   						
						   					 while($forms = mysqli_fetch_array($getting_formdata)){
						   							?>
						   							<td>
						   								<div class="card" style="border-right: 8px solid <?php echo $questionbg ?>; ">
						   									<div class="card-body">
						   										<div class="container">
						   											<?php echo $forms['content']; 


						   											if($forms['type'] == 'Question'){
						   												?>

						   											<div class="card">
						   												<div class="card-body"></div>
						   											</div>
						   												<?php
						   											}else if($forms['type'] == 'list'){
						   												?>
						   												<table class="table table-striped table-bordered">
																	  <thead>
																	    <tr>
																	      <th scope="col">....</th>
																	      <th scope="col">...</th>
																	      <th scope="col">...</th>
																	      <th scope="col">....</th>
																	    </tr>
																	  </thead>
																	  <tbody>
																	    <tr>
																	      <th scope="row">....</th>
																	      <td>....</td>
																	      <td>.....</td>
																	      <td>....</td>
																	    </tr>
																	 
																	  </tbody>
																	</table>
						   												<?php
						   											}



						   											?>


						   										</div>
						   										
						   										
						   									</div>
						   								</div>


						   							</td>
						   							<td><?php echo $forms['type'] ?></td>
						   							<?php				
						   						 }
						   					
						   					 

						   					 ?>

						   				<td>
						   					<button class="btn btn-light text-danger del" data-id="<?php echo $row['pageID'] ?>" style="border-radius: 20px"><i class="fas fa-times-circle"></i></button>

						   				</td>
						   			</tr>
						   			<?php				
						   		 }
						   	
						   	 }else {


						   	 	?>
						   	 	<tr>
						   	 		<td colspan="4">
						   	 			<h6 class="mt-2" style="text-align: center;">No Updates made yet.</h6>
						   	 		</td>

						   	 	</tr>
						   	 	<script type="text/javascript">
						   	 		  $(document).ready(function() {
						   	 		  	$('#proceed').addClass('d-none');
						   	 		
						   	 		  });
						   	 	</script>
						   	 	<?php
						   	 }


						   	 ?>
						   
						  </tbody>
						</table>
		 		 		</div>

		 		 		<button class="btn btn-primary" id="proceed" style="font-size:14px;float: right;">Confirm</button>
		 		 			</div>
		 		 		</div>
		 		 		

		 		 </div> 
		 		
		 		 
		 		  
		
		
		 	 <script src="../../js/jquery.js"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script type="text/javascript">
		
	  $(document).ready(function() {
	  	$('#proceed').click(function(){
	  			   $.ajax({
	                 url :'saveandexit.php',
	                  method: "POST",
	                   data  : {exitupdateonly:1,gc:1,stud:1},
	                   success : function(data){
	     window.location.href='../Manage_pds';
	     //	alert(data);
	                   }
	                })
		
	  	})
	  	$('.del').click(function(){
	  		var id = $(this).data('id');

	  				 $.ajax({
  		 url : "deleteupdate.php",
  		  method: "POST",
  		 data  : {del:1,id:id},
  		  success : function(data){

  	 Swal.fire(
      'Deleted!',
      'Updates has been deleted.',
      'success'
    ).then((result) => {
  if (result.isConfirmed) {
  	location.reload();
  }
})
  		   }
  		 })
	  			  		
	  	})
	
	  });
	      	
	</script>


	
	

	 
	 
</body>
</html>