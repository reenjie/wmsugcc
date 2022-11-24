<?php 
session_start();
 if(!isset( $_SESSION['admin_token'] )){
  //
 }

 ?>
<!DOCTYPE html>
<html lang="en" >


 <?php 
 include '../../Classes/sql_query.php';
 ?>
 <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

   <title>GCC - Admin</title>

    <!-- Custom fonts for this template-->
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../css/sb-admin-2.min.css?v=1" rel="stylesheet">
 
</head>

<body id="page-top"  >

    <!-- Page Wrapper  -->
    <div id="wrapper"   >

        <!--sidebar-->
         
       <ul class="navbar-nav   sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: <?php echo $_SESSION['sidebar_color'] ?>" >

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                   <img src="../../img/gcc.png" style="width: 50px;transform: rotate(15deg);">
                </div>
                <div class="sidebar-brand-text mx-3">
                    <?php 
                    echo $_SESSION['sidebar_banner'];
                     ?>

                 <!--<sup>2</sup>--></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item ">
                <a class="nav-link" href="../../Dashboard/">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item "> 
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Components</span>
                </a>
                <div id="collapseTwo" class="collapse " aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                      <a class="collapse-item " href="../../Homepage/">Homepage</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item ">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Utilities</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Utilities:</h6>
                        <a class="collapse-item " href="../../Calendar/">Calendar</a>
                        <a class="collapse-item " href="../../Announcement/">Announcement</a>
                        <a class="collapse-item " href="../../Newsfeed/">News Feed</a>
                        
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
               Apps
            </div>

           

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="../../Forms/">
                    <i class="fas fa-align-justify"></i>
                    <span>Form</span></a>
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
            <div id="content" >

                    <!--topbar-->
            <?php // include '../../include/assets/topbar.php';?>
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

         
         
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Handlee&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100&display=swap" rel="stylesheet">

                <!-- Begin Page Content -->
                <div class="container-fluid"  >
                   


                   

                     <div class="card shadow mb-3 " style="height: 150px;background: rgb(222,235,233);
background: radial-gradient(circle, rgba(222,235,233,0.4906337535014006) 0%, rgba(222,235,232,1) 1%, rgba(158,214,148,1) 4%, rgba(222,235,233,1) 100%);">
                       
                       <div class="card-body">
                        <h1 style="float:left;z-index: -2;transform: rotate(30deg); position: absolute;"><i class="far fa-bell" ></i></h1>
                        
                        <h2 style="float: right;font-family: 'Handlee', cursive;font-size: 80px;user-select: none">ALERTS</h2>
                         
                       </div> 
                        

                     </div> 
                     
                      <div class="container">
                        
                        <div class="row">
                            
                             <div class="col-md-12" >
                               <div class="card">
                                 <div class="card-body">
                          <input type="text" name="" id="myInput" class="form-control mb-2" placeholder="Search Filter .." style="font-size: 14px"> 
                          <span style="font-size: 12px">Result : <span class="text-danger" style="font-size: 14px" id="textsearched"></span> </span>
     <form method="post" action="action.php" id="alertformsubmit" onsubmit="return false">
          <input type="hidden" name="trigger">                  
    
   <table class="table table-striped table-hover mt-2 table-sm table-bordered" style="font-family: 'Inter', sans-serif;font-size: 14px" id="tablealerts">
  <thead>
    <tr class="table-success">
      <th scope="col">
        
  <div class="custom-control custom-checkbox">
  <input type="checkbox" class="custom-control-input" id="customCheck1">
  <label class="custom-control-label" for="customCheck1" style="font-size: 12px"></label>
</div>
      </th>
      <th scope="col">Date-Notified</th>
      <th scope="col">Student Email</th>

      <th scope="col">Alert</th>
      <th scope="col">Content</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody id="tablecontents">
    
  </tbody>
</table>
  
  <span> Onselected options : </span> <button class="btn btn-light" type="submit" style="font-size: 12px"> Delete</button>
 </form>




                                 </div>
                               </div> 
                               
                                


                             </div> 
                             

                        </div>

                      </div> 
                      



                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        
          
            <!-- Modal -->
            
            <!---------------REAL TIME AJAX NOTIFICATIONS-------------------->
<!---Loaded Message REQUEST and ITS CONTENTS---->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

             <script type="text/javascript">
                 
                 $(document).ready(function() {
                   

                       $('#closemessagerequests').click(function() { 
                      var id = $('#notification_id1').val();
                    
                       var xhttp = new XMLHttpRequest();
              xhttp.onreadystatechange = function() {
               if (this.readyState == 4 && this.status == 200) {
              const data = this.responseText;
             
                 
                  tablecontent();
             
                           }
                        };
                xhttp.open("POST", "../../create_form/real-notification.php",true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("setread=1&id="+id);
                    })
                

                 

                    $('.deletenotificationss').click(function() { 
                     var id = $('#notification_id').val();
                     var id1 = $('#notification_id1').val();


                     Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#e74a3b',
                    cancelButtonColor: '#f6c23e',
                    confirmButtonText: 'Yes, delete it!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                        var xhttp = new XMLHttpRequest();
                        xhttp.onreadystatechange = function() {
                         if (this.readyState == 4 && this.status == 200) {
                        const data = this.responseText;
                         
                      
                       $('#notificationbellcontentview').modal('hide');
                      Swal.fire(
                        'Deleted!',
                        'Notification Deleted Successfully!',
                        'success'
                      )
                      tablecontent();
                                     }
                                  };
                          xhttp.open("POST", "../../create_form/real-notification.php",true);
                          xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                          xhttp.send("deletenotification=1&id="+id1);
                    }
                  })
                      
                      
                              
                                       

                    })

                       });      
                       
             </script>

          
         

               <!-- Messageopen -->
             <div class="modal fade" id="notificationbellcontentview" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog" role="document">
                 <div class="modal-content">
                 
                  <div class="modal-body">
            <button class="btn btn-light" style="font-size: 12px;float: right;" id="closemessagerequests" data-dismiss="modal"><i class="fas fa-times text-secondary"></i></button>
           <button class="btn btn-light deletenotificationss" style="font-size: 12px;float: right;"><i class="fas fa-trash text-secondary"></i></button>
           <button class="btn btn-light" style="font-size: 12px;float: right;"><i class="far fa-eye text-secondary"></i></button>


           <div class="container shadow mb-2 py-3" style="text-align: center;"> 
                <span class="badge-success" id="notifstatus1" style="font-size: 10px;padding: 5px;border-radius: 10px;text-transform: uppercase;float: left;"></span> <br style="user-select: none">
             
                 <h4 id="titlenotif1" class="mt-4" style="font-weight: bold"></h4>
              <input type="hidden" name="" id="studentids1">
              <br style="user-select: none">

               <p style="text-align:center;font-size: 13px" class="text-success" id="contentnotif1"></p>
  <!--<div style="font-size: 14px;font-weight: bold;" id="query2"></div>-->
        
           <div class="row">
              <div class="col-md-6">
               <div style="font-size: 14px;font-weight: bold;" id="query1"></div>
           
              </div> 
              <div class="col-md-6">
                  <div style="font-size: 14px;font-weight: bold;" id="query3"></div>
              </div> 
              
           </div> 
             
              <br style="user-select: none">
              <span id="requestor1" style="font-size: 15px; " class="text-secondary"></span><br style="user-select: none">
              <span id="studemail1" style="font-size: 12px; " ></span>

        <input type="hidden" name="" id="notification_id1">
        <input type="hidden" name="" id="notifformid">
          </div>
          
          
          
          


        </div>
                   
                 </div>
               </div>
             </div>


         
             
             
<!---------------REAL TIME AJAX NOTIFICATIONS END HERE-------------------->
            <!-- Button trigger modal -->
          
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

         
         
          
              <script type="text/javascript">
                  
                  $(document).ready(function() {
                   
                    $('#myInput').keyup(function(){ 
                           var value = $(this).val().toLowerCase();
                           $('#textsearched').text(value);
                           var input, filter, table, tr, td, i, txtValue;
                          input = document.getElementById("myInput");
                          filter = input.value.toUpperCase();
                          table = document.getElementById("tablealerts");
                          tr = table.getElementsByTagName("tr");
                         for (i = 1; i < tr.length; i++) {
                            // Hide the row initially.
                            tr[i].style.display = "none";

                            td = tr[i].getElementsByTagName("td");
                            for (var j = 0; j < td.length; j++) {
                              cell = tr[i].getElementsByTagName("td")[j];
                              if (cell) {
                                if (cell.innerHTML.toUpperCase().indexOf(filter) > -1) {
                                  tr[i].style.display = "";
                                  break;
                                } 
                              }
                            }
                        }
                           
                           });
                    tablecontent();
                    function tablecontent(){
                        
                      
                         $.ajax({
                                 url : "action.php",
                                  method: "POST",
                                   data  : {tablecontent:1},
                                   success : function(data){
                              $('#tablecontents').html(data);
                                   }
                                })
                         
                          
                    }

                    $('#alertformsubmit').on('submit', function(event){
                       event.preventDefault();
                         var atLeastOneIsChecked = $('input[name="checkval[]"]:checked').length > 0;

                           if(atLeastOneIsChecked == false){
                            Swal.fire(
                              'Error Action!',
                              'Please select one or more!',
                              'error'
                            )

                           }else {

                            Swal.fire({
                          title: 'Are you sure?',
                          text: "You won't be able to revert this!",
                          icon: 'warning',
                          showCancelButton: true,
                          confirmButtonColor: '#e74a3b',
                          cancelButtonColor: '#f6c23e',
                          confirmButtonText: 'Yes, delete it!'
                        }).then((result) => {
                          if (result.isConfirmed) {
                              $.ajax({
                                       url : $(this).attr('action'),
                                        method: "POST",
                                         data  : $(this).serialize(),
                                         success : function(data){
                                     Swal.fire(
                                    'Deleted Successfully!',
                                    'Alert Deleted!',
                                    'success'
                                  )
                                      tablecontent();
                                      $('.checkall').prop('checked',false);    
                      $('#customCheck1').prop('indeterminate',false);
                       $('#customCheck1').prop('checked',false);         
                                         }
                                      })
                          }
                        })


                            
                           }
                       });
                         
                  });
                 
              </script>
               

            <!-- Footer -->
            <?php include '../../include/assets/footer.php';



            ?>
           
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
   
</body>

</html>