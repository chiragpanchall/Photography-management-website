<?php
require_once('../DBCONNECT.php');
session_start();
//For loading the data
if ((isset($_SESSION['email'])) && (!empty($_SESSION['email']))) {
    $email = $_SESSION['email'];
    $getq = "Select * from user where User_Email = '$email'";
    $ds = mysqli_query($conn, $getq);
    $data = mysqli_fetch_array($ds);
    $profilepath = $data['User_Photo_Path'];
    $profile = "../Data/ProfilePic/" . $profilepath;
    
}
else {
    echo "<script>
         alert('Please Login With your Credential');
        window.location.href='../Login/index.html';
    </script>";
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Feedback</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abel">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abhaya+Libre">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abril+Fatface">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Aguafina+Script">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Akronim">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Aladin">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alegreya">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alfa+Slab+One">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Armata">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Bootstrap-4---Product-List.css">
    <link rel="stylesheet" href="assets/css/Date-Picker-From-and-To.css">
    <link rel="stylesheet" href="assets/css/Features-Boxed.css">
    <link rel="stylesheet" href="assets/css/Filterable-Gallery-with-Lightbox.css">
    <link rel="stylesheet" href="assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightpick@1.3.4/css/lightpick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="https://daneden.github.io/animate.css/animate.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="assets/css/Modal-commerce-popup-button-1.css">
    <link rel="stylesheet" href="assets/css/Modal-commerce-popup-button.css">
    <link rel="stylesheet" href="assets/css/MUSA_carousel-product-cart-slider-1.css">
    <link rel="stylesheet" href="assets/css/MUSA_carousel-product-cart-slider.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="assets/css/Newsletter-Subscription-Form.css">
    <link rel="stylesheet" href="assets/css/Pretty-Header.css">
    <link rel="stylesheet" href="assets/css/Pricing-Table-Style-01-1.css">
    <link rel="stylesheet" href="assets/css/Pricing-Table-Style-01.css">
    <link rel="stylesheet" href="assets/css/Pricing-Tables-1.css">
    <link rel="stylesheet" href="assets/css/Pricing-Tables.css">
    <link rel="stylesheet" href="assets/css/Product-Carousel-V11-1.css">
    <link rel="stylesheet" href="assets/css/Product-Carousel-V11.css">
    <link rel="stylesheet" href="assets/css/Product-Viewer-1.css">
    <link rel="stylesheet" href="assets/css/Profile-Edit-Form-1.css">
    <link rel="stylesheet" href="assets/css/Profile-Edit-Form.css">
    <link rel="stylesheet" href="assets/css/Responsive-feedback-form-1.css">
    <link rel="stylesheet" href="assets/css/Responsive-feedback-form.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/Team-Boxed.css">
</head>

<body style="background: var(--dark);">
    <nav class="navbar navbar-light navbar-expand-md custom-header" style="height: 115px;">
        <div class="container-fluid">
            <div><a class="navbar-brand text-white" href="#">SP Photography</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navbar-collapse"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button></div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav links">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="MyGallery.php">My Gallery</a></li>
                    <li class="nav-item"><a class="nav-link" href="My_Orders.php">My Orders<br></a></li>
                    <li class="nav-item"></li>
                </ul>
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"> <img class="dropdown-image" src="<?php echo $profile; ?>">
                    <?php echo $data['User_Fname'] ?>
                </a>
                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="EditProfile.php">Edit Profile</a><a class="dropdown-item" href="../LogOut.php">Logout </a></div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <!-- Feedback  -->
    <div class="container">
        <div id="form-div" style="margin: 45px;margin-right: 50px;margin-left: 50px;background: var(--dark);padding: 21px;">
            <form method="post" action=""<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="form-group" style="background: var(--dark);">
                    <div class="form-row">
                        <div class="col-md-12">
                            <h1 class="text-center" style="font-family: Alegreya, serif;font-size: 41px;margin: 10px;padding: 6px;background: var(--dark);color: #e0219e;"><strong>Feedback </strong></h1>
                        </div>
                    </div>
                    <hr id="hr" style="background-color:#c3bfbf;">
                    <div class="form-row" style="font-family:Armata, sans-serif;margin-top:10px;">
                        <div class="col-10 col-sm-10 col-md-8 offset-1 offset-sm-1 offset-md-2">
                            <p style="font-family: Armata, sans-serif;font-size: 22px;color: var(--light);"><strong>Say something&nbsp;&nbsp;About our service</strong><br></p>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-10 col-sm-10 col-md-8 offset-1 offset-sm-1 offset-md-2"><textarea id="feedback" class="form-control" style="font-family:Armata, sans-serif;font-size:15px;" name="feedback" maxlength="250" rows="7" placeholder="Give your valueble feedback" autofocus="" spellcheck="true" minlength="10" required></textarea></div>
                    </div>
                    <div class="form-row">
                        <div class="col-10 col-sm-10 col-md-8 offset-1 offset-sm-1 offset-md-2">
                            <p class="text-right" style="font-family: Armata, sans-serif;color: var(--light);"></p>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-9 col-sm-5 col-md-4 offset-1 offset-sm-4 offset-md-5">
                            <button class="btn btn-warning" style="font-family: Armata, sans-serif;font-size: 14px;color: var(--light);" type="reset">Reset </button>
                        <button class="btn btn-success" role="button" id="submit-btn" style="font-family: Armata, sans-serif;font-size: 14px;color: var(--light);"  onclick="return Pressme()">Submit </button></div>
                    </div>
                   
                    <?php 
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $fdb = $_POST['feedback'];
                        $dt = date("Y-m-d");
                        $id = $_GET['id'];
                       $fbq = "INSERT INTO `feedback` (`idFeedback`, `Feedback_Date`, `Feedback_Content`, `Printing_Order_idPrinting_Order`) VALUES (NULL, '$dt', '$fdb', '$id');";
                       $result = mysqli_query($conn,$fbq);
                       $POD = "UPDATE `printing_order` SET `Status`= 3 WHERE idPrinting_Order =  $id";
                       if(mysqli_query($conn, $POD)){
                           echo "<script>window.location.replace('index.php')</script>";
                       }

                    }
                    ?>
<script>
function Pressme(){
    //href="index.php";
    let fb = document.getElementById('feedback').value.trim(' ','');
    console.log(fb);
    if (fb==null || fb==""){  
      alert("feedback can't be blank"); 
      return false;

    }
    else if(fb.length < 6 || fb.length > 248 ){  
        alert("feedback must be at least 6 characters to 250 long..");  
        return false;
     }  
    else if (!isNaN(fb)){  
        alert("Enter valid feedback..");
        return false;
        }
     
else{
        alert('Thanks for your feedback');
        return true;
    }
}
</script>
                </div>
            </form>
        </div>
    </div>

<!--  -->


    <div class="footer-dark">
       
    <footer>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-3 item">
                <h3 style="color: #e0219e;">SP Photography</h3>
                <ul>
                    <li><a href="#">Our Service speaks who we are !</a></li>
                    <li></li>
                    <li></li>
                </ul>
            </div>
            <div class="col-sm-6 col-md-3 item">
                <h3 style="color: #e0219e;">About</h3>
                <ul>
                    <li style="margin: -15px;"><a href="#"><br>13,Sairam Complex Nikol,Ahmedabad<br><br>Call Us on : 7600526060<br><br></a></li>
                    <li style="margin: -26px;"><a href="#"><br>Mail us on : spphotography@gmail.com<br><br></a></li>
                    <li></li>
                </ul>
            </div>
            <div class="col-md-6 item text">
                <h3 style="color: #e0219e;">SP Photography studio</h3>
                <p>Based in the heart of Ahmedabad, Gujarat, SP Studio is one of the most spectacular photo studios furnished with 18+ sets, 50+ backdrops and 100+ shooting options to compliment &amp; glorify almost every occasion in your life. Whether you need a romantic backdrop for a pre-wedding photography or something modest and calm for the maternity photo shoot, we have it all under one roof<br><br></p>
            </div>
            <div class="col item social"><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-instagram"></i>
                </a>
            </div>
        </div>
        <p class="copyright">SP Photography © 2017</p>
    </div>
  </footer>

    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/smart-forms.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lightpick@1.3.4/lightpick.min.js"></script>
    <script src="assets/js/Date-Picker-From-and-To.js"></script>
    <script src="assets/js/Filterable-Gallery-with-Lightbox.js"></script>
    <script src="assets/js/Modal-commerce-popup-button.js"></script>
    <script src="assets/js/Pricing-Tables-1.js"></script>
    <script src="assets/js/Pricing-Tables.js"></script>
    <script src="assets/js/Product-Viewer-1-1.js"></script>
    <script src="assets/js/Product-Viewer-1.js"></script>
    <script src="assets/js/Profile-Edit-Form.js"></script>
</body>

</html>