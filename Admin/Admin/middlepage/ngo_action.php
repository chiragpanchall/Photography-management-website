<?php 

if ($_REQUEST['action']) 
{
	$action = $_REQUEST['action'];
	$ngo_id = $_REQUEST['ngo_id'];
	$n_name = $_REQUEST['n_name'];
	$des = $_REQUEST['des'];
	$n_type = $_REQUEST['n_type'];
	$address = $_REQUEST['address'];
	$city = $_REQUEST['city'];
	$pincode = $_REQUEST['pincode'];

	switch ($action) {
		case 'insert':
			$insert = "INSERT INTO `ngo` (`n_name`,`des`,`n_type`,`address`,`city`,`pincode`) VALUES ('".$n_name."','".$des."','".$n_type."','".$address."','".$city."','".$pincode."') ";
			$qry = mysqli_query($con,$insert);
			if ($qry) 
			{
				$_SESSION['succ'] = '<div class="alert alert-success">
                            <b><strong>Success..!!!</strong> Your Data Insert Successfully...!!!</b>
                        </div>';
				
				header("location:index.php?page=ngo_list");
				//echo "Insert Okok";
			}
			else
			{
				echo "Insert Not";
			}
			break;

			case 'update':
			    $u_date = date("Y-m-d-h-i-s");
				$update = "UPDATE `ngo` SET `n_name`='".$n_name."',`des`='".$des."',`n_type`='".$n_type."',`address`='".$address."',`city`='".$city."',`pincode`='".$pincode."',`u_date` = '".$u_date."' WHERE `ngo_id` = '".$ngo_id."' ";
				$qry = mysqli_query($con,$update);
				
				if ($qry || $qryUpImg) 
				{
					$_SESSION['UpMsg'] = '<div class="alert alert-primary">
                           <b> <strong>Succss..!!</strong> Your Data Update Successfully...!!!</b>
                        </div>';
					
					header("location:index.php?page=ngo_list");
					//echo "Update Okok";
				}
				else
				{
					echo "Update Not";
				}

				break;

			case 'delete':
			$ngo_id = $_REQUEST['ngo_id'];
			$delete = "DELETE FROM `ngo` WHERE `ngo_id` = '".$ngo_id."' ";
			$qry = mysqli_query($con,$delete);
			if ($qry) 
			{
				$_SESSION['delMsg'] = '<div class="alert alert-danger">
                            <b><strong>Succss..!!</strong> Your Data Delete Successfully...!!!!</b>
                        </div>';
				
				header("location:index.php?page=ngo_list");
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