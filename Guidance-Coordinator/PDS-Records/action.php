<?php 
session_start();
include '../../GCC/create_form/connect.php';
 include '../encrypt/sfgcc.php';
    $enc =  new encryptdata();
if(isset($_POST['toview'])){ 
	$check = $_POST['check'];
	if($check == ''){
		header('location:../PDS-Records');
		$_SESSION['noselected'] = 1;
	}else {

		foreach($check as $id){
		 $formid = $enc -> encryption("62","gccformtoken"); 
         $studentids = $enc -> encryption($id,"gccstudenttoken");


		?>
		<script type="text/javascript">
			
			window.open('view.php?student-pds&pdstoken=<?php echo $formid?>&studenttokenid=<?php echo $studentids ?>');  
		      	setInterval(function(){
		      		window.location.href="../PDS-Records";
		      	},1300);
		</script>
		<?php
	}
		

	}

		
	
	

}

if(isset($_POST['toprint'])){ 
	
		$check = $_POST['check'];
  if($check == ''){
    header('location:../PDS-Records');
    $_SESSION['noselected'] = 1;
  }else {

    foreach($check as $id){
     $formid = $enc -> encryption("62","gccformtoken"); 
         $studentids = $enc -> encryption($id,"gccstudenttoken");


    ?>
    <script type="text/javascript">
      
      window.open('print.php?student-pds&pdstoken=<?php echo $formid?>&studenttokenid=<?php echo $studentids ?>');  
            setInterval(function(){
              window.location.href="../PDS-Records";
            },1300);
    </script>
    <?php
  }

	}

		
	
	

}

if(isset($_POST['tabledatapds'])){ 

	$studentid = $_POST['studentid'];
  

	?>
<table class="table  table-sm">
                                  <thead>
                                    <tr class="table-success"> 
                                  
                                      <th scope="col">Updated Contents</th>
                                       <th scope="col">Date</th>
                                    </tr>
                                  </thead>
                                  <tbody>

                                  	<?php 
                              $notify = " SELECT * FROM `notification` where type='notification' and studenttaker_id='$studentid' and status ='unread' and formid='62' ";
                              $resultnot = mysqli_query($con,$notify); // run query
                              $countnot= mysqli_num_rows($resultnot); // to count if necessary
                              while($notif = mysqli_fetch_array($resultnot)){ 
                                $petsanotifica = $notif['date_notified'];
                                ?>
                                 <tr>
                                    
                                      <td><span style="font-style: italic;"><?php echo  str_replace(',', ' <br>', ''.$notif['creplaced_details']) ?></span></td>
                                      <td><?php echo date('Y-m-d',strtotime($petsanotifica)) ?></td>
                                     
                                    </tr>
                                <?php
                              }

                                  	 ?>
                                   
                                   
                                  </tbody>
                                </table>
	<?php
	
}

if(isset($_POST['tabledatapdsread'])){ 

	$studentid = $_POST['studentid'];



	?>
<table class="table  table-sm">
                                  <thead>
                                    <tr class="table-success"> 
                                      <th scope="col">Replaced Contents</th>
                                      <th scope="col">Updated Contents</th>
                                       <th scope="col">Date</th>
                                    </tr>
                                  </thead>
                                  <tbody>

                                  	<?php 
                              $notify = " SELECT * FROM `notification` where type='notification' and studenttaker_id='$studentid' and status ='read' and formid='62' ";
                              $resultnot = mysqli_query($con,$notify); // run query
                              $countnot= mysqli_num_rows($resultnot); // to count if necessary

                              if($countnot >=1){


                              while($notif = mysqli_fetch_array($resultnot)){ 
                                $petsanotifica = $notif['date_notified'];

                                 if($notif['ccontent'] == 'PDS Filled up'){
                                  ?>
                                   <tr class="table-primary">

                                      <td colspan="2" style="text-align: center;font-weight: bold;"><?php echo  str_replace(',', ' <br>', ''.$notif['ccontent']) ?></td>
                                     
                                      <td><?php echo date('Y-m-d',strtotime($petsanotifica)) ?></td>
                                     
                                    </tr>
                                  <?php
                                }else {


                                ?>
                                 <tr>

                                      <th scope="row"><?php echo  str_replace(',', ' <br>', ''.$notif['cdetails']) ?></th>
                                      <td><span style="font-style: italic;"><?php echo  str_replace(',', ' <br>', ''.$notif['creplaced_details']) ?></span></td>
                                      <td><?php echo date('Y-m-d',strtotime($petsanotifica)) ?></td>
                                     
                                    </tr>
                                <?php

                                }
                              }
                          }else {
                          	?>
                          	<tr style="text-align: center;">
                          		<td colspan="3"><span style="">No Modification History Yet..</span></td>
                          	</tr>
                          	<?php
                          }

                                  	 ?>
                                   
                                   
                                  </tbody>
                                </table>
	<?php
	
}
if(isset($_POST['setread'])){ 
	$id = $_POST['id'];
	$sql = "UPDATE `notification` SET `status`='read' WHERE type='notification' and studenttaker_id='$id' and status ='unread' and formid='62' and action != 'pdsgetrequest'  ";
  	 $result = mysqli_query($con,$sql); 
  	
}

if(isset($_POST['Notifustud'])){ 
      $check = $_POST['check'];
  if($check == ''){
    header('location:../PDS-Records');
    $_SESSION['noselected'] = 1;
  }else {

   // foreach($check as $id){
     /*$formid = $enc -> encryption("62","gccformtoken"); 
         $studentids = $enc -> encryption($id,"gccstudenttoken");


    ?>
    <script type="text/javascript">
      
      window.open('print.php?student-pds&pdstoken=<?php echo $formid?>&studenttokenid=<?php echo $studentids ?>');  
            setInterval(function(){
              window.location.href="../PDS-Records";
            },1300);
    </script>
    <?php */


 // }

 // for($i=0; $i <count($check); $i++){
   
  

   
  //}
    ?>
    <form method="get" action="../PDS-Records/">

    <?php

foreach ($check as $key => $value) {

  


?>
 
                        


  <input type="hidden" name="sid[]" value="<?php echo $value ?>">

 

<?php


}
  ?>
  <input type="submit" name="notifystudents" id="click" style="display: none">

    </form>
 <script src="../../js/jquery.js"></script>
    
    

     <script type="text/javascript">

   
   $(document).ready(function() {
          $('#click').click();
         });      
         
 </script>
    <?php

  }

}

if(isset($_POST['sendnotify'])){ 
  $studid = $_POST['studid'];
  $message = $_POST['message'];
              ?>
              <!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
       <!--<link rel="shortout icon" type="image/x-icon" href="">--> <!---->
        <script src="https://kit.fontawesome.com/129b086bc9.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<title>SENDING </title>
</head>
<body style="background-color: #bdf9ca">

  <h6>Sending Message <i class="fas fa-spinner fa-pulse"></i></h6>

</body>
</html>

                     <form method="post" action="mail/sendnotif.php">
                     
                    <?php
  foreach ($studid as $key => $value) {

   
    
        $sql = " select * from student where stud_id = '$value' ";
                    $result = mysqli_query($con,$sql); // run query
                    
                   

                     while($row = mysqli_fetch_array($result)){
            $email = $row['stud_email'];


                ?>
                <input type="hidden" name="emails[]" value="<?php echo $email  ?>">
                <?php
                     }

                   
              

  }
    ?>
                      <input type="hidden" name="mensahe" value="<?php echo $message ?>">
                     <input type="submit" name="sendmessage" id="sendmessage" style="display: none">
                      </form>
                     <script src="../../js/jquery.js"></script>
                      
                       <script type="text/javascript">

                    
                    $(document).ready(function() {
                          $('#sendmessage').click();
                        });    
                       
                      </script>
                     <?php

}
 ?>