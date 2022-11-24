<?php 
session_start();
 if(!isset( $_SESSION['admin_token'] )){
  //
 }
include '../../GCC/create_form/connect.php';
  if(isset($_GET['id'])){

                                $id = $_GET['id'];
                                    $getuserda = "select * from student where stud_id='$id'  ";
                                     $datauser = mysqli_query($con,$getuserda); 
                                    
                                 while($row = mysqli_fetch_array($datauser)){
                                      $student_lname = $row['stud_lname'];
                                          $student_fname = $row['stud_fname'];
                                          $student_mname = $row['stud_mname'];
                                          $student_email = $row['stud_email'];
                                       $student_Fullname = $student_lname.' '.$student_fname.' '.$student_mname;               
                                     }
                                
                                 
}

 ?>
<!DOCTYPE html>
<html lang="en">


 <?php
  include '../include/assets/head.php';
 
 ?>
<style type="text/css">
   @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap');
    *{
      font-family: 'Cairo', sans-serif;
    }
        @media screen and (max-width: 768px){
      #college{
        font-size: 14px;
      } 
      #title {
        font-size: 20px;
      } 
    }
</style>

<body id="page-top" >

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!--sidebar-->
         
        <?php include '../include/assets/sidebar.php' ?>
        <!--end of sidebar-->


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                    <!--topbar-->
            <?php  include '../include/assets/topbar.php';?>
                    <!--end of topbar-->


<style type="text/css">
   {

  }
                                #contentss::-webkit-scrollbar  {
                                      width: 3px;

                                    }

                                    /* Track */
                                    #contentss::-webkit-scrollbar-track {
                                      background:#d7faed; 
                                    }
                                     
                                    /* Handle */
                                    #contentss::-webkit-scrollbar-thumb {
                                      background: #298a67; 
                                    }

                                    /* Handle on hover */
                                    #contentss::-webkit-scrollbar-thumb:hover {
                                      background: #30936f; 
                                    }
</style>




                <!-- Begin Page Content -->
                <div class="container-fluid" >
                     <span class="text-gray-800" style="font-weight: bold;" id="tryfound"></span>
                     <div class="advancecontent_search row d-none" id="content_search" data-role="searchfor"> </div> 
                    
                      <div class="051715" id="051715"> 
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 id="title" class="h3 mb-0 text-gray-800"><span class="text-primary"><?php echo  $student_Fullname ?> *</span> Shifting Records</h1>
                        <!--<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
                    </div>

                      <?php 
                                  if(isset($_SESSION['act'])){
                                    ?>
                                <div class="alert alert-success" id="alerto" role="alert">
                                 E-Signature Saved.
                                </div>
                                 <script type="text/javascript">
        
                                        var times = setInterval(function() {
                                          document.getElementById("alerto").classList.add("d-none");
                                           clear();
                                        },3000);

                                        function clear() {
                                          clearInterval(times);
                                        }     
                                              
                                      </script>

                                    <?php

                                    unset($_SESSION['act']);
                                  }


                                   ?>
                    <style type="text/css">
                       @import url('https://fonts.googleapis.com/css2?family=Titillium+Web:wght@300&display=swap');
                        #pdstable {
                            font-size: 14px;
                           font-family: 'Titillium Web', sans-serif;
                        }
                        #searchfilter{
                            font-size: 13px;
                             font-family: 'Titillium Web', sans-serif;
                             width: 240px;
                            
                             right: 10px;
                             position: relative;
                             float: right;


                        }
                        #nod {
                         font-size: 15px;
                         
                         font-family: 'Titillium Web', sans-serif;
                       


                        }
                        #errornotfound{
                           font-size: 15px;
                         
                         font-family: 'Titillium Web', sans-serif;
                        color: red;
                        }
                        .ribbon-wrapper {
  height: 70px;
  overflow: hidden;
  position: absolute;
  right: -2px;
  top: -2px;
  width: 70px;
  z-index: 10;
}

.ribbon-wrapper.ribbon-lg {
  height: 120px;
  width: 120px;
}

.ribbon-wrapper.ribbon-lg .ribbon {
  right: 0;
  top: 26px;
  width: 160px;
}

.ribbon-wrapper.ribbon-xl {
  height: 180px;
  width: 180px;
}

.ribbon-wrapper.ribbon-xl .ribbon {
  right: 4px;
  top: 47px;
  width: 240px;
}

.ribbon-wrapper .ribbon {
  box-shadow: 0 0 3px rgba(0, 0, 0, 0.3);
  font-size: 0.8rem;
  line-height: 100%;
  padding: 0.375rem 0;
  position: relative;
  right: -2px;
  text-align: center;
  text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.4);
  text-transform: uppercase;
  top: 10px;
  -webkit-transform: rotate(45deg);
  transform: rotate(45deg);
  width: 90px;
}

.ribbon-wrapper .ribbon::before, .ribbon-wrapper .ribbon::after {
  border-left: 3px solid transparent;
  border-right: 3px solid transparent;
  border-top: 3px solid #9e9e9e;
  bottom: -3px;
  content: "";
  position: absolute;
}

.ribbon-wrapper .ribbon::before {
  left: 0;
}

.ribbon-wrapper .ribbon::after {
  right: 0;
}
#tableshownselection{
  padding: 1px;
  font-size: 13px;
  outline: none;
  border:1px solid #e2cad0;
  border-radius: 10px;
  width: 46px;
  color:#747f8c;
}

                    </style>


                    <!--contents here-->
                    <div class="row" id="getlarger">
                       
                <div class="container" id="getlarge">

                     <div class="card shadow">
                         <div class="card-header">
                           
                             <!--<input type="text" class="form-control" name="" id="searchfilter" placeholder="Search for..">-->
                          
                         </div> 

                         <div class="container">
                     <div class="table-responsive">
    <table class="table table-striped table-hover table-sm" id="pdstable">
                              <thead >
                                <tr class="table-success">
                                 
                                   
                                 <th scope="col" class="stathead">Status</th>
                                 <th scope="col"></th>
                                   <th scope="col">From</th>
                                   <th scope="col">To</th>
                                  <th scope="col">Date-submitted</th>
                                    <th scope="col">Times</th>
                                 
                                 <!-- <th scope="col" >Last Modified</th>-->
                              
                                </tr>
                              </thead>
                              <tbody id="tablecontents">

                              <?php 
                              if(isset($_GET['id'])){

                                $id = $_GET['id'];
                                  $getstudent_data = "select * from shifting_history where stud_id = '$id'   ";
                                   $shiftingrecords = mysqli_query($con,$getstudent_data); 
                                  
                               while($row = mysqli_fetch_array($shiftingrecords)){
                                $status = $row['status'];
                                 $reasons = $row['reason'];
                                  $hist = $row['sh_id'];
                                        ?>
                                        <tr>
                                                <td> 

                                                    <?php 
                                                    if($status == 'Declined'){
                                                         ?>
                                                         <span class="badge badge-danger"><?php echo $row['status'] ?></span>
                                                        <?php
                                                    }else if($status == 'processing') {
                                                        ?>
                                                         <span class="badge badge-warning"><?php echo $row['status'] ?></span>
                                                        <?php
                                                    }else {
                                                             ?>
                                                         <span class="badge badge-success"><?php echo $row['status'] ?></span>
                                                        <?php
                                                    }

                                                     ?>
                                                   </td>
                                                   <td>
                                                    <?php 

                                                     if($status == 'Declined'){
                                                      ?>

                                                      <a class="btn btn-light text-danger" style="font-size:12px" data-toggle="collapse" href="#collapseExample<?php echo $hist?>" role="button" aria-expanded="false" aria-controls="collapseExample<?php echo $hist?>">
                                                       REASONS <i class="fas fa-angle-down"></i>
                                                      </a>
                                                    
                                                  
                                                    <div class="collapse" id="collapseExample<?php echo $hist?>">
                                                      <div class="card card-body">
                                                          <ul>
                                                            <?php 
                                                            $thereasons = explode(',', $reasons);

                                                           foreach ($thereasons as $key => $value) {
                                                                switch ($value) {
                                                                    case '1':
                                                                       echo '<li>Did not meet the grade requirements</li>';
                                                                        break;
                                                                     case '2':
                                                                          echo '<li>Did not meet other requirements</li>';
                                                                        break;
                                                                         case '4':
                                                                          echo '<li>No Vacant Slot</li>';
                                                                        break;
                                                                         case '5':
                                                                           echo '<li>Failed in Interview</li>';
                                                                        break;
                                                                    
                                                                  
                                                                }
                                                           }

                                                             ?>
                                                              
                                                         </ul>

                                                      </div>
                                                    </div>
                                                       

                                                      <?php
                                                     }else {
                                                      if($status == 'processing') {
                                                      
                                                        $check_if_sfgenerated = "select * from sf_content where sfs in (select sh_id from shifting_history where sh_id ='$hist')  ";
                                                         $checkingsf = mysqli_query($con,$check_if_sfgenerated); 
                                                         $counting_ifexist= mysqli_num_rows($checkingsf);
                                                     
                                                        if($counting_ifexist >=1){
                                                            ?>
                                                         <a  class="page-link text-success " href="session.php?approved&sftoken=60&studenttokenid=<?php echo $id ?>&studentname=<?php echo  $student_Fullname ?>&status=1&hist=<?php echo $hist ?>&from=<?php echo $row['from_course'] ?>&to=<?php echo $row['to_course'] ?>&fromcollege=<?php echo $row['from_'] ?>&tocollege=<?php echo $row['to_'] ?>" target="_blank"  style="font-size: 12px" data-bs-toggle="tooltip" data-bs-placement="right" title="Generated Shifting Form Editable" >Generated Shifting Form  (Automated)</a>

                                                        <?php
                                                  
                                                      
                                                       }else {
                                                        ?>
                                                        <span class="text-danger btn" style="font-size:12px;font-weight: bolder;">NOT yet or No Generated Shifting Form</span>
                                                        <?php
                                                       }



                                                    }else {
                                                     
                                                        ?>
                                                         <a  class="page-link text-success " href="session.php?approved&sftoken=60&studenttokenid=<?php echo $id ?>&studentname=<?php echo  $student_Fullname ?>&status=2&hist=<?php echo $hist ?>&from=<?php echo $row['from_course'] ?>&to=<?php echo $row['to_course'] ?>&fromcollege=<?php echo $row['from_'] ?>&tocollege=<?php echo $row['to_'] ?>" target="_blank"  style="font-size: 12px" data-bs-toggle="tooltip" data-bs-placement="right" title="Generated Shifting Form Editable" >Generated Shifting Form  (Automated)</a>

                                                        <?php
                                                    }
                                                     
                                                     }

                                                     ?>
                                                     
                                                
                                                        
                                                    

                                                      

                                                   </td>
                                                <td><?php echo $row['from_college'] ?></td>
                                                <td><?php echo $row['to_college'] ?></td>
                                                <td><?php echo date('F j,Y',strtotime($row['datecreated'])) ?></td>
                                                <td><?php echo $row['shiftcount'] ?></td>

                                        </tr>

                                        <?php               
                                   }
                              

                              }else {
                                header('location:index.php');
                              }
                                
                               

                               ?>
    

                        
                                

                              </tbody>
                            </table>  

                            </div>
                            </div>
                          
                     <button class="btn btn-light text-gray-700" onclick="window.location.href='shifting_form.php'" style="font-size: 13px">View Shifting Records</button>
                     </div> 
                     
                      



                </div> 
                              
                   
  
                    </div> 
                    
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
          
 <script src="../../js/jquery.js"></script>
          
          <script>
             $(document).ready(function() {
    if ($(window).width() < 768) {
   $('#getlarge').removeClass('container');

    $('#getlarger').removeClass('row');
 


}
else {
    $('#getlarge').addClass('container');

    $('#getlarger').addClass('row');
  

}
  });
          </script>
             
             <!-- Modal -->
             <div class="modal fade" id="details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog" role="document">
                 <div class="modal-content">
                   <div class="ribbon-wrapper" >
                                      <div class="ribbon ribbon-lg badge-secondary">
                                          <span style="font-size: 9px">DETAILS</span>

                                               </div> 
                                              </div>
                   <div class="modal-header">
                   
                   </div>
                   <div class="modal-body shadow">
                    
                     <div class="container"> 
                     
                     
                       <div class="py-5">
                            
                            <h6 style="font-weight: bolder; text-align: center;" id="nombre"></h6>
                            <h6 style="font-size: 12px;text-align: center; " class="mb-3" id="mail"></h6>

                             <div class="card shadow-sm">
                                  <div class="card-body" style="text-align: center;">
                                      
                                      <span style="font-size: 15px;font-weight: bolder">Shifting Form</span>
                                      <p style="font-size: 12px">
                                        Date-Submitted : <span id="petsasubmit"></span>
                                        <br style="user-select: none">
                                        last modified : <span id="modifica"></span>
                                         <br style="user-select: none">



                                      </p>

                                  </div> 
                                  
                               </div> 
                          </div> 
                         
                          
                       
                       </div>
                       
                       
             
             
                    
                   </div>
                   <div class="modal-footer">
                     <button type="button" class="btn btn-light" style="font-size:12px" data-dismiss="modal">Close</button>
                 
                   </div>
                 </div>
               </div>
             </div> 


            <!-- Footer -->
            <?php include '../include/assets/footer.php';

             include '../Dashboard/notification.php';



            ?>
           
  
  
   

           
            <!-- End of Footer -->
            <script src="../../offline/sweetalert.js"></script>
           <script src="../../js/jquery.js"></script>
          <link rel="stylesheet" type="text/css" href="../../offline/datatable.css"/>
 
<script type="text/javascript" src="../../offline/datatable.js"></script>







            <script type="text/javascript">
              
              $(document).ready(function() {
                
            let table = new DataTable('#pdstable', {
      
     "search": {
    "caseInsensitive": false
  }

});

          /* $('#submittodo').on('submit', function(event){
               event.preventDefault();
                      $.ajax({
                               url :$(this).attr('action'),
                                method: "POST",
                                 data  : $(this).serialize(),
                                 success : function(data){
                              alert(data);
                                 }
                              })
               });*/
                                   

             


      
                    });      
                    
            </script>
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
     <?php include '../Dashboard/logoutmodal.php' ?>



    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js?v=2"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js?v=1"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js?v=1"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js?v=1"></script>

    <!-- Page level plugins -->
 

     <?php 
    include '../clear/clear.php';

     ?>
   
</body>

</html>