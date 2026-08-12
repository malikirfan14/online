<?php
session_start();
?>
<head>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>  
<script>


$(document).ready(function() {
    var totalSteps = $(".step").length;
    var currentStep = 1;

    $(".step").click(function() {
        var clickedStep = $(this).index() + 1;

        if (clickedStep !== currentStep) {
            // Update progress bar width
            var progress = (clickedStep / totalSteps) * 100;
            $(".progress").css("width", progress + "%");

            // Hide current step content and mark it as completed
            $(".step-content.active").removeClass("active");
            $(".step:eq(" + (currentStep - 1) + ")").addClass("completed");

            // Show clicked step content and update current step
            $(".step-content:eq(" + (clickedStep - 1) + ")").addClass("active");
            currentStep = clickedStep;
        }
    });
});
</script>


<style>
/* Wizard container */
.wizard-container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f5f5f5;
    border: 1px solid #ddd;
    border-radius: 5px;
}

/* Progress bar */
.progress-bar {
    height: 20px;
    background-color: #e0e0e0;
    margin-bottom: 20px;
    border-radius: 5px;
    overflow: hidden;
}

.progress {
    height: 100%;
    width: 0;
    background-color: #4caf50;
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
    border-radius: 5px;
}

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
</style>
</head>
<body>
<div class="wizard-container">
    <div class="progress-bar">
        <div class="progress" style="width: 25%;"></div>
    </div>

    <div class="wizard-steps">
        <div class="step active">Step 1</div>
        <div class="step">Step 2</div>
        <div class="step">Step 3</div>
        <!-- Add more steps as needed -->
    </div>

    <div class="wizard-content">
        <!-- Content for Step 1 -->
        <div class="step-content active">

           <!-- Step 1 content goes here -->
           STEP 1
    
        </div>

        <!-- Content for Step 2 -->
        <div class="step-content">
            <!-- Step 2 content goes here -->
            STEP 2
        </div>

        <!-- Content for Step 3 -->
        <div class="step-content">
            <!-- Step 3 content goes here -->
            STEP 3
        </div>
        <!-- Add more content sections as needed -->
    </div>
</div>

</body>