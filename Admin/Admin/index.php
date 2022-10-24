<?php 
include("include/config.php"); 
session_start();
if ((isset($_SESSION['email'])) && (!empty($_SESSION['email']))) { 
  // header("location:login.php");
 //  echo '<script>alert("Welcome to Admin panel ");</script> ';

}
else {
  header("location:login.php");
  echo '<script>alert("Welcome to Admin panel");</script> ';
}
echo $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="en" class="loading">
<title>SP Photography Admin</title>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Convex admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Convex admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>SP Photography - [ Admin Panel ]</title>
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
    <link rel="stylesheet" type="text/css" href="vendors/css/chartist.min.css">
    <link rel="stylesheet" type="text/css" href="vendors/css/tables/datatable/datatables.min.css">

    <link rel="stylesheet" type="text/css" href="css/app.css">
  </head>
  <body data-col="2-columns" class=" 2-columns ">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="wrapper">

   <?php include("template/sidebar.php"); ?>

   <?php include("template/header.php"); ?>

   <?php //include("middlepage/home.php");

   @$page = $_REQUEST['page'];
   if ($page == "" &&  basename($_SERVER['PHP_SELF']) == "index.php") 
   {
       $page = "home";
   }
   if ($page != "" && file_exists("middlepage/".$page.'.php')) 
   {
      include("middlepage/".$page.'.php');
   }
   else
   {
      include("middlepage/404.php");
   }

    ?>
  
   <?php //include("template/footer.php"); ?>
     


    
     
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->


    <!-- BEGIN VENDOR JS-->
    <script src="vendors/js/core/jquery-3.3.1.min.js"></script>
    <script src="vendors/js/core/popper.min.js"></script>
    <script src="vendors/js/core/bootstrap.min.js"></script>
    <script src="vendors/js/perfect-scrollbar.jquery.min.js"></script>
    <script src="vendors/js/prism.min.js"></script>
    <script src="vendors/js/jquery.matchHeight-min.js"></script>
    <script src="vendors/js/screenfull.min.js"></script>
    <script src="vendors/js/pace/pace.min.js"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="vendors/js/datatable/datatables.min.js"></script>

    <script src="vendors/js/chartist.min.js"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN CONVEX JS-->
    <script src="js/app-sidebar.js"></script>
    <script src="js/notification-sidebar.js"></script>
    <script src="js/customizer.js"></script>
    <!-- END CONVEX JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="js/dashboard-ecommerce.js"></script>
    <!-- END PAGE LEVEL JS-->
    <script src="js/data-tables/datatable-basic.js"></script>
    
  </body>
</html>