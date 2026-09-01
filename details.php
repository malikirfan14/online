<?php
session_start();

if (!isset($_SESSION['logname'])) {
    header("location:login.php");
    exit();
}

error_reporting(0);
require('configure.php');
include('linkss.php');

$logname = $_SESSION['logname'];

if ($conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$query = "SELECT * FROM `registration_26to27` WHERE `cnic` = '$logname' LIMIT 1";
$result = mysqli_query($conn, $query);

if (!$result || mysqli_num_rows($result) <= 0) {
    $query = "SELECT * FROM `student_reg_26to27` WHERE `cnic` = '$logname' LIMIT 1";
    $result = mysqli_query($conn, $query);
}

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
?>
<style>
    @media print {
        .no-print {
            display: none !important;
        }
        body {
            background-color: #fff !important;
        }
        .container-fluid {
            padding: 0 !important;
        }
    }
</style>
<div class="container py-4">
    <div class="d-flex align-items-center justify-content-between mb-4 no-print">
        <a href="profile.php" class="btn btn-secondary btn-sm rounded-pill px-3">
            <i class="fas fa-arrow-left mr-1"></i> Back to Dashboard
        </a>
        <button onclick="window.print()" class="btn btn-primary btn-sm rounded-pill px-4 shadow-sm">
            <i class="fas fa-print mr-1"></i> Print / Save as PDF
        </button>
    </div>

    <div class="card shadow border-0">
        <div class="card-body p-4">
            <div class="text-center mb-4">
                <h2 class="h4 font-weight-bold text-gray-900 mb-1">WATIM MEDICAL & DENTAL COLLEGE</h2>
                <h5 class="h6 text-primary font-weight-bold">Student Online Pre-Registration Summary</h5>
                <hr />
            </div>

            <div class="alert alert-success border-left-success no-print" role="alert">
                <strong><i class="fas fa-check-circle mr-1"></i> Pre-Registration Submitted Successfully!</strong><br />
                <span class="small">Check & verify all your details/credentials given below. In case of any mistake, you can update details in the relevant section.</span>
            </div>

            <div class="table-responsive mt-3">
                <table id="dataTable" class="table table-hover table-striped table-bordered">
                    <tbody>
                                            <tr>
                                                <td class="bg-dark text-white text-left"><b>Approximate Aggregate</b> </td>
                                                <td class="bg-dark text-white text-left"> <b>
                                                        <?php echo $row['aggregatePer']; ?>
                                                    </b></td>
                                            </tr>
                                            <tr>
                                                <td><b>Program</b> </td>
                                                <td>
                                                    <?php echo $row['program']; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><b>Student Name</b> </td>
                                                <td>
                                                    <?php echo $row['name']; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><b>Father/ Guardian Name</b>
                                                <td>
                                                    <?php echo $row['fname']; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> <b>Student CNIC</b></td>
                                                <td>
                                                    <?php echo $row['cnic']; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> <b>CNIC Date of Issue </b></td>
                                                <td>
                                                    <?php echo $row['cnic_issue_date']; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> <b>Student Date of Birth</b></td>
                                                <td>
                                                    <?php echo $row['dob']; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><b>Student Contact #</b></td>
                                                <td>
                                                    <?php echo $row['stdPhone']; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><b>Father Contact #</b></td>
                                                <td>
                                                    <?php echo $row['fatPhone']; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><b>Emergency Contact #</b></td>
                                                <td>
                                                    <?php echo $row['emergencyPhone']; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><b>Gender</b></td>
                                                <td>
                                                    <?php echo $row['gender']; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><b>Email</b></td>
                                                <td>
                                                    <?php echo $row['email']; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><b>Address</b></td>
                                                <td>
                                                    <?php echo $row['address']; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><b>City</b></td>
                                                <td>
                                                    <?php echo $row['city']; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> <b>Matric Marks</b> </td>
                                                <td>
                                                    <?php echo $row['matricMarks']; ?> /
                                                    <?php echo $row['marksOutOf']; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> <b>F.Sc / A-Level Passing Year</b> </td>
                                                <td>
                                                    <?php echo $row['comYear']; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> <b>F.Sc / A-Level Marks</b> </td>
                                                 <td>
                                                     <?php echo $row['fscmarks']; ?> / <?php echo !empty($row['fscMarksOutOf']) ? $row['fscMarksOutOf'] : '1100'; ?>
                                                 </td>
                                            </tr>
                                            <tr>
                                                <td><b>Physics (Only 2021 F.Sc / A-Level Students)</b> </td>
                                                <td>
                                                    <?php echo $row['physics']; ?> / F.Sc 200 or A-Level 100
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><b>Chemistry (Only 2021 F.Sc / A-Level Students)</b> </td>
                                                <td>
                                                    <?php echo $row['chemistry']; ?> / F.Sc 200 or A-Level 100
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><b>Biology (Only 2021 F.Sc / A-Level Students)</b> </td>
                                                <td>
                                                    <?php echo $row['biology']; ?> / F.Sc 200 or A-Level 100
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><b>MDCAT Roll Number</b> </td>
                                                <td>
                                                    <?php echo $row['mcat']; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><b>MDCAT Marks</b> </td>
                                                <td>
                                                    <?php echo $row['mcatr']; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><b>MDCAT Passing Year</b> </td>
                                                <td>
                                                    <?php echo $row['mcat_passing_year']; ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="js/sb-admin-2.min.js"></script>
<?php
    }
}
?>