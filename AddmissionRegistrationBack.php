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


  $selectId = "SELECT `appId` FROM `registration_26to27` ORDER BY `id` DESC LIMIT 1";

  $result = mysqli_query($conn, $selectId);

  if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_array($result)) {

      // echo $row['appId'];

      $fappId =   $row['appId'] + 1;

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

    isset($_REQUEST['name']) && isset($_REQUEST['fname']) && isset($_REQUEST['stdPhone']) && isset($_REQUEST['fatPhone'])

    && isset($_REQUEST['city']) && isset($_REQUEST['email']) && isset($_SESSION['appId']) && isset($_REQUEST['cnic'])

    && isset($_REQUEST['dob']) && isset($_REQUEST['cnic_issue_date']) && isset($_REQUEST['address']) && isset($_REQUEST['emergencyPhone'])

  ) {




    //echo $_SESSION['appId'];

    // exit(0);



    $session = "2026-2027";

    $name = $_REQUEST['name'];

    $fname = $_REQUEST['fname'];

    $stdPhone = $_REQUEST['stdPhone'];

    $fatPhone = $_REQUEST['fatPhone'];

    $city = $_REQUEST['city'];

    $email = $_REQUEST['email'];

    $address = $_REQUEST['address'];

    $emergencyPhone = $_REQUEST['emergencyPhone'];

    $program = $_REQUEST['program'];

    $appId = $_SESSION['appId'];

    $cnic = $_REQUEST['cnic'];

    $dob = $_REQUEST['dob'];

    $cnic_issue_date = $_REQUEST['cnic_issue_date'];

    $stdType = $_REQUEST['stdType'];

    $gender = $_REQUEST['gender'];
    // 	 $dueDate = date('d-m-Y',strtotime('+15 day'));

    $issueDate = date(" d-m-Y ");

    $dueDate = "03-12-2024";
    // 	echo $stdPhone;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (!empty($_FILES["profilePicture"]["name"])) {
        $folderName = "uploads_26to27/profiles/" . $cnic;
        if (!file_exists($folderName)) {
          mkdir($folderName, 0777, true);
        }

        

        $targetDir = $folderName . '/';
        $targetFile = $targetDir . basename($_FILES["profilePicture"]["name"]);

        if (move_uploaded_file($_FILES["profilePicture"]["tmp_name"], $targetFile)) {
          //echo "Registration successful! Profile picture uploaded.";
        } else {
          //echo "Sorry, there was an error uploading your file.";
        }
      }
    }

    $select = "SELECT * FROM `registration_26to27` WHERE cnic = '$cnic' ";

    $result = mysqli_query($conn, $select);

    

    if ($result->num_rows > 0) {
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
      
      $sql = "UPDATE `registration_26to27`  SET     
      `stdPhone`='$stdPhone', 
      `cnic_issue_date`='$cnic_issue_date',      
      `fatPhone`='$fatPhone',
      `emergencyPhone`='$emergencyPhone', 
      `dob`='$dob',
      `address` = '$address',
      `city`='$city',
      `gender`='$gender'";
         
      if (!empty($_FILES["profilePicture"]["name"])) {
        $newProfilePicture = basename($_FILES["profilePicture"]["name"]);
        $sql .= ", `profilePicture`='$newProfilePicture'";          
      }

      if ($row['stdType'] != $stdType) {
        $sql .= ", `stdType`='$stdType', `isEducationDone`=0, `isDocumentsDone`=0, `isChallanDone`=0";  
      }

      if ($row['program'] !=$program) {
        $sql .= ", `program`='$program', `isChallanDone`=0";  
      }
      $sql .= " WHERE `cnic` = '$cnic'";
   
    } else {

      if (!empty($_FILES["profilePicture"]["name"])) {
        $profilePicture = basename($_FILES["profilePicture"]["name"]);
       
        // Add the profile picture to the SQL query
        $sql = "INSERT INTO `registration_26to27`
                (name, fname, stdPhone, fatPhone, city, email, program, appId, cnic, dob,
                cnic_issue_date, address, issueDate, dueDate, emergencyPhone, stdType, isPersonalInfoDone, profilePicture,gender)
                VALUES
                ('$name', '$fname', '$stdPhone', '$fatPhone', '$city', '$email', '$program', '$appId', '$cnic', '$dob',
                '$cnic_issue_date', '$address', '$issueDate', '$dueDate', '$emergencyPhone', '$stdType', 1, '$profilePicture','$gender')";
      } else {
        // If no file was uploaded, omit the profilePicture field from the query
        $sql = "INSERT INTO `registration_26to27`
                (name, fname, stdPhone, fatPhone, city, email, program, appId, cnic, dob,
                cnic_issue_date, address, issueDate, dueDate, emergencyPhone, stdType, isPersonalInfoDone,gender)
                VALUES
                ('$name', '$fname', '$stdPhone', '$fatPhone', '$city', '$email', '$program', '$appId', '$cnic', '$dob',
                '$cnic_issue_date', '$address', '$issueDate', '$dueDate', '$emergencyPhone', '$stdType', 1,,'$gender')";
      }

    }

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

      // $message = $_REQUEST['name'] . "\r\n" . "\r\n" . 'Thankyou for your Online Registration for Session 2026-27 at "WATIM Medical & Dental College Rawalpindi"' . "\r\n" .

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



  } else {

    echo "ERROR: Hush! Sorry fill all required fields ";

    //   echo "ERROR: Hush! Sorry fill all required fields $sql. " . mysqli_error($conn);



    // Close connection

    // mysqli_close($conn);

  }

}



?>