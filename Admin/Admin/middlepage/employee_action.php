<?php 
include('config.php');
if ($_REQUEST['action']) 
{
	$action = $_REQUEST['action'];
	$idUser = $_REQUEST['Emp'];
	$Employee_FName = $_POST['Employee_FName'];
	$Employee_Lname = $_POST['Employee_Lname'];
	$Employee_Address = $_POST['Employee_Address'];
	$Employee_Mob = $_POST['Employee_Mob'];
	$Employee_Salary = $_POST['Employee_Salary'];
	$Employee_Age = $_POST['Employee_Age'];
	
	//$gender = $_REQUEST['gender'];

	switch ($action) {
		case 'insert':
		    //move_uploaded_file($tmp_name,"upload/admin/".$profile);
			echo $insert = "INSERT INTO `employee` (`Employee_FName`,`Employee_Lname`,`Employee_Address`,`Employee_Mob`,`Employee_Salary`,`Employee_Age`) VALUES ('".$Employee_FName."','".$Employee_Lname."','".$Employee_Address."','".$Employee_Mob."','".$Employee_Salary."','".$Employee_Age."') ";
			$qry = mysqli_query($con,$insert);
			if ($qry) 
			{
				$_SESSION['succ'] = '<div class="alert alert-success">
                            <b><strong>Success..!!!</strong> Your Data Insert Successfully...!!!</b>
                        </div>';
				header("location:index.php?page=employee_list");
				echo "Insert Okok";
			}
			else
			{
				echo "Insert Not";
			}
			break;
/* fname lname user userid password photo pah email*/
			case 'update':
			    $u_date = date("Y-m-d-h-i-s");
				$update = "UPDATE `User` SET `User_Fname`='".$fname."',`User_Lname`='".$lname."',`Employee_Address`='".$email."',`User_Password`='".$password."',`gender`='".$gender."',`u_date` = '".$u_date."' WHERE `idUser` = '".$admin_id."' ";
				$qry = mysqli_query($con,$update);
				if ($profile!="") 
				{
					$selectImg = "SELECT * FROM `admin` WHERE `idUser` = '".$admin_id."' ";
					$qryImg = mysqli_query($con,$selectImg);
					$rowImg = mysqli_fetch_assoc($qryImg);
					unlink("upload/admin/".$rowImg['User_Photo_Path']);
					move_uploaded_file($tmp_name,"upload/admin/".$profile);
					$upImg = "UPDATE `User` SET `User_Photo_Path` = '".$profile."' WHERE `idUser` = '".$admin_id."' ";
					$qryUpImg = mysqli_query($con,$upImg); 
				}
				if ($qry || $qryUpImg) 
				{
					$_SESSION['UpMsg'] = '<div class="alert alert-primary">
                           <b> <strong>Succss..!!</strong> Your Data Update Successfully...!!!</b>
                        </div>';
					header("location:index.php?page=admin_list");
					//echo "Update Okok";
				}
				else
				{
					echo "Update Not";
				}

				break;

			case 'delete':
			$admin_id = $_REQUEST['Emp'];
			// Upload Folder In Image Delete Code //
			$DeleteAdminImg = "DELETE FROM `employee` WHERE `idEmployee` = '".$admin_id."' ";
			$QryAdminImg = mysqli_query($conn,$DeleteAdminImg);
			$RowAdminImg = mysqli_fetch_assoc($QryAdminImg);
			unlink("upload/admin/".$RowAdminImg['profile']);
			// Delete Qry // 
			$delete = "DELETE FROM `employee` WHERE `idEmployee` = '".$admin_id."' ";
			$qry = mysqli_query($conn,$delete);
			if ($qry) 
			{
				$_SESSION['delMsg'] = '<div class="alert alert-danger">
                            <b><strong>Succss..!!</strong> Your Data Delete Successfully...!!!!</b>
                        </div>';
				header("location:index.php?page=employee_list");
				//echo "Delete OKok";
			}
			else
			{
				echo "Delete Not";
			}
			break;

			case 'active':
			    $admin_id = $_REQUEST['admin_id'];
				$active = "UPDATE `User` SET `status` = 'active' WHERE `idUser` = '".$admin_id."' ";
				$qry = mysqli_query($con,$active);
				if ($qry) 
				{
					header("location:index.php?page=admin_list");
					//echo "Update Okok";
				}
				else
				{
					echo "Update Not";
				}
				break;

				case 'inactive':
			    $admin_id = $_REQUEST['admin_id'];
				$active = "UPDATE `User` SET `status` = 'inactive' WHERE `idUser` = '".$admin_id."' ";
				$qry = mysqli_query($con,$active);
				if ($qry) 
				{
					header("location:index.php?page=admin_block");
					echo "Update Okok";
				}
				else
				{
					echo "Update Not";
				}
				break;
		
		default:
			echo "ERROR";
			break;
	}
}

?>