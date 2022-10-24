<?php 
session_start();
//echo $_SESSION['username'];
//echo '<script>window.location.replace("..\SP Photography\index.html");</script>';
unset($_SESSION['email']);
session_destroy();
header("Location:SP Photography\index.html");
//echo $_SESSION['email'];
?>