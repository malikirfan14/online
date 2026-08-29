<?php
error_reporting(0);
if (session_status() === PHP_SESSION_NONE) { session_start(); }
if (isset($_SESSION['logname'])) {
    $logname = $_SESSION['logname'];

    if ($conn === false) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    } else {
        if (isset($_SESSION['logname']) != "") {

            $query = "SELECT * FROM `registration_26to27` WHERE `cnic` = '$logname'";
            $result = mysqli_query($conn, $query);

            // }

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    $stdType = $row['stdType'];
                    $fscStatus = $row['fscStatus'];
                    $testType = $row['testType'];
                    $comYear = $row['comYear'];

                    ?>
                    <!-- End of Topbar -->
                    <!-- Begin Page Content -->
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
                    </style>
                    <div class="container-fluid">
                        <!-- Page Heading -->
                        <h1 class="h3 mb-4 text-gray-800">Student Education Form</h1>
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- Circle Buttons -->
                                <div class="container">
                                    <form id="educationForm" name="educationForm" class="user" action="educationBack.php">
                                         <?php if (isset($_GET['edit'])): ?>
                                             <input type="hidden" name="edit" value="1">
                                         <?php endif; ?>

                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3  mb-sm-0" id="passIqamaNo" style="display: none;">
                                                <label class="form-label-custom">Passport No. / Iqama No.</label>
                                                <input value="<?php echo $row['passIqamaNo']; ?>" type="text" class="form-control form-control-user" id="passIqamaNo1"
                                                    placeholder="Passport No. / Iqama No." name="passIqamaNo">
                                            </div>

                                            <div class="col-sm-6 mb-3  mb-sm-0" id="instituteName" style="display: none;">
                                                <label class="form-label-custom">F.Sc / A Level's Institute Full Name</label>
                                                <input value="<?php echo $row['instituteName']; ?>" type="text" class="form-control form-control-user" id="instituteName1"
                                                    placeholder="F.Sc / A Level's Institute Full Name" name="instituteName">
                                            </div>
                                        </div>

                                        <div class="form-group row">

                                            <div class="col-sm-6 mb-3  mb-sm-0" id="instituteCity" style="display: none;">
                                                <label class="form-label-custom">F.Sc / A Level's Study Institute Country Name</label>
                                                <input value="<?php echo $row['instituteCity']; ?>" type="text" class="form-control form-control-user" id="instituteCity1"
                                                    placeholder="F.Sc / A Level's Study Institute Country Name" name="instituteCity">
                                            </div>

                                            <div class="col-sm-6 mb-3  mb-sm-0" id="residentialCountry" style="display: none;">
                                                <label class="form-label-custom">Residential Country  / Country of Stay</label>
                                                <input value="<?php echo $row['residentialCountry']; ?>" type="text" class="form-control form-control-user" id="residentialCountry1"
                                                    placeholder="Residential Country  / Country of Stay" name="residentialCountry">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3  mb-sm-0" id="visaStatus" style="display: none;">
                                                <label class="form-label-custom">Visa Status</label>
                                                <select class="form-control form-control-lg" id="visaStatus1" name="visaStatus">
                                                    <option selected disabled value="">-- Visa Status-- </option>
                                                    <option name="visaStatus" <?php echo $row['visaStatus'] == 'Valid' ? 'selected' : ''; ?> >Valid</option>
                                                    <option name="visaStatus" <?php echo $row['visaStatus'] == 'Expired' ? 'selected' : ''; ?>>Expired</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <select class="form-control form-control-lg" onchange="testTypeChange(this.value);"
                                                 name="testType" id="testType" style="display: none;">
                                                    <option selected disabled value=""> -- Select Test Type -- </option>
                                                    <option name="testType" <?php echo $row['testType'] == 'MDCAT' ? 'selected' : ''; ?>>MDCAT</option>
                                                    <option name="testType" <?php echo $row['testType'] == 'UCAT' ? 'selected' : ''; ?>>UCAT</option>
                                                    <option name="testType" <?php echo $row['testType'] == 'MCAT' ? 'selected' : ''; ?>>MCAT</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div id="mdcatDiv" style="display:none;">
                                            <div class="form-group row">
                                               <div class="col-sm-6 mb-3 mb-sm-0">
                                                <label class="form-label-custom">MDCAT Passing Year</label>
                                                <select class="form-control form-control-lg" class="mt-3" id="mcat_passing_year" name="mcat_passing_year" required>
                                                    <option selected disabled value=""> -- Select MDCAT Passing Year -- </option>
                                                    <option value="2026" name="mcat_passing_year" <?php echo $row['mcat_passing_year'] == '2026' ? 'selected' : ''; ?>>2026</option>
                                                    <option value="2025" name="mcat_passing_year" <?php echo $row['mcat_passing_year'] == '2025' ? 'selected' : ''; ?>>2025</option>
                                                    <option value="2024" name="mcat_passing_year" <?php echo $row['mcat_passing_year'] == '2024' ? 'selected' : ''; ?>>2024</option>
                                                </select></div>
                                                 <div class="col-sm-6 mb-3 mb-sm-0">
                                                    <label class="form-label-custom">Total Entry Test Marks</label>
                                                     <input type="text"
            class="form-control form-control-lg"
            id="total_marks"
            name="total_marks"
            placeholder="Total Marks"
            readonly
            value="<?php echo htmlspecialchars($row['total_marks'] ?? ''); ?>">
                                                 </div>

                                            </div>

                                            <div class="form-group row" id="extraFields">
                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                    <label class="form-label-custom">MDCAT Roll Number</label>
                                                    <input value="<?php echo $row['mcat']; ?>" type="text"
                                                         class="form-control form-control-user" id="mcat" placeholder="MDCAT Roll Number "
                                                         name="mcat" <?php echo ($row['mcat_passing_year'] == '2026') ? '' : 'required'; ?>>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label class="form-label-custom">MDCAT Marks</label>
                                                    <input value="<?php echo $row['mcatr']; ?>" type="number"
                                                         class="form-control form-control-user" id="mcatr" placeholder="MDCAT Marks" min="72"
                                                         max="200" name="mcatr" <?php echo ($row['mcat_passing_year'] == '2026') ? '' : 'required'; ?>>
                                                </div>
                                            </div>
                                        </div>

                                    <div id="ucatDiv" style="display:none">
                                        <div class="form-group row">
                                            <div class="col-sm-12 mb-3 mb-sm-0">
                                                <label class="form-label-custom">UCAT Passing Year</label>
                                                <select class="form-control form-control-lg" class="mt-3" id="ucatYear" name="ucatYear">
                                                    <option selected disabled value=""> -- Select UCAT Passing year -- </option>
                                                    <option name="ucatYear" <?php echo $row['ucatYear'] == '2026' ? 'selected' : ''; ?>>2026</option>
                                                    <option name="ucatYear" <?php echo $row['ucatYear'] == '2025' ? 'selected' : ''; ?>>2025</option>
                                                    <option name="ucatYear" <?php echo $row['ucatYear'] == '2024' ? 'selected' : ''; ?>>2024</option>
                                                    <option name="ucatYear" <?php echo $row['ucatYear'] == '2023' ? 'selected' : ''; ?>>2023</option>
                                                    <option name="ucatYear" <?php echo $row['ucatYear'] == '2022' ? 'selected' : ''; ?>>2022</option>
                                                    <option name="ucatYear" <?php echo $row['ucatYear'] == '2021' ? 'selected' : ''; ?>>2021</option>
                                                    <option name="ucatYear" <?php echo $row['ucatYear'] == '2020' ? 'selected' : ''; ?>>2020</option>
                                                    <option name="ucatYear" <?php echo $row['ucatYear'] == '2019' ? 'selected' : ''; ?>>2019</option>
                                                    <option name="ucatYear" <?php echo $row['ucatYear'] == '2018' ? 'selected' : ''; ?>>2018</option>
                                                    <option name="ucatYear" <?php echo $row['ucatYear'] == '2017' ? 'selected' : ''; ?>>2017</option>
                                                    <option name="ucatYear" <?php echo $row['ucatYear'] == '2016' ? 'selected' : ''; ?>>2016</option>
                                                    <option name="ucatYear" <?php echo $row['ucatYear'] == '2015' ? 'selected' : ''; ?>>2015</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3  mb-sm-0">
                                                <label class="form-label-custom">UCAT Obtained Marks</label>
                                                <input value="<?php echo $row['ucatObtainedMarks']; ?>" type="text"
                                                    class="form-control form-control-user" id="ucatObtainedMarks" placeholder="UCAT Obtained Marks"
                                                    name="ucatObtainedMarks">
                                            </div>
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <label class="form-label-custom">UCAT Total Marks</label>
                                                <input value="<?php echo $row['ucatTotalMarks']; ?>" type="text"
                                                    class="form-control form-control-user" id="ucatTotalMarks" placeholder="UCAT Total Marks"
                                                    name="ucatTotalMarks">
                                            </div>
                                        </div>
                                    </div>
                                    <div id="mcatDiv" style="display:none">
                                        <div class="form-group row">
                                            <div class="col-sm-12 mb-3 mb-sm-0">
                                                <label class="form-label-custom">MCAT Passing Year</label>
                                                <select class="form-control form-control-lg" class="mt-3" id="mcatYear" name="mcatYear" >
                                                    <option selected disabled value=""> -- Select MCAT Passing year -- </option>
                                                    <option name="mcatYear" <?php echo $row['mcatYear'] == '2026' ? 'selected' : ''; ?>>2026</option>
                                                    <option name="mcatYear" <?php echo $row['mcatYear'] == '2025' ? 'selected' : ''; ?>>2025</option>
                                                    <option name="mcatYear" <?php echo $row['mcatYear'] == '2024' ? 'selected' : ''; ?>>2024</option>
                                                    <option name="mcatYear" <?php echo $row['mcatYear'] == '2023' ? 'selected' : ''; ?>>2023</option>
                                                    <option name="mcatYear" <?php echo $row['mcatYear'] == '2022' ? 'selected' : ''; ?>>2022</option>
                                                    <option name="mcatYear" <?php echo $row['mcatYear'] == '2021' ? 'selected' : ''; ?>>2021</option>
                                                    <option name="mcatYear" <?php echo $row['mcatYear'] == '2020' ? 'selected' : ''; ?>>2020</option>
                                                    <option name="mcatYear" <?php echo $row['mcatYear'] == '2019' ? 'selected' : ''; ?>>2019</option>
                                                    <option name="mcatYear" <?php echo $row['mcatYear'] == '2018' ? 'selected' : ''; ?>>2018</option>
                                                    <option name="mcatYear" <?php echo $row['mcatYear'] == '2017' ? 'selected' : ''; ?>>2017</option>
                                                    <option name="mcatYear" <?php echo $row['mcatYear'] == '2016' ? 'selected' : ''; ?>>2016</option>
                                                    <option name="mcatYear" <?php echo $row['mcatYear'] == '2015' ? 'selected' : ''; ?>>2015</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3  mb-sm-0">
                                                <label class="form-label-custom">MCAT Obtained Marks</label>
                                                <input value="<?php echo $row['mcatObtainedMarks']; ?>" type="text"
                                                    class="form-control form-control-user" id="mcatObtainedMarks" placeholder="MCAT Obtained Marks"
                                                    name="mcatObtainedMarks" >
                                            </div>
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <label class="form-label-custom">MCAT Total Marks</label>
                                                <input value="<?php echo $row['mcatTotalMarks']; ?>" type="text"
                                                    class="form-control form-control-user" id="mcatTotalMarks" placeholder="MCAT Total Marks"
                                                    name="mcatTotalMarks" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                            <div class="col-sm-6 mb-3  mb-sm-0">
                                                <label class="form-label-custom">Matric / O Level's Obtained Marks</label>
                                                <input value="<?php echo $row['matricMarks']; ?>" type="text"
                                                    class="form-control form-control-user" id="matricMarks" placeholder="Matric / O Level's Obtained Marks"
                                                    name="matricMarks" required>
                                            </div>
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <label class="form-label-custom">Matric / O Level's Total Marks</label>
                                                <select class="form-control form-control-lg" id="marksOutOf" name="marksOutOf" required>
                                                    <option selected disabled value="">-- Matric / O Level's Total Marks-- </option>
                                                    <option name="marksOutOf" <?php echo $row['marksOutOf'] == '850' ? 'selected' : ''; ?> >850</option>
                                                    <option name="marksOutOf" <?php echo $row['marksOutOf'] == '900' ? 'selected' : ''; ?> >900</option>
                                                    <option name="marksOutOf" <?php echo $row['marksOutOf'] == '1050' ? 'selected' : ''; ?> >1050</option>
                                                    <option name="marksOutOf" <?php echo $row['marksOutOf'] == '1100' ? 'selected' : ''; ?> >1100</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <label class="form-label-custom">F.Sc / A Level's Result Status</label>
                                                <select class="form-control form-control-lg" onchange="yesnoCheck(this.value);" name="fscStatus" required>
                                                    <option selected disabled value=""> -- F.Sc / A Level's Result Status -- </option>
                                                    <option name="fscStatus" <?php echo $row['fscStatus'] == 'Is Awaited' ? 'selected' : ''; ?>>Is Awaited</option>
                                                    <option name="fscStatus" <?php echo $row['fscStatus'] == 'Completed' ? 'selected' : ''; ?>>Completed</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-6 mb-3" id="ifselect" style="display: none;">
                                                <label class="form-label-custom">F.Sc / A Level's Year of Completion</label>
                                                <select class="form-control form-control-lg" onchange="yearCheck(this.value);" class="mt-3" id="comYear" name="comYear">
                                                    <option selected disabled value="">  -- Select year of completion -- </option>
                                                    <option name="comYear" <?php echo $row['comYear'] == '2026' ? 'selected' : ''; ?>>2026</option>
                                                    <option name="comYear" <?php echo $row['comYear'] == '2025' ? 'selected' : ''; ?>>2025</option>
                                                    <option name="comYear" <?php echo $row['comYear'] == '2024' ? 'selected' : ''; ?>>2024</option>
                                                    <option name="comYear" <?php echo $row['comYear'] == '2023' ? 'selected' : ''; ?>>2023</option>
                                                    <option name="comYear" <?php echo $row['comYear'] == '2022' ? 'selected' : ''; ?>>2022</option>
                                                    <option name="comYear" <?php echo $row['comYear'] == '2021' ? 'selected' : ''; ?>>2021</option>
                                                    <option name="comYear" <?php echo $row['comYear'] == '2020' ? 'selected' : ''; ?>>2020</option>
                                                    <option name="comYear" <?php echo $row['comYear'] == '2019' ? 'selected' : ''; ?>>2019</option>
                                                    <option name="comYear" <?php echo $row['comYear'] == '2018' ? 'selected' : ''; ?>>2018</option>
                                                    <option name="comYear" <?php echo $row['comYear'] == '2017' ? 'selected' : ''; ?>>2017</option>
                                                    <option name="comYear" <?php echo $row['comYear'] == '2016' ? 'selected' : ''; ?>>2016</option>
                                                    <option name="comYear" <?php echo $row['comYear'] == '2015' ? 'selected' : ''; ?>>2015</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3  mb-sm-0" id="ifYes" style="display: none;">
                                                <label class="form-label-custom">F.Sc / A Level's Obtained Marks</label>
                                                <input value="<?php echo $row['fscmarks']; ?>" type="text" class="form-control form-control-user" id="fscmarks"
                                                    placeholder="F.Sc / A Level's Obtained Marks" name="fscmarks">
                                            </div>
                                            <div class="col-sm-6 mb-3 mb-sm-0" id="ifFScYes" style="display: none;">
                                                <label class="form-label-custom">F.Sc / A Level's Total Marks</label>
                                                <select class="form-control form-control-lg" id="fscMarksOutOf" name="fscMarksOutOf">
                                                    <option selected disabled value="">-- F.Sc / A Level's Total Marks-- </option>
                                                    <option name="fscMarksOutOf" <?php echo $row['fscMarksOutOf'] == '1200' ? 'selected' : ''; ?> >1200</option>
                                                    <option name="fscMarksOutOf" <?php echo $row['fscMarksOutOf'] == '1100' ? 'selected' : ''; ?> >1100</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-4 mb-3  mb-sm-0" id="show1" style="display: none;">
                                                <label class="form-label-custom">Biology Marks</label>
                                                <input type="text" value="<?php echo $row['biology']; ?>" class="form-control form-control-user" id="biology"
                                                    placeholder="Biology marks" name="biology">
                                            </div>
                                            <div class="col-sm-4 mb-3  mb-sm-0" id="show2" style="display: none;">
                                                <label class="form-label-custom">Chemistry Marks</label>
                                                <input type="text" value="<?php echo $row['chemistry']; ?>" class="form-control form-control-user" id="chemistry"
                                                    placeholder="Chemistry marks" name="chemistry">
                                            </div>
                                            <div class="col-sm-4 mb-3  mb-sm-0" id="show3" style="display: none;">
                                                <label class="form-label-custom">Physics Marks</label>
                                                <input type="text" value="<?php echo $row['physics']; ?>" class="form-control form-control-user" id="physics"
                                                    placeholder="Physics marks" name="physics">
                                            </div>
                                        </div>

                                                                                <!-- UHS DATA DISPLAY -->

                                        <?php if ($row['isVerified'] != '1'): ?>
                                        <button type="submit" id="submitBtn" class="btn btn-primary btn-user btn-block">
                                            <?php echo $row['isEducationDone'] == 1 ? "Update" : "Submit" ?>
                                        </button>
                                        <?php endif; ?>
                                    </form>
                                </div> <!-- ./container -->
                                <!-- Brand Buttons -->
                            </div>
                        </div>
                    </div>
                    <!-- /.container-fluid -->
                    <?php
                }
            }
        }
    }
}
?>

<script type="text/javascript">
    function preventBack() { window.history.forward(); }
    setTimeout("preventBack()", -0);
    window.onunload = function () { null };
</script>
<script>

    function updateMcatRequiredStatus() {
        var yearSelect = document.getElementById("mcat_passing_year");
        var elementMcat = document.forms['educationForm'].elements['mcat'];
        var elementMcatr = document.forms['educationForm'].elements['mcatr'];

        if (!elementMcat || !elementMcatr) return;

        var stdType = "<?php echo $stdType; ?>";
        var testTypeSelect = document.getElementById("testType");
        var isLocal = (stdType !== 'Overseas/Foreign');
        var isMdcatSelected = (testTypeSelect && testTypeSelect.value === 'MDCAT');

        if (isLocal || isMdcatSelected) {
            if (yearSelect && yearSelect.value === "2026") {
                elementMcat.required = false;
                elementMcatr.required = false;
                elementMcat.removeAttribute("required");
                elementMcatr.removeAttribute("required");
            } else {
                elementMcat.required = true;
                elementMcatr.required = true;
                elementMcat.setAttribute("required", "required");
                elementMcatr.setAttribute("required", "required");
            }
        } else {
            elementMcat.required = false;
            elementMcatr.required = false;
            elementMcat.removeAttribute("required");
            elementMcatr.removeAttribute("required");
        }
    }

    $(document).ready(function () {
        var stdType = "<?php echo $stdType; ?>";
        stdTypeCheck(stdType);

        var fscStatus = "<?php echo $fscStatus; ?>";
        if (fscStatus == 'Completed') {
            yesnoCheck('Completed', true);
        }

        var comYear = "<?php echo $comYear; ?>";
        if (comYear == "2021") {
            yearCheck(comYear, true);
        }

        var testType = "<?php echo $testType; ?>";
        testTypeChange(testType);

        updateMcatRequiredStatus();

        fetchUhsData('view');
    });

    function stdOpenTypeCheck(that) {
        if (that.value == "Open_Merit") {
            document.getElementById("passIqamaNo").style.display = "none";
            document.getElementById("instituteName").style.display = "none";
            document.getElementById("instituteCity").style.display = "none";
            document.getElementById("residentialCountry").style.display = "none";
            document.getElementById("visaStatus").style.display = "none";

            if (document.getElementById("passIqamaNo1").value == "") {
                document.getElementById("passIqamaNo1").removeAttribute("required");
            }
            if (document.getElementById("instituteName1").value == "") {

                document.getElementById("instituteName1").removeAttribute("required");
            }

            if (document.getElementById("instituteCity1").value == "") {

                document.getElementById("instituteCity1").removeAttribute("required");
            }

            if (document.getElementById("residentialCountry1").value == "") {

                document.getElementById("residentialCountry1").removeAttribute("required");
            }

            if (document.getElementById("visaStatus1").value == "") {

                document.getElementById("visaStatus1").removeAttribute("required");
            }
        }

        else {
            document.forms['educationForm'].elements['passIqamaNo'].value = "0000";

            document.forms['educationForm'].elements['instituteName'].value = "0000";

            document.forms['educationForm'].elements['instituteCity'].value = "0000";

            document.forms['educationForm'].elements['residentialCountry'].value = "0000";

            document.forms['educationForm'].elements['visaStatus'].value = "0000";

            document.getElementById("passIqamaNo").style.display = "none";

            document.getElementById("instituteName").style.display = "none";

            document.getElementById("instituteCity").style.display = "none";

            document.getElementById("residentialCountry").style.display = "none";

            document.getElementById("visaStatus").style.display = "none";

            if (document.getElementById("passIqamaNo1").value == "") {
                document.getElementById("passIqamaNo1").removeAttribute("required");
            }
            if (document.getElementById("instituteName1").value == "") {

                document.getElementById("instituteName1").removeAttribute("required");
            }

            if (document.getElementById("instituteCity1").value == "") {

                document.getElementById("instituteCity1").removeAttribute("required");
            }

            if (document.getElementById("residentialCountry1").value == "") {

                document.getElementById("residentialCountry1").removeAttribute("required");
            }

            if (document.getElementById("visaStatus1").value == "") {

                document.getElementById("visaStatus1").removeAttribute("required");
            }
        }
    }

    function stdTypeCheck(value) {
        if (value == "Overseas/Foreign") {
            document.getElementById("passIqamaNo").style.display = "block";
            document.getElementById("instituteName").style.display = "block";
            document.getElementById("instituteCity").style.display = "block";
            document.getElementById("residentialCountry").style.display = "block";
            document.getElementById("visaStatus").style.display = "block";
            document.getElementById("testType").style.display = "block";

            if (document.getElementById("passIqamaNo1").value == "") {
                document.getElementById("passIqamaNo1").setAttribute('required', '');
            }
            if (document.getElementById("instituteName1").value == "") {

                document.getElementById("instituteName1").setAttribute('required', '');
            }

            if (document.getElementById("instituteCity1").value == "") {

                document.getElementById("instituteCity1").setAttribute('required', '');
            }

            if (document.getElementById("residentialCountry1").value == "") {

                document.getElementById("residentialCountry1").setAttribute('required', '');
            }

            if (document.getElementById("visaStatus1").value == "") {

                document.getElementById("visaStatus1").setAttribute('required', '');
            }
            if (document.getElementById("testType").value == "") {
                document.getElementById("testType").setAttribute('required', '');
            }
        }
        else {
            document.forms['educationForm'].elements['passIqamaNo'].value = "0000";

            document.forms['educationForm'].elements['instituteName'].value = "0000";

            document.forms['educationForm'].elements['instituteCity'].value = "0000";

            document.forms['educationForm'].elements['residentialCountry'].value = "0000";

            document.forms['educationForm'].elements['visaStatus'].value = "0000";
            document.forms['educationForm'].elements['testType'].value = "";

            document.getElementById("passIqamaNo").style.display = "none";

            document.getElementById("instituteName").style.display = "none";

            document.getElementById("instituteCity").style.display = "none";

            document.getElementById("residentialCountry").style.display = "none";

            document.getElementById("visaStatus").style.display = "none";
            document.getElementById("testType").style.display = "none";

            document.getElementById("mdcatDiv").style.display = "block";

            updateMcatRequiredStatus();
        }
    }

    function testTypeChange(value) {

        var elementMcat = document.forms['educationForm'].elements['mcat'];
        var elementMcatr = document.forms['educationForm'].elements['mcatr'];

        var elementUcatYear = document.forms['educationForm'].elements['ucatYear'];
        var elementUcatObtainedMarks = document.forms['educationForm'].elements['ucatObtainedMarks'];
        var elementUcatTotalMarks = document.forms['educationForm'].elements['ucatTotalMarks'];

        var elementMcatYear = document.forms['educationForm'].elements['mcatYear'];
        var elementMcatObtainedMarks = document.forms['educationForm'].elements['mcatObtainedMarks'];
        var elementMcatTotalMarks = document.forms['educationForm'].elements['mcatTotalMarks'];

        if (value == "MDCAT") {
            document.getElementById("mdcatDiv").style.display = "block";
            document.getElementById("ucatDiv").style.display = "none";
            document.getElementById("mcatDiv").style.display = "none";

            updateMcatRequiredStatus();

            elementUcatYear.required = false;
            elementUcatObtainedMarks.required = false;
            elementUcatTotalMarks.required = false;

            elementMcatYear.required = false;
            elementMcatObtainedMarks.required = false;
            elementMcatTotalMarks.required = false;

            elementUcatObtainedMarks.value='';
            elementUcatTotalMarks.value='';

            elementMcatObtainedMarks.value='';
            elementMcatTotalMarks.value='';
        }
        else if (value == "UCAT") {
            document.getElementById("mdcatDiv").style.display = "none";
            document.getElementById("ucatDiv").style.display = "block";
            document.getElementById("mcatDiv").style.display = "none";

            elementMcat.required = false;
            elementMcatr.required = false;

            elementUcatYear.required = true;
            elementUcatObtainedMarks.required = true;
            elementUcatTotalMarks.required = true;

            elementMcatYear.required = false;
            elementMcatObtainedMarks.required = false;
            elementMcatTotalMarks.required = false;

            elementMcat.value='';
            elementMcatr.value='';

            elementMcatObtainedMarks.value='';
            elementMcatTotalMarks.value='';
        }
        else if (value == "MCAT") {
            document.getElementById("mdcatDiv").style.display = "none";
            document.getElementById("ucatDiv").style.display = "none";
            document.getElementById("mcatDiv").style.display = "block";

            elementMcat.required = false;
            elementMcatr.required = false;

            elementUcatYear.required = false;
            elementUcatObtainedMarks.required = false;
            elementUcatTotalMarks.required = false;

            elementMcatYear.required = true;
            elementMcatObtainedMarks.required = true;
            elementMcatTotalMarks.required = true;

            elementMcat.value='';
            elementMcatr.value='';

            elementUcatObtainedMarks.value='';
            elementUcatTotalMarks.value='';
        }
    }

    function yesnoCheck(value, isUpdate = false) {
        if (value == "Completed") {

            document.getElementById('fscMarksOutOf').setAttribute('required', '');

            document.getElementById("ifYes").style.display = "block";
            document.getElementById("ifselect").style.display = "block";
            document.getElementById("ifFScYes").style.display = "block";

            var comYear = document.forms['educationForm'].elements['comYear'];
            if (comYear) {
                comYear.required = true;
            }

            if(isUpdate == false){
                document.forms['educationForm'].elements['comYear'].value = "";
                document.forms['educationForm'].elements['fscmarks'].value = "";
            }

            if (document.forms['educationForm'].elements['fscmarks'].value == "") {
                var elementFscMarks = document.forms['educationForm'].elements['fscmarks'];
                elementFscMarks.required = true;
            }
            if (document.forms['educationForm'].elements['comYear'].value == "") {
                var comYear = document.forms['educationForm'].elements['comYear'];
                comYear.required = true;
            }
        }
        else {

            document.getElementById('fscMarksOutOf').removeAttribute('required');

            var elementFscMarks = document.forms['educationForm'].elements['fscmarks'];
            if (elementFscMarks) {
                elementFscMarks.required = false;
                elementFscMarks.value = "";
            }

            var comYear = document.forms['educationForm'].elements['comYear'];
            if (comYear) {
                comYear.required = false;
                comYear.value = "";
            }

            document.getElementById("ifYes").style.display = "none";
            document.getElementById("ifselect").style.display = "none";
            document.getElementById("ifFScYes").style.display = "none";

            var elementPhysics = document.forms['educationForm'].elements['physics'];
            elementPhysics.required = false;
            var elementChemistry = document.forms['educationForm'].elements['chemistry'];
            elementChemistry.required = false;
            var elementBiology = document.forms['educationForm'].elements['biology'];
            elementBiology.required = false;

            document.getElementById("show1").style.display = "none";
            document.getElementById("show2").style.display = "none";
            document.getElementById("show3").style.display = "none";
        }
    }

    function yearCheck(value, isUpdate = false) {
        var elementPhysics = document.forms['educationForm'].elements['physics'];
        var elementChemistry = document.forms['educationForm'].elements['chemistry'];
        var elementBiology = document.forms['educationForm'].elements['biology'];
        if (value == "2021") {
                document.getElementById("show1").style.display = "block";
                document.getElementById("show2").style.display = "block";
                document.getElementById("show3").style.display = "block";

                elementPhysics.required = true;
                elementChemistry.required = true;
                elementBiology.required = true;

                if(isUpdate == false){
                    elementPhysics.value = "";
                    elementChemistry.value = "";
                    elementBiology.value = "";
                }
        }
        else{
                document.getElementById("show1").style.display = "none";
                document.getElementById("show2").style.display = "none";
                document.getElementById("show3").style.display = "none";

                elementPhysics.required = false;
                elementChemistry.required = false;
                elementBiology.required = false;
            }

    }
</script>

<script type="text/javascript">

    $(function () {
        var requiredCheckboxes = $('.program :checkbox[required]');
        requiredCheckboxes.change(function () {
            if (requiredCheckboxes.is(':checked')) {
                requiredCheckboxes.removeAttr('required');
            } else {
                requiredCheckboxes.attr('required', 'required');
            }
        });
    });

</script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const yearSelect = document.getElementById("mcat_passing_year");
    if (yearSelect) {
        yearSelect.addEventListener("change", updateMcatRequiredStatus);
    }
});
</script>

    <!--Total marks 200/180-->

    <script>

    // Auto-update total marks based on selected year
//    yearSelect.addEventListener('change', function() {

    //    }

   const yearSelect = document.getElementById('mcat_passing_year');
    const marksInput = document.getElementById('total_marks');

    // function to set marks based on year
    function updateTotalMarks() {
        if (yearSelect.value === '2025' || yearSelect.value === '2026') {
            marksInput.value = '180';
        } else if (yearSelect.value === '2024' || yearSelect.value === '2023') {
            marksInput.value = '200';
        } else {
            marksInput.value = '';
        }
    }

    // Update marks when year changes
    yearSelect.addEventListener('change', updateTotalMarks);

    // ✅ Set marks automatically when page loads (for edit/update case)
    window.addEventListener('DOMContentLoaded', updateTotalMarks);
</script>

<script>
function toggleUhsSection(val) {
document.getElementById('uhsSection').style.display =
        (val === 'yes') ? 'flex' : 'none';

    document.getElementById('uhsMsg').innerHTML = '';

    if (val === 'yes') {

        var uhsId = document.getElementById('uhs_application_id').value.trim();
        if(uhsId) {
            document.getElementById('uhsDataSection').style.display = 'flex';
            document.getElementById('submitBtn').disabled = false;
        } else{
             document.getElementById('submitBtn').disabled = true;
        }
    } else {
       document.getElementById('submitBtn').disabled = false;

       document.getElementById('uhsDataSection').style.display = 'none';

    }
}

function fetchUhsData(mode) {
    var uhsId = document.getElementById('uhs_application_id').value.trim();
    var msg = document.getElementById('uhsMsg');

    if (uhsId === '') {
        if(mode ==='add') {
            msg.className = 'text-danger';
            msg.innerHTML = 'Please enter UHS Application ID.';
        }
        return;
    }

    msg.innerHTML = 'Fetching record...';

    var xhr = new XMLHttpRequest();
    xhr.open(
        "GET",
        "educationBack.php?action=fetch_uhs&uhs_application_id=" + encodeURIComponent(uhsId),
        true
    );

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var res = JSON.parse(xhr.responseText);

            if (res.status === 'success') {
                msg.innerHTML = 'Your UHS Details:';

                // Fill UI fields
                document.getElementById('uhs_name').value = res.data.name;
                document.getElementById('uhs_father_name').value = res.data.father_name;

                document.getElementById('uhs_aggregate').value = res.data.aggregate;
                document.getElementById('uhs_district').value = res.data.district;

                // Show section
                document.getElementById('uhsDataSection').style.display = 'flex';
                document.getElementById('submitBtn').disabled = false;

            } else {
                msg.className = 'text-danger';
                msg.innerHTML = res.message;

                document.getElementById('uhsDataSection').style.display = 'none';
                document.getElementById('submitBtn').disabled = true;
            }

        }
    };
    xhr.send();
}
</script>

<script>
document.querySelectorAll('input[name="already_admitted"]').forEach(function(radio) {
    radio.addEventListener('change', function () {
        if (this.value === 'yes') {
            document.getElementById('uhsCollegeDiv').style.display = 'block';
            document.getElementById('submitBtn').disabled = true;
        } else {
            document.getElementById('uhsCollegeDiv').style.display = 'none';
            document.getElementById('submitBtn').disabled = false;
        }
    });

    const collegeSelect = document.getElementById('uhs_college');
    collegeSelect.addEventListener('change', function() {
    if (this.value) {
            document.getElementById('submitBtn').disabled = false;
        } else {
            document.getElementById('submitBtn').disabled = true;
        }
    });

});
</script>