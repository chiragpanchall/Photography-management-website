<?php
session_start();
require_once('../DBCONNECT.php');	
if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password1  = $_POST['password'];
    $fetchq = "select * from user where User_Email = '$email' and isAdmin = 0";// and User_Password = '$password' ";
    $returnset = mysqli_query($conn,$fetchq);
    $cnt = mysqli_num_rows($returnset);
    if($cnt == 1){
        $rodata = mysqli_fetch_array($returnset);
         if(password_verify($password1,$rodata['User_Password'])){
            session_start();
            $_SESSION['email'] = $email;
            //$_SESSION['password'] = $password1; //Not good practise
            header('Location:../LoggedIn/index.php');
         }
         else{
            echo '<script>alert("Username or password wrong.");</script> ';
            echo "<script> window.location.replace('index.html'); </script>";
            unset($_SESSION['email']);
            session_destroy();

        } 
    }
    else{
         echo '<script>alert("User does not exist");</script> ';
         echo "<script> window.location.replace('index.html'); </script>";
         unset($_SESSION['email']);
         session_destroy();
        }
}
else{
      echo '<script>alert("Something has been occured");</script> ';
      echo "<script> window.location.replace('index.html'); </script>";
      unset($_SESSION['email']);
      session_destroy();
}
?>