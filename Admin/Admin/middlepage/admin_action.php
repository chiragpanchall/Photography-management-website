<?php

include('config.php');
if ($_REQUEST['action']) 
{
	$action = $_REQUEST['action'];
	$idUser = $_REQUEST['idUser'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$profile = $_FILES['profile']['name'];
	$tmp_name = $_FILES['profile']['tmp_name'];
	//$gender = $_REQUEST['gender'];
	$Mob =  $_POST['User_Mobile'];
// ,'User_MobileNo' ,'".$Mob."'
	switch ($action) {
		case 'insert':
			$extension = substr($profile, strpos($profile,"."), strlen($profile));	
			$imgnewfile = md5($profile) . $extension;
			move_uploaded_file($tmp_name,"/xampp/htdocs/Final_Project/Data/ProfilePic/".$imgnewfile);
			$newpass = password_hash($password,PASSWORD_DEFAULT);
			echo $insert = "INSERT INTO `user` (`User_Fname`,`User_Lname`,`User_MobileNo`,`User_Email`,`User_Password`,`User_Photo_Path`,`IsAdmin`) VALUES ('".$fname."','".$lname."','".$Mob."','".$email."','".$newpass."','".$imgnewfile."',1) ";
			$qry = mysqli_query($conn,$insert);
			if ($qry) 
			{
				// $_SESSION['succ'] = '<div class="alert alert-success">
                //             <b><strong>Success..!!!</strong> Your Data Insert Successfully...!!!</b>
                //         </div>';
				header("location:index.php?page=admin_list");
				echo "Insert Okok";
			}
			else
			{
				echo "<scipt>alert('Not inserted')</script>";
				echo "Insert Not";
				header("location:index.php?page=admin_list");
			}
			break;
/* fname lname user userid password photo pah email*/
			case 'update':
			    $u_date = date("Y-m-d-h-i-s");
				$update = "UPDATE `User` SET `User_Fname`='".$fname."',`User_Lname`='".$lname."',`User_Email`='".$email."',`User_Password`='".$password."' WHERE `idUser` = '".$admin_id."' ";
				$qry = mysqli_query($conn,$update);
				if ($profile!="") 
				{
					$selectImg = "SELECT * FROM `admin` WHERE `idUser` = '".$admin_id."' ";
					$qryImg = mysqli_query($conn,$selectImg);
					$rowImg = mysqli_fetch_assoc($qryImg);
					unlink("upload/admin/".$rowImg['User_Photo_Path']);
					move_uploaded_file($tmp_name,"upload/admin/".$profile);
					$upImg = "UPDATE `User` SET `User_Photo_Path` = '".$profile."' WHERE `idUser` = '".$admin_id."' ";
					$qryUpImg = mysqli_query($conn,$upImg); 
				}
				if ($qry || $qryUpImg) 
				{
					// $_SESSION['UpMsg'] = '<div class="alert alert-primary">
                    //        <b> <strong>Succss..!!</strong> Your Data Update Successfully...!!!</b>
                    //     </div>';
					header("location:index.php?page=admin_list");
					//echo "Update Okok";
				}
				else
				{
					echo "Update Not";
				}

				break;

			case 'delete':
			$admin_id = $_REQUEST['admin_id'];
			// Upload Folder In Image Delete Code //
			$DeleteAdminImg = "SELECT * FROM `user` WHERE `idUser` = '".$idUser."' ";
			$QryAdminImg = mysqli_query($conn,$DeleteAdminImg);
			$RowAdminImg = mysqli_fetch_assoc($QryAdminImg);
			unlink("/xampp/htdocs/Final_Project/Data/ProfilePic/".$RowAdminImg['profile']);
			// Delete Qry // 
			$delete = "DELETE FROM `User` WHERE `idUser` = '".$idUser."' ";
			$qry = mysqli_query($conn,$delete);
			if ($qry) 
			{
				// $_SESSION['delMsg'] = '<div class="alert alert-danger">
                //             <b><strong>Succss..!!</strong> Your Data Delete Successfully...!!!!</b>
                //         </div>';
				header("location:index.php?page=admin_list");
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
				$qry = mysqli_query($conn,$active);
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
				$qry = mysqli_query($conn,$active);
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