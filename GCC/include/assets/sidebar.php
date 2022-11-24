
        <!-- Sidebar class=bg-gradient-primary-->
        <ul class="navbar-nav  sidebar sidebar-dark accordion " id="accordionSidebar" style="background-color: <?php echo $_SESSION['sidebar_color'] ?>" >

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon rotate-n-15">
                   <img src="../img/gcc.png" style="width: 50px;transform: rotate(15deg);">
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
                <a class="nav-link" href="../Dashboard/">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
               Components
            </div>

            <!-- Nav Item - Pages Collapse Menu 
            <li class="nav-item"> 
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-clipboard-list"></i>
                    <span>Records</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Records:</h6>
                       
                    </div>
                </div>
            </li>-->
               <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="../Records/">
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
                <div id="collapseUtilities" class="collapse " aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-light py-2 collapse-inner ">
                        <h6 class="collapse-header">Custom Contents:</h6>
                         <a class="collapse-item" href="../Homepage/">Homepage</a>
                         <a class="collapse-item " href="../Pages/">Pages</a>
                        <a class="collapse-item" href="../Calendar/">Calendar</a>
                        <a class="collapse-item" href="../Announcement/">Announcement</a>
                        <a class="collapse-item" href="../Newsfeed">News Feed</a>
                         
                        
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
                <a class="nav-link" href="../Forms/">
                    <i class="fas fa-align-justify"></i>
                    <span>Form</span></a>
            </li>

         
          <li class="nav-item">
                <a class="nav-link" href="../Services/">
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
        <!-- End of Sidebar -->