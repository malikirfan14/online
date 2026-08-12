<?php

// error_reporting(0);

session_start();
// session_start();
if(!isset($_SESSION['logname']))
{
	header("location:login.php");
    
}

if(isset($_SESSION['logname']))
{
    require('configure.php');
include('linkss.php');
include('header.php');

?> 

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                  
                 <div class="container">
            <form class="form-horizontal" action="fetchRecord.php" id ="rform" role="form" style="margin-top: 50px;">
                <h2>Result Update Page</h2>
                <br><br>
                 <div class="form-group" >
                  <div class="col-sm-9">
                        <span class="help-block">Step 1 : CNIC Number (Auto Fill)</span> <br/>
                        <span class="help-block">Step 2 : Next Step </span>
                        <!--<span class="help-block">Step 3 : After form submission download the generated form.</span>-->
                        <!--<span class="help-block">Step 4: Deposit the challan form in the mentioned bank within due date .</span>-->
                        <!--<span class="help-block">Step 5: You will receieve an application number on your given  email.</span>-->
                        <!--<span class="help-block">Step 6 : submit application form with paid bank challan at Admission Office WMDC(By self or through courier).</span>-->
                       
                        <!--<span class="help-block">Your phone number won't be disclosed anywhere </span>-->
                     </div>
                </div>
                 <br>
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label" >CNIC *</label>
                    <div class="col-sm-9">
                        <input type="text" placeholder="CNIC" value="<?php echo $_SESSION['logname'] ?>" name="term" readonly >
                    </div>
                </div>
	<br>
                <button type="submit" class="btn btn-primary btn-block">Next Step</button>
          </form> <!-- /form -->
       
    <!-- Bootstrap core JavaScript-->
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
?>