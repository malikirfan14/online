<?php
session_start();
if(isset($_SESSION['adminName'])) {
    require('configure.php');
    
    // Check connection
    if ($conn === false) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    } else {
        $records_per_page = 1500; // Number of records to display per page
        $page = isset($_GET['page']) ? $_GET['page'] : 1; // Get the current page number
        
        // Calculate the offset for the SQL query
        $offset = ($page - 1) * $records_per_page;

        $var = "SELECT * FROM `registration_26to27` WHERE isVerified ='0' LIMIT $offset, $records_per_page";
        $connect = mysqli_query($conn, $var);
    }



}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<form action="" method="post">
    <div class="row justify-content-center" style="margin-top: 50px;">
        <div class="col-md-6 text-center">
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-sm btn-block" name="verifiedStudents">
                    Go to Verified Students
                </button>
            </div>
        </div>
    </div>
</form>
<?php
    if (isset($_POST['verifiedStudents'])) {

        echo "<script> 
        window.location.href='adminVerified.php';</script>";
       
                
      
    }

?>
<div class="container" style="display:contents;">


    <div class="row">
        <div class="col-lg-12">
            <h2>Unverified Students</h2>
            <div class="table">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>S.N</th>
                            <th>U.ID</th>                             
                            <th>ID</th>    
                            <th>Name</th>
                            <th>FatherName</th>
                            <th>Gender</th>
                            <!--<th>Email</th>-->
                            <th>S Mobile</th>
                            <th>CNIC</th>
                            <th>Matric</th>
                            <th>FSC</th>
                            <th>MDCAT</th>
                            <!--<th>MCAT Total</th>-->
                            <!--<th>MCAT Obtained</th>-->
                            <!--<th>UCAT Total</th>-->
                            <!--<th>UCAT Obtained</th>-->
                            <th>Agg</th>
                            <th>Year</th>                                    
                            <th>P/C/B</th> 
                            <th>Program</th>
                            <th>Update</th>
                            <th>MBBS</th>
                            <th>BDS</th>
                            <th>Doc</th>
                            <th>Verified</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sn = 1;
                        mysqli_data_seek($connect, 0); // Reset the result pointer to the beginning
                        while ($row = mysqli_fetch_array($connect)) {
                            if ($row['isVerified'] == '0') {
                                echo '<tr>';
                                echo '<td>' . $sn++ . '</td>';
                                echo '<td>' . $row['uhs_application_id'] ?? '' . '</td>';                                
                                echo '<td>' . $row['id'] ?? '' . '</td>';
                                echo '<td>' . $row['name'] ?? '' . '</td>';
                                echo '<td>' . $row['fname'] ?? '' . '</td>';
                                echo '<td>' . $row['gender'] ?? '' . '</td>';
                                echo '<td>' . $row['stdPhone'] ?? '' . '</td>';
                                echo '<td>' . $row['cnic'] ?? '' . '</td>';
                                echo '<td>' . $row['matricMarks'] ?? '' . '</td>';
                                echo '<td>' . $row['fscmarks'] ?? '' . '</td>';
                                echo '<td>' . $row['mcatr'] ?? '' . '</td>';
                                // echo '<td>' . $row['mcatTotalMarks'] ?? '' . '</td>';
                                // echo '<td>' . $row['mcatObtainedMarks'] ?? '' . '</td>';
                                // echo '<td>' . $row['ucatTotalMarks'] ?? '' . '</td>';
                                // echo '<td>' . $row['ucatObtainedMarks'] ?? '' . '</td>';
                                echo '<td>' . $row['aggregatePer'] ?? '' . '</td>';
                                echo '<td>' . $row['comYear'] ?? '' . '</td>';
                                echo '<td>' . $row['physics'] ?? '' . '</td>';
                                echo '<td>' . $row['program'] ?? '' . '</td>';

                                echo '<td>';
                                echo '<a href="adminEdit.php?cnic=' . $row['cnic'] . '">';
                                echo '<Button>Update</Button>';
                                echo '</a>';
                                echo '<br>';
                                echo '<a href="print.php?cnic=' . $row['cnic'] . '&id=' . $row['id'] . '">';
                                echo '<Button>Print</Button>';
                                echo '</a>';
                                echo '<br>';
                                echo '<a href="delete.php?cnic=' . $row['cnic'] . '&id=' . $row['id'] . '">';
                                echo '<Button>Delete</Button>';
                                echo '</a>';
                                echo '<br>';
                                echo '</td>';


                                echo '<td>';
                                if ($row['program'] == 'MBBS' || $row['program'] == 'BOTH') {
                                    if ($row['isChallanDone'] == '1') {
                                        echo '<button class="btn btn-success">MBBS.S</button>';
                                    } else {
                                        echo '<button class="btn btn-danger">C.MBBS</button>';
                                    }
                                }
                                echo '</td>';


                                echo '<td>';
                                if ($row['program'] == 'BDS' || $row['program'] == 'BOTH') {
                                    if ($row['isChallanDone'] == '1') {
                                        echo '<button class="btn btn-success">BDS.S</button>';
                                    } else {
                                        echo '<button class="btn btn-danger">C.BDS</button>';
                                    }
                                }
                                echo '</td>';


                                echo '<td>';
                                    if ($row['isDocumentsDone'] == '1') {
                                        echo '<button class="btn btn-success">D.Success</button>';
                                    } else {
                                        echo '<button class="btn btn-danger">D.Upload</button>';
                                    }
                                echo '</td>';



                                echo '<td>';
                                    if ($row['isVerified'] == '1') {
                                        echo '<button class="btn btn-success">Verified</button>';
                                    } else {
                                        echo '<button class="btn btn-danger">Not Verified</button>';
                                    }
                                echo '</td>';
                                
                            }
                        }
                        ?>
                    </tbody>
                </table>
                <div class="text-center"> <!-- Center align pagination links -->
                    <nav>
                        <ul class="pagination">
                            <?php
                            // Calculate the total number of pages
                            $total_pages_query = "SELECT COUNT(*) as total FROM `registration_26to27` WHERE isVerified ='0'";
                            $result = mysqli_query($conn, $total_pages_query);
                            $total_records = mysqli_fetch_assoc($result)['total'];
                            $total_pages = ceil($total_records / $records_per_page);

                            // Generate pagination links
                            for ($i = 1; $i <= $total_pages; $i++) {
                                echo "<li class='page-item'><a class='page-link' href='adminFetch.php?page=$i'>$i</a></li>";
                            }
                            ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
