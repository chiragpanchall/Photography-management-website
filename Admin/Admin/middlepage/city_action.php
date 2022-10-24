<?php 

if ($_REQUEST['action']) 
{
	$action = $_REQUEST['action'];
	$idCity = $_REQUEST['idCity'];
	$City_Name = $_REQUEST['City_Name'];
	$state_id = $_REQUEST['state_id'];
	

switch ($action) {
		case 'insert':
		    
			$insert = "INSERT INTO `city` (`City_Name`,`State_idState`) VALUES ('".$City_Name."','".$state_id."') ";
			$qry = mysqli_query($con,$insert);
			if ($qry) 
			{
				// $_SESSION['succ'] = '<div class="alert alert-success">
                //             <b><strong>Success..!!!</strong> Your Data Insert Successfully...!!!</b>
                //         </div>';
				
				header("location:index.php?page=city_list");
				//echo "Insert Okok";
			}
			else
			{
				echo "Insert Not";
			}
			break;

			case 'update':
			    $u_date = date("Y-m-d-h-i-s");
				$update = "UPDATE `city` SET `City_Name`='".$city_name."',`idState`='".$state_id."' WHERE `idCity` = '".$city_id."' ";
				$qry = mysqli_query($con,$update);
				if ($qry || $qryUpImg) 
				{
					// $_SESSION['UpMsg'] = '<div class="alert alert-primary">
                    //        <b> <strong>Succss..!!</strong> Your Data Update Successfully...!!!</b>
                    //     </div>';
					
					header("location:index.php?page=city_list");
					//echo "Update Okok";
				}
				else
				{
					echo "Update Not";
				}

			
			case 'delete':
			$city_id = $_REQUEST['city_id'];
			$delete = "DELETE FROM `city` WHERE `idCity` = '".$city_id."' ";
			$qry = mysqli_query($con,$delete);
			if ($qry) 
			{
				// $_SESSION['delMsg'] = '<div class="alert alert-danger">
                //             <b><strong>Succss..!!</strong> Your Data Delete Successfully...!!!!</b>
                //         </div>';
				
				header("location:index.php?page=city_list");
				//echo "Delete OKok";
			}
			else
			{
				$_SESSION['delMsg'] = '<div class="alert alert-danger">
				<b><strong>Succss..!!</strong> Please delete its corresponding  area then it should be deleted...!!!!</b>
			</div>';
				echo "Delete Not";
				header("location:index.php?page=city_list");
			}
			break;

		
		default:
			echo "ERROR";
			break;
	}
}


?>