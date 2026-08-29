<?php
/**
 * Student Registration Wizard Controller
 * 
 * Manages the multi-step registration wizard including Personal Info, 
 * Education, and Upload Documents screens. Handles validation state 
 * and provides navigation flow.
 */
session_start();

if (!isset($_SESSION['logname'])) {
    header("location:login.php");
    exit;
}

error_reporting(0);
require('configure.php');
include('linkss.php');
include('header.php');

if ($conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
} else {
    $logname = $_SESSION['logname'];

    // Retrieve the student registration progress flags
    $sql = "SELECT * FROM `registration_26to27` WHERE `cnic` = '$logname'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        if ($row = mysqli_fetch_array($result)) {
            $isPersonalInfoDone = $row['isPersonalInfoDone'];
            $isEducationDone    = $row['isEducationDone'];
            $isDocumentsDone    = $row['isDocumentsDone'];
        }
    }
}
?>

<!-- Custom Wizard Styles (Loaded at the top to prevent FOUC) -->
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
    
    .form-control-lg {
        height: 48px;
        font-size: 1rem;
    }
    
    /* Wizard Container styling */
    .wizard-container {
        max-width: 100%;
        margin: 0 auto;
        padding: 20px;
        background-color: #ffffff;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    /* Progress bar layout */
    .wizard-progress-bar {
        height: 20px;
        background-color: #e0e0e0;
        margin-bottom: 20px;
        border-radius: 5px;
        overflow: hidden;
    }

    .wizard-progress {
        height: 100%;
        width: 0;
        background-color: #4caf50;
        transition: width 0.3s ease-in-out;
    }

    /* Wizard steps navigation nodes */
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
        margin: 0 5px;
    }

    .step.completed {
        background-color: #4caf50;
        color: #fff;
    }

    /* Wizard content frame */
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
    }
</style>

<!-- Load Libraries First -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<div style="padding:20px">
    <div class="wizard-container">
        <!-- Progress Bar Indicator -->
        Pre-Registration Completed: <span id="progressPercentage">0</span>%
        <div class="wizard-progress-bar">
            <div class="wizard-progress" style="width: 0%;"></div>
        </div>

        <!-- Wizard Navigation Steps -->
        <div class="wizard-steps">
            <div class="step active">Personal Info</div>
            <div class="step">Education</div>
            <div class="step">Upload Documents</div>
        </div>

        <!-- Wizard Panel Contents -->
        <div class="wizard-content">
            <!-- Step 1: Personal Info -->
            <div class="step-content active">
                <?php include('AddmissionRegistration.php'); ?>
            </div>
            
            <!-- Step 2: Education Results -->
            <div class="step-content">
                <?php include('education.php'); ?>
            </div>
            
            <!-- Step 3: Document Uploads -->
            <div class="step-content">
                <?php include('multiple.php'); ?>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        var isPersonalInfoDone = "<?php echo $isPersonalInfoDone; ?>";
        var isEducationDone    = "<?php echo $isEducationDone; ?>";
        var isDocumentsDone    = "<?php echo $isDocumentsDone; ?>";

        var totalSteps = 3;
        var currentStep = 1;

        // --- PROGRESS & NAVIGATION INITIAL STATE SETUP ---
        if (isDocumentsDone == 1) {
            $("#progressPercentage").text(100);
            $(".wizard-progress").css("width", "100%");
             
            $(".step:eq(0)").addClass("completed");
            $(".step:eq(1)").addClass("completed");
            $(".step:eq(2)").addClass("completed");
            
            var urlParams = new URLSearchParams(window.location.search);
            if (urlParams.has('edit')) {
                // Route user to specific steps if requested in URL edit mode
                var stepVal = urlParams.get('step');
                var stepIndex = 0;
                if (stepVal === '2') {
                    stepIndex = 1;
                } else if (stepVal === '3') {
                    stepIndex = 2;
                }
                
                $(".step-content.active").removeClass("active");
                $(".step-content:eq(" + stepIndex + ")").addClass("active");
                currentStep = stepIndex + 1;
                
                $(".step").removeClass("active");
                $(".step:eq(" + stepIndex + ")").addClass("active");
            } else {
                $(".step-content.active").removeClass("active");
                $(".step-content:eq(2)").addClass("active");
                currentStep = 3;
                
                // Complete flow, redirecting to student profile page
                setTimeout(function () {
                    window.location.href = "studentProfile.php";
                }, 1000);
            }
        } 
        else if (isEducationDone == 1) {
            $("#progressPercentage").text(66.67);
            $(".wizard-progress").css("width", "66.67%");
            
            $(".step:eq(0)").addClass("completed");
            $(".step:eq(1)").addClass("completed");
            
            $(".step-content.active").removeClass("active");
            $(".step-content:eq(2)").addClass("active");
            currentStep = 2;
        }
        else if (isPersonalInfoDone == 1) {
            $("#progressPercentage").text(33.33);
            $(".wizard-progress").css("width", "33.33%");

            $(".step:eq(0)").addClass("completed");
            $(".step-content.active").removeClass("active");
            $(".step-content:eq(1)").addClass("active");
        }

        // --- STEP SWITCH CLICK HANDLER ---
        $(".step").click(function () {
            var clickedStep = $(this).index() + 1;
            var allowedSteps = 1;

            if (isPersonalInfoDone == 1) {
                allowedSteps += 1;
            }
            if (isEducationDone == 1) {
                allowedSteps += 1;
            }
            if (isDocumentsDone == 1) {
                allowedSteps += 1;
            }

            if (clickedStep <= allowedSteps) {
                $(".step-content.active").removeClass("active");

                // Update percentage indicator dynamically
                var progress = ((clickedStep - 1) / (totalSteps - 1)) * 100;
                progress = parseFloat(progress.toFixed(2));
                var currentProgress = $("#progressPercentage").text();
                if (clickedStep > currentStep && currentProgress < progress) {
                    $("#progressPercentage").text(progress);
                    $(".wizard-progress").css("width", progress + "%");
                }

                if (clickedStep != 1) {
                    $(".step:eq(" + (clickedStep - 2) + ")").addClass("completed");
                }

                $(".step-content:eq(" + (clickedStep - 1) + ")").addClass("active");
                currentStep = clickedStep;
            }
        });
    });
</script>e>