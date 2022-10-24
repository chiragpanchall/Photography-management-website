<?php
session_start();
include('../DBCONNECT.php');

if ($_GET['action'] == 'updateE') {
    $EID = $_GET['id'];
    conme($EID);
   //echo $Delq = "delete from event_order where idEvent_Order = '$EID'";
   // $result = mysqli_query($conn, $Delq) or die($conn);
   $Delq = "UPDATE `event_order` SET `Status`= 4 WHERE idEvent_Order = '$EID'"; 
   if(mysqli_query($conn, $Delq)){
       header('Location:My_Orders.php');
    }
    else {
        echo "Failed to delete the order. Please try again";
    }


}
 else if($_GET['action'] == 'updateP') {
    $EID = $_GET['id'];
    conme($EID);
    
    //  $POD = "DELETE FROM `printing_order_details` WHERE Printing_Order_idPrinting_Order_Details = '$EID'";
    $POD = "UPDATE `printing_order` SET `Status`= 3 WHERE idPrinting_Order =  $EID";
     if(mysqli_query($conn, $POD)){
        header('Location:My_Orders.php');
     }
     else {
         echo "Failed to delete the order. Please try again";
     }
 
   
 
   
   // $result = mysqli_query($conn, $Delq) or die($conn);
}

//
else if ($_GET['action'] == 'deleteE') {
    $EID = $_GET['id'];
    conme($EID);
    $Delq = "delete from event_order where idEvent_Order = '$EID'";
   // $result = mysqli_query($conn, $Delq) or die($conn);
   if(mysqli_query($conn, $Delq)){
       header('Location:My_Orders.php');
    }
    else {
        echo "Failed to delete the order. Please try again";
    }


}
 else if($_GET['action'] == 'deleteP') {
    $EID = $_GET['id'];
    conme($EID);

     //  Removing image from directtory
    $reQ = "SELECT * FROM printing_order_details WHERE Printing_Order_idPrinting_Order_Details = '$EID'";
    $resultR = mysqli_query($conn,$reQ) or die($conn);
    $Rid = mysqli_fetch_array($resultR);
   echo $Ruid = "../Data/Order_Image/PrintedOrderImg/".$Rid['Printing_Order_Image'];
   echo  unlink("$Ruid");
    // Delete Query
    $flag = 0;
    echo $POD = "DELETE FROM `printing_order_details` WHERE Printing_Order_idPrinting_Order_Details = '$EID'";
     if(mysqli_query($conn, $POD)){
        header('Location:My_Orders.php');
        $flag = 1;
     }
     else {
         echo "Failed to delete the order. Please try again";
     }

    echo $PO = "DELETE FROM `printing_order` WHERE idPrinting_Order = '$EID'";
     if(mysqli_query($conn, $PO)){
         if($flag == 1){
        header('Location:My_Orders.php');
       echo "last consd success";
     }
        else{
            echo "Please Try again";
        }
     }
     else {
         echo "Failed to delete the order. Please try again all failed";
     } 

}
//Change the event order status


// /   //
else {
alertme("Operation not satisfy");
}

?>
