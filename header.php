<?php
error_reporting(0);
session_start();
require('configure.php');
// session_start();
if (!isset($_SESSION['logname'])) {
    header("location:login.php");
}
if (isset($_SESSION['logname'])) {

    ?>
    <!-- Page Wrapper -->

    <div id="wrapper">



        <!-- Sidebar -->

        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">



            <!-- Sidebar - Brand -->

            <!-- <a class="sidebar-brand d-flex align-items-center justify-content-center" href="registration.php">

                <div class="sidebar-brand-icon rotate-n-15 ">

                    <i class='fas fa-user-md' style='font-size:40px'></i>

                </div>

                <div class="sidebar-brand-text mx-3">WMDC Dashboard<sup></sup></div>

            </a> -->



            <!-- Divider -->

            <hr class="sidebar-divider my-0">



            <!-- Nav Item - Dashboard -->

            <li class="nav-item active">

                <a class="nav-link" href="registration.php">

                    <i class="fas fa-fw fa-tachometer-alt"></i>

                    <span>Dashboard</span></a>

            </li> 



            <!-- Divider -->

            <hr class="sidebar-divider">



            <!-- Heading -->

            <div class="sidebar-heading">

                Interface

            </div>



         

            <!-- <li class="nav-item">

            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"

                aria-expanded="true" aria-controls="collapseThree">

                <i class="fa fa-upload"></i>

                <span>Challan</span>

            </a>

            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">

                <div class="bg-white py-2 collapse-inner rounded">

                    <h6 class="collapse-header">Challan Components:</h6>

                  





                     <a class="collapse-item" href="uploadChallan.php">Upload Challan</a> 

                     <a class="collapse-item" href="downloadChallan.php">Download Challan</a> 

                </div>

            </div>

        </li>

         -->







            <li class="nav-item">

                <a class="nav-link" href="studentProfile.php">

                    <i class="fa fa-user"></i>

                    <span>Student Profile</span></a>

            </li>



         



 



            





            <!--<li class="nav-item">-->

            <!--    <a class="nav-link" href="multiple.php">-->

            <!--        <i class="fa fa-wrench"></i>-->

            <!--        <span>Up-Load Documents</span></a>-->

            <!--</li>-->





            <!--<li class="nav-item">-->

            <!--    <a class="nav-link" href="studentProfile.php">-->

            <!--        <i class="fa fa-download"></i>-->

            <!--        <span>Download Challan</span></a>-->

            <!--</li>-->

















            <!-- Nav Item - Utilities Collapse Menu -->

            <!-- <li class="nav-item">

            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"

                aria-expanded="true" aria-controls="collapseUtilities">

                <i class="fas fa-fw fa-wrench"></i>

                <span>student Profile</span>

            </a>

            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"

                data-parent="#accordionSidebar">

                <div class="bg-white py-2 collapse-inner rounded">

                    <h6 class="collapse-header">Student Profile:</h6>

                    <a class="collapse-item" href="getChallanForm.php">Get challan Form

                    <a class="collapse-item" href="studentProfile.php">Profile</a>

                    <a class="collapse-item" href="studentProfile.php">Download Challan</a>

                    <a class="collapse-item" href="updateResult.php">Update Record</a>

                    <a class="collapse-item" href="multiple.php">Upload Document</a>

                    <a class="collapse-item" href="#">Other</a>

                </div>

            </div>

        </li> -->



            <!-- Divider -->

            <hr class="sidebar-divider">



            <!-- Heading -->

            <div class="sidebar-heading">

                Addons

            </div>



            <!-- Nav Item - Pages Collapse Menu -->

            <!-- <li class="nav-item">

            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"

                aria-expanded="true" aria-controls="collapsePages">

                <i class="fas fa-fw fa-folder"></i>

                <span>Account</span>

            </a>

            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">

                <div class="bg-white py-2 collapse-inner rounded">

                    <h6 class="collapse-header">Login:</h6>

                    <a class="collapse-item" href="login.php">Login</a>

                    <a class="collapse-item" href="register.php">Register</a>

                    <a class="collapse-item" href="forgot-password.html">Forgot Password</a>

                    <div class="collapse-divider"></div>

                    <h6 class="collapse-header">Other Pages:</h6>

                    <a class="collapse-item" href="404.html">404 Page</a>

                    <a class="collapse-item" href="details.php">Student Details</a>

                </div>

            </div>

        </li> -->



            <!-- Nav Item - Charts -->

            <li class="nav-item">

                <a class="nav-link" href="logout.php">

                    <i class="fa fa-sign-out"></i>

                    <span>Logout</span></a>

            </li>



            <!-- Nav Item - Tables -->

            <!--<li class="nav-item">-->

            <!--    <a class="nav-link" href="tables.html">-->

            <!--        <i class="fas fa-fw fa-table"></i>-->

            <!--        <span>Tables</span></a>-->

            <!--</li>-->



            <!-- Divider -->

            <hr class="sidebar-divider d-none d-md-block">



            <!-- Sidebar Toggler (Sidebar) -->

            <div class="text-center d-none d-md-inline">

                <button class="rounded-circle border-0" id="sidebarToggle"></button>

            </div>



            <!-- Sidebar Message -->

            <div class="sidebar-card d-none d-lg-flex">

                <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">

                <!--<p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>-->

                <a class="btn btn-success btn-sm"></a>

            </div>



        </ul>

        <!-- End of Sidebar -->



        <!-- Content Wrapper -->

        <div id="content-wrapper" class="d-flex flex-column">



            <!-- Main Content -->

            <div id="content">



                <!-- Topbar -->

                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">



                    <!-- Sidebar Toggle (Topbar) -->

                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">

                        <i class="fa fa-bars"></i>

                    </button>



                    <!-- Topbar Search -->

                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">

                        <div class="input-group">

                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">

                            <div class="input-group-append">

                                <button class="btn btn-primary" type="button">

                                    <i class="fas fa-search fa-sm"></i>

                                </button>

                            </div>

                        </div>

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

                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">

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

                        <?php





                        $logname = $_SESSION['logname'];





                        if ($conn === false) {

                            die("ERROR: Could not connect. " . mysqli_connect_error());

                        } else {

                            if (isset($_SESSION['logname']) != "") {



                                $query = "SELECT * FROM `student_reg_25to26` WHERE `cnic` = '$logname'";

                                $result = mysqli_query($conn, $query);

                                if (mysqli_num_rows($result) > 0) {

                                    while ($row = mysqli_fetch_array($result)) {

                                        ?>

                                        <!-- Nav Item - User Information -->
                                       <ul>
                                        <li class="nav-item dropdown no-arrow">

                                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                                    <?php echo $row['name'];

                                    }

                                }

                            }

                        } ?>

                                </span>

                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg" style="margin-right:30px;">

                            </a>

                            <!-- Dropdown - User Information -->

                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">

                                <a class="dropdown-item" href="studentProfile.php">

                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>

                                    Profile

                                </a>

                                <!--<a class="dropdown-item" href="#">-->

                                <!--    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>-->

                                <!--    Settings-->

                                <!--</a>-->

                                <!--<a class="dropdown-item" href="#">-->

                                <!--    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>-->

                                <!--    Activity Log-->

                                <!--</a>-->

                                <div class="dropdown-divider" href="logout.php"></div>

                                <a class="dropdown-item" href="logout.php">

                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>

                                    Logout

                                </a>

                            </div>

                        </li>



                    </ul>



                </nav>


               
                <?php





}

?>

<style>
 .form-control-lg   {
    border-radius: 10rem;
 }
</style>
