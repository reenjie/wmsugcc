<?php 

session_start();
  if(!isset($_SESSION['admingcc_token'])) {
    header("location:../../session_end.html");
  }
 unset($_SESSION['approve']);
 include '../create_form/connect.php';
 
  /*  if(!isset($_SESSION['form_id'])){


       

        $strict = " UPDATE `form_classification` SET `status`=NULL WHERE csform_id= '$csform'  ";
                 mysqli_query($con,$strict); 
         unset($_SESSION['form_id']);        

    }*/

 ?>
<!DOCTYPE html>
<html lang="en">


 <?php include '../include/assets/head.php';?>
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
        <?php include '../include/assets/sidebar.php';?>
        <!--end of sidebar-->


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column" style="background:url('../img/nordwood-themes-KcsKWw77Ovw-unsplash.jpg');background-position: center;background-size: cover;background-attachment: fixed;">

            <!-- Main Content -->
            <div id="content">

                    <!--topbar-->
            <?php include '../include/assets/topbar.php';?>
                    <!--end of topbar-->





                <!-- Begin Page Content -->
                <div class="container-fluid">
                     <span class="text-gray-800" style="font-weight: bold;" id="tryfound"></span>
                     <div class="advancecontent_search row d-none" id="content_search" data-role="searchfor"> </div> 
                    
                      <div class="051715" id="051715"> 

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0  text-gray-800">Forms</h1>
                        <!--<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
                    </div>

                    <!--contents here //// OFF-->

                     <div class="row d-none">
                        
                         <div class="col-md-12 ">
                            <div class="card shadow mb-2">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Shifting Request Forms</h6>
                                </div>
                                <div class="card-body" style="font-size: 14px">
                                 <div class="container" id="contentss" >
                                  
                                   <form method="post" action="action.php" id="approveshiftingforms" onsubmit="return false">
                                                          
                                  <input type="hidden" name="approve">
                                  
                                      <?php 
                                       include '../Classes/sql_query.php';
                                    $fetch = new sqlquery();
                                     $fetch -> requestforms();
                                       ?>

                                        <div class="card" style="outline: none;border: none">
                                           <div class="card-body">
                                            <span style="font-size: 12px;font-style: italic">On selected :</span>
                                             <button type="submit" name="approve" id="approvesub" class="btn btn-light text-primary" style="font-size: 12px">Approve</button>
                                           </div> 
                                           
                                        </div> 
                                        
                                   </form> 




                                     </div> 

                                </div>


                            </div>
                           
                         </div> 
                         
                         
                     </div> 
                         <!--contents here //// OFF-->


                    <div class="row">
                     
                        
                       
                            
                      
                             
                       
                         <div class="col-md-8">
                            
                  <style type="text/css">
     {

    }
                                                                #contentss::-webkit-scrollbar  {
                                                                          width: 2px;
                                                                          height: 2px;
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
                                                                        #contentss {
                                                                          overflow-x: scroll;
                                                                        }
</style>          
                                 
                            
                             
                         

                            <div class="card mt-2 mb-4">
                                
                                  <div class="card-body">
                                    <h6>Manage</h6>
                                    <hr>

                                       <div class="row">
                                          <div class="col-md-6">
                                              
                                               <div class="card shadow" style="height: 180px;">
                                                  <div class="card-body">
                                                     
                                      <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="PDScontrol" >
                            <label class="custom-control-label" for="PDScontrol"  style="font-size: 13px;"><span class="text-secondary">PDS control  </span></label>

                            <hr>
                            <span style="font-size: 12px">
                              If Uncheck, the PDS will be unavailable for users to fill out.
                              <br>
                              Only for those who did not fill up yet. 
                            </span>
                          </div>        

                               
                                                </div> 
                                                  
                                               </div> 
                                               

                                          </div> 
                                          <div class="col-md-6">
                                            
                                             <div class="card shadow" style="height: 180px;">
                                                <div class="card-body">
                                                    <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="shiftcontrol" >
                            <label class="custom-control-label" for="shiftcontrol" style="font-size: 13px"><span class="text-secondary"> Shifting Form control </span></label>
                          </div>    
                          <hr>
                          <span style="font-size: 12px">
                              If Unchecked, the Shifting Form will be unavailable for users to fill out. 
                            </span>

                                                </div> 
                                                
                                             </div> 
                                             

                                          </div> 
                                          
                                       </div> 
                                       

                                  </div> 
                                  
                               
                                 
                            </div>

                                <div class="card shadow-sm mb-4">
                                <div class="card-body">
                                    <h6>Customize static forms</h6>
                                   <div class="row">
                                 
                                   <?php 

                  $fetch ->manage_form_content_admin();
                                 ?>

                                 </div> 
                                </div> 
                                  

                             </div> 

                             

                              
                            
                             
                             </div> 

                             <script type="text/javascript">
                               $('.exitnow').click(function(){
          var csformid = $(this).data('csformid');

              var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
             if (this.readyState == 4 && this.status == 200) {
            const data = this.responseText;
          location.reload();



                         }
                      };
              xhttp.open("POST", "../Manage_pds/form_session.php",true);
              xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
              xhttp.send("saveexit=1&csformid="+csformid);

    })
                               $(document).ready(function() {
                                        $('#shiftcontrol').click(function() {
 

                                             if($(this).prop("checked") == true) {
                                                    var check = "check"; 
                                                 
                                                     $.ajax({
                                                             url : "action.php",
                                                              method: "POST",
                                                               data  : {shiftcontrol:1,check:check},
                                                               success : function(data){
                                                          
                                                               }
                                                            })
                                                     
                                                      

                                                                                
                                                }
                                             else if($(this).prop("checked") == false) {
                                                      var check = "uncheck"; 
                                                 
                                                     $.ajax({
                                                             url : "action.php",
                                                              method: "POST",
                                                               data  : {shiftcontrol:1,check:check},
                                                               success : function(data){
                                                        
                                                               }
                                                            })
                                                                               
                                              }
                                           });

                                              $('#PDScontrol').click(function() {

                                             if($(this).prop("checked") == true) {
                                                    var check = "check"; 
                                                 
                                                     $.ajax({
                                                             url : "action.php",
                                                              method: "POST",
                                                               data  : {pdscontrol:1,check:check},
                                                               success : function(data){
                                                          
                                                               }
                                                            })
                                                     
                                                      

                                                                                
                                                }
                                             else if($(this).prop("checked") == false) {
                                                      var check = "uncheck"; 
                                                 
                                                     $.ajax({
                                                             url : "action.php",
                                                              method: "POST",
                                                               data  : {pdscontrol:1,check:check},
                                                               success : function(data){
                                                        
                                                               }
                                                            })
                                                                               
                                              }
                                           });

                                        shift();
                                        function shift(){

                                           $.ajax({
                                                             url : "action.php",
                                                              method: "POST",
                                                               data  : {shiftcontrolck:1},
                                                               success : function(data){
                                                            
                                                            if(data == "checkshift"){
                                                           $('#shiftcontrol').prop('checked',true);
                                                            }else if (data == "uncheckshift"){
                                                             $('#shiftcontrol').prop('checked',false);
                                                            }
                                                               }
                                                            })

                                        }
                                        //PDScontrol
                                        pds();

                                        function pds(){
                                                $.ajax({
                                                             url : "action.php",
                                                              method: "POST",
                                                               data  : {pdscontrolck:1},
                                                               success : function(data){
                                                            
                                                            if(data == "checkpds"){
                                                           $('#PDScontrol').prop('checked',true);
                                                            }else if (data == "uncheckshift"){
                                                             $('#PDScontrol').prop('checked',false);
                                                            }
                                                               }
                                                            })
                                        }
                                        
                                     }); 

                                     
                             </script>
                           
    
                        
                         <div class="col-md-4">
                             
                              <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Guidance Counceling Center Forms</h6>
                                </div>
                                <div class="card-body" style="font-size: 14px">
                                    <img src="../img/undraw_fill_form_re_cwyf.png" class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;">
                                    Create custom forms for surveys and questionnaires at no extra cost.
                                    Select from multiple question types, drag-and-drop to reorder questions and customize values as easily as pasting a list.

                                    <p><br></p>
                                    <button class="btn btn-primary" style="width: 100%" onclick="window.location.href='../Manage_pds'">Create custom forms</button>
                                </div>
                            </div>
                         </div> 
                         

                    </div> 
                    

                
                </div>






                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include '../include/assets/footer.php';?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
 <!--   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.3/b-2.0.1/rr-1.2.8/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.3/b-2.0.1/rr-1.2.8/datatables.min.js"></script>
   <script type="text/javascript">
     
           $(document).ready(function() {
             let table = new DataTable('#requesttable', {
      
                               "search": {
                              "caseInsensitive": false
                            }

                          });
           });
           
   </script>-->
    <!-- End of Page Wrapper -->
       <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
      
      $(document).ready(function() {
         
              $('#approveshiftingforms').on('submit', function(event){
                 event.preventDefault();
                  var atLeastOneIsChecked = $('input[name="approvedcheck[]"]:checked').length > 0;
                 if(atLeastOneIsChecked == false){
                 Swal.fire(
                'Selection is Empty!',
                '',
                'error'
              )
                 }else {
                  Swal.fire({
                        title: 'Are you sure?',
                        text: "You want to approved all forms of selected students?",
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#f6c23e',
                        cancelButtonColor: '#858796',
                        confirmButtonText: 'Yes, approve it!'
                      }).then((result) => {
                        if (result.isConfirmed) {
                            var xhttp = new XMLHttpRequest();

                                          xhttp.onreadystatechange = function() {
                                           if (this.readyState == 4 && this.status == 200) {
                                          const data = this.responseText;
                                         
                                        Swal.fire(
                          'Approved!',
                          'Student form approved successfully!',
                          'success'
                        ).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) {
                          window.location.href="../Forms/";
                            } 
                          })
                                                                      
                                        
                                                       }
                                                    };
                                            xhttp.open("POST", $('#approveshiftingforms').attr('action'),true);
                                            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                                            xhttp.send($('#approveshiftingforms').serialize());
                        }
                      })
                
                 }
                       /* $.ajax({
                                 url : "destination.php",
                                  method: "POST",
                                   data  : $(this).serialize(),
                                   success : function(data){
                      
                                   }
                                })*/
                 });
            });      
            
    </script>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
   <?php include '../Dashboard/logoutmodal.php';  ?>
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
   
<script type="text/javascript">
    $(document).ready(function() {
        
   
    
        $('.edit').click(function() { 
      var csformid = $(this).data('csformid');
           
          
               
             var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
             if (this.readyState == 4 && this.status == 200) {
            const data = this.responseText;
          
          window.location.href= "../create_form";
                         }
                      };
              xhttp.open("POST", "../Manage_pds/form_session.php",true);
              xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
              xhttp.send("setedit=1&csformid="+csformid);
                  
            

    })      
         });
          
</script>
<?php 
//include '../Dashboard/notification.php';
 ?>



    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/demo/chart-pie-demo.js"></script>
    <script type="text/javascript">
          $(document).ready(function() {
              if($(window).width() <= 768){
               $('#accordionSidebar').addClass('toggled');
              }
        
          });
    </script>

</body>

</html>