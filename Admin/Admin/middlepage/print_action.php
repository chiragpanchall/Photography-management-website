<?php 
include_once('config.php');
if ($_REQUEST['action']) 
{
	$action = $_REQUEST['action'];
	$idProduct = $_REQUEST['idProduct'];
	$Print_Size = $_REQUEST['Print_Size'];
	$Print_Price = $_REQUEST['Print_Price'];
	
	
	

switch ($action) {
		case 'insert':
			$getLast = "SELECT * FROM print_type";
			$reslt = mysqli_query($conn,$getLast);
			$lastID = 2;
			if(mysqli_num_rows($reslt) != 0){
				while($row = mysqli_fetch_array($reslt)){
					$lastID = $row['idPrint_Type'];
				}
			} 
			else {  $lastID =2; }
			echo $lastID;
			$lastID++;
			//INSERT INTO `print_type` (`idPrint_Type`, `Product_idProduct_Id`, `Print_Size`, `Print_Price`, `Company_idCompany`) VALUES (NULL, '4', 'LONG', '800', '1');
			echo $insert = "INSERT INTO `print_type` (`idPrint_Type`,`Product_idProduct_Id`,`Print_Size`,`Print_Price`) VALUES ('".$lastID."','".$idProduct."','".$Print_Size."','".$Print_Price."') ";
			$qry = mysqli_query($conn,$insert) or die(mysqli_error($conn));
			if ($qry) 
			{
				echo $insert;
				$_SESSION['succ'] = '<div class="alert alert-success">
                            <b><strong>Success..!!!</strong> Your Data Insert Successfully...!!!</b>
                        </div>';
				header("location:index.php?page=print_type_list");
				//echo "Insert Okok";
			}
			else
			{
				echo $insert;
				echo "Insert Not";
			}
			break;

			case 'update':
			    $u_date = date("Y-m-d-h-i-s");
				$update = "UPDATE `category` SET `category_name`='".$category_name."',`category_image`='".$category_image."',`u_date` = '".$u_date."' WHERE `category_id` = '".$category_id."' ";
				$qry = mysqli_query($con,$update);
				if ($profile!="") 
				{
					$selectImg = "SELECT * FROM `category` WHERE `category_id` = '".$category_id."' ";
					$qryImg = mysqli_query($con,$selectImg);
					$rowImg = mysqli_fetch_assoc($qryImg);
					unlink("upload/category/".$rowImg['category_image']);
					move_uploaded_file($tmp_name,"upload/category/".$category_image);
					$upImg = "UPDATE `category` SET `category_image` = '".$category_image."' WHERE `category_id` = '".$category_id."' ";
					$qryUpImg = mysqli_query($con,$upImg); 
				}
				if ($qry || $qryUpImg) 
				{
					$_SESSION['UpMsg'] = '<div class="alert alert-primary">
                           <b> <strong>Succss..!!</strong> Your Data Update Successfully...!!!</b>
                        </div>';
					header("location:index.php?page=category_list_new");
					//echo "Update Okok";
				}
				else
				{
					echo "Update Not";
				}

			
			case 'delete':
			$category_id = $_REQUEST['idPrint_Type'];
		
			$delete = "DELETE FROM `print_type` WHERE idPrint_Type = '".$category_id."' ";
			$qry = mysqli_query($conn,$delete);
			if ($qry) 
			{
				$_SESSION['delMsg'] = '<div class="alert alert-danger">
                            <b><strong>Succss..!!</strong> Your Data Delete Successfully...!!!!</b>
                        </div>';
				header("location:index.php?page=print_type_list");
				echo "Delete OKok";
				echo $delete;
			}
			else
			{
				echo $delete;
				mysqli_errno($conn);
				echo "Delete Not";
			}
			break;
		
		
		default:
			echo "ERROR";
			break;
	}
}


?>