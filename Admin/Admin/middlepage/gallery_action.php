<?php 
	$action = $_REQUEST['action'];
	$gallery_id = $_REQUEST['gallery_id'];


if ($_REQUEST['action']) 
{
	$action = $_REQUEST['action'];
	$gallery_id = $_REQUEST['gallery_id'];
	//	$image_name = $_REQUEST['image_name'];
	// $description = $_REQUEST['description'];
	$image = $_FILES['image']['name'];
	$tmp_name = $_FILES['image']['tmp_name'];




	switch ($action) {
		case 'insert':
			$fileNames = array_filter($_FILES['image']['name']); 
			if(!empty($fileNames)){ 
			   foreach($_FILES['image']['name'] as $key=>$val){ 
					$img =  $_FILES['image']['name'][$key];
					$extension = substr($img, strpos($img,"."), strlen($img));	
					$imgnewfile = time().uniqid(rand());//password_hash($img,PASSWORD_DEFAULT);
					$imgnewfile = $imgnewfile. $extension;
					$tmp_name =  $_FILES['image']['tmp_name'][$key]; 
					$dir = "/xampp/htdocs/Final_Project/Data/Order_Image/EventOrderImg/".$imgnewfile;
					echo $query = "INSERT INTO `album_images` (`idAlbum_Images`, `Event_Order_idEvent_Order`, `Album_Images_Path`, `Album_Selection`, `Album_Type`, `InGallery`) VALUES (NULL, $gallery_id, '$imgnewfile', '0', NULL, '0');";
					//$result = mysqli_query($con,$query) or die($con);
					if(mysqli_query($con,$query)){
						move_uploaded_file($tmp_name,$dir);
		//				header("location:index.php?page=gallery_list");
						}
						else{
							echo "Not Success";
						}

					}
			}
			// move_uploaded_file($tmp_name,"upload/gallery/".$image);
			// $insert = "INSERT INTO `gallery` (`image_name`,`description`,`image`) VALUES ('".$image_name."','".$description."','".$image."') ";
			// $qry = mysqli_query($con,$insert);
			// if ($qry) 
			// {
			// 	$_SESSION['succ'] = '<div class="alert alert-success">
            //                 <b><strong>Success..!!!</strong> Your Data Insert Successfully...!!!</b>
            //             </div>';
				
			// 	header("location:index.php?page=gallery_list");
			// 	//echo "Insert Okok";
			// }
			// else
			// {
			// 	echo "Insert Not";
			// }
			break;


			// case 'update':
			//     $u_date = date("Y-m-d-h-i-s");
			// 	$update = "UPDATE `gallery` SET `image_name`='".$image_name."',`description`='".$description."',`image`='".$image."' WHERE `gallery_id` = '".$gallery_id."' ";
			// 	$qry = mysqli_query($con,$update);
			// 	if ($image!="") 
			// 	{
			// 		$selectImg = "SELECT * FROM `gallery` WHERE `gallery_id` = '".$gallery_id."' ";
			// 		$qryImg = mysqli_query($con,$selectImg);
			// 		$rowImg = mysqli_fetch_assoc($qryImg);
			// 		unlink("upload/gallery/".$rowImg['image']);
			// 		move_uploaded_file($tmp_name,"upload/gallery/".$image);
			// 		$upImg = "UPDATE `gallery` SET `image` = '".$image."' WHERE `gallery_id` = '".$gallery_id."' ";
			// 		$qryUpImg = mysqli_query($con,$upImg); 
			// 	}
			// 	if ($qry || $qryUpImg) 
			// 	{
			// 		$_SESSION['UpMsg'] = '<div class="alert alert-primary">
            //                <b> <strong>Succss..!!</strong> Your Data Update Successfully...!!!</b>
            //             </div>';
					
			// 		header("location:index.php?page=gallery_list");
			// 		//echo "Update Okok";
			// 	}
			// 	else
			// 	{
			// 		echo "Update Not";
			// 	}


			case 'delete':
			$gallery_id = $_REQUEST['gallery_id'];
			$gallery_id = $_REQUEST['gallery_id'];
			// Upload Folder In Image Delete Code //
			$DeleteGalleryImg = "SELECT * FROM `album_images` WHERE `idAlbum_Images` = '".$gallery_id."' ";
			$QryGalleryImg = mysqli_query($con,$DeleteGalleryImg);
			$RowGalleryImg = mysqli_fetch_assoc($QryGalleryImg);
			echo unlink("/xampp/htdocs/Final_Project/Data/Order_Image/EventOrderImg/".$RowGalleryImg['Album_Images_Path']);
			// Delete Qry // 
			$delete = "DELETE FROM `album_images` WHERE `idAlbum_Images` = '".$gallery_id."' ";
			$qry = mysqli_query($con,$delete);
			if ($qry) 
			{
				$_SESSION['delMsg'] = '<div class="alert alert-danger">
                            <b><strong>Succss..!!</strong> Your Data Delete Successfully...!!!!</b>
                        </div>';
				
		//		header("location:index.php?page=gallery_list");
				//echo "Delete OKok";
			}
			else
			{
				echo "Delete Not";
			}
			break;

			case 'status':
				$gallery_id = $_REQUEST['gallery_id'];
				$gallery_id = $_REQUEST['gallery_id'];
				// Upload Folder In Image Delete Code //
				// $DeleteGalleryImg = "SELECT * FROM `album_images` WHERE `idAlbum_Images` = '".$gallery_id."' ";
				// $QryGalleryImg = mysqli_query($con,$DeleteGalleryImg);
				// $RowGalleryImg = mysqli_fetch_assoc($QryGalleryImg);
				// echo unlink("/xampp/htdocs/Final_Project/Data/Order_Image/EventOrderImg/".$RowGalleryImg['Album_Images_Path']);
				// Delete Qry // 
			echo	$delete = "Update  `event_order` set Status = 3 WHERE `idEvent_Order` =  '".$gallery_id."' ";
				$qry = mysqli_query($con,$delete);
				if ($qry) 
				{
					$_SESSION['delMsg'] = '<div class="alert alert-danger">
								<b><strong>Succss..!!</strong> Your Order Shipped...!!!!</b>
							</div>';
					
					header("location:index.php?page=gallery_list");
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