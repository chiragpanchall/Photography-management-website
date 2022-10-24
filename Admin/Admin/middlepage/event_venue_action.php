<?php 
include_once('config.php');
if ($_REQUEST['action']) 
{

	$action = $_REQUEST['action'];
	//$idUser = $_REQUEST['idUser'];
	echo "I am Event venue action";
	$Venue_Name = $_REQUEST['Venue_Name'];
	$Venue_Price = $_REQUEST['Venue_Price'];
	$Venue_Contact = $_REQUEST['Venue_Contact'];
	$Area_idArea  = $_REQUEST['VenueId'];
	
	
	switch ($action) {
		case 'insert':
		    //move_uploaded_file($tmp_name,"upload/admin/".$profile);
			echo $insert = "INSERT INTO `event_venue` (`Venue_Name`,`Venue_Price`,`Venue_Contact`,`Area_idArea`) VALUES ('".$Venue_Name."','".$Venue_Price."','".$Venue_Contact."','".$Area_idArea."') ";
			$qry = mysqli_query($conn,$insert);
			if ($qry) 
			{
				echo $insert;
				$_SESSION['succ'] = '<div class="alert alert-success">
                            <b><strong>Success..!!!</strong> Your Data Insert Successfully...!!!</b>
                        </div>';
				 header("location:index.php?page=event_venue_list");
				echo "Insert Okok";
			}
			else
			{
				echo $Area_idArea;
				echo $insert;
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
			$admin_id = $_REQUEST['idEvent_Venue'];
			// Upload Folder In Image Delete Code //
		//	$DeleteAdminImg = "DELETE FROM `event_venue` WHERE `idEvent_Venue` '".$admin_id."' ";
			//$QryAdminImg = mysqli_query($conn,$DeleteAdminImg);
		//	$RowAdminImg = mysqli_fetch_assoc($QryAdminImg);
			// unlink("upload/admin/".$RowAdminImg['profile']);
			// Delete Qry // 
			 $delete =  "DELETE FROM `event_venue` WHERE `idEvent_Venue`= '".$admin_id."' ";
			$qry = mysqli_query($conn,$delete) or die(mysqli_error($conn));
			if ($qry) 
			{

				$_SESSION['delMsg'] = '<div class="alert alert-danger">
                            <b><strong>Succss..!!</strong> Your Data Delete Successfully...!!!!</b>
                        </div>';
				header("location:index.php?page=event_venue_list");
				echo "Delete OKok";
			}
			else
			{
				
				echo $delete;
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
					echo "Update Okok";
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