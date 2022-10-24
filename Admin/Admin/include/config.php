<?php 

ob_clean();
ob_start();
$con=mysqli_connect('localhost','root','','project');

if($con)
{
	echo "connected";
}else
{
	echo "not connected";
}
// function alertme($value){
// 	echo "<script>alert('$value');</script>";
//   }
?>