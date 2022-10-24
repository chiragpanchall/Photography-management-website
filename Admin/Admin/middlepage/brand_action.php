<?php 

if ($_REQUEST['action']) 
{
	$action = $_REQUEST['action'];
	$brand_id = $_REQUEST['brand_id'];
	$category_id = $_REQUEST['category_id'];
	$sub_category_id = $_REQUEST['sub_category_id'];
	$brand_name = $_REQUEST['bname'];
	$brand_image = $_FILES['brand_image']['name'];
	$tmp_name = $_FILES['brand_image']['tmp_name'];
	
	

switch ($action) {
		case 'insert':
		    move_uploaded_file($tmp_name,"upload/brand/".$brand_image);
			$insert = "INSERT INTO `brand` (`category_id`,`sub_category_id`,`brand_name`,`brand_image`) VALUES ('".$category_id."','".$sub_category_id."','".$brand_name."','".$brand_image."') ";
			$qry = mysqli_query($con,$insert);
			if ($qry) 
			{
				$_SESSION['succ'] = '<div class="alert alert-success">
                            <b><strong>Success..!!!</strong> Your Data Insert Successfully...!!!</b>
                        </div>';
				header("location:index.php?page=brand_list");
				
				//echo "Insert Okok";
			}
			else
			{
				echo "Insert Not";
			}
			break;

			case 'update':
			    $u_date = date("Y-m-d-h-i-s");
				$update = "UPDATE `brand` SET `category_id`='".$category_id."',`sub_category_id`='".$sub_category_id."',`brand_name`='".$brand_name."',`brand_image`='".$brand_image."' WHERE `brand_id` = '".$brand_id."' ";
				$qry = mysqli_query($con,$update);
				if ($profile!="") 
				{
					$selectImg = "SELECT * FROM `brand` WHERE `brand_id` = '".$brand_id."' ";
					$qryImg = mysqli_query($con,$selectImg);
					$rowImg = mysqli_fetch_assoc($qryImg);
					unlink("upload/brand/".$rowImg['brand_image']);
					move_uploaded_file($tmp_name,"upload/brand/".$brand_image);
					$upImg = "UPDATE `brand` SET `brand_image` = '".$brand_image."' WHERE `brand_id` = '".$brand_id."' ";
					$qryUpImg = mysqli_query($con,$upImg); 
				}
				if ($qry || $qryUpImg) 
				{
					$_SESSION['UpMsg'] = '<div class="alert alert-primary">
                           <b> <strong>Succss..!!</strong> Your Data Update Successfully...!!!</b>
                        </div>';
					
					header("location:index.php?page=brand_list");
					//echo "Update Okok";
				}
				else
				{
					echo "Update Not";
				}

			
			case 'delete':
			$brand_id = $_REQUEST['brand_id'];
			// Upload Folder In Image Delete Code //
			$DeleteBrandImg = "SELECT * FROM `brand` WHERE `brand_id` = '".$brand_id."' ";
			$QryBrandImg = mysqli_query($con,$DeleteBrandImg);
			$RowBrandImg = mysqli_fetch_assoc($QryBrandImg);
			unlink("upload/brand/".$RowBrandImg['brand_image']);
			// Delete Qry // 
			$delete = "DELETE FROM `brand` WHERE `brand_id` = '".$brand_id."' ";
			$qry = mysqli_query($con,$delete);
			if ($qry) 
			{
				$_SESSION['delMsg'] = '<div class="alert alert-danger">
                            <b><strong>Succss..!!</strong> Your Data Delete Successfully...!!!!</b>
                        </div>';
				header("location:index.php?page=brand_list");
				//echo "Delete OKok";
			}
			else
			{
				echo "Delete Not";
			}
			
		
		default:
			echo "ERROR";
			break;
	}
}


?>