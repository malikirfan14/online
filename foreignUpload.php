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
                        Upload Documents For Overseas / Foreign
                    </div>

                    <?php

                    // echo $_SESSION['logname'];
                    ?>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>CNIC</label>
                                <input type="text" name="name" value=" <?php echo $_SESSION['logname']; ?> " class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label>Fsc Marksheet</label>
                                <input type="file" name="img1" id="img1" class="form-control" onchange="Filevalidation()" required>
                            </div>
                            <div class="form-group">
                                <label>Matric Marksheet</label>
                                <input type="file" name="img2" id="img2" class="form-control" onchange="Filevalidation()" required>
                            </div>
                            <div class="form-group">
                                <label>Mdcat Result</label>
                                <input type="file" name="img3" id="img3" class="form-control" onchange="Filevalidation()" required>
                            </div>
                            <div class="form-group">
                                <label>CNIC Front</label>
                                <input type="file" name="img4" id="img4" class="form-control" onchange="Filevalidation()" required>
                            </div>

                            <div class="form-group">
                                <label>CNIC Back</label>
                                <input type="file" name="img5" id="img5" class="form-control" onchange="Filevalidation()" required>
                            </div>
                            
                            <div class="form-group">
                                <label>Passport</label>
                                <input type="file" name="img5" id="img6" class="form-control" onchange="Filevalidation()" required>
                            </div>
                            
                            <div class="form-group">
                                <label>Aqama</label>
                                <input type="file" name="img5" id="img7" class="form-control" onchange="Filevalidation()" required>
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
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>


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
    if (isset($_POST['submit'])) {
        // include 'config.php';
        $name = $_POST['name'];
        $folder = "Foreign_upload/";
        $location = $folder . $_SESSION['logname'] . "/";

        $file1 = $_FILES['img1']['name'];
        $file_tmp1 = $_FILES['img1']['tmp_name'];
        $file2 = $_FILES['img2']['name'];
        $file_tmp2 = $_FILES['img2']['tmp_name'];
        $file3 = $_FILES['img3']['name'];
        $file_tmp3 = $_FILES['img3']['tmp_name'];
        $file4 = $_FILES['img4']['name'];
        $file_tmp4 = $_FILES['img4']['tmp_name'];
        $file5 = $_FILES['img5']['name'];
        $file_tmp5 = $_FILES['img5']['tmp_name'];
        $data = [];
        $data = [$file1, $file2, $file3];
        $images = implode(' ', $data);


        if (!file_exists($location)) {
            mkdir($location);
        //     move_uploaded_file($file_tmp1, $location . $file1);
        //     move_uploaded_file($file_tmp2, $location . $file2);
        //     move_uploaded_file($file_tmp3, $location . $file3);
        //     move_uploaded_file($file_tmp4, $location . $file4);
        //     move_uploaded_file($file_tmp5, $location . $file5);
        //     echo "<script>
        // window.location.href='studentProfile.php';</script>";
        }
        
        else if(file_exists($location))
        { 
            if(!file_exists($location. $file1))
        { 
              move_uploaded_file($file_tmp1, $location . $file1);
                    echo "<script>
        window.location.href='studentProfile.php';</script>";
            
        }
        
         if(!file_exists($location. $file2))
        { 
              move_uploaded_file($file_tmp2, $location . $file2);
                    echo "<script>
        window.location.href='studentProfile.php';</script>";
            
        }
        
         if(!file_exists($location. $file3))
        { 
              move_uploaded_file($file_tmp3, $location . $file3);
                    echo "<script>
        window.location.href='studentProfile.php';</script>";
            
        }
        
         if(!file_exists($location. $file4))
        { 
              move_uploaded_file($file_tmp4, $location . $file4);
                    echo "<script>
        window.location.href='studentProfile.php';</script>";
            
        }
         if(!file_exists($location. $file5))
        { 
              move_uploaded_file($file_tmp5, $location . $file5);
                 
            
        }
               
            
        }
        
        else if(file_exists($location. $file2) AND file_exists($location. $file2) AND file_exists($location. $file2) AND file_exists($location. $file2) AND file_exists($location. $file2))
        {
            echo "<script>alert('Files uploaded successfully');
        window.location.href='studentProfile.php';</script>";
        }
        
        
       
        else {
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
?>

<script>
    // $(document).ready(function() {
    //     document.getElementById('img1').change(function(){
    Filevalidation = () => {
        const fi = document.getElementById('img1');
        const fi2 = document.getElementById('img2');
        const fi3 = document.getElementById('img3');
        const fi4 = document.getElementById('img4');
        const fi5 = document.getElementById('img5');
        const fi6 = document.getElementById('img6');
        const fi7 = document.getElementById('img7');


        // Check if any file is selected.
        if (fi.files.length > 0) {
            for (const i = 0; i <= fi.files.length - 1; i++) {

                const fsize = fi.files.item(i).size;
                console.log("I am file size ..  " + fsize);
                // const file = Math.round((fsize / 1024));
                // The size of the file.
                if (fsize > 1000000) {
                    alert(
                        "File too Big, please select a file less than or equal to 1MB");
                    fi.value = '';
                } else if (fsize < 4 * 1024) {
                    alert(
                        "File too small, please select a file greater than 4kb");
                    fi.value = '';
                } else {
                    document.getElementById('size').innerHTML = '<b>' +
                        file + '</b> KB';
                }
            }
        }


        // Check if any file is selected.
        if (fi2.files.length > 0) {
            for (const i = 0; i <= fi2.files.length - 1; i++) {

                const fsize2 = fi2.files.item(i).size;
                console.log("I am file size ..  " + fsize2);
                // const file = Math.round((fsize / 1024));
                // The size of the file.
                if (fsize2 > 1000000) {
                    alert(
                        "File too Big, please select a file less than or equal to 1MB");
                    fi2.value = '';
                } else if (fsize2 < 4 * 1024) {
                    alert(
                        "File too small, please select a file greater than 4kb");
                    fi2.value = '';
                } else {
                    document.getElementById('size').innerHTML = '<b>' +
                        file + '</b> KB';
                }
            }
        }
    


    if (fi3.files.length > 0) {
        for (const i = 0; i <= fi3.files.length - 1; i++) {

            const fsize3 = fi3.files.item(i).size;
            console.log("I am file size ..  " + fsize3);
            // const file = Math.round((fsize / 1024));
            // The size of the file.
            if (fsize3 > 1000000) {
                alert(
                    "File too Big, please select a file less than or equal to 1MB");
                fi3.value = '';
            } else if (fsize3 < 4 * 1024) {
                alert(
                    "File too small, please select a file greater than 4kb");
                fi3.value = '';
            } else {
                document.getElementById('size').innerHTML = '<b>' +
                    file + '</b> KB';
            }
        }
    }
    

    // Check if any file is selected.
    if (fi4.files.length > 0) {
        for (const i = 0; i <= fi4.files.length - 1; i++) {

            const fsize4 = fi4.files.item(i).size;
            console.log("I am file size ..  " + fsize4);
            // const file = Math.round((fsize / 1024));
            // The size of the file.
            if (fsize4 > 1000000) {
                alert(
                    "File too Big, please select a file less than or equal to 1MB");
                fi4.value = '';
            } else if (fsize4 < 4 * 1024) {
                alert(
                    "File too small, please select a file greater than 4kb");
                fi4.value = '';
            } else {
                document.getElementById('size').innerHTML = '<b>' +
                    file + '</b> KB';
            }
        }
    }



    // Check if any file is selected.
    if (fi5.files.length > 0) {
        for (const i = 0; i <= fi5.files.length - 1; i++) {

            const fsize5 = fi5.files.item(i).size;
            console.log("I am file size ..  " + fsize5);
            // const file = Math.round((fsize / 1024));
            // The size of the file.
            if (fsize5 > 1000000) {
                alert(
                    "File too Big, please select a file less than or equal to 1MB");
                fi5.value = '';
            } else if (fsize5 < 4 * 1024) {
                alert(
                    "File too small, please select a file greater than 4kb");
                fi5.value = '';
            } else {
                document.getElementById('size').innerHTML = '<b>' +
                    file + '</b> KB';
            }
        }
    }

}



    // }
</script>


<?php
include('footer.php');
?>

?>