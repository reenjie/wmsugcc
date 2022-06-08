<?php 
session_start();
 if(!isset( $_SESSION['admin_token'] )){
  //
 }

	$id =$_SESSION['id'];
	$ln =$_SESSION['ln'];
	$fn =$_SESSION['fn'];
	$mn =$_SESSION['mn'];
	$em =$_SESSION['em'];







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
                        <h1 id="title" class="h3 mb-0 text-gray-800"></h1>
                        <!--<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
                    </div>

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
                        
                         <form method="post" action="save.php" >
                                                
                      
                        
                          <div class="card-body "  >
                            <button type="button" onclick="window.location.href='index.php' " class="btn btn-light mb-2" style="font-size: 12px"><i class="fas fa-arrow-left"></i></button>
                             <button style="float:right;font-size: 13px;" type="button" id="cancelref" class="btn btn-danger">Cancel Referral</button>
                    		 <div class="container">
                    		 	<h5>REFERRAL FORM</h5>
                    		 	<hr>

                    		 	<h6>
                            <?php 

                                $getrefdata = " select * from referral where stud_id = '$id' and cs = 0 and status = 0 ";
                                            $gettingrefdata = mysqli_query($con,$getrefdata); 
                                          
                                        
                                             while($row = mysqli_fetch_array($gettingrefdata)){
                                                 $type=$row['type'];
                                                 $_SESSION['referral_history'] = $row['ref_hist'];
                                                 if($type=='class'){
                                                   $cl = $row['class'];
                                                    $clid = $row['ref_id'];
                                                   }

                                                   if($type == 'dateset'){
                                                   
                                                    $ds = $row['date_set'];
                                                   }

                                                   if($type== 'yearsec'){
                                                    $ys = $row['yrsec'];
                                                    $ysid = $row['ref_id'];
                                                   }
                                                   if($type == 'parent'){
                                                    $pr = $row['parent'];
                                                    $prid = $row['ref_id'];
                                                   }
                                                   if($type== 'telno'){
                                                    $tn = $row['celtel_no'];
                                                    $tnid = $row['ref_id'];
                                                   }

                                                   if($type == 'table'){
                                                    $refid[] = $row['ref_id'];
                                                    $prob[] = $row['prob'];
                                                    $freq[] = $row['frequency'];
                                                    $remarks[] = $row['remarks'];
                                                   }
                                                   if($type == 'referredby'){
                                                    $refby = $row['refby'];
                                                    $refbyid = $row['ref_id'];
                                                   }

                                                   if($type == 'actiontaken'){
                                                    $actkn = $row['action_taken'];
                                                     $actknid = $row['ref_id'];
                                                   }


                                             }
                                      

                             ?>

                    		 		  <div class="row">
                    		 		  	 <div class="col-sm-6"></div> 
                    		 		  	  <div class="col-sm-2"></div> 
                    		 		  	  
                    		 		  	 <div class="col-sm-4">
                    		 		  	 	<?php date_default_timezone_set('Asia/Manila'); ?>
                    		 		  	 	<input type="date" name="dateset" id="dateset" class="mb-4 form-control" style="text-align: center; font-size: 13px" value="<?php echo $ds ?>" data-id ="<?php echo $id ?>">
                    		 		  	 </div> 
                    		 		  	
                    		 		  	 <div class="col-sm-6">
                    		 		  	 		Name : <span style="text-transform: uppercase;font-style: italic;"><?php echo $ln.' '.$fn.' '.$mn ?></span> 
                    		 		  	 </div> 
                    		 		  	  <div class="col-sm-6">
                    		 		  	  		Course: 
                    		 		  	  		<span style="font-style: italic;">
                    		 		  	  		<?php 
                    		 		  	  				$getcourse = " select * from student where stud_id = '$id'  ";
                    		 		  	  		                $gcourse = mysqli_query($con,$getcourse); 
                    		 		  	  		              
                    		 		  	  		                 while($row = mysqli_fetch_array($gcourse)){
                    		 		  	  								$cid = $row['stud_course'];
                    		 		  	  								$address = $row['street'].','.$row['barangay'].' '.$row['city'].','.$row['zipcode'];
                                                 $contactno = $row['contact_no'];
                    		 		  	  		                 }
                    		 		  	  		                		$fgetcourse = " select * from course where courseid = '$cid'  ";
                    		 		  	  		                                $gfcourse = mysqli_query($con,$fgetcourse); 
                    		 		  	  		                            
                    		 		  	  		                                 while($row = mysqli_fetch_array($gfcourse)){
                    		 		  	  		                					echo $row['course'];
                    		 		  	  		                                 }
                    		 		  	  		                          

                    		 		  	  		          

                    		 		  	  		 ?>
                    		 		  	  		 </span>
                    		 		  	  </div> 

                    		 		  	   <div class="col-sm-6">
                    		 		  	   			
                    		 		  	   	

                                                Subject : <span style="font-style:italic;text-transform: uppercase;"><?php echo $cl ?></span>

                    		 		  	   </div> 
                    		 		  	      <div class="col-sm-6">
                    		 		  	   			
                    		 		  	   		<input style="font-size: 13px" type="text" name="yrsec" id="yrsec" class="form-control " placeholder="Year & Section" value="<?php echo $ys ?>" data-id="<?php echo $ysid ?>">

                    		 		  	   </div> 

                    		 		  	     <div class="col-sm-6">
                    		 		  	   			
                    		 		  	   		<input style="font-size: 13px" type="text" name="prntguardian" id="prntguardian" class="form-control mt-2" placeholder="Parent/ Guardian" required="" value="<?php echo $pr ?>" data-id="<?php echo $prid ?>">

                    		 		  	   </div> 
                    		 		  	     <div class="col-sm-6 mt-2">
                    		 		  	   			Address :  <span style="font-style: italic;text-transform: uppercase;"><?php echo $address ?></span>
                    		 		  	   		

                    		 		  	   </div> 

                    		 		  	    <div class="col-sm-6 mt-2">
                    		 		  	   			
                    		 		  	<!--   		<input style="font-size: 13px" type="text" name="telno" id="telno" class="form-control mt-2" placeholder="Cell/Tel. Number" required="" value="<?php echo $tn ?>" data-id="<?php echo $tnid ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="11"> -->

                                Contact No : <?php echo  $contactno ?>


                    		 		  	   </div> 
                    		 		  	   
                    		 		  	   
                    		 		  	 
                    		 		  </div> 
                    		 		  <hr>

                    		 		  <div class="mb-2" >Please fill in the appropriate column and specify reason for referral.</div>
                    		 		  
                    		 		    <div class="table-responsive">
                    		 		    
                    		 		   <table class="table table-sm table-borderless">
										  <thead>
										    <tr>
										      <th scope="col"><span style="text-transform: uppercase;">Presenting Problem</span></th>
										      <th scope="col"><span style="text-transform: uppercase;">Frequency</span></th>
										      <th scope="col"><span style="text-transform: uppercase;">Remarks</span></th>
										     
										    </tr>
										  </thead>
										  <tbody>
										        <?php 
                            if(isset($prob)){

                              for($i = 0; $i < count($refid); $i ++){
                                ?>
                                <tr>
                                  <td><?php echo $prob[$i] ?></td>
                                    <td>
                            <input type="text" name="dbfreq" class="form-control freq" style="font-size: 14px" value="<?php echo $freq[$i] ?>" data-id="<?php echo $refid[$i] ?>">
                          </td>
                          <td><input type="text" name="dbrem" class="form-control rem" style="font-size: 14px" value="<?php echo $remarks[$i] ?>" data-id="<?php echo $refid[$i] ?>"></td>
                                </tr>
                                <?php
                              }


                            }


                             ?>
										  </tbody>
										</table>
                    		 		   
                    		 			 	</div> 
                    		 		

                    		 		 <div class="row mt-3">
                    		 		 		 <div class="col-sm-6">
                    		 		 		 	Referred to : <br><?php echo $_SESSION['gc_name'] ?> <br>
                    		 		 		 	<span style="font-size: 12px">(Guidance Coordinator)</span>
                    		 		 		 </div> 
                    		 		 		  <div class="col-sm-6">
                    		 		 		  	Referred by : 

                                                <h6 style="font-style: italic;"><?php echo $refby ?></h6>
                    		 		 		  </div> 

                    		 		 		   <div class="col-sm-6">
                    		 		 		   	College : <?php echo $_SESSION['gc_college'] ?>
                    		 		 		   </div> 
                    		 		 		   <div class="col-sm-6"></div> 
                    		 		 		   
                    		 		 		    <div class="col-sm-12 mt-3">
                    		 		 		    	Action Taken : <textarea class="form-control mt-2" id="acttaken" rows="5" style="font-size: 13px" required="" data-id="<?php echo $actknid ?>"><?php echo $actkn ?></textarea>
                    		 		 		    </div> 
                    		 		 		    
                    		 		 		 

                    		 		 </div> 


                    		 		 

                    		 		<br>
                    		 		<button type="submit" class="btn btn-success" name="saveref" style="float: right;" > Next </button>

                    		 	</h6> 
                    		 	<p><br><br></p>
                    		 	<?php 

                    		 //	echo $id.$ln.$fn.$mn.$em;

                    		 	 ?>
                    		 </div> 
                    		 
                              

                          </div> 
                             </form>




                          
                          
                     </div> 
                     
                      



                </div> 
                              
                   
  
                    </div> 
                    
                    </div>
                </div>
                <!-- /.container-fluid -->

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

    $('#cancelref').click(function(){


                     Swal.fire({
                    title: 'Are you sure?',
                    text: "Action cannot be undone! All data you have entered will be gone,Do you still want to Cancel?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#f04252',
                    cancelButtonColor: '#e5cd81',
                    confirmButtonText: 'Yes, Cancel!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                     
                          $.ajax({
        url : "submit.php",
         method: "POST",
        data  : {cancelling:1},
         success : function(data){
            window.location.href='index.php';
          }
        })


                    }
                  })
      


                      
    })
      
      $('#dateset').change(function() { 

        var val = $(this).val();
        var id = $(this).data('id');


       
          $.ajax({
                  url : "save.php",
                   method: "POST",
                    data  : {ds:1,val:val,id:id},
                    success : function(data){
       
                    }
                 })
              
           
      
      })

      $('#classsubject').focusout(function(){ 
         var val = $(this).val();
         var id = $(this).data('id');

            $.ajax({
                  url : "save.php",
                   method: "POST",
                    data  : {cl:1,val:val,id:id},
                    success : function(data){
       
                    }
                 })

      
      })

      $('#yrsec').focusout(function(){ 
           var val = $(this).val();
         var id = $(this).data('id');

            $.ajax({
                  url : "save.php",
                   method: "POST",
                    data  : {ys:1,val:val,id:id},
                    success : function(data){
       
                    }
                 })
      
      })

      $('#prntguardian').focusout(function(){ 
           var val = $(this).val();
         var id = $(this).data('id');

            $.ajax({
                  url : "save.php",
                   method: "POST",
                    data  : {pr:1,val:val,id:id},
                    success : function(data){
       
                    }
                 })
      })

      $('#telno').focusout(function(){ 
         var val = $(this).val();
         var id = $(this).data('id');

            $.ajax({
                  url : "save.php",
                   method: "POST",
                    data  : {telno:1,val:val,id:id},
                    success : function(data){
       
                    }
                 })
      })

      $('.freq').focusout(function(){ 
          var val = $(this).val();
         var id = $(this).data('id');

             $.ajax({
                  url : "save.php",
                   method: "POST",
                    data  : {freq:1,val:val,id:id},
                    success : function(data){
       
                    }
                 })
         
      })

       $('.rem').focusout(function(){ 
        var val = $(this).val();
         var id = $(this).data('id');

           $.ajax({
                  url : "save.php",
                   method: "POST",
                    data  : {rem:1,val:val,id:id},
                    success : function(data){
       
                    }
                 })

      })

       $('#referredby').focusout(function(){ 
            var val = $(this).val();
         var id = $(this).data('id');

           $.ajax({
                  url : "save.php",
                   method: "POST",
                    data  : {ref:1,val:val,id:id},
                    success : function(data){
       
                    }
                 })
       })

       $('#acttaken').focusout(function(){ 
           var val = $(this).val();
         var id = $(this).data('id');

           $.ajax({
                  url : "save.php",
                   method: "POST",
                    data  : {act:1,val:val,id:id},
                    success : function(data){
       
                    }
                 })
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