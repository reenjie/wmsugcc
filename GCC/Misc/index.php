<?php 
session_start();
 include '../create_form/connect.php';
  if(!isset($_SESSION['admingcc_token'])) {
    header("location:../../session_end.html");
  }

 ?>
<!DOCTYPE html>
<html lang="en" >


 <?php include '../include/assets/head.php';
 include '../Classes/sql_query.php';
 ?>

<body id="page-top"   >

    <!-- Page Wrapper  -->
    <div id="wrapper" >

        <!--sidebar-->
     
        <!--sidebar-->
         
    <?php include '../include/assets/sidebar.php';?>
        <!--end of sidebar-->
        <!--end of sidebar-->


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content" >

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
                        <h1 class="h3 mb-0 text-gray-800">Misc</h1>
                        <!--<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
                    </div>

                    <!--contents here-->
                    <div class="row">
                       

                      <div class="col-md-8">
                        <!--Option Pressed output here-->
                         <div id="pressedcontents"></div> 
                        <!--End of Output-->
                      
                      </div>
                      <div class="col-md-4">
                          <div class="card shadow mb-4 " >
                            <div class="card-header">
                              <h6 class="m-0 font-weight-bold text-success" >Options</h6>
                            </div>
                            <div class="card-body">
                                  <a class="dropdown-item" id="myprofile" href="javascript:void(0)"><i class="far fa-user-circle"></i> Myprofile</a>
                                 <a class="dropdown-item" id="updatemyprofile" href="javascript:void(0)"><i class="fas fa-edit"></i> Update Myprofile</a>
                                  <a class="dropdown-item" href="javascript:void(0)" id="changepassword"><i class="fas fa-user-lock"></i> Change Password</a>
                                  
                              <a class="dropdown-item" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" href="javascript:void(0)"><i class="fas fa-list"></i> Advance Options </a>
                             
                        <div class="collapse show" id="collapseExample">
                          <div class="card card-body">
                              <div class="sidebar-heading" style="font-size: 12px">
                       MyProfile
                            </div>
                            <a href="javascript:void(0)" class="dropdown-item" id="changedisplayname">Change Display Name</a>
                             <div class="sidebar-heading" style="font-size: 12px">
                        Admin System Interface
                            </div>

                             <a href="javascript:void(0)" class="dropdown-item" id="changetitle">Change Banner </a>
                              <a href="javascript:void(0)" class="dropdown-item" id="changecolor">Change Color</a>
                              <a href="javascript:void(0)" class="dropdown-item"> 
                              <div class="custom-control custom-switch">

                                <?php 
                                 if(isset($_SESSION['advancesearch'])){
                            $varsearch = $_SESSION['advancesearch'];

                            if($varsearch =='enabled'){
                              ?>
                               <input type="checkbox" class="custom-control-input" id="customSwitches" checked="">
                            <label class="custom-control-label" for="customSwitches">Advance Search</label>
                              <?php
                            }else {
                               ?>
                                <input type="checkbox" class="custom-control-input" id="customSwitches" >
                            <label class="custom-control-label" for="customSwitches">Advance Search</label>
                              <?php
                            }
                          }
                                 ?>
                       
                      </div>
                              </a>
                               <div class="sidebar-heading" style="font-size: 12px">
                       System Email
                            </div>
                             <a class="dropdown-item" href="javascript:void(0)" id="createemail"><i class="fas fa-plus-circle"></i> Create</a>
                             <a class="dropdown-item" href="javascript:void(0)" id="sentemail"><i class="far fa-paper-plane"></i> Sent</a>
                            <!--  <a class="dropdown-item" href="javascript:void(0)" id="changeemail"><i class="fas fa-cog"></i> Change</a> -->
                          </div>
                        </div>
                           
                            <div class="dropdown-divider"></div>
                          
                             
                            </div>
                          </div>
                      </div>
                


                    </div> 
                    
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

       
        
      
      

       <style type="text/css">
         #selectchoice {
        padding: 4px;
        font-size: 12px;
        width: 100%;
        outline: none;
        border:1px solid #b4adae;
        margin-bottom: 5px;
        text-align: center;
        border-radius: 4px;
        background-color: #f2f4f7;
      }
      #selectchoice:hover {
        background-color: #f3f6fb;
      }
       #selectchoice1 {
        padding: 4px;
        font-size: 12px;
        width: 100%;
        outline: none;
        border:1px solid #b4adae;
        margin-bottom: 5px;
        text-align: center;
        border-radius: 4px;
        background-color: #f2f4f7;
      }
      #selectchoice1:hover {
        background-color: #f3f6fb;
      }
       </style>
        
 
     
        
   

          
            <!-- Modal -->
          
<?php 
//include '../Dashboard/notification.php';
 ?>
            <!-- Button trigger modal -->
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

            <script src="../../js/jquery.js"></script>
           
             <script type="text/javascript">
                      $(document).ready(function() {
                        $('#addnewadmin').on('submit', function(event){
                           event.preventDefault();
                           
                             var xhttp = new XMLHttpRequest();
                            xhttp.onreadystatechange = function() {
                             if (this.readyState == 4 && this.status == 200) {
                            const data = this.responseText;
                        
                           Swal.fire(
                        'New Admin Saved!',
                            'A new Administrator has saved successfully!',
                           'success'
                       ).then((result) => {
                        if (result.isConfirmed) {
                       document.getElementById("manageadmin").click();
                       document.getElementById("closemodaladd").click();

                           } })
                          
                                         }
                                      };
                              xhttp.open("POST",$(this).attr('action'),true);
                              xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                              xhttp.send($(this).serialize());
                                  
                                           

                           });

                        $('#editadminform').on('submit', function(event){
                           event.preventDefault();
                               
                                var xhttp = new XMLHttpRequest();
                            xhttp.onreadystatechange = function() {
                             if (this.readyState == 4 && this.status == 200) {
                            const data = this.responseText;
                      
                           Swal.fire(
                        ' Admin Updated!',
                            ' Administrator data has been modified successfully!',
                           'success'
                       ).then((result) => {
                        if (result.isConfirmed) {
                       document.getElementById("manageadmin").click();
                       document.getElementById("closemodaledit").click();

                           } })
                          
                                         }
                                      };
                              xhttp.open("POST",$(this).attr('action'),true);
                              xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                              xhttp.send($(this).serialize()); 




                           });

                          $('#addadmin').on('hidden.bs.modal', function (e) {
                          $('.ad1').val('');
                      })


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


                      }); </script>

                        <?php 
                        if(isset($_POST['profile'])){ 
                          ?>
                          <script type="text/javascript">
                            
                              $(document).ready(function() {
                                      myprofile();
                                       function myprofile(){
                       
                         $.ajax({
                                 url : "contents.php",
                                  method: "POST",
                                   data  : {myprofile:1},
                                   success : function(data){
                               $('#pressedcontents').html(data);
                                   }
                                })
                        
                          
                    }
                                  });    
                                  
                          </script>
                          <?php
                          
                        }else if(isset($_POST['settings'])){ 
                            ?>
                          <script type="text/javascript">
                            
                              $(document).ready(function() {

                                     settings();
                                       function settings(){
                               $.ajax({
                                 url : "contents.php",
                                  method: "POST",
                                   data  : {settings:1},
                                   success : function(data){
                               $('#pressedcontents').html(data);
                                   }
                                })
                          }   
                                  });    
                                  
                          </script>
                          <?php
                        }
                         ?>

              <script type="text/javascript">
                  $(document).ready(function() {

                    
                    //pressedcontents

                    $('#myprofile').click(function() { 
                    myprofile();
                    })
                  
                    $('#updatemyprofile').click(function() { 
                      editmyprofile();
                    })
                    $('#changepassword').click(function() { 
                      changepassword();
                    })
                    $('#changedisplayname').click(function() { 
                      changedisplayname();
                    })
                    $('#changetitle').click(function() { 
                      changetitle();
                    })
                    $('#changecolor').click(function() { 
                      changecolor();
                    })
                     $('#customSwitches').click(function() {
                          if($(this).prop("checked") == true) {
                                  
                                                               $.ajax({
                                                                       url : "Manage.php",
                                                                        method: "POST",
                                                                         data  : {setenable:1},
                                                                         success : function(data){
                                                                      Swal.fire(
                                                                              'Advance Search!',
                                                                              'Enabled Successfully!',
                                                                              'success'
                                                                            ).then((result) => {
                                                                      if (result.isConfirmed) {
                                                                        location.reload();
                                                                      } })
                                                                         }
                                                                      })
                                                                 
                                                                                           
                             }
                          else if($(this).prop("checked") == false) {
                                  $.ajax({
                                                                       url : "Manage.php",
                                                                        method: "POST",
                                                                         data  : {setdisable:1},
                                                                         success : function(data){
                                                                Swal.fire(
                                                                              'Advance Search!',
                                                                              'Disabled Successfully!',
                                                                              'success'
                                                                            ).then((result) => {
                                                                      if (result.isConfirmed) {
                                                                        location.reload();
                                                                      } })
                                                                         }
                                                                      })                         
                           }
                        });
                     $('#createemail').click(function() { 
                      createemail();
                     })
                     $('#sentemail').click(function() { 
                      sentemail();
                     })
                     $('#changeemail').click(function() { 
                     changeemail();
                     })
                    
                     $('#myprofile').click(function() { 
                     myprofile();
                     }) 
                    
                    function myprofile(){
                       
                         $.ajax({
                                 url : "contents.php",
                                  method: "POST",
                                   data  : {myprofile:1},
                                   success : function(data){
                               $('#pressedcontents').html(data);
                                   }
                                })
                        
                          
                    }
                    function editmyprofile(){
                         $.ajax({
                                 url : "contents.php",
                                  method: "POST",
                                   data  : {editmyprofile:1},
                                   success : function(data){
                               $('#pressedcontents').html(data);
                                   }
                                })
                    }
                    function changepassword(){
                      $.ajax({
                                 url : "contents.php",
                                  method: "POST",
                                   data  : {changepassword:1},
                                   success : function(data){
                               $('#pressedcontents').html(data);
                                   }
                                })
                    }
                    function changedisplayname(){
                       $.ajax({
                                 url : "contents.php",
                                  method: "POST",
                                   data  : {changedisplayname:1},
                                   success : function(data){
                               $('#pressedcontents').html(data);
                                   }
                                })
                    }
                    function changetitle(){
                       $.ajax({
                                 url : "contents.php",
                                  method: "POST",
                                   data  : {changetitle:1},
                                   success : function(data){
                               $('#pressedcontents').html(data);
                                   }
                                })
                    }
                    function changecolor(){
                      $.ajax({
                                 url : "contents.php",
                                  method: "POST",
                                   data  : {changecolor:1},
                                   success : function(data){
                               $('#pressedcontents').html(data);
                                   }
                                })
                    }
                    
                    function createemail(){
                      $.ajax({
                                 url : "contents.php",
                                  method: "POST",
                                   data  : {createemail:1},
                                   success : function(data){
                               $('#pressedcontents').html(data);
                                   }
                                })
                    }
                    function sentemail(){
                      $.ajax({
                                 url : "contents.php",
                                  method: "POST",
                                   data  : {sentemail:1},
                                   success : function(data){
                               $('#pressedcontents').html(data);
                                   }
                                })
                    }
                    function changeemail(){
                      $.ajax({
                                 url : "contents.php",
                                  method: "POST",
                                   data  : {changeemail:1},
                                   success : function(data){
                               $('#pressedcontents').html(data);
                                   }
                                })
                    }
                   
                     function settings(){
                               $.ajax({
                                 url : "contents.php",
                                  method: "POST",
                                   data  : {settings:1},
                                   success : function(data){
                               $('#pressedcontents').html(data);
                                   }
                                })
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