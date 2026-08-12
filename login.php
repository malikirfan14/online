<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Security-Policy" content=" ... ">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

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

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                    
                    <div class="alert alert-warning text-center fade show" role="alert">
                    <h6 class="text-danger"> <strong>🔔
                    <!--<br /> Complete Your Application & Upload Your Challan / Documents!<br />-->
                    <!--<br />Last Date to Apply for MBBS 29th December, 2022 (3:00 PM)<br />-->
                    <!--<br />Last Date to Apply for BDS 1st February, 2023 (3:00 PM)<br />-->
                    <!-- <br />Apply now against MBBS Vacant Sets as per Punjab Govt. Notification<br /> -->
                     <br />Register now for BDS. MBBS registration has been closed.<br />
                    <br /><a class="small" href="/online/register.php">Register Now for Session 2025-2026 </a>
                    </strong> </h6>

                    <!--<button type="button" class="close" data-dismiss="alert" aria-label="Close">-->
                    <!--    <span aria-hidden="true">Ã—</span>-->
                    <!--        </button>-->
                    </div>
                            <div class="text-center">
<!--                                <a class="btn btn-info btn-sm right" href="login.php" role="button">Already have an account? Login!</a>-->
<div class="btn-group" role="group" aria-label="Basic mixed styles example">
  <a button type="button" class="btn btn-danger" href="#">Login Page</button></a>
  <a button type="button" class="btn btn-success" href="register.php">Register Now</button></a>
</div>                      
                                
                                <div class="p-3">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome!</h1>
                                    </div>
                                    <form class="user" action="studentloginback.php">
                                        <div class="form-group">
                                            <input type="tel" id="telle" maxlength="15" class="form-control form-control-user"
                                                 aria-describedby="emailHelp"
                                                placeholder="CNIC NUMBER (30405-7040105-0)" name="logname"  required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="PASSWORD" name = "password" required>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                         <button type="submit" class="btn btn-primary btn-block">Login</button>
                                        <!--<a href="index.html" class="btn btn-primary btn-user btn-block">-->
                                        <!--    Login-->
                                        <!--</a>-->
                                        <hr>
                                        <!--<a href="index.html" class="btn btn-google btn-user btn-block">-->
                                        <!--    <i class="fab fa-google fa-fw"></i> Login with Google-->
                                        <!--</a>-->
                                        <!--<a href="index.html" class="btn btn-facebook btn-user btn-block">-->
                                        <!--    <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook-->
                                        <!--</a>-->
                                    </form>
                                    <hr>
                                    <!-- <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div> -->
                                    <div class="text-center">
                                        <!--<a class="small" href="register.php">Create an Account!</a>-->
                                        <!--<a class="small" href="/online/register.php">Apply Now for Registration</a>                                        -->
                                    </div>
                                </div>
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

    <!--<script type="text/javascript">-->
    <!--    $(function () {-->
    <!--        $('[id*=txtData1]').on('keypress', function () {-->
    <!--            var number = $(this).val();-->
    <!--            if (number.length == 5) {-->
    <!--                $(this).val($(this).val() + '-');-->
    <!--            }-->
    <!--            else if (number.length == 13) {-->
    <!--                $(this).val($(this).val() + '-');-->
    <!--            }-->
    <!--        });-->
    <!--    });-->

    <!--    </script>-->
    
    <script>
        var tele = document.querySelector('#telle');

tele.addEventListener('keyup', function(e){
  if (event.key != 'Backspace' && (tele.value.length === 5 || tele.value.length === 13)){
  tele.value += '-';
  }
});

    </script>
</body>

</html>