        
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

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>

                            <!-- Dropdown - Messages -->
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
                        </li>

                      


                      

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                            <?php 
                          $admintoken = $_SESSION['adm_id'];
                          
                                        $sql = " SELECT * FROM `administrator` where admin_id = '$admintoken'  ";
                                                $result = mysqli_query($con,$sql); // run query
                                               
                                                 while($row = mysqli_fetch_array($result)){
                                                    $adphoto = $row['admin_photo'];
                                                    if($adphoto == ''){
                                                        $imgsrc = '../GCC/img/undraw_profile.svg';
                                                    }else {
                                                        $imgsrc = '../GCC/img/uploads/'.$adphoto;
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
                                 <!-- <form method="post" action="../Misc/">
                                                          
                              
                                
                                
                               <button type="submit"  class="dropdown-item " type="submit"  name="profile"> 
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400" ></i>
                                    Profile
                                </button>
                                 
                                <a class="dropdown-item" href="#" >
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                             
                                 <button type="submit" class="dropdown-item"  type="submit"  name="settings"> 
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                   Settings
                                </button>
                                   </form>
                                <div class="dropdown-divider"></div>-->
                                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#accountedit" data-backdrop="static" data-keyboard="false" >
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                  
                                  Account
                                </a>


                                 <a class="dropdown-item" href="#" data-toggle="modal" data-target="#changepasss" data-backdrop="static" data-keyboard="false" >
                                    <i class="fas fa-unlock fa-sm fa-fw mr-2 text-gray-400"></i>
                                  
                                   Change Password
                                </a>

                                   <a class="dropdown-item" href="#"  data-toggle="modal" data-target="#alluserguide"  >
                                 
                                    <i class="fas fa-user-cog fa-sm fa-fw mr-2 text-gray-400"></i>
                                 User-Guide
                                  </a>

                                  <a class="dropdown-item" href="#"  data-toggle="modal" data-target="#esign" data-backdrop="static" data-keyboard="false" >
                                 
                                    <i class="fas fa-signature fa-bounce fa-sm fa-fw mr-2 text-gray-400"></i>

                                    E-signature
                                  </a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li> 

                    </ul>

                </nav>
                <!-- End of Topbar -->


               <div class="modal fade" id="accountedit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
              
                  <div class="modal-body">
                     <form method="post" action="action.php" id="changepasse">
                     <div class="container" style="font-size: 13px">
                        <h6 style="font-weight:bolder">My Account</h6>
                        <?php 
                        $admintoken = $_SESSION['adm_id'];

                                $get_admindetails = "select * from administrator where admin_id='$admintoken'  ";
                                 $gettingadmindetails = mysqli_query($con,$get_admindetails); 
                                
                             while($row = mysqli_fetch_array($gettingadmindetails)){
                                    ?>
                                
                                    <h6 style="font-size:14px">


                                        Email :
                                        <input type="text" name="em" style="font-size:14px" class="form-control mb-2" value="<?php echo $row['admin_email'] ?>">

                                         LastName :
                                        <input type="text" name="ln" style="font-size:14px" class="form-control mb-2" value="<?php echo $row['admin_lname'] ?>">

                                         FirstName :
                                        <input type="text" name="fn" style="font-size:14px" class="form-control mb-2" value="<?php echo $row['admin_fname'] ?>">

                                         Display Name :
                                        <input type="text" name="dn" style="font-size:14px" class="form-control mb-2" value="<?php echo $row['admin_dsplyname'] ?>">

                                    </h6>
                                    <?php       
                                 }
                            
                             


                         ?>


                     </div> 
                     
                   
                    <hr>

                    <button type="button" class="btn btn-dark" data-dismiss="modal" style="font-size: 12px;float: right;">Close</button>

                     <button type="submit" class="btn btn-dark mr-2" name="savechanges" style="font-size: 12px;float: right;">Savechanges</button>
                     </form>
                  </div>
                
                </div>
              </div>
            </div>

                
                <!-- Modal -->
                <div class="modal fade" id="esign" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                    <div class="modal-content" id="form">
                      
                       <form method="post" action="save_e.php" enctype="multipart/form-data">
                                              
                          <input type="hidden" name="saveesign">
                     
                      <div class="modal-body">
                            <h6 style="font-weight: bolder;">Upload E-signature</h6>
                        <br>
                        <?php 
                        $adminid = $_SESSION['adm_id'];
                              $getesign = " select * from administrator where admin_id = '$adminid'  ";
                                          $esignuser = mysqli_query($con,$getesign); 
                                       
                                      
                                           while($row = mysqli_fetch_array($esignuser)){
                                              
                                              $eimg = $row['esign'];

                                              if($eimg == ''){
                                                $imgsrc = '../signatures/signature.png';
                                              }else {
                                                $imgsrc = '../signatures/'.$eimg;
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

            <!-- Modal -->
            <div class="modal fade" id="changepasss" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
              
                  <div class="modal-body">
                     <form method="post" action="changepass.php" id="changepass">
                     <div class="container" style="font-size: 13px">
                            
                        <label>Current Password:</label>      
                                                      
                            <input type="password" style="font-size: 13px" class="form-control" name="cp"><br>

                              <label>New Password:</label>      
                                                      
                            <input type="password" style="font-size: 13px" class="form-control" name="np"><br>

                              <label>Re-Enter New Password:</label>      
                                                      
                            <input type="password" style="font-size: 13px" class="form-control" name="rnp">
                            



                     </div> 
                     
                   
                    <hr>

                    <button type="button" class="btn btn-dark" data-dismiss="modal" style="font-size: 12px;float: right;">Close</button>

                     <button type="submit" class="btn btn-dark mr-2" style="font-size: 12px;float: right;">Change</button>
                     </form>
                  </div>
                
                </div>
              </div>
            </div>

            
            
            <!-- Modal -->
            <div class="modal fade" id="alluserguide" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                
                  <div class="modal-body">
                    
                     <div class="container">
                        
   <span style="font-size: 20px;font-weight: bolder;">USER_GUIDE <br> <hr> </span>




                     </div> 
                     
            
            
                   
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-light" style="font-size:12px" data-dismiss="modal">Close</button>
                   
                  </div>
                </div>
              </div>
            </div>
            <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
         
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

                      /*    $('#changepass').on('submit', function(event){
                             event.preventDefault();
                                          $.ajax({
                                               url :$(this).attr('action'),
                                                method: "POST",
                                                 data  : $(this).serialize(),
                                                 success : function(data){
                                                alert(data);
                                                 }
                                              })
                             });*/
                      });      
                      
            </script>
           

            