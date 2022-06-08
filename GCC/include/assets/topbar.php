        
	  <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search ">
                        <?php 
                        if(isset($_SESSION['advancesearch'])){
                            $varsearch = $_SESSION['advancesearch'];

                            if($varsearch =='enabled'){
                                ?>
                                <div class="input-group " >
                            <input type="text" class="form-control bg-light border-0 small myinputsss" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2" >
                            <div class="input-group-append">
                                <button class="btn btn-primary" id="btnsearchclick" type="button" >
                                    <i class="fas fa-search fa-sm"></i>  
                                </button>
                                <input type="checkbox" id="confirmcheck" name="" style="display: none">
                            </div>
                        </div>
                                <?php
                            }else {
                                 ?>
                                <div class="input-group d-none" >
                            <input type="text" class="form-control bg-light border-0 small myinputsss" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2" >
                            <div class="input-group-append">
                                <button class="btn btn-primary" id="btnsearchclick" type="button" >
                                    <i class="fas fa-search fa-sm"></i>  
                                </button>
                                <input type="checkbox" id="confirmcheck" name="" style="display: none">
                            </div>
                        </div>
                                <?php
                            }
                        }

                         ?>
                        

                    </form>

                  

        <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                      <!--  <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>

                        
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                      <input  type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2" id="myInput">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li> -->




                     
                     <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <?php 


                                    $getting_all_requestcount = "select * from counseling_request where status in (2,3)  ";
                                     $gttingcount_allrequest = mysqli_query($con,$getting_all_requestcount); 
                                     $count_of_request= mysqli_num_rows($gttingcount_allrequest);

                                 ?>
                                <span class="badge badge-danger badge-counter" id="notificationbellcount"><?php 
                                if($count_of_request >=1){
                                    echo $count_of_request;
                                }

                                  ?></span>
                            </a>
                      
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                   Counseling Request
                                </h6>

                                 <div class=""   id="notificationbell" > 
                              <div class="" style="height: 300px;overflow-y: scroll;">
                             
                                    <?php 

                                      while($rcount = mysqli_fetch_array($gttingcount_allrequest)){
                                         $studid = $rcount['stud_id'];
                                                        $schedid = $rcount['sched_id'];
                                                        $status = $rcount['status'];
                                                        $cid = $rcount['c_id'];
                                                        $dt = $rcount['datecreated'];


                                                                $get_studentdata = "select * from student where stud_id = '$studid'  ";
                                             $gettingdata = mysqli_query($con,$get_studentdata); 
                                             $count= mysqli_num_rows($gettingdata);
                                            
                                          
                                         while($rows = mysqli_fetch_array($gettingdata)){
                                                $studentid = $rows['stud_id'];
                                              $student_lname = $rows['stud_lname'];
                                              $student_fname = $rows['stud_fname'];
                                              $student_mname = $rows['stud_mname'];
                                              $student_email = $rows['stud_email'];
                                                $student_course = $rows['stud_course'];
                                                $stud_coll = $rows['stud_college'];

                                          }
                                             ?>
                                               

                                                  <?php 

                                if(isset($collegess)){
                                    ?>
                                    
                                      <a class="dropdown-item d-flex align-items-center" href="../../Services/">
                                    <?php
                                }else {
                                     ?>
                                      <a class="dropdown-item d-flex align-items-center" href="../Services/">              
                                    <?php
                                }

                                 ?>
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-info text-white"></i> 
                                        </div>
                                    </div>

                                      <div >
                                        <div class="small text-gray-500"><?php echo date('F j, Y',strtotime($dt)) ?></div>
                                        <span class="font-weight-bold">Counseling Request <br> <?php echo $student_fname.' '.$student_lname ?></span>
                                    </div>
                                       </a>
                                             <?php               
                                         }

                                     ?>
                                  
                             
                               </div>
                                <?php 

                                if(isset($collegess)){
                                    ?>
                                      <a class="dropdown-item text-center small text-gray-500" href="../../Services/">Show All Counseling Request</a>
                                    <?php
                                }else {
                                     ?>
                                      <a class="dropdown-item text-center small text-gray-500" href="../Services/">Show All Counseling Request</a>
                                    <?php
                                }

                                 ?>

                              
                            </div>
                        </li>

                      


                       
                        <li class="nav-item dropdown no-arrow mx-1">
                                <?php 
                        if(isset($collegess)){
                            ?>
                            <a class="nav-link " href="javascript:void(0)" id="messagesDropdown" onclick="window.location.href='../../Message/' " role="button"
                               >
                            <?php 
                        }else {
                            ?>
                             <a class="nav-link " href="javascript:void(0)" id="messagesDropdown" onclick="window.location.href='../Message/' " role="button"
                               >
                            <?php 
                        }

                         ?>
                           
                                <i class="fas fa-envelope fa-fw"></i>
                                <?php 
                               $get_inbox = "select * from student where stud_id in (select stud_id from message where adm = 0 and gcc = 0 and status=0 and send !=0 )  ";
                                                             $gettinginboxmessages = mysqli_query($con,$get_inbox); 
                                                             $countsms= mysqli_num_rows($gettinginboxmessages);

                                if($countsms >=1){
                                   $countsms1 = $countsms;
                                }else {
                                    $countsms1 = '';
                                }


                                 ?>
                               
                              <span class="badge badge-danger badge-counter" id="messagerequestcount"><?php echo $countsms1 ?></span>
                            </a>
                        
                         
                        </li>


                        <div class="topbar-divider d-none d-sm-block"></div>


                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <?php 
                            $admintoken = $_SESSION['admingcc_token'];
                           

                            if(isset($coll)){
                                 include '../../create_form/connect.php';
                            }else {
                                include '../create_form/connect.php'; 
                            }
                                        $sql = " SELECT * FROM `administrator` where admin_id = '$admintoken'  ";
                                                $result = mysqli_query($con,$sql); // run query
                                               
                                                 while($row = mysqli_fetch_array($result)){
                                                    $adphoto = $row['admin_photo'];
                                                    if($adphoto == ''){
                                                          if(isset($coll)){
                                                        $imgsrc = '../../img/undraw_profile.svg';
                                                    }else {
                                                         $imgsrc = '../img/undraw_profile.svg';
                                                    }
                                                    }else {

                                                          if(isset($coll)){
                                                        $imgsrc = '../../img/uploads/'.$adphoto;
                                                    }else {
                                                              $imgsrc = '../img/uploads/'.$adphoto;
                                                    }
                                                    }

                                                        ?>
                                                    
                                                    
                             <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $row['admin_dsplyname'] ?></span>
                                <img class="img-profile rounded-circle"
                                    src="<?php echo $imgsrc ?>">
                            </a>
                                                        <?php
                                                 }
                                          

                             ?>
                         
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">

                                  <?php 
                        if(isset($collegess)){
                            ?>
                             <form method="post" action="../../Misc/">
                            <?php 
                        }else {
                            ?>
                             <form method="post" action="../Misc/">
                            <?php 
                        }

                         ?>
                                
                                                          
                              
                                
                                
                               <!-- <button type="submit"  class="dropdown-item " type="submit"  name="profile"> 
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400" ></i>
                                    Profile
                                </button>
                                 
                                <a class="dropdown-item" href="#" >
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>-->

                                         
                                 <button type="submit" class="dropdown-item"  type="submit"  name="settings"> 
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                   Settings
                                </button>
                                   </form>
                             
                              

                                <a class="dropdown-item" target="_blank" href="../../attachments/GCC-Admin-Guidance-Counseling-Information-Management-System-User-Manual.pdf"  >
                                    <i class="fas fa-user-cog fa-sm fa-fw mr-2 text-gray-400"></i>
                                    User-Manual
                                </a>
                                  <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

             
                <!-- Modal -->
                <div class="modal fade" id="alluserguide" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                      <h6 style="font-weight: bolder;">User Guide</h6>
                      </div>
                      <div class="modal-body">
                         <div class="container" style="font-size: 14px">
                             <div class="row">
                                  <div class="col-sm-6" style="font-weight: normal;" >
                                        
                                        <span style="font-weight: bolder;text-decoration: underline;"> Advance Search: </span> <br>
Click on Search for… on the upper part of the page to use advance search. <br>
<span style="font-weight: bolder;text-decoration: underline;"> Manage Homepage Content: </span> <br>

To manage the content of the homepage, click on Components on the sidebar, then click Homepage. <br>
<span style="font-weight: bolder;text-decoration: underline;"> Manage Other Website Content: </span> <br>
 
To manage other content of the website, click on Components on the sidebar, then click Pages. <br>
<span style="font-weight: bolder;text-decoration: underline;">Manage Calendar Activities: 
 </span> <br>
To manage calendar activities, click on Utilities on the sidebar then click Calendar. <br>
<span style="font-weight: bolder;text-decoration: underline;">Manage Announcement: 
 </span> <br>

To manage announcements, click on Utilities on the sidebar then click Announcement. <br>

<span style="font-weight: bolder;text-decoration: underline;">Manage Newsfeed:

 </span> <br>

To manage the newsfeed, click on Utilities on the sidebar then click Newsfeed. <br>
<span style="font-weight: bolder;text-decoration: underline;">Notification Alert:


 </span> <br>
Click the Bell icon on the upper right of the page to view Notification Alert. <br>
<span style="font-weight: bolder;text-decoration: underline;">Message Request:

 </span> <br>
Click the Envelope icon on the upper right of the page to view Message Request. <br>

                                  </div>

                                   <div class="col-sm-6">
                                      
<span style="font-weight: bolder;text-decoration: underline;">Create and Manage Forms:</span>

To create new custom form and manage existing forms, click on Forms on the sidebar. <br>
<span style="font-weight: bolder;text-decoration: underline;">Manage Personal Data Sheet Format:</span> <br>

On the bottom part of the page click Manage on the Personal Data Sheet section. <br>
<span style="font-weight: bolder;text-decoration: underline;">Manage Shifting Form Format:
</span> <br>
On the bottom part of the page click Manage on the Shifting Form section. <br>
<span style="font-weight: bolder;text-decoration: underline;">Create Custom Form:
</span> <br>

On the left part of the page click Create Custom Forms then click Add New Form. <br>
<span style="font-weight: bolder;text-decoration: underline;">Form Availability Control:
</span> <br>

On the Manage section, you can check/uncheck the check box for the corresponding forms that you want to be available/unavailable to the users.

                                  </div>                                   
                             </div> 
                             
   

                         </div> 
                         
                
                
                       
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-light" style="font-size:12px" data-dismiss="modal">Close</button>
                      
                      </div>
                    </div>
                  </div>
                </div>

            
           

            