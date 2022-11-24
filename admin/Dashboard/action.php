<?php 
session_start();
include '../../GCC/create_form/connect.php';

//Clear visitors
if(isset($_POST['clear'])){

	$delete_all_visitors = "DELETE FROM `client_ip` WHERE 1";
	mysqli_query($con,$delete_all_visitors);
	
}

//Visitors
if(isset($_POST['visitors'])){
   $get_all_visitors = "select * from client_ip  ";
   $getting_visitors = mysqli_query($con,$get_all_visitors); 
    $count= mysqli_num_rows($getting_visitors);
                                                             
     if($count >=1){
         while($row = mysqli_fetch_array($getting_visitors)){
                    ?>
<tr>
    <td><?php echo date('@h:i a F,j Y',strtotime($row['date_recorded'])) ?></td>
    <td>
        <h6 style="font-weight: bolder"> <?php echo $row['ipaddress'] ?></h6>
    </td>
</tr>
<?php             
                                                         }
                                                        
                                                     }else {
                                                        ?>
<tr>
    <td colspan="2">
        <h6 style="font-weight:bolder;text-align: center;">No Visitors yet.</h6>
    </td>
</tr>
<?php
                                                     }
                                                    
                                                         
                                                        
                                                     
}

 ?>