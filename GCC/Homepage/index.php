<?php 
session_start();
  include '../create_form/connect.php';
  if(!isset($_SESSION['admingcc_token'])) {
    header("location:../../session_end.html");
  }

 ?>
<!DOCTYPE html>
<html lang="en">


 <?php include '../include/assets/head.php';
 include '../Classes/sql_query.php';
 ?>
 <style type="text/css">
    @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap');
    *{
      font-family: 'Cairo', sans-serif;
    }
 </style>
<body id="page-top" >

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!--sidebar-->
         
        <ul class="navbar-nav  sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: <?php echo $_SESSION['sidebar_color'] ?>" >

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon rotate-n-15">
                   <img src="../img/gcc.png" style="width: 50px;transform: rotate(15deg);">
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
                <a class="nav-link" href="../Dashboard/">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
               Components
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
           <li class="nav-item">
                <a class="nav-link" href="../Records/">
                    <i class="fas fa-clipboard-list"></i>
                    <span>Records</span></a>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed " href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-brush"></i>
                    <span>Manage Contents</span>
                </a>
                <div id="collapseUtilities" class="collapse show" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Contents:</h6>
                         <a class="collapse-item active" href="../Homepage/">Homepage</a>
                         <a class="collapse-item " href="../Pages/">Pages</a>
                        <a class="collapse-item" href="../Calendar/">Calendar</a>
                        <a class="collapse-item" href="../Announcement/">Announcement</a>
                        <a class="collapse-item" href="../Newsfeed">News Feed</a>
                       
                        
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
                <a class="nav-link" href="../Forms/">
                    <i class="fas fa-align-justify"></i>
                    <span>Form</span></a>
            </li>

              <li class="nav-item">
                <a class="nav-link" href="../Services/">
                    <i class="fas fa-cogs"></i>
                    <span>Services</span></a>
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
            <?php include '../include/assets/topbar.php';?>
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
                        <h1 class="h3 mb-0 text-gray-800">Homepage</h1>
                        <!--<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
                    </div>
                    <hr>


<div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
         <h6 style="font-weight: bold">HEADER</h6>
        </button>
      </h5>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <?php include 'header.php' ?>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwos" aria-expanded="false" aria-controls="collapseTwo">
             <h6 style="font-weight: bold">Announcement</h6>
        </button>
      </h5>
    </div>
    <div id="collapseTwos" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
            <div class="container">
                   <?php  include 'marquee.php' ?>
                      </div> 

      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
         <h6 style="font-weight: bold">Carousel</h6>
        </button>
      </h5>
    </div>
    <div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-parent="#accordionExample">
      <?php include 'carousel.php' ?>
    </div>
  </div>

  <div class="card">
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed " type="button" data-toggle="collapse" data-target="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
         <h6 style="font-weight: bold">News Feed, Article and Peer facilitator</h6>
        </button>
      </h5>
    </div>
    <div id="collapsefour" class="collapse show" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
               <div class="card shadow">
                                    <div class="card-body">
                                   
                                        <div class="row">
                                       <div class="col-sm-4">
                                        <a href="../Announcement/" style="text-decoration: none">
                                          <div class="card shadow" style="border-left: 4px solid #e74a3b">
                                             <div class="card-body">
                                                  
                                            <h6 style="text-align: center;">Manage Announcement</h6>
                                             </div> 
                                          
                                          </div> 
                                          </a>
                                          
                                       </div> 
                                        <div class="col-sm-4">
                                            <a href="../Newsfeed/?addarticle" style="text-decoration: none">
                                           <div class="card shadow" style="border-left: 4px solid #1cc88a">
                                             <div class="card-body">
                                                  
                                            <h6 style="text-align: center;">Manage Articles</h6>
                                             </div> 
                                          
                                          </div> 
                                        </a>
                                        </div> 
                                         <div class="col-sm-4">
                                            <a href="../Newsfeed/?addpeerfacilitator" style="text-decoration: none">
                                            <div class="card shadow" style="border-left: 4px solid #f6c23e">
                                             <div class="card-body">
                                                  
                                            <h6 style="text-align: center;">Manage Peer Facilitator</h6>
                                             </div> 
                                          
                                          </div> 
                                        </a>
                                         </div> 
                                       
                                    </div> 

                                      
                                    </div> 
                                    
                                 </div> 
      </div>
    </div>
  </div>

   <div class="card">
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapsefive" aria-expanded="false" aria-controls="collapsefive">
         <h6 style="font-weight: bold">Video Content</h6>
        </button>
      </h5>
    </div>
    <div id="collapsefive" class="collapse show" aria-labelledby="headingThree" data-parent="#accordionExample">
      <?php include 'video.php' ?>
    </div>
  </div>

   <div class="card">
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapsesix" aria-expanded="false" aria-controls="collapseThree">
         <h6 style="font-weight: bold">Other Links</h6>
        </button>
      </h5>
    </div>
    <div id="collapsesix" class="collapse show" aria-labelledby="headingThree" data-parent="#accordionExample">
      <?php include 'others.php' ?>
    </div>
  </div>




</div>
                    <!--contents here-->
                  
                  
                   
                 
                 

                   

                        

                                
                         
                                 


                               

                                   

                                
                                      

                                       
                                        

                                   
                        
                         
                      
                      
                    
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
              <!-- Button trigger modal -->
            
              
              <!-- Modal -->
             

              
             



          




<?php 
include '../Dashboard/notification.php';
 ?>

            <!-- Button trigger modal -->

           <script src="../../js/jquery.js"></script>
           
             <script type="text/javascript">
                      $(document).ready(function() {

                       



                        
                        advancesearchcontent();
                           $('.myinputsss').keyup(function(){ 

                           
                            var value = $(this).val().toLowerCase();


                              var size = $(".advancecontent_search > .ele").length; // The parentdiv plus the element containing the text or card
                                           var count = $('div.ele:hidden').length;  // The child element or card
                                          

                                           $('#tryfound').text('Search Result For : '+ value);


                            if(value == ''){
                                $('.051715').removeClass('d-none');
                                 $('#tryfound').text('');
                                 $('.advancecontent_search').addClass('d-none');
                            }else {
                               $('.051715').addClass('d-none');
                                $('.advancecontent_search').removeClass('d-none');
                                
                              $('div[data-role="searchfor"]').filter(function() {
                                       $(this).toggle($(this).find('h6').text().toLowerCase().indexOf(value) > -1)
                                   });
                             
                                 
                               
                                  
                                   
                            }
                          
                          
                          })

                         $('#btnsearchclick').click(function() { 
                          
                         
                            if($('#confirmcheck').prop("checked") == true) {
                                         $('#confirmcheck').prop('checked',false);  
                                           $('.051715').removeClass('d-none');
                                           $('.advancecontent_search').addClass('d-none');
                                         $(this).find("i").toggleClass("far fa-times-circle");  
                                           
                                      }
                                   else if($('#confirmcheck').prop("checked") == false) {
                                           $('#confirmcheck').prop('checked',true); 
                                      $('.051715').addClass('d-none');
                                      $('.advancecontent_search').removeClass('d-none')   
                                      $(this).find("i").toggleClass("far fa-times-circle");  
                                                                    
                                    }
                          
                         /* ;*/
                         })
                             
                           function advancesearchcontent(){
                               
                                
                                  var xhttp = new XMLHttpRequest();
                                 xhttp.onreadystatechange = function() {
                                  if (this.readyState == 4 && this.status == 200) {
                                 const data = this.responseText;
                               
                              
                              $('.advancecontent_search').html(data);
                              
                                              }
                                           };
                                   xhttp.open("POST", "../Dashboard/advancesearch.php",true);
                                   xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                                   xhttp.send("searchfor=1");
                                       
                                                
                           }


                      });
                      
                     
                                     
                            
                    </script>


            <!-- Footer -->
            <?php include '../include/assets/footer.php';



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
<?php include '../Dashboard/logoutmodal.php';  ?>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script type="text/javascript">
          $(document).ready(function() {
              if($(window).width() <= 768){
               $('#accordionSidebar').addClass('toggled');
              }
        
          });
    </script>
</body>

</html>