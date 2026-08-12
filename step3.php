<?php
session_start();
if (!isset($_SESSION['logname'])) {
    header("location:studentLogin.php");
}
?>
  <h2>Challan</h2>
<br><br>
<h4 style="text-align:center;color:red;">
  Coming Soon. Please visit after few days.
</h4>