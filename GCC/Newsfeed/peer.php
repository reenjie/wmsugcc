<?php 
include '../create_form/connect.php';

	if(isset($_POST['contentfornewsfeedpeer'])){ 
		
				$sql = " SELECT * FROM `peer_facilitator` ";
		                $result = mysqli_query($con,$sql); 
		                $count= mysqli_num_rows($result); 
		            
		             if ($count>=1){
		             
		                 while($row = mysqli_fetch_array($result)){
							$img = $row['photo'];
			                 	if($img == ''){
			                 		$imgsrc = '../img/undraw_profile_pic_ic5t.png';
			                 	}else {
			                 		$imgsrc = '../img/uploads/'.$img;
			                 	}
								?>
								<div class="card shadow mb-4" style="border-top: 1px solid #11be85;border-bottom: 1px solid #11be85">
										 <div class="row">
									
										 <div class="col-md-2">
										 	 <span class="bg-success" style="font-size: 12px;padding: 5px; background-color: green;color: white;user-select: none">Facilitator</span>
										 </div>
										</div> 
									 
                                   		 		 <div class="card-body" >
                                   		 <div class="row">
                                   		 	
                                   		 	<div class="col-md-4">
                                   		 		<img src="<?php echo $imgsrc ?>"  style="width: 120px;height: 120px;" class="img-thumbnail">
                                   		 	</div>


                                   		 	<div class="col-md-8">
                                   		 		
                                   		 		
                                   		 		<h6 style="font-weight: bolder"><?php echo $row['lname'] ?> , <?php echo $row['gname'] ?>  <?php echo $row['mname'] ?>. <?php echo $row['extname'] ?></h6>
                                   		 		
                                   		 		<h6 style="font-size: 14px">
                                   		 			<?php echo $row['email'] ?>
                                   		 			<br>
                                   		 			<hr>
                                   		 			Major in :
                                   		 			<span style="font-size: 15px; "><?php echo $row['major'] ?></span> <br>
                                   		 			Year in School : <span style="font-size: 15px; "><?php echo $row['yearinschool'] ?> years</span>

                                   		 		</h6>


                                   		 		<br>
                                   		 		
                                   		 		<button class="delpeer" data-pid="<?php echo $row['pf_id'] ?>"   style="outline: none;border: none;float: right; margin-left: 5px;"><i class="far fa-trash-alt text-gray-800"></i></button>

                                   		 		<button  class="editpeer" data-toggle="modal" data-target="#editpeermodal" data-backdrop="static" data-keyboard="false"  style="outline: none;border: none;float: right; margin-left: 5px;" data-ln="<?php echo $row['lname'] ?>" data-gn="<?php echo $row['gname'] ?>" data-mn="<?php echo $row['mname'] ?>" data-em="<?php echo $row['email'] ?>" data-major="<?php echo $row['major'] ?>" data-yrschool="<?php echo $row['yearinschool'] ?>" data-pic="<?php echo $imgsrc ?>" data-ext="<?php echo $row['extname'] ?>" data-pid="<?php echo $row['pf_id'] ?>" ><i class="far fa-edit text-gray-800"></i></button>


                                   		 	</div>
                                   		 </div>		 	
                                   		 	
                                  
                                   		 		 </div>
                                   		 </div> 
                                   		 <?php

		                 }


		          }else {
		          ?>
			          	 <div class="" style="text-align: center;">
			          	 
			          	 <img src="../img/undraw_empty_street_sfxm.png" class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 30rem;">
			          	<h6>There was no facilitator yet.</h6>
			          	 </div> 
			          	<?php
		          }


	}
	if(isset($_POST['peertrigger'])){ 
		 
		 $em = $_POST['em'];
		 $ln = $_POST['ln'];
		 $fn = $_POST['fn'];
		 $mi = $_POST['mi'];
		 $ext = $_POST['ext'];
		 $major = $_POST['major'];
		 $year = $_POST['year'];
		 $peertrigger = $_POST['peertrigger'];

		 if($peertrigger == 'noimage'){
		 		
		 				$sql = " INSERT INTO `peer_facilitator`(`email`, `lname`, `gname`, `mname`,`extname`, `major`, `yearinschool`) VALUES ('$em','$ln','$fn','$mi','$ext','$major','$year') ";
		 			                $result = mysqli_query($con,$sql); // run query
		 			               


		 }else {
		 	foreach($_FILES['imagespeer']['name'] as $key=>$val){
                  $image_name = $_FILES['imagespeer']['name'][$key];
                   $tmp_name   = $_FILES['imagespeer']['tmp_name'][$key];
                $size       = $_FILES['imagespeer']['size'][$key];
                 $type       = $_FILES['imagespeer']['type'][$key];
                 $error      = $_FILES['imagespeer']['error'][$key];
                                                                                                                                    
             
                                                                                                                                    
           $fileName =basename($_FILES['imagespeer']['name'][$key]);
                 $rand = rand(100,1000);                                                                                                                   
            $pname = $rand.'Photo'.'_'.$fileName;
                // File upload path
            $uploads_dir = '../img/uploads';
         move_uploaded_file($tmp_name , $uploads_dir .'/'.$pname);
                	
         		$sql = " INSERT INTO `peer_facilitator`(`email`, `lname`, `gname`, `mname`,`extname`, `major`, `yearinschool`,`photo`) VALUES ('$em','$ln','$fn','$mi','$ext','$major','$year','$pname') ";
		 			                $result = mysqli_query($con,$sql); // run query
                                                                                                                            
         
            }


		 }

		 //echo $em.$ln.$fn.$mi.$ext.$major.$year;
			


		
	}

	if(isset($_POST['peertriggeredit'])){ 
		 $em = $_POST['emedit'];
		 $ln = $_POST['lnedit'];
		 $fn = $_POST['fnedit'];
		 $mi = $_POST['miedit'];
		 $ext = $_POST['extedit'];
		 $major = $_POST['majoredit'];
		 $year = $_POST['yearedit'];
		 $peertrigger = $_POST['peertriggeredit'];
		 $id = $_POST['pid'];

		  if($peertrigger == 'noimage'){
		 		
		 				$sql = "UPDATE `peer_facilitator` SET `email`='$em',`lname`='$ln',`gname`='$fn',`mname`='$mi',`extname`='$ext',`major`='$major',`yearinschool`='$year' WHERE pf_id = '$id' ";
		 			                $result = mysqli_query($con,$sql); 
		 			               
		 			                

		 }else {
		 		$unlinking = " select * from `peer_facilitator` where pf_id = '$id'   ";
  			                $resultunlinking = mysqli_query($con,$unlinking); // run query
  			                
  			                 while($row = mysqli_fetch_array($resultunlinking)){
  							$img = $row['photo'];
  			                 }

  			                $dir = '../img/uploads/'.$img;
  			                unlink($dir); 


		 	foreach($_FILES['imagespeeredit']['name'] as $key=>$val){
                  $image_name = $_FILES['imagespeeredit']['name'][$key];
                   $tmp_name   = $_FILES['imagespeeredit']['tmp_name'][$key];
                $size       = $_FILES['imagespeeredit']['size'][$key];
                 $type       = $_FILES['imagespeeredit']['type'][$key];
                 $error      = $_FILES['imagespeeredit']['error'][$key];
                                                                                                                                    
             
                                                                                                                                    
           $fileName =basename($_FILES['imagespeeredit']['name'][$key]);
                 $rand = rand(100,1000);                                                                                                                   
            $pname = $rand.'Photo'.'_'.$fileName;
                // File upload path
            $uploads_dir = '../img/uploads';
         move_uploaded_file($tmp_name , $uploads_dir .'/'.$pname);
                	
         	$sql = "UPDATE `peer_facilitator` SET `email`='$em',`lname`='$ln',`gname`='$fn',`mname`='$mi',`extname`='$ext',`major`='$major',`yearinschool`='$year',`photo`='$pname' WHERE pf_id = '$id' ";
		 			                $result = mysqli_query($con,$sql); 
                                                                                                                          
         
            }



		 }
		
	}

	if(isset($_POST['deletepeer'])){ 
		$id = $_POST['id'];
			$unlinking = " select * from `peer_facilitator` where pf_id = '$id'   ";
  			                $resultunlinking = mysqli_query($con,$unlinking); // run query
  			                
  			                 while($row = mysqli_fetch_array($resultunlinking)){
  							$img = $row['photo'];
  			                 }

  			                $dir = '../img/uploads/'.$img;
  			                unlink($dir); 
				$sql = " DELETE FROM `peer_facilitator` WHERE pf_id = '$id'  ";
		                $result = mysqli_query($con,$sql); 
		        
	}

 ?>
 <script type="text/javascript">
 	
 $('.delpeer').click(function() { 
 	var pid = $(this).data('pid');
   		Swal.fire({
			  title: 'Are you sure?',
			  text: "You won't be able to revert this!",
			  icon: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Yes, delete it!'
			}).then((result) => {
			  if (result.isConfirmed) {
			   
			  	

			  	
			  	
			  	   $.ajax({
			  	           url : "peer.php",
			  	            method: "POST",
			  	             data  : {deletepeer:1,id:pid},
			  	             success : function(data){
			  		peercontents ();
			  		 Swal.fire(
			      'Deleted!',
			      'Event has been deleted.',
			      'success'
			    )
			  	             }
			  	          })
			  	   
			  	    
                                   			

			  


			  }
			})

   })   
 $('.editpeer').click(function() { 
 	
 	var ln = $(this).data('ln');
 	var gn = $(this).data('gn');
 	var mn = $(this).data('mn');
 	var em = $(this).data('em');
 	var major = $(this).data('major');
 	var yrschool = $(this).data('yrschool');
 	var pic = $(this).data('pic');
 	var ext = $(this).data('ext');
 	var id =$(this).data('pid');
 	
 	$('#configimagepeeredit').attr('src',pic);
 	$('#emedit').val(em);
 	 
 	  $('#lnedit').val(ln);
 	  $('#fnedit').val(gn);
 	  $('#miedit').val(mn);
 	  $('#extedit').val(ext);
 	  $('#majoredit').val(major);
 	  $('#yearedit').val(yrschool);
 	  $('#pfid').val(id);
 
 })

    function peercontents (){
                                                  
                                                   var xhttp = new XMLHttpRequest();
                                                  xhttp.onreadystatechange = function() {
                                                   if (this.readyState == 4 && this.status == 200) {
                                                  const data = this.responseText;
                                                
                                                    // Your condition here if data success.
                                                  $('#contentss').html(data);
                                                               }
                                                            };
                                                    xhttp.open("POST", "peer.php",true);
                                                    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                                                    xhttp.send("contentfornewsfeedpeer=1");
                                                        
                                                                 
                           }      


       	
 </script>