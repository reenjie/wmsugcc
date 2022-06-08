<?php 

	//echo $_SESSION['sectionset'];
										$setcolor = " select * from `form_classification` where csform_id = '$csform'  ";
								                $setcolored = mysqli_query($con,$setcolor); // run query
								              
								                 while($getcolor = mysqli_fetch_array($setcolored)){
													$bodybg = $getcolor['bodybg'];
													$titlebg = $getcolor['titlebg'];
													$questionbg = $getcolor['questionbg'];
								                 }
								          
								
 ?>
<p></p>
	
<ul class="nav nav-tabs">
  <li class="nav-item " >
    <a class="nav-link active text-primary" id="section<?php echo $row['form_id'] ?>" style="font-size: 14px;font-weight: bold; cursor: default;" href="#">Section <?php echo $secno ?></a>

  </li>
 
</ul>
	 <div class="card " id="section<?php echo $row['form_id'] ?>" style="border-top: 5px solid <?php echo $questionbg ?>; padding: 20px">
	 	 
	 	
	 	 <div class="card-body">
	 	 	<h4 style="font-weight: bolder"><?php echo $row['content']; ?></h4>
	 	 	<?php 
	 	 		if($othersdata == 'Other supporting contents'){
	 	 			
	 	 		}else {
	 	 			
	 	 			echo '<h6>'.$row['others'].'</h6>';


	 	 		}

	 	 	 ?>

	 	 </div> 

	 	 <i style="  color: grey;text-align: center;cursor: pointer;padding-top:10px; "   data-formid="<?php echo $row['form_id'] ?>" class="far fa-edit qcard"></i>
	 	 
	 </div> 
	 <p></p>