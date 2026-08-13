<?php



session_start();



if (!isset($_SESSION['logname'])) {

    header("location:studentLogin.php");

}



if (isset($_SESSION['logname'])) {

    error_reporting(0);

    require('configure.php');

    include('linkss.php');

    include('header.php');





    $logname = $_SESSION['logname'];

    //   $conn = mysqli_connect('localhost:3306', 'watimcom_develop', 'Watim@321123$AH@', 'watimcom_website');



    if ($conn === false) {

        die("ERROR: Could not connect. " . mysqli_connect_error());

    } else {

        if (isset($_SESSION['logname']) != "") {







            $logname = $_SESSION['logname'];



            //   $conn = mysqli_connect('localhost:3306', 'watimcom_develop', 'Watim@321123$AH@', 'watimcom_website');

            if ($conn === false) {

                die("ERROR: Could not connect. " . mysqli_connect_error());

            } else {

                if (isset($_SESSION['logname']) != "") {



                    $query = "SELECT * FROM `student_reg_26to27` WHERE `cnic` = '$logname'";

                    $result = mysqli_query($conn, $query);

                    if (mysqli_num_rows($result) > 0) {

                        while ($row = mysqli_fetch_array($result)) {

?>

                            <!-- Nav Item - User Information -->



                            <!-- End of Topbar -->



                            <!-- Begin Page Content -->

                            <div class="container-fluid">



                                <!-- Page Heading -->



                                <!-- <div class="container"> -->



                                    <form class="form-horizontal" action="" id="downloadChallanForm" role="form" target="_blank">

                                        <button type="button" class="btn btn-danger" style="color : White; float : right; margin-top : 22px; margin-right : 10px">

                                            <a href="home.php" style="color : White; padding-right:5px; padding-left:5px "><i class="fa fa-home" style="padding-right:10px">



                                                </i>Home</a>

                                        </button>

                                        <!-- 

                                                <button type="button" class="btn btn-danger" style="color : White; float : right; margin-top : 22px; margin-right : 10px">

                                                    <a href="AddmissionRegistration.php" style="color : White; padding-right:5px; padding-left:5px "><i class="fa fa-upload" style="padding-right:10px">



                                                        </i>Upload Challan</a>

                                                </button> -->



                                        <h2>Student Profile</h2>

                                        <br><br>

                                        <h4>

                                            <i class="fa fa-user" style="padding-right:10px">



                                            </i>

                                            <?php

                                            echo 'WELCOME ';

                                            echo $row['name'];

                                            ?>

                                        </h4>

                                        <div class="form-group">

                                            <div class="col-sm-9">



                                            </div>

                                        </div>

                                        <br>

                                        <?php

                                         $stdName = $row['name'];

                                         $stdFname = $row['fname']; 

                                        }

                                    }

                                         ?>



<?php  



$query = "SELECT * FROM `registration_26to27` WHERE `cnic`= '$logname' AND (SELECT `cnic` FROM `student_reg_26to27` WHERE `cnic` = '$logname')";

$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {

    while ($rowf = mysqli_fetch_array($result)) {





        ?>

                                        <table class="table table-light" style="margin-bottom : 20px;">

                                            <thead>

                                                <tr style="font-size: 20px;">

                                                    <!--<th scope="col">#</th>-->

                                                    <th scope="col">Name</th>

                                                    <th scope="col">Father Name</th>

                                                    <th scope="col">CNIC #</th>

                                                    <th scope="col">

                                                    <?php

                                                    // echo $rowf['program'];

                                                    $program = trim($rowf['program']);

                                                    // if ($rowf['program'] == 'BOTH' || $rowf['program'] == 'BDS') {

                                                     if ($program == 'BOTH' || $program == 'BDS') {

                                                            echo 'Download Challan';

                                                    }

                                                           

                                                   ?>

                                                    </th>



                                                    <th scope="col">

                                                        <?php

                                                    // if ($rowf['program'] == 'BOTH' || $rowf['program'] == 'MBBS') {

                                                    if ($program == 'BOTH' || $program == 'MBBS') {

                                                            echo 'Download Challan';

                                                    }

                                                           

                                                   ?>

                                                    </th>

                                                  

                                                </tr>

                                            </thead>

                                            <tbody>

                                                <tr style="font-size: 15px;">

                                                    <!--<th scope="row">1</th>-->



                                                    <td><?php echo $stdName; ?></td>

                                                    <td><?php echo $stdFname; ?> </td>

                                               

                                                    <td><?php echo $rowf['cnic']; ?></td>

                                                    <td><?php

                                                        if ($rowf['program'] == 'BOTH' || $rowf['program'] == 'BDS') {

                                                            echo '

            <button type="button" class="btn btn-primary" style = "color : White; ">

       

                <a href="Dentalchallan.php" style = "color : White; "  target="_blank" >BDS Challan

                </a>

            </button>

              

          ';

                                                        }

                                                        ?>

                                                    </td>



                                                    <td>

                                                        <?php

                                                        if ($rowf['program'] == 'BOTH' || $rowf['program'] == 'MBBS') {

                                                            echo '

             <button type="button" class="btn btn-danger" style = "color : White; ">

                <a href="Medchallan.php" style = "color : White; "  target="_blank" >MBBS Challan</a>

              </button>

          ';

                                                        }

                                                        ?>





                                                    </td>



                                                  

                                                </tr>



                                                <!--  </tbody>-->

                                                <!--</table>-->



                                                <!--<table>-->



                                        </table>

                                        <br>



                                    </form> <!-- /form -->





                <?php



                                            }

                                        }

                                    }

                                }

                            }

                ?>



                                </div>

                                <!-- /.container-fluid -->







                                <!-- Bootstrap core JavaScript-->

                                <script src="vendor/jquery/jquery.min.js"></script>

                                <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>



                                <!-- Core plugin JavaScript-->

                                <script src="vendor/jquery-easing/jquery.easing.min.js"></script>



                                <!-- Custom scripts for all pages-->

                                <script src="js/sb-admin-2.min.js"></script>

                        <?php





                    }

                }

                        ?>