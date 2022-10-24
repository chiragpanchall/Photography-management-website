
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title> Forgot Password </title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/visionae-reset-password-1.css">
    <link rel="stylesheet" href="assets/css/visionae-reset-password.css">
</head>

<body>
    <div class="login-clean">
        <form method="post" action="ForgotMail.php">
            <h2 class="sr-only">Login Form</h2>
            <h3 class="text-center" style="margin: 10px;">
                <!--  <img src="assets/img/visionae-logo.png" width="216px"> -->Forgot your password ?</h3>
            <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email" required style="padding-top: 10px;"></div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit" name="resetEmail" style="background-color: #003dff;">Reset my password !</button></div><a class="forgot" href="..\Login\index.html">Remember it ?</a>
        </form>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>