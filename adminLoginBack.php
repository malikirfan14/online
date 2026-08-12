<?php

ob_start();
session_start();

// echo "Hello";
// die();
// $_SESSION['appId'] =  mt_rand(100000,999999)+120025;

$fregNo = "";
require('configure.php');
// Check connection
if ($conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
} else {


    if (isset($_REQUEST['adminName']) && isset($_REQUEST['password'])) {

        $adminName =  $_REQUEST['adminName'];
// echo "I AM HERE " . $adminName;
// die();

        $password = $_REQUEST['password'];

        $select = "SELECT * FROM admin WHERE `name` = '$adminName'   AND `password` = '$password' LIMIT 1";

        $result = mysqli_query($conn, $select);


        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        $count = mysqli_num_rows($result);

        if ($count == 1) {
            $_SESSION['adminName'] = $_REQUEST['adminName'];


// echo "I AM HERE ";
// die();
            echo "<script>
          window.location.href='adminFetch.php';</script>";
        } else{

            echo "<script>alert('Login Failed! Please make sure that you enter the correct details');
        window.location.href='adminLogin.php';</script>";
        } 
    } 
}
