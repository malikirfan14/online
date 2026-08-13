<?php



session_start();



if (!isset($_SESSION['logname'])) {

    header("location:login.php");

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



                    $query = "SELECT * FROM `registration_26to27` WHERE `cnic` = '$logname'";

                    $result = mysqli_query($conn, $query);

                    if (mysqli_num_rows($result) > 0) {

                        while ($row = mysqli_fetch_array($result)) {



                            $stdName = $row['name'];

                            $stdFname = $row['fname'];

                            $stdCnic = $row['cnic'];

                            $stdPhone = $row['stdPhone'];

                        }

                    }



?>

                    <!-- Nav Item - User Information -->



                    <!-- End of Topbar -->



                    <!-- Begin Page Content -->

                    <div class="container-fluid">



                        <!-- Page Heading -->



                        <!-- <div class="container"> -->



                        <form class="form-horizontal" action="" id="rform" role="form" target="_blank">

                            <button type="button" class="btn btn-danger" style="color : White; float : right; margin-top : 22px; margin-right : 10px">

                                <a href="registration.php" style="color : White; padding-right:5px; padding-left:5px "><i class="fa fa-home" style="padding-right:10px">



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

                                echo $stdName;

                                ?>

                            </h4>

                            <div class="form-group">

                                <div class="col-sm-9">



                                </div>

                            </div>

                            <br>



                            <table class="table table-light" style="margin-bottom : 20px;">

                                <thead>

                                    



                                    

                                    <tr style="font-size: 16px;">

                                        <!--<th scope="col">#</th>-->

                                        <th scope="col">Student Name</th>

                                        <th scope="col">Father / Guardian</th>

                                        <th scope="col">CNIC</th>

                                        <th scope="col">Contact</th>

                                        <th scope="col">Applied Program</th>

                                        <!--<th scope="col">Approximate Aggregate</th>-->



                                        </tr>

                                </thead>  

                                 <tbody>

                                        <td><?php echo $stdName; ?></td>

                                        <td><?php echo $stdFname; ?> </td>

                                        <td><?php echo $stdCnic ?></td>

                                        <td><?php echo $stdPhone ?></td>

                                        <?php



$query = "SELECT * FROM `registration_26to27` WHERE `cnic`= '$logname' AND (SELECT `cnic` FROM `student_reg_26to27` WHERE `cnic` = '$logname')";

$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {

    while ($rowf = mysqli_fetch_array($result)) {



?>

 <td>

 <?php echo $rowf['program'];?>

 </td>




<button type="button" class="btn btn-danger" style="color : White; float : left; margin-top : 25px; margin-right : 10px; margin-bottom : 50px;">
    <a style="color : White; padding-right:5px; padding-left:5px "><i class="fa" style="padding-right:0px">
    </i><?php echo $rowf['aggregatePer']; ?>%  Approximate Aggregate</a>
</button>

<button type="button"  class="btn btn-danger" style="color : White; float : left; margin-top : 25px; margin-right : 10px; margin-bottom : 50px;">
    <a href="registration.php" style="color : White; padding-right:5px; padding-left:5px ">Update Personal info or Result's</a>
</button>

<button type="button"  class="btn btn-danger" style="color : White; float : left; margin-top : 25px; margin-right : 10px; margin-bottom : 50px;">
    <a href="logout.php" style="color : White; padding-right:5px; padding-left:5px ">Logout</a>
</button>



 <!--<td>-->

      <?php  $rowf['aggregatePer'];

    }

 } ?>

 <!--</td>-->

                                      



                                 </tbody>

                                      

                              



                            </table>

                            <br>

                       <!--<label style="width:70%;height:30%;">-->

                       <!-- <p>It is just a Registration for Admission Info and Updates.</p>-->
                       <!-- <p>As per Govt. of Punjab Policy all students are apply through UHS.</p>-->
                       <!-- <p>Admissions are open from 7th November 2025</p>-->
                       <!-- <p>The Last date to Apply is 15th December 2025 for MBBS</p>-->
                       <!-- <p>and 15th January 2026 for BDS.</p>-->
                       <!-- <p>The candidates can apply through UHS online Portal.</p>-->
                       <!-- <p><a href="http://private-mbbs.uhs.edu.pk" target="_blank">private-mbbs.uhs.edu.pk</a></p>-->
                       <!-- <p><a href="http://private-bds.uhs.edu.pk" target="_blank">private-bds.uhs.edu.pk</a></p> -->
                       <!--</label> -->
                        </form> <!-- /form -->





    <?php



                                           

                           

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

        }



    }

}

?>