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









            $query = "SELECT * FROM `registration_25to26` WHERE `cnic` = '$logname'";

            $result = mysqli_query($conn, $query);



            if (mysqli_num_rows($result) <= 0) {

                $query = "SELECT * FROM `student_reg_26to27` WHERE `cnic` = '$logname'";

                $result = mysqli_query($conn, $query);

            }



            if (mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_array($result)) {

                    $profilePicture = $row['profilePicture'];





                    ?>

<style>

    .mycss {

  font-family: "Lucida Console", "Courier New", monospace;

  font-size: 13px;

  padding:0 0 0 10px;

  color: grey;

}



</style>                    



<!-- End of Topbar -->



<!-- Begin Page Content -->

<div class="container-fluid">



    <!-- Page Heading -->

    <h1 class="h3 mb-4 text-gray-800">Personal Info</h1>



    <div class="row">



        <div class="col-lg-12">



            <!-- Circle Buttons -->

            <div class="container">



                <form id="rform" class="user" action="AddmissionRegistrationBack.php" enctype="multipart/form-data" method="post">



                    <div class="form-group row" style="margin-left:10px;">

                        <span class="help-block"><b>Eligibility for Overseas & Forign Students :</b><br /></span>

                        <span class="help-block">Student who has studies & Passed HSSC 12th Grade Examination or

                            Equivalent from Outside Pakistan & has Stayed in the forign Country for the whole Duration

                            of the Course on a permanent Residence Permit. </span>

                    </div>

                    <div class="form-group row">



                        <div class="col-sm-6 mb-3 mb-sm-0">

                            <select class="form-control form-control-lg" id="stdType" name="stdType" required

                                >

                                <option selected disabled value="">-- Select Student Type -- </option>

                                <option value="Overseas/Foreign" name="stdType"

                                    <?php echo $row['stdType'] == 'Overseas/Foreign' ? 'selected' : ''; ?>>Overseas /

                                    Foreign</option>

                                <option value="Open_Merit" name="stdType"

                                    <?php echo $row['stdType'] == 'Open_Merit' ? 'selected' : ''; ?>>Open Merit</option>



                            </select>

                        </div>

                        <div class="col-sm-6 mb-3 mb-sm-0">

                            <select class="form-control form-control-lg" id="program" name="program" required

                                >

                                <option selected disabled value="">-- Select Program -- </option>

                                <!-- <option value="MBBS" name="program"

                                    <?php echo $row['program'] == 'MBBS' ? 'selected' : ''; ?>>Only MBBS</option> -->

                                <option value="BDS" name="program"

                                    <?php echo $row['program'] == 'BDS' ? 'selected' : ''; ?>>BDS</option>

                                <!-- <option value="BOTH" name="program"

                                    <?php echo $row['program'] == 'BOTH' ? 'selected' : ''; ?>>MBBS & BDS</option> -->
                                
                                 
                      
                            </select>

                        </div>                   

                        <div style="margin-left: 0%; margin-top: 4%;">

                            <div class="profile-container">

                                <img id="preview" src="<?php echo empty($row['profilePicture']) ? 'uploads/profiles/avatar.jpg' : 'uploads/profiles/' . $row['cnic'] . '/' . $row['profilePicture']; ?>"

                                    alt="Profile Picture">

                                <?php if ($row['isVerified'] != '1'): ?>
                                <label class="custom-button" for="profilePicture">Choose Profile Picture</label>

                                <input type="file" name="profilePicture" id="profilePicture" onchange="Filevalidationreg()" class="custom-file-input" accept="image/*" style="display: none;">

                                <br>

                                <div class="required-message" style="color: red; font-size: 12px; display: none;">Please choose a profile picture.</div>
                                <?php endif; ?>
                            

                            </div>

                        </div>

                    </div>



                    <!-- <div class="form-group">

                    <input type="text" class="form-control form-control-user"

                        id="exampleInputPassword" placeholder="Select student type" readonly>

                    <div class="row mt-3">

                        <div class="col-sm-4">

                            <label class="radio-inline">

                                <input onchange="stdTypeCheck(this);" type="radio" id="stdType" value="Overseas/Foreign" name="stdType"

                                    required> Overseas / Foreign

                            </label>

                        </div>

                        <div class="col-sm-4"> 

                            <label class="radio-inline">

                                <input onchange="stdOpenTypeCheck(this);" type="radio" id="stdType" value="Open_Merit" name="stdType"

                                    required> Open Merit

                            </label>

                        </div>



                    </div>

            </div> -->



                    <div class="form-group row">

                        <div class="col-sm-6 mb-3 mb-sm-0">

                            <input value="<?php echo $row['name']; ?>" type="text"

                                class="form-control form-control-user" id="exampleFirstName" name="name" readonly>

                        </div>

                        <div class="col-sm-6">

                            <input value="<?php echo $row['fname']; ?>" type="text"

                                class="form-control form-control-user" id="exampleLastName" placeholder="Father Name"

                                name="fname" required readonly>

                        </div>

                    </div>

                    <div>

                        <div class="form-group row">

                            <div class="col-sm-6 mb-3 mb-sm-0">

                                <input value="<?php echo $row['email']; ?>" type="email"

                                    class="form-control form-control-user" id="exampleInputEmail"

                                    placeholder="Email Address" name="email" readonly>

                            </div>

                            <div class="col-sm-6">

                                <input value="<?php echo $row['cnic']; ?>" type="text"

                                    class="form-control form-control-user" id="exampleInputEmail" placeholder="Cnic"

                                    name="cnic" readonly>

                            </div>

                        </div>

                        <div class="form-group row">

                            <div class="col-sm-6 mb-3 mb-sm-0">

                                <input

                                    value="<?php echo $row['stdPhone'];

                                                                                                                                                                                                                                    ?>"

                                    type="number" class="form-control form-control-user" id="exampleInputPassword"

                                    placeholder="Student number" name="stdPhone" required>

                            </div>

                            <div class="col-sm-6">

                                <input value="<?php echo $row['city']; ?>" type="text"

                                    class="form-control form-control-user" id="exampleInputPassword" placeholder="City"

                                    name="city" required>

                            </div>



                        </div>

                        <!--  -->

                        <!--</div>-->



                        <div class="form-group row">



                            <div class="col-sm-6 mb-3 mb-sm-0">

                                <input value="<?php echo $row['fatPhone']; ?>" type="TYPE"

                                    class="form-control form-control-user" id="exampleRepeatPassword"

                                    placeholder="Father Phone number" name="fatPhone" maxlength="11"

                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"

                                    required>



                            </div>

                            <div class="col-sm-6">

                                <input value="<?php echo $row['emergencyPhone']; ?>" type="TYPE"

                                    class="form-control form-control-user" id="exampleRepeatPassword"

                                    placeholder="Emergency Phone number" name="emergencyPhone" maxlength="11"

                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"

                                    required>

                            </div>

                        </div>



                        <div class="form-group row">



                            <!--<div class="col-sm-6">-->

                            <!--    <input value="<?php echo $row['dob']; ?>" type="text"-->

                            <!--        class="form-control form-control-user" id="exampleRepeatPassword"-->

                            <!--        placeholder="Date of birth" name="dob" onfocus="(this.type='date')"-->

                            <!--        onblur="(this.type='text')" required>-->

                            <!--</div>-->

                            <div class="col-sm-6 mb-3 mb-sm-0 "><p class="mycss">Date of Birth</p>

                                <input value="<?php echo $row['dob']; ?>" type="date"

                                    class="form-control form-control-user" id="exampleRepeatPassword"

                                    placeholder="Date of birth" name="dob" required>

                            </div>                              

                            <!--<div class="col-sm-6 mb-3 mb-sm-0">-->

                            <!--    <input value="<?php echo $row['cnic_issue_date']; ?>" type="text"-->

                            <!--        class="form-control form-control-user" id="exampleInputPassword"-->

                            <!--        placeholder="CNIC Issue Date" onfocus="(this.type='date')"-->

                            <!--        onblur="(this.type='text')" name="cnic_issue_date" required>-->

                            <!--</div>-->

                            <div class="col-sm-6"><p class="mycss">CNIC Issue Date</p>

                                <input value="<?php echo $row['cnic_issue_date']; ?>" type="date"

                                    class="form-control form-control-user" id="exampleInputPassword"

                                    placeholder="CNIC Issue Date" name="cnic_issue_date" required>

                            </div>

                        </div>



                        <div class="form-group">

                            <input value="<?php echo $row['address']; ?>" type="text"

                                class="form-control form-control-user" id="exampleInputPassword" placeholder="Current Residential Address (Full)"

                                name="address" required>

                        </div>

                        <div class="form-group">

                            <label for="gender"><b></b>Gender:</label>

                            <span style="margin-right: 50px;"></span>

                            <input type="radio" id="male" name="gender" value="Male" <?php if ($row['gender'] === 'Male') echo 'checked'; ?> required>

                            <label for="male">Male</label>

                            

                            <!-- Add some margin to separate the buttons -->

                            <span style="margin-right: 50px;"></span>

                            

                            <input type="radio" id="female" name="gender" value="Female" <?php if ($row['gender'] === 'Female') echo 'checked'; ?>>

                            <label for="female">Female</label>

                        </div>

                        <!-- <img id="preview" src="profile/<?php echo $row['cnic'] . '/' . $row['profilePicture']; ?>" alt="Profile Picture" style="max-width: 200px;"><br><br>

                        <label for="profilePicture">Profile Picture:</label>

                        <input type="file" name="profilePicture" id="profilePicture" accept="image/*" onchange="previewImage()"><br><br> -->

                        <!-- <img id="preview" src="#" alt="Preview" style="max-width: 200px; display: none;"><br><br> -->

                        







                        





                        <script>

                        function previewImagereg() {

                            var requiredMessage = document.querySelector(".required-message");

                            requiredMessage.style.display = "none";

                            var preview = document.getElementById('preview');

                            var fileInput = document.getElementById('profilePicture');

                            var file = fileInput.files[0];



                            if (file) {

                                var reader = new FileReader();



                                reader.onload = function(e) {

                                    preview.src = e.target.result;

                                    preview.style.display = 'block';

                                };



                                reader.readAsDataURL(file);

                            }

                        }

                    </script>

                        



                        <!-- <div class="form-group">

                                            <input type="text" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="MDCAT Passing Year"

                                             onfocus="(this.type='month')" onblur="(this.type='text')" name="mcat_passing_year" >

                                        </div> -->



                        <!-- <div class="form-group row">

                                            <div class="col-sm-6 mb-3 mb-sm-0">

                                                <input type="text" class="form-control form-control-user"

                                                    id="exampleInputPassword" placeholder="MDCAT Roll Number"

                                                    name="mcat" >

                                            </div>

                                            <div class="col-sm-6">

                                                <input type="number" class="form-control form-control-user"

                                                    id="exampleRepeatPassword" placeholder="MDCAT Marks" min="90" max="210" name="mcatr" >

                                                    

                                            </div>

                                        </div> -->



                        <!-- <div class="form-group row" >

                                            <div class="col-sm-6 mb-3  mb-sm-0" >

                                                <input type="text" class="form-control form-control-user"

                                                    id="exampleInputPassword" placeholder="Matric Marks" name="matricMarks"  required >

                                            </div> -->



                        <!--          <select class="mt-3" id="marksOutOf"  name="marksOutOf"  required  >-->

                        <!--          <option selected disabled value = "" > -- Out Off -- </option>-->

                        <!--            <option name="marksOutOf">850</option>-->

                        <!--            <option name="marksOutOf">900</option>-->

                        <!--            <option name="marksOutOf">1050</option>-->

                        <!--            <option name="marksOutOf">1100</option>-->



                        <!--<option value="0000" placeholder="select">&nbsp;</option>-->

                        <!--         </select>-->

                        <!--</div>-->

                    </div>



                    <!--<div class="form-group">-->

                    <!--    <input type="text" class="form-control form-control-user"-->

                    <!--        id="exampleInputPassword" placeholder="Select Program " readonly>-->

                    <!--    <div class="row mt-3">-->

                    <!--        <div class="col-sm-4">-->

                    <!--            <label class="radio-inline">-->

                    <!--                <input type="radio" id="stdType" value="Overseas/Foreign" name="stdType"-->

                    <!--                    required> Overseas/Foreign-->

                    <!--            </label>-->

                    <!--        </div>-->

                    <!--        <div class="col-sm-4">-->

                    <!--            <label class="radio-inline">-->

                    <!--                <input type="radio" id="stdType" value="Open Merit" name="stdType"-->

                    <!--                    required> Open Merit-->

                    <!--            </label>-->

                    <!--        </div>-->



                    <!--    </div>-->

                    <!--</div>-->



                    <?php if ($row['isVerified'] != '1'): ?>
                        <button type="submit" class="btn btn-primary btn-user btn-block" id="submitButton">
                            <?php echo $row['isPersonalInfoDone'] == 1 ? "Update" : "Submit" ?>
                        </button>
                    <?php endif; ?>

                    <?php }

            }

        }

    } ?>

                </form>

            </div> <!-- ./container -->



            <!-- Brand Buttons -->



        </div>



    </div>



</div>



<!-- /.container-fluid -->



<style>

                            .profile-container {

                                text-align: center;

                                margin: 20px;

                            }



                            .custom-file-input {

                                display: none;

                            }





                            .custom-button {

                                background-color: #007bff;

                                color: #fff;

                                padding: 10px 20px;

                                border: none;

                                border-radius: 5px;

                                cursor: pointer;

                            }

                            .custom-button:hover {

                                background-color: #0056b3;

                            }

                            #preview {

                                max-width: 230px;

                                margin: 10px auto;

                                display: block;

                                border: 1px solid grey;

                                box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);

                            }

                        </style>



<!-- Bootstrap core JavaScript-->

<script src="vendor/jquery/jquery.min.js"></script>

<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>



<!-- Core plugin JavaScript-->

<script src="vendor/jquery-easing/jquery.easing.min.js"></script>



<!-- Custom scripts for all pages-->

<script src="js/sb-admin-2.min.js"></script>

<script type="text/javascript">

    function preventBack() {

        window.history.forward();

    }

    setTimeout("preventBack()", -0);

    window.onunload = function() {

        null

    };

</script>

<script>

    document.getElementById("submitButton").addEventListener("click", function(event) {

        var fileInput = document.getElementById("profilePicture");

        var requiredMessage = document.querySelector(".required-message");  

        // Check if either a new file has been selected or there is a profile picture in the database

        var profilePicture = "<?php echo $profilePicture; ?>";

       

        if (!profilePicture &&  fileInput.files.length === 0 ) {

            requiredMessage.style.display = "block";

            event.preventDefault(); // Prevent form submission

        } else {

            requiredMessage.style.display = "none";

        }

    });

</script>

<script>

    

    function Filevalidationreg() {

        const fi = document.getElementById('profilePicture');

        // Check if any file is selected.

        if (fi.files.length > 0) {

            for (const i = 0; i <= fi.files.length - 1; i++) {

                const fsize = fi.files.item(i).size;

                console.log("I am file size ..  " + fsize);

                // const file = Math.round((fsize / 1024));

                // The size of the file.

                if (fsize > 1000000) {

                    alert("File too big, please select a file less than or equal to 1MB");

                    fi.value = '';

                } else if (fsize < 4 * 1024) {

                    alert("File too small, please select a file greater than 4kb");

                    fi.value = '';

                } else{

                    previewImagereg();

                }

            }

        }

    }





    function stdOpenTypeCheck(that) {

        if (that.value == "Open_Merit") {

            //  document.getElementById("passIqamaNo").removeAttribute("required");

            // document.getElementById("instituteName").removeAttribute("required");

            // document.getElementById("instituteCity").removeAttribute("required");

            // document.getElementById("residentialCountry").removeAttribute("required");

            // document.getElementById("visaStatus").removeAttribute("required");

            //alert("check");

            //   passIqamaNo

            //                                     instituteName

            //                                     instituteCity

            //                                     residentialCountry

            //                                     visaStatus

            document.getElementById("passIqamaNo").style.display = "none";

            document.getElementById("instituteName").style.display = "none";

            document.getElementById("instituteCity").style.display = "none";

            document.getElementById("residentialCountry").style.display = "none";

            document.getElementById("visaStatus").style.display = "none";

            if (document.getElementById("passIqamaNo1").value == "") {

                // alert('select me');

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

            // document.forms['rform'].elements['passIqamaNo'].value = "0000";

            // document.forms['rform'].elements['instituteName'].value = "0000";

            // document.forms['rform'].elements['instituteCity'].value = "0000";

            // document.forms['rform'].elements['residentialCountry'].value = "0000";

            // document.forms['rform'].elements['visaStatus'].value = "0000";

        } else {

            document.forms['rform'].elements['passIqamaNo'].value = "0000";

            document.forms['rform'].elements['instituteName'].value = "0000";

            document.forms['rform'].elements['instituteCity'].value = "0000";

            document.forms['rform'].elements['residentialCountry'].value = "0000";

            document.forms['rform'].elements['visaStatus'].value = "0000";

            document.getElementById("passIqamaNo").style.display = "none";

            document.getElementById("instituteName").style.display = "none";

            document.getElementById("instituteCity").style.display = "none";

            document.getElementById("residentialCountry").style.display = "none";

            document.getElementById("visaStatus").style.display = "none";

            if (document.getElementById("passIqamaNo1").value == "") {

                // alert('select me');

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

            // document.getElementById("passIqamaNo").removeAttribute("required");

            // document.getElementById("instituteName").removeAttribute("required");

            // document.getElementById("instituteCity").removeAttribute("required");

            // document.getElementById("residentialCountry").removeAttribute("required");

            // document.getElementById("visaStatus").removeAttribute("required");

            //  edName.removeAttribute("required");

        }

    }



    function stdTypeCheck(that) {

        if (that.value == "Overseas/Foreign") {

            //alert("check");

            //   passIqamaNo

            //                                     instituteName

            //                                     instituteCity

            //                                     residentialCountry

            //                                     visaStatus

            document.getElementById("passIqamaNo").style.display = "block";

            document.getElementById("instituteName").style.display = "block";

            document.getElementById("instituteCity").style.display = "block";

            document.getElementById("residentialCountry").style.display = "block";

            document.getElementById("visaStatus").style.display = "block";

            //   cont a = document.getElementById("passIqamaNo");

            // document.forms['rform'].elements['passIqamaNo'].value = "";

            // document.forms['rform'].elements['instituteName'].value = "";

            // document.forms['rform'].elements['instituteCity'].value = "";

            // document.forms['rform'].elements['residentialCountry'].value = "";

            // document.forms['rform'].elements['visaStatus'].value = "";

            if (document.getElementById("passIqamaNo1").value == "") {

                // alert('select me');

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

        }

        // if(document.forms['rform'].elements['fscmarks'].value = "test")

        //   if(document.forms['rform'].elements['fscmarks'].value = "")

        //         // if( document.ifYes.fscmarks.value == "" )

        //           {

        //              alert( "Please provide your Father Name!" );

        //              document.StudentRegistration.fscmarks.focus() ;

        //              return false;

        //           }

        else {

            document.forms['rform'].elements['passIqamaNo'].value = "0000";

            document.forms['rform'].elements['instituteName'].value = "0000";

            document.forms['rform'].elements['instituteCity'].value = "0000";

            document.forms['rform'].elements['residentialCountry'].value = "0000";

            document.forms['rform'].elements['visaStatus'].value = "0000";

            document.getElementById("passIqamaNo").style.display = "none";

            document.getElementById("instituteName").style.display = "none";

            document.getElementById("instituteCity").style.display = "none";

            document.getElementById("residentialCountry").style.display = "none";

            document.getElementById("visaStatus").style.display = "none";

        }

    }

    // function yesnoCheck(that) {

    //     if (that.value == "Completed") {

    //             document.getElementById("ifYes").style.display = "block";

    //             document.getElementById("ifselect").style.display = "block";

    //             document.forms['rform'].elements['comYear'].value = "0000";

    //             document.forms['rform'].elements['fscmarks'].value = "";

    //             if(document.forms['rform'].elements['fscmarks'].value == "")

    //             {   var elementFscMarks = document.forms['rform'].elements['fscmarks'];

    //                 elementFscMarks.required = true;                   

    //             }

    //             if(document.forms['rform'].elements['comYear'].value == "0000")

    //             {

    //                 var comYear = document.forms['rform'].elements['comYear'];

    //                 comYear.required = true; 

    //             }                             

    //         }

    //         // if(document.forms['rform'].elements['fscmarks'].value = "test")

    //     //   if(document.forms['rform'].elements['fscmarks'].value = "")

    //     //         // if( document.ifYes.fscmarks.value == "" )

    //     //           {

    //     //              alert( "Please provide your Father Name!" );

    //     //              document.StudentRegistration.fscmarks.focus() ;

    //     //              return false;

    //     //           }

    //      else {

    //             var elementFscMarks = document.forms['rform'].elements['fscmarks'];           

    //             if(elementFscMarks){                   

    //                 elementFscMarks.required = false;

    //                 elementFscMarks.value = "0000";

    //             } 

    //             var comYear = document.forms['rform'].elements['comYear'];           

    //             if(comYear){                  

    //                 comYear.required = false;

    //                 comYear.value = "0000";

    //             } 

    //             document.getElementById("ifYes").style.display = "none";       

    //             document.getElementById("ifselect").style.display = "none";                  

    //     }

    // }

    //    function yearCheck(that){

    //     if (that.value == "2021") {

    //         {

    //         document.getElementById("show1").style.display = "block";

    //         document.getElementById("show2").style.display = "block";

    //         document.getElementById("show3").style.display = "block";

    //             if(document.forms['rform'].elements['[physics]'].value == "")

    //         {

    //                 document.getElementById("physics").attributes["required"] ="true"; 

    //         }

    //            if(document.forms['rform'].elements['chemistry'].value == "")

    //         {

    //                 document.getElementById("chemistry").attributes["required"] ="true"; 

    //         }

    //            if(document.forms['rform'].elements['biology'].value == "")

    //         {

    //                 document.getElementById("biology").attributes["required"] ="true"; 

    //         }

    //         }

    //     }

    // }

</script>



<script type="text/javascript">

    $(function() {

        var requiredCheckboxes = $('.program :checkbox[required]');

        requiredCheckboxes.change(function() {

            if (requiredCheckboxes.is(':checked')) {

                requiredCheckboxes.removeAttr('required');

            } else {

                requiredCheckboxes.attr('required', 'required');

            }

        });

    });

</script>



<script type="text/javascript">

    // get selectbox

    //     //commented the below line becasue options are harcoded in select year tag

    // var selectBox = document.getElementById('comYear');

    // // loop through years

    // for (var i = 2022; i >= 2020; i--) {

    //     // create option element

    //     var option = document.createElement('option');

    //     // add value and text name

    //     option.value = i;

    //     option.innerHTML = i;

    //     // add the option element to the selectbox

    //     selectBox.appendChild(option);

    // }

</script>



<?php





}



?>