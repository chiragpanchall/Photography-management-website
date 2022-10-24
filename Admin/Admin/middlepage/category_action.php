<?php 
//include_once('config.php');
if ($_REQUEST['action']) 
{
	$action = $_REQUEST['action'];
	$category_id = $_REQUEST['category_id'];
	$category_name = $_REQUEST['category_name'];
	//$category_image = $_FILES['category_image']['name'];
	//$tmp_name = $_FILES['category_image']['tmp_name'];
	
	

switch ($action) {
		case 'insert':
		    move_uploaded_file($tmp_name,"upload/category/".$category_image);
			$insert = "INSERT INTO `event_category` (`Event_Type`,`Event_Image`) VALUES ('".$category_name."','".$category_image."') ";
			$qry = mysqli_query($con,$insert);
			if ($qry) 
			{
				$_SESSION['succ'] = '<div class="alert alert-success">
                            <b><strong>Success..!!!</strong> Your Data Insert Successfully...!!!</b>
                        </div>';
				header("location:index.php?page=category_list");
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
					header("location:index.php?page=category_list");
					//echo "Update Okok";
				}
				else
				{
					echo "Update Not";
				}

			
			case 'delete':
			$category_id = $_REQUEST['category_id'];
			// $DeleteCategoryImg = "SELECT * FROM `category` WHERE `category_id` = '".$category_id."' ";
			// $QryCategoryImg = mysqli_query($con,$DeleteCategoryImg);
			// $RowCategoryImg = mysqli_fetch_assoc($QryCategoryImg);
			// unlink("upload/category/".$RowCategoryImg['category_image']); 
		echo	$delete = "DELETE FROM `event_category` WHERE `idEvent_Category` = '".$category_id."' ";
			$qry = mysqli_query($con,$delete);
			if ($qry) 
			{
				$_SESSION['delMsg'] = '<div class="alert alert-danger">
                            <b><strong>Succss..!!</strong> Your Data Delete Successfully...!!!!</b>
                        </div>';
				header("location:index.php?page=category_list");
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