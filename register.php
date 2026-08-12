<?php


session_start();


?>


<!DOCTYPE html>
<html lang="en">

<head>
<meta http-equiv="Content-Security-Policy" content=" ... ">
    <meta charset="utf-8">
    <!--<meta http-equiv="X-UA-Compatible" content="IE=edge">-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>WMDC - Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../images/favicon.png" rel="shortcut icon" type="image/png" />
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        
                    <div class="alert alert-warning text-center fade show" role="alert">
                    <h6 class="text-danger"> <strong>🔔<br /> 
    
                    <!--<br />Last Date to Apply for MBBS 29th December, 2023 (3:00 PM)<br />-->
                    <!-- <br />Apply now against MBBS Vacant Sets as per Punjab Govt. Notification -->
                    <br />Register now for BDS. MBBS registration has been closed.    
                    </strong> </h6>
                    <br />Session 2025-26
				    <br />Apply NOW 
                    <br />Complete Your Online Application !<br />
                    <!--<button type="button" class="close" data-dismiss="alert" aria-label="Close">-->
                    <!--    <span aria-hidden="true">Ã—</span>-->
                    <!--        </button>-->
                    </div>
                            <div class="text-center">
<!--                                <a class="btn btn-info btn-sm right" href="login.php" role="button">Already have an account? Login!</a>-->
<div class="btn-group" role="group" aria-label="Basic mixed styles example">
  <a button type="button" class="btn btn-danger" href="login.php">Already have an account ? Login</button></a>
  <a button type="button" class="btn btn-success" href="#">Registration Page</button></a>
</div>                                 
                            </div>
                           

                        <div class="p-3">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" action="studentreg.php" >
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="Full name as per Matric Certificate" name = "logname" required>
                                            <!-- <br/> -->
                                            <!-- <span class="help-block">Full name as per Matric certificate</span> -->
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="Father / Guardian Name" name="fname" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Email Address" name="email" required>
                                </div>
                                
                                  <div class="form-group">
                                       <input type="text"   class="form-control form-control-user" 
                                        placeholder="CNIC Number Without Dashes (3040570401050)" name="cnic" maxlength="13" minlength="13" required >
                                    <!--<input type="tel" id="telle" maxlength="15"  class="form-control form-control-user" -->
                                    <!--    placeholder="CNIC" name="cnic" maxlength="15"  >-->
                                        <!-- <a id="txt">Result</a>  -->
                                    </div>
                                
                                  <div class="form-group">
                                    <!--<input type="text" class="form-control form-control-user" id="exampleInputEmail"-->
                                    <!--    placeholder="Phone Number" name="stdPhone"-->
                                    <!--     oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" >-->
                                    
                                    <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Student Mobile Number" name="stdPhone"
                                         maxlength="11" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" minlength="11" required>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password" name = "password" required>
                                    </div>
                                    <!--<div class="col-sm-6">-->
                                    <!--    <input type="password" class="form-control form-control-user"-->
                                    <!--        id="exampleRepeatPassword" placeholder="Repeat Password">-->
                                    <!--</div>-->
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>
                                <hr>
                               
                            </form>
                            <hr>
                            <div class="text-center">
                                <!-- <a class="small" href="forgot-password.html">Forgot Password?</a> -->
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.php">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    
// <script type="text/javascript">

 var tele = document.querySelector('#telle');

tele.addEventListener('keyup', function(e){
  if (event.key != 'Backspace' && (tele.value.length === 5 || tele.value.length === 13)){
  tele.value += '-';
  }
});


//         $(function () {
//             $('[id*=txtData1]').on('keypress', function () {
//                 var number = $(this).val();
//                 if (number.length == 5) {
//                     $(this).val($(this).val() + '-');
//                 }
//                 else if (number.length == 13) {
//                     $(this).val($(this).val() + '-');
//                 }
//             });
//         });



    // $(document).ready(function () {
    //     $('#txt').keyup(function (event) {
    //         addHyphen (this);
    //     });
    // });

    // function addHyphen (element) {
    //     let val = $(element).val().split('-').join('');   // Remove dash (-) if mistakenly entered.
    //     // if (!field.val().match(/^[0-9]{8,15}$/))
    //     let finalVal = val.match(/.{1,5} * {1,70}/g).join('-');    // Add (-) after 3rd every char.
    //     $(element).val(finalVal);		// Update the input box.
    
    //     // let finalVal = val.match(/.{1,7}/g).join('-');    // Add (-) after 3rd every char.
    //     // $(element).val(finalVal);	
    // }


</script>
</body>

</html>