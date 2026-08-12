<?php
if(!isset($_SESSION['logname']))
{
    session_start();
        session_destroy();
            echo "<script> window.location.href='http://www.watim.com.pk';</script>";
}

if(isset($_SESSION['logname'])){
    //session_start();
        //session_destroy();
           echo "<script> window.location.href='http://www.watim.com.pk';</script>";
}
?>
<!--alert('Not a logged in user');-->
<!--alert('Successfully Logout');-->