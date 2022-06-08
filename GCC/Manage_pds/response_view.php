<?php 
session_start();
include '../create_form/connect.php';

	if(isset($_POST['response_content'])){ 

          $sql = " select * from temp_user ";
                      $result = mysqli_query($con,$sql); 
                      $count= mysqli_num_rows($result); 
                    
                   if ($count>=1){
                  
                       while($row = mysqli_fetch_array($result)){
                        $studentid = $row['userid'];
                        $fullname = $row['fname'].' '.$row['lname'].' '.$row['mname'];
                        $email = $row['email'];
                        $student_lname = $row['fname'];
                        $student_fname = $row['lname'];
                        $student_mname = $row['mname'];

                           $sqls = " select * from form_response where custom_user ='$studentid' and  custom = 1 ";
                                          $results = mysqli_query($con,$sqls); 
                                          $counts= mysqli_num_rows($results); 
                                       
                                       if ($counts>=1){
                                        
                                           while($rows = mysqli_fetch_array($results)){
                                         
                                          $respondedat = $rows['datecreated'];


                                               

                                         
                                           }
                                           
                                     
                                    }else {
                                     //echo 'no data';
                                    }



                                       $selectingnonstatic = " SELECT * FROM `form_classification` where static = 0  ";
                                                              $formnotstatic = mysqli_query($con,$selectingnonstatic); 
                                                              $countnonstatic= mysqli_num_rows($formnotstatic);
                                                             //  $get_id =  mysqli_insert_id($con); 
                                                           if ($countnonstatic>=1){
                                                          
                                                               while($gettingnotstatic = mysqli_fetch_array($formnotstatic)){
                                                               $csfid =  $gettingnotstatic['csform_id'];
                                                               $formnames = $gettingnotstatic['form_name'];

                                                                  ?>
     <div class="card shadow p-4 mb-3 bg-white rounded ele" data-role="recipe" style="border-left: 4px solid #57a95a">
                  
                  <div class="card-body">
                    <div class="container">
                      <div class="row">
                        <div class="col-sm-6">
                         

                           <h6 class="text-secondary txtname" > <?php echo $fullname ?>

                            <br>
                            <span style="font-size: 12px"><?php echo  $email ?></span>
                            <hr>
                            <span style="font-size: 12px;">Responded at :   <?php
                          echo $respondedat;

                          ?></span> 

                          </h6>
                         
                        </div>
                        <div class="col-sm-6" style="text-align: center;">
                           <div class="card shadow-sm  bg-white rounded">
                             <p></p>
                                <div class="container">
                                     
                          <h6 class="text-secondary" style="font-weight: bolder;">
                            <?php 
                            
                                $formname = " SELECT * FROM `form_classification` where csform_id = '$csfid' ";
                                            $resultform = mysqli_query($con,$formname); // run query
                                           
                                             while($rowget = mysqli_fetch_array($resultform)){
                                                echo $rowget['form_name'];
                                             }
                                      

                             ?>

                          </h6>
                          <span class="text-danger" style="font-size: 12px;">
                            Taken at :
                             <?php
                          echo $respondedat;

                          ?>


                          </span>
                          <p></p>
                          <button class="btn btn-warning preview"  data-csformid = "<?php echo $csfid ?>" data-studentid="<?php echo $studentid ?>" style="font-size: 12px;" data-studname = "<?php echo $student_lname.' '.$student_fname.' '.$student_mname.'.' ?>">Preview</button>

                           <button class="btn btn-info print"  data-csformid = "<?php echo $csfid ?>" data-formname="<?php echo $formnames ?>" data-studentid="<?php echo $studentid ?>" style="font-size: 12px;" data-studname = "<?php echo $student_lname.' '.$student_fname.' '.$student_mname.'.' ?>">Print</button>



                          <button class="btn btn-danger removeform" data-csformid = "<?php echo $csfid ?>" data-studentid="<?php echo $studentid ?>" style="font-size: 12px; ">Delete</button>
                                </div> 
                                
                             <p></p>
                           </div> 
                        
                        </div>
                      </div>
                      </div>

                  </div>


             </div>

             

    <?php
                                                              
                                                               }
                                                        }

      
                       }
                }
                         
       

                 ?>
                 <script src="../../js/jquery.js"></script>
                 
                 <script>
                 $(document).ready(function() {
                   $('.print').click(function() { 
                      var csformid = $(this).data('csformid');
                       var studentid = $(this).data('studentid');
                       var studname = $(this).data('studname');
                       var formname = $(this).data('formname');

                       window.location.href="print/?student-pds&pdstoken="+csformid+"&studenttokenid="+studentid;
                   
                   })
                 });
                 </script>

                 <?php  

                

		
	}

  if(isset($_POST['setsession'])){ 
    $csformid = $_POST['csformid'];
    $studentid = $_POST['studentid'];
    $studname = $_POST['studname'];
    $approve = $_POST['approve'];
    $toshift = $_POST['toshift'];
 $_SESSION['sectionformactivated']=1;
    if($approve == 1){
     
    $_SESSION['form_token_id_for_view']= $csformid ;
    $_SESSION['studentform_toview']= $studentid;
    $_SESSION['studentform_name'] =$studname;
    $_SESSION['toshiftcourse'] = $toshift;
   // $_SESSION['user_student_token_check'] = $studentid;
    $_SESSION['approve']=1;
    }else {
    $_SESSION['form_token_id_for_view']= $csformid ;
    $_SESSION['studentform_toview']= $studentid;
    $_SESSION['studentform_name'] =$studname;
   // $_SESSION['user_student_token_check'] = $studentid;
    }

 //   echo $csformid;
    $_SESSION['viewing_customforms'] = 1;
   
  }
 ?>
 <script type="text/javascript">
   
   $('.preview').click(function() { 
         var csformid = $(this).data('csformid');
         var studentid = $(this).data('studentid');
         var studname = $(this).data('studname');
        
       //  alert(csformid);
              
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                 if (this.readyState == 4 && this.status == 200) {
                const data = this.responseText;
              
                    window.location.href="../Responses/";

                
                   
              
                             }
                          };
                  xhttp.open("POST", "response_view.php",true);
                  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                  xhttp.send("setsession=1&csformid="+csformid+"&studentid="+studentid+"&studname="+studname);
                     
                               
         }) 

         $('.removeform').click(function() { 
           var csformid = $(this).data('csformid');
         var studentid = $(this).data('studentid');

                  Swal.fire({
                                    title: 'Delete Response?',
                                    text: "Are you sure you want to remove this? you cannot revert it.",
                                    icon: 'question',
                                    showCancelButton: true,
                                    confirmButtonColor: '#e74a3b',
                                    cancelButtonColor: '#f6c23e',
                                    confirmButtonText: 'Yes,Delete!'
                                  }).then((result) => {
                                    if (result.isConfirmed) {

                                       var xhttp = new XMLHttpRequest();
                          xhttp.onreadystatechange = function() {
                           if (this.readyState == 4 && this.status == 200) {
                          const data = this.responseText;
                        
                              Swal.fire(
                                  'Deleted!',
                                  'Your file has been deleted.',
                                  'success'
                                )
                                response_view();
                           
                        
                                       }
                                    };
                            xhttp.open("POST", "action.php",true);
                            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                            xhttp.send("removeresponse=1&csformid="+csformid+"&userid="+studentid);
                                    
                                   
                                  
                                    }
                                  }) 

              
              })    

               function response_view(){
     
         var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
         if (this.readyState == 4 && this.status == 200) {
        const data = this.responseText;
      
         $('.response-content').html(data);
         var size = $(".response-content > .ele").length;
        $('#numberofres').text(size);
                     }
                  };
          xhttp.open("POST", "response_view.php",true);
          xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          xhttp.send("response_content=1");
              
                       
     }
 
         
 </script>