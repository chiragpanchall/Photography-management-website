<?php 
include_once('../config.php');

echo  $action = $_REQUEST['action'];
echo  $act = $_REQUEST['id'];

			$insert = "Update `printing_order` set Status = '$action' where idPrinting_Order = '$act'";
			$qry = mysqli_query($conn,$insert);
			if ($qry) 
			{
				// $_SESSION['succ'] = '<div class="alert alert-success">
                //             <b><strong>Success..!!!</strong> Your Data Insert Successfully...!!!</b>
                //         </div>';
				
				header("location:/Final_Project/Admin/Admin/index.php?page=printing_order");
				//echo "Insert Okok";
			}
			else
			{
				echo "Insert Not";
			}
?>