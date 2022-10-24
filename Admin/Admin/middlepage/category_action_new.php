<?php 

if ($_REQUEST['action']) 
{
	$action = $_REQUEST['action'];
	$category_id = $_REQUEST['category_id'];
	$Product_Name = $_REQUEST['Product_Name'];
	$Product_Type = $_REQUEST['Product_Type'];
	$Product_MaterialType = $_REQUEST['Product_MaterialType'];
	$Product_Image1 = $_FILES['Product_Image1']['name'];
	$tmp_name = $_FILES['Product_Image1']['tmp_name'];
	
	

switch ($action) {
		case 'insert':
		    move_uploaded_file($tmp_name,"upload/product/".$Product_Image1);
			$insert = "INSERT INTO `product` (`Product_Name`,`Product_Type`,`Product_MaterialType`,`Product_Image1`) VALUES ('".$Product_Name."','".$Product_Type."','".$Product_MaterialType."','".$Product_Image1."') ";
			$qry = mysqli_query($con,$insert);
			if ($qry) 
			{
				$_SESSION['succ'] = '<div class="alert alert-success">
                            <b><strong>Success..!!!</strong> Your Data Insert Successfully...!!!</b>
                        </div>';
				header("location:index.php?page=category_list_new");
				//echo "Insert Okok";
			}
			else
			{
				echo "Insert Not";
			}
			break;

			case 'update':
			    $u_date = date("Y-m-d-h-i-s");
				$update = "UPDATE `category` SET `category_name`='".$category_name."',`category_image`='".$category_image."',`u_date` = '".$u_date."' WHERE `category_id` = '".$category_id."' ";
				$qry = mysqli_query($con,$update);
				if ($profile!="") 
				{
					$selectImg = "SELECT * FROM `category` WHERE `category_id` = '".$category_id."' ";
					$qryImg = mysqli_query($con,$selectImg);
					$rowImg = mysqli_fetch_assoc($qryImg);
					unlink("upload/category/".$rowImg['category_image']);
					move_uploaded_file($tmp_name,"upload/category/".$category_image);
					$upImg = "UPDATE `category` SET `category_image` = '".$category_image."' WHERE `category_id` = '".$category_id."' ";
					$qryUpImg = mysqli_query($con,$upImg); 
				}
				if ($qry || $qryUpImg) 
				{
					$_SESSION['UpMsg'] = '<div class="alert alert-primary">
                           <b> <strong>Succss..!!</strong> Your Data Update Successfully...!!!</b>
                        </div>';
					header("location:index.php?page=category_list_new");
					//echo "Update Okok";
				}
				else
				{
					echo "Update Not";
				}

			
			case 'delete':
			$category_id = $_REQUEST['category_id'];
			$DeleteCategoryImg = "SELECT * FROM `category` WHERE `category_id` = '".$category_id."' ";
			$QryCategoryImg = mysqli_query($con,$DeleteCategoryImg);
			$RowCategoryImg = mysqli_fetch_assoc($QryCategoryImg);
			unlink("upload/category/".$RowCategoryImg['category_image']); 
			$delete = "DELETE FROM `category` WHERE `category_id` = '".$category_id."' ";
			$qry = mysqli_query($con,$delete);
			if ($qry) 
			{
				$_SESSION['delMsg'] = '<div class="alert alert-danger">
                            <b><strong>Succss..!!</strong> Your Data Delete Successfully...!!!!</b>
                        </div>';
				header("location:index.php?page=category_list_new");
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