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

if (isset($_REQUEST['cnic']) && isset($_REQUEST['id'])) {
    $cnic = $_REQUEST['cnic'];
    $id = $_REQUEST['id'];

    // Secure DELETE using prepared statement
    $select = "DELETE FROM `registration_26to27` WHERE `cnic` = ? AND `id` = ?";
    if ($stmt = mysqli_prepare($conn, $select)) {
        mysqli_stmt_bind_param($stmt, "ss", $cnic, $id);
        
        if (mysqli_stmt_execute($stmt)) {
            echo "<script>alert('Record Deleted'); window.location.href='pending.php';</script>";
        } else {
            echo "ERROR: Could not complete deletion request. " . mysqli_error($conn);
        }
        mysqli_stmt_close($stmt);
    }
} else {
    echo "<script>window.location.href='pending.php';</script>";
}
?>