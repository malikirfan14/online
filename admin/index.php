<?php
session_start();

if (isset($_SESSION['adminName'])) {
    header("Location: unverified.php");
    exit();
} else {
    header("Location: login.php");
    exit();
}
?>
