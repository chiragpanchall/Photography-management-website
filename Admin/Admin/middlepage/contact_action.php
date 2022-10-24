<?php 

if ($_REQUEST['action']) 
{
	$action = $_REQUEST['action'];
	$fname = $_REQUEST['fname'];
	$lname = $_REQUEST['lname'];
	$email = $_REQUEST['email'];
	$password = $_REQUEST['password'];
	$contact = $_REQUEST['contact'];
	
	switch ($action) {
		case 'insert':
			$insert = "INSERT INTO `contact` (`fname`,`lname`,`email`,`password`,`contact`) VALUES ('".$fname."','".$lname."',".$email."','".$password."','".$contact."') ";
			$qry = mysqli_query($con,$insert);
			if ($qry) 
			{
				$_SESSION['succ'] = '<div class="alert alert-success">
                            <b><strong>Success..!!!</strong> Your Data Insert Successfully...!!!</b>
                        </div>';
				
				header("location:index.php?page=contact_list");
				//echo "Insert Okok";
			}
			else
			{
				echo "Insert Not";
			}
			break;

			case 'update':
			    $u_date = date("Y-m-d-h-i-s");
				$update = "UPDATE `contact` SET `fname`='".$fname."',`lname`='".$lname."',`email`='".$email."',`password`='".$password."',`contact` = '".$contact."' WHERE `contact_id` = '".$contact_id."' ";
				$qry = mysqli_query($con,$update);
				if ($qry || $qryUpImg) 
				{
					$_SESSION['UpMsg'] = '<div class="alert alert-primary">
                           <b> <strong>Succss..!!</strong> Your Data Update Successfully...!!!</b>
                        </div>';
					header("location:index.php?page=contact_list");
					//echo "Update Okok";
				}
				else
				{
					echo "Update Not";
				}

				break;

			

			case 'delete':
			$contact_id = $_REQUEST['contact_id']; 
			$delete = "DELETE FROM `contact` WHERE `contact_id` = '".$contact_id."' ";
			$qry = mysqli_query($con,$delete);
			if ($qry) 
			{
				$_SESSION['delMsg'] = '<div class="alert alert-danger">
                            <b><strong>Succss..!!</strong> Your Data Delete Successfully...!!!!</b>
                        </div>';
				

				header("location:index.php?page=contact_list");
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