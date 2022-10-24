<?php
session_start();
require_once('../DBCONNECT.php');
if (isset($_POST['submit']) && (!empty($_SESSION['email']))) 
{
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_SESSION['email'];
    $contact = $_POST['MobileNumber'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpass'];
    $photo = $extension = $InsertQ = $oldPhoto = "";
    //$photo = $_FILES["avatar-file"]["name"];

    //Checkinh File eligibility for updating ...
    function validFile()
    {
        global $photo;
        global $extension;

        if (!empty($_FILES["avatar-file"]["name"])) {
            $photo = $_FILES["avatar-file"]["name"];
            $extension = substr($photo, strpos($photo, "."), strlen($photo));
            $allowed_extensions = array(".jpg", ".jpeg", ".png");
            if (!in_array($extension, $allowed_extensions)) {
                //$GLOBALS['ErMessage'] = "Invalid format of image";
                echo "<script>alert('Invalid format. Only jpg,jpeg,png,gif format allowed');</script>";
                echo "<script> window.location.replace('EditProfile.php'); </script>";
                return false;
            } else {
                return true;
            }
        } else {
            return false;
        }
    }
    //Checking password eligibility for updating
    function passValid()
    {
        global $email;
        global $conn;
        global $password;
        global $oldPhoto;
        $gethash = "select User_Password,User_Photo_Path from user where User_Email = '$email'";
        $result = mysqli_query($conn, $gethash);
        $dbpassword = mysqli_fetch_array($result);
        $oldPhoto = $dbpassword[1];
        //alertme($dbpassword[0]);
        if ($dbpassword[0] == $password) {
            return false;
        } else {
            return true;
        }
    }


validFile();
passValid();

//Getting the final query to run in database..
if (validFile() == true) {
    if (passValid() == true) {
        //Update the both file and password..
        //alertme("both changing");
        $password = password_hash($password,PASSWORD_DEFAULT);
        $imgnewfile = md5($photo) . $extension;
        move_uploaded_file($_FILES["avatar-file"]["tmp_name"], "../Data/ProfilePic/" . $imgnewfile);
        // Insert Query in database..
        $InsertQ = "update user set `User_Fname` = '$firstname', `User_Lname` = '$lastname', `User_MobileNo` = '$contact', `User_Photo_Path` = '$imgnewfile', `User_Password` = '$password' where User_Email = '$email' ";
        $unphoto = '../Data/ProfilePic/' .$oldPhoto;
        unlink("$unphoto");
    } else {
        // update the file only..
        alertme("file changie changing");
        $imgnewfile = md5($photo) . $extension;
        move_uploaded_file($_FILES["avatar-file"]["tmp_name"], "../Data/ProfilePic/" . $imgnewfile);
        // Insert Query in database..
        $InsertQ = "update user set `User_Fname` = '$firstname', `User_Lname` = '$lastname', `User_MobileNo` = '$contact', `User_Photo_Path` = '$imgnewfile' where User_Email = '$email' ";
        $unphoto = '../Data/ProfilePic/' .$oldPhoto;
        unlink("$unphoto");

    }
} 
else {
    if (passValid() == true) {
        
        //Update the password..
        $password = password_hash($password,PASSWORD_DEFAULT);
        $InsertQ = "update user set `User_Fname` = '$firstname', `User_Lname` = '$lastname', `User_MobileNo` = '$contact',`User_Password` = '$password' where User_Email = '$email' ";
        //alertme($password);
        //echo $InsertQ."</br>";
    } else {
        alertme("not any  changing");
        //Not update the file and password
        $InsertQ = "update user set `User_Fname` = '$firstname', `User_Lname` = '$lastname', `User_MobileNo` = '$contact' where User_Email = '$email' ";
    }
}

//Updating the data
echo $InsertQ."</br>";
$result = mysqli_query($conn, $InsertQ);
mysqli_commit($conn);
//alertme("Updated");
header('Location:EditProfile.php');
}
else {
    header('Location:index.php');
}

?>