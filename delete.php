<?php

session_start();



if(isset($_SESSION['adminName']))

{

require('configure.php');

  //  $conn = mysqli_connect('localhost:3306', 'root', '', 'watimcom_website');

  

  // Check connection

  if($conn === false)

  {

      die("ERROR: Could not connect. " . mysqli_connect_error());

  }

  else

  {

    

  	if(isset($_REQUEST['cnic']) && isset($_REQUEST['id']))

  	{

  	   



$cnic = $_REQUEST['cnic'];

$id =$_REQUEST['id'];











      

// 	  echo $stdPhone;



    //  $submitDate = date('m/d/Y h:i:s a', time());

    //  $select = "UPDATE registration SET mcatr = '$mcatr', fscmarks = '$fscmarks' ,   updPhy = '$updPhy' , updChem = '$updChem' , updBio = '$updBio' WHERE appId = '$appId'";

 

    $select = "DELETE FROM `registration_26to27` WHERE `cnic` = '$cnic' AND `id` = '$id'";

            

         

    $result=mysqli_query($conn,$select);

//     echo $select;

// echo $result;

//   exit(0);

 

        if($result > 0)

      

    {  

        // echo "<script>alert('Record Updated Succesfuly')";

        //  echo "Record Updated";

             echo "<script>alert('Record Deleted');

        window.location.href='adminFetch.php';</script>";

    }

    else

    {

        echo "ERROR: Hush! Sorry fill all required fields ";



  }

  }

  }

}

 

?>