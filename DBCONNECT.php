<?php  
$host = 'localhost';  
$user = 'root';  
$pass = '';  
$db = 'project';
$conn = mysqli_connect($host, $user, $pass,$db);  
if(! $conn )  
{  
	echo 'Something went Wrong';
  die('Could not connect: ' . mysqli_error($conn));    

}  
//echo 'Connected successfully :>';  

function alertme($value){
  echo "<script>alert('$value');</script>";
}
function conme($value){
  echo "<script>console.log('$value');</script>";
}
 function getArrayOfData($conn,$sql){
   $result = mysqli_query($conn,$sql);
   $data = mysqli_fetch_array($result);
    if($data == null){
      conme("Data not found");
      return null;
    }
    else{
     return $data;
    } 
 }
function getDataAsArray($conn,$sql){
  $result = mysqli_query($conn,$sql)  or die ("Couldn't execute query: ".mysqli_error($sql));;
   if($result == null){
     echo "<script>console.log('Data not found')</script>";
     return null;
   }
   else{
    return $result;
   }
  
}

?> 
