<?php 
session_start();
 

 ?>
<!DOCTYPE html>
<html lang="en">


<?php include '../include/assets/head.php';
// include '../GCC/Classes/sql_query.php';
 ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!--sidebar-->

        <ul class="navbar-nav  sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #313439">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <img src="../../GCC/img/gcc.png" style="width: 50px;transform: rotate(15deg);">
                </div>
                <div class="sidebar-brand-text mx-3">
                    <?php 
                    echo $_SESSION['sidebar_banner1'];
                     ?>

                    <!--<sup>2</sup>-->
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item  ">
                <a class="nav-link" href="../Dashboard/">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Manage
            </div>
            <li class="nav-item active">
                <a class="nav-link" href="../accounts/">

                    <i class="fas fa-users-cog"></i>
                    <span>Accounts</span></a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->


            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>



        </ul>
        <!--end of sidebar-->


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!--topbar-->
                <?php include '../include/assets/topbar.php';?>
                <!--end of topbar-->


                <style type="text/css">
                    {}

                    #contentss::-webkit-scrollbar {
                        width: 3px;

                    }

                    /* Track */
                    #contentss::-webkit-scrollbar-track {
                        background: #d7faed;
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
                <div class="container-fluid">
                    <span class="text-gray-800" style="font-weight: bold;" id="tryfound"></span>
                    <div class="advancecontent_search row d-none" id="content_search" data-role="searchfor"> </div>

                    <div class="051715" id="051715">

                        <!-- Page Heading -->
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Accounts</h1>
                            <!--<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
                        </div>

                        <!--contents here-->
                        <div class="row">





                        </div>

                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            <?php 
//include '../GCC/Dashboard/notification.php';
 ?>



            <?php //include 'assets.php' ?>

            <script src="../../offline/sweetalert.js"></script>
            <script src="../../js/jquery.js"></script>

            <script type="text/javascript">
                $(document).ready(function () {



                });
            </script>



            <!-- Footer -->
            <?php include '../include/assets/footer.php';

            if(isset($_GET['addannouncement'])){ 
                ?>
            <script type="text/javascript">
                $(document).ready(function () {
                    $('#addnew').modal({
                        backdrop: 'static',
                        keyboard: true,
                        show: true
                    });
                });
            </script>
            <?php
                
            }

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
    <?php include '../logoutmodal.php';  ?>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>



</body>

</html>