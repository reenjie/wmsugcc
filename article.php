
<?php 
					$article = "SELECT * FROM `newsfeed` ";
			                $resultart = mysqli_query($con,$article); // run query
			                $countart= mysqli_num_rows($resultart); // to count if necessary
			               //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
			             if ($countart>=1){
			             	//while($row = mysqli_fetch_array($result)){} is where we output all the data in database
			                 while($row = mysqli_fetch_array($resultart)){
			                 	$nfimg = $row['picture'];

			                 	if($nfimg == ''){
			                 				$src = 'GCC/img/uploads/noimage.png';
			                 	}else {
			                 			$src = 'GCC/img/uploads/'.$row['picture'];
			                 	}
			                 
								?>

					<div class="card">
				  <div class="card-body">
				     <div class="row">
				     	 <div class="col-sm-4" style="text-align: center;">
				     	 	<img src="<?php echo $src ?>" class="img-thumbnail" style="width: 140px;height: 150px">
				     	 </div> 
				     	  <div class="col-sm-8">
				     	  	<span style="font-weight: bold;"><?php echo $row['title'] ?></span>
				     	  	<br>
				     	  	<span style="font-size: 13px"><?php echo $row['content'] ?>
				     	  	</span>

				     	  	<a href="<?php echo $row['link'] ?>"><?php echo $row['link'] ?></a>
				     	  </div> 
				     	 
				     </div> 
				    	 	
				  </div>
				</div>


								<?php



			                 }
			          }

 ?>
	 	 		
				