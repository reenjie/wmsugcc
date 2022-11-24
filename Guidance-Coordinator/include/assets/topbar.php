        
	  <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <h4 id="college" style="font-weight: bold"><?php echo $_SESSION['gc_college'] ?></h4>
                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search ">
                        <?php 
                        /*
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
                            */
                         ?>
                        

                    </form>

        <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                    
                        <?php  
                        /*
                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter" id="notificationbellcount"></span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>

                                 <div class=""   id="notificationbell"> 
                               
                               <!-- <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>-->
                               


                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        */
                        ?>

                      


                       
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link " href="JavaScript:void(0)" onclick="window.location.href='../Message/' " id="messagesDropdown" role="button"
                                >
                                <i class="fas fa-envelope fa-fw"></i>
                                   <?php 
                                   $gccol = $_SESSION['gc_collegid'];
                               $get_inbox = "select * from student where stud_id in (select stud_id from message where adm = '$gccol' and gc = 0 and status=0 and send !=0 )  ";
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
                            $admintoken =  $_SESSION['admin_token'];
                            include '../../GCC/create_form/connect.php';
                                        $sql = " SELECT * FROM `administrator` where admin_id = '$admintoken'  ";
                                                $result = mysqli_query($con,$sql); // run query
                                               
                                                 while($row = mysqli_fetch_array($result)){
                                                    $adphoto = $row['admin_photo'];
                                                    if($adphoto == ''){
                                                        $imgsrc = '../img/undraw_profile.svg';
                                                    }else {
                                                        $imgsrc = '../img/uploads/'.$adphoto;
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
                         
                      <!--  Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                 <form method="post" action="../Misc/">
                                                          
                              
                                
                                
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
                                   <a target="_blank" href="../../attachments/GC-Guidance-Counseling-Information-Management-System-User-Manual.pdf"  class="dropdown-item" >
                                    <i class="fas fa-user-cog fa-sm fa-fw mr-2 text-gray-400"></i>
                                    User-Manual
                                   </a>
                                  <!--  <a class="dropdown-item" href="#"  data-toggle="modal" data-target="#esign" data-backdrop="static" data-keyboard="false" >
                                 
                                    <i class="fas fa-signature fa-bounce fa-sm fa-fw mr-2 text-gray-400"></i>

                                    E-signature
                                  </a> -->
                                   <a class="dropdown-item" href="../../Guidance-Coordinator/Shifting-Records/history_Dir.php" >
                                 
                                    <i class="fas fa-sync fa-bounce fa-sm fa-fw mr-2 text-gray-400"></i>

                                    Recent GC
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

                     <div class="modal fade" id="esign" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                    <div class="modal-content" id="form">
                      
                       <form method="post" action="save_e.php" enctype="multipart/form-data">
                                              
                          <input type="hidden" name="saveesign">
                     
                      <div class="modal-body">
                            <h6 style="font-weight: bolder;">Upload E-signature</h6>
                        <br>
                        <?php 
                        $adminid =  $_SESSION['admin_token'];
                              $getesign = " select * from administrator where admin_id = '$adminid'  ";
                                          $esignuser = mysqli_query($con,$getesign); 
                                       
                                      
                                           while($row = mysqli_fetch_array($esignuser)){
                                              
                                              $eimg = $row['esign'];

                                              if($eimg == ''){
                                                $imgsrc = '../../signatures/signature.png';
                                              }else {
                                                $imgsrc = '../../signatures/'.$eimg;
                                              }
                                           }
                                    

                         ?>
                            <img src="<?php echo $imgsrc ?>" style="width: 100%;height: 120px" id="configimage">
                        
                
                        <input type="file" name="image" class="form-control" required="" accept="image/*" id="image">

                        <br>

                        <a href="https://www.signwell.com/online-signature/" target="_blank" style="font-size: 13px">No E-signature? Create your E-signature Here.</a>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" style="font-size:12px" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" style="font-size:12px">Save changes</button>
                      </div>

                       </form>
                    </div>
                  </div>
                </div>

                <div class="modal fade" id="alluserguide" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h6 style="font-weight: bolder">User Guide</h6>
                      </div>
                      <div class="modal-body" style="font-size: 14px">
                        
                         <div class="container">
                             <div class="row">
                                  <div class="col-sm-6">
                                      <span style="font-weight: bolder;text-decoration: underline;">DASHBOARD : NOTIFICATION</span> <br>
In this Section, all notifications will be shown,including students who have filled up,update and modify their pds, or student who filled up the shifting form. and the PDS transfer request that is requested by receiving college and other notifications. <br>

                                       <span style="font-weight: bolder;text-decoration: underline;">Printing Personal Data Sheet:</span> <br>
Click PDS on the Sidebar, then click the print icon on the right part corresponding the student’s Personal Data Sheet. <br>

<span style="font-weight: bolder;text-decoration: underline;">Viewing Personal Data Sheet: </span> <br>

Click PDS on the Sidebar, then click the eye icon on the right part corresponding the student’s Personal Data Sheet. <br>
<span style="font-weight: bolder;text-decoration: underline;"> Personal Data Sheet Update Student Notification:</span> <br>

Check the checkbox corresponding the student that needs update. Then click the Notify button below. <br>

                                  </div> 

                                   <div class="col-sm-6">
                                    <span style="font-weight: bolder;text-decoration: underline;">Shifting Request: </span> <br>

To view the shifting request forwarded by the Guidance and Counseling Center click Shifting on the sidebar. <br>
<span style="font-weight: bolder;text-decoration: underline;">Shifting Request Approval: </span> <br>

Check the checkbox corresponding the student that you want to approve. Then click the Approve button below. <br>


<span style="font-weight: bolder;text-decoration: underline;"> Modify Personal Account:</span> <br>

To modify your personal profile account, click your picture on the upper right corner then click Settings then click Update Myprofile below.  
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

                 <script src="../../js/jquery.js"></script>
                
                <script type="text/javascript">
                  
                  $(document).ready(function() {
                          
                                        const inpfile = document.getElementById("image"); //id of input tag type file
                                        const regform=document.getElementById ("form"); // div containing the form
                                        const previewimage=regform.querySelector("#configimage"); // id of img tag
                    
                                         inpfile.addEventListener("change",function () {
                                            const file = this.files[0];
                    
                                            if(file) {
                                                const reader = new FileReader();
                                                
                                                
                                                reader.addEventListener("load",function() {
                                                    previewimage.setAttribute("src",this.result);
                                                   
                                                });
                                                reader.readAsDataURL(file);
                                            }
                                         });

                        });      
                        
                </script>

            
           

            