<?php
error_reporting(0);
session_start();
if (isset($_SESSION['logname'])) {
    $logname = $_SESSION['logname'];
    // require('configure.php');
    // include('linkss.php');
    // include('header.php');
    if ($conn === false) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    } else {
        if (isset($_SESSION['logname']) != "") {

            $query = "SELECT * FROM `registration_26to27` WHERE `cnic` = '$logname'";
            $result = mysqli_query($conn, $query);

            // if (mysqli_num_rows($result) <= 0) {
            //     $query = "SELECT * FROM `student_reg_26to27` WHERE `cnic` = '$logname'";
            //     $result = mysqli_query($conn, $query);
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
                    <div class="container-fluid">
                        <!-- Page Heading -->
                        <h1 class="h3 mb-4 text-gray-800">Student Education Form</h1>
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- Circle Buttons -->
                                <div class="container">
                                    <form id="educationForm" class="user" action="educationBack.php">

                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3  mb-sm-0" id="passIqamaNo" style="display: none;">
                                                <input value="<?php echo $row['passIqamaNo']; ?>" type="text" class="form-control form-control-user" id="passIqamaNo1"
                                                    placeholder="Passport No. / Iqama No." name="passIqamaNo">
                                            </div>

                                            <div class="col-sm-6 mb-3  mb-sm-0" id="instituteName" style="display: none;">
                                                <input value="<?php echo $row['instituteName']; ?>" type="text" class="form-control form-control-user" id="instituteName1"
                                                    placeholder="F.Sc / A Level's Institute Full Name" name="instituteName">
                                            </div>
                                        </div>

                                        <div class="form-group row">

                                            <div class="col-sm-6 mb-3  mb-sm-0" id="instituteCity" style="display: none;">
                                                <input value="<?php echo $row['instituteCity']; ?>" type="text" class="form-control form-control-user" id="instituteCity1"
                                                    placeholder="F.Sc / A Level's Study Institute Country Name" name="instituteCity">
                                            </div>

                                            <div class="col-sm-6 mb-3  mb-sm-0" id="residentialCountry" style="display: none;">
                                                <input value="<?php echo $row['residentialCountry']; ?>" type="text" class="form-control form-control-user" id="residentialCountry1"
                                                    placeholder="Residential Country  / Country of Stay" name="residentialCountry">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3  mb-sm-0" id="visaStatus" style="display: none;">

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
                                                <!--<input value="MDCAT 2023" type="text" class="form-control form-control-user"-->
                                                <!--    id="mcat_passing_year" placeholder="MDCAT 2023" name="mcat_passing_year" readonly>-->
                                            <!--</div>-->
                                            <!--<div class="col-sm-12 mb-3 mb-sm-0"> -->
                                              
                                               <div class="col-sm-6 mb-3 mb-sm-0">
                                                <select class="form-control form-control-lg" class="mt-3" id="mcat_passing_year" name="mcat_passing_year" required>
                                                    <option selected disabled value=""> -- Select MDCAT Passing Year -- </option>
                                                    <option value="2026" name="mcat_passing_year" <?php echo $row['mcat_passing_year'] == '2026' ? 'selected' : ''; ?>>2026</option>
                                                    <option value="2025" name="mcat_passing_year" <?php echo $row['mcat_passing_year'] == '2025' ? 'selected' : ''; ?>>2025</option>
                                                    <option value="2024" name="mcat_passing_year" <?php echo $row['mcat_passing_year'] == '2024' ? 'selected' : ''; ?>>2024</option>
                                                </select></div>
                                                <!--Total marks 200/180-->
                                                 <div class="col-sm-6 mb-3 mb-sm-0">
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
                                                    <input value="<?php echo $row['mcat']; ?>" type="text"
                                                        class="form-control form-control-user" id="mcat" placeholder="MDCAT Roll Number "
                                                        name="mcat" required>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input value="<?php echo $row['mcatr']; ?>" type="number"
                                                        class="form-control form-control-user" id="mcatr" placeholder="MDCAT Marks" min="72"
                                                        max="200" name="mcatr" required>
                                                </div>
                                            </div>
                                        </div>




                                    <div id="ucatDiv" style="display:none">
                                        <div class="form-group row">
                                            <div class="col-sm-12 mb-3 mb-sm-0"> 
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
                                                <input value="<?php echo $row['ucatObtainedMarks']; ?>" type="text"
                                                    class="form-control form-control-user" id="ucatObtainedMarks" placeholder="UCAT Obtained Marks"
                                                    name="ucatObtainedMarks">
                                            </div>
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input value="<?php echo $row['ucatTotalMarks']; ?>" type="text"
                                                    class="form-control form-control-user" id="ucatTotalMarks" placeholder="UCAT Total Marks"
                                                    name="ucatTotalMarks">
                                            </div>
                                        </div>
                                    </div>
                                    <div id="mcatDiv" style="display:none">
                                        <div class="form-group row">
                                            <div class="col-sm-12 mb-3 mb-sm-0"> 
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
                                                <input value="<?php echo $row['mcatObtainedMarks']; ?>" type="text"
                                                    class="form-control form-control-user" id="mcatObtainedMarks" placeholder="MCAT Obtained Marks"
                                                    name="mcatObtainedMarks" >
                                            </div>
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input value="<?php echo $row['mcatTotalMarks']; ?>" type="text"
                                                    class="form-control form-control-user" id="mcatTotalMarks" placeholder="MCAT Total Marks"
                                                    name="mcatTotalMarks" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                            <div class="col-sm-6 mb-3  mb-sm-0">
                                                <input value="<?php echo $row['matricMarks']; ?>" type="text"
                                                    class="form-control form-control-user" id="matricMarks" placeholder="Matric / O Level's Obtained Marks"
                                                    name="matricMarks" required>
                                            </div>
                                            <div class="col-sm-6 mb-3 mb-sm-0">
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
                                                <select class="form-control form-control-lg" onchange="yesnoCheck(this.value);" name="fscStatus" required>
                                                    <option selected disabled value=""> -- F.Sc / A Level's Result Status -- </option>
                                                    <option name="fscStatus" <?php echo $row['fscStatus'] == 'Is Awaited' ? 'selected' : ''; ?>>Is Awaited</option>
                                                    <option name="fscStatus" <?php echo $row['fscStatus'] == 'Completed' ? 'selected' : ''; ?>>Completed</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-6 mb-3" id="ifselect" style="display: none;">
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
                                                <input value="<?php echo $row['fscmarks']; ?>" type="text" class="form-control form-control-user" id="fscmarks"
                                                    placeholder="F.Sc / A Level's Obtained Marks" name="fscmarks">
                                            </div>
                                            <div class="col-sm-6 mb-3 mb-sm-0" id="ifFScYes" style="display: none;">
                                                <select class="form-control form-control-lg" id="fscMarksOutOf" name="fscMarksOutOf">
                                                    <option selected disabled value="">-- F.Sc / A Level's Total Marks-- </option>
                                                    <option name="fscMarksOutOf" <?php echo $row['fscMarksOutOf'] == '1200' ? 'selected' : ''; ?> >1200</option>
                                                    <option name="fscMarksOutOf" <?php echo $row['fscMarksOutOf'] == '1100' ? 'selected' : ''; ?> >1100</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-4 mb-3  mb-sm-0" id="show1" style="display: none;">
                                                <input type="text" value="<?php echo $row['biology']; ?>" class="form-control form-control-user" id="biology"
                                                    placeholder="Biology marks" name="biology">
                                            </div>
                                            <div class="col-sm-4 mb-3  mb-sm-0" id="show2" style="display: none;">
                                                <input type="text" value="<?php echo $row['chemistry']; ?>" class="form-control form-control-user" id="chemistry"
                                                    placeholder="Chemistry marks" name="chemistry">
                                            </div>
                                            <div class="col-sm-4 mb-3  mb-sm-0" id="show3" style="display: none;">
                                                <input type="text" value="<?php echo $row['physics']; ?>" class="form-control form-control-user" id="physics"
                                                    placeholder="Physics marks" name="physics">
                                            </div>
                                        </div>
                                        
                                        <!-- <div class="form-group row mt-3">
                                            <div class="col-sm-12">
                                                <label><strong>Did you apply for MBBS Admisssion through UHS ?</strong></label><br>
                                                <label><a target="_blank" href="https://www.uhs.edu.pk/finalommbbsmlprivate25.php">Click here to find UHS ID</a></label><br>

                                                <label class="mr-3">
                                                    <input type="radio" name="uhs_applied" value="yes" 
                                                        onclick="toggleUhsSection('yes')" <?php echo (!empty($row['uhs_application_id'])) ? 'checked' : ''; ?>> Yes
                                                </label>

                                                <label>
                                                    <input type="radio" name="uhs_applied" value="no" 
                                                        onclick="toggleUhsSection('no')" <?php echo (empty($row['uhs_application_id'])) ? 'checked' : ''; ?>> No
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-group row" id="uhsSection" style="display:<?php echo (!empty($row['uhs_application_id'])) ? 'flex' : 'none'; ?>;">
                                            <div class="col-sm-4 mb-3">
                                                <input type="text"
                                                    class="form-control form-control-user"
                                                    id="uhs_application_id"
                                                    name="uhs_application_id"
                                                    placeholder="UHS Application (User) ID (423456)"
                                                    maxlength="6"
                                                    value="<?php echo $row['uhs_application_id']; ?>"
                                                    oninput="this.value=this.value.replace(/[^0-9]/g,'')">
                                            </div>
                                            <div class="col-sm-2">
                                                <button type="button" class="btn btn-info btn-user btn-block" onclick="fetchUhsData('add')">
                                                    Get Details
                                                </button>
                                            </div>
                                        </div>
                                   
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <label id="uhsMsg"></label>
                                            </div>
                                        </div> -->
                                                                                <!-- UHS DATA DISPLAY -->
                                        <!-- <div class="form-group row" id="uhsDataSection" style="display:none;">
                                            <div class="col-sm-6 mb-3">
                                                <input type="text" id="uhs_name" class="form-control form-control-user" placeholder="Student Name" readonly>
                                            </div>

                                            <div class="col-sm-6 mb-3">
                                                <input type="text" id="uhs_father_name" class="form-control form-control-user" placeholder="Father Name" readonly>
                                            </div> -->

                                            <!-- <div class="col-sm-6 mb-3">
                                                <input type="text" id="uhs_mobile" class="form-control form-control-user" placeholder="Mobile" readonly>
                                            </div>

                                            <div class="col-sm-6 mb-3">
                                                <input type="text" id="uhs_email" class="form-control form-control-user" placeholder="Email" readonly>
                                            </div> -->

                                            <!-- <div class="col-sm-6 mb-3">
                                                <input type="text" id="uhs_aggregate" class="form-control form-control-user" placeholder="Aggregate" readonly>
                                            </div>

                                            <div class="col-sm-6 mb-3">
                                                <input type="text" id="uhs_district" class="form-control form-control-user" placeholder="District" readonly>
                                            </div>
                                        </div>

                                    <div class="form-group mt-3">
                                        <label><strong>Are you already admitted in any other college (Under UHS)?</strong></label><br>
                                        <label class="mr-3">
                                            <input type="radio" name="already_admitted" value="yes" <?php echo (!empty($row['uhs_college'])) ? 'checked' : ''; ?>> Yes
                                        </label>
                                        <label>
                                            <input type="radio" name="already_admitted" value="no" <?php echo (empty($row['uhs_college'])) ? 'checked' : ''; ?>> No
                                        </label>
                                    </div>

                                    <div class="form-group mt-3 row" id="uhsCollegeDiv" style="display:<?php echo (!empty($row['uhs_college'])) ? 'block' : 'none'; ?>;">
                                        <div class="col-sm-6 mb-3">   
                                            <label>College Name:</label>
                                            <select name="uhs_college" id="uhs_college" class="form-control form-control-lg">
                                                <option value="">-- Select College --</option>
                                                <?php
                                                $q = mysqli_query($conn, "SELECT name FROM uhs_colleges ORDER BY name");
                                                while ($c_row = mysqli_fetch_assoc($q)) {
                                                    $selected = ($row['uhs_college'] == $c_row['name']) ? 'selected' : '';
                                                    echo "<option value='{$c_row['name']}' $selected>{$c_row['name']}</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div> -->



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




<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>
<script type="text/javascript">
    function preventBack() { window.history.forward(); }
    setTimeout("preventBack()", -0);
    window.onunload = function () { null };
</script>
<script>


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
           
            var elementMcat = document.forms['educationForm'].elements['mcat'];
            var elementMcatr = document.forms['educationForm'].elements['mcatr'];
            elementMcat.required = true;    
            elementMcatr.required = true;
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

            elementMcat.required = true;    
            elementMcatr.required = true;

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
    const extraFields = document.getElementById("extraFields");

    // function toggleFields() {
    //     if (yearSelect.value === "2025") {
    //         extraFields.style.display = "none";
    //         // remove required if hidden
    //         document.getElementById("mcat").removeAttribute("required");
    //         document.getElementById("mcatr").removeAttribute("required");
    //     } else {
    //         extraFields.style.display = "flex"; // use flex since it's row
    //         // make fields required again
    //         document.getElementById("mcat").setAttribute("required", "required");
    //         document.getElementById("mcatr").setAttribute("required", "required");
    //     }
    // }

    // run once when page loads (to handle pre-selected value)
    toggleFields();

    // run whenever user changes year
    yearSelect.addEventListener("change", toggleFields);
});
</script>

    <!--Total marks 200/180-->
    
    <script>
    //const yearSelect = document.getElementById('mcat_passing_year');
  //  const marksSelect = document.getElementById('total_marks');

    // Auto-update total marks based on selected year
//    yearSelect.addEventListener('change', function() {
    //    if (this.value === '2025') {
          //  marksSelect.value = '180';
        //} else {
      //      marksSelect.value = '200';
    //    }
  //  });
  
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

    //msg.className = 'text-info';
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
                //document.getElementById('uhs_mobile').value = res.data.mobile;
                //document.getElementById('uhs_email').value = res.data.email;
                document.getElementById('uhs_aggregate').value = res.data.aggregate;
                document.getElementById('uhs_district').value = res.data.district;

                // Show section
                document.getElementById('uhsDataSection').style.display = 'flex';
                document.getElementById('submitBtn').disabled = false;

            } else {
                msg.className = 'text-danger';
                msg.innerHTML = res.message;

                // Hide if not found
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