<?php

error_reporting(0);

session_start();



// $_SESSION['logname'] = $_REQUEST['logname'];





// $_SESSION['name'] ; $_REQUEST['name'];

// $_SESSION['fname'] = $_REQUEST['fname'];

// $_SESSION['mcat'] = $_REQUEST['mcat'];





// $_SESSION['appId'] =  mt_rand(100000,999999)+120025;

$_SESSION['appId'] = "";

require('configure.php');

// Check connection

if ($conn === false) {

  die("ERROR: Could not connect. " . mysqli_connect_error());

} else {

if (isset($_GET['action']) && $_GET['action'] == 'fetch_uhs') {

    $uhs_application_id = mysqli_real_escape_string($conn, $_GET['uhs_application_id']);

    $query = "SELECT name, father_name, aggregate, district
              FROM uhs_students_25to26
              WHERE application_id = '$uhs_application_id'
              LIMIT 1";

    $res = mysqli_query($conn, $query);

    if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);

        echo json_encode([
            'status' => 'success',
            'data' => $row
        ]);
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => 'No record found for this UHS Application ID.'
        ]);
    }
    exit;
}




  $selectId = "SELECT `appId` FROM `registration_25to26` ORDER BY `id` DESC LIMIT 1";

  $result = mysqli_query($conn, $selectId);

  if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_array($result)) {

      // echo $row['appId'];

      $fappId = $row['appId'] + 1;

      // echo $fappId;

      $_SESSION['appId'] = $fappId;

      // $appId = $fappId;

      // echo $_SESSION['appId'];

    }
  } else {
    $fappId = 1;
    $_SESSION['appId'] = $fappId;
  }



  // if (

  //   isset($_REQUEST['name']) && isset($_REQUEST['fname']) && isset($_REQUEST['stdPhone']) && isset($_REQUEST['fatPhone']) && isset($_REQUEST['city'])

  //   && isset($_REQUEST['email']) && isset($_REQUEST['fscStatus'])  && isset($_REQUEST['mcat']) && isset($_SESSION['appId']) && isset($_REQUEST['cnic']) && isset($_REQUEST['program'])

  //   && isset($_REQUEST['dob']) && isset($_REQUEST['cnic_issue_date']) && isset($_REQUEST['mcat_passing_year'])

  // ) {

  if (


    isset($_REQUEST['fscStatus']) && isset($_REQUEST['mcat']) && isset($_SESSION['appId'])

    && isset($_REQUEST['mcat_passing_year'])

  ) {




    //echo $_SESSION['appId'];

    // exit(0);



    $session = "2025-2026";



    $fscStatus = $_REQUEST['fscStatus'];

    $comYear = $_REQUEST['comYear'];

    $fscmarks = $_REQUEST['fscmarks'] != '' ? $_REQUEST['fscmarks'] : 0;

    $matricMarks = $_REQUEST['matricMarks'];

    $marksOutOf = $_REQUEST['marksOutOf'];

    $fscMarksOutOf = $_REQUEST['fscMarksOutOf'];

    $mcat = $_REQUEST['mcat'] != '' ? $_REQUEST['mcat'] : '0';

    $mcatr = $_REQUEST['mcatr'];
    $mcat_passing_year = $_REQUEST['mcat_passing_year'];
    $testType = $_REQUEST['testType'] != '' ? $_REQUEST['testType'] : 'MDCAT';

    $ucatYear = $_REQUEST['ucatYear'] != '' ? $_REQUEST['ucatYear'] : 0000;
    $ucatObtainedMarks = $_REQUEST['ucatObtainedMarks'] != '' ? $_REQUEST['ucatObtainedMarks'] : 0;
    $ucatTotalMarks = $_REQUEST['ucatTotalMarks'] != '' ? $_REQUEST['ucatTotalMarks'] : 0;

    $mcatYear = $_REQUEST['mcatYear'] != '' ? $_REQUEST['mcatYear'] : 0000;
    $mcatObtainedMarks = $_REQUEST['mcatObtainedMarks'] != '' ? $_REQUEST['mcatObtainedMarks'] : 0;
    $mcatTotalMarks = $_REQUEST['mcatTotalMarks'] != '' ? $_REQUEST['mcatTotalMarks'] : 0;

    
    $uhs_application_id = isset($_REQUEST['uhs_application_id']) && $_REQUEST['uhs_application_id'] !== '' ? $_REQUEST['uhs_application_id'] : null;
    $uhs_college = isset($_REQUEST['uhs_college']) && $_REQUEST['uhs_college'] !== '' ? $_REQUEST['uhs_college'] : null;
    //$uhs_college = $_REQUEST['uhs_college'];


    $appId = $_SESSION['appId'];

    //$mcat_passing_year = $_REQUEST['mcat_passing_year'] != '' ? $_REQUEST['mcat_passing_year'] : '0000';





    // 	 $dueDate = date('d-m-Y',strtotime('+15 day'));

    $issueDate = date(" d-m-Y ");

    $dueDate = "03-12-2021";





    $passIqamaNo = $_REQUEST['passIqamaNo'];

    $instituteName = $_REQUEST['instituteName'];

    $instituteCity = $_REQUEST['instituteCity'];

    $residentialCountry = $_REQUEST['residentialCountry'];

    $visaStatus = $_REQUEST['visaStatus'];

    $physics = $_REQUEST['physics'] != '' ? $_REQUEST['physics'] : 0;

    $chemistry = $_REQUEST['chemistry'] != '' ? $_REQUEST['chemistry'] : 0;

    $biology = $_REQUEST['biology'] != '' ? $_REQUEST['biology'] : 0;

    $stdType = $_REQUEST['stdType'];

    $matricPer = $matricMarks * 10 / $marksOutOf;
    $aggregatePer = $matricPer;




    if ($mcatr && $testType == 'MDCAT' && $mcat_passing_year == 2025) {
      $mdPer = $mcatr * 50 / 180;
      $aggregatePer = $aggregatePer + $mdPer;
    }
    if ($mcatr && $testType == 'MDCAT' && $mcat_passing_year == 2024 || $mcat_passing_year == 2023 || $mcat_passing_year == 2022) {
      $mdPer = $mcatr * 50 / 200;
      $aggregatePer = $aggregatePer + $mdPer;
    }

    if ($ucatObtainedMarks && $testType == 'UCAT') {
      $ucatPer = $ucatObtainedMarks * 50 / $ucatTotalMarks;
      $aggregatePer = $aggregatePer + $ucatPer;
    }

    if ($mcatObtainedMarks && $testType == 'MCAT') {
      $mcatPer = $mcatObtainedMarks * 50 / $mcatTotalMarks;
      $aggregatePer = $aggregatePer + $mcatPer;
    }



    if ($fscmarks && $fscmarks != 0) {
      $fscPer = $fscmarks * 40 / $fscMarksOutOf;
      $aggregatePer = $aggregatePer + $fscPer;
    }
    // $matricPer = $matricMarks * 10 / 1100;


    //  $total = $mdPer + $fscPer + $matricPer;        


    $aggregatePer = round($aggregatePer, 3);

    //  $aggregatePer  = $total * 100 / 1100;



    // 	echo $stdPhone;



    $submitDate = date('m/d/Y h:i:s a', time());


    $cnic = $_SESSION['logname'];


    $sql = "UPDATE `registration_25to26`  SET 

`fscStatus`='$fscStatus',

`fscmarks`='$fscmarks',

`matricMarks`='$matricMarks',

`marksOutOf`='$marksOutOf', 

`fscMarksOutOf`='$fscMarksOutOf',

`biology` = '$biology',

`chemistry` = '$chemistry',

`physics` = '$physics',

`comYear` ='$comYear',

`mcat` = '$mcat',

`mcatr` = '$mcatr',

`mcat_passing_year` = '$mcat_passing_year',

`testType` = '$testType',

`ucatYear` = '$ucatYear',
`ucatObtainedMarks` = '$ucatObtainedMarks',
`ucatTotalMarks` = '$ucatTotalMarks',

`mcatYear` = '$mcatYear',
`mcatObtainedMarks` = '$mcatObtainedMarks',
`mcatTotalMarks` = '$mcatTotalMarks',

`aggregatePer` = '$aggregatePer',

`passIqamaNo` = '$passIqamaNo',
`instituteName` = '$instituteName',
`instituteCity` = '$instituteCity',
`residentialCountry` = '$residentialCountry',
`visaStatus` = '$visaStatus',
`uhs_application_id` = " . ($uhs_application_id !== null ? "'$uhs_application_id'" : "NULL") . ",
`uhs_college` = " . ($uhs_college !== null ? "'$uhs_college'" : "NULL") . ",
`isEducationDone`= 1

 WHERE `cnic`='$cnic'";


    //   	 $sql = "INSERT INTO `registration_24to25` (name, fname, stdPhone, fatPhone, city, email, fscStatus, fscmarks, comYear, mcat, program)

    //   VALUES ('$name', 

    //     '$fname','$stdPhone', '$fatPhone', '$city','$email', '$fscStatus','$fscmarks','$comYear','$mcat','$program')";





    if (mysqli_query($conn, $sql)) {

      // echo "I dO";

      ?>

      <!-- <html>

      <button> -->

      <?php

      // echo"<a href='multipleUpload.php?name=$name & program = $program & appId = $appId'> Upload Documents</a>";

      ?>

      <!-- </button>

    </html> -->



      <?php

      // $from = 'admissions@watim.com.pk'; //Sender

      // $to = $email; // Receiver

      // $subject = 'WATIM MEDICAL & DENTAL COLLEGE';

      // $message = $_REQUEST['name'] . "\r\n" . "\r\n" . 'Thankyou for your Online Registration for Session 2024-25 at "WATIM Medical & Dental College Rawalpindi"' . "\r\n" .

      //   'Your application id is : ' . $_SESSION['appId'] . "\r\n" .

      //   'Please click on the given link to download application form : "https://watim.com.pk/downloads/MBBS_Application_Form.pdf"' . "\r\n" . "\r\n" .

      //   'In case of any query related admissions contact admission office: ' . "\r\n" . "\r\n" .

      //   'In-Charge Admissions' . "\r\n" . 'Mobile / Whatsapp : 0316-8766996' . "\r\n" . 'Landline : 051-3757575' . "\r\n";



      // $message2 = 'For further details contact admission office';

      // $headers = "From:" . $from;



      // Sending email

      // if (mail($to, $subject, $message, $headers)) {

      // echo 'Your mail has been sent successfully.';

      // } else {

      //   echo 'Unable to send email. Please try again.';

      // }

      echo "<script> window.location.href='registration.php';</script>";

      // echo $program;

      // exit(0);

      // if($program == "BDS")

      // {

      //     echo "<script>alert('FORM SUBMITTED SUCCESSFULLY CHECK YOUR MAIL');

      //     window.location.href='Dentalchallan.php';</script>";

      // }

      // else if($program == "MBBS")

      // {

      //     echo "<script>alert('FORM SUBMITTED SUCCESSFULLY CHECK YOUR MAIL');

      //     window.location.href='Medchallan.php';</script>";

      // }





      // echo "fORM SUBMITTED SUCCESSFULLY";

      // sleep(2);

      // header("Location: Medchallan.php");

    }

    //}

  } else {

    echo "ERROR: Hush! Sorry fill all required fields ";

    //   echo "ERROR: Hush! Sorry fill all required fields $sql. " . mysqli_error($conn);



    // Close connection

    // mysqli_close($conn);

  }

}



?>