<?php 
session_start();
$name=$_POST["name"];
$pass=$_POST["pass"];

include('config.php');

if (!$conn) {
    echo "Not COnnected". mysqli_connect_error();
} 

$sql = "SELECT * FROM `admin` WHERE `name` = '$name' AND `password` = '$pass';";

$result = mysqli_query($conn,$sql);

if (mysqli_num_rows($result)>0) {
   $_SESSION["name"] = $name;
   $_SESSION["pass"] = $pass;
    header("Location: home.php");
} else {
    echo "Invalid Credentials <a href='login.php'>Try Again</a>";
}




mysqli_close($conn);

?>