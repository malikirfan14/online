<?php
session_start();
if (!isset($_SESSION['logname'])) {
    header("location:login.php");
}
if (isset($_SESSION['logname'])) {
    error_reporting(0);
    require('configure.php');
    include('linkss.php');
    include('header.php');
}

//this is gitlab test

if ($conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());

} else {
    $logname = $_SESSION['logname'];

    $sql = "SELECT * FROM `registration_25to26` WHERE `cnic` = '$logname'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $isPersonalInfoDone = $row['isPersonalInfoDone'];
            $isEducationDone = $row['isEducationDone'];
           // $isDocumentsDone = $row['isDocumentsDone'];
         //   $isChallanDone = $row['isChallanDone'];  
        }
    }
}


?>

<div style="padding:20px">
    <div class="wizard-container">
        Pre-Registration Completed: <span id="progressPercentage">0</span>%
        <div class="progress-bar">
            <div class="progress" style="width: 0%;"></div>
        </div>
        <div class="wizard-steps">
            <div class="step active">Personal Info</div>
            <div class="step">Education</div>
          <!--  <div class="step">Upload Documents</div>
            <div class="step">Summary</div>  -->
            <!-- <div class="step">UHS</div> -->
            <!-- Add more steps as needed -->
        </div>
        <div class="wizard-content">
            <!-- Content for Step 1 -->
            <div class="step-content active">
                <?php include('AddmissionRegistration.php'); ?>
            </div>
            <!-- Content for Step 2 -->
            <div class="step-content">
                <?php include('education.php'); ?>
            </div>
          
            <!-- Add more content sections as needed -->
        </div>
    </div>
</div>

<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function () {
        var phpValue = "<?php echo $appId; ?>";
        //alert('this is jquery:'+ phpValue);

        var isPersonalInfoDone = "<?php echo $isPersonalInfoDone; ?>";
        var isEducationDone = "<?php echo $isEducationDone; ?>";
       // var isDocumentsDone = "<?php echo $isDocumentsDone; ?>";
        //var isChallanDone = "<?php echo $isChallanDone; ?>";


        var totalSteps = 2;
        //totalSteps = totalSteps-1;
        var currentStep = 1;

        //default/populated steps
  //      if (isChallanDone == 1) {
            //
           // $("#progressPercentage").text(100);
          //  $(".progress").css("width", 100 + "%");
           // 
         //   $(".step:eq(" + (0) + ")").addClass("completed");
       //     $(".step:eq(" + (1) + ")").addClass("completed");
            //$(".step:eq(" + (2) + ")").addClass("completed");
          //  $(".step:eq(" + (3) + ")").addClass("completed");
        //    
      //     
    //        $(".step-content.active").removeClass("active");
  //          $(".step-content:eq(" + (4) + ")").addClass("active");
//
         //   currentStep = 4;
       // }
       // else if (isDocumentsDone == 1) {
            //
           // $("#progressPercentage").text(100);
          //  $(".progress").css("width", 100 + "%");
            //
           // $(".step:eq(" + (0) + ")").addClass("completed");
         //   $(".step:eq(" + (1) + ")").addClass("completed");
       ////     $(".step:eq(" + (2) + ")").addClass("completed");
          //  $(".step:eq(" + (3) + ")").addClass("completed");
        //    
      //     
    //        $(".step-content.active").removeClass("active");
  //          $(".step-content:eq(" + (3) + ")").addClass("active");
//
          //  currentStep = 3;
        //} 
         if (isEducationDone == 1) {
            
            $("#progressPercentage").text(100);
            $(".progress").css("width", 100 + "%");
            
            $(".step:eq(" + (0) + ")").addClass("completed");
            $(".step:eq(" + (1) + ")").addClass("completed");
            
           
            $(".step-content.active").removeClass("active");
            $(".step-content:eq(" + (2) + ")").addClass("active");

            currentStep = 2;
                // ✅ Redirect to student profile after a short delay (e.g., 1 second)
    //setTimeout(function () {
     //   window.location.href = "studentProfile.php"; // <-- change this to your actual profile URL
   // }, 1000); // 1000 milliseconds = 1 second
        }
        else if (isPersonalInfoDone == 1) {
            $("#progressPercentage").text(50);
            $(".progress").css("width", 50 + "%");

            $(".step:eq(" + (0) + ")").addClass("completed");
            $(".step-content.active").removeClass("active");
            $(".step-content:eq(" + (1) + ")").addClass("active");
        }


        //end of default/populated



        $(".step").click(function () {

            var clickedStep = $(this).index() + 1;

            var allowedSteps = 1;
            if(isPersonalInfoDone == 1) {
                allowedSteps += 1;
            }
            if(isEducationDone == 1) {
                allowedSteps += 1;
            }
           // if(isDocumentsDone == 1) {
             //   allowedSteps += 1;
           // }
            //if(isChallanDone == 1) {
            //    allowedSteps += 1;
          //  }

            //if (clickedStep <= allowedSteps) {
              if (clickedStep <= allowedSteps) {
                //if (clickedStep !== currentStep) {
                    // Hide current step content and mark it as completed
                    $(".step-content.active").removeClass("active");

                    // Update progress bar width
                    var progress = ((clickedStep - 1) / (totalSteps - 1)) * 100;
                    progress = parseFloat(progress.toFixed(2));
                    var currentProgress = $("#progressPercentage").text();
                    if (clickedStep > currentStep && currentProgress < progress) {
                        $("#progressPercentage").text(progress);
                        $(".progress").css("width", progress + "%");
                    }


                    if (clickedStep != 1) {
                        $(".step:eq(" + (clickedStep - 2) + ")").addClass("completed");
                    }

                    //$(".step:eq(" + (currentStep - 1) + ")").removeClass("active");
                    //$(".step:eq(" + (currentStep) + ")").addClass("active");

                    // Show clicked step content and update current step
                    $(".step-content:eq(" + (clickedStep - 1) + ")").addClass("active");
                    currentStep = clickedStep;
                //}
            }
        });
    });
</script>
<style>
    .form-control-lg{
        height: 48px;
        font-size: 1rem;
    }
    /* Wizard container */
    .wizard-container {
        max-width: 100%;
        margin: 0 auto;
        padding: 20px;
        background-color: #ffffff;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    /* Progress bar */
    .progress-bar {
        height: 20px;
        background-color: #e0e0e0 !important;
        margin-bottom: 20px;
        border-radius: 5px;
        overflow: hidden;
    }

    .progress {
        height: 100%;
        width: 0;
        background-color: #4caf50 !important;
        transition: width 0.3s ease-in-out;
    }

    /* Wizard steps */
    .wizard-steps {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    .step {
        flex: 1;
        text-align: center;
        padding: 10px;
        background-color: #ccc;
        cursor: pointer;
        border-radius: 25px;
    }

    /* .step.active {
            background-color: blue;
            color: #fff;
        } */

    .step.completed {
        background-color: #4caf50;
        color: #fff;
    }

    /* Wizard content */
    .wizard-content {
        border: 1px solid #ddd;
        padding: 20px;
        border-radius: 5px;
    }

    .step-content {
        display: none;
    }

    .step-content.active {
        display: block;
    }

    .step.disabled {
        background-color: #f0f0f0;
        opacity: 0.6;
        cursor: not-allowed;
        /* Optional: Change cursor to indicate the step is disabled */
    }
</style>