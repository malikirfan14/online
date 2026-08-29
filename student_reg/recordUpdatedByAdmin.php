<?php
session_start();

if(isset($_SESSION['adminName']))
{
require('configure.php');
    // $conn = mysqli_connect('localhost:3306', 'root', '', 'watimcom_website');
  
  // Check connection

$cnic = $_REQUEST['cnic'];
$id = $_REQUEST['id'];
$name =$_REQUEST['name'];
$fname =$_REQUEST['fname'];
$stdPhone =$_REQUEST['stdPhone'];
echo $cnic;
echo $id;
echo $name;
echo $fname;
echo $stdPhone;
// die();

 
    $select = "UPDATE `student_reg` SET
    `cnic`= '$cnic',
    `fname` = '$fname' ,
    `name` = '$name' ,
    `stdPhone` = $stdPhone
    
    WHERE
    
    `stdId` = '$id'";
    

    $result=mysqli_query($conn,$select);
//     echo $select;
// echo $result;
//   exit(0);
 
        if($result > 0)
      
    {  
      
             echo "<script>window.location.href='adminFetch.php';</script>";
    }
    else
    {
        echo "ERROR: Hush! Sorry fill all required fields ";

  }
  }
 
?>