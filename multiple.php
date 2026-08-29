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
                    ?>



                    <div class="container">
                        <h1 class="h3 mb-4 text-gray-800">Upload Documents</h1>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <!-- PHP code -->
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="text" name="name" value=" <?php echo $_SESSION['logname']; ?> "
                                                    class="form-control" readonly style="display:none;">                                             
                                                <form action="" method="post" enctype="multipart/form-data">
                                                    <div class="form-container0">
                                                        <label for="fsc" class="form-label-custom">Fsc Marksheet</label>
                                                        <br>
                                                        <img id="preview1"
                                                            src="<?php echo empty($row['fscImage']) ? 'uploads_26to27/documents/avatar.jpg' : 'uploads_26to27/documents/' . $row['cnic'] . '/' . $row['fscImage']; ?>"
                                                            alt="fsc image" style="max-width: 330px; max-height:320px ">
                                                        <br>
                                                        <?php if ($row['isVerified'] != '1'): ?>
                                                        <label class="custom-button" for="fsc">Choose Image</label>
                                                        <?php endif; ?>
                                                        <input type="file" name="fsc" id="fsc" class="custom-file-input" accept="image/*"
                                                            onchange="Filevalidation('preview1', 'fsc','0')" style="display: none;">
                                                        <!-- Add the required attribute -->

                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-md-6">
                                                <form action="" method="post" enctype="multipart/form-data">
                                                    <div class="form-container1">

                                                        <label class="form-label-custom">Matric Marksheet</label>
                                                        <br>
                                                        <!-- <img id="preview1" src="#" alt="Preview" style="max-width: 330px; display: none;"> -->
                                                        <img id="preview2"
                                                            src="<?php echo empty($row['matricImage']) ? 'uploads_26to27/documents/avatar.jpg' : 'uploads_26to27/documents/' . $row['cnic'] . '/' . $row['matricImage']; ?>"
                                                            alt="matric image" style="max-width: 330px; max-height:320px ">
                                                        <br>
                                                        <?php if ($row['isVerified'] != '1'): ?>
                                                        <label class="custom-button" for="matric">Choose Image</label>
                                                        <?php endif; ?>
                                                        <input type="file" name="matric" id="matric" class="custom-file-input"
                                                            accept="image/*" onchange="Filevalidation('preview2', 'matric','1')"
                                                            style="display: none;">

                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top:50px">
                                            <div class="col-md-6">
                                                <form action="" method="post" enctype="multipart/form-data">
                                                    <div class="form-container2">

                                                        <label class="form-label-custom"><?php echo $row['stdType'] == 'Overseas/Foreign' ? "MDCAT / UCAT / MCAT Result" : "MDCAT Result" ?></label>
                                                        <br>
                                                        <!-- <img id="preview1" src="#" alt="Preview" style="max-width: 330px; display: none;"> -->
                                                        <img id="preview3"
                                                            src="<?php echo empty($row['mdcatImage']) ? 'uploads_26to27/documents/avatar.jpg' : 'uploads_26to27/documents/' . $row['cnic'] . '/' . $row['mdcatImage']; ?>"
                                                            alt="mdcat image" style="max-width: 330px; max-height:320px ">
                                                        <br>
                                                        <?php if ($row['isVerified'] != '1'): ?>
                                                        <label class="custom-button" for="mdcat">Choose Image</label>
                                                        <?php endif; ?>
                                                        <input type="file" name="mdcat" id="mdcat" class="custom-file-input"
                                                            accept="image/*" onchange="Filevalidation('preview3', 'mdcat','2')"
                                                            style="display: none;">

                                                    </div>
                                                </form>
                                            </div>

                                            <div class="col-md-6">
                                                <?php
                                                if ($row['stdType'] === 'Overseas/Foreign') {
                                                    echo '
                                                    <form action="" method="post" enctype="multipart/form-data">
                                                        <div class="form-container5">
                                                            <label class="form-label-custom">Passport/Iqama</label>
                                                            <br>
                                                            <!-- <img id="preview1" src="#" alt="Preview" style="max-width: 330px; display: none;"> -->
                                                            <img id="preview6" src="' . (empty($row['passportIqamaImage']) ? 'uploads_26to27/documents/avatar.jpg' : 'uploads_26to27/documents/' . $row['cnic'] . '/' . $row['passportIqamaImage']) . '"
                                                                alt="cnic image" style="max-width: 330px; max-height: 320px ">
                                                            <br>';

                                                    // Check if isVerified is not equal to '1' to display the Choose Image label
                                                    if ($row['isVerified'] !== '1') {
                                                        echo '
                                                            <label class="custom-button" for="passiqama">Choose Image</label>
                                                            <input type="file" name="passiqama" id="passiqama" class="custom-file-input" accept="image/*" onchange="Filevalidation(\'preview6\', \'passiqama\', \'5\')" style="display: none;">
                                                        ';
                                                    }

                                                    echo '
                                                        </div>
                                                    </form>
                                                    ';
                                                }
                                                ?>
                                            </div>


                                            <!-- <div class="col-md-6">
                                                <form action="" method="post" enctype="multipart/form-data">
                                                    <div class="form-container3">

                                                        <label><b>CNIC Front:</b></label>
                                                        <br>
                                                        <img id="preview4"
                                                            src="<?php echo empty($row['cnicFrontImage']) ? 'uploads_26to27/documents/avatar.jpg' : 'uploads_26to27/documents/' . $row['cnic'] . '/' . $row['cnicFrontImage']; ?>"
                                                            alt="cnic image" style="max-width: 330px; max-height:320px ">
                                                        <br>
                                                        <?php if ($row['isVerified'] != '1'): ?>
                                                        <label class="custom-button" for="cnicf">Choose Image</label>
                                                        <?php endif; ?>
                                                        <input type="file" name="cnicf" id="cnicf" class="custom-file-input"
                                                            accept="image/*" onchange="Filevalidation('preview4', 'cnicf','3')"
                                                            style="display: none;">

                                                    </div>
                                                </form>
                                            </div> -->
                                        </div>

                                        <div class="row" style="margin-top:50px">
                                            <!-- <div class="col-md-6">
                                                <form action="" method="post" enctype="multipart/form-data">
                                                    <div class="form-container4">

                                                        <label><b>CNIC Back:</b></label>
                                                        <br>
                                                        <img id="preview5"
                                                            src="<?php echo empty($row['cnicBackImage']) ? 'uploads_26to27/documents/avatar.jpg' : 'uploads_26to27/documents/' . $row['cnic'] . '/' . $row['cnicBackImage']; ?>"
                                                            alt="cnic image" style="max-width: 330px; max-height:320px ">
                                                        <br>
                                                        <?php if ($row['isVerified'] != '1'): ?>
                                                        <label class="custom-button" for="cnicb">Choose Image</label>
                                                        <?php endif; ?>
                                                        <input type="file" name="cnicb" id="cnicb" class="custom-file-input"
                                                            accept="image/*" onchange="Filevalidation('preview5', 'cnicb','4')"
                                                            style="display: none;">

                                                    </div>
                                                </form>
                                            </div> -->
                                           

                                        </div>

                                        <!-- Add a new row for the submit button -->
                                        <div class="row justify-content-center" style="margin-top: 50px;">
                                            <div class="col-md-12 text-center">
                                                <div class="form-group">
                                                <?php if ($row['isVerified'] != '1'): ?>
                                                    <!-- //<input type="submit"  name="submit" class="btn btn-primary"> -->
                                                    <button type="submit" class="btn btn-primary btn-user btn-block" name="submit">
                                                        Proceed Next
                                                    </button>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                <?php }
            }
        }
    } ?>

    <style>
        .form-label-custom {
            display: block;
            font-family: inherit;
            font-size: 13.5px;
            font-weight: 700;
            color: #495057;
            margin-bottom: 2px;
            padding-left: 10px;
        }
        /* Container for the form */
        img {
            margin-bottom:10px;
            border: 1px solid grey;
        }
        .form-container0 {
            text-align: left;
            margin-top: 20px;
        }

        .form-container1 {
            text-align: left;
            margin-top: 20px;
        }

        .form-container2 {
            text-align: left;
            margin-top: 20px;
        }

        .form-container3 {
            text-align: left;
            margin-top: 20px;
        }

        .form-container4 {
            text-align: left;
            margin-top: 20px;
        }

        .form-container5 {
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

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

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

        function previewImage(previewId, inputId, containerId) {
            var preview = document.getElementById(previewId);
            var fileInput = document.getElementById(inputId);
            var file = fileInput.files[0];

            if (file) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';

                    // Remove the existing "Upload" button if it exists
                    var existingUploadButton = document.getElementById('uploadButton_' + inputId);
                    if (existingUploadButton) {
                        existingUploadButton.parentNode.removeChild(existingUploadButton);
                    }

                    // Dynamically create and append an "Upload" button
                    var uploadButton = document.createElement('button');
                    uploadButton.id = 'uploadButton_' + inputId;
                    uploadButton.name = 'uploadButton_' + inputId;
                    uploadButton.className = 'custom-button';
                    uploadButton.textContent = 'Upload';
                    uploadButton.type = "submit";

                    // Append the "Upload" button to the form container
                    document.querySelector('.form-container' + containerId).appendChild(uploadButton);
                };

                reader.readAsDataURL(file);
            }
        }
    </script>


    <?php



    $redirectUrl = (isset($_REQUEST['edit']) && $_REQUEST['edit'] == '1') ? 'registration.php?edit=1&step=3' : 'registration.php';

    if (isset($_POST['uploadButton_fsc'])) {
        // echo "<script>alert('fsedfsdfgsdfgsdfgsdgc.')</script>" ;
        if (isset($_FILES['fsc']) && $_FILES['fsc']["error"] === UPLOAD_ERR_OK) {
            $name = $_SESSION['logname'];

            if (!empty($_FILES['fsc']["name"])) {
                $folderName = "uploads_26to27/documents/" . $name;
                if (!file_exists($folderName)) {
                    mkdir($folderName, 0755, true);
                }

                $targetDir = $folderName . '/';
                $targetFile = $targetDir . 'fsc_' . basename($_FILES['fsc']["name"]);

                if (move_uploaded_file($_FILES['fsc']["tmp_name"], $targetFile)) {
                    // File uploaded successfully
                    // echo "File uploaded and saved as: $targetFile";
                }
            }
        }
        $select = "SELECT * FROM `registration_26to27` WHERE cnic = '$name' ";
        $result = mysqli_query($conn, $select);
        if ($result->num_rows > 0) {
            if (!empty($_FILES["fsc"]["name"])) {
                $newPicture = 'fsc_' . basename($_FILES["fsc"]["name"]);
                $sql = "UPDATE `registration_26to27`  SET 
            `fscImage` = '$newPicture'
            WHERE `cnic` = '$name'";
            }
            mysqli_query($conn, $sql);
        }
        echo "<script>

        window.location.href='$redirectUrl';</script>";
    } else if (isset($_POST['uploadButton_matric'])) {

        if (isset($_FILES['matric']) && $_FILES['matric']["error"] === UPLOAD_ERR_OK) {
            $name = $_SESSION['logname'];

            if (!empty($_FILES['matric']["name"])) {
                $folderName = "uploads_26to27/documents/" . $name;
                if (!file_exists($folderName)) {
                    mkdir($folderName, 0755, true);
                }
                $targetDir = $folderName . '/';
                $targetFile = $targetDir . 'matric_' . basename($_FILES['matric']["name"]);
                if (move_uploaded_file($_FILES['matric']["tmp_name"], $targetFile)) {
                }
            }
        }
        $select = "SELECT * FROM `registration_26to27` WHERE cnic = '$name' ";
        $result = mysqli_query($conn, $select);

        if ($result->num_rows > 0) {
            if (!empty($_FILES["matric"]["name"])) {
                $newPicture = 'matric_' . basename($_FILES["matric"]["name"]);

                $sql = "UPDATE `registration_26to27`  SET 
            `matricImage` = '$newPicture'
            WHERE `cnic` = '$name'";

            }
            mysqli_query($conn, $sql);
        }
        echo "<script>

        window.location.href='$redirectUrl';</script>";
    } else if (isset($_POST['uploadButton_mdcat'])) {

        if (isset($_FILES['mdcat']) && $_FILES['mdcat']["error"] === UPLOAD_ERR_OK) {
            $name = $_SESSION['logname'];

            if (!empty($_FILES['mdcat']["name"])) {
                $folderName = "uploads_26to27/documents/" . $name;
                if (!file_exists($folderName)) {
                    mkdir($folderName, 0755, true);
                }

                $targetDir = $folderName . '/';
                $targetFile = $targetDir . 'mdcat_' . basename($_FILES['mdcat']["name"]);

                if (move_uploaded_file($_FILES['mdcat']["tmp_name"], $targetFile)) {
                    // File uploaded successfully
                    // echo "File uploaded and saved as: $targetFile";
                }
            }
        }
        $select = "SELECT * FROM `registration_26to27` WHERE cnic = '$name' ";
        $result = mysqli_query($conn, $select);

        if ($result->num_rows > 0) {
            if (!empty($_FILES["mdcat"]["name"])) {
                $newPicture = 'mdcat_' . basename($_FILES["mdcat"]["name"]);

                $sql = "UPDATE `registration_26to27`  SET 
            `mdcatImage` = '$newPicture'
            WHERE `cnic` = '$name'";

            }
            mysqli_query($conn, $sql);
        }
        echo "<script>

        window.location.href='$redirectUrl';</script>";
    } else if (isset($_POST['uploadButton_cnicf'])) {


        if (isset($_FILES['cnicf']) && $_FILES['cnicf']["error"] === UPLOAD_ERR_OK) {
            $name = $_SESSION['logname'];

            if (!empty($_FILES['cnicf']["name"])) {
                $folderName = "uploads_26to27/documents/" . $name;
                if (!file_exists($folderName)) {
                    mkdir($folderName, 0755, true);
                }

                $targetDir = $folderName . '/';
                $targetFile = $targetDir . 'cnicf_' . basename($_FILES['cnicf']["name"]);

                if (move_uploaded_file($_FILES['cnicf']["tmp_name"], $targetFile)) {
                    // File uploaded successfully
                    // echo "File uploaded and saved as: $targetFile";
                }
            }
        }
        $select = "SELECT * FROM `registration_26to27` WHERE cnic = '$name' ";
        $result = mysqli_query($conn, $select);

        if ($result->num_rows > 0) {
            if (!empty($_FILES["cnicf"]["name"])) {
                $newPicture = 'cnicf_' . basename($_FILES["cnicf"]["name"]);

                $sql = "UPDATE `registration_26to27`  SET 
            `cnicFrontImage` = '$newPicture'
            WHERE `cnic` = '$name'";

            }
            mysqli_query($conn, $sql);
        }
        echo "<script>

            window.location.href='$redirectUrl';</script>";
    } else if (isset($_POST['uploadButton_cnicb'])) {

        if (isset($_FILES['cnicb']) && $_FILES['cnicb']["error"] === UPLOAD_ERR_OK) {
            $name = $_SESSION['logname'];

            if (!empty($_FILES['cnicb']["name"])) {
                $folderName = "uploads_26to27/documents/" . $name;
                if (!file_exists($folderName)) {
                    mkdir($folderName, 0755, true);
                }

                $targetDir = $folderName . '/';
                $targetFile = $targetDir . 'cnicb_' . basename($_FILES['cnicb']["name"]);

                if (move_uploaded_file($_FILES['cnicb']["tmp_name"], $targetFile)) {
                    // File uploaded successfully
                    // echo "File uploaded and saved as: $targetFile";
                }
            }
        }
        $select = "SELECT * FROM `registration_26to27` WHERE cnic = '$name' ";
        $result = mysqli_query($conn, $select);

        if ($result->num_rows > 0) {
            if (!empty($_FILES["cnicb"]["name"])) {
                $newPicture = 'cnicb_' . basename($_FILES["cnicb"]["name"]);

                $sql = "UPDATE `registration_26to27`  SET 
            `cnicBackImage` = '$newPicture'
            WHERE `cnic` = '$name'";

            }
            mysqli_query($conn, $sql);
        }
        echo "<script>

            window.location.href='$redirectUrl';</script>";

    } else if (isset($_POST['uploadButton_passiqama'])) {

        if (isset($_FILES['passiqama']) && $_FILES['passiqama']["error"] === UPLOAD_ERR_OK) {
            $name = $_SESSION['logname'];

            if (!empty($_FILES['passiqama']["name"])) {
                $folderName = "uploads_26to27/documents/" . $name;
                if (!file_exists($folderName)) {
                    mkdir($folderName, 0755, true);
                }

                $targetDir = $folderName . '/';
                $targetFile = $targetDir . 'passiqama_' . basename($_FILES['passiqama']["name"]);

                if (move_uploaded_file($_FILES['passiqama']["tmp_name"], $targetFile)) {
                    // File uploaded successfully
                    // echo "File uploaded and saved as: $targetFile";
                }
            }
        }
        $select = "SELECT * FROM `registration_26to27` WHERE cnic = '$name' ";
        $result = mysqli_query($conn, $select);

        if ($result->num_rows > 0) {
            if (!empty($_FILES["passiqama"]["name"])) {
                $newPicture = 'passiqama_' . basename($_FILES["passiqama"]["name"]);

                $sql = "UPDATE `registration_26to27`  SET 
            `passportIqamaImage` = '$newPicture'
            WHERE `cnic` = '$name'";

            }
            mysqli_query($conn, $sql);
        }
        echo "<script>

            window.location.href='$redirectUrl';</script>";

    } else if (isset($_POST['submit'])) {
        ;
        $cnic = $_SESSION['logname'];
        $sql = "SELECT stdType, fscImage, matricImage, mdcatImage, cnicFrontImage, cnicBackImage,passportIqamaImage FROM`registration_26to27` WHERE cnic = '$cnic' ";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $row = mysqli_fetch_assoc($result);


            if ($row['stdType'] == 'Overseas/Foreign') {
                //if (!empty($row['fscImage']) && !empty($row['matricImage']) && !empty($row['mdcatImage']) && !empty($row['cnicFrontImage']) && !empty($row['cnicBackImage']) && !empty($row['passportIqamaImage'])) {
                if (!empty($row['fscImage']) && !empty($row['matricImage']) && !empty($row['mdcatImage']) && !empty($row['passportIqamaImage'])) {
                $updateSql = "UPDATE `registration_26to27` SET `isDocumentsDone` = 1 WHERE `cnic` = '$cnic'";
                    if (mysqli_query($conn, $updateSql)) {
                    }
                } else {
                    echo "<script>alert('Please upload all required documents.')</script>";
                }
            } else {
                //if (!empty($row['fscImage']) && !empty($row['matricImage']) && !empty($row['mdcatImage']) && !empty($row['cnicFrontImage']) && !empty($row['cnicBackImage'])) {
                if (!empty($row['fscImage']) && !empty($row['matricImage']) && !empty($row['mdcatImage'])) {
                    $updateSql = "UPDATE `registration_26to27` SET `isDocumentsDone` = 1 WHERE `cnic` = '$cnic'";
                    if (mysqli_query($conn, $updateSql)) {
                    }
                } else {
                    echo "<script>alert('Please upload all required documents.')</script>";
                }
            }
        }

        echo "<script>
        window.location.href='registration.php';</script>";
    }

}

?>

<script>
    // $(document).ready(function() {
    //     document.getElementById('img1').change(function(){
    Filevalidation = (previewId, inputId, containerId) => {
        const fi = document.getElementById(inputId);
        const fi2 = document.getElementById(inputId);
        const fi3 = document.getElementById(inputId);
        const fi4 = document.getElementById(inputId);
        const fi5 = document.getElementById(inputId);
        const fi6 = document.getElementById(inputId);
        // Check if any file is selected.
        if (fi.files.length > 0) {
            for (const i = 0; i <= fi.files.length - 1; i++) {
                const fsize = fi.files.item(i).size;
                console.log("I am file size ..  " + fsize);
                // const file = Math.round((fsize / 1024));
                // The size of the file.
                if (fsize > 1000000) {
                    alert(
                        "File too Big, please select a file less than or equal to 1MB");
                    fi.value = '';
                } else if (fsize < 4 * 1024) {
                    alert(
                        "File too small, please select a file greater than 4kb");
                    fi.value = '';
                } else {
                    previewImage(previewId, inputId, containerId)
                }
            }
        }
        // Check if any file is selected.
        if (fi2.files.length > 0) {
            for (const i = 0; i <= fi2.files.length - 1; i++) {
                const fsize2 = fi2.files.item(i).size;
                console.log("I am file size ..  " + fsize2);
                // const file = Math.round((fsize / 1024));
                // The size of the file.
                if (fsize2 > 1000000) {
                    alert(
                        "File too Big, please select a file less than or equal to 1MB");
                    fi2.value = '';
                } else if (fsize2 < 4 * 1024) {
                    alert(
                        "File too small, please select a file greater than 4kb");
                    fi2.value = '';
                } else {
                    previewImage(previewId, inputId, containerId)
                }
            }
        }
        if (fi3.files.length > 0) {
            for (const i = 0; i <= fi3.files.length - 1; i++) {
                const fsize3 = fi3.files.item(i).size;
                console.log("I am file size ..  " + fsize3);
                // const file = Math.round((fsize / 1024));
                // The size of the file.
                if (fsize3 > 1000000) {
                    alert(
                        "File too Big, please select a file less than or equal to 1MB");
                    fi3.value = '';
                } else if (fsize3 < 4 * 1024) {
                    alert(
                        "File too small, please select a file greater than 4kb");
                    fi3.value = '';
                } else {
                    previewImage(previewId, inputId, containerId)
                }
            }
        }
        // Check if any file is selected.
        if (fi4.files.length > 0) {
            for (const i = 0; i <= fi4.files.length - 1; i++) {
                const fsize4 = fi4.files.item(i).size;
                console.log("I am file size ..  " + fsize4);
                // const file = Math.round((fsize / 1024));
                // The size of the file.
                if (fsize4 > 1000000) {
                    alert(
                        "File too Big, please select a file less than or equal to 1MB");
                    fi4.value = '';
                } else if (fsize4 < 4 * 1024) {
                    alert(
                        "File too small, please select a file greater than 4kb");
                    fi4.value = '';
                } else {
                    previewImage(previewId, inputId, containerId)
                }
            }
        }
        // Check if any file is selected.
        if (fi5.files.length > 0) {
            for (const i = 0; i <= fi5.files.length - 1; i++) {
                const fsize5 = fi5.files.item(i).size;
                console.log("I am file size ..  " + fsize5);
                // const file = Math.round((fsize / 1024));
                // The size of the file.
                if (fsize5 > 1000000) {
                    alert(
                        "File too Big, please select a file less than or equal to 1MB");
                    fi5.value = '';
                } else if (fsize5 < 4 * 1024) {
                    alert(
                        "File too small, please select a file greater than 4kb");
                    fi5.value = '';
                } else {
                    previewImage(previewId, inputId, containerId)
                }
            }
        }
        if (fi6.files.length > 0) {
            for (const i = 0; i <= fi6.files.length - 1; i++) {
                const fsize5 = fi6.files.item(i).size;
                console.log("I am file size ..  " + fsize5);
                // const file = Math.round((fsize / 1024));
                // The size of the file.
                if (fsize5 > 1000000) {
                    alert(
                        "File too Big, please select a file less than or equal to 1MB");
                    fi6.value = '';
                } else if (fsize5 < 4 * 1024) {
                    alert(
                        "File too small, please select a file greater than 4kb");
                    fi6.value = '';
                } else {
                    previewImage(previewId, inputId, containerId)
                }
            }
        }
    }
    // }
</script>