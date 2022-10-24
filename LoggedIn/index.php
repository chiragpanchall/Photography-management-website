<?php
require_once('../DBCONNECT.php');
session_start();
$Productdata = "";

//For loading the data
if ((isset($_SESSION['email'])) && (!empty($_SESSION['email']))) {
    $email = $_SESSION['email'];
    $getq = "Select * from user where User_Email = '$email'";
    $ds = mysqli_query($conn, $getq);
    $data = mysqli_fetch_array($ds);
    $profilepath = $data['User_Photo_Path'];
    $fname = $data['User_Fname'];
    $profile = "../Data/ProfilePic/" . $profilepath;
    $data = "";    
    // "../Data/PrintedPic/c1.jpg"
  
}
else {
    echo "<script>
         alert('Please Login With your Credential');
        window.location.href='../Login/index.html';
    </script>";
}

?>


<!DOCTYPE html>
<html style="background: var(--dark);color: var(--dark);">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>SP Photography</title>
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
    <!-- <link rel="stylesheet" href="https://daneden.github.io/animate.css/animate.min.css"> -->
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
    <style>
        .filtr-item {
            width: 25%;
            padding: 10px;
            height: auto;
        }

        .filtr-item img {
            border-radius: 3px;
            width: 100%;
            margin-bottom: 0 !important;
            height: 200px;
            display: block;

        }
    </style>
    <script>  
      //Function for the open image in new tab with onclick
                 function ShowImage(x){
                    window.open(x,'_blank');
                 }
                </script>
</head>

<body style="color: var(--dark);padding: -5px;height: 1872px;background: var(--dark);">
    <nav class="navbar navbar-light navbar-expand-md custom-header" style="height: 115px;">
        <div class="container-fluid">
            <div><a class="navbar-brand text-white" href="#">SP Photography</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navbar-collapse"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button></div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav links">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="MyGallery.php">My Gallery</a></li>
                    <li class="nav-item"><a class="nav-link" href="My_Orders.php">My Orders</a></li>
                    <li class="nav-item"></li>
                </ul>
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"> <img class="dropdown-image" src="<?php echo $profile; ?>">
                        <?php echo $fname; ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="EditProfile.php">Edit Profile</a>
                            <a class="dropdown-item" href="../LogOut.php">Logout </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<!-- Experimental code -->


    <!-- Custom gallery section -->
    <section class="custom-gallery-section container">
        <h1 class="text-center" style="font-size: 58px;color: #e0219e;font-family: Armata, sans-serif; margin:20px; ">Gallery</h1>
        <div class="filtr-controls" style="color: var(--light);">
            <span class="active" data-filter="*" style="color: var(--white);">all </span>
            <span data-filter=".marriage" style="color: var(--light);">Merriage&nbsp;</span>
            <span data-filter=".event" style="color: var(--light);">Event&nbsp;</span>
            <span data-filter=".products" style="color: var(--light);">Product&nbsp;</span>
        </div>

        <div class="grid1">
            <!--  Merriage image details   -->
            <div class="filtr-item marriage">
                <img data-enlargeable width="100" src="https://bit.ly/3uQ2B3c"  alt="image"  id="imge"  onclick="ShowImage(this.src)" >
                
            </div>
            <div class="filtr-item marriage">
                <img src="https://bit.ly/30bqrbv" alt="image"  id="imge"  onclick="ShowImage(this.src)">
            </div>
            
            <div class="filtr-item marriage">
                <img src="https://bit.ly/388HfUR" alt="image"  id="imge"  onclick="ShowImage(this.src)">
            </div>
            <div class="filtr-item products">
                <img src="https://bit.ly/3kJg0W8" alt="image"  id="imge"  onclick="ShowImage(this.src)">
            </div>
            <div class="filtr-item products">
                <img src="https://bit.ly/3rk9tDG" alt="image"  id="imge"  onclick="ShowImage(this.src)">
            </div>
            <div class="filtr-item products">
                <img src="https://bit.ly/3c48YaD" alt="image"  id="imge"  onclick="ShowImage(this.src)">
            </div>

            
            <!-- Prdoucts image details    -->
            <div class="filtr-item products">
                <img src="https://bit.ly/2Ok130L" alt="image"  id="imge"  onclick="ShowImage(this.src)">
            </div>
            <div class="filtr-item products">
                <img src="https://bit.ly/3kHTBse" alt="image"  id="imge"  onclick="ShowImage(this.src)">
            </div>
            <div class="filtr-item products">
                <img src="https://bit.ly/3kHuk1v" alt="image"  id="imge"  onclick="ShowImage(this.src)">
            </div>
            <div class="filtr-item products">
                <img src="https://bit.ly/3e8EBm4" alt="image"  id="imge"  onclick="ShowImage(this.src)">
            </div>
            <div class="filtr-item products">
                <img src="https://bit.ly/3beRNUm" alt="image"  id="imge"  onclick="ShowImage(this.src)">
            </div>
            <div class="filtr-item products">
                <img src="https://bit.ly/3rgpeeN" alt="image"  id="imge"  onclick="ShowImage(this.src)">
            </div>
            <div class="filtr-item marriage">
                <img src="https://bit.ly/3uW6ymT" alt="image"  id="imge"  onclick="ShowImage(this.src)">
            </div><div class="filtr-item marriage">
                <img src="https://bit.ly/3sU7WVz" alt="image"  id="imge"  onclick="ShowImage(this.src)">
            </div><div class="filtr-item marriage">
                <img src="https://bit.ly/2OmY1bO" alt="image"  id="imge"  onclick="ShowImage(this.src)">
            </div><div class="filtr-item marriage">
                <img src="https://bit.ly/388Ay5w" alt="image"  id="imge"  onclick="ShowImage(this.src)">
            </div>


            <!--   Event Image   -->
            <div class="filtr-item event">
                <img src="https://bit.ly/3kLjKpW" alt="image"  id="imge"  onclick="ShowImage(this.src)">
            </div>
            <div class="filtr-item event">
                <img src="https://bit.ly/3uTEKzO" alt="image"  id="imge"  onclick="ShowImage(this.src)">
            </div> 
            <div class="filtr-item event">
                <img src="https://bit.ly/3qiQRme" alt="image"  id="imge"  onclick="ShowImage(this.src)">
            </div><div class="filtr-item event">
                <img src="https://bit.ly/384goJN" alt="image"  id="imge"  onclick="ShowImage(this.src)">
            </div>
            <div class="filtr-item event">
                <img src="https://bit.ly/3bfirN9" alt="image"  id="imge"  onclick="ShowImage(this.src)">
            </div> https://bit.ly/3bbkNfU
            <div class="filtr-item event">
                <img src="https://bit.ly/3bbkNfU" alt="image"  id="imge"  onclick="ShowImage(this.src)">
            </div> 
            <div class="filtr-item event">
                <img src="https://bit.ly/386HXC0" alt="image"  id="imge"  onclick="ShowImage(this.src)">
            </div> 
            <div class="filtr-item event">
                <img src="https://bit.ly/388Qc0A" alt="image"  id="imge"  onclick="ShowImage(this.src)">
            </div><div class="filtr-item event">
                <img src="https://bit.ly/3c4dmGm" alt="image"  id="imge"  onclick="ShowImage(this.src)">
            </div><div class="filtr-item event">
                <img src="https://bit.ly/3qfwOoM" alt="image"  id="imge"  onclick="ShowImage(this.src)">
            </div><div class="filtr-item event">
                <img src="https://bit.ly/3bX9Mhy" alt="image"  id="imge"  onclick="ShowImage(this.src)">
            </div><div class="filtr-item event">
                <img src="https://bit.ly/3bT2Y4c" alt="image"  id="imge"  onclick="ShowImage(this.src)">
            </div>


        </div>
    </section>

    <section class="pricing-table" style="background: var(--dark);">
        <div class="container">
            <div class="center">
                <h1 style="color: var(--pink);font-size: 58px;font-family: Armata, sans-serif;">Package Pricing</h1>
            </div>
            <div class="pricing-area text-center">
                <div class="row">
                    <div class="col-sm-4 plan price red wow fadeInDown">
                        <ul class="list-group">
                            <li class="list-group-item heading">
                                <?php
                                $Package = "Silver";
                                $query = "select * from package where Package_name = '$Package'";
                                if ($result = mysqli_query($conn, $query)) {
                                    $data = mysqli_fetch_assoc($result);
                                } else {
                                    echo '<script>alert("Data Not loaded..")</script>';
                                }
                                
                                ?>
                                <h1>Silver</h1><span class="price"><?php echo "₹".$data["Package_Price"];?></span>
                            </li>
                            <li class="list-group-item"><span><?php echo "Total Images : ".$data["Package_NumberOfImages"];?></span></li>
                            <li class="list-group-item"><span><?php echo "Total Duration of Video(Mins) : ".$data["Package_MinsOfVideos"];?></span></li>
                            <li class="list-group-item"><span><?php echo "Total Frames : ".$data["Number_Of_Frame"];?></span></li>
                            <li class="list-group-item"><span><?php $me = ($data['Drone_Shoot'] == 0 ? "No": "Yes"); 
  echo "Drone Shooting : ".$me;?> </span></li>
                            <li class="list-group-item"><span><?php $me = ($data["Live_Reception"] == 0 ? "No": "Yes"); 
  echo "Live Reception : ".$me;?></span></li>
                            <li class="list-group-item"><span>-</span></li>
                            <li class="list-group-item plan-action"><a class="btn" href="OrderConfirm.php?PackageType=Silver">Buy</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-4 plan price green wow fadeInDown">
                        <ul class="list-group">
                            <li class="list-group-item heading">
                            <?php
                                $Package = "Golden";
                                $query = "select * from package where Package_name = '$Package'";
                                if ($result = mysqli_query($conn, $query)) {
                                    $data = mysqli_fetch_assoc($result);
                                } else {
                                    echo '<script>alert("Data Not loaded..")</script>';
                                }
                                
                                ?>
                                <h1>Golden</h1><span class="price"><strong><?php echo "₹".$data["Package_Price"];?></strong><br></span>
                            </li>
                            <li class="list-group-item"><span><?php echo "Total Images : ".$data["Package_NumberOfImages"];?></span></li>
                            <li class="list-group-item"><span><?php echo "Total Duration of Video(Mins) : ".$data["Package_MinsOfVideos"];?></span></li>
                            <li class="list-group-item"><span><?php echo "Total Frames : ".$data["Number_Of_Frame"];?></span></li>
                            <li class="list-group-item"><span><?php $me = ($data['Drone_Shoot'] == 0 ? "No": "Yes"); 
  echo "Drone Shooting : ".$me;?> </span></li>
                            <li class="list-group-item"><span><?php $me = ($data["Live_Reception"] == 0 ? "No": "Yes"); 
  echo "Live Reception : ".$me;?></span></li>
                            <li class="list-group-item"><span>-</span></li>
                            <li class="list-group-item plan-action"><a class="btn" href="OrderConfirm.php?PackageType=Golden">Buy</a></li>
                        </ul> 
                                       </div>
                    <div class="col-sm-4 plan price yellow wow fadeInDown"><img src="assets/img/ribon_one.png">
                    <ul class="list-group">
                            <li class="list-group-item heading">
                            <?php
                                $Package = "Platinum";
                                $query = "select * from package where Package_name = '$Package'";
                                if ($result = mysqli_query($conn, $query)) {
                                    $data = mysqli_fetch_assoc($result);
                                } else {
                                    echo '<script>alert("Data Not loaded..")</script>';
                                }
                                
                                ?>
                                <h1>Platinum</h1><span class="price"><strong><?php echo "₹".$data["Package_Price"];?></strong><br></span>
                            </li>
                            <li class="list-group-item"><span><?php echo "Total Images : ".$data["Package_NumberOfImages"];?></span></li>
                            <li class="list-group-item"><span><?php echo "Total Duration of Video(Mins) : ".$data["Package_MinsOfVideos"];?></span></li>
                            <li class="list-group-item"><span><?php echo "Total Frames : ".$data["Number_Of_Frame"];?></span></li>
                            <li class="list-group-item"><span><?php $me = ($data['Drone_Shoot'] == 0 ? "No": "Yes"); 
  echo "Drone Shooting : ".$me;?> </span></li>
                            <li class="list-group-item"><span><?php $me = ($data["Live_Reception"] == 0 ? "No": "Yes"); 
  echo "Live Reception : ".$me;?></span></li>
                            <li class="list-group-item"><span>-</span></li>
                            <li class="list-group-item plan-action"><a class="btn" href="OrderConfirm.php?PackageType=Platinum">Buy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!--  -->
<div align="center">
    <div style="background: var(--dark);margin: 23px;padding: 39px;">
      <h1 style="height: 49px;font-size: 58px;color: #e0219e;text-align: center;font-family: Armata, sans-serif;">Offers</h1>
    </div>
    <!-- Loading the offers -->
    <?php 
  $getqs = "SELECT * FROM offer where idOffer != 1";
  $Productdata = getDataAsArray($conn,$getqs);
  if(mysqli_num_rows($Productdata)==0){
      echo '<div >
      <div align="center">
          <div class="alert alert-primary"  role="alert">
              Currently no offer available !
          </div>
      </div>
  </div>';
  }
  else {
      while($row = mysqli_fetch_array($Productdata)){
        
      echo'<div class="container">
            <div align="center">
            <div class="alert alert-primary"  role="alert">
             Use [ '.$row['Offercode'].' ] Offer-code to get the '.$row['Offer_Details'].' valid untill '.date("jS D ,Y", strtotime($row['Offer_Ending'])).' 
            </div>
            </div>
             </div>';
  }  
}
    ?>
    
</div>    

<!--  -->
 <!-- data-aos="fade-left" data-aos-offset="200px" attribute for the animation -->
    <!--********************Product buy*************************************** -->
    <?php
  $getqs = "SELECT * FROM product";
  $Productdata = getDataAsArray($conn,$getqs);
  if(mysqli_num_rows($Productdata)==0){
      conme("Product is empty");
  }
  else {
      echo'
    <div style="background: var(--dark);margin: 23px;padding: 39px;">
      <h1 style="height: 49px;font-size: 58px;color: #e0219e;text-align: center;font-family: Armata, sans-serif;">Printed product</h1>
    </div>

       <div style="text-align: left;border-radius: 0px;background: #eeeeee;">
          <div style="background: var(--dark);">
              <div class="container" style="background: var(--dark);">
                  <div class="table-responsive-xl" style="border-color: #e0219e;">
                      <table class="table">
                      <tbody>';

                            conme("Filling the product");
                            $ProDetq = "SELECT * FROM print_type GROUP by Product_idProduct_Id";
                        //"SELECT  `Product_idProduct_Id`,`Print_Size`, `Print_Price` FROM `print_type` WHERE ".$cnt." GROUP by Product_idProduct_Id"
                        $ProDet = mysqli_query($conn,$ProDetq) or die("Error Occured");
                        $n = mysqli_num_rows($Productdata);
                        conme($n);
                        for($cnt = 0;$cnt <= $n-3;$cnt++ ){
                            echo '<tr>';
                            for($i=0;$i<3;$i++){
                                $row = mysqli_fetch_array($Productdata);
                                $nm = $row['Product_Name'];
                                $tp = $row['Product_MaterialType'];
                                $im = "../Data/PrintedPic/".$row['Product_Image1'];
                                $ProdDetls = mysqli_fetch_array($ProDet);
                                $Pid = $ProdDetls['Product_idProduct_Id'];
                                $pz = $ProdDetls['Print_Size'];
                                 $pp = $ProdDetls['Print_Price'];
                                 $ViewPrLink = "ViewProduct.php?ProductName=".$Pid;
                                 $OrderLink = "ProductConfirm.php?pid=".$Pid;
                                  if($nm != null){
                            echo '
                              <td style="text-align: center;border-color: #e0219e;">
                          <div class="table-responsive" style="border-color: #e0219e;">
                         <table class="table">
                            <tbody style="border-color: #e0219e;">
                            <tr>
                            <td colspan="2"><img class="img-thumbnail border rounded-0 border-dark" src="'.$im.'" style="width: 200px;height: 200px;"></td>
                             </tr>
                            <tr>
                            <td class="text-center" colspan="2" style="font-size: 23px;text-align: center;font-weight: bold;font-style: normal;color: var(--orange);border-color: var(--light);">'.$nm.'</td>
                          </tr>
                          <tr>
                            <td class="text-center" colspan="2" style="font-size: 23px;text-align: center;font-weight: bold;font-style: normal;color: #f8f9fa;border-color: var(--light);">Material type : '.$tp.'</td>
                         </tr>
                         <tr>
                            <td class="text-center" colspan="2" style="font-size: 23px;text-align: center;font-weight: bold;font-style: normal;color: #f8f9fa;border-color: var(--light);">Size : '.$pz.'</td>
                             </tr>
                             <tr>
                              <td class="text-center" colspan="2" style="font-size: 23px;text-align: center;font-weight: bold;font-style: normal;color: #f8f9fa;border-color: var(--light);">₹'.$pp.'</td>
                                 </tr>
                                <tr style="border-color: #e0219e;">
                                 <!--  Remove the property of td style "background: rgba(0,0,0,0.14);"  -->
                                  <td style="text-align: center;"><a class="text-center" href="'.$ViewPrLink.'" style="font-size: 19px;color: var(--white);">View Product</a></td>
                                   <td style="text-align: center;"><a class="btn btn-outline-primary btn-lg" role="button" href="'.$OrderLink.'" style="background: var(--success);color: var(--white);"> Buy </a></td>
                               </tr>
                            </tbody>
                         </table>
                     </div>
                     </td>
                        ';
                         }
                         }
                         echo '</tr>';
                         }
                            echo '
                            </tbody>
                            </table>
                    </div>
            </div>
        </div>
        </div>
    
    ';

  }
  
?>
</div> 
</div> 

    <!-- HTML product -->
<div class="footer-dark" >
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
   
 

    <!-- Footer Code -->
 
<!-- **************************** -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/lightpick@1.3.4/lightpick.min.js"></script> -->
    <script src="assets/js/smart-forms.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <!-- <script src="assets/js/Date-Picker-From-and-To.js"></script> -->
    <!-- <script src="assets/js/Filterable-Gallery-with-Lightbox.js"></script> -->
    <script src="assets/js/Modal-commerce-popup-button.js"></script>
    <script src="assets/js/Pricing-Tables-1.js"></script>
    <script src="assets/js/Pricing-Tables.js"></script>
    <script src="assets/js/Product-Viewer-1-1.js"></script>
    <script src="assets/js/Product-Viewer-1.js"></script>
    <script src="assets/js/Profile-Edit-Form.js"></script>
    <!-- New library for gallery  -->
    <script src="https://npmcdn.com/isotope-layout@3/dist/isotope.pkgd.js"> </script>
    <script>
        $(document).ready(function() {
            var $_grid = $('.grid1').isotope({
                itemSelector: '.filtr-item',
                layoutMode: 'fitRows',
            });
            
            $('.filtr-controls').on('click', 'span', function() {
                $('.filtr-controls span').removeClass('active')
                $(this).addClass('active')
                var filterValue = $(this).attr('data-filter');
                $_grid.isotope({
                    filter: filterValue
                });
            });

        });
    </script>
</body>
</html>
<!-- Original code of the Product table -->
