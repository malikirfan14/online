<?php

error_reporting(0);

session_start();



// $_SESSION['logname'] = $_REQUEST['logname'];





// $_SESSION['name'] ; $_REQUEST['name'];

// $_SESSION['fname'] = $_REQUEST['fname'];

// $_SESSION['mcat'] = $_REQUEST['mcat'];





// $_SESSION['appId'] =  mt_rand(100000,999999)+120025;

$_SESSION['appId'] ="";

require('configure.php');

// Check connection

if ($conn === false) {

  die("ERROR: Could not connect. " . mysqli_connect_error());

} else {

  $selectId = "SELECT `appId` FROM `registration_24to25` ORDER BY `id` DESC LIMIT 1";

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

  

  }



  if (

    isset($_REQUEST['name']) && isset($_REQUEST['fname']) && isset($_REQUEST['stdPhone']) && isset($_REQUEST['fatPhone']) && isset($_REQUEST['city'])

    && isset($_REQUEST['email']) && isset($_REQUEST['fscStatus'])  && isset($_REQUEST['mcat']) && isset($_SESSION['appId']) && isset($_REQUEST['cnic']) && isset($_REQUEST['program'])

    && isset($_REQUEST['dob']) && isset($_REQUEST['cnic_issue_date']) && isset($_REQUEST['mcat_passing_year'])

  ) {

// echo $_SESSION['appId'];

// exit(0);

    // echo "Here i am";

    $session = "2024-2025";

    $name =  $_REQUEST['name'];

    $fname = $_REQUEST['fname'];

    $stdPhone =  $_REQUEST['stdPhone'];

    $fatPhone =  $_REQUEST['fatPhone'];

    $city = $_REQUEST['city'];

    $email = $_REQUEST['email'];

    $fscStatus = $_REQUEST['fscStatus'];

    $comYear = $_REQUEST['comYear'];

    $fscmarks =  $_REQUEST['fscmarks'];

    $matricMarks =  $_REQUEST['matricMarks'];

    $marksOutOf = $_REQUEST['marksOutOf'];

    $comYear =  $_REQUEST['comYear'];

    $mcat = $_REQUEST['mcat'];

    $mcatr = $_REQUEST['mcatr'];

    $program = $_REQUEST['program'];

    $appId = $_SESSION['appId'];

    $cnic = $_REQUEST['cnic'];

    $dob = $_REQUEST['dob'];

    $cnic_issue_date = $_REQUEST['cnic_issue_date'];

    $mcat_passing_year = $_REQUEST['mcat_passing_year'];

    // 	 $dueDate = date('d-m-Y',strtotime('+15 day'));

    $issueDate = date(" d-m-Y ");

    $dueDate = "03-12-2021";

    

    

    $passIqamaNo = $_REQUEST['passIqamaNo'];

    $instituteName = $_REQUEST['instituteName'];

    $instituteCity = $_REQUEST['instituteCity'];

    $residentialCountry = $_REQUEST['residentialCountry'];

    $visaStatus = $_REQUEST['visaStatus'];

    

    

    $physics =  $_REQUEST['physics'];

    $chemistry =  $_REQUEST['chemistry'];

    $biology = $_REQUEST['biology'];

    $stdType = $_REQUEST['stdType'];

    

        $mdPer = $mcatr * 50 / 200;

        $fscPer = $fscmarks * 40 / 1100;

        // $matricPer = $matricMarks * 10 / 1100;

        $matricPer = $matricMarks * 10 / $marksOutOf;

    //  $total = $mdPer + $fscPer + $matricPer;        

        $aggregatePer = $matricPer+$fscPer+$mdPer;

        

        $aggregatePer = round($aggregatePer , 3);

    //  $aggregatePer  = $total * 100 / 1100;



    // 	echo $stdPhone;



    $submitDate = date('m/d/Y h:i:s a', time());





    $select = "SELECT * FROM `registration_24to25` WHERE cnic = '$cnic' AND program = 'BOTH' ";

    $result = mysqli_query($conn, $select);

    if ($result->num_rows > 0) {

      echo "<script>alert('You have already registered against this cnic, go and get your challan form');

        window.location.href='http://www.watim.com.pk';</script>";

    } else {

// echo "Me 2";



      $sql = "INSERT INTO `registration_24to25`

       ( name, fname, stdPhone, fatPhone, city,

       email, fscStatus, fscmarks, matricMarks, marksOutOf, physics , chemistry , biology, comYear, mcat,

        mcatr, program, appId, cnic, dob,

        cnic_issue_date, mcat_passing_year, issueDate, dueDate , aggregatePer, stdType, passIqamaNo, instituteName, instituteCity, residentialCountry, visaStatus)

      VALUES 



      ( '$name', '$fname','$stdPhone', '$fatPhone', '$city',

      '$email', '$fscStatus','$fscmarks', '$matricMarks', '$marksOutOf', '$physics' , '$chemistry', '$biology', '$comYear','$mcat',

      '$mcatr', '$program','$appId', '$cnic',  '$dob',  

      '$cnic_issue_date', '$mcat_passing_year', '$issueDate', '$dueDate', '$aggregatePer' ,'$stdType', '$passIqamaNo', '$instituteName', '$instituteCity', '$residentialCountry', '$visaStatus')";







      //   	 $sql = "INSERT INTO `registration_24to25` (name, fname, stdPhone, fatPhone, city, email, fscStatus, fscmarks, comYear, mcat, program)

      //   VALUES ('$name', 

      //     '$fname','$stdPhone', '$fatPhone', '$city','$email', '$fscStatus','$fscmarks','$comYear','$mcat','$program')";





      if (mysqli_query($conn, $sql)) {



    

        echo "<script> window.location.href='studentProfile.php';</script>";



      }

    }

  } else {

    echo "ERROR: Hush! Sorry fill all required fields ";

    //   echo "ERROR: Hush! Sorry fill all required fields $sql. " . mysqli_error($conn);



    // Close connection

    // mysqli_close($conn);

  }

}



?>