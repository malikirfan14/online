<?php



ob_start();

session_start();





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

       

     

  	if(isset($_REQUEST['logname']) && isset($_REQUEST['password']))

  	{

  	   

      $record =  $_REQUEST['logname'];

     

     

      $password = $_REQUEST['password'];

    

    // $appId = $fappId;

    



    //  $submitDate = date('m/d/Y h:i:s a', time());

    $select = "SELECT * FROM student_reg_26to27 WHERE `cnic` = '$record'   AND `password` = '$password' LIMIT 1" ;

    //echo $record;

    //echo $password;

    // exit(0);

    $result=mysqli_query($conn,$select);

  //  print_r($result);

  

  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  

  

  $count = mysqli_num_rows($result);  

  // echo $count;

//   exit(0);

      if ($count == 1)

      {

          $_SESSION['logname'] = $_REQUEST['logname'];



          // echo "I came ";

          // exit(0);

          $selectd = "SELECT * FROM `registration_26to27` WHERE `cnic` = '$record'" ;

          // echo $record;

          // echo $password;

          // exit(0);

          $result=mysqli_query($conn,$selectd);

        

        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  

        

        $get = mysqli_num_rows($result);  

        if($get == 0)

        {

          echo "<script>

          window.location.href='registration.php';</script>";

        }

  

        else if($get == 1)

        {

          echo "<script>

           window.location.href='registration.php';</script>";



        // window.location.href='profile.php';</script>";

 



        }

        }

      else if($count == 0)
      {
          header("Location: login.php?error=login_failed");
          echo "<script>window.location.href='login.php?error=login_failed';</script>";
          exit();
      }
      else
      {
          header("Location: login.php?error=missing_fields");
          echo "<script>window.location.href='login.php?error=missing_fields';</script>";
          exit();
      }



    //   else

    //   {

    //       $sql = "INSERT INTO student_reg_26to27 (name, fname, stdPhone, cnic, email, password, regNo)  VALUES ('$name', 

    //       '$fname','$stdPhone', '$cnic', '$email','$password','$fregNo')";

        

      

        

    //           //   	 $sql = "INSERT INTO `registration_26to27` (name, fname, stdPhone, fatPhone, city, email, fscStatus, fscmarks, comYear, mcat, program)

    //           //   VALUES ('$name', 

    //           //     '$fname','$stdPhone', '$fatPhone', '$city','$email', '$fscStatus','$fscmarks','$comYear','$mcat','$program')";

                

          

    //         if(mysqli_query($conn, $sql))

    //         {

            

    //             // echo "<h3>data stored in a database successfully." 

    //             //     . " Please browse your localhost php my admin" 

    //             //     . " to view the updated data</h3>"; 

          

    //           //   echo nl2br("\n$name\n $fname\n "

    //           //       . "$stdPhone\n $city\n $email \n "

    //           //       . "$fatPhone\n $fscStatus\n $program"

    //           //       . "$fscmarks\n $mcat\n $program");

                

    //           //   header('Content-Type: application/json');

              

              

    //           $from = 'admissions@watim.com.pk'; //Sender

    //           $to = $email; // Receiver

    //           $subject = 'WATIM MEDICAL & DENTAL COLLEGE';

    //           $message = $_REQUEST['name']."\r\n"."\r\n". 'Thankyou for your Online Registration in at "WATIM Medical & Dental College Rawalpindi"'. "\r\n" .

    //           'Your registration No is : '. $_SESSION['regNo']. "\r\n" .

    //           'In case of any query related admissions contact admission office: '."\r\n"."\r\n".

    //           'In-Charge Admissions'."\r\n".'Mobile / Whatsapp : 0316-8766996'."\r\n".'Landline : 051-3757575'."\r\n";



    //           $message2 = 'For further details contact admission office'; 

    //           $headers = "From:" . $from;

          

    //           // Sending email

    //           if(mail($to, $subject, $message, $headers))

    //           {

    //               // echo 'Your mail has been sent successfully.';

    //           }

    //           else

    //           {

    //               echo 'Unable to send email. Please try again.';

    //           }

              

    //               echo "<script>alert('FORM SUBMITTED SUCCESSFULLY CHECK YOUR MAIL.');

    //               window.location.href='index.php';</script>";

    //                   // echo "fORM SUBMITTED SUCCESSFULLY";

    //                   // sleep(2);

    //                   // header("Location: Dentalchallan.php");

    //       }

    

    //   }

  }



else

  {

      echo "ERROR: Hush! Sorry fill all required fields ";



}



  }

 

?>