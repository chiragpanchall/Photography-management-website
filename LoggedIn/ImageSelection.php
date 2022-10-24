<?php 
session_start();
include('../DBCONNECT.php');

$data = $_POST['c'];
if(isset($_REQUEST['c'])){
    $data =  $_POST['c'];
    $x = "UPDATE album_images SET Album_Selection = 1 WHERE idAlbum_Images IN ($data)";
    $result1 = mysqli_query($conn,$x) or die($conn);
    $x = "UPDATE album_images SET  Album_Type = 1 WHERE idAlbum_Images IN ($data)";
    $result2 = mysqli_query($conn,$x) or die($conn);
   if($result1 == 1 && $result2 == 1){
       echo "Thanks for choosing album images. \n Note : Images can be Increase or decrease according to your package";
    //    echo "<script>window.location.href('../LoggedIn/MyGallery.php');</script>";
    }
    else {
        echo mysqli_errno($result);
    }
}
else {
    echo "Please try again ..";
}
// if(!empty($_REQUEST['data'])){
//     echo $_REQUEST['data']."Value goattten";
//   }
//   else{
//       echo "Not getting anything";
//   }


?>