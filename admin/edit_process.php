<?php

session_start();


if (!isset($_SESSION["name"])&& !isset($_SESSION["pass"])) {
  header("Location:adminlogin.html");

}
include_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $address = $_POST['address'];

    // Update user data in the database
    $query = "UPDATE users SET name='$name', email='$email', password='$password', address='$address' WHERE id='$userId'";
    $result = mysqli_query($conn, $query);

    // Redirect to usermanage.php after update
    header("Location: usermanage.php");
    exit();
} else {
    // Redirect to usermanage.php if accessed without a POST request
    header("Location: usermanage.php");
    exit();
}
?>
