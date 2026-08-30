<?php
session_start();
unset($_SESSION['adminName']);
session_destroy();
header("Location: login.php");
exit();
?>
