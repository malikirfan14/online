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
<style>
    .bg-gradient-primary {
        background-color: #1e3a8a !important;
        background-image: linear-gradient(180deg, #1e3a8a 0%, #2563eb 100%) !important;
    }
    .sidebar .sidebar-brand {
        height: 4.5rem;
        text-decoration: none;
        font-size: 1.1rem;
        font-weight: 800;
        padding: 1.5rem 1rem;
        text-align: center;
        letter-spacing: 0.05rem;
    }
    .sidebar .nav-item .nav-link {
        font-weight: 600;
        padding: 0.75rem 1rem;
        border-radius: 8px;
        margin: 0.25rem 0.75rem;
        width: auto;
        transition: all 0.2s ease-in-out;
    }
    .sidebar .nav-item.active .nav-link {
        background: rgba(255, 255, 255, 0.22) !important;
        box-shadow: 0 4px 10px rgba(0,0,0,0.12);
        color: #ffffff !important;
        font-weight: 700;
    }
    .sidebar .nav-item .nav-link:hover {
        background: rgba(255, 255, 255, 0.14) !important;
        color: #ffffff !important;
    }
    .sidebar-heading {
        font-size: 0.72rem;
        font-weight: 700;
        letter-spacing: 0.08rem;
        text-transform: uppercase;
        opacity: 0.75;
        padding: 0 1rem;
        margin-top: 0.5rem;
        margin-bottom: 0.25rem;
    }
</style>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar Navigation Menu -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar Brand Header -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center my-2" href="profile.php">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-university" style="font-size: 24px;"></i>
                </div>
                <div class="sidebar-brand-text mx-2">WMDC Portal</div>
            </a>

            <hr class="sidebar-divider my-0">

            <?php $currentPage = basename($_SERVER['PHP_SELF']); ?>

            <!-- Nav Item - Student Profile -->
            <li class="nav-item <?php echo ($currentPage == 'profile.php') ? 'active' : ''; ?>">
                <a class="nav-link" href="profile.php">
                    <i class="fas fa-fw fa-id-card"></i>
                    <span>Student Profile</span>
                </a>
            </li>

            <!-- Nav Item - Admission Form -->
            <li class="nav-item <?php echo ($currentPage == 'registration.php') ? 'active' : ''; ?>">
                <a class="nav-link" href="registration.php">
                    <i class="fas fa-fw fa-edit"></i>
                    <span>Admission Form</span>
                </a>
            </li>

            <hr class="sidebar-divider">

            <!-- Nav Item - Logout -->
            <li class="nav-item">
                <a class="nav-link" href="logout.php">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </li>

            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
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
                        $stdName = 'Student';
                        $topbarPic = "img/undraw_profile.svg";

                        if ($conn !== false && !empty($_SESSION['logname'])) {
                            $query = "SELECT * FROM `registration_26to27` WHERE `cnic` = '$logname'";
                            $result = mysqli_query($conn, $query);
                            if ($result && mysqli_num_rows($result) > 0) {
                                $row = mysqli_fetch_array($result);
                                $stdName = !empty($row['name']) ? $row['name'] : 'Student';
                                $picName = isset($row['profilePicture']) ? $row['profilePicture'] : '';
                                if (!empty($picName) && file_exists("uploads_26to27/profiles/$logname/$picName")) {
                                    $topbarPic = "uploads_26to27/profiles/$logname/$picName";
                                } elseif (!empty($picName) && file_exists("uploads/$picName")) {
                                    $topbarPic = "uploads/$picName";
                                }
                            }
                        }
                        ?>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 font-weight-bold small">
                                    <?php echo htmlspecialchars($stdName); ?>
                                </span>
                                <img class="img-profile rounded-circle" src="<?php echo htmlspecialchars($topbarPic); ?>" style="width: 32px; height: 32px; object-fit: cover; margin-right: 15px;">
                            </a>

                            <!-- Dropdown - User Information -->

                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">

                                <a class="dropdown-item" href="profile.php">

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
