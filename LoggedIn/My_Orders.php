<?php
require_once('../DBCONNECT.php');
session_start();
//For loading the data
if ((isset($_SESSION['email'])) && (!empty($_SESSION['email']))) {
    // Loading the data of users in Navigation
    $email = $_SESSION['email'];
    $getq = "Select * from user where User_Email = '$email'";
    $ds = mysqli_query($conn, $getq);
    $data = mysqli_fetch_array($ds);
    $profilepath = $data['User_Photo_Path'];
    $profile = "../Data/ProfilePic/" . $profilepath; 
    $UserSql = "Select * from user where User_Email = .'$email'";
    
    $UserID = $data['idUser']; 
    $email =$data['User_Email'];
    $fullname =$data['User_Fname'].$data['User_Lname'];
    $phone =$data['User_MobileNo'];
    $PrintingID = array();
    $EventID =  array();
    $cartvalue  = 0;

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
    <title>My Orders</title>
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
            <div>
                <a class="navbar-brand text-white" href="#">SP Photography</a>
                <button data-toggle="collapse" class="navbar-toggler" data-target="#navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav links">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="MyGallery.php">My Gallery</a></li>
                    <li class="nav-item"><a class="nav-link" href="My_Orders.php">My Orders</a></li>
                    <li class="nav-item"></li>
                </ul>
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">
                            <img class="dropdown-image" src="<?php echo $profile; ?>">
                            <?php echo $data['User_Fname'] ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="EditProfile.php">Edit Profile</a>
                            <a class="dropdown-item" href="../LogOut.php">Logout </a>
                        </div>
                    </li>
                </ul>
            </div>

        </div>
    </nav>


    <!-- Empty portion of the page [Dont remove me] -->

    <!-- <div class="EmptyForm" style="padding: 0px;margin: 0px;" >
        <div class="container" style="background: var(--dark);text-align: center;color: var(--dark);">
        <img src="assets/img/Empty_Order.png" style="width: 500px;margin: 50px;">
        <input class="form-control-plaintext" type="text" value="Oops ! You don't have any Order." readonly="" style="color: var(--light);font-size: 75px;text-align: center;font-family: Cookie, cursive;">
    </div> -->

    <!-- </div> -->

    <!-- <script type='text/javascript'>
          document.getElementById('OrderFormID').style.display = 'none';
          document.getElementById('totalform').style.display = 'none';
          document.getElementById('paymentform').style.display = 'none';
         </script>;
 -->

    <?php 
    $Email = $_SESSION['email']; 
    $uid = 0;
    $getUID = "select idUser from user where User_Email = '$Email' limit 1";
    $result = mysqli_query($conn,$getUID) or die($conn);
    $id = mysqli_fetch_array($result);
    $uid = $id['idUser'];
    $EOrderSql = "SELECT * FROM `event_order` WHERE `User_ID_idUser` = '$uid' and Status != 3";
    $EOrderresult = mysqli_query($conn,$EOrderSql);
    $POrderSql = "SELECT * FROM `printing_order` WHERE `User_idUser` = '$uid' and Status != 3";
    $POrderresult = mysqli_query($conn,$POrderSql);
    if(mysqli_num_rows($EOrderresult) == 0 && mysqli_num_rows($POrderresult) == 0){
        conme("Data is  empty");
           echo '<div class="EmptyForm" style="padding: 0px;margin: 0px;"><div class="container" style="background: var(--dark);text-align: center;color: var(--dark);"><img src="assets/img/Empty_Order.png" style="width: 500px;margin: 50px;"><input class="form-control-plaintext" type="text" value="Oops ! You don\'t have any Order." readonly="" style="color: var(--light);font-size: 75px;text-align: center;font-family: Cookie, cursive;"></div></div>';
        
        //   echo "<script type='text/javascript'>";
        //   echo "document.getElementById('OrderFormID').style.display = 'none';";
        //   echo "document.getElementById('totalform').style.display = 'none';";
        //   echo "document.getElementById('paymentform').style.display = 'none';";
        //  echo "</script>";
    }
    else {
        conme("Data Found");
        // echo "<script type='text/javascript'>";
        //  echo "document.getElementById('EmptyForm').style.display = 'none';";
        // echo "</script>";
        //$EOrderSql = "SELECT * FROM `event_order` WHERE `User_ID_idUser` = '$uid'";
        ?>
<div class="OrderForm" id="OrderFormID">
        <div>
            <div class="table-responsive"
                style="margin: 0px;padding: 107px;color: var(--light);background: var(--gray-dark);">
                <table class="table">
                <div align="right">Note : Once you see the processing mode please do payment else your orders should not be complete.</div>
                    <thead>
                        <tr>
                            <th style="text-align: center;color: #e0219e;" colspan="1">Order Date</th>
                            <th style="text-align: center;color: #e0219e;" colspan="1">Order Image</th>
                            <th style="text-align: center;color: #e0219e;" colspan="1">Details</th>
                            <th style="text-align: center;color: #e0219e;">PRICE</th>
                            <th class="text-center" colspan="0" style="color: #e0219e;">QUANTITY</th>
                            <th class="text-center" colspan="0" style="color: #e0219e;">Action</th>
                        </tr>
                    </thead>
                    <tbody data-aos="fade-up" data-aos-once="true">
                        <!-- FIrst Row -->
                        <?php
       $EOrderSql  = "SELECT event_order.idEvent_Order,event_order.Event_Order_Date,event_order.Status, event_order.Event_Date,event_order.Price,package.Package_name,event_category.Event_Type from event_order,package,event_category where event_order.Package_idPackage = package.idPackage and event_order.Event_Category_idEvent_Category = event_category.idEvent_Category and event_order.Status != 3 and User_ID_idUser = '$uid' ";
        //and event_order.Status != 3  
        $EOrderresult = mysqli_query($conn,$EOrderSql);
        while($row = mysqli_fetch_array($EOrderresult)){
            conme($row['Event_Order_Date']);conme($row['Package_name']);conme($row['Price']);
             conme($row['Event_Type']);
            $cartvalue += $row['Price'];
            array_push($EventID,$row['idEvent_Order']);

       
    ?>
                        <tr>
                            <td class="text-center" style="color: var(--light);"><?php 
                             $newDate = date("jS D ,Y", strtotime($row['Event_Order_Date']));
                            echo $newDate; ?>
                            </td> 
                            <td class="text-center"><img src="<?php echo "assets/img/".$row['Package_name'].".png"; ?>"
                                    style="width: 137px;height: 134px;"></td>
                            <td class="text-left" rowspan="1"
                                style="font-size: 31px;font-weight: bold;text-align: center;">
                                <div class="table-responsive" style="font-size: 13px;">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="text-center" colspan="2" style="color: var(--light);">
                                                    <?php echo $row['Package_name']; ?>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="2" style="color: var(--light);">
                                                    <?php echo $newDate = "Event begins on : ".date("jS D ,Y", strtotime($row['Event_Date'])); ?>
                                                    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="color: var(--light);">
                                                    <?php echo "Event Type : ".$row['Event_Type']; ?></td>
                                            </tr>
                                            <!-- <tr>
                                            <td colspan="2" style="color: var(--light);">10 Frames</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" style="color: var(--light);">Drone Shooting : NO</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" style="color: var(--light);">Live Shooting : YES</td>
                                        </tr> -->
                                        </tbody>
                                    </table>
                                </div>
                            </td>
                            <td class="text-center"
                                style="font-size: 26px;text-align: center;font-weight: bold;color: var(--light);">
                                <?php echo '₹'.$row['Price']; ?></td>
                            <td class="text-center">
                                <p style="font-size: 29px;text-align: right;color: var(--light);">1</p>
                            </td>
                            <td class="text-center">
                            <?php
                                 if($row['Status'] == 0){
                                    echo '<button class="btn btn-primary text-center bg-danger" type="button" style="width: 99px;height: 51px;" onclick="RemoveEvent()">Remove</button>';

                                 }
                                 else if($row['Status'] == 1){
                                    echo ' <button class="btn btn-primary text-center bg-primary" type="button"
                                    style="width: 99px;height: 51px;"  disabled>Pending</button>';
                                 }
                                 else if($row['Status'] == 2){
                                    echo ' <button class="btn btn-primary text-center bg-primary" type="button"
                                    style="width: 99px;height: 51px;"  disabled>Processing</button>';
                                 }
                                 else{
                                    echo ' <button class="btn btn-primary text-center bg-success" type="button"
                                    style="width: 99px;height: 51px;" onclick="feedbackp()">DONE</button>';
                                 }
                                
                                ?>
                                <!-- <button class="btn btn-primary text-center bg-danger" type="button" style="width: 99px;height: 51px;">Remove</button> -->

                                <!-- <button class="btn btn-primary text-center bg-danger" type="button"
                                    style="width: 99px;height: 51px;" onclick="feedbackp()">Feedback</button>
                                -->
                                
                                <?php
                                    $EID = "DeleteOrderAction.php?action=deleteE&id=".$row['idEvent_Order'];         $UID = "DeleteOrderAction.php?action=updateE&id=".$row['idEvent_Order'];
                                ?>
                               <script>
                                function RemoveEvent() {
                                    if (confirm("Are you sure to delete Order ?") == true) {
                                        
                                        window.location.replace('<?php echo $EID; ?>');
                                       
                                    } else {
                                            console.log("You pressed Cancel!");
                                    }
                                    // window.location.replace("My_Orders.php");

                                }   
                                function feedbackp() {
                                    
                                    if(confirm('Do you want to give us feedback of our service ?') == true)
                                    {
                                        window.location.replace("feedback.php");
                                    }
                                    else {
                                        window.location.replace('<?php echo $UID; ?>');
                                    }
                                }
                                </script>

                                <!-- Changed feedback photo 
                                    <a class="btn btn-primary text-center bg-danger" role="button" style="width: 99px;height: 51px; margin: 0px;margin-right: 10px; margin-left: 10px;font-size: 8px;" href="Feedback.php">Feedback</a>
                                -->
                            </td>
                        </tr>

                        <?php }?>
                        <!-- Loading the printing order  -->
                        <!-- FIrst Row -->

    <?php
      $POrderSql = "SELECT `printing_order`.*, `printing_order_details`.*, `print_type`.`Print_Size`,         `product`.`Product_Name`, `offer`.`Product_Off_Percentage`
      FROM `printing_order` 
      LEFT JOIN `printing_order_details` ON `printing_order_details`.`Printing_Order_idPrinting_Order_Details` = `printing_order`.`idPrinting_Order` 
      LEFT JOIN `print_type` ON `printing_order_details`.`Print_Type_idPrint_Type` = `print_type`.`idPrint_Type` 
      LEFT JOIN `product` ON `print_type`.`Product_idProduct_Id` = `product`.`idProduct` 
      LEFT JOIN `offer` ON `printing_order`.`Offer_idOffer` = `offer`.`idOffer`
      WHERE printing_order.User_idUser = '$uid' and printing_order.Status != 3";
  $POrderresult = mysqli_query($conn,$POrderSql);
  while($row = mysqli_fetch_array($POrderresult))
  {
     conme($row['Printing_Order_Date']);conme($row['Total_Amount']);conme($row['Printing_Order_Quantity']);conme($row['Product_Off_Percentage']);
    conme($row['Print_Size']); conme($row['Product_Name']); 
    $cartvalue += $row['Total_Amount'];
    array_push($PrintingID,$row['idPrinting_Order']);
    
    ?>
                        <tr>
                            <td class="text-center" style="color: var(--light);">
                                <?php 
                                $newDate = date("jS D ,Y", strtotime($row['Printing_Order_Date'])); 
                                echo $newDate; ?></td>
                            <td class="text-center"><img src='<?php echo "../Data/Order_Image/PrintedOrderImg/".$row['Printing_Order_Image'];?>'
                                    style="width: 137px;height: 134px;"></td>
                            <td class="text-left" rowspan="1"
                                style="font-size: 31px;font-weight: bold;text-align: center;">
                                <div class="table-responsive" style="font-size: 13px;">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="text-center" colspan="2" style="color: var(--light);">
                                                    <?php echo $row['Product_Name']; ?>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="2" style="color: var(--light);">
                                                    <?php echo "Size : ".$row['Print_Size']; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="color: var(--light);">
                                                    <?php 
                echo $row['Product_Off_Percentage'] == '0' ? "No Offer applied" : $row['Product_Off_Percentage']."% off applied on offer"; ?></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </td>
                            <td class="text-center"
                                style="font-size: 26px;text-align: center;font-weight: bold;color: var(--light);">
                                <?php echo '₹'.$row['Total_Amount']; ?></td>
                            <td class="text-center">
                                <p style="font-size: 29px;text-align: right;color: var(--light);">
                                    <?php echo $row['Printing_Order_Quantity']; ?></p>
                            </td>
                            <td class="text-center">
                            <?php
                                 if($row['Status'] == 0){
                                    echo '<button class="btn btn-primary text-center bg-danger" type="button" style="width: 99px;height: 51px;" onclick="RemovePro()">Remove</button>';
                                 }
                                 else if($row['Status'] == 1){
                                    echo ' <button class="btn btn-primary text-center bg-primary" type="button"
                                    style="width: 99px;height: 51px;" onclick="feedbackp()" disabled>Processing</button>';
                                 }
                                 else {
                                    echo ' <button class="btn btn-primary text-center bg-success" type="button"
                                    style="width: 99px;height: 51px;" onclick="feedbackp()">Feedback</button>';
                                 }
                                
                                ?>
                                <!-- <button class="btn btn-primary text-center bg-danger" type="button" style="width: 99px;height: 51px;">Remove</button> -->

                                <!-- <button class="btn btn-primary text-center bg-danger" type="button"
                                    style="width: 99px;height: 51px;" onclick="feedbackp()">Feedback</button> -->

                              <?php
                                $EID = "DeleteOrderAction.php?action=deleteP&id=".$row['idPrinting_Order'];
                                $UID = "DeleteOrderAction.php?action=updateP&id=".$row['idPrinting_Order'];  
                                $nvgt = "feedback.php?id=".$row['idPrinting_Order'];  
                              ?>
                           <script>
                            function RemovePro() {
                                if (confirm("Are you sure to delete Order ?") == true) {
                                       
                                     window.location.replace('<?php echo $EID; ?>');
                                   
                                    } else {
                                         console.log("You pressed Cancel!");
                                 }
                                // window.location.replace("My_Orders.php");

                                }   
                                    function feedbackp() {
                                    
                                    if(confirm('Do you want to give us feedback of our service ?') == true)
                                    {
                                        window.location.replace('<?php echo $nvgt; ?>');
                                    }
                                    else {
                                        window.location.replace('<?php echo $UID; ?>');
                                    }
                                }
                                
                                </script>

                                <!-- Changed feedback photo 
                                    <a class="btn btn-primary text-center bg-danger" role="button" style="width: 99px;height: 51px; margin: 0px;margin-right: 10px; margin-left: 10px;font-size: 8px;" href="Feedback.php">Feedback</a>
                                -->
                            </td>
                        </tr>

                        <?php }?>




                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div id="totalform" style="background: #171717;margin: 0px;padding: 9px;">
        <div class="container">
            <div class="row">
                <div class="col-md-6" style="text-align: center;">
                    <h1 style="text-align: center;color: var(--light);">Total</h1>
                </div>
                <div class="col-6 col-md-6">
                    <h1 style="text-align: center;color: var(--light);">
                    <!-- ₹77500 -->
                                <?php
                                   $getEvent = "SELECT SUM(event_order.Price) from event_order WHERE event_order.User_ID_idUser = '$uid' and event_order.Status != 3";
                                   $result = mysqli_query($conn,$getEvent);
                                   $value = mysqli_fetch_array($result);
                                   $total = $value[0];
                                   $getProduct = "SELECT SUM(printing_order.Total_Amount) from printing_order WHERE printing_order.User_idUser = '$uid' and  printing_order.Status != 3";
                                   $result = mysqli_query($conn,$getProduct);
                                   $value = mysqli_fetch_array($result);
                                   $total += $value[0];
                                  echo '₹'.$total;
                                ?>
                </h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Payment Button -->
    <div id="paymentform">
    <form method="post" action="Payumoney/PayUMoney_form.php">
    <div class="container" style="padding: 22px;padding-top: 29px;">
    <input type="hidden" name="submit">
    <input type="hidden" name="PrintingValue" value="<?php echo json_encode($PrintingID); ?>">
    <input type="hidden" name="EventValue" value="<?php echo json_encode($EventID); ?>">
    <input type="hidden" name="amount" value="<?php echo $cartvalue; ?>">
    <input type="hidden" name="userid" value="<?php echo $UserID; ?>">
    <input type="hidden" name="email" value="<?php echo $email; ?>">
    <input type="hidden" name="firstname" value="<?php echo $fullname; ?>">
    <input type="hidden" name="phone" value="<?php echo $phone; ?>">
    <input type="hidden" name="productinfo" value="SP Photography">
    <input type="hidden" name="surl" value="success.php">
    <input type="hidden" name="furl" value="failure.php">

        <input class="btn btn-primary btn-block" type="Submit" value="Payment" style="background: var(--green);"> 
        <!-- PAYMENT</button> -->
        
        
 
 
    </div>
    </form>
    </div>

    </div>

    <?php 
    }
    ?>

    <!-- Footer Part -->
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




<!-- This is the query for product order details,,, -->
<!-- 
//             SELECT
//     printing_order.Printing_Order_Date,
//     printing_order.Total_Amount,
//     offer.Product_Off_Percentage,
//     print_type.Print_Size,
//     product.Product_Name,
//     printing_order_details.Printing_Order_Quantity,
//     printing_order_details.Printing_Order_Image
// FROM
//     printing_order,
//     printing_order_details,
//     offer,
//     print_type,
//     product
    
// WHERE
// 	print_type.idPrint_Type = printing_order_details.Printing_Order_idPrinting_Order_Details and 
//     printing_order.Offer_idOffer = offer.idOffer AND 
//     printing_order_details.Print_Type_idPrint_Type = print_type.idPrint_Type AND 		
//     printing_order_details.Print_Type_Product_idProduct_Id = product.idProduct AND 
//     printing_order.User_idUser = 1

 -->


 <!-- This is two rows of table  -->
                         <!-- Second Row -->
                        <!-- <tr>
                        <td class="text-center" style="color: var(--light);">28/1/2020</td>
                        <td class="text-center"><img src="assets/img/golden.png" style="width: 137px;height: 134px;"></td>
                        <td class="text-left" rowspan="1" style="font-size: 31px;font-weight: bold;text-align: center;">
                        <div class="table-responsive" style="font-size: 13px;">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="text-center" colspan="2" style="color: var(--light);">T-shirt</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="2" style="color: var(--light);">Material Cloth</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" style="color: var(--light);">XL</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" style="color: var(--light);">XL</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </td>
                        <td class="text-center" style="font-size: 26px;text-align: center;font-weight: bold;color: var(--light);">₹2500</td>
                        <td class="text-center">
                            <p style="font-size: 29px;text-align: right;color: var(--light);">10</p>
                        </td>
                        <td class="text-center">
                        <button class="btn btn-primary text-center bg-danger" type="button" style="width: 99px;height: 51px;">
                            Remove
                        </button>
                         -->
                        <!-- <button class="btn btn-primary text-center bg-danger" type="button" style="width: 99px;height: 51px;">
                        Feedback</button>
                     -->
                        <!-- </td>
                 </tr> -->

                        <!-- Third Row -->

                        <!-- <tr>
                        <td class="text-center" style="color: var(--light);">28/12/2020</td>
                        <td class="text-center"><img src="assets/img/golden.png" style="width: 137px;height: 134px;"></td>
                        <td class="text-left" rowspan="1" style="font-size: 31px;font-weight: bold;text-align: center;">
                            <div class="table-responsive" style="font-size: 13px;">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="text-center" colspan="2" style="color: var(--light);">T-shirt</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="2" style="color: var(--light);">Material Cloth</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" style="color: var(--light);">XL</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" style="color: var(--light);">XL</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </td>
                        <td class="text-center" style="font-size: 26px;text-align: center;font-weight: bold;color: var(--light);">$250</td>
                        <td class="text-center">
                            <p style="font-size: 29px;text-align: right;color: var(--light);">100</p>
                        </td>
                        <td class="text-center"><button class="btn btn-primary text-center bg-danger" type="button" style="width: 99px;height: 51px;">Remove</button>
                        <button class="btn btn-primary text-center bg-danger" type="button" style="width: 99px;height: 51px;" onclick="feedbackp()">Feedback</button>
                            <script>
                                function feedbackp(){
                                    window.location.replace("feedback.php");
                                }
                                </script></td>
                    </tr> -->
