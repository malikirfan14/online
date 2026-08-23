<?php
error_reporting(0);
session_start();
if (isset($_SESSION['logname'])) {
    $logname = $_SESSION['logname'];
    //require('configure.php');
    //include('linkss.php');
    //include('header.php');
    if ($conn === false) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    } else {
        if (isset($_SESSION['logname']) != "") {
            $query = "SELECT * FROM `registration_26to27` WHERE `cnic` = '$logname'";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    $program = $row['program'];
                    $email = $row['email'];
                    $name= $row['name']; 
                    $appId= $row['appId'];
                    ?>
                    <div style="margin-left:50px">
                        <!-- Application Fee Information -->
                        <h1 class="h3 mb-4 text-gray-800">Challan Form</h1>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3  mb-sm-0">
                                <b>For MBBS Application Registration Fee:</b>
                                <ul style="margin-top:10px">
                                    <li>Account Title: WATIM Medical College (pvt) Ltd</li>
                                    <li>Branch: Gulberg Greens Branch</li>
                                    <li>Branch Name: Askari Bank Limited</li>
                                    <!--<li>Branch Code: 0759</li>-->
                                    <li>Account Number: 07 5902 0000 4084</li>
                                    <li>IBAN: PK56 ASCM 0007 5902 0000 4084</li>
                                </ul>
                            </div>
                            <div class="col-sm-6 mb-3  mb-sm-0">
                                <b>For BDS Application Registration Fee:</b>
                                <ul style="margin-top:10px">
                                    <li>Account Title: WATIM Dental College (pvt) Ltd</li>
                                    <li>Branch: Gulberg Greens Branch</li>
                                    <li>Branch Name: Askari Bank Limited</li>
                                    <!--<li>Branch Code: 0759</li>-->
                                    <li>Account Number: 07 5902 0000 3230</li>
                                    <li>IBAN: PK28 ASCM 0007 5902 0000 3230</li>
                                </ul>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12 mb-3  mb-sm-0">
                                <p>Application Registration Fee Rs: 2,000/- Non Refundable</p>
                            </div>
                        </div>
                        <!-- Note Section -->
                        <div class="note-section">
                            <b>Note:</b>
                            <ul>
                                <li>Submit Fee Online through Mobile App or any Askari Bank Branch & upload receipt/screenshot to portal
                                </li>
                                <li>Student can also submit this fee through Easy Paisa, Jazz Cash, U-paisa in college account & upload
                                    receipt/screenshot to portal</li>
                                <li>Without proof of fee submission, the application would be considered as incomplete.</li>
                            </ul>
                        </div>

                        <!-- Your Form Here -->
                        <!-- Add your form HTML code below this section -->

                    </div>
                    <div class="container" style="margin:40px;">
                        <h2 class="h3 mb-4 text-gray-800">Download & Upload Challan</h2>
                        <div class="form-group row">
                            <div class="col-md-12">


                                <!-- PHP code -->
                                <form action="" method="post" enctype="multipart/form-data">


                                    <div class="row">
                                        <?php




                                        if ($row['program'] == 'BOTH' || $row['program'] == 'MBBS') {

                                            echo '
                                                <div class="col-md-6">
<button type="button" class="btn btn-danger" style = "color : White; ">

<a href="Medchallan.php" style = "color : White; "  target="_blank" >Download MBBS Challan</a>

</button>
</div>
';

                                        }








                                        ?>
                                        
                                            <?php

                                            if ($row['program'] == 'BOTH' || $row['program'] == 'BDS') {

                                                echo '
                                                <div class="col-md-6">
<button type="button" class="btn btn-primary" style = "color : White; ">



<a href="Dentalchallan.php" style = "color : White; "  target="_blank" >Download BDS Challan

</a>

</button>

</div>

';

                                            }

                                            ?>
                                        
                                    </div>




                                    <div class="row" style="margin-top:30px">
                                        <?php
                                        $program = $row['program']; // Assuming 'program' is a field in your $row array.
                                        ?>

                                        
                                            <?php if ($program == 'MBBS' || $program == 'BOTH'): ?>
                                                <div class="col-md-6">
                                                <input type="text" name="name" value="<?php echo $_SESSION['logname']; ?>" class="form-control"
                                                    readonly style="display: none;">
                                                <form action="" method="post" enctype="multipart/form-data">
                                                    <div class="form-container10">
                                                        <label for="mbbs"><b>Upload MBBS Challan:</b></label>
                                                        <br>
                                                        <img id="preview7"
                                                            src="<?php echo empty($row['mbbsChallanImage']) ? 'uploads_26to27/challans/avatar.jpg' : 'uploads_26to27/challans/mbbs/' . $row['cnic'] . '/' . $row['mbbsChallanImage']; ?>"
                                                            alt="mbbs image" style="max-width: 330px; max-height: 320px">
                                                        <br>
                                                        <br>
                                                        <?php if ($row['isVerified'] != '1'): ?>
                                                        <label class="custom-button" for="mbbs">Choose Image</label>
                                                        <?php endif; ?>
                                                        <input type="file" name="mbbs" id="mbbs" class="custom-file-input" accept="image/*"
                                                            onchange="Filevalidationmbbs('preview7', 'mbbs','10')" style="display: none;">
                                                    </div>
                                                </form>
                                                </div>
                                            <?php endif; ?>
                                        

                                       
                                            <?php if ($program == 'BDS' || $program == 'BOTH'): ?>
                                                <div class="col-md-6">
                                                <form action="" method="post" enctype="multipart/form-data">
                                                    <div class="form-container11">
                                                        <label><b>Upload BDS Challan:</b></label>
                                                        <br>
                                                        <img id="preview8"
                                                            src="<?php echo empty($row['bdsChallanImage']) ? 'uploads_26to27/challans/avatar.jpg' : 'uploads_26to27/challans/bds/' . $row['cnic'] . '/' . $row['bdsChallanImage']; ?>"
                                                            alt="bds image" style="max-width: 330px; max-height: 320px">
                                                        <br>
                                                        <br>
                                                        <?php if ($row['isVerified'] != '1'): ?>
                                                        <label class="custom-button" for="bds">Choose Image</label>
                                                        <?php endif; ?>
                                                        <input type="file" name="bds" id="bds" class="custom-file-input" accept="image/*"
                                                            onchange="Filevalidationmbbs('preview8', 'bds','11')" style="display: none;">
                                                    </div>
                                                </form>
                                                </div>
                                            <?php endif; ?>
                                       
                                    </div>
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="row justify-content-center" style="margin-top: 50px;margin-right:40px;">
                                            <div class="col-md-12 text-center">
                                                <div class="form-group">
                                                <?php if ($row['isVerified'] != '1'): ?>
                                                    <!-- //<input type="submit"  name="submit" class="btn btn-primary"> -->
                                                    <button type="submit" class="btn btn-primary btn-user btn-block" name="proceed">
                                                        Proceed Next
                                                    </button>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </form>

                            </div>
                        </div>
                    </div>
                <?php }
            }
        }
    } ?>

    <style>
        /* Container for the form */
        .form-container10 {
            text-align: left;
            margin-top: 20px;
        }

        .form-container11 {
            text-align: left;
            margin-top: 20px;
        }

        /* Stylish file input button (hidden) */
        .custom-file-input {
            display: none;
        }

        /* Stylish buttons to trigger file inputs */
        .custom-button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        /* Hover effect for the buttons */
        .custom-button:hover {
            background-color: #0056b3;
        }

        /* Style for the profile picture (rounded) */
        .preview {
            max-width: 200px;
            margin: 10px auto;
            display: block;
            border: 2px solid #007bff;
            border-radius: 50%;
            /* Make the image rounded */
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
        }
    </style>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
        </script>

    </body>

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

    <script>

        var program = "<?php echo $program; ?>";

        function previewImagembbs(previewId, inputId, containerId) {

            var preview = document.getElementById(previewId);
            var fileInput = document.getElementById(inputId);
            var file = fileInput.files[0];

            if (file) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                    var existingUploadButton = document.getElementById('uploadButton_' + inputId);
                    if (existingUploadButton) {
                        existingUploadButton.parentNode.removeChild(existingUploadButton);
                    }

                    var uploadButton = document.createElement('button');
                    uploadButton.id = 'uploadButton_' + inputId;
                    uploadButton.name = 'uploadButton_' + inputId;
                    uploadButton.className = 'custom-button';
                    uploadButton.textContent = 'Upload';
                    uploadButton.type = "submit";
                    document.querySelector('.form-container' + containerId).appendChild(uploadButton);
                };

                reader.readAsDataURL(file);
            }
        }
    </script>


    <?php



    if (isset($_POST['uploadButton_mbbs'])) {
        if (isset($_FILES['mbbs']) && $_FILES['mbbs']["error"] === UPLOAD_ERR_OK) {
            $name = $_SESSION['logname'];

            if (!empty($_FILES['mbbs']["name"])) {
                $folderName = "uploads_26to27/challans/mbbs/" . $name;
                if (!file_exists($folderName)) {
                    mkdir($folderName, 0755, true);
                }
                $targetDir = $folderName . '/';
                $targetFile = $targetDir . 'mbbs_' . basename($_FILES['mbbs']["name"]);
                if (move_uploaded_file($_FILES['mbbs']["tmp_name"], $targetFile)) {
                }
            }
        }
        $select = "SELECT * FROM `registration_26to27` WHERE cnic = '$name' ";
        $result = mysqli_query($conn, $select);
        if ($result->num_rows > 0) {
            if (!empty($_FILES["mbbs"]["name"])) {
                $newPicture = 'mbbs_' . basename($_FILES["mbbs"]["name"]);
                $sql = "UPDATE `registration_26to27`  SET 
            `mbbsChallanImage` = '$newPicture'
            WHERE `cnic` = '$name'";
            }
            mysqli_query($conn, $sql);
        }
        echo "<script>

        window.location.href='registration.php';</script>";
    } else if (isset($_POST['uploadButton_bds'])) {

        if (isset($_FILES['bds']) && $_FILES['bds']["error"] === UPLOAD_ERR_OK) {
            $name = $_SESSION['logname'];

            if (!empty($_FILES['bds']["name"])) {
                $folderName = "uploads_26to27/challans/bds/" . $name;
                if (!file_exists($folderName)) {
                    mkdir($folderName, 0755, true);
                }
                $targetDir = $folderName . '/';
                $targetFile = $targetDir . 'bds_' . basename($_FILES['bds']["name"]);
                if (move_uploaded_file($_FILES['bds']["tmp_name"], $targetFile)) {
                }
            }
        }
        $select = "SELECT * FROM `registration_26to27` WHERE cnic = '$name' ";
        $result = mysqli_query($conn, $select);

        if ($result->num_rows > 0) {
            if (!empty($_FILES["bds"]["name"])) {
                $newPicture = 'bds_' . basename($_FILES["bds"]["name"]);

                $sql = "UPDATE `registration_26to27`  SET 
            `bdsChallanImage` = '$newPicture'
            WHERE `cnic` = '$name'";

            }
            mysqli_query($conn, $sql);
        }
        echo "<script>

        window.location.href='registration.php';</script>";
    } else if (isset($_POST['proceed'])) {
        ;
        $cnic = $_SESSION['logname'];

        $sql = "SELECT mbbsChallanImage, bdsChallanImage,program FROM`registration_26to27` WHERE cnic = '$cnic' ";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            if ($row['program'] == 'BOTH') {
                if (!empty($row['mbbsChallanImage']) && !empty($row['bdsChallanImage'])) {
                    $updateSql = "UPDATE `registration_26to27` SET `isChallanDone` = 1 WHERE `cnic` = '$cnic'";
                    if (mysqli_query($conn, $updateSql)) {
                        sendEmail($program, $email, $name, $appId);
                    } else {
                    }
                } else {
                    echo "<script>alert('Please upload MBBS and BDS challans.')</script>";
                }
            } else if ($row['program'] == 'MBBS') {
                if (!empty($row['mbbsChallanImage'])) {
                    $updateSql = "UPDATE `registration_26to27` SET `isChallanDone` = 1 WHERE `cnic` = '$cnic'";
                    if (mysqli_query($conn, $updateSql)) {
                        sendEmail($program, $email, $name, $appId);
                    }
                } else {
                    echo "<script>alert('Please upload MBBS Challan.')</script>";
                }
            } else if ($row['program'] == 'BDS') {
                if (!empty($row['bdsChallanImage'])) {
                    $updateSql = "UPDATE `registration_26to27` SET `isChallanDone` = 1 WHERE `cnic` = '$cnic'";
                    if (mysqli_query($conn, $updateSql)) {
                        sendEmail($program, $email, $name, $appId);
                    }
                } else {
                    echo "<script>alert('Please upload BDS Challan.')</script>";
                }
            }
        } else {
            echo 'Error querying the database.';
        }
        echo "<script>
        window.location.href='registration.php';</script>";
    }

}

function sendEmail($program, $email, $name, $appId)
{
    $programDisplay = $program;
    if($program == 'BOTH') {
        $programDisplay = 'MBBS-BDS Both';
    }

    $from = 'admissions26-27@watim.com.pk'; //Sender
    //$to = 'malikirfan14@gmail.com'; // Receiver   
    $to = $email; // Receiver  
    $subject = 'WATIM MEDICAL & DENTAL COLLEGE';
    $message = $name . "\r\n" . "\r\n" . 'Thankyou for your Online Registration.' . "\r\n" . "\r\n".
        'Your Application Submitted Successfuly in ' . $programDisplay . ' Program for Session 2026-27 at "WATIM Medical & Dental College Rawalpindi"'. "\r\n" . "\r\n".
        'Your application id is : ' . $appId . "\r\n" . "\r\n".
        'For Updated Information Regarding Admissions Check College Website & Facebook Page Regularly. ' . "\r\n" . "\r\n" .
        'Follow us on Facebook: https://facebook.com/watimmedicalanddentalcollege' . "\r\n" . "\r\n" .
        'In case of any query related admissions contact admission office: ' . "\r\n" . "\r\n" .
        'In-Charge Admissions' . "\r\n" . 'Mobile / Whatsapp : 0316-8766996' . "\r\n" . 'Landline : 051-3757575' . "\r\n";
    $headers = "From:" . $from;




    if (mail($to, $subject, $message, $headers)) {
        //echo 'Your mail has been sent successfully.';
    } else {
        //echo 'Unable to send email. Please try again.';
    }
}

?>

<script>
    Filevalidationmbbs = (previewId, inputId, containerId) => {
        const fi = document.getElementById(inputId);
        if (fi.files.length > 0) {
            for (const i = 0; i <= fi.files.length - 1; i++) {
                const fsize = fi.files.item(i).size;
                console.log("I am file size ..  " + fsize);

                if (fsize > 1000000) {
                    alert(
                        "File too Big, please select a file less than or equal to 1MB");
                    fi.value = '';
                } else if (fsize < 4 * 1024) {
                    alert(
                        "File too small, please select a file greater than 4kb");
                    fi.value = '';
                } else {
                    previewImagembbs(previewId, inputId, containerId)
                }
            }
        }

    }
    // }
</script>