<?php

error_reporting(0);



session_start();

require('configure.php');

include('linkss.php');

include('header.php');

  // Check connection

  if($conn === false)

  {

      die("ERROR: Could not connect. " . mysqli_connect_error());

  }

  else

  {

    if(isset($_REQUEST['term']) != "")

    {

     session_start();

     $logname = $_SESSION['logname'];

      $term = $_REQUEST['term'];

      $query = "SELECT * FROM `registration_24to25` Where  cnic = '$logname'";

  //    echo "OK";

      $result=mysqli_query($conn,$query);

      if(mysqli_num_rows($result) > 0){

        while($row = mysqli_fetch_array($result)){

            // echo $logname;

            // echo $term;

        // echo $row[appId];

     

//     }

//   }



?>



<script>

    jQuery(document).ready(function($) {

        $(".scroll").click(function(event){     

            event.preventDefault();

            $('html,body').animate({scrollTop:$(this.hash).offset().top},1200);

        });

    });

</script><!-- //Smooth-Scrolling --><!-- Calender-JavaScript -->







<!------ Include the above in your HEAD tag ---------->



<div class="container">

            <form class="form-horizontal" action="updateRecord.php" id ="rform" role="form" >

                <h2>Update Result </h2>

                

                

                  <!--<div class="form-group">-->

                  <!--                          <input type="text" class="form-control form-control-user"-->

                  <!--                              id="exampleInputPassword" placeholder="Select student type" readonly>-->

                  <!--                          <div class="row mt-3">-->

                  <!--                              <div class="col-sm-4">-->

                  <!--                                  <label class="radio-inline">-->

                  <!--                                      <input onchange="stdTypeCheck(this);" type="radio" id="stdType" value="Overseas/Foreign" name="stdType"-->

                  <!--                                          required> Overseas / Foreign-->

                  <!--                                  </label>-->

                  <!--                              </div>-->

                  <!--                              <div class="col-sm-4"> -->

                  <!--                                  <label class="radio-inline">-->

                  <!--                                      <input onchange="stdOpenTypeCheck(this);" type="radio" id="stdType" value="Open_Merit" name="stdType"-->

                  <!--                                          required> Open Merit-->

                  <!--                                  </label>-->

                  <!--                              </div>-->



                  <!--                          </div>-->

                  <!--                  </div>-->

                                      <!--    <div class="form-group row" >                                    -->

                                      <!--<span class="help-block"><b>Eligibility for Overseas & Forign  Students :</b><br /><br /></span>-->

                                      <!--<span class="help-block"><b>Student who has studies & Passed HSSC 12th Grade Examination or Equivalent from Outside Pakistan & has Stayed in the forign Country for the whole Duration of the Course on a permanent Residence Permit. </b></span>                                       -->

                                      <!--      </div>-->

                                          <div class="form-group row" >

                                            <div class="col-sm-6 mb-3  mb-sm-0" id="passIqamaNo" style="display: none;">

                                                <input type="text" class="form-control form-control-user"

                                                    id="passIqamaNo1" placeholder="Passport No. / Iqama No." name="passIqamaNo" alue="<?php echo $row['passIqamaNo']?>" >

                                            </div>

                                           

                                            <div class="col-sm-6 mb-3  mb-sm-0" id="instituteName" style="display: none;">

                                                <input type="text" class="form-control form-control-user"

                                                    id="instituteName1" placeholder="F.Sc / A Level Institute Full Name" name="instituteName" alue="<?php echo $row['instituteName']?>" >

                                            </div>

                                            </div>

                                            

                                            <div class="form-group row" >

                                           

                                            <div class="col-sm-6 mb-3  mb-sm-0" id="instituteCity" style="display: none;">

                                                <input type="text" class="form-control form-control-user"

                                                    id="instituteCity1" placeholder="F.Sc / A Level Study Institute Country" name="instituteCity" alue="<?php echo $row['instituteCity']?>" >

                                            </div>

                                            

                                             <div class="col-sm-6 mb-3  mb-sm-0" id="residentialCountry" style="display: none;">

                                                <input type="text" class="form-control form-control-user"

                                                    id="residentialCountry1" placeholder="Residential Country / Country of Stay" name="residentialCountry" alue="<?php echo $row['residentialCountry']?>" >

                                            </div>

                                            </div>

                                            <div class="form-group row" >

                                                 <div class="col-sm-6 mb-3  mb-sm-0" id="visaStatus" style="display: none;">

                                                     

                                                      <select class="form-control form-control-lg" id="visaStatus1" name="visaStatus" alue="<?php echo $row['visaStatus']?>" >

                                                        <option selected disabled value="">-- Visa Status-- </option>

                                                        <option name="visaStatus">Valid</option>                                                     

                                                        <option name="visaStatus">Expired</option>

                                                      

                                                    </select>

                                                    <!--<input type="text" class="form-control form-control-user"-->

                                                    <!--    id="exampleInputPassword" placeholder="Visa Valid or Expired" name="visaStatus">-->

                                                </div>  

                                            </div>

                                            <div 

                                            style= " border-bottom: 1px dotted #000;

                                                     text-decoration: none;">

                                                

                                            </div>

                                        

                                        

                                        

                                    

                <div class="form-group" >

                    <!--<label for="name" class="col-sm-3 control-label" >Student Name*</label>-->

                    <!-- <div class="col-sm-9">

                        <span class="help-block">Update mdcat result. </span>

                     </div> -->

                </div>

                <div class="form-group">

                    <label for="name" class="col-sm-3 control-label" >Program</label>

                    <div class="col-sm-9">

                        <input type="text" id="program" name="program" value="<?php echo $row['program']?>" class="form-control" required  readonly>

                    </div>

                </div>

                

                <div class="form-group">

                    <label for="name" class="col-sm-3 control-label" >CNIC</label>

                    <div class="col-sm-9">

                        <input type="text" id="cnic" name="cnic" value="<?php echo $row['cnic']?>" class="form-control" required  readonly>

                    </div>

                </div>

                <div class="form-group">

                    <label for="name" class="col-sm-3 control-label" >Student Name*</label>

                    <div class="col-sm-9">

                        <input type="text" id="name" name="name" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p,p, p);" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" value="<?php echo $row['name']?>" class="form-control" autofocus required readonly >

                    </div>

                </div>

                <div class="form-group">

                    <label for="fname" class="col-sm-3 control-label">Father Name*</label>

                    <div class="col-sm-9">

                        <input type="text" id="fname" name="fname" value="<?php echo $row['fname']?> " oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" class="form-control" autofocus required readonly>

                    </div>

                </div>

                <div class="form-group">

                    <label for="aggregatePer" class="col-sm-3 control-label">Approximate Aggregate Percentage*</label>

                    <div class="col-sm-9">

                        <input type="text" id="aggregatePer" name="aggregatePer" value="<?php echo $row['aggregatePer']?> " oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" class="form-control" autofocus required readonly>

                    </div>

                </div>

                

                  <div class="form-group">

                    <label for="matricMarks" class="col-sm-3 control-label">Matric Marks</label>

                    <div class="col-sm-9">

                        <input type="text" id="matricMarks"  name="matricMarks"  placeholder="Matric marks out of" value="<?php echo $row['matricMarks']?>" class="form-control">

                        <!-- <span class="help-block">Your phone number won't be disclosed anywhere </span> -->

                    </div>

                </div>

                 <div class="form-group">

                    <label for="matricMarks" class="col-sm-3 control-label">Matric Marks out of</label>

                    <div class="col-sm-9">

                        <input type="text" id="marksOutOf"  name="marksOutOf"  placeholder="Fsc Marks" value="<?php echo $row['marksOutOf']?>" class="form-control">

                        <!-- <span class="help-block">Your phone number won't be disclosed anywhere </span> -->

                    </div>

                </div>

                

              



                 <div class="form-group">

                    <label for="fscmarks" class="col-sm-3 control-label">F.Sc Marks</label>

                    <div class="col-sm-9">

                        <input type="tetx" id="fscmarks"  name="fscmarks"  placeholder="Fsc Marks" value="<?php echo $row['fscmarks']?>" class="form-control" >

                        <!-- <span class="help-block">Your phone number won't be disclosed anywhere </span> -->

                    </div>

                </div>



                <div class="form-group">

                    <label for="fscmarks" class="col-sm-3 control-label">F.Sc year of completion</label>

                    <div class="col-sm-9">

                        <input type="tetx" id="comYear"  name="comYear"  placeholder="Year" value="<?php echo $row['comYear']?>" class="form-control" >

                        <!-- <span class="help-block">Your phone number won't be disclosed anywhere </span> -->

                    </div>

                </div>

                

                   <?php

                //   str_contains($row['comYear'], '2021')

                $Year = trim($row['comYear']);

                

                if( $Year == "2021")

                {

                ?>

                         

                <div class="form-group">

                    <label for="mcatr" class="col-sm-3 control-label">Physics Marks </label>

                    <div class="col-sm-9">

                        <input type="text" id="updPhy" name="updPhy" value="<?php if($row['physics'] == '') echo '0'; else  echo $row['physics'];?> " class="form-control">

                         <!--<span class="help-block">If result is awaited then leave the field empty </span> -->

                    </div>

                </div>



                <div class="form-group">

                    <label for="mcatr" class="col-sm-3 control-label">Chemistry Marks</label>

                    <div class="col-sm-9">

                        <input type="text" id="updChem" name="updChem" value="<?php if($row['chemistry'] == '') echo '0'; else  echo $row['chemistry'];?> " class="form-control">

                         <!--<span class="help-block">If result is awaited then leave the field empty </span> -->

                    </div>

                </div>



                <div class="form-group">

                    <label for="mcatr" class="col-sm-3 control-label">Biology Marks</label>

                    <div class="col-sm-9">

                        <input type="text" id="updBio" name="updBio" value="<?php if($row['biology'] == '') echo '0'; else  echo $row['biology'];?> " class="form-control">

                         <!--<span class="help-block">If result is awaited then leave the field empty </span> -->

                    </div>

                </div>

                

                <?php

                }

                ?>

                





                <div class="form-group">

                    <label for="mcat" class="col-sm-3 control-label">MDCAT Roll number*</label>

                    <div class="col-sm-9">

                        <input type="text" id="mcat"  name="mcat" value="<?php echo $row['mcat']?>"  class="form-control" required>

                        <!-- <span class="help-block">Your MCAT phone number won't be disclosed anywhere </span> -->

                    </div>

                </div>

                

                 <div class="form-group">

                    <label for="mcatr" class="col-sm-3 control-label">MDCAT Result</label>

                    <div class="col-sm-9">

                        <input type="text" id="mcatr" name="mcatr" value="<?php if($row['mcatr'] == '') echo '0'; else  echo $row['mcatr']; ?> " class="form-control">

                         <!--<span class="help-block">If result is awaited then leave the field empty </span> -->

                    </div>

                </div>

                

                <div class="form-group">

                    <label for="mcat_passing_year" class="col-sm-3 control-label">MDCAT year of completion</label>

                    <div class="col-sm-9">

                        <input type="text" id="mcat_passing_year"  name="mcat_passing_year"  placeholder="Year" value="<?php echo $row['mcat_passing_year']; } ?>" class="form-control" >

                        <!-- <span class="help-block">Your phone number won't be disclosed anywhere </span> -->

                    </div>

                </div>

                

                

                <!--      <div class="form-group">-->

                <!--    <label for="mcat_passing_year" class="col-sm-3 control-label">Student Type</label>-->

                <!--    <div class="col-sm-9">-->

                <!--        <input type="text" id="stdType"  name="stdType"  placeholder="Year" value="<?php echo $row['stdType']; } ?>" class="form-control" >-->

                        <!-- <span class="help-block">Your phone number won't be disclosed anywhere </span> -->

                <!--    </div>-->

                <!--</div>-->

                

                

                

                <!--<div class="form-group">-->

                <!--    <label for="mcatr" class="col-sm-3 control-label">Physics Marks </label>-->

                <!--    <div class="col-sm-9">-->

                <!--        <input type="text" id="updPhy" name="updPhy" value="<?php if($row['physics'] == '') echo '0'; else  echo $row['physics'];?> " class="form-control">-->

                         <!--<span class="help-block">If result is awaited then leave the field empty </span> -->

                <!--    </div>-->

                <!--</div>-->



                <!--<div class="form-group">-->

                <!--    <label for="mcatr" class="col-sm-3 control-label">Chemistry Marks</label>-->

                <!--    <div class="col-sm-9">-->

                <!--        <input type="text" id="updChem" name="updChem" value="<?php if($row['chemistry'] == '') echo '0'; else  echo $row['chemistry'];?> " class="form-control">-->

                         <!--<span class="help-block">If result is awaited then leave the field empty </span> -->

                <!--    </div>-->

                <!--</div>-->



                <!--<div class="form-group">-->

                <!--    <label for="mcatr" class="col-sm-3 control-label">Biology Marks</label>-->

                <!--    <div class="col-sm-9">-->

                <!--        <input type="text" id="updBio" name="updBio" value="<?php if($row['biology'] == '') echo '0'; else  echo $row['biology'];?> " class="form-control">-->

                         <!--<span class="help-block">If result is awaited then leave the field empty </span> -->

                <!--    </div>-->

                <!--</div>-->

                 <!-- /.form-group -->

              

                <button type="submit" class="btn btn-primary btn-block">Update</button>

            </form> <!-- /form -->

        </div>

         <!-- ./container -->

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

        

        }

    }

    

    

    

    

     function stdTypeCheck(that) {

        if (that.value == "Overseas/Foreign") {

      //alert("check");

      

 

            document.getElementById("passIqamaNo").style.display = "block";

            document.getElementById("instituteName").style.display = "block";

            document.getElementById("instituteCity").style.display = "block";

             document.getElementById("residentialCountry").style.display = "block";

              document.getElementById("visaStatus").style.display = "block";

              

           

            

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

                        document.forms['rform'].elements['comYear'].value = "";

                        document.forms['rform'].elements['fscmarks'].value = "";

                        if(document.forms['rform'].elements['fscmarks'].value == "")

                        {

                                

                                document.getElementById("fscmarks").attributes["required"] ="";   

                        }

                        if(document.forms['rform'].elements['comYear'].value == "")

                        {

                            

                                document.getElementById("comYear").attributes["required"] =""; 

                        }

                            

                        }

          

                     else {

                        document.forms['rform'].elements['fscmarks'].value = "0000";

                        

                        document.forms['rform'].elements['comYear'].value = "0000";

                        

                        document.getElementById("ifYes").style.display = "none";

                     

                     

                        document.getElementById("ifselect").style.display = "none";

                    

                    }

                }

        </script>

 



</body>



</html>

 

     <?php

    // }

  mysqli_free_result($result); 

} else{

    echo "<script>alert('Enter valid Application ID');

        window.location.href='updateResult.php';</script>";

}

}

 //  session_destroy();

?>