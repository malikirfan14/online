<?php
session_start();

if (!isset($_SESSION['logname'])) {
  header("location:studentLogin.php");
}

$query = "SELECT * FROM `student_reg_24to25` WHERE `cnic` = '$logname'";

$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {

  while ($row = mysqli_fetch_array($result)) {

    ?>

    <br>
    <div class="container-fluid">
      <h2>
        <?php echo $row['name'] ?>
      </h2>
    <?php }
} ?>
  <br>
  <p>
    You registered through online portal for session 2024-25.
  </p>
  <p>
    Centralized Admission Policy is announced by University of Health Sciences (UHS).
  </p>
  <p>
    All students are required to apply separately for MBBS & BDS programs at UHS portal (<a
      href="https://www.uhs.edu.pk/" target="_blank">www.uhs.edu.pk</a>) on or before
    <b>31st October, 2024</b>.
  </p>
  <p>
    <b>Please note:</b> Applying at UHS portal is compulsory for admission in Punjab Medical & Dental Colleges.
  </p>

    <a href="https://private.uhs.edu.pk/" target="_blank">
        <img src='img/UHS_Private_Admission_3.jpg' style="width:100%; margin-top:30px" alt="uhs">
    </a>
    <a href="https://private.uhs.edu.pk/" target="_blank">
    <img src='img/UHS_Private_Admission_1.jpg' style="width:100%; margin-top:30px" alt="uhs">
  </a>
    <a href="https://private.uhs.edu.pk/" target="_blank">
    <img src='img/UHS_Private_Admission_2.jpg' style="width:100%; margin-top:50px" alt="uhs">
  </a>



</div>