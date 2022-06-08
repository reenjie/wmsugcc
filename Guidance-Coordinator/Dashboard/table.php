<?php 
session_start();
include '../../GCC/create_form/connect.php';

if(isset($_POST['tableshiftto'])){
	$courseid = $_POST['courseid'];

          $getallcoursesto = "select * from course where courseid = '$courseid'  ";
                                            $gettingcoursesto = mysqli_query($con,$getallcoursesto); 
                                          
                                        while($row = mysqli_fetch_array($gettingcoursesto)){
                                            $cid = $row['courseid'];
                                            $cc = $row['course'];

                                        }

                                        
	?>
    <h4 style="font-weight:bold"><?php echo $cc; ?></h4>
		
	   <table class="table table-hover table-sm table-striped" id="tablestudentview">
    <thead>
    <tr class="table-info" id="headercolor">
     	<th scope="col">Action</th>
     	<th scope="col">Last-Record</th>
        <th scope="col">ID </th>
         <th scope="col">Lastname</th>
           <th scope="col">Firstname</th>
          <th scope="col">Middlename</th>
         <th scope="col">Email</th>
         <th scope="col">Gender</th>
    </tr>
  </thead>
  		<tbody >

  			<?php 
            /*
      $studentid = $row['stud_id'];
                          $student_lname = $row['stud_lname'];
                          $student_fname = $row['stud_fname'];
                          $student_mname = $row['stud_mname'];
                          $student_email = $row['stud_email'];
                         $studemail = substr($student_email, 0, strpos($student_email,'@'));
            */
  			 $collegeid = $_SESSION['gc_collegid'];

          
         


                              $shifting_to = "select * from shifting_history where to_ = '$collegeid' and status ='processing' or status = 'Approved'    ";
                                                     $gettinginfo_sto = mysqli_query($con,$shifting_to); 
                                                     $countingshifting_to= mysqli_num_rows($gettinginfo_sto);
                                                   
                                               
                                                 while($rowstos = mysqli_fetch_array($gettinginfo_sto)){
                                                    $datecreated = $rowstos['datecreated'];
                                                    $studid = $rowstos['stud_id'];

                $selectstudents = "select * from student where stud_id = '$studid' ";
                 $getstudentsdata = mysqli_query($con,$selectstudents); 
                
             while($row = mysqli_fetch_array($getstudentsdata)){
                 $studentid = $row['stud_id'];
                          $student_lname = $row['stud_lname'];
                          $student_fname = $row['stud_fname'];
                          $student_mname = $row['stud_mname'];
                          $student_email = $row['stud_email'];
                         $studemail = substr($student_email, 0, strpos($student_email,'@'));
                         $gender = $row['gender'];
                                   
                        
                 }
                                                    

                        ?>
                    <tr>
                            
                            <td><a href="../Shifting-Records/student_record.php?id=<?php echo $studentid ?>" target="_blank" class="btn btn-link" style="font-size:13px">View History</a></td>
                            <td><?php echo date('F j,Y',strtotime($datecreated)) ?></td>
                            <td><span style="font-weight:bolder"><?php echo $studemail ?></span></td>
                            <td><?php echo $student_lname ?></td>
                            <td><?php echo $student_fname ?></td>
                            <td><?php echo $student_mname ?></td>
                            <td><?php echo $student_email ?></td>
                            <td><?php echo $gender ?></td>

                    </tr>
                    <?php             
                                                     }

  		

  		
  			
  			 
		
  			 ?>	


  		</tbody>
</table>

  <script src="../../js/jquery.js"></script>
                         
                              <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.3/b-2.0.1/rr-1.2.8/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.3/b-2.0.1/rr-1.2.8/datatables.min.js"></script>
                            <script type="text/javascript">
                            	  $(document).ready(function() {
                            	  	
                          let tableview = new DataTable('#tablestudentview', {
      
                         "search": {
                        "caseInsensitive": false
                      }

                    });
                            	
                            	  });
                            	</script>
	<?php
}

if(isset($_POST['tableshiftfrom'])){
	$courseid = $_POST['courseid'];
  $getallcoursesto = "select * from course where courseid = '$courseid'  ";
                                            $gettingcoursesto = mysqli_query($con,$getallcoursesto); 
                                          
                                        while($row = mysqli_fetch_array($gettingcoursesto)){
                                            $cid = $row['courseid'];
                                            $cc = $row['course'];

                                        }


                                        
    ?>
    <h4 style="font-weight:bold"><?php echo $cc; ?> </h4>
        
       <table class="table table-hover table-sm table-striped" id="tablestudentview">
    <thead>
    <tr class="table-info" id="headercolor">
        <th scope="col">Action</th>
        <th scope="col">Last-Record</th>
        <th scope="col">ID </th>
         <th scope="col">Lastname</th>
           <th scope="col">Firstname</th>
          <th scope="col">Middlename</th>
         <th scope="col">Email</th>
         <th scope="col">Gender</th>
    </tr>
  </thead>
        <tbody >

      <?php 
            /*
      $studentid = $row['stud_id'];
                          $student_lname = $row['stud_lname'];
                          $student_fname = $row['stud_fname'];
                          $student_mname = $row['stud_mname'];
                          $student_email = $row['stud_email'];
                         $studemail = substr($student_email, 0, strpos($student_email,'@'));
            */
             $collegeid = $_SESSION['gc_collegid'];

          
         


                              $shifting_to = "select * from shifting_history where from_ = '$collegeid' and status ='processing' or status = 'Approved'    ";
                                                     $gettinginfo_sto = mysqli_query($con,$shifting_to); 
                                                     $countingshifting_to= mysqli_num_rows($gettinginfo_sto);
                                                   
                                               
                                                 while($rowstos = mysqli_fetch_array($gettinginfo_sto)){
                                                    $datecreated = $rowstos['datecreated'];
                                                    $studid = $rowstos['stud_id'];

                $selectstudents = "select * from student where stud_id = '$studid' ";
                 $getstudentsdata = mysqli_query($con,$selectstudents); 
                
             while($row = mysqli_fetch_array($getstudentsdata)){
                 $studentid = $row['stud_id'];
                          $student_lname = $row['stud_lname'];
                          $student_fname = $row['stud_fname'];
                          $student_mname = $row['stud_mname'];
                          $student_email = $row['stud_email'];
                         $studemail = substr($student_email, 0, strpos($student_email,'@'));
                         $gender = $row['gender'];
                                   
                        
                 }
                                                    

                        ?>
                    <tr>
                            
                            <td><a href="../Shifting-Records/student_record.php?id=<?php echo $studentid ?>" target="_blank" class="btn btn-link" style="font-size:13px">View History</a></td>
                            <td><?php echo date('F j,Y',strtotime($datecreated)) ?></td>
                            <td><span style="font-weight:bolder"><?php echo $studemail ?></span></td>
                            <td><?php echo $student_lname ?></td>
                            <td><?php echo $student_fname ?></td>
                            <td><?php echo $student_mname ?></td>
                            <td><?php echo $student_email ?></td>
                            <td><?php echo $gender ?></td>

                    </tr>
                    <?php             
                                                     }

        

        
            
             
        
             ?> 


        </tbody>
</table>

   <script src="../../js/jquery.js"></script>
                         
                              <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.3/b-2.0.1/rr-1.2.8/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.3/b-2.0.1/rr-1.2.8/datatables.min.js"></script>
                            <script type="text/javascript">
                                  $(document).ready(function() {
                                    
                          let tableview = new DataTable('#tablestudentview', {
      
                         "search": {
                        "caseInsensitive": false
                      }

                    });
                                
                                  });
                                </script>
    <?php
}



 ?>