<?php 

if ($_REQUEST['action']) 
{
	$action = $_REQUEST['action'];
	$fname = $_REQUEST['fname'];
	$mname = $_REQUEST['mname'];
	$lname = $_REQUEST['lname'];
	$dob = $_REQUEST['dob'];
	$address = $_REQUEST['address'];
	$profile = $_FILES['profile']['name'];
	$tmp_name = $_FILES['profile']['tmp_name'];
	$contact = $_REQUEST['contact'];
	$gender = $_REQUEST['gender'];
	$email = $_REQUEST['email'];
	$password = $_REQUEST['password'];
	$state = $_REQUEST['state'];
	$city = $_REQUEST['city'];
	$pincode = $_REQUEST['pincode'];

    


	switch ($action) {
		case 'insert':
		    move_uploaded_file($tmp_name,"upload/user/".$profile);
			$insert = "INSERT INTO `user` (`User_Fname`,`mname`,`User_Lname`,`dob`,`address`,`User_Photo_path`,`User_MobileNo`,`gender`,`User_Email`,`User_Password`,`state`,`city`,`pincode`) VALUES ('".$fname."','".$mname."','".$lname."','".$dob."','".$address."','".$profile."','".$contact."','".$gender."','".$email."','".$password."','".$state."','".$city."','".$pincode."') ";
			$qry = mysqli_query($con,$insert);
			if ($qry) 
			{
				$_SESSION['succ'] = '<div class="alert alert-success">
                            <b><strong>Success..!!!</strong> Your Data Insert Successfully...!!!</b>
                        </div>';
				header("location:index.php?page=user_list");
				
				//echo "Insert Okok";
			}
			else
			{
				echo "Insert Not";
			}
			break;
			case 'update':
			    $u_date = date("Y-m-d-h-i-s");
				$update = "UPDATE `user` SET `User_Fname`='".$fname."',`mname`='".$mname.",`User_Lname`='".$lname."',`dob`='".$dob."',`address`='".$address."',`User_Photo_path`='".$profile."',`contact`'".$contact."',`gender`='".$gender."',`User_Email`='".$email."',`User_Password`='".$password."',`state`='".$state."',`city`='".$city."',`pincode`='".$pincode."',`u_date` = '".$u_date."' WHERE `user_id` = '".$user_id."' ";
				$qry = mysqli_query($con,$update);
				if ($profile!="") 
				{
					$selectImg = "SELECT * FROM `user` WHERE `idUser` = '".$user_id."' ";
					$qryImg = mysqli_query($con,$selectImg);
					$rowImg = mysqli_fetch_assoc($qryImg);
					unlink("upload/user/".$rowImg['User_Photo_path']);
					move_uploaded_file($tmp_name,"upload/user/".$profile);
					$upImg = "UPDATE `user` SET `profile` = '".$profile."' WHERE `idUser` = '".$user_id."' ";
					$qryUpImg = mysqli_query($con,$upImg); 
				}
				if ($qry || $qryUpImg) 
				{
					$_SESSION['UpMsg'] = '<div class="alert alert-primary">
                           <b> <strong>Succss..!!</strong> Your Data Update Successfully...!!!</b>
                        </div>';
					header("location:index.php?page=user_list");
					//echo "Update Okok";
				}
				else
				{
					echo "Update Not";
				}

			
			case 'delete':
			$user_id = $_REQUEST['user_id'];
			$DeleteUserImg = "SELECT * FROM `user` WHERE `idUser` = '".$user_id."' ";
			$QryUserImg = mysqli_query($con,$DeleteUserImg);
			$RowUserImg = mysqli_fetch_assoc($QryUserImg);
			unlink("upload/user/".$RowUserImg['User_Photo_path']); 
			$delete = "DELETE FROM `user` WHERE `idUser` = '".$user_id."' ";
			$qry = mysqli_query($con,$delete);
			if ($qry) 
			{
				$_SESSION['delMsg'] = '<div class="alert alert-danger">
                            <b><strong>Succss..!!</strong> Your Data Delete Successfully...!!!!</b>
                        </div>';
				header("location:index.php?page=user_list");
				//echo "Delete OKok";
			}
			else
			{
				echo "Delete Not";
			}
			break;

						case 'active':
			    $user_id = $_REQUEST['idUser'];
				$active = "UPDATE `user` SET `status` = 'active' WHERE `idUser` = '".$user_id."' ";
				$qry = mysqli_query($con,$active);
				if ($qry) 
				{
					header("location:index.php?page=user_list");
					//echo "Update Okok";
				}
				else
				{
					echo "Update Not";
				}
				break;

				case 'inactive':
			    $user_id = $_REQUEST['idUser'];
				$active = "UPDATE `user` SET `status` = 'inactive' WHERE `idUser` = '".$user_id."' ";
				$qry = mysqli_query($con,$active);
				if ($qry) 
				{
					header("location:index.php?page=user_block");
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