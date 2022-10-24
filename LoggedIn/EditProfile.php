<?php
require_once('../DBCONNECT.php');
session_start();
//For loading the data
if ((isset($_SESSION['email'])) && (!empty($_SESSION['email']))) {
    $email = $_SESSION['email'];
    $getq = "Select * from user where User_Email = '$email'";
    $ds = mysqli_query($conn, $getq);
    //$cnt = mysqli_num_rows($ds);
    //echo "<script>alert('$cnt');</script>";
    $data = mysqli_fetch_array($ds);
    $firstname = $data['User_Fname'];
    $lastname = $data['User_Lname'];
    $email = $data['User_Email'];
    $contact = $data['User_MobileNo'];
    $profilepath = $data['User_Photo_Path'];
    $profile = "../Data/ProfilePic/" . $profilepath;
    //echo "<script>alert('$profile');</script>";
    //echo "<script>alert('$firstname');</script>";
    $password = $data['User_Password']; //Hashed password and reccommended
    //$password = $_SESSION['password']; //Original password but not good practise
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
    <title> Edit Profile</title>
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

<body style="background: var(--dark);color: var(--light);">
    <nav class="navbar navbar-light navbar-expand-md custom-header" style="height: 115px;">
        <div class="container-fluid">
            <div><a class="navbar-brand text-white" href="#">SP Photography</a><button data-toggle="collapse"
                    class="navbar-toggler" data-target="#navbar-collapse"><span class="sr-only">Toggle
                        navigation</span><span class="navbar-toggler-icon"></span></button></div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav links">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="MyGallery.php">My Gallery</a></li>
                    <li class="nav-item"><a class="nav-link" href="My_Orders.php">My Orders<br></a></li>
                    <li class="nav-item"></li>
                </ul>
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" data-toggle="dropdown"
                            aria-expanded="false" href="#"> <img class="dropdown-image" src="<?php echo $profile?>">
                            <?php echo $firstname ?>

                        </a>
                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item"
                                href="EditProfile.php">Edit Profile</a><a class="dropdown-item"
                                href="../LogOut.php">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div style="background: rgba(108,117,125,0);"></div>
    <div style="background: rgba(108,117,125,0);"></div>
    <div style="background: rgba(108,117,125,0);"></div>
    <div style="margin: 39px;">
        <div class="container profile profile-view" id="profile" style="background: var(--dark);">
            <div class="row">
                <div class="col-md-12 alert-col relative">
                    <div class="alert alert-info absolue center" role="alert"><button type="button" class="close"
                            data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">×</span></button><span>Profile save with success</span></div>
                </div>
            </div>
            <form method="post" action="EditProfileData.php" enctype="multipart/form-data">
                <div class="form-row profile-row">
                    <div class="col-md-4 relative">
                        <div class="avatar custom-avatar-cd">
                            <div class="tada animated avatar-bg userProfilePhoto center"
                                style="color: var(--light);background-image:url('<?php echo $profile; ?>') !important;">
                            </div>
                        </div>
                        <br />
                        <button type="button" class="btn btn-link" onclick="myFunction()">Change Profile Photo</button>
                        <script>
                        function myFunction() {
                            if (document.getElementById("filecntl").disabled == true) {
                                document.getElementById("filecntl").disabled = false;
                            } else {
                                document.getElementById("filecntl").value = "";
                                document.getElementById("filecntl").disabled = true;
                            }
                        }
                        </script>

                        <input type="file" id="filecntl" class="form-control" name="avatar-file" onchange="readURL(this)" required="" disabled
                            style="background: var(--dark);color: var(--light);">
                        <script>
                        function readURL(input) {

                            if (input.files && input.files[0]) {
                                var reader = new FileReader();

                                reader.onload = function(e) {
                                    $('.avatar-bg').css({
                                        'background': 'url(' + e.target.result + ')',
                                        'background-size': 'cover',
                                        'background-position': '50% 50%'
                                    });
                                };

                                reader.readAsDataURL(input.files[0]);
                            }
                        }
                        $("input.form-control[name=avatar-file]").change(function() {
                            readURL(this);
                        });
                        </script>

                    </div>
                    <div class="col-md-8">
                        <h1 style="color: #e0219e;font-family: Armata, sans-serif;">Profile </h1>
                        <hr>
                        <div class="form-row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group"><label style="color: var(--light);">Firstname </label>
                                    <input class="form-control" type="text" name="firstname"
                                        value="<?php echo $firstname ?>" required="" minlength="3" maxlength="20"></div>
                            </div>

                            <div class="col-sm-12 col-md-6">
                                <div class="form-group"><label style="color: var(--light);">Lastname </label>
                                    <input class="form-control" type="text" name="lastname" required="" minlength="3"
                                        maxlength="20" value="<?php echo $lastname ?>"></div>
                            </div>
                        </div>

                        <div class="form-group"><label style="color: var(--light);">Email </label>
                            <input class="form-control" type="email" autocomplete="on" required="" name="email"
                                value="<?php echo $email ?>" disabled>
                        </div>

                        <div class="form-group"><label style="color: var(--light);">Contact Number</label>
                            <input class="form-control" type="text" autocomplete="on" name="MobileNumber" required=""
                                minlength="10" maxlength="10" inputmode="tel" value="<?php echo $contact ?>">
                        </div>

                        <div class="form-row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group"><label style="color: #f8f9fa;">Password </label><input
                                        class="form-control" type="password" name="password" autocomplete="off"
                                        required="" value="<?php echo $password ?>"></div>

                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group"><label style="color: var(--light);">Confirm
                                        Password</label><input class="form-control" type="password" name="confirmpass"
                                        autocomplete="off" required="" value="<?php echo $password ?>"></div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="col-md-12 content-right">
                                <!--  <a class="btn btn-primary form-btn" role="button"  type="submit"  name="savebtn">SAVE</a> -->
                                <button class="btn btn-primary form-btn" type="submit" name="submit"> SAVE </button>
                                <!--Button not works as intended..So changed -->
                                <a class="btn btn-danger" href="index.php" role="button" name="cancelbtn">CANCEL</a>
                                <!-- Changed button 
                               <button class="btn btn-danger form-btn" type="reset" >CANCEL </button>  -->

                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div style="margin: 55px;padding: 3px;">
        <div class="text-center"><a class="btn btn-primary" data-toggle="collapse" aria-expanded="false"
                aria-controls="collapse-1" href="#collapse-1" role="button"
                style="width: 285px;margin: 0px;padding: 18px;">Show Comments</a>
                <!--  -->
                <!-- `idPrinting_Order` -->
                <?php
              $getQ = "SELECT `printing_order`.*, `printing_order_details`.`Printing_Order_idPrinting_Order_Details`, `feedback`.*, `user`.* FROM `printing_order`  LEFT JOIN `printing_order_details` ON  `printing_order_details`.`Printing_Order_idPrinting_Order_Details` = `printing_order`.`idPrinting_Order`  LEFT JOIN `feedback` ON `feedback`.`Printing_Order_idPrinting_Order` = `printing_order`.`idPrinting_Order` LEFT JOIN `user` ON `printing_order`.`User_idUser` = `user`.`idUser` WHERE user.User_Email = '$email'";
                  
             $Result = mysqli_query($conn,$getQ) or die("Error Occured".mysqli_error($conn));
              if(mysqli_num_rows($Result) == 0){ 
              echo '
              <table class="table">
              <tbody>
                  <tr class="text-break">
                      <td class="text-center" colspan="2"
                          style="margin: 0px;padding: 4px;border-style: none;">
                          <div class="table-responsive table-bordered border rounded-0 border-secondary">
                              <table class="table table-bordered">
                                  <tbody style="color: var(--light);border-style: none;">
                                     <tr>
                                          <td class="text-center border-dark" colspan="2" style="color: var(--white);">
                                          No feedback found..
                                          </td>
                                      </tr>
                                  </tbody>
                              </table>
                          </div>
                      </td>
                   </tr>
                  </tbody>
                  </table>';
            }
            else { 
            ?>
            


                <!--  -->

<div class="collapse" id="collapse-1">
                <div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 110px;color: var(--light);">Order Date</th>
                                    <th style="color: var(--light);">Comment date</th>
                                    <th colspan="2" style="color: var(--light);">Comment</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- <tr style="margin: 5px;">
                                    <td style="width: 110px;color: var(--light);">28/12/2020</td>
                                    <td style="color: var(--light);">10/1/2021</td>
                                    <td style="color: var(--light);">Good Services at all &nbsp;</td>
                                    <td style="padding: 7px;"><button class="btn btn-danger btn-lg text-center"
                                            type="button">✗</button></td>
                                </tr> -->
                                
                                <?php
                                      
                while($row = mysqli_fetch_array($Result)){
                    
                     if(($row['Feedback_Content'] != NULL)){
                     echo '<tr style="margin: 5px;">
                     <td style="width: 110px;color: var(--light);">'.$row['Feedback_Date'].'</td>
                     <td style="color: var(--light);">'.$row['Printing_Order_Date'].'</td>
                     <td style="color: var(--light);">'.$row['Feedback_Content'].' &nbsp;</td>
                    
                 </tr>';
                    }
                    } 
               }
             ?>

                                <!--  <tr style="margin: 5px;">
                                    <td style="width: 110px;color: var(--light);">5/1/2021</td>
                                    <td style="color: var(--light);">10/1/2021</td>
                                    <td style="color: var(--light);">Best prodcut and fast delivery &nbsp;</td>
                                    <td style="padding: 7px;"><button class="btn btn-danger btn-lg text-center"
                                            type="button">✗</button></td>
                                </tr>
                                <tr style="margin: 5px;">
                                    <td style="width: 110px;color: var(--light);">2/12/2020</td>
                                    <td style="color: var(--light);">10/12/2021</td>
                                    <td style="color: var(--light);">
                                    Nice Experience with SP photography portal
                                    &nbsp;</td>
                                    <td style="padding: 7px;"><button class="btn btn-danger btn-lg text-center"
                                            type="button">✗</button></td>
                                </tr>
                                <tr style="margin: 5px;">
                                    <td style="width: 110px;color: var(--light);">28/2/2020</td>
                                    <td style="color: var(--light);">10/3/2021</td>
                                    <td style="color: var(--light);">
                                    Waiting too much time for product delivery
                                    &nbsp;</td>
                                    <td style="padding: 7px;"><button class="btn btn-danger btn-lg text-center"
                                            type="button">✗</button></td>
                                </tr>
                                <tr style="margin: 5px;">
                                    <td style="width: 110px;color: var(--light);">24/3/2020</td>
                                    <td style="color: var(--light);">30/3/2020</td>
                                    <td style="color: var(--light);">
                                    Good Product and best printing type in ahmedabad
                                    &nbsp;</td>
                                    <td style="padding: 7px;"><button class="btn btn-danger btn-lg text-center"
                                            type="button">✗</button></td>
                                </tr> -->
                            </tbody>
                            <!-- <tfoot style="color: var(--light);">
                                <tr>
                                    <td colspan="4" style="text-align: right;"><a href="#"
                                            style="text-align: right;font-size: 20px;color: var(--light);">Load
                                            more...</a></td>
                                </tr>
                            </tfoot> -->
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-dark">
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-3 item">
                        <h3 style="color: #e0219e;">SP Photography</h3>
                        <ul>
                        <li><a href="#">Our Service speaks who we are !</a></li>

                            <!-- <li><a href="#" style="color: var(--light);">Web design</a></li>
                            <li></li>
                            <li><a href="#" style="color: var(--light);">Hosting</a></li> -->
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
                        <h3 style="color: #e0219e;">SP Photography</h3>
                        <p>Based in the heart of Ahmedabad, Gujarat, SP Studio is one of the most spectacular photo studios furnished with 18+ sets, 50+ backdrops and 100+ shooting options to compliment &amp; glorify almost every occasion in your life. Whether you need a romantic backdrop for a pre-wedding photography or something modest and calm for the maternity photo shoot, we have it all under one roof<br><br></p>

                    </div>
                    <div class="col item social"><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i
                                class="icon ion-social-twitter"></i></a><a href="#"><i
                                class="icon ion-social-snapchat"></i></a><a href="#"><i
                                class="icon ion-social-instagram"></i></a></div>
                </div>
                <p class="copyright">Company Name © 2017</p>
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