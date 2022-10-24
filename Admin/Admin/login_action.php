<?php 
include("config.php");

$email = $_POST['email'];
$password = $_POST['password'];
// New login details
if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	echo $email;
	$password1  = $_POST['password'];
echo $fetchq = "select * from user where User_Email = '$email' and isAdmin = 1";// and User_Password = '$password' ";
   $returnset = mysqli_query($conn,$fetchq);
    $cnt = mysqli_num_rows($returnset);
    if($cnt == 1){
        $rodata = mysqli_fetch_array($returnset);
         if(password_verify($password1,$rodata['User_Password'])){
			session_start();
			$_SESSION['idUser'] = $rowEmail['idUser'];
			$_SESSION['email'] = $email;
			$_SESSION['admin_id'] = $email;
			echo "Login Success";
			$_SESSION['idUser'] = $rowEmail['idUser'];	
	 		header("location:index.php");
		   // $_SESSION['password'] = $password1; //Not good practise
		    echo '<script>alert("Welcome to Admin panel");</script> ';
           // header('Location:index.php');
         }
         else{
		  	echo '<script>alert("Username or password wrong.");</script> ';
		  	echo "Login Failed";
           echo "<script> window.location.replace('login.php'); </script>";
            unset($_SESSION['email']);
            unset($_SESSION['idUser']);
            unset($_SESSION['admin_id']);
            session_destroy();

        } 
    }
    else{
         echo '<script>alert("User does not exist");</script> ';
        echo "<script> window.location.replace('login.php'); </script>";
         unset($_SESSION['email']);
         session_destroy();
        }
}
else{
      echo '<script>alert("Something has been occured");</script> ';
      echo "<script> window.location.replace('login.html'); </script>";
      unset($_SESSION['email']);
      session_destroy();
}


















// if (isset($_POST['submit'])) 
// {
// 	conme("If condition executed");
// 	echo $checkEmail = "SELECT * FROM `user` WHERE `User_Email` = '".$email."' AND `User_Password` = '".$password."' ";
// 	$qryEmail = mysqli_query($conn,$checkEmail);
// 	$countEmail = mysqli_num_rows($qryEmail);
	
// 	if ($countEmail > 0) 
// 	{
// 		conme("second cond, ext");
// 		$rowEmail = mysqli_fetch_assoc($qryEmail);
// 		$_SESSION['idUser'] = $rowEmail['idUser'];	
// 		header("location:index.php");
// 	}
// 	else
// 	{
// 		echo "<script>alert('Please Enter valid Credential')</script>";
// 		conme("Password Wrong");
// 		header("location:login.php");
// 		//echo "Login Not";
// 	}
// }


?>