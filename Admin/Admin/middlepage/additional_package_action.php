<?php 
include('config.php');
// echo "<pre>";
// print_r($_REQUEST);
// print_r($_FILES);

if ($_REQUEST['action']) 
{
	$action = $_REQUEST['action'];



	switch ($action) {
		case 'insert':
			$idProduct = $_REQUEST['idAdditional_Package'];
			$Video_MDuration = $_REQUEST['Video_MDuration'];
			$Price = $_REQUEST['Price'];	
			$Frames = $_REQUEST['Frames'];
			$tmp_name = $_FILES['images']['tmp_name'];
			$Drone_Shooting = $_REQUEST['Drone_Shooting'];
			$Live_Shooting = $_REQUEST['Live_Shooting'];		
			$images = $_REQUEST['Images'];
		    
			$insert = "INSERT INTO `additional_package` (`Frames`,`Video_MDuration`,`Price`,`images`,`Drone_Shooting`,`Live_Shooting`) VALUES ('".$Frames."','".$Video_MDuration."','".$Price."','".$images."','".$Drone_Shooting."','".$Live_Shooting."') ";
			$qry = mysqli_query($con,$insert);
			if ($qry) 
			{
				$_SESSION['succ'] = '<div class="alert alert-success">
                            <b><strong>Success..!!!</strong> Your Data Insert Successfully...!!!</b>
                        </div>';
				
				header("location:index.php?page=additional_package_list");
				//echo "Insert Okok";
			}
			else
			{
				echo "Insert Not";
			}
			break;

			case 'update':
			    $u_date = date("Y-m-d-h-i-s");
				$update = "UPDATE `product` SET `category_id`='".$category_id."',`sub_category_id`='".$sub_category_id."',`brand_id`='".$brand_id."',`product_name`='".$product_name."',`product_img`='".$product_img."',`product_description` = '".$product_description."',`product_price`='".$product_price."',`product_quantity` = '".$product_quantity."' WHERE `idProduct` = '".$idProduct."' ";
				$qry = mysqli_query($conn,$update);
				if ($profile!="") 
				{
					$selectImg = "SELECT * FROM `product` WHERE `idProduct` = '".$idProduct."' ";
					$qryImg = mysqli_query($con,$selectImg);
					$rowImg = mysqli_fetch_assoc($qryImg);
					unlink("upload/product/".$rowImg['product_img']);
					move_uploaded_file($tmp_name,"upload/product/".$product_img);
					$upImg = "UPDATE `product` SET `product_img` = '".$product_img."' WHERE `idProduct` = '".$idProduct."' ";
					$qryUpImg = mysqli_query($con,$upImg); 
				}
				if ($qry || $qryUpImg) 
				{
					$_SESSION['UpMsg'] = '<div class="alert alert-primary">
                           <b> <strong>Succss..!!</strong> Your Data Update Successfully...!!!</b>
                        </div>';
					
					header("location:index.php?page=additional_package_list");
					//echo "Update Okok";
				}
				else
				{
					echo "Update Not";
				}

					
				case 'delete':
			$idProduct = $_REQUEST['idAdditional_Package'];
			echo $delete = "DELETE FROM `additional_package` WHERE `idAdditional_Package` =  '".$idProduct."' ";
			$qry = mysqli_query($conn,$delete);
			if ($qry) 
			{
				$_SESSION['delMsg'] = '<div class="alert alert-danger">
                            <b><strong>Succss..!!</strong> Your Data Delete Successfully...!!!!</b>
                        </div>';
		
				header("location:index.php?page=additional_package_list");
				//echo "Delete OKok";
			}
			else
			{
				header("location:index.php?page=additional_package_list");
				echo "Delete Not";
			}
			break;
		
		default:
			echo "ERROR";
			break;
	}

}

?>