<?php
session_start();
include('../DBCONNECT.php');
//Product details 
  $Date =  date("Y-m-d");
  $OrderAddress = $_REQUEST['OrderAdd'];
  $TotalValue = $_REQUEST['TotalValue'];
  $TotalValue = ltrim($TotalValue, '₹');
  $Area = $_REQUEST['Area'];
  //Sub product details
  $pid = $_REQUEST['pid'];
  $PrintedImgPath = $_FILES["file"]['name'];
  $Type = $_REQUEST['Type'];
  $Qnty = $_REQUEST['Qnty'];
  $State = $_REQUEST['State'];
  $City = $_REQUEST['City'];
  // Getting the offerid from offercode
  $OfferD = $_REQUEST['OfferID'];
  if($OfferD != 0){
   $getOID = "select idOffer from offer where Offercode = '$OfferD'";
   $result = mysqli_query($conn,$getOID) or die($conn);
   $id = mysqli_fetch_array($result);
   $OfferD = $id['idOffer'];  
  }
  else {  $OfferD = -1;}

  $Email = $_SESSION['email']; 
  
  // getting the userid from email
  $uid = 0;
  $getUID = "select idUser from user where User_Email = '$Email' limit 1";
  $result = mysqli_query($conn,$getUID) or die($conn);
  $id = mysqli_fetch_array($result);
  $uid = $id['idUser'];


  // Adding the data in the product details
 $results = mysqli_query($conn,"insert into printing_order(`idPrinting_Order`,`Printing_Order_Date`,`Delivery_Address`,`Total_Amount`,`Offer_idOffer`,`Area_idArea`,`User_idUser`) values(NULL,'$Date','$OrderAddress',$TotalValue,$OfferD,$Area,$uid)") or die($conn);
$f1 = mysqli_affected_rows($conn);

//Getting the recent transcation id
$getPID = mysqli_insert_id($conn); 
//Getting Print type id....
 $getTID = "select idPrint_Type from print_type where Print_Size = '$Type' limit 1";
 $result = mysqli_query($conn,$getTID) or die($conn);
 $id = mysqli_fetch_array($result);
 $TypeD = $id['idPrint_Type'];
//echo "Data is inserted";



// Uploading photo   //  $PrintedImgPath = $_FILES["file"]['tmp_name'];
$info = pathinfo($PrintedImgPath);
$image_name =  basename($PrintedImgPath,'.'.$info['extension']);
$pxt = explode('.', $PrintedImgPath);
$ext = end($pxt);

//$extension = substr($PrintedImgPath, strpos($PrintedImgPath,"."), strlen($PrintedImgPath));	
$imgnewfile = md5($image_name).'.'.$ext;
move_uploaded_file($_FILES["file"]['tmp_name'], "../Data/Order_Image/PrintedOrderImg/" . $imgnewfile); 

$PDTLS = "insert into printing_order_details(`Printing_Order_idPrinting_Order_Details`,`Print_Type_idPrint_Type`,`Print_Type_Product_idProduct_Id` ,`Printing_Order_Quantity`,`Printing_Order_Image`) values($getPID,$TypeD, $pid,$Qnty,'$imgnewfile')";
$result = mysqli_query($conn,$PDTLS) or die($conn);
$f2 = mysqli_affected_rows($conn);
if($f1 == -1 && $f2 == -1){
  echo "0";
}
  else {
    echo "1";
  }

 
// mysqli_affected_rows
//to check the affected the rows..


//Validating the post data

  // echo  "Type :".$Type;
  // echo "<br/>";
  // echo "Path :".$PrintedImgPath;
  // echo "<br/>";
  // echo "State :".$State;
  // echo "<br/>";
  // echo "City :".$City;
  // echo "<br/>";
  // echo "Area :".$Area;
  // echo "<br/>";
  // echo "orders Address :".$OrderAddress;
  // echo "<br/>";
  // echo "TValue :".$TotalValue;
  // echo "<br/>";
  // echo "DAte :".$Date;
  // echo "<br/>";
  // echo "ProductID :".$pid;
  // echo "<br/>";
  // echo "Offercode :".$OfferD;
  // echo "<br/>";

?>