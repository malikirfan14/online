<?php
session_start();
if(isset($_SESSION['adminName']))
{
    require('configure.php');
    // Check connection
    if ($conn === false) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    } else {
        $var = "SELECT * FROM `student_reg`";
        $connect = mysqli_query($conn, $var);
    
    ?>
    
    
        <!DOCTYPE html>
        <html>
    
        <head>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        </head>
    
        <body>
            <!--<div class="container">-->
            <div class="row">
                <div class="col-lg-12">
    
                    <div class="table">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>S.N</th>
                                    <th>Name</th>
                                    <th>FatherName</th>
                                    <th>Mobile Number</th>                                    
                                    <th>CNIC</th>
                                    <th>Email</th>
                                    <th>Password</th>                                    
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
                                            <td><?php echo $row['name'] ?? ''; ?></td>
                                            <td><?php echo $row['fname'] ?? ''; ?></td>
                                            <td><?php echo $row['stdPhone'] ?? ''; ?></td>
                                            <td><?php echo $row['cnic'] ?? ''; ?></td>
                                            <td><?php echo $row['email'] ?? ''; ?></td>
                                            <td><?php echo $row['password'] ?? ''; ?></td>
                                            <td>
                                                <!--<a href="adminEdit.php?cnic=<?php echo $row['cnic'] ?> &id=<?php echo $row['stdId'] ?>">-->
                                                <a href="adminEdit.php?id=<?php echo $row['stdId'] ?>">        
                                                    <Button>Update</Button>
                                                </a>
                                                
                                                
                                                  <a href="delete.php?cnic=<?php echo $row['cnic'] ?>&id=<?php echo $row['stdId'] ?>">
                                                    <Button>Delete</Button>
                                                </a>
                                            </td>
                                    <?php  }
                                } ?>
                                        </tr>
    
    
                                        <?php
    
    
    
                                    } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--</div>-->
        </body>
    
        </html>
    <?php
}
else{
    echo "<script>alert('Login Failed! Please make sure that you enter the correct details');
    window.location.href='adminLogin.php';</script>";
}
    ?>