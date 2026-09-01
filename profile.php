<?php
session_start();

if (!isset($_SESSION['logname'])) {
    header("location:login.php");
    exit();
}

error_reporting(0);
require('configure.php');
include('linkss.php');
include('header.php');

if ($conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$logname = $_SESSION['logname'];

// Fetch full student registration record
$query = "SELECT * FROM `registration_26to27` WHERE `cnic` = '$logname'";
$result = mysqli_query($conn, $query);

if (!$result || mysqli_num_rows($result) <= 0) {
    // Fallback to student pre-registration table if wizard not completed
    $query = "SELECT * FROM `student_reg_26to27` WHERE `cnic` = '$logname'";
    $result = mysqli_query($conn, $query);
}

$student = array();
if ($result && mysqli_num_rows($result) > 0) {
    $student = mysqli_fetch_array($result, MYSQLI_ASSOC);
}

$stdName        = isset($student['name']) ? $student['name'] : '';
$stdFname       = isset($student['fname']) ? $student['fname'] : '';
$stdCnic        = isset($student['cnic']) ? $student['cnic'] : $logname;
$stdPhone       = isset($student['stdPhone']) ? $student['stdPhone'] : '';
$fatPhone       = isset($student['fatPhone']) ? $student['fatPhone'] : '';
$emergencyPhone = isset($student['emergencyPhone']) ? $student['emergencyPhone'] : '';
$email          = isset($student['email']) ? $student['email'] : '';
$gender         = isset($student['gender']) ? $student['gender'] : '';
$dob            = isset($student['dob']) ? $student['dob'] : '';
$address        = isset($student['address']) ? $student['address'] : '';
$city           = isset($student['city']) ? $student['city'] : '';
$program        = isset($student['program']) ? $student['program'] : 'N/A';
$matricMarks    = isset($student['matricMarks']) ? $student['matricMarks'] : '';
$marksOutOf     = isset($student['marksOutOf']) && !empty($student['marksOutOf']) ? $student['marksOutOf'] : '1100';
$fscmarks       = isset($student['fscmarks']) ? $student['fscmarks'] : '';
$fscMarksOutOf  = isset($student['fscMarksOutOf']) && !empty($student['fscMarksOutOf']) ? $student['fscMarksOutOf'] : '1100';
$comYear        = isset($student['comYear']) ? $student['comYear'] : '';
$testType       = isset($student['testType']) && !empty($student['testType']) ? $student['testType'] : 'MDCAT';
$mcat           = isset($student['mcat']) ? $student['mcat'] : '';
$mcatr          = isset($student['mcatr']) ? $student['mcatr'] : '';
$total_marks    = isset($student['total_marks']) && !empty($student['total_marks']) ? $student['total_marks'] : '200';
$mcatYear       = isset($student['mcat_passing_year']) ? $student['mcat_passing_year'] : '';
$biology        = isset($student['biology']) ? $student['biology'] : '';
$chemistry      = isset($student['chemistry']) ? $student['chemistry'] : '';
$physics        = isset($student['physics']) ? $student['physics'] : '';
$aggregatePer   = isset($student['aggregatePer']) ? $student['aggregatePer'] : '';
$profilePic     = isset($student['profilePicture']) && !empty($student['profilePicture']) ? $student['profilePicture'] : '';
?>

<!-- Custom Responsive Profile Dashboard Styling -->
<style>
    .profile-hero-card {
        background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
        color: #ffffff;
        border-radius: 12px;
    }
    .profile-avatar-img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border: 4px solid rgba(255, 255, 255, 0.8);
        box-shadow: 0 4px 10px rgba(0,0,0,0.15);
    }
    .profile-avatar-placeholder {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        background-color: #ffffff;
        color: #4e73df;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 40px;
        border: 4px solid rgba(255, 255, 255, 0.8);
        box-shadow: 0 4px 10px rgba(0,0,0,0.15);
    }
    .info-label {
        font-size: 0.85rem;
        font-weight: 700;
        text-transform: uppercase;
        color: #858796;
        margin-bottom: 2px;
    }
    .info-value {
        font-size: 1rem;
        font-weight: 600;
        color: #2e59d9;
        margin-bottom: 0.75rem;
    }
    .dashboard-btn {
        border-radius: 25px;
        font-weight: 700;
        padding: 0.5rem 1.25rem;
    }
    @media (max-width: 576px) {
        .profile-hero-card .card-body {
            padding: 1.25rem !important;
        }
        .profile-avatar-img, .profile-avatar-placeholder {
            width: 80px;
            height: 80px;
            font-size: 32px;
        }
        .header-actions {
            width: 100%;
        }
        .header-actions .btn {
            width: 100%;
            margin-right: 0 !important;
            margin-bottom: 0.5rem !important;
        }
        .info-label {
            font-size: 0.75rem;
        }
        .info-value {
            font-size: 0.95rem;
            word-wrap: break-word;
            overflow-wrap: break-word;
            margin-bottom: 0.5rem;
        }
        .card-body {
            padding: 1rem !important;
        }
        .badge {
            font-size: 0.8rem;
            white-space: normal;
            text-align: left;
        }
    }
</style>

<!-- Begin Page Content -->
<div class="container-fluid py-3">

    <!-- Header Title & Action Buttons -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-3 mb-sm-0 text-gray-800 font-weight-bold">
            <i class="fas fa-id-card text-primary mr-2"></i>Student Profile Dashboard
        </h1>
        <div class="header-actions d-flex flex-column flex-sm-row flex-wrap">
            <a href="registration.php?edit=1" class="btn btn-primary btn-sm dashboard-btn shadow-sm mr-sm-2 mb-2 mb-sm-0">
                <i class="fas fa-edit mr-1"></i> Update Info / Marks
            </a>
            <!-- <a href="details.php" class="btn btn-info btn-sm dashboard-btn shadow-sm mr-2 mb-2 mb-sm-0" target="_blank">
                <i class="fas fa-print mr-1"></i> Print Summary
            </a> -->
            <a href="logout.php" class="btn btn-secondary btn-sm dashboard-btn shadow-sm mb-2 mb-sm-0">
                <i class="fas fa-sign-out-alt mr-1"></i> Logout
            </a>
        </div>
    </div>

    <!-- Student Hero Profile Banner -->
    <div class="card profile-hero-card shadow mb-4">
        <div class="card-body p-4">
            <div class="row align-items-center">
                <div class="col-auto mb-3 mb-md-0 text-center">
                    <?php 
                        $profilePicPath1 = "uploads_26to27/profiles/" . $stdCnic . "/" . $profilePic;
                        $profilePicPath2 = "uploads/" . $profilePic;
                        
                        if (!empty($profilePic) && file_exists($profilePicPath1)):
                    ?>
                        <img src="<?php echo htmlspecialchars($profilePicPath1); ?>" alt="Student Photo" class="rounded-circle profile-avatar-img">
                    <?php elseif (!empty($profilePic) && file_exists($profilePicPath2)): ?>
                        <img src="<?php echo htmlspecialchars($profilePicPath2); ?>" alt="Student Photo" class="rounded-circle profile-avatar-img">
                    <?php else: ?>
                        <div class="profile-avatar-placeholder mx-auto">
                            <i class="fas fa-user"></i>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col text-center text-md-left">
                    <h2 class="h3 font-weight-bold mb-1">
                        Welcome, <?php echo htmlspecialchars(!empty($stdName) ? $stdName : 'Student'); ?>!
                    </h2>
                    <p class="mb-2 opacity-75 font-weight-bold">
                        <i class="fas fa-user-friends mr-1"></i> Father / Guardian: <?php echo htmlspecialchars(!empty($stdFname) ? $stdFname : 'N/A'); ?>
                    </p>
                    <div class="d-flex flex-wrap justify-content-center justify-content-md-start gap-2 mt-2">
                        <span class="badge badge-light px-3 py-2 mr-2 mb-2 font-weight-bold text-dark shadow-sm">
                            <i class="fas fa-id-card text-primary mr-1"></i> CNIC: <?php echo htmlspecialchars($stdCnic); ?>
                        </span>
                        <span class="badge badge-warning px-3 py-2 mr-2 mb-2 font-weight-bold text-dark shadow-sm">
                            <i class="fas fa-graduation-cap mr-1"></i> Program: <?php echo htmlspecialchars($program); ?>
                        </span>
                        <?php if (!empty($aggregatePer)): ?>
                            <span class="badge badge-success px-3 py-2 mb-2 font-weight-bold shadow-sm">
                                <i class="fas fa-calculator mr-1"></i> <?php echo htmlspecialchars($aggregatePer); ?>% Aggregate
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Grid -->
    <div class="row">

        <!-- Card 1: Personal & Contact Information -->
        <div class="col-lg-6 col-12 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-header py-3 bg-transparent border-0">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-address-book mr-2"></i>Personal & Contact Details
                    </h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6 col-12">
                            <div class="info-label">Full Name</div>
                            <div class="info-value"><?php echo htmlspecialchars(!empty($stdName) ? $stdName : 'N/A'); ?></div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="info-label">Father / Guardian</div>
                            <div class="info-value"><?php echo htmlspecialchars(!empty($stdFname) ? $stdFname : 'N/A'); ?></div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="info-label">Email Address</div>
                            <div class="info-value"><?php echo htmlspecialchars(!empty($email) ? $email : 'N/A'); ?></div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="info-label">Student Mobile</div>
                            <div class="info-value"><?php echo htmlspecialchars(!empty($stdPhone) ? $stdPhone : 'N/A'); ?></div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="info-label">Father Mobile</div>
                            <div class="info-value"><?php echo htmlspecialchars(!empty($fatPhone) ? $fatPhone : 'N/A'); ?></div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="info-label">Emergency Contact</div>
                            <div class="info-value"><?php echo htmlspecialchars(!empty($emergencyPhone) ? $emergencyPhone : 'N/A'); ?></div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="info-label">Date of Birth</div>
                            <div class="info-value"><?php echo htmlspecialchars(!empty($dob) ? $dob : 'N/A'); ?></div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="info-label">Gender</div>
                            <div class="info-value"><?php echo htmlspecialchars(!empty($gender) ? $gender : 'N/A'); ?></div>
                        </div>
                        <div class="col-12">
                            <div class="info-label">City & Address</div>
                            <div class="info-value">
                                <?php 
                                    $fullAddr = array_filter(array($city, $address));
                                    echo htmlspecialchars(!empty($fullAddr) ? implode(' - ', $fullAddr) : 'N/A');
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 2: Academic & Merit Summary -->
        <div class="col-lg-6 col-12 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-header py-3 bg-transparent border-0">
                    <h6 class="m-0 font-weight-bold text-success">
                        <i class="fas fa-university mr-2"></i>Academic & Merit Details
                    </h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6 col-12">
                            <div class="info-label">Applied Program</div>
                            <div class="info-value text-success"><?php echo htmlspecialchars($program); ?></div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="info-label">Approximate Aggregate</div>
                            <div class="info-value text-success font-weight-bold">
                                <?php echo htmlspecialchars(!empty($aggregatePer) ? $aggregatePer . '%' : 'N/A'); ?>
                            </div>
                        </div>

                        <!-- 1. MDCAT / Entry Test Details -->
                        <div class="col-sm-6 col-12">
                            <div class="info-label">Entry Test Type</div>
                            <div class="info-value"><?php echo htmlspecialchars($testType); ?></div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="info-label"><?php echo htmlspecialchars($testType); ?> Marks</div>
                            <div class="info-value">
                                <?php 
                                    if (!empty($mcatr)) {
                                        echo htmlspecialchars($mcatr . (!empty($total_marks) ? ' / ' . $total_marks : ''));
                                    } else {
                                        echo 'N/A';
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="info-label"><?php echo htmlspecialchars($testType); ?> Roll Number</div>
                            <div class="info-value"><?php echo htmlspecialchars(!empty($mcat) ? $mcat : 'N/A'); ?></div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="info-label"><?php echo htmlspecialchars($testType); ?> Passing Year</div>
                            <div class="info-value"><?php echo htmlspecialchars(!empty($mcatYear) ? $mcatYear : 'N/A'); ?></div>
                        </div>

                        <!-- 2. F.Sc / A-Level Details -->
                        <div class="col-sm-6 col-12">
                            <div class="info-label">F.Sc / A-Level Marks</div>
                            <div class="info-value">
                                <?php echo htmlspecialchars(!empty($fscmarks) ? $fscmarks . ' / ' . $fscMarksOutOf : 'N/A'); ?>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="info-label">F.Sc Passing Year</div>
                            <div class="info-value"><?php echo htmlspecialchars(!empty($comYear) ? $comYear : 'N/A'); ?></div>
                        </div>
                        <?php if ($comYear == '2021' && (!empty($biology) || !empty($chemistry) || !empty($physics))): ?>
                            <div class="col-sm-4 col-12">
                                <div class="info-label">Biology Marks</div>
                                <div class="info-value"><?php echo htmlspecialchars(!empty($biology) ? $biology : 'N/A'); ?></div>
                            </div>
                            <div class="col-sm-4 col-12">
                                <div class="info-label">Chemistry Marks</div>
                                <div class="info-value"><?php echo htmlspecialchars(!empty($chemistry) ? $chemistry : 'N/A'); ?></div>
                            </div>
                            <div class="col-sm-4 col-12">
                                <div class="info-label">Physics Marks</div>
                                <div class="info-value"><?php echo htmlspecialchars(!empty($physics) ? $physics : 'N/A'); ?></div>
                            </div>
                        <?php endif; ?>

                        <!-- 3. Matric / O-Level Details -->
                        <div class="col-sm-6 col-12">
                            <div class="info-label">Matric / O-Level Marks</div>
                            <div class="info-value">
                                <?php echo htmlspecialchars(!empty($matricMarks) ? $matricMarks . ' / ' . $marksOutOf : 'N/A'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 3: Fee Challan Downloads & Document Hub -->
        <div class="col-12 mb-4">
            <div class="card border-left-warning shadow">
                <div class="card-body p-3 p-sm-4">
                    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center pb-3 border-bottom mb-3">
                        <h6 class="font-weight-bold text-warning mb-3 mb-sm-0">
                            <i class="fas fa-folder-open mr-2"></i>Uploaded Documents
                        </h6>
                        <div class="d-flex flex-column flex-sm-row gap-2">
                            <!-- Fee Challan Buttons (Removed as requested)
                            <?php if ($program == 'BOTH' || $program == 'BDS'): ?>
                                <a href="Dentalchallan.php" class="btn btn-primary btn-sm dashboard-btn shadow-sm mb-2 mb-sm-0 mr-sm-2" target="_blank">
                                    <i class="fas fa-file-invoice mr-1"></i> BDS Fee Challan
                                </a>
                            <?php endif; ?>

                            <?php if ($program == 'BOTH' || $program == 'MBBS'): ?>
                                <a href="Medchallan.php" class="btn btn-danger btn-sm dashboard-btn shadow-sm mb-2 mb-sm-0 mr-sm-2" target="_blank">
                                    <i class="fas fa-file-invoice-dollar mr-1"></i> MBBS Fee Challan
                                </a>
                            <?php endif; ?>
                            -->

                            <a href="registration.php?step=3&edit=1" class="btn btn-warning btn-sm text-dark dashboard-btn shadow-sm mb-2 mb-sm-0">
                                <i class="fas fa-upload mr-1"></i> Upload Documents
                            </a>
                        </div>
                    </div>

                    <!-- Uploaded Documents Status Grid -->
                    <div>
                        <div class="row">
                            <!-- MDCAT Result -->
                            <div class="col-12 col-sm-6 col-md-3 mb-3">
                                <div class="p-3 border rounded bg-light text-center h-100 shadow-sm">
                                    <span class="small font-weight-bold d-block text-dark mb-2">MDCAT Result</span>
                                    <?php if (!empty($student['mdcatImage'])): ?>
                                        <span class="badge badge-success px-2 py-1"><i class="fas fa-check mr-1"></i> Uploaded</span>
                                        <a href="uploads_26to27/documents/<?php echo htmlspecialchars($stdCnic); ?>/<?php echo htmlspecialchars($student['mdcatImage']); ?>" target="_blank" class="btn btn-link btn-sm p-0 d-block mt-2 font-weight-bold text-primary small">
                                            <i class="fas fa-eye mr-1"></i> View Image
                                        </a>
                                    <?php else: ?>
                                        <span class="badge badge-secondary px-2 py-1"><i class="fas fa-clock mr-1"></i> Pending</span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- F.Sc Marksheet -->
                            <div class="col-12 col-sm-6 col-md-3 mb-3">
                                <div class="p-3 border rounded bg-light text-center h-100 shadow-sm">
                                    <span class="small font-weight-bold d-block text-dark mb-2">F.Sc Marksheet</span>
                                    <?php if (!empty($student['fscImage'])): ?>
                                        <span class="badge badge-success px-2 py-1"><i class="fas fa-check mr-1"></i> Uploaded</span>
                                        <a href="uploads_26to27/documents/<?php echo htmlspecialchars($stdCnic); ?>/<?php echo htmlspecialchars($student['fscImage']); ?>" target="_blank" class="btn btn-link btn-sm p-0 d-block mt-2 font-weight-bold text-primary small">
                                            <i class="fas fa-eye mr-1"></i> View Image
                                        </a>
                                    <?php else: ?>
                                        <span class="badge badge-secondary px-2 py-1"><i class="fas fa-clock mr-1"></i> Pending</span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- Matric Marksheet -->
                            <div class="col-12 col-sm-6 col-md-3 mb-3">
                                <div class="p-3 border rounded bg-light text-center h-100 shadow-sm">
                                    <span class="small font-weight-bold d-block text-dark mb-2">Matric Marksheet</span>
                                    <?php if (!empty($student['matricImage'])): ?>
                                        <span class="badge badge-success px-2 py-1"><i class="fas fa-check mr-1"></i> Uploaded</span>
                                        <a href="uploads_26to27/documents/<?php echo htmlspecialchars($stdCnic); ?>/<?php echo htmlspecialchars($student['matricImage']); ?>" target="_blank" class="btn btn-link btn-sm p-0 d-block mt-2 font-weight-bold text-primary small">
                                            <i class="fas fa-eye mr-1"></i> View Image
                                        </a>
                                    <?php else: ?>
                                        <span class="badge badge-secondary px-2 py-1"><i class="fas fa-clock mr-1"></i> Pending</span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- Passport / Iqama (if Overseas) -->
                            <?php if (isset($student['stdType']) && $student['stdType'] == 'Overseas/Foreign'): ?>
                                <div class="col-12 col-sm-6 col-md-3 mb-3">
                                    <div class="p-3 border rounded bg-light text-center h-100 shadow-sm">
                                        <span class="small font-weight-bold d-block text-dark mb-2">Passport / Iqama</span>
                                        <?php if (!empty($student['passportIqamaImage'])): ?>
                                            <span class="badge badge-success px-2 py-1"><i class="fas fa-check mr-1"></i> Uploaded</span>
                                            <a href="uploads_26to27/documents/<?php echo htmlspecialchars($stdCnic); ?>/<?php echo htmlspecialchars($student['passportIqamaImage']); ?>" target="_blank" class="btn btn-link btn-sm p-0 d-block mt-2 font-weight-bold text-primary small">
                                                <i class="fas fa-eye mr-1"></i> View Image
                                            </a>
                                        <?php else: ?>
                                            <span class="badge badge-secondary px-2 py-1"><i class="fas fa-clock mr-1"></i> Pending</span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
<!-- /.container-fluid -->

<!-- Bootstrap & Core Plugins -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="js/sb-admin-2.min.js"></script>

<?php 
include('footer.php');
?>