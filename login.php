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
                    
                    <div class="alert alert-warning text-center fade show border-left-warning shadow-sm m-3 mb-0" role="alert">
                        <h6 class="text-danger mb-1">
                            <strong>🔔<br />Register now for BDS. MBBS registration has been closed.</strong>
                        </h6>
                        <a class="small font-weight-bold text-primary" href="register.php">Register Now for Session 2026-2027</a>
                    </div>

                    <?php if (isset($_GET['error'])): ?>
                        <div class="px-3 pt-3 mb-0">
                            <?php if ($_GET['error'] == 'login_failed'): ?>
                                <div class="alert alert-danger border-left-danger shadow-sm alert-dismissible fade show mb-0" role="alert">
                                    <div class="d-flex align-items-center">
                                        <div class="mr-3">
                                            <i class="fas fa-exclamation-triangle fa-2x text-danger"></i>
                                        </div>
                                        <div>
                                            <strong class="font-weight-bold d-block text-danger">Login Failed!</strong>
                                            <span class="small">Please make sure that you enter the correct details.</span>
                                        </div>
                                    </div>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php elseif ($_GET['error'] == 'missing_fields'): ?>
                                <div class="alert alert-warning border-left-warning shadow-sm alert-dismissible fade show mb-0" role="alert">
                                    <div class="d-flex align-items-center">
                                        <div class="mr-3">
                                            <i class="fas fa-exclamation-circle fa-2x text-warning"></i>
                                        </div>
                                        <div>
                                            <strong class="font-weight-bold d-block text-warning">Required Fields Missing!</strong>
                                            <span class="small">Please enter your CNIC and Password to login.</span>
                                        </div>
                                    </div>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <?php if (isset($_GET['success']) && $_GET['success'] == 'registered'): ?>
                        <div class="px-3 pt-3 mb-0">
                            <div class="alert alert-success border-left-success shadow-sm alert-dismissible fade show mb-0" role="alert">
                                <div class="d-flex align-items-center">
                                    <div class="mr-3">
                                        <i class="fas fa-check-circle fa-2x text-success"></i>
                                    </div>
                                    <div>
                                        <strong class="font-weight-bold d-block text-success">Registration Successful!</strong>
                                        <span class="small">Pre-Registration form submitted. Check your email for login details.</span>
                                    </div>
                                </div>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="text-center my-3 px-3">
                        <a class="btn btn-success btn-block btn-user font-weight-bold py-2 shadow-sm" href="register.php">
                            <i class="fas fa-user-plus mr-1"></i> New Student? Register Now
                        </a>
                    </div>
                                
                                <div class="p-3 p-sm-4">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4 font-weight-bold">Welcome Back!</h1>
                                    </div>
                                    <form class="user" action="login-back.php">
                                        <div class="form-group text-left">
                                            <label for="telle" class="form-label font-weight-bold text-gray-700 small mb-1 ml-1 d-block">
                                                CNIC Number <span class="text-danger">*</span>
                                            </label>
                                            <input type="tel" id="telle" maxlength="15" class="form-control form-control-user"
                                                aria-describedby="emailHelp"
                                                placeholder="CNIC NUMBER (30405-7040105-0)" name="logname" required>
                                        </div>
                                        <div class="form-group text-left">
                                            <label for="exampleInputPassword" class="form-label font-weight-bold text-gray-700 small mb-1 ml-1 d-block">
                                                Password <span class="text-danger">*</span>
                                            </label>
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="PASSWORD" name="password" required>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember Me</label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block font-weight-bold py-2 shadow">
                                            Login
                                        </button>
                                        <hr>
                                    </form>
                                    <div class="text-center">
                                        <a class="small font-weight-bold" href="register.php">Don't have an account? Register Now!</a>
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