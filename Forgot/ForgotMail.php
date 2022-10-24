<?php
if (isset($_POST['resetEmail'])) {
    require '../PHPMailer/PHPMailerAutoload.php';
    require_once('../DBCONNECT.php');
    $emailID = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $getData = "SELECT * FROM `user` WHERE User_Email = '$emailID';";
    $result = mysqli_query($conn, $getData);
    $cnt = mysqli_num_rows($result);

    if ($cnt > 0) {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array();
        $alphaLength = strlen($alphabet) - 1;
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        $newpassword = implode($pass);
        $newpass = password_hash(implode($pass),PASSWORD_DEFAULT); //Converting string from array.
        $getData = "UPDATE `user` SET `User_Password` = '$newpass' WHERE User_Email = '$emailID';";
        $result = mysqli_query($conn, $getData);
        if ($result == false) {
            echo "<script>alert('Something went wrong. Please try again..');</script>";
            mysqli_close($conn);
        } 
        else {
            //echo "<script>alert('$newpassword');</script>";
            $mail = new PHPMailer;
            $mail->isHTML(true);
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = '#Your ID';
            $mail->Password = '#Password'; 
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            $mail->isSMTP();
            $mail->setFrom('cpanchal1009@gmail.com', 'SP Photography');
            $mail->addAddress($emailID, 'SP Photography');
            $mail->Subject = 'Reset the password';
            $HtmlBody = '<h1 style="color: #5e9ca0; text-align: center;">SP Photography</h1>
            <h2 style="color: #2e6c80;">Reset the Password:</h2>
            <p>Your regenerated Password is : 
              <span style="color: #2e6c80;">
                <strong>'.$newpassword.'</strong> ;
              </span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            </p>
            <br>
            <a href="http://localhost/Final_Project/Login/index.html">Click here</a> 
            <br>
            <br>
            <h4 style="color: #2e6c80;">Important Note:</h4>
            <p>
              <span style="color: #000000;">Hereby, We Kindly request to you after login with the this credential please change the password.</span>
            </p>
            <p>
              <span style="color: #000000;">Do not reply to this email. This is machine generated email.</span>
            </p>
            <p>
              <strong>&nbsp;</strong>
            </p>';
            // $HtmlBody =   "I am expassword"; //file_get_contents('invoice.html');
             $mail->Body = $HtmlBody;
            
            if (!$mail->send()) {
                echo "<script>alert('Something went wrong ! Please try again');</script>";
                echo 'Mailer Error: ' . $mail->ErrorInfo;
                

            } else {
                echo "<script>alert('Check your Email');</script>";
                echo "<script> window.location.replace('index.php'); </script>";
            
            }
        
    }
    } else {
        echo "<script>alert('Please enter valid email ID.');</script>";
        echo "<script> window.location.replace('index.php'); </script>";
    }
}

?>

