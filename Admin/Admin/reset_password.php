<?php include("config.php");
?>


<!DOCTYPE html>
<html lang="en" class="loading">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Convex admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Convex admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Forgot Password Page </title>
    <link rel="apple-touch-icon" sizes="60x60" href="img/ico/apple-icon-60.html">
    <link rel="apple-touch-icon" sizes="76x76" href="img/ico/apple-icon-76.html">
    <link rel="apple-touch-icon" sizes="120x120" href="img/ico/apple-icon-120.html">
    <link rel="apple-touch-icon" sizes="152x152" href="img/ico/apple-icon-152.html">
    <link rel="shortcut icon" type="image/x-icon" href="https://pixinvent.com/demo/convex-bootstrap-admin-dashboard-template/app-assets/img/ico/favicon.ico">
    <link rel="shortcut icon" type="image/png" href="img/ico/favicon-32.png">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900%7CMontserrat:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="fonts/feather/style.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/simple-line-icons/style.css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="vendors/css/perfect-scrollbar.min.css">
    <link rel="stylesheet" type="text/css" href="vendors/css/prism.min.css">
    <link rel="stylesheet" type="text/css" href="css/app.css">
  </head>
  <body data-col="1-column" class=" 1-column  blank-page blank-page">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="wrapper"><!--Forgot Password Starts-->
<section id="forgot-password">
    <div class="container-fluid">
        <div class="row full-height-vh">
            <div class="col-12 d-flex align-items-center justify-content-center gradient-aqua-marine">
                <div class="card px-4 py-2 box-shadow-2">
                    <div class="card-header text-center">
                        <img src="img/logos/logo-color-big.png" alt="company-logo" class="mb-3" width="80">
                        <h4 class="text-uppercase text-bold-400 grey darken-1">Reset Password</h4>
                    </div>
                     <?php if(isset($_SESSION['ErrPass']) && $_SESSION['ErrPass']) { echo $_SESSION['ErrPass'];unset($_SESSION['ErrPass']);  } ?>
                    <div class="card-body">
                        <div class="card-block">
                            <form class="pt-2" method="post" action="resset_action.php">
                                <div class="form-group">
                                    <input type="email" value="<?php if(isset($_SESSION['email'])) echo $_SESSION['email']; ?>" class="form-control form-control-lg" name="email" id="inputEmail" placeholder="Your Email Address" disabled="" >
                                </div>

                                   <div class="form-group">
                                    <input type="Password" class="form-control form-control-lg" name="newpassword" id="inputEmail" placeholder="Your New Password" required>
                                </div>

                                   <div class="form-group">
                                    <input type="Password" class="form-control form-control-lg" name="cpassword" id="inputEmail" placeholder="Enter Confirm Password" required>
                                </div>


                                <div class="form-group pt-2">
                                    <div class="text-center mt-3">
                                        <input type="submit" name="submit" class="btn btn-danger px-4 py-2 text-uppercase white font-small-4 box-shadow-2 border-0">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer grey darken-1">
                            <div class="float-left"><a>Login</a></div>
                            <!-- <div class="float-right">New User? <a>Register Now</a></div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Forgot Password Ends-->
    </div>
    <script src="vendors/js/core/jquery-3.3.1.min.js"></script>
    <script src="vendors/js/core/popper.min.js"></script>
    <script src="vendors/js/core/bootstrap.min.js"></script>
    <script src="vendors/js/perfect-scrollbar.jquery.min.js"></script>
    <script src="vendors/js/prism.min.js"></script>
    <script src="vendors/js/jquery.matchHeight-min.js"></script>
    <script src="vendors/js/screenfull.min.js"></script>
    <script src="vendors/js/pace/pace.min.js"></script>
    <script src="js/app-sidebar.js"></script>
    <script src="js/notification-sidebar.js"></script>
    
  </body>
</html>