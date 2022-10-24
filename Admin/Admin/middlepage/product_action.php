
<?php 
echo "<pre>";
print_r($_REQUEST);
print_r($_FILES);

if ($_REQUEST['action']) 
{
  $action = $_REQUEST['action'];
 	//$idProduct = $_REQUEST['idProduct'];
 	$Product_Type = $_REQUEST['Product_Type'];
 	$Product_MaterialType = $_REQUEST['Product_MaterialType'];
 	$product_name = $_REQUEST['product_name'];
 	$product_img1 = $_FILES['product_img1']['name'];
 	$product_img2 = $_FILES['product_img2']['name'];
 	$product_img3 = $_FILES['product_img3']['name'];
 	$product_img4 = $_FILES['product_img4']['name'];
 	$tmp_name1 = $_FILES['product_img1']['tmp_name'];
 	$tmp_name2 = $_FILES['product_img2']['tmp_name'];
 	$tmp_name3 = $_FILES['product_img3']['tmp_name'];
 	$tmp_name4 = $_FILES['product_img4']['tmp_name'];
 	$product_description = $_REQUEST['product_description'];
 	//$product_price = $_REQUEST['product_price'];
 	//$product_quantity = $_REQUEST['product_quantity'];


	switch ($action) {
		case 'insert':
			move_uploaded_file($tmp_name1,"/xampp/htdocs/Final_Project/Data/PrintedPic/".$product_img1);
			move_uploaded_file($tmp_name2,"/xampp/htdocs/Final_Project/Data/PrintedPic/".$product_img2);
			move_uploaded_file($tmp_name3,"/xampp/htdocs/Final_Project/Data/PrintedPic/".$product_img3);
			move_uploaded_file($tmp_name4,"/xampp/htdocs/Final_Project/Data/PrintedPic/".$product_img4);
			echo $insert = "INSERT INTO `product`( `Product_Name`, `Product_Type`, `Product_MaterialType`, `Product_Image1`, `Product_Image2`, `Product_Image3`, `Product_Image4`)  VALUES ('".$product_name."','".$Product_Type."','".$Product_MaterialType."','".$product_img1."','".$product_img2."','".$product_img3."','".$product_img4."') ";
			$qry = mysqli_query($con,$insert);
			if ($qry) 
			{
				$_SESSION['succ'] = '<div class="alert alert-success">
							<b><strong>Success..!!!</strong> Your Data Insert Successfully...!!!</b>
							Note : Please Add its print type untill Product Data is not enough
                        </div>';
				
				header("location:index.php?page=print_type");
				//echo "Insert Okok";
			}
			else
			{
				
				echo "Insert Not";
			}
			break;


			case 'update':
			    // $u_date = date("Y-m-d-h-i-s");
				// $update = "UPDATE `product` SET `category_id`='".$category_id."',`sub_category_id`='".$sub_category_id."',`brand_id`='".$brand_id."',`product_name`='".$product_name."',`product_img`='".$product_img."',`product_description` = '".$product_description."',`product_price`='".$product_price."',`product_quantity` = '".$product_quantity."' WHERE `idProduct` = '".$idProduct."' ";
				// $qry = mysqli_query($con,$update);
				// if ($profile!="") 
				// {
				// 	$selectImg = "SELECT * FROM `product` WHERE `idProduct` = '".$idProduct."' ";
				// 	$qryImg = mysqli_query($con,$selectImg);
				// 	$rowImg = mysqli_fetch_assoc($qryImg);
				// 	unlink("upload/product/".$rowImg['Product_Image1']);
				// 	move_uploaded_file($tmp_name,"upload/product/".$product_img);
				// 	$upImg = "UPDATE `product` SET `Product_Image1` = '".$product_img."' WHERE `idProduct` = '".$idProduct."' ";
				// 	$qryUpImg = mysqli_query($con,$upImg); 
				// }
				// if ($qry || $qryUpImg) 
				// {
				// 	$_SESSION['UpMsg'] = '<div class="alert alert-primary">
                //            <b> <strong>Succss..!!</strong> Your Data Update Successfully...!!!</b>
                //         </div>';
					
				// 	header("location:index.php?page=product_list");
				// 	//echo "Update Okok";
				// }
				// else
				// {
				// 	echo "Update Not";
				// }

			

			case 'delete':
			$idProduct = $_REQUEST['idProduct'];
			$DeleteProductImg = "DELETE FROM `print_type` WHERE `Product_idProduct_Id` =  '".$idProduct."' ";
			$QryProductImg = mysqli_query($con,$DeleteProductImg);
	    	$DeleteProductImg = "SELECT * FROM `product` WHERE `idProduct` = '".$idProduct."' ";
			$QryProductImg = mysqli_query($con,$DeleteProductImg);
			$RowProductImg = mysqli_fetch_array($QryProductImg);
			unlink("/xampp/htdocs/Final_Project/Data/PrintedPic/".$RowProductImg[4]);
			unlink("/xampp/htdocs/Final_Project/Data/PrintedPic/".$RowProductImg[5]);
			unlink("/xampp/htdocs/Final_Project/Data/PrintedPic/".$RowProductImg[6]);
			unlink("/xampp/htdocs/Final_Project/Data/PrintedPic/".$RowProductImg[7]);
			echo $delete = "DELETE FROM `product` WHERE `idProduct` = '".$idProduct."' ";
			$qry = mysqli_query($con,$delete);
				header("location:index.php?page=product_list");
			
			if ($qry) 
			{
				$_SESSION['delMsg'] = '<div class="alert alert-danger">
                            <b><strong>Succss..!!</strong> Your Data Delete Successfully...!!!!</b>
                        </div>';
				
				header("location:index.php?page=product_list");
				//echo "Delete OKok";
			}
			else
			{
				echo "Delete Not";
			}
			break;
		
		default:
			echo "ERROR";
			break;
	}
}

?>