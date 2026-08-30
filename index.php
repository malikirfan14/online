<?php
session_start();

if (!isset($_SESSION['logname'])) {
    header("Location: login.php");
    exit();
} else {
    header("Location: registration.php");
    exit();
}
?>
