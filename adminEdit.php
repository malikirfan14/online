<?php

session_start();

if (isset($_SESSION['adminName'])) {

    require('configure.php');

    include('linkss.php');

    include('header.php');

    // Check connection

    if ($conn === false) {

        die("ERROR: Could not connect. " . mysqli_connect_error());

    } else {

        $cnic = $_GET['cnic'];

        if (isset($_GET['cnic']) != "") {

            session_start();

            $logname = $_SESSION['logname'];

            $term = $_REQUEST['term'];

            $query = "SELECT * FROM `registration_26to27` Where  cnic = '$cnic'";



            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_array($result)) {



                    ?>

                    <script>
                        jQuery(document).ready(function ($) {
                            $(".scroll").click(function (event) {
                                event.preventDefault();
                                $('html,body').animate({
                                    scrollTop: $(this.hash).offset().top
                                }, 1200);
                            });
                        });
                    </script><!-- //Smooth-Scrolling -->
                    <!-- Calender-JavaScript -->

                    <!------ Include the above in your HEAD tag ---------->

                    <div class="container">
                        <form action="" method="post">
                            <div class="row justify-content-center" style="margin-top: 50px;">
                                <div class="col-md-12 text-center">
                                    <div class="form-group">
                                        <?php
                                        $buttonColor = ($row['isVerified'] == '1') ? 'btn-success' : 'btn-danger';
                                        $buttonText = ($row['isVerified'] == '1') ? 'Verified' : 'Verify Student';
                                        ?>
                                        <button type="submit" class="btn <?php echo $buttonColor; ?> btn-user btn-block"
                                            name="verifyStudent">
                                            <?php echo $buttonText; ?>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <form class="form-horizontal" action="recordUpdatedByAdmin.php" id="rform" role="form">

                            <h2>Student Record: </h2>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="cnic" class="col-sm-3 control-label">CNIC</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="cnic" name="cnic" value="<?php echo $row['cnic'] ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="name" class="col-sm-3 control-label">Student Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="name" name="name"
                                            onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)"
                                            value="<?php echo trim($row['name']); ?>" class="form-control" autofocus>

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="email" class="col-sm-3 control-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="email" name="email" value="<?php echo trim($row['email']); ?>"
                                            class="form-control" autofocus>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="cnic_issue_date" class="col-sm-6 control-label">CNIC Issue Date</label>
                                    <div class="col-sm-9">

                                        <input type="text" id="cnic_issue_date" name="cnic_issue_date"
                                            value="<?php echo trim($row['cnic_issue_date']); ?>" class="form-control" autofocus>

                                    </div>
                                </div>
                                <!-- <div class="form-group">-->

                                <!--    <label for="fscStatus" class="col-sm-3 control-label">Fsc Result Status</label>-->

                                <!--    <div class="col-sm-9">-->

                                <!--        <input type="text" id="fscStatus" name="fscStatus" value="<?php if ($row['fscStatus'] == '')
                                    echo '0';
                                else
                                    echo $row['fscStatus']; ?>" class="form-control">-->

                                <!--<span class="help-block">If result is awaited then leave the field empty </span> -->

                                <!--    </div>-->

                                <!--</div> -->
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="stdPhone" class="col-sm-6 control-label">Student Phone Number</label>
                                    <div class="col-sm-9">
                                        <input type="number" id="stdPhone" name="stdPhone" value="<?php echo $row['stdPhone'] ?>"
                                            class="form-control" autofocus>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="fatPhone" class="col-sm-6 control-label">Father Phone Number</label>
                                    <div class="col-sm-9">
                                        <input type="number" id="fatPhone" name="fatPhone" value="<?php echo $row['fatPhone'] ?>"
                                            class="form-control" autofocus>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="gender" class="col-sm-3 control-label">Gender</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="gender" name="gender" value="<?php echo $row['gender'] ?>"
                                            class="form-control" autofocus>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="dob" class="col-sm-3 control-label">DOB</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="dob" name="dob" value="<?php echo $row['dob'] ?>" class="form-control"
                                            autofocus>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="matricMarks" class="col-sm-3 control-label">Matric Marks</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="matricMarks" name="matricMarks"
                                            value="<?php if ($row['matricMarks'] == '')
                                                echo '0';
                                            else
                                                echo $row['matricMarks']; ?>"
                                            class="form-control">
                                        <!--<span class="help-block">If result is awaited then leave the field empty </span> -->
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="marksOutOf" class="col-sm-6 control-label">Matric Marks out of </label>
                                    <div class="col-sm-9">
                                        <input type="text" id="marksOutOf" name="marksOutOf"
                                            value="<?php if ($row['marksOutOf'] == '')
                                                echo '0';
                                            else
                                                echo $row['marksOutOf']; ?>"
                                            class="form-control">
                                        <!--<span class="help-block">If result is awaited then leave the field empty </span> -->
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="comYear" class="col-sm-6 control-label">Fsc year of compeletion</label>
                                    <div class="col-sm-9">
                                        <input date="year" id="comYear" name="comYear"
                                            value="<?php if ($row['comYear'] == '')
                                                echo '0000';
                                            else
                                                echo $row['comYear']; ?>"
                                            class="form-control">
                                        <!--<span class="help-block">If result is awaited then leave the field empty </span> -->
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="fscmarks" class="col-sm-3 control-label">Fsc Marks</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="fscmarks" name="fscmarks"
                                            value="<?php if ($row['fscmarks'] == '')
                                                echo '0';
                                            else
                                                echo $row['fscmarks']; ?>"
                                            class="form-control">
                                        <!--<span class="help-block">If result is awaited then leave the field empty </span> -->
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="fscMarksOutOf" class="col-sm-6 control-label">F.Sc Marks out of </label>
                                    <div class="col-sm-9">
                                        <input type="text" id="fscMarksOutOf" name="fscMarksOutOf"
                                            value="<?php if ($row['fscMarksOutOf'] == '')
                                                echo '0';
                                            else
                                                echo $row['fscMarksOutOf']; ?>"
                                            class="form-control">
                                        <!--<span class="help-block">If result is awaited then leave the field empty </span> -->
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="program" class="col-sm-3 control-label">Applied For</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="program" name="program"
                                            value="<?php if ($row['program'] == '')
                                                echo '0';
                                            else
                                                echo trim($row['program']); ?>"
                                            class="form-control">
                                        <!--<span class="help-block">If result is awaited then leave the field empty</span> -->
                                    </div>
                                </div>
                                <div class="form-group col-md-6" <?php if ($row['testType'] !== 'UCAT')
                                    echo 'style="display: none;"'; ?>>
                                    <label for="ucatYear" class="col-sm-3 control-label">Ucat Year</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="ucatYear" name="ucatYear"
                                            value="<?php if ($row['ucatYear'] == '')
                                                echo '0';
                                            else
                                                echo $row['ucatYear']; ?>"
                                            class="form-control">
                                        <!--<span class="help-block">If result is awaited then leave the field empty </span> -->
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6" <?php if ($row['testType'] !== 'UCAT')
                                    echo 'style="display: none;"'; ?>>
                                    <label for="ucatObtainedMarks" class="col-sm-6 control-label">Ucat Obtained Marks</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="ucatObtainedMarks" name="ucatObtainedMarks"
                                            value="<?php if ($row['ucatObtainedMarks'] == '')
                                                echo '0';
                                            else
                                                echo $row['ucatObtainedMarks']; ?>"
                                            class="form-control">
                                        <!--<span class="help-block">If result is awaited then leave the field empty </span> -->
                                    </div>
                                </div>
                                <div class="form-group col-md-6" <?php if ($row['testType'] !== 'UCAT')
                                    echo 'style="display: none;"'; ?>>
                                    <label for="ucatTotalMarks" class="col-sm-6 control-label">Ucat Total Marks</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="ucatTotalMarks" name="ucatTotalMarks"
                                            value="<?php if ($row['ucatTotalMarks'] == '')
                                                echo '0';
                                            else
                                                echo $row['ucatTotalMarks']; ?>"
                                            class="form-control">
                                        <!--<span class="help-block">If result is awaited then leave the field empty </span> -->
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6" <?php if ($row['testType'] !== 'MCAT')
                                    echo 'style="display: none;"'; ?>>
                                    <label for="mcatTotalMarks" class="col-sm-6 control-label">Mcat Total Marks</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="mcatTotalMarks" name="mcatTotalMarks"
                                            value="<?php if ($row['mcatTotalMarks'] == '')
                                                echo '0';
                                            else
                                                echo $row['mcatTotalMarks']; ?>"
                                            class="form-control">
                                        <!--<span class="help-block">If result is awaited then leave the field empty </span> -->
                                    </div>
                                </div>
                                <div class="form-group col-md-6" <?php if ($row['testType'] !== 'MCAT')
                                    echo 'style="display: none;"'; ?>>
                                    <label for="mcatObtainedMarks" class="col-sm-6 control-label">Mcat Obtained Marks</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="mcatObtainedMarks" name="mcatObtainedMarks"
                                            value="<?php if ($row['mcatObtainedMarks'] == '')
                                                echo '0';
                                            else
                                                echo $row['mcatObtainedMarks']; ?>"
                                            class="form-control">
                                        <!--<span class="help-block">If result is awaited then leave the field empty </span> -->
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6" <?php if ($row['testType'] !== 'MDCAT')
                                    echo 'style="display: none;"'; ?>>
                                    <label for="mcat" class="col-sm-6 control-label">MDCAT Roll number</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="mcat" name="mcat" value="<?php echo $row['mcat'] ?>" class="form-control">
                                        <!-- <span class="help-block">Your MCAT phone number won't be disclosed anywhere </span> -->
                                    </div>
                                </div>
                                <div class="form-group col-md-6" <?php if ($row['testType'] !== 'MDCAT')
                                    echo 'style="display: none;"'; ?>>
                                    <label for="mcatr" class="col-sm-3 control-label">MDCAT Result</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="mcatr" name="mcatr"
                                            value="<?php if ($row['mcatr'] == '')
                                                echo '0';
                                            else
                                                echo $row['mcatr']; ?>"
                                            class="form-control">
                                        <!--<span class="help-block">If result is awaited then leave the field empty </span> -->
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="form-group col-md-6" <?php if ($row['testType'] !== 'MDCAT')
                                    echo 'style="display: none;"'; ?>>
                                    <label for="mcat_passing_year" class="col-sm-6 control-label">MDCAT passing year</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="mcat_passing_year" name="mcat_passing_year"
                                            value="<?php if ($row['mcat_passing_year'] == '')
                                                echo '0000';
                                            else
                                                echo $row['mcat_passing_year']; ?>"
                                            class="form-control">
                                        <!--<span class="help-block">If result is awaited then leave the field empty </span> -->
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="aggregatePer" class="col-sm-3 control-label">Aggregate</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="aggregatePer" name="aggregatePer"
                                            value="<?php if ($row['aggregatePer'] == '')
                                                echo '0';
                                            else
                                                echo $row['aggregatePer']; ?>"
                                            class="form-control">
                                        <!--<span class="help-block">If result is awaited then leave the field empty </span> -->
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="emergencyPhone" class="col-sm-6 control-label">Emergency Phone</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="emergencyPhone" name="emergencyPhone"
                                            value="<?php if ($row['emergencyPhone'] == '')
                                                echo '0';
                                            else
                                                echo $row['emergencyPhone']; ?>"
                                            class="form-control">
                                        <!--<span class="help-block">If result is awaited then leave the field empty </span> -->
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="address" class="col-sm-3 control-label">Address</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="address" name="address"
                                            value="<?php if ($row['address'] == '')
                                                echo '0';
                                            else
                                                echo $row['address']; ?>"
                                            class="form-control">
                                        <!--<span class="help-block">If result is awaited then leave the field empty </span> -->
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6" <?php if ($row['testType'] !== 'MCAT')
                                    echo 'style="display: none;"'; ?>>
                                    <label for="mcatYear" class="col-sm-3 control-label">MCAT Year</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="mcatYear" name="mcatYear"
                                            value="<?php echo empty($row['mcatYear']) ? '0' : $row['mcatYear']; ?>" class="form-control">
                                        <!--<span class="help-block">If result is awaited then leave the field empty </span> -->
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="fname" class="col-sm-3 control-label">Father Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="fname" name="fname" value="<?php echo $row['fname'] ?>"
                                            oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);"
                                            onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)"
                                            class="form-control" autofocus>
                                    </div>
                                </div>
                            </div>

                            <div class="challans-container">
                                <h2>Documents:</h2>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <div class="col-md-6">
                                            <input type="text" name="matric" value="<?php echo $_SESSION['logname']; ?>"
                                                class="form-control" readonly style="display:none;">
                                            <div class="form-container0">
                                                <label for="matric"><b>Matric Marksheet:</b></label>
                                                <br>
                                                <!-- Add JavaScript to open the image in a new window when clicked -->
                                                <img id="preview1"
                                                    src="<?php echo empty($row['matricImage']) ? 'uploads_26to27/documents/avatar.jpg' : 'uploads_26to27/documents/' . $row['cnic'] . '/' . $row['matricImage']; ?>"
                                                    alt="matric image" style="max-width: 500px; max-height: 500px; cursor: pointer;"
                                                    onclick="openImage(this.src);">
                                                <br>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <script>
                                        function openImage(imageUrl) {
                                            // Create a new window
                                            var newWindow = window.open('', '_blank', 'width=1000, height=800');

                                            // Write HTML content to the new window
                                            newWindow.document.write('<html><head><title>Image</title></head><body>');
                                            newWindow.document.write('<img src="' + imageUrl + '" style="max-width: 150%; max-height: 150%;" />');
                                            newWindow.document.write('</body></html>');

                                            // Close the document for writing
                                            newWindow.document.close();
                                        }
                                    </script>
                                    <div class="form-group col-md-6">
                                        <div class="col-md-6">
                                            <input type="text" name="fsc" value="<?php echo $_SESSION['logname']; ?>" class="form-control"
                                                readonly style="display:none;">
                                            <div class="form-container0">
                                                <label for="fsc"><b>Fsc Marksheet:</b></label>
                                                <br>
                                                <!-- Add an onclick attribute to open the image in a new window -->
                                                <img id="preview1"
                                                    src="<?php echo empty($row['fscImage']) ? 'uploads_26to27/documents/avatar.jpg' : 'uploads_26to27/documents/' . $row['cnic'] . '/' . $row['fscImage']; ?>"
                                                    alt="fsc image" style="max-width: 500px; max-height: 500px; cursor: pointer;"
                                                    onclick="openImage(this.src);">
                                                <br>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="col-md-6">
                                            <input type="text" name="cnicf" value="<?php echo $_SESSION['logname']; ?>" class="form-control"
                                                readonly style="display:none;">
                                            <div class="form-container0">
                                                <label for="cnicf"><b>CNIC Front:</b></label>
                                                <br>
                                                <!-- Add an onclick attribute to open the image in a new window -->
                                                <img id="preview2"
                                                    src="<?php echo empty($row['cnicFrontImage']) ? 'uploads_26to27/documents/avatar.jpg' : 'uploads_26to27/documents/' . $row['cnic'] . '/' . $row['cnicFrontImage']; ?>"
                                                    alt="cnicf image" style="max-width: 320px; max-height: 500px; cursor: pointer;"
                                                    onclick="openImage(this.src, 'cnicf');"> <!-- Added image identifier "cnicf" -->
                                                <br>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="col-md-6">
                                            <input type="text" name="cnicb" value="<?php echo $_SESSION['logname']; ?>" class="form-control"
                                                readonly style="display:none;">
                                            <div class="form-container0">
                                                <label for="cnicb"><b>CNIC Back:</b></label>
                                                <br>
                                                <!-- Add an onclick attribute to open the image in a new window -->
                                                <img id="preview3"
                                                    src="<?php echo empty($row['cnicBackImage']) ? 'uploads_26to27/documents/avatar.jpg' : 'uploads_26to27/documents/' . $row['cnic'] . '/' . $row['cnicBackImage']; ?>"
                                                    alt="cnicb image" style="max-width: 320px; max-height: 500px; cursor: pointer;"
                                                    onclick="openImage(this.src, 'cnicb');"> <!-- Added image identifier "cnicb" -->
                                                <br>
                                                <br>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <div class="col-md-6">
                                            <input type="text" name="mdcat" value="<?php echo $_SESSION['logname']; ?>" class="form-control"
                                                readonly style="display:none;">
                                            <div class="form-container0">
                                                <label for="mdcat"><b>MdCAT/UCAT/MCAT Result:</b></label>
                                                <br>
                                                <!-- Add an onclick attribute to open the image in a new window -->
                                                <img id="preview4"
                                                    src="<?php echo empty($row['mdcatImage']) ? 'uploads_26to27/documents/avatar.jpg' : 'uploads_26to27/documents/' . $row['cnic'] . '/' . $row['mdcatImage']; ?>"
                                                    alt="mdcat image" style="max-width: 500px; max-height: 500px; cursor: pointer;"
                                                    onclick="openImage(this.src, 'mdcat');"> <!-- Added image identifier "mdcat" -->
                                                <br>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <?php if ($row['stdType'] == 'Overseas/Foreign'): ?>
                                            <div class="col-md-6">
                                                <input type="text" name="passIqama" value="<?php echo $_SESSION['logname']; ?>"
                                                    class="form-control" readonly style="display:none;">
                                                <div class="form-container0">
                                                    <label for="passportIqama"><b>Passport/Iqama:</b></label>
                                                    <br>
                                                    <!-- Add an onclick attribute to open the image in a new window -->
                                                    <img id="preview5"
                                                        src="<?php echo empty($row['passportIqamaImage']) ? 'uploads_26to27/documents/avatar.jpg' : 'uploads_26to27/documents/' . $row['cnic'] . '/' . $row['passportIqamaImage']; ?>"
                                                        alt="passportIqama image" style="max-width: 500px; max-height: 500px; cursor: pointer;"
                                                        onclick="openImage(this.src, 'passportIqama');">
                                                    <!-- Added image identifier "passportIqama" -->
                                                    <br>
                                                    <br>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>



                            <div class="challans-container">
                                <h2>Challans:</h2>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <?php if ($row['program'] == 'MBBS' || $row['program'] == 'BOTH'): ?>
                                            <div class="col-md-6">
                                                <input type="text" name="mbbs" value="<?php echo $_SESSION['logname']; ?>" class="form-control"
                                                    readonly style="display:none;">
                                                <div class="form-container0">
                                                    <label for="mbbsChallan"><b>MBBS Challan:</b></label>
                                                    <br>
                                                    <!-- Add an onclick attribute to open the image in a new window -->
                                                    <img id="preview6"
                                                        src="<?php echo empty($row['mbbsChallanImage']) ? 'uploads_26to27/documents/avatar.jpg' : 'uploads/challans/mbbs/' . $row['cnic'] . '/' . $row['mbbsChallanImage']; ?>"
                                                        alt="mbbsChallan image" style="max-width: 500px; max-height: 500px; cursor: pointer;"
                                                        onclick="openImage(this.src, 'mbbsChallan');">
                                                    <!-- Added image identifier "mbbsChallan" -->
                                                    <br>
                                                    <br>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <?php if ($row['program'] == 'BDS' || $row['program'] == 'BOTH'): ?>
                                            <div class="col-md-6">
                                                <input type="text" name="bds" value="<?php echo $_SESSION['logname']; ?>" class="form-control"
                                                    readonly style="display:none;">
                                                <div class="form-container0">
                                                    <label for="bdsChallan"><b>BDS Challan:</b></label>
                                                    <br>
                                                    <!-- Add an onclick attribute to open the image in a new window -->
                                                    <img id="preview7"
                                                        src="<?php echo empty($row['bdsChallanImage']) ? 'uploads_26to27/documents/avatar.jpg' : 'uploads/challans/bds/' . $row['cnic'] . '/' . $row['bdsChallanImage']; ?>"
                                                        alt="bdsChallan image" style="max-width: 500px; max-height: 500px; cursor: pointer;"
                                                        onclick="openImage(this.src, 'bdsChallan');">
                                                    <!-- Added image identifier "bdsChallan" -->
                                                    <br>
                                                    <br>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>



                            <style>
                                .challans-container {
                                    border: 1px solid #ccc;
                                    padding: 10px;
                                    margin-bottom: 20px;
                                }
                            </style>







                            <!--<div class="form-group">-->

                            <!--    <label for="physics" class="col-sm-3 control-label">Physics Marks </label>-->

                            <!--    <div class="col-sm-9">-->

                            <!--        <input type="text" id="updPhy" name="updPhy" value="<?php if ($row['physics'] == '')
                                echo '0';
                            else
                                echo $row['physics']; ?>" class="form-control">-->

                            <!--<span class="help-block">If result is awaited then leave the field empty </span> -->

                            <!--    </div>-->

                            <!--</div>-->

                            <!--<div class="form-group">-->

                            <!--    <label for="chemistry" class="col-sm-3 control-label">Chemistry Marks</label>-->

                            <!--    <div class="col-sm-9">-->

                            <!--        <input type="text" id="updChem" name="updChem" value="<?php if ($row['chemistry'] == '')
                                echo '0';
                            else
                                echo $row['chemistry']; ?>" class="form-control">-->

                            <!--<span class="help-block">If result is awaited then leave the field empty </span> -->

                            <!--    </div>-->

                            <!--</div>-->

                            <!--<div class="form-group">-->

                            <!--    <label for="biology" class="col-sm-3 control-label">Biology Marks</label>-->

                            <!--    <div class="col-sm-9">-->

                            <!--        <input type="text" id="updBio" name="updBio" value="<?php if ($row['biology'] == '')
                                echo '0';
                            else
                                echo $row['biology']; ?>" class="form-control">-->

                            <!--<span class="help-block">If result is awaited then leave the field empty </span> -->

                            <!--    </div>-->

                            <!--</div>-->

                            <!-- /.form-group -->
                            <button type="submit" class="btn btn-primary btn-block">Update</button>
                        </form> <!-- /form -->
                    </div>
                    <!-- ./container -->
                    </body>

                    </html>


                    <?php
                    if (isset($_POST['verifyStudent'])) {
                        $cnic = $_GET['cnic'];
                        $updateSql = "UPDATE `registration_26to27` SET `isVerified` = '1' WHERE `cnic` = '$cnic'";
                        if (mysqli_query($conn, $updateSql)) {
                        }
                        echo "<script>
        window.location.href='adminFetch.php';</script>";



                    }

                    ?>



                    <?php

                }

                mysqli_free_result($result);

            }

        }

        //  else{

        //     echo "<script>alert('Enter valid Application ID');

        //         window.location.href='updateResult.php';</script>";

        // }

    }

}  //  session_destroy();

?>