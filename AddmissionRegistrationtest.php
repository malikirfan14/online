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


                                <form class="user" action="demoBack.php">
                                    
                                    <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Select student type" readonly>
                                            <div class="row mt-3">
                                                <div class="col-sm-4">
                                                    <label class="radio-inline">
                                                        <input onchange="stdTypeCheck(this);" type="radio" id="stdType" value="Overseas/Foreign" name="stdType"
                                                            required> Overseas/Foreign
                                                    </label>
                                                </div>
                                                <div class="col-sm-4"> 
                                                    <label class="radio-inline">
                                                        <input onchange="stdOpenTypeCheck(this);" type="radio" id="stdType" value="Open_Merit" name="stdType"
                                                            required> Open Merit
                                                    </label>
                                                </div>

                                            </div>
                                    </div>
                                    
                                  
                                    <div class="form-group row" >                                    
                                        <span class="help-block"><b>Eligibility for Overseas & Forign  Students :</b><br /><br /></span>
                                        <span class="help-block"><b>Student who has studies & Passed HSSC 12th Grade Examination or Equivalent from Outside Pakistan & has Stayed in the forign Country for the whole Duration of the Course on a permanent Residence Permit. </b></span>                                       
                                    </div>                                    
                                    <div class="form-group row" >

                                            <div class="col-sm-6 mb-3  mb-sm-0" id="passIqamaNo" style="display: none;">
                                                <input type="text" class="form-control form-control-user"
                                                    id="passIqamaNo1" placeholder="Passport No. / Iqama No." name="passIqamaNo" >
                                            </div>
                                           
                                            <div class="col-sm-6 mb-3  mb-sm-0" id="instituteName" style="display: none;">
                                                <input type="text" class="form-control form-control-user"
                                                    id="instituteName1" placeholder="F.Sc / A Level Institute Full  Name" name="instituteName" >
                                            </div>
                                            </div>
                                            
                                            <div class="form-group row" >
                                           
                                            <div class="col-sm-6 mb-3  mb-sm-0" id="instituteCity" style="display: none;">
                                                <input type="text" class="form-control form-control-user"
                                                    id="instituteCity1" placeholder="F.Sc / A Level Study Institute Country" name="instituteCity"  >
                                            </div>
                                            
                                             <div class="col-sm-6 mb-3  mb-sm-0" id="residentialCountry" style="display: none;">
                                                <input type="text" class="form-control form-control-user"
                                                    id="residentialCountry1" placeholder="Residential Country / Country of Stay" name="residentialCountry" >
                                            </div>
                                            </div>
                                            <div class="form-group row" >
                                                 <div class="col-sm-6 mb-3  mb-sm-0" id="visaStatus" style="display: none;">
                                                     
                                                      <select class="form-control form-control-lg" id="visaStatus1" name="visaStatus"  >
                                                        <option selected disabled value="">-- Visa Status-- </option>
                                                        <option name="visaStatus">Valid</option>                                                     
                                                        <option name="visaStatus">Expired</option>
                                                      
                                                    </select>
                                                    <!--<input type="text" class="form-control form-control-user"-->
                                                    <!--    id="exampleInputPassword" placeholder="Visa Valid or Expired" name="visaStatus">-->
                                                </div>  
                                            </div>
                                        
                                       
                                    
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input value = "<?php echo $row['name'];?>" type="text" class="form-control form-control-user"
                                                id="exampleFirstName"  name="name" readonly>
                                        </div>
                                        <div class="col-sm-6">
                                            <input value = "<?php echo $row['fname']; ?>" type="text" class="form-control form-control-user"
                                                id="exampleLastName" placeholder="Father Name" name="fname" required readonly>
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
                                                onfocus="(this.type='date')" onblur="(this.type='text')" required>
                                            </div>

                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="City" name="city" required> 
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="MDCAT Passing Year"
                                             onfocus="(this.type='month')" onblur="(this.type='text')" name="mcat_passing_year">
                                        </div>
                                        
                       
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="text" class="form-control form-control-user"
                                                    id="exampleInputPassword" placeholder="MDCAT Roll Number"
                                                    name="mcat">
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="number" class="form-control form-control-user"
                                                    id="exampleRepeatPassword" placeholder="MDCAT Marks" min="90" max="210" name="mcatr">
                                                    
                                            </div>
                                        </div>
                                        
                                         <div class="form-group row" >
                                            <div class="col-sm-6 mb-3  mb-sm-0" >
                                                <input type="text" class="form-control form-control-user"
                                                    id="exampleInputPassword" placeholder="Matric Marks" name="matricMarks">
                                            </div>
                                            
        
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <!-- <input type="number" class="form-control form-control-user"
                                                    id="exampleRepeatPassword" placeholder="Passing Year"
                                                     readonly> -->
                                                    
                                                      
                                                    <select class="form-control form-control-lg" id="marksOutOf" name="marksOutOf" required>
                                                        <option selected disabled value="">-- Matric Total Marks-- </option>
                                                        <option name="marksOutOf">850</option>                                                    
                                                        <option name="marksOutOf">900</option>
                                                        <option name="marksOutOf">1050</option>
                                                        <option name="marksOutOf">1100</option>
                                                    </select>
                                                </div>
                                                                                  
                                                      
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

                                        <div class="form-group">
                                            <!-- <input type="text" class="form-control form-control-user mb-3"
                                                id="exampleInputPassword" placeholder="Fsc Status " readonly> -->
                                            <select onchange="yesnoCheck(this);" name="fscStatus" required>
                                                  <option selected disabled value = "" > -- F.Sc Result Status -- </option>
                                                <!-- <option>Select</option> -->
                                                <option name="fscStatus">Is Awaited</option>
                                                <option name="fscStatus">Completed</option>
                                            </select>
                                        </div>
                                        
                                        
                                        
                                        
                                        
                                     


                                        <div class="form-group row" >
                                            <div class="col-sm-6 mb-3  mb-sm-0" id="ifYes" style="display: none;">
                                                <input type="text" class="form-control form-control-user"
                                                    id="exampleInputPassword" placeholder="F.Sc Total Marks out of 1100" name="fscmarks">
                                            </div>
                                            
                                            <div class="col-sm-6 mb-3" id ="ifselect" style="display: none;">
                                                <!-- <input type="number" class="form-control form-control-user"
                                                    id="exampleRepeatPassword" placeholder="Passing Year"
                                                     readonly> -->
                                                    
                                                     <select  onchange="yearCheck(this);" class="mt-3" id="comYear"  name="comYear" required  >
                                                      <option value = "0000" > -- select Year of completion -- </option>
                                                          <!--<option value="0000" placeholder="select">&nbsp;</option>-->
                                                      <option name="comYear">2020</option>
                                                      <option name="comYear">2021</option>
                                                      <option name="comYear">2022</option>
                                                      <option name="comYear">2023</option>
                                                      <option name="comYear">2024</option>
                                                      <option name="comYear">2025</option>
                                                      <option name="comYear">2026</option>
                                                     </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                          <div class="col-sm-4 mb-3  mb-sm-0" id="show1" style="display: none;">
                                                <input type="text" class="form-control form-control-user"
                                                    id="biology" placeholder="Biology marks" name="biology">
                                            </div>
                                            <div class="col-sm-4 mb-3  mb-sm-0" id="show2" style="display: none;">
                                                <input type="text" class="form-control form-control-user"
                                                    id="chemistry" placeholder="Chemistry marks" name="chemistry">
                                            </div>
                                            <div class="col-sm-4 mb-3  mb-sm-0" id="show3" style="display: none;">
                                                <input type="text" class="form-control form-control-user"
                                                    id="physics" placeholder="physics marks" name="physics">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Select Program " readonly>
                                            <div class="row mt-3">
                                                <div class="col-sm-4">
                                                    <label class="radio-inline">
                                                        <input type="radio" id="program" value="MBBS" name="program"
                                                            required> ONLY MBBS
                                                    </label>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label class="radio-inline">
                                                        <input type="radio" id="program" value="BDS" name="program"
                                                            required> ONLY BDS
                                                    </label>
                                                </div>

                                                <div class="col-sm-4">
                                                    <label class="radio-inline">
                                                        <input type="radio" id="program" value="BOTH" name="program"
                                                            required> MBBS & BDS
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
    <script type = "text/javascript" >
        function preventBack() { window.history.forward(); }
        setTimeout("preventBack()", -0);
        window.onunload = function () { null };
    </script>
    <script>
    
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
            
            
               if(document.getElementById("passIqamaNo1").value == "")
            {
                    // alert('select me');
                    document.getElementById("passIqamaNo1").removeAttribute("required");
            }
            if(document.getElementById("instituteName1").value == "")
            {
                
                    document.getElementById("instituteName1").removeAttribute("required");
            }
            
             if(document.getElementById("instituteCity1").value == "")
            {
                    
                    document.getElementById("instituteCity1").removeAttribute("required");
            }
            
             if(document.getElementById("residentialCountry1").value == "")
            {
                    
                    document.getElementById("residentialCountry1").removeAttribute("required");
            }
            
             if(document.getElementById("visaStatus1").value == "")
            {
                    
                    document.getElementById("visaStatus1").removeAttribute("required");
            }
            // document.forms['rform'].elements['passIqamaNo'].value = "0000";
            // document.forms['rform'].elements['instituteName'].value = "0000";
            // document.forms['rform'].elements['instituteCity'].value = "0000";
            // document.forms['rform'].elements['residentialCountry'].value = "0000";
            // document.forms['rform'].elements['visaStatus'].value = "0000";
            
            
            
          
            }
   
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
            
            
              if(document.getElementById("passIqamaNo1").value == "")
            {
                    // alert('select me');
                    document.getElementById("passIqamaNo1").removeAttribute("required");
            }
            if(document.getElementById("instituteName1").value == "")
            {
                
                    document.getElementById("instituteName1").removeAttribute("required");
            }
            
             if(document.getElementById("instituteCity1").value == "")
            {
                    
                    document.getElementById("instituteCity1").removeAttribute("required");
            }
            
             if(document.getElementById("residentialCountry1").value == "")
            {
                    
                    document.getElementById("residentialCountry1").removeAttribute("required");
            }
            
             if(document.getElementById("visaStatus1").value == "")
            {
                    
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
            
            
            
            if(document.getElementById("passIqamaNo1").value == "")
            {
                    // alert('select me');
                    document.getElementById("passIqamaNo1").setAttribute('required', '');
            }
            if(document.getElementById("instituteName1").value == "")
            {
                
                    document.getElementById("instituteName1").setAttribute('required', '');
            }
            
             if(document.getElementById("instituteCity1").value == "")
            {
                    
                    document.getElementById("instituteCity1").setAttribute('required', '');
            }
            
             if(document.getElementById("residentialCountry1").value == "")
            {
                    
                    document.getElementById("residentialCountry1").setAttribute('required', '');
            }
            
             if(document.getElementById("visaStatus1").value == "")
            {
                    
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
    
    
       function yearCheck(that){
        if (that.value == "2021") {
            {

            document.getElementById("show1").style.display = "block";
            document.getElementById("show2").style.display = "block";
            document.getElementById("show3").style.display = "block";

                if(document.forms['rform'].elements['[physics]'].value == "")
            {
                
                    document.getElementById("physics").attributes["required"] ="true"; 
            }
               if(document.forms['rform'].elements['chemistry'].value == "")
            {
                
                    document.getElementById("chemistry").attributes["required"] ="true"; 
            }
               if(document.forms['rform'].elements['biology'].value == "")
            {
                
                    document.getElementById("biology").attributes["required"] ="true"; 
            }
            }
        }
        
        else
        
        {
             document.getElementById("show1").style.display = "none";
            document.getElementById("show2").style.display = "none";
            document.getElementById("show3").style.display = "none";
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
    //commented the below line becasue options are harcoded in select year tag
// var selectBox = document.getElementById('comYear');
// loop through years
for (var i = 2022; i >= 2020; i--) {
    // create option element
    var option = document.createElement('option');
    // add value and text name
    option.value = i;
    option.innerHTML = i;
    // add the option element to the selectbox
    selectBox.appendChild(option);
}
</script>


<?php


}

?>