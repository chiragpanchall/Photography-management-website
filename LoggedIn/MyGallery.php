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
    $Email = $_SESSION['email']; 
    $uid = 0;
    $getUID = "select idUser from user where User_Email = '$Email' limit 1";
    $result = mysqli_query($conn,$getUID) or die($conn);
    $id = mysqli_fetch_array($result);
    $uid = $id['idUser'];
    // Adding the 
    $reQ = "SELECT idEvent_Order FROM `event_order` WHERE event_order.User_ID_idUser = '$uid'";
    $resultR = mysqli_query($conn,$reQ) or die($conn);
    $Rid = mysqli_fetch_array($resultR);
    $Ruid = $Rid['idEvent_Order'];
    $ll = 'MyGallery.php?Eid='.$Ruid;
    // header('Location:MyGallery.php?id='.$Ruid);
    echo '<script>window.location.href("'.$ll.'");</script>';
    // Get the id of the user and and load the data ..before load, check order status

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
    <title>My Gallery</title>
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

<body style="color: var(--gray);background: var(--dark);">

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
                    <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"> <img class="dropdown-image" src= "<?php echo $profile; ?>">
                    <?php echo $data['User_Fname'] ?>
                </a>
                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="EditProfile.php">Edit Profile</a><a class="dropdown-item" href="../LogOut.php">Logout </a></div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
  <!-- Empty portion of the project please dont remove me... -->

    <!-- <div id="EmptyPort" >
        <div class="container" style="text-align: center;"><img src="assets/img/Empty_album.png" style="width: 500px;text-align: center;margin: 10px;padding: 0px;"><input class="form-control-plaintext" type="text" value="Oops ! You don't have any photo." readonly="" style="color: var(--light);font-size: 51px;text-align: center;font-family: Cookie, cursive;"></div>
    </div>  -->

   <!-- SELECT album_images.Album_Images_Path from album_images ,event_order where album_images.Event_Order_idEvent_Order  = 52 and event_order.User_ID_idUser = 1 -->
<?php
$idd = "";
if(!empty($_GET['Eid']))
{
    $idd = $_GET['Eid'];
}
else {
    $idd = $Ruid;
}

 $d = "SELECT `album_images`.*, `event_order`.`User_ID_idUser` FROM `album_images` 	LEFT JOIN `event_order` ON `album_images`.`Event_Order_idEvent_Order` = `event_order`.`idEvent_Order` WHERE event_order.User_ID_idUser = '$uid' and  event_order.Status = 2 ";
//  album_images.Event_Order_idEvent_Order = '$idd' and
$result = mysqli_query($conn,$d) or die("Error Occured : ".$conn);
if(mysqli_num_rows($result) == 0){
    echo ' <div id="EmptyPort" >
    <div class="container" style="text-align: center;"><img src="assets/img/Empty_album.png" style="width: 500px;text-align: center;margin: 10px;padding: 0px;"><input class="form-control-plaintext" type="text" value="Oops ! You don\'t have any photo." readonly="" style="color: var(--light);font-size: 51px;text-align: center;font-family: Cookie, cursive;"></div>
</div>';
}
else{
 ?>

 <div id="ShowOrder">
        <div style="text-align: center;">
            <p style="background: var(--dark);font-size: 73px;color: #e0219e;font-family: Armata, sans-serif;"><strong>Gallery</strong><br></p>
        </div>


<!-- Select the orders -->
<p class="container" align="left"> *Note : Please choose images wisely. Once you choose the photos it would not be unselect. Album-Images should be choose within 2-3 days. Once studio owner took the selected images for further process you can't see images here . For any problem please contact us.  </p>

<div class="" align="right" style="padding: 10px">
    <table>
    <thead>
                    <tr>
                    <!-- <td style="color: var(--light);font-size: 26px;text-align: left; padding: 5px">Mode :<strong> Edit</strong> </td> -->
                    <!-- <td style="color: var(--white);font-size: 25px;text-align: left;"><strong> Fresh</strong></td> -->
                    <td style="color: var(--white);font-size: 25px;text-align: right;"> 
        </tr>
        <tr>
            <td>
     
     <!-- DropDown Btn -->
    <div class="dropdown show container" align="right" style="padding: 10px">
  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Select Order
  </a>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

  <?php 
//   Getting the total orders of the users in dropdown button...
$getOrder = "select * from event_order where User_ID_idUser = '$uid'";
$result = mysqli_query($conn,$getOrder) or die($conn);
while($row = mysqli_fetch_array($result)){
    $link = "MyGallery.php?Eid=".$row['idEvent_Order'];
    echo '<a class="dropdown-item" href="'.$link.'">'.date("jS D ,Y", strtotime($row["Event_Order_Date"])).'</a>';
}
?>
</div>
</div>

            </td>
        </tr>

<!-- <tr>
<td>
<select id="GalID" class="dropdown show container btn-secondary" onchange="SetId()"> -->
<?php 
// $getOrder = "select * from event_order where User_ID_idUser = '$uid'";
// $result = mysqli_query($conn,$getOrder) or die($conn);
// while($row = mysqli_fetch_array($result)){
//     $link = $row['idEvent_Order'];
//     echo '<option value="'.$link.'">'.date("jS D ,Y", strtotime($row["Event_Order_Date"])).'</option>';
// }

?>
<!-- </select>
<script>
function SetId(){
    let gid = document.getElementById('GalID').value;

    
    console.log(gid);
}
</script>
</td>
</tr> -->



    </thead>
    </table>
    </div>




        <!--  -->
        <div class="table-responsive" data-aos="fade-left" data-aos-offset="100px" style="margin: 0px;padding: 28px;background: var(--dark);border-color: #e0219e;">
        <!--  -->
        <table class="table">
                <tbody>
<?php  

$GetImgQ = "SELECT * FROM `album_images` WHERE `Event_Order_idEvent_Order` = '$idd'";
$result = mysqli_query($conn,$GetImgQ) or die("Error Occured");
$n = mysqli_num_rows($result);
if($n != 0){
conme("This is total number of data --".$n);
$lnk = '../Data/Order_Image/EventOrderImg/';
for($cnt = 0;$cnt <= $n-3;$cnt++){
    echo ' <tr class="bounce animated" style="border-color: #e0219e;">';
   ?>
      <!-- <table class="table">
                <tbody> -->
                    <!-- <tr class="bounce animated" style="border-color: #e0219e;"> -->
<?php 
    for($i=0;$i<3;$i++){
        $row = mysqli_fetch_array($result);
        conme($i."--".$row['Album_Images_Path']);
       if($row['Album_Images_Path'] != null)
       {
?>
                     <td style="color: #e0219e;">
                            <div class="table-responsive" style="font-size: 30px;margin: 15px;padding: 49px;">
                                <table class="table">
                                    <thead>
                                    <tr>
                                            <td class="text-center" style="text-align: right;">
                                            <a href='<?php echo $lnk.$row['Album_Images_Path']?>' style="color: var(--light);">View</a></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="text-align: center;"><img src='<?php echo $lnk.$row['Album_Images_Path']?>' style="width: 247px;height: 350px;" style="width: 247px;height: 350px;"></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;">
                                           
                                <input type="checkbox" name="imgID" style="width: 44px;height: 34px;margin: 0px;padding: 0px;margin-right: 42px;"  <?php echo  $row['Album_Type']== 1 ? 'disabled' : '' ?>  value="<?php echo $row['idAlbum_Images']; ?>" <?php echo  $row['Album_Selection']== 1 ? 'checked' : '' ?>>
                            </td>
                                    </tr>
                
                <!-- <script>
                    onchange="addme('imgID')"
         function addme(checkboxName){
              var checkboxes = document.querySelectorAll('input[name="' + checkboxName + '"]:checked'), values = [];
             Array.prototype.forEach.call(checkboxes, function(el) {
                    values.push(el.value);
                 });
                console.log(values);  
                          }
                                        
                                        </script> -->
                                        <tr></tr>
                                    </tbody>
                                </table>
                            </div>
                        </td>
    <?php }} ?>
<!--
                        <td>
                            <div class="table-responsive" style="font-size: 30px;margin: 15px;padding: 49px;">
                                <table class="table">
                                    <thead>
                                    <tr>
                                            <td class="text-center" style="text-align: right;">
                                            <a href='<?php //echo $lnk.$row['Album_Images_Path']?>' style="color: var(--light);">View</a></td>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        <tr></tr>
                                        <tr>
                                            <td style="text-align: center;">
                                            <img src='<?php //echo $lnk.$row['Album_Images_Path']?>' style="width: 247px;height: 350px;"></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;"><input type="checkbox" style="width: 44px;height: 34px;margin: 0px;padding: 0px;margin-right: 42px;"></td>
                                        </tr>
                                        <tr></tr>
                                    </tbody>
                                </table>
                            </div>
                        </td> -->
                        
                        <!-- <td>
                            <div class="table-responsive" style="font-size: 30px;margin: 15px;padding: 49px;">
                                <table class="table">
                                    <thead>
                                        <tr></tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center" style="text-align: right;">
                                            <a href='<?php //echo $lnk.$row['Album_Images_Path']?>' style="color: var(--light);">View</a></td>
                                        </tr>
                                    
                                        <tr>
                                            <td style="text-align: center;">
                                            <img src='<?php //echo $lnk.$row['Album_Images_Path']?>' style="width: 247px;height: 350px;"></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;"><input type="checkbox" style="width: 44px;height: 34px;margin: 0px;padding: 0px;margin-right: 42px;"></td>
                                        </tr>
                                        <tr></tr>
                                    </tbody>
                                </table>
                            </div>
                        </td>
                         -->
                    </tr>
<?php 
 
}
?>

                    <!-- Above is original rows. -->
                    <!-- <tr class="bounce animated" style="border-color: #e0219e;">
                        <td style="color: #e0219e;">
                            <div class="table-responsive" style="font-size: 30px;margin: 15px;padding: 49px;">
                                <table class="table">
                                    <thead>
                                    <tr>
                                            <td class="text-center" style="text-align: right;"><a href="assets/img/silver.jpg" style="color: var(--light);">View</a></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="text-align: center;"><img src="assets/img/golden.png" style="width: 247px;height: 350px;" style="width: 247px;height: 350px;"></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;"><input type="checkbox" style="width: 44px;height: 34px;margin: 0px;padding: 0px;margin-right: 42px;"></td>
                                        </tr>
                                        <tr></tr>
                                    </tbody>
                                </table>
                            </div>
                        </td>
                        <td>
                            <div class="table-responsive" style="font-size: 30px;margin: 15px;padding: 49px;">
                                <table class="table">
                                    <thead>
                                    <tr>
                                            <td class="text-center" style="text-align: right;"><a href="assets/img/silver.jpg" style="color: var(--light);">View</a></td>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        <tr></tr>
                                        <tr>
                                            <td style="text-align: center;"><img src="assets/img/golden.png" style="width: 247px;height: 350px;"></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;"><input type="checkbox" style="width: 44px;height: 34px;margin: 0px;padding: 0px;margin-right: 42px;"></td>
                                        </tr>
                                        <tr></tr>
                                    </tbody>
                                </table>
                            </div>
                        </td>
                        <td>
                            <div class="table-responsive" style="font-size: 30px;margin: 15px;padding: 49px;">
                                <table class="table">
                                    <thead>
                                        <tr></tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center" style="text-align: right;"><a href="assets/img/silver.jpg" style="color: var(--light);">View</a></td>
                                        </tr>


                                    
                                        <tr>
                                            <td style="text-align: center;"><img src="assets/img/golden.png" style="width: 247px;height: 350px;"></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;"><input type="checkbox" style="width: 44px;height: 34px;margin: 0px;padding: 0px;margin-right: 42px;"></td>
                                        </tr>
                                        <tr></tr>
                                    </tbody>
                                </table>
                            </div>
                        </td>
                    </tr> -->
                        <!-- 3rd row -->
                        <!-- <tr class="bounce animated" style="border-color: #e0219e;">
                        <td style="color: #e0219e;">
                            <div class="table-responsive" style="font-size: 30px;margin: 15px;padding: 49px;">
                                <table class="table">
                                    <thead>
                                    <tr>
                                            <td class="text-center" style="text-align: right;"><a href="assets/img/silver.jpg" style="color: var(--light);">View</a></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="text-align: center;"><img src="assets/img/golden.png" style="width: 247px;height: 350px;" style="width: 247px;height: 350px;"></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;"><input type="checkbox" style="width: 44px;height: 34px;margin: 0px;padding: 0px;margin-right: 42px;"></td>
                                        </tr>
                                        <tr></tr>
                                    </tbody>
                                </table>
                            </div>
                        </td>
                        <td>
                            <div class="table-responsive" style="font-size: 30px;margin: 15px;padding: 49px;">
                                <table class="table">
                                    <thead>
                                    <tr>
                                            <td class="text-center" style="text-align: right;"><a href="assets/img/silver.jpg" style="color: var(--light);">View</a></td>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        <tr></tr>
                                        <tr>
                                            <td style="text-align: center;"><img src="assets/img/golden.png" style="width: 247px;height: 350px;"></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;"><input type="checkbox" style="width: 44px;height: 34px;margin: 0px;padding: 0px;margin-right: 42px;"></td>
                                        </tr>
                                        <tr></tr>
                                    </tbody>
                                </table>
                            </div>
                        </td>
                        <td>
                            <div class="table-responsive" style="font-size: 30px;margin: 15px;padding: 49px;">
                                <table class="table">
                                    <thead>
                                        <tr></tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center" style="text-align: right;"><a href="assets/img/silver.jpg" style="color: var(--light);">View</a></td>
                                        </tr>


                                    
                                        <tr>
                                            <td style="text-align: center;"><img src="assets/img/golden.png" style="width: 247px;height: 350px;"></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;"><input type="checkbox" style="width: 44px;height: 34px;margin: 0px;padding: 0px;margin-right: 42px;"></td>
                                        </tr>
                                        <tr></tr>
                                    </tbody>
                                </table>
                            </div>
                        </td>
                    </tr> -->
                    <!-- 4th row --> 
                    <!-- <tr class="bounce animated" style="border-color: #e0219e;">
                        <td style="color: #e0219e;">
                            <div class="table-responsive" style="font-size: 30px;margin: 15px;padding: 49px;">
                                <table class="table">
                                    <thead>
                                    <tr>
                                            <td class="text-center" style="text-align: right;"><a href="assets/img/silver.jpg" style="color: var(--light);">View</a></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="text-align: center;"><img src="assets/img/golden.png" style="width: 247px;height: 350px;" style="width: 247px;height: 350px;"></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;"><input type="checkbox" style="width: 44px;height: 34px;margin: 0px;padding: 0px;margin-right: 42px;"></td>
                                        </tr>
                                        <tr></tr>
                                    </tbody>
                                </table>
                            </div>
                        </td>
                        <td>
                            <div class="table-responsive" style="font-size: 30px;margin: 15px;padding: 49px;">
                                <table class="table">
                                    <thead>
                                    <tr>
                                            <td class="text-center" style="text-align: right;"><a href="assets/img/silver.jpg" style="color: var(--light);">View</a></td>
                                        </tr> 

                                    </thead>
                                    <tbody>
                                        <tr></tr>
                                        <tr>
                                            <td style="text-align: center;"><img src="assets/img/golden.png" style="width: 247px;height: 350px;"></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;"><input type="checkbox" style="width: 44px;height: 34px;margin: 0px;padding: 0px;margin-right: 42px;"></td>
                                        </tr>
                                        <tr></tr>
                                    </tbody>
                                </table>
                            </div>
                        </td>
                        <td>
                            <div class="table-responsive" style="font-size: 30px;margin: 15px;padding: 49px;">
                                <table class="table">
                                    <thead>
                                        <tr></tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center" style="text-align: right;"><a href="assets/img/silver.jpg" style="color: var(--light);">View</a></td>
                                        </tr>       
                                        <tr>
                                            <td style="text-align: center;"><img src="assets/img/golden.png" style="width: 247px;height: 350px;"></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;"><input type="checkbox" style="width: 44px;height: 34px;margin: 0px;padding: 0px;margin-right: 42px;"></td>
                                        </tr>
                                        <tr></tr>
                                    </tbody>
                                </table>
                            </div>
                        </td>
                    </tr> -->

                    <!-- Below is original rows -->         
             
                </tbody>
                <!-- <tfoot>
                    <tr>
                        <td style="color: var(--light);font-size: 26px;text-align: right;">Selection Mode</td>
                        <td style="color: var(--white);font-size: 25px;text-align: center;"><strong>Fresh</strong></td>
                        <td style="text-align: right;"><a href="#" style="font-size: 20px;text-align: right;">Load More images</a></td>
                    </tr>
                </tfoot> -->
            </table>
            </div>
            <!-- Here we need to perform two queries 
            1 : add selected photos to album images 
            2 : And chage status of the event order
            -->
            <div style="padding: 10px;margin: 9px;">
            <!-- <a class="btn btn-primary btn-block bg-success" role="button" href="index.php">SUBMIT</a> -->
            <button class="btn btn-primary btn-block bg-success" role="button" onclick="addme('imgID')">SUBMIT</button>
        </div>
        </div>
    </div>
</div>
<!-- Gathering the all checked values -->
<script>       
 function addme(checkboxName){
        var checkboxes = document.querySelectorAll('input[name="' + checkboxName + '"]:checked'), values = [];
        Array.prototype.forEach.call(checkboxes, function(el) {
            values.push(el.value);
        });
        if(values.length == 0){
            alert("Please choose the album images ");
        }
        else{
            if(confirm("Are you sure want to submit the selected images ? Once submitted,it would't changed again."))
            {
                //var x = "UPDATE album_images SET Album_Selection = 1 WHERE idAlbum_Images IN ('1', '2', '3'); "
                console.log(values);

                //
             
                let xmlHttp = new XMLHttpRequest();
                 xmlHttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200)
                    {
                         alert(this.responseText);
                         window.location.reload();
                        
                    }
                    
                } 
                 xmlHttp.open("POST", "ImageSelection.php", true); 
                xmlHttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
                 xmlHttp.send("c=" + values);
                //JSON.stringify(values)
                // last perform
            }
            else {
                //Cancel button
            }
        }
          

    }
</script>





<!-- Endingg the outer loop and if condition -->
<?php }} ?> 



    <!-- Footer Code -->
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