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
    $OfferCode = "SELECT * FROM offer";
    $result = mysqli_query($conn,$OfferCode) or die("Error Occured !");
    $offerData = null;
     if($result){
         $offerData = mysqli_fetch_all($result);
          
        } 
       
}
else {
    echo "
    <script>
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
    <title>Order Confirmation</title>
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
    <!-- Navigation  -->
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
                            aria-expanded="false" href="#"> <img class="dropdown-image"
                                src="<?php echo $profile; ?>">
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

    <!-- Order confirmation code -->
    <div style="text-align: center;margin: 0px;background: #c1b8b8;margin-bottom: 28px;">
        <h1 class="display-3"
            style="font-size: 59px;padding: 13px;border-color: var(--gray);color: #e0219e;background: var(--dark);font-family: Cookie, cursive;">
            Order Confirmation</h1>
    </div>

    <div class="border rounded-0" data-aos="fade-up" style="margin: 58px; padding: 80px; background: var(--dark);">
        <div class="container profile profile-view" id="profile" style="margin: 1px;text-align: center;">
            <center>
                <p class="text-nowrap text-center"
                    style="font-size: 26px;padding: 0px;color: var(--light);text-align: center;">
                    Upload File here which you want to print on product.&nbsp;
                </p>
            </center>
            <form>
                <div class="form-row profile-row" style="width: 1045px;">
                    <div class="col" style="width: 342px;">
                        <div class="avatar" style="width: 1114px;padding: 20px;">
                            <div class="text-primary border rounded-0 border-primary avatar-bg center"
                                style="width: 218px;height: 225px;background: var(--gray);">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 align-self-center relative">
                        <input type="file" class="form-control" name="avatar-file" id="PrintedPic"
                            accept="image/gif, image/jpeg, image/png" onchange="readURL(this)"
                            style="background: rgba(221,221,221,0);color: var(--light);" required>
                    </div>
                </div>
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
            </form>
        </div>
    </div>
    <!-- Choose product details  form -->
    <div style="background: var(--dark);">
        <h1 class="display-3"
            style="text-align: center;margin: 28px;font-size: 56px;color: #e0219e;background: var(--dark);font-family: Armata, sans-serif;">
            Choose product details
        </h1>
    </div>

    <?php
    $pid = $_GET['pid'];
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
    <input type="hidden" value="<?php echo $pid ?>" id="ProdID">
    <form style="margin: 51px;">
        <!-- table-bordered border-success shadow-sm deleted from the div class below in class -->
        <div class="table-responsive " data-aos="fade-up-right">
            <table class="table table-bordered" id="ProductDetails">
                <thead>
                    <tr>
                        <th style="font-size: 35px;text-align: center;color: #f8f9fa;">TYPE</th>
                        <th style="font-size: 35px;text-align: center;color: #f8f9fa;">DETAILS</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="font-size: 30px;text-align: center;color: #f8f9fa;">Product type</td>
                        <td style="font-size: 30px;text-align: center;color: #f8f9fa;"><?php echo $nm;?></td>
                        <!-- <td>
                            <div class="dropdown" style="text-align: center;font-size: 23px;"><button
                                    class="btn btn-outline-primary dropdown-toggle text-uppercase"
                                    data-toggle="dropdown" aria-expanded="false" type="button"
                                    style="width: 177px;height: 51px;font-size: 26px;color: var(--light);">Package</button>
                                <div class="dropdown-menu"><a class="dropdown-item" href="#">Tshirt</a><a
                                        class="dropdown-item" href="#">Mug</a><a class="dropdown-item"
                                        href="#">Cushion</a></div>
                            </div>
                        </td> -->
                    </tr>
                    <tr>
                        <td style="font-size: 30px;text-align: center;color: #f8f9fa;">Product Material</td>
                        <td style="font-size: 30px;text-align: center;color: #f8f9fa;"><?php echo $tp;?></td>
                    </tr>
                    <tr>
                        <td style="font-size: 30px;text-align: center;color: #f8f9fa;">Print Size</td>
                        <td>
                            <select class="btn btn-info btn-lg dropdown-toggle" data-toggle="dropdown"
                                aria-expanded="false" type="button" id="selectType" onchange="GetMaterialPrice()"
                                required
                                style="width: 100%;color: var(--light);border-color: var(--dark);text-align: center;">
                                <div class="dropdown-menu" style="width: 100%;text-align: center;">
                                    <option value="000.00">Select Size</option>
                                    <?php 
                          $qr = "SELECT * FROM `print_type` WHERE `Product_idProduct_Id` =".$pid;
                          $result = getDataAsArray($conn,$qr);
                          if($result != null){
                              while($row = mysqli_fetch_array($result)){
                                echo "<option value=".$row['Print_Price']." data-tid = ".$row['idPrint_Type'].">".$row['Print_Size']."</option>";
                              }
                          }
                        ?>

                                    <script>
                                    function GetMaterialPrice() {
                                        var MaterialPrice = document.getElementById('selectType').value;
                                        console.log(MaterialPrice);
                                        document.getElementById('TotalValueOfMaterial').innerHTML = "₹" + MaterialPrice;

                                    }

                                    function ApplyCode() {
                                        console.log("i am apply code");
                                        let OfferCode = document.getElementById('OfferCode').value.replaceAll(' ', '');
                                        if (OfferCode == "" || OfferCode == null) {
                                            OfferCode = "-0";
                                        }
                                        let code = OfferCode;
                                        var x = <?php echo json_encode($offerData) ?> ;
                                        var dis = "";
                                        var OffID = "";
                                        var discounted_price = "";
                                        if (x != null) {
                                            for (let i = 0; i < x.length; i++) {
                                                codepp = document.getElementById('ShowData');
                                                codepp.innerHTML = "Please Enter Valid Offer code";
                                                codepp.style.display = "block";
                                                if (x[i][1] == code) {
                                                    console.log(x[i][3]);
                                                    dis = x[i][3];
                                                    OffID = x[i][0];
                                                    console.log("Code applied");
                                                    codepp = document.getElementById('ShowData');
                                                    codepp.innerHTML = "You got the " + x[i][3] +
                                                        "% off on this product..";
                                                    codepp.style.display = "block";
                                                    let MaterialPrice = document.getElementById('selectType').value;
                                                    if (MaterialPrice == '₹000.00') {
                                                        document.getElementById('TotalValueOfMaterial').innerHTML =
                                                            "₹000.00";
                                                    } else {
                                                        var x = document.getElementById('TotalValueOfMaterial')
                                                            .innerHTML;
                                                        x = x.replace("₹", "");
                                                        console.log(dis + "_" + x + "_");
                                                        discounted_price = parseFloat(x) - (parseFloat(x) * dis / 100)
                                                        document.getElementById('TotalValueOfMaterial').innerHTML =
                                                            "₹" + discounted_price;
                                                    }
                                                    break;
                                                }

                                            }

                                        } else {
                                            console.log("No Offer Available");
                                            codepp = document.getElementById('ShowData');
                                            codepp.innerHTML = "Sorry ! No Offer is available";
                                            codepp.style.display = "block";
                                        }
                                    }

                                    function QntChange() {
                                        var qnty = document.getElementById('Qnt').value;
                                        var x = document.getElementById('TotalValueOfMaterial').innerHTML;
                                        x = x.replace("₹", "");
                                        let total_print = x * qnty;
                                        document.getElementById('TotalValueOfPrintedProd').innerText = "₹" +
                                        total_print;
                                        console.log(total_print);
                                    }
                                    </script>
                                    <!-- *******************Appliying ajax code *************************** -->
                                    <?php 
                            $qr = print "<script>qr</script>";
                            conme($qr);
                           ?>
                                </div>
                            </select>
                            <!-- ************************************************************** -->
                            <!-- <div class="dropdown" style="text-align: center;font-size: 23px;"><button
                                    class="btn btn-outline-primary dropdown-toggle text-uppercase"
                                    data-toggle="dropdown" aria-expanded="false" type="button"
                                    style="width: 177px;height: 51px;font-size: 26px;color: var(--white);">Package</button>
                                <div class="dropdown-menu"><a class="dropdown-item" href="#">Cloth</a><a
                                        class="dropdown-item" href="#">Plastic</a><a class="dropdown-item"
                                        href="#">Mate</a></div>
                            </div> -->
                        </td>
                    </tr>
                </tbody>
                <tfoot class="bg-light border-primary" style="color: var(--gray);background: var(--gray);">
                    <tr class="text-uppercase" style="background: var(--gray);color: var(--light);">
                        <td style="font-size: 26px;text-align: center;">Total value</td>
                        <td class="text-right" style="font-size: 26px;" id="TotalValueOfMaterial">000.00</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </form>


    <!-- Coupen code -->
    <div data-aos="fade-up" class="newsletter-subscribe" style="background: rgba(255,255,255,0);">
        <div class="container">
            <div class="intro">
                <h2 class="text-center" style="color: #e0219e;">Apply Offer code</h2>
            </div>

            <form class="form-inline" action="" onsubmit="event.preventDefault()">
                <div class="form-group">
                    <input type="text" class="form-control" name="OfferCode" placeholder="Offer code" id="OfferCode" />
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" onclick="ApplyCode()">Apply</button>
                </div>
            </form>
        </div>
    </div>

    <div class="alert alert-primary container" role="alert" id="ShowData" style="display:none; visibility: none;">
        No Offer available
    </div>


    <!-- Delivery information -->

    <div data-aos="fade-down" data-aos-duration="750" data-aos-offset="100px" class="newsletter-subscribe"
        style="background: rgba(255,255,255,0);"></div>
    <form data-aos="zoom-in" style="margin: 31px;">
        <!-- table-bordered border-success shadow-sm deleted from the class -->
        <div class="table-responsive ">
            <table class="table table-striped table-bordered">
                <thead class="text-secondary">
                    <tr>
                        <th style="font-size: 35px;text-align: center; color: #e0219e;font-family: Armata, sans-serif;"
                            colspan="2">Delivery Information</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="font-size: 30px;text-align: center;color: var(--light);">Product quantity</td>
                        <td><input class="bg-light border rounded-pill border-success form-control form-control-lg"
                                type="number" name="ProductQuantity" value="0" min="1" max="500" step="1" id="Qnt"
                                onchange="QntChange()" required="">
                        </td>
                    </tr>
                    <tr>
                        <td style="font-size: 30px;text-align: center;color: var(--light);">State</td>

                        <td style="font-size: 30px;text-align: center;color: var(--light);">
                            <select class="btn btn-info btn-lg dropdown-toggle" data-toggle="dropdown" id="State"
                                onchange='GetCity()' aria-expanded="false" type="button"
                                style="width: 100%;color: var(--light);" required>State
                                <!-- <option >Select State</option> -->
                                <div class="dropdown-menu" style="width: 100%;text-align: center;">
                                    <option value="0">Select State</option>
                                    <?php
                                $sql = "SELECT * FROM state";
                                $result = getDataAsArray($conn, $sql);
                                $i = 0;
                                while ($row = mysqli_fetch_array($result)) {
                                    $i++;
                                    echo '<option value=' . $i . '>' . $row['State_Name'] . '</option>';
                                }
                                ?>
                            </select>
                        </td>


                        <!-- <td>
                            <div class="dropdown" style="text-align: center;font-size: 23px;">
                            <button class="btn btn-outline-primary dropdown-toggle text-uppercase"
                                    data-toggle="dropdown" aria-expanded="false" type="button"
                                    style="width: 177px;height: 51px;font-size: 26px;color: var(--light);">
                                    STate
                            </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Cloth</a>
                                    <a class="dropdown-item" href="#">Plastic</a>
                                    <a class="dropdown-item" href="#">Mate</a></div>
                            </div>
                        </td> -->
                    </tr>
                    <tr>
                        <td style="font-size: 30px;text-align: center;color: var(--light);">City</td>
                        <td style="font-size: 30px;text-align: center;color: var(--light);">
                            <select id="selectCity" onchange="GetArea()" class="btn btn-info btn-lg dropdown-toggle"
                                data-toggle="dropdown" aria-expanded="false" type="button"
                                style="width: 100%;color: var(--light);border-color: var(--dark);" required>
                                <div class="dropdown-menu" style="width: 100%;text-align: center;">
                                    <option value="0">Select City</option>
                                    <script>
                                    function GetCity() {
                                        let x = document.getElementById('State').value;
                                        let xmlHttp = new XMLHttpRequest();
                                        xmlHttp.onreadystatechange = function() {
                                            if (this.readyState == 4 && this.status == 200) {
                                                let optdata = JSON.parse(this.responseText);
                                                //console.log(optdata+"JS");
                                                let select = document.getElementById('selectCity');
                                                let length = select.options.length;
                                                for (i = length - 1; i >= 0; i--) {
                                                    select.options[i] = null;
                                                }
                                                let el = document.createElement("option");
                                                el.text = "Select City";
                                                el.value = 0;
                                                select.appendChild(el);
                                                for (let i = 0; i < optdata.length; i++) {
                                                    let opt = optdata[i]["City_Name"];
                                                    let el = document.createElement("option");
                                                    el.text = opt;
                                                    el.value = optdata[i]["idCity"];
                                                    select.appendChild(el);
                                                    //console.log(opt);
                                                }

                                            }
                                        }
                                        xmlHttp.open("GET", "GetDataAjax.php?s=" + x, true);
                                        xmlHttp.send();
                                    }
                                    </script>

                            </select>

                            <!-- This is Static code of city -->
                            <!-- <div class="dropdown" style="text-align: center;font-size: 23px;"><button
                                    class="btn btn-outline-primary dropdown-toggle text-uppercase"
                                    data-toggle="dropdown" aria-expanded="false" type="button"
                                    style="width: 177px;height: 51px;font-size: 26px;color: var(--light);">City</button>
                                <div class="dropdown-menu"><a class="dropdown-item" href="#">Cloth</a><a
                                        class="dropdown-item" href="#">Plastic</a><a class="dropdown-item"
                                        href="#">Mate</a></div>
                            </div> -->
                        </td>
                    </tr>
                    <tr>
                        <td style="font-size: 30px;text-align: center;color: var(--light);">Area</td>
                        <td style="font-size: 30px;text-align: center;color: var(--light);">
                            <select class="btn btn-info btn-lg dropdown-toggle" data-toggle="dropdown"
                                aria-expanded="true" type="button" id="selectArea" onchange="LoadVenue()" required
                                style="width: 100%;color: var(--light);border-color: var(--dark);text-align: center;">
                                <div class="dropdown-menu" style="width: 100%;text-align: center;">
                                    <option value="0">Select Area </option>
                                    <script>
                                    function GetArea() {
                                        console.log("GetArea is called");
                                        let y = document.getElementById('selectCity').value;
                                        if (y != 0) {
                                            console.log(y);
                                            let xmlHttp = new XMLHttpRequest();
                                            xmlHttp.onreadystatechange = function() {
                                                if (this.readyState == 4 && this.status == 200) {
                                                    // console.log(this.responseText);
                                                    let optdata = JSON.parse(this.responseText);
                                                    let select = document.getElementById('selectArea');
                                                    let length = select.options.length;
                                                    for (let i = length - 1; i >=
                                                        0; i--) { //Changed from  -1 to -2 above also
                                                        select.options[i] = null;
                                                    }
                                                    let el = document.createElement("option");
                                                    el.text = "Select Area";
                                                    el.value = 0;
                                                    select.appendChild(el);
                                                    for (let i = 0; i < optdata.length; i++) {
                                                        let opt = optdata[i]["Area_Name"];
                                                        let el = document.createElement("option");
                                                        el.text = opt;
                                                        el.value = optdata[i]["idArea"];
                                                        select.appendChild(el);
                                                        //   console.log(opt);
                                                    }
                                                }
                                            }
                                            xmlHttp.open("POST", "GetDataAjax.php", true); //?c=" + y
                                            xmlHttp.setRequestHeader('Content-type',
                                                'application/x-www-form-urlencoded');
                                            xmlHttp.send("c=" + y);
                                        }
                                    }
                                    </script>


                            </select>

                            <!-- Static Area -->
                            <!-- <div class="dropdown" style="text-align: center;font-size: 23px;">
                            <button class="btn btn-outline-primary dropdown-toggle text-uppercase" data-toggle="dropdown" aria-expanded="false" type="button" style="width: 177px;height: 51px;font-size: 26px;color: var(--light);">Area</button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Cloth</a>
                                    <a class="dropdown-item" href="#">Plastic</a>
                                    <a class="dropdown-item" href="#">Mate</a>
                                </div>
                            </div> -->
                        </td>
                    </tr>
                    <tr>
                        <td style="font-size: 26px;text-align: center;color: var(--light);">Address</td>
                        <td><textarea class="border rounded form-control" name="Address" spellcheck="true" wrap="soft"
                                required="" minlength="5" maxlength="250" id="OrderAddress"
                                placeholder="Enter your address.." value="Ratangadh thaea "></textarea>
                        </td>
                    </tr>
                </tbody>
                <tfoot class="bg-light border-primary" style="color: var(--gray);background: var(--gray);">
                    <tr class="text-uppercase" style="background: var(--gray);color: var(--light);">
                        <td style="font-size: 26px;text-align: center;">Total value</td>
                        <td class="text-right" style="font-size: 26px;" id="TotalValueOfPrintedProd">000.00</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </form>
    <div>
        <div class="text-center" style="background: var(--dark);margin-top: 30px;margin-bottom: 15px;">
            <a class="btn btn-outline-success btn-block btn-lg" role="button" onclick="ValidateOrder()"
                style="background: var(--green);font-family: Aladin, cursive;">Book Order</a>
        </div>
        <!-- href="My_Orders.php" -->
    </div>
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
<!-- Manipulating the final price -->

<script>
function ValidateOrder() {
    //alert("Thanks for Order..");
    var pp = document.getElementById('PrintedPic').value;
    var ppt = $('#PrintedPic').prop('files')[0];
    var stt = document.getElementById('selectType');
    var st = stt.options[stt.selectedIndex].innerText;   
   // var printtype =   stt.find(':selected').data('tid'); //Not getting value
    var qnt = document.getElementById('Qnt').value;
    var ss = document.getElementById('State').value;
    var sc = document.getElementById('selectCity').value;
    var sa = document.getElementById('selectArea').value;
   // var oaa = document.getElementById('OrderAddress').value = "Ratangadh Thara"; 
    var oa = document.getElementById('OrderAddress').value.trim();
    var tv = document.getElementById('TotalValueOfPrintedProd').innerText;
    var Extension = pp.substring(pp.lastIndexOf('.') + 1).toLowerCase();  
    var pid =  document.getElementById('ProdID').value;
    var OfferCode = document.getElementById('OfferCode').value.replaceAll(' ', '');
    var dt =   (OfferCode == '') ? -1 : OfferCode ;
    OfferCode = dt;
    console.log(OfferCode+"___Offer code");
    var validExtensions = ['jpg', 'png', 'jpeg']; //array of valid extensions
    var regx = /^[0-9a-zA-Z]+$/;
    
    if (pp == '') {
        alert('Please upload Image');
        document.getElementById('PrintedPic').focus();
    }
    else if (tv == "₹0") {
        alert('Please Choose valid Print Size and rechoose the quantity');
        document.getElementById('qnt').value = 0;
        //document.getElementById('OrderAddress').focus();
    }
     else if ($.inArray(Extension, validExtensions) == -1) {
        alert("Only  jpeg,png and jpg file types are accepted  ");
        document.getElementById('PrintedPic').focus();
    } else if (st == 0) {
        alert('Please Choose valid Types');
        document.getElementById('selectType').focus();
    } else if (qnt == 0 || qnt < 1) {
        alert('Please Choose at least 1 quantity');
        document.getElementById('qnt').focus();
    } else if (ss == 0) {
        alert('Please Choose state');
        document.getElementById('State').focus();
    } else if (sc == 0) {
        alert('Please Choose valid city');
        document.getElementById('selectCity').focus();
    } else if (sa == 0) {
        alert('Please Choose valid Area');
        document.getElementById('selectArea').focus();
    } else if (oa == '' || oa.length <= 5) {
        alert('Please Enter valid Address. ');
        document.getElementById('OrderAddress').focus();
    } else if (!isNaN(oa)) {
        alert('Please Enter valid Address');
        document.getElementById('OrderAddress').focus();
    }
    
    // Adding the data in Database
    else {
        // let pt = pp.replace(/^.*[\\\/]/, '');
        let pt = document.getElementById('PrintedPic').files[0];
        let baseURL = "ProductConfirmAddDB.php?"; 
        const params = new URLSearchParams({
        "PrintedPic" : pt,
        "Type": st,
        "Qnty": qnt,
        "State":ss,
        "City":sc,
        "Area":sa,
        "OrderAdd":oa,
        "TotalValue":tv,
        "OfferID":OfferCode,
        "pid":pid,   
    });
       
        var formdata = new FormData();
        formdata.append("Type",st);
        formdata.append("Qnty", qnt);
        formdata.append("Qnty",qnt);
        formdata.append("State",ss);
        formdata.append("City",sc);
        formdata.append("Area",sa);
        formdata.append("OrderAdd",oa);
        formdata.append("TotalValue",tv);
        formdata.append("OfferID",OfferCode);
        formdata.append("pid",pid);
       // formdata.append("PrintType",printtype);
        formdata.append("file",ppt);
        formdata.get("PrintType");
        let xmlHttp = new XMLHttpRequest();
        xmlHttp.onreadystatechange = function() {
         if (this.readyState == 4 && this.status == 200) {
             if(this.responseText == '1' || this.responseText == 1)
             {
                 alert('Ordered Success.');
                 window.location.replace("../LoggedIn/My_Orders.php");
             }
             else {
                alert("Failed to order. Something went wrong. please Try again  ");
             }
            //window.location.href = 'ProductConfirmAddDB.php';
         }
         
    }
    xmlHttp.open("POST", "ProductConfirmAddDB.php", true); 
   // xmlHttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    xmlHttp.send(formdata);
    }

}
</script>

</html>

