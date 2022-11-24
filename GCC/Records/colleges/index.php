<?php 
session_start();
$collegess = 1;
 include '../../create_form/connect.php';
 if(!isset($_SESSION['admingcc_token'])) {
    header("location:../../../session_end.html");
  }
 ?>
<!DOCTYPE html>
<html lang="en">


 <?php $coll = 1; include '../../include/assets/head.php';?>
  <style type="text/css">
    @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap');
    *{
      font-family: 'Cairo', sans-serif;
    }
 </style>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!--sidebar-->
      
        <!--sidebar-->
         
      <ul class="navbar-nav  sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: <?php echo $_SESSION['sidebar_color'] ?>" >

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
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
             <!-- Heading -->
            <div class="sidebar-heading">
               Components
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item ">
                <a class="nav-link" href="../../Records/">
                    <i class="fas fa-clipboard-list"></i>
                    <span>Records</span></a>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-brush"></i>
                    <span>Manage Contents</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Contents:</h6>
                         <a class="collapse-item" href="../../Homepage/">Homepage</a>
                         <a class="collapse-item " href="../../Pages/">Pages</a>
                        <a class="collapse-item" href="../../Calendar/">Calendar</a>
                        <a class="collapse-item" href="../../Announcement/">Announcement</a>
                        <a class="collapse-item " href="../../Newsfeed">News Feed</a>
                      
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


              <li class="nav-item">
                <a class="nav-link" href="../../Services/">
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
        <!--end of sidebar-->


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                    <!--topbar-->
            <?php  include '../../include/assets/topbar.php';?>
                    <!--end of topbar-->




                <!-- Begin Page Content -->
                <div class="container-fluid" >
                   <span class="text-gray-800" style="font-weight: bold;" id="tryfound"></span>
                     <div class="advancecontent_search row d-none" id="content_search" data-role="searchfor"> </div> 
                    
                      <div class="051715" id="051715">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Records</h1>
                       <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
                    </div>

                   

                     <div class="row">
                        <div class="container">
                            <nav aria-label="breadcrumb">
                              <ol class="breadcrumb">
                                <li class="breadcrumb-item " ><a href="../../Records">Shifting Request</a></li>
                                <li class="breadcrumb-item active" aria-current="page" ><a href="../PDS.php">Personal Data Sheets</a></li>
                                <li class="breadcrumb-item active"><a href="../shifting_form.php">Shifting Forms</a></li>
                              
                                 <li class="breadcrumb-item"><a href="../counseling.php">Counseling</a></li>
                                  <li class="breadcrumb-item">Colleges</li>
                                <li class="breadcrumb-item"><a href="../coordinator.php">Coordinator Accounts</a></li>
                                <li class="breadcrumb-item"><a href="../logs.php">Logs</a></li>
                                  <li class="breadcrumb-item"><a href="../filter.php">Filtering</a></li>
                               
                              </ol>
                            </nav>
                    
                        
                     </div> 

              
                      
                     

               
                    </div> 
                     <!-- Content Row -->
                      <div class="container" id="stretch">
                        
                         <div class="card shadow-sm" >
                            <div class="card-body table-responsive">
                                <button class="btn btn-primary mb-2"  data-toggle="modal" data-target="#addnewcollege" data-backdrop="static" data-keyboard="false" style="font-size: 12px" >Add new College</button>
                                <table class="table  table">
                                <thead>
                                  <tr>
                                    <th scope="col">College</th>
                                    <th scope="col">Date-Created</th>
                                       <th scope="col">Courses</th>
                                  
                                  </tr>
                                </thead>
                                <tbody id="tablecontent">
                                   <tr><td><div class="spinner-grow spinner-grow-sm" role="status">
  <span class="visually-hidden"></span>
</div><div class="spinner-grow spinner-grow-sm" role="status">
  <span class="visually-hidden"></span>
</div><div class="spinner-grow spinner-grow-sm" role="status">
  <span class="visually-hidden"></span>
</div><div class="spinner-grow spinner-grow-sm" role="status">
  <span class="visually-hidden"></span>
</div><div class="spinner-grow spinner-grow-sm" role="status">
  <span class="visually-hidden"></span>
</div></td><td><div class="spinner-grow spinner-grow-sm" role="status">
  <span class="visually-hidden"></span>
</div><div class="spinner-grow spinner-grow-sm" role="status">
  <span class="visually-hidden"></span>
</div><div class="spinner-grow spinner-grow-sm" role="status">
  <span class="visually-hidden"></span>
</div><div class="spinner-grow spinner-grow-sm" role="status">
  <span class="visually-hidden"></span>
</div><div class="spinner-grow spinner-grow-sm" role="status">
  <span class="visually-hidden"></span>
</div></td><td><div class="spinner-grow spinner-grow-sm" role="status">
  <span class="visually-hidden"></span>
</div><div class="spinner-grow spinner-grow-sm" role="status">
  <span class="visually-hidden"></span>
</div><div class="spinner-grow spinner-grow-sm" role="status">
  <span class="visually-hidden"></span>
</div><div class="spinner-grow spinner-grow-sm" role="status">
  <span class="visually-hidden"></span>
</div><div class="spinner-grow spinner-grow-sm" role="status">
  <span class="visually-hidden"></span>
</div></td></tr>

                                </tbody>
                              </table>


                            </div> 
                            
                         </div> 
                         

					             </div> 

 <script src="../../../js/jquery.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    if ($(window).width() < 768) {
   $('#stretch').removeClass('container');
}
else {
    $('#stretch').addClass('container');
}
  });
        
        
</script>
                
            

                  
                <!-- /.container-fluid -->
              </div>


            </div>

            <!-- Modal -->
            <div class="modal fade" id="editcollege" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  
                   <form method="post" action="action.php" id="updatecollege" onsubmit="return false">
                                          
                  <input type="hidden" name="updatecollege">
                  
                  <div class="modal-body">
                   
                  <h5 style="font-style: italic;">Updating <span></span></h5>

                    <h6>College</h6>
                    <input type="text" name="uptcollege" class="form-control" id="uptcollege" required="">

                    <h6>Theme/Color</h6>
                    <input type="color" name="uptcolor" class="form-control" id="uptcolor" >
                    <input type="hidden" name="uptcollegeid" id="uptcollegeid">
                        
                        <span class="text-success d-none" id="colorup">Color Updated!</span>

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-light text-secondary" style="font-size:12px" data-dismiss="modal">Close</button>
                     <button type="button" class="btn btn-light text-danger" id="btndeletec" style="font-size:12px" >Delete</button>
                    <button type="submit" class="btn btn-light text-info d-none" id="btnsavechangesupt" style="font-size:12px">Save changes</button>
                  </div>

                    </form>
                </div>
              </div>
            </div>

            
            <!-- Modal -->
            <div class="modal fade" id="addnewcollege" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                 
                  <div class="modal-body">
                   
                <form method="post" action="action.php" id="savenewcollege" onkeydown="return event.key != 'Enter';" onsubmit="return false">
                                            
                  
                      <input type="hidden" name="savenewcollege">
                      <h6 >Adding new College </h6>
                      <label>College : </label>
                      <input type="text" class="form-control " required="" name="newcollege" id="collegecheck" style="font-size: 14px;" required>
                        

                        <label>Select Color: </label>
                      <input type="color" class="form-control " required="" name="collegecolor" value="#17711e" id="" style="font-size: 14px;">

                      <hr>
             
                    <button type="submit" class="btn btn-primary d-none" id="btnaddcollege" style="font-size:12px;float: right">Add</button>
                      <button type="button" class="btn btn-secondary mr-2" style="font-size:12px;float: right;" data-dismiss="modal">Close</button>
                     </form>
                   
                  </div>
                
                </div>
              </div>
            </div>

            <div class="modal fade" id="addnewcourse" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
               
                  <div class="modal-body">
                     <form method="post" action="action.php" id="savenewcourse" onkeydown="return event.key != 'Enter';" onsubmit="return false">
                                            
                  
                      <input type="hidden" name="savenew">
                      <h6 >Adding new courses for <span style="font-style: italic; font-weight: bold" class="text-success" id="collegename"></span> .</h6>
                      <label>Course : </label>
                      <input type="text" class="form-control " required="" name="newcourse" id="cval" style="font-size: 14px;text-transform: uppercase;">
                      <input type="hidden" name="collegeId" id="cid">
                      <hr>
             
                    <button type="submit" class="btn btn-primary d-none" id="btnadd" style="font-size:12px;float: right">Add</button>
                      <button type="button" class="btn btn-secondary mr-2" style="font-size:12px;float: right;" data-dismiss="modal">Close</button>
                       </form>
                  </div>
               
                </div>
              </div>
            </div>


                                                                         <!-- Modal -->
        <div class="modal fade" id="addadmingc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h6>Add new GC Administrator</h6>
              </div>
               <form method="post" action="save.php" onsubmit="return false" onkeydown="return event.key != 'Enter';" id="addnewadmingc">
                   <input type="hidden" name="addnewadmin">                   
              
              
              <div class="modal-body">
                
                 <div class="container">
                        
                        <div class="row">
                            <div class="col-md-6">
                    <h6 style="font-size: 12px">Enter Email</h6>
                    <input type="email" name="adem" class="form-control adgcval" id="adgcvalem" style="font-size: 12px" required="" >
                            </div>
                            <div class="col-md-6">
                                  <h6 style="font-size: 12px">College :</h6>
                                  <h6 style="font-size:16px;text-align: center;" class="text-success" id="college_name"><?php //echo $college   ?></h6>
                                        
                            </div>
                            
                            <input type="hidden" name="cids" id="cids">
                            <div class="col-md-4">
                                  <h6 class="mt-2" style="font-size: 12px">Enter Last Name</h6>
                    <input type="text" name="adln" class="form-control adgcval" style="font-size: 12px" required="" >
                            </div>
                            <div class="col-md-4">
                                  <h6 class="mt-2" style="font-size: 12px">Enter First Name</h6>
                    <input type="text" name="adfn" class="form-control adgcval" style="font-size: 12px" required="" >
                            </div>
                            <div class="col-md-4">
                                  <h6 class="mt-2" style="font-size: 12px">Enter Middle Name</h6>
                    <input type="text" name="admn" class="form-control adgcval" style="font-size: 12px"  >
                            </div>

                            <div class="col-md-6">
                                 <h6 class="mt-2" style="font-size: 12px">Contact No</h6>
                               
                                <input type="text" name="cn" class="form-control adgcval" maxlength="11" style="font-size:12px" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '/');" required>
                                
                            </div>
                            <div class="col-md-6">

                                  <h6 class="mt-2" style="font-size: 12px">Effective-Date</h6>
                                <input type="date" name="ed" class="form-control adgcval" style="font-size:12px" required>
                                
                            </div>


                        </div>

                 

                    <br style="user-select: none">
                
                
                   <input type="hidden" name="adty" value="GC">
                   

                  
                  
                  

                

                 </div> 
                 

          
          
               
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="closemodaladdgc" style="font-size:12px" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" style="font-size:12px"><i class="fas fa-plus-circle"></i> Add</button>
              </div>

               </form>
            </div>
          </div>
        </div>



         <!-- Modal -->
        <div class="modal fade" id="replaceadmingc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h6>Replace <span class="text-primary college_" ></span> : GC Administrator</h6>
              </div>

              <div class="card shadow-sm mb-2">
                  <div class="card-body">
                      <h6 style="font-size:13px">Current Admin : <span style="font-size:12px;margin-right: 20px; font-weight:bolder" id="name_"> </span> Contact No: <span id="contact_" style="font-size:12px;margin-right: 20px;font-weight:bolder"></span> Email :<span id="email_" style="font-size:12px;margin-right: 20px;font-weight:bolder">  </span> </h6>


                  </div>
              </div>
               <form method="post" action="action.php" onsubmit="return false" onkeydown="return event.key != 'Enter';" id="rpaddnewadmingc">
                   <input type="hidden" name="replaceadmin">                   
              
              
              <div class="modal-body">
                
                 <div class="container">
                    <?php 

                  

                                           

                                     
                                  

                     ?>
                     <input type="hidden" name="id_" id="id_rp">
                        
                        <div class="row">
                            <div class="col-md-6">
                    <h6 style="font-size: 12px">Enter Email</h6>
                    <input type="email" name="rpadem" class="form-control ad1" style="font-size: 12px" required="" >
                            </div>
                            <div class="col-md-6">
                                  <h6 style="font-size: 12px">College</h6>
                      <select class="form-control" style="font-size: 12px"  id="collid">
                        <option class="college_"></option>
                    </select>    
                    <input type="hidden" name="rpcoll" value="" id="collid_">
                            </div>

                            <div class="col-md-4">
                                  <h6 class="mt-2" style="font-size: 12px">Enter Last Name</h6>
                    <input type="text" name="rpadln" class="form-control ad1" style="font-size: 12px" required="" >
                            </div>
                            <div class="col-md-4">
                                  <h6 class="mt-2" style="font-size: 12px">Enter First Name</h6>
                    <input type="text" name="rpadfn" class="form-control ad1" style="font-size: 12px" required="" >
                            </div>
                            <div class="col-md-4">
                                  <h6 class="mt-2" style="font-size: 12px">Enter Middle Name</h6>
                    <input type="text" name="rpadmn" class="form-control ad1" style="font-size: 12px"  >
                            </div>

                            <div class="col-md-6">
                                 <h6 class="mt-2" style="font-size: 12px">Contact No</h6>
                               
                                <input type="text" name="rpcn" class="form-control" maxlength="11" style="font-size:12px" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '/');" required>
                                
                            </div>
                            <div class="col-md-6">

                                  <h6 class="mt-2" style="font-size: 12px">Effective-Date</h6>
                                <input type="date" name="rped" class="form-control" style="font-size:12px" required>
                                
                            </div>


                        </div>

                 

                    <br style="user-select: none">
                
                
                   <input type="hidden" name="rpadty" value="GC">
                   

                  
                  
                  

                

                 </div> 
                 

          
          
               
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="closemodaladd" style="font-size:12px" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" style="font-size:12px"><i class="fas fa-plus-circle"></i> Add</button>
              </div>

               </form>
            </div>
          </div>
        </div>



               <script src="../../../js/jquery.js"></script>
            <script src="../../../offline/sweetalert.js"></script>
          

        
                <script type="text/javascript">
                        $(document).ready(function() {


                     $('#rpaddnewadmingc').on('submit', function(event){
                           event.preventDefault();
                           
                             var xhttp = new XMLHttpRequest();
                            xhttp.onreadystatechange = function() {
                             if (this.readyState == 4 && this.status == 200) {
                            const data = this.responseText;
                      

                          
                           Swal.fire(
                        'Replaced Admin!',
                            'A new Administrator has saved and replaced successfully!',
                           'success'
                       ).then((result) => {
                        if (result.isConfirmed) {
                     
                             location.reload();


                           } })

                   

                        
                                        var xhttp = new XMLHttpRequest();
                                     xhttp.onreadystatechange = function() {
                                      if (this.readyState == 4 && this.status == 200) {
                                     const datas = this.responseText;
                                   
                                       //  // SENDING CREDENTIALS
                                   
                                                  }
                                               };
                                       xhttp.open("POST", "../../mailer/send_credentials.php",true);
                                       xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                                       xhttp.send("sendcredentials=1&email="+data);
                                       
                          
                                         }
                                      };
                              xhttp.open("POST",$(this).attr('action'),true);
                              xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                              xhttp.send($(this).serialize());
                                  
                                       

                           });


                            $('#uptcolor').change(function(){
                                var val = $(this).val();
                                var cid = $('#uptcollegeid').val();


                                 $.ajax({
                                 url : "action.php",
                                  method: "POST",
                                 data  : {changecolor:1,val:val,cid:cid},
                                  success : function(data){
                                      $('#colorup').removeClass('d-none');
                                      setInterval(function(){
                                            location.reload();
                                      },2000);  
                                   }
                                 })
                                              
                            })



                        $('#updatecollege').on('submit', function(event){
                           event.preventDefault();
                                  $.ajax({
                                           url : $(this).attr('action'),
                                            method: "POST",
                                             data  : $(this).serialize(),
                                             success : function(data){
                                       $('#editcollege').modal('hide');
                                             collegetablecontent();
                                           Swal.fire(
                                            'College Updated!',
                                            'It has been modified Successfully!',
                                            'success'
                                          )
                                             }
                                          })
                           });

                        $('#uptcollege').keyup(function(){ 
                          var val = $(this).val();

                          
                              $.ajax({
                               url : "action.php",
                                method: "POST",
                                 data  : {checkexistcollege:1,val:val},
                                 success : function(data){
                      if(data=="1"){
                        $('#btnsavechangesupt').addClass('d-none');
                      
                          }else {
                          $('#btnsavechangesupt').removeClass('d-none');
                          }

                                 }
                              })
                             
                              

                        })
                          $('#btndeletec').click(function() { 
                            var cid = $(this).val();
                            
                            Swal.fire({
                          title: 'Are you sure?',
                          text: "When you delete this college, you also delete all of the courses and coordinator that are associated with it!",
                          icon: 'warning',
                          showCancelButton: true,
                          confirmButtonColor: '#e74a3b',
                          cancelButtonColor: '#f6c23e',
                          confirmButtonText: 'Yes, delete it!'
                        }).then((result) => {
                          if (result.isConfirmed) {
                           
                               $.ajax({
                                       url : "action.php",
                                        method: "POST",
                                         data  : {deletecollegeanditscourses:1,id:cid},
                                         success : function(data){
                                          // $('#editcollege').modal('hide');
                                          
                               Swal.fire(
                              'Deleted!',
                              'College and its courses has been successfully Deleted!',
                              'success'
                            ).then((result) => {
                          if (result.isConfirmed) {
                            location.reload();
                          }
                      });
                           //collegetablecontent();

                                         }
                                      })
                                  
                                


                          }
                        })


                          })

                          $('#collegecheck').keyup(function(){ 
                            var val = $(this).val();
                                if(val == ''){
                        $('#btnaddcollege').addClass('d-none');
                    }else {
                         $.ajax({
                               url : "action.php",
                                method: "POST",
                                 data  : {checkexistcollege:1,val:val},
                                 success : function(data){
                      if(data=="1"){
                        $('#btnaddcollege').addClass('d-none');
                      
                      }else {
                      $('#btnaddcollege').removeClass('d-none');
                      }

                                 }
                              })
                    }
                          
                          })


                          $('#editcollege').on('hidden.bs.modal', function (e) {
                          $('#btnsavechangesupt').addClass('d-none');
                        })

                           $('#addnewcollege').on('hidden.bs.modal', function (e) {
                          $('#collegecheck').val('');
                        })

                            $('#cval').keyup(function(){ 
                    var val = $(this).val();
                  
                    if(val == ''){
                        $('#btnadd').addClass('d-none');
                    }else {
                         $.ajax({
                               url : "action.php",
                                method: "POST",
                                 data  : {checkexist:1,val:val},
                                 success : function(data){
                      if(data=="1"){
                        $('#btnadd').addClass('d-none');
                      
                      }else {
                      $('#btnadd').removeClass('d-none');
                      }
                                 }
                              })
                    }
                    
                  
                  })
                            

                             $('#savenewcollege').on('submit', function(event){
                             event.preventDefault();
                                    $.ajax({
                                             url :$(this).attr('action'),
                                              method: "POST",
                                               data  : $(this).serialize(),
                                               success : function(data){
                                        
                                          // $('#addnewcollege').modal('hide');
                                            
                                           Swal.fire(
                                            'New College Saved!',
                                            'It has been added into the list!',
                                            'success'
                                          ).then((result) => {
                          if (result.isConfirmed) {
                          location.reload();
                          }

                      });
                                               }
                                            })
                             });




                          $('#savenewcourse').on('submit', function(event){
                             event.preventDefault();
                                    $.ajax({
                                             url :$(this).attr('action'),
                                              method: "POST",
                                               data  : $(this).serialize(),
                                               success : function(data){
                                        
                                        //   $('#addnewcourse').modal('hide');
                                            
                                           Swal.fire(
                                            'New Course Saved!',
                                            'It has been added into the list!',
                                            'success'
                                          ).then((result) => {
                          if (result.isConfirmed) {
                           location.reload();
                          }

                      });

                                               }
                                            })
                             });

                          $('#addnewcourse').on('hidden.bs.modal', function (e) {
                          $('#cval').val('');
                        })



                      //  tablecontent();
                        function coursetablecontent(){
                           $.ajax({
                                     url : "action.php",
                                      method: "POST",
                                       data  : {gettablecontent:1},
                                       success : function(data){
                          $('#tablecontent').html(data);
                                       }
                                    })

                             

                                              
                              
                              
                        }
                        collegetablecontent();

                          function collegetablecontent(){
                           $.ajax({
                                     url : "action.php",
                                      method: "POST",
                                       data  : {getcollegetablecontent:1},
                                       success : function(data){
                          $('#tablecontent').html(data);
                                       }
                                    })

                             

                                              
                              
                              
                        }


                        advancesearchcontent();
                           function advancesearchcontent(){
                               
                                
                                  var xhttp = new XMLHttpRequest();
                                 xhttp.onreadystatechange = function() {
                                  if (this.readyState == 4 && this.status == 200) {
                                 const data = this.responseText;
                               
                              
                              $('.advancecontent_search').html(data);
                              
                                              }
                                           };
                                   xhttp.open("POST", "../../Dashboard/advancesearch.php",true);
                                   xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                                   xhttp.send("searchfor=1");
                                       
                                                
                           }

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
                             
                         
                     


                      });
                      
                     
                                     
                            
                    </script>

         
            <script type="text/javascript">
                
                $(document).ready(function() {
                      $('.art').click(function() { 
                           $('#cont1').addClass('show');  
                           $('#cont1').addClass('active'); 
                           $(this).addClass('active');
                            $('#cont2').removeClass('show');  
                           $('#cont2').removeClass('active'); 
                           $('.peer').removeClass('active');
                         
                          })  
                          $('.peer').click(function() { 
                             $('#cont1').removeClass('show');  
                           $('#cont1').removeClass('active'); 
                           $('.art').removeClass('active');
                            $('#cont2').addClass('show');  
                           $('#cont2').addClass('active'); 
                           $(this).addClass('active');
                          
                            }) 
                          //// Sidebar Funcitons
                             
                           
                     
                         ///////////////////////////////
                           
                
                      });      
                      
            </script>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include '../../include/assets/footer.php';?>
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
   <?php include '../../Dashboard/logoutmodal.php';  ?>

<?php 
//include 'notification.php';
 ?>
<script src="../../sweetalert.js"></script>
 <script type="text/javascript">
   
   $(document).ready(function() {
         
         });      
         
 </script>


    <!-- Bootstrap core JavaScript-->
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../../js/demo/chart-area-demo.js"></script>
    <script src="../../js/demo/chart-pie-demo.js"></script>
    <script type="text/javascript">
          $(document).ready(function() {
              if($(window).width() <= 768){
               $('#accordionSidebar').addClass('toggled');
              }
        
          });
    </script>
</body>

</html>