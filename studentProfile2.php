<?php

// echo "Here i M";
session_start();
// session_start();
if(!isset($_SESSION['logname']))
{
	header("location:studentLogin.php");
    
}
// echo $_SESSION['logname'];

if(isset($_SESSION['logname'])){
error_reporting(0);
// echo"HELLO";
$logname = $_SESSION['logname'];

// echo $logname;
  $conn = mysqli_connect('localhost:3306', 'watimcom_develop', 'Watim@321123$AH@', 'watimcom_website');
// echo " i'M WORKING ";
  // Check connection
  if($conn === false)
  {
      die("ERROR: Could not connect. " . mysqli_connect_error());
  }
  else
  {
    //   echo "i CAME HERE ";
    if(isset($_SESSION['logname']) != "")
    {
        
    //   $term = $_REQUEST['term'];
    //   "SELECT * FROM `registration_24to25` WHERE `cnic`='01478520' AND (SELECT `cnic` FROM `student_reg_24to25` WHERE `cnic` = '01478520')";
    //   $query = "SELECT * FROM `registration_24to25` WHERE `cnic`= '$logname' AND (SELECT `cnic` FROM `student_reg_24to25` WHERE `cnic` = '$logname')";
    //   echo $query;
  //    echo "OK";
  $query = "SELECT * FROM `student_reg_24to25` WHERE `cnic` = '$logname'";
      $result=mysqli_query($conn,$query);
      if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
        // echo $row[appId];
        // echo $row['cnic'];
        // echo $row['name'];
        // echo $row['fname'];
       
     
//     }
//   }

?>


<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link href="images/favicon.png" rel="shortcut icon" type="image/png" />
	<title>Watim Medical & Dental College</title>
	<!-- For-Mobile-Apps --><meta name="viewport" content="width=device-width, initial-scale=1"><meta name="keywords" content="Dental, Dental College, Dental Colleges, Watim Dental Watim, Watim Dental COllege, Watim Medical College, Watim Medical and Dental College, Dental College Admissions, Admission Dental College, Watim, Watim Dental College Website, Watim Website, Watim College Website, Watim Dental and General Hospital, Watim Hospital, Dental Colleges in Pakistan, Dental College Rawalpindi, Private Dental and medical college Rawalpindi, Watim College, Medical College Admisions, Watim Dental College RAwalpindi, Watim Dental College admissions, BDS pakistan, BDS in Pakistan, BDS admissions, Watim Website, Watim BDS, dentist, invisalign, braces, root canal, BDS in RAwalpindi, BDs Colleges in Rawalpindi, BDs in Islamabad, BDS colleges in Islamabad, Dental hospital in Rawalpindi, Dental and General Hospital, Watim dental and general hospital, Watim Rawat, WDCR, wdc, wdch, Watim Dental College address, Medical College, Dental College in Rawalpindi, Dental College in Islamabad, Best Dental College " /><script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script><!-- //For-Mobile-Apps --><!-- Custom Theme files --><!-- Bootstrap Styling -->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" /><!-- jQuery (necessary for Bootstrap's JavaScript plugins) --><script src="js/jquery.min.js"></script><!-- Bootstrap-Working-File --><script src="js/bootstrap.min.js"></script><!-- Index-Page-Styling -->
	<link href="css/register.css" media="all" rel="stylesheet" type="text/css" /><!-- Owl-Carousel-Styling -->
	<link href="css/owl.carousel.css" media="all" rel="stylesheet" type="text/css" /><!-- //Custom Theme files --><!-- Smooth-Scrolling --><script type="text/javascript" src="js/move-top.js"></script><script type="text/javascript" src="js/easing.js"></script><script type="text/javascript">
    jQuery(document).ready(function($) {
        $(".scroll").click(function(event){     
            event.preventDefault();
            $('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
        });
    });
</script><!-- //Smooth-Scrolling --><!-- Calender-JavaScript -->
	<link href="css/clndr.css" rel="stylesheet" type="text/css" /><script src="js/underscore-min.js" type="text/javascript"></script><script src= "js/moment-2.2.1.js" type="text/javascript"></script><script src="js/clndr.js" type="text/javascript"></script><script src="js/site.js" type="text/javascript"></script><!-- //Calender-JavaScript -->
	<link href="css/font-awesome.min.css" rel="stylesheet" />
	<link href="css/font-awesome.css" rel="stylesheet" />
	<link rel="stylesheet" href="popup/swc.css">
	<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
	<style>
 .btnn {
  background-color: Red;
  border: none;
  color: white;
  padding: 12px 16px;
  font-size: 20px;
  cursor: pointer;
  float: right;
  Margin-top : 20px;
}

	</style>
</head>
<!-- Body-Starts-Here -->

<body>


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-2.1.3.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="row">

  <!-- Grid column -->
  <div class="col-md-12 mb-4">
        <!--<button class="btnn">-->
        <!--<a href= "index.php">-->
        <!--    <i class="fa fa-home"> </i>Home-->
        <!--</a> </button>-->
        <!--<button type="button" class="btn btn-danger" style = "color : White; float : right; margin-top : 20px; margin-right : 10px">-->
        <!--        <a href="Medchallan.php" style = "color : White; ">Home</a>-->
        <!--      </button>-->
</div>
</div>
<div class="container">
            
            <form class="form-horizontal" action="" id ="rform" role="form"  target="_blank" style="
            margin-top: 22%; ">
                 <button type="button" class="btn btn-danger" style = "color : White; float : right; margin-top : 22px; margin-right : 10px">
                <a href="http://www.watim.com.pk" style = "color : White; padding-right:5px; padding-left:5px "><i class = "fa fa-home" style = "padding-right:10px">
                         
                     </i>Home</a>
              </button>
              
              <button type="button" class="btn btn-danger" style = "color : White; float : right; margin-top : 22px; margin-right : 10px">
                <a href="https://www.watim.com.pk/AddmissionRegistration.php" style = "color : White; padding-right:5px; padding-left:5px "><i class = "fa fa-home" style = "padding-right:10px">
                         
                     </i>Apply Now</a>
              </button>
              
                <h2>Student Profile</h2>
                 <br><br>
                 <h4>
                     <i class = "fa fa-user" style = "padding-right:10px">
                         
                     </i>
                    <?php
                    echo 'WELCOME ';
                    echo $row['name'] ." ". $row['fname'];
                    ?>
                 </h4>
                 <div class="form-group" >
                  <div class="col-sm-9">
                        <!--<span class="help-block">Step 1 : Enter your application id received on your mail </span>-->
                        <!--<span class="help-block">Step 2 : Submit. </span>-->
                        <!--<span class="help-block">Step 3 : After form submission download the generated form.</span>-->
                        <!--<span class="help-block">Step 4: Deposit the challan form in the mentioned bank within due date .</span>-->
                        <!--<span class="help-block">Step 5: You will receieve an application number on your given  email.</span>-->
                        <!--<span class="help-block">Step 6 : submit application form with paid bank challan at Admission Office WMDC(By self or through courier).</span>-->
                       
                        <!--<span class="help-block">Your phone number won't be disclosed anywhere </span>-->
                     </div>
                </div>
                 <br>
                
               <table class="table table-light" style = "margin-bottom : 20px;">
  <thead>
    <tr style = "font-size: 20px;">
      <!--<th scope="col">#</th>-->
      <th scope="col">Name</th>
      <th scope="col">Father Name</th>
      <th scope="col">cnic</th>
      <th scope="col" > BDS Challan</th>
      <th scope="col" > MBBS Challan</th>

    </tr>
  </thead>
  <tbody>
    <tr style = "font-size: 15px;">
      <!--<th scope="row">1</th>-->
      <td><?php  echo $row['name']; ?></td>
      <td><?php  echo $row['fname']; 
      }
      }
      ?></td>
      <?php
      $query = "SELECT * FROM `registration_24to25` WHERE `cnic`= '$logname' AND (SELECT `cnic` FROM `student_reg_24to25` WHERE `cnic` = '$logname')";
       $result=mysqli_query($conn,$query);
      if(mysqli_num_rows($result) > 0){
        while($rowf = mysqli_fetch_array($result)){
            
            
      ?>
      <td><?php  echo $rowf['cnic']; ?></td>
      <td><?php
      if($rowf['program'] == 'BOTH' || $rowf['program'] == 'BDS' )
      {
          echo '
            <button type="button" class="btn btn-primary" style = "color : White; ">
       
                <a href="Dentalchallan.php" style = "color : White; ">BDS Challan
                </a>
            </button>
              
          ';
      }
    
      
      ?>
      </td>
      
      <td>
      <?php
      if($rowf['program'] == 'BOTH' || $rowf['program'] == 'MBBS' )
      {
          echo '
             <button type="button" class="btn btn-danger" style = "color : White; ">
                <a href="Medchallan.php" style = "color : White; ">MBBS Challan</a>
              </button>
          ';
      }
      ?>
    
          
      </td>
    </tr>
   
<!--  </tbody>-->
<!--</table>-->

<!--<table>-->
   
</table>
	 <br>
              
            </form> <!-- /form -->
        </div> <!-- ./container -->
        </body>
        </html>
        
        <?php
        
        }
      }
    }
   
  }
}

 else
    {
         echo "<script>alert('Login');
        window.location.href='studentLogin.php';</script>";
    }
      
    
    
    // else
    // {
    //     echo '
    //          <button type="button" class="btn btn-danger" style = "color : White; ">
    //             <a href="AddmissionRegistration.php" style = "color : White; ">AddmissionRegistration</a>
    //           </button>
    //       ';
    // }
  

?>