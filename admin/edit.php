<?php
// Include custom header which also handles authentication check and configure.php import
require_once('header.php');
include_once('sidebar.php');

$cnic = isset($_GET['cnic']) ? trim($_GET['cnic']) : '';
$student = null;

if ($cnic !== '') {
    // Retrieve student details securely using prepared statement
    $query = "SELECT * FROM `registration_26to27` WHERE cnic = ? LIMIT 1";
    if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_bind_param($stmt, "s", $cnic);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if ($result && mysqli_num_rows($result) > 0) {
            $student = mysqli_fetch_array($result);
        }
        mysqli_stmt_close($stmt);
    }
}

// Handle student verification toggle
if ($student && isset($_POST['verifyStudent'])) {
    $currentStatus = $student['isVerified'];
    $newStatus = ($currentStatus == '1') ? '0' : '1';
    
    $updateSql = "UPDATE `registration_26to27` SET `isVerified` = ? WHERE `cnic` = ?";
    if ($stmt_verify = mysqli_prepare($conn, $updateSql)) {
        mysqli_stmt_bind_param($stmt_verify, "ss", $newStatus, $cnic);
        if (mysqli_stmt_execute($stmt_verify)) {
            $student['isVerified'] = $newStatus; // update local variable
            echo "<script>alert('Student verification status updated successfully!'); window.location.href='unverified.php';</script>";
            exit();
        }
        mysqli_stmt_close($stmt_verify);
    }
}

?>

<div id="admin-content" class="animate-fade-in">
    <!-- Topbar -->
    <div class="topbar">
        <div class="topbar-title-section">
            <h1 class="topbar-title">Student Profile Review</h1>
            <p class="text-muted small mb-0">Verify credentials, documents, and registration details</p>
        </div>
        
        <a href="unverified.php" class="btn btn-outline-secondary d-flex align-items-center gap-2">
            <i class="fa-solid fa-arrow-left"></i>
            <span>Back to List</span>
        </a>
    </div>

    <?php if (!$student): ?>
        <div class="alert alert-danger shadow-sm d-flex align-items-center gap-3">
            <i class="fa-solid fa-triangle-exclamation fa-2xl"></i>
            <div>
                <h5 class="alert-heading mb-1">Student Record Not Found</h5>
                <p class="mb-0">Please check the CNIC or return to the student list to select a valid record.</p>
            </div>
        </div>
    <?php else: ?>
        
        <!-- Verification Banner Card -->
        <div class="admin-card p-4 mb-4" style="background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h5 class="font-weight-bold mb-1">Verification Status</h5>
                    <p class="text-muted small mb-md-0">Clicking the toggle will change the verification status of this student.</p>
                </div>
                <div class="col-md-4 text-md-end">
                    <form action="" method="post">
                        <?php
                        $buttonColor = ($student['isVerified'] == '1') ? 'btn-success' : 'btn-danger';
                        $buttonText = ($student['isVerified'] == '1') ? '<i class="fa-solid fa-shield-check"></i> Verified (Click to Revoke)' : '<i class="fa-solid fa-user-check"></i> Verify Student';
                        ?>
                        <button type="submit" class="btn <?php echo $buttonColor; ?> px-4 py-2" name="verifyStudent">
                            <?php echo $buttonText; ?>
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Main Form & Details Container -->
        <div class="admin-card">
            <div class="admin-card-header bg-white border-bottom">
                <h5 class="admin-card-title mb-0">Update Student Registration Information</h5>
            </div>
            
            <div class="card-body p-4">
                <form class="form-horizontal" action="update-backend.php" method="POST" id="rform">
                    <input type="hidden" name="cnic" value="<?php echo htmlspecialchars($student['cnic']); ?>">
                    
                    <!-- Section: Personal Information -->
                    <div class="mb-5">
                        <div class="d-flex align-items-center gap-2 mb-3 border-bottom pb-2">
                            <i class="fa-solid fa-user text-primary"></i>
                            <h5 class="mb-0 font-weight-bold text-dark">Personal Information</h5>
                        </div>
                        
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label font-weight-bold">Student Name</label>
                                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars(trim($student['name'] ?? '')); ?>" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label for="fname" class="form-label font-weight-bold">Father Name</label>
                                <input type="text" id="fname" name="fname" value="<?php echo htmlspecialchars(trim($student['fname'] ?? '')); ?>" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label font-weight-bold">Email Address</label>
                                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars(trim($student['email'] ?? '')); ?>" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label for="cnic_issue_date" class="form-label font-weight-bold">CNIC Issue Date</label>
                                <input type="text" id="cnic_issue_date" name="cnic_issue_date" value="<?php echo htmlspecialchars(trim($student['cnic_issue_date'] ?? '')); ?>" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="stdPhone" class="form-label font-weight-bold">Student Phone Number</label>
                                <input type="text" id="stdPhone" name="stdPhone" value="<?php echo htmlspecialchars($student['stdPhone'] ?? ''); ?>" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="fatPhone" class="form-label font-weight-bold">Father Phone Number</label>
                                <input type="text" id="fatPhone" name="fatPhone" value="<?php echo htmlspecialchars($student['fatPhone'] ?? ''); ?>" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="gender" class="form-label font-weight-bold">Gender</label>
                                <select id="gender" name="gender" class="form-select">
                                    <option value="Male" <?php echo ($student['gender'] == 'Male') ? 'selected' : ''; ?>>Male</option>
                                    <option value="Female" <?php echo ($student['gender'] == 'Female') ? 'selected' : ''; ?>>Female</option>
                                    <option value="Other" <?php echo ($student['gender'] == 'Other') ? 'selected' : ''; ?>>Other</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="dob" class="form-label font-weight-bold">Date of Birth</label>
                                <input type="text" id="dob" name="dob" value="<?php echo htmlspecialchars($student['dob'] ?? ''); ?>" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="emergencyPhone" class="form-label font-weight-bold">Emergency Phone</label>
                                <input type="text" id="emergencyPhone" name="emergencyPhone" value="<?php echo htmlspecialchars($student['emergencyPhone'] ?? ''); ?>" class="form-control">
                            </div>
                            <div class="col-12 mt-2" id="adminPhoneErrorBox" style="display: none;">
                                <div class="alert alert-danger py-2 px-3 mb-0" style="font-size: 13px;">
                                    <i class="fas fa-exclamation-triangle mr-1"></i>
                                    Student, Father, and Emergency numbers cannot all be identical. Please provide at least 2 different numbers.
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="program" class="form-label font-weight-bold">Applied For Program</label>
                                <select id="program" name="program" class="form-select">
                                    <option value="MBBS" <?php echo ($student['program'] == 'MBBS') ? 'selected' : ''; ?>>MBBS</option>
                                    <option value="BDS" <?php echo ($student['program'] == 'BDS') ? 'selected' : ''; ?>>BDS</option>
                                    <option value="BOTH" <?php echo ($student['program'] == 'BOTH') ? 'selected' : ''; ?>>BOTH</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="address" class="form-label font-weight-bold">Mailing Address</label>
                                <textarea id="address" name="address" rows="2" class="form-control"><?php echo htmlspecialchars($student['address'] ?? ''); ?></textarea>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Section: Academic Profile -->
                    <div class="mb-5">
                        <div class="d-flex align-items-center gap-2 mb-3 border-bottom pb-2">
                            <i class="fa-solid fa-graduation-cap text-primary"></i>
                            <h5 class="mb-0 font-weight-bold text-dark">Academic Qualifications</h5>
                        </div>
                        
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label for="matricMarks" class="form-label font-weight-bold">Matric Obtained Marks</label>
                                <input type="number" id="matricMarks" name="matricMarks" value="<?php echo (int)($student['matricMarks'] ?: 0); ?>" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="marksOutOf" class="form-label font-weight-bold">Matric Total Marks</label>
                                <input type="number" id="marksOutOf" name="marksOutOf" value="<?php echo (int)($student['marksOutOf'] ?: 0); ?>" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="comYear" class="form-label font-weight-bold">F.Sc Completion Year</label>
                                <input type="text" id="comYear" name="comYear" value="<?php echo htmlspecialchars($student['comYear'] ?: '0000'); ?>" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="fscmarks" class="form-label font-weight-bold">F.Sc Obtained Marks</label>
                                <input type="number" id="fscmarks" name="fscmarks" value="<?php echo (int)($student['fscmarks'] ?: 0); ?>" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="fscMarksOutOf" class="form-label font-weight-bold">F.Sc Total Marks</label>
                                <input type="number" id="fscMarksOutOf" name="fscMarksOutOf" value="<?php echo (int)($student['fscMarksOutOf'] ?: 0); ?>" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="aggregatePer" class="form-label font-weight-bold">Aggregate Percentage (%)</label>
                                <input type="text" id="aggregatePer" name="aggregatePer" value="<?php echo htmlspecialchars($student['aggregatePer'] ?: '0'); ?>" class="form-control">
                            </div>
                        </div>
                    </div>
                    
                    <!-- Section: Entry Test Scores -->
                    <div class="mb-5">
                        <div class="d-flex align-items-center gap-2 mb-3 border-bottom pb-2">
                            <i class="fa-solid fa-clipboard-question text-primary"></i>
                            <h5 class="mb-0 font-weight-bold text-dark">Entry Test details</h5>
                        </div>
                        
                        <div class="row g-3">
                            <!-- MDCAT details -->
                            <div class="col-md-4">
                                <label for="mcat" class="form-label font-weight-bold">MDCAT Roll Number</label>
                                <input type="text" id="mcat" name="mcat" value="<?php echo htmlspecialchars($student['mcat'] ?? ''); ?>" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="mcatr" class="form-label font-weight-bold">MDCAT Obtained Marks</label>
                                <input type="text" id="mcatr" name="mcatr" value="<?php echo htmlspecialchars($student['mcatr'] ?: '0'); ?>" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="mcat_passing_year" class="form-label font-weight-bold">MDCAT Year</label>
                                <input type="text" id="mcat_passing_year" name="mcat_passing_year" value="<?php echo htmlspecialchars($student['mcat_passing_year'] ?: '0000'); ?>" class="form-control">
                            </div>

                            <!-- MCAT details -->
                            <div class="col-md-6">
                                <label for="mcatObtainedMarks" class="form-label font-weight-bold">MCAT Obtained Marks</label>
                                <input type="text" id="mcatObtainedMarks" name="mcatObtainedMarks" value="<?php echo htmlspecialchars($student['mcatObtainedMarks'] ?: '0'); ?>" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="mcatTotalMarks" class="form-label font-weight-bold">MCAT Total Marks</label>
                                <input type="text" id="mcatTotalMarks" name="mcatTotalMarks" value="<?php echo htmlspecialchars($student['mcatTotalMarks'] ?: '0'); ?>" class="form-control">
                            </div>
                            <div class="col-md-4" style="display:none;">
                                <input type="text" name="mcatYear" value="<?php echo htmlspecialchars($student['mcatYear'] ?: '0'); ?>">
                            </div>

                            <!-- UCAT details -->
                            <div class="col-md-4">
                                <label for="ucatObtainedMarks" class="form-label font-weight-bold">UCAT Obtained Marks</label>
                                <input type="text" id="ucatObtainedMarks" name="ucatObtainedMarks" value="<?php echo htmlspecialchars($student['ucatObtainedMarks'] ?: '0'); ?>" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="ucatTotalMarks" class="form-label font-weight-bold">UCAT Total Marks</label>
                                <input type="text" id="ucatTotalMarks" name="ucatTotalMarks" value="<?php echo htmlspecialchars($student['ucatTotalMarks'] ?: '0'); ?>" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="ucatYear" class="form-label font-weight-bold">UCAT Year</label>
                                <input type="text" id="ucatYear" name="ucatYear" value="<?php echo htmlspecialchars($student['ucatYear'] ?: '0'); ?>" class="form-control">
                            </div>
                        </div>
                    </div>

                    <!-- Section: Document Uploads Preview -->
                    <div class="mb-5">
                        <div class="d-flex align-items-center gap-2 mb-3 border-bottom pb-2">
                            <i class="fa-solid fa-images text-primary"></i>
                            <h5 class="mb-0 font-weight-bold text-dark">Uploaded Credentials & Documents</h5>
                        </div>
                        
                        <div class="row g-4">
                            <!-- Matric Image -->
                            <div class="col-md-6 col-lg-4">
                                <div class="card h-100 shadow-sm border border-light">
                                    <div class="card-body text-center d-flex flex-column justify-content-between p-3">
                                        <h6 class="card-title font-weight-bold text-muted mb-2">Matric Marksheet</h6>
                                        <?php 
                                        $matric_src = empty($student['matricImage']) ? '../uploads_26to27/documents/avatar.jpg' : '../uploads_26to27/documents/' . $student['cnic'] . '/' . $student['matricImage'];
                                        ?>
                                        <div class="bg-light rounded p-2 mb-3 d-flex align-items-center justify-content-center" style="height: 180px; overflow: hidden;">
                                            <img src="<?php echo $matric_src; ?>" alt="Matric Marksheet" class="img-fluid rounded" style="max-height: 100%; cursor: pointer;" onclick="openImage(this.src);">
                                        </div>
                                        <button type="button" class="btn btn-sm btn-outline-primary w-100" onclick="openImage('<?php echo $matric_src; ?>')">
                                            <i class="fa-solid fa-expand"></i> View Fullscreen
                                        </button>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Fsc Image -->
                            <div class="col-md-6 col-lg-4">
                                <div class="card h-100 shadow-sm border border-light">
                                    <div class="card-body text-center d-flex flex-column justify-content-between p-3">
                                        <h6 class="card-title font-weight-bold text-muted mb-2">F.Sc Marksheet</h6>
                                        <?php 
                                        $fsc_src = empty($student['fscImage']) ? '../uploads_26to27/documents/avatar.jpg' : '../uploads_26to27/documents/' . $student['cnic'] . '/' . $student['fscImage'];
                                        ?>
                                        <div class="bg-light rounded p-2 mb-3 d-flex align-items-center justify-content-center" style="height: 180px; overflow: hidden;">
                                            <img src="<?php echo $fsc_src; ?>" alt="F.Sc Marksheet" class="img-fluid rounded" style="max-height: 100%; cursor: pointer;" onclick="openImage(this.src);">
                                        </div>
                                        <button type="button" class="btn btn-sm btn-outline-primary w-100" onclick="openImage('<?php echo $fsc_src; ?>')">
                                            <i class="fa-solid fa-expand"></i> View Fullscreen
                                        </button>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- CNIC Front -->
                            <div class="col-md-6 col-lg-4">
                                <div class="card h-100 shadow-sm border border-light">
                                    <div class="card-body text-center d-flex flex-column justify-content-between p-3">
                                        <h6 class="card-title font-weight-bold text-muted mb-2">CNIC Front</h6>
                                        <?php 
                                        $cnic_front_src = empty($student['cnicFrontImage']) ? '../uploads_26to27/documents/avatar.jpg' : '../uploads_26to27/documents/' . $student['cnic'] . '/' . $student['cnicFrontImage'];
                                        ?>
                                        <div class="bg-light rounded p-2 mb-3 d-flex align-items-center justify-content-center" style="height: 180px; overflow: hidden;">
                                            <img src="<?php echo $cnic_front_src; ?>" alt="CNIC Front" class="img-fluid rounded" style="max-height: 100%; cursor: pointer;" onclick="openImage(this.src);">
                                        </div>
                                        <button type="button" class="btn btn-sm btn-outline-primary w-100" onclick="openImage('<?php echo $cnic_front_src; ?>')">
                                            <i class="fa-solid fa-expand"></i> View Fullscreen
                                        </button>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- CNIC Back -->
                            <div class="col-md-6 col-lg-4">
                                <div class="card h-100 shadow-sm border border-light">
                                    <div class="card-body text-center d-flex flex-column justify-content-between p-3">
                                        <h6 class="card-title font-weight-bold text-muted mb-2">CNIC Back</h6>
                                        <?php 
                                        $cnic_back_src = empty($student['cnicBackImage']) ? '../uploads_26to27/documents/avatar.jpg' : '../uploads_26to27/documents/' . $student['cnic'] . '/' . $student['cnicBackImage'];
                                        ?>
                                        <div class="bg-light rounded p-2 mb-3 d-flex align-items-center justify-content-center" style="height: 180px; overflow: hidden;">
                                            <img src="<?php echo $cnic_back_src; ?>" alt="CNIC Back" class="img-fluid rounded" style="max-height: 100%; cursor: pointer;" onclick="openImage(this.src);">
                                        </div>
                                        <button type="button" class="btn btn-sm btn-outline-primary w-100" onclick="openImage('<?php echo $cnic_back_src; ?>')">
                                            <i class="fa-solid fa-expand"></i> View Fullscreen
                                        </button>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Entrance Test Image -->
                            <div class="col-md-6 col-lg-4">
                                <div class="card h-100 shadow-sm border border-light">
                                    <div class="card-body text-center d-flex flex-column justify-content-between p-3">
                                        <h6 class="card-title font-weight-bold text-muted mb-2">Entry Test Result</h6>
                                        <?php 
                                        $mdcat_src = empty($student['mdcatImage']) ? '../uploads_26to27/documents/avatar.jpg' : '../uploads_26to27/documents/' . $student['cnic'] . '/' . $student['mdcatImage'];
                                        ?>
                                        <div class="bg-light rounded p-2 mb-3 d-flex align-items-center justify-content-center" style="height: 180px; overflow: hidden;">
                                            <img src="<?php echo $mdcat_src; ?>" alt="Entry Test Result" class="img-fluid rounded" style="max-height: 100%; cursor: pointer;" onclick="openImage(this.src);">
                                        </div>
                                        <button type="button" class="btn btn-sm btn-outline-primary w-100" onclick="openImage('<?php echo $mdcat_src; ?>')">
                                            <i class="fa-solid fa-expand"></i> View Fullscreen
                                        </button>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Passport Image (If Overseas/Foreign) -->
                            <?php if ($student['stdType'] == 'Overseas/Foreign'): ?>
                            <div class="col-md-6 col-lg-4">
                                <div class="card h-100 shadow-sm border border-light">
                                    <div class="card-body text-center d-flex flex-column justify-content-between p-3">
                                        <h6 class="card-title font-weight-bold text-muted mb-2">Passport / Iqama</h6>
                                        <?php 
                                        $passport_src = empty($student['passportIqamaImage']) ? '../uploads_26to27/documents/avatar.jpg' : '../uploads_26to27/documents/' . $student['cnic'] . '/' . $student['passportIqamaImage'];
                                        ?>
                                        <div class="bg-light rounded p-2 mb-3 d-flex align-items-center justify-content-center" style="height: 180px; overflow: hidden;">
                                            <img src="<?php echo $passport_src; ?>" alt="Passport Iqama" class="img-fluid rounded" style="max-height: 100%; cursor: pointer;" onclick="openImage(this.src);">
                                        </div>
                                        <button type="button" class="btn btn-sm btn-outline-primary w-100" onclick="openImage('<?php echo $passport_src; ?>')">
                                            <i class="fa-solid fa-expand"></i> View Fullscreen
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Section: Challan Uploads Preview -->
                    <div class="mb-5">
                        <div class="d-flex align-items-center gap-2 mb-3 border-bottom pb-2">
                            <i class="fa-solid fa-file-invoice-dollar text-primary"></i>
                            <h5 class="mb-0 font-weight-bold text-dark">Uploaded Challans</h5>
                        </div>
                        
                        <div class="row g-4">
                            <!-- MBBS Challan -->
                            <?php if ($student['program'] == 'MBBS' || $student['program'] == 'BOTH'): ?>
                            <div class="col-md-6">
                                <div class="card h-100 shadow-sm border border-light">
                                    <div class="card-body text-center d-flex flex-column justify-content-between p-3">
                                        <h6 class="card-title font-weight-bold text-muted mb-2">MBBS Challan Image</h6>
                                        <?php 
                                        $mbbs_challan_src = empty($student['mbbsChallanImage']) ? '../uploads_26to27/documents/avatar.jpg' : '../uploads_26to27/challans/mbbs/' . $student['cnic'] . '/' . $student['mbbsChallanImage'];
                                        ?>
                                        <div class="bg-light rounded p-2 mb-3 d-flex align-items-center justify-content-center" style="height: 250px; overflow: hidden;">
                                            <img src="<?php echo $mbbs_challan_src; ?>" alt="MBBS Challan" class="img-fluid rounded" style="max-height: 100%; cursor: pointer;" onclick="openImage(this.src);">
                                        </div>
                                        <button type="button" class="btn btn-sm btn-outline-primary w-100" onclick="openImage('<?php echo $mbbs_challan_src; ?>')">
                                            <i class="fa-solid fa-expand"></i> View Fullscreen
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                            
                            <!-- BDS Challan -->
                            <?php if ($student['program'] == 'BDS' || $student['program'] == 'BOTH'): ?>
                            <div class="col-md-6">
                                <div class="card h-100 shadow-sm border border-light">
                                    <div class="card-body text-center d-flex flex-column justify-content-between p-3">
                                        <h6 class="card-title font-weight-bold text-muted mb-2">BDS Challan Image</h6>
                                        <?php 
                                        $bds_challan_src = empty($student['bdsChallanImage']) ? '../uploads_26to27/documents/avatar.jpg' : '../uploads_26to27/challans/bds/' . $student['cnic'] . '/' . $student['bdsChallanImage'];
                                        ?>
                                        <div class="bg-light rounded p-2 mb-3 d-flex align-items-center justify-content-center" style="height: 250px; overflow: hidden;">
                                            <img src="<?php echo $bds_challan_src; ?>" alt="BDS Challan" class="img-fluid rounded" style="max-height: 100%; cursor: pointer;" onclick="openImage(this.src);">
                                        </div>
                                        <button type="button" class="btn btn-sm btn-outline-primary w-100" onclick="openImage('<?php echo $bds_challan_src; ?>')">
                                            <i class="fa-solid fa-expand"></i> View Fullscreen
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Form Submission Button -->
                    <div class="row mt-4 pt-3 border-top">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary px-5 py-2 font-weight-bold"><i class="fa-solid fa-floppy-disk"></i> Update Student Details</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    <script>
    document.addEventListener("DOMContentLoaded", function () {
        var editForm = document.querySelector("form[action='update-backend.php']");
        var errorBox = document.getElementById("adminPhoneErrorBox");

        ['stdPhone', 'fatPhone', 'emergencyPhone'].forEach(function(id) {
            var el = document.getElementById(id);
            if (el) {
                el.addEventListener('input', function() {
                    var std = (document.getElementById("stdPhone") ? document.getElementById("stdPhone").value : '').trim();
                    var fat = (document.getElementById("fatPhone") ? document.getElementById("fatPhone").value : '').trim();
                    var emg = (document.getElementById("emergencyPhone") ? document.getElementById("emergencyPhone").value : '').trim();
                    if (errorBox && !(std !== '' && std === fat && fat === emg)) {
                        errorBox.style.display = "none";
                    }
                });
            }
        });

        if (editForm) {
            editForm.addEventListener("submit", function (e) {
                var std = (document.getElementById("stdPhone") ? document.getElementById("stdPhone").value : '').trim();
                var fat = (document.getElementById("fatPhone") ? document.getElementById("fatPhone").value : '').trim();
                var emg = (document.getElementById("emergencyPhone") ? document.getElementById("emergencyPhone").value : '').trim();

                if (std !== "" && fat !== "" && emg !== "") {
                    if (std === fat && fat === emg) {
                        e.preventDefault();
                        if (errorBox) {
                            errorBox.style.display = "block";
                            errorBox.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        }
                        var emgInput = document.getElementById("emergencyPhone");
                        if (emgInput) emgInput.focus();
                        return false;
                    }
                }
                if (errorBox) {
                    errorBox.style.display = "none";
                }
            });
        }
    });
    </script>

    <?php endif; ?>
</div>

<?php
// Include custom footer layout
include_once('footer.php');
?>