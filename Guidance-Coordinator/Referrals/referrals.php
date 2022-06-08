<?php 
session_start();
if(!isset($_SESSION['admin_token'] )){
    header('location:../../session_end.html');
  //
 }


 if(isset($_GET['tokenid'])){
    $tokenid = $_GET['tokenid'];
    $ln = $_GET['ln'];
    $fn = $_GET['fn'];




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


              <li class="nav-item active">
                <a class="nav-link" href="../Referrals/">
                  <i class="fas fa-asterisk"></i>
                    <span>Referrals & Coaching</span></a>
            </li>


             <li class="nav-item">
                <a class="nav-link" href="../Students/">
                  <i class="fas fa-users"></i>
                    <span>Students</span></a>
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


                                    #sd::-webkit-scrollbar  {
                                      height: 5px;

                                    }
                                    #sd::-webkit-scrollbar-track {
                                      background:#d7faed; 
                                    }
                                    #sd::-webkit-scrollbar-thumb:hover {
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
                        <h1 id="title" class="h3 mb-0 text-gray-800"><span class="text-primary"><?php echo $ln.' '.$fn ?>'s </span> Referral Records</h1>
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
                        
                       
                          <div class="card-body "  >
                            
                             <div class="row">
                              
                                 <div class="col-md-12">
                                     <button class="btn btn-light mb-2" onclick="window.location.href='index.php' " style="font-size:14px"><i class="fas fa-arrow-left"></i></button> 
                                   
                                              <div class="table-responsive" id="sd">
                                                
                                              <table class="table table-striped table-sm " id="datatable">
                                            <thead>
                                              <tr class="table-success">
                                                  <th scope="col"></th>
                                                 <th scope="col">Status</th>
                                                  <th scope="col">No </th>
                                                    <th scope="col">Subject</th>
                                                    <th scope="col">Referred By</th>
                                                <th scope="col">Date-Created</th>
                                           
                                           
                                           
                                              </tr>
                                            </thead>
                                            <tbody>
                                                    <?php 

                                                        $getreferral_history = "SELECT * FROM `referral_history` where stud_id ='$tokenid'  ";
                                                         $greff = mysqli_query($con,$getreferral_history); 
                                                        
                                                     while($rows = mysqli_fetch_array($greff)){
                                                        $stat = $rows['status'];
                                                              ?>
                                                              <tr>
                                                                    <td>
                                                                        <?php 
                                                                        if($stat == 0){
                                                                            ?>
                                                                              <a href="JavaScript:void()" class="text-secondary"  style="font-size:13px;cursor: not-allowed;" ><i class="fas fa-print"></i></a>
                                                                            <?php

                                                                        }else{
                                                                              ?>
                                                                              <a href="referral-view.php?tokenid=<?php echo $rows['rh_id'] ?>&&id=<?php echo $rows['stud_id'] ?>&status=<?php echo $stat ?>" target="_blank" style="font-size:13px"><i class="fas fa-print"></i></a>
                                                                            <?php
                                                                        }

                                                                         ?>
                                                                        
                                                                        
                                                                      

                                                                    </td>
                                                                     <td>
                                                                        <?php 
                                                                        if($stat == 1){
                                                                            ?>
                                                                            <span class="badge badge-primary">New</span>
                                                                            <?php
                                                                        }else if ($stat == 0){
                                                                               ?>
                                                                            <span class="badge badge-warning">Unfinished</span>
                                                                            <?php 
                                                                        }else if ($stat == 2){
                                                                            ?>
                                                                            <span class="badge badge-info">Pending</span>
                                                                            <?php 
                                                                        }else if ($stat == 3){
                                                                                ?>
                                                                            <span class="badge badge-success">Completed</span>
                                                                            <?php 
                                                                        }


                                                                         ?>
                                                                        

                                                                    </td>
                                                                    <td>Ref_<?php echo $rows['rh_id']  ?></td>
                                                                    <td><span style="font-weight:bolder;"><?php echo $rows['subject'] ?></span></td>
                                                                    <td><span style="font-style:italic"><?php echo $rows['referred_by'] ?></span></td>
                                                                    <td><?php echo date('F j,Y',strtotime($rows['datecreated'])) ?></td>
                                                                   
                                                                
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
                    
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>

                <!-- Button trigger modal -->
<button type="button" class="btn btn-primary d-none" id="makereferral" data-toggle="modal" data-target="#exampleModal">
  
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
     
      <div class="modal-body">
          <button type="button" style="float:right;" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
         

        </button>

        <form action="submit.php" method="post" id="saverefhistory" onsubmit="return false">
            
            <input type="hidden" name="saverefhistory">
         <div class="container">
                
                <h5 style="font-weight:bolder;">Making a Referral</h5>
                <hr>
                <div class="card">
                    <div class="card-body">
                              <h6>

                    Name : <span style="font-weight:bolder" id="name"></span> <br>
                    Email : <span id="semail"></span>

                </h6>
                    </div>
                </div>

                <h6 class="mt-2">
                    Enter Subject : 
                    <br>
                     <input type="hidden" name="id" id="id">
                    <input type="hidden" name="ln" id="ln">
                     <input type="hidden" name="fn" id="fn">
                      <input type="hidden" name="mn" id="mn">
                       <input type="hidden" name="em" id="em">

                      

                    <input type="text" name="ref" id="ref" style="font-size:13px" class="form-control" required>

                </h6>
                

                <button class="btn btn-primary" id="createbtn" type="submit" style="font-size:13px;float: right;">Create</button>
              

          </div>
          </form>
      </div>
    
    </div>
  </div>
</div>

          
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
          
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

   $('#saverefhistory').on('submit', function(event){
      event.preventDefault();
        $('#createbtn').html('<div class="spinner-grow spinner-grow-sm" role="status"> <span class="visually-hidden"></span></div><div class="spinner-grow spinner-grow-sm" role="status"> <span class="visually-hidden"></span></div><div class="spinner-grow spinner-grow-sm" role="status"> <span class="visually-hidden"></span></div>');
             $.ajax({
                      url : $(this).attr('action'),
                       method: "POST",
                        data  : $(this).serialize(),
                        success : function(data){
                           window.location.href='makereferrals.php';
                           
                        // 


                       
                        }
                     })
      });
      
      $('#makeref').click(function() { 
            $('.ref').removeClass('d-none');
            $('#cancel').removeClass('d-none');


      
      })

      $('#cancel').click(function() { 
         $('.ref').addClass('d-none');
          $(this).addClass('d-none');
      })

      $('.ref').click(function() { 
         var id = $(this).data('id');
         var ln = $(this).data('ln');
         var fn = $(this).data('fn');
         var mn = $(this).data('mn');
         var em = $(this).data('em');
         var ref = $(this).data('referral');

         var name = ln +' '+fn+' '+mn;


        
           $.ajax({
                   url : "session.php",
                    method: "POST",
                     data  : {createref:1,id:id,ln:ln,fn:fn,mn:mn,em:em,ref:ref},
                     success : function(data){
                       if(data == "dontexist"){
                        $('#makereferral').click();
                        $('#id').val(id);
                        $('#name').text(name);
                        $('#semail').text(em);
                        $('#ln').val(ln);
                        $('#fn').val(fn);
                        $('#mn').val(mn);
                        $('#em').val(em);
                        $('#ref').val(ref);






                       }else if(data == "existing") {
                            window.location.href='makereferrals.php';

                       }

                        //
                     }
                  })
               



         //xaxaxaxaxaa


      })


  });
          </script>
             
           

           
            <!-- End of Footer -->
            <script src="../../offline/sweetalert.js"></script>
            <script src="../../js/jquery.js"></script>
         <link rel="stylesheet" type="text/css" href="../../offline/datatable.css"/>
 
<script type="text/javascript" src="../../offline/datatable.js"></script>








            <script type="text/javascript">
              
              $(document).ready(function() {
                
            let table = new DataTable('#datatable', {
      
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
   
</body>

</html>