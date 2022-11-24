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
                       
                        <!--<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
                    </div>

                    <!--contents here //// OFF-->

                    <div class="row mb-5 ">
                            <div class="col-md-12">
                                 

                                  <div class="card shadow">
                                <div class="card-header">
                                  

                                </div>
                                <div class="card-body">
                                      <button class="btn btn-light text-primary" onclick="window.location.href='index.php'" style="font-size:12px" ><i class="fas fa-arrow-left"></i></button>     
                                        

                                      <br>
                                      <div class="row">
                                        <div class="col-md-6">
                                            <select class="form-control mt-2 mb-2" id="setcollege" style="font-size:12px;text-align: center;">
                                                 <?php 
                                if(isset($_GET['rdct'])){
                                  $sortby = $_GET['sort_by_college'];
                                  if(isset($_GET['sort_by_college'])){
                                      $getallcolleges_ = "select * from colleges where CollegeId='$sortby' ";
                                 $gettingcolleges = mysqli_query($con,$getallcolleges_); 
                               
                               while($row = mysqli_fetch_array($gettingcolleges)){
                                     ?>
                                     <option value="<?php echo $row['CollegeId'] ?>" ><?php echo $row['college'] ?></option>

                                     <?php     
                                 }

                                  }else {
                                       echo ' <option>Sort By College</option>';
                                  }

                                }else {
                                    echo ' <option>Sort By College</option>';
                              
                              
                                }

                                   
                               
                                  $getallcolleges_ = "select * from colleges  ";
                                 $gettingcolleges = mysqli_query($con,$getallcolleges_); 
                               
                               while($row = mysqli_fetch_array($gettingcolleges)){
                                     ?>
                                     <option value="<?php echo $row['CollegeId'] ?>" ><?php echo $row['college'] ?></option>

                                     <?php     
                                 }
                               

                               ?>
                                            </select>
                                        </div>
                                          <div class="col-md-6">
                                              <input type="text" id="searchkey" class="form-control mt-2 mb-2" name="" placeholder="Search for ID , Surname or Givenname.." style="font-size:12px">
                                          </div>
                                      </div>
                                      <button class="btn btn-light text-success" id="reload" style="font-size: 12px;">Reload <i class="fas fa-sync"></i></button>
                                      <div id="tablecontents"> </div>
                                  


                                </div>
                                </div>


                            </div>


                    </div>

                        
                      



                    

                         <!--contents here //// OFF-->



                
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

       <script src="../../offline/sweetalert.js"></script>
       <script type="text/javascript" src="../../js/jquery.js"></script>

    <?php 
    if(isset($_SESSION['saved'])){
        $ss = $_SESSION['saved'];

        if($ss == 1){
    ?>
          <script type="text/javascript">
      
      Swal.fire(
                'Added Successfully!',
                'New Schedule added Successfully!',
                'success'

                )

        

            
    </script>
        <?php
         unset($_SESSION['saved']);
        }else if($ss == 2) {
               ?>
          <script type="text/javascript">
      
      Swal.fire(
                'Deleted Successfully!',
                'Schedule Deleted Successfully!',
                'success'

                )

        

            
    </script>
        <?php
         unset($_SESSION['saved']);

        }
    
       
    }
    if (isset($_SESSION['noselected'])){
          ?>
          <script type="text/javascript">
      
      Swal.fire(
                'Selection Empty!',
                'Please Select one or More!',
                'error'

                )

        

            
    </script>
        <?php
        unset($_SESSION['noselected']);
    }

        ?>
    <script type="text/javascript">
      
      $(document).ready(function() {

        $('#reload').click(function(){
               gettablecontent('none');            
        })

        $('#searchkey').keyup(function(){
            var value = $(this).val();
             gettablecontent(value);
        
        })

        $('#setcollege').change(function(){
              var value = $(this).val();  
                 gettablecontent('c'+value);           
        })

        gettablecontent('none');
        function gettablecontent(searchkey){
            
             $.ajax({
             url : "action.php",
              method: "POST",
             data  : {tablecontent:searchkey},
              success : function(data){
                $('#tablecontents').html(data);
               }
             })


        }
            $('.delsched').click(function(){
                 var id = $(this).data('sid');
                  $.ajax({
                  url : "action.php",
                   method: "POST",
                  data  : {delsched:id},
                   success : function(data){
                    location.reload();
                    }
                  })
                            
            })
          
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