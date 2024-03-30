<?php 
session_start();

$name=$_POST["name"];
$pass=$_POST["pass"];

include('config.php');

if (!$conn) {
    echo "Not COnnected". mysqli_connect_error();
} 

$sql = "SELECT * FROM `users` WHERE `name` = '$name' AND `password` = '$pass';";

$result = mysqli_query($conn,$sql);

if (mysqli_num_rows($result)>0) {
   $_SESSION["name"] = $name;
   $_SESSION["pass"] = $pass;
    header("Location: index.html");
} else {
    echo "Invalid Credentials <a href='login.html'>Try Again</a>";
}




mysqli_close($conn);

?>