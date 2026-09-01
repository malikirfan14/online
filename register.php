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
                        
                    <div class="alert alert-warning text-center fade show border-left-warning shadow-sm m-3 mb-0" role="alert">
                        <h6 class="text-danger mb-1">
                            <strong>🔔<br />Register now for BDS. MBBS registration has been closed.</strong>
                        </h6>
                        <span class="small font-weight-bold text-dark">Session 2026-27 | Apply NOW</span><br />
                        <span class="small text-muted">Complete Your Online Application !</span>
                    </div>

                    <?php if (isset($_GET['error'])): ?>
                        <div class="px-3 pt-3 mb-0">
                            <?php if ($_GET['error'] == 'already_registered'): ?>
                                <div class="alert alert-danger border-left-danger shadow-sm alert-dismissible fade show mb-0" role="alert">
                                    <div class="d-flex align-items-center">
                                        <div class="mr-3">
                                            <i class="fas fa-exclamation-triangle fa-2x text-danger"></i>
                                        </div>
                                        <div>
                                            <strong class="font-weight-bold d-block text-danger">Registration Failed!</strong>
                                            <span class="small">You have already registered against this CNIC or Email. Please login instead.</span>
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
                                            <strong class="font-weight-bold d-block text-warning">Incomplete Form!</strong>
                                            <span class="small">Please fill in all required fields to register.</span>
                                        </div>
                                    </div>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <div class="text-center my-3 px-3">
                        <a class="btn btn-danger btn-block btn-user font-weight-bold py-2 shadow-sm" href="login.php">
                            Already have an account? Login Here
                        </a>
                    </div>
                           

                        <div class="p-3 p-sm-4">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4 font-weight-bold">Create an Account!</h1>
                            </div>
                            <form class="user" action="register-back.php">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="exampleFirstName" class="form-label font-weight-bold text-gray-700 small mb-1 ml-1 d-block">
                                            Full Name <span class="text-muted font-weight-normal">(as per Matric Certificate)</span> <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="Full name as per Matric Certificate" name="logname" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="exampleLastName" class="form-label font-weight-bold text-gray-700 small mb-1 ml-1 d-block">
                                            Father / Guardian Name <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="Father / Guardian Name" name="fname" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail" class="form-label font-weight-bold text-gray-700 small mb-1 ml-1 d-block">
                                        Email Address <span class="text-danger">*</span>
                                    </label>
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Email Address" name="email" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleCnic" class="form-label font-weight-bold text-gray-700 small mb-1 ml-1 d-block">
                                        CNIC Number <span class="text-muted font-weight-normal">(Without Dashes e.g. 3040570401050)</span> <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control form-control-user" id="exampleCnic"
                                        placeholder="CNIC Number Without Dashes (3040570401050)" name="cnic" maxlength="13" minlength="13" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleStdPhone" class="form-label font-weight-bold text-gray-700 small mb-1 ml-1 d-block">
                                        Student Mobile Number <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control form-control-user" id="exampleStdPhone"
                                        placeholder="Student Mobile Number" name="stdPhone"
                                        maxlength="11" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" minlength="11" required>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label for="exampleInputPassword" class="form-label font-weight-bold text-gray-700 small mb-1 ml-1 d-block">
                                            Password <span class="text-danger">*</span>
                                        </label>
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password" name="password" required>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block font-weight-bold py-2 shadow">
                                    Register Account
                                </button>
                                <hr>
                            </form>
                            <div class="text-center">
                                <a class="small font-weight-bold" href="login.php">Already have an account? Login!</a>
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