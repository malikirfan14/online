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

    

  	if(isset($_REQUEST['mcat']) && isset($_REQUEST['mcatr']))

  	{

  	   



$cnic = $_REQUEST['cnic'];

$name =$_REQUEST['name'];


$fname =$_REQUEST['fname'];

$dob =$_REQUEST['dob'];

$stdPhone =$_REQUEST['stdPhone'];

$fatPhone =$_REQUEST['fatPhone'];

$email =$_REQUEST['email'];









$fscmarks =$_REQUEST['fscmarks'];

//$fscStatus =$_REQUEST['fscStatus'];

$comYear =$_REQUEST['comYear'];



$mcat =$_REQUEST['mcat'];

$mcatr =$_REQUEST['mcatr'];

$mcat_passing_year =$_REQUEST['mcat_passing_year'];





$matricMarks =$_REQUEST['matricMarks'];

$marksOutOf =$_REQUEST['marksOutOf'];
$fscMarksOutOf =$_REQUEST['fscMarksOutOf'];



$program =$_REQUEST['program'];

$aggregatePer =$_REQUEST['aggregatePer'];

$ucatYear =$_REQUEST['ucatYear'];

$ucatObtainedMarks = $_REQUEST['ucatObtainedMarks'];

$ucatTotalMarks = $_REQUEST['ucatTotalMarks'];

$mcatYear = $_REQUEST['mcatYear'];

$mcatTotalMarks = $_REQUEST['mcatTotalMarks'];

$mcatObtainedMarks = $_REQUEST['mcatObtainedMarks'];

$mcat = $_REQUEST['mcat'];

$mcatr = $_REQUEST['mcatr'];

$mcat_passing_year = $_REQUEST['mcat_passing_year'];

$aggregatePer = $_REQUEST['aggregatePer'];

$emergencyPhone = $_REQUEST['emergencyPhone'];

$address = $_REQUEST['address'];



//$updPhy = $_REQUEST['updPhy'];

//$updChem = $_REQUEST['updChem'];

//$updBio = $_REQUEST['updBio'];





        //$mdPer = $mcatr * 50 / 200;

        //$fscPer = $fscmarks * 40 / 1100;

        //$matricPer = $matricMarks * 10 / $marksOutOf;

//      $total = $mdPer + $fscPer + $matricPer;        

        //$aggregatePer = $matricPer+$fscPer+$mdPer;

        

        // echo "mdcat result". $aggregatePer;

        // die();

        

        //$aggregatePer = round($aggregatePer , 3);



  // `physics` = '$updPhy' , 

            // `chemistry` = '$updChem' ,

            // `biology` = '$updBio'

      

// 	  echo $stdPhone;



    //  $submitDate = date('m/d/Y h:i:s a', time());

    //  $select = "UPDATE registration SET mcatr = '$mcatr', fscmarks = '$fscmarks' ,   updPhy = '$updPhy' , updChem = '$updChem' , updBio = '$updBio' WHERE appId = '$appId'";

 

    $select = "UPDATE `registration_26to27`  SET 

            

            `fname` = '$fname' ,

            `name` = '$name' ,

            `cnic` = '$cnic' ,

            `dob` = '$dob' ,

            `stdPhone` = '$stdPhone',

            `fatPhone` = '$fatPhone',

            `email` = '$email',

            `fscmarks`='$fscmarks',

            

            `comYear` = '$comYear' ,



            `mcat` = '$mcat' ,

            `mcatr` = '$mcatr' ,

            `mcat_passing_year` = '$mcat_passing_year' ,



            `matricMarks` = '$matricMarks' ,

            `marksOutOf` = '$marksOutOf' ,
            `fscMarksOutOf` = '$fscMarksOutOf' ,



            `program` = '$program' ,



            `aggregatePer` = '$aggregatePer',

            `ucatYear` ='$ucatYear',

            `ucatObtainedMarks` = '$ucatObtainedMarks',

            `ucatTotalMarks` = '$ucatTotalMarks',

            `mcatYear` = '$mcatYear',

            `mcatTotalMarks` = '$mcatTotalMarks',

            `mcatObtainedMarks` = '$mcatObtainedMarks',

            `mcat` = '$mcat',

            `mcatr` = '$mcatr',

            `mcat_passing_year` = '$mcat_passing_year',

            `emergencyPhone` = '$emergencyPhone',

            `address` = '$address'
            
            WHERE

            `cnic` = '$cnic'";

    



    $result=mysqli_query($conn,$select);

//     echo $select;

// echo $result;

//   exit(0);

 

        if($result > 0)

      

    {  


        // echo "<script>alert('Record Updated Succesfuly')";

        // echo "Record Updated";

        // echo "<script>alert('Record Updated');

        echo "<script>        

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