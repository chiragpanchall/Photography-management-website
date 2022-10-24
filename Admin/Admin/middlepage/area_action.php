<?php 
include_once("config.php");
if ($_REQUEST['action']) 
{
	$action = $_REQUEST['action'];
	$idArea = $_REQUEST['idArea'];
	$Area_Name = $_REQUEST['Area_Name'];
	$CityID = $_REQUEST['idCity'];	
	

switch ($action) {
		case 'insert':
		    
			echo $insert = "INSERT INTO `area` (`Area_Name`,`City_idCity`) VALUES ('".$Area_Name."','".$CityID."')" ;
			$qry = mysqli_query($con,$insert);
			if ($qry) 
			{
				$_SESSION['succ'] = '<div class="alert alert-success">
                            <b><strong>Success..!!!</strong> Your Data Insert Successfully...!!!</b>
                        </div>';
				header("location:index.php?page=area_list");
				
			//	header("location:index.php?page=area_list");
				echo "Insert Okok";
			}
			else
			{
				echo "Insert Not";
			}
			break;

			case 'update':
			    $u_date = date("Y-m-d-h-i-s");
				$update = "UPDATE `area` SET `Area_Name`='".$Area_Name."',`u_date` = '".$u_date."' WHERE `idArea` = '".$idArea."' ";
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
			$idArea = $_REQUEST['area_id']; 
			$delete = "DELETE FROM `area` WHERE `idArea` = '".$idArea."' ";
			$qry = mysqli_query($con,$delete);
			if ($qry) 
			{
				$_SESSION['delMsg'] = '<div class="alert alert-danger">
                            <b><strong>Succss..!!</strong> Your Data Delete Successfully...!!!!</b>
                        </div>';
				
				header("location:index.php?page=area_list");
				echo "Delete OKok";
			}
			else
			{
				$_SESSION['delMsg'] = '<div class="alert alert-danger">
				<b><strong>Succss..!!</strong> Please delete its corresponding Venue then it should be deleted...!!!!</b>
			</div>';
				echo "Delete Not";
				header("location:index.php?page=area_list");
			}
			
		
		default:
			echo "ERROR";
			break;
	}
}


?>