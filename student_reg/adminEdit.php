<?php
session_start();
if(isset($_SESSION['adminName']))
{
require('configure.php');
include('linkss.php');
include('header.php');
  // Check connection
  if($conn === false)
  {
      die("ERROR: Could not connect. " . mysqli_connect_error());
  }
  else
  {
    $cnic = $_GET['cnic'];
     $id = $_GET['id'];
    // if(isset($_GET['cnic']) != "")
    if(isset($_GET['id']) != "")    
    {
     session_start();
     $logname = $_SESSION['logname'];
      $term = $_REQUEST['term'];
      // $query = "SELECT * FROM `student_reg` Where  cnic = '$cnic' AND stdId = '$id'";
      $query = "SELECT * FROM `student_reg` Where stdId = '$id'";      

      $result=mysqli_query($conn,$query);
      if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){

?>

<script>
    jQuery(document).ready(function($) {
        $(".scroll").click(function(event){     
            event.preventDefault();
            $('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
        });
    });
</script><!-- //Smooth-Scrolling --><!-- Calender-JavaScript -->



<!------ Include the above in your HEAD tag ---------->

<div class="container">
            <form class="form-horizontal" action="recordUpdatedByAdmin.php" id ="rform" role="form" >
                <h2>Update Record </h2>
                
              <div class="form-group" >
                    <label for="cnic" class="col-sm-3 control-label" >ID</label>
                    <div class="col-sm-9">
                        <input type="text" id="id" name="id" value="<?php echo $id?>" class="form-control"   >
                    </div>
                </div>
                <div class="form-group" >
                    <label for="cnic" class="col-sm-3 control-label" >CNIC</label>
                    <div class="col-sm-9">
                        <input type="text" id="cnic" name="cnic" value="<?php echo $row['cnic']?>" class="form-control"   >
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label" >Student Name</label>
                    <div class="col-sm-9">
                        <input type="text" id="name" name="name" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p,p, p);" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" value="<?php echo $row['name']?>" class="form-control" autofocus   >
                    </div>
                </div>
                <div class="form-group">
                    <label for="fname" class="col-sm-3 control-label">Father Name</label>
                    <div class="col-sm-9">
                        <input type="text" id="fname" name="fname" value="<?php echo $row['fname']?> " oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" class="form-control" autofocus  >
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="stdPhone" class="col-sm-3 control-label">Student Phone Number</label>
                    <div class="col-sm-9">
                        <input type="text" id="stdPhone" name="stdPhone" value="<?php echo $row['stdPhone']?> "  class="form-control" autofocus  >
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-9">
                        <input type="text" id="email" name="email" value="<?php echo $row['email']?> "  class="form-control" autofocus  >
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Password</label>
                    <div class="col-sm-9">
                        <input type="text" id="password" name="password" value="<?php echo $row['password']?> "  class="form-control" autofocus  >
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-block">Update</button>
            </form> <!-- /form -->
        </div>
         <!-- ./container -->
    
 

</body>

</html>
 
     <?php
    }
  mysqli_free_result($result); 
}
}
//  else{
//     echo "<script>alert('Enter valid Application ID');
//         window.location.href='updateResult.php';</script>";
// }
}
}  //  session_destroy();
?>