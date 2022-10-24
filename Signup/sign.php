
<?php
require_once('../DBCONNECT.php');	
$ErMessage = "Errors";
if (isset($_POST['submit'])) {
	$fname = $_POST['FirstName'];
	$lname  = $_POST['LastName'];
	$email = $_POST['email'];
	$contact  = $_POST['ContactNo'];
	$password  = $_POST['password'];
	$rpassword  = $_POST['password-repeat'];
	$imgfile = $_FILES["pimage"]["name"];

	//Server side validation goes here..



    //Check user data if already exist
	$getcopyquery = "select * from user where User_Email = '$email' limit 1";
	$retquery = mysqli_query($conn,$getcopyquery);
	$cnt = mysqli_num_rows($retquery);
	if($cnt == 1){
		echo "<script>alert('Please provide valid credential..');</script>";	
		echo "<script> window.location.replace('index.php'); </script>";
	}

	
	//validate the image and insert the data in the database [Don't change it]...
	$extension = substr($imgfile, strpos($imgfile,"."), strlen($imgfile));	
	$allowed_extensions = array(".jpg", ".jpeg", ".png");
	if (!in_array($extension, $allowed_extensions)) {
		//$GLOBALS['ErMessage'] = "Invalid format of image";
		echo "<script>alert('Invalid format. Only jpg,jpeg,png,gif format allowed');</script>";
		echo "<script> window.location.replace('index.php'); </script>";
	} 
		
	else {
		$imgnewfile = md5($imgfile) . $extension;
    	move_uploaded_file($_FILES["pimage"]["tmp_name"], "../Data/ProfilePic/" . $imgnewfile);
		// Insert Query in database..
		$newpass = password_hash($password,PASSWORD_DEFAULT);	
		$query=mysqli_query($conn,"insert into `user` (`idUser`, `User_Fname`, `User_Lname`, `User_MobileNo`, `User_Email`, `User_Photo_Path`, `User_Password`, `Company_idCompany`, `IsAdmin`) VALUES (NULL, '$fname', '$lname', '$contact', '$email', '$imgnewfile', '$newpass', '1', '0')");

	if($query)
	{
		//Production Code
	   echo "<script>alert('Data inserted successfully');</script>";
        session_start();	   
		$_SESSION['email'] = $email;
		//$_SESSION['password'] = $password; 
	   header('Location:../LoggedIn/index.php');
	}
	else
	{
		// Check if there is duplication error. 
		
	   echo "<script>alert('User not created');</script>";
	  echo mysqli_error_list($conn);
	  //$GLOBALS['ErMessage'] ="Something has been occured.";
	  header('Location:index.html');
	} 
	}
}
?>
