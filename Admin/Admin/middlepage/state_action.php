<?php 

include_once('config.php');
if ($_REQUEST['action']) 
{
	$action = $_REQUEST['action'];
	$state_id = $_REQUEST['state_id'];
	$state_name = $_REQUEST['state_name'];
	
	

switch ($action) {
		case 'insert':
		    
			$insert = "INSERT INTO `state` (`state_name`) VALUES ('".$state_name."') ";
			$qry = mysqli_query($con,$insert);
			if ($qry) 
			{
				$_SESSION['succ'] = '<div class="alert alert-success">
                            <b><strong>Success..!!!</strong> Your Data Insert Successfully...!!!</b>
                        </div>';
				header("location:index.php?page=admin_list");
				
				//header("location:index.php?page=state_list");
				//echo "Insert Okok";
			}
			else
			{
				echo "Insert Not";
			}
			break;

			case 'update':
			    $u_date = date("Y-m-d-h-i-s");
				$update = "UPDATE `state` SET `State_Name`='".$state_name."',`u_date` = '".$u_date."' WHERE `idState` = '".$state_id."' ";
				$qry = mysqli_query($con,$update);
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

			
			case 'delete':
			$state_id = $_REQUEST['state_id']; 
			$delete = "DELETE FROM `state` WHERE `idState` = '".$state_id."' ";
			$qry = mysqli_query($conn,$delete);
			if ($qry) 
			{
				$_SESSION['delMsg'] = '<div class="alert alert-danger">
                            <b><strong>Succss..!!</strong> Your Data Delete Successfully...!!!!</b>
                        </div>';
				
				header("location:index.php?page=state_list");
				//echo "Delete OKok";
			}
			else
			{
				$_SESSION['delMsg'] = '<div class="alert alert-danger">
                            <b><strong>Succss..!!</strong> Please delete its corresponding city and area then it should be deleted...!!!!</b>
                        </div>';
				//echo "Delete Not".mysqli_error($conn);
				header("location:index.php?page=state_list");
			}
			
		
		default:
			echo "ERROR";
			break;
	}
}


?>