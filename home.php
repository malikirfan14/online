<?php
error_reporting(0);
session_start();
if (isset($_SESSION['logname'])) {



    $logname = $_SESSION['logname'];

    require('configure.php');
    include('linkss.php');
    include('header.php');
    if ($conn === false) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    } else {
        if (isset($_SESSION['logname']) != "") {
?>


                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800"></h1>


                    <!-- <a href="AddmissionRegistration.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Apply</a> -->
                </div>

                <!--Content Row -->


                <!-- Content Row -->

                <div class="row">

                    <!-- Area Chart -->
                    <div class="col-xl-12 col-lg-6 col-sm-4">




                        <table class="table table-hover table-striped table-bordered">
                            <thead class="bg-dark text-white text-left">
                                <tr>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <!--<tr>-->
                                <!--    <td><button type="button" class="btn btn-info btn-sm" style="color : White; ">-->
                                <!--        <a href="https://www.watim.com.pk/online/updateResult.php" style="color : White; ">Update Your Profile</a></button></td>-->

<!--<td><button type="button" class="btn btn-warning btn-sm" style="color : White; ">-->
<!--<a href="https://www.watim.com.pk/online/updateResult.php" style="color : White; ">Update Sciences Marks (if F.Sc 2021 Only)</a></button></td>-->
                                <!--</tr>-->
                                
                                <!--<tr>-->
                                <!--    <td><button type="button" class="btn btn-info btn-sm" style="color : White; ">-->
                                <!--    <a href="details.php" style="color : White; ">Check Your Profile</a></button> </td>-->
                                <!--</tr>-->

                <!--------------------------------- Challan Upload Success or not --------------------------------->

<!--<tr>-->
<!--<td>-->
 <?php
//                                             $folder1 = 'challan-BDS-AND-MBBS/' . $_SESSION['logname'];
//                                             $folder2 = 'challanBDS/' . $_SESSION['logname'];
//                                             $folder3 = 'challanMBBS/' . $_SESSION['logname'];
//                                             if (is_dir($folder1) || is_dir($folder2) || is_dir($folder3)) {

//                                                 echo '
//   <button type="button" class="btn btn-success btn-sm" style = "color : White; ">
//     Challan Uploaded Successfully</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
//                                             } else {
//                                                 echo '
//   <button type="button" class="btn btn-danger btn-sm" style = "color : White; ">
//     <a href="uploadChallan.php" style = "color : White; " >Challan Pending</a></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                                            // }

 ?>
<!--</td>-->
<!--</tr>-->
                <!--------------------------------- Challan Upload Success or not --------------------------------->
                
                <!--------------------------------- Documents Upload Success or not --------------------------------->
<!--<tr>-->
<!--<td>-->
<?php
                                        // $folder4 = 'upload/' . $_SESSION['logname'];
                                        // if (is_dir($folder4)) {
                                        //     echo '
//   <button type="button" class="btn btn-success btn-sm" style = "color : White; ">
//     Doc. Uploaded Successfully</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                                        // } else {
                                            // echo '
//   <button type="button" class="btn btn-danger btn-sm" style = "color : White; ">
    // <a href="multiple.php" style = "color : White; " >Documents Pending</a></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                                        // }
                                        

?>
<!--</td>-->
                                         <!--<td><button type="button" class="btn btn-danger btn-sm" style="color : White; ">-->
                                         <!--   <a href="https://www.watim.com.pk/online/print-profile.php" style="color : White; ">Print Application Form</a></button></td>-->

<!--</tr>-->
                <!--------------------------------- Documents Upload Success or not --------------------------------->
                
                
                                <tr>

                                    <?php

                                    //     if(!is_dir($folder1) || !is_dir($folder2) || !is_dir($folder3))
                                    //     {
                                    //         //  echo '<h3   style = "background-color: pink; text-align : center;">One step away to complete your Application (Uplaod submitted challan) </h3>';
                                    //           echo '<h3  style = "background-color: pink; text-align : center; "> One step away to complete your Application (Uplaod submitted challan)  </h3>';
                                    //     }
                                    //      else if(!is_dir($folder4))
                                    //      {
                                    //          echo '<label class="badge"  style = "background-color: pink;">One step away to complete your Application (Uplaod Documents) </label>';

                                    //     }
                                    //     else
                                    //     {
                                    //         echo '<h3  style = "background-color: pink; text-align : center; " style = "background-color: pink;">Complete you application</h3>';
                                    //     }

                                    ?>
                                    
                                    <!--- Working Script --->
                                    <?php
                                    // if (is_dir($folder1) || is_dir($folder2) || is_dir($folder3) and is_dir($folder4)) {
                                    //<!--- Working Script --->
                                    
//  echo '<h3   style = "background-color: pink; text-align : center;">One step away to complete your Application (Uplaod submitted challan) </h3>';

                                    //<!--- Working Script --->
                                    //     echo '<h5  style = "background-color: pink; text-align : center; ">APPLICATION SUCCESSFULLY SUBMITTED</h5>';
                                    // }
                                    //<!--- Working Script --->
                                    
// else if(is_dir($folder4))
// {
//      echo '<label class="badge"  style = "background-color: pink;">One step away to complete your Application (Uplaod Documents) </label>';
// }
                                    //<!--- Working Script --->                                    
                                    // else {
                                    //     echo '<h5  style = "background-color: pink; text-align : center; ">ONE STEP AWAY TO COMPLETE YOUR APPLICATION</h5>';
                                    // }

                                    ?>
                                    <!--- Working Script --->


                                </tr>
<!--<tr>-->
<!--<td>-->
<!--    <button type="button" class="btn btn-danger btn-sm" style="color : White; ">-->
<!--    <a href="MbbsCodeVoucher.php" style="color : White; ">MBBS/BDS Fee Voucher</a></button> -->
<!--</td>-->
<!--</tr>-->

</tbody>
</table>

        <div class="col-lg-12 text-justify">
<div class="container-fluid">

                        <br /><br />
                        <h3>COLLEGE DOCUMENTARY</h3>
                        <iframe width="650" height="375" src="https://www.youtube.com/embed/zgg2evhNL1I?autoplay=1&mute=1">
                        </iframe>

                        <br /><br />
                        <!--<button type="button" class="btn btn-info" style = "color : White; ">-->
                        <!--<a href="multiple.php" style = "color : White; " >Upload Documents</a></button><br/><br/>-->

                        <!--<button type="button" class="btn btn-primary" style = "color : White; ">-->
                        <!--<a href="multiple.php" style = "color : White; " >Upload Documents</a></button><br/><br/>-->


                        <h3>Our Mission</h3>
                        <br />
                        The mission of Watim Medical & Dental College is to provide a purpose built Medical teaching institution to which aspiring students can look up to and graduating students can look back upon with pride. An institution that eventually not only provides world class education and patient care but also serves the needs of the post-graduate students in their professional training and research.
                        <br /><br />
                        <h3>
                            Our Vission
                        </h3>
                        <br />
                        The Vision is to develop and foster a community of global leaders dedicated to improving human health by integrating dentistry & medicine at the forefront of Education, Research and Patient care. By starting a Medical College with a strong focus on cultivating commitment, zeal and enthusiasm among the medical student community, we hope to contribute our mite to the development of the nation by providing our sincere services to the vital fields of health care and education.

                    </div></div>

                    <!-- Pie Chart -->
                    <!--<div class="col-xl-4 col-lg-5">-->
                    <!--    <div class="card shadow mb-4">-->
                    <!-- Card Header - Dropdown -->

                    <!-- Card Body -->
                    <!--        <div class="card-body">-->
                    <!--<div class="chart-pie pt-4 pb-2">-->
                    <!--    <canvas id="myPieChart"></canvas>-->
                    <!--</div>-->
                    <!--            <div class="mt-4 text-center small">-->
                    <!--                <image src="img/doctor.gif">-->

                    <!--                </image>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
             
                <br /><br /><br />
                <!-- Content Row -->




                <script src="vendor/jquery/jquery.min.js"></script>
                <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

                <!-- Core plugin JavaScript-->
                <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

                <!-- Custom scripts for all pages-->
                <script src="js/sb-admin-2.min.js"></script>

                <!-- Page level plugins -->
                <script src="vendor/chart.js/Chart.min.js"></script>

                <!-- Page level custom scripts -->
                <script src="js/demo/chart-area-demo.js"></script>
                <script src="js/demo/chart-pie-demo.js"></script>


    <?php

        }
    }
}


// include('footer.php');

    ?>