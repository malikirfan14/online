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
        padding: 24px;
        background-color: #ffffff;
        border: 0;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
    }

    /* Progress bar layout */
    .wizard-progress-bar {
        height: 12px;
        background-color: #e9ecef;
        margin-bottom: 24px;
        border-radius: 10px;
        overflow: hidden;
    }

    .wizard-progress {
        height: 100%;
        width: 0;
        background: linear-gradient(90deg, #1cc88a 0%, #20c997 100%);
        transition: width 0.4s ease-in-out;
        border-radius: 10px;
    }

    /* Wizard steps navigation nodes */
    .wizard-steps {
        display: flex;
        justify-content: space-between;
        margin-bottom: 25px;
        gap: 10px;
    }

    .step {
        flex: 1;
        text-align: center;
        padding: 12px 15px;
        background-color: #f8f9fc;
        color: #5a5c69;
        font-weight: 700;
        cursor: pointer;
        border-radius: 30px;
        border: 2px solid #e3e6f0;
        transition: all 0.3s ease;
        font-size: 0.9rem;
    }

    .step.active {
        background-color: #4e73df;
        color: #ffffff;
        border-color: #4e73df;
        box-shadow: 0 4px 10px rgba(78, 115, 223, 0.25);
    }

    .step.completed {
        background-color: #1cc88a;
        color: #ffffff;
        border-color: #1cc88a;
    }

    /* Wizard content frame */
    .wizard-content {
        border: 1px solid #e3e6f0;
        padding: 24px;
        border-radius: 12px;
        background-color: #ffffff;
    }

    .step-content {
        display: none;
    }

    .step-content.active {
        display: block;
    }

    .step.disabled {
        background-color: #f8f9fc;
        opacity: 0.6;
        cursor: not-allowed;
    }
</style>

<!-- Load Libraries First -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<div class="py-3">
    <div class="wizard-container">
        <!-- Progress Bar Indicator -->
        <div class="d-flex align-items-center justify-content-between mb-2">
            <span class="font-weight-bold text-gray-800"><i class="fas fa-tasks text-primary mr-2"></i>Pre-Registration Progress</span>
            <span class="badge badge-success px-3 py-2 font-weight-bold shadow-sm" style="font-size: 0.9rem;">
                <span id="progressPercentage">0</span>% Completed
            </span>
        </div>
        <div class="wizard-progress-bar">
            <div class="wizard-progress" style="width: 0%;"></div>
        </div>

        <!-- Wizard Navigation Steps -->
        <div class="wizard-steps">
            <div class="step active"><i class="fas fa-user-edit mr-1"></i> Personal Info</div>
            <div class="step"><i class="fas fa-graduation-cap mr-1"></i> Education</div>
            <div class="step"><i class="fas fa-cloud-upload-alt mr-1"></i> Upload Documents</div>
        </div>

        <!-- Wizard Panel Contents -->
        <div class="wizard-content">
            <!-- Step 1: Personal Info -->
            <div class="step-content active">
                <?php include('personal-info.php'); ?>
            </div>
            
            <!-- Step 2: Education Results -->
            <div class="step-content">
                <?php include('education.php'); ?>
            </div>
            
            <!-- Step 3: Document Uploads -->
            <div class="step-content">
                <?php include('upload-documents.php'); ?>
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
                    window.location.href = "profile.php";
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
</script>