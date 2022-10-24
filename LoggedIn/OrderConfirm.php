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
    $nm = $data['User_Fname'];
    $profile = "../Data/ProfilePic/" . $profilepath;
    $Package = "";  //Package name get by the querystring
    $data = ""; //All package details of
    //Manipulating the query string in php
    parse_str(parse_url($_SERVER['REQUEST_URI'])['query'], $params);
    if ($params['PackageType'] == 'Silver') {
        $Package = "Silver";
        $imgpack = "assets/img/silver.png";
        $query = "select * from package where Package_name = '$Package'";
        //printf ("%s (%s)\n", $row["Lastname"], $row["Age"]);
        if ($result = mysqli_query($conn, $query)) {
            $data = mysqli_fetch_assoc($result);
        } else {
            echo '<script>alert("Data not loaded")</script>';
        }
    } else if ($params['PackageType'] == 'Golden') {
        $Package = "Golden";
        $imgpack = "assets/img/golden.png";
        $query = "select * from package where Package_name = '$Package'";
        if ($result = mysqli_query($conn, $query)) {
            $data = mysqli_fetch_assoc($result);
        } else {
            echo '<script>alert("Data not loaded")</script>';
        }
    } else {
        $Package = "Platinum";
        $imgpack = "assets/img/platinum.png";
        $query = "select * from package where Package_name = '$Package'";
        if ($result = mysqli_query($conn, $query)) {
            $data = mysqli_fetch_assoc($result);
        } else {
            echo '<script>alert("Data not loaded")</script>';
        }
    }
} else {
    echo "<script>
         alert('Please Login With your Credential');
        window.location.href='../Login/index.html';
    </script>";
}

?>

<!DOCTYPE html>
<html style="background: var(--dark);color: var(--gray);">

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
    <style>
        input[type=checkbox] {
            display: none;
        }

        /* input[type=checkbox] + label {
  display: block;
  margin: 0.2em;
  cursor: pointer;
  padding: 0.2em;
} */
        input[type=checkbox]+label:before {
            content: "✓";
            border: 0.1em solid #aaa;
            border-radius: 0.2em;
            display: inline-block;
            width: 2em;
            height: 2em;
            padding-left: 0.2em;
            padding-bottom: 0.3em;
            margin-right: 0.2em;
            vertical-align: bottom;
            color: transparent;
            transition: .2s;
        }

        input[type=checkbox]+label:active:before {
            transform: scale(0);
        }

        input[type=checkbox]:checked+label:before {
            background-color: MediumSeaGreen;
            border-color: MediumSeaGreen;
            color: #fff;
        }

        input[type=checkbox]:disabled+label:before {
            transform: scale(1);
            border-color: #aaa;
        }

        input[type=checkbox]:checked:disabled+label:before {
            transform: scale(1);
            background-color: #bfb;
            border-color: #bfb;
        }
    </style>

</head>
<!-- Navigation menu -->

<body style="background: var(--dark);">
    <nav class="navbar navbar-light navbar-expand-md custom-header" style="height: 108px;">
        <div class="container-fluid">
            <div><button data-toggle="collapse" class="navbar-toggler" data-target="#navbar-collapse"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button></div>
            <div><a class="navbar-brand text-white" href="#">SP Photography</a><button class="navbar-toggler" data-toggle="collapse"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button></div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav links">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="MyGallery.php">My Gallery</a></li>
                    <li class="nav-item"><a class="nav-link" href="My_Orders.php">My Orders<br></a></li>
                </ul>
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"> <img class="dropdown-image" src="<?php echo $profile; ?>">
                    <?php echo $nm ?></a>
                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="EditProfile.php">Edit Profile</a><a class="dropdown-item" href="../LogOut.php">Logout </a></div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Order confirmation -->
    <div data-aos="fade-up" style="text-align: center;margin: 0px;background: #c1b8b8;margin-bottom: 28px;">
        <h1 class="display-3" style="font-size: 53px;padding: 13px;border-color: var(--gray);color: #e0219e;background: var(--dark);font-family: Cookie, cursive;">
            Order Confirmation</h1>
    </div>
    <div data-aos="fade-down" style="border-radius: 28px;margin: 32px;padding: 20px;background: var(--dark);border: 3px dashed #e0219e ;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center"><img class="img-thumbnail img-fluid bg-dark border-primary shadow" src="<?php echo $imgpack; ?>" style="margin: 6px;width: 247px;height: 350px;margin-top: 40px;margin-bottom: 10px;border-style: dashed;">
                </div>
                <div class="col-md-6">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center" colspan="2" style="font-size: 31px;border-color: rgb(117,121,125);color: #e0219e;">
                                        <?php echo $Package; ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="2" style="color: #f8f9fa;">
                                        <?php echo "Total Images : " . $data["Package_NumberOfImages"]; ?></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="color: #f8f9fa;">
                                        <?php echo "Total Duration of Video(Mins) : " . $data["Package_MinsOfVideos"]; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="color: #f8f9fa;">
                                        <?php echo "Total Frames : " . $data["Number_Of_Frame"]; ?></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="color: #f8f9fa;"><?php $me = ($data['Drone_Shoot'] == 0 ? "No" : "Yes");
                                                                            echo "Drone Shooting : " . $me; ?></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="color: #f8f9fa;"><?php $me = ($data["Live_Reception"] == 0 ? "No" : "Yes");
                                                                            echo "Live Reception : " . $me; ?></td>
                                </tr>

                            </tbody>
                            <tfoot class="bg-light border-primary" style="color: var(--gray);background: var(--gray);">
                                <tr class="text-uppercase" style="background: var(--gray);color: var(--light);">
                                    <td style="font-size: 26px;background: var(--gray-dark);">Total value</td>
                                    <td class="text-right" style="font-size: 26px;background: var(--gray-dark);">
                                        <?php echo "₹" . $data["Package_Price"]; ?></td>
                                    <input type="hidden" value="<?php echo $data["Package_Price"]; ?>" id="packPrice">
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--
    <div data-aos="fade-up" class="newsletter-subscribe" style="background: rgba(255,255,255,0);">
        <div class="container">
            <div class="intro">
                <h2 class="text-center">Apply Offer code</h2>
            </div>
            <form class="form-inline" method="post">
                <div class="form-group"><input type="text" class="form-control" name="OfferCode" placeholder="Offer code" /></div>
                <div class="form-group"><button class="btn btn-primary" type="submit">Apply</button></div>
            </form>
        </div>
    </div>
     -->
    <div class="container" data-aos="slide-up" style="padding-top: 20px;padding-right: 110px;padding-bottom: 20px;padding-left: 50px;">
        <form data-aos="slide-up" style="margin: 51px;width: 929px;text-align: center;">
            <h1 class="display-3" style="text-align: center;margin: 28px;font-size: 56px;color: #e0219e;font-family: Armata, sans-serif;">
                Additional Package</h1>
            <div class="table-responsive table-bordered text-dark border-dark shadow-sm" style="border-color: var(--danger);width: 1109px;text-align: center;">
                <table class="table ">
                    <thead>
                        <tr>
                            <th style="font-size: 24px;color: var(--light);">No.</th>
                            <th style="font-size: 24px;color: var(--light);">Images</th>
                            <th style="font-size: 24px;color: var(--light);">Video Duration(Minutes)</th>
                            <th style="font-size: 24px;color: var(--light);">Frames</th>
                            <th style="font-size: 24px;color: var(--light);">Drone Shooting</th>
                            <th style="font-size: 24px;color: var(--light);">Live Shooting</th>
                            <th colspan="2" style="font-size: 24px;color: var(--light); padding: 15px">Price</th>
                            <!-- <th style="font-size: 24px;color: var(--light);">Select</th> -->

                        </tr>
                    </thead>
                    <tbody>
                        <!-- For loading the additional data on order confirmation pages... -->
                        <?php
                        $sql = "SELECT * FROM additional_package";
                        $result = getDataAsArray($conn, $sql);
                        $i = 1;
                        if ($result != null) {
                            while ($row = mysqli_fetch_array($result)) {
                                $row["Drone_Shooting"] = $row["Drone_Shooting"] == 0 ? "No" : "Yes";
                                $row["Live_Shooting"] = $row["Live_Shooting"] == 0 ? "No" : "Yes";
                                echo '<tr>
                          <td style="color: var(--light);">' . $i . '</td>
                          <td style="color: var(--light);">' . $row["images"] . '</td>
                          <td style="color: var(--light);">' . $row["Video_MDuration"] . '</td>
                          <td style="color: var(--light);">' . $row["Frames"] . '</td>
                          <td style="color: var(--light);">' . $row["Drone_Shooting"] . '</td>
                          <td style="color: var(--light);">' . $row["Live_Shooting"] . '</td>
                          <td style="color: var(--light); padding:15px "><b>' . $row["Price"] . '</b></td>
                          <td style="color: var(--light);">
                              <div class="new">
                                  <form>
                                      <input class="add_pack" data-price=' . $row["Price"] . ' type="checkbox" id=' . "$i" . ' name=' . "$i" . ' value=' . $row['idAdditional_Package'] . '>
                                      <label for=' . "$i" . '></label>
                                  </form>
                              </div>
                          </td>
                      </tr>';
                                $i++;
                            }
                        } else {
                            echo '<tr>
                          <td colspan="7" style="color: var(--light);">Not available any additional Package</td>
                      </tr>';
                        }
                        ?>
                        <!-- <script>document.getElementById('footer').hidden = true</script> -->
                    </tbody>
                    <!-- Footer removed for extra details -->
                    <!-- <tfoot id="footer" class="bg-light border-primary" style="color: var(--gray);background: var(--gray);">
                        <tr class="text-uppercase" style="background: var(--gray);color: var(--light);">
                            <td colspan="6" style="font-size: 26px;background: var(--gray-dark);">Total value</td>
                            <td colspan="2" class="text-right" style="font-size: 26px;background: var(--gray-dark);">
                                $250</td>
                        </tr>
                    </tfoot> -->
                </table>
            </div>
        </form>
    </div>


    <!-- Event Order details -->

    <div class="container text-center border rounded-0 border-dark" data-aos="slide-up" style="padding: 100px;padding-top: 20px;padding-left: 100px;padding-bottom: 20px;padding-right: 109px;background: var(--dark);">
        <div class="text-center">
            <div class="table-responsive " style="background: var(--dark);">
                <table class="table table-striped bordered table-bordered td table-bordered th">
                    <thead>
                        <tr>
                            <th class="text-center" colspan="2" style="font-size: 33px;color: #e0219e;font-family: Armata, sans-serif;">Fill Event Order
                                Details</th>
                        </tr>
                    </thead>
                    <tbody class="text-left bg-light" style="text-align: center;background: var(--gray);">
                        <tr>
                            <td class="text-center" style="font-size: 26px;color: var(--light);background: var(--dark);">Package type</td>
                            <td class="text-center" id="PackageTy" style="font-size: 26px;color: var(--light);background: var(--dark);">
                                <?php echo $_GET['PackageType']; ?></td>


                        </tr>
                        <!-- Loading Event category -->
                        <tr>
                            <td style="font-size: 26px;text-align: center;color: var(--light);background: var(--dark);">
                                Event category</td>

                            <td style="font-size: 26px;background: var(--dark);">
                                <div class="dropdown border rounded border-dark" style="text-align: center;">
                                    <select class="btn btn-info btn-lg dropdown-toggle" id="EventCategory" data-toggle="dropdown" aria-expanded="false" type="button" style="width: 591px;" required>Event category
                                        <div class="dropdown-menu" id="dropdownBtn" style="width: 591px;text-align: center;">
                                            <option value="0">Event Type</option>
                                            <!-- <a class="dropdown-item" >Select Value</a>  and class="dropdown-item" removed class from above-->
                                            <?php
                                            $sql = "SELECT * FROM event_category";
                                            $result = getDataAsArray($conn, $sql);
                                            while ($row = mysqli_fetch_array($result)) {
                                                echo '<option value="' . $row['idEvent_Category'] . '">' . $row['Event_Type'] . '</option>';
                                            }
                                            ?></select>
                                    <!-- <a class="dropdown-item" href="#">Third Item</a> -->
                                </div>
            </div>
            </td>
            </tr>

            <tr>
                <td style="font-size: 26px;text-align: center;color: var(--light);background: var(--dark);" rowspan="2">
                    Event Date</td>
                <td style="font-size: 26px;text-align: center;background: var(--dark);" rowspan="2">
                    <form class="date-select" style="width: 530px;padding: 0px;padding-right: -6px;margin: 4px;padding-left: 18px;">
                        <div class="form-group">
                            <div class="input-group mb-4">
                                <div class="input-group-prepend"><span class="input-group-text">From</span>
                                </div><input class="form-control" type="date" onkeydown="return false" id="datePickerFrom" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-4">
                                <div class="input-group-prepend"><span class="input-group-text">To &nbsp;
                                        &nbsp;&nbsp;</span></div><input class="form-control" type="date" id="datePickerTo" readonly onkeydown="return false" required>
                            </div>
                        </div>
                    </form>
                </td>
            </tr>
            <tr></tr>
            <tr>
                <td style="font-size: 26px;text-align: center;color: var(--light);background: var(--dark);">
                    Album delivery address</td>
                <td class="text-center" style="font-size: 26px;background: var(--dark);"><textarea class="border rounded" rows="2" cols="25" style="width: 600px;height: 100px;resize:none;" placeholder="Add delivery address.." id="AlbumDeliAdd" name="Album_Del_add" minlength="10" maxlength="250" required></textarea></td>
            </tr>
            <tr>
                <td style="font-size: 26px;text-align: center;background: var(--dark);color: var(--light);">
                    State</td>
                <td style="font-size: 26px;background: var(--dark);color: var(--light);">
                    <div class="dropdown border rounded border-dark" style="text-align: center;">
                        <select class="btn btn-info btn-lg dropdown-toggle" data-toggle="dropdown" id="State" onchange='GetCity()' aria-expanded="false" type="button" style="width: 591px;color: var(--light);" required>State
                            <!-- <option >Select State</option> -->
                            <div class="dropdown-menu" style="width: 591px;text-align: center;">
                                <option>Select State</option>
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
                    </div>
        </div>
        </td>
        </tr>
        <tr>
            <td style="font-size: 26px;text-align: center;background: var(--dark);color: var(--light);">
                City</td>
            <td style="font-size: 26px;background: var(--dark);color: var(--light);">
                <div class="dropdown border rounded border-dark" style="text-align: center;">

                    <select id="selectCity" onchange="GetArea()" class="btn btn-info btn-lg dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button" style="width: 591px;color: var(--light);border-color: var(--dark);" required>
                        <div class="dropdown-menu" style="width: 591px;text-align: center;">
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
                                            for (i = length-1; i >= 0; i--) {
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
                </div>
    </div>
    </td>
    </tr>
    <tr>
        <td style="font-size: 26px;text-align: center;background: var(--dark);color: var(--light);">
            Area</td>
        <td style="font-size: 26px;background: var(--dark);color: var(--light);">
            <div class="dropdown border rounded border-dark" style="text-align: center;filter: brightness(102%);border-style: none;border-color: rgba(248,249,250,0);">
                <select class="btn btn-info btn-lg dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button" id="selectArea" onchange="LoadVenue()" required style="width: 591px;color: var(--light);border-color: var(--dark);text-align: center;">Area
                    <div class="dropdown-menu" style="width: 591px;text-align: center;">
                        <option value="a">Select Area</option>
                        <script>
                            function GetArea() {
                                console.log("GetArea is called");
                                let y = document.getElementById('selectCity').value;
                                if(y != 0){
                                console.log(y);
                                let xmlHttp = new XMLHttpRequest();
                                xmlHttp.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        // console.log(this.responseText);
                                        let optdata = JSON.parse(this.responseText);
                                        let select = document.getElementById('selectArea');
                                        let length = select.options.length;
                                        for (let i = length - 1; i >= 0; i--) {   //Changed from  -1 to -2 above also
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
                                xmlHttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                                xmlHttp.send("c=" + y);
                            }
                            }
                        </script>

                </select>
            </div>
            </div>
        </td>
    </tr>
    <tr>
        <td style="font-size: 26px;text-align: center;background: var(--dark);color: var(--light);" rowspan="2">Venues
            Address</td>
        <td class="text-center" style="font-size: 26px;background: var(--dark);color: var(--light);"><textarea class="border rounded" id="venueTextarea" rows="2" cols="25" style="width: 600px;height: 100px;resize:none;" minlength="10" maxlength="250" name="Venue_add" placeholder="Enter Venue address.." required></textarea></td>
    </tr>
    <tr>
        <td style="font-size: 26px;background: var(--dark);color: var(--light);">
            <div style="width: 630px;"><a class="btn btn-info" data-toggle="collapse" aria-expanded="false" aria-controls="collapse-1" href="#collapse-1" role="button" style="width: 630px;">Nearby Venue</a>
                <div class="collapse" id="collapse-1" style="width: 630px;">
                    <div>
                        <div class="table-responsive">
                            <table class="table table-striped VenueData">
                                <thead>
                                    <tr>
                                        <th style="color: var(--light);">Venue name</th>
                                        <th style="color: var(--light);">Price</th>
                                        <th colspan="2" style="text-align: center;color: var(--light);">Contact
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Loading associated Nearby venue -->
                                    <script>
                                        function LoadVenue() {
                                            // console.log("GetArea is called");
                                            let area = document.getElementById('selectArea').value;
                                            //console.log(y);
                                            let xmlHttp = new XMLHttpRequest();
                                            xmlHttp.onreadystatechange = function() {
                                                if (this.readyState == 4 && this.status == 200) {
                                                    // console.log(this.responseText);
                                                    let optdata = JSON.parse(this.responseText);
                                                    console.log(optdata);
                                                    let emptydata =
                                                        '<tr><td colspan="4" style="color: var(--light);">No Event-venue found </td></tr>';
                                                    $('.VenueRow').remove();
                                                    for (let i = 0; i < optdata.length; i++) {
                                                        var venue_name = optdata[i]["Venue_Name"];
                                                        var venue_price = optdata[i]["Venue_Price"];
                                                        var venue_contact = optdata[i]["Venue_Contact"];
                                                        var Btn_Sts = optdata[i]["Status"];
                                                        if(Btn_Sts == "0"){
                                                            resp_html =
                                                            "<tr class='VenueRow'><td style='color: var(--light);'>" +
                                                            venue_name + "</td><td style='color: var(--light);'>₹" +
                                                            venue_price + "</td><td style='color: var(--light);'>" +
                                                            venue_contact +
                                                            "</td><td class='text-center'>-</td></tr>";
                                                        $('.VenueData').append(resp_html);        
                                                        }
                                                        else {
                                                        console.log(venue_price + venue_contact);
                                                        resp_html =
                                                            "<tr class='VenueRow'><td style='color: var(--light);'>" +
                                                            venue_name + "</td><td style='color: var(--light);'>₹" +
                                                            venue_price + "</td><td style='color: var(--light);'>" +
                                                            venue_contact +
                                                            "</td><td class='text-center'><button class='btn btn-primary btn-lg btnvnameclass' data-vname='" +venue_name + "' type='button'>Select</button></td></tr>";
                                                        $('.VenueData').append(resp_html);
                                                    }   
                                                    }
                                                }
                                            }
                                            xmlHttp.open("POST", "GetDataAjax.php", true); //?c=" + y
                                            xmlHttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                                            xmlHttp.send("v=" + area);
                                        }
                                    </script>

                                    <!-- <tr>
                                        <td style="color: var(--light);">Ambika venue center</td>
                                        <td style="color: var(--light);">$25000</td>
                                        <td style="color: var(--light);">9797925552</td>
                                        <td class="text-center"><button class="btn btn-primary btn-lg"
                                                type="button">Select</button></td>
                                    </tr>-->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </td>
    </tr>
    </tbody>
    </table>
    </div>
    </div>
    </div>
    <center>
        <div id="Error" class="alert alert-danger" alert-dismissible fade show" style="display: none;" area-hidden="true" role="alert">
            <strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
    </center>
    <!-- Changing the package price -->
    <div class="text-center" style="background: var(--dark);margin-top: 10px;margin-bottom: 25px; padding:5px;">
        <a class="total-price btn btn-outline-success btn-block btn-lg" role="button" style="background: var(--green);margin-top: 13px; margin-bottom: 40px; font-family: 'Alfa Slab One', cursive; font-weight: normal(100) !important;" onclick='ValidatePackage()'>Book Order&nbsp; [₹<?php echo $data["Package_Price"]; ?>]</a></div>
        <input type="hidden" class="totalprice">
    <!--  Collecting the data for manipulating the form data -->
    <script>
        function ValidatePackage() {
            var CheckAddID = "";
             var Additional_Id = "";
             var PackagePrice = "";
            if($('.add_pack:checked').val()){
                
                     Additional_Id = $('.add_pack:checked').val();
                     CheckAddID = "true";   
                }
                else {
                    Additional_Id = "0";
                    CheckAddID = "false";
                }
                if(isNaN(window.value)){
                    PackagePrice = <?php echo $data["Package_Price"]; ?>;
                }
                else {
                    PackagePrice = window.value;
                }
            console.log(PackagePrice + " Final Value of package");
            var PackageType_Data = <?php echo $data['idPackage'];?>;
            var EventCat_Data = document.getElementById('EventCategory').value;
            var StartDate_Data = document.getElementById('datePickerFrom').value;
            var EndDate_Data = document.getElementById('datePickerTo').value;
            var AlbumDelivery_Data = (document.getElementById('AlbumDeliAdd').value).trim();
            var AreaID_Data = document.getElementById('selectArea').value;
            var VenueAdd_Data = (document.getElementById('venueTextarea').value).trim();
            var submit = "false";
            console.log(Additional_Id + "___" + PackagePrice);
               
            if (StartDate_Data == "" || EndDate_Data == "" || AlbumDelivery_Data == "" || AlbumDelivery_Data.length == 0 || EventCat_Data == "0" || VenueAdd_Data == "" || VenueAdd_Data.length == 0) {
                console.log("Validation Condition is called of event order details");
                document.getElementById('Error').innerHTML = "Please Fill the form Valid";
                document.getElementById('Error').style.display = "block";
                return false;
                submit = "false";
            } else {
               
                qdata = { 
                    "action" : "add_data",
                    "CheckAddID" : CheckAddID,
                    "PackageType_Data": PackageType_Data,
                    "EventCat_Data": EventCat_Data,
                    "StartDate_Data": StartDate_Data,
                    "EndDate_Data": EndDate_Data,
                    "AlbumDelivery_Data": AlbumDelivery_Data,
                    "AreaID_Data": AreaID_Data,
                    "VenueAdd_Data": VenueAdd_Data,
                    "Additional_Id":Additional_Id,
                    "PackagePrice":PackagePrice
                };
              console.log("Jquery AJAX is called");
                submit = "true";
                $.ajax({
                    type: 'POST',
                    url: 'GetDataAjax.php',
                    data: qdata, // Body of post request 
                    datatype: "json",
                    success: function(result) {
                        alert("Thanks for Ordering");
                        location.replace('My_Orders.php');
                           
                    },
                    error: function(error) {
                        console.log("Ajax request failed : "+error);
                    }
                });
            }
        }
    </script>

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



    <script>
        $(function() { // Document ready 
            $('.add_pack').on('change', function() {
                $('.add_pack').not(this).prop('checked', false);
                var add_pack_price = 0; // Init additional charge as 0 
                /** Loop through checked check boxes and grab value of price with the help of data attribute*/
                $('.add_pack:checked').each(function() {
                    // Addition of price 
                    add_pack_price += parseFloat($(this).data('price'));
                });
                // Let's add additional charge to main price 
                var price = parseFloat($('#packPrice').val());
                price += add_pack_price;
                // Render the final price 
                $('.total-price').html('Book order [₹' + price + ']')
                console.log(price);
                window.value = price;
                 
            });

            $('body').on('click', '.btnvnameclass', function() {
                var venue_nm = $(this).data('vname');
                console.log(venue_nm);
                $('#venueTextarea').val(venue_nm);
            });
        });
    </script>
</body>

</html>