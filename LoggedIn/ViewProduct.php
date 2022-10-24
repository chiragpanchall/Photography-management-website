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
<html style="background: var(--dark);">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>View Product</title>
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
            <div><button data-toggle="collapse" class="navbar-toggler" data-target="#navbar-collapse"><span
                        class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button></div>
            <div><a class="navbar-brand text-white" href="#">SP Photography</a><button class="navbar-toggler"
                    data-toggle="collapse"><span class="sr-only">Toggle navigation</span><span
                        class="navbar-toggler-icon"></span></button></div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav links">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="MyGallery.php">My Gallery</a></li>
                    <li class="nav-item"><a class="nav-link" href="My_Orders.php">My Orders<br></a></li>
                </ul>
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" data-toggle="dropdown"
                            aria-expanded="false" href="#">
                            <img class="dropdown-image" src="<?php echo $profile; ?>">
                            <?php echo $data['User_Fname'] ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item"
                                href="EditProfile.php">Edit Profile</a><a class="dropdown-item"
                                href="../LogOut.php">Logout </a></div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Product viewer table design -->
    <?php
    $pid = $_GET['ProductName'];
    conme($pid);
    $ProduQ = "SELECT * FROM product WHERE idProduct = '$pid'"; 
    conme($ProduQ);       
    $Result = getDataAsArray($conn,$ProduQ);
    $row = mysqli_fetch_array($Result);
    $nm = $row['Product_Name'];
    $tp = $row['Product_MaterialType'];
    $im1 = "../Data/PrintedPic/".$row['Product_Image1'];
    $im2 = "../Data/PrintedPic/".$row['Product_Image2'];
    $im3 = "../Data/PrintedPic/".$row['Product_Image3'];
    $im4 = "../Data/PrintedPic/".$row['Product_Image4'];
            conme($nm);
            conme($tp);
            conme($im1);
            conme($im2);
            conme($im3);
            conme($im4);
    
    ?>
    <div style="text-align: center;margin: 0px;background: var(--dark);margin-bottom: 28px;">
        <h1 class="display-4"
            style="font-size: 67px;padding: 13px;border-color: var(--gray);color: #e0219e;background: var(--dark);font-family: Armata, sans-serif;">
            <?php echo $nm?> Details</h1>
        <div class="wrapper" style="background: var(--dark);">
            <div class="container">
                <div class="row" style="padding: 0px;padding-right: 0px;padding-left: 0px;margin-right: -83px;">
                    <div class="col-md-10 col-md-1 product">
                        <div class="row">
                            <div class="col-md-7" style="padding: 47px;">
                                <div class="product-image"
                                    style="background-image: url('<?php echo $im1?>') !important;">
                                    <div class="image img-fluid"></div>
                                </div>
                                <div class="row product-thumbnails">
                                    <img class="img-fluid img-thumbnail col-md-3" alt="&quot;" src="<?php echo $im1?>">
                                    <img class="img-fluid img-thumbnail col-md-3" alt="&quot;" src="<?php echo $im2?>">
                                    <img class="img-fluid img-thumbnail col-md-3" alt="&quot;" src="<?php echo $im3?>">
                                    <img class="img-fluid img-thumbnail col-md-3" alt="&quot;" src="<?php echo $im4 ?>">
                                </div>
                            </div>
                            <div class="col-md-5" style="padding: 0px;margin: 0px;">
                                <div class="product-details"></div>
                                <div class="table-responsive text-center" data-aos="zoom-out-up"
                                    style="border-style: none;">
                                    <table class="table table-striped table-dark">
                                        <tbody style="margin: 0px;padding: 0px;">
                                            <th class="bg-success" colspan="2"
                                                style="text-align: center;font-size: 46px;color: var(--light);background: var(--dark);font-family: Armata, sans-serif;">
                                                <?php echo $nm?>
                                            </th>
                                            <tr class="bg-success">
                                                <td colspan="2"
                                                    style="text-align: center;font-size: 30px;color: var(--light);background: var(--dark);font-family: Armata, sans-serif;">Material : 
                                                    <?php echo $tp?></td>
                                            </tr>
                                            <tr>
                                                <td class="text-center" style="color: var(--light);font-size: 27px;">
                                                    Size/Type</td>
                                                <td style="font-size: 27px;color: var(--light);">Price</td>
                                            </tr>
                                            <?php
                                            $ProdTyQ = "SELECT * FROM print_type WHERE Product_idProduct_Id = '$pid'";
                                            $Result = getDataAsArray($conn,$ProdTyQ);
                                            while($ProdDetls = mysqli_fetch_array($Result)){
                                                   
                                                    $Pid = $ProdDetls['Product_idProduct_Id'];
                                                    $pz = $ProdDetls['Print_Size'];
                                                    $pp = $ProdDetls['Print_Price'];
                                                    conme($Pid);
                                                    conme($pz);
                                                    conme($pp);
                                                  echo '<tr>
                                                  <td class="text-center" style="color: var(--light);font-size: 27px;">'.$pz.'</td><td style="font-size: 27px;color: var(--light);">₹'.$pp.'</td>
                                              </tr>';        
                                            }
                                            ?>

                                            <!-- Last Row -->
                                            <tr class="bg-success">
                                             <!--    <td
                                                    style="text-align: center;font-size: 50px;color: var(--light);background: var(--dark);">
                                                    $250</td> -->
                                                    <?php $Link= "ProductConfirm.php?pid=".$pid; ?>
                                                <td colspan="2"
                                                    style="text-align: center;font-size: 50px;color: var(--light);background: var(--dark);">
                                                    <a class="btn btn-outline-success btn-lg" role="button"
                                                        style="height: 66px;width: 139px;font-size: 31px;"
                                                        href="<?php echo $Link?>">Buy</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Liner -->
    <div>
        <div class="table-responsive">
            <table class="table">
                <tbody>
                    <tr>
                        <td colspan="2" style="background: var(--dark);border-style: none;">
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td colspan="2"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Comment Section of product -->
    <div class="text-center" style="margin: 6px;padding: 39px;">
        <div><a class="btn btn-primary" data-toggle="collapse" aria-expanded="true" aria-controls="collapse-1"
                href="#collapse-1" role="button">View Feedback</a>
            <div class="collapse show bounce animated" id="collapse-1">
            <!-- SELECT `product`.`idProduct`, `user`.`User_Fname`, `user`.`User_Lname`, `feedback`.`Feedback_Date`, `feedback`.`Feedback_Content`
FROM `product` , `user` , `feedback` WHERE product.idProduct = 2 GROUP BY product.idProduct -->
            <?php
              //$getQ = "Select idFeedback,Feedback_Date,Feedback_Content,User_Fname,User_Lname from feedback,printing_order,user where Printing_Order_idPrinting_Order = idPrinting_Order and User_idUser = idUser";
              $nd = $_GET['ProductName'];
              $getQ = "SELECT `printing_order`.`idPrinting_Order`, `printing_order_details`.`Printing_Order_idPrinting_Order_Details`, `feedback`.*, `user`.*
              FROM `printing_order` 
                  LEFT JOIN `printing_order_details` ON `printing_order_details`.`Printing_Order_idPrinting_Order_Details` = `printing_order`.`idPrinting_Order` 
                  LEFT JOIN `feedback` ON `feedback`.`Printing_Order_idPrinting_Order` = `printing_order`.`idPrinting_Order` 
                  LEFT JOIN `user` ON `printing_order`.`User_idUser` = `user`.`idUser`WHERE printing_order_details.Print_Type_Product_idProduct_Id = '$nd'";
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
                                            No feedback found for this product..
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </td>
                     </tr>
                    </tbody>
                    </table>    
               ';
              }
              else {
                  while($row = mysqli_fetch_array($Result)){
                       conme($row['Feedback_Date']);
                       conme($row['Feedback_Content']);
                       conme($row['User_Fname']);
                       conme($row['User_Lname']);
                       if(($row['Feedback_Content'] != NULL)){
                  
                echo '<div>
                <div class="container text-center" style="padding: 0px;width: 982px;">
                     <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr class="text-break">
                                    <td class="text-center" colspan="2"
                                        style="margin: 0px;padding: 4px;border-style: none;">
                                        
                                        <div class="table-responsive table-bordered border rounded-0 border-secondary">
                                            <table class="table table-bordered">
                                                <tbody style="color: var(--light);border-style: none;">
                                                    <tr style="color: var(--light);">
                                                        <td class="text-left border-dark" colspan="2"
                                                            style="color: var(--light);background: var(--dark);font-size: 21px;">
                                                            '.$row['User_Fname']." ".$row['User_Lname'].'
                                                            </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center border-dark" colspan="2"
                                                            style="color: var(--white);">
                                                            '.$row['Feedback_Content'].' </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-right border-dark" colspan="2"
                                                            style="color: var(--white);">
                                                            '.$newDate = date("jS D ,Y", strtotime($row['Feedback_Date']))
                                                            .'
                                                            </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        
                                    </td>
                                </tr>
                            </tbody>
                            
                        </table>
                    </div>
                </div>
                </div>';
              }
            }  
        }
            ?>
                <!-- 

                </tbody>
                            <tfoot>
                                <tr>
                                    <td class="text-right" style="color: var(--danger);" colspan="2">
                                    <a href="#" style="font-size: 18px;color: var(--light);">Load more..</a></td>
                                </tr>
                            </tfoot>
                        </table>

                 -->
            </div> 
        </div>
    </div>

    <!-- Footer Park -->
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



<!-- 
Advance row of the table for accidental purpose...
****************************************
 <tr>
  <td class="text-center" style="color: var(--light);font-size: 27px;">Description</td>
   <td style="font-size: 27px;color: var(--light);">Cotton</td>
      </tr>
      <tr>
   <td class="text-center" style="color: var(--light);font-size: 27px;">Material</td>
   <td style="font-size: 27px;color: var(--light);">Cotton</td>
      </tr>
      <tr>
   <td class="text-center" style="color: var(--light);font-size: 27px;">Material</td>
   <td style="font-size: 27px;color: var(--light);">Cotton</td>
      </tr>
      <tr>
   <td class="text-center" style="color: var(--light);font-size: 27px;">Material</td>
   <td style="font-size: 27px;color: var(--light);">Cotton</td>
      </tr>
      <tr>
   <td class="text-center" style="color: var(--light);font-size: 27px;">Material</td>
   <td style="font-size: 27px;color: var(--light);">Cotton</td>
    </tr>

 -->