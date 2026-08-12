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

       

     

         $selectId = "SELECT `regNo` FROM `student_reg_25to26` ORDER BY `stdId` DESC LIMIT 1";

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

    $select = "SELECT * FROM student_reg_25to26 WHERE cnic = '$cnic' OR email = '$email'";

    $result=mysqli_query($conn,$select);

  //  print_r($result);

      if ($result->num_rows > 0)

      {

         echo "<script>alert('You have already registered against this cnic OR email, go and login');

          window.location.href='register.php';</script>";

      }

      else

      {

          $sql = "INSERT INTO student_reg_25to26 (name, fname, stdPhone, cnic, email, password, regNo)  VALUES ('$name', 

          '$fname','$stdPhone', '$cnic', '$email','$password','$fregNo')";

        

      

        

              //   	 $sql = "INSERT INTO `registration_24to25` (name, fname, stdPhone, fatPhone, city, email, fscStatus, fscmarks, comYear, mcat, program)

              //   VALUES ('$name', 

              //     '$fname','$stdPhone', '$fatPhone', '$city','$email', '$fscStatus','$fscmarks','$comYear','$mcat','$program')";


    

          

            if(mysqli_query($conn, $sql))

            {

            

                 echo "<h3>data stored in a database successfully.</h3>"; 

                //     . " Please browse your localhost php my admin" 

                //     . " to view the updated data</h3>"; 

              //   echo nl2br("\n$name\n $fname\n "

              //       . "$stdPhone\n $city\n $email \n "

              //       . "$fatPhone\n $fscStatus\n $program"

              //       . "$fscmarks\n $mcat\n $program");

              //   header('Content-Type: application/json');

              

              

              $from = 'admissions25-26@watim.com.pk'; //Sender

              $to = $email; // Receiver

              $subject = 'WATIM MEDICAL & DENTAL COLLEGE';

              $message =  $name ."\r\n"."\r\n". 'Thankyou for your Online Registration in "WATIM Medical & Dental College, Rawalpindi"'. "\r\n". "\r\n" .

              //   'Your registration No is : '. $_SESSION['regNo']. "\r\n" .

              'User Name (CNIC): '. $cnic. "\r\n". "\r\n". 'Password: '. $_REQUEST['password']. "\r\n". "\r\n".

              'In case of any query related admissions contact admission office: '."\r\n"."\r\n".

              'In-Charge Admissions'."\r\n".'Mobile / Whatsapp : 0316-8766996'."\r\n".'Landline : 051-3757575'."\r\n";

              $message2 = 'For further details contact admission office'; 

              $headers = "From:" . $from;

          

              // Sending email

              if(mail($to, $subject, $message, $headers))

              {

                  // echo 'Your mail has been sent successfully.';

              }

              else

              {

                  echo 'Unable to send email. Please try again.';

              }

              

                  echo "<script>alert('Pre-Registaration Form Submitted, For Login Details Check Your Email.');

                  window.location.href='login.php';</script>";

                      // echo "fORM SUBMITTED SUCCESSFULLY";

                      // sleep(2);

                      // header("Location: Dentalchallan.php");

          }

    

      }

  }



else

  {

      echo "ERROR: Hush! Sorry fill all required fields ";



}



  }

?>