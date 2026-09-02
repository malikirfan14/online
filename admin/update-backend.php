<?php
session_start();
if (!isset($_SESSION['adminName'])) {
    header("Location: adminLogin.php");
    exit();
}

require_once('../configure.php');

// Check connection
if ($conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if (isset($_REQUEST['cnic'])) {
    $cnic = $_REQUEST['cnic'];
    $name = $_REQUEST['name'] ?? '';
    $fname = $_REQUEST['fname'] ?? '';
    $dob = $_REQUEST['dob'] ?? '';
    $stdPhone = $_REQUEST['stdPhone'] ?? '';
    $fatPhone = $_REQUEST['fatPhone'] ?? '';
    $email = $_REQUEST['email'] ?? '';
    $fscmarks = $_REQUEST['fscmarks'] ?? '0';
    $comYear = $_REQUEST['comYear'] ?? '0000';
    $mcat = $_REQUEST['mcat'] ?? '';
    $mcatr = $_REQUEST['mcatr'] ?? '0';
    $mcat_passing_year = $_REQUEST['mcat_passing_year'] ?? '0000';
    $matricMarks = $_REQUEST['matricMarks'] ?? '0';
    $marksOutOf = $_REQUEST['marksOutOf'] ?? '0';
    $fscMarksOutOf = $_REQUEST['fscMarksOutOf'] ?? '0';
    $program = $_REQUEST['program'] ?? '';
    $aggregatePer = $_REQUEST['aggregatePer'] ?? '0';
    $ucatYear = $_REQUEST['ucatYear'] ?? '0';
    $ucatObtainedMarks = $_REQUEST['ucatObtainedMarks'] ?? '0';
    $ucatTotalMarks = $_REQUEST['ucatTotalMarks'] ?? '0';
    $mcatYear = $_REQUEST['mcatYear'] ?? '0';
    $mcatTotalMarks = $_REQUEST['mcatTotalMarks'] ?? '0';
    $mcatObtainedMarks = $_REQUEST['mcatObtainedMarks'] ?? '0';
    $emergencyPhone = $_REQUEST['emergencyPhone'] ?? '';
    $address = $_REQUEST['address'] ?? '';

    // Validation: Check that stdPhone, fatPhone, emergencyPhone are not all identical (at least 2 must be different)
    $cleanStdPhone = trim($stdPhone);
    $cleanFatPhone = trim($fatPhone);
    $cleanEmergencyPhone = trim($emergencyPhone);

    if (!empty($cleanStdPhone) && !empty($cleanFatPhone) && !empty($cleanEmergencyPhone)) {
        if ($cleanStdPhone === $cleanFatPhone && $cleanFatPhone === $cleanEmergencyPhone) {
            echo "<script>alert('Student, Father, and Emergency numbers cannot all be identical. Please provide at least 2 different numbers.'); window.history.back();</script>";
            exit();
        }
    }

    // Prepared statement UPDATE
    $select = "UPDATE `registration_26to27` SET 
            `fname` = ? ,
            `name` = ? ,
            `dob` = ? ,
            `stdPhone` = ?,
            `fatPhone` = ?,
            `email` = ?,
            `fscmarks` = ?,
            `comYear` = ? ,
            `mcat` = ? ,
            `mcatr` = ? ,
            `mcat_passing_year` = ? ,
            `matricMarks` = ? ,
            `marksOutOf` = ? ,
            `fscMarksOutOf` = ? ,
            `program` = ? ,
            `aggregatePer` = ?,
            `ucatYear` = ?,
            `ucatObtainedMarks` = ?,
            `ucatTotalMarks` = ?,
            `mcatYear` = ?,
            `mcatTotalMarks` = ?,
            `mcatObtainedMarks` = ?,
            `emergencyPhone` = ?,
            `address` = ?
            WHERE
            `cnic` = ?";

    if ($stmt = mysqli_prepare($conn, $select)) {
        mysqli_stmt_bind_param($stmt, "sssssssssssssssssssssssss", 
            $fname, 
            $name, 
            $dob, 
            $stdPhone, 
            $fatPhone, 
            $email, 
            $fscmarks, 
            $comYear, 
            $mcat, 
            $mcatr, 
            $mcat_passing_year, 
            $matricMarks, 
            $marksOutOf, 
            $fscMarksOutOf, 
            $program, 
            $aggregatePer, 
            $ucatYear, 
            $ucatObtainedMarks, 
            $ucatTotalMarks, 
            $mcatYear, 
            $mcatTotalMarks, 
            $mcatObtainedMarks, 
            $emergencyPhone, 
            $address, 
            $cnic
        );

        if (mysqli_stmt_execute($stmt)) {
            echo "<script>alert('Record Updated Successfully'); window.location.href='unverified.php';</script>";
        } else {
            echo "ERROR: Failed to update student record. " . mysqli_error($conn);
        }
        mysqli_stmt_close($stmt);
    }
} else {
    echo "<script>window.location.href='unverified.php';</script>";
}
?>