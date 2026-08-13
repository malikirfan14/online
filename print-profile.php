<?php

session_start();





if (!isset($_SESSION['logname'])) {

    header("location:studentLogin.php");

}



if (isset($_SESSION['logname'])) {



    error_reporting(0);

    require('configure.php');



$cnic = $_SESSION['logname'];

 $query = mysqli_query($conn,"SELECT * FROM registration_26to27 WHERE cnic = '$cnic' LIMIT 1");



?>

<!doctype html>

<html lang="en">

  <head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Profile</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

      <link rel="icon" type="image/x-icon" href="img/icon.ico">

  

 <style>

            @media print {

               #printPageButton {

                  display: none;

               }

            }

</style>



<script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>

    <script>

    //     tailwind.config = {

    //         theme: {

    //             extend: {

    //                 fontFamily: {

    //                     sans: ['Inter var', ...defaultTheme.fontFamily.sans],

    //                 },

    //             }

    //         }

    //     }

    // </script>

</head>

<body>

    

  <div class="container-fluid py-3">

    <!--<section>-->

     <div class="d-grid gap-2 col-4 mx-auto">

      <button class="btn btn-primary" type="button" id="printPageButton" onclick="window.print()"><i class="fa fa-print" aria-hidden="true" ></i> Print</button>

      

    </div>

    <div class="container text-center">

        <!--<img src="img/denlogo.png" class=""/>-->

        

            <div class="row">

        

        <div class="col col-sm-2">   

               <img src="img/denlogo.png" class="float-left"/>

                  

        </div>

         <div class="col col-sm-8">   

              <p class="text-3xl font-semibold uppercase d-inline-block text-truncate mt-2">WATIM MEDICAL & DENTAL COLLEGE</p>

                  

        </div>

        

        <div class="col col-sm-2">

          <img src="img/denlogo.png" class="float-right"/>

        </div>

    </div>

    </div>

    

    



    

      <!--</section>-->

  </div>

  <?php

                    if (mysqli_num_rows($query) > 0) {

                    ?>

                      <body>

                    <?php

                    			$i=1;

                    			while($row = mysqli_fetch_array($query)) 

                                {

                    				

                    ?>

   <div class="container-fluid">

    <div class="row">

        

        <div class="col col-sm-10">   

                 <p><strong>Applied Date:</strong> <br/>  <u><?php echo $row["date"];?></u></p> 

                  <br/>

                  

        </div>

        <div class="col col-sm-2">

             <p class="pull-right"><strong>Aggregate %age </strong> <br/>  <u><?php echo $row["aggregatePer"];?></u></p> 

            <!--<p class="text-end">Aggregate %age <br/> <span class="text-primary fs-2"><u class="text-center"><?php echo $row["aggregatePer"];?></u></span></p>-->

        </div>

    </div>

    <!--<div class="row text-center">-->

    <!--    <u><p><strong>Applicant ID #</strong> <br/>  <?php echo $row["appId"];?></p></u> -->

    <!--</div>-->

  <div class="row">

    <div class="col col-sm-10">

        <h4 class="mb-1"> <u>Personal Information</u></h4>

        <form>

            <div class="mb-1">

            <label for="exampleInputEmail1" class="form-label"><strong>Application ID</strong></label>

            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $row["appId"];?>" readonly>

          </div>

          <div class="mb-1">

            <label for="exampleInputEmail1" class="form-label"><strong>Applicant Name</strong></label>

            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $row["name"];?>" readonly>

          </div>

          <div class="mb-1">

            <label for="exampleInputEmail1" class="form-label"><strong>Cnic</strong></label>

            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $row["cnic"];?>" readonly>

            </div>

        <div class="mb-1">

            <label for="exampleInputEmail1" class="form-label"><strong>Date Of Birth</strong></label>

            <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $row["dob"];?>" readonly>

        </div>

        </div>

    <div class="col col-sm-2 justify-content-center text-center " style=" border: 1px solid black;

  border-collapse: collapse; alig-item : center;">

            <img src="" onerror="this.src='img/avatar2.jpg'"  class="img-responsive mt-2 mb-2" alt="student profile">

    </div>

</div>

    <div class="row">

      

        <div class="mb-1">

            <label for="exampleInputEmail1" class="form-label"><strong>Father Name</strong></label>

            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $row["fname"];?>" readonly>

          </div>

          <div class="mb-1">

            <label for="exampleInputEmail1" class="form-label"><strong>Guardian Name</strong></label>

            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $row["fname"];?>" readonly>

          </div>

          <!-- <div class="mb-1">

            <label for="exampleInputEmail1" class="form-label"><strong>Domicile</strong></label>

            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $row["domicile"];?>" readonly>

          </div> -->

      <div class="mb-1">

        <label for="exampleInputEmail1" class="form-label"><strong>Mailing Address</strong></label>

        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $row["email"];?>" readonly>

      </div>

      <!-- <div class="mb-1">

        <label for="exampleInputEmail1" class="form-label"><strong>Permanent Address</strong></label>

        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $row["p_address"];?>" readonly>

      </div> -->

    <div class="row mt-1">

     <div class="col col-sm-4">

      <div class="mb-1">

        <label for="exampleInputEmail1" class="form-label"><strong>Student Mobile Number</strong></label>

        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $row["stdPhone"];?>" readonly>

      </div>

     </div>

     <div class="col col-sm-4">

      <div class="mb-1">

        <label for="exampleInputEmail1" class="form-label"><strong>Father Mobile Number</strong></label>

        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $row["fatPhone"];?>" readonly>

      </div>

     </div>

     <!-- <div class="col col-sm-4">

      <div class="mb-1">

        <label for="exampleInputEmail1" class="form-label"><strong>Email</strong></label>

        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $row["email"];?>" readonly>

      </div>

     </div> -->

    </div> 



    <div class="row">

        <h5 class="mb-1">

            <u>Part 2</u>  &nbsp&nbsp <u>

            Qualifications (Aggregate Marks in HSSC / Equivalent Must not be less than 60% i.e. 660/1100)

            </u>a

        </h5>

        

        <table class="table table-bordered mt-2 table-bordered" style =" border: 1px solid black;

  border-collapse: collapse;" >

          <thead>

            <tr style="background-color : #D9DDDC">

              <th scope="col">Examination Passed</th>

              <th scope="col">Obtained Marks</th>

              <th scope="col">Total Marks</th>

              <th scope="col">Passing Year</th>

            </tr>

          </thead>

          <tbody>

            <tr>

              <th scope="row" style="background-color : #D9DDDC">SSC / 10th

Grade / O-Level</th>

              <td><?php echo $row["matricMarks"];?></td>

              <td><?php echo $row["marksOutOf"];?></td>

              <td></td>

            </tr>

            <tr>

              <th scope="row" style="background-color : #D9DDDC">HSSC / 12th

Grade / A-Level</th>

              <td><?php echo $row["fscmarks"];?></td>

              <td><?php echo $row["fscMarksOutOf"];?></td>

              <td><?php echo $row["comYear"];?></td>

            </tr>

            <tr >

              <th scope="row" style="background-color : #D9DDDC">MDCAT Test</th>

              <td><?php echo $row["mcat"];?></td>

               <td><?php echo "200";?></td> 

              <td><?php echo $row["mcat_passing_year"];?></td>

            </tr>

            <!--<tr>-->

            <!--  <th scope="row">Aggregate %age</th>-->

            <!--  <td></td>-->

            <!--  <td></td>-->

            <!--  <td></td>-->

            <!--</tr>-->

          </tbody>

        </table>

    </div>

    </div>

    

</div>

   

  </div>    

      <!--<br/>  -->

      <!--<br/>  -->

      <!--<br/>  -->

      <!--<br/>  -->

      <!--<br/>  -->

      <!--<br/>  -->

    <!-- <div class="container-fluid mx-auto text-center justify-content-center mt-5">

     <img src="<?php echo "upload/matric/" .$row['mm_image']; ?>" class="mt-5"

     width="600" height="650" alt="Upload to view matric marksheet"/>

    </div> 

    <div class="container-fluid mx-auto text-center justify-content-center mt-5">

     <img src="<?php echo "upload/FS.c/" .$row['fsc_image']; ?>" class="mt-5"

     width="600" height="650" alt="Upload to view FS.cc marksheet"/>

     </div> 

    <div class="container-fluid mx-auto text-center justify-content-center mt-5"> 

     <img src="<?php echo "upload/mdcat/" .$row['md_image']; ?>" class="mt-5"

     width="600" height="650" alt="Upload to view Mdcat marksheet"/>

    </div> 

    <div class="container-fluid mx-auto text-center justify-content-center mt-5"> 

     <img src="<?php echo "upload/challan/" .$row['challan_image']; ?>" class="mt-5"

     width="600" height="650" alt="Upload to view Challan marksheet"/>

    </div> -->

    </form>

    

    </div>  



<?php

	$i++;

	}

?>

</div>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

<?php

}

else

{



        echo "<script>alert('Try again')</script>";

}

}

?>

</body>

</html>