<?php
session_start();
// session_start();
if (!isset($_SESSION['logname'])) {
    header("location:login.php");

}
if (isset($_SESSION['logname'])) {
    error_reporting(0);
// require('configure.php');
// include('linkss.php');
// include('header.php');

    $logname = $_SESSION['logname'];

    if ($conn === false) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    } else {
        if (isset($_SESSION['logname']) != "") {
            $query = "SELECT * FROM `registration_26to27` WHERE `cnic` = '$logname' LIMIT 1";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <div class="container-fluid mb-4">
                    <!--<h1 class="h2 mb-4 text-gray-800">Summary</h1>-->
                                        <h1 class="h5 mb-4 text-gray-800"><?php echo $row['name']; ?> !</h1>
                                        <p><b class="mb-4 text-gray-800 text-success">Your Pre-Registration Submitted Successfuly.</b></p>
                                        <p><b class="mb-4 text-gray-800 text-danger">Check & verify all your details / credentials given below.</b></p>
                                        <p><b class="mb-4 text-gray-800 text-danger">In case of any mistake, you can update the details / credentials in the relevant section.</b></p>

                                        <p><br /></p>
                        <div class="shadow mb-4">                                                                      
                                <div class="table-responsive">
                                    <table id="dataTable" width="80%" cellspacing="0"
                                        class="table table-hover table-striped table-bordered">                                    
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
                                                    <?php echo $row['fscmarks']; ?> / 1100
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
                    <!-- /.container-fluid -->
                    <!-- Bootstrap core JavaScript-->
                    <script src="vendor/jquery/jquery.min.js"></script>
                    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
                    <!-- Core plugin JavaScript-->
                    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
                    <!-- Custom scripts for all pages-->
                    <script src="js/sb-admin-2.min.js"></script>
                    <!-- Page level plugins -->
                    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
                    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
                    <!-- Page level custom scripts -->
                    <script src="js/demo/datatables-demo.js"></script>
                    <?php
                }
            }
        }
    }
}
?>