<?php
session_start();


if(!isset($_SESSION['logname']))
{
	header("location:login.php");
    
}

if(isset($_SESSION['logname'])){
error_reporting(0);

$logname = $_SESSION['logname'];

  require('configure.php');
  if($conn === false)
  {
      die("ERROR: Could not connect. " . mysqli_connect_error());
  }
  else
  {
    if(isset($_SESSION['logname']) != "")
    {
        

  $query = "SELECT * FROM `registration_26to27` WHERE `cnic` = '$logname'";
      $result=mysqli_query($conn,$query);
      if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){


?>
<html>
 <head>
    <link rel="stylesheet" href="challan.css">
 <!-- CSS only -->

 </script><!-- //Smooth-Scrolling --><!-- Calender-JavaScript -->
	<link href="css/clndr.css" rel="stylesheet" type="text/css" />
    <script src="js/underscore-min.js" type="text/javascript"></script>
    <script src= "js/moment-2.2.1.js" type="text/javascript"></script>
    <script src="js/clndr.js" type="text/javascript"></script>
    <script src="js/site.js" type="text/javascript"></script>
    <!-- //Calender-JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> 
<style type="text/css" media="print">


/* CSS used here will be applied after bootstrap.css */
.span12{
    border:solid 1px black;
    margin-right :2px;
    margin-left : 2px;
    
    }  
    .span-p{
        margin-bottom :3px;
    }
    table {
        border:0px solid black;
        border-collapse: collapse;
        
    }
    table.no-spacing {
        border-spacing:0; /* Removes the cell spacing via CSS */
        border-collapse: collapse;  /* Optional - if you don't want to have double border where cells touch */
      }
    table td {
       
        white-space: nowrap;
        overflow: hidden;
    }
 
@page {
  size: A4 landscape;
}
/*@page {*/
/*  size: 100mm 200mm landscape;*/
/*}*/
    /*body { */
    /*    writing-mode: tb-rl;*/
    /*}*/
    table { page-break-inside:avoid }
    tr  { page-break-inside:avoid; page-break-after:avoid }
    td  { page-break-inside:avoid; page-break-after:avoid }
    div   { page-break-inside:avoid; }
     /* This is the key 
    thead { display:table-header-group }
    tfoot { display:table-footer-group }
   /* @media print {*/
   /* body{*/
   /*     width: 21cm;*/
   /*     height: 29.7cm;*/
   /*     margin: 20mm 25mm 20mm 25mm; */
        /* change the margins as you want them to be. */
   /*} */
/* } */
</style>
</head>
<body window.onload = function() { window.print(); }>
<div id="content" style="width:100%; height: 90px; ">
  <div style="width:33%;display:inline-block">
 <div class="col-xs-3 span12">
     <div class="table-responsive overflowtable">
         <h6 class="text-right"><strong>Bank Copy</strong></h6>
          <h5 class="sub-header text-center "><strong>Watim Medical College (Pvt) Ltd.</strong></h5>
          <h6 class ="text-danger text-center"><strong>Application Registration Fee Challan here</strong></h6>
     
          <table class="span12">
               <tr>
                  <td class="col-md-1"><h6 style="font-size:12px;"> <strong>Bank Name:</strong></h6></td>
                   <td class="col-md-1" ><h6 style="font-size:12px;">Askari Bank Ltd</h6></td>
                  </tr>
                  <tr>
                  <td class="col-md-1"><h6 style="font-size:12px;"> <strong>Branch Name:</strong></h6></td>
                   <td class="col-md-1"><h6 style="font-size:12px;">Gulberg Greens Branch</h6></td>
                  </tr>
                 
          </table>
          <!--<br>-->
          <h6 class ="text-danger text-left ml-2 mr-2"><em>Note: Fee Can be deposited at any branch of Askari bank & Registration fee is non-refundable</em></h6>
       <!--<br>-->
        <table class="span12">
             <tr>
                  <td class="col-md-1"><h6 style="font-size:12px;"> <strong>Account Number:</strong></h6></td>
                   <td class="col-md-1 text-right"><h6 style="font-size:12px;"><strong>7590200004084</strong></h6></td>
                  </tr>
        </table>
        <!--<br>-->
        <h6 class="text-center"><strong>STUDENT PARTICULARS</strong></h6>
        <!--<br>-->
            <table class="span12">
      
              <tbody>   
                <tr>
                  <td class="col-md-1"><h6 style="font-size:12px;"> <strong>Name</strong></h6></td>
                  <!-- <td class="col-md-3"><h6 style="font-size:12px;">RAYYAN NABI</h6></td> -->
                  <td class="col-md-3"><h6 style="font-size:12px;"><?php echo $row['name']; ?></h6></td>
                
                </tr>
                <tr>
                  <td class="col-md-2"><h6 style="font-size:12px;"> <strong>Father Name</strong></h6></td>
                     <!-- <td class="col-md-3"><h6 style="font-size:12px;">ZAHID NABI </h6></td> -->
                     <td class="col-md-3"><h6 style="font-size:12px;"><?php echo $row['fname']; ?></h6></td>
                </tr>
                 <tr>
                 <td class="col-md-3"><h6 style="font-size:12px;"> <strong>MDCAT Number</strong></h6></td>
                  <td class="col-md-3"><h6 style="font-size:12px;"><?php echo $row['mcat']; ?></h6></td>
                </tr>
                 <tr>
                 <td class="col-md-3"><h6 style="font-size:12px;"> <strong>Application Number</strong></h6></td>
                  <td class="col-md-3"><h6 style="font-size:12px;"><?php echo $row['appId']; ?></h6></td>
                </tr>
                <tr>
                       <td class="col-md-3"><h6 style="font-size:12px;"> <strong>Program / Session </strong></h6></td>
                 <td class="col-md-3"><h6 style="font-size:12px;">MBBS / 2026-27 </h6></td>
                </tr>
                <tr>
                      <td class="col-md-3"><h6 style="font-size:12px;"> <strong>Fee</strong></h6></td>
                 <td class="col-md-3 text-danger"><h6 style="font-size:12px;">Application Registration Fee</h6></td>
                </tr>
              </tbody>
            </table>
            <!--<br>-->
            <h6 class="text-center"><strong>FEE PARTICULAR </strong></h6>
            <!--<br>-->
              <table class="span12 span-p">
               <tr>
                  <td class="col-md-1"><h6 style="font-size:12px;"> <strong>Current Dues:</strong></h6></td>
                  <td class="col-md-1 text-right"><h6 style="font-size:12px;"><strong>2,000.00 </strong></h6></td>
                  </tr>
                  <tr>
                  <td class="col-md-1"><h6 style="font-size:12px;"> <strong>Total Amount Due:</strong></h6></td>
                  <td class="col-md-1 text-right"><h6 style="font-size:12px;"><strong>2,000.00 </strong></h6></td>
              </tr>
             <tr>
                  <td class="col-md-1"><h6 style="font-size:12px;"> <strong>Amount in words:</strong></h6></td>
                  <td class="col-md-1 text-left"><h6 style="font-size:12px;"><strong>Rupee Two Thousand Only</strong></h6></td>
              </tr>

              <tr>
                  <td class="col-md-1 text-danger"><h6 style="font-size:12px;"><strong>Due Date:</strong></h6></td>
                   <td class="col-md-1 text-danger text-right"><h6 style="font-size:12px;"><strong>
                     <?php 
                  //    if($row['dueDate'] == 0)
                  //  echo "03-12-2021"; 
                   ?>
                   </strong></h6></td>
              </tr>  
                 <tr>
                  <td class="col-md-1"><h6 style="font-size:12px;"> <strong>Issue Date:</strong></h6></td>
                   <td class="col-md-1 text-right"><h6 style="font-size:12px;"><strong><?php echo date(" d-m-Y ") ?></strong></h6></td>
              </tr>
              <tr>
                <td class="col-md-1"><h5> <strong></strong></h5></td>
                   <td class="col-md-1"><h5><strong></strong></h5></td>
                </tr>
                <tr>
                  <td class="col-md-1"><h5> <strong></strong></h5></td>
                   <td class="col-md-1"><h5><strong></strong></h5></td>
                </tr>
                <tr>
                 <td class="col-md-1"><h5> <strong></strong></h5></td>
                   <td class="col-md-1"><h5><strong></strong></h5></td>
                </tr>
                <tr>
                 <td class="col-md-1"><h5> <strong></strong></h5></td>
                   <td class="col-md-1"><h5><strong></strong></h5></td>
                </tr>
                <tr>
                 <td class="col-md-1"><h5> <strong></strong></h5></td>
                   <td class="col-md-1"><h5><strong></strong></h5></td>
                </tr>
                <tr>
                 <td class="col-md-1"><h5> <strong></strong></h5></td>
                   <td class="col-md-1"><h5><strong></strong></h5></td>
                </tr>
                <!--<tr>-->
                <!-- <td class="col-md-1"><h5> <strong></strong></h5></td>-->
                <!--   <td class="col-md-1"><h5><strong></strong></h5></td>-->
                <!--</tr>-->
                <!--<tr>-->
                <!-- <td class="col-md-1"><h5> <strong></strong></h5></td>-->
                <!--   <td class="col-md-1"><h5><strong></strong></h5></td>-->
                </tr>     
              <tr>
                  <td class="col-md-1"><h6 style="font-size:12px;"> <strong>_____________</strong></h6></td>
                   <td class="col-md-1 text-right"><h6 style="font-size:12px;"><strong>_____________</strong></h6></td>
              </tr>
              <tr>
                  <td class="col-md-1"><h6 style="font-size:12px;"> <strong>Depositor Signature</strong></h6></td>
                   <td class="col-md-1 text-right"><h6 style="font-size:12px;"><strong>Bank Officer Signature</strong></h6></td>
              </tr>
            
          </table>
         </div>
     </div>
    </div>
  <div style="width:33%;display:inline-block">
 <div class="col-xs-3 span12">
     <div class="table-responsive overflowtable">
         <h6 class="text-right"><strong>College Copy</strong></h6>
          <h5 class="sub-header text-center "><strong>Watim Medical College (Pvt) Ltd.</strong></h5>
          <h6 class ="text-danger text-center"><strong>Application Registration Fee Challan here</strong></h6>
     
          <table class="span12">
               <tr>
                  <td class="col-md-1"><h6 style="font-size:12px;"> <strong>Bank Name:</strong></h6></td>
                   <td class="col-md-1" ><h6 style="font-size:12px;">Askari Bank Ltd</h6></td>
                  </tr>
                  <tr>
                  <td class="col-md-1"><h6 style="font-size:12px;"> <strong>Branch Name:</strong></h6></td>
                   <td class="col-md-1"><h6 style="font-size:12px;">Gulberg Greens Branch</h6></td>
                  </tr>
                 
          </table>
          <!--<br>-->
          <h6 class ="text-danger text-left ml-2 mr-2"><em>Note: Fee Can be deposited at any branch of Askari bank & Registration fee is non-refundable</em></h6>
       <!--<br>-->
        <table class="span12">
             <tr>
                  <td class="col-md-1"><h6 style="font-size:12px;"> <strong>Account Number:</strong></h6></td>
                   <td class="col-md-1 text-right"><h6 style="font-size:12px;"><strong>7590200004084</strong></h6></td>
                  </tr>
        </table>
        <!--<br>-->
        <h6 class="text-center"><strong>STUDENT PARTICULARS</strong></h6>
        <!--<br>-->
            <table class="span12">
      
              <tbody>   
                <tr>
                  <td class="col-md-1"><h6 style="font-size:12px;"> <strong>Name</strong></h6></td>
                  <!-- <td class="col-md-3"><h6 style="font-size:12px;">RAYYAN NABI</h6></td> -->
                  <td class="col-md-3"><h6 style="font-size:12px;"><?php echo $row['name']; ?></h6></td>
                
                </tr>
                <tr>
                  <td class="col-md-2"><h6 style="font-size:12px;"> <strong>Father Name</strong></h6></td>
                     <!-- <td class="col-md-3"><h6 style="font-size:12px;">ZAHID NABI </h6></td> -->
                     <td class="col-md-3"><h6 style="font-size:12px;"><?php echo $row['fname']; ?></h6></td>
                </tr>
                 <tr>
                 <td class="col-md-3"><h6 style="font-size:12px;"> <strong>MDCAT Number</strong></h6></td>
                  <td class="col-md-3"><h6 style="font-size:12px;"><?php echo $row['mcat']; ?></h6></td>
                </tr>
                 <tr>
                 <td class="col-md-3"><h6 style="font-size:12px;"> <strong>Application Number</strong></h6></td>
                  <td class="col-md-3"><h6 style="font-size:12px;"><?php echo $row['appId']; ?></h6></td>
                </tr>
                <tr>
                       <td class="col-md-3"><h6 style="font-size:12px;"> <strong>Program / Session </strong></h6></td>
                 <td class="col-md-3"><h6 style="font-size:12px;">MBBS / 2026-27 </h6></td>
                </tr>
                <tr>
                      <td class="col-md-3"><h6 style="font-size:12px;"> <strong>Fee</strong></h6></td>
                 <td class="col-md-3 text-danger"><h6 style="font-size:12px;">Application Registration Fee</h6></td>
                </tr>
              </tbody>
            </table>
            <!--<br>-->
            <h6 class="text-center"><strong>FEE PARTICULAR </strong></h6>
            <!--<br>-->
              <table class="span12 span-p">
               <tr>
                  <td class="col-md-1"><h6 style="font-size:12px;"> <strong>Current Dues:</strong></h6></td>
                  <td class="col-md-1 text-right"><h6 style="font-size:12px;"><strong>2,000.00 </strong></h6></td>
                  </tr>
                  <tr>
                  <td class="col-md-1"><h6 style="font-size:12px;"> <strong>Total Amount Due:</strong></h6></td>
                  <td class="col-md-1 text-right"><h6 style="font-size:12px;"><strong>2,000.00 </strong></h6></td>
              </tr>
             <tr>
                  <td class="col-md-1"><h6 style="font-size:12px;"> <strong>Amount in words:</strong></h6></td>
                  <td class="col-md-1 text-left"><h6 style="font-size:12px;"><strong>Rupee Two Thousand Only</strong></h6></td>
              </tr>

              <tr>
                  <td class="col-md-1 text-danger"><h6 style="font-size:12px;"><strong>Due Date:</strong></h6></td>
                   <td class="col-md-1 text-danger text-right"><h6 style="font-size:12px;"><strong>
                     <?php 
                  //    if($row['dueDate'] == 0)
                  //  echo "03-12-2021"; 
                   ?>
                   </strong></h6></td>
              </tr>  
                 <tr>
                  <td class="col-md-1"><h6 style="font-size:12px;"> <strong>Issue Date:</strong></h6></td>
                   <td class="col-md-1 text-right"><h6 style="font-size:12px;"><strong><?php echo date(" d-m-Y ") ?></strong></h6></td>
              </tr>
              <tr>
                <td class="col-md-1"><h5> <strong></strong></h5></td>
                   <td class="col-md-1"><h5><strong></strong></h5></td>
                </tr>
                <tr>
                  <td class="col-md-1"><h5> <strong></strong></h5></td>
                   <td class="col-md-1"><h5><strong></strong></h5></td>
                </tr>
                <tr>
                 <td class="col-md-1"><h5> <strong></strong></h5></td>
                   <td class="col-md-1"><h5><strong></strong></h5></td>
                </tr>
                <tr>
                 <td class="col-md-1"><h5> <strong></strong></h5></td>
                   <td class="col-md-1"><h5><strong></strong></h5></td>
                </tr>
                <tr>
                 <td class="col-md-1"><h5> <strong></strong></h5></td>
                   <td class="col-md-1"><h5><strong></strong></h5></td>
                </tr>
                <tr>
                 <td class="col-md-1"><h5> <strong></strong></h5></td>
                   <td class="col-md-1"><h5><strong></strong></h5></td>
                </tr>
                <!--<tr>-->
                <!-- <td class="col-md-1"><h5> <strong></strong></h5></td>-->
                <!--   <td class="col-md-1"><h5><strong></strong></h5></td>-->
                <!--</tr>-->
                <!--<tr>-->
                <!-- <td class="col-md-1"><h5> <strong></strong></h5></td>-->
                <!--   <td class="col-md-1"><h5><strong></strong></h5></td>-->
                </tr>     
              <tr>
                  <td class="col-md-1"><h6 style="font-size:12px;"> <strong>_____________</strong></h6></td>
                   <td class="col-md-1 text-right"><h6 style="font-size:12px;"><strong>_____________</strong></h6></td>
              </tr>
              <tr>
                  <td class="col-md-1"><h6 style="font-size:12px;"> <strong>Depositor Signature</strong></h6></td>
                   <td class="col-md-1 text-right"><h6 style="font-size:12px;"><strong>Bank Officer Signature</strong></h6></td>
              </tr>
            
          </table>
         </div>
     </div>
    </div>
  <div style="width:33%;display:inline-block">
 <div class="col-xs-3 span12">
     <div class="table-responsive overflowtable">
         <h6 class="text-right"><strong>Student Copy</strong></h6>
          <h5 class="sub-header text-center "><strong>Watim Medical College (Pvt) Ltd.</strong></h5>
          <h6 class ="text-danger text-center"><strong>Application Registration Fee Challan here</strong></h6>
     
          <table class="span12">
               <tr>
                  <td class="col-md-1"><h6 style="font-size:12px;"> <strong>Bank Name:</strong></h6></td>
                   <td class="col-md-1" ><h6 style="font-size:12px;">Askari Bank Ltd</h6></td>
                  </tr>
                  <tr>
                  <td class="col-md-1"><h6 style="font-size:12px;"> <strong>Branch Name:</strong></h6></td>
                   <td class="col-md-1"><h6 style="font-size:12px;">Gulberg Greens Branch</h6></td>
                  </tr>
                 
          </table>
          <!--<br>-->
          <h6 class ="text-danger text-left ml-2 mr-2"><em>Note: Fee Can be deposited at any branch of Askari bank & Registration fee is non-refundable</em></h6>
       <!--<br>-->
        <table class="span12">
             <tr>
                  <td class="col-md-1"><h6 style="font-size:12px;"> <strong>Account Number:</strong></h6></td>
                   <td class="col-md-1 text-right"><h6 style="font-size:12px;"><strong>7590200004084</strong></h6></td>
                  </tr>
        </table>
        <!--<br>-->
        <h6 class="text-center"><strong>STUDENT PARTICULARS</strong></h6>
        <!--<br>-->
            <table class="span12">
      
              <tbody>   
                <tr>
                  <td class="col-md-1"><h6 style="font-size:12px;"> <strong>Name</strong></h6></td>
                  <!-- <td class="col-md-3"><h6 style="font-size:12px;">RAYYAN NABI</h6></td> -->
                  <td class="col-md-3"><h6 style="font-size:12px;"><?php echo $row['name']; ?></h6></td>
                
                </tr>
                <tr>
                  <td class="col-md-2"><h6 style="font-size:12px;"> <strong>Father Name</strong></h6></td>
                     <!-- <td class="col-md-3"><h6 style="font-size:12px;">ZAHID NABI </h6></td> -->
                     <td class="col-md-3"><h6 style="font-size:12px;"><?php echo $row['fname']; ?></h6></td>
                </tr>
                 <tr>
                 <td class="col-md-3"><h6 style="font-size:12px;"> <strong>MDCAT Number</strong></h6></td>
                  <td class="col-md-3"><h6 style="font-size:12px;"><?php echo $row['mcat']; ?></h6></td>
                </tr>
                 <tr>
                 <td class="col-md-3"><h6 style="font-size:12px;"> <strong>Application Number</strong></h6></td>
                  <td class="col-md-3"><h6 style="font-size:12px;"><?php echo $row['appId']; ?></h6></td>
                </tr>
                <tr>
                       <td class="col-md-3"><h6 style="font-size:12px;"> <strong>Program / Session </strong></h6></td>
                 <td class="col-md-3"><h6 style="font-size:12px;">MBBS / 2026-27 </h6></td>
                </tr>
                <tr>
                      <td class="col-md-3"><h6 style="font-size:12px;"> <strong>Fee</strong></h6></td>
                 <td class="col-md-3 text-danger"><h6 style="font-size:12px;">Application Registration Fee</h6></td>
                </tr>
              </tbody>
            </table>
            <!--<br>-->
            <h6 class="text-center"><strong>FEE PARTICULAR </strong></h6>
            <!--<br>-->
              <table class="span12 span-p">
               <tr>
                  <td class="col-md-1"><h6 style="font-size:12px;"> <strong>Current Dues:</strong></h6></td>
                  <td class="col-md-1 text-right"><h6 style="font-size:12px;"><strong>2,000.00 </strong></h6></td>
                  </tr>
                  <tr>
                  <td class="col-md-1"><h6 style="font-size:12px;"> <strong>Total Amount Due:</strong></h6></td>
                  <td class="col-md-1 text-right"><h6 style="font-size:12px;"><strong>2,000.00 </strong></h6></td>
              </tr>
             <tr>
                  <td class="col-md-1"><h6 style="font-size:12px;"> <strong>Amount in words:</strong></h6></td>
                  <td class="col-md-1 text-left"><h6 style="font-size:12px;"><strong>Rupee Two Thousand Only</strong></h6></td>
              </tr>

              <tr>
                  <td class="col-md-1 text-danger"><h6 style="font-size:12px;"><strong>Due Date:</strong></h6></td>
                   <td class="col-md-1 text-danger text-right"><h6 style="font-size:12px;"><strong>
                     <?php 
                  //    if($row['dueDate'] == 0)
                  //  echo "03-12-2021"; 
                   ?>
                   </strong></h6></td>
              </tr>  
                 <tr>
                  <td class="col-md-1"><h6 style="font-size:12px;"> <strong>Issue Date:</strong></h6></td>
                   <td class="col-md-1 text-right"><h6 style="font-size:12px;"><strong><?php echo date(" d-m-Y ") ?></strong></h6></td>
              </tr>
              <tr>
                <td class="col-md-1"><h5> <strong></strong></h5></td>
                   <td class="col-md-1"><h5><strong></strong></h5></td>
                </tr>
                <tr>
                  <td class="col-md-1"><h5> <strong></strong></h5></td>
                   <td class="col-md-1"><h5><strong></strong></h5></td>
                </tr>
                <tr>
                 <td class="col-md-1"><h5> <strong></strong></h5></td>
                   <td class="col-md-1"><h5><strong></strong></h5></td>
                </tr>
                <tr>
                 <td class="col-md-1"><h5> <strong></strong></h5></td>
                   <td class="col-md-1"><h5><strong></strong></h5></td>
                </tr>
                <tr>
                 <td class="col-md-1"><h5> <strong></strong></h5></td>
                   <td class="col-md-1"><h5><strong></strong></h5></td>
                </tr>
                <tr>
                 <td class="col-md-1"><h5> <strong></strong></h5></td>
                   <td class="col-md-1"><h5><strong></strong></h5></td>
                </tr>
                <!--<tr>-->
                <!-- <td class="col-md-1"><h5> <strong></strong></h5></td>-->
                <!--   <td class="col-md-1"><h5><strong></strong></h5></td>-->
                <!--</tr>-->
                <!--<tr>-->
                <!-- <td class="col-md-1"><h5> <strong></strong></h5></td>-->
                <!--   <td class="col-md-1"><h5><strong></strong></h5></td>-->
                </tr>     
              <tr>
                  <td class="col-md-1"><h6 style="font-size:12px;"> <strong>_____________</strong></h6></td>
                   <td class="col-md-1 text-right"><h6 style="font-size:12px;"><strong>_____________</strong></h6></td>
              </tr>
              <tr>
                  <td class="col-md-1"><h6 style="font-size:12px;"> <strong>Depositor Signature</strong></h6></td>
                   <td class="col-md-1 text-right"><h6 style="font-size:12px;"><strong>Bank Officer Signature</strong></h6></td>
              </tr>
            
          </table>
         </div>
     </div>
    </div>
  
</div>
<!-- <div id="editor">hello</div>
    
<button id="cmd">Generate PDF</button> -->
	 </body>
	 </html>
    <?php
  //  session_destroy();
          }
        }
      }
    }
  }
   ?>
<script type="text/javascript">

$(document).ready(function () {
  // window.open('Dentalchallan.php');
    window.print();
});

</script>
<!-- 
<script type="text/javascript">
   var doc = new jsPDF();
    var specialElementHandlers = {
        '#editor': function (element, renderer) {
            return true;
        }
    };

    $('#cmd').click(function () {
        doc.fromHTML($('#content').html(), 15, 15, {
            'width': 170,
                'elementHandlers': specialElementHandlers
        });
        doc.save('sample-file.pdf');
        window.open('sample-file.pdf');
    });
    // This code is collected but useful, click below to jsfiddle link.
</script> -->