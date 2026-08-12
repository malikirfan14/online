<?php

session_start();

if (!isset($_SESSION['logname'])) {
    header("location:studentLogin.php");
}

if (isset($_SESSION['logname'])) {
    error_reporting(0);

include('linkss.php');
include('header.php');
?>
		
		<div class="container">
			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col-sm-6">
					<div class="card">
						<div class="card-header  text-center bg-primary text-white text-uppercase">
							Upload Submitted BDS & MBBS Challan
						</div>

                        <?php

                        // echo $_SESSION['logname'];
                        ?>
						<div class="card-body">
							<form action="" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label>CNIC</label>
								<input type="text" name="name" value = " <?php  echo $_SESSION['logname'];?> "  class="form-control" readonly>
								</div>
								<div class="form-group">
									<label>Matric Certificate</label>
								<input type="file" name="img1" class="form-control" required>
								</div>
								<div class="form-group">
									<label>Fsc Certificate</label>
								<input type="file" name="img2" class="form-control" required>
								</div>
								<div class="form-group">
									<input type="submit" name="submit" class="btn btn-primary
									">
								</div>
								
							</form>
						</div>
					</div>
				</div>
				<div class="col-sm-3"></div>
			</div>
		</div>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script></body>


<!-- Content Row -->




<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>

<?php 
if(isset($_POST['submit']))
{
	// include 'config.php';
	$name=$_POST['name'];
	$folder="studentDocuments/";
    $location = $folder. $_SESSION['logname'] . "/";

    $file1=$_FILES['img1']['name'];
	$file_tmp1=$_FILES['img1']['tmp_name'];
	$file2=$_FILES['img2']['name'];
	$file_tmp2=$_FILES['img2']['tmp_name'];
	$data=[];
	$data=[$file1,$file2];
	$images=implode(' ',$data);
	

    if(!file_exists($location))
    {
        mkdir($location);
        move_uploaded_file($file_tmp1, $location.$file1);
		move_uploaded_file($file_tmp2, $location.$file2);
        echo "<script>
        window.location.href='studentProfile.php';</script>";
    }

    else{
        echo "<script>alert('Already uploaded files');
        window.location.href='home.php';</script>";
   
    }
	// $query="insert into test (car_name,images) values('$name','$images')";
	// $fire=mysqli_query($con,$query);
	// if($fire)
	// {
		// move_uploaded_file($file_tmp1, $location.$file1);
		// move_uploaded_file($file_tmp2, $location.$file2);
		// move_uploaded_file($file_tmp3, $location.$file3);
		// move_uploaded_file($file_tmp4, $location.$file4);
		// echo "success";
	// }
	// else
	// {
	// 	echo "failed";
	// }
}
}

include('footer.php');
?>



