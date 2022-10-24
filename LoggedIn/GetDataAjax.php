<?php
session_start();
include('../DBCONNECT.php');

if (isset($_GET['s'])) {
    $statecode =  $_GET['s'];
    //if(empty($_GET['s'])){$statecode = 1;} else {$statecode = $_GET['s'];}
    //echo $statecode;
    $city = array();
    $sql = "SELECT * FROM city where State_idState = $statecode";
    //echo "<script>console.log('".$sql."')</script>";
    $result = getDataAsArray($conn, $sql);
    if (mysqli_num_rows($result) == 0) {
        $NonData = array();
        $NonData["0"] = "Select Valid Option";
        array_push($city, $NonData);
    } else {
        while ($row = mysqli_fetch_array($result)) {
            //echo '<option value='.$row["City_Name"].'>'.$row['City_Name'].'</option>';
            //$row["City_Name"] = $row["idCity"];
            array_push($city, $row);
        }
    }
    echo json_encode($city);
}

// This code is for selecting area depends on the city
else if (isset($_REQUEST['c'])) {
    $citycode =  $_REQUEST['c'];
    //if(empty($_GET['s'])){$statecode = 1;} else {$statecode = $_GET['s'];}
    // echo $citycode;
    $area = array();
    $sql = "SELECT * FROM area where City_idCity = $citycode";
    //echo "<script>console.log('".$sql."')</script>";
    $result = getDataAsArray($conn, $sql);
    if (mysqli_num_rows($result) == 0) {
        $NonData = array();
        $NonData["0"] = "Select Valid Option";
        array_push($area, $NonData);
    } else {
        while ($row = mysqli_fetch_array($result)) {
            //echo '<option value='.$row["City_Name"].'>'.$row['City_Name'].'</option>';
            array_push($area, $row);
        }
    }
    echo json_encode($area);
} else if (isset($_REQUEST['v'])) {
    $vcode =  $_REQUEST['v'];
    //if(empty($_GET['s'])){$statecode = 1;} else {$statecode = $_GET['s'];}
    // echo $citycode;
    $area = array();
    $sql = "SELECT Venue_Name,Venue_Price,Venue_Contact FROM event_venue WHERE  Area_idArea = $vcode";
    //echo "<script>console.log('".$sql."')</script>";
    $result = getDataAsArray($conn, $sql);
    if (mysqli_num_rows($result) == 0) {
        $NonData = array();
        $NonData["Venue_Name"] = "No Venue Found";
        $NonData["Venue_Price"] = "0";
        $NonData["Venue_Contact"] = "---";
        $NonData["Status"] = "0";
        array_push($area, $NonData);
    } else {
        while ($row = mysqli_fetch_array($result)) {
            array_push($area, $row);
        }
    }
    echo json_encode($area);
}
// action 
else if (isset($_POST['action'])) {
    if ($_POST['action'] == "add_data") {
        $PackageType   =  htmlspecialchars($_POST["PackageType_Data"]);
        $EventCat   =  htmlspecialchars($_POST['EventCat_Data']);
        $StartDat   =  htmlspecialchars($_POST['StartDate_Data']);
        $EndDat   =  htmlspecialchars($_POST['EndDate_Data']);
        $AlbumDel   =  htmlspecialchars($_POST['AlbumDelivery_Data']);
        $AreaID   =  htmlspecialchars($_POST['AreaID_Data']);
        $VenueAdd   =  htmlspecialchars($_POST['VenueAdd_Data']);
        $AddiId  = $_POST['Additional_Id'];
        $TotalPrice =  htmlspecialchars($_POST['PackagePrice']);
        $EventDate = date("Y-m-d");
        $CheckAddID = htmlspecialchars($_POST['CheckAddID']);
        $email = $_SESSION["email"];
        $sqls = "select idUser from user where User_Email = '$email' ";
        $result = mysqli_query($conn, $sqls);
        $data = mysqli_fetch_row($result);
        $userID = $data[0];
        $sqll = "";
        if ($CheckAddID == "true") {
            conme("Value found in Addid"+$AddiId);
            $sqll = "INSERT INTO  event_order ( Event_Order_Date ,  Event_Address ,  Event_Date ,  Last_Date_Event ,  Album_Delivery_Address  ,  User_ID_idUser ,  Additional_Package_idAdditional_Package ,  Event_Category_idEvent_Category ,  Package_idPackage ,  Area_idArea, Price ) VALUES ('$EventDate','$VenueAdd','$StartDat','$EndDat','$AlbumDel','$userID','$AddiId','$EventCat','$PackageType','$AreaID','$TotalPrice')";
        } else {
            conme($AddiId);
            conme("value not found of AdditionalID");
            $sqll = "INSERT INTO  event_order ( Event_Order_Date ,  Event_Address ,  Event_Date ,  Last_Date_Event ,  Album_Delivery_Address  ,  User_ID_idUser  ,  Event_Category_idEvent_Category ,  Package_idPackage ,  Area_idArea, Price ) VALUES ('$EventDate','$VenueAdd','$StartDat','$EndDat','$AlbumDel','$userID','$EventCat','$PackageType','$AreaID','$TotalPrice')";
            conme($sqll);
        }

        if (!mysqli_query($conn, $sqll)) {
            conme("Error Occured Please try again ! <br/>" + mysqli_error($conn));
            echo "0";
        } else {
            echo "1";
            header('Location: My_Orders.php');
        }
    } 
    else {
        alertme("Not valid user !");
        header("Location:../Login.php");
    }











}

else if(isset($_POST['offercode'])){
    echo "251205";
}

/**$ProDetq = "SELECT * FROM print_type GROUP by Product_idProduct_Id";
    //"SELECT  `Product_idProduct_Id`,`Print_Size`, `Print_Price` FROM `print_type` WHERE ".$cnt." GROUP by Product_idProduct_Id"
    $ProDet = mysqli_query($conn,$ProDetq) or die("Error Occured");
        while($ProdDetls =mysqli_fetch_array($ProDet)){
            // $ProdDetls = mysqli_fetch_array($conn,$ProDet);
            $Pid = $ProdDetls['Product_idProduct_Id'];
            $pz = $ProdDetls['Print_Size'];
            $pp = $ProdDetls['Print_Price'];
            conme($Pid);
            conme($pz);
            conme($pp);
        } */
?>
