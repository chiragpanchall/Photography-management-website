<?php 
session_start();
include("config.php");

$newpassword = $_REQUEST['newpassword'];
$confirmpassword = $_REQUEST['cpassword'];
echo $_SESSION['email'];
if ($newpassword == $confirmpassword) 
{
	$update = "UPDATE `user` SET `User_Password` = '".$newpassword."' WHERE `User_Email` = '".$_SESSION['email']."' ";
	// UPDATE `user` SET `User_Password` = 'chirag' WHERE `user`.`idUser` = 3;
	$qry = mysqli_query($conn,$update);
	if ($qry) 
	{
		$_SESSION['succ'] = '<div class="alert alert-success">
                            <strong>Success..!!!</strong> Your Password Update Successsfully.. Please Login With New Password...!!!
                        </div>';
		header("location:login.php");
		 echo "password Update";
		 conme("Password update");
	}
	else
    {
    	header("location:reset_password.php");
    	echo "password Not Update";
		conme('Password not updated.');
    }		
}
else
{
	$_SESSION['ErrPass'] = '<div class="alert alert-danger">
                            <strong>Error..!!</strong> Both Password Does Not Match...!!!!
                        </div>';
	header("location:reset_password.php");
	echo "Password Not Match...";
	alertme('Password dont match');
}


?>