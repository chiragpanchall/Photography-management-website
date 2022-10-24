<?php
 
echo "<pre>";
print_r($_REQUEST);
if ($_REQUEST['action']) 
{
	$action = $_REQUEST['action'];
	$category_id = $_REQUEST['category_id'];
	$category_name = $_REQUEST['category_name'];
	
	

switch ($action) {
		case 'insert':
		   
		echo	$insert = "INSERT INTO `sub_category` (`category_id`,`category_name`) VALUES ('".$category_id."','".$category_name."') ";
			$qry = mysqli_query($con,$insert);
			if ($qry) 
			{
				$_SESSION['succ'] = '<div class="alert alert-success">
                            <b><strong>Success..!!!</strong> Your Data Insert Successfully...!!!</b>
                        </div>';
				header("location:index.php?page=subcat_list");
				
				//echo "Insert Okok";
			}
			else
			{
				echo "Insert Not";
			}
			break;
		
					case 'update':
			    $u_date = date("Y-m-d-h-i-s");
				$update = "UPDATE `sub_category` SET `category_id`='".$category_id."',`category_name`='".$category_name."',`u_date` = '".$u_date."' WHERE `category_id` = '".$category_id."' ";
				$qry = mysqli_query($con,$update);
				 
				if ($qry || $qryUpImg) 
				{
					$_SESSION['UpMsg'] = '<div class="alert alert-primary">
                           <b> <strong>Succss..!!</strong> Your Data Update Successfully...!!!</b>
                        </div>';
					header("location:index.php?page=subcat_list");
					//echo "Update Okok";
				}
				else
				{
					echo "Update Not";
				}


			case 'delete':
			$sub_category_id = $_REQUEST['sub_category_id'];
			$delete = "DELETE FROM `sub_category` WHERE `sub_category_id` = '".$sub_category_id."' ";
			$qry = mysqli_query($con,$delete);
			if ($qry) 
			{
				$_SESSION['delMsg'] = '<div class="alert alert-danger">
                            <b><strong>Succss..!!</strong> Your Data Delete Successfully...!!!!</b>
                        </div>';
				
				header("location:index.php?page=subcat_list");
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