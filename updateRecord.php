<?php

session_start();

require('configure.php');

  //  $conn = mysqli_connect('localhost:3306', 'root', '', 'watimcom_website');

  

  // Check connection

  if($conn === false)

  {

      die("ERROR: Could not connect. " . mysqli_connect_error());

  }

  else

  {

    

  	if(isset($_REQUEST['mcat']) && isset($_REQUEST['mcatr']))

  	{

  	   



$cnic = $_REQUEST['cnic'];

	  $mcat = $_REQUEST['mcat'];

	  $mcatr = $_REQUEST['mcatr'];

	  $fscmarks = $_REQUEST['fscmarks'];

	  $comYear = $_REQUEST['comYear'];

	  $mcat_passing_year = $_REQUEST['mcat_passing_year'];

	  $matricMarks = $_REQUEST['matricMarks'];

	  $marksOutOf = $_REQUEST['marksOutOf'];

	  

	  $physics = $_REQUEST['updPhy'];

	  $chemistry = $_REQUEST['updChem'];

	  $biology = $_REQUEST['updBio'];

	  $stdType = $_REQUEST['stdType'];

	  

	      $passIqamaNo = $_REQUEST['passIqamaNo'];

    $instituteName = $_REQUEST['instituteName'];

    $instituteCity = $_REQUEST['instituteCity'];

    $residentialCountry = $_REQUEST['residentialCountry'];

    $visaStatus = $_REQUEST['visaStatus'];

    

    //   echo $passIqamaNo  ;

    //   echo $instituteName ;

    //   echo $instituteCity ;

    //   echo $residentialCountry ;

    //   echo $visaStatus ;

//   $stdType = "";



// echo "matric marks".  $matricMarks;

// echo " fsc marks". $fscmarks;

// echo "matric marks out of". $marksOutOf;

// echo "mdcat result". $mcatr;







        $mdPer = $mcatr * 50 / 200;

        $fscPer = $fscmarks * 40 / 1100;

        $matricPer = $matricMarks * 10 / $marksOutOf;

//      $total = $mdPer + $fscPer + $matricPer;        

        $aggregatePer = $matricPer+$fscPer+$mdPer;

        

        // echo "mdcat result". $aggregatePer;

        // die();

        

        $aggregatePer = round($aggregatePer , 3);

//      $aggregatePer  = $total * 100 / 1100;



    

// 	  $updPhy = $_REQUEST['updPhy'];

// 	  $fscmarks = $_REQUEST['fscmarks'];

// 	  $updChem = $_REQUEST['updChem'];

// 	  $updBio = $_REQUEST['updBio'];

// 	  $program = $_REQUEST['program'];

      

// 	  echo $stdPhone;



    //  $submitDate = date('m/d/Y h:i:s a', time());

    //  $select = "UPDATE registration SET mcatr = '$mcatr', fscmarks = '$fscmarks' ,   updPhy = '$updPhy' , updChem = '$updChem' , updBio = '$updBio' WHERE appId = '$appId'";

 

    // $select = "UPDATE `registration_24to25`  SET 

    //         `fscmarks`='$fscmarks',

    //         `mcatr` = '$mcatr' ,

    //         `physics` = '$updPhy' , 

    //         `chemistry` = '$updChem' ,

    //         `biology` = '$updBio'

    //         WHERE

    //         `cnic` = '$cnic'";

     $select = "UPDATE `registration_24to25`  SET 

            `fscmarks`='$fscmarks',

            `matricMarks`='$matricMarks',

            `marksOutOf`='$marksOutOf',            

            `mcatr` = '$mcatr',

            `comYear` ='$comYear',

            `mcat_passing_year` = '$mcat_passing_year',

            `aggregatePer` = '$aggregatePer',

            `biology` = '$biology',

            `chemistry` = '$chemistry',

            `physics` = '$physics',

            `stdType` = '$stdType',

            `passIqamaNo` = '$passIqamaNo'  ,

            `instituteName` = '$instituteName' ,

            `instituteCity` = '$instituteCity' ,

            `residentialCountry` = '$residentialCountry' ,

            `visaStatus` = '$visaStatus' 

            

            WHERE

            `cnic` = '$cnic'";



    $result=mysqli_query($conn,$select);

//     echo $select;

// echo $result;

//   exit(0);

 

        if($result > 0)

      

    {  

        // echo "<script>alert('Record Updated Succesfuly')";

        //  echo "Record Updated";

        // echo "<script>alert('Record Updated, go and get your challan form');

        echo "<script>window.location.href='home.php';</script>";

    }

    else

    {

        echo "ERROR: Hush! Sorry fill all required fields ";



  }

  }

  }

  

 

?>