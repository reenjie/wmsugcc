<?php 
session_start();
 if(!isset($_SESSION['admin_token'] )){
    header('location:../../session_end.html');
  //
 }
    include '../../GCC/create_form/connect.php';
            $cid = $_SESSION['gc_collegid'];
                        
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
         
            <ul class="navbar-nav  sidebar sidebar-dark accordion " id="accordionSidebar" style="background-color: <?php echo $_SESSION['sidebar_colors'] ?>" >

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center mb-4" href="#">
                <div class="sidebar-brand-icon rotate-n-15">
                   <img src="../img/gcc.png" style="width: 50px;transform: rotate(15deg);">
                </div>
                <div class="sidebar-brand-text mx-3">
                    <?php 
                    echo $_SESSION['sidebar_banners'];
                     ?>

                 <!--<sup>2</sup>--></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
              <div class="sidebar-heading">
               Reports
            </div>
            <!-- Nav Item - Dashboard -->
            <li class="nav-item ">
                <a class="nav-link" href="../Dashboard/">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider
            <hr class="sidebar-divider"> -->

            <!-- Heading -->
            <div class="sidebar-heading">
                Records
            </div>

        

            <!-- Nav Item - Charts -->

           
            <li class="nav-item ">
                <a class="nav-link" href="../PDS-Records/">
                   <i class="fas fa-clipboard-list"></i>
                    <span>PDS</span></a>
            </li>

            <li class="nav-item ">
                <a class="nav-link" href="../Shifting-Records/">
                   <i class="far fa-circle"></i>
                    <span>Shifting</span></a>
            </li>

              <div class="sidebar-heading">
                Manage
            </div>


                <li class="nav-item ">
                <a class="nav-link" href="../Referrals/">
                  <i class="fas fa-asterisk"></i>
                    <span>Referrals & Coaching</span></a>
            </li>


             <li class="nav-item active">
                <a class="nav-link" href="../Students/">
                    <?php 
                     $sql = " select * from student where stud_college ='$cid' and isverified = 0 ";
                            $result = mysqli_query($con,$sql); 
                            $count= mysqli_num_rows($result); 
                    if($count >= 1){
                        ?>
                           <span class="badge badge-danger" style="font-size:13px;" ><?php echo $count ?></span>
                        <?php
                    }else {
                        ?>
                        <i class="fas fa-users"></i>
                        <?php
                    }

                     ?>
              
               
                    <span>Students </span></a>
            </li>

           

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message 
            <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
                <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
                <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
            </div>-->

        </ul>
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
                        <h1 id="title" class="h3 mb-0 text-gray-800">Students</h1>
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

                     <div class="card shadow card_">
                         <div class="card-header card_">

                          
                             <nav aria-label="breadcrumb">
                                      <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="advance_search.php" style="font-size:13px">Advance Search to All Students <i class="fas fa-search"></i></a></li>
                                        <li class="breadcrumb-item"><a href="shiftees.php" style="font-size:13px">All Shiftees</a></li>
                                       
                                      </ol>
                                    </nav>
                         </div> 
                       
                          <div class="card-body "  >
                                   <div class="table-responsive">
                 
                   <table class="table table-striped table-sm"  id="studenttable" style="font-size:14px">
                <thead>
                  <tr class="table-success">
                    <th scope="col">Action</th>
                    <th scope="col">Status</th>
                    <th scope="col">Account</th>
                    <th scope="col">PDS status</th>
                     <th scope="col">email</th>
                    
                    <th scope="col">lastname</th>
                    <th scope="col">firstname</th>
                    <th scope="col">middlename</th>
                    
                      <th scope="col">Course & College</th>
                  </tr>
                </thead>
                <tbody>
                         <?php 
        
                $sql = " select * from student where stud_college ='$cid' ";
                            $result = mysqli_query($con,$sql); 
                            $count= mysqli_num_rows($result); 
                        
                      
                         
                             while($row = mysqli_fetch_array($result)){
                              $courseid = $row['stud_course'];
                              $lg = $row['lg'];
                              $isv = $row['isverified'];
                              $pdsfield = $row['pds_filled'];
                              $idtoken = $row['stud_id'];
                               if($isv == 0){
                                 ?>
                                  <tr class="table-danger">
                                <?php
                               }else {
                                 ?>
                                  <tr>
                                <?php
                               }

                         ?>

                       
                          <td>

                             
                              <div class="btn-group" role="group" aria-label="Basic example">
                                <?php 

                                if($lg == 2){
                                  ?>
                                     <button type="button" class="btn btn-light text-dark unblock" data-id="<?php echo $row['stud_id'] ?>" style="font-size: 12px" data-toggle="tooltip" data-placement="bottom" title="Unblock User" ><i class="fas fa-circle"></i></button>
                                  <?php
                                }else {

                                     if ($lg ==1){
                                          ?>
                                    <button type="button" class="btn btn-light text-dark"  data-toggle="tooltip" data-placement="bottom" title="Cant block online user" style="font-size: 12px;cursor: not-allowed;" ><i class="fas fa-ban"></i></button>
                                    <?php
                                     }else {
                                          ?>
                                    <button type="button" class="btn btn-light text-dark block" data-id="<?php echo $row['stud_id'] ?>" style="font-size: 12px" data-toggle="tooltip" data-placement="bottom" title="Block User" ><i class="fas fa-ban"></i></button>
                                    <?php
                                     }
                                  
                                }


                            if($isv == 0){
                                ?>
                               <button class="btn btn-light text-primary  verifyuser" data-id="<?php echo $row['stud_id'] ?>" style="font-size:12px">Verify</button>
                                <?php
                            }else {
                                 ?>
                               
                                <?php
                            }

                          

                                 ?>
                              
                                
                                 

                                    </div>                  
                            
                            
                          </td>
                           <td>
                            <?php 
                            if($lg == 0){
                              echo '<span class="badge badge-danger">Offline</span>';
                            }else if ($lg ==1){
                               echo '<span class="badge badge-success">Online</span>';
                            }else if ($lg == 2){
                               echo '<span class="badge badge-dark">Blocked</span>';
                            }

                             ?>
                             
                           </td>
                           <td>
                            <?php 
                            if($isv == 0){
                                ?>
                                <span class="text-danger" style="font-size:11px">Not yet Verified</span>
                                <?php
                            }else {
                                 ?>
                                <span class="text-success" style="font-size:11px">Verified</span>
                                <?php
                            }

                             ?>
                           </td>
                           <td>
                            <?php 
                                $countingpdstemp = "select userid from temp_answers where csformid ='62' and userid ='$idtoken'  ";
                                 $countingpds_temp = mysqli_query($con,$countingpdstemp); 
                                 $countingpdstemp_= mysqli_num_rows($countingpds_temp);

                                 if($countingpdstemp_ >= 1){
                                     ?>
                                    <span class="text-warning" style="font-size:11px">Pending</span>
                                    <?php
                                 }else {

                                         $countingpdsformresponse = "select userid from form_response where csformid ='62' and userid ='$idtoken'  ";
                                 $countingpds_formresponse = mysqli_query($con,$countingpdsformresponse); 
                                 $countingpdsresponse_= mysqli_num_rows($countingpds_formresponse);

                                 if($countingpdsresponse_ >= 1){
                                    ?>
                                    <span class="text-success" style="font-size:11px">Completed</span>
                                    <?php
                                 }else {

                                    
                                    ?>
                                    <span class="text-danger" style="font-size:11px">Not yet Filled up</span>
                                    <?php
                                 }

                                    
                                 }
                               


                             ?>
                               

                           </td>
                            <td class="text-primary"> 

                                
                                <?php echo $row['stud_email'] ?></td>
                            
                              <td><?php echo $row['stud_lname'] ?></td>
                               <td><?php echo $row['stud_fname'] ?></td>
                                <td><?php echo $row['stud_mname'] ?></td>
                                 <td>
                                   <?php 
                                     $getcourses = "select * from course where courseid = '$courseid'  ";
                                      $getstudent_course = mysqli_query($con,$getcourses); 
                                    
                                    while($gcourse = mysqli_fetch_array($getstudent_course)){
                                              echo $gcourse['course'];   
                                              $collegeid = $gcourse['CollegeId'];

                                      }
                                        $getcolleges = "select * from colleges where CollegeId = '$collegeid'  ";
                                         $stud_college = mysqli_query($con,$getcolleges); 
                                        
                                       while($gcollege = mysqli_fetch_array($stud_college)){
                                             echo '<br> ('.$gcollege['college'].')';     
                                         }
                                      
                                       
                                   
                                    

                                    ?>
                                 </td>
                         </tr>

                         <?php
                             }
                 

              

              

            


                     ?>
                </tbody>
              </table>
              </div> 

                          </div> 

                          
                          
                     </div> 
                     
                      



                </div> 
                              
                   
  
                    </div> 
                    
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
          
  <script src="../../js/jquery.js"></script>
  <script type="text/javascript" src="../../offline/sweetalert.js"></script>
          
          <script>
             $(document).ready(function() {
    if ($(window).width() < 768) {
   $('#getlarge').removeClass('container');

    $('#getlarger').removeClass('row');
    $('.card_').removeClass('card').removeClass('shadow').removeClass('card-header');
 


}
else {
    $('#getlarge').addClass('container');

    $('#getlarger').addClass('row');
  

}   

        $('.verifyuser').click(function(){
              var id = $(this).data('id');



                    $.ajax({
                        url : "action.php",
                         method: "POST",
                        data  : {verify:1,id:id},
                         success : function(data){
                              
                                 Swal.fire(
                              'Verified Successfully!',
                              'Student has given full privilege on his/her account.',
                              'success'
                            ).then((result) => {
                          if (result.isConfirmed) {
                            location.reload();
                          }
                        })


                          }
                        })
                      

                          
        })

            
                  $('.block').click(function(){
                       var id = $(this).data('id');
                      

                            Swal.fire({
                title: 'Are you sure ?',
                text: "Blocking the student will prevent him/her from accessing his/her account.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#e74a3b',
                cancelButtonColor: '#f6c23e',
                confirmButtonText: 'Yes, Block it!'
              }).then((result) => {
                if (result.isConfirmed) {
                  
                  
                  
                    $.ajax({
                        url : "action.php",
                         method: "POST",
                        data  : {block:1,id:id},
                         success : function(data){
                              
                                 Swal.fire(
                              'Block Successfully!',
                              'Student has been Block from accessing his/her account.',
                              'success'
                            ).then((result) => {
                          if (result.isConfirmed) {
                            location.reload();
                          }
                        })


                          }
                        })
                      
                 

                
                

                }
              })
                            
                  })

                  $('.unblock').click(function(){
                    var id = $(this).data('id');
                         
                             $.ajax({
                        url : "action.php",
                         method: "POST",
                        data  : {unblock:1,id:id},
                         success : function(data){
                              
                                 Swal.fire(
                              'Unblock Successfully!',
                              'Student can now access the his/her account',
                              'success'
                            ).then((result) => {
                          if (result.isConfirmed) {
                            location.reload();
                          }
                        })


                          }
                        })   
                  })


  });
          </script>
             
           

           
            <!-- End of Footer -->
            <script src="../../sweetalert.js"></script>
            <script src="../../js/jquery.js"></script>
       <link rel="stylesheet" type="text/css" href="../../offline/datatable.css"/>
 
<script type="text/javascript" src="../../offline/datatable.js"></script>








            <script type="text/javascript">
              
              $(document).ready(function() {
                
            let table = new DataTable('#studenttable', {
      
     "search": {
    "caseInsensitive": false
  }

});

     

      
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
     <script type="text/javascript">
          $(document).ready(function() {
              if($(window).width() <= 768){
               $('#accordionSidebar').addClass('toggled');
              }
        
          });
    </script>
   
</body>

</html>