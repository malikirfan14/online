<?php



session_start();



$_SESSION['logname'] = $_REQUEST['logname'];

$_SESSION['fname'] = $_REQUEST['fname'];

$_SESSION['password'] = $_REQUEST['password'];

// $_SESSION['appId'] =  mt_rand(100000,999999)+120025;

$_SESSION['regNo'] = "";

$fregNo ="";

require('configure.php');


  // Check connection

  if($conn === false)

  {

      die("ERROR: Could not connect. " . mysqli_connect_error());

  }

  else

  {

       

     

         $selectId = "SELECT `regNo` FROM `student_reg_26to27` ORDER BY `stdId` DESC LIMIT 1";

         $result=mysqli_query($conn,$selectId);

         if(mysqli_num_rows($result) > 0)

         {

            while($row = mysqli_fetch_array($result))

            {

                    // echo $row['appId'];

                    $fregNo = $row['regNo'] + 1;

                    // echo $fappId;

                    $_SESSION['regNo'] = $fregNo;

                    // echo $_SESSION['appId'];

                }

                

        }
        else {
          $fregNo = 1;
          $_SESSION['regNo'] = $fregNo;
        }

    

    

  	if(isset($_REQUEST['logname']) && isset($_REQUEST['fname']) && isset($_REQUEST['stdPhone']) && isset($_REQUEST['email']) && isset($_REQUEST['password'])  && isset($_REQUEST['cnic']))

  	{

  	   

      $name =  $_REQUEST['logname'];

      $fname = $_REQUEST['fname'];

      $stdPhone=  $_REQUEST['stdPhone'];

     $cnic = $_REQUEST['cnic'];

     $cnic =  substr($cnic, 0, 5).'-'.substr($cnic, 5, 7).'-'.substr($cnic, 12, 13);

      $email = $_REQUEST['email'];

     

      $password = $_REQUEST['password'];

    

      $fregNo = $_SESSION['regNo'];

    // $appId = $fappId;

    



    //  $submitDate = date('m/d/Y h:i:s a', time());

    $select = "SELECT * FROM student_reg_26to27 WHERE cnic = '$cnic' OR email = '$email'";

    $result=mysqli_query($conn,$select);

  //  print_r($result);

      if ($result->num_rows > 0)
      {
         header("Location: register.php?error=already_registered");
         echo "<script>window.location.href='register.php?error=already_registered';</script>";
         exit();
      }
      else
      {
          $sql = "INSERT INTO student_reg_26to27 (name, fname, stdPhone, cnic, email, password, regNo)  VALUES ('$name', 
          '$fname','$stdPhone', '$cnic', '$email','$password','$fregNo')";

            if(mysqli_query($conn, $sql))
            {
              $from = 'admissions26-27@watim.com.pk'; //Sender
              $to = $email; // Receiver
              $subject = 'WATIM MEDICAL & DENTAL COLLEGE';
              $message =  $name ."\r\n"."\r\n". 'Thankyou for your Online Registration in "WATIM Medical & Dental College, Rawalpindi"'. "\r\n". "\r\n" .
              'User Name (CNIC): '. $cnic. "\r\n". "\r\n". 'Password: '. $_REQUEST['password']. "\r\n". "\r\n".
              'In case of any query related admissions contact admission office: '."\r\n"."\r\n".
              'In-Charge Admissions'."\r\n".'Mobile / Whatsapp : 0316-8766996'."\r\n".'Landline : 051-3757575'."\r\n";
              $headers = "From:" . $from;

              mail($to, $subject, $message, $headers);

              header("Location: login.php?success=registered");
              echo "<script>window.location.href='login.php?success=registered';</script>";
              exit();
          }
      }
  }
  else
  {
      header("Location: register.php?error=missing_fields");
      echo "<script>window.location.href='register.php?error=missing_fields';</script>";
      exit();
  }
}

?>