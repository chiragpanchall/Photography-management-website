<?php 
include_once('../config.php');

echo  $action = $_REQUEST['action'];
echo  $act = $_REQUEST['id'];

			$insert = "Update `event_order` set Status = '$action' where idEvent_order = '$act'";
			$qry = mysqli_query($conn,$insert);
			if ($qry) 
			{
				// $_SESSION['succ'] = '<div class="alert alert-success">
                //             <b><strong>Success..!!!</strong> Your Data Insert Successfully...!!!</b>
                //         </div>';
				
				header("location:/Final_Project/Admin/Admin/index.php?page=event_order");
				//echo "Insert Okok";
			}
			else
			{
				echo "Insert Not";
			}
?>