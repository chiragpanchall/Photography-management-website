<?php 
include_once('config.php');
if ($_REQUEST['action']) 
{
	$action = $_REQUEST['action'];
	$user_id = $_REQUEST['user_id'];
	$email = $_REQUEST['email'];
	$feedback = $_REQUEST['feedback'];
	
	switch ($action) {
		case 'insert':
			$insert = "INSERT INTO `feedback` (`idUser`,`User_Email`,`feedback`) VALUES ('".$user_id."','".$email."','".$feedback."') ";
			$qry = mysqli_query($con,$insert);
			if ($qry) 
			{
				$_SESSION['succ'] = '<div class="alert alert-success">
                            <b><strong>Success..!!!</strong> Your Data Insert Successfully...!!!</b>
                        </div>';
				
				header("location:index.php?page=feedback_list");
				//echo "Insert Okok";
			}
			else
			{
				echo "Insert Not";
			}
			break;

			case 'update':
			    $u_date = date("Y-m-d-h-i-s");
				$update = "UPDATE `feedback` SET `idUser`='".$user_id."',`User_Email`='".$email."',`feedback`='".$feedback."',`Feedback_Date` = '".$u_date."' WHERE `idFeedback` = '".$feedback_id."' ";
				$qry = mysqli_query($con,$update);
				if ($qry || $qryUpImg) 
				{
					$_SESSION['UpMsg'] = '<div class="alert alert-primary">
                           <b> <strong>Succss..!!</strong> Your Data Update Successfully...!!!</b>
                        </div>';
					header("location:index.php?page=feedback_list");
					//echo "Update Okok";
				}
				else
				{
					echo "Update Not";
				}

				break;

			

			case 'delete':
			$feedback_id = $_REQUEST['idFeedback']; 
			$delete = "DELETE FROM `feedback` WHERE `idFeedback` = '".$feedback_id."' ";
			$qry = mysqli_query($conn,$delete) or die(mysqli_error($conn));
			if ($qry) 
			{
				$_SESSION['delMsg'] = '<div class="alert alert-danger">
                            <b><strong>Succss..!!</strong> Your Data Delete Successfully...!!!!</b>
                        </div>';
				

				header("location:index.php?page=feedback_list");
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