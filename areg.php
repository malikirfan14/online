<?php

error_reporting(0);

session_start();

if(isset($_SESSION['logname'])){



 



$logname = $_SESSION['logname'];



require('configure.php');

include('linkss.php');

include('header.php');

  if($conn === false)

  {

      die("ERROR: Could not connect. " . mysqli_connect_error());

  }

  else

  {

    if(isset($_SESSION['logname']) != "")

    {

        

  $query = "SELECT * FROM `student_reg_26to27` WHERE `cnic` = '$logname'";

      $result=mysqli_query($conn,$query);

      if(mysqli_num_rows($result) > 0){

        while($row = mysqli_fetch_array($result))

        {





        ?>

                        



                <!-- End of Topbar -->



                <!-- Begin Page Content -->

                <div class="container-fluid">



                    <!-- Page Heading -->

                    <h1 class="h3 mb-4 text-gray-800">Student Registration Form</h1>



                    <div class="row">



                        <div class="col-lg-10">



                            <!-- Circle Buttons -->

                            <div class="container">





                                <form class="user" action="AddmissionRegistrationBack.php">

                                    <div class="form-group row">

                                        <div class="col-sm-6 mb-3 mb-sm-0">

                                            <input value = "<?php echo $row['name'];?>" type="text" class="form-control form-control-user"

                                                id="exampleFirstName"  name="name">

                                        </div>

                                        <div class="col-sm-6">

                                            <input value = "<?php echo $row['fname']; ?>" type="text" class="form-control form-control-user"

                                                id="exampleLastName" placeholder="Father Name" name="fname" required>

                                        </div>

                                    </div>

                                    <div>

                                        <div class="form-group">

                                            <input value="<?php echo $row['email']; ?>" type="email" class="form-control form-control-user"

                                                id="exampleInputEmail" placeholder="Email Address" name="email" readonly>

                                        </div>



                                        <div class="form-group row">

                                            <div class="col-sm-6 mb-3 mb-sm-0">

                                                <input value="<?php echo $row['cnic']; ?>" type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="Cnic" name="cnic" readonly>

                                            </div>

                                            <div class="col-sm-6 mb-3 mb-sm-0">

                                                <input type="text" class="form-control form-control-user" id="exampleInputPassword" placeholder="CNIC Issue Date" onfocus="(this.type='date')" onblur="(this.type='text')" name="cnic_issue_date" required>

                                            </div>



                                        </div>

                                        <!--  -->

                                        <!--</div>-->

                                        <div class="form-group row">

                                            <div class="col-sm-6 mb-3 mb-sm-0">

                                                <input value="<?php echo $row['stdPhone'];}}}} ?>" type="number" class="form-control form-control-user"

                                                    id="exampleInputPassword" placeholder="student number"

                                                    name="stdPhone" readonly>

                                            </div>

                                            <div class="col-sm-6">

                                                <input type="TYPE" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Father Phone number" name="fatPhone"

                                                maxlength="11" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"

                                                required>

                                           

                                            </div>

                                        </div>

                                        <div class="form-group">

                                                <input type="text" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Date of birth" name="dob"

                                                onfocus="(this.type='date')" onblur="(this.type='text')"

                                                 required>

                                            </div>



                                        <div class="form-group">

                                            <input type="text" class="form-control form-control-user"

                                                id="exampleInputPassword" placeholder="City" name="city" required> 

                                        </div>

                                        <div class="form-group">

                                            <input type="text" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="MDCAT Passing Year"

                                             onfocus="(this.type='month')" onblur="(this.type='text')" name="mcat_passing_year" required>

                                        </div>

                                        

                       

                                        <div class="form-group row">

                                            <div class="col-sm-6 mb-3 mb-sm-0">

                                                <input type="text" class="form-control form-control-user"

                                                    id="exampleInputPassword" placeholder="MDCAT Roll Number"

                                                    name="mcat">

                                            </div>

                                            <div class="col-sm-6">

                                                <input type="text" class="form-control form-control-user"

                                                    id="exampleRepeatPassword" placeholder="MDCAT Marks" name="mcatr">

                                            </div>

                                        </div>

                                        

                                        

                                        <div class="form-group row">

                                            <div class="col-sm-6 mb-3 mb-sm-0">

                                                <input type="text" class="form-control form-control-user"

                                                    id="exampleInputPassword" placeholder="MDCAT Roll Number"

                                                    name="mcat">

                                            </div>

                                            <div class="col-sm-6">

                                                <input type="text" class="form-control form-control-user"

                                                    id="exampleRepeatPassword" placeholder="MDCAT Marks" name="mcatr">

                                            </div>

                                        </div>

                                        



                                        <div class="form-group custom-select">





                                            <select onchange="yesnoCheck(this);" name="fscStatus" required>

                                            <div class="col-sm-6 mb-3 mb-sm-0">    

                                                  <option selected disabled value = "" > -- F.Sc Result Status -- </option>

                                                <option name="fscStatus">Is Awaited</option>

                                                <option name="fscStatus">Completed</option>

                                            </div>    

                                            </select>

                                        </div>

                                   

                                        

                                         <div class="form-group" id ="ifselect" style="display: none;">

                                            <!-- <input type="text" class="form-control form-control-user mb-3"

                                                id="exampleInputPassword" placeholder="Fsc Status " readonly> -->

                                           <select class="mt-3" id="comYear"  name="comYear" required  >

                                                      <option value = "0000" > -- select Year of completion -- </option>

                                                          <!--<option value="0000" placeholder="select">&nbsp;</option>-->

                                                     </select>

                                        </div>





                                        <div class="form-group row" >

                                            <div class="col-sm-6 mb-3  mb-sm-0" id="ifYes" style="display: none;">

                                                <input type="text" class="form-control form-control-user"

                                                    id="exampleInputPassword" placeholder="FSC Marks" name="fscmarks">

                                            </div>

                                            

                                            <div class="col-sm-6 mb-3" id ="ifselect2" style="display: none;">

                                                <!-- <input type="number" class="form-control form-control-user"

                                                    id="exampleRepeatPassword" placeholder="Passing Year"

                                                     readonly> -->

                                                    

                                                      <select class="mt-3" id="marksOutOf"  name="marksOutOf"  required  >

                                                      <option value = "0000" > -- Out Off -- </option>

                                                        <option name="marksOutOf">800</option>

                                                        <option name="marksOutOf">950</option>

                                                        <option name="marksOutOf">1050</option>

                                                        <option name="marksOutOf">1100</option>

                                                      

                                                          <!--<option value="0000" placeholder="select">&nbsp;</option>-->

                                                     </select>

                                            </div>

                                        </div>



                                        <div class="form-group">

                                            <input type="text" class="form-control form-control-user"

                                                id="exampleInputPassword" placeholder="Select Program " readonly>

                                            <div class="row mt-3">

                                                <div class="col-sm-4">

                                                    <label class="radio-inline">

                                                        <input type="radio" id="program" value="MBBS" name="program"

                                                            required>MBBS

                                                    </label>

                                                </div>

                                                <div class="col-sm-4">

                                                    <label class="radio-inline">

                                                        <input type="radio" id="program" value="BDS" name="program"

                                                            required>BDS

                                                    </label>

                                                </div>



                                                <div class="col-sm-4">

                                                    <label class="radio-inline">

                                                        <input type="radio" id="program" value="BOTH" name="program"

                                                            required>BOTH

                                                    </label>

                                                </div>

                                            </div>

                                        </div>







                                        <button type="submit" class="btn btn-primary btn-user btn-block">

                                            Register

                                        </button>

                                       

                                </form>

                            </div> <!-- ./container -->



                            <!-- Brand Buttons -->



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

<script>

function yesnoCheck(that) {

    if (that.value == "Completed") {

  //alert("check");

        document.getElementById("ifYes").style.display = "block";

        document.getElementById("ifselect").style.display = "block";

        document.getElementById("ifselect2").style.display = "block";

        

        document.forms['rform'].elements['comYear'].value = "";

        document.forms['rform'].elements['fscmarks'].value = "";

        document.forms['rform'].elements['marksOutOf'].value = "";

        

        if(document.forms['rform'].elements['fscmarks'].value == "")

        {

                

                document.getElementById("fscmarks").attributes["required"] ="true";   

        }

        if(document.forms['rform'].elements['comYear'].value == "")

        {

            

                document.getElementById("comYear").attributes["required"] ="true"; 

        }

        

         if(document.forms['rform'].elements['marksOutOf'].value == "")

        {

                

                document.getElementById("marksOutOf").attributes["required"] ="true";   

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

        document.forms['rform'].elements['fscmarks'].value = "0000";

        

        document.forms['rform'].elements['comYear'].value = "0000";

        

         document.forms['rform'].elements['marksOutOf'].value = "0000";

        

        

        document.getElementById("ifYes").style.display = "none";

     

        document.getElementById("ifselect").style.display = "none";

        

        document.getElementById("ifselect2").style.display = "none";

    

    }

}

</script>



<script type="text/javascript">



$(function(){

    var requiredCheckboxes = $('.program :checkbox[required]');

    requiredCheckboxes.change(function(){

        if(requiredCheckboxes.is(':checked')) {

            requiredCheckboxes.removeAttr('required');

        } else {

            requiredCheckboxes.attr('required', 'required');

        }

    });

});



</script>



<script type="text/javascript">

    // get selectbox

var selectBox = document.getElementById('comYear');

// loop through years

for (var i = 2022; i >= 2000; i--) {

    // create option element

    var option = document.createElement('option');

    // add value and text name

    option.value = i;

    option.innerHTML = i;

    // add the option element to the selectbox

    selectBox.appendChild(option);

}

</script>



<style>

/*the container must be positioned relative:*/

.custom-select {

  position: relative;

  font-family: Arial;

}



.custom-select select {

  display: none; /*hide original SELECT element:*/

}



.select-selected {

  background-color: DodgerBlue;

}



/*style the arrow inside the select element:*/

.select-selected:after {

  position: absolute;

  content: "";

  top: 14px;

  right: 10px;

  width: 0;

  height: 0;

  border: 6px solid transparent;

  border-color: #fff transparent transparent transparent;

}



/*point the arrow upwards when the select box is open (active):*/

.select-selected.select-arrow-active:after {

  border-color: transparent transparent #fff transparent;

  top: 7px;

}



/*style the items (options), including the selected item:*/

.select-items div,.select-selected {

  color: #ffffff;

  padding: 8px 16px;

  border: 1px solid transparent;

  border-color: transparent transparent rgba(0, 0, 0, 0.1) transparent;

  cursor: pointer;

  user-select: none;

}



/*style items (options):*/

.select-items {

  position: absolute;

  background-color: DodgerBlue;

  top: 100%;

  left: 0;

  right: 0;

  z-index: 99;

}



/*hide the items when the select box is closed:*/

.select-hide {

  display: none;

}



.select-items div:hover, .same-as-selected {

  background-color: rgba(0, 0, 0, 0.1);

}

</style>



<?php





}



?>