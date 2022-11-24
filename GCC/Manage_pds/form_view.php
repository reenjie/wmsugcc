<?php 
session_start();
 include '../Classes/sql_query.php';
 
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
 <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

	 <style type="text/css">
	 @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@300&display=swap');
		*{
			font-family: 'Cairo', sans-serif;
		}
	 </style>
<style type="text/css">
	
	.innerBar {
	 background: #617298;
   height: 2px;
   width: 0%;
   z-index: 1;
	}
</style>
</head>
	<?php
						include '../create_form/connect.php';
						$csform = $_SESSION['view_form_id'];	
										$setcolor = " select * from `form_classification` where csform_id = '$csform'  ";
								                $setcolored = mysqli_query($con,$setcolor); // run query
								              
								                 while($getcolor = mysqli_fetch_array($setcolored)){
													$bodybg = $getcolor['bodybg'];
													$titlebg = $getcolor['titlebg'];
													$questionbg = $getcolor['questionbg'];
													$textcolortitle = $getcolor['textcolortitle'];
													$textcolorquestion = $getcolor['textcolorquestion'];
								    }
								          
		?>
<body style="background-color: <?php echo $bodybg ?>;">
	 
	   <div class="innerBar"  style="position: fixed"></div>
	<p><br></p>

	<div class="container">
		
		
  
		
		<div id="titleform" style="font-weight: bolder; text-align: center; font-size:25px;cursor: default;"></div>

	<div class="row">
		<div class="col-sm-2">
				 <button class="btn btn-light text-primary" onclick="window.location.href='../Manage_pds/'" style="font-size: 13px;position: fixed;"><i class="fas fa-arrow-left"></i> Manage Form</button>
		</div>
		<div class="col-sm-8">
		
					<br>
					 
					<?php 
					if(isset($_SESSION['sectionformactive'])) {


								if(isset($_GET['section'])){
									$id = $_GET['sectionid'];

									$sql = " select * from form where sec_no = '$id' and class_name ='$csform' order by display_order  ";
						                $result = mysqli_query($con,$sql); // run query
						               
						                 while($row = mysqli_fetch_array($result)){
										$formid = $row['form_id'];
									 	$dd = $row['type'];
									 	$isreq = $row['isrequired'];
									 	$status = $row['status'];
									 	$bgsrc = '../img/uploads/'.$row['bgimage'];
									 	$bgtcolor = $row['bgcolor'];
									 	$txttcolor = $row['txtcolor'];
									 	$yaxis = $row['yaxis'];
									 	$isvisible = $row['isvisible'];
									 	$secno = $row['sec_no'];
									 	$othersdata = $row['others'];
									 	$ismodifiable = $row['ismodifiable'];
									 	$isspecified = $row['isspecified'];
									 		if($yaxis == ''){
										 		$posbg = 'center';
										 	}else {
										 		$posbg = $yaxis.'px';

										 	}


										 	include 'sectionactive.php';




						                 }

						                

						                 $sf = "select * from form where type = 'section' and class_name ='$csform' and sec_no > '$id' limit 1 ";
						                 $rsf = mysqli_query($con,$sf);

						                 $countnumb= mysqli_num_rows($rsf);
						                 if($countnumb == 0){
						                 	?>
						                 	  <button class="btn btn-light  px-4" style="padding: 10px" onclick="history.back()">Back</button>
						                 	<button class="btn btn-primary ml-2  px-4 submit" style="margin-left: 10px;background-color: #4e73df;padding: 10px">Submit</button>
						                 	<?php
						                 }else {


										 while($rowsf = mysqli_fetch_array($rsf)){
						                 	$nextid= $rowsf['sec_no'];



						                 if ($id ==1 ){
						                 		
						                 	}else if ($id >= 2){
						                 		$temp = $nextid-2;

						                 		?>
						                 <button id="back" class="btn btn-secondary  px-4" style="background-color: #858796;padding: 10px" data-nid = "<?php echo $temp ?>">Back</button>
						                 		<?php
						                 	}


						                 	  ?>
						                 <button id="next" class="btn btn-primary  px-4" style="font-weight: bold;margin-left: 10px;background-color: #4e73df;padding: 10px" data-nid = "<?php echo $nextid ?>">Next </button>
						                 <?php

						                    }

						                     }



						                          
						                    ?>

						                     <div class="" style="position: fixed;top: 100px;left: 10px;text-align: center;">
						                     	 <div class=" card " style="padding: 2px;display: inline-flex">

						                     	 	
						                     	 	 	<?php 
						                     	   $progresscount = " select * from form where type = 'section' and class_name ='$csform'  ";
						                                     $reprogress = mysqli_query($con,$progresscount); 
																$kunta= mysqli_num_rows($reprogress);
						                                                  
						                                  
						                                      while($row = mysqli_fetch_array($reprogress)){
						                     				$curid = $row['sec_no'];

						                     				if($curid == $id){
						                     					$prog_ind[] = $curid;
						                     						?>
						                     				<button class="btn btn-primary pagjump" data-sec="<?php echo $curid ?>" style="font-size: 13px;border-radius: 50px"><?php  echo $row['sec_no']; ?></button>
						                     				<?php

						                     				}else if($curid < $id) {
						                     					$prog_count[] = $curid;
						                     					?>
						                     				<button class="btn btn-primary pagjump" data-sec="<?php echo $curid ?>" style="font-size: 13px;border-radius: 50px"><?php  echo $row['sec_no']; ?></button>
						                     				<?php
						                     				}else {
						                     				?>
						                     				<button class="btn btn-light pagjump" data-sec="<?php echo $curid ?>" style="font-size: 13px;border-radius: 50px"><?php  echo $row['sec_no']; ?></button>
						                     				<?php	
						                     				}


						                     			
						                                      }
				  function cal_percentage($num_amount, $num_total) {
                      $count1 = $num_amount / $num_total;
                      $count2 = $count1 * 100;
                      $count = number_format($count2, 0);
                      return $count;
                    }

                    if(isset($prog_ind)){
                    	$start = cal_percentage(count($prog_ind), $kunta);

                    		 ?>
                    <script type="text/javascript">
                    	
                    	$(document).ready(function() {
                    	     $('#pageprogress').attr('style','width:<?php  echo $start.'%' ?>') ;	
                    	      });      
                          	
                    </script>

                    <?php
                   

                    if(isset($prog_count)){
                    	$cprog =cal_percentage(count($prog_count), $kunta);
                    	
                    	$fprog =  $cprog+$start;
                    
                    	 ?>
                    <script type="text/javascript">
                    	
                    	$(document).ready(function() {
                    	     $('#pageprogress').attr('style','width:<?php  echo $fprog.'%' ?>') ;	
                    	      });      
                          	
                    </script>

                    <?php

                    }

                     }
                   

						                     	 ?>

						  <div class="progress  mt-1" style="height: 4px">
                  <div class="progress-bar bg-info progress-bar-striped " id="pageprogress" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                    <span class="sr-only"></span>
                  </div>
                </div>
						                     	 	
						                     	 	 
						                     	 </div> 
						                     	 
						                     	
						                     </div> 
						                     
						                    <script src="../../offline/sweetalert.js"></script>
						                    <script type="text/javascript">
						                    	
						                    	$(document).ready(function() {

						                    		$('.pagjump').click(function() { 
						                    			var section = $(this).data('sec');
						                    			
						                    			window.location.href="form_view.php?section&sectionid="+section;
						                    		
						                    		})
						                    	      		$('#next').click(function() { 
						                    	      			var nid = $(this).data('nid');
						                    	      			window.location.href="form_view.php?section&sectionid="+nid;
						                    	      		
						                    	      		})

						                    	      		$('#back').click(function() { 
						                    	      		var nid = $(this).data('nid');
						                    	      			window.location.href="form_view.php?section&sectionid="+nid;
						                    	      		})

						                    	      		$('.submit').click(function() { 
						                    	      		Swal.fire({
															  position: 'top-end',
															  icon: 'info',
															  title: 'For viewing only',
															  text : "This is the view for student takers",
															  showConfirmButton: false,
															  timer: 5000
															})
						                    	      		})
						                    	      });      
						                          	
						                    </script>

						                    <?php
									
								
						               

								}else {
									
									?>
									<script type="text/javascript">
										
										window.location.href="form_view.php?section&sectionid=1";      
									      	
									</script>
									<?php
									


								}
									

										
						          



				}else {
					?>

					<div id="content"></div> 
					<?php
				}
					 ?>

					  	 
					 <div style="margin-top: 150px;"></div> 
					 
		</div>
		<div class="col-sm-2">
				<!--  <div  style=" position:fixed; border: 2px solid #89a5d9;background-color:white;margin-top: 40px;padding: 40px;border-radius: 10px">
				  
				 	<h5 style="text-align: center;padding: 5px; border-bottom: 1px solid #bc8b1c;cursor: default;">OPTIONS</h5>
				 	<h6 style="color: grey;font-size: 12px;text-align: center;cursor: default;">ADD NEW</h6>
						 	 <a class="dropdown-item add" data-types='title' href="#"> <i class="fas fa-heading"></i> Title</a>
						 	
						      <button disabled=""    class="dropdown-item add quest " data-types='question' type="button" ><i class="far fa-question-circle"></i> Question</button>
						      <hr style="color: #bc8b1c;height: 2px;">
						      <h6 style="color: grey;font-size: 12px;text-align: center;cursor: default;">SORT</h6>
						       <button class="dropdown-item quest reorder"    disabled=""> <i class="fas fa-sort"></i> Re-Order </button>
						   
						    <hr style="color: #bc8b1c;height: 2px">
						    	<h6 style="color: grey;font-size: 12px;text-align: center;cursor: default;">Others</h6> 
						  		
						       <button onclick="window.location.href='../Manage_pds'" class="dropdown-item"    > <i class="fas fa-home"></i> Home </button>
						       
						    </div> -->
						  
		</div>
	</div>
	</div>
	<!-- Button trigger modal -->

 <script src="../../js/jquery.js"></script>
	
	<script>
	$(document).ready(function() {

	


		$('.innerBar').animate({ width: "100%" }, 1000);
		titleform();
		function titleform() {
			$.ajax({
			           url : "opt_pro.php",
			            method: "POST",
			             data  : {titleform:1},
			             success : function(data){
							
						$('#titleform').html(data);	
			             }
			          })

		}
	

		content();
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
	
	

			

	});
	</script>

</body>
</html>