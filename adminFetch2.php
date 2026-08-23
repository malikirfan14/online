<?php

session_start();

if(isset($_SESSION['adminName']))

{

    require('configure.php');

    // Check connection

    if ($conn === false) {

        die("ERROR: Could not connect. " . mysqli_connect_error());

    } else {

        $var = "SELECT * FROM `registration_26to27`";

        $connect = mysqli_query($conn, $var);

    

    ?>
<!DOCTYPE html>
    <html>
        <head>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        </head>
    <body>
        <div class="row">
            <div class="col-lg-12">
                <div class="table">
                    
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>S.N</th>
                                <th>S.N</th>    
                                <th>Name</th>
                                <th>FatherName</th>
                                <th>Email</th>
                                <th>S Mobile</th>
                                <th>F Mobile</th>
                                <th>E Mobile</th>
                                <th>City</th>                                    
                                <th>CNIC</th>
                                <th>Matric</th>
                                <!--<th>M-T</th>    -->
                                <th>FSC</th>
                                <!--<th>Year</th>   -->
                                <th>MDCAT</th>
                                <!--<th>M Year</th> -->
                                <th>Agg</th>
                                <th>P/C/B</th> 
                                <th>DOB</th> 
                                <th>CNIC Issue</th> 
                                <th>Program</th>
                                <th>Challan</th>
                                <th>Doc</th>                                     
                        </thead>
                    <tbody>

    <?php
        $sn = 1;
            if (mysqli_fetch_row($connect) > 0) {
            while ($row = mysqli_fetch_array($connect)) {
        $row['name'];
    ?>
        <tr>
            <td><?php echo $sn++; ?></td>
            <td><?php echo $row['id'] ?? ''; ?></td>
            <td><?php echo $row['name'] ?? ''; ?></td>
            <td><?php echo $row['fname'] ?? ''; ?></td>
            <td><?php echo $row['email'] ?? ''; ?></td>
            <td><?php echo $row['stdPhone'] ?? ''; ?></td>
            <td><?php echo $row['fatPhone'] ?? ''; ?></td>
            <td><?php echo $row['emergencyPhone'] ?? ''; ?></td>
            <td><?php echo $row['city'] ?? ''; ?></td>                                            
            <td><?php echo $row['cnic'] ?? ''; ?></td>
            <td><?php echo $row['matricMarks'] ?? ''; ?></td>
            <!--<td><?php echo $row['marksOutOf'] ?? ''; ?></td>                                            -->
            <td><?php echo $row['fscmarks'] ?? ''; ?></td>
            <!--<td><?php echo $row['comYear'] ?? ''; ?></td>-->
            <td><?php echo $row['mcatr'] ?? ''; ?></td>
            <!--<td><?php echo $row['mcat_passing_year'] ?? ''; ?></td>                                            -->
            <td><?php echo $row['aggregatePer'] ?? ''; ?></td>
            <td><?php echo $row['physics'] ?? ''; ?>/<?php echo $row['chemistry'] ?? ''; ?>/<?php echo $row['biology'] ?? ''; ?></td>                                            
            <td><?php echo $row['dob'] ?? ''; ?></td>
            <td><?php echo $row['cnic_issue_date'] ?? ''; ?></td>                                            
            <td><?php echo $row['program'] ?? ''; ?></td>
            

            <!--    <a href="adminEdit.php?cnic=<?php echo $row['cnic'] ?>">-->
            <!--        <Button>Update</Button>-->
            <!--    </a>-->
            <!--    </br>-->
            <!--     <a href="print.php?cnic=<?php echo $row['cnic'] ?>">-->
            <!--        <Button>Print</Button>-->
            <!--    </a>-->
            <!--    </br>-->
            <!--    <a href="delete.php?cnic=<?php echo $row['cnic'] ?>&id=<?php echo $row['id'] ?>">-->
            <!--        <Button>Delete</Button>-->
            <!--    </a>-->
            <!--    </br>-->

<td>
    <?php 
        $folder1 = 'uploads_26to27/challans/mbbs/'.$row['cnic'];
        // $folder2 = 'challanBDS/'.$row['cnic'];
        // $folder3 = 'challanMBBS/'.$row['cnic'];
        if(is_dir($folder1) || is_dir($folder2) || is_dir($folder3))
        {
        echo '
        <a><button class="btn btn-success">MBBS.S</button></a>';
        }
        else
        {
        echo '
        <button type="button" class="btn btn-danger">C.MBBS</a></button>';
        // <a href="uploadChallan.php" style = "color : White; " >C.MBBS</a></button>';
        }
    ?>
</td>

<td>
    <?php 
        $folder1 = 'uploads_26to27/challans/bds/'.$row['cnic'];
        // $folder2 = 'challanBDS/'.$row['cnic'];
        // $folder3 = 'challanMBBS/'.$row['cnic'];
        if(is_dir($folder1) || is_dir($folder2) || is_dir($folder3))
        {
        echo '
        <a><button class="btn btn-success">BDS.S</button></a>';
        }
        else
        {
        echo '
        <button type="button" class="btn btn-danger">C.BDS</a></button>';
        // <a href="uploadChallan.php" style = "color : White; " >C.BDS</a></button>';
        }
    ?>
</td>

<td>
    <?php 
        $folder1 = 'uploads_26to27/documents/'.$row['cnic'];
        if(is_dir($folder1))
        {
        echo '
        <button class="btn btn-success">D.Success</button>';
        }
        else
        {
        echo '
        <button type="button" class="btn btn-danger">D.Upload</a></button>';
        // <a href="multiple.php" style = "color : White; " >D.Upload</a></button>';
        }
    ?>
</td>

    <?php  
        }
        } 
    ?>
</tr>

<tr>
    <td colspan="12"></td>
</tr>
    <?php
    } ?>
</tbody>
</table>
</div>
</div>
</div>
</body>
</html>
    <?php
        }
        else{
        echo "<script>alert('Login Failed! Please make sure that you enter the correct details');
        window.location.href='adminLogin.php';</script>";
        }
    ?>