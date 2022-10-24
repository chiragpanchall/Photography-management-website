<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    echo $name . "" . $email . "" . $message."<br/>";
    echo "Action of this form will be decided later...";



}

?>