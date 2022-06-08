<?php 
session_start();
 include '../create_form/connect.php';
  if(!isset($_SESSION['admingcc_token'])) {
    header("location:../../session_end.html");
  }
  

  if(isset($_SESSION['first_time_login'])){
    include 'ft.php';
  }

 

 ?>
<!DOCTYPE html>
<html lang="en">
    

 <?php include '../include/assets/head.php';?>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!--sidebar-->
        <?php include '../include/assets/sidebar.php';?>
        <!--end of sidebar-->


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column" >

            <!-- Main Content -->
            <div id="content">

                    <!--topbar-->
            <?php include '../include/assets/topbar.php';?>
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
                   

                     
                



<style type="text/css">
    #ann_con{
        height: 350px;
        overflow-y: scroll;
    }

    #custombar::-webkit-scrollbar {
  width: 4px;
  height: 4px;

  }
    #ann_con::-webkit-scrollbar {
  
  width: 4px;
}

/* Track */
#ann_con::-webkit-scrollbar-track {
  background: #d7faed; 
}
 
/* Handle */
#ann_con::-webkit-scrollbar-thumb {
  background: #298a67; 
}

/* Handle on hover */
#ann_con::-webkit-scrollbar-thumb:hover {
  background: #30936f; 
}

 #eventcon{
        height: 350px;
        overflow-y: scroll;
    }
     #eventcon::-webkit-scrollbar {
  width: 4px;
}

/* Track */
 #eventcon::-webkit-scrollbar-track {
  background: #d7faed; 
}
 
/* Handle */
 #eventcon::-webkit-scrollbar-thumb {
  background: #298a67; 
}

/* Handle on hover */
 #eventcon::-webkit-scrollbar-thumb:hover {
  background: #30936f; 
}
#newsfeedcontent{
      height:420px;
        overflow-y: scroll;
}
  #newsfeedcontent::-webkit-scrollbar {
  width: 4px;
}

/* Track */
#newsfeedcontent::-webkit-scrollbar-track {
  background: #d7faed; 
}
 
/* Handle */
 #newsfeedcontent::-webkit-scrollbar-thumb {
  background: #298a67; 
}

/* Handle on hover */
 #newsfeedcontent::-webkit-scrollbar-thumb:hover {
  background: #30936f; 
}
</style>
                
                 
                   
             
                     
                    
                    <!-- Content Row -->

                     <div class="row">
                     	<div class="container">
                     		<nav aria-label="breadcrumb">
							  <ol class="breadcrumb">
							    <li class="breadcrumb-item active" aria-current="page">Shifting Request</li>
							    <li class="breadcrumb-item"><a href="PDS.php">Personal Data Sheets</a></li>
							    <li class="breadcrumb-item"><a href="shifting_form.php">Shifting Forms</a></li>
							 
							     <li class="breadcrumb-item"><a href="counseling.php">Counseling</a></li>

                                <li class="breadcrumb-item"><a href="colleges/">Colleges</a></li>
							    <li class="breadcrumb-item"><a href="coordinator.php">Coordinator Accounts</a></li>
							    <li class="breadcrumb-item"><a href="logs.php">Logs</a></li>
                                <li class="breadcrumb-item"><a href="filter.php">Filtering</a></li>
							   
							  </ol>
							</nav>
                     	  <div class="card shadow mb-2">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Shifting Request Forms</h6>
                                </div>
                                <div class="card-body" style="font-size: 14px">
                                  
                                 <div class="container table-responsive" id="contentss" >
                                  
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
                                             <button type="submit" name="approve" id="approvesub" class="btn btn-light text-primary" style="font-size: 12px">Forward</button>
                                           </div> 
                                           
                                        </div> 
                                        
                                   </form> 




                                     

                                </div>


                            </div>

                     		</div>

                     		<div class="card mt-2 mb-2">
                     			
                     			<div class="card-body">
                     				
                     			</div>
                     		</div>





                     	</div>
                        
                     </div> 

              
                      
                     

               
                    </div> 

              
              </div>

            </div>

             
 
                         
                            <link rel="stylesheet" type="text/css" href="../../offline/datatable.css"/>
 
<script type="text/javascript" src="../../offline/datatable.js"></script>






                          
           <script src="../../js/jquery.js"></script>
            <script type="text/javascript">
          $(document).ready(function() {
              if($(window).width() <= 768){
               $('#accordionSidebar').addClass('toggled');
              }
        
          });
    </script>
                <script type="text/javascript">
                      $(document).ready(function() {
                                let table = new DataTable('#pdstable', {
      
                         "search": {
                        "caseInsensitive": false
                      }

                    });



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
                        text: "You want to forward all forms of selected students?",
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
                          'Forwarded!',
                          'Student form forwarded successfully!',
                          'success'
                        ).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) {
                         location.reload();
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
            <?php include '../include/assets/footer.php';?>
            <!-- End of Footer -->

   

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
     

<?php
include '../Dashboard/logoutmodal.php'; 
//include 'notification.php';
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
   
  


</body>

</html>