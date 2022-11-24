		<form method="post" action="check.php" >
	<div class="  mb-5">

			
						<h4 style="font-weight:bolder;"><?php echo $url ?></h4>
						<hr>
						<?php 
						if(isset($_SESSION['success_saved'])){

							?>
							<script type="text/javascript" src="../offline/sweetalert.js">
								
							</script>
							<script type="text/javascript" src="../js/jquery.js"></script>
							<script type="text/javascript">
								  $(document).ready(function() {
								  	swal.fire(
								  		'Changes Saved!',
								  		'',
								  		'success'

								  		)
								
								  });
							</script>
							<?php
							unset($_SESSION['success_saved']);
						}


						 ?>

						 	
						

						
						<div class="row">
							<div class="col-md-12">
								
						  <?php 

							$fileo = fopen($url,"r+");

							if( filesize($url) >= 1){
								$filecontents = fread($fileo,filesize($url));
							}else {
								$filecontents = 'Empty';
							}

							

							
                               ?>
    							<pre><textarea name="filecontent" class="form-control" rows="50" style="width:100%; border:none;outline:none;font-size: 15px; resize: none; background-color: #eee7e6;"><?php echo $filecontents ?></textarea></pre>

							</div>
							
								<input type="hidden" name="file" value="<?php echo $url ?>">

									</div>


	</div>

			<div class="fixed-top">
				<button type="submit" name="savechanges" class="btn btn-primary" style="float: right; margin-right: 20px;margin-top: 20px;">Save Changes</button>
				<button type="button" class="btn btn-secondary" onclick="window.close()" style="float: right; margin-right: 5px;margin-top: 20px;">Close</button>
			</div>
			</form>
						


				
				